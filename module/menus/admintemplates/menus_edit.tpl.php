<?php 
$pagetitle="导航管理";
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
									<input class="text-input medium-input" type="text" id="title" name="title" value="<?php if(!empty($info)) echo $info["title"]; ?>" /> 
								</p>
								
								
								
								<p>
									<label>导航</label>
									<select name="parentid" class="small-input">
										<option value="0">作为一级导航</option>
										<?php
							foreach($classList AS $key=>$value){
								  ?>
								  <option value="<?php echo $value['id'];?>" <?php if (!empty($info) && $info['parentid'] == $value['id']) {?>selected="selected"<?php } ?>>
								  ┠<?php echo $value['title'];?>
								  </option>
								  <?php
							}
							?>
										</select>
								</p>
								
								<p>
									<label>转连接</label>
									<input class="text-input medium-input" type="text" id="linkurl" name="linkurl" value="<?php if(!empty($info)) echo $info["linkurl"]; ?>" /> 
								</p>
								
								<p>
									<label>是否新窗口（新窗口_blank、原窗口_self）</label>
									<input class="text-input medium-input" type="text" id="target" name="target" value="<?php if(!empty($info)) echo $info["target"]; else echo '_self'; ?>" /> 
								</p>
								
								<p>
									<label>排序</label>
									<input class="text-input small-input" type="text" id="orders" name="orders" value="<?php if(!empty($info)) echo $info["orders"]; else echo '0'; ?>" /> 
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