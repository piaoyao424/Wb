<?php
/**
* ZCNCMS
* 禁止ip
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '禁止ip';
$pagepower = 'sys';
//基本部分
require('checkpower.inc.php');
//功能部分
include_once(WEB_INC.'file.class.php');
include_once(WEB_INC.'string.class.php');
$STR = new C_STRING();
//

switch($a)
{
	case 'forbiddenip':
	    $fileName = '../data/'.$a.'.txt';
		$data = file_get_contents($fileName);
		//处理过程
		if( isset($submit) ) {
			//$data = stripslashes($content);
			$data = $STR->safe($content);
			//echo $data;
			//exit;
			file_put_contents($fileName, $data);
			$message = "修改成功";
			
		}
		$templatefile = 'txt_forbiddenip.php';
		break;
	
	default://list
		break;
}

?>