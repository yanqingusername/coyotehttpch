<?php /*a:2:{s:82:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/cms/view/setting/index.html";i:1596677558;s:83:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    <div class="layui-card-header">CMS配置</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">基本配置</li>
                    <li>其他</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                            <label class="">站点开关</label>
                            <div class="layui-form-field-label">
                                <input type="checkbox" name="setting[web_site_status]" lay-skin="switch" lay-text="ON|OFF" value="1" <?php if(1==$setting['web_site_status']): ?>checked='' <?php endif; ?>> </div> <div class="layui-form-mid layui-word-aux">站点关闭后前台将不能访问</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="">站点名称</label>
                            <div class="layui-form-field-label">
                                <input type="text" name="setting[site_name]" placeholder="请输入站点标题" class="layui-input" value="<?php echo htmlentities($setting['site_name']); ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="">站点标题</label>
                            <div class="layui-form-field-label">
                                <input type="text" name="setting[site_title]" placeholder="请输入站点标题" class="layui-input" value="<?php echo htmlentities($setting['site_title']); ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="">站点关键词</label>
                            <div class="layui-form-field-label">
                                <input type="text" name="setting[site_keyword]" placeholder="请输入站点关键词" class="layui-input" value="<?php echo htmlentities($setting['site_keyword']); ?>">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="">站点描述</label>
                            <div class="layui-form-field-label">
                                <textarea name="setting[site_description]" placeholder="请输入站点描述" class="layui-textarea"><?php echo htmlentities($setting['site_description']); ?></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="">缓存时间</label>
                            <div class="layui-form-field-label">
                                <input type="text" name="setting[site_cache_time]" placeholder="请输入缓存时间" class="layui-input" value="<?php echo htmlentities($setting['site_cache_time']); ?>">
                            </div>
                            <div class="layui-form-mid layui-word-aux">单页和详情页有效</div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="layui-form-item">
                            <label class="">回收站</label>
                            <div class="layui-form-field-label">
                                <input type="checkbox" name="setting[web_site_recycle]" lay-skin="switch" lay-text="ON|OFF" value="1" <?php if(1==$setting['web_site_recycle']): ?>checked='' <?php endif; ?>> </div> <div class="layui-form-mid layui-word-aux">开启后，误删的文章可以恢复,反之不可还原</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="">百度熊掌号+百度站长推送</label>
                            <div class="layui-form-field-label">
                                <input type="checkbox" name="setting[web_site_baidupush]" lay-skin="switch" lay-text="ON|OFF" value="1" <?php if(1==$setting['web_site_baidupush']): ?>checked='' <?php endif; ?>> </div> <div class="layui-form-mid layui-word-aux">如果开启百度熊掌+百度站长推送，将在文章发布时自动进行推送(需要安装推送插件)</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="">关键字链接</label>
                            <div class="layui-form-field-label">
                                <textarea name="setting[autolinks]" placeholder="请输入关键字链接" class="layui-textarea" style="width: 300px;"><?php echo htmlentities($setting['autolinks']); ?></textarea>
                            </div>
                            <div class="layui-form-mid layui-word-aux">每行1组以"关键词<strong style="color:red;">|</strong>(半角竖线)链接"形式填写, 可用第2个竖线追加参数:<strong style="color:red;">n</strong>代表nofollow标记, <strong style="color:red;">e</strong>代表external nofollow标记, <strong style="color:red;">b</strong>代表本窗口打开.</br> 例: google<strong>|</strong>http://www.google.com<strong>|</strong>n 即此链接带nofollow(默认新窗口打开)</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" data-refresh="false" lay-filter="formSubmit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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