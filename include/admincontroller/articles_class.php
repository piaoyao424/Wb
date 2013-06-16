<?php
/**
* ZCNCMS
* 文章分类编辑
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '文章分类编辑';
$pagepower = 'articles_class';
//基本部分
require('checkpower.inc.php');
//功能部分
include(WEB_MOD.'articles.class.php');
include(WEB_MOD.'articles_class.class.php');
$articles=new Articles();
$articles_class=new Articles_class();
require_once(WEB_INC.'uclass.class.php');
$CL = new Uclass();
switch($a)
{
	case 'list':default://list
		$List=$articles_class->GetList(array('id','rootid','title','parentid'));
		$List = $CL->arraySet($List,0);
		$templatefile = 'articles_class_list.tpl.php';
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
				
				//20120719
				checkClassPower('articles',$id);
				
				$infoold = $articles_class->GetInfo('',' id = '.$id);
				//改变分类从属判断
				if($parentid != $infoold['parentid']) {
					$classNum = $articles_class->GetClassCount($id);
					if($classNum > 0) {
						errorinfo('对不起，该分类有子分类','');
					}
				}
			} 
			//分析根分类
			if($parentid == 0) {
				$rootid = 0;
			} else{
				$parent = $articles_class->GetInfo('',' id = '.$parentid);
				if($parent['parentid'] == 0) {
					$rootid = $parentid;
				} else{
					$rootid = $parent['rootid'];
				}
			}
			if(!empty($filename) && (isset($id) && $filename != $infoold['filename'])) {
				$namea = $articles_class->GetInfo(''," `filename` = '".$filename."' ");
				if(!empty($namea)) {
					errorinfo('对不起，自定义name已经使用过了，请更换自定义name','');
				}
			}
			$info=array('parentid'=>$parentid,
						'title'=>$title,
						'seotitle'=>$seotitle,
						'seokeyword'=>$seokeyword,
						'seointro'=>$seointro,
						'filename'=>$filename,
						'listnum'=>$listnum,
						'thumb'=>$thumb,
						'intro'=>$intro,
						'template'=>$template,
						'linkurl'=>$linkurl,
						'orders'=>$orders,
						'rootid'=>$rootid
						);
			if(isset($id)){
				if($articles_class->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($articles_class->Add($info)){
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
				$info = $articles_class->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
				//20120719
				checkClassPower('articles',$id);
			} 
			
			$classList = $articles_class->GetList();
			$classList = $CL->arraySet($classList,0);
			$templatefile = 'articles_class_edit.tpl.php';
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
			//20120719
			checkClassPower('articles',$value);
			$classNum = $articles_class->GetClassCount($value);
			if($classNum > 0) {
				errorinfo('对不起，该分类('.$value.')有子分类','');
			}
			$infoNum = $articles->GetInfoCount($value);
			if($infoNum > 0) {
				errorinfo('对不起，该分类('.$value.')下有内容','');
			}
		}
		
		if($articles_class->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>