<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 09:48:09
         compiled from ".\templates\add_company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2265654ba21c995fc98-98916311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce4891b7bcb1e78f74a5066d97a43767a6d31e24' => 
    array (
      0 => '.\\templates\\add_company.tpl',
      1 => 1411022940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2265654ba21c995fc98-98916311',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="width:500px">
<form method="POST" action="company.php" onSubmit="return false;" name="companyfrm" enctype="multipart/form-data" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="popup">
  <tr>
    <td width="29%" align="left">Name *:</td>
    <td width="71%"><input type="text" name="company_name" id="company_name" value="<?php echo $_smarty_tpl->getVariable('company_name')->value;?>
" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left"> Email *:</td>
    <td width="71%"><input type="text" name="company_email" id="company_email" value="<?php echo $_smarty_tpl->getVariable('company_email')->value;?>
"  /></td>
  </tr>
  <tr>
    <td width="29%" align="left">Contact no. *:</td>
    <td width="71%"><input type="text" name="company_contactno" id="company_contactno" value="<?php echo $_smarty_tpl->getVariable('company_contactno')->value;?>
" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Password<span style="display:<?php echo $_smarty_tpl->getVariable('pass')->value;?>
">* </span>:</td>
    <td width="71%"><input type="text" name="company_password" id="company_password" value="" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Address *:</td>
    <td width="71%"><input type="text" name="company_address" id="company_address" value="<?php echo $_smarty_tpl->getVariable('company_address')->value;?>
" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Country *:</td>
    <td width="71%"><select name="company_country" id="company_country"><?php echo $_smarty_tpl->getVariable('country_name')->value;?>
</select></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Zip *:</td>
    <td width="71%"><input type="text" name="company_zipcode" id="company_zipcode" value="<?php echo $_smarty_tpl->getVariable('company_zipcode')->value;?>
" /></td>
  </tr>
   <tr>
    <td width="29%" align="left">Logo<?php if (!$_smarty_tpl->getVariable('file_name')->value){?> <?php }?>:</td>
    <td width="71%"><input type="file" name="company_logo" id="company_logo" value="" />&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->getVariable('up_thumb_view_path')->value;?>
" target="_blank"><?php echo $_smarty_tpl->getVariable('file_name')->value;?>
</a></td>
  </tr>
  
  
  
  <tr class="norow">
    <td  colspan="2" ><input type="button" value="  Submit  " name="B1"  class="mybutton" id="buttongray" onclick="chk_all()" /></td>
  </tr>
  <tr class="hnone">
    <td  colspan="2"></td>
  </tr>
</table>
<input type="hidden" name="act" id="act" value="<?php echo $_smarty_tpl->getVariable('act')->value;?>
">
<input type="hidden" name="company_id" id="company_id" value="<?php echo $_smarty_tpl->getVariable('company_id')->value;?>
">
<input type="hidden" name="called" id="called" value="<?php echo $_smarty_tpl->getVariable('called')->value;?>
">
<input type="hidden" name="company_logo_exist" id="company_logo_exist" value="<?php echo $_smarty_tpl->getVariable('file_name')->value;?>
">


</form>
</div>
