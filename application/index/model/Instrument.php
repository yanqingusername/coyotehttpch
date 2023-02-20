<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Instrument extends Model{
   
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind(['thumb_path'=>'path']);
    }

    public function imageho2(){
        return $this->hasOne('Attachment','id','banner_img')->bind(['banner_path'=>'path']);
    }

    public function imageho3(){
        return $this->hasOne('Attachment','id','index_img')->bind(['index_path'=>'path']);
    }

    public function imageho4(){
        return $this->hasOne('Attachment','id','banner_thumb')->bind(['banner_thumb_path'=>'path']);
    }

    public function imageho5(){
        return $this->hasOne('Attachment','id','param_thumb')->bind(['param_thumb_path'=>'path']);
    }

    
 
    
    /**
     * 获取列表或者详情
     */
    public function getList($where=[]){
        $data=$this
            ->with(['imageho'])
            ->where('status',1)
            ->where($where)
            ->limit(6)
            ->order('listorder,id')
            ->select();
        return $data;
    }

    /**
     * 获取列表或者详情
     */
    public function getAllList($where=[]){
        $data=$this
            ->with('imageho')
            ->field('id,title,thumb,content')
            ->where('status',1)
            ->where($where)
            ->order('listorder,id')
            ->select();
        return $data;
    }

    public function index()
    {
        $filter[]=['','exp',Db::raw('FIND_IN_SET(2,`flag`)')];
        $data=$this
            ->with(['imageho3'])
            ->field('id,title,index_img,remark')
            ->where('status',1)
            ->where($filter)
            ->order('listorder,id')
            ->find();
        return $data;
    }

     /**
     * 获取详情
     */
    public function getInfo($id){
        $data = $this->get($id,['imageho','imageho2','imageho4','imageho5']);
        if ($data) {
            $data = $data->toarray();
            $images = app('AttachmentModel')->where('id', 'in', $data['goods_files'])->column('id,path,name');  
            foreach (explode(',', $data['goods_files']) as $k => $v) {
                $images[$v] && $data['files_url'][] = $images[$v];
            }

            $data['recommend'] = (new static)->with('imageho')->where('id', 'in', $data['matchingreagent'])->where('status',1)->field('id,title,thumb')->select()->toarray();
            $data['parts'] = (new Parts)->with('imageho')->where('id', 'in', $data['parts'])->field('id,title,thumb,content')->select();  

            $data['tags'] = $data['tags'] == ''?[]: explode(',', $data['tags']);
            $data['tags2'] = $data['tags2'] == ''?[]: explode(',', $data['tags2']);
        } 
        return $data;
    }
}
