<?php 
//产品中心
$pagetitle="产品列表";
include(WEB_TPL . 'header.php');
?>

<div class="site_container">
<?php include(WEB_TPL . 'library/ur_here.lib.php');?>	
<div id="site_content_area">
<div id="site_left">
  <div class="site_section">
        <div class="site_section_title">
          <h3><?php if(isset($info) && !empty($classid)){?><a href="<?php echo makeLink($c,$a,array('classid'=>$classid,'filename'=>$info['filename']));?>"><?php echo $info['title'];?></a><?php } else { echo $pagetitle;}?></h3>
        </div>
        <div id="site_list">
            <?php
							if($List){
							foreach($List AS $key=>$value){
							$classInfo = $products_class->GetInfo(array('id','title','filename'),' id = '.$value['classid'].'');
							?>
							<div style="width:33%; float:left; background:;text-align:center; margin:0 0 10px 0;">
        <div style="border:#CCCCCC 1px solid; padding:10px; width:100px; text-align:center; background:#FFFFFF;" onmouseover="this.style.backgroundColor='#EEEEEE'" onmouseout="this.style.backgroundColor='#FFFFFF'">
          <div style="padding:0; margin:0;">
		  <?php
		if(empty($value['thumb'])) {
			$value['thumb'] = 'images/default/nopic.gif';
		}
	   ?>
		  <a href="./<?php echo makeLink('products','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>"><img src="<?php echo $value['thumb'];?>" width="100" height="100" alt="<?php echo $value['title'];?>" border="0" /></a>
		  </div>
          <div style="margin:10px 0; text-align:center; height:18px; overflow:hidden; "> <a href="./<?php echo makeLink('products','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><font color="<?php echo $value['titlecolor'];?>"><?php echo $value['title'];?></font></a> </div>
        </div>
      </div>
								
							 <?php
							 }
							 } else {
							 ?>
								<div><b>暂无</b></div>
							 <?php
							 }
							 ?>
          <div class="clear"></div>
		  <div class="pagination">
											<?php echo $showpage; ?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
        </div>
      </div>
  
    </div>
    <!-- End Of left-->
    <div id="site_right">
      <?php include(WEB_TPL . 'right1.tpl.php');?>
    </div>
    <!-- End Of right-->
    <div class="cleaner"></div>
  </div>
  <!-- End Of Content area -->
</div>
<!-- End Of Container -->
<?php 
include(WEB_TPL . 'footer.php');
?>
