<?php
/**
* ZCNCMS
* 用户
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Users_log extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}users_log');
	}
	/**
	 * 函数GetInfo,返回单个文档的数据
	 * 返回值为这个文档的信息(Array)
	 * @param string $table 表名
	 * @param array $col 要返回的字段列 如你要返回id,title为：array('id','title') 如果为arrya()时返回全部字段
	 * @param string $where 条件，不要带where 如id=1
	 * @return array
	 */
	function GetLastLog($col=array(),$where=''){
		global $db;
		if(is_array($col) && count($col)>0){
			$cols=implode(',',$col);
		}else{
			$cols='*';
		}
		if(strlen($where)>0){
			$where='where '.$where;
		}
		$sql="select $cols from {tablepre}users_log $where order by id desc limit 0,1";
		//echo $sql;
		//$t_r=$db->Execute($sql);
		$db->Execute($sql);
		$t_r=$db->GetArray();
		if($t_r){
			return $t_r[0];
		} else {
			return false;
		}
	}
	
}
?>