<?php
namespace app\index\model;
use think\Model; 

class Bisystem extends Model{
 
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }
     
   

    /**
     * 获取列表或者详情
     */
    public function getList($where=[]){
          
       //查询符合条件的数据
        $data=$this
            ->with(['imageho'])
            ->where($where) 
            ->where('status',1) 
            ->order('listorder')
            ->select();
        
        return $data;
    }
}
