<?php
$moduleName = 'books';

$moduleController  = array('books', 'books_class');

$moduleMenu = array(
'topitem' => array('books'=>'留言管理'),
'item' => array(
		'books_class_list'=>array('留言分类列表','?c=books_class&a=list'),
		'books_class_edit'=>array('留言分类添加','?c=books_class&a=edit'),
		'books_list'=>array('留言列表','?c=books&a=list'),
		'books_unback'=>array('未回复留言','?c=books&a=unback')
	)
);


$modulePower = array(
	'books'=>'留言管理',
	'books_class'=>'留言分类管理'
);


?>