<?php
namespace app\index\controller;
use app\index\controller\Common;
use app\index\model\Index as IndexModel;

use app\index\model\News;
use app\index\model\Cooperation;
use app\api\model\Category;
use app\index\model\About;
use app\index\model\Aboutdata;
use app\index\model\Vanguard;
use app\index\model\Development;
use app\index\model\Technology;
use app\index\model\Technologydata;
use app\index\model\Joinus;
use app\index\model\Joindata;
use app\index\model\Position;
use app\index\model\Solution;
use app\index\model\Reagent;
use app\index\model\Reagentclinical;
use app\index\model\Instrument;
use app\index\model\Mobilelab;

use think\Db;
use think\App;

class Index extends Common
{
    public function index()
    {
        $cate = (new Category)->with(['image1']) ->field('id,catname,image,picname,subpicname,setting,description')->where('id',1)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate);  

        // 首页关于卡尤迪
        $index = (new IndexModel)->getOne(['catid'=>1]); 
        // 合作伙伴
        $cooperation = (new Cooperation)->getList();
        // 新闻
        $news = (new News)->index([]);
        // 案例
        $solution = (new Solution)->index();
        // 仪器
        $instrument = (new Instrument)->index();

        return view('',compact('index','cooperation','news','solution','instrument')); 
    }


    public function about()
    {
        $cate = (new Category)->with(['image1']) ->field('id,catname,image,picname,subpicname,setting,description')->where('id',30)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate);  

        // 关于我们
        $about = (new About)->getInfo(); 
        // 公司数据
        $about_data = (new Aboutdata)->getList();
        // 先锋
        $vanguard = (new Vanguard)->getList();
        // 发展历程
        $development = (new Development)->getList();
        // halt($development);

        return view('',compact('about','about_data','vanguard','development')); 
    }

    public function technology()
    {
        $cate = (new Category)->with(['image1']) ->field('id,catname,image,picname,subpicname,setting,description')->where('id',34)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate); 

        //硬核科技
        $technology = (new Technology)->getInfo(); 
        //前沿科技
        $data1 = (new Technologydata)->getList(['catid'=>35]);
        //未来探索
        $data2 = (new Technologydata)->getList(['catid'=>36]);

        return view('',compact('technology','data1','data2')); 
    }

    public function contact()
    {
        $cate = (new Category)->with(['image1']) ->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',55)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $content = db('page')->where('catid',55)->value('content');
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate); 
        $this->assign('content',$content); 
        return view('');
    }

    public function login()
    {
        return view('');
    }

    public function news()
    {
        $cate = (new Category)->with(['image1']) ->field('id,catname,image,picname,subpicname,setting,description')->where('id',19)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate); 

        $news = db('category')->field('id,catname,subpicname')->where('parentid',19)->order('id')->select();
        foreach ($news as $key => $value) {
            $news[$key]['data'] = (new News)->index(['catid'=>$value['id']]);
        } 
        // halt($news);
        return view('news',compact('news'));
    }

    public function news_details($id)
    {
        $cate = (new Category)->with(['image1']) ->field('id,catname,image,picname,subpicname,setting,description')->where('id',19)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('cate',$cate); 

        $news = (new News)->getInfo($id); 
        $news['title'] && $seo['meta_title'] = $news['title'].'|'.$seo['meta_title'];
        $news['keywords'] && $seo['keywords'] = $news['keywords'];
        $news['description'] && $seo['description'] = $news['description'];
 
        return view('news_details',compact('seo','news'));
    }

    public function news_type()
    {
        $catid = input('catid');
        $page = input('page',1);
        $cate = (new Category)->with(['image1']) ->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',19)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate); 

        $news_type = db('category')->field('id,catname')->where('parentid',19)->order('id')->select();
        $news = (new News)->getList(['catid'=>$catid]);
        $pagedata= $news->render();
        return view('news_type',compact('news','news_type','catid','page'));
    }

    public function join_us()
    {
        $cate = (new Category)->with(['image1']) ->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',42)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate); 

        $joinus = (new Joinus)->getInfo(); 

        $join_data = (new Joindata)->getList();
        
        return view('join_us',compact('joinus','join_data'));
    }

    public function join_position()
    {
        $cate = (new Category)->with(['image1']) ->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',42)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate); 
       
        $page = input('page',1);
        $positioncate = input('positioncate');
        $province = input('province');
        $city = input('city');
        $qu = input('qu');
        $where=[];
        if ($province) {
            $province_id = db('discrist')->where('adcode',$province)->value('id');
            $where['province'] = $province_id;
        }
        if ($city) {
            $city_id = db('discrist')->where('adcode',$city)->value('id');
            $where['city'] = $city_id;
        }
        if ($qu) {
            $qu_id = db('discrist')->where('adcode',$qu)->value('id');
            $where['qu'] = $qu_id;
        }
        if ($positioncate) {
            $where['positioncate'] = $positioncate;
        }

       
        $list = db('position')->alias('c')
                ->field('c.*,i.title as catename') 
                ->join('positioncate i','i.id= c.positioncate','left')
                ->where('c.status',1)
                ->where($where)
                ->paginate(9, false, [
                    'query' => request()->get()
                ]);  

        $positioncate = db('positioncate')->field('id,title')->where('status',1)->select();
        return view('join_position',compact('positioncate','list','page'));
    }


    public function solution()
    {
        $cate = (new Category)->with(['image1']) ->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',46)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  
        $this->assign('cate',$cate); 

        $solution = (new Solution)->index();
        // halt($solution);
        return view('solution',compact('solution'));
    }

    
    public function solution_info($id)
    {
        $cate = (new Category)->with(['image1']) ->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',46)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo);  

        $solution = (new Solution)->getInfo($id);
        $content = $solution['content'];
        unset($solution['content']);

        // $filter[]=['','exp',Db::raw('FIND_IN_SET(4,`flag`)')];
        // $related = (new Instrument)->getList($filter); 
        // if ($id == 1) {
        //      return view('solution-simple',compact('solution'));
        // }
        return $this->display($content,compact('solution'));
    }

    public function reagent()
    {
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',47)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo); 
        $this->assign('cate',$cate); 

        $reagent = (new Reagent)->getInfo(); 

        $reagentdata = (new Reagentclinical)->getlist(['catid'=>48]); 
 
        return view('reagent',compact('reagent','reagentdata'));
    }

    public function reagent_detail($id)
    {
        $reagentdata= (new Reagentclinical)->getInfo($id); 
        
        if (empty($reagentdata)) {
            return $this->error('数据错误');
        }
        
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',$reagentdata['catid'])->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
   
        return view('reagent_detail',compact('cate','seo','reagentdata'));
    }

    public function reagent_research()
    {
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',49)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo); 
        $this->assign('cate',$cate); 
        $reagentdata = [];
        $data = (new Reagentclinical)->getlist(['catid'=>49]); 
        foreach ($data as $key => $value) {
            $reagentdata[$value['type']][] = $value;
        }
     
        return view('reagent_research',compact('reagentdata'));
    }

    public function reagent_food()
    {
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',50)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo); 
        $this->assign('cate',$cate); 

        $page = input('page',1);
 
        $reagentdata = (new Reagentclinical)->getPageList(['catid'=>50]); 
     
        return view('reagent_food',compact('reagentdata','page'));
    }

    public function instrument_platform()
    {
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',51)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo); 
        $this->assign('cate',$cate); 

        $instrument = (new Instrument)->getList(); 
        $lab = (new Mobilelab)->getRecom(); 


 
        return view('instrument_platform',compact('instrument','lab'));
    }

    public function instrument_detail($id)
    {
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',51)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo); 
        
        $instrument = (new Instrument)->getInfo($id); 
        if ($instrument['banner_path'])  $cate['imagepath'] = $instrument['banner_path'];
   
        $solution = (new Solution)->index();

        // $filter[]=['','exp',Db::raw('FIND_IN_SET(4,`flag`)')];
        // $recommend = (new Instrument)->getList($filter); 

        return view('instrument_detail',compact('instrument','cate','solution'));
    }

    public function instrument_list()
    {
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',53)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo); 
        $this->assign('cate',$cate); 


        $instrument = (new Instrument)->getAllList(); 
 
        return view('instrument',compact('instrument'));
    }

    public function instrument_lab()
    {
        $cate = (new Category)->with(['image1'])->field('id,parentid,catname,image,picname,subpicname,setting,description')->where('id',54)->find();
        $seo = unserialize($cate['setting']);
        unset($cate['setting']);
        $this->assign('seo',$seo); 
        $this->assign('cate',$cate); 


        $lab = (new Mobilelab)->getInfo(); 

        $solution = (new Solution)->index();

        return view('instrument_lab',compact('lab','solution'));
    }
    
    
    public function search()
    {
        $cate = (new Category)->with(['image1'])->field('id,catname,image,picname,description')->where('id',56)->find();
        $this->assign('cate',$cate); 

        $key_word = input('key_word');
        $this->assign('key_word',$key_word); 

        if ($key_word) {
            $subQuery = "(SELECT id,catid,title,remark,'instrument_detail' as type FROM `yzn_instrument` UNION SELECT id,catid,title,title  as remark,'news_details' as type FROM `yzn_information`)";
            $list = Db::table($subQuery . ' a')
            ->where('a.title|a.remark', 'like', '%'.$key_word.'%')
            ->order('id', 'desc')
            ->select();
            $this->assign('list',$list); 
        }
      
        return view('search');
    }
}