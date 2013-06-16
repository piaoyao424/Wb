<?php 
$pagetitle="产品页面";
include(WEB_TPL . 'header.php');
?>
<script src="js/jcarousellite.js"></script>
<script src="js/jquery.jqzoom-core.js" type="text/javascript"></script>
<style>
.zoomPad{
	position:relative;
	float:left;
	z-index:99;
	cursor:crosshair;
}


.zoomPreload{
   -moz-opacity:0.8;
   opacity: 0.8;
   filter: alpha(opacity = 80);
   color: #333;
   font-size: 12px;
   font-family: Tahoma;
   text-decoration: none;
   border: 1px solid #CCC;
   background-color: white;
   padding: 8px;
   text-align:center;
   background-image: url(images/default/zoomloader.gif);
   background-repeat: no-repeat;
   background-position: 43px 30px;
   z-index:110;
   width:90px;
   height:43px;
   position:absolute;
   top:0px;
   left:0px;
    * width:100px;
    * height:49px;
}


.zoomPup{
	overflow:hidden;
	background-color: #FFF;
	-moz-opacity:0.6;
	opacity: 0.6;
	filter: alpha(opacity = 60);
	z-index:120;
	position:absolute;
	border:1px solid #CCC;
  z-index:101;
  cursor:crosshair;
}

.zoomOverlay{
	position:absolute;
	left:0px;
	top:0px;
	background:#FFF;
	/*opacity:0.5;*/
	z-index:5000;
	width:100%;
	height:100%;
	display:none;
  z-index:101;
}

.zoomWindow{
	position:absolute;
	left:110%;
	top:40px;
	background:#FFF;
	z-index:6000;
	height:auto;
  z-index:10000;
  z-index:110;
}
.zoomWrapper{
	position:relative;
	border:1px solid #999;
  z-index:110;
}
.zoomWrapperTitle{
	display:block;
	background:#999;
	color:#FFF;
	height:18px;
	line-height:18px;
	width:100%;
  overflow:hidden;
	text-align:center;
	font-size:10px;
  position:absolute;
  top:0px;
  left:0px;
  z-index:120;
  -moz-opacity:0.6;
  opacity: 0.6;
  filter: alpha(opacity = 60);
}
.zoomWrapperImage{
	display:block;
  position:relative;
  overflow:hidden;
  z-index:110;

}
.zoomWrapperImage img{
  border:0px;
  display:block;
  position:absolute;
  z-index:101;
}

.zoomIframe{
  z-index: -1;
  filter:alpha(opacity=0);
  -moz-opacity: 0.80;
  opacity: 0.80;
  position:absolute;
  display:block;
}



div#pro-thumb{}
div#pro-thumb .next{ float:left; line-height:64px;}
div#pro-thumb .prev{ float:left; margin-right:2px; line-height:64px;}
div#pro-thumb .center{ float:left;}

ul#thumblist{display:block; width:318px; height:64px; overflow:hidden;}
ul#thumblist li{float:left;margin-right:2px;list-style:none; line-height:60px; width:104px;}
ul#thumblist li a{display:block;border:1px solid #CCC;}
ul#thumblist li a.zoomThumbActive{
    border:1px solid red;
}
.zoomPreload{ display:none;}

ul#thumblist li a img{ width:100px; height:60px; border:1px #CCCCCC solid;}
#site_show .content img {
border: 1px solid #CCC;
max-width: 510px;
}

.jqzoom{

	text-decoration:none;
	float:left;
}
</style>

<script>
$(document).ready(function(){
	//
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
	
	

});
</script>
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
          <div class="content">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
	<?php 
	if(!empty($photoList)) {
	?>
	<div>
	<a href="<?php echo $photoList[0]['thumb'];?>" class="jqzoom" rel='gal1'   >
            <img src="<?php echo $photoList[0]['thumb'];?>"  style="border: 1px solid #CCC; width:334px; height:240px;">
    </a>
	</div>
	<div style="clear:both; height:5px;"></div>
	<div id="pro-thumb">
	<div class="prev"><a href="javascript:void(0);"><</a></div>
	<div class="center jCarouselLite">
	<ul id="thumblist">
	<?php 
	foreach($photoList as $key=>$value){
	?>
	<li><a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo $value['thumb'];?>',largeimage: '<?php echo $value['thumb'];?>'}"><img src='<?php echo $value['thumb'];?>'></a></li>
	<?php
	}
	?>
	</ul>
	</div>
	<div class="next"><a href="javascript:void(0);">></a></div>
	<div style="clear:both;"></div>
	</div>
	<div style="clear:both;"></div>
	<?php 
	}
	?>
	</td><td valign="top">
	<?php if(!empty($info['price'])) echo '价格：'.$info['price'];?>
	<br />
	<?php if(!empty($info['standard'])) echo '规格：'.$info['standard'];?>
	</td>
  </tr>
</table>

		  </div>
          <div class="content"><?php echo $info['content'];?></div>
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
