<?php
//文章列表调用示例
//$data = $articles->GetList(array('id','classid','title','addtime', 'titlecolor'),'0','10',' isplay = 1 and ishot = 1 ','addtime desc,id desc');
?>
 <?php 
		if($data){
			foreach($data AS $key=>$value){
		?>
      <li><a href="./<?php echo makeLink($c,'show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><font color="<?php echo $value['titlecolor'];?>"><?php echo cutstr($value['title'],20);?></font></a></li>
      <?php 
			}
		}
		?>
<?php 
unset($data,$key,$value);
?>
