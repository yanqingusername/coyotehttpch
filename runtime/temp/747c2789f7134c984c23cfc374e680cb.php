<?php /*a:2:{s:82:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/cms/view/cms/classlist.html";i:1632901372;s:83:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/admin/view/index_layout.html";i:1596779062;}*/ ?>
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
<table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
<script type="text/html" id="barTool">
    <a class="layui-btn layui-btn-xs" data-open='<?php echo url("edit",["catid"=>$catid]); ?>?id={{ d.id }}' data-title="编辑内容" data-full="true">编辑</a>
    <a href='<?php echo url("del",["catid"=>$catid]); ?>?ids={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del">删除</a>
</script>
<script type="text/html" id="title">
    {{# if(d.flag && d.flag.indexOf("1")!==-1){ }}
  <span class="text-danger">[置顶]</span>
  {{#  } }}
  {{# if(d.flag && d.flag.indexOf("2")!==-1){ }}
  <span class="text-danger">[头条]</span>
  {{#  } }}
  {{# if(d.flag && d.flag.indexOf("3")!==-1){ }}
  <span class="text-danger">[特荐]</span>
  {{#  } }}
  {{# if(d.flag && d.flag.indexOf("4")!==-1){ }}
  <span class="text-danger">[推荐]</span>
  {{#  } }}
  {{# if(d.flag && d.flag.indexOf("5")!==-1){ }}
  <span class="text-danger">[热点]</span>
  {{#  } }}
  {{# if(d.flag && d.flag.indexOf("6")!==-1){ }}
  <span class="text-danger">[幻灯]</span>
  {{#  } }}
  {{# if(d.thumb && d.thumb!==''){ }}
  <span class="text-success">[有图]</span>
  {{#  } }}
  {{ d.title }}
</script>
<script type="text/html" id="username">
  {{# if(d.sysadd==1){ }}
    {{ d.username }}
  {{#  } else { }}
    <span class="text-danger">{{ d.username }}</span>
  {{#  } }}
</script>
<script type="text/html" id="statusTpl">
    <input type="checkbox" name="status" data-href='<?php echo url("setstate",["catid"=>$catid]); ?>?id={{d.id}}' value="{{d.id}}" lay-skin="switch" lay-text="通过|待审核" lay-filter="switchStatus" {{ d.status==1 ? 'checked' : '' }}>
</script>
<div id="remove" style="display: none;">
    <div class="box-body" style="padding: 20px;">
        <blockquote class="layui-elem-quote">只能将数据移动到相同模型的栏目下，不同模型的数据移动将被忽略</blockquote>
        <div class="layui-form">
            <div class="layui-form-item">
                <select name="remove" lay-verify="required">
                    <option></option>
                    <?php echo $string; ?>
                </select>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.layui-layer-page .layui-layer-content {
    overflow: inherit;
}
</style>

    
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
layui.use(['table', 'yznTable'], function() {
    var table = layui.table,
        $ = layui.$,
        form = layui.form,
        table = layui.table,
        yznTable = layui.yznTable;

    var init = {
        table_elem: '#currentTable',
        add_url: "<?php echo url('add',['catid'=>$catid]); ?>",
        delete_url: "<?php echo url('del',['catid'=>$catid]); ?>",
        modify_url: '<?php echo url("listorder",["catid"=>$catid]); ?>',
    };

    yznTable.render({
        init: init,
        id: 'currentTable',
        elem: '#currentTable',
        toolbar: ['refresh',
            [{
                text: '添加',
                url: init.add_url,
                method: 'open',
                icon: 'iconfont icon-add',
                class: 'layui-btn layui-btn-normal layui-btn-sm',
                extend: 'data-full="true"',
            }], 'delete',
            [{
                html: '<a class="layui-btn layui-btn-sm layui-btn-normal move">批量移动</a> '
            }],
            [{
                html: '<a class="layui-btn layui-btn-sm layui-btn-danger" href="<?php echo url("recycle",["catid"=>$catid]); ?>">回收站</a>'
            }],
        ],
        url: '<?php echo url("classlist",["catid"=>$catid]); ?>',
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
                { field: 'id', width: 60, title: 'ID' },
                { field: 'title', align: "left", title: '标题', templet: '#title' },
                <?php if(is_array($fielddata) || $fielddata instanceof \think\Collection || $fielddata instanceof \think\Paginator): $i = 0; $__LIST__ = $fielddata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    { field: '<?php echo htmlentities($v['name']); ?>', width: 150, title: '<?php echo htmlentities($v['title']); ?>' },
                <?php endforeach; endif; else: echo "" ;endif; if($has_thumb): ?>
                { field: 'thumb', width: 100, title: '图片', search: false, templet: yznTable.image },
                <?php endif; ?>
                // { field: 'hits', width: 80, title: '点击量' },
                // { field: 'updatetime', width: 160, title: '更新时间', search: 'range' },
                // { field: 'username', width: 80, title: '发布人', templet: '#username' },
                // { field: 'url', width: 60, align: "center", title: 'URL', templet: yznTable.url, search: false },
                { field: 'status', width: 100, align: "center", title: '状态', templet: '#statusTpl', unresize: true, selectList: { 0: '待审核', 1: '通过' } },
                { fixed: 'right', width: 120, title: '操作', toolbar: '#barTool' }
            ]
        ],
        page: {}
    });


    $('body').on('click', '.move', function() {
        var checkStatus = table.checkStatus('currentTable'),

            ids = [],
            id = tag = '';
        var data = checkStatus.data;
        if (data.length > 0) {
            for (let i in data) {
                id += tag + data[i].id;
                tag = '|';
                //ids.push(data[i].id);
            }
            layer.open({
                title: '批量移动',
                type: 1,
                content: $('#remove'),
                area: ['300px', '250px'],
                btn: ['移动'],
                yes: function(index, layero) {
                    var tocatid = $("select[name='remove']").val();
                    if (tocatid == 0) {
                        layer.msg("请选择移动的栏目",{icon: 2});
                        return;
                    }
                    $.post('<?php echo url("cms/cms/remove",["catid"=>$catid]); ?>', { 'ids': id, 'tocatid': tocatid }, function(data) {
                        if (data.code == 1) {
                            layer.msg(data.msg,{icon: 1});
                            layer.close(index);
                        } else {
                            layer.msg(data.msg,{icon: 2});
                        }
                    })
                }

            });
        } else {
            layer.msg("请选择需要移动的数据",{icon: 2});
        }
    });

});
</script>

</body>

</html>