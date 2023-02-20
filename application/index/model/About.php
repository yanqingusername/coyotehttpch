<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class About extends Model{
  
    public function imageho2(){
        return $this->hasOne('Attachment','id','image2')->bind(['image_path2'=>'path']);
    }
    public function imageho3(){
        return $this->hasOne('Attachment','id','image3')->bind(['image_path3'=>'path']);
    }
    public function imageho4(){
        return $this->hasOne('Attachment','id','image4')->bind(['image_path4'=>'path']);
    }
    public function imageho6(){
        return $this->hasOne('Attachment','id','image6')->bind(['image_path6'=>'path']);
    }
    // public function imageho7(){
    //     return $this->hasOne('Attachment','id','image7')->bind(['image_path7'=>'path']);
    // }
 
     /**
     * 获取列表或者详情
     */
    public function getInfo(){ 
        //查询符合条件的数据
        $data=$this
            ->with(['imageho2','imageho3','imageho4','imageho6']) 
            ->find();
        $data['image7'] = $data['image7'] == ''?[]: explode(',', $data['image7']);
        // halt($data);
        return $data;
    }
    
}
