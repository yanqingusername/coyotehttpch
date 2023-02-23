<?php /*a:2:{s:76:"/Applications/phpstudy/coyotehttpch/application/cms/view/cms/singlepage.html";i:1596677558;s:76:"/Applications/phpstudy/coyotehttpch/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    
<form class="layui-form" method="post">
    <div class="layui-form-item">
        <div class="layui-form-item">
            <label class="">标题&nbsp;<font color="red">*</font></label>
            <div class="layui-form-field-label">
                <input type="text" name="modelField[title]" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['title']); ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="">SEO关键词</label>
            <div class="layui-form-field-label">
                <input type="text" name="modelField[keywords]" placeholder="请输入SEO关键词" autocomplete="off" class="layui-input" value="<?php echo htmlentities($info['keywords']); ?>">
            </div>
            <div class="layui-form-mid layui-word-aux">多关键词之间用空格或者“,”隔开</div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="">SEO摘要</label>
            <div class="layui-form-field-label">
                <textarea placeholder="请输入SEO摘要" class="layui-textarea" name="modelField[description]"><?php echo htmlentities($info['description']); ?></textarea>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="">内容</label>
            <div class="layui-form-field-label">
                <script type="text/javascript" src="/static/libs/ueditor/ueditor.config.js"></script>
                <script type="text/javascript" src="/static/libs/ueditor/ueditor.all.min.js"></script>
                <script type="text/javascript">
                var modelFieldExtcontent = UE.getEditor('modelFieldcontent', {
                    initialFrameWidth: null,
                    initialFrameHeight: 250,
                    serverUrl: GV.ueditor_upload_url
                });
                </script>
                <script type="text/plain" id="modelFieldcontent" name="modelField[content]"><?php echo $info['content']; ?></script>
            </div>
        </div>
        <input type="hidden" name="modelField[catid]" value="<?php echo htmlentities($catid); ?>">
        <div>
            <button class="layui-btn" lay-submit data-refresh="false" lay-filter="formSubmit">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

    
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