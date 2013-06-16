<?php
//列表调用示例
$data = $links->GetIndexList(1);
?>
 <?php 
		if($data){
			foreach($data AS $key=>$value){
		?>
      <li><a href="<?php echo $value['linkurl'];?>" target="_blank" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></li>
      <?php 
			}
		}
		?>
<?php 
unset($data,$key,$value);
?>
