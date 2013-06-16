<?php
defined( 'WEB_IN' ) or die( 'Restricted access' );
$admin_classid=isset($_SESSION['admin_classid'])?$_SESSION['admin_classid']:NULL;
$admin_power=isset($_SESSION['admin_power'])?$_SESSION['admin_power']:NULL;	
$admin_username=isset($_SESSION['admin_username'])?$_SESSION['admin_username']:NULL;	
$admin_id=isset($_SESSION['admin_id'])?$_SESSION['admin_id']:NULL;	
//file_put_contents('11.txt',$pagepower.'='.session_id());
//登陆检测
if($admin_classid==""||$admin_username==""||$admin_id==""){
	Header("Location:?c=login");
	//echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>尚未登录,请<a href=?c=login'>登陆</a>";
	exit;
}
//权限检测 999 sys articles books log   系统1
//说明 系统管理员classid=1具有最大权限 系统权限999为基本权限 其他按照权限解析
if($admin_classid != 1){
	if (isset($pagepower)){
		if($pagepower != '999'){
			$adminpowerlist=explode(",",$admin_power);
			if(!in_array($pagepower,$adminpowerlist)) {
				$errorInfo = '用户权限不足';
				$errorLink = 'javascript:history.go(-1)';
				errorInfo($errorInfo,$errorLink);
			}
		}
	}
}

function checkClassPower($modulename,$classid){
	global $admin_classid,$admin_id,$config;
	if($config['classpower'] == 1){
		if($admin_classid > 2) {
			if(!class_exists('user_classpower')){
			include_once(WEB_MOD.'users_classpower.class.php');
			}
			$users_classpower=new Users_classpower();
			$info = array();
			$info = $users_classpower->GetInfo(''," userid = ".$admin_id." and modulename = '".$modulename."' ");
			if(!empty($info)){
				if(isset($info['classpower'])){
					$power = array();
					$power = explode(",",$info['classpower']);
					if(!in_array($classid,$power)){
						errorInfo('用户权限不足(代码:c)','');
					}
				}
			} else {
				errorInfo('用户权限不足(代码:cnone)','');
			}
		}
	}
}
?>