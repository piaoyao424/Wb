<?php 
$pagetitle="链接列表";
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
								   <th>分类</th>
								   <th>链接</th>
								   <th>操作</th>
								</tr>
								
							</thead>
							
							<tbody>
							<?php
							foreach($List AS $key=>$value){
							$classinfo = $links_class->GetInfo('',' id='.$value['classid']);
							?>
								<tr>
									<!-- <td><input type="checkbox" name="id" value="" /></td> -->
									<td><?php echo $value['title'];?></td>
									<td><?php echo $classinfo['title'];?></td>
									<td><?php echo $value['linkurl'];?></td>
									<td><a href="?c=links&a=edit&id=<?php echo $value['id'];?>">编辑</a> <a href="?c=links&a=del&id=<?php echo $value['id'];?>" onclick="return confirm('确定删除？');">删除</a></td>
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