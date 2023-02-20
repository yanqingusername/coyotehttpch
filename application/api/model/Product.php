<?php
namespace app\api\model;
use app\api\model\Base;
use think\facade\Cache;

class Product extends Base{
 
    protected $hidden = ['catid','keywords','description','listorder','uid','username','sysadd','hits','updatetime', 'inputtime','status'];

    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }


    public function info1picho(){
        return $this->hasOne('Attachment','id','info1pic')->bind(['info1pic_path'  => 'path']);
    }

    public function info2picho(){
        return $this->hasOne('Attachment','id','info2pic')->bind(['info2pic_path'  => 'path']);
    }

    public function info3picho(){
        return $this->hasOne('Attachment','id','info3pic')->bind(['info3pic_path'  => 'path']);
    }


    public function info1bgho(){
        return $this->hasOne('Attachment','id','info1bg')->bind(['info1bg_path'  => 'path']);
    }

    public function info2bgho(){
        return $this->hasOne('Attachment','id','info2bg')->bind(['info2bg_path'  => 'path']);
    }

    public function info3bgho(){
        return $this->hasOne('Attachment','id','info3bg')->bind(['info3bg_path'  => 'path']);
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
            ->hidden(array_merge($this->hidden,['info1pic','info1title','info1subtitle','info1content','info2pic','info2title','info2subtitle','info2content','info3pic','info3title','info3subtitle','info3content','info1bg','info2bg','info3bg'])) 
            ->append(['fileDomain'])
            ->select();  
        return $data;
    }

    public function getTitle($where){ 
        //查询符合条件的数据
        $data=$this
            ->field('id,title')
            ->where($where) 
            ->where('status',1) 
            ->order('listorder,id desc')  
            ->select();  
        return $data;
    }

    public function getInfo($id)
    {
        $data=$this
            ->with(['info1picho','info2picho','info3picho','info1bgho','info2bgho','info3bgho'])
            ->field('id,info1pic,info1title,info1subtitle,info1content,info2pic,info2title,info2subtitle,info2content,info3pic,info3title,info3subtitle,info3content,info1bg,info2bg,info3bg')
            ->where('id',$id) 
            ->where('status',1) 
            ->append(['fileDomain'])
            ->find();  
        return $data;
    }
}
