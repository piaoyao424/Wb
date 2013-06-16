<?php 
$pagetitle="链接分类管理";
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
					
					<form action="" method="post" name="form1" id="form1">
					
					<div class="tab-content  default-tab" id="tab1">				
						
							
							<fieldset> 
								<p>
									<label>标题</label>
									<input class="text-input medium-input" type="text" id="title" name="title" value="<?php if(!empty($info)) echo $info["title"]; ?>" /> 
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
include('footer.php');
?>