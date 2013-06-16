<?php
/**
* ZCNCMS
* 文章编辑
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '文章编辑';
$pagepower = 'articles';
$where = '';
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
		
		//列表
		if (empty($classid)) {
			$where = ' 1 = 1 ';
		} else {
			$where = " classid = '".$classid."' ";
		}
		
		$pageListNum=12;//每页显示
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List=$articles->GetList(array('id','classid','title','addtime'),$start,$pageListNum,$where,'id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}articles where ".$where;
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		$templatefile = 'articles_list.tpl.php';
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
				$infoold = $articles->GetInfo('',' id = '.$id);
			} 
			//20120719
			checkClassPower('articles',$classid);
			if(!empty($addtime)) {
				$addtime = strtotime($addtime);
			} else{
				$addtime = $addtime;
			}
			if(!empty($authortime)) {
				$authortime = $authortime;
			} else{
				$authortime = $authortime;
			}
			if(!empty($filename) && (isset($id) && $filename != $infoold['filename'])) {
				$namea = $articles->GetInfo(''," `filename` = '".$filename."' ");
				if(!empty($namea)) {
					errorinfo('对不起，自定义name已经使用过了，请更换自定义name','');
				}
			}
			$info=array('classid'=>$classid,
						'title'=>$title,
						'seotitle'=>$seotitle,
						'seokeyword'=>$seokeyword,
						'seointro'=>$seointro,
						'filename'=>$filename,
						'fromtitle'=>$fromtitle,
						'fromlinkurl'=>$fromlinkurl,
						'titlecolor'=>$titlecolor,
						'thumb'=>$thumb,
						'intro'=>$intro,
						'author'=>$author,
						'content'=>$content,
						'addtime'=>$addtime,
						'authortime'=>$authortime,
						'template'=>$template,
						'linkurl'=>$linkurl,
						'clicks'=>$clicks,
						'isplay'=>$isplay,
						'ishot'=>$ishot,
						'istop'=>$istop,
						'isgood'=>$isgood
						);
			if(isset($id)){
				if($articles->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($articles->Add($info)){
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
				$info = $articles->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
				//20120719
				checkClassPower('articles',$info['classid']);
			} 
			$classList = $articles_class->GetList();
			$classList = $CL->arraySet($classList,0);
			$templatefile = 'articles_edit.tpl.php';
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
			
			$info = $articles->GetInfo('',' id = '.$value);
			if(empty($info)){
				errorinfo('变量错误','');
			}
			//20120719
			checkClassPower('articles',$info['classid']);
			if($value <= 0){
					errorinfo('变量错误','');
			}
		}
		if($articles->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>