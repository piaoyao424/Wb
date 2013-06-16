<?php
/**
* ZCNCMS
* 用户登陆
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '系统登陆';
$loginerror = '';
//功能部分
if(isset($submit)){
	include(WEB_MOD.'users.class.php');
	$users=new Users();
	$password = md5($password);
	$userslogin = array();
	$userslogin = $users->yz($username,$password);
	if(!empty($userslogin) && count($userslogin) > 0){
		$_SESSION['admin_username'] = $userslogin['username'];
		$_SESSION['admin_classid'] = $userslogin['classid'];
		$_SESSION['admin_power'] = $userslogin['power'];
		$_SESSION['admin_id'] = $userslogin['id'];
		
		//记录登陆信息
		include(WEB_MOD.'users_log.class.php');
		$users_log = new Users_log();
		$users_last_log = $users_log -> GetLastLog(array(),"`action`='login' and userid =" . $userslogin['id']);
		$_SESSION['admin_last_log'] = $users_last_log;
		$timenow = time();
		$info = array(
		'userid' => $userslogin['id'],
		'action'=> 'login',
		'ipaddr'=> GetIP(),
		'addtime' => $timenow
		);
		//print_r($_SESSION['members_last_log']);
		//print_r($info);
		$users_log -> Add($info);
		header("location:./");
		exit;
	} else {
		//echo 1;
		$loginerror = '用户名密码错误，请重新登陆.';
		$templatefile = 'login.tpl.php';
	}
} else {
	$templatefile = 'login.tpl.php';
}
?>