<form name="frm" method="POST" action="invitation.php" onsubmit="return false;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg">{$msg}</td>
    </tr>
    <tr>
      <td width="100%" style="display:{$hide}" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td align=left class="popuptext">&nbsp;</td>
            <td align="right"><span class="tabletext">{$HF1}{$nb_text}{$HF2}</span></td>
          </tr>
        </table></td>
    </tr>
    
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1" style="display:{$hide}">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td bgcolor="#EEEEEE" width="29%" align="left" class="tablehead"><a href="javascript: set_order('invr_fname','{$invr_fname_order}')"> Name</a></td>
            <td bgcolor="#EEEEEE" width="36%" align="center" class="tablehead"><a href="javascript: set_order('invr_eamil','{$invr_eamil_order}')">Email Id</a></td>
            <td bgcolor="#EEEEEE" width="22%" align="center" class="tablehead"><a href="javascript: set_order('invr_date','{$invr_date_order}')">Date</a></td>
            <td bgcolor="#EEEEEE" width="13%" height="30" align="center" class="tablehead"> Action</td>
          </tr>
{$HF1} 
{foreach $invitation_requests as $invitation_request}
{strip}
          <tr bgcolor="#ffffff">
            <td height="16" class="tabletext" >{$invitation_request.invr_fname} {$invitation_request.invr_lname}</td>
            <td  align="left" class="tabletext" >{$invitation_request.invr_eamil}</td>
            <td  align="left" class="tabletext" >{$invitation_request.invr_date}</td>
            <td  align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript: x_accept_invite_request({$invitation_request.invr_id},show_invr)">Accept</a></span>&nbsp;|&nbsp;<span class="tabletextred2"><a href="javascript: invitation_del({$invitation_request.invr_id})">Deny</a></span></td>
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