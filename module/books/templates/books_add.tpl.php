<?php 
$pagetitle="留言页面";
include(WEB_TPL . 'header.php');
?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/MyFormValidation.js"></script>

<div class="site_container">
  <?php include(WEB_TPL . 'library/ur_here.lib.php');?>
  <div id="site_content_area">
    <div id="site_left">
      <div class="site_section">
        <div class="site_section_title">
          <h3><?php echo $pagetitle;?></h3>
        </div>
        <div id="site_show">
          <form action="" id="form1" method="post" name="form1">
                <table width="100%">
                    <tr>
                        <td width="136">
                            <div align="right">
                                <span>*</span>标题:</div>
                        </td>
                        <td width="482">
                             <input type="text" name="title" id="title" size="30" />
                        </td>
                    </tr>
					<tr>
                        <td width="136">
                            <div align="right">
                                <span>*</span>姓名:</div>
                        </td>
                        <td width="482">
                             <input type="text" name="niname" id="niname" size="30" />
                        </td>
                    </tr>
					<tr>
                        <td width="136">
                            <div align="right">
                                <span></span>地址:</div>
                        </td>
                        <td width="482">
                             <input type="text" name="addr" id="addr" size="30" />
                        </td>
                    </tr>
					<tr>
                        <td width="136">
                            <div align="right">
                                <span></span>手机:</div>
                        </td>
                        <td width="482">
                             <input type="text" name="mobile" id="mobile" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">
                                <span></span>电话:</div>
                        </td>
                        <td>
                             <input type="text" name="tel" id="tel" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">
                                <span>*</span>Email:</div>
                        </td>
                        <td>
                            <input type="text" name="email" id="email" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">
                                <span></span>qq:
                            </div>
                        </td>
                        <td>
                            <input type="text" name="qq" id="qq" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div align="right">
                                <span></span>MSN:</div>
                        </td>
                        <td>
                            <input type="text" name="msn" id="msn" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <div align="right">
                                <span>*</span>消息内容:
                            </div>
                        </td>
                        <td>
                           
                              <textarea name="content" id="content" cols="45" rows="5"></textarea>
                         
                        </td>
                    </tr>
                    <tr>
                        <td height="17" colspan="2" valign="top">
                            <div align="center">
                                <input type="submit" name="submit" value="提交" size="20" />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="reset" value="重置" size="20" />
								<input type="hidden" name="classid" value="<?php echo $classid;?>" size="20" />
                            </div>
                        </td>
                    </tr>
                </table>
                </form>
          <div class="clear"></div>
        </div>
      </div>
      
    </div>
    <!-- End Of left-->
    <div id="site_right">
		<div class="site_section">
				  <div class="site_section_title">
					<h3>最新留言</h3>
				  </div>
				  <div class="site_section_1">
					<ul class="theIndexList">
							<?php 
							$data = $books->GetList(array('id','title','addtime','niname'),'0','8',' isplay = 1 ','addtime desc,id desc');
							?>
							<?php 
							if($data){
								foreach($data AS $key=>$value){
							?>
						  <li><font ><?php echo cutstr($value['title'],20);?></font><br />by：<?php echo $value['niname'];?></li>
						  <?php 
								}
							}
							?>
							<?php 
							unset($data,$key,$value);
							?>
					</ul>
					<div class="clear"></div>
				  </div>
				</div>
    </div>
    <!-- End Of right-->
    <div class="cleaner"></div>
  </div>
  <!-- End Of Content area -->
</div>
<!-- End Of Container -->
<?php 
include(WEB_TPL . 'footer.php');
?>
