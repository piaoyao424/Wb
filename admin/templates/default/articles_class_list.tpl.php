<?php 
$pagetitle="文章分类列表";
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
								$classNum = $articles_class->GetClassCount($value['id']);
							?>
								<tr>
									<!-- <td><input type="checkbox" name="id" value="" /></td> -->
									<td><?php echo $value['space'];
									if ($classNum > 0) {
										echo $value['title'];									
									} else {
									?>
									<a href="?c=articles&a=list&classid=<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
									<?php
									}
									?>
									</td>
									<td>
									<?php
									if ($classNum > 0) {
										echo '';									
									} else {
									?>
									<a href="?c=articles&a=edit&classid=<?php echo $value['id'];?>">增加内容</a> 
									<?php
									}
									?>
									<a href="?c=articles_class&a=edit&id=<?php echo $value['id'];?>">编辑</a> <a href="?c=articles_class&a=del&id=<?php echo $value['id'];?>" onclick="return confirm('确定删除？');">删除</a></td>
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