<?php
//$data = $ads->GetIndexList(1);//调用广告分类1
?>
<?php 
		if($data){
			foreach($data AS $key=>$value){
			?>
		  <?php echo stripslashes($value['content']);?>
		  <?php 
			}
		}
		?>
<?php 
unset($data,$key,$value);
?>

