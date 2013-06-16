<?php
/**
* ZCNCMS
* 文章
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '文章';
$topTitle = '';
$where = '';
//功能部分
include(WEB_MOD.'articles.class.php');
include(WEB_MOD.'articles_class.class.php');
$articles=new Articles();
$articles_class=new Articles_class();
include(WEB_MOD.'ads.class.php');
include(WEB_MOD.'adflash.class.php');
$ads=new Ads();
$adflash=new Adflash();
include(WEB_MOD.'keys.class.php');
$keys=new Keys();
include(WEB_INC.'validator.class.php');
$v = new Validator();
include(WEB_MOD.'links.class.php');
$links=new Links();
$templatefile = '';
$classinfo = '';
//
//classid
if(isset($classid)) {
	$classid = intval($classid);
}
if(isset($id)) {
	$id = intval($id);
}
if(isset($filename)) {
	$v->Validate($filename,'变量','safein','1','',0,100);
}
$where = ' 1 = 1 ';

switch($a)
{
	case 'list':default://list
		if (empty($classid)) {
			
		} else {
			$where = $where . ' and id = '.$classid.' ';
		}
		if (isset($filename) && !empty($filename)) {
			$where = $where . " and `filename` = '".$filename."' ";
		}
		$info = array();
		$info = $articles_class->GetInfo(array('id','title','seotitle','seokeyword','seointro','filename','listnum','linkurl','intro','thumb','rootid'),$where);
		if(empty($info)){
			$errorInfo ='变量错误';
			errorinfo($errorInfo,'');
		}
		//20120919
		if (isset($filename) && !empty($filename)) {
			$classid = $info['id'];
		}
		$topTitle = $info['title'];
		//20120808 //20120919
		if (empty($classid) && empty($filename)) {
			$topTitle = '列表';
		}
		//seo新增 20120706
		if(!empty($info['seotitle'])) {
		  $topTitle = $info['seotitle'];
		}
		if(!empty($info['seokeyword'])) {
		  $sys['webkeywords'] = $info['seokeyword'];
		}
		if(!empty($info['seointro'])) {
		  $sys['webdescription'] = $info['seointro'];
		}
		//转连接
		if(!empty($info['linkurl'])) {
			header("Location: ".$info['linkurl']."");
			exit;
		}
		//列表
		if (empty($classid)) {
			$where = ' isplay = 1 ';
		} else {
			$where = " classid = '".$classid."' and isplay = 1 ";
		}		
		if (isset($filename) && !empty($filename)) {
			$where = $where . " and `classid` = '".$info['id']."' ";
		}
		$pageListNum=12;//每页显示
		//20120715
		if(intval($info['listnum']) > 0){
			$pageListNum = $info['listnum'];
		}
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List = $articles->GetList(array('id','classid','title','filename','addtime','thumb','intro','titlecolor','author','clicks','istop'),$start,$pageListNum,$where,'istop desc,addtime desc,id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}articles where ".$where;
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		$templatefile = 'articles_list.tpl.php';
		if($config['customtemplatemode'] == 1) {
		  //==========个性化模版检测20111208===============
		  $custom_templates = '';
		  $custom_templates = $c.'_'.$a.'_classid_'.$info['id'].'.tpl.php';
		  if(is_file(WEB_TPL . 'custom_templates/'.$custom_templates)){
			  $templatefile = 'custom_templates/'.$custom_templates;
		  }
		  //====================================
		}
		break;
	case 'search':default://list
		
		//echo $keyword;
		$where = ' isplay = 1 ';
		if(isset($submit)){
			if(!empty($keyword)) {
				$keyword = trim($keyword);
				$v->Validate($keyword,'关键词','safein','1','',0,50);
				$where = $where." and title like '%".$keyword."%' ";
			}		
		}
		
		$pageListNum=12;//每页显示
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List = $articles->GetList(array('id','classid','title','filename','addtime','intro','titlecolor','author','clicks','istop'),$start,$pageListNum,$where,'istop desc,addtime desc,id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}articles where ".$where;
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		$templatefile = 'articles_list.tpl.php';
		break;
	case 'show'://
		$where = '';
		if (isset($id) && !empty($id)) {
			$where = ' id = '.$id.' ';
		}				
		if (isset($filename) && !empty($filename)) {
			$where = " `filename` = '".$filename."' ";
		}
		if(empty($where)){
			$errorInfo ='变量错误';
			errorinfo($errorInfo,'');
		}
		//echo $where;
		$info = array();
		$info = $articles->GetInfo(array('id','classid','title','seotitle','seokeyword','seointro','filename','fromlinkurl','fromtitle','content','author','addtime','clicks','linkurl','isplay','thumb','titlecolor','intro'),$where);
		if(empty($info)){
			$errorInfo ='变量错误';
			errorinfo($errorInfo,'');
		}
		
		$classid = $info['classid'];		
		$classinfo = $articles_class->GetInfo(array('id','title','filename','linkurl','rootid')," id = $classid ");
		
		//上一条 下一条信息
		$preinfo = array();
		$nextinfo = array();
		$sql = " select * from  {tablepre}articles where classid = $classid and id < ".$info['id']." order by id desc limit 0,1 ";
		//echo $sql;
		$db->Execute($sql);
		$t_r=$db->GetArray();
		//print_r($t_r);
		if($t_r){
			$preinfo =  $t_r[0];
		}
		$sql = " select * from  {tablepre}articles where classid = $classid and id > ".$info['id']." order by id asc limit 0,1 ";
		//echo $sql;
		$db->Execute($sql);
		$t_r=$db->GetArray();
		if($t_r){
			$nextinfo = $t_r[0];
		}
		
		//点击统计 待添加
		$clicks = $info['clicks'] + 1;
		$articles->Update(array('clicks' => $clicks),$where);
		//信息审核
		if($info['isplay'] == '0') {
			$errorInfo ='该信息未审核';
			errorinfo($errorInfo,'');
		}
		//转连接
		if(!empty($info['linkurl'])) {
			header("Location: ".$info['linkurl']."");
			exit;
		}
		$topTitle = $info['title'];
		//seo新增 20120409
		if(!empty($info['seotitle'])) {
		  $topTitle = $info['seotitle'];
		}
		if(!empty($info['seokeyword'])) {
		  $sys['webkeywords'] = $info['seokeyword'];
		}
		if(!empty($info['seointro'])) {
		  $sys['webdescription'] = $info['seointro'];
		}
		//附加功能20120426==========================================
		function show_keyword($content,$keyList){
			//把图片描述去掉
			$content=preg_replace("/ alt=([^ >]+)/is","",$content);
			foreach( $keyList AS $key=>$value){
				//$content=str_replace($key,"<a href=$value style=text-decoration:underline;font-size:14px;color:{$webdb[ShowKeywordColor]}; target=_blank>$key</a>",$content);
				//$keyword = $value['title'];
				if($value['replacenum'] == 0){
					$content=str_replace($value['title'],'<a href='.$value['linkurl'].' target=_blank>'.$value['title'].'</a>',$content);
				} else{		
					$content=preg_replace('/'.$value['title'].'/is','<a href='.$value['linkurl'].' target=_blank>'.$value['title'].'</a>',$content,$value['replacenum']);
				}
		
			}
			return $content;
		}
		$timeNow = time();
		$keyWhere = "(starttime < $timeNow or starttime = NUll or starttime = 0) and (endtime > $timeNow  or endtime = NUll or endtime = 0)";
		$keyList = $keys->GetList(array('id','linkurl','title','orders','replacenum'),'','',$keyWhere,'orders desc,id desc');
		$info['content'] = show_keyword($info['content'],$keyList);
		//=========================================
		//
		$time = time();
		$templatefile = 'articles_show.tpl.php';
		if($config['customtemplatemode'] == 1) {
		  //==========个性化模版检测20111208===============
		  $custom_templates = '';
		  $custom_templates = $c.'_'.$a.'_classid_'.$info['classid'].'.tpl.php';
		  if(is_file(WEB_TPL . 'custom_templates/'.$custom_templates)){
			  $templatefile = 'custom_templates/'.$custom_templates;
		  }
		  //==========个性化模版检测20120305===============
		  $custom_templates_s = '';
		  $custom_templates_s = $c.'_'.$a.'_id_'.$info['id'].'.tpl.php';
		  if(is_file(WEB_TPL . 'custom_templates/'.$custom_templates_s)){
			  $templatefile = 'custom_templates/'.$custom_templates_s;
		  }
		  //====================================
		}
		break;
}
//调用
$newList = $articles->GetList(array('id','classid','title','filename','addtime','titlecolor'),'0','7',' isplay = 1 ','addtime desc,id desc');
$hotList = $articles->GetList(array('id','classid','title','filename','addtime','titlecolor'),'0','5',' isplay = 1 and ishot = 1 ','id desc');
$topList = $articles->GetList(array('id','classid','title','filename','addtime','titlecolor'),'0','5',' isplay = 1 and istop = 1 ','id desc');
?>