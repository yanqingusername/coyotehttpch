<?php
namespace app\api\model;
use app\api\model\Base;
use think\facade\Cache;

class Category extends Base{
    
    public function image1()
    {
        return $this->hasOne('Attachment','id','image')->bind(['imagepath'  => 'path']);
    }
    public function image2()
    {
        return $this->hasOne('Attachment','id','imagem')->bind(['imagepathm'  => 'path']);
    }

    public function getFileDomainAttr($value){
        return config('upload_file_domain');
    }
    
    /**
     * 获取列表
     */
    public function getList($field,$where){
         
        $data=[];
        //查询符合条件的数据
        $data=self::field($field)->with(['image1','image2']) 
            ->where($where) 
            ->order('listorder')
            ->append(['fileDomain'])
            ->select();
        foreach ($data as $key => &$value) {
            if (isset($value['setting'])) {
                $value['setting'] = unserialize($value['setting']);
            }
        }
        return $data;
    }
}
