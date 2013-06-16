<?php
/**
* ZCNCMS
* 轮转广告
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '轮转广告管理';
$pagepower = 'adflash';
//基本部分
require('checkpower.inc.php');
//功能部分
include(WEB_MOD.'adflash.class.php');
$adflash=new Adflash();
switch($a)
{
	case 'list':default://list
		$pageListNum=12;//每页显示
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List=$adflash->GetList(array('id','title','thumb','linkurl','orders'),$start,$pageListNum,'','id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}adflash";
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		$templatefile = 'adflash_list.tpl.php';
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
			if(empty($orders)) {
				$orders = '0';
			}
			$info=array('title'=>$title,
						'thumb'=>$thumb,
						'linkurl'=>$linkurl,
						'orders'=>$orders
						);
			if(isset($id)){
				if($adflash->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($adflash->Add($info)){
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
				$info = $adflash->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
			} 
			$templatefile = 'adflash_edit.tpl.php';
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
		if($adflash->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>