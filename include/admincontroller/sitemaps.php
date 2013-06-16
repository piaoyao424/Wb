<?php
/**
* ZCNCMS
* 网站地图
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '网站地图';
$pagepower = 'sys';
//基本部分
require('checkpower.inc.php');
//功能部分
include(WEB_MOD.'articles.class.php');
include(WEB_MOD.'articles_class.class.php');
$articles=new Articles();
$articles_class=new Articles_class();
require_once(WEB_INC.'uclass.class.php');
$CL = new Uclass();

//
$perSiteMpasNum = 500;
$sitemapsTop = '';
$sitempasEnd = '';
$sitemapsBody = '';
$sitemapsContent = '';
$sitemapsFilename = '';

switch($a)
{
	case 'step0':default://list
		$templatefile = 'sitemaps_step0.php';
		break;
	case 'step1'://
		//正式生成
		//数据初始化
		$listArticle = $articles->GetList(array('id','classid','title','addtime'),0,$perSiteMpasNum,'','id desc');
		$sitemapsTop = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
		$sitemapsTop = $sitemapsTop."<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
		$sitemapsEnd = "</urlset>\r\n";
		$templatefile = 'sitemaps_step1.php';
		break;
}
?>