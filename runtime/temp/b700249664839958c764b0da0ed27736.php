<?php /*a:2:{s:86:"/Applications/phpstudy/coyotehttpch/application/attachment/view/attachments/index.html";i:1629798538;s:76:"/Applications/phpstudy/coyotehttpch/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    <div class="layui-card-header">附件管理</div>
    <div class="layui-card-body">
         <div class="layui-form-field-label">
            <div class="js-upload-image">
                <script type="text/javascript"  src="/static/libs/webuploader/webuploader.min.js"></script>
                <link rel="stylesheet" href="/static/libs/webuploader/webuploader.css">
                <script type="text/javascript"  src="/static/admin/js/form.js"></script>
                <input type='hidden' name='image' data-multiple='false' data-watermark='0' data-thumb='' data-size='0' data-ext='jpg|jpeg|gif|bmp|png' id='image' value=''>
                <div class='layui-clear'></div>
                <div id='picker_image'><i class='layui-icon layui-icon-upload'></i> 上传单张图片</div> 
            </div>
        </div>
        <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
        <script type="text/html" id="barTool">
            <a href='<?php echo url("del"); ?>?ids={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
        </script>
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
    
    
<script>
layui.use(['yznTable','table'], function() {
    var table = layui.yznTable;
    var ltable = layui.table;

    var init = {
        table_elem: '#currentTable',
        delete_url: '<?php echo url("del"); ?>',
    };

    $('#image').on('change',function() {
        ltable.reload('dataTable');
    })
 

    table.render({
        init: init,
        id: 'dataTable',
        toolbar: ['refresh','delete'],
        elem: '#dataTable',
        url: '<?php echo url("index"); ?>',
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'id', width: 80, title: 'ID', sort: true },
                { field: 'aid', width: 80, title: '用户ID' },
                { field: 'name', title: '名称' },
                { field: 'path', width: 100, title: '图片', search: false, templet: table.image },
                { field: 'path', width: 450, align: "center", title: '物理路径', templet: '<div><a class="layui-btn layui-btn layui-btn-xs" href="{{d.path}}" target="_blank">{{d.path}}</a></div>' },
                { field: 'size', width: 100, title: '大小', sort: true },
                { field: 'ext', width: 100, title: '类型' },
                { field: 'mime', width: 120, title: 'Mime类型' },
                { field: 'driver', width: 100, title: '存储引擎' },
                { field: 'create_time', width: 180, title: '上传时间', search: 'range' },
                { fixed: 'right', width: 70, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: {}
    });
});
</script>

</body>

</html>