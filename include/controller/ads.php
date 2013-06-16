<?php
/**
* ZCNCMS
* 广告
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '广告';
$topTitle = '';
$where = '';
//功能部分
include(WEB_MOD.'ads.class.php');
include(WEB_MOD.'adflash.class.php');
$ads=new Ads();
$adflash=new Adflash();



$templatefile = '';
$classinfo = '';
//
//classid
if(isset($classid)) {
	$classid = intval($classid);
}
if(isset($id)) {
	$id = intval($id);
}


switch($a)
{
	case 'list':default://list

		$List = $ads->GetIndexList($classid,array(),'','','id desc');
		
		$templatefile = 'ads_list.tpl.php';
		break;
	case 'show'://

		break;
}

?>