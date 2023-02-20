<?php
// +----------------------------------------------------------------------
// | Yzncms [ 御宅男工作室 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2018 http://yzncms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 御宅男 <530765310@qq.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | 用户自定义函数库
// +----------------------------------------------------------------------
function getSubs($categorys,$catId=0,$level=1){
    $subs=array();
    foreach($categorys as $item){
        if($item['parentid']==$catId){
            $item['level']=$level;
            $subs[]=$item;
            $subs=array_merge($subs,getSubs($categorys,$item['id'],$level+1));
        }

    }
    return $subs;
}
function getColumn($id){
    $res=Db::name('Category')->select();
    $list=getSubs($res,$id);
    return $list;
}
