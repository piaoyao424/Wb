<?php
/**
* ZCNCMS
* 导航管理
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '导航管理';
$pagepower = 'menus';
$moduleRoot = WEB_MODULE.'menus/';
//基本部分
require(WEB_INC.WEB_APP.'controller/'.'checkpower.inc.php');
//功能部分
include($moduleRoot.'model/'.'menus.class.php');
$menus=new Menus();
require_once(WEB_INC.'uclass.class.php');
$CL = new Uclass();
switch($a)
{
	case 'list':default://list
		$List=$menus->GetList();
		$List = $CL->arraySet($List,0);
		if(is_file(WEB_TPL . 'menus_list.tpl.php')){
			$templatefile = 'menus_list.tpl.php';
		} else {
			$tpl_in_module = 1;
			$templatefile = $moduleRoot.WEB_APP.'templates/'.'menus_list.tpl.php';
		}
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
				
								
				$infoold = $menus->GetInfo('',' id = '.$id);
				//改变分类从属判断
				if($parentid != $infoold['parentid']) {
					$List = $menus->GetList('',0,1," parentid = $id ",'');
					if(!empty($List)) {
						errorinfo('对不起，该导航('.$id.')下有子导航','');
					}
				}
			} 
			//分析根分类
			if($parentid == 0) {
				$rootid = 0;
			} else{
				$parent = $menus->GetInfo('',' id = '.$parentid);
				if($parent['parentid'] == 0) {
					$rootid = $parentid;
				} else{
					$rootid = $parent['rootid'];
				}
			}
			
			$info=array('parentid'=>$parentid,
						'title'=>$title,
						'linkurl'=>$linkurl,
						'target'=>$target,
						'orders'=>$orders,
						'rootid'=>$rootid
						);
			if(isset($id)){
				if($menus->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($menus->Add($info)){
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
				$info = $menus->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
			} 
			
			$classList = $menus->GetList('','',''," parentid = 0 ",'');
			
			if(is_file(WEB_TPL . 'menus_edit.tpl.php')){
				$templatefile = 'menus_edit.tpl.php';
			} else {
				$tpl_in_module = 1;
				$templatefile = $moduleRoot.WEB_APP.'templates/'.'menus_edit.tpl.php';
			}
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
			$List = $menus->GetList('',0,1," parentid = $value ",'');
			if(!empty($List)) {
				errorinfo('对不起，该导航('.$value.')下有子导航','');
			}
		}
		
		if($menus->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>