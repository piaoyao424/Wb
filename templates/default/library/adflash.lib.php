<?php
//轮转广告调用示例
//调用方法 include('template/library/adflash.lib.php');
$swf_width = '300';
$swf_height = '253';
$data = $adflash -> GetList(array(),'','','','orders asc,id desc');;
if($data) {
?>
<div>
<?php  include(WEB_DATA . 'adflash.txt');?>
</div>
<?php 
}
unset($data,$key,$value);
?>

