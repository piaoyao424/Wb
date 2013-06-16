<?php 
$pagetitle="首页";
include('header.php');
?>
<div style="height:10px; clear:both; font-size:0px;"></div>
<div class="site_container">
  <div id="site_content_area">
    <div id="site_left">
      <div>
        <div id="index_fl">
          <?php include('library/adflash.lib.php');?>
        </div>
        <div id="index_top">
          <div class="site_section">
            <div class="site_section_title">
              <h3>最新信息</h3>
            </div>
            <div class="theIndexTop" >
              <div class="clear" style="height:1px;">
                <!-- -->
              </div>
              <div id="index_top_1">
                <?php 
			$data = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor', 'intro'),'0','1',' isplay = 1 and isgood = 1 ','addtime desc,id desc');
			include('library/articleslist_indextop.lib.php');?>
              </div>
              <div class="site_section_1">
                <ul>
                  <?php 
			$data = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor'),'0','5',' isplay = 1 ','addtime desc,id desc');
			include('library/articleslist_topnew.lib.php');?>
                </ul>
              </div>
            <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
	  <!--首页分类 -->
	  <?php 
	  $i = 1;
	  $indexClassList = array();
	  $indexClassList = $articles_class->GetList(array('id','title','filename','rootid','parentid'),'0','6',' rootid = 0 and id > 1 ','id asc');
	  foreach($indexClassList as $key1 => $value1) {
		  if($i == 1){
			  include('library/icl_1_list.lib.php');
			  $i++;
		  } elseif($i == 2){
			  include('library/icl_2_list.lib.php');
			  $i = 1;
		  }
	  }
	  unset($indexClassList,$key1,$value1);
	  
	  $i = 1;
	  $indexClassList = array();
	  $indexClassList = $downloads_class->GetList(array('id','title','filename','rootid','parentid'),'0','6',' rootid = 0 ','id asc');
	  foreach($indexClassList as $key1 => $value1) {
		  if($i == 1){
			  include('library/icld_1_list.lib.php');
			  $i++;
		  } elseif($i == 2){
			  include('library/icld_2_list.lib.php');
			  $i = 1;
		  }
	  }
	  
	  ?>
	  <div class="clear"></div>
	  <!--首页分类 -->
    </div>
    <!-- End Of left-->
    <div id="site_right">
      <?php include('right.tpl.php');?>
    </div>
    <!-- End Of right-->
    <div class="cleaner"></div>
  </div>
  <!-- End Of Content area -->
  <div class="site_section">
    <div class="site_section_title">
      <h3>产品列表</h3>
    </div>
    <div class="site_section_1">
      <ul class="linksindex">
        <?php 
		$data = $products->GetList(array('id','classid','title','addtime', 'titlecolor', 'thumb', 'filename'),'0','6',' isplay = 1 ','addtime desc,id desc');
		include('library/productspiclist.lib.php');?>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <!-- -->
  <div class="site_section">
    <div class="site_section_title">
      <h3>合作伙伴/友情链接</h3>
    </div>
    <div class="site_section_1">
      <ul class="linksindex">
        <?php include('library/linkslist.lib.php');?>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</div>
<div>
<?php //include('library/index_articles_list_r2.lib.php');?>
</div>
<!-- End Of Container -->
<?php 
include('footer.php');
?>
