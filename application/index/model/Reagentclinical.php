<?php
namespace app\index\model;
use think\Model;

class Reagentclinical extends Model{
   
    //图片
    public function imageho(){
        return $this->hasOne('Attachment','id','thumb')->bind(['thumb_path'=>'path']);
    }

    public function imageho2(){
        return $this->hasOne('Attachment','id','design')->bind(['design_path'=>'path']);
    }
 
    
    /**
     * 获取列表或者详情
     */
    public function getList($where=[]){
        $data=$this
            ->with(['imageho','imageho2'])
            ->where('status',1)
            ->where($where)
            ->order('listorder,id')
            ->select();
        return $data;
    }

    /**
     * 获取列表或者详情
     */
    public function getPageList($where=[]){
        $data=$this
            ->with('imageho')
            ->field('id,title,test_method,thumb')
            ->where('status',1)
            ->where($where)
            ->order('listorder,id')
            ->paginate(8, false, [
                'query' => request()->get()
            ]);
        return $data;
    }

     /**
     * 获取详情
     */
    public function getInfo($id){
        $data = $this->get($id,['imageho']);
        if ($data) {
            $data = $data->toarray();
            $images = app('AttachmentModel')->where('id', 'in', $data['goods_files'])->column('id,path,name');  
            foreach (explode(',', $data['goods_files']) as $k => $v) {
                $images[$v] && $data['files_url'][] = $images[$v];
            }
        
            $data['tags'] = $data['tags'] == ''?[]: explode(',', $data['tags']);
        }
        return $data;
    }
}
