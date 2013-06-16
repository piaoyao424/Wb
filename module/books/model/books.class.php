<?php
/**
* ZCNCMS
* 留言
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Books extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}books');
	}
	
	/**
	 * 函数GetInfoCount,返回分类信息数量
	 * 返回数量(子分类数量可以通过where获得)
	 * @return int
	 */
	function GetInfoCount($classid){
		$this->setTable('{tablepre}books');
		$where = '';
		if($classid!=0){
			$where=' classid='.$classid;
		}
		return parent::GetListCount($where);
	}
	
}
?>