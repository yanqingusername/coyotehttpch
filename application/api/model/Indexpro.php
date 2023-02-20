<?php
namespace app\api\model;
use app\api\model\Base;
use think\facade\Cache;

class Indexpro extends Base{

    protected $hidden = ['listorder','uid','username','sysadd','hits','inputtime','updatetime','status'];
    

    //图片中
    public function imagez(){
        return $this->hasOne('Attachment','id','thumb')->bind(['imagepath_z'  => 'path']);
    }
    public function imagel(){
        return $this->hasOne('Attachment','id','leftthumb')->bind(['imagepath_l'  => 'path']);
    }
    public function imager(){
        return $this->hasOne('Attachment','id','rightthumb')->bind(['imagepath_r'  => 'path']);
    }
    public function imagelogo(){
        return $this->hasOne('Attachment','id','logo')->bind(['imagepath_logo'  => 'path']);
    }
  
    public function getFileDomainAttr($value){
        return config('upload_file_domain');
    }
 

    /**
     * 获取列表或者详情
     */
    public function getList(){
          
        //查询符合条件的数据
        $data=self::with(['imagez','imagel','imager','imagelogo']) 
            ->where('status',1) 
            ->order('listorder')
            ->append(['fileDomain'])
            ->select();
     
        return $data;
    }
    
}
