<?php
//列表页面 调用二级分类示例
//外部函数提供当前分类id  classid $info
//调用include('library/list_articles_list_r2.lib.php');
if(!empty($info) && $info['rootid'] == '0'){
//获取二级分类id
//获取二级分类id并取出二级分类文章
	$data1 = $articles_class->GetList(array('id','title','filename','rootid','parentid'),'0',''," parentid = ".$info['id']."  ",'id asc');
	if($data1){
		foreach($data1 as $key1 => $value1){
			//输出二级分类title
			?>
			<div><a href="./<?php echo makeLink('articles','list',array('classid'=>$value1['id'],'filename'=>$value1['filename']));?>" title="<?php echo $value1['title'];?>"><?php echo $value1['title'];?></a></div>
			<?php
			//获取二级分类文章
			$data3 = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor', 'thumb', 'intro'),'0','1'," isplay = 1 and isgood = 1 and classid = ".$value1['id']."  ",'id desc');
			$data4 = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor', 'thumb', 'intro'),'0','5'," isplay = 1 and classid = ".$value1['id']."  ",'id desc');
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
unset($data1,$key1,$value1);
unset($data3);
unset($key3,$value3,$data4);
unset($key4,$value4);
?>