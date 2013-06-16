<?php
/**
* ZCNCMS
* 留言
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '留言';
$topTitle = '';
$where = '';
$moduleRoot = WEB_ROOT.'module/books/';
//功能部分
include($moduleRoot.'model/'.'books.class.php');
include($moduleRoot.'model/'.'books_class.class.php');
$books=new Books();
$books_class=new Books_class();
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
		$info = array();
		$info = $books_class->GetInfo(array('id','title'),$where);
		
		if(empty($info)){
			$errorInfo ='变量错误';
			errorinfo($errorInfo,'');
		}
		$topTitle = $info['title'];
		//20120808
		if (empty($classid)) {
			$topTitle = '列表';
		}
		//列表
		if (empty($classid)) {
			$where = ' isplay = 1 ';
		} else {
			$where = " classid = '".$classid."' and isplay = 1 ";
		}	
		$pageListNum=12;//每页显示
		$totalPage=0;//总页数
		$page=isset($page)?(int)$page:1;
		$start=($page-1)*$pageListNum;
		$List = $books->GetList(array('id','classid','title','content','backcontent','niname','addtime'),$start,$pageListNum,$where,'id desc');
		include WEB_INC."page.class.php";
		$sqlNum="select id from {tablepre}books where ".$where;
		$db->Execute($sqlNum);
		$pageNum=$db->GetRsNum();
		$totalPage=ceil($pageNum/$pageListNum);//总页数				
		$pages=new PageClass($page,$totalPage);
		$showpage=$pages->showPage(); 
		if(is_file(WEB_TPL . 'books_list.tpl.php')){
			$templatefile = 'books_list.tpl.php';
		} else {
			$tpl_in_module = 1;
			$templatefile = $moduleRoot.'templates/'.'books_list.tpl.php';
		}
		if($config['customtemplatemode'] == 1) {
		  //==========个性化模版检测20111208===============
		  $custom_templates = '';
		  $custom_templates = $c.'_'.$a.'_classid_'.$info['id'].'.tpl.php';
		  if(is_file(WEB_TPL . 'custom_templates/'.$custom_templates)){
			  $tpl_in_module = 0;
			  $templatefile = 'custom_templates/'.$custom_templates;
		  }
		  //====================================
		}
		break;
	case 'search':default://list
		
		break;
	case 'add'://
		if(isset($submit)){
			$info = array();
			$time = time();
			if(!isset($classid)){
				$classid = 1;
			}
			$classid = intval($classid);
			if($classid < 1){
				$classid = 1;
			}
			$v->Validate($niname,'姓名','safein','1','',3,15);
			$v->Validate($title,'标题','safein','1','',0,50);
			$v->Validate($addr,'地址','safein','1','',0,50);
			$v->Validate($tel,'电话','safein','1','',0,50);
			$v->Validate($mobile,'手机','safein','1','',0,50);
			$v->Validate($msn,'msn','safein','1','',0,50);
			$v->Validate($email,'email','safein','1','',1,100);
			$v->Validate($qq,'qq','safein','1','',0,50);
			//if($content == ''){
			//	errorinfo('请输入留言内容','');
			//}
			$v->Validate($content,'留言','safein','1','',3,300);
			$info=array('title'=>$title,
						'email'=>$email,
						'tel'=>$tel,
						'mobile'=>$mobile,
						'addr'=>$addr,
						'qq'=>$qq,
						'msn'=>$msn,
						'content'=>$content,
						'classid'=>$classid,
						'memberid'=>'0',
						'niname'=>$niname,
						'addtime'=>$time,
						'ipaddr'=>GetIP(),
						'isok'=>'0',
						'isplay'=>'0'
						);
			if(isset($id)){
				//只有添加
			} else {
				if($books->Add($info)){
					errorinfo('信息反馈成功','?c=books&a=add');
				}else{
					errorinfo('信息反馈失败','');
				}
			}
			
		} else {
			if(!isset($classid)){
				$classid = 1;
			}
			$classid = intval($classid);
			if($classid < 1){
				$classid = 1;
			}
			if(is_file(WEB_TPL . 'books_add.tpl.php')){
				$templatefile = 'books_add.tpl.php';
			} else {
				$tpl_in_module = 1;
				$templatefile = $moduleRoot.'templates/'.'books_add.tpl.php';
			}
		}
		break;
}
?>