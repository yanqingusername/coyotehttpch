<?php /*a:2:{s:72:"/Applications/phpstudy/coyotehttpch/application/cms/view/models/add.html";i:1596680032;s:76:"/Applications/phpstudy/coyotehttpch/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo config('web_mp_title'); ?></title>
    <meta name="author" content="YZNCMS">
    <link rel="stylesheet" href="/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css?t=1590715655">
    <link rel="stylesheet" href="/static/common/font/iconfont.css">
    <script src="/static/libs/layui/layui.js"></script>
    <script src="/static/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    //全局变量
    var GV = {
        'image_upload_url': '<?php echo !empty($image_upload_url) ? htmlentities($image_upload_url) :  url("attachment/upload/upload", ["dir" => "images", "module" => request()->module()]); ?>',
        'file_upload_url': '<?php echo !empty($file_upload_url) ? htmlentities($file_upload_url) :  url("attachment/upload/upload", ["dir" => "files", "module" => request()->module()]); ?>',
        'jcrop_upload_url': '<?php echo !empty($jcrop_upload_url) ? htmlentities($jcrop_upload_url) :  url("attachment/Attachments/cropper"); ?>',
        'WebUploader_swf': '/static/libs/webuploader/Uploader.swf',
        'ueditor_upload_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/upload/upload", ["dir" => "images","from"=>"ueditor", "module" => request()->module()]); ?>',
        'ueditor_grabimg_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/Attachments/geturlfile"); ?>',
        'image_select_url': '<?php echo !empty($image_select_url) ? htmlentities($image_select_url) :  url("attachment/Attachments/select"); ?>',
        'filter_word_url': '<?php echo !empty($filter_word_url) ? htmlentities($filter_word_url) :  url("admin/ajax/filterWord"); ?>',
    };
    </script>
</head>

<body class="childrenBody">
    
<div class="layui-card">
    <div class="layui-card-header">添加模型</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">模型名称</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" lay-verify="required" autocomplete="off" placeholder="模型名称" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">模型中文名称，用于添加栏目时选择使用。</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">模型表键名</label>
                <div class="layui-input-inline">
                    <input type="text" name="tablename" lay-verify="required" autocomplete="off" placeholder="模型表键名" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">由小写字母组成</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">模型类型</label>
                <div class="layui-input-inline">
                    <input type="radio" name="type" value="1" title="独立表" checked>
                    <input type="radio" name="type" value="2" title="主附表">
                </div>
                <div class="layui-form-mid layui-word-aux">主附表通过分表提高数据库操作效率</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">描述</label>
                <div class="layui-input-inline w300">
                    <textarea name="description" placeholder="模型的相关描述" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item web_list">
                <label class="layui-form-label">栏目模板</label>
                <div class="layui-input-inline w300">
                    <select name="setting[category_template]">
                        <option value="category.html" selected>默认栏目首页:category.html</option>
                        <?php if(is_array($tp_category) || $tp_category instanceof \think\Collection || $tp_category instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">新增模板以category_xx.html形式</div>
            </div>
            <div class="layui-form-item web_list">
                <label class="layui-form-label">列表模板</label>
                <div class="layui-input-inline w300">
                    <select name="setting[list_template]">
                        <option value="list.html" selected>默认栏目列表页:list.html</option>
                        <?php if(is_array($tp_list) || $tp_list instanceof \think\Collection || $tp_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">新增模板以list_xx.html形式</div>
            </div>
            <div class="layui-form-item web_list">
                <label class="layui-form-label">内容模板</label>
                <div class="layui-input-inline w300">
                    <select name="setting[show_template]">
                        <option value="show.html" selected>默认内容页:show.html</option>
                        <?php if(is_array($tp_show) || $tp_show instanceof \think\Collection || $tp_show instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">新增模板以show_xx.html形式</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-inline">
                    <input type="radio" name="status" value="1" title="正常" checked>
                    <input type="radio" name="status" value="0" title="禁止">
                </div>
            </div>
            <?php if(app('config')->get('app_debug')): ?>
            <div class="layui-form-item">
                <label class="layui-form-label">是否常用</label>
                <div class="layui-input-inline">
                    <input type="radio" name="is_const" value="0" title="非常" checked>
                    <input type="radio" name="is_const" value="1" title="常用" >
                </div>
            </div>
            <?php endif; ?>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="formSubmit">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>

    
    <script type="text/javascript">
    layui.config({
        version: '155714399886',
        base: '/static/libs/layui_exts/'
    }).extend({
        yzn: 'yzn/yzn',
        yznForm: 'yznForm/yznForm',
        yznTable: 'yznTable/yznTable',
        treeGrid: 'treeGrid/treeGrid',
        clipboard: 'clipboard/clipboard',
        notice: 'notice/notice',
        iconPicker: 'iconPicker/iconPicker',
        tableSelect: 'tableSelect/tableSelect',
        ztree: 'ztree/ztree',
        dragsort: 'dragsort/dragsort',
        tagsinput: 'tagsinput/tagsinput'
    }).use('yznForm');
    </script>
    
    
</body>

</html>