<?php /*a:2:{s:72:"/Applications/phpstudy/coyotehttpch/application/cms/view/field/edit.html";i:1633660114;s:76:"/Applications/phpstudy/coyotehttpch/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
    <div class="layui-card-header">编辑字段</div>
    <div class="layui-card-body">
        <blockquote class="layui-elem-quote"><p>默认以下字段名称已存在，请不要建立同名的字段：<br>id、catid、title、keywords、description、flag、listsorder、uid、hits、inputtime、updatetime、status、did、content</p></blockquote>
        <form class="layui-form" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">字段名称</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" lay-verify="required" placeholder="字段名称" class="layui-input" value="<?php echo htmlentities($data['name']); ?>">
                </div>
                <div class="layui-form-mid layui-word-aux">字母、数字组成，并且仅能字母开头</div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">字段标题</label>
                <div class="layui-input-inline">
                    <input type="text" name="title" lay-verify="required" placeholder="字段标题" class="layui-input" value="<?php echo htmlentities($data['title']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">字段描述</label>
                <div class="layui-input-inline w300">
                    <textarea name="remark" placeholder="字段的相关描述" class="layui-textarea"><?php echo htmlentities($data['remark']); ?></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">字段类型</label>
                <div class="layui-input-inline">
                    <select name="type" lay-filter="fieldtype" lay-verify="required">
                        <option></option>
                        <?php if(is_array($fieldType) || $fieldType instanceof \think\Collection || $fieldType instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['name']); ?>" <?php if($data['type']==$vo['name']): ?>selected<?php endif; ?> data-define="<?php echo htmlentities($vo['default_define']); ?>" data-ifoption="<?php echo htmlentities($vo['ifoption']); ?>" data-ifstring="<?php echo htmlentities($vo['ifstring']); ?>"><?php echo htmlentities($vo['title']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">字段定义</label>
                <div class="layui-input-inline w300">
                    <input type="text" name="setting[define]" lay-verify="required" autocomplete="off" placeholder="字段定义" class="layui-input" id="define" value="<?php echo htmlentities($data['setting']['define']); ?>">
                </div>
                <div class="layui-input-inline">
                    <select lay-filter="fasttype">
                        <option data-define="">快速选择</option>
                        <option data-define="varchar(255) NOT NULL DEFAULT ''">255个字符串以内</option>
                        <option data-define="int(7) NOT NULL DEFAULT '0'">10位以内纯数字</option>
                        <option data-define="tinyint(2) NOT NULL DEFAULT '0'">2位以内纯数字</option>
                        <option data-define="text NOT NULL">常用文本文档</option>
                        <option data-define="decimal(10,2) unsigned NOT NULL">价格</option>
                        <option data-define="mediumtext NOT NULL">巨型文本文档</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">数据校验</label>
                <div class="layui-input-inline w300">
                    <input type="text" name="pattern" autocomplete="off" placeholder="正则校验数据合法性，留空不校验" class="layui-input" value="<?php echo htmlentities($data['pattern']); ?>" id="pattern">
                </div>
                <div class="layui-input-inline">
                    <select lay-filter="pattern">
                        <option data-define="">常用正则</option>
                        <option data-define="/^[0-9.-]+$/">数字</option>
                        <option data-define="/^[0-9-]+$/">整数</option>
                        <option data-define="/^[a-z]+$/i">字母</option>
                        <option data-define="/^[0-9a-z]+$/i">数字+字母</option>
                        <option data-define="/^[\x{4e00}-\x{9fa5}]+$/u">中文</option>
                        <option data-define="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail</option>
                        <option data-define="/^[0-9]{5,20}$/">QQ</option>
                        <option data-define="/^http(s)?:\/\//">超级链接</option>
                        <option data-define="/^(1)[0-9]{10}$/">手机号码</option>
                        <option data-define="/^[0-9-]{6,13}$/">电话号码</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">提示信息</label>
                <div class="layui-input-inline">
                    <input type="text" name="errortips" placeholder="数据校验未通过的提示信息" class="layui-input" value="<?php echo htmlentities($data['errortips']); ?>">
                </div>
            </div>
            <div id="options" <?php if(!$fieldType[$data['type']]['ifoption']): ?>style="display:none"<?php endif; ?>>
                <!--<div class="layui-form-item">
                    <label class="layui-form-label">选项</label>
                    <div class="layui-input-inline w300">
                        <textarea name="setting[options]" placeholder="值:描述
值:描述
值:描述
....." class="layui-textarea"><?php echo htmlentities($data['setting']['options']); ?></textarea>
                    </div>
                </div>-->
            <div class="layui-form-item">
                <label class="layui-form-label">选项数据</label>
                <div class="layui-input-inline">
                    <input type="radio" lay-filter="datasource" name="setting[datastate]" value="0" title="自定义" <?php echo $data['setting']['datastate']=="0" ? 'checked' : ''; ?>>
                    <input type="radio" lay-filter="datasource" name="setting[datastate]" value="1" title="关联数据库" <?php echo $data['setting']['datastate']=="1" ? 'checked' : ''; ?>>
                    <input type="radio" lay-filter="datasource" name="setting[datastate]" value="2" title="联动菜单" <?php echo $data['setting']['datastate']=="2" ? 'checked' : ''; ?>>
                    <input type="radio" lay-filter="datasource" name="setting[datastate]" value="3" title="栏目" <?php echo $data['setting']['datastate']=="3" ? 'checked' : ''; ?>>
                </div>
            </div>
            <div class="layui-form-item datasource" <?php echo $data['setting']['datastate']=="1" ? '' : 'style="display:none"'; ?> >
                <label class="layui-form-label">数据库</label>
                <div class="layui-input-inline w190">
                    <select lay-filter="datatable" name="setting[datasource][datatable]">
                        <option data-define="">选择数据库</option>
                        <?php if(is_array($TABLElist) || $TABLElist instanceof \think\Collection || $TABLElist instanceof \think\Paginator): $i = 0; $__LIST__ = $TABLElist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['name']); ?>" <?php echo $data['setting']['datasource']['datatable']==$vo['name'] ? 'selected="selected"' : ''; ?>><?php echo htmlentities($vo['comment']); ?> [<?php echo htmlentities($vo['name']); ?>]</option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-input-inline w150">
                    <select id="datavalue" name="setting[datasource][datavalue]">
                        <?php if($FieldInfo != null): if(is_array($FieldInfo) || $FieldInfo instanceof \think\Collection || $FieldInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $FieldInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['Field']); ?>">[<?php echo htmlentities($vo['Field']); ?>] <?php echo htmlentities($vo['Comment']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <option data-define="" value="<?php echo htmlentities($data['setting']['datasource']['datavalue']); ?>">ID字段【<?php echo htmlentities($data['setting']['datasource']['datavalue']); ?>】</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="layui-input-inline w150">
                    <select id="datadesc" name="setting[datasource][datadesc]">
                        <?php if($FieldInfo != null): if(is_array($FieldInfo) || $FieldInfo instanceof \think\Collection || $FieldInfo instanceof \think\Paginator): $i = 0; $__LIST__ = $FieldInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['Field']); ?>">[<?php echo htmlentities($vo['Field']); ?>] <?php echo htmlentities($vo['Comment']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <option data-define="" value="<?php echo htmlentities($data['setting']['datasource']['datadesc']); ?>">描述字段【<?php echo htmlentities($data['setting']['datasource']['datadesc']); ?>】</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item linksource" <?php echo $data['setting']['datastate']=="2" ? '' : 'style="display:none"'; ?>>
                <label class="layui-form-label">联动菜单</label>
                <div class="layui-input-inline w190">
                    <select lay-filter="datalink" name="setting[linksource][dataid]">
                        <option data-define="">选择菜单</option>
                        <?php if(is_array($LINKlist) || $LINKlist instanceof \think\Collection || $LINKlist instanceof \think\Paginator): $i = 0; $__LIST__ = $LINKlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['id']); ?>" <?php echo $data['setting']['linksource']['dataid']==$vo['id'] ? 'selected="selected"' : ''; ?>><?php echo htmlentities($vo['catname']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div class="layui-input-inline w150">
                    <select id="linkvalue" name="setting[linksource][datavalue]">
                        <option data-define="" value="1" <?php echo $data['setting']['linksource']['datavalue']==1 ? 'selected="selected"' : ''; ?>>层级【1级】</option>
                        <option value="2" <?php echo $data['setting']['linksource']['datavalue']==2 ? 'selected="selected"' : ''; ?>>层级【2级】</option>
                        <option value="3" <?php echo $data['setting']['linksource']['datavalue']==3 ? 'selected="selected"' : ''; ?>>层级【3级】</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item menusource" <?php echo $data['setting']['datastate']=="3" ? '' : 'style="display:none"'; ?>>
                <label class="layui-form-label">栏目</label>
                <div class="layui-input-inline w190">
                    <select lay-filter="datalink" name="setting[menusource][menuid]">
                        <option value="0" data-define="">选择栏目</option>
                        <?php if(is_array($MENUlist) || $MENUlist instanceof \think\Collection || $MENUlist instanceof \think\Paginator): $i = 0; $__LIST__ = $MENUlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['id']); ?>" <?php echo $data['setting']['menusource']['menuid']==$vo['id'] ? 'selected="selected"' : ''; ?>><?php echo htmlentities($vo['catname']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item defaultsource" <?php echo $data['setting']['datastate']=="0" ? '' : 'style="display:none"'; ?>>
                <label class="layui-form-label">选项</label>
                <div class="layui-input-inline w300">
                    <textarea name="setting[options]" placeholder="值:描述
值:描述
值:描述
....." class="layui-textarea"><?php echo htmlentities($data['setting']['options']); ?></textarea>
                </div>
            </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">筛选字段</label>
                    <div class="layui-input-inline">
                        <input type="radio" name="setting[filtertype]" value="1" title="是" <?php if($data['setting']['filtertype']==1): ?>checked<?php endif; ?>>
                        <input type="radio" name="setting[filtertype]" value="0" title="否" <?php if($data['setting']['filtertype']==0): ?>checked<?php endif; ?>>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">字段默认值</label>
                <div class="layui-input-inline">
                    <input type="text" name="setting[value]" lay-verify="value" autocomplete="off" placeholder="默认插入字段的值" class="layui-input" value="<?php echo htmlentities($data['setting']['value']); ?>">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">是否必填</label>
                <div class="layui-input-inline">
                    <input type="radio" name="ifrequire" value="1" title="是" <?php if($data['ifrequire']==1): ?>checked<?php endif; ?>>
                    <input type="radio" name="ifrequire" value="0" title="否" <?php if($data['ifrequire']==0): ?>checked<?php endif; ?>>
                </div>
            </div>
            <?php if($data['ifsystem']): ?>
            <div class="layui-form-item" id="ifsearch" <?php if(!in_array($data['type'],['text', 'textarea', 'tags', 'Ueditor'])): ?>style="display:none"<?php endif; ?>>
                <label class="layui-form-label">是否可搜索</label>
                <div class="layui-input-inline">
                    <input type="radio" name="ifsearch" value="1" title="是" <?php if($data['ifsearch']==1): ?>checked<?php endif; ?>>
                    <input type="radio" name="ifsearch" value="0" title="否" <?php if($data['ifsearch']==0): ?>checked<?php endif; ?>>
                </div>
            </div>
            <?php endif; ?>
            <div class="layui-form-item">
                <label class="layui-form-label">投稿显示</label>
                <div class="layui-input-inline">
                    <input type="radio" name="isadd" value="1" title="是" <?php if($data['isadd']==1): ?>checked<?php endif; ?>>
                    <input type="radio" name="isadd" value="0" title="否" <?php if($data['isadd']==0): ?>checked<?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-inline">
                    <input type="radio" name="status" value="1" title="启用" <?php if($data['status']==1): ?>checked<?php endif; ?>>
                    <input type="radio" name="status" value="0" title="禁用" <?php if($data['status']==0): ?>checked<?php endif; ?>>
                </div>
            </div>
            <input type="hidden" name="ifsystem"  value="<?php echo htmlentities($data['ifsystem']); ?>">
            <input name="fieldid" type="hidden" value="<?php echo htmlentities($fieldid); ?>" />
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="formSubmit">立即提交</button>
                    <button class="layui-btn layui-btn-normal" type="button" onclick="javascript:history.back(-1);">返回</button>
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
    
    
<script>
layui.use(['layer', 'form'], function() {
    var layer = layui.layer,
        form = layui.form;
    form.on('select(fieldtype)', function(data) {
        $('#define').val($(data.elem).find("option:selected").attr("data-define"));
        var ifoption = $(data.elem).find("option:selected").attr("data-ifoption");
        var ifstring = $(data.elem).find("option:selected").attr("data-ifstring");
        //搜索隐显
        if (ifstring == '1') {
            $('#ifsearch').show();
        } else {
            $('#ifsearch').hide();
        }
        if (ifoption == '1') {
            $('#options').show();
        } else {
            $('#options').hide();
        }
    });
    form.on('select(fasttype)', function(data) {
        $('#define').val($(data.elem).find("option:selected").attr("data-define"));
    });
    form.on('select(pattern)', function(data) {
        $('#pattern').val($(data.elem).find("option:selected").attr("data-define"));
    });
    form.on('radio(datasource)', function(data) {
        if (data.value == 1) {
            $('.datasource').show();
            $('.linksource').hide();
            $('.menusource').hide();
            $('.defaultsource').hide();
        } else if(data.value == 2){
            $('.datasource').hide();
            $('.linksource').show();
            $('.menusource').hide();
            $('.defaultsource').hide();
        } else if(data.value == 3){
            $('.datasource').hide();
            $('.linksource').hide();
            $('.menusource').show();
            $('.defaultsource').hide();
        }else {
            $('.datasource').hide();
            $('.linksource').hide();
            $('.menusource').hide();
            $('.defaultsource').show();
        }
    });
    form.on('select(datatable)', function(data) {
        var field = data.value;
        $.get('<?php echo url("getfieldinfo"); ?>', {field:field}, function(res) {
            if(res.code==1){
                var data = res.data;
                $('#datavalue').html('<option data-define="">选择字段【值】</option>');
                $('#datadesc').html('<option data-define="">选择字段【描述】</option>');
                data.map(function(i, e) {
                    var desc = i.Comment||i.Field;
                    var html = '<option value="'+i.Field+'">['+i.Field+'] '+desc+' </option>';
                    $('#datavalue,#datadesc').append(html);
                }); form.render();
            }
        });
    });
});
</script>

</body>

</html>