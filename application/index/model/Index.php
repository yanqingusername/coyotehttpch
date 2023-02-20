<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class Index extends Model{

    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind(['path']);
    }
    
    //图片
    public function videoho(){
        return $this->hasOne('Attachment','id','video')->bind(['video_path'=>'path']);
    }
    

    /**
     * 获取列表或者详情
     */
    public function getOne($where=[]){
        //查询符合条件的数据
        $data=$this
            ->with(['imageho','videoho'])
            ->where($where)  
            ->where('status',1) 
            ->order('listorder desc')
            ->find(); 
        return $data;
    }
}
