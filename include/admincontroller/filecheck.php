<?php
/**
* ZCNCMS
* 在线文件校验
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
$pagetitle = '在线文件校验';
$pagepower = 'sys';
//基本部分
require('checkpower.inc.php');
//功能部分

//
$checkdir = '../';   //需要检查的目录，默认为本目录
$ext= array('.php','.html','.htm','.cache','.txt','.js');  //需要检查的扩展名
$host="http://".$_SERVER['SERVER_NAME'];
$file = '';

switch($a)
{
	case 'dofile':
	    $md5hash="";
		$count =0;
		$content=array();
		$file_check_dofile_info = '';
	
		
		//$filename="file_hash_".date("YmdHi",time()).".txt";
		$filename = 'file_hash.md5';
	
		file_put_contents($filename,serialize(md5_dir($checkdir)));
		$file_check_dofile_info .= '已生成校验文件';
		$file_check_dofile_info .= '<br>共处理<b>'.$count.'</b>个文件';
		$templatefile = 'filecheck_dofile.php';
		break;
	case 'checkfile'://
		$file_check_checkfile_info = '';
		$filename = 'file_hash.md5';
		if (is_file($filename))
		{
		
			$handle=fopen($filename,"r") or die ("无法读取文件，请检查权限设置");
			$hash_old = unserialize(fread($handle,filesize($filename)));
			
			$hash_new=md5_dir($checkdir);
	
			//print_r($hash_new);
			//$file_check_checkfile_info .= '<br><br>';
			$difflist=array_diff_assoc($hash_new,$hash_old);
			//print_r($difflist);
			foreach($difflist as $file => $md5)
			{
				if(!array_key_exists($file,$hash_old))
				{
					$file_check_checkfile_info .= "<br>文件<a href='$host".substr($file,1)."' target='_blank'>".$file."</a>，状态:<font color='red'>新增 </font>时间：".date("Y-m-d H:i:s",@filemtime($file));
				}
	
				if(array_key_exists($file,$hash_old))
				{
					$file_check_checkfile_info .= "<br>文件<a href='$host".substr($file,1)."' target='_blank'>".$file."</a>，状态:<font color='orange'>被修改 </font>时间：".date("Y-m-d H:i:s",@filemtime($file));
				}
			}
	
			$dellist=array_diff_assoc($hash_old,$hash_new);
			//print_r($dellist);
			foreach($dellist as $file => $md5)
			{
				if(!array_key_exists($file,$hash_new))
				{
					$file_check_checkfile_info .= "<br>文件".$file."，状态:<font color='green'>被删除 </font>";
				}
			
			}
			if(empty($file_check_checkfile_info)) {
				$file_check_checkfile_info = '文件校验通过';
			}
	
		} else {
			$file_check_checkfile_info .= '不存在校验文件!';
		}
		$templatefile = 'filecheck_checkfile.php';
		break;
	default://list
		$templatefile = 'filecheck_default.php';
		break;
}

//对目录下文件递归获取md5
function md5_dir($directory){
	global $ext;
	global $count;
	global $content;
	
	
	$mydir=dir($directory);
	
	while($file=$mydir->read()){
	
		if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")){
			@md5_dir("$directory/$file");
		}
		elseif(in_array(strrchr($file, '.'), $ext)){
			$content["$directory/$file"]=@md5_file("$directory/$file");	
			$count++;
		}
	}
	$mydir->close(); 
	return $content;
}
?>