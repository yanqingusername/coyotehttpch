<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class Solution extends Model{
    protected $hidden = ['listorder','uid','username','sysadd','hits','updatetime','status'];
   
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }

    //banner图片
    public function bannerho(){
        return $this->hasOne('Attachment','id','banner')->bind('path');
    }

    //推荐图片
    public function recommendho(){
        return $this->hasOne('Attachment','id','recommend')->bind(['recommend_path'=>'path']);
    }

  
 
    /**
     * 获取列表或者详情
     */
    public function getInfo($id){
        //查询符合条件的数据
        $data = $this->get($id,['bannerho']);
        if ($data) {
            $data['recommend'] = (new Instrument)->with('imageho')->where('id', 'in', $data['goods'])->where('status',1)->field('id,title,thumb')->select()->toarray();
        }
        return $data;
    }


    public function index()
    {
        $data=$this
            ->with(['imageho','recommendho'])
            ->where('status',1)
            ->order('listorder,id')
            ->field(array_merge(['content'],$this->hidden),true) 
            ->select();  
        return $data;
    }
 
    
}
