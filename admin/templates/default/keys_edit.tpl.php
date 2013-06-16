<?php 
$pagetitle="关键词管理";
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
									<label>关键词（建议填写中文英文数字，请勿使用‘ " 等标点符号）</label>
									<input class="text-input medium-input" type="text" id="title" name="title" value="<?php if(!empty($info)) echo $info["title"]; ?>" /> 
								</p>
							
								<p>
									<label>链接</label>
									<input class="text-input medium-input" type="text" id="linkurl" name="linkurl" value="<?php if(!empty($info)) echo $info["linkurl"];else echo 'http://'; ?>" /> 
								</p>
								
								<p>
									<label>顺序</label>
									<input class="text-input medium-input" type="text" id="orders" name="orders" value="<?php if(!empty($info)) echo $info["orders"];else echo '0'; ?>" /> 
								</p>
								
								<p>
									<label>替换次数</label>
									<input class="text-input medium-input" type="text" id="replacenum" name="replacenum" value="<?php if(!empty($info)) echo $info["replacenum"];else echo '0'; ?>" /> 
								</p>
								
								<p>
									<label>开始时间</label>
									<input class="text-input medium-input datetimebox" type="text" onfocus="show_date('starttime',true);" id="starttime" name="starttime" value="<?php if(!empty($info) &&!empty($info["starttime"])) echo date('Y-m-d H:i',$info["starttime"]);  ?>" /> 
								</p>
								
								<p>
									<label>结束时间</label>
									<input class="text-input medium-input datetimebox" type="text" onfocus="show_date('endtime',true);" id="endtime" name="endtime" value="<?php if(!empty($info) &&!empty($info["endtime"])) echo date('Y-m-d H:i',$info["endtime"]);  ?>" /> 
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