<?php
//入口文件
//error_reporting(0);
error_reporting(E_ALL | E_STRICT);

define('WEB_IN', '1');
define('WEB_APP','admin');
define('WEB_ROOT', dirname(__FILE__).'/');
define('WEB_INC', WEB_ROOT.'../include/');
define('WEB_MOD', WEB_INC.'model/');
//define('WEB_TPL',WEB_ROOT.'templates/default/');
define('WEB_DATA',WEB_ROOT.'../data/');
define('WEB_CACHE',WEB_ROOT.'../data/cache/');
define('WEB_MODULE', WEB_ROOT.'../module/');
//引入common
//echo WEB_APP;
require_once(WEB_INC.'/common.inc.php');
$config['linkurlmode'] = 0;
include(WEB_INC.'forbiddenip.inc.php');
include(WEB_INC.'close.inc.php');
include(WEB_INC.'rootstart.inc.php');
?>