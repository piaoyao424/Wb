<?php
/**
* ZCNCMS
* 首页
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '首页';
$topTitle = '';
$where = '';
//功能部分
include(WEB_MOD.'articles.class.php');
include(WEB_MOD.'articles_class.class.php');
$articles=new Articles();
$articles_class=new Articles_class();
include(WEB_MODULE.'downloads/model/downloads.class.php');
include(WEB_MODULE.'downloads/model/downloads_class.class.php');
$downloads=new Downloads();
$downloads_class=new Downloads_class();
include(WEB_MODULE.'products/model/products.class.php');
include(WEB_MODULE.'products/model/products_class.class.php');
$products=new Products();
$products_class=new Products_class();
include(WEB_MOD.'ads.class.php');
include(WEB_MOD.'adflash.class.php');
$ads=new Ads();
$adflash=new Adflash();
include(WEB_MOD.'links.class.php');
$links=new Links();



//调用
$newList = $articles->GetList(array('id','classid','title','filename','addtime','titlecolor'),'0','7',' isplay = 1 ','addtime desc,id desc');
$hotList = $articles->GetList(array('id','classid','title','filename','addtime','titlecolor'),'0','5',' isplay = 1 and ishot = 1 ','id desc');
$topList = $articles->GetList(array('id','classid','title','filename','addtime','titlecolor'),'0','5',' isplay = 1 and istop = 1 ','id desc');
$goodList = $articles->GetList(array('id','classid','title','filename','intro','thumb','titlecolor'),'0','5',' isplay = 1 and isgood = 1 ','id desc');
$templatefile = 'index.tpl.php';


?>