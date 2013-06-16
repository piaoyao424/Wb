<?php 
$pagetitle="分类权限编辑";
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
					
					<h3>
					<?php 
					/* if($config['classpower'] == 1 && is_file(WEB_CACHE.'modpower.cache.php')){
						include(WEB_CACHE.'modpower.cache.php');
						$cache_modpower["module_class"]["articles"] = array('1','文章');
						echo $cache_modpower["module_class"][$modulename][1];
					} */
					echo $cache_modpower["module_class"][$modulename][1];
					?>
					<?php echo $pagetitle;?>：<?php echo $userinfo['username']?></h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					
					<div class="tab-content  default-tab" id="tab1">				
						
							<form action="" method="post" name="form1" id="form1">
							<table>
						 
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th> 
								   <th>标题</th>
								</tr>
								
							</thead>
							
							<tbody>
							<?php
							foreach($List AS $key=>$value){
								//$classNum = $articles_class->GetClassCount($value['id']);
								$tmpid = $value['id'];
							?>
								<tr>
									<td><input type="checkbox" name="classpower_list[]" <?php if(isset($power_list[$tmpid]) && $power_list[$tmpid]) echo"checked=checked";?> value="<?php echo $tmpid?>" /></td> 
									<td><?php echo $value['space'];
									echo $value['title'];			
									?>
									</td>
								</tr>
							 <?php
							 }
							 ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="a">
												<!--<option>操作</option> -->
												<option value="list">提交</option>
											</select>
											<!--<a class="button" href="javascript:alert('暂无');">选择操作</a> -->
											<input class="button" type="submit" name="submit" value="选择操作" />
											<input type="hidden" name="c" value="users_classpower" />
											<input type="hidden" name="modulename" value="<?php echo $modulename;?>" />
											<input type="hidden" name="userid" value="<?php echo $userid;?>" />
											<input type="hidden" name="id" value="<?php echo $info['id'];?>" />
										</div>
										
										<div class="pagination">
											
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						</table>
							</form>
							<div class="clear"></div><!-- End .clear -->
							
						
						
					</div> <!-- End #tab1 -->
					
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>
			
<?php 
include('footer.php');
?>