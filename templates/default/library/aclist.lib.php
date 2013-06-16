<?php
//调用示例
$data = $articles_class->GetList(array('id','rootid','title','filename','parentid'),'0','8',' rootid = 0 and id > 1 ','id asc');
?>
 <?php 
		if($data){
			foreach($data AS $key=>$value){
		?>
      <li><a href="./<?php echo makeLink('articles','list',array('classid'=>$value['id'],'filename'=>$value['filename']));?>"><span><?php echo cutstr($value['title'],16);?></span></a></li>
      <?php 
			}
		}
		?>
<?php 
unset($data,$key,$value);
?>
