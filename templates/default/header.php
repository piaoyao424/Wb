<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php if(!empty($topTitle)) echo $topTitle.'-';?>
<?php echo $sys['indextitle']; ?>-<?php echo $pagetitle;?>Powered by zcncms</title>
<meta name="keywords" content="<?php echo $sys['webkeywords']; ?>">
<meta name="description" content="<?php echo $sys['webdescription']; ?>">
<meta name="author" content="zcncms" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/qq.css" rel="stylesheet" type="text/css" />
<link href="css/jui/ui.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/jquery.min.js" type="text/javascript"></script>
<script language="javascript" src="js/jquery-ui.min.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>
<div class="site_container">
  <div class="bodytop">
    <div id="r1"></div>
    <div class="r1"> <a href="./">返回首页</a> | <a href="./" title="<?php echo $sys['webtitle'];?>"><?php echo $sys['webtitle'];?></a> | <a href="#" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo getWebUrl();?>');return false;">设为首页</a> | <a href="javascript:window.external.addFavorite('<?php echo getWebUrl();?>','<?php echo $sys['webtitle'];?>');" >加入收藏</a>  </div>
    <div id="fl"></div>
  </div>
  <div id="site_header">
    <div id="site_logo_area">
      <div id="site_logo"> <a href="./" target="_blank"><?php echo $sys['webtitle'];?></a></div>
      <div class="cleaner"></div>
    </div>
    <div id="site_search">
      <form action="./" method="get">
        <input type="hidden" name="submit" value="1" />
        <input type="hidden" name="c" value="articles" />
        <input type="hidden" name="a" value="search" />
        <input type="text" value="请输入关键词" name="keyword" class="field"  title="keyword" onfocus="clearText(this)" onblur="clearText(this)" />
        <input type="submit"  value = "搜索" alt="搜索" class="button" title="搜索" />
      </form>
    </div>
    
  </div>
  <!-- end of header -->
</div>
<div id="dh1">
<div id="site_menu">
      <ul class="nav">
        <li class="topnav"><span><a href="./">首页</a></span></li>
        <?php include('library/menus.lib.php');?>
      </ul>
    </div>
</div>
<!-- End Of Container -->
