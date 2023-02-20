<?php
namespace app\index\model;
use think\Model; 

class Down extends Model{
 
    //图片
    public function file(){
        return $this->hasOne('Attachment','id','downfile')->bind('path');
    }
   
  

    /**
     * 获取列表或者详情
     */
    public function getList($where=[]){
         
        $data=[];
        //查询符合条件的数据
        $data=$this
            ->with(['file'])
            ->where($where) 
            ->where('status',1) 
            ->order('listorder')
            ->select();
 
        return $data;
    }
}
