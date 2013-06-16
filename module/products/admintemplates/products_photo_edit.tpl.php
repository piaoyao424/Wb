<?php 
$pagetitle="产品图片编辑";
include(WEB_TPL . 'header.php');
?><noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser.</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			

			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3><?php echo $pagetitle;?></h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">基本信息</a></li> <!-- href must be unique and match the id of target div -->
						<!--<li><a href="#tab2">扩展信息</a></li> -->
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<form action="" method="post" name="form1" id="form1">
					
					<div class="tab-content  default-tab" id="tab1">				
						
							
							<fieldset> 
								<?php
								if(isset($productid) && !empty($productid)){
								?>
								<p>
									<a href="?c=products_photo&a=list&productid=<?php echo $productid; ?>">返回列表</a>  <a href="?c=products_photo&a=edit&productid=<?php echo $productid; ?>">添加图片</a> 
								</p>
								<?php
								}
								?>
								
								<p style="display:none">
									<label>标题</label>
									<input class="text-input medium-input" type="text" id="title" name="title" value="<?php if(!empty($info)) echo $info["title"]; ?>" /> 
								</p>
								
								<p>
									<label>缩略图</label>
									<input class="text-input medium-input" type="text" id="thumb" name="thumb" value="<?php if(!empty($info)) echo $info["thumb"]; ?>" /> 
									<input class="text-input" type="file" id="thumb_file" name="thumb_file" onchange="return ajaxFileUpload('thumb_file','thumb','thumb_loading');" />
									<span id="thumb_loading"></span>
									<!--<img src="images/loading.gif" id="loading" style="display: none;"> -->
								</p>
								
								<p>
									<label>产品</label>
									<select name="productid" class="small-input">
										<?php
							foreach($classList AS $key=>$value){
								  ?>
								  <option value="<?php echo $value['id'];?>" <?php if (!empty($info) && $info['productid'] == $value['id'] || !empty($productid) && $productid == $value['id']) {?>selected="selected"<?php } ?>>
								  ┠<?php echo $value['title'];?>
								  </option>
								  <?php
							}
							?>
										</select>
									
								</p>
								
								<p>
									<label>顺序</label>
									<input class="text-input medium-input" type="text" id="orders" name="orders" value="<?php if(!empty($info)) echo $info["orders"]; else echo '0'; ?>" /> 
								</p>
								
								<p style="display:none">
									<label>简介</label>
									<textarea class="text-input textarea" id="intro" name="intro" cols="60" rows="3"><?php if(!empty($info)) echo $info["intro"]; ?></textarea>
								</p>
								
								<p style="display:none">
									<label>内容</label>
									<textarea class="text-input textarea xheditor {upLinkUrl:'upload.php',upImgUrl:'upload.php',upFlashUrl:'upload.php',upMediaUrl:'upload.php'}" id="content" name="content" cols="60" rows="8"><?php if(!empty($info)) echo $info["content"]; ?></textarea>
								</p>
								
								
								
								
								<p>
									<br /><input class="button" type="submit" name="submit" value="编辑" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
						<fieldset> 
						
							<p>
								<label>发布时间</label>
								<input class="text-input medium-input datetimebox" type="text" onfocus="show_date('addtime',true);" id="addtime" name="addtime" value="<?php if(!empty($info)) echo date('Y-m-d H:i',$info["addtime"]); else echo date("Y-m-d H:i",$time); ?>" /> 
							</p>
							<script language="javascript">
							<!--
							
							 -->
							</script>
							
							<p>
								<label>作者</label>
								<input class="text-input small-input" type="text" id="author" name="author" value="<?php if(!empty($info)) echo $info["author"]; else echo $admin_username; ?>" /> 
							</p>
							
							<p>
								<label>来源</label>
								<input class="text-input small-input" type="text" id="fromtitle" name="fromtitle" value="<?php if(!empty($info)) echo $info["fromtitle"]; ?>" /> 
							</p>
							
							<p>
								<label>来源链接</label>
								<input class="text-input small-input" type="text" id="fromlinkurl" name="fromlinkurl" value="<?php if(!empty($info)) echo $info["fromlinkurl"];?>" /> 
							</p>
                            
							
							<p>
								<label>seo标题（建议64字节以内）</label>
								<input class="text-input small-input" type="text" id="seotitle" name="seotitle" value="<?php if(!empty($info)) echo $info["seotitle"];  ?>" /> 
							</p>
                            
                            
							
							<p>
								<label>seo关键词（建议3组以下）</label>
								<input class="text-input small-input" type="text" id="seokeyword" name="seokeyword" value="<?php if(!empty($info)) echo $info["seokeyword"];  ?>" /> ，作为分隔
							</p>
								
                            <p>
                                <label>seo描述（建议120字节以内）</label>
                                <textarea class="text-input textarea" id="seointro" name="seointro" cols="60" rows="3"><?php if(!empty($info)) echo $info["seointro"]; ?></textarea>
                            </p>
								
							<p>
								<label>标题颜色</label>
								<input class="text-input small-input iColorPicker" type="text" id="titlecolor" name="titlecolor" value="<?php if(!empty($info)) echo $info["titlecolor"]; ?>" /> 
							</p>
							
							<p>
								<label>转连接</label>
								<input class="text-input medium-input" type="text" id="linkurl" name="linkurl" value="<?php if(!empty($info)) echo $info["linkurl"]; ?>" /> 
							</p>
							
							<p>
								<label>自定义name（可代替id为唯一标识，建议为小写字母，可以作为seo使用，例如标题拼音、英文翻译等）</label>
								<input class="text-input medium-input" type="text" id="filename" name="filename" value="<?php if(!empty($info)) echo $info["filename"]; ?>" /> 
							</p>
							
							<p>
								<label>点击</label>
								<input class="text-input small-input" type="text" id="clicks" name="clicks" value="<?php if(!empty($info)) echo $info["clicks"]; else echo '0'; ?>" /> 
							</p>
							
							<p>
								<label>审核</label>
								<?php 
								if(!empty($info) && $info["isplay"] == 1){
									$isplay = 1;
								} else {
									$isplay = 0;
								}	
								if(empty($info)) 	$isplay = 1;							
								?>
								<input type="radio" name="isplay" value="1" <?php if($isplay=='1') echo"checked=checked";?>/>是 
								<input type="radio" name="isplay" value="0" <?php if($isplay=='0') echo"checked=checked";?>/>否
							</p>
							
							<p>
								<label>置顶</label>
								<?php 
								if(!empty($info) && $info["istop"] == 1){
									$istop = 1;
								} else {
									$istop = 0;
								}									
								?>
								<input type="radio" name="istop" value="1" <?php if($istop=='1') echo"checked=checked";?>/>是 
								<input type="radio" name="istop" value="0" <?php if($istop=='0') echo"checked=checked";?>/>否
							</p>
							
							<p>
								<label>热点</label>
								<?php 
								if(!empty($info) && $info["ishot"] == 1){
									$ishot = 1;
								} else {
									$ishot = 0;
								}									
								?>
								<input type="radio" name="ishot" value="1" <?php if($ishot=='1') echo"checked=checked";?>/>是 
								<input type="radio" name="ishot" value="0" <?php if($ishot=='0') echo"checked=checked";?>/>否
							</p>
							
							<p>
								<label>精品</label>
								<?php 
								if(!empty($info) && $info["isgood"] == 1){
									$isgood = 1;
								} else {
									$isgood = 0;
								}									
								?>
								<input type="radio" name="isgood" value="1" <?php if($isgood=='1') echo"checked=checked";?>/>是 
								<input type="radio" name="isgood" value="0" <?php if($isgood=='0') echo"checked=checked";?>/>否
							</p>
							
							
							<p style="display:none">
								<label>个性模板</label>
								<input class="text-input medium-input" type="text" id="template" name="template" value="<?php if(!empty($info)) echo $info["template"]; ?>" /> 请勿随意填写
							</p>
							
							
							
							<p style="display:none">
								<label>编辑时间</label>
								<input class="text-input medium-input" type="text" id="authortime" name="authortime" value="<?php echo $time; ?>" /> 请勿随意填写
							</p>
							
							<p>
								<br /><input class="button" type="submit" name="submit" value="编辑" />
							</p>
								
						</fieldset>
						<div class="clear"></div><!-- End .clear -->
					</div> <!-- End #tab2 -->
					</form>
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>
			
<?php 
include(WEB_TPL . 'footer.php');
?>