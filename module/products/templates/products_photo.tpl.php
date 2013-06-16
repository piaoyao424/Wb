<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $info['title'];?></title>
<style>
body{margin:0;}
</style>
<script type="text/javascript">
var close_window = '您是否关闭当前窗口';
</script>
</head>
<body>
<div id="show-pic">
<embed src="images/pic-view.swf" quality="high" id="picview" flashvars="copyright=shopex&xml=<products name='<?php echo $info['title'];?>' shopname='<?php echo $sys['indextitle']; ?>'><?php if($photoList) { foreach($photoList as $key => $value) {?><smallpic <?php if($key == 0) {?>selected='selected'<?php }?>><?php echo $value['thumb']?></smallpic><photo_desc></photo_desc><bigpic <?php if($key == 0) {?>selected='selected'<?php }?>><?php echo $value['thumb']?></bigpic><?php } } ?></products>" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="100%" height="100%"></embed>
<script>
function windowClose()
{
    if(window.confirm(close_window))
    {
        window.close();
    }
}
</script>
</div>
</body>
</html>