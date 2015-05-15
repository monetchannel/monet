{extends file="index.tpl"}
{block name=body}
<link rel="stylesheet" href="{$SERVER_ADMIN_PATH}admin-style.css" type="text/css">
<script>
function chk_pass()
{
	if(document.frm.user_name.value=="" || document.frm.pass.value=="")
	{
        alert("Please fill all * fields to continue.")
		return false;
	}
	else
	{	
		return true;
	}
}
</script>
<form name="frm" method="POST" action="index.php" onSubmit="javascript:return chk_pass()">
  <table width="100%" cellpadding="0" cellspacing="0" id="popup">
    <tr>
      <th align="left" width="50%" >{$heading} Login:</th>
      <th  width="50%" class="help" style="padding-right:10px"  ></th>
    </tr>
    <tr>
      <td colspan="2"  class="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr class="hnone">
            <td  colspan="3" id="msg">{$msg}</td>
          </tr>
          <tr class="blank">
            <td  colspan="3" >&nbsp;</td>
          </tr>
          <tr>
            <td width="29%"  align="left"  >Enter User Name* :</td>
            <td width="71%"   ><input type="text" name="user_name" size="20" tabindex="1"></td>
          </tr>
          
           <tr>
            <td width="29%"  align="left"  >Enter  Password*:</td>
            <td width="71%"   ><input type="password" name="pass" size="20" tabindex="1"></td>
          </tr>
          <tr class="hnone">
            <td ></td>
            <td ></td>
          </tr>
          <tr class="norow">
            <td  colspan="2" align="left"><input type="submit" name="Submit" value="  Login  " tabindex="3" id="buttongray"></td>
          </tr>
          
          <tr class="hnone">
            <td  colspan="2"></td>
          </tr>
        </table></td>
    </tr>
  </table>
<input type="hidden" name="act" value="chk_login">
<script>
this.document.frm.user_name.focus();
</script>
</form>
{/block}