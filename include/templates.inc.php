<?php
//常用部分
defined( 'WEB_IN' ) or die( 'Restricted access' );
if(isset($sys['templates']) && !empty($sys['templates'])){
	define('WEB_TPL',WEB_ROOT.'templates/'.$sys['templates'].'/');
} else {
	define('WEB_TPL',WEB_ROOT.'templates/default/');
}
?>