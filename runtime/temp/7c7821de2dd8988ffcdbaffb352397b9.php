<?php /*a:2:{s:81:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/cms/view/models/index.html";i:1596680032;s:83:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    <div class="layui-card-header">模型列表</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
    </div>
</div>
<script type="text/html" id="barTool">
	<a href='<?php echo url("field/index"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs layui-btn-normal">字段管理</a>
    <a data-open='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("del"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" data-href="<?php echo url('multi'); ?>?id={{d.id}}&param=status" value="{{d.id}}" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="constTpl">
    <input type="checkbox" name="is_const" data-href="<?php echo url('multi'); ?>?id={{d.id}}&param=is_const" value="{{d.id}}" lay-skin="switch" lay-text="开启|关闭" lay-filter="switchStatus" {{ d.is_const==1 ? 'checked' : '' }}>
</script>

    
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
    
    
<script>
layui.use('yznTable', function() {
    var table = layui.yznTable;

    var init = {
        table_elem: '#currentTable',
        add_url: "<?php echo url('add'); ?>",
    };

    table.render({
        init: init,
        id: 'currentTable',
        elem: '#currentTable',
        toolbar: ['refresh', 'add'],
        url: '<?php echo url("index"); ?>',
        search:false,
        cols: [
            [
                { field: 'id', width: 100, title: '模型ID' },
                { field: 'name', width: 120, title: '模型名称' },
                { field: 'tablename', width:120,title: '数据表' },
                { field: 'description', align: "left", title: '描述' },
                { field: 'type', width:120,title: '类型',templet: '<div>{{#  if(d.type==1){ }} 独立表 {{#  } else { }} 主附表 {{#  } }} </div>' },
                { field: 'create_time',width:180, title: '创建时间' },
                { field: 'status', width: 100, title: '状态', templet: '#statusTpl', unresize: true },
                <?php if(app('config')->get('app_debug')): ?>
                { field: 'is_const', width: 100, title: '常用', templet: '#constTpl', unresize: true },
    <?php endif; ?>

                { fixed: 'right', title: '操作', width: 200, templet: '#barTool' }
            ]
        ]
    });
});
</script>

</body>

</html>