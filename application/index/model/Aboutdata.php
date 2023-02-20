<?php
namespace app\index\model;
use think\Model;

class Aboutdata extends Model{
 
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind(['path']);
    }
    
  

    /**
     * 获取列表或者详情
     */
    public function getList($where=[]){
        $where['status'] = 1;
        //查询符合条件的数据
        $data=$this
            ->with('imageho')
            ->where($where)
            ->order('listorder asc,id asc')
            ->select();
  
        return $data;
    }
}
