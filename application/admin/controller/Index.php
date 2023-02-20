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
// | 后台首页
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\model\AdminUser;
use app\admin\service\User;
use app\common\controller\Adminbase;
use think\facade\Cache;
use app\cms\model\Models as ModelsModel;
use app\cms\model\ModelField as ModelFieldModel;
class Index extends Adminbase
{
    protected $noNeedLogin = [
        'admin/index/login',
        'admin/index/logout',
    ];
    protected $noNeedRight = [
        'admin/index/index',
        'admin/index/cache',
    ];
    protected function initialize()
    {
        parent::initialize();
        $this->modelClass = new ModelsModel;
    }
    //后台首页
    public function index()
    {
        $this->assign('userInfo', $this->_userinfo);
        $this->assign("SUBMENU_CONFIG", json_encode(model("admin/Menu")->getMenuList()));
        return $this->fetch();
    }

    //登录判断
    public function login()
    {
        if (User::instance()->isLogin()) {
            $this->redirect('admin/index/index');
        }
        if ($this->request->isPost()) {
            $data = $this->request->post();
            //验证码
            if (!captcha_check($data['verify'])) {
                $this->error('验证码输入错误！');
                return false;
            }
            // 验证数据
            $rule = [
                'username|用户名' => 'require|alphaDash|length:3,20',
                'password|密码' => 'require|length:3,20',
            ];
            $result = $this->validate($data, $rule);
            if (true !== $result) {
                $this->error($result);
            }
            $AdminUser = new AdminUser;
            if ($AdminUser->login($data['username'], $data['password'])) {
                $this->success('恭喜您，登陆成功', url('admin/Index/index'));
            } else {
                $this->error("用户名或者密码错误，登陆失败！", url('admin/index/login'));
            }

        } else {
            return $this->fetch();
        }

    }

    //手动退出登录
    public function logout()
    {
        if (User::instance()->logout()) {
            //手动登出时，清空forward
            //cookie("forward", NULL);
            $this->success('注销成功！', url("admin/index/login"));
        }
    }

    //缓存更新
    public function cache()
    {
        $type = $this->request->request("type");
        switch ($type) {
            case 'data' || 'all':
                \util\File::del_dir(ROOT_PATH . 'runtime' . DIRECTORY_SEPARATOR . 'cache');
                Cache::clear();
                if ($type == 'content') {
                    break;
                }

            case 'template' || 'all':
                \util\File::del_dir(ROOT_PATH . 'runtime' . DIRECTORY_SEPARATOR . 'temp');
                if ($type == 'template') {
                    break;
                }
        }
        $this->success('清理缓存');
    }
    //清理数据
    public function data()
    {
        $type = $this->request->request("type");
        if($type=="all"){//清理栏目 模型
            $data= $this->modelClass->where(['module' => 'cms','is_const' => '0'])->select()->toArray();
            if(count($data)){
                foreach ($data as $k=>$v){
                    $table_name=config("database.prefix").$v['tablename'];
                    $sql="DROP TABLE IF EXISTS  $table_name ;";
                    \think\Db::execute($sql);
                    $table_name=config("database.prefix").$v['tablename'].'_data';
                    $sql="DROP TABLE IF EXISTS  $table_name ;";
                    \think\Db::execute($sql);
                    ModelFieldModel::where(['modelid'=>$v['id']])->delete();
                    $this->modelClass->where(['id' => $v['id']])->delete();
                }
            }
            $table_name=config("database.prefix").'category';
            $sql="TRUNCATE TABLE $table_name;";
            \think\Db::execute($sql);

            $table_name=config("database.prefix").'category_priv';
            $sql="TRUNCATE TABLE $table_name;";
            \think\Db::execute($sql);

            Cache::clear();
            \util\File::del_dir(ROOT_PATH . 'runtime' . DIRECTORY_SEPARATOR . 'temp');
        }

        $this->success('清理数据');
    }
}
