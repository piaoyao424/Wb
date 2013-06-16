<?php 
$pagetitle="下载页面";
include(WEB_TPL . 'header.php');
?>

<div class="site_container">
  <?php include(WEB_TPL . 'library/ur_here.lib.php');?>
  <div id="site_content_area">
    <div id="site_left">
      <div class="site_section">
        <div class="site_section_title">
          <h3><a href="<?php echo makeLink($c,'list',array('classid'=>$info['classid'],'filename'=>$classinfo['filename']));?>"><?php echo $classinfo['title'];?></a></h3>
        </div>
        <div id="site_show">
          <h1><font color="<?php echo $info['titlecolor'];?>"><?php echo $info['title'];?></font></h1>
          <div class="time">发布时间：<?php echo date('Y-m-d H:i',$info['addtime'])?> 作者：<?php echo $info['author'];?> 浏览：<?php echo $info['clicks'];?></div>
          <div class="content"><?php echo $info['content'];?>
		  <div>
		  <?php
		  if(!empty($info['dlink'])) {
		  ?>
		  下载：<a href="<?php echo $info['dlinkname'];?>" target="_blank"><?php if(!empty($info['dlink'])) echo $info['dlink']; else echo '点击下载';?></a>
		  <?php
		  }
		  ?>
		  </div>
		  </div>
          <div class="content_url"> <span>欢迎转载本文网址：</span><?php echo 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]?>  </div>
          <div class="frominfo">
            <?php 
				if(!empty($info['fromlinkurl']) &&  !empty($info['fromtitle'])) {
					echo '来源：<a href="'.$info['fromlinkurl'].'" target="_blank">'.$info['fromtitle'].'</a>';
				}
				?>
          </div>
		  <div class="text_tag">
		<h5>Tags：<b><a href="<?php echo makeLink($c,'show',array('id'=>$info['id'],'filename'=>$info['filename']));?>" target="_blank"><?php echo $info['title'];?></a></b> &nbsp; <b><a href="<?php echo makeLink($c,'list',array('classid'=>$info['classid'],'filename'=>$classinfo['filename']));?>" target="_blank"><?php echo $classinfo['title'];?></a></b>  &nbsp; </h5>
</div>
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
