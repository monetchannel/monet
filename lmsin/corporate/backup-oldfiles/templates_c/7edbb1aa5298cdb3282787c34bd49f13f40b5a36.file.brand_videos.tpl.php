<?php /* Smarty version Smarty-3.0.6, created on 2014-12-18 03:21:31
         compiled from "./templates/brand_videos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20621793045492aaab849c21-28438883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7edbb1aa5298cdb3282787c34bd49f13f40b5a36' => 
    array (
      0 => './templates/brand_videos.tpl',
      1 => 1418703210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20621793045492aaab849c21-28438883',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="well">
<ul style="margin:10px 0px 10px 0px; padding:0px" >
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	<?php if ($_smarty_tpl->getVariable('BrandId')->value==$_smarty_tpl->tpl_vars['v']->value['company_id']){?>
    <li style="padding:5px"><a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)" style="float:none;"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_thumb_url'];?>
" /></a></li>
    <?php }else{ ?>
		<li style="padding:0px 10px 5px 10px; width:200px; text-align:left; margin:0px; float:none;">

<a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)" style="float:none; color:#FFF;" class="info" ><?php echo $_smarty_tpl->tpl_vars['v']->value['c_title'];?>
</a></li>
	<?php }?>

<?php }} ?>
</ul>
</div>