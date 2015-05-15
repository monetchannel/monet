<?php /* Smarty version Smarty-3.0.6, created on 2014-09-01 02:03:22
         compiled from "./templates/approve_signup_mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5603412975404365a862105-20738421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ecb4c0b62d5a2fa8338f13df71c0e67324c0ab4' => 
    array (
      0 => './templates/approve_signup_mail.tpl',
      1 => 1319523301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5603412975404365a862105-20738421',
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
    <td>Hi <?php echo $_smarty_tpl->getVariable('name')->value;?>
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
    <td>Username :&nbsp;<?php echo $_smarty_tpl->getVariable('invr_eamil')->value;?>
</td>
  </tr>
  
   <tr>
    <td>Password :&nbsp;<?php echo $_smarty_tpl->getVariable('word')->value;?>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div style="background-color:#67a7e4; color:#ffffff; padding-top:5px; text-align:center; width:200px; height:25px"><a href="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
monet_channel.php" style="text-decoration:none;
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





