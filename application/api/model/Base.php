<?php

namespace app\api\model;
use think\Model;
use think\facade\Config;

class Base extends Model{
    
    protected $imgUrl='http://douji.code.zhongwangyingtong.com/uploads/';
    protected $ebookUrl='http://douji.code.zhongwangyingtong.com/';
    protected static function init(){
        //TODO:初始化内容
    }

    public function mediaHandle(){

    }
    
}