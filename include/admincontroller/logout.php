<?php
/**
* ZCNCMS
* 用户退出
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '用户退出';
//功能部分
$_SESSION['admin_username']="";
$_SESSION['admin_classid']=""; 
$_SESSION['admin_id']=""; 
$_SESSION['admin_last_log']=""; 
$_SESSION['admin_power']=""; 
header("location:./?c=login");
exit;
?>