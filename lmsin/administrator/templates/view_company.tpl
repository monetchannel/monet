<form name="frm" method="POST" action="company.php" onsubmit="return false;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg">{$msg}</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td width="26%" align=left class="popuptext"><a style="text-decoration: none" href="javascript:company.add('','Add Company');">Add Company</a></td>
             <td width="37%"  class="popuptext">&nbsp;</td>
            <td width="37%" align="right"><span class="tabletext"  style="display:{$hide}">{$HF1}{$nb_text}{$HF2}</span></td>
          </tr>
        </table></td>
    </tr>
    
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1" style="display:{$hide}">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td bgcolor="#EEEEEE" width="18%" align="left" class="tablehead"><a href="javascript: set_order('company_name','{$company_name_order}')"> Name</a></td>
            <td bgcolor="#EEEEEE" width="33%" align="center" class="tablehead">Company Url</td>
            <td bgcolor="#EEEEEE" width="22%" align="center" class="tablehead"><a href="javascript: set_order('company_email','{$company_email_order}')">Email Id</a></td>
            <td bgcolor="#EEEEEE" width="20%" align="center" class="tablehead"><a href="javascript: set_order('company_address','{$company_address_order}')">Address</a></td>
            <td bgcolor="#EEEEEE" width="13%" height="30" align="center" class="tablehead"> Action</td>
          </tr>
{$HF1} 
{foreach $company as $data1}
{strip}
          <tr bgcolor="#ffffff">
            <td height="16" class="tabletext" >{$data1.company_name}</td>
            <td  align="left" class="tabletext" ><a href="{$data1.company_url}" target="_blank">{$data1.company_url}</a></td>
            <td  align="left" class="tabletext" >{$data1.company_email}</td>
            <td  align="left" class="tabletext" >{$data1.company_address}</td>
            <td  align="left" class="tabletext" ><span class="tabletextred2"></span><a href="javascript: company.edit('','Edit Company','','','','','','','','{$data1.company_id}')">Edit</a>&nbsp;|&nbsp;<span class="tabletextred2"><a href="javascript:company_del({$data1.company_id})">Delete</a></span></td>
          </tr>
{/strip}
{/foreach}
{$HF2}
        </table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:{$none}">
          <tr>
            <td class="tabletext" width="250"> Show
              <select name="nrpp" id="nrpp" onChange="javascript:set_page()" style="width:50px;">
                {$nrppOpt}
              </select>
              records per page </td>
            <td width="20" align="right">&nbsp;</td>
            <td class="tabletext" width="150" align="left" style="padding-left:5px">&nbsp;</td>
            <td align="right"  ><span class="tabletext">{$nb_text}</span></td>
          </tr>
        </table></td>
    </tr>
  </table>
    <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
    <input type="hidden" name="order" id="order" value="{$order}">
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>