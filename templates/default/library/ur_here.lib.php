<?php
//我的位置调用示例
//与页面内容相关 controller 内部完成部分调用
?>
<div class="ur_here">我的位置 > 
<a href="./">首页</a> 
<?php 
if($a == 'list') {
	if(empty($classid)) {
	echo ' > 列表';
	} else {
		if($c == 'pages') {
			echo ' > 列表';
		} elseif($c == 'books'){
			?>
			> <a href="<?php echo makeLink($c,$a,array('classid'=>$info['id']));?>"><?php echo $info['title'];?></a>
			<?php
		} else { 
			?>
			> <a href="<?php echo makeLink($c,$a,array('classid'=>$info['id'],'filename'=>$info['filename']));?>"><?php echo $info['title'];?></a>
			<?php
		}
	}
}

if($a == 'show') {

	if($c == 'pages') { 

?>
> <a href="<?php echo makeLink($c,$a,array('id'=>$info['id'],'filename'=>$info['filename']));?>"><?php echo $info['title'];?></a> > 
<?php 
	} else {
?>
 > <a href="<?php echo makeLink($c,'list',array('classid'=>$info['classid'],'filename'=>$classinfo['filename']));?>"><?php echo $classinfo['title'];?></a>
 > <a href="<?php echo makeLink($c,$a,array('id'=>$info['id'],'filename'=>$info['filename']));?>"><?php echo $info['title'];?></a> > 
<?php 
	}
}?>

<?php if($a == 'search') {?>
 > 搜索
<?php }?>

<?php if($a == 'add' && $c == 'books') {?>
 > 留言
<?php }?>
</div>

<?php 
//unset($data,$key,$value);
?>