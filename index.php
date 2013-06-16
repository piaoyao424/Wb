<?php
//error_reporting(0);
error_reporting(E_ALL | E_STRICT);
define('WEB_IN', '1');
define('WEB_APP','');
define('WEB_ROOT', dirname(__FILE__).'/');
define('WEB_INC', WEB_ROOT.'include/');
define('WEB_MOD', WEB_INC.'model/');
define('WEB_TPL',WEB_ROOT.'templates/default/');
define('WEB_DATA',WEB_ROOT.'data/');
define('WEB_CACHE',WEB_ROOT.'data/cache/');
define('WEB_MODULE', WEB_ROOT.'module/');
//common
require_once(WEB_INC.'/common.inc.php');
include(WEB_INC.'templates.inc.php');
include(WEB_INC.'forbiddenip.inc.php');
include(WEB_INC.'close.inc.php');
include(WEB_INC.'rootstart.inc.php');
?>