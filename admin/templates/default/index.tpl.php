<?php 
$pagetitle="首页";
include('header.php');
?><noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser.</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			

			
			<h2>欢迎访问网站管理后台</h2>
			<p id="page-intro">快捷方式</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="?c=articles&a=edit"><span>
					<img src="images/icons/pencil_48.png" alt="icon" /><br />
					添加文章
				</span></a></li>
				
				<li><a class="shortcut-button" href="?c=articles&a=list"><span>
					<img src="images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					管理文章
				</span></a></li>
				
				<li><a class="shortcut-button" href="?c=ads&a=edit"><span>
					<img src="images/icons/image_add_48.png" alt="icon" /><br />
					添加广告
				</span></a></li>
				
				<li><a class="shortcut-button" href="?c=sys&a=edit"><span>
					<img src="images/icons/clock_48.png" alt="icon" /><br />
					基本设置
				</span></a></li>
				
				<li><a class="shortcut-button" href="?c=users_log&a=list"><span>
					<img src="images/icons/comment_48.png" alt="icon" /><br />
					管理日志
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>系统信息</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						
						
						<table>
						 
							<tbody>
								<tr>
									<td>程序版本</td>
									<td>ZCNCMS(oss) Portal Management System v<?php echo $version;?></td>
								</tr>
								<tr>
									<td>操作系统</td>
									<td><?php echo PHP_OS;?></td>
								</tr>
								<tr>
									<td>网站域名/IP</td>
									<td><?php echo $_SERVER['SERVER_NAME'];?>(<?php echo gethostbyname($_SERVER['SERVER_NAME']);?>)</td>
								</tr>
								<tr>
									<td>服务器解译引擎</td>
									<td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
								</tr>
								<tr>
									<td>PHP</td>
									<td><?php echo "php ".PHP_VERSION;?></td>
								</tr>
								<?php if($db_type == 2) { ?>
								<tr>
									<td>MySQL 版本</td>
									<td><?php echo "mysql ".mysql_get_server_info();?></td>
								</tr>
								<?php }?>
								<tr>
									<td>服务器时间</td>
									<td><?php echo date("Y-m-d H:i:s",time());?></td>
								</tr>
								<tr>
									<td>当前附件尺寸</td>
									<td><?php echo get_cfg_var("upload_max_filesize");?></td>
								</tr>
								<tr>
									<td>服务器语言</td>
									<td><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>
								</tr>
								<tr>
									<td valign="top">官方公告</td>
									<td><div id="zcnnotice"></div><div id="zcnupdate"></div></td>
								</tr>
								<tr>
									<td valign="top">团队成员</td>
									<td> </td>
								</tr>
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>
			
<?php 
include('footer.php');
?>