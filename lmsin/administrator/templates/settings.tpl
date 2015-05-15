{extends file="index.tpl"}
{block name=body}
<script language="javascript">
	function chk_val()
	{
		if(document.getElementById('sa_nrpp').value=="" || document.getElementById('sa_nrpp').value=="")
		{
			alert("Please fill all * continue.");
			return false;
		}
	}
</script>
<form name="frm" action="index.php?act=update_admin" method="post">
  <table width="100%" cellpadding="0" cellspacing="0" id="popup">
    <tr>
      <th align="left" width="50%" >{$heading} Admin:</th>
      <th  width="50%" class="help" style="padding-right:10px"  >&nbsp;</th>
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
            <td  align="left"  >NRPP</td>
            <td><input type="text" name="sa_nrpp" id="sa_nrpp" value="{$sa_nrpp}"  class="text_box" /></td>
          </tr>
          <tr>
            <td  align="left"  >STDMUL</td>
            <td><input type="text" name="sa_stdmul" id="sa_stdmul" value="{$sa_stdmul}"  class="text_box" /></td>
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
            <td  colspan="2" align="left"><input type="submit" name="Save" value=" Update "  onclick="return chk_val()" id="buttongray" /></td>
          </tr>
          <tr class="hnone">
            <td  colspan="2"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
{/block}