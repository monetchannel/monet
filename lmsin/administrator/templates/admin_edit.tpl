{extends file="index.tpl"}
{block name=body}
<script language="javascript">
	function chk_val()
	{
		if(document.getElementById('sa_site_name').value=="" || document.getElementById('sa_from_name').value=="" || document.getElementById('sa_from_email').value=="" || document.getElementById('sa_to_name').value=="" || document.getElementById('sa_to_email').value=="" || document.getElementById('sa_password').value=="")
		{
			alert("Please fill all to continue.");
			return false;
		}
		else
		{
			if(!chk_email(document.getElementById('sa_from_email').value) || !chk_email(document.getElementById('sa_to_email').value) )
			{
				alert("Please enter correct email id.");
				return false;
			}
		}
	}
function chk_email(v)        
{
	 f1=0;
       f2=0;
       for(j=0;j<v.length;j++)
       {
               if(v.charAt(j)=='@')
               {
                       f1=j+1;
               }
               if(v.charAt(j)=='.')
               {
                       f2=j+1;
               }
       }
       if(f1==0 || f2==0)
       {
               return false;
       }
       else
       {
               return true;
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
            <td  align="left"  >Site Name</td>
            <td><input type="text" name="sa_site_name" id="sa_site_name" value="{$sa_site_name}" class="text_box" /></td>
          </tr>
          <tr>
            <td  align="left"  >From Name</td>
            <td><input type="text" name="sa_from_name" id="sa_from_name" value="{$sa_from_name}"  class="text_box" /></td>
          </tr>
          <tr>
            <td  align="left"  >From Email</td>
            <td><input name="sa_from_email"  class="text_box" id="sa_from_email" value="{$sa_from_email}" /></td>
          </tr>
          <tr>
            <td  align="left"  >To Name</td>
            <td><input name="sa_to_name" id="sa_to_name" value="{$sa_to_name}"  class="text_box" /></td>
          </tr>
          <tr>
            <td  align="left"  >To Email</td>
            <td><input type="text" name="sa_to_email" id="sa_to_email" value="{$sa_to_email}"  class="text_box" /></td>
          </tr>
          <tr>
            <td  align="left"  >Email</td>
            <td><input type="text" name="sa_email" id="sa_email" value="{$sa_email}"  class="text_box" /></td>
          </tr>
          <tr>
            <td  align="left"  >Password</td>
            <td><input type="password" name="sa_password" id="sa_password" value=""  class="text_box" /></td>
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