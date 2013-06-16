<?php
/**
* 分页类
* URL有多个参数也能分页，还能自定义分页样式
* php>=5.0
* @author Thunder
* @version 0.1.1
* @copyright 2006-2010
* @package class
*/
class PageClass{
	private $url;
	private $cpage;
	private $totalPage;
	private $tpl;
	/**
	 * PageClass的构造函数
	 * 模板说明：{index}表示首页 {pagelist}链接列表 {option}下拉列表框 {next}下一页 {pre}上一页 {cur}当前页 {index=首页}表示首页的链接文字为首页，即=号后为链接文字，不过这对{pagelist}{option}无效
	 * @param string $cpage 当前页
	 * @param string $tatolPage 总页数
	 * @param string $tpl 模板.
	 * @param string $url 要分页的url 默认为当前页
	 * @return PageClass
	 */
	function __construct($cpage,$totalPage,$tpl='',$url=''){
	  $this->cpage=$cpage;
	  $this->totalPage=$totalPage;
	  if(strlen($tpl)==0){
		  //$this->tpl="{cur=当前页} {index=首页} {next=下一页} {pagelist} {pre=上一页} {end=最后页} {option}"; //中文分页
		  $this->tpl="{cur=当前页} {index=首页} {pre=上一页} {pagelist} {next=下一页} {end=最后页} "; //中文分页
	  }else{
		  $this->tpl=$tpl;
	  }
	  if(strlen($url)==0){
		  //20130222 端口支持
		  $this->url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
		  if($_SERVER["SERVER_PORT"] != '80'){
			  $this->url='http://'.$_SERVER["SERVER_NAME"].':'. $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
		  }
	  }else{
		  $this->url=$url;
	  }
	}
	/**
	 * 函数showPage,返回生成的分页HTML
	 * @return string
	 */
	function showPage(){
	  //显示分页
	  global $config;
	  if($config['linkurlmode'] == 1){
		  return $this->showPage1();
	  }
	  //print_r($_GET);
	  $urlOptionStr = '';
	  $urlOption=array();//url的后缀如：?page=1&typeid=1
	  $parse_url=parse_url($this->url);
	  $urlMain='http://'.$parse_url['host'].$parse_url['path'];
	  if(isset($parse_url['port']) && $parse_url['port'] != '80'){
		  $urlMain='http://'.$parse_url['host'].':'.$parse_url['port'].$parse_url['path'];
	  }
	  if(isset($parse_url['query'])){
	   //url有参数
	   $urlArr=explode('&',$parse_url['query']);
	   if(is_array($urlArr)){
		   foreach($urlArr as $key=>$value){
			//20130222修改参数名称
			$cArr=explode('=',$value);
			if($cArr[0]=='page'){
			}else{
			 array_push($urlOption,$cArr[0].'='.$cArr[1]);
			}
		   }
	   }
	  }else{
	   //url没有参数
	   //if($this->cpage<$this->totalPage){
	   // array_push($urlOption,"page=2");
	   //}
	  }
	  if(is_array($urlOption)){
		$urlOptionStr_t=implode('&',$urlOption);
	  }
	  if(strlen($urlOptionStr_t)>0){
		  $urlOptionStr.='&'.$urlOptionStr_t;
	  }
	
	  $tplcontent=$this->tpl;//分页模板
	  $showPage=$tplcontent;
	  //首页
	  if (preg_match_all('/\{index=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0]; //模板内容
		  $t_word=$matches[1][0]; //分页字段
		  $indexStr='<span class="pager"><a href="'.$urlMain.'?page=1'.$urlOptionStr.'">'.$t_word.'</a></span>';
		  $showPage=str_replace($t_tpl,$indexStr,$showPage);
	  }
	  //当前页
	  if (preg_match_all('/\{cur=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
		  $curStr='<span class="pager1"><a>'.$t_word.$this->cpage.'/'.$this->totalPage.'</a></span>';
		  $showPage=str_replace($t_tpl,$curStr,$showPage);
	  }
	  //末页
	  if (preg_match_all('/\{end=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
			$endPage='<span class="pager"><a href="'.$urlMain.'?page='.$this->totalPage.$urlOptionStr.'">'.$t_word.'</a></span>';
			  if(empty($this->totalPage)){
			  $endPage='<span class="pager"><a href="'.$urlMain.'?page=1'.$urlOptionStr.'">'.$t_word.'</a></span>';
			  }
			$showPage=str_replace($t_tpl,$endPage,$showPage);
		}
	  //上一页
	  if (preg_match_all('/\{pre=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
			if($this->cpage!=1){
				   $prePage='<span class="pager"><a href="'.$urlMain.'?page='.($this->cpage-1).$urlOptionStr.'">'.$t_word.'</a></span>';
			}else{
				   $prePage='<span class="pager1"><a>'.$t_word.'</a></span>';
			}
			$showPage=str_replace($t_tpl,$prePage,$showPage);
	  }
		//下一页
	  if (preg_match_all('/\{next=([^}]*+)\}/',$tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
			if($this->cpage!=$this->totalPage && $this->totalPage>1){
			   $nextPage='<span class="pager"> <a href="'.$urlMain.'?page='.($this->cpage+1).$urlOptionStr.'">'.$t_word.'</a> </span>';
			  }else{
				   $nextPage='<span class="pager1"><a>'.$t_word.'</a></span>';
			}
			$showPage=str_replace($t_tpl,$nextPage,$showPage);
		}
		//链接列表
		$linkPage = '';
		if (preg_match("{pagelist}",$tplcontent)){
			$linkpagenum = 5;
			$begin = $this->cpage;
			if($this->totalPage - $this->cpage > $linkpagenum){
				$end = $this->cpage + $linkpagenum;
			}else {
				$end = $this->totalPage;
			}
			for($i=$begin;$i<$end+1;$i++){
				if($i == $this->cpage){
					$linkPage.=' <span class="pager1"><span class="cur"><a>'.$i.'</a></span></span>';
				} else {
					$linkPage.=' <span class="pager"><a href="'.$urlMain.'?page='.$i.$urlOptionStr.'"> '.$i.'</a></span>';
				}
			}
			$showPage=str_replace('{pagelist}',$linkPage,$showPage);
		}
		//下拉框分页
		if (preg_match("{option}",$tplcontent)){
			$optionPage='<select onchange="javascript:window.location='."'".$urlMain."?page='+this.options[this.selectedIndex].value+"."'$urlOptionStr'".';">';
			for($i=1;$i<$this->totalPage+1;$i++){
				if($i==$this->cpage){
					$optionPage.="<option selected='selected' value='$i'>第".$i."页</option>\n";
				}else{
					$optionPage.="<option value='$i'>第".$i."页</option>\n";
				}
			}
			$optionPage.='</select>';
			$showPage=str_replace('{option}',$optionPage,$showPage);
		}
	  return $showPage;
	  }
	  
	  /**
	 * 函数showPage,返回生成的分页HTML 建立在相对url的基础上 不要servername等
	 * @return string
	 */
	function showPage1(){
	  //显示分页
	  //print_r($_GET);
	  global $c,$a;
	  $c1 = $c;
	  $a1 = $a;
	  $urlOptionStr = '';
	  $urlOption = array();
	  //$urlHtmlStr = '.html';
	  
	  $urlArr = $_GET;
	  foreach($urlArr as $key=>$value){
		  if($key =='c'){
		  
		  } else if($key == 'a'){
		  
		  } else if($key == 'page'){
		  
		  } else {
			  $urlOption[$key]=$value;
		  }
	  }
	  
	  //20130222增加参数支持
	  $parse_url=parse_url($this->url);
	  $urlMain='http://'.$parse_url['host'].$parse_url['path'];
	  if(isset($parse_url['port']) && $parse_url['port'] != '80'){
		  $urlMain='http://'.$parse_url['host'].':'.$parse_url['port'].$parse_url['path'];
	  }
	  if(isset($parse_url['query'])){
	   //url有参数
	   $urlOption = array();
	   $urlArr=explode('&',$parse_url['query']);
	   //print_r($urlArr);
	   if(is_array($urlArr)){
		   foreach($urlArr as $key=>$value){
			//20130222修改参数名称
			$cArr=explode('=',$value);
			if($cArr[0]=='page'){
			}elseif($cArr[0]=='c'){
				$c1 = $cArr[1];
			}elseif($cArr[0]=='a'){
				$a1 = $cArr[1];
			}else{
				 //array_push($urlOption,$cArr[0].'='.$cArr[1]);
				 $urlOption[$cArr[0]] = $cArr[1];
			}
		   }
	   }
	  }else{
	   //url没有参数
	   //if($this->cpage<$this->totalPage){
	   // array_push($urlOption,"page=2");
	   //}
		  //echo substr($urlMain,-1,1);
		  if(substr($urlMain,-1,1) != '/'){
			  $urlMain = dirname($urlMain).'/';
		  }
	  }
	  //echo $urlMain;
	  
	  //$urlOptionStr = $c.'-'.$a.$urlOptionStr;
	
	  $tplcontent=$this->tpl;//分页模板
	  $showPage=$tplcontent;
	  //首页
	  if (preg_match_all('/\{index=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0]; //模板内容
		  $t_word=$matches[1][0]; //分页字段
		  $urlOption1 = $urlOption;
		  $urlOption1['page']='1';
		  $indexStr='<span class="pager"><a href="'.$urlMain.makeLink($c1,$a1,$urlOption1).'">'.$t_word.'</a></span>';
		  $showPage=str_replace($t_tpl,$indexStr,$showPage);
	  }
	  //当前页
	  if (preg_match_all('/\{cur=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
		  $curStr='<span class="pager1"><a>'.$t_word.$this->cpage.'/'.$this->totalPage.'</a></span>';
		  $showPage=str_replace($t_tpl,$curStr,$showPage);
	  }
	  //末页
	  if (preg_match_all('/\{end=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
			$urlOption1 = $urlOption;
			$urlOption1['page']=$this->totalPage;
			$endPage='<span class="pager"><a href="'.$urlMain.makeLink($c1,$a1,$urlOption1).'">'.$t_word.'</a></span>';
			  if(empty($this->totalPage)){
			  $urlOption1 = $urlOption;
			  $urlOption1['page']='1';
			  $endPage='<span class="pager"><a href="'.$urlMain.makeLink($c1,$a1,$urlOption1).'">'.$t_word.'</a></span>';
			  }
			$showPage=str_replace($t_tpl,$endPage,$showPage);
		}
	  //上一页
	  if (preg_match_all('/\{pre=([^}]*+)\}/', $tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
			if($this->cpage!=1){
				   $urlOption1 = $urlOption;
				   $urlOption1['page']=($this->cpage-1);
				   $prePage='<span class="pager"><a href="'.$urlMain.makeLink($c1,$a1,$urlOption1).'">'.$t_word.'</a></span>';
			}else{
				   $prePage='<span class="pager1"><a>'.$t_word.'</a></span>';
			}
			$showPage=str_replace($t_tpl,$prePage,$showPage);
	  }
		//下一页
	  if (preg_match_all('/\{next=([^}]*+)\}/',$tplcontent, $matches)){
		  $t_tpl=$matches[0][0];
		  $t_word=$matches[1][0];
			if($this->cpage!=$this->totalPage && $this->totalPage>1){
			   $urlOption1 = $urlOption;
			   $urlOption1['page']=($this->cpage+1);
			   $nextPage='<span class="pager"> <a href="'.$urlMain.makeLink($c1,$a1,$urlOption1).'">'.$t_word.'</a> </span>';
			  }else{
				   $nextPage='<span class="pager1"><a>'.$t_word.'</a></span>';
			}
			$showPage=str_replace($t_tpl,$nextPage,$showPage);
		}
		//链接列表
		$linkPage = '';
		if (preg_match("{pagelist}",$tplcontent)){
			$linkpagenum = 5;
			$begin = $this->cpage;
			if($this->totalPage - $this->cpage > $linkpagenum){
				$end = $this->cpage + $linkpagenum;
			}else {
				$end = $this->totalPage;
			}
			for($i=$begin;$i<$end+1;$i++){
				if($i == $this->cpage){
					$linkPage.=' <span class="pager1"><span class="cur"><a>'.$i.'</a></span></span>';
				} else {
					$urlOption1 = $urlOption;
			        $urlOption1['page']=$i;
					$linkPage.=' <span class="pager"><a href="'.$urlMain.makeLink($c1,$a1,$urlOption1).'"> '.$i.'</a></span>';
				}
			}
			$showPage=str_replace('{pagelist}',$linkPage,$showPage);
		}
		//下拉框分页
		if (preg_match("{option}",$tplcontent)){
			$optionPage='<select onchange="javascript:window.location='."''+this.options[this.selectedIndex].value+"."''".';">';
			for($i=1;$i<$this->totalPage+1;$i++){
				if($i==$this->cpage){
					$urlOption1 = $urlOption;
			        $urlOption1['page']=$i;
					$optionPage.="<option selected='selected' value='".$urlMain.makeLink($c1,$a1,$urlOption1)."'>第".$i."页</option>\n";
				}else{
					$urlOption1 = $urlOption;
			        $urlOption1['page']=$i;
					$optionPage.="<option value='".$urlMain.makeLink($c1,$a1,$urlOption1)."'>第".$i."页</option>\n";
				}
			}
			$optionPage.='</select>';
			$showPage=str_replace('{option}',$optionPage,$showPage);
		}
	  return $showPage;
	  }
}
?>