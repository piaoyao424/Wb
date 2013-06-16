<?php 
//right
?>

<div class="site_section">
  <div class="site_section_title">
    <h3>精华信息</h3>
  </div>
  <div class="site_section_1">
    <ul class="theIndexList">
      <?php 
			$data = $goodList;
			include('library/list.lib.php');?>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<div class="site_section">
  <div class="site_section_title">
    <h3>热点信息</h3>
  </div>
  <div class="site_section_1">
    <ul class="theIndexList">
      <?php 
			$data = $hotList;
			include('library/list.lib.php');?>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<div class="site_section">
  <div class="site_section_title">
    <h3>推荐信息</h3>
  </div>
  <div class="site_section_1">
    <ul class="theIndexList">
      <?php 
			$data = $topList;
			include('library/list.lib.php');?>
    </ul>
    <div class="clear"></div>
  </div>
</div>
