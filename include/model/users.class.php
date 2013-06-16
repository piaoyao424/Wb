<?php
/**
* ZCNCMS
* 用户
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Users extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}users');
	}
	
	/* 
	登陆验证
	 */
	function yz($username,$password){
		//登陆验证
		global $db;
		$sql="select * from {tablepre}users where username='".$username."' and password='".$password."'" ;
		//echo $sql;
		//var_dump($db->HasRs($sql));
		if($db->HasRs($sql)){
			$db->Execute($sql);
			$t_r=$db->GetArray();
			return $t_r[0];
		} else{
			return false;
		}
	}
	/* 
	会员是否存在
	 */
	function isHave($memberid){
		global $db;
		$sql="select * from {tablepre}users where id ='".$memberid."' " ;
		//var_dump($db->HasRs($sql));
		if($db->HasRs($sql)){
			$db->Execute($sql);
			$t_r=$db->GetArray();
			return $t_r[0];
		} else{
			return false;
		}
	}
	/**
	 * 函数GetInfoCount,返回分类信息数量
	 * 返回数量(子分类数量可以通过where获得)
	 * @return int
	 */
	function GetInfoCount($classid){
		$this->setTable('{tablepre}users');
		$where = '';
		if($classid!=0){
			$where=' classid='.$classid;
		}
		return parent::GetListCount($where);
	}
}
?>