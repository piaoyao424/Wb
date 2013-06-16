<?php
/**
* ZCNCMS
* 留言分类管理
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '留言分类管理';
$pagepower = 'books_class';
$moduleRoot = WEB_MODULE.'books/';
//基本部分
require(WEB_INC.WEB_APP.'controller/'.'checkpower.inc.php');
//功能部分
include($moduleRoot.'model/'.'books.class.php');
include($moduleRoot.'model/'.'books_class.class.php');
$books=new Books();
$books_class=new Books_class();
require_once(WEB_INC.'uclass.class.php');
$CL = new Uclass();
switch($a)
{
	case 'list':default://list
		$List=$books_class->GetList(array('id','title'));
		//$List = $CL->arraySet($List,0);
		if(is_file(WEB_TPL . 'books_class_list.tpl.php')){
			$templatefile = 'books_class_list.tpl.php';
		} else {
			$tpl_in_module = 1;
			$templatefile = $moduleRoot.WEB_APP.'templates/'.'books_class_list.tpl.php';
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
			} 
			//分析根分类
			
			$info=array('title'=>$title
						);
			if(isset($id)){
				if($books_class->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($books_class->Add($info)){
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
				$info = $books_class->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
			} 
			if(is_file(WEB_TPL . 'books_class_edit.tpl.php')){
				$templatefile = 'books_class_edit.tpl.php';
			} else {
				$tpl_in_module = 1;
				$templatefile = $moduleRoot.WEB_APP.'templates/'.'books_class_edit.tpl.php';
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
			$infoNum = $books->GetInfoCount($value);
			if($infoNum > 0) {
				errorinfo('对不起，该分类('.$value.')下有信息','');
			}
		}
		
		if($books_class->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>