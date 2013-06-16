<?php
$moduleName = 'downloads';

$moduleController  = array('downloads', 'downloads_class');

$moduleMenu = array(
'topitem' => array('downloads'=>'下载管理'),
'item' => array(
		'downloads_class_list'=>array('下载分类列表','?c=downloads_class&a=list'),
		'downloads_class_edit'=>array('下载分类添加','?c=downloads_class&a=edit'),
		'downloads_list'=>array('下载列表','?c=downloads&a=list'),
		'downloads_edit'=>array('下载添加','?c=downloads&a=edit')
	)
);


$modulePower = array(
	'downloads'=>'下载管理',
	'downloads_class'=>'下载分类管理'
);

$moduleClassPower = array('1','下载');

?>