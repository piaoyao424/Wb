<?php 
$pagetitle="留言列表";
include(WEB_TPL . 'header.php');
?>
	<div class="site_container">
		<?php include(WEB_TPL . 'library/ur_here.lib.php');?>	
		<div id="site_content_area">
        	<div id="site_left">
            	<div class="site_section">
        <div class="site_section_title">
          <h3><?php if(isset($info) && !empty($classid)){?><a href="<?php echo makeLink($c,$a,array('classid'=>$classid));?>"><?php echo $info['title'];?></a><?php } else { echo $pagetitle;}?></h3>
        </div>
        <div id="site_list">
            <?php
							if($List){
							foreach($List AS $key=>$value){
							$classInfo = $books_class->GetInfo(array('id','title'),' id = '.$value['classid'].'');
							?>
							<ul>
		<li class="list_title"><font ><?php echo $value['title'];?></font></li>
		<li class="text"><?php echo $value['content'];?></li>
		<li class="text">回复：<?php echo $value['backcontent'];?></li>
		<li class="ot"><span>类别：<a href="./<?php echo makeLink('books','list',array('classid'=>$value['classid']));?>"><?php echo $classInfo['title'];?></a></span><span><font class="sp"><?php echo $value['niname'];?></font></span><span>日期：<font class="sp"><?php echo date("Y-m-d H:i",intval($value['addtime']));?></font></span></li>
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
            	<div class="site_section">
				  <div class="site_section_title">
					<h3>最新留言</h3>
				  </div>
				  <div class="site_section_1">
					<ul class="theIndexList">
							<?php 
							$data = $books->GetList(array('id','title','addtime','niname'),'0','8',' isplay = 1 ','addtime desc,id desc');
							?>
							<?php 
							if($data){
								foreach($data AS $key=>$value){
							?>
						  <li><font ><?php echo cutstr($value['title'],20);?></font><br />by：<?php echo $value['niname'];?></li>
						  <?php 
								}
							}
							?>
							<?php 
							unset($data,$key,$value);
							?>
					</ul>
					<div class="clear"></div>
				  </div>
				</div>
            </div><!-- End Of right-->
            
            <div class="cleaner"></div>
        
        </div><!-- End Of Content area -->
</div><!-- End Of Container -->
<?php 
include(WEB_TPL . 'footer.php');
?>