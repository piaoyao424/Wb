<?php
/**
* ZCNCMS
* 安装过程
* php>=5.0
* @author LEI
* @version 1.1.2
* @time 20111004
*/
//初始化
//功能部分

//安装
//开始安装
$query = '';
if($install_db_type==2){
	$conn=mysql_connect($mysql_host,$mysql_name,$mysql_pass);
	if($conn){
		if(mysql_select_db($mysql_table)){
			mysql_query("SET NAMES 'utf8'");
			//安装表
			$fp = fopen('zcncms.sql','r');
			while(!feof($fp)){
				 $line = rtrim(fgets($fp,1024));
				 if(preg_match("/;$/",$line)){
					 $query .= $line."\n";
					 $query = str_replace('{tablepre}',$install_tablepre,$query);
					$rs = mysql_query($query,$conn);
					   $query='';
				 }
				 else if(!preg_match("/^(\/\/|--)/",$line)){
					   $query .= $line;
				 }
			}
			fclose($fp);
			//初始化数据
			$fp = fopen('zcncms_default.sql','r');
			while(!feof($fp)){
				 $line = rtrim(fgets($fp,1024));
				 //if(ereg(";$",$line)){
				 if(preg_match("/;$/",$line)){
					 $query .= $line."\n";
					 $query = str_replace('{tablepre}',$install_tablepre,$query);
					 $query=trim($query);
					 $rs = mysql_query($query);
					 $query='';
				 }
				 else if(!preg_match("/^(\/\/|--)/",$line)){
					   $query .= $line;
				 }
			}
			fclose($fp);
			//插入管理员
			$sql="insert into $install_tablepre"."users(username,password,classid) values('$adminuser','".md5($adminpas)."','1')";
			mysql_query($sql);
			//更改配置
			$db_config="";
			$db_config.="<?php\n";
			$db_config.="//数据库配置\n";
			$db_config.="\$db_type='2';\n";
			$db_config.="\$db_host='$mysql_host';\n";
			$db_config.="\$db_name='$mysql_name';\n";
			$db_config.="\$db_pass='$mysql_pass';\n";
			$db_config.="\$db_table='$mysql_table';\n";
			$db_config.="\$db_ut='utf8';\n";
			$db_config.="\$db_tablepre='$install_tablepre';\n";
			$db_config.="?>";
			require("../include/file.class.php");
			$f=new FILES();
			$f->setText($db_config);
			$f->saveToFile('../include/dataconfig.inc.php');
			
			
			
			//加安装锁
			@touch("../data/install.lock");
			
			if($rs=='true'){
				errorinfo("程序安装成功，请点击<a href='../'>此处</a>进入网站！",'');
			}
		}else{
			errorinfo("数据库信息有误！",'');
		}
	}else{
		errorinfo("数据库信息有误！",'');
	}
}elseif($install_db_type==1){
	$sqlite_name = '';
	$sqlite_pass = '';
	$sqlite_tab = '';
	$db_path='../data/'.$sqlite_table;
	$pdo=new PDO("sqlite:$db_path");
		if($pdo){
			//没有错误 开始安装
			//安装表
			$pdo->exec("create table '<?php'(a)");
			$fp = fopen('zcncms.sql','r');
			if(!$fp){
				errorinfo("读取安装文件(zcncms.sql)错误！",'');
			}
			while(!feof($fp)){
				 $line = rtrim(fgets($fp,1024));
				 if(preg_match("/;$/",$line)){
					 $query .= $line."\n";
					 $query = str_ireplace('{tablepre}',$install_tablepre,$query);
					 $query = str_ireplace(' unsigned','',$query);
					 $query = str_ireplace(' ON UPDATE CURRENT_TIMESTAMP','',$query);
					 $query = str_ireplace(' NOT NULL auto_increment','',$query);
					 //$query = str_replace(' PRIMARY KEY  (`id`)','',$query);
					 $query = str_ireplace(' ENGINE=MyISAM  DEFAULT CHARSET=utf8','',$query);
					 //echo $query;
					 $rs = $pdo->exec($query);
					 //print_r($pdo->errorInfo());
					 //exit;
					 $query='';
				 }
				 else if(!preg_match("/^(\/\/|--)/",$line)){
					   $query .= $line;
				 }
			}
			fclose($fp);
			//初始化数据
			$fp = fopen('zcncms_default.sql','r');
			if(!$fp){
				errorinfo("读取安装文件(zcncms_default.sql)错误！",'');
			}
			while(!feof($fp)){
				 $line = rtrim(fgets($fp,1024));
				 if(preg_match("/;$/",$line)){
					 $query .= $line."\n";
					 $query = str_replace('{tablepre}',$install_tablepre,$query);
					 $query=trim($query);
					 $rs = $pdo->exec($query);
					 $query='';
				 }
				 else if(!preg_match("/^(\/\/|--)/",$line)){
					   $query .= $line;
				 }
			}
			fclose($fp);
			//插入管理员
			$sql="insert into $install_tablepre"."users(username,password,classid,email,power) values('$adminuser','".md5($adminpas)."','1','','')";
			//echo $sql;
			
			if($pdo->exec($sql)){
			//echo '成功';
			};
			//更改配置
			$db_config="";
			$db_config.="<?php\n";
			$db_config.="//数据库配置\n";
			$db_config.="\$db_type='1';\n";
			$db_config.="\$db_host='$sqlite_table';\n";
			$db_config.="\$db_name='$sqlite_name';\n";
			$db_config.="\$db_pass='$sqlite_pass';\n";
			$db_config.="\$db_table='$sqlite_tab';\n";
			$db_config.="\$db_tablepre='$install_tablepre';\n";
			$db_config.="\$db_ut='utf8';\n";
			$db_config.="?>";
			require("../include/file.class.php");
			$f=new FILES();
			$f->setText($db_config);
			$f->saveToFile('../include/dataconfig.inc.php');
			
			
			
			//加安装锁
			@touch("../data/install.lock");
			
			if($rs=='1'){
				errorinfo("程序安装成功，请点击<a href='../'>此处</a>进入网站！",'');
			}
	}else{
		errorinfo("数据库信息有误！",'');
	}
}
?>