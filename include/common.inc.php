<?php
//防止特殊字符
defined( 'WEB_IN' ) or die( 'Restricted access' );
@set_magic_quotes_runtime(0);
$magic_quotes=get_magic_quotes_gpc();


//sqlite的sqlite_escape_string
function my_sqlite_escape_string($str){
	if(!empty($str) || $str == '0'){
		return str_replace("'","''",$str);
	}else{
		return '';
	}
}

//检查和注册外部提交的变量
foreach($_REQUEST as $_k=>$_v)
{
	//if( strlen($_k)>0 && eregi('^(GLOBALS)',$_k) )
	if( strlen($_k)>0 && preg_match('/^(GLOBALS)/i',$_k) )
	{
		exit('Request var not allow!');
	}
}

function _GetRequest(&$svar){
	global $db_type,$magic_quotes;
	$magic_quotes=get_magic_quotes_gpc();//20130128 
	if(!$magic_quotes){
		if(is_array($svar)){
			foreach($svar as $_k => $_v) $svar[$_k] = _GetRequest($_v);
		}else{
			if($db_type==1){
				$svar = my_sqlite_escape_string($svar);
			}elseif($db_type==2){
				//echo $svar;
				$svar = addslashes($svar);
			}
		}
	}else{
		//没有开..兼容sqlite
		if(is_array($svar)){
			foreach($svar as $_k => $_v) $svar[$_k] = _GetRequest($_v);
		}else{
			if($db_type==1){
				$svar = stripslashes($svar);
				$svar = my_sqlite_escape_string($svar);
			}
		}
	}
	return $svar;
}

//引入配置文件 20120726解决方案
require(WEB_INC.'/config.inc.php');

//foreach(Array('_GET','_POST','_COOKIE') as $_request) 取消cookie自动生成变量
foreach(Array('_GET','_POST') as $_request)
{
	foreach($$_request as $_k => $_v) {
		//------------------20130128校验变量名
		if(strstr($_k, '_') == $_k){
			echo 'code:re_all';
			exit;
		}
		//可考虑增加变量检测，减少变量覆盖
		//--------------------------
		${$_k} = _GetRequest($_v);
	}
}
//unset($_GET,$_POST);

//时区
if(PHP_VERSION > '5.1')
{
	@date_default_timezone_set('PRC');
}

//引入配置文件
require(WEB_INC.'/config.inc.php');
//引入数据库类
require_once(WEB_INC.'/db.class.php');
//常用函数
require_once(WEB_INC.'/function.inc.php');
//基础model函数
require_once(WEB_INC.'/model.class.php');


/*Session保存路径
$sessionPath = WEB_ROOT."/data/session";
if(is_writeable($sessionPath) && is_readable($sessionPath))
{
	session_save_path($sessionPath);
}
*/



//session language
//20120803
if(!isset($_SESSION)){  
	session_start();  
} 
header("Content-type: text/html; charset=utf-8");

//确认正确安装然后连接数据库
$install_check = '';
if(file_exists(WEB_DATA.'install.lock')) {
	$db=new DB($db_type,$db_host,$db_name,$db_pass,$db_table,$db_ut,$db_tablepre);
} else {
	$install_check =  'Not installed, please <a href="./install">install</a>';
	if(WEB_APP != 'install'){
		echo $install_check;
		exit;
	}
}
//核心库声明??
?>