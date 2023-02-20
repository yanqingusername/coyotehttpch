<?php
namespace app\api\model;
use app\api\model\Base;
use think\facade\Cache;

class Index extends Base{

    protected $hidden = ['thumb','listorder','uid','username','sysadd','hits','inputtime','updatetime','status'];
    

    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }
    //图片
    public function imageho2(){
        return $this->hasOne('Attachment','id','thumb2')->bind(['path2'  => 'path']);
    }
  
    public function getFileDomainAttr($value){
        return config('upload_file_domain');
    }

    // public function getContentAttr($value)
    // {
    //     return htmlspecialchars_decode($value);
    // }



    /**
     * 获取列表或者详情
     */
    public function getList($where){
         
        $data=[];
        //查询符合条件的数据
        $data=self::with(['imageho','imageho2']) 
            ->where($where) 
            ->order('listorder')
            ->append(['fileDomain'])
            ->select();
     
        return $data;
    }
    
}
