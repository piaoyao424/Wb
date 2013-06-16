<?php 
$pagetitle="留言管理";
include(WEB_TPL.'header.php');
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
					
					<form action="" method="post" name="form1" id="form1">
					
					<div class="tab-content  default-tab" id="tab1">				
						
							
							<fieldset> 
								<p>
									<label>标题</label>
									<?php if(!empty($info)) echo $info["title"]; ?>
								</p>
								
								<p>
									<label>分类</label>
									<?php
									$classinfo = $books_class->GetInfo($info['classid']);
									?>
									<?php if(!empty($info)) echo $classinfo["title"]; ?>
								</p>
								
								<p>
									<label>称呼</label>
									<?php if(!empty($info)) echo $info["niname"]; ?>
								</p>
								
								<p>
									<label>email</label>
									<?php if(!empty($info)) echo $info["email"]; ?>
								</p>
								
								<p>
									<label>qq</label>
									<?php if(!empty($info)) echo $info["qq"]; ?>
								</p>
								
								<p>
									<label>msn</label>
									<?php if(!empty($info)) echo $info["msn"]; ?>
								</p>
								
								<p>
									<label>地址</label>
									<?php if(!empty($info)) echo $info["addr"]; ?>
								</p>
								
								<p>
									<label>电话</label>
									<?php if(!empty($info)) echo $info["tel"]; ?>
								</p>
								
								<p>
									<label>手机</label>
									<?php if(!empty($info)) echo $info["mobile"]; ?>
								</p>
								
								<p style="display:none">
									<label>会员</label>
									<?php if(!empty($info)) echo $info["memberid"]; ?>
								</p>
								
								<p>
									<label>内容</label>
									<?php if(!empty($info)) echo $info["content"]; ?>
								</p>
								
								<p>
									<label>时间</label>
									<?php if(!empty($info)) echo date('Y-m-d H:i',$info["addtime"]); ?>
								</p>
								
								<p>
									<label>回复内容</label>
									<textarea class="text-input textarea xheditor {upLinkUrl:'upload.php',upImgUrl:'upload.php',upFlashUrl:'upload.php',upMediaUrl:'upload.php'}" id="backcontent" name="backcontent" cols="60" rows="8"><?php if(!empty($info)) echo $info["backcontent"]; ?></textarea>
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
								<label>回复</label>
								<?php 
								if(!empty($info) && $info["isok"] == 1){
									$isok = 1;
								} else {
									$isok = 0;
								}									
								?>
								<input type="radio" name="isok" value="1" <?php if($isok=='1') echo"checked=checked";?>/>是 
								<input type="radio" name="isok" value="0" <?php if($isok=='0') echo"checked=checked";?>/>否
							</p>
							<p style="display:none">
								<label>编辑时间</label>
								<input class="text-input medium-input" type="text" id="backtime" name="backtime" value="<?php echo $time; ?>" /> 请勿随意填写
							</p>
								
							<p>
								<br /><input class="button" type="submit" name="submit" value="编辑" />
							</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						
						
					</div> <!-- End #tab1 -->
					</form>
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>
			
<?php 
include(WEB_TPL.'footer.php');
?>