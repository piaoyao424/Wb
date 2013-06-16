<?php
//文章列表调用示例
//外部函数提供 $value1
?>
<div class="col2">
<div class="site_section">
            <div class="site_section_title">
			<span><a href="./<?php echo makeLink('articles','list',array('classid'=>$value1['id'],'filename'=>$value1['filename']));?>">更多</a></span>
              <h3><a href="./<?php echo makeLink('articles','list',array('classid'=>$value1['id'],'filename'=>$value1['filename']));?>" title="<?php echo $value1['title'];?>"><?php echo $value1['title'];?></a></h3>
            </div>
<?php
$data = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor', 'thumb', 'intro'),'0','1'," isplay = 1 and isgood = 1 and classid = '". $value1['id']."' ",'addtime desc,id desc');
?>
 <?php 
		if($data){
			foreach($data AS $key=>$value){
		?>
      <div class="icl_list">	  
	  <div class="icl_list_img">
	  <div class="icl_list_img_b">
	  <?php
		if(empty($value['thumb'])) {
			$value['thumb'] = 'images/default/nopic.gif';
		}
	   ?>
	  <a href="./<?php echo makeLink('articles','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><img height="60" width="80" src="<?php echo $value['thumb'];?>" /></a>
	  </div>
	  </div>
	  <div class="icl_list_right">
	  <div class="icl_list_right_title">
	  <a href="./<?php echo makeLink('articles','show',array('id'=>$value['id'],'filename'=>$value['filename']));?>" title="<?php echo $value['title'];?>"><font color="<?php echo $value['titlecolor'];?>"><?php echo cutstr($value['title'],16);?></font></a>
	  </div>
	  <div class="icl_list_right_intro">
	  <?php echo cutstr($value['intro'],40);?>...
	  </div>
	  </div>	  
	  <div class="clear"></div>
	  </div>
      <?php 
			}
		}
		?>
<?php 
unset($data,$key,$value);
?>

            <div class="site_section_1">
                <ul class="theIndexList">
                  <?php 
			$data = $articles->GetList(array('id','classid','title','filename','addtime', 'titlecolor'),'0','5'," isplay = 1 and classid = '". $value1['id']."' ",'addtime desc,id desc');
			include('articleslist.lib.php');?>
                </ul>
              </div>
          </div>
</div>
