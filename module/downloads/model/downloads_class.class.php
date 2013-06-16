<?php
/**
* ZCNCMS
* downloads
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Downloads_class extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}downloads_class');
	}
	/**
	 * 函数GetClassCount,返回新闻分类数量
	 * 返回分类数量(子分类数量可以通过where获得)
	 * @return int
	 */
	function GetClassCount($id){
		$this->setTable('{tablepre}downloads_class');
		$where = '';
		if($id!=0){
			$where=' parentid='.$id;
		}
		return parent::GetListCount($where);
	}
	
}
?>