<?php
namespace app\index\model;
use think\Model;
use think\facade\Cache;

class News extends Model{
    protected $table = 'yzn_information';
    protected $hidden = ['listorder','uid','username','sysadd','hits','updatetime','status'];
   
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind('path');
    }

    public function cate(){
        return $this->hasOne('app\api\model\Category','id','catid')->bind('catname');
    }
 
 
    /**
     * 获取列表或者详情
     */
    public function getInfo($id){
        //查询符合条件的数据
        $data=$this->get($id,['cate']);
        return $data;
    }


    public function index($where)
    {
        $data=$this
            ->with(['imageho'])
            ->where('status',1) 
            ->where($where) 
            ->order('listorder,id desc')
            ->field(array_merge(['content','description','keywords'],$this->hidden),true)
            ->limit(3)
            ->select();  
        return $data;
    }
 
    /**
     * 获取列表或者详情
     */
    public function getList($where){
        $data=$this
            ->with(['imageho'])
            ->where('status',1) 
            ->where($where) 
            ->order('listorder,id desc')
            ->hidden(array_merge(['content','description','keywords'],$this->hidden))
            ->paginate(9, false, [
                'query' => request()->request()
            ]);  
        return $data;
    }
}
