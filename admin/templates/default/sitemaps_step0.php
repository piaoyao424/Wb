<?php
//网站地图模版
//header('Content-type: application/xml; charset="GB2312"',true);
include('header.php');
?>
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
<div><a href="?c=sitemaps&a=step1">点击开始</a></div>
</div>
</div>
<?php
include('footer.php');
?>