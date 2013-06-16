<?php
//网站关闭
if($sys['isclose'] == 1){
	echo $sys['closeinfo'];
	exit;
}