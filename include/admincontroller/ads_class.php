<?php
/**
* ZCNCMS
* 广告分类管理
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '广告分类管理';
$pagepower = 'ads_class';
//基本部分
require('checkpower.inc.php');
//功能部分
include(WEB_MOD.'ads.class.php');
include(WEB_MOD.'ads_class.class.php');
$ads=new Ads();
$ads_class=new Ads_class();
require_once(WEB_INC.'uclass.class.php');
$CL = new Uclass();
switch($a)
{
	case 'list':default://list
		$List=$ads_class->GetList(array('id','title'));
		//$List = $CL->arraySet($List,0);
		$templatefile = 'ads_class_list.tpl.php';
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
			
			$info=array('title'=>$title
						);
			if(isset($id)){
				if($ads_class->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($ads_class->Add($info)){
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
				$info = $ads_class->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
			} 
			$templatefile = 'ads_class_edit.tpl.php';
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
			$infoNum = $ads->GetInfoCount($value);
			if($infoNum > 0) {
				errorinfo('对不起，该分类('.$value.')下有信息','');
			}
		}
		
		if($ads_class->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>