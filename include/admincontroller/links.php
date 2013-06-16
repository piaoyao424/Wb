<?php
/**
* ZCNCMS
* 链接
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '链接管理';
$pagepower = 'links';
//基本部分
require('checkpower.inc.php');
//功能部分
include(WEB_MOD.'links.class.php');
include(WEB_MOD.'links_class.class.php');
$links=new Links();
$links_class=new Links_class();
switch($a)
{
	case 'list':default://list
		$pageListNum=12;//每页显示
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List=$links->GetList(array('id','classid','title','linkurl'),$start,$pageListNum,'','id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}links";
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		$templatefile = 'links_list.tpl.php';
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
			if(!empty($starttime)) {
				$starttime = strtotime($starttime);
			} else{
				$starttime = $starttime;
			}
			if(!empty($endtime)) {
				$endtime =strtotime($endtime);
			} else{
				$endtime = $endtime;
			}
			$info=array('classid'=>$classid,
						'title'=>$title,
						'thumb'=>$thumb,
						'linkurl'=>$linkurl,
						'starttime'=>$starttime,
						'endtime'=>$endtime
						);
			if(isset($id)){
				if($links->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($links->Add($info)){
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
				$info = $links->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
			} 
			$classList = $links_class->GetList();
			$templatefile = 'links_edit.tpl.php';
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
		if($links->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>