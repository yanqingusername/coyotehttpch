<?php /*a:2:{s:83:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/cms/view/category/index.html";i:1649646477;s:83:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    <div class="layui-card-header">栏目管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <blockquote class="layui-elem-quote">添加、修改和删除栏目全部完成后，请点击【更新栏目缓存】！</blockquote>
            <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
        </div>
    </div>
</div>
<script type="text/html" id="barTool">
    <!-- <a data-open="{{d.add_url}}" data-full="true" class="layui-btn layui-btn-xs layui-btn-normal">添加子栏目</a> -->
    <a data-open='<?php echo url("edit"); ?>?id={{ d.id }}' data-full="true" class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("del"); ?>?ids={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" data-href="<?php echo url('multi'); ?>?id={{d.id}}&param=status" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
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
        delete_url: "<?php echo url('del'); ?>",
        modify_url: '<?php echo url("multi"); ?>',
    };

    table.render({
        init: init,
        id: 'currentTable',
        elem: '#currentTable',
        toolbar: ['refresh',
            [{
                    text: '新增栏目',
                    url: "<?php echo url('add'); ?>",
                    method: 'open',
                    class: 'layui-btn layui-btn-sm',
                    icon: '',
                    extend: 'data-full="true"',
                },
                {
                    text: '新增单页',
                    url: "<?php echo url('singlepage'); ?>",
                    method: 'open',
                    class: 'layui-btn layui-btn-sm',
                    icon: '',
                    extend: 'data-full="true"',
                },
                {
                    text: '栏目数据校正',
                    url: "<?php echo url('count_items'); ?>",
                    method: 'request',
                    class: 'layui-btn layui-btn-sm layui-btn-normal',
                    extend: 'data-table="currentTable"',
                }
            ], 'delete', [{
                text: "更新栏目缓存",
                url: "<?php echo url('public_cache'); ?>",
                method: 'request',
                class: 'layui-btn layui-btn-sm layui-btn-danger',
                extend: 'data-table="currentTable"',
            }]
        ],
        url: '<?php echo url("index"); ?>',
        search:false,
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
                { field: 'id', width: 70, title: 'ID' },
                { field: 'catname',align: "left", title: '栏目名称' },
                { field: 'items', width: 80, title: '数据量' },
                { field: 'catdir', width: 120, title: '唯一标识' },
                { field: 'type',width: 100, title: '栏目类型',templet: '<div>{{#  if(d.type==1){ }} 单页 {{#  } else if(d.type==2){  }} 列表 {{#  } else if(d.type==3){ }} 链接 {{#  } else { }} 未知 {{#  } }}</div>' },
                { field: 'modelname', width: 120, title: '所属模型' },
                // { field: 'url', width: 60, align: "center", title: 'URL', templet: table.url },
                { field: 'status', width: 100, align: "center", title: '状态', templet: '#statusTpl', unresize: true },
                { fixed: 'right', width: 200, title: '操作', toolbar: '#barTool' }
            ]
        ],
    });
});
</script>

</body>

</html>