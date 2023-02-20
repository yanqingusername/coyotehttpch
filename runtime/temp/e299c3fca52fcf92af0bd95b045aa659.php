<?php /*a:2:{s:81:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/cms/view/category/add.html";i:1632884492;s:83:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
.layui-form-item .layui-form-checkbox[lay-skin="primary"] {
    margin-top: 0px;
}
</style>
<div class="layui-card">
    <div class="layui-card-header">添加栏目</div>
    <div class="layui-card-body">
        <form class="layui-form" method="post" lay-filter="layui-form">
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">基本设置</li>
                    <li>选项设置</li>
                    <li id="modeTab">模板设置</li>
                    <!-- <li>权限设置</li> -->
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-form-item">
                            <label>上级菜单</label>
                            <div class="w300">
                                <select name="parentid">
                                    <option value="0">作为顶级栏目</option>
                                    <?php echo $category; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item web_list">
                            <label>选择模型</label>
                            <div class="w300">
                                <select name="modelid" lay-filter="filter">
                                    <option>请选择模型</option>
                                    <?php if(is_array($models) || $models instanceof \think\Collection || $models instanceof \think\Paginator): $i = 0; $__LIST__ = $models;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($parentid_modelid == $vo['id']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['name']); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>添加方式</label>
                            <div class="w300">
                                <input type="radio" name="isbatch" value="1" title="批量添加" lay-filter="filter">
                                <input type="radio" name="isbatch" value="0" title="单条添加" checked lay-filter="filter">
                            </div>
                        </div>
                        <div class="layui-form-item" id="normal_add">
                            <label>栏目标题 </label>
                            <div class="w300">
                                <input type="text" name="catname" lay-verify="required" autocomplete="off" placeholder="栏目名称" class="layui-input" id="catname">
                            </div>
                        </div>
                        <div class="layui-form-item" id="catdir_tr">
                            <label>唯一标识</label>
                            <div class="w300">
                                <input type="text" name="catdir" autocomplete="off" placeholder="唯一标识" class="layui-input" id="catdir">
                            </div>
                            <div class="layui-form-mid layui-word-aux">留空自动生成拼音，英文数字组成</div>
                        </div>
                        <div class="layui-form-item web_link">
                            <label>链接地址</label>
                            <div>
                                <div class="layui-input-inline w300">
                                    <input type="text" name="url" autocomplete="off" placeholder="自定义链接地址" class="layui-input" id="url">
                                </div>
                                <div class="layui-input-inline">
                                    <select lay-filter="fasttype">
                                        <option data-url="">常用内部链接</option>
                                        <option data-url="cms/index/index">首页</option>
                                        <option data-url="cms/index/lists?catid=2">列表页/单页</option>
                                        <option data-url="cms/index/shows?catid=2&id=1">详情页</option>
                                        <?php if(isModuleInstall('formguide')): ?>
                                        <option data-url="formguide/index/index?id=2">表单页</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="layui-form-mid layui-word-aux">
                                有值时生效，内部链接格式:模块/控制器/操作?参数=参数值&...，外部链接则必须http://开头
                            </div>
                        </div>
                        <div class="layui-form-item" id="batch_add" style="display:none">
                            <label>栏目名称</label>
                            <div class="w300">
                                <textarea name="batch_add" lay-verify="" placeholder="栏目名称|唯一标识" class="layui-textarea"></textarea>
                            </div>
                            <div class="layui-form-mid layui-word-aux">
                                例如：<br>国内新闻|china<br>国际新闻|world<br>唯一标识留空时自动生成拼音
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>栏目简介</label>
                            <div class="w300">
                                <textarea name="description" placeholder="栏目简介" class="layui-textarea"></textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>图片标题 </label>
                            <div class="w300">
                                <input type="text" name="picname" placeholder="图片标题" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>图片副标题 </label>
                            <div class="w300">
                                <input type="text" name="subpicname" placeholder="图片副标题" class="layui-input">
                            </div>
                        </div>
                        <?php if(config('dev_pc_image')): ?>
                        <div class="layui-form-item layui-form-text">
                            <label><?php echo config('dev_pc_image'); ?></label>
                            <div class="layui-form-field-label">
                                <div class="js-upload-image">
                                    <?php echo \util\Form::images('image') ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; if(config('dev_mobile_image')): ?>
                        <div class="layui-form-item layui-form-text">
                            <label><?php echo config('dev_mobile_image'); ?></label>
                            <div class="layui-form-field-label">
                                <div class="js-upload-image">
                                    <?php echo \util\Form::images('imagem') ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; if(config('dev_cat_image')): ?>
                        <div class="layui-form-item layui-form-text">
                            <label><?php echo config('dev_cat_image'); ?></label>
                            <div class="layui-form-field-label">
                                <div class="js-upload-image">
                                    <?php echo \util\Form::images('imagecat') ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; if(config('dev_icon_image')): ?>
                        <div class="layui-form-item layui-form-text">
                            <label><?php echo config('dev_icon_image'); ?></label>
                            <div class="layui-form-field-label">
                                <div class="js-upload-image">
                                    <?php echo \util\Form::images('imageico') ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="layui-tab-item">
                        <div class="layui-form-item">
                            <label>在顶部导航显示</label>
                            <div class="w300">
                                <input type="radio" name="status" value="1" title="显示" checked>
                                <input type="radio" name="status" value="0" title="隐藏">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>在底部导航显示</label>
                            <div class="w300">
                                <input type="radio" name="bottom_status" value="1" title="显示" checked>
                                <input type="radio" name="bottom_status" value="0" title="隐藏">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label>显示排序</label>
                            <div class="w300">
                                <input type="text" name="listorder" autocomplete="off" placeholder="显示排序" class="layui-input" value="100">
                            </div>
                        </div>
                        <div class="layui-form-item web_seo">
                            <label>网页标题</label>
                            <div class="w300">
                                <input type="text" name="setting[meta_title]" autocomplete="off" placeholder="针对搜索引擎设置的标题" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item web_seo">
                            <label>网页关键词</label>
                            <div class="w300">
                                <input type="text" name="setting[meta_keywords]" autocomplete="off" placeholder="关键字中间用半角逗号隔开" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item web_seo">
                            <label>网页描述</label>
                            <div class="w300">
                                <textarea name="setting[meta_description]"  placeholder="针对搜索引擎设置的网页描述" class="layui-textarea"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="layui-form-item web_list">
                            <label>栏目首页模板</label>
                            <div class="w300">
                                <select name="setting[category_template]">
                                    <option value="category.html" selected>默认栏目首页:category.html</option>
                                    <?php if(is_array($tp_category) || $tp_category instanceof \think\Collection || $tp_category instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="layui-form-mid layui-word-aux">新增模板以category_xx.html形式,【含有子栏目时生效】</div>
                        </div>
                        <div class="layui-form-item web_list">
                            <label>栏目列表页模板</label>
                            <div class="w300">
                                <select name="setting[list_template]">
                                    <option value="list.html" selected>默认栏目列表页:list.html</option>
                                    <?php if(is_array($tp_list) || $tp_list instanceof \think\Collection || $tp_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="layui-form-mid layui-word-aux">新增模板以list_xx.html形式,【没有子栏目时生效】</div>
                        </div>
                        <div class="layui-form-item web_list">
                            <label>内容页模板</label>
                            <div class="w300">
                                <select name="setting[show_template]">
                                    <option value="show.html" selected>默认内容页:show.html</option>
                                    <?php if(is_array($tp_show) || $tp_show instanceof \think\Collection || $tp_show instanceof \think\Paginator): $i = 0; $__LIST__ = $tp_show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($vo); ?>"><?php echo htmlentities($vo); ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                            <div class="layui-form-mid layui-word-aux">新增模板以show_xx.html形式</div>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <?php if(isModuleInstall('member')): ?>
                        <div class="layui-form-item web_list">
                            <label>会员组权限</label>
                            <table class="layui-table" style="max-width: 250px;">
                              <colgroup>
                                <col width="150">
                                <col width="100">
                              </colgroup>
                              <thead>
                                <tr>
                                  <th>会员组名称</th>
                                  <th>允许投稿</th>
                                </tr> 
                              </thead>
                              <tbody>
                                <?php if(is_array($Member_Group) || $Member_Group instanceof \think\Collection || $Member_Group instanceof \think\Paginator): $i = 0; $__LIST__ = $Member_Group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr>
                                  <td><?php echo htmlentities($vo['name']); ?></td>
                                  <td><input type="checkbox" name="priv_groupid[]" value="add,<?php echo htmlentities($vo['id']); ?>" title="允许" lay-skin="primary"></td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                              </tbody>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" name="type" value="2">
                <div class="layui-form-item">
                    <div>
                        <button class="layui-btn" lay-submit lay-filter="formSubmit">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                    </div>
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
    
    
<script type="text/javascript">
layui.use('form', function(){
	var form = layui.form;
	form.on('radio(filter)', function(data){
		if(1==data.value){
			//批量
			$('#normal_add').hide();
			$('#catdir_tr').hide();
			$('#batch_add').show();
			$('#catname').attr('disabled',true).attr('lay-verify','');

		}
		if(0==data.value){
			$('#normal_add').show();
			$('#catdir_tr').show();
			$('#batch_add').hide();
			$('#catname').attr('disabled',false).attr('lay-verify','required');
		}
	});

    form.on('select(fasttype)', function(data) {
        $('#url').val($(data.elem).find("option:selected").attr("data-url"));
    });

    form.on('select(filter)', function(data){
        //console.log(data.value); //得到被选中的值
        if(!isNaN(data.value)){
            $.get('<?php echo url("public_tpl_file_list"); ?>', {id:data.value}, function(res) {
                if(res.code==0){
                    form.val("layui-form", {
                       "setting[category_template]": res.data.category_template,
                       "setting[list_template]": res.data.list_template,
                       "setting[show_template]": res.data.show_template,
                    })
                }
            });
        }
    });

    <?php if($parentid_modelid): ?>
        $.get('<?php echo url("public_tpl_file_list"); ?>', {id:<?php echo htmlentities($parentid_modelid); ?>}, function(res) {
            if(res.code==0){
                form.val("layui-form", {
                   "setting[category_template]": res.data.category_template,
                   "setting[list_template]": res.data.list_template,
                   "setting[show_template]": res.data.show_template,
                })
            }
        });
    <?php endif; ?>

});
</script>

</body>

</html>