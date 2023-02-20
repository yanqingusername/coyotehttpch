<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class Productfruit extends Model{
   
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }
 
    
    /**
     * 获取列表或者详情
     */
    public function getList($where){
        $data=$this
            ->with(['imageho'])
            ->where('status',1)
            ->where($where)
            ->order('listorder')
            ->select();
        return $data;
    }
}
