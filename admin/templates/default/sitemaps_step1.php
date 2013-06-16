<?php
//网站地图模版
//header('Content-type: application/xml; charset="GB2312"',true);
include('header.php');
?>
<script language="javascript">
<!--
function gettiaoshu(e){
	$('#tiaoshu').text(e);
}
 -->
</script>
<style>
<!--
body{margin:0; padding:0; font-size:12px; line-height:150% }
#infobox{border:#CCCCCC 1px dashed; width:400px; margin:30px auto; line-height:25px; background:#FFF;}
#infotitle{height:30px; font-weight:bold; background-color:#CCCCCC; padding-left:10px;}
#infocontent{ padding:10px;}
 -->
</style>
<div id="infobox">
<div id="infotitle">生成站点地图</div>
<div id="infocontent">
<div id="ajaxloader"><img src="images/ajax-loader.gif" />生成中</div>
<div>读取数据：<span id="tiaoshu"></span></div>
<?php
$i = 1;
foreach($listArticle as $key => $value){
	$sitemapsBody = $sitemapsBody . "<url>\r\n";
	$sitemapsBody = $sitemapsBody . "<loc>" .sitemapsstr(dirname(getWebUrl())."/".makeLink('articles','show',array('id'=>$value['id'])))."</loc>\r\n";
	$sitemapsBody = $sitemapsBody . "<lastmod>".date("Y-m-d",$value['addtime'])."</lastmod>\r\n";
	$sitemapsBody = $sitemapsBody . "<changefreq>monthly</changefreq>\r\n";
	$sitemapsBody = $sitemapsBody . "<priority>0.5</priority>\r\n";
	$sitemapsBody = $sitemapsBody . "</url>\r\n";
	
	echo '<script language="javascript">gettiaoshu("'.$i.'条");</script>';
	
	if($i % $perSiteMpasNum == 0) {
	//如果到了perSiteMpasNum整数倍 则输出
		$sitemapsFilename = (ceil($i / $perSiteMpasNum))?'../sitemaps.xml':'../sitempas'.ceil($i / $perSiteMpasNum).'.xml';
		$sitemapsContent = $sitemapsTop.$sitemapsBody.$sitemapsEnd;
		if(file_put_contents($sitemapsFilename,$sitemapsContent)){
			echo $sitemapsFilename.'已生成<br>';
		}
		//已经输出，原来的内容清空
		$sitemapsBody = '';
	}	
	$i++;
}
//不够数量的输出
if(!empty($sitemapsBody)) {
	$sitemapsFilename = (ceil($i / $perSiteMpasNum))?'../sitemaps.xml':'../sitempas'.ceil($i / $perSiteMpasNum).'.xml';
	$sitemapsContent = $sitemapsTop.$sitemapsBody.$sitemapsEnd;
	if(file_put_contents($sitemapsFilename,$sitemapsContent)){
		echo $sitemapsFilename.'已生成<br>';
	}
}
//echo '站点地图条数：'.$i;
?>
</div>
</div>
<script language="javascript">
<!--
$('#ajaxloader').hide();
 -->
</script>
<?php
include('footer.php');
?>