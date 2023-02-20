<?php
namespace app\index\model;
use think\Model;

class Reagent extends Model{
  
    public function imageho2(){
        return $this->hasOne('Attachment','id','image2')->bind(['image_path2'=>'path']);
    }
    public function imageho3(){
        return $this->hasOne('Attachment','id','image3')->bind(['image_path3'=>'path']);
    }
 
     /**
     * 获取列表或者详情
     */
    public function getInfo(){ 
        //查询符合条件的数据
        $data=$this->with(['imageho2','imageho3'])->find();
        return $data;
    }
 
}
