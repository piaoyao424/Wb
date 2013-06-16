<?php
/*
上传
*/
session_start();
header('Content-Type: text/html; charset=UTF-8');
define('WEB_IN', '1');
$pagepower = 'upload';
$webinc = dirname(__FILE__).'/../include/';
require_once($webinc.'admincontroller/checkpower.inc.php');
ini_set('date.timezone','Asia/Shanghai');//时区

/* if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
	$fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	$fileTypes  = str_replace(';','|',$fileTypes);
	$typesArray = split('\|',$fileTypes);
	$fileParts  = pathinfo($_FILES['Filedata']['name']);
	$filetmp    = date("YmdHis").mt_rand(10000,99999);
	$filetmpname = str_replace('//','/',$targetPath) . $filetmp . '.'. $fileParts['extension'];
	
	if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		move_uploaded_file($tempFile,$filetmpname);
		echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$filetmpname);
	} else {
	 	echo 'Invalid file type.';
	}
	//echo 'ok';
	//file_put_contents('11.txt',$targetPath);
} */

	$error = "";
	$msg = "";
	$fileElementName = 'uploadtofile';
	/* if(!empty($_POST['fileElementId'])){
		$fileElementName = $_POST['fileElementId'];
	} */
	//file_put_contents('11.txt',var_export($_POST,true));	
	$targetPath = '../uploads/';
	$uploadPath ='uploads/';
	$typesArray = array('jpg','gif','png','doc','docx','rar');
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
			$fileParts  = pathinfo($_FILES[$fileElementName]['name']);
			$filetmp    = date("YmdHis").mt_rand(10000,99999);
			$fileParts['extension'] = strtolower($fileParts['extension']);//后缀名替换为小写
			$filetmpname = str_replace('//','/',$uploadPath) . $filetmp . '.'. $fileParts['extension'];
			$targetfile = str_replace('//','/',$targetPath) . $filetmp . '.'. $fileParts['extension'];
			$tempFile = $_FILES[$fileElementName]['tmp_name'];
			
			//$msg .= " File Name: " . $_FILES[$fileElementName]['name'] . ", ";
			//$msg .= " File Size: " . @filesize($_FILES[$fileElementName]['tmp_name']);
			if (in_array($fileParts['extension'],$typesArray)) {
				// Uncomment the following line if you want to make the directory if it doesn't exist
				//mkdir(str_replace('//','/',$targetPath), 0755, true);
				
				move_uploaded_file($tempFile,$targetfile);
				$msg .= '上传成功';
				//echo str_replace($_SERVER['DOCUMENT_ROOT'],'',$filetmpname);
			} else {
				$error ='Invalid file type.';
			}
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES[$fileElementName]);	
			//file_put_contents('11.txt',$filetmpname);	20120224
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "',\n";
	echo				"file: '" . $filetmpname . "'\n";
	echo "}";
?>