<?php
/**
* ZCNCMS
* 广告
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
class Ads extends Datas{
	/**
	 * Datas的构造函数 无需传参数
	 */
	function __construct(){
		parent::__construct('{tablepre}ads');
	}
	
	/**
	 * 函数GetInfoCount,返回分类信息数量
	 * 返回数量(子分类数量可以通过where获得)
	 * @return int
	 */
	function GetInfoCount($classid){
		$this->setTable('{tablepre}ads');
		$where = '';
		if($classid!=0){
			$where=' classid='.$classid;
		}
		return parent::GetListCount($where);
	}
	
	/**
	 * 函数GetIndexList,返回信息
	 * 返回arr
	 * @return arr
	 */
	function GetIndexList($classid,$col=array(),$start='',$listnum='',$order='id desc'){
		$this->setTable('{tablepre}ads');
		if($classid!=0){
			$where=" classid = $classid ";
		}
		$time = time();
		if(!empty($where)){
			$where=$where." and (starttime < $time or starttime = NUll or starttime = 0) and (endtime > $time  or endtime = NUll or endtime = 0) ";
		} else{
			$where=" (starttime < $time or starttime = NUll or starttime = 0) and (endtime > $time  or endtime = NUll or endtime = 0) ";
		}
		$arrlist= $this -> GetList($col,$start,$listnum,$where,$order);
		//print_r($arrlist);
		/* foreach($arrlist as $key=>$value){
			$arrlist[$key]['url']="news.php?id=".$value['id'];
		} 
		foreach($arrlist as $key=>$value){
			echo stripslashes($value['content']);
		}
		*/
		if($arrlist) {
			return $arrlist;
		} else {
			return false;
		}
	}
}
?>