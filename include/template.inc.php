<?php
//常用部分
defined( 'WEB_IN' ) or die( 'Restricted access' );
ob_start();
if($tpl_in_module == 0){
	include(WEB_TPL . $templatefile);
} elseif($tpl_in_module == 1){
	include($templatefile);
}
$output = ob_get_contents();
ob_end_clean();
echo $output;
exit;
?>