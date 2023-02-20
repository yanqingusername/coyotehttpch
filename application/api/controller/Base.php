<?php
namespace app\api\controller;
use think\Controller;
use think\facade\Cache;
use think\facade\Route;
class Base extends Controller{
    
    protected function initialize(){
        //清空缓存
        //Cache::rm('cat');
        //ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 5.00; Windows 98)');
        $this->CrossRespon();
    }
    
    /**
     * 请求响应
     */
    public function HttpRes($data){
        //关闭缓存
        //Cache::clear();
        return json($data);
    }
    
    /**
     * 签名处理
     */
    public function SignHandle(){
        //app('TestModel')
        //code: "JyV/8ql7oom+JFPkTP8XbA=="
        //str: "5Q3RNGJZ"
        //类似token  需要搭配redis 存储状态
        //建议开启https 和设置ip白名单 
        //ngnix防盗链
        /*$request = Request::instance();
        $param=$request->param();
        if(!empty($param['str'])&&!empty($param['code'])){
            $data['code']='1030';
            $data['msg']='非法接口!';
            return json($data);
        }else{
            
        }
        Cache::set('name',$value,3600);*/
    }


    /**
     * 跨域处理
     */
    // 设置能访问的域名
    static public $originarr = [
        'http://doujifront.code.zhongwangyingtong.com',
        'http://ycxcqd.net',
        'http://ycxc.net',
        'http://www.lmcms.coma'
    ];
    public function CrossRespon(){
        // 获取当前跨域域名
        // $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        // if (in_array($origin, self::$originarr)) {
            // 允许 $originarr 数组内的 域名跨域访问 
            header('Access-Control-Allow-Origin:*');
            // 响应类型
            header('Access-Control-Allow-Methods:POST,GET');
            // 带 cookie 的跨域访问
            header('Access-Control-Allow-Credentials: true');
            // 响应头设置
            header('Access-Control-Allow-Headers:x-requested-with,Content-Type,X-CSRF-Token');
        // }
    }
}

/**
 * 上下文调用
 *
    //$prev=Fund::where("id","<",$oid)->where('catid=62')->order("id DESC")->find();
    //$next=Fund::where("id",">",$oid)->where('catid=62')->order("id ASC")->find();


    $op=Fund::where("listorder","=",$data['listorder'])->where('catid=62')->where('status','=','1')->where("id",">",$oid)->find();
    if(empty($op)){
        $prev=Fund::where("listorder",">",$data['listorder'])->where('catid=62')->where('status','=','1')->order("listorder ASC,id ASC")->find();
    }else{
        $prev=Fund::where("listorder",">=",$data['listorder'])->where("id",">",$oid)->where('status','=','1')->where('catid=62')->order("listorder ASC,id ASC")->find();
    }

    $op2=Fund::where("listorder","=",$data['listorder'])->where('catid=62')->where('status','=','1')->where("id","<",$oid)->find();
    if(empty($op2)){
        $next=Fund::where("listorder","<",$data['listorder'])->where('catid=62')->where('status','=','1')->order("listorder DESC,id DESC")->find();
    }else{
        $next=Fund::where("listorder","<=",$data['listorder'])->where('id','<',$oid)->where('status','=','1')->where('catid=62')->order("listorder DESC,id DESC")->find();
    }

    $data['prevTitle']=$prev['title'];
    $data['nextTitle']=$next['title'];
    $data['prevId']=$prev['id'];
    $data['nextId']=$next['id'];
 *
 *
 */

/**
 *  点击量
 *
    $obj = Fund::get($oid);
    $obj->hits	= ['inc', 1];
    $obj->save();
 */

/**
 *  加入点击量
 *
    $ids = "0";
    foreach($cache as $key=>$obj){
    $ids .= ",".$obj['id'];
    }
    Fund::where('id','in',$ids)->setInc('hits');
 *
 */

/*
 * //获取栏目
 * $cat_list=app("CategoryModel")->getSonId('52');
 */

/*
 * //推荐
 * //->where('flag','like','%'.$key.'%')
 */

/*
 * foreach($data as $key=>$obj){
   }
 */

/*
 * 遍历对象操作
 * foreach($data as $key=>$coll_data){
        $str = $coll_data->imageho->path;
        $status = strpos($str,"http");
        if(!$status){
            $coll_data->imageho->path = config('upload_file_domain').$coll_data->imageho->path;
        }
    }
 */

/**
 * cache 不能使用关联闭包
 *  //->withAttr('imageho.path',function($value,$data) {
    //return config('upload_file_domain').$value;
    //})
 *
 */