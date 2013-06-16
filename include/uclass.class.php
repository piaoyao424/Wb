<?php
/**
* ZCNCMS
* 无限等级分类的基类
* php>=5.0
* @author lei
* @version 1.1.2
* @time 20111004
*/
Class Uclass
{
	#[要实现无限级分类的数组]
	var $arrayCategory = array();

	var $sonidlist = array();

	Function __construct()
	{
		//
	}

	#[排列]
	Function arraySet($array,$parentid=0,$space="")
	{
		foreach($array AS $key=>$value)
		{
			if($parentid == $value["parentid"])
			{
				$value["space"] = $space;
				$this->arrayCategory[] = $value;
				unset($array[$key]);
				$this->arraySet($array,$value["id"],$space."&nbsp; &nbsp; ");
			}
		}
		return $this->arrayCategory;
		
					
	}

	Function GetSonIdList($array,$cateid=0,$hidden=true)
	{
		foreach($array AS $key=>$value)
		{
			if($value["parentid"] == $cateid)
			{
				if($hidden)
				{
					if($value["status"])
					{
						$this->sonidlist[$value["id"]] = $value["id"];
						$this->GetSonIdList($array,$value["id"]);
					}
				}
				else
				{
					$this->sonidlist[$value["id"]] = $value["id"];
					$this->GetSonIdList($array,$value["id"],false);
				}
			}
		}
		return $this->sonidlist;
	}
}
?>