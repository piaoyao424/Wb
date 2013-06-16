<?php 
$pagetitle="广告管理";
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
									<label>广告位</label>
									<select name="classid" class="small-input">
										<?php
							foreach($classList AS $key=>$value){
								  ?>
								  <option value="<?php echo $value['id'];?>" <?php if (!empty($info) && $info['classid'] == $value['id']) {?>selected="selected"<?php } ?>>
								  ┠<?php echo $value['title'];?>
								  </option>
								  <?php
							}
							?>
										</select>
									
								</p>
								
								<p>
									<label>内容</label>
									<textarea class="text-input textarea xheditor {upLinkUrl:'upload.php',upImgUrl:'upload.php',upFlashUrl:'upload.php',upMediaUrl:'upload.php'}" id="content" name="content" cols="60" rows="8"><?php if(!empty($info)) echo $info["content"]; ?></textarea>
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