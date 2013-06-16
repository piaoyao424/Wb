<?php
/** Adminer - Compact MySQL management
 * @link http://www.adminer.org/
 * @author Jakub Vrana, http://php.vrana.cz/
 * @copyright 2007 Jakub Vrana
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */
error_reporting ( 6135 );
$qd = (! ereg ( '^(unsafe_raw)?$', ini_get ( "filter.default" ) ) || ini_get ( "filter.default_flags" ));
if ($qd) {
	foreach ( array ('_GET', '_POST', '_COOKIE', '_SERVER' ) as $b ) {
		$Kd = filter_input_array ( constant ( "INPUT$b" ), FILTER_UNSAFE_RAW );
		if ($Kd) {
			$$b = $Kd;
		}
	}
}
if (isset ( $_GET ["file"] )) {
	header ( "Expires: " . gmdate ( "D, d M Y H:i:s", time () + 365 * 24 * 60 * 60 ) . " GMT" );
	if ($_GET ["file"] == "favicon.ico") {
		header ( "Content-Type: image/x-icon" );
		echo base64_decode ( "AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA////AAAA/wBhTgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEQAAAAAAERExAAAAARERExEAABERMREzMQABExMRERMRAAExMRETMRAAATERERMRAAABExERExAAAAETERExEAAAATERETERERARMRETESESEBMTETESEREQExEzESEREhETMxEREhERIREREAARISIRAAAAAAERERD/4z8A/wM/APgDAADAAwAAgAMAAIAHAACADwAAgB8AAIAfAACAAQAAAAEAAAABAAAAAAAAAAAAAAcAAAD/gQAA" );
	} elseif ($_GET ["file"] == "default.css") {
		header ( "Content-Type: text/css" );
		echo 'body{color:#000;background:#fff;font:90%/1.25 Verdana,Arial,Helvetica,sans-serif;margin:0;}a{color:blue;}a:visited{color:navy;}a:hover{color:red;}h1{font-size:150%;margin:0;padding:.8em 1em;border-bottom:1px solid #999;font-weight:normal;color:#777;background:#eee;}h2{font-size:150%;margin:0 0 20px -18px;padding:.8em 1em;border-bottom:1px solid #000;color:#000;font-weight:normal;background:#ddf;}h3{font-weight:normal;font-size:130%;margin:.8em 0;}form{margin:0;}table{margin:1em 20px .8em 0;border:0;border-top:1px solid #999;border-left:1px solid #999;font-size:90%;}td,th{margin-bottom:1em;border:0;border-right:1px solid #999;border-bottom:1px solid #999;padding:.2em .3em;}th{background:#eee;text-align:left;}thead th{text-align:center;}thead td,thead th{background:#ddf;}fieldset{display:inline;vertical-align:top;padding:.5em .8em;margin:0 .5em .5em 0;border:1px solid #999;}p{margin:0 20px 1em 0;}img{vertical-align:middle;border:0;}td img{max-width:200px;max-height:200px;}code{background:#eee;}tr:hover td,tr:hover th{background:#ddf;}.version{color:#777;font-size:67%;}.js .hidden{display:none;}.nowrap td,.nowrap th,td.nowrap{white-space:pre;}.wrap td{white-space:normal;}.error{color:red;background:#fee;}.message{color:green;background:#efe;}.error,.message{padding:.5em .8em;margin:0 20px 1em 0;}.char{color:#007F00;}.date{color:#7F007F;}.enum{color:#007F7F;}.binary{color:red;}.odd td{background:#F5F5F5;}.time{color:silver;font-size:70%;}.function{text-align:right;}.number{text-align:right;}.datetime{text-align:right;}.type{width:15ex;width:auto\\9;}#menu{position:absolute;margin:10px 0 0;padding:0 0 30px 0;top:2em;left:0;width:19em;overflow:auto;overflow-y:hidden;white-space:nowrap;}#menu p{padding:.8em 1em;margin:0;border-bottom:1px solid #ccc;}#content{margin:2em 0 0 21em;padding:10px 20px 20px 0;}#lang{position:absolute;top:0;left:0;line-height:1.8em;padding:.3em 1em;}#breadcrumb{white-space:nowrap;position:absolute;top:0;left:21em;background:#eee;height:2em;line-height:1.8em;padding:0 1em;margin:0 0 0 -18px;}#h1{color:#777;text-decoration:none;font-style:italic;}#version{font-size:67%;color:red;}#schema{margin-left:60px;position:relative;}#schema .table{border:1px solid silver;padding:0 2px;cursor:move;position:absolute;}#schema .references{position:absolute;}@media print{#lang,#menu{display:none;}#content{margin-left:1em;}#breadcrumb{left:1em;}}';
	} elseif ($_GET ["file"] == "functions.js") {
		header ( "Content-Type: text/javascript" );
		?>
document.body.className='js';function toggle(id){var el=document.getElementById(id);el.className=(el.className=='hidden'?'':'hidden');return true;}
function cookie(assign,days,params){var date=new Date();date.setDate(date.getDate()+days);document.cookie=assign+'; expires='+date+(params||'');}
function verifyVersion(){cookie('adminer_version=0',1);var script=document.createElement('script');script.src='https://adminer.svn.sourceforge.net/svnroot/adminer/trunk/version.js';document.body.appendChild(script);}
function formCheck(el,name){var elems=el.form.elements;for(var i=0;i
<elems.length
	;i++){if(name.test(elems[i].name)){elems[i].checked=el.checked;}}}
	function formUncheck(id){document.getElementById(id).checked=false;}
	function formChecked(el,name){var checked=0;var
	elems=el.form.elements;for(var i=0;i
	<elems.length;i++){if(name.test(elems[i].name)&&elems[i].checked){checked++;}}
return checked;}
function tableClick(event){var el=event.target||event.srcElement;while(!/^tr$/i.test(el.tagName)){if(/^(table|a|input)$/i.test(el.tagName)){return;}
el=el.parentNode;}
el=el.firstChild.firstChild;el.click&&el.click();el.onclick&&el.onclick();}
function selectAddRow(field){var row=field.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/[a-z]\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var inputs=row.getElementsByTagName('input');if(inputs.length){inputs[0].name=inputs[0].name.replace(/[a-z]\[[0-9]+/,'$&1');inputs[0].value='';inputs[0].className='';}
field.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function bodyLoad(version){var jushRoot='https://jush.svn.sourceforge.net/svnroot/jush/trunk/';var script=document.createElement('script');script.src=jushRoot+'jush.js';script.onload=function(){if(window.jush){jush.create_links=' target="_blank"';jush.urls.sql[0]='http://dev.mysql.com/doc/refman/'+version+'/en/$key';jush.urls.sqlset[0]=jush.urls.sql[0];jush.urls.sqlstatus[0]=jush.urls.sql[0];jush.style(jushRoot+'jush.css');jush.highlight_tag('pre',0);jush.highlight_tag('code');}};script.onreadystatechange=function(){if(/^(loaded|complete)$/.test(script.readyState)){script.onload();}};document.body.appendChild(script);}
function selectValue(select){return select.value||select.options[select.selectedIndex].text;}
function formField(form,name){for(var i=0;i<form.length;i++){if(form[i].name==name){return form[i];}}}
function typePassword(el,disable){try{el.type=(disable?'text':'password');}catch(e){}}
var added='.',rowCount;function reEscape(s){return s.replace(/[\[\]\\^$*+?.(){|}]/,'\\$&');}
function idfEscape(s){return'`'+s.replace(/`/,'``')+'`';}
function editingNameChange(field){var name=field.name.substr(0,field.name.length-7);var type=formField(field.form,name+'[type]');var opts=type.options;var table=reEscape(field.value);var column='';var match;if((match=/(.+)_(.+)/.exec(table))||(match=/(.*[a-z])([A-Z].*)/.exec(table))){table=match[1];column=match[2];}
var plural='(?:e?s)?';var tabCol=table+plural+'_?'+column;var re=new RegExp('(^'+idfEscape(table+plural)+'\\.'+idfEscape(column)+'$'
+'|^'+idfEscape(tabCol)+'\\.'
+'|^'+idfEscape(column+plural)+'\\.'+idfEscape(table)+'$'
+')|\\.'+idfEscape(tabCol)+'$','i');var candidate;for(var i=opts.length;i--;){if(opts[i].value.substr(0,1)!='`'){if(i==opts.length-2&&candidate&&!match[1]&&name=='fields[1]'){return false;}
break;}
if(match=re.exec(opts[i].value)){if(candidate){return false;}
candidate=i;}}
if(candidate){type.selectedIndex=candidate;type.onchange();}}
function editingAddRow(button,allowed,focus){if(allowed&&rowCount>=allowed){return false;}
var match=/([0-9]+)(\.[0-9]+)?/.exec(button.name);var x=match[0]+(match[2]?added.substr(match[2].length):added)+'1';var row=button.parentNode.parentNode;var row2=row.cloneNode(true);var tags=row.getElementsByTagName('select');var tags2=row2.getElementsByTagName('select');for(var i=0;i<tags.length;i++){tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);tags2[i].selectedIndex=tags[i].selectedIndex;}
tags=row.getElementsByTagName('input');tags2=row2.getElementsByTagName('input');var input=tags2[0];for(var i=0;i<tags.length;i++){if(tags[i].name=='auto_increment_col'){tags2[i].value=x;tags2[i].checked=false;}
tags2[i].name=tags[i].name.replace(/([0-9.]+)/,x);if(/\[(orig|field|comment|default)/.test(tags[i].name)){tags2[i].value='';}
if(/\[(has_default)/.test(tags[i].name)){tags2[i].checked=false;}}
tags[0].onchange=function(){editingNameChange(tags[0]);};row.parentNode.insertBefore(row2,row.nextSibling);if(focus){input.onchange=function(){editingNameChange(input);};input.focus();}
added+='0';rowCount++;return true;}
function editingRemoveRow(button){var field=formField(button.form,button.name.replace(/drop_col(.+)/,'fields$1[field]'));field.parentNode.removeChild(field);button.parentNode.parentNode.style.display='none';return true;}
var lastType='';function editingTypeChange(type){var name=type.name.substr(0,type.name.length-6);var text=selectValue(type);for(var i=0;i<type.form.elements.length;i++){var el=type.form.elements[i];if(el.name==name+'[length]'&&!((/(char|binary)$/.test(lastType)&&/(char|binary)$/.test(text))||(/(enum|set)$/.test(lastType)&&/(enum|set)$/.test(text)))){el.value='';}
if(lastType=='timestamp'&&el.name==name+'[has_default]'&&/timestamp/i.test(formField(type.form,name+'[default]').value)){el.checked=false;}
if(el.name==name+'[collation]'){el.className=(/(char|text|enum|set)$/.test(text)?'':'hidden');}
if(el.name==name+'[unsigned]'){el.className=(/(int|float|double|decimal)$/.test(text)?'':'hidden');}}}
function editingLengthFocus(field){var td=field.parentNode;if(/(enum|set)$/.test(selectValue(td.previousSibling.firstChild))){var edit=document.getElementById('enum-edit');var val=field.value;edit.value=(/^'.+','.+'$/.test(val)?val.substr(1,val.length-2).replace(/','/g,"\n").replace(/''/g,"'"):val);td.appendChild(edit);field.style.display='none';edit.style.display='inline';edit.focus();}}
function editingLengthBlur(edit){var field=edit.parentNode.firstChild;var val=edit.value;field.value=(/\n/.test(val)?"'"+val.replace(/\n+$/,'').replace(/'/g,"''").replace(/\n/g,"','")+"'":val);field.style.display='inline';edit.style.display='none';}
function columnShow(checked,column){var trs=document.getElementById('edit-fields').getElementsByTagName('tr');for(var i=0;i<trs.length;i++){trs[i].getElementsByTagName('td')[column].className=(checked?'':'hidden');}}
function partitionByChange(el){var partitionTable=/RANGE|LIST/.test(selectValue(el));el.form['partitions'].className=(partitionTable||!el.selectedIndex?'hidden':'');document.getElementById('partition-table').className=(partitionTable?'':'hidden');}
function partitionNameChange(el){var row=el.parentNode.parentNode.cloneNode(true);row.firstChild.firstChild.value='';el.parentNode.parentNode.parentNode.appendChild(row);el.onchange=function(){};}
function foreignAddRow(field){var row=field.parentNode.parentNode.cloneNode(true);var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/\]/,'1$&');selects[i].selectedIndex=0;}
field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexesAddRow(field){var row=field.parentNode.parentNode.cloneNode(true);var spans=row.getElementsByTagName('span');for(var i=0;i<spans.length-1;i++){row.removeChild(spans[i]);}
var selects=row.getElementsByTagName('select');for(var i=0;i<selects.length;i++){selects[i].name=selects[i].name.replace(/indexes\[[0-9]+/,'$&1');selects[i].selectedIndex=0;}
var input=row.getElementsByTagName('input')[0];input.name=input.name.replace(/indexes\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.parentNode.appendChild(row);field.onchange=function(){};}
function indexesAddColumn(field){var column=field.parentNode.cloneNode(true);var select=column.getElementsByTagName('select')[0];select.name=select.name.replace(/\]\[[0-9]+/,'$&1');select.selectedIndex=0;var input=column.getElementsByTagName('input')[0];input.name=input.name.replace(/\]\[[0-9]+/,'$&1');input.value='';field.parentNode.parentNode.appendChild(column);field.onchange=function(){};}
var that,x,y,em,tablePos;function schemaMousedown(el,event){that=el;x=event.clientX-el.offsetLeft;y=event.clientY-el.offsetTop;}
function schemaMousemove(ev){if(that!==undefined){ev=ev||event;var left=(ev.clientX-x)/em;var top=(ev.clientY-y)/em;var divs=that.getElementsByTagName('div');var lineSet={};for(var i=0;i<divs.length;i++){if(divs[i].className=='references'){var div2=document.getElementById((divs[i].id.substr(0,4)=='refs'?'refd':'refs')+divs[i].id.substr(4));var ref=(tablePos[divs[i].title]?tablePos[divs[i].title]:[div2.parentNode.offsetTop/em,0]);var left1=-1;var isTop=true;var id=divs[i].id.replace(/^ref.(.+)-.+/,'$1');if(divs[i].parentNode!=div2.parentNode){left1=Math.min(0,ref[1]-left)-1;divs[i].style.left=left1+'em';divs[i].getElementsByTagName('div')[0].style.width=-left1+'em';var left2=Math.min(0,left-ref[1])-1;div2.style.left=left2+'em';div2.getElementsByTagName('div')[0].style.width=-left2+'em';isTop=(div2.offsetTop+ref[0]*em>divs[i].offsetTop+top*em);}
if(!lineSet[id]){var line=document.getElementById(divs[i].id.replace(/^....(.+)-[0-9]+$/,'refl$1'));var shift=ev.clientY-y-that.offsetTop;line.style.left=(left+left1)+'em';if(isTop){line.style.top=(line.offsetTop+shift)/em+'em';}
if(divs[i].parentNode!=div2.parentNode){line=line.getElementsByTagName('div')[0];line.style.height=(line.offsetHeight+(isTop?-1:1)*shift)/em+'em';}
lineSet[id]=true;}}}
that.style.left=left+'em';that.style.top=top+'em';}}
function schemaMouseup(ev){if(that!==undefined){ev=ev||event;tablePos[that.firstChild.firstChild.firstChild.data]=[(ev.clientY-y)/em,(ev.clientX-x)/em];that=undefined;var s='';for(var key in tablePos){s+='_'+key+':'+Math.round(tablePos[key][0]*10000)/10000+'x'+Math.round(tablePos[key][1]*10000)/10000;}
cookie('adminer_schema='+encodeURIComponent(s.substr(1)),30,'; path="'+location.pathname+location.search+'"');}}<?php
	} else {
		header ( "Content-Type: image/gif" );
		switch ($_GET ["file"]) {
			case "plus.gif" :
				echo base64_decode ( "R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIYSPqcvtD00I8cwqKb5v+q8pIAhxlRmhZYi17iPE8kzLBQA7" );
				break;
			case "cross.gif" :
				echo base64_decode ( "R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACI4SPqcvtDyMKYdZGb355wy6BX3dhlOEx57FK7gtHwkzXNl0AADs=" );
				break;
			case "up.gif" :
				echo base64_decode ( "R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00IUU4K730T9J5hFTiKEXmaYcW2rgDH8hwXADs=" );
				break;
			case "down.gif" :
				echo base64_decode ( "R0lGODdhEgASAKEAAO7u7gAAAJmZmQAAACwAAAAAEgASAAACIISPqcvtD00I8cwqKb5bV/5cosdMJtmcHca2lQDH8hwXADs=" );
				break;
			case "arrow.gif" :
				echo base64_decode ( "R0lGODlhCAAKAIAAAICAgP///yH5BAEAAAEALAAAAAAIAAoAAAIPBIJplrGLnpQRqtOy3rsAADs=" );
				break;
		}
	}
	exit ();
}
if (! isset ( $_SERVER ["REQUEST_URI"] )) {
	$_SERVER ["REQUEST_URI"] = $_SERVER ["ORIG_PATH_INFO"] . ($_SERVER ["QUERY_STRING"] != "" ? "?$_SERVER[QUERY_STRING]" : "");
}
@ini_set ( "session.use_trans_sid", false );
if (! ini_get ( "session.auto_start" )) {
	session_name ( "adminer_sid" );
	$Cb = array (0, preg_replace ( '~\\?.*~', '', $_SERVER ["REQUEST_URI"] ), "", $_SERVER ["HTTPS"] && strcasecmp ( $_SERVER ["HTTPS"], "off" ) );
	if (version_compare ( PHP_VERSION, '5.2.0' ) >= 0) {
		$Cb [] = true;
	}
	call_user_func_array ( 'session_set_cookie_params', $Cb );
	session_start ();
}
if (get_magic_quotes_gpc ()) {
	$wa = array (&$_GET, &$_POST, &$_COOKIE );
	while ( list ( $e, $b ) = each ( $wa ) ) {
		foreach ( $b as $fa => $r ) {
			unset ( $wa [$e] [$fa] );
			if (is_array ( $r )) {
				$wa [$e] [stripslashes ( $fa )] = $r;
				$wa [] = &$wa [$e] [stripslashes ( $fa )];
			} else {
				$wa [$e] [stripslashes ( $fa )] = ($qd ? $r : stripslashes ( $r ));
			}
		}
	}
	unset ( $wa );
}
if (function_exists ( "set_magic_quotes_runtime" )) {
	set_magic_quotes_runtime ( false );
}
@set_time_limit ( 0 );
$qb = "2.3.2";
function connection() {
	global $d;
	return $d;
}
function idf_escape($ka) {
	return "`" . str_replace ( "`", "``", $ka ) . "`";
}
function idf_unescape($ka) {
	return str_replace ( "``", "`", $ka );
}
function escape_string($b) {
	global $d;
	return substr ( $d->quote ( $b ), 1, - 1 );
}
function bracket_escape($ka, $se = false) {
	static $Yc = array (':' => ':1', ']' => ':2', '[' => ':3' );
	return strtr ( $ka, ($se ? array_flip ( $Yc ) : $Yc) );
}
function h($P) {
	return htmlspecialchars ( $P, ENT_QUOTES );
}
function nbsp($P) {
	return (trim ( $P ) != "" ? h ( $P ) : "&nbsp;");
}
function checkbox($h, $q, $ba, $fd = "", $bd = "") {
	static $T = 0;
	$T ++;
	$g = "<input type='checkbox' name='$h' value='" . h ( $q ) . "'" . ($ba ? " checked" : "") . ($bd ? " onclick=\"$bd\"" : "") . " id='checkbox-$T'>";
	return ($fd != "" ? "<label for='checkbox-$T'>$g" . h ( $fd ) . "</label>" : $g);
}
function optionlist($Wb, $ce = null, $Md = false) {
	$g = "";
	foreach ( $Wb as $fa => $r ) {
		if (is_array ( $r )) {
			$g .= '<optgroup label="' . h ( $fa ) . '">';
		}
		foreach ( (is_array ( $r ) ? $r : array ($fa => $r )) as $e => $b ) {
			$g .= '<option' . ($Md || is_string ( $e ) ? ' value="' . h ( $e ) . '"' : '') . (($Md || is_string ( $e ) ? ( string ) $e : $b) === $ce ? ' selected' : '') . '>' . h ( $b );
		}
		if (is_array ( $r )) {
			$g .= '</optgroup>';
		}
	}
	return $g;
}
function html_select($h, $Wb, $q = "", $db = true) {
	if ($db) {
		return "<select name='" . h ( $h ) . "'" . (is_string ( $db ) ? " onchange=\"$db\"" : "") . ">" . optionlist ( $Wb, $q ) . "</select>";
	}
	$g = "";
	foreach ( $Wb as $e => $b ) {
		$g .= "<label><input type='radio' name='" . h ( $h ) . "' value='" . h ( $e ) . "'" . ($e == $q ? " checked" : "") . ">" . h ( $b ) . "</label>";
	}
	return $g;
}
function get_vals($m, $la = 0) {
	global $d;
	$g = array ();
	$f = $d->query ( $m );
	if ($f) {
		while ( $a = $f->fetch_row () ) {
			$g [] = $a [$la];
		}
	}
	return $g;
}
function unique_array($a, $w) {
	foreach ( $w as $s ) {
		if (ereg ( "PRIMARY|UNIQUE", $s ["type"] )) {
			$g = array ();
			foreach ( $s ["columns"] as $e ) {
				if (! isset ( $a [$e] )) {
					continue 2;
				}
				$g [$e] = $a [$e];
			}
			return $g;
		}
	}
	$g = array ();
	foreach ( $a as $e => $b ) {
		if (! preg_match ( '~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~', $e )) {
			$g [$e] = $b;
		}
	}
	return $g;
}
function where($D) {
	$g = array ();
	foreach ( array ("where", "null" ) as $U ) {
		foreach ( ( array ) $D [$U] as $e => $b ) {
			$e = bracket_escape ( $e, "back" );
			$g [] = (preg_match ( '~^[A-Z0-9_]+\\(`(?:[^`]|``)+`\\)$~', $e ) ? $e : idf_escape ( $e )) . ($U == "null" ? " IS NULL" : (ereg ( '\\.', $b ) ? " LIKE " . exact_value ( addcslashes ( $b, "%_" ) ) : " = " . exact_value ( $b )));
		}
	}
	return implode ( " AND ", $g );
}
function where_check($b) {
	parse_str ( $b, $te );
	return where ( $te );
}
function where_link($i, $la, $q, $ie = "=") {
	return "&where%5B$i%5D%5Bcol%5D=" . urlencode ( $la ) . "&where%5B$i%5D%5Bop%5D=" . urlencode ( $ie ) . "&where%5B$i%5D%5Bval%5D=" . urlencode ( $q );
}
function cookie($h, $q) {
	$Cb = array ($h, $q, time () + 2592000, preg_replace ( '~\\?.*~', '', $_SERVER ["REQUEST_URI"] ), "", $_SERVER ["HTTPS"] && strcasecmp ( $_SERVER ["HTTPS"], "off" ) );
	if (version_compare ( PHP_VERSION, '5.2.0' ) >= 0) {
		$Cb [] = true;
	}
	return call_user_func_array ( 'setcookie', $Cb );
}
function restart_session() {
	if (! ini_get ( "session.use_cookies" )) {
		session_start ();
	}
}
function redirect($z, $ma = null) {
	if (isset ( $ma )) {
		restart_session ();
		$_SESSION ["messages"] [] = $ma;
	}
	if (isset ( $z )) {
		header ( "Location: " . ($z != "" ? $z : ".") );
		exit ();
	}
}
function query_redirect($m, $z, $ma, $bc = true, $je = true, $Bb = false) {
	global $d, $o, $p;
	if ($je) {
		$Bb = ! $d->query ( $m );
	}
	$mc = "";
	if ($m) {
		$mc = $p->messageQuery ( $m );
	}
	if ($Bb) {
		$o = error () . $mc;
		return false;
	}
	if ($bc) {
		redirect ( $z, $ma . $mc );
	}
	return true;
}
function queries($m = null) {
	global $d;
	static $La = array ();
	if (! isset ( $m )) {
		return implode ( ";\n", $La );
	}
	$La [] = $m;
	return $d->query ( $m );
}
function queries_redirect($z, $ma, $bc) {
	return query_redirect ( queries (), $z, $ma, $bc, false, ! $bc );
}
function remove_from_uri($xa = "") {
	return substr ( preg_replace ( "~(?<=[?&])($xa" . (SID ? "" : "|" . session_name ()) . ")=[^&]*&~", '', "$_SERVER[REQUEST_URI]&" ), 0, - 1 );
}
function pagination($xb) {
	return " " . ($xb == $_GET ["page"] ? $xb + 1 : '<a href="' . h ( remove_from_uri ( "page" ) . ($xb ? "&page=$xb" : "") ) . '">' . ($xb + 1) . "</a>");
}
function get_file($e, $Gd = false) {
	$Q = $_FILES [$e];
	if (! $Q || $Q ["error"]) {
		return $Q ["error"];
	}
	return file_get_contents ( $Gd && ereg ( '\\.gz$', $Q ["name"] ) ? "compress.zlib://$Q[tmp_name]" : ($Gd && ereg ( '\\.bz2$', $Q ["name"] ) ? "compress.bzip2://$Q[tmp_name]" : $Q ["tmp_name"]) );
}
function upload_error($o) {
	$vd = ($o == UPLOAD_ERR_INI_SIZE ? ini_get ( "upload_max_filesize" ) : null);
	return ($o ? lang ( 0 ) . ($vd ? " " . lang ( 1, $vd ) : "") : lang ( 2 ));
}
function odd($g = ' class="odd"') {
	static $i = 0;
	if (! $g) {
		$i = - 1;
	}
	return ($i ++ % 2 ? $g : '');
}
function is_utf8($b) {
	return (preg_match ( '~~u', $b ) && ! preg_match ( '~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~', $b ));
}
function shorten_utf8($P, $ua = 80, $de = "") {
	if (! preg_match ( "(^([\t\r\n -\x{FFFF}]{0,$ua})($)?)u", $P, $k )) {
		preg_match ( "(^([\t\r\n -~]{0,$ua})($)?)", $P, $k );
	}
	return h ( $k [1] ) . $de . (isset ( $k [2] ) ? "" : "<em>...</em>");
}
function friendly_url($b) {
	return preg_replace ( '~[^a-z0-9_]~i', '-', $b );
}
function hidden_fields($wa, $ee = array()) {
	while ( list ( $e, $b ) = each ( $wa ) ) {
		if (is_array ( $b )) {
			foreach ( $b as $fa => $r ) {
				$wa [$e . "[$fa]"] = $r;
			}
		} elseif (! in_array ( $e, $ee )) {
			echo '<input type="hidden" name="' . h ( $e ) . '" value="' . h ( $b ) . '">';
		}
	}
}
function column_foreign_keys($n) {
	$g = array ();
	foreach ( foreign_keys ( $n ) as $J ) {
		foreach ( $J ["source"] as $b ) {
			$g [$b] [] = $J;
		}
	}
	return $g;
}
function input($c, $q, $_) {
	global $ra, $p;
	$h = h ( bracket_escape ( $c ["field"] ) );
	echo "<td class='function'>";
	$Ka = (isset ( $_GET ["select"] ) ? array ("orig" => lang ( 3 ) ) : array ()) + $p->editFunctions ( $c );
	if ($c ["type"] == "enum") {
		echo nbsp ( $Ka [""] ) . "<td>" . ($Ka ["orig"] ? "<label><input type='radio' name='fields[$h]' value='-1' checked><em>$Ka[orig]</em></label> " : ""), $p->editInput ( $_GET ["edit"], $c, " name='fields[$h]'", $q );
		preg_match_all ( "~'((?:[^']|'')*)'~", $c ["length"], $I );
		foreach ( $I [1] as $i => $b ) {
			$b = stripcslashes ( str_replace ( "''", "'", $b ) );
			$ba = (is_int ( $q ) ? $q == $i + 1 : $q === $b);
			echo " <label><input type='radio' name='fields[$h]' value='" . ($i + 1) . "'" . ($ba ? ' checked' : '') . '>' . h ( $b ) . '</label>';
		}
	} else {
		$bb = 0;
		foreach ( $Ka as $e => $b ) {
			if ($e === "" || ! $b) {
				break;
			}
			$bb ++;
		}
		$db = ($bb ? " onchange=\"var f = this.form['function[" . addcslashes ( $h, "\r\n'\\" ) . "]']; if ($bb > f.selectedIndex) f.selectedIndex = $bb;\"" : "");
		$hb = " name='fields[$h]'$db";
		echo (count ( $Ka ) > 1 ? html_select ( "function[$h]", $Ka, ! isset ( $_ ) || in_array ( $_, $Ka ) ? $_ : "" ) : nbsp ( reset ( $Ka ) )) . '<td>';
		$rd = $p->editInput ( $_GET ["edit"], $c, $hb, $q );
		if ($rd != "") {
			echo $rd;
		} elseif ($c ["type"] == "set") {
			preg_match_all ( "~'((?:[^']|'')*)'~", $c ["length"], $I );
			foreach ( $I [1] as $i => $b ) {
				$b = stripcslashes ( str_replace ( "''", "'", $b ) );
				$ba = (is_int ( $q ) ? ($q >> $i) & 1 : in_array ( $b, explode ( ",", $q ), true ));
				echo " <label><input type='checkbox' name='fields[$h][$i]' value='" . (1 << $i) . "'" . ($ba ? ' checked' : '') . "$db>" . h ( $b ) . '</label>';
			}
		} elseif (ereg ( 'binary|blob', $c ["type"] ) && ini_get ( "file_uploads" )) {
			echo "<input type='file' name='fields-$h'$db>";
		} elseif (ereg ( 'text|blob', $c ["type"] )) {
			echo "<textarea cols='50' rows='12'$hb>" . h ( $q ) . '</textarea>';
		} else {
			$yd = (! ereg ( 'int', $c ["type"] ) && preg_match ( '~^([0-9]+)(,([0-9]+))?$~', $c ["length"], $k ) ? ($k [1] + ($k [3] ? 1 : 0) + ($k [2] && ! $c ["unsigned"] ? 1 : 0)) : ($ra [$c ["type"]] ? $ra [$c ["type"]] + ($c ["unsigned"] ? 0 : 1) : 0));
			echo "<input value='" . h ( $q ) . "'" . ($yd ? " maxlength='$yd'" : "") . (ereg ( 'char', $c ["type"] ) && $c ["length"] > 20 ? " size='40'" : "") . "$hb>";
		}
	}
}
function process_input($c) {
	global $d, $p;
	$ka = bracket_escape ( $c ["field"] );
	$_ = $_POST ["function"] [$ka];
	$q = $_POST ["fields"] [$ka];
	if ($c ["type"] == "enum" ? $q == - 1 : $_ == "orig") {
		return false;
	} elseif ($c ["type"] == "enum" || $c ["auto_increment"] ? $q == "" : $_ == "NULL") {
		return "NULL";
	} elseif ($c ["type"] == "enum") {
		return intval ( $q );
	} elseif ($c ["type"] == "set") {
		return array_sum ( ( array ) $q );
	} elseif (ereg ( 'binary|blob', $c ["type"] ) && ini_get ( "file_uploads" )) {
		$Q = get_file ( "fields-$ka" );
		if (! is_string ( $Q )) {
			return false;
		}
		return $d->quote ( $Q );
	} else {
		return $p->processInput ( $c, $q, $_ );
	}
}
function search_tables() {
	global $p, $d;
	$O = false;
	foreach ( table_status () as $n => $Y ) {
		$h = $p->tableName ( $Y );
		if (isset ( $Y ["Engine"] ) && $h != "" && (! $_POST ["tables"] || in_array ( $n, $_POST ["tables"] ))) {
			$f = $d->query ( "SELECT 1 FROM " . idf_escape ( $n ) . " WHERE " . implode ( " AND ", $p->selectSearchProcess ( fields ( $n ), array () ) ) . " LIMIT 1" );
			if ($f->num_rows) {
				if (! $O) {
					echo "<ul>\n";
					$O = true;
				}
				echo "<li><a href='" . h ( ME . "select=" . urlencode ( $n ) . "&where[0][op]=" . urlencode ( $_GET ["where"] [0] ["op"] ) . "&where[0][val]=" . urlencode ( $_GET ["where"] [0] ["val"] ) ) . "'>" . h ( $h ) . "</a>\n";
			}
		}
	}
	echo ($O ? "</ul>" : "<p class='message'>" . lang ( 4 )) . "\n";
}
function dump_csv($a) {
	foreach ( $a as $e => $b ) {
		if (preg_match ( "~[\"\n,]~", $b ) || $b === "") {
			$a [$e] = '"' . str_replace ( '"', '""', $b ) . '"';
		}
	}
	echo implode ( ",", $a ) . "\n";
}
function apply_sql_function($_, $la) {
	return ($_ ? ($_ == "count distinct" ? "COUNT(DISTINCT " : strtoupper ( "$_(" )) . "$la)" : $la);
}
function is_email($oe) {
	$zd = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]';
	$Fb = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
	return preg_match ( "(^$zd+(\\.$zd+)*@($Fb?\\.)+$Fb\$)i", $oe );
}
function is_url($P) {
	$Fb = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
	return preg_match ( "~^https?://($Fb?\\.)+$Fb(:[0-9]+)?(/.*)?(\\?.*)?(#.*)?\$~i", $P );
}
function print_fieldset($T, $xe, $me = false) {
	echo "<fieldset><legend><a href='#fieldset-$T' onclick=\"return !toggle('fieldset-$T');\">$xe</a></legend><div id='fieldset-$T'" . ($me ? "" : " class='hidden'") . ">\n";
}
function bold($P, $qe) {
	return ($qe ? "<b>$P</b>" : $P);
}
define ( "DB", $_GET ["db"] );
define ( "SID_FORM", SID && ! ini_get ( "session.use_only_cookies" ) ? '<input type="hidden" name="' . session_name () . '" value="' . h ( session_id () ) . '">' : '' );
define ( "ME", preg_replace ( '~^[^?]*/([^?]*).*~', '\\1', $_SERVER ["REQUEST_URI"] ) . '?' . (SID_FORM ? SID . '&' : '') . ($_GET ["server"] != "" ? 'server=' . urlencode ( $_GET ["server"] ) . '&' : '') . (DB != "" ? 'db=' . urlencode ( DB ) . '&' : '') );
$kb = array ('en' => 'English', 'cs' => 'Čeština', 'sk' => 'Slovenčina', 'nl' => 'Nederlands', 'es' => 'Español', 'de' => 'Deutsch', 'fr' => 'Français', 'it' => 'Italiano', 'et' => 'Eesti', 'ru' => 'Русский язык', 'zh' => '简体中文', 'zh-tw' => '繁體中文' );
function lang($ka, $Nc = null) {
	global $qa, $ea;
	$jb = $ea [$ka];
	if (is_array ( $jb ) && $jb) {
		$Na = ($Nc == 1 ? 0 : ((! $Nc || $Nc >= 5) && ereg ( 'cs|sk|ru', $qa ) ? 2 : 1));
		$jb = $jb [$Na];
	}
	$ud = func_get_args ();
	array_shift ( $ud );
	return vsprintf ( (isset ( $jb ) ? $jb : $ka), $ud );
}
function switch_lang() {
	global $qa, $kb;
	echo "<form action=''>\n<div id='lang'>";
	hidden_fields ( $_GET, array ('lang' ) );
	echo lang ( 5 ) . ": " . html_select ( "lang", $kb, $qa, "this.form.submit();" ), " <input type='submit' value='" . lang ( 6 ) . "' class='hidden'>\n", "</div>\n</form>\n";
}
if (isset ( $_GET ["lang"] )) {
	$_COOKIE ["adminer_lang"] = $_GET ["lang"];
	$_SESSION ["lang"] = $_GET ["lang"];
}
$qa = "en";
if (isset ( $kb [$_COOKIE ["adminer_lang"]] )) {
	cookie ( "adminer_lang", $_COOKIE ["adminer_lang"] );
	$qa = $_COOKIE ["adminer_lang"];
} elseif (isset ( $kb [$_SESSION ["lang"]] )) {
	$qa = $_SESSION ["lang"];
} else {
	$cc = array ();
	preg_match_all ( '~([-a-z]+)(;q=([0-9.]+))?~', str_replace ( "_", "-", strtolower ( $_SERVER ["HTTP_ACCEPT_LANGUAGE"] ) ), $I, PREG_SET_ORDER );
	foreach ( $I as $k ) {
		$cc [$k [1]] = (isset ( $k [3] ) ? $k [3] : 1);
	}
	arsort ( $cc );
	foreach ( $cc as $e => $ha ) {
		if (isset ( $kb [$e] )) {
			$qa = $e;
			break;
		}
		$e = preg_replace ( '~-.*~', '', $e );
		if (! isset ( $cc [$e] ) && isset ( $kb [$e] )) {
			$qa = $e;
			break;
		}
	}
}
switch ($qa) {
	case "cs" :
		$ea = array ('Nepodařilo se nahrát soubor.', 'Maximální povolená velikost souboru je %sB.', 'Soubor neexistuje.', 'původní', 'Žádné tabulky.', 'Jazyk', 'Vybrat', 'Server', 'Uživatel', 'Heslo', 'Přihlásit se', 'Trvalé přihlášení', 'Vypsat data', 'Zobrazit strukturu', 'Pozměnit tabulku', 'Pozměnit pohled', 'Nová položka', 'Upravit', array ('%d bajt', '%d bajty', '%d bajtů' ), 'Vypsat', 'Funkce', 'Agregace', 'Vyhledat', '(kdekoliv)', 'Seřadit', 'sestupně', 'Limit', 'Délka textů', 'Akce', 'SQL příkaz', 'otevřít', 'uložit', 'Export', 'Odhlásit', 'databáze', 'Vytvořit novou tabulku', 'vypsat', 'Žádná MySQL extenze', 'Není dostupná žádná z podporovaných PHP extenzí (%s).', 'Čísla', 'Datum a čas', 'Řetězce', 'Binární', 'Seznamy', 'Neplatný token CSRF. Odešlete formulář znovu.', 'Odhlášení proběhlo v pořádku.', 'Neplatné přihlašovací údaje.', 'Session proměnné musí být povolené.', 'Session vypršela, přihlašte se prosím znovu.', 'Příliš velká POST data. Zmenšete data nebo zvyšte hodnotu konfigurační direktivy %s.', 'Databáze', 'Nesprávná databáze.', 'Databáze byla odstraněna.', 'Vybrat databázi', 'Vytvořit novou databázi', 'Oprávnění', 'Seznam procesů', 'Proměnné', 'Stav', 'Verze MySQL: %s přes PHP extenzi %s', 'Přihlášen jako: %s', 'Porovnávání', 'Odstranit', 'Opravdu?', 'Žádné řádky.', 'Cizí klíče', 'porovnávání', 'Název sloupce', 'Název parametru', 'Typ', 'Délka', 'Volby', 'Auto Increment', 'Výchozí hodnoty', 'Komentář', 'Přidat další', 'Odebrat', 'Přesunout nahoru', 'Přesunout dolů', 'Pohled', 'Tabulka', 'Sloupec', 'Indexy', 'Pozměnit indexy', 'Změnit', 'Přidat cizí klíč', 'Triggery', 'Přidat trigger', 'Schéma databáze', 'Export', 'Výstup', 'Formát', 'Procedury a funkce', 'Události', 'Tabulky', 'Data', '~ %s', 'upravit', 'Vytvořit uživatele', 'Chyba v dotazu', '%.3f s', array ('%d řádek', '%d řádky', '%d řádků' ), array ('Příkaz proběhl v pořádku, byl změněn %d záznam.', 'Příkaz proběhl v pořádku, byly změněny %d záznamy.', 'Příkaz proběhl v pořádku, bylo změněno %d záznamů.' ), 'Žádné příkazy k vykonání.', 'Provést', 'Zastavit při chybě', 'Nahrávání souborů není povoleno.', 'Nahrání souboru', 'Spustit soubor', 'Soubor %s na webovém serveru', 'Historie', 'Vyčistit', 'Položka byla smazána.', 'Položka byla aktualizována.', 'Položka byla vložena.', 'Vložit', 'Uložit', 'Uložit a pokračovat v editaci', 'Uložit a vložit další', 'Smazat', 'Tabulka byla odstraněna.', 'Tabulka byla změněna.', 'Tabulka byla vytvořena.', 'Vytvořit tabulku', 'Byl překročen maximální povolený počet polí. Zvyšte prosím %s a %s.', 'Název tabulky', 'úložiště', 'Zobrazit komentáře sloupců', 'Rozdělit podle', 'Oddíly', 'Název oddílu', 'Hodnoty', 'Indexy byly změněny.', 'Typ indexu', 'Sloupec (délka)', 'Databáze byla vytvořena.', 'Databáze byla přejmenována.', 'Databáze byla změněna.', 'Pozměnit databázi', 'Vytvořit databázi', 'Zavolat', array ('Procedura byla zavolána, byl změněn %d záznam.', 'Procedura byla zavolána, byly změněny %d záznamy.', 'Procedura byla zavolána, bylo změněno %d záznamů.' ), 'Cizí klíč byl odstraněn.', 'Cizí klíč byl změněn.', 'Cizí klíč byl vytvořen.', 'Zdrojové a cílové sloupce musí mít stejný datový typ, nad cílovými sloupci musí být definován index a odkazovaná data musí existovat.', 'Cizí klíč', 'Cílová tabulka', 'Změnit', 'Zdroj', 'Cíl', 'Při smazání', 'Při změně', 'Přidat sloupec', 'Pohled byl odstraněn.', 'Pohled byl změněn.', 'Pohled byl vytvořen.', 'Vytvořit pohled', 'Název', 'Událost byla odstraněna.', 'Událost byla změněna.', 'Událost byla vytvořena.', 'Pozměnit událost', 'Vytvořit událost', 'Začátek', 'Konec', 'Každých', 'Po dokončení zachovat', 'Procedura byla odstraněna.', 'Procedura byla změněna.', 'Procedura byla vytvořena.', 'Změnit funkci', 'Změnit proceduru', 'Vytvořit funkci', 'Vytvořit proceduru', 'Návratový typ', 'Trigger byl odstraněn.', 'Trigger byl změněn.', 'Trigger byl vytvořen.', 'Změnit trigger', 'Vytvořit trigger', 'Čas', 'Událost', 'Uživatel byl odstraněn.', 'Uživatel byl změněn.', 'Uživatel byl vytvořen.', 'Zahašované', 'Procedura', 'Povolit', 'Zakázat', array ('Byl ukončen %d proces.', 'Byly ukončeny %d procesy.', 'Bylo ukončeno %d procesů.' ), 'Ukončit', array ('Byl ovlivněn %d záznam.', 'Byly ovlivněny %d záznamy.', 'Bylo ovlivněno %d záznamů.' ), array ('Byl importován %d záznam.', 'Byly importovány %d záznamy.', 'Bylo importováno %d záznamů.' ), 'Nepodařilo se vypsat tabulku', 'Vztahy', 'Stránka', 'celý výsledek', 'Klonovat', 'Import CSV', 'Import', 'Tabulky byly vyprázdněny.', 'Tabulky byly přesunuty', 'Tabulky byly odstraněny.', 'Tabulky a pohledy', 'Úložiště', 'Velikost dat', 'Velikost indexů', 'Volné místo', 'Řádků', ' ', '%d celkem', 'Analyzovat', 'Optimalizovat', 'Zkontrolovat', 'Opravit', 'Vyprázdnit', 'Přesunout do jiné databáze', 'Přesunout', 'Plán', 'V daný čas', 'Editor' );
		break;
	case "de" :
		$ea = array ('Hochladen von Datei fehlgeschlagen.', 'Maximal erlaubte Dateigrösse ist %sB.', 'Datei existiert nicht.', 'Original', 'Keine Tabellen.', 'Sprache', 'Benutzung', 'Server', 'Benutzer', 'Passwort', 'Login', 'Passwort speichern', 'Tabelle auswählen', 'Tabellenstruktur', 'Tabelle ändern', 'View ändern', 'Neuer Datensatz', 'Ändern', array ('%d Byte', '%d Bytes' ), 'Daten zeigen von', 'Funktionen', 'Agregationen', 'Suchen', '(beliebig)', 'Ordnen', 'absteigend', 'Begrenzung', 'Textlänge', 'Aktion', 'SQL-Query', 'anzeigen', 'Datei', 'Export', 'Abmelden', 'Datenbank', 'Neue Tabelle', 'zeigen', 'Keine MySQL-Erweiterungen installiert', 'Keine der unterstützten PHP-Erweiterungen (%s) ist vorhanden.', 'Zahlen', 'Datum oder Zeit', 'Zeichenketten', 'Binär', 'Listen', 'CSRF Token ungültig. Bitte die Formulardaten erneut abschicken.', 'Abmeldung erfolgreich.', 'Ungültige Anmelde-Informationen.', 'Sitzungen müssen aktiviert sein.', 'Sitzungsdauer abgelaufen, bitte erneut anmelden.', 'POST data zu gross. Reduzieren Sie die Grösse oder vergrössern Sie den Wert %s in der Konfiguration.', 'Datenbank', 'Datenbank ungültig.', 'Datenbank entfernt.', 'Datenbank auswählen', 'Neue Datenbank', 'Rechte', 'Prozessliste', 'Variablen', 'Status', 'Version MySQL: %s, mit PHP-Erweiterung %s', 'Angemeldet als: %s', 'Collation', 'Entfernen', 'Sind Sie sicher ?', 'Keine Daten.', 'Fremdschlüssel', 'Kollation', 'Spaltenname', 'Name des Parameters', 'Typ', 'Länge', 'Optionen', 'Auto-Inkrement', 'Vorgabewerte festlegen', 'Kommentar', 'Hinzufügen', 'Entfernen', 'Nach oben', 'Nach unten', 'View', 'Tabelle', 'Spalte', 'Indizes', 'Indizes ändern', 'Ändern', 'Fremdschlüssel hinzufügen', 'Trigger', 'Trigger hinzufügen', 'Datenbankschema', 'Exportieren', 'Ergebnis', 'Format', 'Prozeduren', 'Ereignisse', 'Tabellen', 'Daten', '~ %s', 'ändern', 'Neuer Benutzer', 'Fehler in der SQL-Abfrage', '%.3f s', array ('%d Datensatz', '%d Datensätze' ), array ('Abfrage ausgeführt, %d Datensatz betroffen.', 'Abfrage ausgeführt, %d Datensätze betroffen.' ), 'Kein Kommando vorhanden.', 'Ausführen', 'Bei Fehler anhaltan', 'Importieren von Dateien abgeschaltet.', 'Datei importieren', 'Datei ausführen', 'Webserver Datei %s', 'History', 'Entleeren', 'Datensatz gelöscht.', 'Datensatz geändert.', 'Datensatz hinzugefügt.', 'Hinzufügen', 'Speichern', 'Speichern und weiter bearbeiten', 'Speichern und nächsten hinzufügen', 'Entfernen', 'Tabelle entfernt.', 'Tabelle geändert.', 'Tabelle erstellt.', 'Neue Tabelle erstellen', 'Die maximal erlaubte Anzahl der Felder ist überschritten. Bitte %s und %s erhöhen.', 'Name der Tabelle', 'Motor', 'Spaltenkommentare zeigen', 'Partitionieren um', 'Partitionen', 'Name der Partition', 'Werte', 'Indizes geändert.', 'Index-Typ', 'Spalte (Länge)', 'Datenbank erstellt.', 'Datenbank umbenannt.', 'Datenbank geändert.', 'Datenbank ändern', 'Neue Datenbank', 'Aufrufen', array ('Kommando SQL ausgeführt, %d Datensatz betroffen.', 'Kommando SQL ausgeführt, %d Datensätze betroffen.' ), 'Fremdschlüssel entfernt.', 'Fremdschlüssel geändert.', 'Fremdschlüssel erstellt.', 'Spalten des Ursprungs und des Zieles müssen vom gleichen Datentyp sein, es muss unter den Zielspalten ein Index existieren und die referenzierten Daten müssen existieren.', 'Fremdschlüssel', 'Zieltabelle', 'Ändern', 'Ursprung', 'Ziel', 'ON DELETE', 'ON UPDATE', 'Spalte hinzufügen', 'View entfernt.', 'View geändert.', 'View erstellt.', 'Neue View erstellen', 'Name', 'Ereignis entfernt.', 'Ereignis geändert.', 'Ereignis erstellt.', 'Ereignis ändern', 'Ereignis erstellen', 'Start', 'Ende', 'Jede', 'Nach der Ausführung erhalten', 'Prozedur entfernt.', 'Prozedur geändert.', 'Prozedur erstellt.', 'Funktion ändern', 'Prozedur ändern', 'Neue Funktion', 'Neue Prozedur', 'Typ des Rückgabewertes', 'Trigger entfernt.', 'Trigger geändert.', 'Trigger erstellt.', 'Trigger ändern', 'Trigger hinzufügen', 'Zeitpunkt', 'Ereignis', 'Benutzer entfernt.', 'Benutzer geändert.', 'Benutzer erstellt.', 'Hashed', 'Rutine', 'Erlauben', 'Verbieten', array ('%d Prozess gestoppt.', '%d Prozesse gestoppt.' ), 'Anhalten', array ('%d Artikel betroffen.', '%d Artikel betroffen.' ), array ('%d Datensatz importiert.', '%d Datensätze wurden importiert.' ), 'Auswahl der Tabelle fehlgeschlagen', 'Relationen', 'Seite', 'Gesamtergebnis', 'Klonen', 'Importiere CSV', 'Importieren', 'Tabellen sind entleert worden (truncate).', 'Tabellen verschoben.', 'Tabellen wurden entfernt (drop).', 'Tabellen und Views', 'Motor', 'Datengrösse', 'Indexgrösse', 'Freier Bereich', 'Datensätze', ' ', '%d insgesamt', 'Analysieren', 'Optimisieren', 'Prüfen', 'Reparieren', 'Entleeren (truncate)', 'In andere Datenbank verschieben', 'Verschieben', 'Zeitplan', 'Zur angegebenen Zeit', array ('%d e-mail abgeschickt.', '%d e-mails abgeschickt.' ) );
		break;
	case "en" :
		$ea = array ('Unable to upload a file.', 'Maximum allowed file size is %sB.', 'File does not exist.', 'original', 'No tables.', 'Language', 'Use', 'Server', 'Username', 'Password', 'Login', 'Permanent login', 'Select data', 'Show structure', 'Alter table', 'Alter view', 'New item', 'Edit', array ('%d byte', '%d bytes' ), 'Select', 'Functions', 'Aggregation', 'Search', '(anywhere)', 'Sort', 'descending', 'Limit', 'Text length', 'Action', 'SQL command', 'open', 'save', 'Dump', 'Logout', 'database', 'Create new table', 'select', 'No MySQL extension', 'None of the supported PHP extensions (%s) are available.', 'Numbers', 'Date and time', 'Strings', 'Binary', 'Lists', 'Invalid CSRF token. Send the form again.', 'Logout successful.', 'Invalid credentials.', 'Session support must be enabled.', 'Session expired, please login again.', 'Too big POST data. Reduce the data or increase the %s configuration directive.', 'Database', 'Invalid database.', 'Database has been dropped.', 'Select database', 'Create new database', 'Privileges', 'Process list', 'Variables', 'Status', 'MySQL version: %s through PHP extension %s', 'Logged as: %s', 'Collation', 'Drop', 'Are you sure?', 'No rows.', 'Foreign keys', 'collation', 'Column name', 'Parameter name', 'Type', 'Length', 'Options', 'Auto Increment', 'Default values', 'Comment', 'Add next', 'Remove', 'Move up', 'Move down', 'View', 'Table', 'Column', 'Indexes', 'Alter indexes', 'Alter', 'Add foreign key', 'Triggers', 'Add trigger', 'Database schema', 'Export', 'Output', 'Format', 'Routines', 'Events', 'Tables', 'Data', '~ %s', 'edit', 'Create user', 'Error in query', '%.3f s', array ('%d row', '%d rows' ), array ('Query executed OK, %d row affected.', 'Query executed OK, %d rows affected.' ), 'No commands to execute.', 'Execute', 'Stop on error', 'File uploads are disabled.', 'File upload', 'Run file', 'Webserver file %s', 'History', 'Clear', 'Item has been deleted.', 'Item has been updated.', 'Item has been inserted.', 'Insert', 'Save', 'Save and continue edit', 'Save and insert next', 'Delete', 'Table has been dropped.', 'Table has been altered.', 'Table has been created.', 'Create table', 'Maximum number of allowed fields exceeded. Please increase %s and %s.', 'Table name', 'engine', 'Show column comments', 'Partition by', 'Partitions', 'Partition name', 'Values', 'Indexes have been altered.', 'Index Type', 'Column (length)', 'Database has been created.', 'Database has been renamed.', 'Database has been altered.', 'Alter database', 'Create database', 'Call', array ('Routine has been called, %d row affected.', 'Routine has been called, %d rows affected.' ), 'Foreign key has been dropped.', 'Foreign key has been altered.', 'Foreign key has been created.', 'Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.', 'Foreign key', 'Target table', 'Change', 'Source', 'Target', 'ON DELETE', 'ON UPDATE', 'Add column', 'View has been dropped.', 'View has been altered.', 'View has been created.', 'Create view', 'Name', 'Event has been dropped.', 'Event has been altered.', 'Event has been created.', 'Alter event', 'Create event', 'Start', 'End', 'Every', 'On completion preserve', 'Routine has been dropped.', 'Routine has been altered.', 'Routine has been created.', 'Alter function', 'Alter procedure', 'Create function', 'Create procedure', 'Return type', 'Trigger has been dropped.', 'Trigger has been altered.', 'Trigger has been created.', 'Alter trigger', 'Create trigger', 'Time', 'Event', 'User has been dropped.', 'User has been altered.', 'User has been created.', 'Hashed', 'Routine', 'Grant', 'Revoke', array ('%d process has been killed.', '%d processes have been killed.' ), 'Kill', array ('%d item has been affected.', '%d items have been affected.' ), array ('%d row has been imported.', '%d rows have been imported.' ), 'Unable to select the table', 'Relations', 'Page', 'whole result', 'Clone', 'CSV Import', 'Import', 'Tables have been truncated.', 'Tables have been moved.', 'Tables have been dropped.', 'Tables and views', 'Engine', 'Data Length', 'Index Length', 'Data Free', 'Rows', ',', '%d in total', 'Analyze', 'Optimize', 'Check', 'Repair', 'Truncate', 'Move to other database', 'Move', 'Schedule', 'At given time', array ('%d e-mail has been sent.', '%d e-mails have been sent.' ) );
		break;
	case "es" :
		$ea = array ('No posible importar archivo.', 'Tamaño máximo de archivo es %sB.', 'Archivo no existe.', 'original', 'No existen tablas.', 'Idioma', 'Usar', 'Servidor', 'Usuario', 'Contraseña', 'Login', 'Guardar contraseña', 'Mostrar datos', 'Información de la Tabla', 'Modificar Estructura', 'Modificar vista', 'Nuevo Registro', 'Modificar', array ('%d byte', '%d bytes' ), 'Mostrar', 'Funciones', 'Agregaciones', 'Condición', '(donde sea)', 'Ordenar', 'descendiente', 'Limit', 'Longitud de texto', 'Acción', 'Comando SQL', 'mostrar', 'archivo', 'Export', 'Logout', 'base de datos', 'Nueva tabla', 'registros', 'No hay extension MySQL', 'Ninguna de las extensiones PHP soportadas (%s) está disponible.', 'Números', 'Fecha y hora', 'Cadena', 'Binario', 'Listas', 'Token CSRF inválido. Vuelva a enviar los datos del formulario.', 'Salida exitosa.', 'Autenticación fallada.', 'Deben estar habilitadas las sesiones.', 'Sesión expirada, favor loguéese de nuevo.', 'POST data demasiado grande. Reduzca el tamaño o aumente la directiva de configuración %s.', 'Base de datos', 'Base de datos inválida.', 'Base de datos eliminada.', 'Seleccionar Base de datos', 'Nueva Base de datos', 'Privilegios', 'Lista de procesos', 'Variables', 'Estado', 'Versión MySQL: %s a través de extensión PHP %s', 'Logeado como: %s', 'Colación', 'Eliminar', 'Está seguro?', 'No existen registros.', 'Claves foráneas', 'colación', 'Nombre de columna', 'Nombre de Parametro', 'Tipo', 'Longitud', 'Opciones', 'Auto increment', 'Valores predeterminados', 'Comentario', 'Agregar', 'Eliminar', 'Mover arriba', 'Mover abajo', 'Vistas', 'Tabla', 'Columna', 'Indices', 'Modificar indices', 'Modificar', 'Agregar clave foránea', 'Triggers', 'Agregar trigger', 'Esquema de base de datos', 'Exportar', 'Salida', 'Formato', 'Procedimientos', 'Eventos', 'Tablas', 'Datos', '~ %s', 'modificar', 'Crear Usuario', 'Error en consulta', '%.3f s', array ('%d registro', '%d registros' ), array ('Consulta ejecutada, %d registro afectado.', 'Consulta ejecutada, %d registros afectados.' ), 'No hay comando para ejecutar.', 'Ejecutar', 'Parar en caso de error', 'Importación de archivos deshablilitado.', 'Importar archivo', 'Ejecutar Archivo', 'Archivo de servidor web %s', 'History', 'Vaciar', 'Registro eliminado.', 'Registro modificado.', 'Registro insertado.', 'Agregar', 'Guardar', 'Guardar y continuar editando', 'Guardar e insertar otro', 'Eliminar', 'Tabla eliminada.', 'Tabla modificada.', 'Tabla creada.', 'Crear tabla', 'Cantida máxima de campos permitidos excedidos. Favor aumente %s y %s.', 'Nombre de tabla', 'motor', 'Mostrar comentario de columnas', 'Particionar por', 'Particiones', 'Nombre de Partición', 'Valores', 'Indices modificados.', 'Tipo de índice', 'Columna (longitud)', 'Base de datos creada.', 'Base de datos renombrada.', 'Base de datos modificada.', 'Modificar Base de datos', 'Crear Base de datos', 'Llamar', array ('Consulta ejecutada, %d registro afectado.', 'Consulta ejecutada, %d registros afectados.' ), 'Clave foránea eliminada.', 'Clave foránea modificada.', 'Clave foránea creada.', 'Las columnas de origen y destino deben ser del mismo tipo, debe existir un índice entre las columnas del destino y el registro referenciado debe existir.', 'Clave foránea', 'Tabla destino', 'Modificar', 'Origen', 'Destino', 'ON DELETE', 'ON UPDATE', 'Agregar columna', 'Vista eliminada.', 'Vista modificada.', 'Vista creada.', 'Cear vista', 'Nombre', 'Evento eliminado.', 'Evento modificado.', 'Evento creado.', 'Modificar Evento', 'Crear Evento', 'Inicio', 'Fin', 'Cada', 'Al completar preservar', 'Procedimiento eliminado.', 'Procedimiento modificado.', 'Procedimiento creado.', 'Modificar Función', 'Modificar procedimiento', 'Crear función', 'Crear procedimiento', 'Tipo de valor retornado', 'Trigger eliminado.', 'Trigger modificado.', 'Trigger creado.', 'Modificar Trigger', 'Agregar Trigger', 'Tiempo', 'Evento', 'Usuario eliminado.', 'Usuario modificado.', 'Usuario creado.', 'Hash', 'Rutina', 'Conceder', 'Impedir', array ('%d proceso detenido.', '%d procesos detenidos.' ), 'Detener', array ('%d ítem afectado.', '%d itemes afectados.' ), array ('%d registro importado.', '%d registros importados.' ), 'No posible seleccionar la tabla', 'Relaciones', 'Página', 'resultado completo', 'Clonar', 'Importar CSV', 'Importar', 'Tablas vaciadas (truncate).', 'Se movieron las tablas.', 'Tablas eliminadas.', 'Tablas y vistas', 'Motor', 'Longitud de datos', 'Longitud de índice', 'Espacio libre', 'Registros', ' ', '%d en total', 'Analizar', 'Optimizar', 'Comprobar', 'Reparar', 'Vaciar', 'Mover a otra base de datos', 'Mover', 'Agendamiento', 'A hora determinada', array ('%d email enviado.', '%d emails enviados.' ) );
		break;
	case "et" :
		$ea = array ('Faili üleslaadimine pole võimalik.', 'Maksimaalne failisuurus %sB.', 'Faili ei leitud.', 'originaal', 'Tabeleid ei leitud.', 'Keel', 'Kasuta', 'Server', 'Kasutajanimi', 'Parool', 'Logi sisse', 'Jäta mind meelde', 'Vali tabel', 'Tabeli struktuur', 'Muuda tabeli struktuuri', 'Muuda vaadet (VIEW)', 'Lisa kirje', 'Muuda', array ('%d bait', '%d baiti' ), 'Kuva', 'Funktsioonid', 'Liitmine', 'Otsi', '(vahet pole)', 'Sorteeri', 'kahanevalt', 'Piira', 'Teksti pikkus', 'Tegevus', 'SQL-Päring', 'näita brauseris', 'salvesta failina', 'Ekspordi', 'Logi välja', 'andmebaas', 'Loo uus tabel', 'kuva', 'Ei leitud MySQL laiendust', 'Serveris pole ühtegi toetatud PHP laiendustest (%s).', 'Numbrilised', 'Kuupäev ja kellaaeg', 'Tekstid', 'Binaar', 'Listid', 'Sobimatu CSRF, palun postitage vorm uuesti.', 'Väljalogimine õnnestus.', 'Ebakorrektsed andmed.', 'Sessioonid peavad olema lubatud.', 'Sessioon on aegunud, palun logige uuesti sisse.', 'POST-andmete maht on liialt suur. Palun vähendage andmeid või suurendage %s php-seadet.', 'Andmebaas', 'Tundmatu andmebaas.', 'Andmebaas on edukalt kustutatud.', 'Vali andmebaas', 'Loo uus andmebaas', 'Õigused', 'Protsesside nimekiri', 'Muutujad', 'Staatus', 'MySQL versioon: %s, kasutatud PHP moodul: %s', 'Sisse logitud: %s', 'Tähetabel', 'Kustuta', 'Kas oled kindel?', 'Sissekanded puuduvad.', 'Võõrvõtmed (foreign key)', 'tähetabel', 'Veeru nimi', 'Parameetri nimi', 'Tüüp', 'Pikkus', 'Valikud', 'Automaatselt suurenev', 'Vaikimisi väärtused', 'Kommentaar', 'Lisa järgmine', 'Eemalda', 'Liiguta ülespoole', 'Liiguta allapoole', 'Vaata', 'Tabel', 'Veerg', 'Indeksid', 'Muuda indekseid', 'Muuda', 'Lisa võõrvõti', 'Päästikud (trigger)', 'Lisa päästik (TRIGGER)', 'Andmebaasi skeem', 'Ekspordi', 'Väljund', 'Formaat', 'Protseduurid', 'Sündmused (EVENTS)', 'Tabelid', 'Andmed', '~ %s', 'muuda', 'Loo uus kasutaja', 'Päringus esines viga', '%.3f s', array ('%d rida', '%d rida' ), array ('Päring õnnestus, mõjutatatud ridu: %d.', 'Päring õnnestus, mõjutatatud ridu: %d.' ), 'Käsk puudub.', 'Käivita', 'Peatuda vea esinemisel', 'Failide üleslaadimine on keelatud.', 'Faili üleslaadimine', 'Käivita fail', 'Fail serveris: %s', 'Ajalugu', 'Puhasta', 'Kustutamine õnnestus.', 'Uuendamine õnnestus.', 'Lisamine õnnestus.', 'Sisesta', 'Salvesta', 'Salvesta ja jätka muutmist', 'Salvesta ja lisa järgmine', 'Kustuta', 'Tabel on edukalt kustutatud.', 'Tabeli andmed on edukalt muudetud.', 'Tabel on edukalt loodud.', 'Loo uus tabel', 'Maksimaalne väljade arv ületatud. Palun suurendage %s ja %s.', 'Tabeli nimi', 'andmebaasimootor', 'Kuva veeru kommentaarid', 'Partitsiooni', 'Partitsioonid', 'Partitsiooni nimi', 'Väärtused', 'Indeksite andmed on edukalt uuendatud.', 'Indeksi tüüp', 'Veerg (pikkus)', 'Andmebaas on edukalt loodud.', 'Andmebaas on edukalt ümber nimetatud.', 'Andmebaasi struktuuri uuendamine õnnestus.', 'Muuda andmebaasi', 'Loo uus andmebaas', 'Käivita', array ('Protseduur täideti edukalt, mõjutatud ridu: %d.', 'Protseduur täideti edukalt, mõjutatud ridu: %d.' ), 'Võõrvõti on edukalt kustutatud.', 'Võõrvõtme andmed on edukalt muudetud.', 'Võõrvõri on edukalt loodud.', 'Lähte- ja sihtveerud peavad eksisteerima ja omama sama andmetüüpi, sihtveergudel peab olema määratud indeks ning viidatud andmed peavad eksisteerima.', 'Võõrvõti', 'Siht-tabel', 'Muuda', 'Allikas', 'Sihtkoht', 'ON DELETE', 'ON UPDATE', 'Lisa veerg', 'Vaade (VIEW) on edukalt kustutatud.', 'Vaade (VIEW) on edukalt muudetud.', 'Vaade (VIEW) on edukalt loodud.', 'Loo uus vaade (VIEW)', 'Nimi', 'Sündmus on edukalt kustutatud.', 'Sündmuse andmed on edukalt uuendatud.', 'Sündmus on edukalt loodud.', 'Muuda sündmuse andmeid', 'Loo uus sündmus (EVENT)', 'Alusta', 'Lõpeta', 'Iga', 'Lõpetamisel jäta sündmus alles', 'Protseduur on edukalt kustutatud.', 'Protseduuri andmed on edukalt muudetud.', 'Protseduur on edukalt loodud.', 'Muuda funktsiooni', 'Muuda protseduuri', 'Loo uus funktsioon', 'Loo uus protseduur', 'Tagastustüüp', 'Päästik on edukalt kustutatud.', 'Päästiku andmed on edukalt uuendatud.', 'Uus päästik on edukalt loodud.', 'Muuda päästiku andmeid', 'Loo uus päästik (TRIGGER)', 'Aeg', 'Sündmus', 'Kasutaja on edukalt kustutatud.', 'Kasutaja andmed on edukalt muudetud.', 'Kasutaja on edukalt lisatud.', 'Häshitud (Hashed)', 'Protseduur', 'Anna', 'Eemalda', array ('Protsess on edukalt peatatud (%d).', 'Valitud protsessid (%d) on edukalt peatatud.' ), 'Peata', array ('Mõjutatud kirjeid: %d.', 'Mõjutatud kirjeid: %d.' ), array ('Imporditi %d rida.', 'Imporditi %d rida.' ), 'Tabeli valimine ebaõnnestus', 'Seosed', 'Lehekülg', 'Täielikud tulemused', 'Kloon', 'Impordi CSV', 'Impordi', 'Validud tabelid on edukalt tühjendatud.', 'Valitud tabelid on edukalt liigutatud.', 'Valitud tabelid on edukalt kustutatud.', 'Tabelid ja vaated', 'Implementatsioon', 'Andmete pikkus', 'Indeksi pikkus', 'Vaba ruumi', 'Ridu', ',', 'Kokku: %d', 'Analüüsi', 'Optimeeri', 'Kontrolli', 'Paranda', 'Tühjenda', 'Liiguta teise andmebaasi', 'Liiguta', 'Ajakava', 'Antud ajahetkel', array ('Saadetud kirju: %d.', 'Saadetud kirju: %d.' ) );
		break;
	case "fr" :
		$ea = array ('Impossible d\'importer le fichier.', 'Taille maximale des fichiers est de %sB.', 'Le fichier est introuvable.', 'original', 'Aucunes tables.', 'Langues', 'Utiliser', 'Serveur', 'Utilisateur', 'Mot de passe', 'Authentification', 'Authentification permanente', 'Selectionner la table', 'Structure de la table', 'Modifier la table', 'Modifier une vue', 'Nouvel élément', 'Modifier', array ('%d octet', '%d octets' ), 'Select', 'Fonctions', 'Agrégation', 'Rechercher', '(n\'importe où)', 'Ordonner', 'décroissant', 'Limit', 'Longueur du texte', 'Action', 'Requête SQL', 'ouvrir', 'sauvegarder', 'Exporter', 'Déconnexion', 'base de données', 'Créer une table', 'select', 'Extension MySQL introuvable', 'Aucune des extensions PHP supportées (%s) n\'est disponible.', 'Nombres', 'Date et heure', 'Chaînes', 'Binaires', 'Listes', 'Token CSRF invalide. Veuillez réenvoyer le formulaire.', 'Aurevoir!', 'Authentification échouée.', 'Veuillez activer les sessions.', 'Session expirée, veuillez vous authentifier à nouveau.', 'Donnée POST trop grande . Réduire la taille des données ou modifier le %s dans la configuration de PHP.', 'Base de données', 'Base de donnée invalide.', 'Base de données effacée.', 'Selectionner la base de donnée', 'Créer une base de donnée', 'Privilège', 'Liste de processus', 'Variables', 'Status', 'Version de MySQL: %s utilisant l\'extension %s', 'Authentifié en tant que %s', 'Collation', 'Effacer', 'Êtes-vous certain?', 'Aucun résultat.', 'Clé éxterne', 'collation', 'Nom de la colonne', 'Nom du Paramêtre', 'Type', 'Longeur', 'Options', 'Auto increment', 'Valeurs par défaut', 'Commentaire', 'Ajouter le prochain', 'Effacer', 'Déplacer vers le haut', 'Déplacer vers le bas', 'Vue', 'Table', 'Colonne', 'Index', 'Modifier les index', 'Modifier', 'Ajouter une clé externe', 'Triggers', 'Ajouter un trigger', 'Schéma de la base de données', 'Exporter', 'Sortie', 'Formatter', 'Routines', 'Évènement', 'Tables', 'Donnée', '~ %s', 'modifier', 'Créer un utilisateur', 'Erreur dans la requête', '%.3f s', array ('%d ligne', '%d lignes' ), array ('Requête exécutée, %d ligne affectée.', 'Requête exécutée, %d lignes affectées.' ), 'Aucune commande à exécuter.', 'Exécuter', 'Arrêt sur erreur', 'Importation de fichier désactivé.', 'Importer un fichier', 'Executer le fichier', '%s fichier du serveur Web', 'Historique', 'Effacer', 'Élément supprimé.', 'Élément modifié.', 'Élément inseré.', 'Insérer', 'Sauvegarder', 'Sauvegarder et continuer l\'édition', 'Sauvegarder et insérer le prochain', 'Effacer', 'Table effacée.', 'Table modifiée.', 'Table créée.', 'Créer une table', 'Le nombre de champs maximum est dépassé. Veuillez augmenter %s et %s.', 'Nom de la table', 'moteur', 'Voir les commentaires sur les colonnes', 'Partitionné par', 'Partitions', 'Nom de la partition', 'Valeurs', 'Index modifiés.', 'Type d\'index', 'Colonne (longueur)', 'Base de données créée.', 'Base de données renommée.', 'Base de données modifiée.', 'Modifier la base de données', 'Créer une base de données', 'Appeler', array ('Routine exécutée, %d ligne modifiée.', 'Routine exécutée, %d lignes modifiées.' ), 'Clé externe effacée.', 'Clé externe modifiée.', 'Clé externe créée.', 'Les colonnes selectionnées et les colonnes de destination doivent être du même type, il doit y avoir un index sur les colonnes de destination et les données de référence doivent exister.', 'Clé externe', 'Table visée', 'Modifier', 'Source', 'Cible', 'ON DELETE', 'ON UPDATE', 'Ajouter une colonne', 'Vue effacée.', 'Vue modifiée.', 'Vue créée.', 'Créer une vue', 'Nom', 'L\'évènement a été supprimé.', 'L\'évènement a été modifié.', 'L\'évènement a été créé.', 'Modifier un évènement', 'Créer un évènement', 'Démarrer', 'Terminer', 'Chaque', 'Conserver quand complété', 'Procédure éliminée.', 'Procédure modifiée.', 'Procédure créée.', 'Modifier la fonction', 'Modifier la procédure', 'Créer une fonction', 'Créer une procédure', 'Type de retour', 'Trigger éliminé.', 'Trigger modifié.', 'Trigger créé.', 'Modifier un trigger', 'Ajouter un trigger', 'Temps', 'Évènement', 'Utilisateur éffacé.', 'Utilisateur modifié.', 'Utilisateur créé.', 'Haché', 'Routine', 'Grant', 'Revoke', array ('%d processus arrêté.', '%d processus arrêtés.' ), 'Arrêter', array ('%d élément ont été modifié.', '%d éléments ont été modifié.' ), array ('%d ligne a été importé.', '%d lignes ont été importé.' ), 'Impossible de sélectionner la table', 'Relations', 'Page', 'résultat entier', 'Cloner', 'Importation CVS', 'Importer', 'Les tables ont été tronquées.', 'Les tables ont été déplacées.', 'Les tables ont été effacées.', 'Tables et vues', 'Moteur', 'Longeur des données', 'Longeur de l\'index', 'Vide', 'Rangés', ',', '%d au total', 'Analyser', 'Opitimiser', 'Vérifier', 'Réparer', 'Tronquer', 'Déplacer dans une autre base de données', 'Déplacer', 'Horaire', 'À un moment précis', array ('%d message a été envoyé.', '%d messages ont été envoyés.' ) );
		break;
	case "it" :
		$ea = array ('Caricamento del file non riuscito.', 'La dimensione massima del file è %sB.', 'Il file non esiste.', 'originale', 'No tabelle.', 'Lingua', 'Usa', 'Server', 'Utente', 'Password', 'Autenticazione', 'Login permanente', 'Scegli tabella', 'Struttura tabella', 'Modifica tabella', 'Modifica vista', 'Nuovo elemento', 'Modifica', array ('%d byte', '%d bytes' ), 'Seleziona', 'Funzioni', 'Aggregazione', 'Cerca', '(ovunque)', 'Ordina', 'discendente', 'Limite', 'Lunghezza testo', 'Azione', 'Comando SQL', 'apri', 'salva', 'Dump', 'Esci', 'database', 'Crea nuova tabella', 'seleziona', 'Estensioni MySQL non presenti', 'Nessuna delle estensioni PHP supportate (%s) disponibile.', 'Numeri', 'Data e ora', 'Stringhe', 'Binari', 'Liste', 'Token CSRF non valido. Reinvia la richiesta.', 'Uscita effettuata con successo.', 'Credenziali non valide.', 'Le sessioni devono essere abilitate.', 'Sessione scaduta, autenticarsi di nuovo.', 'Troppi dati via POST. Ridurre i dati o aumentare la direttiva di configurazione %s.', 'Database', 'Database non valido.', 'Database eliminato.', 'Seleziona database', 'Crea nuovo database', 'Privilegi', 'Elenco processi', 'Variabili', 'Stato', 'Versione MySQL: %s via estensione PHP %s', 'Autenticato come: %s', 'Collazione', 'Elimina', 'Sicuro?', 'Nessuna riga.', 'Chiavi esterne', 'collazione', 'Nome colonna', 'Nome parametro', 'Tipo', 'Lunghezza', 'Opzioni', 'Auto incremento', 'Valori predefiniti', 'Commento', 'Aggiungi altro', 'Rimuovi', 'Sposta su', 'Sposta giu', 'Vedi', 'Tabella', 'Colonna', 'Indici', 'Modifica indici', 'Modifica', 'Aggiungi foreign key', 'Trigger', 'Aggiungi trigger', 'Schema database', 'Esporta', 'Risultato', 'Formato', 'Routine', 'Eventi', 'Tabelle', 'Dati', '~ %s', 'modifica', 'Crea utente', 'Errore nella query', '%.3f s', array ('%d riga', '%d righe' ), array ('Esecuzione della query OK, %d riga interessata.', 'Esecuzione della query OK, %d righe interessate.' ), 'Nessun commando da eseguire.', 'Esegui', 'Stop su errore', 'Caricamento file disabilitato.', 'Caricamento file', 'Esegui file', 'Webserver file %s', 'Storico', 'Pulisci', 'Elemento eliminato.', 'Elemento aggiornato.', 'Elemento inserito.', 'Inserisci', 'Salva', 'Salva e continua', 'Salva e inserisci un altro', 'Elimina', 'Tabella eliminata.', 'Tabella modificata.', 'Tabella creata.', 'Crea tabella', 'Troppi campi. Per favore aumentare %s e %s.', 'Nome tabella', 'motore', 'Mostra i commenti delle colonne', 'Partiziona per', 'Partizioni', 'Nome partizione', 'Valori', 'Indici modificati.', 'Tipo indice', 'Colonna (lunghezza)', 'Database creato.', 'Database rinominato.', 'Database modificato.', 'Modifica database', 'Crea database', 'Chiama', array ('Routine chiamata, %d riga interessata.', 'Routine chiamata, %d righe interessate.' ), 'Foreign key eliminata.', 'Foreign key modificata.', 'Foreign key creata.', 'Le colonne sorgente e destinazione devono essere dello stesso tipo e ci deve essere un indice sulla colonna di destinazione e sui dati referenziati.', 'Foreign key', 'Tabella obiettivo', 'Cambia', 'Sorgente', 'Obiettivo', 'ON DELETE', 'ON UPDATE', 'Aggiungi colonna', 'Vista eliminata.', 'Vista modificata.', 'Vista creata.', 'Crea vista', 'Nome', 'Evento eliminato.', 'Evento modificato.', 'Evento creato.', 'Modifica evento', 'Crea evento', 'Inizio', 'Fine', 'Ogni', 'Al termine preservare', 'Routine eliminata.', 'Routine modificata.', 'Routine creata.', 'Modifica funzione', 'Modifica procedura', 'Crea funzione', 'Crea procedura', 'Return type', 'Trigger eliminato.', 'Trigger modificato.', 'Trigger creato.', 'Modifica trigger', 'Crea trigger', 'Orario', 'Evento', 'Utente eliminato.', 'Utente modificato.', 'Utente creato.', 'Hashed', 'Routine', 'Permetti', 'Revoca', array ('%d processo interrotto.', '%d processi interrotti.' ), 'Interrompi', array ('Il risultato consiste in %d elemento', 'Il risultato consiste in %d elementi' ), array ('%d riga importata.', '%d righe importate.' ), 'Selezione della tabella non riuscita', 'Relazioni', 'Pagina', 'intero risultato', 'Clona', 'Importa da CSV', 'Importa', 'Le tabelle sono state svuotate.', 'Le tabelle sono state spostate.', 'Le tabelle sono state eliminate.', 'Tabelle e viste', 'Motore', 'Lunghezza dato', 'Lunghezza indice', 'Dati liberi', 'Righe', '.', '%d in totale', 'Analizza', 'Ottimizza', 'Controlla', 'Ripara', 'Svuota', 'Sposta in altro database', 'Sposta', 'Pianifica', 'A tempo prestabilito', array ('%d e-mail inviata.', '%d e-mail inviate.' ) );
		break;
	case "nl" :
		$ea = array ('Onmogelijk bestand te uploaden.', 'Maximum toegelaten bestandsgrootte is %sB.', 'Bestand niet gevonden.', 'origineel', 'Geen tabellen.', 'Taal', 'Gebruik', 'Server', 'Gebruikersnaam', 'Wachtwoord', 'Inloggen', 'Blijf aangemeld', 'Selecteer tabel', 'Tabelstructuur', 'Tabel aanpassen', 'View aanpassen', 'Nieuw item', 'Bewerk', array ('%d byte', '%d bytes' ), 'Kies', 'Functies', 'Totalen', 'Zoeken', '(overal)', 'Sorteren', 'Aflopend', 'Beperk', 'Tekst lengte', 'Acties', 'SQL opdracht', 'openen', 'opslaan', 'Exporteer', 'Uitloggen', 'database', 'Nieuwe tabel', 'kies', 'Geen MySQL extensie', 'Geen geldige PHP extensies beschikbaar (%s).', 'Getallen', 'Datum en tijd', 'Tekst', 'Binaire gegevens', 'Lijsten', 'Ongeldig CSRF token. Verstuur het formulier opnieuw.', 'Uitloggen geslaagd.', 'Ongeldige logingegevens.', 'Sessies moeten geactiveerd zijn.', 'Uw sessie is verlopen. Gelieve opnieuw in te loggen.', 'POST-data is te groot. Verklein de hoeveelheid data of verhoog de %s configuratie.', 'Database', 'Ongeldige database.', 'Database verwijderd.', 'Database selecteren', 'Nieuwe database', 'Rechten', 'Proceslijst', 'Variabelen', 'Status', 'MySQL versie: %s met PHP extensie %s', 'Aangemeld als: %s', 'Collatie', 'Verwijderen', 'Weet u het zeker?', 'Geen rijen.', 'Foreign keys', 'collation', 'Kolomnaam', 'Parameternaam', 'Type', 'Lengte', 'Opties', 'Auto nummering', 'Standaard waarden', 'Commentaar', 'Volgende toevoegen', 'Verwijderen', 'Omhoog', 'Omlaag', 'View', 'Tabel', 'Kolom', 'Indexen', 'Indexen aanpassen', 'Aanpassen', 'Foreign key aanmaken', 'Triggers', 'Trigger aanmaken', 'Database schema', 'Exporteren', 'Uitvoer', 'Formaat', 'Procedures', 'Events', 'Tabellen', 'Data', '~ %s', 'bewerk', 'Gebruiker aanmaken', 'Fout in query', '%.3f s', array ('%d rij', '%d rijen' ), array ('Query uitgevoerd, %d rij geraakt.', 'Query uitgevoerd, %d rijen geraakt.' ), 'Geen opdrachten uit te voeren.', 'Uitvoeren', 'Stoppen bij fout', 'Bestanden uploaden is uitgeschakeld.', 'Bestand uploaden', 'Bestand uitvoeren', 'Webserver bestand %s', 'Geschiedenis', 'Wissen', 'Item verwijderd.', 'Item aangepast.', 'Item toegevoegd.', 'Toevoegen', 'Opslaan', 'Opslaan en verder bewerken', 'Opslaan, daarna toevoegen', 'Verwijderen', 'Tabel verwijderd.', 'Tabel aangepast.', 'Tabel aangemaakt.', 'Tabel aanmaken', 'Maximum aantal velden bereikt. Verhoog %s en %s.', 'Tabelnaam', 'engine', 'Kolomcommentaar weergeven', 'Partitioneren op', 'Partities', 'Partitie naam', 'Waarden', 'Index aangepast.', 'Index type', 'Kolom (lengte)', 'Database aangemaakt.', 'Database hernoemd.', 'Database aangepast.', 'Database aanpassen', 'Database aanmaken', 'Uitvoeren', array ('Procedure uitgevoerd, %d rij geraakt.', 'Procedure uitgevoerd, %d rijen geraakt.' ), 'Foreign key verwijderd.', 'Foreign key aangepast.', 'Foreign key aangemaakt.', 'Bron- en doelkolommen moeten van hetzelfde data type zijn, er moet een index bestaan op de gekozen kolommen en er moet gerelateerde data bestaan.', 'Foreign key', 'Doeltabel', 'Veranderen', 'Bron', 'Doel', 'ON DELETE', 'ON UPDATE', 'Kolom toevoegen', 'View verwijderd.', 'View aangepast.', 'View aangemaakt.', 'View aanmaken', 'Naam', 'Event werd verwijderd.', 'Event werd aangepast.', 'Event werd aangemaakt.', 'Event aanpassen', 'Event aanmaken', 'Start', 'Stop', 'Iedere', 'Bewaren na voltooiing', 'Procedure verwijderd.', 'Procedure aangepast.', 'Procedure aangemaakt.', 'Functie aanpassen', 'Procedure aanpassen', 'Functie aanmaken', 'Procedure aanmaken', 'Return type', 'Trigger verwijderd.', 'Trigger aangepast.', 'Trigger aangemaakt.', 'Trigger aanpassen', 'Trigger aanmaken', 'Time', 'Event', 'Gebruiker verwijderd.', 'Gebruiker aangepast.', 'Gebruiker aangemaakt.', 'Gehashed', 'Routine', 'Toekennen', 'Intrekken', array ('%d proces gestopt.', '%d processen gestopt.' ), 'Stoppen', array ('%d item aangepast.', '%d items aangepast.' ), array ('%d rij werd geïmporteerd.', '%d rijen werden geïmporteerd.' ), 'Onmogelijk tabel te selecteren', 'Relaties', 'Pagina', 'volledig resultaat', 'Dupliceer', 'CSV Import', 'Importeren', 'Tabellen werden geleegd.', 'Tabellen werden verplaatst.', 'Tabellen werden verwijderd.', 'Tabellen en views', 'Engine', 'Data lengte', 'Index lengte', 'Data Vrij', 'Rijen', '.', '%d in totaal', 'Analyseer', 'Optimaliseer', 'Controleer', 'Herstel', 'Legen', 'Verplaats naar andere database', 'Verplaats', 'Schedule', 'Op aangegeven tijd', array ('%d e-mail verzonden.', '%d e-mails verzonden.' ) );
		break;
	case "ru" :
		$ea = array ('Не удалось загрузить файл на сервер.', 'Максимальный разрешенный размер файла - %sB.', 'Такого файла не существует.', 'исходный', 'В базе данных нет таблиц.', 'Язык', 'Выбрать', 'Сервер', 'Имя пользователя', 'Пароль', 'Войти', 'Оставаться в системе', 'Выбрать данные из таблицы', 'Структура таблицы', 'Изменить таблицу', 'Изменить представление', 'Новая запись', 'Редактировать', array ('%d байт', '%d байта', '%d байтов' ), 'Выбрать', 'Функции', 'Агрегация', 'Поиск', '(в любом месте)', 'Сортировать', 'по убыванию', 'Лимит', 'Длина текста', 'Действие', 'SQL запрос', 'открыть', 'сохранить', 'Дамп', 'Выйти', 'база данных', 'Создать новую таблицу', 'выбрать', 'Нет MySQL расширений', 'Не доступно ни одного расширения из поддерживаемых (%s).', 'Число', 'Дата и время', 'Строки', 'Двоичный тип', 'Списки', 'Недействительный CSRF токен. Отправите форму ещё раз.', 'Вы успешно покинули систему.', 'Неправильное имя пользователя или пароль.', 'Сессии должны быть включены.', 'Срок действия сесси истек, нужно снова войти в систему.', 'Слишком большой объем POST-данных. Пошлите меньший объем данных или увеличьте параметр конфигурационной директивы %s.', 'База данных', 'Плохая база данных.', 'База данных была удалена.', 'Выбрать базу данных', 'Создать новую базу данных', 'Полномочия', 'Список процессов', 'Переменные', 'Состояние', 'Версия MySQL: %s с PHP-расширением %s', 'Вы вошли как: %s', 'Режим сопоставления', 'Удалить', 'Вы уверены?', 'Нет записей.', 'Внешние ключи', 'режим сопоставления', 'Название поля', 'Название параметра', 'Тип', 'Длина', 'Действие', 'Автоматическое приращение', 'Значения по умолчанию', 'Комментарий', 'Добавить еще', 'Удалить', 'Переместить вверх', 'Переместить вниз', 'Представление', 'Таблица', 'Колонка', 'Индексы', 'Изменить индексы', 'Изменить', 'Добавить внешний ключ', 'Триггеры', 'Добавить триггер', 'Схема базы данных', 'Експорт', 'Выходные данные', 'Формат', 'Хранимые процедуры и функции', 'События', 'Таблицы', 'Данные', '~ %s', 'редактировать', 'Создать пользователя', 'Ошибка в запросe', '%.3f s', array ('%d строка', '%d строки', '%d строк' ), array ('Запрос завершен, изменена %d запись.', 'Запрос завершен, изменены %d записи.', 'Запрос завершен, изменено %d записей.' ), 'Нет команд для выполнения.', 'Выполнить', 'Остановить при ошибке', 'Загрузка файлов на сервер запрещена.', 'Загрузить файл на сервер', 'Запустить файл', 'Файл %s на вебсервере', 'История', 'Очистить', 'Запись удалена.', 'Запись обновлена.', 'Запись вставлена.', 'Вставить', 'Сохранить', 'Сохранить и продолжить редактирование', 'Сохранить и вставить еще', 'Стереть', 'Таблица была удалена.', 'Таблица была изменена.', 'Таблица была создана.', 'Создать таблицу', 'Достигнуто максимальное значение количества доступных полей. Увеличьте %s и %s.', 'Название таблицы', 'тип', 'Показать комментарии к колонке', 'Разделить по', 'Разделы', 'Название раздела', 'Параметры', 'Индексы изменены.', 'Тип индекса', 'Колонка (длина)', 'База данных была создана.', 'База данных была переименована.', 'База данных была изменена.', 'Изменить базу данных', 'Создать базу данных', 'Вызвать', array ('Была вызвана процедура, %d запись была изменена.', 'Была вызвана процедура, %d записи было изменено.', 'Была вызвана процедура, %d записей было изменено.' ), 'Внешний ключ был удален.', 'Внешний ключ был изменен.', 'Внешний ключ был создан.', 'Колонки должны иметь одинаковые типы данных, в результирующей колонке должен быть индекс, данные для импорта должны существовать.', 'Внешний ключ', 'Результирующая таблица', 'Изменить', 'Источник', 'Цель', 'При стирании', 'При обновлении', 'Добавить колонку', 'Представление было удалено.', 'Представление было изменено.', 'Представление было создано.', 'Создать представление', 'Название', 'Событие было удалено.', 'Событие было изменено.', 'Событие было создано.', 'Изменить событие', 'Создать событие', 'Начало', 'Конец', 'Каждые', 'После завершения сохранить', 'Процедура была удалена.', 'Процедура была изменена.', 'Процедура была создана.', 'Изменить функцию', 'Изменить процедуру', 'Создать функцию', 'Создать процедуру', 'Возвращаемый тип', 'Триггер был удален.', 'Триггер был изменен.', 'Триггер был создан.', 'Изменить триггер', 'Создать триггер', 'Время', 'Событие', 'Пользователь был удален.', 'Пользователь был изменен.', 'Пользователь был создан.', 'Хешировано', 'Процедура', 'Позволить', 'Запретить', array ('Был завершен %d процесс.', 'Было завершено %d процесса.', 'Было завершёно %d процессов.' ), 'Завершить', array ('Была изменена %d запись.', 'Были изменены %d записи.', 'Было изменено %d записей.' ), array ('Импортирована %d строка.', 'Импортировано %d строки.', 'Импортировано %d строк.' ), 'Не удалось получить данные из таблицы', 'Реляции', 'Страница', 'весь результат', 'Клонировать', 'Импорт CSV', 'Импорт', 'Таблицы были очищены.', 'Таблицы были перемещены.', 'Таблицы были удалены.', 'Таблицы и представления', 'Тип', 'Объём данных', 'Объём индексов', 'Свободное место', 'Строк', ' ', 'Всего %d', 'Анализировать', 'Оптимизировать', 'Проверить', 'Исправить', 'Очистить', 'Переместить в другою базу данных', 'Переместить', 'Расписание', 'В данное время', array ('Было отправлено %d письмо.', 'Было отправлено %d письма.', 'Было отправлено %d писем.' ) );
		break;
	case "sk" :
		$ea = array ('Súbor sa nepodarilo nahrať.', 'Maximálna povolená veľkosť súboru je %sB.', 'Súbor neexistuje.', 'originál', 'Žiadne tabuľky.', 'Jazyk', 'Vybrať', 'Server', 'Používateľ', 'Heslo', 'Prihlásiť sa', 'Trvalé prihlásenie', 'Vypísať tabuľku', 'Štruktúra tabuľky', 'Zmeniť tabuľku', 'Zmeniť pohľad', 'Nová položka', 'Upraviť', array ('%d bajt', '%d bajty', '%d bajtov' ), 'Vypísať', 'Funkcie', 'Agregácia', 'Vyhľadať', '(kdekoľvek)', 'Zotriediť', 'zostupne', 'Limit', 'Dĺžka textov', 'Akcia', 'SQL príkaz', 'otvoriť', 'uložiť', 'Export', 'Odhlásiť', 'databáza', 'Vytvoriť novú tabuľku', 'vypísať', 'Žiadne MySQL rozšírenie', 'Nie je dostupné žiadne z podporovaných rozšírení (%s).', 'Čísla', 'Dátum a čas', 'Reťazce', 'Binárne', 'Zoznamy', 'Neplatný token CSRF. Odošlite formulár znova.', 'Odhlásenie prebehlo v poriadku.', 'Neplatné prihlasovacie údaje.', 'Session premenné musia byť povolené.', 'Session vypršala, prihláste sa prosím znova.', 'Príliš veľké POST dáta. Zmenšite dáta alebo zvýšte hodnotu konfiguračej direktívy %s.', 'Databáza', 'Nesprávna databáza.', 'Databáza bola odstránená.', 'Vybrať databázu', 'Vytvoriť novú databázu', 'Oprávnenia', 'Zoznam procesov', 'Premenné', 'Stav', 'Verzia MySQL: %s cez PHP rozšírenie %s', 'Prihlásený ako: %s', 'Porovnávanie', 'Odstrániť', 'Naozaj?', 'Žiadne riadky.', 'Cudzie kľúče', 'porovnávanie', 'Názov stĺpca', 'Názov parametra', 'Typ', 'Dĺžka', 'Voľby', 'Auto Increment', 'Východzie hodnoty', 'Komentár', 'Pridať ďalší', 'Odobrať', 'Presunúť hore', 'Presunúť dolu', 'Pohľad', 'Tabuľka', 'Stĺpec', 'Indexy', 'Zmeniť indexy', 'Zmeniť', 'Pridať cudzí kľúč', 'Triggery', 'Pridať trigger', 'Schéma databázy', 'Export', 'Výstup', 'Formát', 'Procedúry', 'Udalosti', 'Tabuľky', 'Dáta', '~ %s', 'upraviť', 'Vytvoriť používateľa', 'Chyba v dotaze', '%.3f s', array ('%d riadok', '%d riadky', '%d riadkov' ), array ('Príkaz prebehol v poriadku, bol zmenený %d záznam.', 'Príkaz prebehol v poriadku boli zmenené %d záznamy.', 'Príkaz prebehol v poriadku bolo zmenených %d záznamov.' ), 'Žiadne príkazy na vykonanie.', 'Vykonať', 'Zastaviť pri chybe', 'Nahrávánie súborov nie je povolené.', 'Nahranie súboru', 'Spustiť súbor', 'Súbor %s na webovom serveri', 'História', 'Vyčistiť', 'Položka bola vymazaná.', 'Položka bola aktualizovaná.', 'Položka bola vložená.', 'Vložiť', 'Uložiť', 'Uložiť a pokračovať v úpravách', 'Uložiť a vložiť ďalší', 'Zmazať', 'Tabuľka bola odstránená.', 'Tabuľka bola zmenená.', 'Tabuľka bola vytvorená.', 'Vytvoriť tabuľku', 'Bol prekročený maximálny počet povolených polí. Zvýšte prosím %s a %s.', 'Názov tabuľky', 'úložisko', 'Zobraziť komentáre stĺpcov', 'Rozdeliť podľa', 'Oddiely', 'Názov oddielu', 'Hodnoty', 'Indexy boli zmenené.', 'Typ indexu', 'Stĺpec (dĺžka)', 'Databáza bola vytvorená.', 'Databáza bola premenovaná.', 'Databáza bola zmenená.', 'Zmeniť databázu', 'Vytvoriť databázu', 'Zavolať', array ('Procedúra bola zavolaná, bol zmenený %d záznam.', 'Procedúra bola zavolaná, boli zmenené %d záznamy.', 'Procedúra bola zavolaná, bolo zmenených %d záznamov.' ), 'Cudzí kľúč bol odstránený.', 'Cudzí kľúč bol zmenený.', 'Cudzí kľúč bol vytvorený.', 'Zdrojové a cieľové stĺpce musia mať rovnaký datový typ, nad cieľovými stĺpcami musí byť definovaný index a odkazované dáta musia existovať.', 'Cudzí kľúč', 'Cieľová tabuľka', 'Zmeniť', 'Zdroj', 'Cieľ', 'ON DELETE', 'ON UPDATE', 'Pridať stĺpec', 'Pohľad bol odstránený.', 'Pohľad bol zmenený.', 'Pohľad bol vytvorený.', 'Vytvoriť pohľad', 'Názov', 'Udalosť bola odstránená.', 'Udalosť bola zmenená.', 'Udalosť bola vytvorená.', 'Upraviť udalosť', 'Vytvoriť udalosť', 'Začiatok', 'Koniec', 'Každých', 'Po dokončení zachovat', 'Procedúra bola odstránená.', 'Procedúra bola zmenená.', 'Procedúra bola vytvorená.', 'Zmeniť funkciu', 'Zmeniť procedúru', 'Vytvoriť funkciu', 'Vytvoriť procedúru', 'Návratový typ', 'Trigger bol odstránený.', 'Trigger bol zmenený.', 'Trigger bol vytvorený.', 'Zmeniť trigger', 'Vytvoriť trigger', 'Čas', 'Udalosť', 'Používateľ bol odstránený.', 'Používateľ bol zmenený.', 'Používateľ bol vytvorený.', 'Zahašované', 'Procedúra', 'Povoliť', 'Zakázať', array ('Bol ukončený %d proces.', 'Boli ukončené %d procesy.', 'Bolo ukončených %d procesov.' ), 'Ukončiť', '%d položiek bolo ovplyvnených.', array ('Bol importovaný %d záznam.', 'Boli importované %d záznamy.', 'Bolo importovaných %d záznamov.' ), 'Tabuľku sa nepodarilo vypísať', 'Vzťahy', 'Stránka', 'celý výsledok', 'Klonovať', 'Import CSV', 'Import', 'Tabuľka bola vyprázdnená', 'Tabuľka bola presunutá', 'Tabuľka bola odstránená', 'Tabuľky a pohľady', 'Typ', 'Veľkosť dát', 'Veľkosť indexu', 'Voľné miesto', 'Riadky', ' ', '%d celkom', 'Analyzovať', 'Optimalizovať', 'Skontrolovať', 'Opraviť', 'Vyprázdniť', 'Presunúť do inej databázy', 'Presunúť', 'Plán', 'V stanovený čas', 'Editor' );
		break;
	case "zh-tw" :
		$ea = array ('無法上傳檔案。', '允許的檔案上限大小為%sB', '檔案不存在', '原始', '沒有資料表。', '語言', '使用', '伺服器', '帳號', '密碼', '登入', '永久登入', '選擇資料表', '資料表結構', '更改資料表', '更改檢視表', '新建項', '編輯', '%d byte(s)', '選擇', '函數', '集合', '搜尋', '（任意位置）', '排序', '降冪', '限定', 'Text 長度', '動作', 'SQL命令', '打開', '儲存', '導入/導出', '登出', '資料庫', '建立新資料表', '選擇', '沒有 MySQL 擴充模組', '沒有任何支援的PHP擴充模組（%s）。', '數字', '日期時間', '字符串', '二進制', '列表', '無效的 CSRF token。請重新發送表單。', '登出成功。', '無效的憑證。', 'Session 必須被啟用。', 'Session 已過期，請重新登入。', 'POST 資料太大。減少資料或者增加 %s 的設定值。', '資料庫', '無效的資料庫。', '已丟棄資料庫。', '選擇資料庫', '建立新資料庫', '權限', '進程列表', '變數', '狀態', 'MySQL版本：%s 透過PHP擴充模組 %s', '登錄為：%s', '校對', '丟棄', '你確定嗎？', '沒有行。', '外鍵', '校對', '列名', '參數名稱', '類型', '長度', '選項', '自動增加', '預設值', '註解', '新增下一個', '移除', '上移', '下移', '檢視表', '資料表', '列', '索引', '更改索引', '更改', '新增外鍵', '觸發器', '建立觸發器', '資料庫架構', '匯出', '輸出', '格式', '程序', '事件', '資料表', '資料', '~ %s', '編輯', '建立使用者', '查詢出錯', '%.3f秒', '%d行', '執行查詢OK，%d行受影響', '沒有命令可執行。', '執行', '出錯時停止', '檔案上傳被禁用。', '檔案上傳', '執行檔案', '網頁伺服器檔案 %s', '歷史', '清除', '該項目已被刪除', '已更新項目。', '已插入項目。', '插入', '儲存', '保存並繼續編輯', '儲存並插入下一個', '刪除', '已經刪除資料表。', '資料表已更改。', '資料表已更改。', '建立資料表表', '超過最多允許的字段數量。請增加%s和%s 。', '資料表名稱', '引擎', '顯示列註解', '分區類型', '分區', '分區名', '值', '已更改索引。', '索引類型', '列（長度）', '已建立資料庫。', '已重新命名資料庫。', '已更改資料庫。', '更改資料庫', '建立資料庫', '呼叫', '程序已被執行，%d行被影響', '已刪除外鍵。', '已更改外鍵。', '已建立外鍵。', '源列和目標列必須具有相同的數據類型，在目標列上必須有一個索引並且引用的數據必須存在。', '外鍵', '目標資料表', '更改', '來源', '目標', 'ON DELETE', 'ON UPDATE', '新增資料列', '已丟棄檢視表。', '已更改檢視表。', '已建立檢視表。', '建立檢視表', '名稱', '已丟棄事件。', '已更改事件。', '已建立事件。', '更改事件', '建立事件', '開始', '結束', '每', '在完成後保存', '已丟棄程序。', '已更改子程序。', '已建立子程序。', '更改函數', '更改過程', '建立函數', '建立預存程序', '返回類型', '已丟棄觸發器。', '已更改觸發器。', '已建立觸發器。', '更改觸發器', '建立觸發器', '時間', '事件', '已丟棄使用者。', '已更改使用者。', '已建立使用者。', 'Hashed', '程序', '授權', '廢除', '%d 個 Process(es) 被終止', '終止', '%d個項目受到影響。', '%d行已導入。', '無法選擇該資料表', '關聯', '頁', '所有結果', '複製', '匯入 CSV', '匯入', '已清空資料表。', '已轉移資料表。', '已丟棄表。', '資料表和檢視表', '引擎', '資料長度', '索引長度', '資料空閒', '行數', ',', '總共 %d 個', '分析', '優化', '檢查', '修復', '清空', '轉移到其它資料庫', '轉移', '調度', '在指定時間', '已發送 %d 封郵件。' );
		break;
	case "zh" :
		$ea = array ('不能上传文件。', '最多允许的文件大小为 %sB', '文件不存在', '原始', '没有表。', '语言', '使用', '服务器', '用户名', '密码', '登录', '保持登录', '选择表', '表结构', '更改表', '更改视图', '新建项', '编辑', '%d 字节', '选择', '函数', '集合', '搜索', '（任意位置）', '排序', '降序', '限定', '文本长度', '动作', 'SQL命令', '打开', '保存', '导出', '注销', '数据库', '创建新表', '选择', '没有MySQL扩展', '没有支持的 PHP 扩展可用（%s）。', '数字', '日期时间', '字符串', '二进制', '列表', '无效 CSRF 令牌。重新发送表单。', '注销成功。', '无效凭据。', '会话必须被启用。', '会话已过期，请重新登录。', '太大的 POST 数据。减少数据或者增加 %s 配置命令。', '数据库', '无效数据库。', '已丢弃数据库。', '选择数据库', '创建新数据库', '权限', '进程列表', '变量', '状态', 'MySQL 版本：%s 通过 PHP 扩展 %s', '登录为：%s', '校对', '丢弃', '你确定吗？', '没有行。', '外键', '校对', '列名', '参数名', '类型', '长度', '选项', '自动增量', '默认值', '注释', '添加下一个', '移除', '上移', '下移', '视图', '表', '列', '索引', '更改索引', '更改', '添加外键', '触发器', '创建触发器', '数据库概要', '导出', '输出', '格式', '子程序', '事件', '表', '数据', '~ %s', '编辑', '创建用户', '查询出错', '%.3f 秒', '%d 行', '执行查询OK，%d 行受影响', '没有命令执行。', '执行', '出错时停止', '文件上传被禁用。', '文件上传', '运行文件', 'Web服务器文件 %s', '历史', '清除', '已删除项目。', '已更新项目。', '已插入项目。', '插入', '保存', '保存并继续编辑', '保存并插入下一个', '删除', '已丢弃表。', '已更改表。', '已创建表。', '创建表', '超过最多允许的字段数量。请增加 %s 和 %s 。', '表名', '引擎', '显示列注释', '分区类型', '分区', '分区名', '值', '已更改索引。', '索引类型', '列（长度）', '已创建数据库。', '已重命名数据库。', '已更改数据库。', '更改数据库', '创建数据库', '调用', '子程序被调用，%d 行被影响', '已删除外键。', '已更改外键。', '已创建外键。', '源列和目标列必须具有相同的数据类型，在目标列上必须有一个索引并且引用的数据必须存在。', '外键', '目标表', '更改', '源', '目标', 'ON DELETE', 'ON UPDATE', '增加列', '已丢弃视图。', '已更改视图。', '已创建视图。', '创建视图', '名称', '已丢弃事件。', '已更改事件。', '已创建事件。', '更改事件', '创建事件', '开始', '结束', '每', '完成后保存', '已丢弃子程序。', '已更改子程序。', '已创建子程序。', '更改函数', '更改过程', '创建函数', '创建过程', '返回类型', '已丢弃触发器。', '已更改触发器。', '已创建触发器。', '更改触发器', '创建触发器', '时间', '事件', '已丢弃用户。', '已更改用户。', '已创建用户。', 'Hashed', '子程序', '授权', '废除', '%d 个进程被终止', '终止', '%d 个项目受到影响。', '%d 行已导入。', '不能选择该表', '关联信息', '页面', '所有结果', '克隆', 'CSV 导入', '导入', '已清空表。', '已转移表。', '已丢弃表。', '表和视图', '引擎', '数据长度', '索引长度', '数据空闲', '行数', ',', '共计 %d', '分析', '优化', '检查', '修复', '清空', '转移到其它数据库', '转移', '调度', '在指定时间', '%d 封邮件已发送。' );
		break;
}
class Adminer {
	var $functions = array ("char_length", "from_unixtime", "hex", "lower", "round", "sec_to_time", "time_to_sec", "unix_timestamp", "upper" );
	var $grouping = array ("avg", "count", "count distinct", "group_concat", "max", "min", "sum" );
	var $operators = array ("=", "<", ">", "<=", ">=", "!=", "LIKE", "REGEXP", "IN", "IS NULL", "NOT LIKE", "NOT REGEXP", "NOT IN", "IS NOT NULL" );
	function name() {
		return "Adminer";
	}
	function credentials() {
		return array ($_GET ["server"], $_SESSION ["usernames"] [$_GET ["server"]], $_SESSION ["passwords"] [$_GET ["server"]] );
	}
	function permanentLogin() {
		return "";
	}
	function database() {
		return DB;
	}
	function loginForm($A) {
		echo '<table cellspacing="0">
<tr><th>', lang ( 7 ), '<td><input name="server" value="', h ( $_GET ["server"] ), '">
<tr><th>', lang ( 8 ), '<td><input name="username" value="', h ( $A ), '">
<tr><th>', lang ( 9 ), '<td><input type="password" name="password">
</table>
', "<p><input type='submit' value='" . lang ( 10 ) . "'>\n";
		if ($this->permanentLogin ()) {
			echo checkbox ( "permanent", 1, $_COOKIE ["adminer_permanent"], lang ( 11 ) ) . "\n";
		}
	}
	function login($Ke, $ya) {
		return true;
	}
	function tableName($dc) {
		return h ( $dc ["Name"] );
	}
	function fieldName($c, $Ja = 0) {
		return '<span title="' . h ( $c ["full_type"] ) . '">' . h ( $c ["field"] ) . '</span>';
	}
	function selectLinks($dc, $u = "") {
		echo '<p class="tabs">';
		$Ca = array ("select" => lang ( 12 ), "table" => lang ( 13 ) );
		if (isset ( $dc ["Rows"] )) {
			$Ca ["create"] = lang ( 14 );
		} else {
			$Ca ["view"] = lang ( 15 );
		}
		if (isset ( $u )) {
			$Ca ["edit"] = lang ( 16 );
		}
		foreach ( $Ca as $e => $b ) {
			echo " <a href='" . h ( ME ) . "$e=" . urlencode ( $dc ["Name"] ) . ($e == "edit" ? $u : "") . "'>" . bold ( $b, isset ( $_GET [$e] ) ) . "</a>";
		}
		echo "\n";
	}
	function backwardKeys($n, $Ie) {
		return array ();
	}
	function backwardKeysPrint($Je, $a) {
	}
	function selectQuery($m) {
		return "<p><code class='jush-sql'>" . h ( str_replace ( "\n", " ", $m ) ) . "</code> <a href='" . h ( ME ) . "sql=" . urlencode ( $m ) . "'>" . lang ( 17 ) . "</a>\n";
	}
	function rowDescription($n) {
		return "";
	}
	function rowDescriptions($Ra, $ye) {
		return $Ra;
	}
	function selectVal($b, $y, $c) {
		$g = ($b != "<i>NULL</i>" && $c ["type"] == "char" ? "<code>$b</code>" : $b);
		if (ereg ( 'blob|binary', $c ["type"] ) && ! is_utf8 ( $b )) {
			$g = lang ( 18, strlen ( $b ) );
		}
		return ($y ? "<a href='$y'>$g</a>" : $g);
	}
	function editVal($b, $c) {
		return $b;
	}
	function selectColumnsPrint($v, $t) {
		print_fieldset ( "select", lang ( 19 ), $v );
		$i = 0;
		$Od = array (lang ( 20 ) => $this->functions, lang ( 21 ) => $this->grouping );
		foreach ( $v as $e => $b ) {
			$b = $_GET ["columns"] [$e];
			echo "<div>" . html_select ( "columns[$i][fun]", array (- 1 => "" ) + $Od, $b ["fun"] ), "<select name='columns[$i][col]'><option>" . optionlist ( $t, $b ["col"], true ) . "</select></div>\n";
			$i ++;
		}
		echo "<div>" . html_select ( "columns[$i][fun]", array (- 1 => "" ) + $Od, "", "this.nextSibling.onchange();" ), "<select name='columns[$i][col]' onchange='selectAddRow(this);'><option>" . optionlist ( $t, null, true ) . "</select></div>\n", "</div></fieldset>\n";
	}
	function selectSearchPrint($D, $t, $w) {
		print_fieldset ( "search", lang ( 22 ), $D );
		foreach ( $w as $i => $s ) {
			if ($s ["type"] == "FULLTEXT") {
				echo "(<i>" . implode ( "</i>, <i>", array_map ( 'h', $s ["columns"] ) ) . "</i>) AGAINST", " <input name='fulltext[$i]' value='" . h ( $_GET ["fulltext"] [$i] ) . "'>", checkbox ( "boolean[$i]", 1, isset ( $_GET ["boolean"] [$i] ), "BOOL" ), "<br>\n";
			}
		}
		$i = 0;
		foreach ( ( array ) $_GET ["where"] as $b ) {
			if ("$b[col]$b[val]" != "" && in_array ( $b ["op"], $this->operators )) {
				echo "<div><select name='where[$i][col]'><option value=''>" . lang ( 23 ) . optionlist ( $t, $b ["col"], true ) . "</select>", html_select ( "where[$i][op]", $this->operators, $b ["op"] ), "<input name='where[$i][val]' value='" . h ( $b ["val"] ) . "'></div>\n";
				$i ++;
			}
		}
		echo "<div><select name='where[$i][col]' onchange='selectAddRow(this);'><option value=''>" . lang ( 23 ) . optionlist ( $t, null, true ) . "</select>", html_select ( "where[$i][op]", $this->operators ), "<input name='where[$i][val]'></div>\n", "</div></fieldset>\n";
	}
	function selectOrderPrint($Ja, $t, $w) {
		print_fieldset ( "sort", lang ( 24 ), $Ja );
		$i = 0;
		foreach ( ( array ) $_GET ["order"] as $e => $b ) {
			if (isset ( $t [$b] )) {
				echo "<div><select name='order[$i]'><option>" . optionlist ( $t, $b, true ) . "</select>", checkbox ( "desc[$i]", 1, isset ( $_GET ["desc"] [$e] ), lang ( 25 ) ) . "</div>\n";
				$i ++;
			}
		}
		echo "<div><select name='order[$i]' onchange='selectAddRow(this);'><option>" . optionlist ( $t, null, true ) . "</select>", checkbox ( "desc[$i]", 1, 0, lang ( 25 ) ) . "</div>\n", "</div></fieldset>\n";
	}
	function selectLimitPrint($oa) {
		echo "<fieldset><legend>" . lang ( 26 ) . "</legend><div>";
		echo "<input name='limit' size='3' value='" . h ( $oa ) . "'>", "</div></fieldset>\n";
	}
	function selectLengthPrint($Oa) {
		if (isset ( $Oa )) {
			echo "<fieldset><legend>" . lang ( 27 ) . "</legend><div>", '<input name="text_length" size="3" value="' . h ( $Oa ) . '">', "</div></fieldset>\n";
		}
	}
	function selectActionPrint() {
		echo "<fieldset><legend>" . lang ( 28 ) . "</legend><div>", "<input type='submit' value='" . lang ( 19 ) . "'>", "</div></fieldset>\n";
	}
	function selectEmailPrint($Fe, $t) {
	}
	function selectColumnsProcess($t, $w) {
		$v = array ();
		$ga = array ();
		foreach ( ( array ) $_GET ["columns"] as $e => $b ) {
			if ($b ["fun"] == "count" || (isset ( $t [$b ["col"]] ) && (! $b ["fun"] || in_array ( $b ["fun"], $this->functions ) || in_array ( $b ["fun"], $this->grouping )))) {
				$v [$e] = apply_sql_function ( $b ["fun"], (isset ( $t [$b ["col"]] ) ? idf_escape ( $b ["col"] ) : "*") );
				if (! in_array ( $b ["fun"], $this->grouping )) {
					$ga [] = $v [$e];
				}
			}
		}
		return array ($v, $ga );
	}
	function selectSearchProcess($l, $w) {
		global $d;
		$g = array ();
		foreach ( $w as $i => $s ) {
			if ($s ["type"] == "FULLTEXT" && $_GET ["fulltext"] [$i] != "") {
				$g [] = "MATCH (" . implode ( ", ", array_map ( 'idf_escape', $s ["columns"] ) ) . ") AGAINST (" . $d->quote ( $_GET ["fulltext"] [$i] ) . (isset ( $_GET ["boolean"] [$i] ) ? " IN BOOLEAN MODE" : "") . ")";
			}
		}
		foreach ( ( array ) $_GET ["where"] as $b ) {
			if ("$b[col]$b[val]" != "" && in_array ( $b ["op"], $this->operators )) {
				$cb = process_length ( $b ["val"] );
				$Fc = " $b[op]" . (ereg ( 'NULL$', $b ["op"] ) ? "" : (ereg ( 'IN$', $b ["op"] ) ? " (" . ($cb != "" ? $cb : "NULL") . ")" : " " . $this->processInput ( $l [$b ["col"]], $b ["val"] )));
				if ($b ["col"] != "") {
					$g [] = idf_escape ( $b ["col"] ) . $Fc;
				} else {
					$Ta = array ();
					foreach ( $l as $h => $c ) {
						if (is_numeric ( $b ["val"] ) || ! ereg ( 'int|float|double|decimal', $c ["type"] )) {
							$h = idf_escape ( $h );
							$Ta [] = (ereg ( 'char|text|enum|set', $c ["type"] ) && ! ereg ( '^utf8', $c ["collation"] ) ? "CONVERT($h USING utf8)" : $h);
						}
					}
					$g [] = ($Ta ? "(" . implode ( "$Fc OR ", $Ta ) . "$Fc)" : "0");
				}
			}
		}
		return $g;
	}
	function selectOrderProcess($l, $w) {
		$g = array ();
		foreach ( ( array ) $_GET ["order"] as $e => $b ) {
			if (isset ( $l [$b] ) || preg_match ( '~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()`(?:[^`]|``)+`\\)|COUNT\\(\\*\\))$~', $b )) {
				$g [] = idf_escape ( $b ) . (isset ( $_GET ["desc"] [$e] ) ? " DESC" : "");
			}
		}
		return $g;
	}
	function selectLimitProcess() {
		return (isset ( $_GET ["limit"] ) ? $_GET ["limit"] : "30");
	}
	function selectLengthProcess() {
		return (isset ( $_GET ["text_length"] ) ? $_GET ["text_length"] : "100");
	}
	function selectEmailProcess($D, $ye) {
		return false;
	}
	function messageQuery($m) {
		restart_session ();
		$T = "sql-" . count ( $_SESSION ["messages"] );
		$_SESSION ["history"] [$_GET ["server"]] [DB] [] = (strlen ( $m ) > 1e6 ? ereg_replace ( '[\x80-\xFF]+$', '', substr ( $m, 0, 1e6 ) ) . "\n..." : $m);
		return " <a href='#$T' onclick=\"return !toggle('$T');\">" . lang ( 29 ) . "</a><div id='$T' class='hidden'><pre class='jush-sql'>" . shorten_utf8 ( $m, 1000 ) . '</pre><a href="' . h ( ME . 'sql=&history=' . (count ( $_SESSION ["history"] [$_GET ["server"]] [DB] ) - 1) ) . '">' . lang ( 17 ) . '</a></div>';
	}
	function editFunctions($c) {
		$g = array ("" );
		if (ereg ( 'char|date|time', $c ["type"] )) {
			$g = (ereg ( 'char', $c ["type"] ) ? array ("", "md5", "sha1", "password", "encrypt", "uuid" ) : array ("", "now" ));
		}
		if (! isset ( $_GET ["call"] ) && (isset ( $_GET ["select"] ) || where ( $_GET ))) {
			if (ereg ( 'int|float|double|decimal', $c ["type"] )) {
				$g = array ("", "+", "-" );
			}
			if (ereg ( 'date', $c ["type"] )) {
				$g [] = "+ interval";
				$g [] = "- interval";
			}
			if (ereg ( 'time', $c ["type"] )) {
				$g [] = "addtime";
				$g [] = "subtime";
			}
			if (ereg ( 'char|text', $c ["type"] )) {
				$g [] = "concat";
			}
		}
		if ($c ["null"]) {
			array_unshift ( $g, "NULL" );
		}
		return $g;
	}
	function editInput($n, $c, $hb, $q) {
		if ($c ["type"] == "enum") {
			return ($c ["null"] ? "<label><input type='radio'$hb value=''" . (isset ( $q ) || isset ( $_GET ["select"] ) ? "" : " checked") . "><em>NULL</em></label> " : "") . "<input type='radio'$hb value='0'" . ($q === 0 ? " checked" : "") . ">";
		}
		return "";
	}
	function processInput($c, $q, $_ = "") {
		global $d;
		$h = $c ["field"];
		$g = $d->quote ( $q );
		if (ereg ( '^(now|uuid)$', $_ )) {
			$g = "$_()";
		} elseif (ereg ( '^[+-]$', $_ )) {
			$g = idf_escape ( $h ) . " $_ $g";
		} elseif (ereg ( '^[+-] interval$', $_ )) {
			$g = idf_escape ( $h ) . " $_ " . (preg_match ( "~^([0-9]+|'[0-9.: -]') [A-Z_]+$~i", $q ) ? $q : $g);
		} elseif (ereg ( '^(addtime|subtime|concat)$', $_ )) {
			$g = "$_(" . idf_escape ( $h ) . ", $g)";
		} elseif (ereg ( '^(md5|sha1|password|encrypt)$', $_ )) {
			$g = "$_($g)";
		}
		return $g;
	}
	function dumpOutput($v) {
		$g = array ('text' => lang ( 30 ), 'file' => lang ( 31 ) );
		if (function_exists ( 'gzencode' )) {
			$g ['gz'] = 'gzip';
		}
		if (function_exists ( 'bzcompress' )) {
			$g ['bz2'] = 'bzip2';
		}
		return html_select ( "output", $g, "text", $v );
	}
	function dumpFormat($v) {
		return html_select ( "format", array ('sql' => 'SQL', 'csv' => 'CSV' ), "sql", $v );
	}
	function navigation($ac) {
		global $qb, $d;
		echo '<h1>
<a href="http://www.adminer.org/" id="h1">', $this->name (), '</a>
<span class="version">', $qb, '</span>
<a href="http://www.adminer.org/#download" id="version">', (version_compare ( $qb, $_COOKIE ["adminer_version"] ) < 0 ? h ( $_COOKIE ["adminer_version"] ) : ""), '</a>
</h1>
';
		if ($ac != "auth") {
			$Ea = get_databases ();
			echo '<form action="" method="post">
<p class="logout">
<a href="', h ( ME ), 'sql=">', bold ( lang ( 29 ), isset ( $_GET ["sql"] ) ), '</a>
<a href="', h ( ME ), 'dump=', urlencode ( isset ( $_GET ["table"] ) ? $_GET ["table"] : $_GET ["select"] ), '">', bold ( lang ( 32 ), isset ( $_GET ["dump"] ) ), '</a>
<input type="hidden" name="token" value="', $_SESSION ["tokens"] [$_GET ["server"]], '">
<input type="submit" name="logout" value="', lang ( 33 ), '">
</p>
</form>
<form action="">
<p>
', SID_FORM;
			if ($_GET ["server"] != "") {
				echo '<input type="hidden" name="server" value="', h ( $_GET ["server"] ), '">';
			}
			echo ($Ea ? html_select ( "db", array ("" => "(" . lang ( 34 ) . ")" ) + $Ea, DB, "this.form.submit();" ) : '<input name="db" value="' . h ( DB ) . '">');
			if (isset ( $_GET ["sql"] )) {
				echo '<input type="hidden" name="sql" value="">';
			}
			if (isset ( $_GET ["schema"] )) {
				echo '<input type="hidden" name="schema" value="">';
			}
			if (isset ( $_GET ["dump"] )) {
				echo '<input type="hidden" name="dump" value="">';
			}
			echo ' <input type="submit" value="', lang ( 6 ), '"', ($Ea ? " class='hidden'" : ""), '>
</p>
</form>
';
			if ($ac != "db" && DB != "" && $d->select_db ( DB )) {
				$gc = tables_list ();
				if (! $gc) {
					echo "<p class='message'>" . lang ( 4 ) . "\n";
				} else {
					$this->tablesPrint ( $gc );
				}
				echo '<p><a href="' . h ( ME ) . 'create=">' . bold ( lang ( 35 ), $_GET ["create"] === "" ) . "</a>\n";
			}
		}
	}
	function tablesPrint($gc) {
		echo "<p id='tables'>\n";
		foreach ( $gc as $n ) {
			echo '<a href="' . h ( ME ) . 'select=' . urlencode ( $n ) . '">' . bold ( lang ( 36 ), $_GET ["select"] == $n ) . '</a> ', '<a href="' . h ( ME ) . 'table=' . urlencode ( $n ) . '">' . bold ( $this->tableName ( array ("Name" => $n ) ), $_GET ["table"] == $n ) . "</a><br>\n";
		}
	}
}
$p = (function_exists ( 'adminer_object' ) ? adminer_object () : new Adminer ());
function page_header($wd, $o = "", $nc = array(), $nd = "") {
	global $qa, $qb, $p, $d;
	header ( "Content-Type: text/html; charset=utf-8" );
	header ( "X-Frame-Options: deny" );
	$Ld = $wd . ($nd != "" ? ": " . h ( $nd ) : "");
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="', $qa, '">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>', $Ld . ($_GET ["server"] != "" && $_GET ["server"] != "localhost" ? h ( " - $_GET[server]" ) : "") . " - " . $p->name (), '</title>
<link rel="shortcut icon" type="image/x-icon" href="', h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=favicon.ico&amp;version=2.3.2", '">
<link rel="stylesheet" type="text/css" href="', h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=default.css&amp;version=2.3.2";
	echo '">
';
	if (file_exists ( "adminer.css" )) {
		echo '<link rel="stylesheet" type="text/css" href="adminer.css">
';
	}
	echo '
<body onload="bodyLoad(\'', substr ( $d->server_info, 0, 3 ), '\');', (isset ( $_COOKIE ["adminer_version"] ) ? "" : " verifyVersion();"), '">
<script type="text/javascript" src="', h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=functions.js&amp;version=2.3.2", '"></script>

<div id="content">
';
	if (isset ( $nc )) {
		$y = substr ( preg_replace ( '~db=[^&]*&~', '', ME ), 0, - 1 );
		echo '<p id="breadcrumb"><a href="' . ($y != "" ? h ( $y ) : ".") . '">' . (isset ( $_GET ["server"] ) ? h ( $_GET ["server"] ) : lang ( 7 )) . '</a> &raquo; ';
		if (is_array ( $nc )) {
			if (DB != "") {
				echo '<a href="' . h ( substr ( ME, 0, - 1 ) ) . '">' . h ( DB ) . '</a> &raquo; ';
			}
			foreach ( $nc as $e => $b ) {
				$wb = (is_array ( $b ) ? $b [1] : $b);
				if ($wb != "") {
					echo '<a href="' . h ( ME . "$e=" ) . urlencode ( is_array ( $b ) ? $b [0] : $b ) . '">' . h ( $wb ) . '</a> &raquo; ';
				}
			}
		}
		echo "$wd\n";
	}
	echo "<h2>$Ld</h2>\n";
	restart_session ();
	if ($_SESSION ["messages"]) {
		echo "<div class='message'>" . implode ( "</div>\n<div class='message'>", $_SESSION ["messages"] ) . "</div>\n";
		$_SESSION ["messages"] = array ();
	}
	if (! $_POST && ! isset ( $_SESSION ["passwords"] )) {
		$_SESSION ["passwords"] = array ();
	}
	$Ea = &$_SESSION ["databases"] [$_GET ["server"]];
	if (DB != "" && $Ea && ! in_array ( DB, $Ea, true )) {
		$Ea = null;
	}
	if ($o) {
		echo "<div class='error'>$o</div>\n";
	}
}
function page_footer($ac = false) {
	global $p;
	echo '</div>

';
	switch_lang ();
	echo '<div id="menu">
';
	$p->navigation ( $ac );
	echo '</div>
';
}
if (extension_loaded ( 'pdo' )) {
	class Min_PDO extends PDO {
		var $_result, $server_info, $affected_rows, $error;
		function __construct() {
		}
		function dsn($ae, $A, $ya) {
			set_exception_handler ( 'auth_error' );
			parent::__construct ( $ae, $A, $ya );
			restore_exception_handler ();
			$this->setAttribute ( 13, array ('Min_PDOStatement' ) );
		}
		function select_db($ic) {
			return $this->query ( "USE " . idf_escape ( $ic ) );
		}
		function query($m, $Jb = false) {
			$f = parent::query ( $m );
			if (! $f) {
				$_e = $this->errorInfo ();
				$this->error = $_e [2];
				return false;
			}
			$this->store_result ( $f );
			return $f;
		}
		function multi_query($m) {
			return $this->_result = $this->query ( $m );
		}
		function store_result($f = null) {
			if (! $f) {
				$f = $this->_result;
			}
			if ($f->columnCount ()) {
				$f->num_rows = $f->rowCount ();
				return $f;
			}
			$this->affected_rows = $f->rowCount ();
			return true;
		}
		function next_result() {
			return $this->_result->nextRowset ();
		}
		function result($f, $c = 0) {
			if (! $f) {
				return false;
			}
			$a = $f->fetch ();
			return $a [$c];
		}
	}
	class Min_PDOStatement extends PDOStatement {
		var $_offset = 0, $num_rows;
		function fetch_assoc() {
			return $this->fetch ( 2 );
		}
		function fetch_row() {
			return $this->fetch ( 3 );
		}
		function fetch_field() {
			$a = ( object ) $this->getColumnMeta ( $this->_offset ++ );
			$a->orgtable = $a->table;
			$a->orgname = $a->name;
			$a->charsetnr = (in_array ( "blob", $a->flags ) ? 63 : 0);
			return $a;
		}
	}
}
if (extension_loaded ( "mysqli" )) {
	class Min_DB extends MySQLi {
		var $extension = "MySQLi";
		function Min_DB() {
			parent::init ();
		}
		function connect($K, $A, $ya) {
			list ( $ze, $ec ) = explode ( ":", $K, 2 );
			return @$this->real_connect ( ($K != "" ? $ze : ini_get ( "mysqli.default_host" )), ("$K$A" != "" ? $A : ini_get ( "mysqli.default_user" )), ("$K$A$ya" != "" ? $ya : ini_get ( "mysqli.default_pw" )), null, (is_numeric ( $ec ) ? $ec : ini_get ( "mysqli.default_port" )), (! is_numeric ( $ec ) ? $ec : null) );
		}
		function result($f, $c = 0) {
			if (! $f) {
				return false;
			}
			$a = $f->fetch_array ();
			return $a [$c];
		}
		function quote($P) {
			return "'" . $this->escape_string ( $P ) . "'";
		}
	}
} elseif (extension_loaded ( "mysql" )) {
	class Min_DB {
		var $extension = "MySQL", $_link, $_result, $server_info, $affected_rows, $error;
		function connect($K, $A, $ya) {
			$this->_link = @mysql_connect ( ($K != "" ? $K : ini_get ( "mysql.default_host" )), ("$K$A" != "" ? $A : ini_get ( "mysql.default_user" )), ("$K$A$ya" != "" ? $ya : ini_get ( "mysql.default_password" )), true, 131072 );
			if ($this->_link) {
				$this->server_info = mysql_get_server_info ( $this->_link );
			} else {
				$this->error = mysql_error ();
			}
			return ( bool ) $this->_link;
		}
		function quote($P) {
			return "'" . mysql_real_escape_string ( $P, $this->_link ) . "'";
		}
		function select_db($ic) {
			return mysql_select_db ( $ic, $this->_link );
		}
		function query($m, $Jb = false) {
			$f = @($Jb ? mysql_unbuffered_query ( $m, $this->_link ) : mysql_query ( $m, $this->_link ));
			if (! $f) {
				$this->error = mysql_error ( $this->_link );
				return false;
			}
			if ($f === true) {
				$this->affected_rows = mysql_affected_rows ( $this->_link );
				$this->info = mysql_info ( $this->_link );
				return true;
			}
			return new Min_Result ( $f );
		}
		function multi_query($m) {
			return $this->_result = $this->query ( $m );
		}
		function store_result() {
			return $this->_result;
		}
		function next_result() {
			return false;
		}
		function result($f, $c = 0) {
			if (! $f) {
				return false;
			}
			return mysql_result ( $f->_result, 0, $c );
		}
	}
	class Min_Result {
		var $_result, $_offset = 0, $num_rows;
		function Min_Result($f) {
			$this->_result = $f;
			$this->num_rows = mysql_num_rows ( $f );
		}
		function fetch_assoc() {
			return mysql_fetch_assoc ( $this->_result );
		}
		function fetch_row() {
			return mysql_fetch_row ( $this->_result );
		}
		function fetch_field() {
			$a = mysql_fetch_field ( $this->_result, $this->_offset ++ );
			$a->orgtable = $a->table;
			$a->orgname = $a->name;
			$a->charsetnr = ($a->blob ? 63 : 0);
			return $a;
		}
		function __destruct() {
			mysql_free_result ( $this->_result );
		}
	}
} elseif (extension_loaded ( "pdo_mysql" )) {
	class Min_DB extends Min_PDO {
		var $extension = "PDO_MySQL";
		function connect($K, $A, $ya) {
			$this->dsn ( "mysql:host=" . str_replace ( ":", ";unix_socket=", preg_replace ( '~:([0-9])~', ';port=\\1', $K ) ), $A, $ya );
			$this->server_info = $this->result ( $this->query ( "SELECT VERSION()" ) );
			return true;
		}
		function query($m, $Jb = false) {
			$this->setAttribute ( 1000, ! $Jb );
			return parent::query ( $m, $Jb );
		}
	}
} else {
	page_header ( lang ( 37 ), lang ( 38, 'MySQLi, MySQL, PDO_MySQL' ), null );
	page_footer ( "auth" );
	exit ();
}
function connect() {
	global $p;
	$d = new Min_DB ();
	$sc = $p->credentials ();
	if ($d->connect ( $sc [0], $sc [1], $sc [2] )) {
		$d->query ( "SET SQL_QUOTE_SHOW_CREATE=1" );
		$d->query ( "SET NAMES utf8" );
		return $d;
	}
	return $d->error;
}
function get_databases($we = true) {
	$g = &$_SESSION ["databases"] [$_GET ["server"]];
	if (! isset ( $g )) {
		restart_session ();
		$g = get_vals ( "SHOW DATABASES" );
		if ($we) {
			ob_flush ();
			flush ();
		}
	}
	return $g;
}
function db_collation($x, $N) {
	global $d;
	$g = null;
	$f = $d->query ( "SHOW CREATE DATABASE " . idf_escape ( $x ) );
	if ($f) {
		$aa = $d->result ( $f, 1 );
		if (preg_match ( '~ COLLATE ([^ ]+)~', $aa, $k )) {
			$g = $k [1];
		} elseif (preg_match ( '~ CHARACTER SET ([^ ]+)~', $aa, $k )) {
			$g = $N [$k [1]] [0];
		}
	}
	return $g;
}
function engines() {
	global $d;
	$g = array ();
	$f = $d->query ( "SHOW ENGINES" );
	while ( $a = $f->fetch_assoc () ) {
		if (ereg ( "YES|DEFAULT", $a ["Support"] )) {
			$g [] = $a ["Engine"];
		}
	}
	return $g;
}
function tables_list() {
	return get_vals ( "SHOW TABLES" );
}
function table_status($h = "") {
	global $d;
	$g = array ();
	$f = $d->query ( "SHOW TABLE STATUS" . ($h != "" ? " LIKE " . $d->quote ( addcslashes ( $h, "%_" ) ) : "") );
	while ( $a = $f->fetch_assoc () ) {
		if ($a ["Engine"] == "InnoDB") {
			$a ["Comment"] = preg_replace ( '~(?:(.+); )?InnoDB free: .*~', '\\1', $a ["Comment"] );
		}
		if ($h != "") {
			return $a;
		}
		$g [$a ["Name"]] = $a;
	}
	return $g;
}
function table_status_referencable() {
	$g = array ();
	foreach ( table_status () as $h => $a ) {
		if ($a ["Engine"] == "InnoDB") {
			$g [$h] = $a;
		}
	}
	return $g;
}
function fields($n) {
	global $d;
	$g = array ();
	$f = $d->query ( "SHOW FULL COLUMNS FROM " . idf_escape ( $n ) );
	if ($f) {
		while ( $a = $f->fetch_assoc () ) {
			preg_match ( '~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~', $a ["Type"], $k );
			$g [$a ["Field"]] = array ("field" => $a ["Field"], "full_type" => $a ["Type"], "type" => $k [1], "length" => $k [2], "unsigned" => ltrim ( $k [3] . $k [4] ), "default" => ($a ["Default"] != "" || ereg ( "char", $k [1] ) ? $a ["Default"] : null), "null" => ($a ["Null"] == "YES"), "auto_increment" => ($a ["Extra"] == "auto_increment"), "on_update" => (eregi ( '^on update (.+)', $a ["Extra"], $k ) ? $k [1] : ""), "collation" => $a ["Collation"], "privileges" => array_flip ( explode ( ",", $a ["Privileges"] ) ), "comment" => $a ["Comment"], "primary" => ($a ["Key"] == "PRI") );
		}
	}
	return $g;
}
function indexes($n, $pa = null) {
	global $d;
	if (! is_object ( $pa )) {
		$pa = $d;
	}
	$g = array ();
	$f = $pa->query ( "SHOW INDEX FROM " . idf_escape ( $n ) );
	if ($f) {
		while ( $a = $f->fetch_assoc () ) {
			$g [$a ["Key_name"]] ["type"] = ($a ["Key_name"] == "PRIMARY" ? "PRIMARY" : ($a ["Index_type"] == "FULLTEXT" ? "FULLTEXT" : ($a ["Non_unique"] ? "INDEX" : "UNIQUE")));
			$g [$a ["Key_name"]] ["columns"] [$a ["Seq_in_index"]] = $a ["Column_name"];
			$g [$a ["Key_name"]] ["lengths"] [$a ["Seq_in_index"]] = $a ["Sub_part"];
		}
	}
	return $g;
}
function foreign_keys($n) {
	global $d, $Wa;
	static $_a = '(?:[^`]|``)+';
	$g = array ();
	$f = $d->query ( "SHOW CREATE TABLE " . idf_escape ( $n ) );
	if ($f) {
		$De = $d->result ( $f, 1 );
		preg_match_all ( "~CONSTRAINT `($_a)` FOREIGN KEY \\(((?:`$_a`,? ?)+)\\) REFERENCES `($_a)`(?:\\.`($_a)`)? \\(((?:`$_a`,? ?)+)\\)(?: ON DELETE (" . implode ( "|", $Wa ) . "))?(?: ON UPDATE (" . implode ( "|", $Wa ) . "))?~", $De, $I, PREG_SET_ORDER );
		foreach ( $I as $k ) {
			preg_match_all ( "~`($_a)`~", $k [2], $ca );
			preg_match_all ( "~`($_a)`~", $k [5], $Qa );
			$g [$k [1]] = array ("db" => idf_unescape ( $k [4] != "" ? $k [3] : $k [4] ), "table" => idf_unescape ( $k [4] != "" ? $k [4] : $k [3] ), "source" => array_map ( 'idf_unescape', $ca [1] ), "target" => array_map ( 'idf_unescape', $Qa [1] ), "on_delete" => $k [6], "on_update" => $k [7] );
		}
	}
	return $g;
}
function view($h) {
	global $d;
	return array ("select" => preg_replace ( '~^(?:[^`]|`[^`]*`)* AS ~U', '', $d->result ( $d->query ( "SHOW CREATE VIEW " . idf_escape ( $h ) ), 1 ) ) );
}
function collations() {
	global $d;
	$g = array ();
	$f = $d->query ( "SHOW COLLATION" );
	while ( $a = $f->fetch_assoc () ) {
		$g [$a ["Charset"]] [] = $a ["Collation"];
	}
	ksort ( $g );
	foreach ( $g as $e => $b ) {
		sort ( $g [$e] );
	}
	return $g;
}
function information_schema($x) {
	global $d;
	return ($d->server_info >= 5 && $x == "information_schema");
}
function error() {
	global $d;
	return h ( preg_replace ( '~^You have an error.*syntax to use~U', "Syntax error", $d->error ) );
}
function exact_value($b) {
	global $d;
	return "BINARY " . $d->quote ( $b );
}
$ra = array ();
$jc = array ();
foreach ( array (lang ( 39 ) => array ("tinyint" => 3, "smallint" => 5, "mediumint" => 8, "int" => 10, "bigint" => 20, "decimal" => 66, "float" => 12, "double" => 21 ), lang ( 40 ) => array ("date" => 10, "datetime" => 19, "timestamp" => 19, "time" => 10, "year" => 4 ), lang ( 41 ) => array ("char" => 255, "varchar" => 65535, "tinytext" => 255, "text" => 65535, "mediumtext" => 16777215, "longtext" => 4294967295 ), lang ( 42 ) => array ("binary" => 255, "varbinary" => 65535, "tinyblob" => 255, "blob" => 65535, "mediumblob" => 16777215, "longblob" => 4294967295 ), lang ( 43 ) => array ("enum" => 65535, "set" => 64 ) ) as $e => $b ) {
	$ra += $b;
	$jc [$e] = array_keys ( $b );
}
$sb = array ("unsigned", "zerofill", "unsigned zerofill" );
function int32($G) {
	while ( $G >= 2147483648 ) {
		$G -= 4294967296;
	}
	while ( $G <= - 2147483649 ) {
		$G += 4294967296;
	}
	return ( int ) $G;
}
function long2str($r, $hc) {
	$C = '';
	foreach ( $r as $b ) {
		$C .= pack ( 'V', $b );
	}
	if ($hc) {
		return substr ( $C, 0, end ( $r ) );
	}
	return $C;
}
function str2long($C, $hc) {
	$r = array_values ( unpack ( 'V*', str_pad ( $C, 4 * ceil ( strlen ( $C ) / 4 ), "\0" ) ) );
	if ($hc) {
		$r [] = strlen ( $C );
	}
	return $r;
}
function xxtea_mx($S, $R, $Z, $fa) {
	return int32 ( (($S >> 5 & 0x7FFFFFF) ^ $R << 2) + (($R >> 3 & 0x1FFFFFFF) ^ $S << 4) ) ^ int32 ( ($Z ^ $R) + ($fa ^ $S) );
}
function encrypt_string($yb, $e) {
	if ($yb == "") {
		return "";
	}
	$e = array_values ( unpack ( "V*", pack ( "H*", md5 ( $e ) ) ) );
	$r = str2long ( $yb, true );
	$G = count ( $r ) - 1;
	$S = $r [$G];
	$R = $r [0];
	$ha = floor ( 6 + 52 / ($G + 1) );
	$Z = 0;
	while ( $ha -- > 0 ) {
		$Z = int32 ( $Z + 0x9E3779B9 );
		$Ib = $Z >> 2 & 3;
		for($W = 0; $W < $G; $W ++) {
			$R = $r [$W + 1];
			$ab = xxtea_mx ( $S, $R, $Z, $e [$W & 3 ^ $Ib] );
			$S = int32 ( $r [$W] + $ab );
			$r [$W] = $S;
		}
		$R = $r [0];
		$ab = xxtea_mx ( $S, $R, $Z, $e [$W & 3 ^ $Ib] );
		$S = int32 ( $r [$G] + $ab );
		$r [$G] = $S;
	}
	return long2str ( $r, false );
}
function decrypt_string($yb, $e) {
	if ($yb == "") {
		return "";
	}
	$e = array_values ( unpack ( "V*", pack ( "H*", md5 ( $e ) ) ) );
	$r = str2long ( $yb, false );
	$G = count ( $r ) - 1;
	$S = $r [$G];
	$R = $r [0];
	$ha = floor ( 6 + 52 / ($G + 1) );
	$Z = int32 ( $ha * 0x9E3779B9 );
	while ( $Z ) {
		$Ib = $Z >> 2 & 3;
		for($W = $G; $W > 0; $W --) {
			$S = $r [$W - 1];
			$ab = xxtea_mx ( $S, $R, $Z, $e [$W & 3 ^ $Ib] );
			$R = int32 ( $r [$W] - $ab );
			$r [$W] = $R;
		}
		$S = $r [$G];
		$ab = xxtea_mx ( $S, $R, $Z, $e [$W & 3 ^ $Ib] );
		$R = int32 ( $r [0] - $ab );
		$r [0] = $R;
		$Z = int32 ( $Z - 0x9E3779B9 );
	}
	return long2str ( $r, true );
}
if (isset ( $_POST ["server"] )) {
	session_regenerate_id ();
	$_SESSION ["usernames"] [$_POST ["server"]] = $_POST ["username"];
	$_SESSION ["passwords"] [$_POST ["server"]] = $_POST ["password"];
	if ($_POST ["permanent"]) {
		cookie ( "adminer_permanent", base64_encode ( $_POST ["server"] ) . ":" . base64_encode ( $_POST ["username"] ) . ":" . base64_encode ( encrypt_string ( $_POST ["password"], $p->permanentLogin () ) ) );
	}
	if (count ( $_POST ) == ($_POST ["permanent"] ? 4 : 3)) {
		$z = (( string ) $_GET ["server"] === $_POST ["server"] ? remove_from_uri ( session_name () ) : preg_replace ( '~^([^?]*).*~', '\\1', ME ) . ($_POST ["server"] != "" ? '?server=' . urlencode ( $_POST ["server"] ) : ''));
		if (SID_FORM) {
			$Na = strpos ( $z, '?' );
			$z = ($Na ? substr_replace ( $z, SID . "&", $Na + 1, 0 ) : "$z?" . SID);
		}
		redirect ( $z );
	}
	$_GET ["server"] = $_POST ["server"];
} elseif ($_POST ["logout"]) {
	$E = $_SESSION ["tokens"] [$_GET ["server"]];
	if ($E && $_POST ["token"] != $E) {
		page_header ( lang ( 33 ), lang ( 44 ) );
		page_footer ( "db" );
		exit ();
	} else {
		foreach ( array ("usernames", "passwords", "databases", "tokens", "history" ) as $b ) {
			unset ( $_SESSION [$b] [$_GET ["server"]] );
		}
		if (! isset ( $_SESSION ["passwords"] )) {
			$_SESSION ["passwords"] = array ();
		}
		cookie ( "adminer_permanent", "" );
		redirect ( substr ( preg_replace ( '~db=[^&]*&~', '', ME ), 0, - 1 ), lang ( 45 ) );
	}
} elseif ($_COOKIE ["adminer_permanent"] && ! isset ( $_SESSION ["usernames"] [$_GET ["server"]] )) {
	list ( $K, $A, $pe ) = array_map ( 'base64_decode', explode ( ":", $_COOKIE ["adminer_permanent"] ) );
	if (($_GET ["server"] == "" && ! $_POST) || $K == $_GET ["server"]) {
		session_regenerate_id ();
		$_SESSION ["usernames"] [$K] = $A;
		$_SESSION ["passwords"] [$K] = decrypt_string ( $pe, $p->permanentLogin () );
		if ($K != $_GET ["server"]) {
			redirect ( preg_replace ( '~^([^?]*).*~', '\\1', ME ) . '?server=' . urlencode ( $K ) );
		}
	}
}
function auth_error($Ed = null) {
	global $d, $p;
	$fc = session_name ();
	$A = $_SESSION ["usernames"] [$_GET ["server"]];
	unset ( $_SESSION ["usernames"] [$_GET ["server"]] );
	page_header ( lang ( 10 ), (isset ( $A ) ? h ( $Ed ? $Ed->getMessage () : (is_string ( $d ) ? $d : lang ( 46 )) ) : (! $_COOKIE [$fc] && $_GET [$fc] && ini_get ( "session.use_only_cookies" ) ? lang ( 47 ) : (($_COOKIE [$fc] || $_GET [$fc]) && ! isset ( $_SESSION ["passwords"] ) ? lang ( 48 ) : ""))), null );
	echo "<form action='' method='post'>\n";
	$p->loginForm ( $A );
	echo "<div>";
	hidden_fields ( $_POST, array ("server", "username", "password" ) );
	echo "</div>\n", "</form>\n";
	page_footer ( "auth" );
}
$A = &$_SESSION ["usernames"] [$_GET ["server"]];
if (! isset ( $A )) {
	$A = $_GET ["username"];
}
$d = (isset ( $A ) ? connect () : '');
if (is_string ( $d ) || ! $p->login ( $A, $_SESSION ["passwords"] [$_GET ["server"]] )) {
	auth_error ();
	exit ();
}
unset ( $A );
if (! $_SESSION ["tokens"] [$_GET ["server"]]) {
	$_SESSION ["tokens"] [$_GET ["server"]] = rand ( 1, 1e6 );
}
if (isset ( $_POST ["server"] ) && $_POST ["token"]) {
	$_POST ["token"] = $_SESSION ["tokens"] [$_GET ["server"]];
}
$E = $_SESSION ["tokens"] [$_GET ["server"]];
$o = ($_POST ? ($_POST ["token"] == $E ? "" : lang ( 44 )) : ($_SERVER ["REQUEST_METHOD"] != "POST" ? "" : lang ( 49, '"post_max_size"' )));
function connect_error() {
	global $d, $qb, $E, $o;
	if (DB != "") {
		page_header ( lang ( 50 ) . ": " . h ( DB ), lang ( 51 ), false );
	} else {
		if ($_POST ["db"] && ! $o) {
			unset ( $_SESSION ["databases"] [$_GET ["server"]] );
			foreach ( $_POST ["db"] as $x ) {
				if (! queries ( "DROP DATABASE " . idf_escape ( $x ) )) {
					break;
				}
			}
			queries_redirect ( substr ( ME, 0, - 1 ), lang ( 52 ), ! $d->error );
		}
		page_header ( lang ( 53 ), $o, null );
		echo "<p>";
		foreach ( array ('database' => lang ( 54 ), 'privileges' => lang ( 55 ), 'processlist' => lang ( 56 ), 'variables' => lang ( 57 ), 'status' => lang ( 58 ) ) as $e => $b ) {
			echo "<a href='" . h ( ME ) . "$e='>$b</a>\n";
		}
		echo "<p>" . lang ( 59, "<b" . ($d->server_info < 4.1 ? " class='binary'" : "") . ">$d->server_info</b>", "<b>$d->extension</b>" ) . "\n", "<p>" . lang ( 60, "<b>" . h ( $d->result ( $d->query ( "SELECT USER()" ) ) ) . "</b>" ) . "\n";
		$Ea = get_databases ();
		if ($Ea) {
			$N = collations ();
			echo "<form action='' method='post'>\n", "<table cellspacing='0' onclick='tableClick(event);'>\n", "<thead><tr><td><input type='hidden' name='token' value='$E'>&nbsp;<th>" . lang ( 50 ) . "<td>" . lang ( 61 ) . "</thead>\n";
			foreach ( $Ea as $x ) {
				$Cd = h ( ME ) . "db=" . urlencode ( $x );
				echo "<tr" . odd () . "><td>" . checkbox ( "db[]", $x, in_array ( $x, ( array ) $_POST ["db"] ) ), "<th><a href='$Cd'>" . h ( $x ) . "</a>", "<td><a href='$Cd&amp;database='>" . nbsp ( db_collation ( $x, $N ) ) . "</a>", "\n";
			}
			echo "</table>\n", "<p><input type='submit' name='drop' value='" . lang ( 62 ) . "' onclick=\"return confirm('" . lang ( 63 ) . " (' + formChecked(this, /db/) + ')');\">\n", "</form>\n";
		}
	}
	page_footer ( "db" );
}
if (isset ( $_GET ["status"] )) {
	$_GET ["variables"] = $_GET ["status"];
}
if (! (DB != "" ? $d->select_db ( DB ) : isset ( $_GET ["sql"] ) || isset ( $_GET ["dump"] ) || isset ( $_GET ["database"] ) || isset ( $_GET ["processlist"] ) || isset ( $_GET ["privileges"] ) || isset ( $_GET ["user"] ) || isset ( $_GET ["variables"] ))) {
	if (DB != "") {
		unset ( $_SESSION ["databases"] [$_GET ["server"]] );
	}
	connect_error ();
	exit ();
}
function select($f, $pa = null) {
	if (! $f->num_rows) {
		echo "<p class='message'>" . lang ( 64 ) . "\n";
	} else {
		echo "<table cellspacing='0' class='nowrap'>\n";
		$Ca = array ();
		$w = array ();
		$t = array ();
		$Bd = array ();
		$ra = array ();
		odd ( '' );
		for($i = 0; $a = $f->fetch_row (); $i ++) {
			if (! $i) {
				echo "<thead><tr>";
				for($M = 0; $M < count ( $a ); $M ++) {
					$c = $f->fetch_field ();
					$da = $c->orgtable;
					$Kb = $c->orgname;
					if ($da != "") {
						if (! isset ( $w [$da] )) {
							$w [$da] = array ();
							foreach ( indexes ( $da, $pa ) as $s ) {
								if ($s ["type"] == "PRIMARY") {
									$w [$da] = array_flip ( $s ["columns"] );
									break;
								}
							}
							$t [$da] = $w [$da];
						}
						if (isset ( $t [$da] [$Kb] )) {
							unset ( $t [$da] [$Kb] );
							$w [$da] [$Kb] = $M;
							$Ca [$M] = $da;
						}
					}
					if ($c->charsetnr == 63) {
						$Bd [$M] = true;
					}
					$ra [$M] = $c->type;
					echo "<th" . ($da != "" || $c->name != $Kb ? " title='" . h ( ($da != "" ? "$da." : "") . $Kb ) . "'" : "") . ">" . h ( $c->name );
				}
				echo "</thead>\n";
			}
			echo "<tr" . odd () . ">";
			foreach ( $a as $e => $b ) {
				if (! isset ( $b )) {
					$b = "<i>NULL</i>";
				} else {
					if ($Bd [$e] && ! is_utf8 ( $b )) {
						$b = "<i>" . lang ( 18, strlen ( $b ) ) . "</i>";
					} elseif ($b == "") {
						$b = "&nbsp;";
					} else {
						$b = h ( $b );
						if ($ra [$e] == 254) {
							$b = "<code>$b</code>";
						}
					}
					if (isset ( $Ca [$e] ) && ! $t [$Ca [$e]]) {
						$y = "edit=" . urlencode ( $Ca [$e] );
						foreach ( $w [$Ca [$e]] as $Ob => $M ) {
							$y .= "&where" . urlencode ( "[" . bracket_escape ( $Ob ) . "]" ) . "=" . urlencode ( $a [$M] );
						}
						$b = "<a href='" . h ( ME . $y ) . "'>$b</a>";
					}
				}
				echo "<td>$b";
			}
		}
		echo "</table>\n";
	}
}
function referencable_primary($ne) {
	$g = array ();
	foreach ( table_status_referencable () as $X => $n ) {
		if ($X != $ne) {
			foreach ( fields ( $X ) as $c ) {
				if ($c ["primary"]) {
					if ($g [$X]) {
						unset ( $g [$X] );
						break;
					}
					$g [$X] = $c;
				}
			}
		}
	}
	return $g;
}
function edit_type($e, $c, $N, $F = array()) {
	global $jc, $sb, $eb;
	echo '<td><select name="', $e, '[type]" class="type" onfocus="lastType = selectValue(this);" onchange="editingTypeChange(this);">', optionlist ( $jc + ($F ? array (lang ( 65 ) => $F ) : array ()), $c ["type"] ), '</select>
<td><input name="', $e, '[length]" value="', h ( $c ["length"] ), '" size="3" onfocus="editingLengthFocus(this);"><td>', "<select name='$e" . "[collation]'" . (ereg ( '(char|text|enum|set)$', $c ["type"] ) ? "" : " class='hidden'") . '><option value="">(' . lang ( 66 ) . ')' . optionlist ( $N, $c ["collation"] ) . '</select>', ($sb ? "<select name='$e" . "[unsigned]'" . (! $c ["type"] || ereg ( '(int|float|double|decimal)$', $c ["type"] ) ? "" : " class='hidden'") . '><option>' . optionlist ( $sb, $c ["unsigned"] ) . '</select> ' : ' ');
}
function process_length($ua) {
	global $Xa;
	return (preg_match ( "~^\\s*(?:$Xa)(?:\\s*,\\s*(?:$Xa))*\\s*\$~", $ua ) && preg_match_all ( "~$Xa~", $ua, $I ) ? implode ( ",", $I [0] ) : preg_replace ( '~[^0-9,+-]~', '', $ua ));
}
function process_type($c, $Db = "COLLATE") {
	global $d, $sb;
	return " $c[type]" . ($c ["length"] != "" && ! ereg ( '^date|time$', $c ["type"] ) ? "(" . process_length ( $c ["length"] ) . ")" : "") . (ereg ( 'int|float|double|decimal', $c ["type"] ) && in_array ( $c ["unsigned"], $sb ) ? " $c[unsigned]" : "") . (ereg ( 'char|text|enum|set', $c ["type"] ) && $c ["collation"] ? " $Db " . $d->quote ( $c ["collation"] ) : "");
}
function process_field($c, $Hb) {
	global $d;
	return idf_escape ( $c ["field"] ) . process_type ( $Hb ) . ($c ["null"] ? " NULL" : " NOT NULL") . (! isset ( $c ["default"] ) ? "" : " DEFAULT " . ($c ["type"] == "timestamp" && eregi ( "^CURRENT_TIMESTAMP$", $c ["default"] ) ? $c ["default"] : $d->quote ( $c ["default"] ))) . ($c ["on_update"] ? " ON UPDATE $c[on_update]" : "") . " COMMENT " . $d->quote ( $c ["comment"] );
}
function type_class($U) {
	foreach ( array ('char' => 'text', 'date' => 'time|year', 'binary' => 'blob', 'enum' => 'set' ) as $e => $b ) {
		if (ereg ( "$e|$b", $U )) {
			return " class='$e'";
		}
	}
}
function edit_fields($l, $N, $U = "TABLE", $Fd = 0, $F = array()) {
	global $eb;
	$nb = false;
	foreach ( $l as $c ) {
		if ($c ["comment"] != "") {
			$nb = true;
			break;
		}
	}
	echo '<thead><tr class="wrap">
';
	if ($U == "PROCEDURE") {
		echo '<td>&nbsp;';
	}
	echo '<th>', ($U == "TABLE" ? lang ( 67 ) : lang ( 68 )), '<td>', lang ( 69 ), '<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;" onblur="editingLengthBlur(this);"></textarea>
<td>', lang ( 70 ), '<td>', lang ( 71 );
	if ($U == "TABLE") {
		echo '<td>NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym title="', lang ( 72 ), '">A_I</acronym>
<td class="hidden">', lang ( 73 ), '<td', ($nb ? "" : " class='hidden'"), '>', lang ( 74 );
	}
	echo '<td>', "<input type='image' name='add[0]' src='" . h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=plus.gif&amp;version=2.3.2' alt='+' title='" . lang ( 75 ) . "'>", '<script type="text/javascript">row_count = ', count ( $l ), ';</script>
</thead>
';
	foreach ( $l as $i => $c ) {
		$i ++;
		$Dd = (isset ( $_POST ["add"] [$i - 1] ) || (isset ( $c ["field"] ) && ! $_POST ["drop_col"] [$i]));
		echo '<tr', ($Dd ? "" : " style='display: none;'"), '>
';
		if ($U == "PROCEDURE") {
			echo "<td>" . html_select ( "fields[$i][inout]", $eb, $c ["inout"] );
		}
		echo '<th>';
		if ($Dd) {
			echo '<input name="fields[', $i, '][field]" value="', h ( $c ["field"] ), '" onchange="', ($c ["field"] != "" || count ( $l ) > 1 ? "" : "editingAddRow(this, $Fd); "), 'editingNameChange(this);" maxlength="64">';
		}
		echo '<input type="hidden" name="fields[', $i, '][orig]" value="', h ( $c [($_POST ? "orig" : "field")] ), '">
';
		edit_type ( "fields[$i]", $c, $N, $F );
		if ($U == "TABLE") {
			echo '<td>', checkbox ( "fields[$i][null]", 1, $c ["null"] ), '<td><input type="radio" name="auto_increment_col" value="', $i, '"';
			if ($c ["auto_increment"]) {
				echo ' checked';
			}
			echo '>
<td class="hidden">', checkbox ( "fields[$i][has_default]", 1, $c ["has_default"] ), '<input name="fields[', $i, '][default]" value="', h ( $c ["default"] ), '" onchange="this.previousSibling.checked = true;">
<td', ($nb ? "" : " class='hidden'"), '><input name="fields[', $i, '][comment]" value="', h ( $c ["comment"] ), '" maxlength="255">
';
		}
		echo "<td><input type='image' name='add[$i]' src='" . h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=plus.gif&amp;version=2.3.2' alt='+' title='" . lang ( 75 ) . "' onclick='return !editingAddRow(this, $Fd, 1);'>", "&nbsp;<input type='image' name='drop_col[$i]' src='" . h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=cross.gif&amp;version=2.3.2' alt='x' title='" . lang ( 76 ) . "' onclick='return !editingRemoveRow(this);'>", "&nbsp;<input type='image' name='up[$i]' src='" . h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=up.gif&amp;version=2.3.2' alt='^' title='" . lang ( 77 ) . "'>", "&nbsp;<input type='image' name='down[$i]' src='" . h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=down.gif&amp;version=2.3.2' alt='v' title='" . lang ( 78 ) . "'>", "\n";
	}
	return $nb;
}
function process_fields(&$l) {
	ksort ( $l );
	$ja = 0;
	if ($_POST ["up"]) {
		$Nb = 0;
		foreach ( $l as $e => $c ) {
			if (key ( $_POST ["up"] ) == $e) {
				unset ( $l [$e] );
				array_splice ( $l, $Nb, 0, array ($c ) );
				break;
			}
			if (isset ( $c ["field"] )) {
				$Nb = $ja;
			}
			$ja ++;
		}
	}
	if ($_POST ["down"]) {
		$O = false;
		foreach ( $l as $e => $c ) {
			if (isset ( $c ["field"] ) && $O) {
				unset ( $l [key ( $_POST ["down"] )] );
				array_splice ( $l, $ja, 0, array ($O ) );
				break;
			}
			if (key ( $_POST ["down"] ) == $e) {
				$O = $c;
			}
			$ja ++;
		}
	}
	$l = array_values ( $l );
	if ($_POST ["add"]) {
		array_splice ( $l, key ( $_POST ["add"] ), 0, array (array () ) );
	}
}
function normalize_enum($k) {
	return "'" . str_replace ( "'", "''", addcslashes ( stripcslashes ( str_replace ( $k [0] {0} . $k [0] {0}, $k [0] {0}, substr ( $k [0], 1, - 1 ) ) ), '\\' ) ) . "'";
}
function routine($h, $U) {
	global $d, $Xa, $eb, $ra;
	$Kc = array ("bit" => "tinyint", "bool" => "tinyint", "boolean" => "tinyint", "integer" => "int", "double precision" => "float", "real" => "float", "dec" => "decimal", "numeric" => "decimal", "fixed" => "decimal", "national char" => "char", "national varchar" => "varchar" );
	$xd = "(" . implode ( "|", array_keys ( $ra + $Kc ) ) . ")(?:\\s*\\(((?:[^'\")]*|$Xa)+)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";
	$_a = "\\s*(" . ($U == "FUNCTION" ? "" : implode ( "|", $eb )) . ")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$xd";
	$aa = $d->result ( $d->query ( "SHOW CREATE $U " . idf_escape ( $h ) ), 2 );
	preg_match ( "~\\(((?:$_a\\s*,?)*)\\)" . ($U == "FUNCTION" ? "\\s*RETURNS\\s+$xd" : "") . "\\s*(.*)~is", $aa, $k );
	$l = array ();
	preg_match_all ( "~$_a\\s*,?~is", $k [1], $I, PREG_SET_ORDER );
	foreach ( $I as $xa ) {
		$h = str_replace ( "``", "`", $xa [2] ) . $xa [3];
		$Ic = strtolower ( $xa [4] );
		$l [] = array ("field" => $h, "type" => (isset ( $Kc [$Ic] ) ? $Kc [$Ic] : $Ic), "length" => preg_replace_callback ( "~$Xa~s", 'normalize_enum', $xa [5] ), "unsigned" => strtolower ( preg_replace ( '~\\s+~', ' ', trim ( "$xa[7] $xa[6]" ) ) ), "inout" => strtoupper ( $xa [1] ), "collation" => strtolower ( $xa [8] ) );
	}
	if ($U != "FUNCTION") {
		return array ("fields" => $l, "definition" => $k [10] );
	}
	$re = array ("type" => $k [10], "length" => $k [11], "unsigned" => $k [13], "collation" => $k [14] );
	return array ("fields" => $l, "returns" => $re, "definition" => $k [15] );
}
function grant($H, $L, $t, $Pb) {
	if (! $L) {
		return true;
	}
	if ($L == array ("ALL PRIVILEGES", "GRANT OPTION" )) {
		return ($H == "GRANT" ? queries ( "$H ALL PRIVILEGES$Pb WITH GRANT OPTION" ) : queries ( "$H ALL PRIVILEGES$Pb" ) && queries ( "$H GRANT OPTION$Pb" ));
	}
	return queries ( "$H " . preg_replace ( '~(GRANT OPTION)\\([^)]*\\)~', '\\1', implode ( "$t, ", $L ) . $t ) . $Pb );
}
function drop_create($pd, $aa, $z, $od, $le, $ke, $h) {
	if ($_POST ["drop"]) {
		return query_redirect ( $pd, $z, $od, true, ! $_POST ["dropped"] );
	}
	$va = $h != "" && ($_POST ["dropped"] || queries ( $pd ));
	$fe = queries ( $aa );
	if (! queries_redirect ( $z, ($h != "" ? $le : $ke), $fe ) && $va) {
		restart_session ();
		$_SESSION ["messages"] [] = $od;
	}
	return $va;
}
function tar_file($Rc, $Oc) {
	$g = pack ( "a100a8a8a8a12a12", $Rc, 644, 0, 0, decoct ( strlen ( $Oc ) ), decoct ( time () ) );
	$td = 8 * 32;
	for($i = 0; $i < strlen ( $g ); $i ++) {
		$td += ord ( $g {$i} );
	}
	$g .= sprintf ( "%06o", $td ) . "\0 ";
	return $g . str_repeat ( "\0", 512 - strlen ( $g ) ) . $Oc . str_repeat ( "\0", 511 - (strlen ( $Oc ) + 511) % 512 );
}
function dump_triggers($n, $B) {
	global $d;
	if ($_POST ["format"] == "sql" && $B && $d->server_info >= 5) {
		$f = $d->query ( "SHOW TRIGGERS LIKE " . $d->quote ( addcslashes ( $n, "%_" ) ) );
		if ($f->num_rows) {
			$C = "\nDELIMITER ;;\n";
			while ( $a = $f->fetch_assoc () ) {
				$C .= "\n" . ($B == 'CREATE+ALTER' ? "DROP TRIGGER IF EXISTS " . idf_escape ( $a ["Trigger"] ) . ";;\n" : "") . "CREATE TRIGGER " . idf_escape ( $a ["Trigger"] ) . " $a[Timing] $a[Event] ON " . idf_escape ( $a ["Table"] ) . " FOR EACH ROW\n$a[Statement];;\n";
			}
			echo "$C\nDELIMITER ;\n";
		}
	}
}
function dump_table($n, $B, $zc = false) {
	global $d;
	if ($_POST ["format"] == "csv") {
		echo "\xef\xbb\xbf";
		if ($B) {
			dump_csv ( array_keys ( fields ( $n ) ) );
		}
	} elseif ($B) {
		$f = $d->query ( "SHOW CREATE TABLE " . idf_escape ( $n ) );
		if ($f) {
			if ($B == "DROP+CREATE") {
				echo "DROP " . ($zc ? "VIEW" : "TABLE") . " IF EXISTS " . idf_escape ( $n ) . ";\n";
			}
			$aa = $d->result ( $f, 1 );
			echo ($B != "CREATE+ALTER" ? $aa : ($zc ? substr_replace ( $aa, " OR REPLACE", 6, 0 ) : substr_replace ( $aa, " IF NOT EXISTS", 12, 0 ))) . ";\n\n";
		}
		if ($B == "CREATE+ALTER" && ! $zc) {
			$m = "SELECT COLUMN_NAME, COLUMN_DEFAULT, IS_NULLABLE, COLLATION_NAME, COLUMN_TYPE, EXTRA, COLUMN_COMMENT FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = " . $d->quote ( $n ) . " ORDER BY ORDINAL_POSITION";
			echo "DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _column_name, _collation_name, after varchar(64) DEFAULT '';
	DECLARE _column_type, _column_default text;
	DECLARE _is_nullable char(3);
	DECLARE _extra varchar(30);
	DECLARE _column_comment varchar(255);
	DECLARE done, set_after bool DEFAULT 0;
	DECLARE add_columns text DEFAULT '";
			$l = array ();
			$f = $d->query ( $m );
			$Za = "";
			while ( $a = $f->fetch_assoc () ) {
				$sa = $a ["COLUMN_DEFAULT"];
				$a ["default"] = (isset ( $sa ) ? $d->quote ( $sa ) : "NULL");
				$a ["after"] = $d->quote ( $Za );
				$a ["alter"] = escape_string ( idf_escape ( $a ["COLUMN_NAME"] ) . " $a[COLUMN_TYPE]" . ($a ["COLLATION_NAME"] ? " COLLATE $a[COLLATION_NAME]" : "") . (isset ( $sa ) ? " DEFAULT " . ($sa == "CURRENT_TIMESTAMP" ? $sa : $a ["default"]) : "") . ($a ["IS_NULLABLE"] == "YES" ? "" : " NOT NULL") . ($a ["EXTRA"] ? " $a[EXTRA]" : "") . ($a ["COLUMN_COMMENT"] ? " COMMENT " . $d->quote ( $a ["COLUMN_COMMENT"] ) : "") . ($Za ? " AFTER " . idf_escape ( $Za ) : " FIRST") );
				echo ", ADD $a[alter]";
				$l [] = $a;
				$Za = $a ["COLUMN_NAME"];
			}
			echo "';
	DECLARE columns CURSOR FOR $m;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	SET @alter_table = '';
	OPEN columns;
	REPEAT
		FETCH columns INTO _column_name, _column_default, _is_nullable, _collation_name, _column_type, _extra, _column_comment;
		IF NOT done THEN
			SET set_after = 1;
			CASE _column_name";
			foreach ( $l as $a ) {
				echo "
				WHEN " . $d->quote ( $a ["COLUMN_NAME"] ) . " THEN
					SET add_columns = REPLACE(add_columns, ', ADD $a[alter]', '');
					IF NOT (_column_default <=> $a[default]) OR _is_nullable != '$a[IS_NULLABLE]' OR _collation_name != '$a[COLLATION_NAME]' OR _column_type != " . $d->quote ( $a ["COLUMN_TYPE"] ) . " OR _extra != '$a[EXTRA]' OR _column_comment != " . $d->quote ( $a ["COLUMN_COMMENT"] ) . " OR after != $a[after] THEN
						SET @alter_table = CONCAT(@alter_table, ', MODIFY $a[alter]');
					END IF;";
			}
			echo "
				ELSE
					SET @alter_table = CONCAT(@alter_table, ', DROP ', _column_name);
					SET set_after = 0;
			END CASE;
			IF set_after THEN
				SET after = _column_name;
			END IF;
		END IF;
	UNTIL done END REPEAT;
	CLOSE columns;
	IF @alter_table != '' OR add_columns != '' THEN
		SET alter_command = CONCAT(alter_command, 'ALTER TABLE " . idf_escape ( $n ) . "', SUBSTR(CONCAT(add_columns, @alter_table), 2), ';\\n');
	END IF;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;

";
		}
	}
}
function dump_data($n, $B, $v = "") {
	global $d;
	$ge = 1048576;
	if ($B) {
		if ($_POST ["format"] != "csv" && $B == "TRUNCATE+INSERT") {
			echo "TRUNCATE " . idf_escape ( $n ) . ";\n";
		}
		$l = fields ( $n );
		$f = $d->query ( ($v ? $v : "SELECT * FROM " . idf_escape ( $n )), 1 );
		if ($f) {
			$_b = "";
			$Ba = "";
			while ( $a = $f->fetch_assoc () ) {
				if ($_POST ["format"] == "csv") {
					dump_csv ( $a );
				} else {
					if (! $_b) {
						$_b = "INSERT INTO " . idf_escape ( $n ) . " (" . implode ( ", ", array_map ( 'idf_escape', array_keys ( $a ) ) ) . ") VALUES";
					}
					foreach ( $a as $e => $b ) {
						$a [$e] = (isset ( $b ) ? (ereg ( 'int|float|double|decimal', $l [$e] ["type"] ) ? $b : $d->quote ( $b )) : "NULL");
					}
					$C = implode ( ",\t", $a );
					if ($B == "INSERT+UPDATE") {
						$u = array ();
						foreach ( $a as $e => $b ) {
							$u [] = idf_escape ( $e ) . " = $b";
						}
						echo "$_b ($C) ON DUPLICATE KEY UPDATE " . implode ( ", ", $u ) . ";\n";
					} else {
						$C = "\n($C)";
						if (! $Ba) {
							$Ba = $_b . $C;
						} elseif (strlen ( $Ba ) + 2 + strlen ( $C ) < $ge) {
							$Ba .= ",$C";
						} else {
							$Ba .= ";\n";
							echo $Ba;
							$Ba = $_b . $C;
						}
					}
				}
			}
			if ($_POST ["format"] != "csv" && $B != "INSERT+UPDATE" && $Ba) {
				$Ba .= ";\n";
				echo $Ba;
			}
		}
	}
}
function dump_headers($Hd, $he = false) {
	$Rc = ($Hd != "" ? friendly_url ( $Hd ) : "adminer");
	$Va = $_POST ["output"];
	$Ma = ($_POST ["format"] == "sql" ? "sql" : ($he ? "tar" : "csv"));
	header ( "Content-Type: " . ($Va == "bz2" ? "application/x-bzip" : ($Va == "gz" ? "application/x-gzip" : ($Ma == "tar" ? "application/x-tar" : ($Ma == "sql" || $Va != "file" ? "text/plain" : "text/csv") . "; charset=utf-8"))) );
	if ($Va != "text") {
		header ( "Content-Disposition: attachment; filename=$Rc.$Ma" . ($Va != "file" && ! ereg ( '[^0-9a-z]', $Va ) ? ".$Va" : "") );
	}
	session_write_close ();
	if ($_POST ["output"] == "bz2") {
		ob_start ( 'bzcompress', 1e6 );
	}
	if ($_POST ["output"] == "gz") {
		ob_start ( 'gzencode', 1e6 );
	}
	return $Ma;
}
session_cache_limiter ( "" );
if (! ini_get ( "session.use_cookies" ) || @ini_set ( "session.use_cookies", false ) !== false) {
	session_write_close ();
}
$Wa = array ("RESTRICT", "CASCADE", "SET NULL", "NO ACTION" );
$Pa = " onclick=\"return confirm('" . lang ( 63 ) . "');\"";
$Xa = '\'(?:\'\'|[^\'\\\\]|\\\\.)*\'|"(?:""|[^"\\\\]|\\\\.)*"';
$eb = array ("IN", "OUT", "INOUT" );
if (isset ( $_GET ["select"] ) && ($_POST ["edit"] || $_POST ["clone"]) && ! $_POST ["save"]) {
	$_GET ["edit"] = $_GET ["select"];
}
if (isset ( $_GET ["callf"] )) {
	$_GET ["call"] = $_GET ["callf"];
}
if (isset ( $_GET ["function"] )) {
	$_GET ["procedure"] = $_GET ["function"];
}
if (isset ( $_GET ["download"] )) {
	$j = $_GET ["download"];
	header ( "Content-Type: application/octet-stream" );
	header ( "Content-Disposition: attachment; filename=" . friendly_url ( "$j-" . implode ( "_", $_GET ["where"] ) ) . "." . friendly_url ( $_GET ["field"] ) );
	echo $d->result ( $d->query ( "SELECT " . idf_escape ( $_GET ["field"] ) . " FROM " . idf_escape ( $j ) . " WHERE " . where ( $_GET ) . " LIMIT 1" ) );
	exit ();
} elseif (isset ( $_GET ["table"] )) {
	$j = $_GET ["table"];
	$l = fields ( $j );
	if (! $l) {
		$o = error ();
	}
	$Y = ($l ? table_status ( $j ) : array ());
	page_header ( ($l && ! isset ( $Y ["Rows"] ) ? lang ( 79 ) : lang ( 80 )) . ": " . h ( $j ), $o );
	$p->selectLinks ( $Y );
	if ($l) {
		echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang ( 81 ) . "<td>" . lang ( 69 ) . "<td>" . lang ( 74 ) . "</thead>\n";
		foreach ( $l as $c ) {
			echo "<tr" . odd () . "><th>" . h ( $c ["field"] ), "<td>" . h ( $c ["full_type"] ) . ($c ["null"] ? " <i>NULL</i>" : "") . ($c ["auto_increment"] ? " <i>" . lang ( 72 ) . "</i>" : ""), "<td>" . nbsp ( $c ["comment"] ), "\n";
		}
		echo "</table>\n";
		if (isset ( $Y ["Rows"] )) {
			echo "<h3>" . lang ( 82 ) . "</h3>\n";
			$w = indexes ( $j );
			if ($w) {
				echo "<table cellspacing='0'>\n";
				foreach ( $w as $h => $s ) {
					ksort ( $s ["columns"] );
					$vb = array ();
					foreach ( $s ["columns"] as $e => $b ) {
						$vb [] = "<i>" . h ( $b ) . "</i>" . ($s ["lengths"] [$e] ? "(" . $s ["lengths"] [$e] . ")" : "");
					}
					echo "<tr title='" . h ( $h ) . "'><th>$s[type]<td>" . implode ( ", ", $vb ) . "\n";
				}
				echo "</table>\n";
			}
			echo '<p><a href="' . h ( ME ) . 'indexes=' . urlencode ( $j ) . '">' . lang ( 83 ) . "</a>\n";
			if ($Y ["Engine"] == "InnoDB") {
				echo "<h3>" . lang ( 65 ) . "</h3>\n";
				$F = foreign_keys ( $j );
				if ($F) {
					echo "<table cellspacing='0'>\n";
					foreach ( $F as $h => $J ) {
						$y = ($J ["db"] != "" ? "<strong>" . h ( $J ["db"] ) . "</strong>." : "") . h ( $J ["table"] );
						echo "<tr>", "<th><i>" . implode ( "</i>, <i>", array_map ( 'h', $J ["source"] ) ) . "</i>", "<td><a href='" . h ( $J ["db"] != "" ? preg_replace ( '~db=[^&]*~', "db=" . urlencode ( $J ["db"] ), ME ) : ME ) . "table=" . urlencode ( $J ["table"] ) . "'>$y</a>", "(<em>" . implode ( "</em>, <em>", array_map ( 'h', $J ["target"] ) ) . "</em>)", '<td><a href="' . h ( ME . 'foreign=' . urlencode ( $j ) . '&name=' . urlencode ( $h ) ) . '">' . lang ( 84 ) . '</a>';
					}
					echo "</table>\n";
				}
				echo '<p><a href="' . h ( ME ) . 'foreign=' . urlencode ( $j ) . '">' . lang ( 85 ) . "</a>\n";
			}
			if ($d->server_info >= 5) {
				echo "<h3>" . lang ( 86 ) . "</h3>\n";
				$f = $d->query ( "SHOW TRIGGERS LIKE " . $d->quote ( addcslashes ( $j, "%_" ) ) );
				if ($f->num_rows) {
					echo "<table cellspacing='0'>\n";
					while ( $a = $f->fetch_assoc () ) {
						echo "<tr valign='top'><td>$a[Timing]<td>$a[Event]<th>" . h ( $a ["Trigger"] ) . "<td><a href='" . h ( ME . 'trigger=' . urlencode ( $j ) . '&name=' . urlencode ( $a ["Trigger"] ) ) . "'>" . lang ( 84 ) . "</a>\n";
					}
					echo "</table>\n";
				}
				echo '<p><a href="' . h ( ME ) . 'trigger=' . urlencode ( $j ) . '">' . lang ( 87 ) . "</a>\n";
			}
		}
	}
} elseif (isset ( $_GET ["schema"] )) {
	page_header ( lang ( 88 ), "", array (), DB );
	$Ga = array ();
	$Sd = array ();
	preg_match_all ( '~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~', $_COOKIE ["adminer_schema"], $I, PREG_SET_ORDER );
	foreach ( $I as $i => $k ) {
		$Ga [$k [1]] = array ($k [2], $k [3] );
		$Sd [] = "\n\t'" . addcslashes ( $k [1], "\r\n'\\" ) . "': [ $k[2], $k[3] ]";
	}
	$lb = 0;
	$Vd = - 1;
	$Ha = array ();
	$Xd = array ();
	$Wd = array ();
	foreach ( table_status () as $a ) {
		if (! isset ( $a ["Engine"] )) {
			continue;
		}
		$Na = 0;
		$Ha [$a ["Name"]] ["fields"] = array ();
		foreach ( fields ( $a ["Name"] ) as $h => $c ) {
			$Na += 1.25;
			$c ["pos"] = $Na;
			$Ha [$a ["Name"]] ["fields"] [$h] = $c;
		}
		$Ha [$a ["Name"]] ["pos"] = ($Ga [$a ["Name"]] ? $Ga [$a ["Name"]] : array ($lb, 0 ));
		if ($a ["Engine"] == "InnoDB") {
			foreach ( foreign_keys ( $a ["Name"] ) as $b ) {
				if (! $b ["db"]) {
					$V = $Vd;
					if ($Ga [$a ["Name"]] [1] || $Ga [$b ["table"]] [1]) {
						$V = min ( floatval ( $Ga [$a ["Name"]] [1] ), floatval ( $Ga [$b ["table"]] [1] ) ) - 1;
					} else {
						$Vd -= .1;
					}
					while ( $Wd [( string ) $V] ) {
						$V -= .0001;
					}
					$Ha [$a ["Name"]] ["references"] [$b ["table"]] [( string ) $V] = array ($b ["source"], $b ["target"] );
					$Xd [$b ["table"]] [$a ["Name"]] [( string ) $V] = $b ["target"];
					$Wd [( string ) $V] = true;
				}
			}
		}
		$lb = max ( $lb, $Ha [$a ["Name"]] ["pos"] [0] + 2.5 + $Na );
	}
	echo '<div id="schema" style="height: ', $lb, 'em;">
<script type="text/javascript">
tablePos = {', implode ( ",", $Sd ) . "\n", '};
em = document.getElementById(\'schema\').offsetHeight / ', $lb, ';
document.onmousemove = schemaMousemove;
document.onmouseup = schemaMouseup;
</script>
';
	foreach ( $Ha as $h => $n ) {
		echo "<div class='table' style='top: " . $n ["pos"] [0] . "em; left: " . $n ["pos"] [1] . "em;' onmousedown='schemaMousedown(this, event);'>", '<a href="' . h ( ME ) . 'table=' . urlencode ( $h ) . '"><strong>' . h ( $h ) . "</strong></a><br>\n";
		foreach ( $n ["fields"] as $c ) {
			$b = '<span' . type_class ( $c ["type"] ) . ' title="' . h ( $c ["full_type"] . ($c ["null"] ? " NULL" : '') ) . '">' . h ( $c ["field"] ) . '</span>';
			echo ($c ["primary"] ? "<em>$b</em>" : $b) . "<br>\n";
		}
		foreach ( ( array ) $n ["references"] as $ib => $tb ) {
			foreach ( $tb as $V => $Xb ) {
				$Ab = $V - $Ga [$h] [1];
				$i = 0;
				foreach ( $Xb [0] as $ca ) {
					echo "<div class='references' title='" . h ( $ib ) . "' id='refs$V-" . ($i ++) . "' style='left: $Ab" . "em; top: " . $n ["fields"] [$ca] ["pos"] . "em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: " . (- $Ab) . "em;'></div></div>\n";
				}
			}
		}
		foreach ( ( array ) $Xd [$h] as $ib => $tb ) {
			foreach ( $tb as $V => $t ) {
				$Ab = $V - $Ga [$h] [1];
				$i = 0;
				foreach ( $t as $Qa ) {
					echo "<div class='references' title='" . h ( $ib ) . "' id='refd$V-" . ($i ++) . "' style='left: $Ab" . "em; top: " . $n ["fields"] [$Qa] ["pos"] . "em; height: 1.25em; background: url(" . h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=arrow.gif) no-repeat right center;&amp;version=2.3.2'><div style='height: .5em; border-bottom: 1px solid Gray; width: " . (- $Ab) . "em;'></div></div>\n";
				}
			}
		}
		echo "</div>\n";
	}
	foreach ( $Ha as $h => $n ) {
		foreach ( ( array ) $n ["references"] as $ib => $tb ) {
			foreach ( $tb as $V => $Xb ) {
				$Qb = $lb;
				$yc = - 10;
				foreach ( $Xb [0] as $e => $ca ) {
					$Jd = $n ["pos"] [0] + $n ["fields"] [$ca] ["pos"];
					$Id = $Ha [$ib] ["pos"] [0] + $Ha [$ib] ["fields"] [$Xb [1] [$e]] ["pos"];
					$Qb = min ( $Qb, $Jd, $Id );
					$yc = max ( $yc, $Jd, $Id );
				}
				echo "<div class='references' id='refl$V' style='left: $V" . "em; top: $Qb" . "em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: " . ($yc - $Qb) . "em;'></div></div>\n";
			}
		}
	}
	echo '</div>
';
} elseif (isset ( $_GET ["dump"] )) {
	$j = $_GET ["dump"];
	if ($_POST) {
		$Ma = dump_headers ( ($j != "" ? $j : DB), (DB == "" || count ( ( array ) $_POST ["tables"] + ( array ) $_POST ["data"] ) > 1) );
		if ($_POST ["format"] == "sql") {
			echo "-- Adminer $qb dump
SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = " . $d->quote ( $d->result ( $d->query ( "SELECT @@time_zone" ) ) ) . ";
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

";
		}
		$B = $_POST ["db_style"];
		foreach ( (DB != "" ? array (DB ) : ( array ) $_POST ["databases"]) as $x ) {
			if ($d->select_db ( $x )) {
				if ($_POST ["format"] == "sql" && ereg ( 'CREATE', $B ) && ($f = $d->query ( "SHOW CREATE DATABASE " . idf_escape ( $x ) ))) {
					if ($B == "DROP+CREATE") {
						echo "DROP DATABASE IF EXISTS " . idf_escape ( $x ) . ";\n";
					}
					$aa = $d->result ( $f, 1 );
					echo ($B == "CREATE+ALTER" ? preg_replace ( '~^CREATE DATABASE ~', '\\0IF NOT EXISTS ', $aa ) : $aa) . ";\n";
				}
				if ($_POST ["format"] == "sql") {
					if ($B) {
						echo "USE " . idf_escape ( $x ) . ";\n\n";
					}
					if (in_array ( "CREATE+ALTER", array ($B, $_POST ["table_style"] ) )) {
						echo "SET @adminer_alter = '';\n\n";
					}
					$Da = "";
					if ($_POST ["routines"]) {
						foreach ( array ("FUNCTION", "PROCEDURE" ) as $na ) {
							$f = $d->query ( "SHOW $na STATUS WHERE Db = " . $d->quote ( $x ) );
							while ( $a = $f->fetch_assoc () ) {
								$Da .= ($B != 'DROP+CREATE' ? "DROP $na IF EXISTS " . idf_escape ( $a ["Name"] ) . ";;\n" : "") . $d->result ( $d->query ( "SHOW CREATE $na " . idf_escape ( $a ["Name"] ) ), 2 ) . ";;\n\n";
							}
						}
					}
					if ($_POST ["events"]) {
						$f = $d->query ( "SHOW EVENTS" );
						if ($f) {
							while ( $a = $f->fetch_assoc () ) {
								$Da .= ($B != 'DROP+CREATE' ? "DROP EVENT IF EXISTS " . idf_escape ( $a ["Name"] ) . ";;\n" : "") . $d->result ( $d->query ( "SHOW CREATE EVENT " . idf_escape ( $a ["Name"] ) ), 3 ) . ";;\n\n";
							}
						}
					}
					if ($Da) {
						echo "DELIMITER ;;\n\n$Da" . "DELIMITER ;\n\n";
					}
				}
				if ($_POST ["table_style"] || $_POST ["data_style"]) {
					$Lb = array ();
					foreach ( table_status () as $a ) {
						$n = (DB == "" || in_array ( $a ["Name"], ( array ) $_POST ["tables"] ));
						$Nd = (DB == "" || in_array ( $a ["Name"], ( array ) $_POST ["data"] ));
						if ($n || $Nd) {
							if (isset ( $a ["Engine"] )) {
								if ($Ma == "tar") {
									ob_start ();
								}
								dump_table ( $a ["Name"], ($n ? $_POST ["table_style"] : "") );
								if ($Nd) {
									dump_data ( $a ["Name"], $_POST ["data_style"] );
								}
								if ($n) {
									dump_triggers ( $a ["Name"], $_POST ["table_style"] );
								}
								if ($Ma == "tar") {
									echo tar_file ( (DB != "" ? "" : "$x/") . "$a[Name].csv", ob_get_clean () );
								} elseif ($_POST ["format"] == "sql") {
									echo "\n";
								}
							} elseif ($_POST ["format"] == "sql") {
								$Lb [] = $a ["Name"];
							}
						}
					}
					foreach ( $Lb as $ue ) {
						dump_table ( $ue, $_POST ["table_style"], true );
					}
					if ($Ma == "tar") {
						echo pack ( "x512" );
					}
				}
				if ($B == "CREATE+ALTER" && $_POST ["format"] == "sql") {
					$m = "SELECT TABLE_NAME, ENGINE, TABLE_COLLATION, TABLE_COMMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE()";
					echo "DELIMITER ;;
CREATE PROCEDURE adminer_alter (INOUT alter_command text) BEGIN
	DECLARE _table_name, _engine, _table_collation varchar(64);
	DECLARE _table_comment varchar(64);
	DECLARE done bool DEFAULT 0;
	DECLARE tables CURSOR FOR $m;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
	OPEN tables;
	REPEAT
		FETCH tables INTO _table_name, _engine, _table_collation, _table_comment;
		IF NOT done THEN
			CASE _table_name";
					$f = $d->query ( $m );
					while ( $a = $f->fetch_assoc () ) {
						$Zb = $d->quote ( $a ["ENGINE"] == "InnoDB" ? preg_replace ( '~(?:(.+); )?InnoDB free: .*~', '\\1', $a ["TABLE_COMMENT"] ) : $a ["TABLE_COMMENT"] );
						echo "
				WHEN " . $d->quote ( $a ["TABLE_NAME"] ) . " THEN
					" . (isset ( $a ["ENGINE"] ) ? "IF _engine != '$a[ENGINE]' OR _table_collation != '$a[TABLE_COLLATION]' OR _table_comment != $Zb THEN
						ALTER TABLE " . idf_escape ( $a ["TABLE_NAME"] ) . " ENGINE=$a[ENGINE] COLLATE=$a[TABLE_COLLATION] COMMENT=$Zb;
					END IF" : "BEGIN END") . ";";
					}
					echo "
				ELSE
					SET alter_command = CONCAT(alter_command, 'DROP TABLE `', REPLACE(_table_name, '`', '``'), '`;\\n');
			END CASE;
		END IF;
	UNTIL done END REPEAT;
	CLOSE tables;
END;;
DELIMITER ;
CALL adminer_alter(@adminer_alter);
DROP PROCEDURE adminer_alter;
";
				}
				if (in_array ( "CREATE+ALTER", array ($B, $_POST ["table_style"] ) ) && $_POST ["format"] == "sql") {
					echo "SELECT @adminer_alter;\n";
				}
			}
		}
		exit ();
	}
	page_header ( lang ( 89 ), "", ($_GET ["export"] != "" ? array ("table" => $_GET ["export"] ) : array ()), DB );
	echo '
<form action="" method="post">
<table cellspacing="0">
';
	$ed = array ('', 'USE', 'DROP+CREATE', 'CREATE' );
	$Uc = array ('', 'DROP+CREATE', 'CREATE' );
	$ve = array ('', 'TRUNCATE+INSERT', 'INSERT', 'INSERT+UPDATE' );
	if ($d->server_info >= 5) {
		$ed [] = 'CREATE+ALTER';
		$Uc [] = 'CREATE+ALTER';
	}
	echo "<tr><th>" . lang ( 90 ) . "<td><input type='hidden' name='token' value='$E'>" . $p->dumpOutput ( 0 ) . "\n";
	echo "<tr><th>" . lang ( 91 ) . "<td>" . $p->dumpFormat ( 0 ) . "\n", "<tr><th>" . lang ( 50 ) . "<td>" . html_select ( 'db_style', $ed, (DB != "" ? '' : 'CREATE') );
	if ($d->server_info >= 5) {
		$ba = $_GET ["dump"] == "";
		echo checkbox ( "routines", 1, $ba, lang ( 92 ) );
		if ($d->server_info >= 5.1) {
			echo checkbox ( "events", 1, $ba, lang ( 93 ) );
		}
	}
	echo "<tr><th>" . lang ( 94 ) . "<td>" . html_select ( 'table_style', $Uc, 'DROP+CREATE' ), "<tr><th>" . lang ( 95 ) . "<td>" . html_select ( 'data_style', $ve, 'INSERT' ), '</table>
<p><input type="submit" value="', lang ( 89 ), '">

<table cellspacing="0">
';
	$vc = array ();
	if (DB != "") {
		$ba = ($j != "" ? "" : " checked");
		echo "<thead><tr>", "<th style='text-align: left;'><label><input type='checkbox' id='check-tables'$ba onclick='formCheck(this, /^tables\\[/);'>" . lang ( 94 ) . "</label>", "<th style='text-align: right;'><label>" . lang ( 95 ) . "<input type='checkbox' id='check-data'$ba onclick='formCheck(this, /^data\\[/);'></label>", "</thead>\n";
		$Lb = "";
		foreach ( table_status () as $a ) {
			$h = $a ["Name"];
			$Mb = ereg_replace ( "_.*", "", $h );
			$ba = ($j == "" || $j == (substr ( $j, - 1 ) == "%" ? "$Mb%" : $h));
			$vb = "<tr><td>" . checkbox ( "tables[]", $h, $ba, $h, "formUncheck('check-tables');" );
			if (! $a ["Engine"]) {
				$Lb .= "$vb\n";
			} else {
				echo "$vb<td align='right'><label>" . ($a ["Engine"] == "InnoDB" && $a ["Rows"] ? lang ( 96, $a ["Rows"] ) : $a ["Rows"]) . checkbox ( "data[]", $h, $ba, "", "formUncheck('check-data');" ) . "</label>\n";
			}
			$vc [$Mb] ++;
		}
		echo $Lb;
	} else {
		echo "<thead><tr><th style='text-align: left;'><label><input type='checkbox' id='check-databases'" . ($j == "" ? " checked" : "") . " onclick='formCheck(this, /^databases\\[/);'>" . lang ( 50 ) . "</label></thead>\n";
		foreach ( get_databases () as $x ) {
			if (! information_schema ( $x )) {
				$Mb = ereg_replace ( "_.*", "", $x );
				echo "<tr><td>" . checkbox ( "databases[]", $x, $j == "" || $j == "$Mb%", $x, "formUncheck('check-databases');" ) . "</label>\n";
				$vc [$Mb] ++;
			}
		}
	}
	echo '</table>
</form>
';
	$bb = true;
	foreach ( $vc as $e => $b ) {
		if ($e != "" && $b > 1) {
			echo ($bb ? "<p>" : " ") . "<a href='" . h ( ME ) . "dump=" . urlencode ( "$e%" ) . "'>" . h ( $e ) . "</a>";
			$bb = false;
		}
	}
} elseif (isset ( $_GET ["privileges"] )) {
	page_header ( lang ( 55 ) );
	$f = $d->query ( "SELECT User, Host FROM mysql.user ORDER BY Host, User" );
	if (! $f) {
		echo '<form action=""><p>
', SID_FORM;
		if ($_GET ["server"] != "") {
			echo '<input type="hidden" name="server" value="', h ( $_GET ["server"] ), '">';
		}
		echo lang ( 8 ), ': <input name="user">
', lang ( 7 ), ': <input name="host" value="localhost">
<input type="hidden" name="grant" value="">
<input type="submit" value="', lang ( 17 ), '">
</form>
';
		$f = $d->query ( "SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host" );
	}
	echo "<table cellspacing='0'>\n", "<thead><tr><th>&nbsp;<th>" . lang ( 8 ) . "<th>" . lang ( 7 ) . "</thead>\n";
	while ( $a = $f->fetch_assoc () ) {
		echo '<tr' . odd () . '><td><a href="' . h ( ME . 'user=' . urlencode ( $a ["User"] ) . '&host=' . urlencode ( $a ["Host"] ) ) . '">' . lang ( 97 ) . '</a><td>' . h ( $a ["User"] ) . "<td>" . h ( $a ["Host"] ) . "\n";
	}
	echo "</table>\n", '<p><a href="' . h ( ME ) . 'user=">' . lang ( 98 ) . "</a>";
} elseif (isset ( $_GET ["sql"] )) {
	restart_session ();
	$Ya = &$_SESSION ["history"] [$_GET ["server"]] [DB];
	if (! $o && $_POST ["clear"]) {
		$Ya = array ();
		redirect ( remove_from_uri ( "history" ) );
	}
	page_header ( lang ( 29 ), $o );
	if (! $o && $_POST) {
		$Ia = false;
		$m = $_POST ["query"];
		if ($_POST ["webfile"]) {
			$Ia = @fopen ( (file_exists ( "adminer.sql" ) ? "adminer.sql" : (file_exists ( "adminer.sql.gz" ) ? "compress.zlib://adminer.sql.gz" : "compress.bzip2://adminer.sql.bz2")), "rb" );
			$m = ($Ia ? fread ( $Ia, 1e6 ) : false);
		} elseif ($_POST ["file"]) {
			$m = get_file ( "sql_file", true );
		}
		if (is_string ( $m )) {
			if (function_exists ( 'memory_get_usage' )) {
				@ini_set ( "memory_limit", 2 * strlen ( $m ) + memory_get_usage () + 8e6 );
			}
			if ($m != "" && strlen ( $m ) < 1e6 && (! $Ya || end ( $Ya ) != $m)) {
				$Ya [] = $m;
			}
			$tc = "(\\s|/\\*.*\\*/|(#|-- )[^\n]*\n|--\n)";
			$Be = "(CREATE|DROP)$tc+(DATABASE|SCHEMA)\\b~isU";
			if (! ini_get ( "session.use_cookies" )) {
				session_write_close ();
			}
			$xc = ";";
			$ja = 0;
			$Wc = true;
			$pa = (DB != "" ? connect () : null);
			if (is_object ( $pa )) {
				$pa->select_db ( DB );
			}
			$La = 0;
			$Bc = "";
			while ( $m != "" ) {
				if (! $ja && preg_match ( '~^\\s*DELIMITER\\s+(.+)~i', $m, $k )) {
					$xc = $k [1];
					$m = substr ( $m, strlen ( $k [0] ) );
				} else {
					preg_match ( '(' . preg_quote ( $xc ) . '|[\'`"]|/\\*|-- |#|$)', $m, $k, PREG_OFFSET_CAPTURE, $ja );
					$O = $k [0] [0];
					$ja = $k [0] [1] + strlen ( $O );
					if (! $O && $Ia && ! feof ( $Ia )) {
						$m .= fread ( $Ia, 1e5 );
					} else {
						if (! $O && rtrim ( $m ) == "") {
							break;
						}
						if (! $O || $O == $xc) {
							$Wc = false;
							$ha = substr ( $m, 0, $k [0] [1] );
							$La ++;
							echo "<pre class='jush-sql' id='sql-$La'>" . shorten_utf8 ( trim ( $ha ), 1000 ) . "</pre>\n";
							ob_flush ();
							flush ();
							$Ac = explode ( " ", microtime () );
							if (! $d->multi_query ( $ha )) {
								echo "<p class='error'>" . lang ( 99 ) . ": " . error () . "\n";
								$Bc .= " <a href='#sql-$La'>$La</a>";
								if ($_POST ["error_stops"]) {
									break;
								}
							} else {
								do {
									$f = $d->store_result ();
									$rc = explode ( " ", microtime () );
									$id = " <span class='time'>(" . lang ( 100, max ( 0, $rc [0] - $Ac [0] + $rc [1] - $Ac [1] ) ) . ")</span>";
									if (is_object ( $f )) {
										select ( $f, $pa );
										echo "<p>" . ($f->num_rows ? lang ( 101, $f->num_rows ) : "") . $id;
										if ($pa && preg_match ( "~^($tc|\\()*SELECT\\b~isU", $ha )) {
											$T = "explain-$La";
											echo ", <a href='#$T' onclick=\"return !toggle('$T');\">EXPLAIN</a>\n", "<div id='$T' class='hidden'>\n";
											select ( $pa->query ( "EXPLAIN $ha" ) );
											echo "</div>\n";
										}
									} else {
										if (preg_match ( "~^$tc*$Be", $m )) {
											restart_session ();
											$_SESSION ["databases"] [$_GET ["server"]] = null;
											session_write_close ();
										}
										echo "<p class='message' title='" . h ( $d->info ) . "'>" . lang ( 102, $d->affected_rows ) . "$id\n";
									}
									unset ( $f );
									$Ac = $rc;
								} while ( $d->next_result () );
							}
							$m = substr ( $m, $ja );
							$ja = 0;
						} else {
							while ( preg_match ( '~' . ($O == '/*' ? '\\*/' : (ereg ( '-- |#', $O ) ? "\n" : "$O|\\\\.")) . '|$~s', $m, $k, PREG_OFFSET_CAPTURE, $ja ) ) {
								$C = $k [0] [0];
								$ja = $k [0] [1] + strlen ( $C );
								if (! $C && $Ia && ! feof ( $Ia )) {
									$m .= fread ( $Ia, 1e6 );
								} elseif ($C [0] != "\\") {
									break;
								}
							}
						}
					}
				}
			}
			if ($Bc && $La > 1) {
				echo "<p class='error'>" . lang ( 99 ) . ": $Bc\n";
			}
			if ($Wc) {
				echo "<p class='message'>" . lang ( 103 ) . "\n";
			}
		} else {
			echo "<p class='error'>" . upload_error ( $m ) . "\n";
		}
	}
	echo '
<form action="" method="post" enctype="multipart/form-data">
<p><textarea name="query" rows="20" cols="80" style="width: 98%;">';
	$ha = $_GET ["sql"];
	if ($_POST) {
		$ha = $_POST ["query"];
	} elseif ($_GET ["history"] != "") {
		$ha = $Ya [$_GET ["history"]];
	}
	echo h ( $ha ), '</textarea>
<p>
<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 104 ), '">
', checkbox ( "error_stops", 1, $_POST ["error_stops"], lang ( 105 ) ), '
<p>
';
	if (! ini_get ( "file_uploads" )) {
		echo lang ( 106 );
	} else {
		echo lang ( 107 ), ': <input type="file" name="sql_file">
<input type="submit" name="file" value="', lang ( 108 ), '">
';
	}
	echo '
<p>';
	$Cc = array ();
	foreach ( array ("gz" => "zlib", "bz2" => "bz2" ) as $e => $b ) {
		if (extension_loaded ( $b )) {
			$Cc [] = ".$e";
		}
	}
	echo lang ( 109, "<code>adminer.sql" . ($Cc ? "[" . implode ( "|", $Cc ) . "]" : "") . "</code>" ), ' <input type="submit" name="webfile" value="', lang ( 108 ), '">

';
	if ($Ya) {
		print_fieldset ( "history", lang ( 110 ), $_GET ["history"] != "" );
		foreach ( $Ya as $e => $b ) {
			echo '<a href="' . h ( ME . "sql=&history=$e" ) . '">' . lang ( 17 ) . '</a> <code class="jush-sql">' . shorten_utf8 ( ltrim ( str_replace ( "\n", " ", str_replace ( "\r", "", preg_replace ( '~^(#|-- ).*~m', '', $b ) ) ) ), 80, "</code>" ) . "<br>\n";
		}
		echo "<input type='submit' name='clear' value='" . lang ( 111 ) . "'>\n", "</div></fieldset>\n";
	}
	echo '
</form>
';
} elseif (isset ( $_GET ["edit"] )) {
	$j = $_GET ["edit"];
	$D = (isset ( $_GET ["select"] ) ? (count ( $_POST ["check"] ) == 1 ? where_check ( $_POST ["check"] [0] ) : "") : where ( $_GET ));
	$Ua = (isset ( $_GET ["select"] ) ? $_POST ["edit"] : $D);
	$l = fields ( $j );
	foreach ( $l as $h => $c ) {
		if (! isset ( $c ["privileges"] [$Ua ? "update" : "insert"] ) || $p->fieldName ( $c ) == "") {
			unset ( $l [$h] );
		}
	}
	if ($_POST && ! $o && ! isset ( $_GET ["select"] )) {
		$z = $_POST ["referer"];
		if ($_POST ["insert"]) {
			$z = ($Ua ? null : $_SERVER ["REQUEST_URI"]);
		} elseif (! ereg ( '^.+&select=.+$', $z )) {
			$z = ME . "select=" . urlencode ( $j );
			$i = 0;
			foreach ( ( array ) $_GET ["set"] as $e => $b ) {
				if ($b == $_POST ["fields"] [$e]) {
					$z .= where_link ( $i ++, bracket_escape ( $e, "back" ), $b );
				}
			}
		}
		if (isset ( $_POST ["delete"] )) {
			query_redirect ( "DELETE FROM " . idf_escape ( $_GET ["edit"] ) . " WHERE $D LIMIT 1", $z, lang ( 112 ) );
		} else {
			$u = array ();
			foreach ( $l as $h => $c ) {
				$b = process_input ( $c );
				if (! $Ua) {
					$u [idf_escape ( $h )] = ($b !== false ? $b : "''");
				} elseif ($b !== false) {
					$u [] = "\n" . idf_escape ( $h ) . " = $b";
				}
			}
			if (! $u) {
				redirect ( $z );
			}
			if ($Ua) {
				query_redirect ( "UPDATE " . idf_escape ( $j ) . " SET" . implode ( ",", $u ) . "\nWHERE $D\nLIMIT 1", $z, lang ( 113 ) );
			} else {
				query_redirect ( "INSERT INTO " . idf_escape ( $j ) . " (" . implode ( ", ", array_keys ( $u ) ) . ")\nVALUES (" . implode ( ", ", $u ) . ")", $z, lang ( 114 ) );
			}
		}
	}
	$X = $p->tableName ( table_status ( $j ) );
	page_header ( ($Ua ? lang ( 17 ) : lang ( 115 )), $o, array ("select" => array ($j, $X ) ), $X );
	unset ( $a );
	if ($_POST ["save"]) {
		$a = ( array ) $_POST ["fields"];
	} elseif ($D) {
		$v = array ();
		foreach ( $l as $h => $c ) {
			if (isset ( $c ["privileges"] ["select"] )) {
				$v [] = ($_POST ["clone"] && $c ["auto_increment"] ? "'' AS " : (ereg ( "enum|set", $c ["type"] ) ? "1*" . idf_escape ( $h ) . " AS " : "")) . idf_escape ( $h );
			}
		}
		$a = array ();
		if ($v) {
			$f = $d->query ( "SELECT " . implode ( ", ", $v ) . " FROM " . idf_escape ( $j ) . " WHERE $D " . (isset ( $_GET ["select"] ) ? "HAVING COUNT(*) = 1" : "LIMIT 1") );
			$a = $f->fetch_assoc ();
		}
	}
	echo '
<form action="" method="post" enctype="multipart/form-data">
';
	if ($l) {
		unset ( $aa );
		echo "<table cellspacing='0'>\n";
		foreach ( $l as $h => $c ) {
			echo "<tr><th>" . $p->fieldName ( $c );
			$sa = $_GET ["set"] [bracket_escape ( $h )];
			$q = (isset ( $a ) ? ($a [$h] != "" && ereg ( "enum|set", $c ["type"] ) ? intval ( $a [$h] ) : $a [$h]) : ($_POST ["clone"] && $c ["auto_increment"] ? "" : (isset ( $_GET ["select"] ) ? false : (isset ( $sa ) ? $sa : $c ["default"]))));
			if (! $_POST ["save"] && is_string ( $q )) {
				$q = $p->editVal ( $q, $c );
			}
			$_ = ($_POST ["save"] ? ( string ) $_POST ["function"] [$h] : ($D && $c ["on_update"] == "CURRENT_TIMESTAMP" ? "now" : ($q === false ? null : (isset ( $q ) ? '' : 'NULL'))));
			if ($c ["type"] == "timestamp" && $q == "CURRENT_TIMESTAMP") {
				$q = "";
				$_ = "now";
			}
			input ( $c, $q, $_ );
			echo "\n";
		}
		echo "</table>\n";
	}
	echo '<p>
<input type="hidden" name="token" value="', $E, '">
<input type="hidden" name="referer" value="', h ( isset ( $_POST ["referer"] ) ? $_POST ["referer"] : $_SERVER ["HTTP_REFERER"] ), '">
<input type="hidden" name="save" value="1">
';
	if (isset ( $_GET ["select"] )) {
		hidden_fields ( array ("check" => ( array ) $_POST ["check"], "clone" => $_POST ["clone"], "all" => $_POST ["all"] ) );
	}
	if ($l) {
		echo "<input type='submit' value='" . lang ( 116 ) . "'>\n";
		if (! isset ( $_GET ["select"] )) {
			echo "<input type='submit' name='insert' value='" . ($Ua ? lang ( 117 ) : lang ( 118 )) . "'>\n";
		}
	}
	if ($Ua) {
		echo "<input type='submit' name='delete' value='" . lang ( 119 ) . "'$Pa>\n";
	}
	echo '</form>
';
} elseif (isset ( $_GET ["create"] )) {
	$j = $_GET ["create"];
	$ld = array ('HASH', 'LINEAR HASH', 'KEY', 'LINEAR KEY', 'RANGE', 'LIST' );
	$hd = referencable_primary ( $j );
	$F = array ();
	foreach ( $hd as $X => $c ) {
		$F [idf_escape ( $X ) . "." . idf_escape ( $c ["field"] )] = $X;
	}
	$Vb = array ();
	$Rb = array ();
	if ($j != "") {
		$Vb = fields ( $j );
		$Rb = table_status ( $j );
	}
	if ($_POST && ! $o && ! $_POST ["add"] && ! $_POST ["drop_col"] && ! $_POST ["up"] && ! $_POST ["down"]) {
		if ($_POST ["drop"]) {
			query_redirect ( "DROP TABLE " . idf_escape ( $_GET ["create"] ), substr ( ME, 0, - 1 ), lang ( 120 ) );
		} else {
			$qc = " PRIMARY KEY";
			if ($j != "" && $_POST ["auto_increment_col"]) {
				foreach ( indexes ( $j ) as $s ) {
					if (in_array ( $_POST ["fields"] [$_POST ["auto_increment_col"]] ["orig"], $s ["columns"], true )) {
						$qc = "";
						break;
					}
					if ($s ["type"] == "PRIMARY") {
						$qc = " UNIQUE";
					}
				}
			}
			$l = "";
			ksort ( $_POST ["fields"] );
			$Sb = reset ( $Vb );
			$Za = "FIRST";
			foreach ( $_POST ["fields"] as $e => $c ) {
				$Hb = (isset ( $ra [$c ["type"]] ) ? $c : $hd [$F [$c ["type"]]]);
				if ($c ["field"] != "") {
					if ($Hb) {
						if (! $c ["has_default"]) {
							$c ["default"] = null;
						}
						$sa = eregi_replace ( " *on update CURRENT_TIMESTAMP", "", $c ["default"] );
						if ($sa != $c ["default"]) {
							$c ["on_update"] = "CURRENT_TIMESTAMP";
							$c ["default"] = $sa;
						}
						$dd = process_field ( $c, $Hb );
						$kd = ($e == $_POST ["auto_increment_col"]);
						if ($dd != process_field ( $Sb, $Sb ) || $Sb ["auto_increment"] != $kd) {
							$l .= "\n" . ($j != "" ? ($c ["orig"] != "" ? "CHANGE " . idf_escape ( $c ["orig"] ) : "ADD") : " ") . " $dd" . ($kd ? " AUTO_INCREMENT$qc" : "") . ($j != "" ? " $Za" : "") . ",";
						}
						if (! isset ( $ra [$c ["type"]] )) {
							$l .= ($j != "" ? "\nADD" : "") . " FOREIGN KEY (" . idf_escape ( $c ["field"] ) . ") REFERENCES " . idf_escape ( $F [$c ["type"]] ) . " (" . idf_escape ( $Hb ["field"] ) . "),";
						}
					}
					$Za = "AFTER " . idf_escape ( $c ["field"] );
				} elseif ($c ["orig"] != "") {
					$l .= "\nDROP " . idf_escape ( $c ["orig"] ) . ",";
				}
				if ($c ["orig"] != "") {
					$Sb = next ( $Vb );
				}
			}
			$Sa = "COMMENT=" . $d->quote ( $_POST ["Comment"] ) . ($_POST ["Engine"] && $_POST ["Engine"] != $Rb ["Engine"] ? " ENGINE=" . $d->quote ( $_POST ["Engine"] ) : "") . ($_POST ["Collation"] && $_POST ["Collation"] != $Rb ["Collation"] ? " COLLATE " . $d->quote ( $_POST ["Collation"] ) : "") . ($_POST ["Auto_increment"] != "" ? " AUTO_INCREMENT=" . preg_replace ( '~[^0-9]+~', '', $_POST ["Auto_increment"] ) : "");
			if (in_array ( $_POST ["partition_by"], $ld )) {
				$Qc = array ();
				if ($_POST ["partition_by"] == 'RANGE' || $_POST ["partition_by"] == 'LIST') {
					foreach ( array_filter ( $_POST ["partition_names"] ) as $e => $b ) {
						$q = $_POST ["partition_values"] [$e];
						$Qc [] = "\nPARTITION " . idf_escape ( $b ) . " VALUES " . ($_POST ["partition_by"] == 'RANGE' ? "LESS THAN" : "IN") . ($q != "" ? " ($q)" : " MAXVALUE");
					}
				}
				$Sa .= "\nPARTITION BY $_POST[partition_by]($_POST[partition])" . ($Qc ? " (" . implode ( ",", $Qc ) . "\n)" : ($_POST ["partitions"] ? " PARTITIONS " . intval ( $_POST ["partitions"] ) : ""));
			} elseif ($d->server_info >= 5.1 && $j != "") {
				$Sa .= "\nREMOVE PARTITIONING";
			}
			$z = ME . "table=" . urlencode ( $_POST ["name"] );
			if ($j != "") {
				query_redirect ( "ALTER TABLE " . idf_escape ( $j ) . "$l\nRENAME TO " . idf_escape ( $_POST ["name"] ) . ",\n$Sa", $z, lang ( 121 ) );
			} else {
				cookie ( "adminer_engine", $_POST ["Engine"] );
				query_redirect ( "CREATE TABLE " . idf_escape ( $_POST ["name"] ) . " (" . substr ( $l, 0, - 1 ) . "\n) $Sa", $z, lang ( 122 ) );
			}
		}
	}
	page_header ( ($j != "" ? lang ( 14 ) : lang ( 123 )), $o, array ("table" => $j ), $j );
	$a = array ("Engine" => $_COOKIE ["adminer_engine"], "fields" => array (array ("field" => "" ) ), "partition_names" => array ("" ) );
	if ($_POST) {
		$a = $_POST;
		if ($a ["auto_increment_col"]) {
			$a ["fields"] [$a ["auto_increment_col"]] ["auto_increment"] = true;
		}
		process_fields ( $a ["fields"] );
	} elseif ($j != "") {
		$a = $Rb;
		$a ["name"] = $j;
		$a ["fields"] = array ();
		if (! $_GET ["auto_increment"]) {
			$a ["Auto_increment"] = "";
		}
		foreach ( $Vb as $c ) {
			$c ["has_default"] = isset ( $c ["default"] );
			if ($c ["on_update"]) {
				$c ["default"] .= " ON UPDATE $c[on_update]";
			}
			$a ["fields"] [] = $c;
		}
		if ($d->server_info >= 5.1) {
			$fb = "FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = " . $d->quote ( DB ) . " AND TABLE_NAME = " . $d->quote ( $j );
			$f = $d->query ( "SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $fb ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1" );
			list ( $a ["partition_by"], $a ["partitions"], $a ["partition"] ) = $f->fetch_row ();
			$a ["partition_names"] = array ();
			$a ["partition_values"] = array ();
			$f = $d->query ( "SELECT PARTITION_NAME, PARTITION_DESCRIPTION $fb AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION" );
			while ( $gd = $f->fetch_assoc () ) {
				$a ["partition_names"] [] = $gd ["PARTITION_NAME"];
				$a ["partition_values"] [] = $gd ["PARTITION_DESCRIPTION"];
			}
			$a ["partition_names"] [] = "";
		}
	}
	$N = collations ();
	$Mc = floor ( extension_loaded ( "suhosin" ) ? (min ( ini_get ( "suhosin.request.max_vars" ), ini_get ( "suhosin.post.max_vars" ) ) - 13) / 10 : 0 );
	if ($Mc && count ( $a ["fields"] ) > $Mc) {
		echo "<p class='error'>" . h ( lang ( 124, 'suhosin.post.max_vars', 'suhosin.request.max_vars' ) ) . "\n";
	}
	$Gc = engines ();
	foreach ( $Gc as $jd ) {
		if (! strcasecmp ( $jd, $a ["Engine"] )) {
			$a ["Engine"] = $jd;
			break;
		}
	}
	echo '
<form action="" method="post" id="form">
<p>
', lang ( 125 ), ': <input name="name" maxlength="64" value="', h ( $a ["name"] ), '">
', ($Gc ? html_select ( "Engine", array ("" => "(" . lang ( 126 ) . ")" ) + $Gc, $a ["Engine"] ) : ""), ' ', html_select ( "Collation", array ("" => "(" . lang ( 66 ) . ")" ) + $N, $a ["Collation"] ), ' <input type="submit" value="', lang ( 116 ), '">
<table cellspacing="0" id="edit-fields" class="nowrap">
';
	$nb = edit_fields ( $a ["fields"], $N, "TABLE", $Mc, $F );
	echo '</table>
<p>
', lang ( 72 ), ': <input name="Auto_increment" size="6" value="', h ( $a ["Auto_increment"] ), '">
', lang ( 74 ), ': <input name="Comment" value="', h ( $a ["Comment"] ), '" maxlength="60">
<script type="text/javascript">
document.write(\'<label><input type="checkbox" onclick="columnShow(this.checked, 5);">', lang ( 73 );
	?><\/label>');
document.write('<label><input type="checkbox"<?php
	if ($nb) {
		echo ' checked';
	}
	echo ' onclick="columnShow(this.checked, 6);">', lang ( 127 ), '<\\/label>\');
</script>
<p>
<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 116 ), '">
';
	if (strlen ( $_GET ["create"] )) {
		echo '<input type="submit" name="drop" value="', lang ( 62 ), '"', $Pa, '>';
	}
	if ($d->server_info >= 5.1) {
		$md = ereg ( 'RANGE|LIST', $a ["partition_by"] );
		print_fieldset ( "partition", lang ( 128 ), $a ["partition_by"] );
		echo '<p>
', html_select ( "partition_by", array (- 1 => "" ) + $ld, $a ["partition_by"], "partitionByChange(this);" ), '(<input name="partition" value="', h ( $a ["partition"] ), '">)
', lang ( 129 ), ': <input name="partitions" size="2" value="', h ( $a ["partitions"] ), '"', ($md || ! $a ["partition_by"] ? " class='hidden'" : ""), '>
<table cellspacing="0" id="partition-table"', ($md ? "" : " class='hidden'"), '>
<thead><tr><th>', lang ( 130 ), '<th>', lang ( 131 ), '</thead>
';
		foreach ( $a ["partition_names"] as $e => $b ) {
			echo '<tr>', '<td><input name="partition_names[]" value="' . h ( $b ) . '"' . ($e == count ( $a ["partition_names"] ) - 1 ? ' onchange="partitionNameChange(this);"' : '') . '>', '<td><input name="partition_values[]" value="' . h ( $a ["partition_values"] [$e] ) . '">';
		}
		echo '</table>
</div></fieldset>
';
	}
	echo '</form>
';
} elseif (isset ( $_GET ["indexes"] )) {
	$j = $_GET ["indexes"];
	$ad = array ("PRIMARY", "UNIQUE", "INDEX", "FULLTEXT" );
	$w = indexes ( $j );
	if ($_POST && ! $o && ! $_POST ["add"]) {
		$Tb = array ();
		foreach ( $_POST ["indexes"] as $s ) {
			if (in_array ( $s ["type"], $ad )) {
				$t = array ();
				$Hc = array ();
				$u = array ();
				ksort ( $s ["columns"] );
				foreach ( $s ["columns"] as $e => $la ) {
					if ($la != "") {
						$ua = $s ["lengths"] [$e];
						$u [] = idf_escape ( $la ) . ($ua ? "(" . intval ( $ua ) . ")" : "");
						$t [count ( $t ) + 1] = $la;
						$Hc [count ( $Hc ) + 1] = ($ua ? $ua : null);
					}
				}
				if ($t) {
					foreach ( $w as $h => $gb ) {
						ksort ( $gb ["columns"] );
						ksort ( $gb ["lengths"] );
						if ($s ["type"] == $gb ["type"] && $gb ["columns"] === $t && $gb ["lengths"] === $Hc) {
							unset ( $w [$h] );
							continue 2;
						}
					}
					$Tb [] = "\nADD $s[type]" . ($s ["type"] == "PRIMARY" ? " KEY" : "") . " (" . implode ( ", ", $u ) . ")";
				}
			}
		}
		foreach ( $w as $h => $gb ) {
			$Tb [] = "\nDROP INDEX " . idf_escape ( $h );
		}
		if (! $Tb) {
			redirect ( ME . "table=" . urlencode ( $j ) );
		}
		query_redirect ( "ALTER TABLE " . idf_escape ( $j ) . implode ( ",", $Tb ), ME . "table=" . urlencode ( $j ), lang ( 132 ) );
	}
	page_header ( lang ( 82 ), $o, array ("table" => $j ), $j );
	$l = array_keys ( fields ( $j ) );
	$a = array ("indexes" => $w );
	if ($_POST) {
		$a = $_POST;
		if ($_POST ["add"]) {
			foreach ( $a ["indexes"] as $e => $s ) {
				if ($s ["columns"] [count ( $s ["columns"] )] != "") {
					$a ["indexes"] [$e] ["columns"] [] = "";
				}
			}
			$s = end ( $a ["indexes"] );
			if ($s ["type"] || array_filter ( $s ["columns"], 'strlen' ) || array_filter ( $s ["lengths"], 'strlen' )) {
				$a ["indexes"] [] = array ("columns" => array (1 => "" ) );
			}
		}
	} else {
		foreach ( $a ["indexes"] as $e => $s ) {
			$a ["indexes"] [$e] ["columns"] [] = "";
		}
		$a ["indexes"] [] = array ("columns" => array (1 => "" ) );
	}
	echo '
<form action="" method="post">
<table cellspacing="0">
<thead><tr><th>', lang ( 133 ), '<th>', lang ( 134 ), '</thead>
';
	$M = 0;
	foreach ( $a ["indexes"] as $s ) {
		echo "<tr><td>" . html_select ( "indexes[$M][type]", array (- 1 => "" ) + $ad, $s ["type"], ($M == count ( $a ["indexes"] ) - 1 ? "indexesAddRow(this);" : 1) ) . "<td>\n";
		ksort ( $s ["columns"] );
		foreach ( $s ["columns"] as $i => $la ) {
			echo "<span>" . html_select ( "indexes[$M][columns][$i]", array (- 1 => "" ) + $l, $la, ($i == count ( $s ["columns"] ) ? "indexesAddColumn(this);" : 1) ), "<input name='indexes[$M][lengths][$i]' size='2' value='" . h ( $s ["lengths"] [$i] ) . "'> </span>\n";
		}
		echo "\n";
		$M ++;
	}
	echo '</table>
<p>
<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 116 ), '">
<noscript><p><input type="submit" name="add" value="', lang ( 75 ), '"></noscript>
</form>
';
} elseif (isset ( $_GET ["database"] )) {
	if ($_POST && ! $o && ! isset ( $_POST ["add_x"] )) {
		restart_session ();
		if ($_POST ["drop"]) {
			unset ( $_SESSION ["databases"] [$_GET ["server"]] );
			query_redirect ( "DROP DATABASE " . idf_escape ( DB ), remove_from_uri ( "db|database" ), lang ( 52 ) );
		} elseif (DB !== $_POST ["name"]) {
			unset ( $_SESSION ["databases"] [$_GET ["server"]] );
			$mb = explode ( "\n", str_replace ( "\r", "", $_POST ["name"] ) );
			$Bb = false;
			$Nb = "";
			foreach ( $mb as $x ) {
				if (count ( $mb ) == 1 || $x != "") {
					if (! queries ( "CREATE DATABASE " . idf_escape ( $x ) . ($_POST ["collation"] ? " COLLATE " . $d->quote ( $_POST ["collation"] ) : "") )) {
						$Bb = true;
					}
					$Nb = $x;
				}
			}
			if (query_redirect ( queries (), ME . "db=" . urlencode ( $Nb ), lang ( 135 ), DB == "", false, $Bb )) {
				$f = $d->query ( "SHOW TABLES" );
				while ( $a = $f->fetch_row () ) {
					if (! queries ( "RENAME TABLE " . idf_escape ( $a [0] ) . " TO " . idf_escape ( $_POST ["name"] ) . "." . idf_escape ( $a [0] ) )) {
						break;
					}
				}
				if (! $a) {
					queries ( "DROP DATABASE " . idf_escape ( DB ) );
				}
				queries_redirect ( preg_replace ( '~db=[^&]*&~', '', ME ) . "db=" . urlencode ( $_POST ["name"] ), lang ( 136 ), ! $a );
			}
		} else {
			if (! $_POST ["collation"]) {
				redirect ( substr ( ME, 0, - 1 ) );
			}
			query_redirect ( "ALTER DATABASE " . idf_escape ( $_POST ["name"] ) . " COLLATE " . $d->quote ( $_POST ["collation"] ), substr ( ME, 0, - 1 ), lang ( 137 ) );
		}
	}
	page_header ( DB != "" ? lang ( 138 ) : lang ( 139 ), $o, array (), DB );
	$N = collations ();
	$h = DB;
	$Db = null;
	if ($_POST) {
		$h = $_POST ["name"];
		$Db = $_POST ["collation"];
	} elseif (DB == "") {
		$f = $d->query ( "SHOW GRANTS" );
		while ( $a = $f->fetch_row () ) {
			if (preg_match ( '~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~', $a [0], $k ) && $k [1]) {
				$h = stripcslashes ( idf_unescape ( $k [2] ) );
				break;
			}
		}
	} else {
		$Db = db_collation ( DB, $N );
	}
	echo '
<form action="" method="post">
<p>
', ($_POST ["add_x"] || strpos ( $h, "\n" ) ? '<textarea name="name" rows="10" cols="40">' . h ( $h ) . '</textarea><br>' : '<input name="name" value="' . h ( $h ) . '" maxlength="64">') . "\n", html_select ( "collation", array ("" => "(" . lang ( 66 ) . ")" ) + $N, $Db ), '<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 116 ), '">
';
	if (strlen ( DB )) {
		echo "<input type='submit' name='drop' value='" . lang ( 62 ) . "'$Pa>\n";
	} elseif (! $_POST ["add_x"] && $_GET ["db"] == "") {
		echo "<input type='image' name='add' src='" . h ( preg_replace ( "~\\?.*~", "", $_SERVER ["REQUEST_URI"] ) ) . "?file=plus.gif&amp;version=2.3.2' alt='+' title='" . lang ( 75 ) . "'>\n";
	}
	echo '</form>
';
} elseif (isset ( $_GET ["call"] )) {
	$ia = $_GET ["call"];
	page_header ( lang ( 140 ) . ": " . h ( $ia ), $o );
	$na = routine ( $ia, (isset ( $_GET ["callf"] ) ? "FUNCTION" : "PROCEDURE") );
	$cb = array ();
	$Da = array ();
	foreach ( $na ["fields"] as $i => $c ) {
		if (substr ( $c ["inout"], - 3 ) == "OUT") {
			$Da [$i] = "@" . idf_escape ( $c ["field"] ) . " AS " . idf_escape ( $c ["field"] );
		}
		if (! $c ["inout"] || substr ( $c ["inout"], 0, 2 ) == "IN") {
			$cb [] = $i;
		}
	}
	if (! $o && $_POST) {
		$Xc = array ();
		foreach ( $na ["fields"] as $e => $c ) {
			if (in_array ( $e, $cb )) {
				$b = process_input ( $c );
				if ($b === false) {
					$b = "''";
				}
				if (isset ( $Da [$e] )) {
					$d->query ( "SET @" . idf_escape ( $c ["field"] ) . " = $b" );
				}
			}
			$Xc [] = (isset ( $Da [$e] ) ? "@" . idf_escape ( $c ["field"] ) : $b);
		}
		if (! $d->multi_query ( (isset ( $_GET ["callf"] ) ? "SELECT" : "CALL") . " " . idf_escape ( $ia ) . "(" . implode ( ", ", $Xc ) . ")" )) {
			echo "<p class='error'>" . error () . "\n";
		} else {
			do {
				$f = $d->store_result ();
				if (is_object ( $f )) {
					select ( $f );
				} else {
					echo "<p class='message'>" . lang ( 141, $d->affected_rows ) . "\n";
				}
			} while ( $d->next_result () );
			if ($Da) {
				select ( $d->query ( "SELECT " . implode ( ", ", $Da ) ) );
			}
		}
	}
	echo '
<form action="" method="post">
';
	if ($cb) {
		echo "<table cellspacing='0'>\n";
		foreach ( $cb as $e ) {
			$c = $na ["fields"] [$e];
			echo "<tr><th>" . h ( $c ["field"] );
			$q = $_POST ["fields"] [$e];
			if ($q != "" && ereg ( "enum|set", $c ["type"] )) {
				$q = intval ( $q );
			}
			input ( $c, $q, ( string ) $_POST ["function"] [$h] );
			echo "\n";
		}
		echo "</table>\n";
	}
	echo '<p>
<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 140 ), '">
</form>
';
} elseif (isset ( $_GET ["foreign"] )) {
	$j = $_GET ["foreign"];
	if ($_POST && ! $o && ! $_POST ["add"] && ! $_POST ["change"] && ! $_POST ["change-js"]) {
		if ($_POST ["drop"]) {
			query_redirect ( "ALTER TABLE " . idf_escape ( $j ) . "\nDROP FOREIGN KEY " . idf_escape ( $_GET ["name"] ), ME . "table=" . urlencode ( $j ), lang ( 142 ) );
		} else {
			$ca = array_filter ( $_POST ["source"], 'strlen' );
			ksort ( $ca );
			$Qa = array ();
			foreach ( $ca as $e => $b ) {
				$Qa [$e] = $_POST ["target"] [$e];
			}
			query_redirect ( "ALTER TABLE " . idf_escape ( $j ) . ($_GET ["name"] != "" ? "\nDROP FOREIGN KEY " . idf_escape ( $_GET ["name"] ) . "," : "") . "\nADD FOREIGN KEY (" . implode ( ", ", array_map ( 'idf_escape', $ca ) ) . ") REFERENCES " . idf_escape ( $_POST ["table"] ) . " (" . implode ( ", ", array_map ( 'idf_escape', $Qa ) ) . ")" . (in_array ( $_POST ["on_delete"], $Wa ) ? " ON DELETE $_POST[on_delete]" : "") . (in_array ( $_POST ["on_update"], $Wa ) ? " ON UPDATE $_POST[on_update]" : ""), ME . "table=" . urlencode ( $j ), ($_GET ["name"] != "" ? lang ( 143 ) : lang ( 144 )) );
			$o = lang ( 145 ) . "<br>$o";
		}
	}
	page_header ( lang ( 146 ), $o, array ("table" => $j ), $j );
	$a = array ("table" => $j, "source" => array ("" ) );
	if ($_POST) {
		$a = $_POST;
		ksort ( $a ["source"] );
		if ($_POST ["add"]) {
			$a ["source"] [] = "";
		} elseif ($_POST ["change"] || $_POST ["change-js"]) {
			$a ["target"] = array ();
		}
	} elseif ($_GET ["name"] != "") {
		$F = foreign_keys ( $j );
		$a = $F [$_GET ["name"]];
		$a ["source"] [] = "";
	}
	$ca = array_keys ( fields ( $j ) );
	$Qa = ($j === $a ["table"] ? $ca : array_keys ( fields ( $a ["table"] ) ));
	echo '
<form action="" method="post">
<p>
';
	if ($a ["db"] == "") {
		echo lang ( 147 ), ':
', html_select ( "table", array_keys ( table_status_referencable () ), $a ["table"], "this.form['change-js'].value = '1'; this.form.submit();" ), '<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="', lang ( 148 ), '"></noscript>
<table cellspacing="0">
<thead><tr><th>', lang ( 149 ), '<th>', lang ( 150 ), '</thead>
';
		$M = 0;
		foreach ( $a ["source"] as $e => $b ) {
			echo "<tr>", "<td>" . html_select ( "source[" . intval ( $e ) . "]", array (- 1 => "" ) + $ca, $b, ($M == count ( $a ["source"] ) - 1 ? "foreignAddRow(this);" : 1) ), "<td>" . html_select ( "target[" . intval ( $e ) . "]", $Qa, $a ["target"] [$e] );
			$M ++;
		}
		echo '</table>
<p>
', lang ( 151 ), ': ', html_select ( "on_delete", array (- 1 => "" ) + $Wa, $a ["on_delete"] ), ' ', lang ( 152 ), ': ', html_select ( "on_update", array (- 1 => "" ) + $Wa, $a ["on_update"] ), '<p>
<input type="submit" value="', lang ( 116 ), '">
<noscript><p><input type="submit" name="add" value="', lang ( 153 ), '"></noscript>
';
	}
	if ($_GET ["name"] != "") {
		echo '<input type="submit" name="drop" value="', lang ( 62 ), '"', $Pa, '>';
	}
	echo '<input type="hidden" name="token" value="', $E, '">
</form>
';
} elseif (isset ( $_GET ["view"] )) {
	$j = $_GET ["view"];
	$va = false;
	if ($_POST && ! $o) {
		$va = drop_create ( "DROP VIEW " . idf_escape ( $j ), "CREATE VIEW " . idf_escape ( $_POST ["name"] ) . " AS\n$_POST[select]", substr ( ME, 0, - 1 ), lang ( 154 ), lang ( 155 ), lang ( 156 ), $j );
	}
	page_header ( ($j != "" ? lang ( 15 ) : lang ( 157 )), $o, array ("table" => $j ), $j );
	$a = array ();
	if ($_POST) {
		$a = $_POST;
	} elseif ($j != "") {
		$a = view ( $j );
		$a ["name"] = $j;
	}
	echo '
<form action="" method="post">
<p><textarea name="select" rows="10" cols="80" style="width: 98%;">', h ( $a ["select"] ), '</textarea>
<p>
<input type="hidden" name="token" value="', $E, '">
';
	if ($va) {
		echo '<input type="hidden" name="dropped" value="1">';
	}
	echo lang ( 158 ), ': <input name="name" value="', h ( $a ["name"] ), '" maxlength="64">
<input type="submit" value="', lang ( 116 ), '">
</form>
';
} elseif (isset ( $_GET ["event"] )) {
	$Aa = $_GET ["event"];
	$Ud = array ("YEAR", "QUARTER", "MONTH", "DAY", "HOUR", "MINUTE", "WEEK", "SECOND", "YEAR_MONTH", "DAY_HOUR", "DAY_MINUTE", "DAY_SECOND", "HOUR_MINUTE", "HOUR_SECOND", "MINUTE_SECOND" );
	$Pc = array ("ENABLED" => "ENABLE", "DISABLED" => "DISABLE", "SLAVESIDE_DISABLED" => "DISABLE ON SLAVE" );
	if ($_POST && ! $o) {
		if ($_POST ["drop"]) {
			query_redirect ( "DROP EVENT " . idf_escape ( $Aa ), substr ( ME, 0, - 1 ), lang ( 159 ) );
		} elseif (in_array ( $_POST ["INTERVAL_FIELD"], $Ud ) && isset ( $Pc [$_POST ["STATUS"]] )) {
			$Vc = "\nON SCHEDULE " . ($_POST ["INTERVAL_VALUE"] ? "EVERY " . $d->quote ( $_POST ["INTERVAL_VALUE"] ) . " $_POST[INTERVAL_FIELD]" . ($_POST ["STARTS"] ? " STARTS " . $d->quote ( $_POST ["STARTS"] ) : "") . ($_POST ["ENDS"] ? " ENDS " . $d->quote ( $_POST ["ENDS"] ) : "") : "AT " . $d->quote ( $_POST ["STARTS"] )) . " ON COMPLETION" . ($_POST ["ON_COMPLETION"] ? "" : " NOT") . " PRESERVE";
			query_redirect ( ($Aa != "" ? "ALTER EVENT " . idf_escape ( $Aa ) . $Vc . ($Aa != $_POST ["EVENT_NAME"] ? "\nRENAME TO " . idf_escape ( $_POST ["EVENT_NAME"] ) : "") : "CREATE EVENT " . idf_escape ( $_POST ["EVENT_NAME"] ) . $Vc) . "\n" . $Pc [$_POST ["STATUS"]] . " COMMENT " . $d->quote ( $_POST ["EVENT_COMMENT"] ) . " DO\n$_POST[EVENT_DEFINITION]", substr ( ME, 0, - 1 ), ($Aa != "" ? lang ( 160 ) : lang ( 161 )) );
		}
	}
	page_header ( ($Aa != "" ? lang ( 162 ) . ": " . h ( $Aa ) : lang ( 163 )), $o );
	$a = array ();
	if ($_POST) {
		$a = $_POST;
	} elseif ($Aa != "") {
		$f = $d->query ( "SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = " . $d->quote ( DB ) . " AND EVENT_NAME = " . $d->quote ( $Aa ) );
		$a = $f->fetch_assoc ();
	}
	echo '
<form action="" method="post">
<table cellspacing="0">
<tr><th>', lang ( 158 ), '<td><input name="EVENT_NAME" value="', h ( $a ["EVENT_NAME"] ), '" maxlength="64">
<tr><th>', lang ( 164 ), '<td><input name="STARTS" value="', h ( "$a[EXECUTE_AT]$a[STARTS]" ), '">
<tr><th>', lang ( 165 ), '<td><input name="ENDS" value="', h ( $a ["ENDS"] ), '">
<tr><th>', lang ( 166 ), '<td><input name="INTERVAL_VALUE" value="', h ( $a ["INTERVAL_VALUE"] ), '" size="6"> ', html_select ( "INTERVAL_FIELD", $Ud, $a ["INTERVAL_FIELD"] ), '<tr><th>', lang ( 58 ), '<td>', html_select ( "STATUS", $Pc, $a ["STATUS"] ), '<tr><th>', lang ( 74 ), '<td><input name="EVENT_COMMENT" value="', h ( $a ["EVENT_COMMENT"] ), '" maxlength="64">
<tr><th>&nbsp;<td>', checkbox ( "ON_COMPLETION", "PRESERVE", $a ["ON_COMPLETION"] == "PRESERVE", lang ( 167 ) ), '</table>
<p><textarea name="EVENT_DEFINITION" rows="10" cols="80" style="width: 98%;">', h ( $a ["EVENT_DEFINITION"] ), '</textarea>
<p>
<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 116 ), '">
';
	if ($Aa != "") {
		echo '<input type="submit" name="drop" value="', lang ( 62 ), '"', $Pa, '>';
	}
	echo '</form>
';
} elseif (isset ( $_GET ["procedure"] )) {
	$ia = $_GET ["procedure"];
	$na = (isset ( $_GET ["function"] ) ? "FUNCTION" : "PROCEDURE");
	$va = false;
	if ($_POST && ! $o && ! $_POST ["add"] && ! $_POST ["drop_col"] && ! $_POST ["up"] && ! $_POST ["down"]) {
		$u = array ();
		$l = ( array ) $_POST ["fields"];
		ksort ( $l );
		foreach ( $l as $c ) {
			if ($c ["field"] != "") {
				$u [] = (in_array ( $c ["inout"], $eb ) ? "$c[inout] " : "") . idf_escape ( $c ["field"] ) . process_type ( $c, "CHARACTER SET" );
			}
		}
		$va = drop_create ( "DROP $na " . idf_escape ( $ia ), "CREATE $na " . idf_escape ( $_POST ["name"] ) . " (" . implode ( ", ", $u ) . ")" . (isset ( $_GET ["function"] ) ? " RETURNS" . process_type ( $_POST ["returns"], "CHARACTER SET" ) : "") . "\n$_POST[definition]", substr ( ME, 0, - 1 ), lang ( 168 ), lang ( 169 ), lang ( 170 ), $ia );
	}
	page_header ( ($ia != "" ? (isset ( $_GET ["function"] ) ? lang ( 171 ) : lang ( 172 )) . ": " . h ( $ia ) : (isset ( $_GET ["function"] ) ? lang ( 173 ) : lang ( 174 ))), $o );
	$N = get_vals ( "SHOW CHARACTER SET" );
	sort ( $N );
	$a = array ("fields" => array () );
	if ($_POST) {
		$a = $_POST;
		$a ["fields"] = ( array ) $a ["fields"];
		process_fields ( $a ["fields"] );
	} elseif ($ia != "") {
		$a = routine ( $ia, $na );
		$a ["name"] = $ia;
	}
	echo '
<form action="" method="post" id="form">
<table cellspacing="0" class="nowrap">
';
	edit_fields ( $a ["fields"], $N, $na );
	if (isset ( $_GET ["function"] )) {
		echo "<tr><td>" . lang ( 175 );
		edit_type ( "returns", $a ["returns"], $N );
	}
	echo '</table>
<p><textarea name="definition" rows="10" cols="80" style="width: 98%;">', h ( $a ["definition"] ), '</textarea>
<p>
<input type="hidden" name="token" value="', $E, '">
';
	if ($va) {
		echo '<input type="hidden" name="dropped" value="1">';
	}
	echo lang ( 158 ), ': <input name="name" value="', h ( $a ["name"] ), '" maxlength="64">
<input type="submit" value="', lang ( 116 ), '">
';
	if ($ia != "") {
		echo '<input type="submit" name="drop" value="', lang ( 62 ), '"', $Pa, '>';
	}
	echo '</form>
';
} elseif (isset ( $_GET ["trigger"] )) {
	$j = $_GET ["trigger"];
	$Zc = array ("BEFORE", "AFTER" );
	$Tc = array ("INSERT", "UPDATE", "DELETE" );
	$va = false;
	if ($_POST && ! $o && in_array ( $_POST ["Timing"], $Zc ) && in_array ( $_POST ["Event"], $Tc )) {
		$va = drop_create ( "DROP TRIGGER " . idf_escape ( $_GET ["name"] ), "CREATE TRIGGER " . idf_escape ( $_POST ["Trigger"] ) . " $_POST[Timing] $_POST[Event] ON " . idf_escape ( $j ) . " FOR EACH ROW\n$_POST[Statement]", ME . "table=" . urlencode ( $j ), lang ( 176 ), lang ( 177 ), lang ( 178 ), $_GET ["name"] );
	}
	page_header ( ($_GET ["name"] != "" ? lang ( 179 ) . ": " . h ( $_GET ["name"] ) : lang ( 180 )), $o, array ("table" => $j ) );
	$a = array ("Trigger" => $j . "_bi" );
	if ($_POST) {
		$a = $_POST;
	} elseif ($_GET ["name"] != "") {
		$f = $d->query ( "SHOW TRIGGERS WHERE `Trigger` = " . $d->quote ( $_GET ["name"] ) );
		$a = $f->fetch_assoc ();
	}
	echo '
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>', lang ( 181 ), '<td>', html_select ( "Timing", $Zc, $a ["Timing"], "if (/^" . h ( preg_quote ( $j, "/" ) ) . "_[ba][iud]$/.test(this.form['Trigger'].value)) this.form['Trigger'].value = '" . h ( addcslashes ( $j, "\r\n'\\" ) ) . "_' + selectValue(this).charAt(0).toLowerCase() + selectValue(this.form['Event']).charAt(0).toLowerCase();" ), '<tr><th>', lang ( 182 ), '<td>', html_select ( "Event", $Tc, $a ["Event"], "this.form['Timing'].onchange();" ), '<tr><th>', lang ( 158 ), '<td><input name="Trigger" value="', h ( $a ["Trigger"] ), '" maxlength="64">
</table>
<p><textarea name="Statement" rows="10" cols="80" style="width: 98%;">', h ( $a ["Statement"] ), '</textarea>
<p>
<input type="hidden" name="token" value="', $E, '">
';
	if ($va) {
		echo '<input type="hidden" name="dropped" value="1">';
	}
	echo '<input type="submit" value="', lang ( 116 ), '">
';
	if ($_GET ["name"] != "") {
		echo '<input type="submit" name="drop" value="', lang ( 62 ), '"', $Pa, '>';
	}
	echo '</form>
';
} elseif (isset ( $_GET ["user"] )) {
	$pc = $_GET ["user"];
	$L = array ("" => array ("All privileges" => "" ) );
	$f = $d->query ( "SHOW PRIVILEGES" );
	while ( $a = $f->fetch_assoc () ) {
		foreach ( explode ( ",", ($a ["Privilege"] == "Grant option" ? "" : $a ["Context"]) ) as $Ub ) {
			$L [$Ub] [$a ["Privilege"]] = $a ["Comment"];
		}
	}
	$L ["Server Admin"] += $L ["File access on server"];
	$L ["Databases"] ["Create routine"] = $L ["Procedures"] ["Create routine"];
	unset ( $L ["Procedures"] ["Create routine"] );
	$L ["Columns"] = array ();
	foreach ( array ("Select", "Insert", "Update", "References" ) as $b ) {
		$L ["Columns"] [$b] = $L ["Tables"] [$b];
	}
	unset ( $L ["Server Admin"] ["Usage"] );
	foreach ( $L ["Tables"] as $e => $b ) {
		unset ( $L ["Databases"] [$e] );
	}
	$Gb = array ();
	if ($_POST) {
		foreach ( $_POST ["objects"] as $e => $b ) {
			$Gb [$b] = ( array ) $Gb [$b] + ( array ) $_POST ["grants"] [$e];
		}
	}
	$Fa = array ();
	$uc = "";
	if (isset ( $_GET ["host"] ) && ($f = $d->query ( "SHOW GRANTS FOR " . $d->quote ( $pc ) . "@" . $d->quote ( $_GET ["host"] ) ))) {
		while ( $a = $f->fetch_row () ) {
			if (preg_match ( '~GRANT (.*) ON (.*) TO ~', $a [0], $k ) && preg_match_all ( '~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~', $k [1], $I, PREG_SET_ORDER )) {
				foreach ( $I as $b ) {
					if ($b [1] != "USAGE") {
						$Fa ["$k[2]$b[2]"] [$b [1]] = true;
					}
					if (ereg ( ' WITH GRANT OPTION', $a [0] )) {
						$Fa ["$k[2]$b[2]"] ["GRANT OPTION"] = true;
					}
				}
			}
			if (preg_match ( "~ IDENTIFIED BY PASSWORD '([^']+)~", $a [0], $k )) {
				$uc = $k [1];
			}
		}
	}
	if ($_POST && ! $o) {
		$ob = (isset ( $_GET ["host"] ) ? $d->quote ( $pc ) . "@" . $d->quote ( $_GET ["host"] ) : "''");
		$za = $d->quote ( $_POST ["user"] ) . "@" . $d->quote ( $_POST ["host"] );
		$wc = $d->quote ( $_POST ["pass"] );
		if ($_POST ["drop"]) {
			query_redirect ( "DROP USER $ob", ME . "privileges=", lang ( 183 ) );
		} else {
			if ($ob != $za) {
				$o = ! queries ( ($d->server_info < 5 ? "GRANT USAGE ON *.* TO" : "CREATE USER") . " $za IDENTIFIED BY" . ($_POST ["hashed"] ? " PASSWORD" : "") . " $wc" );
			} elseif ($_POST ["pass"] != $uc || ! $_POST ["hashed"]) {
				queries ( "SET PASSWORD FOR $za = " . ($_POST ["hashed"] ? $wc : "PASSWORD($wc)") );
			}
			if (! $o) {
				$ub = array ();
				foreach ( $Gb as $ta => $H ) {
					if (isset ( $_GET ["grant"] )) {
						$H = array_filter ( $H );
					}
					$H = array_keys ( $H );
					if (isset ( $_GET ["grant"] )) {
						$ub = array_diff ( array_keys ( array_filter ( $Gb [$ta], 'strlen' ) ), $H );
					} elseif ($ob == $za) {
						$Qd = array_keys ( ( array ) $Fa [$ta] );
						$ub = array_diff ( $Qd, $H );
						$H = array_diff ( $H, $Qd );
						unset ( $Fa [$ta] );
					}
					if (preg_match ( '~^(.+)\\s*(\\(.*\\))?$~U', $ta, $k ) && (! grant ( "REVOKE", $ub, $k [2], " ON $k[1] FROM $za" ) || ! grant ( "GRANT", $H, $k [2], " ON $k[1] TO $za" ))) {
						$o = true;
						break;
					}
				}
			}
			if (! $o && isset ( $_GET ["host"] )) {
				if ($ob != $za) {
					queries ( "DROP USER $ob" );
				} elseif (! isset ( $_GET ["grant"] )) {
					foreach ( $Fa as $ta => $ub ) {
						if (preg_match ( '~^(.+)(\\(.*\\))?$~U', $ta, $k )) {
							grant ( "REVOKE", array_keys ( $ub ), $k [2], " ON $k[1] FROM $za" );
						}
					}
				}
			}
			queries_redirect ( ME . "privileges=", (isset ( $_GET ["host"] ) ? lang ( 184 ) : lang ( 185 )), ! $o );
			if ($ob != $za) {
				$d->query ( "DROP USER $za" );
			}
		}
	}
	page_header ( (isset ( $_GET ["host"] ) ? lang ( 8 ) . ": " . h ( "$pc@$_GET[host]" ) : lang ( 98 )), $o, array ("privileges" => array ('', lang ( 55 ) ) ) );
	if ($_POST) {
		$a = $_POST;
		$Fa = $Gb;
	} else {
		$a = $_GET + array ("host" => $d->result ( $d->query ( "SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)" ) ) );
		$a ["pass"] = $uc;
		$a ["hashed"] = true;
		$Fa [""] = true;
	}
	echo '<form action="" method="post">
<table cellspacing="0">
<tr><th>', lang ( 8 ), '<td><input name="user" maxlength="16" value="', h ( $a ["user"] ), '">
<tr><th>', lang ( 7 ), '<td><input name="host" maxlength="60" value="', h ( $a ["host"] ), '">
<tr><th>', lang ( 9 ), '<td><input id="pass" name="pass" value="', h ( $a ["pass"] ), '">
';
	if (! $a ["hashed"]) {
		echo '<script type="text/javascript">typePassword(document.getElementById(\'pass\'));</script>';
	}
	echo checkbox ( "hashed", 1, $a ["hashed"], lang ( 186 ), "typePassword(this.form['pass'], this.checked);" ), '</table>

';
	echo "<table cellspacing='0'>\n", "<thead><tr><th colspan='2'><a href='http://dev.mysql.com/doc/refman/" . substr ( $d->server_info, 0, 3 ) . "/en/grant.html'>" . lang ( 55 ) . "</a>";
	$i = 0;
	foreach ( $Fa as $ta => $H ) {
		echo '<th>' . ($ta != "*.*" ? "<input name='objects[$i]' value='" . h ( $ta ) . "' size='10'>" : "<input type='hidden' name='objects[$i]' value='*.*' size='10'>*.*");
		$i ++;
	}
	echo "</thead>\n";
	foreach ( array ("" => "", "Server Admin" => lang ( 7 ), "Databases" => lang ( 50 ), "Tables" => lang ( 80 ), "Columns" => lang ( 81 ), "Procedures" => lang ( 187 ) ) as $Ub => $wb ) {
		foreach ( ( array ) $L [$Ub] as $rb => $Zb ) {
			echo "<tr" . odd () . "><td" . ($wb ? ">$wb<td" : " colspan='2'") . ' lang="en" title="' . h ( $Zb ) . '">' . h ( $rb );
			$i = 0;
			foreach ( $Fa as $ta => $H ) {
				$h = "'grants[$i][" . h ( strtoupper ( $rb ) ) . "]'";
				$q = $H [strtoupper ( $rb )];
				if ($Ub == "Server Admin" && $ta != (isset ( $Fa ["*.*"] ) ? "*.*" : "")) {
					echo "<td>&nbsp;";
				} elseif (isset ( $_GET ["grant"] )) {
					echo "<td><select name=$h><option><option value='1'" . ($q ? " selected" : "") . ">" . lang ( 188 ) . "<option value='0'" . ($q == "0" ? " selected" : "") . ">" . lang ( 189 ) . "</select>";
				} else {
					echo "<td align='center'><input type='checkbox' name=$h value='1'" . ($q ? " checked" : "") . ($rb == "All privileges" ? " id='grants-$i-all'" : ($rb == "Grant option" ? "" : " onclick=\"if (this.checked) formUncheck('grants-$i-all');\"")) . ">";
				}
				$i ++;
			}
		}
	}
	echo "</table>\n", '<p>
<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 116 ), '">
';
	if (isset ( $_GET ["host"] )) {
		echo '<input type="submit" name="drop" value="', lang ( 62 ), '"', $Pa, '>';
	}
	echo '</form>
';
} elseif (isset ( $_GET ["processlist"] )) {
	if ($_POST && ! $o) {
		$_c = 0;
		foreach ( ( array ) $_POST ["kill"] as $b ) {
			if (queries ( "KILL " . ereg_replace ( "[^0-9]+", "", $b ) )) {
				$_c ++;
			}
		}
		queries_redirect ( ME . "processlist=", lang ( 190, $_c ), $_c || ! $_POST ["kill"] );
	}
	page_header ( lang ( 56 ), $o );
	echo '
<form action="" method="post">
<table cellspacing="0" onclick="tableClick(event);">
';
	$f = $d->query ( "SHOW PROCESSLIST" );
	for($i = 0; $a = $f->fetch_assoc (); $i ++) {
		if (! $i) {
			echo "<thead><tr lang='en'><th>&nbsp;<th>" . implode ( "<th>", array_keys ( $a ) ) . "</thead>\n";
		}
		echo "<tr" . odd () . "><td>" . checkbox ( "kill[]", $a ["Id"], 0 ) . "<td>" . implode ( "<td>", array_map ( 'nbsp', $a ) ) . "\n";
	}
	echo '</table>
<p>
<input type="hidden" name="token" value="', $E, '">
<input type="submit" value="', lang ( 191 ), '">
</form>
';
} elseif (isset ( $_GET ["select"] )) {
	$j = $_GET ["select"];
	$Y = table_status ( $j );
	$w = indexes ( $j );
	$l = fields ( $j );
	$F = column_foreign_keys ( $j );
	$Yd = array ();
	$t = array ();
	unset ( $Oa );
	foreach ( $l as $e => $c ) {
		$h = $p->fieldName ( $c );
		if (isset ( $c ["privileges"] ["select"] ) && $h != "") {
			$t [$e] = html_entity_decode ( strip_tags ( $h ) );
			if (ereg ( 'text|blob', $c ["type"] )) {
				$Oa = $p->selectLengthProcess ();
			}
		}
		$Yd += $c ["privileges"];
	}
	list ( $v, $ga ) = $p->selectColumnsProcess ( $t, $w );
	$D = $p->selectSearchProcess ( $l, $w );
	$Ja = $p->selectOrderProcess ( $l, $w );
	$oa = $p->selectLimitProcess ();
	$fb = ($v ? implode ( ", ", $v ) : "*") . "\nFROM " . idf_escape ( $j ) . ($D ? "\nWHERE " . implode ( " AND ", $D ) : "");
	$oc = ($ga && count ( $ga ) < count ( $v ) ? "\nGROUP BY " . implode ( ", ", $ga ) : "") . ($Ja ? "\nORDER BY " . implode ( ", ", $Ja ) : "");
	if ($_POST && ! $o) {
		$Rd = "(" . implode ( ") OR (", array_map ( 'where_check', ( array ) $_POST ["check"] ) ) . ")";
		$lc = ($w ["PRIMARY"] ? ($v ? array_flip ( $w ["PRIMARY"] ["columns"] ) : array ()) : null);
		foreach ( $v as $e => $b ) {
			$b = $_GET ["columns"] [$e];
			if (! $b ["fun"]) {
				unset ( $lc [$b ["col"]] );
			}
		}
		if ($_POST ["export"]) {
			dump_headers ( $j );
			dump_table ( $j, "" );
			if ($_POST ["format"] != "sql") {
				$a = array_keys ( $l );
				if ($v) {
					$a = array ();
					foreach ( $v as $b ) {
						$a [] = (ereg ( '^`(.*)`$', $b, $k ) ? idf_unescape ( $k [1] ) : $b);
					}
				}
				dump_csv ( $a );
			}
			if (! is_array ( $_POST ["check"] ) || $lc === array ()) {
				dump_data ( $j, "INSERT", "SELECT $fb" . (is_array ( $_POST ["check"] ) ? ($D ? " AND " : " WHERE ") . "($Rd)" : "") . $oc );
			} else {
				$Td = array ();
				foreach ( $_POST ["check"] as $b ) {
					$Td [] = "(SELECT $fb " . ($D ? "AND " : "WHERE ") . where_check ( $b ) . $oc . " LIMIT 1)";
				}
				dump_data ( $j, "INSERT", implode ( " UNION ALL ", $Td ) );
			}
			exit ();
		}
		if (! $p->selectEmailProcess ( $D, $F )) {
			if (! $_POST ["import"]) {
				$f = true;
				$pb = 0;
				$kc = ($_POST ["delete"] ? "DELETE FROM " : ($_POST ["clone"] ? "INSERT INTO " : "UPDATE ")) . idf_escape ( $j );
				$u = array ();
				if (! $_POST ["delete"]) {
					foreach ( $t as $h => $b ) {
						$b = process_input ( $l [$h] );
						if ($_POST ["clone"]) {
							$u [idf_escape ( $h )] = ($b !== false ? $b : idf_escape ( $h ));
						} elseif ($b !== false) {
							$u [] = idf_escape ( $h ) . " = $b";
						}
					}
					$kc .= ($_POST ["clone"] ? " (" . implode ( ", ", array_keys ( $u ) ) . ")\nSELECT " . implode ( ", ", $u ) . "\nFROM " . idf_escape ( $j ) : " SET\n" . implode ( ",\n", $u ));
				}
				if ($_POST ["delete"] || $u) {
					if ($_POST ["all"] || ($lc === array () && $_POST ["check"])) {
						$f = queries ( $kc . ($_POST ["all"] ? ($D ? "\nWHERE " . implode ( " AND ", $D ) : "") : "\nWHERE $Rd") );
						$pb = $d->affected_rows;
					} else {
						foreach ( ( array ) $_POST ["check"] as $b ) {
							$f = queries ( $kc . "\nWHERE " . where_check ( $b ) . (count ( $ga ) < count ( $v ) ? "" : "\nLIMIT 1") );
							if (! $f) {
								break;
							}
							$pb += $d->affected_rows;
						}
					}
				}
				queries_redirect ( remove_from_uri ( "page" ), lang ( 192, $pb ), $f );
			} elseif (is_string ( $Q = get_file ( "csv_file", true ) )) {
				$Q = preg_replace ( "~^\xEF\xBB\xBF~", '', $Q );
				$f = true;
				$Ta = array_keys ( $l );
				preg_match_all ( '~(?>"[^"]*"|[^"\\r\\n]+)+~', $Q, $I );
				$pb = count ( $I [0] );
				queries ( "START TRANSACTION" );
				foreach ( $I [0] as $e => $b ) {
					preg_match_all ( '~(("[^"]*")+|[^,]*),~', "$b,", $Dc );
					if (! $e && ! array_diff ( $Dc [1], $Ta )) {
						$Ta = $Dc [1];
						$pb --;
					} else {
						$u = "";
						foreach ( $Dc [1] as $i => $Ob ) {
							$u .= ", " . idf_escape ( $Ta [$i] ) . " = " . ($Ob == "" && $l [$Ta [$i]] ["null"] ? "NULL" : $d->quote ( str_replace ( '""', '"', preg_replace ( '~^"|"$~', '', $Ob ) ) ));
						}
						$u = substr ( $u, 1 );
						$f = queries ( "INSERT INTO " . idf_escape ( $_GET ["select"] ) . " SET$u ON DUPLICATE KEY UPDATE$u" );
						if (! $f) {
							break;
						}
					}
				}
				if ($f) {
					queries ( "COMMIT" );
				}
				queries_redirect ( remove_from_uri ( "page" ), lang ( 193, $pb ), $f );
				queries ( "ROLLBACK" );
			} else {
				$o = upload_error ( $Q );
			}
		}
	}
	$X = $p->tableName ( $Y );
	page_header ( lang ( 19 ) . ": $X", $o );
	$u = null;
	if (isset ( $Yd ["insert"] )) {
		$u = "";
		foreach ( ( array ) $_GET ["where"] as $b ) {
			if (count ( $F [$b ["col"]] ) == 1 && ($b ["op"] == "=" || (! $b ["op"] && ! ereg ( '[_%]', $b ["val"] )))) {
				$u .= "&set" . urlencode ( "[" . bracket_escape ( $b ["col"] ) . "]" ) . "=" . urlencode ( $b ["val"] );
			}
		}
	}
	$p->selectLinks ( $Y, $u );
	if (! $t) {
		echo "<p class='error'>" . lang ( 194 ) . ($l ? "" : ": " . error ()) . ".\n";
	} else {
		echo "<form action='' id='form'>\n", "<div style='display: none;'>", ($_GET ["server"] != "" ? '<input type="hidden" name="server" value="' . h ( $_GET ["server"] ) . '">' : ""), (DB != "" ? '<input type="hidden" name="db" value="' . h ( DB ) . '">' : "");
		echo '<input type="hidden" name="select" value="' . h ( $j ) . '">', "</div>\n";
		$p->selectColumnsPrint ( $v, $t );
		$p->selectSearchPrint ( $D, $t, $w );
		$p->selectOrderPrint ( $Ja, $t, $w );
		$p->selectLimitPrint ( $oa );
		$p->selectLengthPrint ( $Oa );
		$p->selectActionPrint ( $Oa );
		echo "</form>\n";
		$m = "SELECT " . (intval ( $oa ) && $ga && count ( $ga ) < count ( $v ) ? "SQL_CALC_FOUND_ROWS " : "") . $fb . $oc . ($oa != "" ? "\nLIMIT " . intval ( $oa ) . ($_GET ["page"] ? " OFFSET " . ($oa * $_GET ["page"]) : "") : "");
		echo $p->selectQuery ( $m );
		$f = $d->query ( $m );
		if (! $f) {
			echo "<p class='error'>" . error () . "\n";
		} else {
			$Yb = array ();
			echo "<form action='' method='post' enctype='multipart/form-data'>\n";
			if (! $f->num_rows) {
				echo "<p class='message'>" . lang ( 64 ) . "\n";
			} else {
				$Ra = array ();
				while ( $a = $f->fetch_assoc () ) {
					$Ra [] = $a;
				}
				$Eb = (intval ( $oa ) && $ga && count ( $ga ) < count ( $v ) ? $d->result ( $d->query ( " SELECT FOUND_ROWS()" ) ) : count ( $Ra ));
				$sd = $p->backwardKeys ( $j, $X );
				echo "<table cellspacing='0' class='nowrap' onclick='tableClick(event);'>\n", "<thead><tr><td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'>";
				$Sc = array ();
				reset ( $v );
				$Ja = 1;
				foreach ( $Ra [0] as $e => $b ) {
					$b = $_GET ["columns"] [key ( $v )];
					$c = $l [$v ? $b ["col"] : $e];
					$h = ($c ? $p->fieldName ( $c, $Ja ) : "*");
					if ($h != "") {
						$Ja ++;
						$Sc [$e] = $h;
						echo '<th><a href="' . h ( remove_from_uri ( '(order|desc)[^=]*|page' ) . '&order%5B0%5D=' . urlencode ( $e ) . ($_GET ["order"] [0] == $e && ! $_GET ["desc"] [0] ? '&desc%5B0%5D=1' : '') ) . '">' . apply_sql_function ( $b ["fun"], $h ) . "</a>";
					}
					next ( $v );
				}
				echo ($sd ? "<th>" . lang ( 195 ) : "") . "</thead>\n";
				foreach ( $p->rowDescriptions ( $Ra, $F ) as $G => $a ) {
					$Lc = unique_array ( $a, $w );
					$zb = "";
					foreach ( $Lc as $e => $b ) {
						$zb .= "&" . (isset ( $b ) ? urlencode ( "where[" . bracket_escape ( $e ) . "]" ) . "=" . urlencode ( $b ) : "null%5B%5D=" . urlencode ( $e ));
					}
					echo "<tr" . odd () . "><td>" . checkbox ( "check[]", substr ( $zb, 1 ), in_array ( substr ( $zb, 1 ), ( array ) $_POST ["check"] ), "", "this.form['all'].checked = false; formUncheck('all-page');" ) . (count ( $v ) != count ( $ga ) || information_schema ( DB ) ? '' : " <a href='" . h ( ME . "edit=" . urlencode ( $j ) . $zb ) . "'>" . lang ( 97 ) . "</a>");
					foreach ( $a as $e => $b ) {
						if (isset ( $Sc [$e] )) {
							$c = $l [$e];
							if ($b != "" && (! isset ( $Yb [$e] ) || $Yb [$e] != "")) {
								$Yb [$e] = (is_email ( $b ) ? $Sc [$e] : "");
							}
							$y = "";
							$b = $p->editVal ( $b, $c );
							if (! isset ( $b )) {
								$b = "<i>NULL</i>";
							} else {
								if (ereg ( 'blob|binary', $c ["type"] ) && $b != "") {
									$y = h ( ME . 'download=' . urlencode ( $j ) . '&field=' . urlencode ( $e ) . $zb );
								}
								if ($b == "") {
									$b = "&nbsp;";
								} elseif ($Oa != "" && ereg ( 'text|blob', $c ["type"] ) && is_utf8 ( $b )) {
									$b = shorten_utf8 ( $b, max ( 0, intval ( $Oa ) ) );
								} else {
									$b = h ( $b );
								}
								if (! $y) {
									foreach ( ( array ) $F [$e] as $J ) {
										if (count ( $F [$e] ) == 1 || count ( $J ["source"] ) == 1) {
											foreach ( $J ["source"] as $i => $ca ) {
												$y .= where_link ( $i, $J ["target"] [$i], $Ra [$G] [$ca] );
											}
											$y = h ( ($J ["db"] != "" ? preg_replace ( '~([?&]db=)[^&]+~', '\\1' . urlencode ( $J ["db"] ), ME ) : ME) . 'select=' . urlencode ( $J ["table"] ) . $y );
											break;
										}
									}
								}
								if ($e == "COUNT(*)") {
									$y = h ( ME . "select=" . urlencode ( $j ) );
									$i = 0;
									foreach ( ( array ) $_GET ["where"] as $r ) {
										if (! array_key_exists ( $r ["col"], $Lc )) {
											$y .= h ( where_link ( $i ++, $r ["col"], $r ["val"], urlencode ( $r ["op"] ) ) );
										}
									}
									foreach ( $Lc as $fa => $r ) {
										$y .= h ( where_link ( $i ++, $fa, $r, (isset ( $r ) ? "=" : "IS NULL") ) );
									}
								}
							}
							if (! $y && is_email ( $b )) {
								$y = "mailto:$b";
							}
							if (! $y && is_url ( $a [$e] )) {
								$y = "http://www.adminer.org/redirect/?url=" . urlencode ( $a [$e] );
							}
							$b = $p->selectVal ( $b, $y, $c );
							echo "<td>$b";
						}
					}
					$p->backwardKeysPrint ( $sd, $Ra [$G] );
					echo "</tr>\n";
				}
				echo "</table>\n";
				if (intval ( $oa ) && count ( $ga ) >= count ( $v )) {
					ob_flush ();
					flush ();
					$Eb = $d->result ( $d->query ( "SELECT COUNT(*) FROM " . idf_escape ( $j ) . ($D ? " WHERE " . implode ( " AND ", $D ) : "") ) );
				}
				echo "<p class='pages'>";
				if (intval ( $oa ) && $Eb > $oa) {
					$Jc = floor ( ($Eb - 1) / $oa );
					echo lang ( 196 ) . ":" . pagination ( 0 ) . ($_GET ["page"] > 3 ? " ..." : "");
					for($i = max ( 1, $_GET ["page"] - 2 ); $i < min ( $Jc, $_GET ["page"] + 3 ); $i ++) {
						echo pagination ( $i );
					}
					echo ($_GET ["page"] + 3 < $Jc ? " ..." : "") . pagination ( $Jc );
				}
				echo " (" . lang ( 101, $Eb ) . ") " . checkbox ( "all", 1, 0, lang ( 197 ) ) . "\n", (information_schema ( DB ) ? "" : "<fieldset><legend>" . lang ( 17 ) . "</legend><div><input type='submit' name='edit' value='" . lang ( 17 ) . "'> <input type='submit' name='clone' value='" . lang ( 198 ) . "'> <input type='submit' name='delete' value='" . lang ( 119 ) . "' onclick=\"return confirm('" . lang ( 63 ) . " (' + (this.form['all'].checked ? $Eb : formChecked(this, /check/)) + ')');\"></div></fieldset>\n");
				print_fieldset ( "export", lang ( 89 ) );
				echo $p->dumpOutput ( 1 ) . " " . $p->dumpFormat ( 1 );
				echo " <input type='submit' name='export' value='" . lang ( 89 ) . "'>\n", "</div></fieldset>\n";
			}
			print_fieldset ( "import", lang ( 199 ), ! $f->num_rows );
			echo "<input type='hidden' name='token' value='$E'><input type='file' name='csv_file'> <input type='submit' name='import' value='" . lang ( 200 ) . "'>\n", "</div></fieldset>\n";
			$p->selectEmailPrint ( array_filter ( $Yb, 'strlen' ), $t );
			echo "</form>\n";
		}
	}
} elseif (isset ( $_GET ["variables"] )) {
	$Sa = isset ( $_GET ["status"] );
	page_header ( $Sa ? lang ( 58 ) : lang ( 57 ) );
	$f = $d->query ( $Sa ? "SHOW STATUS" : "SHOW VARIABLES" );
	echo "<table cellspacing='0'>\n";
	while ( $a = $f->fetch_assoc () ) {
		echo "<tr>", "<th><code class='jush-" . ($Sa ? "sqlstatus" : "sqlset") . "'>" . h ( $a ["Variable_name"] ) . "</code>", "<td>" . nbsp ( $a ["Value"] );
	}
	echo "</table>\n";
} else {
	$Ec = array_merge ( ( array ) $_POST ["tables"], ( array ) $_POST ["views"] );
	if ($Ec && ! $o && ! $_POST ["search"]) {
		$f = true;
		$ma = "";
		if (count ( $_POST ["tables"] ) > 1 && ($_POST ["drop"] || $_POST ["truncate"])) {
			queries ( "SET foreign_key_checks = 0" );
		}
		if (isset ( $_POST ["truncate"] )) {
			foreach ( ( array ) $_POST ["tables"] as $n ) {
				if (! queries ( "TRUNCATE " . idf_escape ( $n ) )) {
					$f = false;
					break;
				}
			}
			$ma = lang ( 201 );
		} elseif (isset ( $_POST ["move"] )) {
			$_d = array ();
			foreach ( $Ec as $n ) {
				$_d [] = idf_escape ( $n ) . " TO " . idf_escape ( $_POST ["target"] ) . "." . idf_escape ( $n );
			}
			$f = queries ( "RENAME TABLE " . implode ( ", ", $_d ) );
			$ma = lang ( 202 );
		} elseif ((! isset ( $_POST ["drop"] ) || ! $_POST ["views"] || queries ( "DROP VIEW " . implode ( ", ", array_map ( 'idf_escape', $_POST ["views"] ) ) )) && (! $_POST ["tables"] || ($f = queries ( (isset ( $_POST ["optimize"] ) ? "OPTIMIZE" : (isset ( $_POST ["check"] ) ? "CHECK" : (isset ( $_POST ["repair"] ) ? "REPAIR" : (isset ( $_POST ["drop"] ) ? "DROP" : "ANALYZE")))) . " TABLE " . implode ( ", ", array_map ( 'idf_escape', $_POST ["tables"] ) ) )))) {
			if (isset ( $_POST ["drop"] )) {
				$ma = lang ( 203 );
			} else {
				while ( $a = $f->fetch_assoc () ) {
					$ma .= h ( "$a[Table]: $a[Msg_text]" ) . "<br>";
				}
			}
		}
		queries_redirect ( substr ( ME, 0, - 1 ), $ma, $f );
	}
	page_header ( lang ( 50 ) . ": " . h ( DB ), $o, false );
	echo '<p><a href="' . h ( ME ) . 'database=">' . lang ( 138 ) . "</a>\n", '<a href="' . h ( ME ) . 'schema=">' . lang ( 88 ) . "</a>\n", "<h3>" . lang ( 204 ) . "</h3>\n";
	$Y = table_status ();
	if (! $Y) {
		echo "<p class='message'>" . lang ( 4 ) . "\n";
	} else {
		echo "<form action='' method='post'>\n", "<p><input name='query' value='" . h ( $_POST ["query"] ) . "'> <input type='submit' name='search' value='" . lang ( 22 ) . "'>\n";
		if ($_POST ["search"] && $_POST ["query"] != "") {
			$_GET ["where"] [0] ["op"] = "LIKE";
			$_GET ["where"] [0] ["val"] = "%$_POST[query]%";
			search_tables ();
		}
		echo "<table cellspacing='0' class='nowrap' onclick='tableClick(event);'>\n", '<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^(tables|views)\[/);"><th>' . lang ( 80 ) . '<td>' . lang ( 205 ) . '<td>' . lang ( 61 ) . '<td>' . lang ( 206 ) . '<td>' . lang ( 207 ) . '<td>' . lang ( 208 ) . '<td>' . lang ( 72 ) . '<td>' . lang ( 209 ) . '<td>' . lang ( 74 ) . "</thead>\n";
		$Ad = array ();
		foreach ( $Y as $a ) {
			$h = $a ["Name"];
			echo '<tr' . odd () . '><td>' . checkbox ( (isset ( $a ["Rows"] ) ? "tables[]" : "views[]"), $h, in_array ( $h, $Ec, true ), "", "formUncheck('check-all');" ), '<th><a href="' . h ( ME ) . 'table=' . urlencode ( $h ) . '">' . h ( $h ) . '</a>';
			if (isset ( $a ["Rows"] )) {
				echo "<td>$a[Engine]<td>$a[Collation]";
				foreach ( array ("Data_length" => "create", "Index_length" => "indexes", "Data_free" => "edit", "Auto_increment" => "auto_increment=1&create", "Rows" => "select" ) as $e => $y ) {
					$b = number_format ( $a [$e], 0, '.', lang ( 210 ) );
					echo '<td align="right">' . ($a [$e] != "" ? '<a href="' . h ( ME . "$y=" ) . urlencode ( $h ) . '">' . str_replace ( " ", "&nbsp;", ($e == "Rows" && $a ["Engine"] == "InnoDB" && $b ? lang ( 96, $b ) : $b) ) . '</a>' : '&nbsp;');
					$Ad [$y] += ($a ["Engine"] != "InnoDB" || $y != "edit" ? $a [$e] : 0);
				}
				echo "<td>" . nbsp ( $a ["Comment"] );
			} else {
				echo '<td colspan="6"><a href="' . h ( ME ) . "view=" . urlencode ( $h ) . '">' . lang ( 79 ) . '</a>', '<td align="right"><a href="' . h ( ME ) . "select=" . urlencode ( $h ) . '">?</a>', '<td>&nbsp;';
			}
		}
		echo "<tr><td>&nbsp;<th>" . lang ( 211, count ( $Y ) ), "<td>" . $d->result ( $d->query ( "SELECT @@storage_engine" ) ), "<td>" . db_collation ( DB, collations () );
		foreach ( array ("create", "indexes", "edit" ) as $b ) {
			echo "<td align='right'>" . number_format ( $Ad [$b], 0, '.', lang ( 210 ) );
		}
		echo "</table>\n";
		if (! information_schema ( DB )) {
			echo "<p><input type='hidden' name='token' value='$E'><input type='submit' value='" . lang ( 212 ) . "'> <input type='submit' name='optimize' value='" . lang ( 213 ) . "'> <input type='submit' name='check' value='" . lang ( 214 ) . "'> <input type='submit' name='repair' value='" . lang ( 215 ) . "'> <input type='submit' name='truncate' value='" . lang ( 216 ) . "' onclick=\"return confirm('" . lang ( 63 ) . " (' + formChecked(this, /tables/) + ')');\"> <input type='submit' name='drop' value='" . lang ( 62 ) . "' onclick=\"return confirm('" . lang ( 63 ) . " (' + formChecked(this, /tables|views/) + ')');\">\n";
			$mb = get_databases ();
			if (count ( $mb ) != 1) {
				$x = (isset ( $_POST ["target"] ) ? $_POST ["target"] : DB);
				echo "<p>" . lang ( 217 ) . ($mb ? ": " . html_select ( "target", $mb, $x ) : ': <input name="target" value="' . h ( $x ) . '">') . " <input type='submit' name='move' value='" . lang ( 218 ) . "'>\n";
			}
		}
		echo "</form>\n";
	}
	echo '<p><a href="' . h ( ME ) . 'create=">' . lang ( 123 ) . "</a>\n";
	if ($d->server_info >= 5) {
		echo '<a href="' . h ( ME ) . 'view=">' . lang ( 157 ) . "</a>\n", "<h3>" . lang ( 92 ) . "</h3>\n";
		$f = $d->query ( "SELECT * FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = " . $d->quote ( DB ) );
		if ($f->num_rows) {
			echo "<table cellspacing='0'>\n";
			while ( $a = $f->fetch_assoc () ) {
				echo "<tr>", "<td>" . h ( $a ["ROUTINE_TYPE"] ), '<th><a href="' . h ( ME ) . ($a ["ROUTINE_TYPE"] == "FUNCTION" ? 'callf=' : 'call=') . urlencode ( $a ["ROUTINE_NAME"] ) . '">' . h ( $a ["ROUTINE_NAME"] ) . '</a>', '<td><a href="' . h ( ME ) . ($a ["ROUTINE_TYPE"] == "FUNCTION" ? 'function=' : 'procedure=') . urlencode ( $a ["ROUTINE_NAME"] ) . '">' . lang ( 84 ) . "</a>";
			}
			echo "</table>\n";
		}
		echo '<p><a href="' . h ( ME ) . 'procedure=">' . lang ( 174 ) . '</a> <a href="' . h ( ME ) . 'function=">' . lang ( 173 ) . "</a>\n";
	}
	if ($d->server_info >= 5.1 && ($f = $d->query ( "SHOW EVENTS" ))) {
		echo "<h3>" . lang ( 93 ) . "</h3>\n";
		if ($f->num_rows) {
			echo "<table cellspacing='0'>\n", "<thead><tr><th>" . lang ( 158 ) . "<td>" . lang ( 219 ) . "<td>" . lang ( 164 ) . "<td>" . lang ( 165 ) . "</thead>\n";
			while ( $a = $f->fetch_assoc () ) {
				echo "<tr>", '<th><a href="' . h ( ME ) . 'event=' . urlencode ( $a ["Name"] ) . '">' . h ( $a ["Name"] ) . "</a>", "<td>" . ($a ["Execute at"] ? lang ( 220 ) . "<td>" . $a ["Execute at"] : lang ( 166 ) . " " . $a ["Interval value"] . " " . $a ["Interval field"] . "<td>$a[Starts]"), "<td>$a[Ends]";
			}
			echo "</table>\n";
		}
		echo '<p><a href="' . h ( ME ) . 'event=">' . lang ( 163 ) . "</a>\n";
	}
}
page_footer();