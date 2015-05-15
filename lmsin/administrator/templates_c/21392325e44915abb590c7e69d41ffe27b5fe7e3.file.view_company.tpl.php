<?php /* Smarty version Smarty-3.0.6, created on 2015-02-10 05:32:05
         compiled from ".\templates\view_company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20463544e1296b96fa1-80865488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21392325e44915abb590c7e69d41ffe27b5fe7e3' => 
    array (
      0 => '.\\templates\\view_company.tpl',
      1 => 1411023132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20463544e1296b96fa1-80865488',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="frm" method="POST" action="company.php" onsubmit="return false;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td width="26%" align=left class="popuptext"><a style="text-decoration: none" href="javascript:company.add('','Add Company');">Add Company</a></td>
             <td width="37%"  class="popuptext">&nbsp;</td>
            <td width="37%" align="right"><span class="tabletext"  style="display:<?php echo $_smarty_tpl->getVariable('hide')->value;?>
"><?php echo $_smarty_tpl->getVariable('HF1')->value;?>
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
            <td bgcolor="#EEEEEE" width="18%" align="left" class="tablehead"><a href="javascript: set_order('company_name','<?php echo $_smarty_tpl->getVariable('company_name_order')->value;?>
')"> Name</a></td>
            <td bgcolor="#EEEEEE" width="33%" align="center" class="tablehead">Company Url</td>
            <td bgcolor="#EEEEEE" width="22%" align="center" class="tablehead"><a href="javascript: set_order('company_email','<?php echo $_smarty_tpl->getVariable('company_email_order')->value;?>
')">Email Id</a></td>
            <td bgcolor="#EEEEEE" width="20%" align="center" class="tablehead"><a href="javascript: set_order('company_address','<?php echo $_smarty_tpl->getVariable('company_address_order')->value;?>
')">Address</a></td>
            <td bgcolor="#EEEEEE" width="13%" height="30" align="center" class="tablehead"> Action</td>
          </tr>
<?php echo $_smarty_tpl->getVariable('HF1')->value;?>
 
<?php  $_smarty_tpl->tpl_vars['data1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('company')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data1']->key => $_smarty_tpl->tpl_vars['data1']->value){
?>
<tr bgcolor="#ffffff"><td height="16" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['data1']->value['company_name'];?>
</td><td  align="left" class="tabletext" ><a href="<?php echo $_smarty_tpl->tpl_vars['data1']->value['company_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data1']->value['company_url'];?>
</a></td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['data1']->value['company_email'];?>
</td><td  align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['data1']->value['company_address'];?>
</td><td  align="left" class="tabletext" ><span class="tabletextred2"></span><a href="javascript: company.edit('','Edit Company','','','','','','','','<?php echo $_smarty_tpl->tpl_vars['data1']->value['company_id'];?>
')">Edit</a>&nbsp;|&nbsp;<span class="tabletextred2"><a href="javascript:company_del(<?php echo $_smarty_tpl->tpl_vars['data1']->value['company_id'];?>
)">Delete</a></span></td></tr>
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