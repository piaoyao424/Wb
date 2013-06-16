<?php
/**
* ZCNCMS
* 产品分类编辑
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '产品分类编辑';
$pagepower = 'products_class';
$moduleRoot = WEB_MODULE.'products/';
//基本部分
require(WEB_INC.WEB_APP.'controller/'.'checkpower.inc.php');
//功能部分
include($moduleRoot.'model/'.'products.class.php');
include($moduleRoot.'model/'.'products_class.class.php');
$products=new Products();
$products_class=new Products_class();
require_once(WEB_INC.'uclass.class.php');
$CL = new Uclass();
switch($a)
{
	case 'list':default://list
		$List=$products_class->GetList(array('id','rootid','title','parentid'));
		$List = $CL->arraySet($List,0);
		if(is_file(WEB_TPL . 'products_class_list.tpl.php')){
			$templatefile = 'products_class_list.tpl.php';
		} else {
			$tpl_in_module = 1;
			$templatefile = $moduleRoot.WEB_APP.'templates/'.'products_class_list.tpl.php';
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
				
				//20120719
				checkClassPower('products',$id);
				
				$infoold = $products_class->GetInfo('',' id = '.$id);
				//改变分类从属判断
				if($parentid != $infoold['parentid']) {
					$classNum = $products_class->GetClassCount($id);
					if($classNum > 0) {
						errorinfo('对不起，该分类有子分类','');
					}
				}
			} 
			//分析根分类
			if($parentid == 0) {
				$rootid = 0;
			} else{
				$parent = $products_class->GetInfo('',' id = '.$parentid);
				if($parent['parentid'] == 0) {
					$rootid = $parentid;
				} else{
					$rootid = $parent['rootid'];
				}
			}
			if(!empty($filename) && (isset($id) && $filename != $infoold['filename'])) {
				$namea = $products_class->GetInfo(''," `filename` = '".$filename."' ");
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
				if($products_class->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($products_class->Add($info)){
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
				$info = $products_class->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
				
				//20120719
				checkClassPower('products',$id);
				
			} 
			
			$classList = $products_class->GetList();
			$classList = $CL->arraySet($classList,0);
			if(is_file(WEB_TPL . 'products_class_edit.tpl.php')){
				$templatefile = 'products_class_edit.tpl.php';
			} else {
				$tpl_in_module = 1;
				$templatefile = $moduleRoot.WEB_APP.'templates/'.'products_class_edit.tpl.php';
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
			
			//20120719
			checkClassPower('products',$value);
			
			$classNum = $products_class->GetClassCount($value);
			if($classNum > 0) {
				errorinfo('对不起，该分类('.$value.')有子分类','');
			}
			$infoNum = $products->GetInfoCount($value);
			if($infoNum > 0) {
				errorinfo('对不起，该分类('.$value.')下有内容','');
			}
		}
		
		if($products_class->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>