<?php /* Smarty version Smarty-3.0.6, created on 2014-08-30 07:05:59
         compiled from "./templates/approve_company_signup_mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16921400325401da47d32264-57072622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b03fcb05bfb6b1784ec0c735935da0acc674ff06' => 
    array (
      0 => './templates/approve_company_signup_mail.tpl',
      1 => 1405687017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16921400325401da47d32264-57072622',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Monet</title>

</head>

<body>
<div style="width:750px; border:1px solid #c0c0c0; border-top:none; font-family:Tahoma, Geneva, sans-serif; font-size:15px;">
	
    <div style="background-color:#303030; padding:0px; width:750px; margin:0px; height:35px; position:relative"><div style="font-size:26px; color:#ffffff; ">&nbsp;&nbsp;Monet <span style="font-size:11px; color:#dbeefb">your online impressions</span></div></div>
    
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Hi <?php echo $_smarty_tpl->getVariable('company_name')->value;?>
,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Your details is:</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email:&nbsp;<?php echo $_smarty_tpl->getVariable('company_email')->value;?>
</td>
  </tr>
   <tr>
    <td>Password:&nbsp;<?php echo $_smarty_tpl->getVariable('word')->value;?>
</td>
  </tr>
  <tr>
     <td>Url:&nbsp;<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
<?php echo $_smarty_tpl->getVariable('company_url')->value;?>
/admin</td>
   </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div style="background-color:#67a7e4; color:#ffffff; padding-top:5px; text-align:center; width:200px; height:25px"><a href="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
<?php echo $_smarty_tpl->getVariable('company_url')->value;?>
" style="text-decoration:none;
	color:#ffffff;">Click here to login.</a></div> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Thanks,<br />Monet Team</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>


</div>




</body>
</html>





