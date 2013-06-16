<?php
/**
* ZCNCMS
* 用户日志
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '用户日志';
$pagepower = 'users';
//基本部分
require('checkpower.inc.php');
//功能部分
include(WEB_MOD.'users_log.class.php');
$users_log=new Users_log();
include(WEB_MOD.'users.class.php');
$users=new Users();
include(WEB_MOD.'users_class.class.php');
$users_class=new Users_class();
switch($a)
{
	case 'list':default://list
		$pageListNum=12;//每页显示
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List=$users_log->GetList(array('id','userid','action','addtime'),$start,$pageListNum,'','id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}users_log";
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		$templatefile = 'users_log_list.tpl.php';
		break;
	case 'edit'://
		break;
	case 'search'://
		
		break;
	case 'show'://
		
		break;
	case 'del'://
		
		break;
}
?>