<?php
namespace app\api\model;
use app\api\model\Base;
use think\facade\Cache;

class Story extends Base{

    protected $hidden = ['listorder','uid','username','sysadd','hits','updatetime', 'inputtime','status'];
    

    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }
  
    public function getFileDomainAttr($value){
        return config('upload_file_domain');
    }
 

    public function getList($where){ 
        //查询符合条件的数据
        $data=$this
            ->with(['imageho'])
            ->where($where) 
            ->where('status',1) 
            ->order('listorder,id desc')
            ->hidden($this->hidden)
            ->append(['fileDomain'])
            ->select();  
        return $data;
    }

    public function getItem($where){  
      
        //查询符合条件的数据
        $data=$this
            ->field('resume')
            ->where($where) 
            ->where('status',1) 
            ->order('listorder,id desc')
            ->find();
           
        return $data;
    }
    
}
