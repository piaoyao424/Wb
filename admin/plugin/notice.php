<?php
header("content-type:text/html; charset=utf-8");
//获取更新提示
echo '' . file_get_contents('http://www.zcncms.com/notice.php');

?>