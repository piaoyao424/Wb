<?php
//文件校验
include('header.php');
?>
<style>
<!--
body{margin:0; padding:0; font-size:12px; line-height:150% }
#infobox{border:#CCCCCC 1px dashed; width:400px; margin:30px auto; line-height:25px; background:#FFF;}
#infotitle{height:30px; font-weight:bold; background-color:#CCCCCC; padding-left:10px;}
#infocontent{ padding:10px;}
#file_check_info{ color:#993333;}
 -->
</style>
<div id="infobox">
<div id="infotitle">在线文件校验</div>
<div id="infocontent">
<div>
<a href="javascript:void(0);" onclick="loadCheckFile('#file_check_info'); return false;"><strong>在线文件校验</strong></a> 
<a href="javascript:void(0);" onclick="loadDoFile('#file_check_info'); return false;">生成校验文件</a> 
</div>
<hr />
<div id="ajaxloader" ><img src="images/ajax-loader.gif" />执行中</div>
<div id="file_check_info"></div>
</div>
</div>
<script language="javascript">
<!--
function loadDoFile(cont){
	$('#ajaxloader').show();
	$('#file_check_info').html('');
	$(""+cont+"").load('./?c=filecheck&a=dofile',function(){
	$('#ajaxloader').hide();
	});
}
function loadCheckFile(cont){	
	$('#ajaxloader').show();
	$('#file_check_info').html('');
	$(""+cont+"").load('./?c=filecheck&a=checkfile',function(){
	$('#ajaxloader').hide();
	});
}
$('#ajaxloader').hide();
 -->
</script>
<?php
include('footer.php');
?>