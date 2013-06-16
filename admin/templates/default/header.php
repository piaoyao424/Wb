<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php if(!empty($topTitle)) echo $topTitle.'-';?>
<?php echo $sys['webtitle']; ?>-管理-<?php echo $pagetitle;?></title>
<meta name="keywords" content="<?php echo $sys['webkeywords']; ?>">
<meta name="description" content="<?php echo $sys['webdescription']; ?>">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/invalid.css" type="text/css" media="screen" />	
<link rel="stylesheet" href="css/calendar-green.css" type="text/css" media="screen" />	
<link rel="stylesheet" href="../css/jui/ui.css" type="text/css" media="screen" />
<script language="javascript" src="../js/jquery.min.js" type="text/javascript"></script>	
<script language="javascript" src="../js/jquery-ui.min.js" type="text/javascript"></script>	
<script type="text/javascript" src="js/admin.jquery.configuration.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/dyndatetime.js"></script>
<script type="text/javascript" src="js/iColorPicker.js"></script>
<script type="text/javascript" src="plugin/editor/xheditor-zh-cn.min.js"></script>
<script type="text/javascript" src="plugin/upload/ajaxfileupload.js"></script>
</head>
<body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->

		
			<h1 id="sidebar-title"><a href="#">信息管理系统</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="./"><img id="logo" src="images/logo.png" alt="zcncms logo" /></a>
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <?php echo $_SESSION['admin_username'];?>
				<br />
				<a href="./?a=clear_cache" title="清理缓存">清理缓存</a> | <!--<a href="./" title="前台首页">后台首页</a> |  --><a href="../" title="前台首页" target="_blank">前台首页</a> | <a href="?c=logout" title="退出">退出</a> 
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a id="index" href="./" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						管理首页
					</a>       
				</li>
				
				<li> 
					<a id="articles" href="javascript:void(0);" class="nav-top-item"> 
					文章编辑
					</a>
					<ul>
						<li><a id="articles_class_list" href="?c=articles_class&a=list">文章分类列表</a></li>
						<li><a id="articles_class_edit" href="?c=articles_class&a=edit">文章分类添加</a></li>
						<li><a id="articles_list" href="?c=articles&a=list">文章列表</a></li>
						<li><a id="articles_edit" href="?c=articles&a=edit">文章添加</a></li>
					</ul>
				</li><!--
				
				<li>
					<a id="books" href="javascript:void(0);" class="nav-top-item">
						留言管理
					</a>
					<ul>
						<li><a id="books_class_list" href="?c=books_class&a=list">留言类型列表</a></li>
						<li><a id="books_class_edit" href="?c=books_class&a=edit">留言类型添加</a></li>
						<li><a id="books_list" href="?c=books&a=list">留言列表</a></li>
						<li><a id="books_unback" href="?c=books&a=unback">未回复留言列表</a></li>
					</ul>
				</li> -->
				
				<?php 
				if(is_file(WEB_CACHE . 'modmenu.cache.php')) {
					include(WEB_CACHE . 'modmenu.cache.php');
					//20121212
					if(isset($cache_modmenu)) {
						foreach($cache_modmenu as $key => $value){
						?>
						<li> 
						<a id="<?php echo $key?>" href="javascript:void(0);" class="nav-top-item"> 
						<?php echo $value['topitem'][$key]?>
						</a>
						<ul>
						<?php 
							foreach($value['item'] as $key1 => $value1){
							?>
							<li><a id="<?php echo $key1?>" href="<?php echo $value1[1]?>"><?php echo $value1[0]?></a></li>
							<?php
							}					
						?>
						</ul>
						</li>
						<?php
						}	
					}			
				}
				?>
				
				<li>
					<a id="links" href="javascript:void(0);" class="nav-top-item">
						链接管理
					</a>
					<ul>
						<li><a id="links_class_list" href="?c=links_class&a=list">链接类型列表</a></li>
						<li><a id="links_class_edit" href="?c=links_class&a=edit">链接类型添加</a></li>
						<li><a id="links_list" href="?c=links&a=list">链接列表</a></li>
						<li><a id="links_edit" href="?c=links&a=edit">链接添加</a></li>
					</ul>
				</li>
				
				<li>
					<a id="ads" href="javascript:void(0);" class="nav-top-item">
						广告管理
					</a>
					<ul>
						<li><a id="ads_class_list" href="?c=ads_class&a=list">广告位管理</a></li>
						<li><a id="ads_class_edit" href="?c=ads_class&a=edit">广告位添加</a></li>
						<li><a id="ads_list" href="?c=ads&a=list">广告列表</a></li>
						<li><a id="ads_edit" href="?c=ads&a=edit">广告添加</a></li>
						<li><a id="adflash_list" href="?c=adflash&a=list">轮转广告管理</a></li>
						<li><a id="adflash_edit" href="?c=adflash&a=edit">轮转广告添加</a></li>
					</ul>
				</li>
				
				<li>
					<a id="sys" href="javascript:void(0);" class="nav-top-item">
						基本设置
					</a>
					<ul>
						<li><a id="sys_edit" href="?c=sys&a=edit">基本信息</a></li>
						<li><a id="users_list" href="?c=users&a=list">管理员列表</a></li><!--可考虑增加类型管理 -->
						<li><a id="users_edit" href="?c=users&a=edit">管理员添加</a></li>
						<li><a id="users_log_list" href="?c=users_log&a=list">管理员日志</a></li>
						<li><a id="sitemaps_step0" href="?c=sitemaps&a=step0">生成站点地图</a></li>
						<li><a id="filecheck_default" href="?c=filecheck&a=default">在线文件校验</a></li>
						<li><a id="txt_forbiddenip" href="?c=txt&a=forbiddenip">禁止IP</a></li>
						<li><a id="keys_list" href="?c=keys&a=list">关键词管理</a></li>
						<li><a id="keys_edit" href="?c=keys&a=edit">关键词添加</a></li>
					</ul>
				</li>    
				
				
				<?php if($config['membersmode'] == 1) {?>
				<li>
					<a id="members" href="javascript:void(0);" class="nav-top-item">
						会员管理
					</a>
					<ul>
						<li><a id="members_class_list" href="?c=members_class&a=list">会员类型列表</a></li>
						<li><a id="members_class_edit" href="?c=members_class&a=edit">会员类型添加</a></li>
						<li><a id="members_list" href="?c=members&a=list">会员列表</a></li>
						<!--<li><a id="members_playoverduelist" href="?c=members&a=playoverduelist">到期会员列表</a></li> -->
						<li><a id="members_edit" href="?c=members&a=edit">会员添加</a></li>
						<li><a id="members_log_list" href="?c=members_log&a=list">会员日志</a></li>
						<!--<li><a id="members" href="?c=members&a=list">匿名会员权限</a></li> -->
					</ul>
				</li>   
				<?php
				}
				?>
				<li>
					<a href="javascript:void(0);" class="nav-top-item"> 
						版权信息
					</a>
					<ul>
						<li><a href="#copyzcn"   rel="modal" title="退出">版权信息</a> </li>
						<li><a href="javascript:void(0);">Powered by ZCNCMS</a></li>
					</ul>      
					
				</li>
				
			</ul> <!-- End #main-nav -->
<script language="javascript">
<?php 
//控制menu
$c1 = '';
$c1 = $c;
$c1 = str_replace('_classpower','',$c1);
$c1 = str_replace('_class','',$c1);
$c1 = str_replace('_log','',$c1);
$c1 = str_replace('_photo','',$c1);
$c1 = str_replace('adflash','ads',$c1);
if($c1 == 'users' || $c1 == 'sys' || $c1 == 'sitemaps' || $c1 == 'filecheck' || $c1 == 'txt' || $c1 == 'keys') {
	echo '$("#sys").addClass("current");';
} else {
	echo '$("#'.$c1.'").addClass("current");';
}
echo '$("#'.$c.'_'.$a.'").addClass("current");';

if(strpos($c,  'psis') !== false) {
	echo '$("#psis").addClass("current");';
}
?>
</script>				
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>提示信息</h3>
			 
				<p>
					<strong>你好</strong> by zcncms<br />
					欢迎使用zcncms
				</p>
				
			</div> <!-- End #messages -->
			<div id="copyzcn" style="display: none"> 
				
				<h3>提示信息</h3>
			 
				<p>
					<strong>版权信息</strong> <br />
					欢迎使用ZCNCMS(oss) Portal Management System v<?php echo $version?>
				</p>
				
			</div>
			<!-- End #messages -->
			
		</div></div>
		<div id="main-content"> <!-- Main Content Section with everything -->