<?php 
$pagetitle="用户日志";
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
								   <th>用户</th>
								   <th>动作</th>
								   <th>时间</th>
								</tr>
								
							</thead>
							
							<tbody>
							<?php
							foreach($List AS $key=>$value){
							if(!empty($value['userid'])){
								$userinfo = $users->GetInfo('',' id='.$value['userid']);
							}
							?>
								<tr>
									<!-- <td><input type="checkbox" name="id" value="" /></td> -->
									<td><?php 
									if(!empty($value['userid'])){
										echo $userinfo['username'];
									}
									?></td>
									<td><?php echo $value['action'];?></td>
									<td><?php echo date('Y-m-d H:i',$value['addtime']);?></td>
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