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
switch($a)
{
	case 'list':default://list
		$pageListNum=12;//每页显示
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List=$users->GetList(array('id','username','classid'),$start,$pageListNum,'','id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}users";
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		$templatefile = 'users_list.tpl.php';
		break;
	case 'edit'://
		if(isset($submit)){
			$info = array();
			$time = time();
			if(isset($id)){
				$id = intval($id);
				if($id <= 0){
					errorinfo('变量错误','');
				}
			} 
			//重复
			if(!isset($id)){
				$exec1 = '';
				$result1 = '';	
				$exec1 = "SELECT username FROM {tablepre}users WHERE `username` = '".$username."' ";
				$result1=$db->Execute($exec1);
				if ($result1)
				{
					errorinfo('账号重复','');
				}
			}
			//处理密码
			if(!empty($password)){
				$password = md5($_POST['password']);
			} else{
				if(!empty($id)){
					$info = $users->GetInfo('',' id = '.$id);
					$password = $info['password'];//为空不修改
				} else{
					$password = md5('123456');//为空为‘123456’
				}
			}
			unset($info);
			//组合权限
			$power = '';
			if(isset($power_list) && is_array($power_list))
			{
				$power = implode(",",$power_list);
			}
			else
			{
				$power = '';
			}
			$info=array('username'=>$username,
						'password'=>$password,
						'classid'=>$classid,
						'email'=>$email,
						'power'=>$power
						);
			if(isset($id)){
				if($users->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($users->Add($info)){
					errorinfo('添加成功','');
				}else{
					errorinfo('添加失败','');
				}
			}
		} else {
			$info = array();
			$time = time();
			if(isset($id)){
				$id = intval($id);
				if($id <= 0){
					errorinfo('变量错误','');
				}
				$info = $users->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
			} 
			$classList = $users_class->GetList();
			if(isset($info['power'])){
				$power = array();
				$power = explode(",",$info['power']);
				foreach($power AS $key=>$value)
				{
					$power_list[$value] = true;
				}
			}
			$templatefile = 'users_edit.tpl.php';
		}
		break;
	case 'search'://
		
		break;
	case 'show'://
		
		break;

	case 'del'://
		$ids = array();
		if(isset($id)){
			if(is_array($id)){
				$ids = $id;
			} else {
				$ids[] = $id;
			}
			
		} else {
			errorinfo('变量错误','');
		}
		foreach($ids as $key=>$value){
			$value = intval($value);
			if($value <= 0){
					errorinfo('变量错误','');
			}
		}
		if($users->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>