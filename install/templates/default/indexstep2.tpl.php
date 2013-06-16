<?php 
$pagetitle="安装系统";
include('header.php');
?>
<div class="site_container">
<h1>欢迎使用zcncms</h1>
<form action="index.php" method="post">
    <input type="hidden" name="a" id="a" value="install">
    <UL class=Form_Advance id=FormRegStep1>
      <LI class=Title>安装系统</LI>
      
	  <li class="installhr">
      <hr>
	  </li>
	  
      <li>
        <DIV class=Hint>数据库类型：</DIV>
        <DIV class=FormInput>
          <input name="install_db_type" type="radio" id="install_db_type" style="width:15px; border:none; height:15px;" onclick="ShowPanel(1)" value="1" />SQLite
          <input type="radio" onclick="ShowPanel(2)" name="install_db_type" id="install_db_type" value="2" checked="checked" style="width:15px; border:none; height:15px;" />Mysql
        </DIV>
        <div class="Info">
          <div class="alert_txt"><span class="Hint">SQLite网站处理的数据量小于10W时选择,当网站要处理的数据量比较大时选择Mysql</span></div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      <span id="sqlitepanel" style="display:none">
      <li>
        <DIV class=Hint>数据库名称：</DIV>
        <DIV class=FormInput>
          <input id="sqlite_table" size="24" class="Warning" name="sqlite_table" value="#data.sqlite" />
        </DIV>
        <div class="Info">
          <div class="alert_txt">请输入的数据库名,默认为#data.sqlite，数据库会建立在data目录中</div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      </span> <span id="mysqlpanel">
      <li>
        <DIV class=Hint>数据库主机：</DIV>
        <DIV class=FormInput>
          <input id="mysql_host" size="24" class="Warning" name="mysql_host" value="localhost" />
        </DIV>
        <div class="Info">
          <div class="alert_txt"><span class="Hint">本机的话为localhost,非本机填IP</span></div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      <li>
        <DIV class=Hint>数据库名称：</DIV>
        <DIV class=FormInput>
          <input id="mysql_table" size="24" class="Warning" name="mysql_table" />
        </DIV>
        <div class="Info">
          <div class="alert_txt"></div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      <li>
        <DIV class=Hint>数据库用户：</DIV>
        <DIV class=FormInput>
          <input name="mysql_name" class="Warning" id="mysql_name" size="24" />
        </DIV>
        <div class="Info">
          <div class="alert_txt"></div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      <li>
        <DIV class=Hint>数据库密码：</DIV>
        <DIV class=FormInput>
          <input id="mysql_pass" size="24" class="Warning" name="mysql_pass" />
        </DIV>
        <div class="Info">
          <div class="alert_txt">
            <div id="content_alert"></div>
          </div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      </span>
      <li>
        <DIV class=Hint>数据库前缀：</DIV>
        <DIV class=FormInput>
          <input id="install_tablepre" size="24" class="Warning" name="install_tablepre" value="zcn_" />
        </DIV>
        <div class="Info">
          <div class="alert_txt">如果数据库中存在相同前缀的表，请用不同的前缀</div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      
	  <li class="installhr">
      <hr>
	  </li>
	  
      <li>
        <DIV class=Hint>管理员用户名：</DIV>
        <DIV class=FormInput>
          <input id="adminuser" size="24" class="Warning" name="adminuser" value="admin" />
        </DIV>
        <div class="Info">
          <div class="alert_txt"><span class="Hint">管理员用户名</span></div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      <li>
        <DIV class=Hint>管理员密码：</DIV>
        <DIV class=FormInput>
          <input name="adminpas" type="text" class="Warning" id="adminpas" value="admin" size="24" />
        </DIV>
        <div class="Info">
          <div class="alert_txt"><span class="Hint">管理员密码</span></div>
        </div>
        <DIV class=HackBox></DIV>
      </LI>
      <LI class=SubmitBox>
        <INPUT class="btn" type=submit value="安装程序" name=Submit>
      </LI>
    </UL>
  </form>
   <script type="text/javascript">
 function ShowPanel(id){
	 if(id==1){
		 $("#sqlitepanel").css("display","block")
		 $("#mysqlpanel").css("display","none")
	 }else if((id==2)){
		 $("#sqlitepanel").css("display","none")
		 $("#mysqlpanel").css("display","block")
	 }
 }
 $("#mysql_pass").blur(function(){
	a='checkconnect_ajax';
	mysql_host=$('#mysql_host').val();
	mysql_name=$('#mysql_name').val();
	mysql_pass=$('#mysql_pass').val();
	mysql_table=$('#mysql_table').val();
	actionArr={a:a,mysql_host:mysql_host,mysql_name:mysql_name,mysql_pass:mysql_pass,mysql_table:mysql_table};
	$.post("index.php",actionArr, function(data){
													if(data=='数据库信息正确！'){
														alertTxt="<span style='color:green'>"+data+"</span>";
													}else if(data='数据库信息有误！'){
														alertTxt="<span style='color:red'>"+data+"</span>";
													}
													$('#content_alert').html(alertTxt);
													}); 
						 
						 }); 
</script>
<div style="clear:both"></div>
</div>
<?php 
include('footer.php');
?>