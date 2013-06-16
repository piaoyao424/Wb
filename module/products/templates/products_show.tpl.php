<?php 
$pagetitle="产品页面";
include(WEB_TPL . 'header.php');
?>
<script src="js/base.js"></script>
<style>
#preview{ float:none; margin:20px auto; text-align:center; width:500px;}
.jqzoom{ width:350px; height:350px; position:relative;}

.zoomdiv{ left:859px; height:400px; width:400px;}
.list-h li{ float:left;}
#spec-n5{width:350px; height:56px; padding-top:6px; overflow:hidden;}
#spec-left{ background:url(images/default/left.gif) no-repeat; width:10px; height:45px; float:left; cursor:pointer; margin-top:5px; margin-left:4px;}
#spec-right{background:url(images/default/right.gif) no-repeat; width:10px; height:45px; float:left;cursor:pointer; margin-top:5px;}
#spec-list{ width:310px; float:left; overflow:hidden; margin-left:10px; display:inline;}
#spec-list ul li{ float:left; margin-right:0px; display:inline; width:62px;}
#spec-list ul li img{ padding:2px ; border:1px solid #ccc; width:50px; height:50px;}

/*jqzoom*/
.jqzoom{position:relative;padding:0;}
.zoomdiv{z-index:100;position:absolute;top:1px;left:0px;width:400px;height:400px;background:url(images/default/loading.gif) #fff no-repeat center center;border:1px solid #e4e4e4;display:none;text-align:center;overflow: hidden;}
.bigimg{width:800px;height:800px;}
.jqZoomPup{z-index:10;visibility:hidden;position:absolute;top:0px;left:0px;width:50px;height:50px;border:1px solid #aaa;background:#FEDE4F 50% top no-repeat;opacity:0.5;-moz-opacity:0.5;-khtml-opacity:0.5;filter:alpha(Opacity=50);cursor:move;}
#spec-list{ position:relative; width:310px; margin-right:4px;}
#spec-list div{ margin-top:0;margin-left:0px; *margin-left:0;}

#site_show .content img{ border:1px solid #CCCCCC;}
</style>
<SCRIPT type=text/javascript>
	$(function(){			
	   $(".jqzoom").jqueryzoom({
			xzoom:400,
			yzoom:400,
			offset:10,
			position:"right",
			preload:1,
			lens:1
		});
		$("#spec-list").jdMarquee({
			deriction:"left",
			width:350,
			height:56,
			step:1,
			speed:4,
			delay:10,
			control:true,
			_front:"#spec-right",
			_back:"#spec-left"
		});
		$("#spec-list img").bind("mouseover",function(){
			var src=$(this).attr("src");
			$("#spec-n1 img").eq(0).attr({
				src:src.replace("\/n5\/","\/n1\/"),
				jqimg:src.replace("\/n5\/","\/n0\/")
			});
			$(this).css({
				"border":"2px solid #ff6600",
				"padding":"1px"
			});
		}).bind("mouseout",function(){
			$(this).css({
				"border":"1px solid #ccc",
				"padding":"2px"
			});
		});				
	})
	</SCRIPT>
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
          <div class="content">
		  
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" width="352">
	<div style="display:inline; float:left; width:352px;">
	<?php 
	if(!empty($photoList)) {
	?>
	<div id=preview>
		<div class=jqzoom id=spec-n1 onClick="window.open('?c=products&a=photo&id=<?php echo $info['id'];?>')"><IMG height=350
		src="<?php echo $photoList[0]['thumb'];?>" jqimg="<?php echo $photoList[0]['thumb'];?>" width=350>
		</div>
		<div id=spec-n5>
			<div class=control id=spec-left>
				<img src="images/default/left.gif" style="border:0;" />
			</div>
			<div id=spec-list>
				<ul class=list-h>
					<?php 
					foreach($photoList as $key=>$value){
					?>
					<li><img src="<?php echo $value['thumb'];?>"> </li>
					<?php 
					}
					?>
				</ul>
			</div>
			<div class=control id=spec-right>
				<img src="images/default/right.gif" style="border:0;" />
			</div>
			
		</div>
	</div>
	<?php
	}
	?>
	</div>
	</td><td valign="top" width="10">
	</td><td valign="top">
	<div style="display:inline; width:286px; float:left; margin:20px auto;">

	<?php if(!empty($info['price'])) echo '价格：'.$info['price'];?>
	<br />
	<?php if(!empty($info['standard'])) echo '规格：'.$info['standard'];?>
	</div>
	</td>
  </tr>
</table>

		  <div style="clear:both; font-size:0px;"></div>
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
