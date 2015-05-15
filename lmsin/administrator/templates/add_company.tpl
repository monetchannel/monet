<div style="width:500px">
<form method="POST" action="company.php" onSubmit="return false;" name="companyfrm" enctype="multipart/form-data" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="popup">
  <tr>
    <td width="29%" align="left">Name *:</td>
    <td width="71%"><input type="text" name="company_name" id="company_name" value="{$company_name}" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left"> Email *:</td>
    <td width="71%"><input type="text" name="company_email" id="company_email" value="{$company_email}"  /></td>
  </tr>
  <tr>
    <td width="29%" align="left">Contact no. *:</td>
    <td width="71%"><input type="text" name="company_contactno" id="company_contactno" value="{$company_contactno}" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Password<span style="display:{$pass}">* </span>:</td>
    <td width="71%"><input type="text" name="company_password" id="company_password" value="" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Address *:</td>
    <td width="71%"><input type="text" name="company_address" id="company_address" value="{$company_address}" /></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Country *:</td>
    <td width="71%"><select name="company_country" id="company_country">{$country_name}</select></td>
  </tr>
  
  <tr>
    <td width="29%" align="left">Zip *:</td>
    <td width="71%"><input type="text" name="company_zipcode" id="company_zipcode" value="{$company_zipcode}" /></td>
  </tr>
   <tr>
    <td width="29%" align="left">Logo{if !$file_name} {/if}:</td>
    <td width="71%"><input type="file" name="company_logo" id="company_logo" value="" />&nbsp;&nbsp;<a href="{$up_thumb_view_path}" target="_blank">{$file_name}</a></td>
  </tr>
  
  
  
  <tr class="norow">
    <td  colspan="2" ><input type="button" value="  Submit  " name="B1"  class="mybutton" id="buttongray" onclick="chk_all()" /></td>
  </tr>
  <tr class="hnone">
    <td  colspan="2"></td>
  </tr>
</table>
<input type="hidden" name="act" id="act" value="{$act}">
<input type="hidden" name="company_id" id="company_id" value="{$company_id}">
<input type="hidden" name="called" id="called" value="{$called}">
<input type="hidden" name="company_logo_exist" id="company_logo_exist" value="{$file_name}">


</form>
</div>
