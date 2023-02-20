<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Instrument;

class Common extends Controller
{
	protected function initialize()
    {
    	$menu = db('category')->field('id,catname,url,child')->where('status',1)->where('parentid',0)->order('listorder')->select();
      
        $action = request()->action();
  
        foreach ($menu as $key => &$value) {
            $value['active'] = 0;
            $this->is_active($value['id'],$action) && $value['active'] =1;

            if ($value['id'] == 51) {
                $value['sub'] = db('category')->field('id,catname,url')->where('status',1)->where('parentid',$value['id'])->order('listorder,id')->select();
                foreach ($value['sub'] as $k => $v) {
                    if ($v['id'] == 53) {
                        $value['sub'][$k]['sub'] =  db('instrument')->field('id,title')->where('status',1)->order('listorder,id')->select();
                        $value['sub'][$k]['sub_url'] = 'index/instrument_detail';
                    }
                }
            }
            if ($value['id'] == 47) {
                $value['sub'] = db('category')->field('id,catname,url')->where('status',1)->where('parentid',$value['id'])->order('listorder,id')->select();
                    foreach ($value['sub'] as $k => $v) {
                        if ($v['id'] == 48) {
                            $value['sub'][$k]['sub'] =  db('reagentclinical')->field('id,title')->where('status',1)->order('listorder,id')->where('catid',$v['id'])->select();
                            $value['sub'][$k]['sub_url'] = 'index/reagent_detail';
                        }
                    }
            }

            if ($value['id'] == 46) {
                $value['sub'] = db('solution')->field('id,title as catname')->where('status',1)->order('listorder,id')->select();
                foreach ($value['sub'] as $k => $v) {
                    $value['sub'][$k]['url'] = 'index/solution_info?id='.$v['id'];
                }
            }

            if ($value['id'] == 30) {
                $value['sub'] = db('category')->field('id,catname,url')->where('status',1)->where('parentid',$value['id'])->order('listorder,id')->select();
            }
        } 

        // halt($menu);
        // 旗下公司地址
        $mycompany = db('mycompany')->field('id,title,address,email,phone')->where('status',1)->order('id')->select();
        $mycompany = array_chunk($mycompany, 2); 
        $this->assign('mycompany',$mycompany);

        $bottom_menu = db('category')->field('id,catname,url')->where(['parentid'=>0,'bottom_status'=>1])->order('listorder')->select();
        $this->assign('menu',$menu); 
        $this->assign('bottom_menu',$bottom_menu);  
    }

    public function is_active($id=0,$action='')
    {
        $arr = $this->get_children();
        if ($id ==  $arr[$action]) return true;
    }

    public function getSeo($id)
    {
        $seo = Db::name('category')->where(['id'=>$id])->find();
        return unserialize($seo['setting']);
    }

    
    public function get_children()
    {
        return array(
                'index'               => '1',
                'about'               => '30',
                'technology'          => '34',
                'contact'             => '30',
                'news'                => '30',
                'news_details'        => '30',
                'news_type'           => '30',
                'join_us'             => '30',
                'join_position'       => '30',
                'solution'            => '46',
                'solution_info'       => '46',
                'reagent'             => '47',
                'reagent_detail'      => '47',
                'reagent_research'    => '47',
                'reagent_food'        => '47',
                'instrument_platform' => '51',
                'instrument_detail'   => '51', 
                'instrument_list'     => '51', 
                'instrument_lab'      => '51', 
            );
    }
}
