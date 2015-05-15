<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 08:28:14
         compiled from ".\templates\user_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:802254aa35183988d5-30349477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9099cc7a4018e0a8052567abba00a0d2e1b05d8' => 
    array (
      0 => '.\\templates\\user_view.tpl',
      1 => 1411023064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '802254aa35183988d5-30349477',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\xampp\htdocs\Monet\smarty\libs\plugins\modifier.date_format.php';
?><form name="frm" method="POST" action="user.php">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td align=left class="popuptext"><a style="text-decoration: none" href="javascript:user.add('','Add User');"> Add User</a></td>
            <td align="right"><span class="tabletext"><?php echo $_smarty_tpl->getVariable('HF1')->value;?>
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
            <td width="14%"  align="left" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_fname','<?php echo $_smarty_tpl->getVariable('user_fname_order')->value;?>
')">User Name</a></td>
            <td width="11%" align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_email','<?php echo $_smarty_tpl->getVariable('user_email_order')->value;?>
')">Email Id</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_password','<?php echo $_smarty_tpl->getVariable('user_password_order')->value;?>
')">Date Of Birth</a></td>
            <td width="14%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_max_invites','<?php echo $_smarty_tpl->getVariable('user_max_invites_order')->value;?>
')">User Max Invites</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('rated','<?php echo $_smarty_tpl->getVariable('rated_order')->value;?>
')">Rated Videos</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('suggested','<?php echo $_smarty_tpl->getVariable('suggested_order')->value;?>
')">Approved Videos</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('challenge','<?php echo $_smarty_tpl->getVariable('challenge_order')->value;?>
')">Responded Challenges</a></td>
             <td width="8%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('friends','<?php echo $_smarty_tpl->getVariable('friends_order')->value;?>
')">No of Friends</a></td>
            <td width="30%"  height="30" align="center" bgcolor="#EEEEEE" class="tablehead"> Action</td>
          </tr>
<?php echo $_smarty_tpl->getVariable('HF1')->value;?>
 
<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('users')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
<tr bgcolor="#ffffff"><td height="16" class="tabletext" > <?php echo $_smarty_tpl->tpl_vars['user']->value['user_fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['user_lname'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>
</td><td  align="left" class="tabletext" ><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['user_dob']);?>
</td><td align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['user']->value['user_max_invites'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['user']->value['rated'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['user']->value['suggested'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['user']->value['challenge'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['user']->value['friends'];?>
</td><td  align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript:user.edit('','Edit User','','','','','','','','<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
')">Edit</a></span>&nbsp;|&nbsp;<span class="tabletextred2"><a href="javascript:user_del('<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
')">Del</a></span> <?php echo $_smarty_tpl->tpl_vars['user']->value['inv_link'];?>
</td></tr>
<?php }} ?>
<?php echo $_smarty_tpl->getVariable('HF2')->value;?>

        </table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:<?php echo $_smarty_tpl->getVariable('none')->value;?>
">
          <tr>
            <td class="tabletext" width="250"> Show
              <select name="nrpp" id="nrpp" onChange="javascript:set_page()" style="width:50px;">
			<?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>

              </select>
              records per page </td>
            <td width="20" align="right">&nbsp;</td>
            <td class="tabletext" width="150" align="left" style="padding-left:5px">&nbsp;</td>
            <td align="right"  ><span class="tabletext"><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
</span></td>
          </tr>
        </table></td>
    </tr>
  </table>
    <input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
    <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
    <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
    <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
</form>