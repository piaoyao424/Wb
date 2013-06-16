<?php
/**
* ZCNCMS
* 验证
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//$v = new Validator();
//$v->Validate();
//验证：类型验证 字符数验证 安全验证
class Validator{
	var $error_message;
	function __construct(){
		$error_message = '';
	}
	function Validate($str1,$str2,$type,$islen = '0',$lentype='',$min,$max)//str1 字符串 str2 字段名
	{
		switch($type){
			case "repeat":
			break;
			default:
			$method = "is_".$type;
			if(!$this->$method($str1)) {
				$this->error_message = $str2 . '不符合格式，请重新输入';
				$this->display_error();
			}
			if($islen = 1) {
				$method1 = "is_".$lentype."len";
				if(!$this->$method1($str1,$min,$max)) {
					$this->error_message = $str2 . '不能小于'. $min .'个字或大于' . $max . '个字';
					$this->display_error();
				}
			}
				 //$this->add_error($name, $message);
			break;
		}
	}
	
	function display_error(){
		errorinfo($this->error_message,'');
	}
	function is_email($str){
		return preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $str);
	}
	function is_url($str){
		return preg_match("/^http:\/\/[A-Za-z0-Array]+\.[A-Za-z0-Array]+[\/=\?%\-&_~`@[\]\’:+!]*([^<>\"])*$/", $str);
	}
	function is_qq($str){
		return preg_match("/^[1-Array]\d{4,8}$/", $str);
	}
	function is_num($str){//非负数整数--//非零正整数
		//return preg_match("/^\+?[1-9][0-9]*$/", $str);
		return preg_match("/^\d+$/", $str);
	}
	function is_zip($str){
		return preg_match("/^[1-Array]\d{5}$/", $str);
	}
	function is_idcard($str){
		return preg_match("/^\d{15}(\d{2}[A-Za-z0-Array])?$/", $str);
	}
	function is_chinese($str){
		//return ereg("^[".chr(0xa1)."-".chr(0xff)."]+$",$str);
		return (preg_match("/^([\x81-\xfe][\x40-\xfe])$/",$str))?true:false;
	}
	function is_english($str){
		return preg_match("/^[A-Za-z]+$/", $str);
	}
	function is_mobile($str){
		return preg_match("/^((\(\d{3}\))|(\d{3}\-))?13\d{Array}$/", $str);
	}
	function is_phone($str){
		return preg_match("/^((\(\d{3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-Array]\d{6,7}$/", $str);
	}
	
	function is_safe($str){
		//return (preg_match('/^(([A-Z]*|[a-z]*|\d*|[-_\~!@#\$%\^&\*\.\(\)\[\]\{\}<>\?\\\/\’\"]*)|.{0,5})$|\s/', $str) != 0);
		//return (preg_match('/^(([A-Z]*|[a-z]*|d*|[-_~!@#$%^&*.()[]{}<>?\/\’\"]*)|.{0,5})$|s/', $str) != 0);
		return (preg_match('/^(([A-Z]*|[a-z]*|d*|[^\-\_\~\!\@\#\$\%\^\&\*\.\(\)\[\]\{\}\<\>\?\/\’\"]*)|.{0,5})$|s/', $str) != 0);
		//return (preg_match('/^(([A-Z]*|[a-z]*|d*|[^\*\.\(\)\[\]\{\}\<\>\?\/\’\"]|[\-\_\~\!\@\#\$\%\^\&]*)|.{0,5})$|s/', $str) != 0);
	}
	function is_safein($str)//特殊处理
	{
		//$S_key=array('|',"'",'"','/','*',',','~',';','<','>','$',"\\","\r","\t","\n","`","!","?","%","^");
		$S_key=array('|',"'",'"','/','*',',','~',';','<','>','$',"`","^");
		foreach($S_key as $value){
			if (strpos($str,$value)!==false){ 
				return false;
			}
		}
		return true;
	}
	
	function is_numlen($val, $min, $max)//纯数字字符串
	{
		return (preg_match("/^[0-9]{".$num1.",".$num2."}$/i",$str))?true:false;
	}
	function is_enlen($val, $min, $max)//英文加数字字符串
	{
		Return (preg_match("/^[a-zA-Z0-9]{".$num1.",".$num2."}$/",$str))?true:false;
	}
	function is_cnlen($val, $min, $max)//纯中文字符串
	{
		return (preg_match("/^([\x81-\xfe][\x40-\xfe]){".$num1.",".$num2."}$/",$str))?true:false;
	}
	function is_len($val, $min, $max)//普通字符串
	{
		return (strlen($val) >= $min && strlen($val) <= $max)?true:false;
	}
}
?>