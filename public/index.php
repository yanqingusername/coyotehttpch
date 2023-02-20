<?php
// +----------------------------------------------------------------------
// | Yzncms [ 御宅男工作室 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2018 http://yzncms.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 御宅男 <530765310@qq.com>
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
// | [ 应用入口文件 ]
// +----------------------------------------------------------------------

namespace think;

if (version_compare(PHP_VERSION, '5.6.0', '<')) {
    header("Content-type: text/html; charset=utf-8");
    die('PHP 5.6.0 及以上版本系统才可运行~ ');
}

define('IF_PUBLIC', true);
define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
define('APP_PATH', ROOT_PATH . 'application' . DIRECTORY_SEPARATOR);

// 加载基础文件
require ROOT_PATH . 'thinkphp' . DIRECTORY_SEPARATOR . 'base.php';
// 执行应用并响应
// Container::get('app')->run()->send();
$_url = $_SERVER['REQUEST_URI'];
if (strpos($_url,"admin") or strpos($_url,"cms") or strpos($_url,"collection")  or strpos($_url,"member")  or strpos($_url,"sitemap") or strpos($_url,"pay") or strpos($_url,"message") or strpos($_url,"formguide") or strpos($_url,"links") or strpos($_url,"api") or strpos($_url,"attachment")or strpos($_url,"addons")or strpos($_url,"app")){
    Container::get('app')->run()->send();
}else{
    Container::get('app')->bind('index/index')->run()->send();
}
/*如果你的服务器不支持域名绑定目录
1.请将index.php放置根目录
2.注释上面代码define('IF_PUBLIC', true);
3.改成define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
 */
