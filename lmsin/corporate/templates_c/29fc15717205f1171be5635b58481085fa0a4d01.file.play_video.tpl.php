<?php /* Smarty version Smarty-3.0.6, created on 2014-09-07 21:35:20
         compiled from "./templates/play_video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1865657000540d3208282999-83444126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29fc15717205f1171be5635b58481085fa0a4d01' => 
    array (
      0 => './templates/play_video.tpl',
      1 => 1410005055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1865657000540d3208282999-83444126',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="wrapper">
<object type="application/x-shockwave-flash" style="width:560px; height:344px;" data="<?php echo $_smarty_tpl->getVariable('url')->value;?>
?color2=FBE9EC&amp;version=3">
<param name="movie" value="<?php echo $_smarty_tpl->getVariable('url')->value;?>
?color2=FBE9EC&amp;version=3" />
<param name="allowFullScreen" value="true" />
<param name="allowscriptaccess" value="always" />
<param name="wmode" value="transparent" />
</object>        
</div>
