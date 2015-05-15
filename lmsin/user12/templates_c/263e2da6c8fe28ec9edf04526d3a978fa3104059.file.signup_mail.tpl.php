<?php /* Smarty version Smarty-3.0.6, created on 2014-12-15 01:56:20
         compiled from "./templates/signup_mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60783424548ea234e80b93-97088607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '263e2da6c8fe28ec9edf04526d3a978fa3104059' => 
    array (
      0 => './templates/signup_mail.tpl',
      1 => 1418366041,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60783424548ea234e80b93-97088607',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<div style="width:750px; border:1px solid #c0c0c0; border-top:none; font-family:Tahoma, Geneva, sans-serif; font-size:15px;">
	
    <div style="background-color:#303030; padding:0px; width:750px; margin:0px; height:35px; position:relative"><div style="font-size:26px; color:#ffffff; ">&nbsp;&nbsp;Monet <span style="font-size:11px; color:#dbeefb">your online impressions</span></div><!--<div style="width:333px; height:32px; position:absolute; top:0px; left:0px"><img src="http://monetchannel.com/images/logo.jpg" title="Monet" alt="Monet"  /></div>--></div>
    
    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>A new Invitation request has been received. Details are as below :</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Name :&nbsp;<?php echo $_smarty_tpl->getVariable('name')->value;?>
</td>
  </tr>
  
   <tr>
    <td>Email :&nbsp;<?php echo $_smarty_tpl->getVariable('email')->value;?>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div style="background-color:#67a7e4; color:#ffffff; padding-top:5px; text-align:center; width:200px; height:37px"><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
" style="text-decoration:none;
	color:#ffffff;">Click here to approve/deny this request.</a></div></td>
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





