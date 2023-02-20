<?php
namespace app\index\model;
use think\Model;

class Development extends Model{
   
    
    /**
     * 获取列表或者详情
     */
    public function getList(){
        $data=$this
            ->where('status',1)
            ->order('listorder asc,id asc')
            ->select()->toarray();
        foreach($data as &$coll_data){
            $coll_data['content'] = explode(',', $coll_data['content']);
        } 
        return $data;
    }
}
