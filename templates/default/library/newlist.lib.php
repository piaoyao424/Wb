<?php 
		foreach($newList AS $key=>$value){
		?>
      <li><a href="./<?php echo makeLink('articles','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><font color="<?php echo $value['titlecolor'];?>"><?php echo cutstr($value['title'],16);?></font></a></li>
      <?php 
		}
		?>