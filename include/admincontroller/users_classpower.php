<?php
/**
* ZCNCMS
* 用户
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '用户';
$pagepower = 'users';
//基本部分
require('checkpower.inc.php');
//功能部分
include(WEB_MOD.'users.class.php');
$users=new Users();
include(WEB_MOD.'users_class.class.php');
$users_class=new Users_class();
include(WEB_MOD.'users_classpower.class.php');
$users_classpower=new Users_classpower();
switch($a)
{
	case 'list':default://list
		
		if($config['classpower'] == 1 && is_file(WEB_CACHE.'modpower.cache.php')){
			include(WEB_CACHE.'modpower.cache.php');
			$cache_modpower["module_class"]["articles"] = array('1','文章');
			if($cache_modpower["module_class"][$modulename][0] == 1) {
				//
			} else {
				errorinfo('变量错误','');
			}
		}
		
		if(isset($submit)){
		
			$info = array();
			
			//组合权限
			$power = '';
			if(isset($classpower_list) && is_array($classpower_list))
			{
				$power = implode(",",$classpower_list);
			}
			else
			{
				$power = '';
			}
			
			$info=array('userid'=>$userid,
						'classpower'=>$power,
						'modulename'=>$modulename
						);
			$id = intval($id);
			if($id > 0){
				if($users_classpower->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($users_classpower->Add($info)){
					errorinfo('添加成功','');
				}else{
					errorinfo('添加失败','');
				}
			}
		
		}
		if(is_file(WEB_MOD.$modulename.'_class'.'.class.php')){
			include_once(WEB_MOD.$modulename.'_class'.'.class.php');
		}elseif(is_file(WEB_MODULE.$modulename.'/model/'.$modulename.'_class'.'.class.php')){
			include_once(WEB_MODULE.$modulename.'/model/'.$modulename.'_class'.'.class.php');
		}
		
		$userinfo = array();
		$time = time();
		if(isset($userid)){
			$userid = intval($userid);
			if($userid <= 0){
				errorinfo('变量错误','');
			}
			$userinfo = $users->GetInfo('',' id = '.$userid);
			if(empty($userinfo)){
				errorinfo('变量错误','');
			}
		} 
		
		$info = array();
		
		$info = $users_classpower->GetInfo(''," userid = ".$userid." and modulename = '".$modulename."' ");
		if(!empty($info)){
			if(isset($info['classpower'])){
				$power = array();
				$power = explode(",",$info['classpower']);
				foreach($power AS $key=>$value)
				{
					$power_list[$value] = true;
				}
			}
		}
		
		$theModuleClass = ''.ucfirst($modulename.'_class');
		$theModule = new $theModuleClass;
		require_once(WEB_INC.'uclass.class.php');
		$CL = new Uclass();
		$List = $theModule->GetList();
		$List = $CL->arraySet($List,0);
		$templatefile = 'users_classpower.tpl.php';
		break;
}
?>