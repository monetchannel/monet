<?php /* Smarty version Smarty-3.0.6, created on 2014-09-02 05:04:47
         compiled from "./templates/video_section_play.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9869844745405b25f5d1e59-32901995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '398b40bdce907e079c259ae014c288739254563b' => 
    array (
      0 => './templates/video_section_play.tpl',
      1 => 1330596536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9869844745405b25f5d1e59-32901995',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>SWFObject 2 dynamic publishing example page</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="../js/swfobject.js"></script>
	<script type="text/javascript">
var flashvars = {
  video_id:"<?php echo $_smarty_tpl->getVariable('video_id')->value;?>
", 
  start_time:'<?php echo $_smarty_tpl->getVariable('start_time')->value;?>
',
  end_time:'<?php echo $_smarty_tpl->getVariable('end_time')->value;?>
',
  avg_valence:'<?php echo $_smarty_tpl->getVariable('avg_valence')->value;?>
',
  avg_time:'<?php echo $_smarty_tpl->getVariable('avg_time')->value;?>
',
  time_slice:'<?php echo $_smarty_tpl->getVariable('time_slice')->value;?>
'
  
};

swfobject.embedSWF("video_section.swf", "myContent", "635", "640", "9.0.0", "../expressInstall.swf",flashvars);
</script>
	</head>
	<body >
		<div id="myContent">
			<h1>Alternative content</h1>
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
        <span id="msg"></span>

	</body>
</html>
