<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Mobilelab extends Model{
   
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind(['thumb_path'=>'path']);
    }

    public function imageho2(){
        return $this->hasOne('Attachment','id','mini_thumb')->bind(['mini_thumb_path'=>'path']);
    }

    public function imageho3(){
        return $this->hasOne('Attachment','id','recom_thumb')->bind(['recom_thumb_path'=>'path']);
    }


    public function imageho5(){
        return $this->hasOne('Attachment','id','param_thumb')->bind(['param_thumb_path'=>'path']);
    }
 
     /**
     * 获取推荐详情
     */
    public function getRecom(){
        $data = $this->field('id,recom_title,recom_thumb,recom_entitle,recom_content')->with(['imageho3'])->find();
        return $data;
    }
     

     /**
     * 获取详情
     */
    public function getInfo(){
        $data = $this->with(['imageho','imageho2','imageho5'])->find();
        if ($data) {
            $data = $data->toarray();
            $images = app('AttachmentModel')->where('id', 'in', $data['goods_files'])->column('id,path,name');  
            foreach (explode(',', $data['goods_files']) as $k => $v) {
                $images[$v] && $data['files_url'][] = $images[$v];
            }
            $data['recommend'] = (new Instrument)->with('imageho')->where('id', 'in', $data['goods'])->field('id,title,thumb')->order('listorder')->select()->toarray();
            $data['tags'] = $data['tags'] == ''?[]: explode(',', $data['tags']);
        }
        return $data;
    }
}
