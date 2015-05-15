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
          <td><input type="text" name="user_fname" id="user_fname" value="{$user_fname}" class="text_box" /></td>
          </tr>
        <tr>
          <td align="left">Last Name:&nbsp;</td>
          <td><input type="text" name="user_lname" id="user_lname" value="{$user_lname}"  class="text_box" /></td>
          </tr>
        <tr>
          <td align="left">Gender</td>
          <td><select name="user_gender" id="user_gender">
            <option value="-1">Please Select</option>
            <option value="Male" {$gender_Male}>Male</option>
            <option value="Female" {$gender_Female}>Female</option>
            </select></td>
          </tr>
        <tr>
          <td align="left">Date Of Birth</td>
          <td>
            <select name="mm" id="mm">{$mm}</select>
            <select name="dd" id="dd">{$dd}</select>
            <select name="yy" id="yy">{$yy}</select>
            </td>
          </tr>
        <tr>
          <td align="left">Email Id:</td>
          <td><input type="text" name="user_email" id="user_email" value="{$user_email}"  class="text_box" onblur="javascript:x_chk_email_exist(this.value,'{$user_id}',chk_email_exist_responce)" /></td>
          </tr>
        <tr>
          <td align="left">User Max Invites:&nbsp;</td>
          <td><input type="text" name="user_max_invites" id="user_max_invites" value="{$user_max_invites}"  class="text_box" /></td>
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
          <td  colspan="2" align="left"><input type="submit" name="Save" value=" {$act} "  onclick="return chk_val()" id="buttongray" /></td>
          </tr>
        <tr class="hnone">
          <td  colspan="2"></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <input type="hidden" name="act" id="act" value="{$act}">
    <input type="hidden" name="email_exist" id="email_exist" value="">

  <input type="hidden" name="user_id" id="user_id" value="{$user_id}">
</form>
</div>