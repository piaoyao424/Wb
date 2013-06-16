<?php
/**
* ZCNCMS
* products
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Products_photo extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}products_photo');
	}
	/**
	 * 函数GetInfoCount,返回分类信息数量
	 * 返回数量(子分类数量可以通过where获得)
	 * @return int
	 */
	function GetInfoCount($classid){
		$this->setTable('{tablepre}products_photo');
		$where = '';
		if($classid!=0){
			$where=' productid='.$classid;
		}
		return parent::GetListCount($where);
	}
	
}
?>