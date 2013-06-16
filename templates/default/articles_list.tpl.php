<?php 
$pagetitle="文章列表";
include('header.php');
?>
	<div class="site_container">
		<?php include('library/ur_here.lib.php');?>	
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
							$classInfo = $articles_class->GetInfo(array('id','title','filename'),' id = '.$value['classid'].'');
							?>
							<ul>
		<li class="list_title"><a href="./<?php echo makeLink('articles','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" target="_blank"><font color="<?php echo $value['titlecolor'];?>"><?php echo $value['title'];?></font></a></li>
		<li class="text"><?php echo $value['intro'];?>…</li>
		<li class="ot"><span>类别：<a href="./<?php echo makeLink('articles','list',array('classid'=>$value['classid'],'filename'=>$classInfo['filename']));?>"><?php echo $classInfo['title'];?></a></span><span>作者：<font class="sp"><?php echo $value['author'];?></font></span><span>阅读：<font class="sp"><?php echo $value['clicks'];?></font></span><span>日期：<font class="sp"><?php echo date("Y-m-d H:i",intval($value['addtime']));?></font></span></li>
</ul>
								
							 <?php
							 }
							 } else {
							 ?>
								<li><b>暂无</b></li>
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
				
                
                
            </div><!-- End Of left-->
            
            <div id="site_right">
            	
                    
                
				<?php include('right.tpl.php');?>
            </div><!-- End Of right-->
            
            <div class="cleaner"></div>
        
        </div><!-- End Of Content area -->
</div><!-- End Of Container -->
<div>
<div class="cleaner"></div>
</div>
<?php 
include('footer.php');
?>