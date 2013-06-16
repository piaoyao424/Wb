<?php
/**
* ZCNCMS
* 安装主显示
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '安装系统';
//功能部分

//安装检测
if(file_exists(WEB_DATA.'install.lock'))
{
	errorinfo('安程程序已经锁定！如果您要重新安装，请删除 install.lock 文件！','');
}
if(!file_exists('zcncms.sql'))
{
	errorinfo("缺少安装文件：zcncms.sql，请检查！",'');
}
if(!file_exists('zcncms_default.sql'))
{
	errorinfo("缺少安装文件：zcncms_default.sql，请检查！",'');
}
switch($a){
	case 'step1':default://list
		$templatefile = 'index.tpl.php';
		break;
	case 'step2':
		$templatefile = 'indexstep2.tpl.php';
		break;
	case 'install':
		include('install.inc.php');
		break;
	case 'checkconnect_ajax':
		$conn=mysql_connect($mysql_host,$mysql_name,$mysql_pass);
		if($conn){
			if(mysql_select_db($mysql_table)){
				echo '数据库信息正确！';
			}else{
				echo '数据库信息有误！';
			}
		}else{
			echo '数据库信息有误！';
		}
		break;
}
?>