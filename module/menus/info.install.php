<?php
$moduleName = 'menus';

$moduleController  = array('menus');

$moduleMenu = array(
'topitem' => array('menus'=>'导航管理'),
'item' => array(
		'menus_list'=>array('导航列表','?c=menus&a=list'),
		'menus_edit'=>array('导航添加','?c=menus&a=edit')
	)
);


$modulePower = array(
	'menus'=>'导航管理'
);


?>