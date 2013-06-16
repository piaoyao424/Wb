<?php
//调用示例
include(WEB_MODULE.'menus/'.'model/'.'menus.class.php');
$menus =  new Menus();
$data = $menus->GetList(array('id','rootid','title','linkurl','target','orders','parentid'),'','',' parentid = 0 ','orders desc,id asc');
?>
 <?php 
		if($data){
			foreach($data AS $key=>$value){
		?>
      <li class="topnav"><span><a href="<?php echo $value['linkurl'];?>" target="<?php echo $value['target'];?>"><?php echo cutstr($value['title'],16);?></a></span>
	  
      <?php 
				$data1 = $menus->GetList(array('id','rootid','title','linkurl','target','orders','parentid'),'',''," parentid = '".$value['id']."' ",'orders desc,id asc');
				if($data1){
					echo '<ul class="subnav">';
					foreach($data1 AS $key1=>$value1){
					?>
					<li><a href="<?php echo $value1['linkurl'];?>" target="<?php echo $value1['target'];?>"><span><?php echo cutstr($value1['title'],16);?></span></a></li>
					<?php 
					}
					echo '</ul>';
				}
		?>
		
		</li>
		<?php
			}
		}
		?>
<?php 
unset($data,$key,$value);
unset($data1,$key1,$value1);
?>
<script type="text/javascript">
$().ready(function() {
	$("#site_menu ul.nav li.topnav").hover(function() {
		$(this).addClass("cur");
		$(this).find("ul.subnav").slideDown('fast'); 
		
	},function(){
		$(this).find("ul.subnav").hide(); 
		$(this).removeClass("cur");
	});
});
</script>