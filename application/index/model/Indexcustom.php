<?php
namespace app\index\model;
use think\Model; 

class Indexcustom extends Model{
 
 

    /**
     * 获取列表或者详情
     */
    public function getList(){
         
        $data=[];
        //查询符合条件的数据
        $data=$this 
            ->where('status',1) 
            ->order('listorder')
            ->select(); 
        return $data;
    }
}
