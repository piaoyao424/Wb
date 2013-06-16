<?php 
$pagetitle="基本信息";
include('header.php');
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
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content  default-tab" id="tab1">
					
						<form action="" method="post" name="form1" id="form1">
							
							<fieldset> 
								
								
								
								<p>
									<label>网站开关</label>
									<?php 
									if($rs_sys["isclose"] == 1){
										$isclose = 1;
									} else {
										$isclose = 0;
									}									
									?>
									<input type="radio" name="isclose" value="1" <?php if($isclose=='1') echo"checked=checked";?>/>关 
									<input type="radio" name="isclose" value="0" <?php if($isclose=='0') echo"checked=checked";?>/>开
								</p>
								
								<p>
									<label>关闭信息</label>
									<input class="text-input medium-input" type="text" id="closeinfo" name="closeinfo" value="<?php echo $rs_sys["closeinfo"]; ?>" /> 
								</p>
								
								<p>
									<label>网站名称</label>
									<input class="text-input medium-input" type="text" id="webtitle" name="webtitle" value="<?php echo $rs_sys["webtitle"]; ?>" /> 
								</p>
								
								<p>
									<label>首页名称</label>
									<input class="text-input medium-input" type="text" id="indextitle" name="indextitle" value="<?php echo $rs_sys["indextitle"]; ?>" /> 
								</p>
								
								<p>
									<label>网站关键字</label>
									<input class="text-input medium-input" type="text" id="webkeywords" name="webkeywords" value="<?php echo $rs_sys["webkeywords"]; ?>" /> 
								</p>
								
								<p>
									<label>网站描述</label>
									<input class="text-input medium-input" type="text" id="webdescription" name="webdescription" value="<?php echo $rs_sys["webdescription"]; ?>" /> 
								</p>
								
								<p>
									<label>备案</label>
									<input class="text-input medium-input" type="text" id="webbeian" name="webbeian" value="<?php echo $rs_sys["webbeian"]; ?>" /> 
								</p>
								
								<p>
									<label>版权所有</label>
									<textarea class="text-input textarea" id="webcopyright" name="webcopyright" cols="60" rows="10"><?php echo $rs_sys["webcopyright"]; ?></textarea>
								</p>
								
								<p>
									<label>风格模板</label>
									<?php 
									if(!isset($rs_sys["systemplates"]) || empty($rs_sys["systemplates"])){
										$rs_sys["systemplates"] = 'default';
									}
									if(!isset($templatesList) || empty($templatesList)){
										echo '暂无';
									}
									foreach($templatesList as $key => $value){
									if(!is_file("../templates/".$value."/thumb.png")) {
										$templatesThumb = '../images/default/nopic.gif';
									} else {
										$templatesThumb = "../templates/".$value."/thumb.png";
									}
									?>
									<img src="<?php echo $templatesThumb?>" width="120" height="80" />
									 <br />
									<input type="radio" name="systemplates" value="<?php echo $value?>" <?php if($rs_sys["systemplates"] == $value) echo"checked=checked";?>/><?php echo $value?><br />
									 <?php
									 }
									 ?>
								</p>
								
								<p>
									<br /><input class="button" type="submit" name="submit" value="编辑" />
								</p>
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>
			
<?php 
include('footer.php');
?>