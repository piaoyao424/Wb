<?php 
$pagetitle="安装系统";
include('header.php')
?>
<div class="site_container">
<h1>欢迎使用zcncms</h1>
<UL class=Form_Advance id=FormRegStep1>
    <LI class=Title>安装环境检测_程序安装</LI>
    <li class="installhr">
      <hr>
    </li>
    <li>您的PHP版本：<?php echo PHP_VERSION;?></li>
    <li>sqlite：
      <?php
  if(function_exists("pdo_drivers")){
	$pdo_drivers=pdo_drivers();
	if(in_array('sqlite',$pdo_drivers)){
		//通过建立新的数据库来全面测试下看
		$sql="";		
		$pdo=new PDO("sqlite:test.db");
		if($pdo){
			//没有错误 开始安装
			//安装表
			$pdo->exec("create table test(a int)");
			if($pdo->errorCode()=='00000'){
				//测试插入数据
				$pdo->exec("insert into test values(1)");
				if($pdo->errorCode()=='00000'){
					echo "<span style='color:green'>支持</span>";
				}else{
					echo "<span style='color:red'>不支持</span>";
				}
			}else{
				echo "<span style='color:red'>不支持</span>";
			}
			unset($pdo);
			@unlink('test.db');
		}else{
			echo "<span style='color:red'>测试失败，可能install目录没有读写权限或者空间不支持本CMS程序要用到的SQLITE驱动</span>";
		}
	}else{
		echo "<span style='color:red'>不支持</span>";
	}
}else{
	echo "<span style='color:red'>不支持</span>";
}
  ?>
    </li>
    <li>mysql：
      <?php  
  if(extension_loaded('mysql')){
	  echo "<span style='color:green'>支持</span>";
  }else{
	  echo "<span style='color:red'>不支持</span>";
  }
  ?>
    </li>
    <li>GD：
      <?php  
  if(extension_loaded('gd')){
	  echo "<span style='color:green'>支持</span>";
  }else{
	  echo "<span style='color:red'>不支持</span>";
  }
  ?>
    </li>
    <li class="installhr">
      <hr>
    </li>
    <li>目录检测(<span style="color:red">以下目录要有读写权限</span>)：</li>
    <li>
      <table width="300" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>目录名</td>
          <td>写入权限</td>
          <td>读取权限</td>
        </tr>
        <?php
  function TestWrite($dir){
	$tfile = '_test.txt';
	//$d = ereg_replace('/$','',$dir);
	$d = preg_replace('/\/$/','',$dir);
	//echo $d;
	$fp = @fopen($d.'/'.$tfile,'w');
		if(!$fp) return false;
		else
		{
			fclose($fp);
			$rs = @unlink($dir.'/'.$tfile);
			if($rs) return true;
			else return false;
		}
	}
  	$darr=array(
				'/include/*',
				'/data/*',
				'/data/cache/*',
				'/uploads/*',
				'/templates/*',
				'/install'
				);
	//define('WEB_INCLUDE', ereg_replace("[/\\]{1,}",'/',dirname(__FILE__) ));
	//define('WEB_DR', ereg_replace("[/\\]{1,}",'/',substr(WEB_INC,0,-8) ) );
	define('WEB_DR',preg_replace("/(\/|\\\\)+/",'/',substr(WEB_INC,0,-8) ) );
	//echo WEB_INCLUDE;
	//echo WEB_INC;
	//echo WEB_DR;
	foreach($darr as $dir){		
		$filldir = WEB_DR.str_replace('/*','',$dir);
		$isread=(is_readable($filldir) ? '<font color=green>[√]读</font>' : '<font color=red>[×]读</font>');
	    $iswrite = (TestWrite($filldir) ? '<font color=green>[√]写</font>' : '<font color=red>[×]写</font>');
		echo "<tr><td>$dir</td><td>$isread</td><td>$iswrite</td></tr>";
      	//$rsta = (is_readable($filldir) ? '<font color=green>[√]读</font>' : '<font color=red>[×]读</font>');
	    		//$wsta = (TestWrite($filldir) ? '<font color=green>[√]写</font>' : '<font color=red>[×]写</font>');
	    		//echo "<td>$rsta</td><td>$wsta</td>\r\n";
	}
  ?>
      </table>
    </li>
    <li class="installhr">
      <hr>
    </li>
    <LI class=SubmitBox>
      <INPUT class="btn" type="button" onclick="location.href='index.php?a=step2'" value="进入下一步" name=Submit>
    </LI>
  </UL>
<div style="clear:both"></div>
</div>
<?php 
include('footer.php');
?>