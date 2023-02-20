<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class Joinus extends Model{
  
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind(['thumb_path'=>'path']);
    }
    public function imageho1(){
        return $this->hasOne('Attachment','id','image1')->bind(['image1_path'=>'path']);
    }
    public function imageho2(){
        return $this->hasOne('Attachment','id','image2')->bind(['image2_path'=>'path']);
    }

 
     /**
     * 获取列表或者详情
     */
    public function getInfo(){ 
        //查询符合条件的数据
        $data=$this
            ->with(['imageho','imageho1','imageho2']) 
            ->find();
        return $data;
    }
    
}
