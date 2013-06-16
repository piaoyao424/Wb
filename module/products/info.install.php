<?php
$moduleName = 'products';

$moduleController  = array('products', 'products_class', 'products_photo');

$moduleMenu = array(
'topitem' => array('products'=>'产品管理'),
'item' => array(
		'products_class_list'=>array('产品分类列表','?c=products_class&a=list'),
		'products_class_edit'=>array('产品分类添加','?c=products_class&a=edit'),
		'products_list'=>array('产品列表','?c=products&a=list'),
		'products_edit'=>array('产品添加','?c=products&a=edit')
	)
);


$modulePower = array(
	'products'=>'产品管理',
	'products_class'=>'产品分类管理',
	'products_photo'=>'产品图片管理'
);

$moduleClassPower = array('1','产品');

?>