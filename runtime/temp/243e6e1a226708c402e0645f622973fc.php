<?php /*a:2:{s:80:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/cms/view/cms/recycle.html";i:1596677558;s:83:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    
<style type="text/css">
.childrenBody {
    background: #fff;
}
</style>
<div class="layui-form">
    <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
</div>
<script type="text/html" id="barTool">
    <a class="layui-btn layui-btn-xs" data-request="<?php echo url('restore'); ?>?catid={{d.catid}}&ids={{d.id}}">还原</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del" data-href="<?php echo url('destroy'); ?>?catid={{d.catid}}&ids={{d.id}}">销毁</a>
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
    };

    table.render({
        init: init,
        id: 'currentTable',
        elem: '#currentTable',
        url: "<?php echo url('recycle',['catid'=>$catid]); ?>",
        toolbar: ['refresh',
            [{
                html:'<a class="layui-btn layui-btn-sm" href="javascript:history.back(-1);"><i class="iconfont icon-undo"></i>&nbsp;返回</a>'
            }],
            [{
                html: '<a class="layui-btn layui-btn-sm confirm" data-href="<?php echo url("restore",["catid"=>$catid]); ?>" data-batch-all="currentTable">还原</a>',
            }],
            [{
                html: '<a class="layui-btn layui-btn-sm layui-btn-danger confirm" data-href="<?php echo url("destroy",["catid"=>$catid]); ?>" data-batch-all="currentTable">销毁</a>',
            }],
        ],
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'id', width: 70, title: 'ID' },
                { field: 'title', align: "left", title: '标题', templet: '#title' },
                { field: 'updatetime', width: 180, title: '更新时间' },
                { fixed: 'right', width: 150, title: '操作', toolbar: '#barTool' }
            ]
        ],
    });


});
</script>

</body>

</html>