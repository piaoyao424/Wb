<?php 
$pagetitle="用户管理";
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
									<label>用户名</label>
									<input class="text-input medium-input" type="text" id="username" name="username" value="<?php if(!empty($info)) echo $info["username"]; ?>" <?php if(!empty($info)) echo 'readonly="true"'; ?>  /> <?php if(!empty($info)) echo '不能修改用户名'; ?>
								</p>
								
								<p>
									<label>密码</label>
									<input class="text-input medium-input" type="text" id="password" name="password" value="" /> <?php if(!empty($info)) echo '留空则不修改';else echo '留空则默认密码123456'; ?>
								</p>
																
								<p>
									<label>邮箱</label>
									<input class="text-input medium-input" type="text" id="email" name="email" value="<?php if(!empty($info)) echo $info["email"]; ?>" /> 
								</p>
																
								<p>
									<label>权限</label>
									<?php 
							if(is_file(WEB_CACHE.'modpower.cache.php')){
								include(WEB_CACHE.'modpower.cache.php');
								$cache_modpower["module"]["articles"] = array(
								'articles'=>'文章',
								'articles_class'=>'文章分类'
								);
								foreach($cache_modpower["module"] as $key => $value) {
									foreach($value as $key1 => $value1){
									?>
									<input type="checkbox" name="power_list[]" value="<?php echo $key1?>" <?php if(isset($power_list[$key1]) && $power_list[$key1]) echo"checked=checked";?> /><?php echo $value1?>
									<?php
									}
									echo '<br />';
								}
							}
							?>
									<input type="checkbox" name="power_list[]" value="sys" <?php if(isset($power_list['sys']) && $power_list['sys']) echo"checked=checked";?> />基本设置<br />
									<!--<input type="checkbox" name="power_list[]" value="articles" <?php if(isset($power_list['articles']) && $power_list['articles']) echo"checked=checked";?> />文章
									<input type="checkbox" name="power_list[]" value="articles_class" <?php if(isset($power_list['articles_class']) && $power_list['articles_class']) echo"checked=checked";?> />文章分类<br />
									<input type="checkbox" name="power_list[]" value="books" <?php if(isset($power_list['books']) && $power_list['books']) echo"checked=checked";?> />留言咨询 
									<input type="checkbox" name="power_list[]" value="books_class" <?php if(isset($power_list['books_class']) && $power_list['books_class']) echo"checked=checked";?> />留言咨询类型<br /> -->
									
									<input type="checkbox" name="power_list[]" value="links" <?php if(isset($power_list['links']) && $power_list['links']) echo"checked=checked";?> />链接 
									<input type="checkbox" name="power_list[]" value="links_class" <?php if(isset($power_list['links_class']) && $power_list['links_class']) echo"checked=checked";?> />链接类型<br />
									<input type="checkbox" name="power_list[]" value="ads" <?php if(isset($power_list['ads']) && $power_list['ads']) echo"checked=checked";?> />广告 
									<input type="checkbox" name="power_list[]" value="ads_class" <?php if(isset($power_list['ads_class']) && $power_list['ads_class']) echo"checked=checked";?> />广告位
									<input type="checkbox" name="power_list[]" value="adflash" <?php if(isset($power_list['adflash']) && $power_list['adflash']) echo"checked=checked";?> />轮转广告<br />
									<input type="checkbox" name="power_list[]" value="users" <?php if(isset($power_list['users']) && $power_list['users']) echo"checked=checked";?> />管理员
									<?php if($config['membersmode'] == 1) {?>
									<input type="checkbox" name="power_list[]" value="members" <?php if(isset($power_list['members']) && $power_list['members']) echo"checked=checked";?> />会员
									<?php
									}
									?>
								</p>
								
								<p>
									<label>类型</label>
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