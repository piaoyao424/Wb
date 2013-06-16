<?php 
$pagetitle="用户分类管理";
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
						
							
							<table>
						 
							<thead>
								<tr>
								   <!--<th><input class="check-all" type="checkbox" /></th> -->
								   <th>标题</th>
								   <th>操作</th>
								</tr>
								
							</thead>
							
							<tbody>
							<?php
							foreach($List AS $key=>$value){
							?>
								<tr>
									<!-- <td><input type="checkbox" name="id" value="" /></td> -->
									<td><?php echo $value['title'];?></td>
									<td><a href="?c=users_class&a=edit&id=<?php echo $value['id'];?>">编辑</a> <a href="?c=users_class&a=del&id=<?php echo $value['id'];?>" onclick="return confirm('确定删除？');">删除</a></td>
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