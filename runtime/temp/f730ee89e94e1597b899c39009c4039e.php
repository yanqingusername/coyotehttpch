<?php /*a:2:{s:73:"/Applications/phpstudy/coyotehttpch/application/cms/view/field/index.html";i:1628735052;s:76:"/Applications/phpstudy/coyotehttpch/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    <div class="layui-card-header">字段列表</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
    </div>
</div>
<script type="text/html" id="switchTpl">
    {{#  if(d.iffixed==1){ }}
    {{#  if(d.status==1){ }}
    启用
    {{#  } else { }}
    禁用
    {{#  } }}
    {{#  } else { }}
    <input type="checkbox" name="status" data-href="<?php echo url('setstate'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
    {{#  } }}
</script>
<script type="text/html" id="listTpl">
    {{#  if(d.iffixed==1||(d.type!="text"&&d.type!="number")){ }}
    {{#  if(d.liststatus==1){ }}
    启用
    {{#  } else { }}
    禁用
    {{#  } }}
    {{#  } else { }}
    <input type="checkbox" name="liststatus" data-href="<?php echo url('setstatestatus'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="switchStatus" {{ d.liststatus==1 ? 'checked' : '' }}>
    {{#  } }}
</script>
<script type="text/html" id="ifsearchTpl">
    <input type="checkbox" name="ifsearch" data-href="<?php echo url('setSearch'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="switchStatus" {{ d.ifsearch==1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="ifrequireTpl">
    <input type="checkbox" name="ifrequire" data-href="<?php echo url('setRequire'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="switchStatus" {{ d.ifrequire==1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="isaddTpl">
    <input type="checkbox" name="isadd" data-href="<?php echo url('setVisible'); ?>?id={{d.id}}" value="{{d.id}}" lay-skin="switch" lay-text="显示|隐藏" lay-filter="switchStatus" {{ d.isadd==1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="barTool">
    {{#  if(!d.iffixed){ }}
    <a data-open='<?php echo url("edit"); ?>?fieldid={{ d.id }}' class="layui-btn layui-btn-xs">编辑</a>
    <a href='<?php echo url("del"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
    {{#  } }}
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
        add_url: "<?php echo url('add',['modelid'=>$modelid]); ?>",
        modify_url: '<?php echo url("listorder"); ?>',
    };

    table.render({
            init: init,
            id: 'currentTable',
            elem: '#currentTable',
            toolbar: ['refresh',
                [{
                    html: '<a class="layui-btn layui-btn-sm" type="button" href="<?php echo url("models/index"); ?>"><i class="iconfont icon-undo"></i>&nbsp;返回模型</a>'
                }],'add'
        ],
        url: '<?php echo url("index",["id"=>$modelid]); ?>',
        cols: [
            [
                { field: 'listorder', width: 60, title: '排序', edit: 'text' },
                { field: 'id', width: 60, title: 'ID' },
                { field: 'name',align: "left", title: '字段名称' },
                { field: 'title',align: "left", title: '标题' },
                { field: 'type', width: 120, title: '字段类型' },
                { field: 'ifsystem', width: 60, align: "center", title: '主表', templet: '<div>{{#  if(d.ifsystem){ }} 是 {{#  } }} </div>' },
                { field: 'create_time', width: 180, title: '创建时间' , search: 'range'},
                // { field: 'ifsearch', width: 90, align: "center", title: '搜索', templet: '#ifsearchTpl', unresize: true, selectList: { 0: '否', 1: '是' } },
                { field: 'ifrequire', width: 90, align: "center", title: '必填', templet: '#ifrequireTpl', unresize: true, selectList: { 0: '否', 1: '是' } },
                // { field: 'isadd', width: 100, align: "center", title: '投稿显示', templet: '#isaddTpl', unresize: true , selectList: { 0: '隐藏', 1: '显示' }},
                { field: 'status', width: 100, align: "center", title: '状态', templet: '#switchTpl', unresize: true, selectList: { 0: '禁用', 1: '启用' }},
                { field: 'liststatus', width: 100, align: "center", title: '列表显示', templet: '#listTpl', unresize: true, selectList: { 0: '禁用', 1: '启用' }},
                { fixed: 'right', width: 120, title: '操作', templet: '#barTool' }
            ]
        ],
        page: {}
    });
});
</script>

</body>

</html>