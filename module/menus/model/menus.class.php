<?php
/**
* ZCNCMS
* menus
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Menus extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}menus');
	}
	/**
	 * 函数GetInfoCount,返回分类信息数量
	 * 返回数量可以通过where获得)
	 * @return int
	 */
	function GetInfoCount(){
		$this->setTable('{tablepre}menus');
		$where = '';
		return parent::GetListCount($where);
	}
	
}
?>