<?php
//首页文章列表调用二级分类示例
//外部函数提供 $value1
//获取所有的一级分类
//调用 include('library/index_articles_list_r2.lib.php');
$data = $articles_class->GetList(array('id','title','filename','rootid','parentid'),'','',' rootid = 0  ','id asc');
foreach($data as $key => $value){
	//输出一级分类title
	?>
	<div><a href="./<?php echo makeLink('articles','list',array('classid'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></div>
	<?php
	//获取二级分类id并取出二级分类文章
	$data1 = $articles_class->GetList(array('id','title','filename','rootid','parentid'),'0',''," parentid = ".$value['id']."  ",'id asc');
	if($data1){
		$data2 = array();
		foreach($data1 as $key1 => $value1){
			$data2[] = $value1['id'];
		}
		$data2list = trim(implode(",",$data2));
		if(!empty($data2list)){
			//获取二级分类文章
			$data3 = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor', 'thumb', 'intro'),'0','1'," isplay = 1 and isgood = 1 and classid in (".$data2list.")  ",'id desc');
			$data4 = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor', 'thumb', 'intro'),'0','5'," isplay = 1 and classid in (".$data2list.")  ",'id desc');
			if($data3){
				foreach($data3 as $key3=>$value3){
			//图片新闻输出
			?>
			<li>
			<?php
			if(empty($value3['thumb'])) {
				$value3['thumb'] = 'images/default/nopic.gif';
			}
			?>
			<a href="./<?php echo makeLink('articles','show',array('id'=>$value3['id'],'filename'=>$value3['filename']));?>" title="<?php echo $value3['title'];?>"><img height="60" width="80" src="<?php echo $value3['thumb'];?>" /></a>
			<a href="./<?php echo makeLink('articles','show',array('id'=>$value3['id'],'filename'=>$value3['filename']));?>" title="<?php echo $value3['title'];?>"><font color="<?php echo $value3['titlecolor'];?>"><?php echo cutstr($value3['title'],16);?></font></a>
			<?php echo cutstr($value3['intro'],40);?>...
			</li>
			<?php
				}
			}
			if($data4){
				foreach($data4 as $key4=>$value4){
			//文字新闻输出
			?>
			<li><a href="./<?php echo makeLink('articles','show',array('id'=>$value4['id'],'filename'=>$value4['filename']));?>" title="<?php echo $value4['title'];?>"><font color="<?php echo $value4['titlecolor'];?>"><?php echo cutstr($value4['title'],16);?></font></a></li>
			<?php
				}
			}
		}
	}
}
unset($data,$key,$value);
unset($data1,$key1,$value1);
unset($data2,$data2list,$data3);
unset($key3,$value3,$data4);
unset($key4,$value4);
?>