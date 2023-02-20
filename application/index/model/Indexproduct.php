<?php
namespace app\index\model;
use think\Model; 

class Indexproduct extends Model{
 
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb');
    }

    /**
     * 获取列表或者详情
     */
    public function getList(){
         
        $data=[];
        //查询符合条件的数据
        $data=$this->with(['imageho'=>function($query){
                $query->field('id,path');
            }])
            ->where('status',1) 
            ->order('listorder')
            ->select();
 
        return $data;
    }
}
