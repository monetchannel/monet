<?php /* Smarty version Smarty-3.0.6, created on 2014-08-30 06:56:47
         compiled from "./templates/view_company_invites_request.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17464042445401d81feea4d1-66155887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de290b7c9764a57c0cddecc72993b2db2db9456f' => 
    array (
      0 => './templates/view_company_invites_request.tpl',
      1 => 1335423619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17464042445401d81feea4d1-66155887',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frm" method="POST" action="invitation.php" onsubmit="return false;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</td>
    </tr>
    <tr>
      <td width="100%" style="display:<?php echo $_smarty_tpl->getVariable('hide')->value;?>
" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td align=left class="popuptext">&nbsp;</td>
            <td align="right"><span class="tabletext"><?php echo $_smarty_tpl->getVariable('HF1')->value;?>
<?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
<?php echo $_smarty_tpl->getVariable('HF2')->value;?>
</span></td>
          </tr>
        </table></td>
    </tr>
    
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1" style="display:<?php echo $_smarty_tpl->getVariable('hide')->value;?>
">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td bgcolor="#EEEEEE" width="29%" align="left" class="tablehead"><a href="javascript: set_order('company_name','<?php echo $_smarty_tpl->getVariable('company_name_order')->value;?>
')"> Name</a></td>
            <td bgcolor="#EEEEEE" width="36%" align="center" class="tablehead"><a href="javascript: set_order('company_email','<?php echo $_smarty_tpl->getVariable('company_email_order')->value;?>
')">Email Id</a></td>
            <td bgcolor="#EEEEEE" width="22%" align="center" class="tablehead"><a href="javascript: set_order('company_address','<?php echo $_smarty_tpl->getVariable('company_address_order')->value;?>
')">Address</a></td>
            <td bgcolor="#EEEEEE" width="13%" height="30" align="center" class="tablehead"> Action</td>
          </tr>
<?php echo $_smarty_tpl->getVariable('HF1')->value;?>
 
<?php  $_smarty_tpl->tpl_vars['invitation_request'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('invitation_requests')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['invitation_request']->key => $_smarty_tpl->tpl_vars['invitation_request']->value){
?>
<tr bgcolor="#ffffff"><td height="16" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['invitation_request']->value['company_name'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['invitation_request']->value['company_email'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['invitation_request']->value['company_address'];?>
</td><td  align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript: company.edit('','Edit Company','','','','','','','','<?php echo $_smarty_tpl->tpl_vars['invitation_request']->value['company_id'];?>
',1)">Accept</a><!--<a href="javascript: x_accept_company_invite_request(<?php echo $_smarty_tpl->tpl_vars['invitation_request']->value['company_id'];?>
,show_company_inv)">Accept</a>--></span>&nbsp;|&nbsp;<span class="tabletextred2"><a href="javascript: company_invitation_del(<?php echo $_smarty_tpl->tpl_vars['invitation_request']->value['company_id'];?>
)">Deny</a></span></td></tr>
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