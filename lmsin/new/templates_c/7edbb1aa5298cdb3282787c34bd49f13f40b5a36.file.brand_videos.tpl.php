<?php /* Smarty version Smarty-3.0.6, created on 2014-09-18 01:21:52
         compiled from "./templates/brand_videos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1508737574541a9620cdbb04-55773390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7edbb1aa5298cdb3282787c34bd49f13f40b5a36' => 
    array (
      0 => './templates/brand_videos.tpl',
      1 => 1411028314,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1508737574541a9620cdbb04-55773390',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<div class="col-md-6 <?php if ($_smarty_tpl->tpl_vars['v']->value['i']%2==1){?>left-div<?php }?> " style="height:280px; <?php if ($_smarty_tpl->tpl_vars['v']->value['i']<$_smarty_tpl->getVariable('num_rows')->value){?> border-bottom:1px solid #ccc"<?php }?>">
  <div class="row main-content" style="border:0px">
    <div class="row video-main">
      <div class="col-md-5 video-box"><a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_thumb_url'];?>
" /></a> </div>
      <div class="col-md-7">
        <div class="row video-heading"> <a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_title'];?>
</a> </div>
        <div class="row"> Date is not recognized ! 22 views </div>
        <div class="row"> The Preatures: Bonnaoroo 2014 ! Artist of the week </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12 description-main">
        <div class="row description"> <a>Subscribe : http//www.youtube.com/subscription_center?add_user=pepsi </a> </div>
        <div class="row sub-description" ><?php echo $_smarty_tpl->tpl_vars['v']->value['c_desc'];?>
</div>
      </div>
    </div>
  </div>
</div>
<?php }} ?> 