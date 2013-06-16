<?php
//广告调用示例
//$ads->GetIndexList(2);
//调用方法 include('template/library/ads.lib.php');
//$data = $ads->GetIndexList(1);
?>
      <?php 
		if($data){
			foreach($data AS $key=>$value){
			?>
		  <div><?php echo stripslashes($value['content']);?></div>
		  <?php 
			}
		}
		?>
<?php 
unset($data,$key,$value);
?>

