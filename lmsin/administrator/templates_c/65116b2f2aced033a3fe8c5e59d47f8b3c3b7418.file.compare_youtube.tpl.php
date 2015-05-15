<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 09:45:57
         compiled from ".\templates\compare_youtube.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2849654ba2145257c93-48321165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65116b2f2aced033a3fe8c5e59d47f8b3c3b7418' => 
    array (
      0 => '.\\templates\\compare_youtube.tpl',
      1 => 1411023014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2849654ba2145257c93-48321165',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Compare Videos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
       	<?php if ($_smarty_tpl->getVariable('total')->value>0){?> 
		<script type="text/javascript" src="../js/swfobject.js"></script>

	<script type="text/javascript">
var flashvars = {
  video_id:"<?php echo $_smarty_tpl->getVariable('video_id_1')->value;?>
",
  valence1:'<?php echo $_smarty_tpl->getVariable('valence_1')->value;?>
',
  time1:'<?php echo $_smarty_tpl->getVariable('time_1')->value;?>
',
  title1:'<?php echo $_smarty_tpl->getVariable('c_title_1')->value;?>
',
 video_id_two:"<?php echo $_smarty_tpl->getVariable('video_id_2')->value;?>
",
  valence2:'<?php echo $_smarty_tpl->getVariable('valence_2')->value;?>
',
  time2:'<?php echo $_smarty_tpl->getVariable('time_2')->value;?>
',
  title2:'<?php echo $_smarty_tpl->getVariable('c_title_2')->value;?>
',
  video_id_three:"<?php echo $_smarty_tpl->getVariable('video_id_3')->value;?>
", 
  valence3:'<?php echo $_smarty_tpl->getVariable('valence_3')->value;?>
',
  time3:'<?php echo $_smarty_tpl->getVariable('time_3')->value;?>
',  
  title3:'<?php echo $_smarty_tpl->getVariable('c_title_3')->value;?>
',
  neg_1:'<?php echo $_smarty_tpl->getVariable('neg_1')->value;?>
',
  pos_1:'<?php echo $_smarty_tpl->getVariable('pos_1')->value;?>
',
  neg_2:'<?php echo $_smarty_tpl->getVariable('neg_2')->value;?>
',
  pos_2:'<?php echo $_smarty_tpl->getVariable('pos_2')->value;?>
',
  neg_3:'<?php echo $_smarty_tpl->getVariable('neg_3')->value;?>
',
  pos_3:'<?php echo $_smarty_tpl->getVariable('pos_3')->value;?>
',
  neg_spike_1:'<?php echo $_smarty_tpl->getVariable('negative_spike_1')->value;?>
',
  pos_spike_1:'<?php echo $_smarty_tpl->getVariable('positive_spike_1')->value;?>
',
  neg_spike_2:'<?php echo $_smarty_tpl->getVariable('negative_spike_2')->value;?>
',
  pos_spike_2:'<?php echo $_smarty_tpl->getVariable('positive_spike_2')->value;?>
',
  neg_spike_3:'<?php echo $_smarty_tpl->getVariable('negative_spike_3')->value;?>
',
  pos_spike_3:'<?php echo $_smarty_tpl->getVariable('positive_spike_3')->value;?>
'

};

swfobject.embedSWF("compare_youtube.swf", "myContent", "1200", "900", "9.0.0", "../expressInstall.swf",flashvars);
</script>
<?php }?>
	</head>
	<body >
    	<?php if ($_smarty_tpl->getVariable('total')->value>0){?>
		<div id="myContent">
			<h1>Alternative content</h1>
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
        <?php }else{ ?>
        <span id="msg">Record Not Found!</span>
		<?php }?>
	</body>
</html>