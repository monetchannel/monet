<?php /* Smarty version Smarty-3.0.6, created on 2014-09-01 02:02:36
         compiled from "./templates/user_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10458050845404362c559593-06251526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2de1fc698055943acad067d7b6baa71492bbe76f' => 
    array (
      0 => './templates/user_add.tpl',
      1 => 1318659752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10458050845404362c559593-06251526',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="width:500px">
<form name="frm" action="user.php" method="post" onsubmit="return false;">
  <table width="100%" cellpadding="0" cellspacing="0" id="popup">
    <tr>
      <td width="100%" colspan="2"  class="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr class="blank">
          <td  colspan="3" >&nbsp;</td>
        </tr>
        <tr>
          <td align="left">First Name</td>
          <td><input type="text" name="user_fname" id="user_fname" value="<?php echo $_smarty_tpl->getVariable('user_fname')->value;?>
" class="text_box" /></td>
          </tr>
        <tr>
          <td align="left">Last Name:&nbsp;</td>
          <td><input type="text" name="user_lname" id="user_lname" value="<?php echo $_smarty_tpl->getVariable('user_lname')->value;?>
"  class="text_box" /></td>
          </tr>
        <tr>
          <td align="left">Gender</td>
          <td><select name="user_gender" id="user_gender">
            <option value="-1">Please Select</option>
            <option value="Male" <?php echo $_smarty_tpl->getVariable('gender_Male')->value;?>
>Male</option>
            <option value="Female" <?php echo $_smarty_tpl->getVariable('gender_Female')->value;?>
>Female</option>
            </select></td>
          </tr>
        <tr>
          <td align="left">Date Of Birth</td>
          <td>
            <select name="mm" id="mm"><?php echo $_smarty_tpl->getVariable('mm')->value;?>
</select>
            <select name="dd" id="dd"><?php echo $_smarty_tpl->getVariable('dd')->value;?>
</select>
            <select name="yy" id="yy"><?php echo $_smarty_tpl->getVariable('yy')->value;?>
</select>
            </td>
          </tr>
        <tr>
          <td align="left">Email Id:</td>
          <td><input type="text" name="user_email" id="user_email" value="<?php echo $_smarty_tpl->getVariable('user_email')->value;?>
"  class="text_box" onblur="javascript:x_chk_email_exist(this.value,'<?php echo $_smarty_tpl->getVariable('user_id')->value;?>
',chk_email_exist_responce)" /></td>
          </tr>
        <tr>
          <td align="left">User Max Invites:&nbsp;</td>
          <td><input type="text" name="user_max_invites" id="user_max_invites" value="<?php echo $_smarty_tpl->getVariable('user_max_invites')->value;?>
"  class="text_box" /></td>
          </tr>
        <tr>
          <td align="left">Password:</td>
          <td><input type="password" name="user_password" id="user_password" value=""  class="text_box" /></td>
          </tr>
        <tr>
          <td align="left">Conferm Password:</td>
          <td><input type="password" name="user_con_password" id="user_con_password" value=""  class="text_box" /></td>
          </tr>
        <tr>
          <td width="29%"  align="left"  >&nbsp;</td>
          <td width="71%"   >&nbsp;</td>
          </tr>
        <tr class="hnone">
          <td ></td>
          <td ></td>
          </tr>
        <tr class="norow">
          <td  colspan="2" align="left"><input type="submit" name="Save" value=" <?php echo $_smarty_tpl->getVariable('act')->value;?>
 "  onclick="return chk_val()" id="buttongray" /></td>
          </tr>
        <tr class="hnone">
          <td  colspan="2"></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <input type="hidden" name="act" id="act" value="<?php echo $_smarty_tpl->getVariable('act')->value;?>
">
    <input type="hidden" name="email_exist" id="email_exist" value="">

  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_smarty_tpl->getVariable('user_id')->value;?>
">
</form>
</div>