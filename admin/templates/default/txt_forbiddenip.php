<?php
////forbiddenip
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
								<?php
								if(isset($message) && !empty($message)) { 
								?>
								<p><?php echo $message; ?></p>
								<?php } ?>
								
								
								<p>
									<label>禁止ip（每行一个）</label>
									<textarea class="text-input textarea" id="content" name="content" cols="60" rows="10"><?php echo $data; ?></textarea>
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

