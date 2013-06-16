<?php
//默认配置文件
//数据库
defined( 'WEB_IN' ) or die( 'Restricted access' );
require_once('dataconfig.inc.php');
/* 
$db_type='2';
$host='localhost';
$name='root';
$pass='';
$table='pj_zcncms';
$tablepre='';
$ut='utf8'; 
*/

//默认
$config['defaultController'] = 'index';
$config['defaultAction'] = 'default';
$config['defaultTemplates'] = 'templates';//20130222 增加风格模板所在主目录

//模型开关,功能开关
$config['modtype'] = array('index', 'links', 'articles', 'ads', 'keys', 'members', 'users', 'sys' ,'adflash', 'login', 'logout', 'reg', 'forgetpassword', 'changepassword', 'txt', 'members_log', 'users_log', 'sitemaps', 'filecheck', 'articles_class', 'links_class', 'ads_class', 'members_class', 'users_class', 'users_classpower');
//权限开关
//uc整合开关，暂无
//外部引用文件
include('sys.inc.php');

//伪静态开关
$config['linkurlmode'] = 0;//0为不伪静态 1为伪静态 此处为单独设置 切记 后台覆盖此设置

//个性模板开关，针对分类，id classid 有单独模板的mod
$config['customtemplatemode'] = 1;//0为不 模板后缀默认 .php
$config['classpower'] = 0;//后台编辑分类权限 classid>2
$config['membersmode'] = 0;
$templatefile = '';

//缓存设置等

//程序信息
$version='1.2.12';
?>