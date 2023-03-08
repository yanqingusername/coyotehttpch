<?php /*a:3:{s:70:"/Applications/phpstudy/coyotehttpch/application/cms/view/cms/edit.html";i:1628736514;s:76:"/Applications/phpstudy/coyotehttpch/application/admin/view/index_layout.html";i:1596779062;s:73:"/Applications/phpstudy/coyotehttpch/application/admin/view/inputItem.html";i:1677647167;}*/ ?>
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
    
<form class="layui-form form-horizontal" method="post">
    <link rel="stylesheet" href="/static/libs/webuploader/webuploader.css?t=1590715645">
<?php if(is_array($fieldList) || $fieldList instanceof \think\Collection || $fieldList instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;switch($vo['type']): case "hidden": if($vo['value']): ?><input type="hidden" class="form-control" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"  value="<?php echo htmlentities($vo['value']); ?>"><?php endif; break; case "text": ?>
    <div class="layui-form-item">
        <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; if($vo['name']=='zb'): ?><a href="http://api.map.baidu.com/lbsapi/getpoint/index.html" target="_blank">点击拾取百度坐标</a><?php endif; if($vo['name']=='zl'): ?>默认为 g<?php endif; ?>
        </label>
        <div class="layui-form-field-label">
            <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
        </div>
        <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    </div>
<?php break; case "tags": ?>
    <div class="layui-form-item">
        <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
        <div class="layui-form-field-label">
            <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" class="layui-input form-tags tags-<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities($vo['value']); ?>" data-remark="<?php echo htmlentities((isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:'输入后空格确认')); ?>">
        </div>
        <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    </div>
<?php break; case "number": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <input type="number" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "switch": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" lay-skin="switch" lay-text="ON|OFF" value="<?php echo htmlentities($vo['value']); ?>" <?php if(1==$vo[ 'value' ]): ?>checked='' <?php endif; ?>> </div> <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "array": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label fieldlist" data-name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-id="<?php echo htmlentities($vo['name']); ?>">
        <div class="arrBox"></div>
        <button type="button" class="layui-btn btn-append">追加</button>
        <textarea name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" class="layui-textarea layui-hide"><?php echo htmlentities($vo['value']); ?></textarea>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<script type="text/html" id="<?php echo htmlentities($vo['name']); ?>Tpl">
    <div class="layui-form-item rules-item">
    {{# layui.each(d.lists, function(index, item) { }}
    <div class="layui-input-inline" style="width:120px;">
        <input type="text" class="layui-input" name="{{item.name}}[{{item.index}}][key]" placeholder="键" value="{{item.row.key|| ''}}" />
    </div>
    <div class="layui-input-inline" style="width:120px;">
        <input type="text" class="layui-input" name="{{item.name}}[{{item.index}}][value]" placeholder="值" value="{{item.row.value|| ''}}" />
    </div>
    <label class="layui-form-mid">
        <button type="button" class="layui-btn layui-btn-danger btn-remove layui-btn-xs"><i class="iconfont icon-close"></i></button>
        <button type="button" class="layui-btn btn-dragsort layui-btn-xs"><i class="iconfont icon-yidong"></i></button>
    </div>
    {{# }); }}
    </div>
</script>
<?php break; case "checkbox": ?>
<div class="layui-form-item" pane="">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <?php if($vo['setting']['menusource']['menuid'] != 0): if(is_array($vo['setting']['menusource']['menulist']) || $vo['setting']['menusource']['menulist'] instanceof \think\Collection || $vo['setting']['menusource']['menulist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['setting']['menusource']['menulist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>][]" lay-skin="primary" title="<?php echo htmlentities($v['title']); ?>" value="<?php echo htmlentities($v['id']); ?>" <?php if(in_array($v['id'],$vo[ 'value' ])): ?>checked<?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>][]" lay-skin="primary" title="<?php echo htmlentities($v); ?>" value="<?php echo htmlentities($key); ?>" <?php if(in_array($key,$vo[ 'value' ])): ?>checked<?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php endif; ?>

    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "radio": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">

        <?php if($vo['setting']['menusource']['menuid'] != 0): if(is_array($vo['setting']['menusource']['menulist']) || $vo['setting']['menusource']['menulist'] instanceof \think\Collection || $vo['setting']['menusource']['menulist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['setting']['menusource']['menulist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="radio" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>][]" lay-skin="primary" title="<?php echo htmlentities($v['title']); ?>" value="<?php echo htmlentities($v['id']); ?>" <?php if($v['id']==$vo['value' ]): ?>checked=''<?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="radio" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" value="<?php echo htmlentities($key); ?>" title="<?php echo htmlentities($v); ?>" <?php if($key==$vo [ 'value' ]): ?>checked='' <?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php endif; ?>

    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>

</div>
<?php break; case "select": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <select name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"  class="filter-class-<?php echo htmlentities($vo['setting']['filter']); ?>-<?php echo htmlentities($vo['setting']['filter_class']); ?>" data-level="<?php echo htmlentities($vo['setting']['filter']); ?>" data-class="<?php echo htmlentities($vo['setting']['filter_class']); ?>" lay-filter="<?php echo htmlentities($vo['setting']['filter']); ?>">
            <option value=""></option>
            <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($key); ?>" <?php if($key==$vo[ 'value' ]): ?>selected="" <?php endif; ?>><?php echo htmlentities($v); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "xmselect": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div id="<?php echo htmlentities($vo['name']); ?>" class="xm-select-demo"><?php if($vo['setting']['datastate'] != 1): ?>只支持关联数据库<?php endif; ?></div>
    </div>
    <script type="text/javascript" src="/static/libs/xm-select.js"></script>
    <?php if($vo['setting']['datastate'] == 1): ?>
    <script>
    xmSelect.render({
        el: '#<?php echo htmlentities($vo['name']); ?>', 
        filterable: true,
        initValue: [<?php echo htmlentities($vo['value']); ?>],
        name: '<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]',
        data: <?php echo json_encode($vo['options']); ?>
    })
    </script>
    <?php endif; if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "color": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="layui-input-inline" style="width: 120px;">
            <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" value="<?php echo htmlentities($vo['value']); ?>" placeholder="请选择颜色" class="layui-input test-form-input">
        </div>
        <div class="layui-inline" style="left: -11px;">
            <div class="layui-color-box"></div>
        </div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "datetime": ?>
<div class="layui-form">
    <div class="layui-form-item">
        <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
        <div class="layui-form-field-label">
            <input type="text" class="layui-input datetime" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" value="<?php echo htmlentities($vo['value']); ?>">
        </div>
        <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    </div>
</div>
<?php break; case "textarea": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <textarea placeholder="请输入<?php echo htmlentities($vo['title']); ?>" class="layui-textarea" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo htmlentities($vo['value']); ?></textarea>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "cat": ?>
<!--栏目分类-->

<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <select name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]">
            <option value=""></option>
            <?php $_result=getColumn($vo['setting']['value']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($v['id']); ?>" <?php if($v['id']==$vo['value']): ?>selected="" <?php endif; ?>><?php echo str_repeat('--',$v['level']); ?>| <?php echo htmlentities($v['catname']); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "image": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-image">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): ?>
                <div class="file-item thumbnail">
                    <img data-image class="<?php echo htmlentities($vo['name']); ?>-<?php echo htmlentities($vo['value']); ?>" data-original="<?php echo htmlentities((get_file_path($vo['value']) ?: '/static/admin/img/none.png')); ?>" src="<?php echo htmlentities((get_file_path($vo['value']) ?: '/static/admin/img/none.png')); ?>">
                    <div class="file-panel">
                        <i class="iconfont icon-tailor cropper" data-input-id="<?php echo htmlentities($vo['value']); ?>" data-id="<?php echo htmlentities($vo['name']); ?>"></i>
                    	<i class="iconfont icon-trash remove-picture" data-id="<?php echo htmlentities($vo['value']); ?>"></i>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="false" data-watermark='' data-thumb='' data-size="<?php echo config('upload_image_size'); ?>" data-ext="<?php echo config('upload_image_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div class="layui-clear"></div>
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传单张图片</div>
            <button type="button" class="layui-btn fachoose-image" data-input-id="<?php echo htmlentities($vo['name']); ?>" id="fachoose-<?php echo htmlentities($vo['name']); ?>"><i class="iconfont icon-other"></i> 选择</button>
        </div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "images": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-images">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): if(is_array(explode(',',$vo['value'])) || explode(',',$vo['value']) instanceof \think\Collection || explode(',',$vo['value']) instanceof \think\Paginator): $i = 0; $__LIST__ = explode(',',$vo['value']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <div class="file-item thumbnail">
                    <img data-image class="<?php echo htmlentities($vo['name']); ?>-<?php echo htmlentities($v); ?>" data-original="<?php echo htmlentities(get_file_path($v)); ?>" src="<?php echo htmlentities((get_file_path($v) ?: '/static/admin/img/none.png')); ?>">
                    <div class="file-panel">
                    	<i class="iconfont icon-yidong move-picture"></i>
                        <i class="iconfont icon-tailor cropper" data-input-id="<?php echo htmlentities($v); ?>" data-id="<?php echo htmlentities($vo['name']); ?>"></i>
	                    <i class="iconfont icon-trash remove-picture" data-id="<?php echo htmlentities($v); ?>"></i>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <?php endif; ?>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="true" data-watermark='' data-thumb='' data-size="<?php echo config('upload_image_size'); ?>" data-ext="<?php echo config('upload_image_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div class="layui-clear"></div>
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传多张图片</div>
            <button type="button" class="layui-btn fachoose-image" data-multiple="true" data-input-id="<?php echo htmlentities($vo['name']); ?>" id="fachoose-<?php echo htmlentities($vo['name']); ?>"><i class="iconfont icon-other"></i> 选择</button>
        </div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "file": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-file">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="150">
                    <col width="150">
                    <col>
                  </colgroup>
                  <thead>
                    <tr>
                      <th>文件名称</th>
                      <th>提示</th>
                      <th>进度</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody class="file-box">
                    <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): ?>
                    <tr class="file-item">
                      <td><?php echo htmlentities(get_file_name($vo['value'])); ?></td>
                      <td>/</td>
                      <td>/</td>
                      <td><a href="<?php echo htmlentities(get_file_path($vo['value'])); ?>" class="layui-btn download-file layui-btn layui-btn-xs">下载</a> <a href="javascript:void(0);" class="layui-btn remove-file layui-btn layui-btn-xs layui-btn-danger">删除</a></td>
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="false" data-size="<?php echo config('upload_file_size'); ?>" data-ext="<?php echo config('upload_file_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传单个文件</div>
        </div>
    </div>
</div>
<?php break; case "files": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-file">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <table class="layui-table">
                  <colgroup>
                    <col width="150">
                    <col width="150">
                    <col width="150">
                    <col>
                  </colgroup>
                  <thead>
                    <tr>
                      <th>文件名称</th>
                      <th>提示</th>
                      <th>进度</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody class="file-box">
                    <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): if(is_array(explode(',',$vo['value'])) || explode(',',$vo['value']) instanceof \think\Collection || explode(',',$vo['value']) instanceof \think\Paginator): $i = 0; $__LIST__ = explode(',',$vo['value']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <tr class="file-item">
                      <td><?php echo htmlentities(get_file_name($v)); ?></td>
                      <td>/</td>
                      <td>/</td>
                      <td><a href="<?php echo htmlentities(get_file_path($v)); ?>" class="layui-btn download-file layui-btn layui-btn-xs">下载</a> <a href="javascript:void(0);" class="layui-btn remove-file layui-btn layui-btn-xs layui-btn-danger" data-id="<?php echo htmlentities($v); ?>">删除</a></td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="true" data-size="<?php echo config('upload_file_size'); ?>" data-ext="<?php echo config('upload_file_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传多个文件</div>
        </div>
    </div>
</div>
<?php break; case "Ueditor": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <textarea type="text/plain" class="js-ueditor" id="<?php echo htmlentities($vo['name']); ?>" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo $vo['value']; ?></textarea>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    <div class="<?php echo htmlentities($vo['name']); ?>_attr editor_tool">
        <a class="layui-btn layui-btn-sm" id="<?php echo htmlentities($vo['name']); ?>grabimg" style="margin-top: 4px;">图片本地化</a>
        <a class="layui-btn layui-btn-sm" id="<?php echo htmlentities($vo['name']); ?>filterword" style="margin-top: 4px;">检测违禁词</a>
    </div>
</div>
<?php break; case "CodeEditor": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>&nbsp;<font color="red">*</font><?php endif; ?></label>
    <div class="layui-form-field-label">
        <div id="codeEditor" class="ace_editor" style="min-height:500px"></div>
    </div>
    <textarea style="display: none" type="text/plain" id="<?php echo htmlentities($vo['name']); ?>" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo htmlentities($vo['value']); ?></textarea>
    <script src="https://cdn.bootcss.com/ace/1.2.4/ace.js"></script>
    <script src="https://cdn.bootcss.com/ace/1.2.4/ext-language_tools.js"></script>
    <script type="text/javascript">
        function initEditor(){
            //获取控件 id ：codeEditor
            editor = ace.edit("codeEditor");
            //设置风格和语言（更多风格和语言，请到github上相应目录查看）
            theme = "monokai";
            //theme = "terminal";
            //语言
            language = "html";
            editor.setTheme("ace/theme/" + theme);
            editor.session.setMode("ace/mode/" + language);
            editor.setValue($('#<?php echo htmlentities($vo['name']); ?>').val())
            editor.setShowPrintMargin(false)
            //字体大小
            editor.setFontSize(15);
            //设置只读（true时只读，用于展示代码）
            editor.setReadOnly(false);
            //自动换行,设置为off关闭
            editor.setOption("wrap", "free");
            //启用提示菜单
            ace.require("ace/ext/language_tools");
            editor.setOptions({
                enableBasicAutocompletion: true,
                enableSnippets: true,
                enableLiveAutocompletion: true
            });
            editor.on('change',function (obj) {
                $('#<?php echo htmlentities($vo['name']); ?>').val(editor.getValue())
            })
        }
        initEditor();
    </script>
    <?php if($vo['remark']): ?><div class="layui-form-mid layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "markdown": ?>
    <?php echo hook('markdown',$vo); break; ?>
<?php endswitch; ?>

<?php endforeach; endif; else: echo "" ;endif; ?>
<script>
    layui.use(['form'], function(){
        var $ = layui.$,form = layui.form;
        form.on('select(she)', function(data){
            var dataset=data.elem.dataset;
            $('.filter-class-shi-'+dataset.class).html('<option value="0">请选择</option>');
            $('.filter-class-qu-'+dataset.class).html('<option value="0">请选择</option>');
            $.post("<?php echo url('cms/getLink'); ?>",
                {
                    pid:data.value
                },
                function(data,status){
                    var html = `<option value="">请选择</option>`;
                    $.each(data,function(i,e){

                        html += `<option value="`+e.id+`">`+e.catname+`</option>`;

                    });
                    $('.filter-class-shi-'+dataset.class).html(html);
                    form.render('select');
                });


        });
        form.on('select(shi)', function(data){
            //市
            var dataset=data.elem.dataset;
            $('.filter-class-qu-'+dataset.class).html('<option value="0">请选择</option>');
            $.post("<?php echo url('cms/getLink'); ?>",
                {
                    pid:data.value
                },
                function(data,status){
                    var html = `<option value="">请选择</option>`;
                    $.each(data,function(i,e){

                        html += `<option value="`+e.id+`">`+e.catname+`</option>`;

                    });
                    $('.filter-class-qu-'+dataset.class).html(html);
                    form.render('select');
                });
        });



    });
</script>

<script type="text/javascript" src="/static/libs/xm-select.js"></script>
<script type="text/javascript" src="/static/libs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/libs/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/static/libs/webuploader/webuploader.min.js"></script>

<script type="text/javascript" src="/static/admin/js/form.js?t=1590725734"></script>
    <?php if(count($fieldList)): ?>
    <div class="layui-form-item">
        <div>
            <button class="layui-btn ajax-post1" lay-submit lay-filter="*" target-form="form-horizontal">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
    <?php endif; ?>
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
    
    
<script type="text/javascript">
layui.use(['form', 'layer'], function() {
    var form = layui.form;
    // $(".content_attr").append("<input type='checkbox' name='modelField[get_introduce]' title='是否截取到内容摘要' checked> <input type='checkbox' name='modelField[auto_thumb]' title='是否提取到缩略图' checked>");
    form.render();
    $('.ajax-post1').on('click', function(e) {
        var form = layui.form,
            layer = layui.layer,
            target,
            target_form = $(this).attr('target-form');
        target = $('.form-horizontal').attr("action");
        $.post(target, $('.form-horizontal').serialize()).success(function(data) {
            if (data.code == 1) {
                layer.confirm(data.msg, {
                    btn: ['继续添加', '返回列表'] //按钮
                }, function() {
                    location.href = '<?php echo url("add",["catid"=>$catid]); ?>';
                }, function() {
                    parent.layui.table.reload('currentTable');
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);
                });
            } else {
                layer.msg(data.msg);
            }
        });
        return false;
    });
})
</script>

</body>

</html>