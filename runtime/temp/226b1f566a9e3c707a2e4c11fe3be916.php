<?php /*a:2:{s:71:"/Applications/phpstudy/coyotehttpch/application/cms/view/cms/index.html";i:1596677558;s:76:"/Applications/phpstudy/coyotehttpch/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    
<div class="layui-row">
    <div class="layui-col-md2 layui-col-sm12" style="padding:0 10px;">
        <div class="layui-card">
            <div class="layui-card-header">栏目列表</div>
            <div class="layui-card-body">
                <iframe name="left" id="iframe_categorys" src="<?php echo url('cms/cms/public_categorys'); ?>" style="height: 100%; width: 100%;"  frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
    </div>
    <div class="layui-col-md10 layui-col-sm12" style="padding:0 10px;">
        <div class="layui-card">
            <div class="layui-card-header">内容管理</div>
            <div class="layui-card-body">
                <iframe name="right" id="iframe_categorys_list" src="<?php echo url('cms/cms/panl'); ?>"   style="height: 100%; width:100%;border:none;" frameborder="0" scrolling="auto"></iframe>
            </div>
        </div>
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
    
    
<script type="text/javascript">
var B_frame_height = parent.layui.$(".iframe_box").height()-100;
console.log(parent.layui.$(".iframe_box").height());
$(window).on('resize', function () {
    setTimeout(function () {
    B_frame_height = parent.layui.$(".iframe_box").height()-100;
        frameheight();
    }, 100);
});
function frameheight(){
  $("#iframe_categorys").height(B_frame_height);
  $("#iframe_categorys_list").height(B_frame_height);
}
(function (){
  frameheight();
})();
</script>

</body>

</html>