<?php
/**
* ZCNCMS
* 文章
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Articles_class extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}articles_class');
	}
	/**
	 * 函数GetClassCount,返回新闻分类数量
	 * 返回分类数量(子分类数量可以通过where获得)
	 * @return int
	 */
	function GetClassCount($id){
		$this->setTable('{tablepre}articles_class');
		$where = '';
		if($id!=0){
			$where='parentid='.$id;
		}
		return parent::GetListCount($where);
	}
	
}
?>