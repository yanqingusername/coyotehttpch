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
// | 栏目管理
// +----------------------------------------------------------------------
namespace app\cms\controller;

use app\cms\model\Discrist as Category_Model;
use app\common\controller\Adminbase;
use think\Db;

class City extends Adminbase
{

    //初始化
    protected function initialize()
    {
        parent::initialize();
        $this->Category_Model = new Category_Model;
        //取得当前内容模型模板存放目录
        $this->filepath = TEMPLATE_PATH . (empty(config('theme')) ? "default" : config('theme')) . DIRECTORY_SEPARATOR . "cms" . DIRECTORY_SEPARATOR;
        //取得栏目频道模板列表
        $this->tp_category = str_replace($this->filepath . DIRECTORY_SEPARATOR, '', glob($this->filepath . DIRECTORY_SEPARATOR . 'category*'));
        //取得栏目列表模板列表
        $this->tp_list = str_replace($this->filepath . DIRECTORY_SEPARATOR, '', glob($this->filepath . DIRECTORY_SEPARATOR . 'list*'));
        //取得内容页模板列表
        $this->tp_show = str_replace($this->filepath . DIRECTORY_SEPARATOR, '', glob($this->filepath . DIRECTORY_SEPARATOR . 'show*'));
        //取得单页模板
        $this->tp_page = str_replace($this->filepath . DIRECTORY_SEPARATOR, '', glob($this->filepath . DIRECTORY_SEPARATOR . 'page*'));
    }

    //栏目列表
    public function index()
    {
        $pid = request()->param('pid');

        if(!empty($pid)){
            //更新下级
            $one = Db::name('discrist')
                ->where(['id'=>$pid])
                ->find();
            $level = (int)$one['level'] + 1;    
            $this->assign('level',$level);
            $this->assign('parentid',$one['parentid']);
            Db::name('discrist')->where(['parentid'=>$one['id']])->update(['level'=>$level]);
        }
            
            
        if ($this->request->isAjax()) {
            $models = cache('Model');
            $tree = new \util\Tree();
            $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
            $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $categorys = array();
      
            $result = Db::name('discrist')
                ->where(['id'=>$pid])
                ->whereOr(['parentid'=>$pid])
                ->order(array('listorder', 'id' => 'ASC'))
                ->select();
            
            foreach ($result as $k => $v) {
                if (isset($models[$v['modelid']]['name'])) {
                    $v['modelname'] = $models[$v['modelid']]['name'];
                } else {
                    $v['modelname'] = '/';
                }
                if ($v['type'] == 1) {
                    $v['add_url'] = url("City/singlepage", array("parentid" => $v['id']));
                } elseif ($v['type'] == 2) {
                    $v['add_url'] = url("City/add", array("parentid" => $v['id']));
                } elseif ($v['type'] == 3) {
                    $v['add_url'] = url("City/wadd", array("parentid" => $v['id']));
                }
                $v['url'] = Category_Model::buildCatUrl($v['type'], $v['id'], $v['url']);

                $categorys[$v['id']] = $v;
            }
            
            $tree->init($categorys);
            $_list = $tree->getTreeList($tree->getTreeArray($pid), 'catname');
            
            $total = count($_list);
            $result = array("code" => 0, "count" => $total, "data" => $_list);
            return json($result);
        }
        $this->assign('pid',$pid);
        return $this->fetch();
    }

    //新增栏目
    public function add()
    {
        if ($this->request->isPost()) {
            $data = $this->request->post();
            if (empty($data)) {
                $this->error = '添加栏目数据不能为空！';
                return false;
            }
            switch ($data['type']) {
                //单页
                case 1:
                    $fields = ['parentid', 'catname', 'catdir', 'type', 'image', 'description', 'setting', 'listorder', 'letter', 'status'];
                    $scene = 'page';
                    break;
                //列表
                case 2:
                    $fields = ['parentid', 'catname', 'catdir', 'type', 'modelid', 'image', 'description', 'setting', 'listorder', 'letter', 'status','link','imagem','imagecat','imageico'];
                    $scene = 'list';
                    break;
                //链接
                case 3:
                    $fields = ['parentid', 'catname', 'catdir', 'type', 'image', 'description', 'url', 'setting', 'listorder', 'letter', 'status'];
                    $scene = 'link';
                    break;
                default:
                    return $this->error('栏目类型错误~');
            }
            if ($data['isbatch']) {
                unset($data['isbatch'], $data['info']['catname'], $data['info']['catdir']);
                //需要批量添加的栏目
                $batch_add = explode(PHP_EOL, $data['batch_add']);
                if (empty($batch_add) || empty($data['batch_add'])) {
                    $this->error('请填写需要添加的栏目！');
                }
                foreach ($batch_add as $rs) {
                    $cat = explode('|', $rs, 2);
                    //if ($cat[0] && $cat[1]) {
                    $data['catname'] = $cat[0];
                    $data['catdir'] = isset($cat[1]) ? $cat[1] : '';
                    $data['catdir'] = $this->get_dirpinyin($data['catname'], $data['catdir']);

                    $result = $this->validate($data, 'Category.' . $scene);
                    if (true !== $result) {
                        return $this->error($result);
                    }
                    $catid = $this->Category_Model->addCategory($data, $fields);
                    if ($catid) {
                        if (isModuleInstall('member')) {
                            //更新会员组权限
                            model("cms/CategoryPriv")->update_priv($catid, $data['priv_groupid'], 0);
                        }
                    }
                    //}

                }
                $this->success("添加成功！", url("city/index",['menuid'=>129,'pid'=>$data['parentid']]));
            } else {
                $data['catdir'] = $this->get_dirpinyin($data['catname'], $data['catdir']);

                $status = $this->Category_Model->addCategory($data, $fields);
                if ($status) {
                    if (isModuleInstall('member')) {
                        model("cms/CategoryPriv")->update_priv($catid, $data['priv_groupid'], 0);
                    }
                    $this->success("添加成功！", url("City/index",['menuid'=>129,'pid'=>$data['parentid']]));
                } else {
                    $error = $this->Category_Model->getError();
                    $this->error($error ? $error : '栏目添加失败！');
                }
            }

        } else {
            $parentid = $this->request->param('parentid/d', 0);
            /*if (!empty($parentid)) {
                $Ca = getCategory($parentid);
                if (empty($Ca)) {
                    $this->error("父栏目不存在！");
                }
            }*/
            //输出可用模型
            /*$modelsdata = cache("Model");
            $models = array();
            foreach ($modelsdata as $v) {
                if ($v['status'] == 1 && $v['module'] == 'cms') {
                    $models[] = $v;
                }
            }*/

            $array = Db::name('discrist')
                ->where(['id'=>$parentid])
                ->find();
                
            $this->assign('parentid',$parentid);    

            $area_id=$array['id'];
            $area_name=$array['catname'];
            $categorydata = "<option value="."$area_id"." selected>$area_name</option>";
            $this->assign("tp_category", $this->tp_category);
            $this->assign("tp_list", $this->tp_list);
            $this->assign("tp_show", $this->tp_show);
            $this->assign("tp_page", $this->tp_page);

            $this->assign('parentid_modelid', isset($Ca['modelid']) ? $Ca['modelid'] : 0);
            if (isModuleInstall('member')) {
                //会员组
                $this->assign("Member_Group", cache("Member_Group"));
            }
            
            $this->assign("category", $categorydata);
            $this->assign("models", $models);
            return $this->fetch();

        }

    }

    //添加外部链接栏目
    public function wadd()
    {
        return $this->add();
    }

    //添加单页
    public function singlepage()
    {
        return $this->add();
    }

    //编辑栏目
    public function edit()
    {
        if ($this->request->isPost()) {
            $catid = $this->request->param('id/d', 0);
            if (empty($catid)) {
                $this->error('请选择需要修改的栏目！');
            }
            $data = $this->request->post();
            //上级栏目不能是自身
            if ($data['parentid'] == $catid) {
                $this->error('上级栏目不能是自身！');
            }
            switch ($data['type']) {
                //单页
                case 1:
                    $data['modelid'] = 0;
                    $data['url'] = '';
                    $scene = 'page';
                    break;
                //列表
                case 2:
                    $data['url'] = '';
                    $scene = 'list';
                    break;
                //链接
                case 3:
                    $data['modelid'] = 0;
                    $scene = 'link';
                    break;
                default:
                    return $this->error('栏目类型错误~');
            }
            $data['catdir'] = $this->get_dirpinyin($data['catname'], $data['catdir'], $catid);
            $result = $this->validate($data, 'City.' . $scene);
            if (true !== $result) {
                return $this->error($result);
            }
            $status = $this->Category_Model->editCategory($data, ['parentid', 'catname', 'catdir', 'type', 'modelid', 'image', 'description', 'url', 'setting', 'listorder', 'letter', 'status','link','imagem','imagecat','imageico']);
            if ($status) {
                if (isModuleInstall('member')) {
                    //更新会员组权限
                    model("cms/CategoryPriv")->update_priv($catid, $data['priv_groupid'], 0);
                }
                $this->success("修改成功！", url("City/index",['menuid'=>129,'pid'=>$data['parentid']]));
            } else {
                $error = $this->Category_Model->getError();
                $this->error($error ? $error : '栏目修改失败！');
            }

        } else {
            $catid = $this->request->param('id/d', 0);
            if (empty($catid)) {
                $this->error('请选择需要修改的栏目！');
            }
            $data = Db::name('discrist')->where(['id' => $catid])->find();
            $setting = unserialize($data['setting']);

            //输出可用模型
            $modelsdata = cache("Model");
            $models = array();
            foreach ($modelsdata as $v) {
                if ($v['status'] == 1 && $v['module'] == 'cms') {
                    $models[] = $v;
                }
            }

            //栏目列表 可以用缓存的方式
            /*$array = cache("City");
            foreach ($array as $k => $v) {
                $array[$k] = getCategory($v['id']);
            }*/
            
            $this->assign('parentid',$data['parentid']);

            if ($data['level']==0) {
                $array = Db::name('discrist')
                    ->where(['level'=>0])
                    ->select();
            }else{
                $res1 = Db::name('discrist')
                    ->where(['id'=>$data['parentid']])
                    ->find();
                $array = Db::name('discrist')
                    ->where(['parentid'=>$res1['parentid']])
                    ->select();
            }

            $categorydata="";
            foreach ($array as $k=>$v){
                $area_id=$v['id'];
                $area_name=$v['catname'];
                $selected=$v['id']==$data['parentid']?'selected':"";
                if (!empty($selected)) {
                    $a=1;
                }
                $categorydata.= "<option value="."$area_id"." $selected>$area_name</option>";
            }


            $this->assign("tp_category", $this->tp_category);
            $this->assign("tp_list", $this->tp_list);
            $this->assign("tp_show", $this->tp_show);
            $this->assign("tp_page", $this->tp_page);

            $this->assign("data", $data);
            $this->assign("setting", $setting);
            $this->assign("category", $categorydata);
           // $this->assign("city", $categorydata);
            $this->assign("models", $models);
            if (isModuleInstall('member')) {
                //会员组
                $this->assign("Member_Group", cache("Member_Group"));
            }
            //权限数据
            $this->assign("privs", model("cms/CategoryPriv")->where(array('catid' => $catid))->select());
            if ($data['type'] == 1) {
                //单页栏目
                return $this->fetch("singlepage_edit");
            } else if ($data['type'] == 2) {
                //外部栏目
                return $this->fetch();
            } else {
                return $this->fetch("wedit");
            }
        }

    }

    //删除栏目
    public function delete()
    {
        $catid = $this->request->param('id/d');
        if (!$catid) {
            $this->error("请指定需要删除的栏目！");
        }
        //这里需增加栏目条数item直接判断
        if (false == $this->Category_Model->deleteCatid($catid)) {
            $this->error("栏目含有信息，无法删除！");
        }
        //$this->cache();
        $this->success("栏目删除成功！", url('cms/city/public_cache'));
    }

    //更新栏目缓存并修复
    public function public_cache()
    {
        $this->repair();
        $this->cache();
        $this->success("更新缓存成功！", Url("cms/city/index"));

    }

    /**
     * 清除栏目缓存
     */
    protected function cache()
    {
        cache('city', null);
    }

    /**
     * 修复栏目数据
     */
    private function repair()
    {
        $this->categorys = $categorys = array();
        //取出需要处理的栏目数据
        $data = Db::name('discrist')->order('listorder ASC, id ASC')->select();
        if (empty($data)) {
            return true;
        }
        foreach ($data as $v) {
            $categorys[$v['id']] = $v;
        }
        $this->categorys = $categorys;
        if (is_array($categorys)) {
            foreach ($categorys as $catid => $cat) {
                //获取父栏目ID列表
                $arrparentid = $this->Category_Model->get_arrparentid($catid);
                //栏目配置信息反序列化
                $setting = unserialize($cat['setting']);
                //获取子栏目ID列表
                $arrchildid = $this->Category_Model->get_arrchildid($catid);
                $child = is_numeric($arrchildid) ? 0 : 1; //是否有子栏目
                //检查所有父id 子栏目id 等相关数据是否正确，不正确更新
                if ($categorys[$catid]['arrparentid'] != $arrparentid || $categorys[$catid]['arrchildid'] != $arrchildid || $categorys[$catid]['child'] != $child) {
                    Category_Model::update(['arrparentid' => $arrparentid, 'arrchildid' => $arrchildid, 'child' => $child], ['id' => $catid], true);
                }
                getCategory($catid, '', true);
                //删除在非正常显示的栏目
                if ($cat['parentid'] != 0 && !isset($this->categorys[$cat['parentid']])) {
                    $this->Category_Model->deleteCatid($catid);
                }
            }

        }
        return true;
    }

    /**
     * 排序
     */
    public function listorder()
    {
        $id = $this->request->param('id/d', 0);
        $listorder = $this->request->param('value/d', 0);
        $rs = Category_Model::update(['listorder' => $listorder], ['id' => $id], true);
        if ($rs) {
            $this->success("排序成功！");
        } else {
            $this->error("排序失败！");
        }
    }

    /**
     * 状态
     */
    public function setstate()
    {
        $id = $this->request->param('id/d');
        empty($id) && $this->error('参数不能为空！');
        $status = $this->request->param('status/d');
        if (Category_Model::update(['status' => $status], ['id' => $id])) {
            //更新栏目缓存
            cache('City', null);
            getCategory($id, '', true);
            $this->success('操作成功！');
        } else {
            $this->error('操作失败！');
        }
    }

    /**
     * 获取栏目的拼音
     */
    private function get_dirpinyin($catname = '', $catdir = '', $id = 0)
    {
        $pinyin = new \Overtrue\Pinyin\Pinyin('Overtrue\Pinyin\MemoryFileDictLoader');
        if (empty($catdir)) {
            $catdir = $pinyin->permalink($catname, '');
        }
        if (strval(intval($catdir)) == strval($catdir)) {
            $catdir .= genRandomString(3);
        }
        $map = [
            ['catdir', '=', $catdir],
        ];
        if (intval($id) > 0) {
            $map[] = ['id', '<>', $id];
        }
        $result = Db::name('discrist')->field('id')->where($map)->find();
        if (!empty($result)) {
            $nowDirname = $catdir . genRandomString(3);
            return $this->get_dirpinyin($catname, $nowDirname, $id);
        }
        return $catdir;
    }

}
