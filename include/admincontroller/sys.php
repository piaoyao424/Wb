<?php
/**
* ZCNCMS
* 基本信息
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '基本信息';
$pagepower = 'sys';
//基本部分
require('checkpower.inc.php');
//功能部分
include_once(WEB_INC.'file.class.php');
include_once(WEB_INC.'string.class.php');
if(isset($submit)){
	$FS = new files();
	$STR = new C_STRING();
	$info = array(
	'isclose' => $isclose,
	'closeinfo' => $closeinfo,
	'webtitle' => $webtitle,
	'indextitle' => $indextitle,
	'webkeywords' => $webkeywords,
	'webdescription' => $webdescription,
	'webcopyright' => $webcopyright,
	'webbeian' => $webbeian,
	'templates' => $systemplates,
	);
	$rs_msg = $STR->safe($info);
	if($FS->file_Write($rs_msg, WEB_INC.'sys.inc.php', 'sys')) {
		errorInfo('编辑成功');
	} else {
		errorInfo();
	}
} else {
	$rs_sys=$sys;
	
	$templatesList = array();
	function getTemplatesList(){
		global $config;
		$handler = opendir(WEB_ROOT.$config['defaultTemplates']);
		while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
				if ($filename != "." && $filename != "..") {
						$files[] = $filename ;
				   }
			   }
		closedir($handler);
			 
		//打印所有文件名
		//foreach ($files as $value) {
		//	echo $value."<br />";
		//}
		return $files;
	}
	$templatesList = getTemplatesList();
	
	$templatefile = 'sys.tpl.php';
}
?>