<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class Contactus extends Model{
 
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb');
    }
     
    public function getFileDomainAttr($value){
        return config('upload_file_domain');
    }
  

    /**
     * 获取列表或者详情
     */
    public function getList($param=[]){
        
      
        $data=[]; 

        //查询符合条件的数据
        $data=$this->field($param['field'])
            ->with(['imageho'=>function($query){
                $query->field('id,path');
            }])
            ->where('status',1) 
            ->order('listorder')
            ->select()
            ->append(['fileDomain']); 
            
        //遍历媒体文件
        $media_field = ['imageho'];
        foreach($data as $key=>$coll_data){
            foreach($media_field as $o){
                if(!empty($coll_data[$o])) {
                    $str = $coll_data[$o]->path;
                    $status = strpos($str, "http");
                    if (!$status) {
                        $coll_data[$o]->paths = config('upload_file_domain').$coll_data[$o]->path;
                    }
                }else{
                    $coll_data[$o] = [
                        'id'=>0,
                        'path'=>'',
                        'paths'=>'',
                    ];
                }
            } 
        }
        return $data;
    }
}
