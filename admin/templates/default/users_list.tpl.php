<?php 
$pagetitle="用户列表";
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
						
							<?php 
							if($config['classpower'] == 1 && is_file(WEB_CACHE.'modpower.cache.php')){
								include(WEB_CACHE.'modpower.cache.php');
								$cache_modpower["module_class"]["articles"] = array('1','文章');
							}
							?>
							<table>
						 
							<thead>
								<tr>
								   <!--<th><input class="check-all" type="checkbox" /></th> -->
								   <th>用户名</th>
								   <th>类型</th>
								   <th>操作</th>
								</tr>
								
							</thead>
							
							<tbody>
							<?php
							foreach($List AS $key=>$value){
							$classinfo = $users_class->GetInfo('',' id='.$value['classid']);
							?>
								<tr>
									<!-- <td><input type="checkbox" name="id" value="" /></td> -->
									<td><?php echo $value['username'];?></td>
									<td><?php echo $classinfo['title'];?></td>
									<td><?php 
									if($value['classid'] > 2 && isset($cache_modpower)) {
										foreach($cache_modpower["module_class"] as $key1 => $value1){
											if($value1[0] == 1){
												echo '<a href="?c=users_classpower&modulename='.$key1.'&userid='.$value['id'].'">'.$value1[1].'分类权限</a> ';
											}
										}
									}?>
									&nbsp;&nbsp;&nbsp;<a href="?c=users&a=edit&id=<?php echo $value['id'];?>">编辑</a> <a href="?c=users&a=del&id=<?php echo $value['id'];?>" onclick="return confirm('确定删除？');">删除</a></td>
								</tr>
							 <?php
							 }
							 ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6">
										<!-- <div class="bulk-actions align-left">
											<select name="dropdown">
												<option>操作</option>
												<option value="del">删除</option>
											</select>
											<a class="button" href="javascript:alert('暂无');">选择操作</a>
										</div> -->
										
										<div class="pagination">
											<?php echo $showpage; ?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						</table>
							
							<div class="clear"></div><!-- End .clear -->
							
						
						
					</div> <!-- End #tab1 -->
					
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>
			
<?php 
include('footer.php');
?>