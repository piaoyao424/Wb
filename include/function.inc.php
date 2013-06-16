<?php
//常用函数
defined( 'WEB_IN' ) or die( 'Restricted access' );
function errorinfo($errorInfo = '',$errorLink = '') {
	global $config,$sys,$c,$a,$tpl_in_module;
	global $articles_class,$links;
		
	if(empty($errorInfo)) {
		$errorInfo = 'Sorry,not found!';
	}
	if(empty($errorLink)) {
		$errorLink = 'javascript:history.go(-1);';
	}
	$templatefile = 'errorinfo.php';
	//echo 'error';
	include(WEB_INC . 'template.inc.php');
}

function makeLink($c='',$a='',$arr=array(),$linkmode = '',$flink = ''){
	global $config;
	$linkstr = '';
	$linkurl = '';
	if(!empty($flink)){
		return $flink;//转连接或者其他友情链接等情况直接输出连接不进行生成
	}
	if( empty($c) ) {
		$c = $config['defaultController'];
	}
	if( empty($a) ) {
		$a = $config['defaultAction'];
	}
	if( empty($linkmode) ) {
		$linkmode = $config['linkurlmode'];
	}
	
	switch ($linkmode)
	{
		case '0':default://get
			//$linkurl = './index.php?c=' . $c . '&a=' . $a ;
			$linkurl = '?c=' . $c . '&a=' . $a ;
			if(!empty($arr) && is_array($arr)) {
				foreach($arr as $key=>$value){
					if((!empty($arr['filename']) && ($key == 'id' || $key == 'classid')) || (empty($arr['filename']) && $key == 'filename')){
					
					} else {
						$linkurl = $linkurl . '&' . $key . '=' .$value;
					}
				}
			}
			break;
		case '1':
			$linkurl = '' . $c . '-' . $a ;
			if(!empty($arr) && is_array($arr)) {
				foreach($arr as $key=>$value){
					if((!empty($arr['filename']) && ($key == 'id' || $key == 'classid')) || (empty($arr['filename']) && $key == 'filename')){
					
					} else {
						$linkurl =  $linkurl . '-' . $key . '-' . $value;
					}
				}
			}
			$linkurl =  $linkurl . '.htm';
			break;
	}
	return $linkurl;
}

//获取列表
//模型$articles 获取字段array('id','title') 分类 2 针对'  istop = 1 '   排序 'id desc'  数字 5   $whereo 不需要带 where
//classid-当前分类下及其子分类 
//getInfoListClassid('articles','articles_class',array('id','classid','title','addtime'),'1','',$orders,$num)
function getInfoListClassid($mod,$mod_class,$col = array(),$wherec = '',$whereo,$orders,$num){
	$where = " isplay = 1 and ";
	if(!empty($whereo)) {
		$where = $where . $whereo;
	}
	if(!empty($wherec)){
		$classinfo = $$mod_class -> GetInfo('',' id = '.$wherec );
		$sqlid =  $classinfo['rootid'] ?  $classinfo['rootid'] : $wherec;
		$classlist = $$mod_class -> GetList('','',''," rootid='".$sqlid."' OR id='".$sqlid."' OR parentid='".$sqlid."' ");
		$sonidlist = array();
		$sonidlist = get_son_list($classlist,$classId);
		unset($classlist);
		$idin = trim(implode(",",$sonidlist));
		unset($sonidlist);
		if($idin) {
			if(strpos(",".$idin.",",",".$wherec.",") === false) {
				$idin .= ",".$wherec;
			}
			$where .= " and classid in(".$idin.")";
		} else {
			$idin = $wherec;
			$where .= " and classid ='".$wherec."'";
		}
	}	
	$List = $$mod->GetList($col,'',$num,$where,$orders);
	return $List;
}
//classids-多分类
//模型$articles 获取字段array('id','title') 分类array(1,2) 针对 排序 针对'  istop = 1 ' 数字 $whereo 不需要带 where
function getInfoListClassids($mod,$col = array(),$wherec = array(),$whereo,$orders,$num){
	$where = " isplay = 1 and ";
	if(!empty($whereo)) {
		$where = $where . $whereo;
	}
	if(is_array($wherec)){
		$wherec=implode(',',$wherec);
		$where = $where . " and classid in ($wherec) ";
	}else{
		return false;
	}
	$List = $$mod->GetList($col,'',$num,$where,$orders);
	return $List;
}

//根据当前分类得到子分类ID
function get_son_list($catelist,$cateid,$array=array())
{
	foreach($catelist AS $key=>$value)
	{
		if($value["parentid"] == $cateid)
		{
			$array[$key] = $value["id"];
			$array = get_son_list($catelist,$value["id"],$array);
		}
	}
	return $array;
}

//获取网站地址
function getWebUrl(){
	$newpath = "http://";
	$newpath .= $_SERVER["HTTP_HOST"];//主机名
	$newpath .= dirname($_SERVER["REQUEST_URI"].' ');//路径
	//20120715
	$newpath = str_replace('\\','/',$newpath);
	return $newpath;
}

/**
 * 函数ShowNext,生成javascript跳转
 * @param string $msg 显示信息
 * @param string $url 要跳转的地址
 * @param string $istop 是不是在父窗口中跳转
 * @return boolean
 */
function ShowNext($msg,$url,$istop=0){
	if(strlen($msg)>0){
		if($istop){
			header("Content-type: text/html; charset=utf-8");
			$mymsg="<script type='text/javascript'>alert('".$msg."');parent.location.href='".$url."';</script>'";
		}else{
			header("Content-type: text/html; charset=utf-8");
			$mymsg="<script type='text/javascript'>alert('".$msg."');location.href='".$url."';</script>'";
		}
	}else{
		if($istop){
			header("Content-type: text/html; charset=utf-8");
			$mymsg="<script type='text/javascript'>parent.location.href='".$url."';</script>'";
		}else{
			header("Content-type: text/html; charset=utf-8");
			$mymsg="<script type='text/javascript'>location.href='".$url."';</script>'";
		}
	}
	echo $mymsg;
	exit;
}
/**
 * 函数ShowBack,返回上一页
 * @param string $msg 显示信息
 * @return boolean
 */
function ShowBack($msg){
	header("Content-type: text/html; charset=utf-8");
	echo "<script type='text/javascript'>alert('".$msg."');history.back();</script>'";
	exit;
}
/**
 * 函数Redirect,跳转
 * @param string $url 要跳转的地址
 * @return boolean
 */
function Redirect($url){
	echo "<script type='text/javascript'>location.href='".$url."';</script>'";
	exit;
}

/**
 * 函数cutstr,字符截取
 * @param string $string 
 * @return string
 */
function cutstr($str,$len=20) {
		$from = 0;
	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'. 
'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s', 
'$1',$str); 
}

/**
 * 函数pregstring,去掉html标签
 * @param string $str 
 * @return string
 */
function pregstring( $str ){
	$strtemp = trim($str);
	$search = array(
	"|'|Uis",
	"|<script[^>]*?>.*?</script>|Uis", // 去掉 javascript
	"|<[\/\!]*?[^<>]*?>|Uis", // 去掉 HTML 标记
	"'>(quot|#34);'i", // 替换 HTML 实体
	"'>(amp|#38);'i",
	"|,|Uis",
	"|[\s]{2,}|is",
	"[>nbsp;]isu",
	"|[$]|Uis",
	);
	$replace = array(
	"`",
	"",
	"",
	"",
	"",
	"",
	" ",
	" ",
	" dollar ",
	);
	$text = preg_replace($search, $replace, $strtemp);
	return $text;
}
//获取ip
function GetIP(){ 
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
	$ip = getenv("HTTP_CLIENT_IP"); 
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
	$ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
	$ip = getenv("REMOTE_ADDR"); 
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
	$ip = $_SERVER['REMOTE_ADDR']; 
	else 
	$ip = "unknown"; 
	//20130128
	if(!IPCheck($ip)){
		$ip = "unknown"; 
	}
	return($ip); 
} 
//20130128
function IPCheck($ip){
	$S_key=array('|',"'",'"','/','*',',','~',';',':','<','>','$',"`","^","\{");
	foreach($S_key as $value){
		if (strpos($ip,$value)!==false){ 
			return false;
		}
	}
	return true;
}


//sitemaps特殊字符修改
function sitemapsstr($url){
	$url = str_replace('&',"&amp;",$url);
	$url = str_replace("\'","&apos;",$url);
	$url = str_replace('\"',"&quot;",$url);
	$url = str_replace('>',"&gt;",$url);
	$url = str_replace('<',"&lt;",$url);
	return $url;
}

//前台轮转广告

//前台广告

//获取当前页面地址
function getPageUrl(){
	$newpath = "http://";
	$newpath .= $_SERVER["HTTP_HOST"];//主机名
	$newpath .= $_SERVER["REQUEST_URI"];//路径
	//20120715
	$newpath = str_replace('\\','/',$newpath);
	return $newpath;
}

//获取二维码ggapi版本
function generateQRfromGoogle($chl,$widhtHeight ='150',$outStyle='1',$EC_level='L',$margin='0')
{
	 $chl = urlencode($chl); 
	 if($outStyle == '1'){
		 echo '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl.'" height="'.$widhtHeight.'" width="'.$widhtHeight.'"/>';
	 } else {
		 echo 'http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl.'"';
	 }
}
?>