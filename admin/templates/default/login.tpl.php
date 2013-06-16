<?php 
$pagetitle="管理登陆";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php if(!empty($topTitle)) echo $topTitle.'-';?>
<?php echo $sys['indextitle']; ?>-<?php echo $pagetitle;?></title>
<meta name="keywords" content="<?php echo $sys['webkeywords']; ?>">
<meta name="description" content="<?php echo $sys['webdescription']; ?>">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/invalid.css" type="text/css" media="screen" />	
</head>
<body id="login">		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>zcncms</h1>
				<a href="http://www.zcncms.com"><img id="logo" src="images/logo.png" alt="zcncms Admin logo" /></a>
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="" name="loginform" method="post">
				
					<div class="notification information png_bg">
						<div>
							<?php if(empty($loginerror)) echo '请输入用户名密码登陆.'; else echo $loginerror;?>
						</div>
					</div>
					
					<p>
						<label>用户</label>
						<input class="text-input" type="text" name="username" />
					</p>
					<div class="clear"></div>
					<p>
						<label>密码</label>
						<input class="text-input" type="password" name="password" />
					</p>
					<div class="clear"></div>
					<!--<p id="remember-password">
						<input type="checkbox" />记住我
					</p>
					<div class="clear"></div> -->
					<p>
						<input class="button" type="submit" name="submit" value="登陆" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
			
		</div> <!-- End #login-wrapper -->
		
  
  </body>
  </html>