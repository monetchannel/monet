<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 08:28:06
         compiled from ".\templates\video_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23650544e12674d0ba1-30801435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b127eb3dce2505824bd9271f4d41387a4ef610d' => 
    array (
      0 => '.\\templates\\video_view.tpl',
      1 => 1411023130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23650544e12674d0ba1-30801435',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frm" method="POST" action="video.php" onSubmit="return false;">	
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td width="26%" align=left class="popuptext"><a style="text-decoration: none" href="javascript:video.add('','Add Video');">Add Video</a></td>
             <td width="37%"  class="popuptext">Search:&nbsp;               <input type="text" name="search" id="search" size="40" value="<?php echo $_smarty_tpl->getVariable('ser_key')->value;?>
" /><input type="submit" value="  GO  " name="GO" id="buttongray" onclick="ser_by(document.getElementById('search').value)" /></td>
            <td width="37%" align="right"><span class="tabletext"><?php echo $_smarty_tpl->getVariable('HF1')->value;?>
<?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
<?php echo $_smarty_tpl->getVariable('HF2')->value;?>
</span></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td bgcolor="#EEEEEE" width="48%" align="left" class="tablehead"><a href="javascript: set_order('c_title','<?php echo $_smarty_tpl->getVariable('c_title_order')->value;?>
')">Title</a></td>
            <td bgcolor="#EEEEEE" width="15%" align="left" class="tablehead">Latest Feedback</td>
            
             <td bgcolor="#EEEEEE" width="10%" align="left" class="tablehead"><a href="javascript: set_order('c_date','<?php echo $_smarty_tpl->getVariable('c_date_order')->value;?>
')">Added Date</a>&nbsp;</td>
              <td bgcolor="#EEEEEE" width="10%" align="left" class="tablehead"><a href="javascript: set_order('num_feedback','<?php echo $_smarty_tpl->getVariable('num_feedback_order')->value;?>
')">Feedback</a></td>
            <td bgcolor="#EEEEEE" width="17%" height="30" align="center" class="tablehead"> Action</td>
          </tr>
<?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
?>
          <tr bgcolor="#ffffff">
            <td height="16" class="tabletext" > <?php echo $_smarty_tpl->tpl_vars['video']->value['c_title'];?>
</td>
            <td class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['video']->value['days_ago'];?>
</td>
             <td height="16" class="tabletext" > <?php echo $_smarty_tpl->tpl_vars['video']->value['c_date'];?>
</td>
              <td height="16" class="tabletext" > <?php echo $_smarty_tpl->tpl_vars['video']->value['num_feedback'];?>
</td>
            <td width="17%" align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript:x_view_feedback(<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
,'',show_feedback)">Feedback</a> </span>| <span class="tabletextred2"><a href="javascript:video.edit('','Edit Video','','','','','','','','<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
')">Edit</a></span>&nbsp;<span class="tabletextred2" style="display:<?php echo $_smarty_tpl->tpl_vars['video']->value['hide_del'];?>
">|&nbsp;<a href="javascript: video_del(<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
)">Del</a></span></td>
          </tr>
<?php }} ?>
        </table>
   </td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:<?php echo $_smarty_tpl->getVariable('none')->value;?>
">
          <tr>
            <td class="tabletext" width="250">Show <select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;"><?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>
</select> records per page </td>
            <td align="right"><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
</td>
          </tr>
        </table></td>
    </tr>
  </table>
    <input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
    <input type="hidden" name="ser_key" id='ser_key' value="<?php echo $_smarty_tpl->getVariable('ser_key')->value;?>
">
    <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
    <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
    <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
</form>