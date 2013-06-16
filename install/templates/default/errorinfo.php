<?php 
$pagetitle='系统信息';
include('header.php');
?>

<style type="text/css">
<!--

/*错误信息样式*/
#errorbox{border:#CCCCCC 1px dashed; width:400px; margin:30px auto; line-height:25px; background:#FFF;}
#errortitle{height:30px; font-weight:bold; background-color:#CCCCCC; padding-left:10px;}
#errorinfo{height:100px; padding:10px 10px;}
#errorlink{height:30px; text-align:center;}
#indexad1{line-height:25px; width:226px; height:100px; overflow:hidden; margin-left:10px;}
#indexad2{ padding:0; margin:0;}
#indexad3{lint-height:25px; width:160px; height:100px; margin-left:40px;}
-->
</style>

<div id="errorbox">
<div id="errortitle">系统信息</div>
<div id="errorinfo"><?php echo $errorInfo;?></div>
<div id="errorlink"><a href="<?php echo $errorLink;?>">返回前页</a> 或 <a href="./">返回首页</a></div>
</div>

<?php 
include('footer.php');
?>
