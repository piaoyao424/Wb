<?php
////文件校验
ob_start();
echo $file_check_checkfile_info;
$out = ob_get_contents();
ob_end_clean();
echo $out;
?>
