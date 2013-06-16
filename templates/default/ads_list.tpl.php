<?php 
//广告
header("charset=utf-8");
echo "document.write('";
if(!empty($List)) {
	foreach($List as $key => $value) {
		echo '<div>' . $value['content'] . '</div>';
	}
}
echo "');";
?>