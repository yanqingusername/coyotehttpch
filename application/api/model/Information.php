<?php
namespace app\api\model;
use app\api\model\Base;
use think\facade\Cache;

class Information extends Base{

    protected $hidden = ['thumb','listorder','uid','username','sysadd','hits','updatetime','status'];
    

    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }
  
    public function getFileDomainAttr($value){
        return config('upload_file_domain');
    }

    public function getContentAttr($value)
    {
        return htmlspecialchars_decode($value);
    }

    public function getInputtimeAttr($value)
    {
        return date('Y-m-d H:i',$value);
    }
 

    public function getList(){ 
        //查询符合条件的数据
        $data=$this
            ->with(['imageho'])
            ->where('status',1) 
            ->order('listorder,id desc')
            ->hidden(array_merge(['content','description','keywords'],$this->hidden))
            ->append(['fileDomain'])
            ->paginate(9, false, [
                'query' => request()->request()
            ]);  
        return $data;
    }

    public function getItem($id){  
      
        //查询符合条件的数据
        $data=$this
            ->where('status',1) 
            ->where('id',$id) 
            ->hidden(array_merge(['resume'],$this->hidden))
            ->find();
           
        return $data;
    }
    
}
