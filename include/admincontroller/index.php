<?php
/**
* ZCNCMS
* 后台主显示
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '管理主页';
$pagepower = '999';
//基本部分
require('checkpower.inc.php');
//功能部分

if($a == 'clear_cache'){
	clear_cache();
	errorinfo('缓存清理完毕','');
}


$templatefile = 'index.tpl.php';


function clear_cache(){
	$tmp_path = WEB_CACHE;
	//$tmp_my_path=dir($tmp_path);
	if(!class_exists('files')){
		include_once(WEB_INC.'file.class.php');
	}
	$FS = new files();
	$FS->file_Delete($tmp_path);
}

?>