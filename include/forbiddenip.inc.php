<?php
//ip禁止
defined( 'WEB_IN' ) or die( 'Restricted access' );
$fileName = WEB_DATA . 'forbiddenip.txt';
$data = file_get_contents($fileName);
$datas = explode("\r\n", $data);
$remote_ip = GetIP();
if(in_array($remote_ip, $datas)) {
	echo 'sorry,forbidden!';
	exit;
}
unset($fileName,$data,$datas,$remote_ip);

//print_r($member_customList);