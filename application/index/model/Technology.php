<?php
namespace app\index\model;
use think\Model;

class Technology extends Model{
  
    public function imageho1(){
        return $this->hasOne('Attachment','id','bg')->bind(['image_path'=>'path']);
    }
    public function imageho2(){
        return $this->hasOne('Attachment','id','bg2')->bind(['image_path2'=>'path']);
    }
 
     /**
     * 获取列表或者详情
     */
    public function getInfo(){ 
        //查询符合条件的数据
        $data=$this->with(['imageho1','imageho2'])->find();
        return $data;
    }
 
}
