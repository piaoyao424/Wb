<?php 
$pagetitle="产品列表";
include(WEB_TPL . 'header.php');
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
							<table>
						 
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>标题</th>
								   <th>分类</th>
								   <th>操作</th>
								</tr>
								
							</thead>
							
							<tbody>
							<?php
							foreach($List AS $key=>$value){
							$classinfo = $products_class->GetInfo('',' id='.$value['classid']);
							?>
								<tr>
									<td><input type="checkbox" name="id[]" value="<?php echo $value['id'];?>" /></td>
									<td><?php echo $value['title'];?></td>
									<td><?php echo $classinfo['title'];?></td>
									<td><a href="?c=products_photo&a=edit&productid=<?php echo $value['id'];?>">增加图片</a> <a href="?c=products_photo&a=list&productid=<?php echo $value['id'];?>">查看图片</a> <a href="../?c=products&a=show&id=<?php echo $value['id'];?>" target="_blank">前台预览</a> <a href="?c=products&a=edit&id=<?php echo $value['id'];?>">编辑</a> <a href="?c=products&a=del&id=<?php echo $value['id'];?>" onclick="return confirm('确定删除？');">删除</a></td>
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
												<option>操作</option>
												<option value="del">删除</option>
											</select>
											<!--<a class="button" href="javascript:alert('暂无');">选择操作</a> -->
											<input class="button" type="submit" name="submit" value="选择操作" />
											<input type="hidden" name="c" value="products" />
										</div>
										
										<div class="pagination">
											<?php echo $showpage; ?>
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
include(WEB_TPL . 'footer.php');
?>