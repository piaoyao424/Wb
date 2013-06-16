<?php
/**
* ZCNCMS
* 下载编辑
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '下载编辑';
$pagepower = 'downloads';
$where = '';
$moduleRoot = WEB_MODULE.'downloads/';
//基本部分
require(WEB_INC.WEB_APP.'controller/'.'checkpower.inc.php');
//功能部分
include($moduleRoot.'model/'.'downloads.class.php');
include($moduleRoot.'model/'.'downloads_class.class.php');
$downloads=new Downloads();
$downloads_class=new Downloads_class();
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
		$List=$downloads->GetList(array('id','classid','title','addtime'),$start,$pageListNum,$where,'id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}downloads where ".$where;
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		if(is_file(WEB_TPL . 'downloads_list.tpl.php')){
			$templatefile = 'downloads_list.tpl.php';
		} else {
			$tpl_in_module = 1;
			$templatefile = $moduleRoot.WEB_APP.'templates/'.'downloads_list.tpl.php';
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
				$infoold = $downloads->GetInfo('',' id = '.$id);
			} 
			
			//20120719
			checkClassPower('downloads',$classid);
			
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
				$namea = $downloads->GetInfo(''," `filename` = '".$filename."' ");
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
						'dlinkname'=>$dlinkname,
						'dlink'=>$dlink,
						'clicks'=>$clicks,
						'isplay'=>$isplay,
						'ishot'=>$ishot,
						'istop'=>$istop,
						'isgood'=>$isgood
						);
			if(isset($id)){
				if($downloads->Update($info,' id ='.$id)){
					errorinfo('编辑成功','');
				}else{
					errorinfo('编辑失败','');
				}
			} else {
				if($downloads->Add($info)){
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
				$info = $downloads->GetInfo('',' id = '.$id);
				if(empty($info)){
					errorinfo('变量错误','');
				}
				
				//20120719
				checkClassPower('downloads',$info['classid']);
				
			} 
			$classList = $downloads_class->GetList();
			$classList = $CL->arraySet($classList,0);
			if(is_file(WEB_TPL . 'downloads_edit.tpl.php')){
				$templatefile = 'downloads_edit.tpl.php';
			} else {
				$tpl_in_module = 1;
				$templatefile = $moduleRoot.WEB_APP.'templates/'.'downloads_edit.tpl.php';
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
			$info = $downloads->GetInfo('',' id = '.$value);
			if(empty($info)){
				errorinfo('变量错误','');
			}
			//20120719
			checkClassPower('downloads',$info['classid']);
		}
		if($downloads->Del($ids)){
			errorinfo('删除成功','');
		}else{
			errorinfo('删除失败','');
		} 
		break;
}
?>