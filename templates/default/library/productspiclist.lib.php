<?php
//产品列表调用示例
//$data = $products->GetList(array('id','classid','title','addtime', 'titlecolor'),'0','10',' isplay = 1 and ishot = 1 ','addtime desc,id desc');
?>
 <?php 
		if($data){
			foreach($data AS $key=>$value){
		?>
      <li>
	  <?php
		if(empty($value['thumb'])) {
			$value['thumb'] = 'images/default/nopic.gif';
		}
	   ?>
	  <a href="./<?php echo makeLink('products','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><img height="80" width="120" style="margin:0 auto;" src="<?php echo $value['thumb'];?>" /></a>
	  <a href="./<?php echo makeLink('products','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><font color="<?php echo $value['titlecolor'];?>"><?php echo cutstr($value['title'],20);?></font></a></li>
      <?php 
			}
		}
		?>
<?php 
unset($data,$key,$value);
?>
