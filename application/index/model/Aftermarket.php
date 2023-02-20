<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class Aftermarket extends Model{
   
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }
    
    /**
     * 获取列表或者详情
     */
    public function getList(){
        //查询符合条件的数据
        $data=$this
            ->with(['imageho'])
            ->where('status',1) 
            ->order('listorder')
            ->select();
        return $data;
    }
}
