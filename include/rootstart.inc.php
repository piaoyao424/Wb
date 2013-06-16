<?php
//网站关闭
defined( 'WEB_IN' ) or die( 'Restricted access' );
if(!isset($a)) {$a = $config['defaultAction'];}
if(!isset($c)) {$c = $config['defaultController'];}
$actionName = $a;
$controllerName = $c;
//include(WEB_INC.'file.class.php');
//20120717
$config['modtype_module'] = array();
$config['modtype_module_arr'] = array();
$config['moduleName'] = '';
$tpl_in_module = 0;//模板配置参数
if(is_file(WEB_CACHE.'modtype.cache.php')){
	
} else {
	//module缓存
	make_module_cache();
}
include(WEB_CACHE.'modtype.cache.php');
//20121212
if(isset($cache_modtype)){
	$config['modtype_module'] = $cache_modtype['module'];
	$config['modtype_module_arr'] = $cache_modtype['module_arr'];
} else {
	$config['modtype_module'] = array();
	$config['modtype_module_arr'] = array();
}


if(in_array($controllerName,$config['modtype'])){
	$action = $actionName;
	actionNameCheck($actionName);
	$controller = $controllerName;
	$filepath = WEB_INC . WEB_APP . 'controller/' . $controller. '_' .$action.'.php';
	$filepath1 = WEB_INC . WEB_APP . 'controller/' . $controller. '.php';
//20120717	
} elseif(in_array($controllerName,$config['modtype_module'])) {
	$action = $actionName;
	actionNameCheck($actionName);
	$controller = $controllerName;
	
	$config['moduleName'] = in_module($controller);
	if(!$config['moduleName']){
		errorinfo('Sorry,module not found!');
	}	
	$filepath = WEB_MODULE . $config['moduleName'] . '/'. WEB_APP . 'controller/' . $controller. '_' .$action.'.php';
	$filepath1 = WEB_MODULE . $config['moduleName'] . '/'. WEB_APP . 'controller/' . $controller. '.php';
} else {
	errorinfo('Sorry,method not found!');
}

//echo $filepath;
if(is_file($filepath)) {
	include($filepath);	
} elseif(is_file($filepath1)) {
	include($filepath1);	
} else {
	errorinfo('Sorry,file not found!');
}
if(!empty($templatefile)) {
	include(WEB_INC . '/template.inc.php');
}


//20120717
function in_module($c){
	global $config;
	
	$modtype = $config['modtype_module_arr'];
	
	foreach($modtype as $key => $value){
		if(in_array($c,$value)){
			return $key;
		}
	}
	return false;
}

function actionNameCheck($actionName){
	$S_key=array('|',"'",'"','/','*',',','~',';','<','>','$',"`","^",".","\:");
	foreach($S_key as $value){
		if (strpos($actionName,$value)!==false){ 
			echo 'code:re_a';
			exit;
		}
	}
}

function make_module_cache(){
	$tmp_path = WEB_MODULE;
	$tmp_my_path=dir($tmp_path);
	$cache_modtype = array();
	$cache_modmenu = array();
	$cache_modpower = array();
	while($tmp_my_file=$tmp_my_path->read()){
	
		if((is_dir("$tmp_path$tmp_my_file")) AND ($tmp_my_file!=".") AND ($tmp_my_file!="..")){
			if(is_file("$tmp_path$tmp_my_file/info.install.php")) {
				include("$tmp_path$tmp_my_file/info.install.php");
				//$config['modtype_module']
				foreach($moduleController as $value){
					$cache_modtype['module'][] = $value;
				}
				//$config['modtype_module_arr']
				$cache_modtype['module_arr'][$moduleName] = $moduleController;
				//$config['modmenu_module']
				if(isset($moduleMenu)) {
					$cache_modmenu[$moduleName] = $moduleMenu;
				}
				//$config['modpower_module']
				if(isset($modulePower)) {
					$cache_modpower['module'][$moduleName] = $modulePower;
				}
				//$config['modpower_module_class']
				if(isset($moduleClassPower)) {
					$cache_modpower['module_class'][$moduleName] = $moduleClassPower;
				}
				unset($moduleName,$moduleController,$moduleMenu,$modulePower,$moduleClassPower);
			
			}
		}
	}
	if(!class_exists('files')){
		include_once(WEB_INC.'file.class.php');
	}
	$FS = new files();
	$FS->file_Write($cache_modtype, WEB_CACHE.'modtype.cache.php', 'cache_modtype');
	$FS->file_Write($cache_modmenu, WEB_CACHE.'modmenu.cache.php', 'cache_modmenu');
	$FS->file_Write($cache_modpower, WEB_CACHE.'modpower.cache.php', 'cache_modpower');
	$tmp_my_path->close(); 
}