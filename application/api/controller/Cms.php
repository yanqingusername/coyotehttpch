<?php
/**
 * 1.数据请求  全都是列表 判断是否分页
 * 2.表单提交
 * 3.调用栏目
 */

namespace app\api\controller;
use app\api\controller\Base;
use think\facade\Request;
use think\Db; 
use think\facade\Session;
use JwtCaptcha\JwtCaptcha;

use app\api\model\Category;
use app\api\model\Index;
use app\api\model\Indexpro;
use app\api\model\Information;
use app\api\model\Story;
use app\api\model\Product;

use app\admin\model\Module;

class Cms extends Base{

    protected function initialize(){
        parent::initialize();
    }

    public function page()
    {
        $top_menu = (new Category)->getList('id,catname,url,image,imagem,picname,subpicname',['parentid'=>0,'status'=>1])->toArray();
        foreach ($top_menu as $key => $value) {
            if ($value['id'] == 9) {
                $top_menu[$key]['child'] = (new Product)->getTitle(['catid'=>9]); 
            }
        }
        $bottom_menu = (new Category)->getList('id,catname,url',['parentid'=>0,'bottom_status'=>1])->toArray();
       
        $setting = Module::where(['module' => 'cms'])->value("setting");
        $setting = unserialize($setting);
        $setting['web_site_icp'] = config('web_site_icp');
        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>compact('top_menu','bottom_menu','web_site_icp','setting')]);
    }

    public function index()
    {
        $banner = (new Index)->getList(['catid'=>2,'status'=>1])->toArray();
        $index = (new Index)->getList(['catid'=>1,'status'=>1])->toArray();
        $product = (new Indexpro)->getList()->toArray();
        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>compact('banner','product','index')]);
    }

    public function information()
    {
        $data = (new Information)->getList();
        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>$data]);
    }

    public function information_info($id)
    {
        $info = (new Information)->getItem($id);
        $prev_id = Information::where("id","<",$id)->where('status','1')->order("id DESC")->value('id');
        $next_id = Information::where("id",">",$id)->where('status','1')->order("id ASC")->value('id');
        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>compact('info','next_id','prev_id')]);
    }

    public function story()
    {
        $info = (new Story)->getItem(['catid'=>4]);

        $proposal = db('category')->field('id,catname,description')->where('id',5)->find();
        $proposal['list'] = (new Story)->getList(['catid'=>5]);

        $history = db('category')->field('id,catname,description')->where('id',6)->find();
        $history['list'] = (new Story)->getList(['catid'=>6]);

        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>compact('info','proposal','history')]);
    }

    public function check()
    {
        $fwm = input('fwm');
        $fwm_count = strlen($fwm );
        if ( empty($fwm) || $fwm_count < 4 ) return $this->HttpRes(['code'=>1,'msg'=>'请填写正确防伪码']);
        $param = array(
                'fwm' => $fwm, 
                'code' => config('fw_code'), 
                'sign' => strtoupper(md5($fwm.config('fw_key'))),
                'ip' => request()->ip(),
            );

        $res = \util\Http::get('http://tyfwjk.ty-315.com/api/tyfw/QueryA', $param);
        $res = json_decode($res,1);
        if (isset($res['Result'])) {
            return $this->HttpRes(['code'=>0,'msg'=>'','data'=>$res]); 
        }else{
            return $this->HttpRes(['code'=>1,'msg'=>'防伪查询接口异常','data'=>$res]); 
        }
        
    }

    public function form()
    {
        $captcha_config = array(
                    'seKey' => 'zuoyanyouse.com', 
                    'length' => 4, 
                    'fontSize' => 18, 
                    'imageW' => 130 , 
                    'imageH' => 38, 
                    'useCurve'   => false, 
                    'useNoise'   => false,
                );
        if ($this->request->isGet()) { 
            $captcha = new JwtCaptcha($captcha_config);
            return $captcha->getEntry();
        }else{
            // 验证码ID
            $uniqid = input('uniqid');
            $code = input('code');
            $captcha = new JwtCaptcha($captcha_config);
            $result = $captcha->checkCaptcha($uniqid, $code);
            if(!$result) return json(['code'=>1,'msg'=>'验证码错误']);
            
            $ip = $this->request->ip();
            $count = db('leaveword')->where("ip", $ip)->whereTime('inputtime','today')->count();
            if ($count >=5) {
                return json(['code'=>1,'msg'=>'每日提交次数已用尽！']);
            }
            $data['title'] = input('title');
            $data['contact'] = input('contact');
            $data['remark'] = input('remark');
            
            $data['inputtime'] = time();
            $data['updatetime'] = time();
            $data['ip'] = $ip;
     
            $data['catid'] = 7;
            db('leaveword')->insert($data); 
            return $this->HttpRes(['code'=>0,'msg'=>'提交成功']); 
        }
    }

    public function product()
    {
        $bottom_img_id = db('category')->where('id',10)->value('image');
        $bottom_img = config('upload_file_domain').get_file_path($bottom_img_id);

        $star_product = (new Product)->getList(['catid'=>9]); 
        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>compact('star_product','bottom_img')]);
    }

    public function get_other_product()
    {
        $data=Product::with(['imageho'])
            ->where('catid',10) 
            ->where('status',1) 
            ->order('listorder,id desc')
            ->append(['fileDomain'])
            ->paginate(4, false, [
                'query' => request()->request()
            ]);
        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>$data]);
    }

    public function product_info()
    {
        $id = input('id');
        $info = (new Product)->getInfo($id); 
        return $this->HttpRes(['code'=>0,'msg'=>'','data'=>$info]);
    }

}