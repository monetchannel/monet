<div id="inv_data" style="width:1000px; vertical-align:top">
<form name="frm" method="POST" action="category.php?act=view_invites">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg">{$msg}</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td width="26%" align=left class="popuptext"><a style="text-decoration: none" href="javascript:video.add('','Add Video');">Add Video</a></td>
             <td width="37%"  class="popuptext">Search:&nbsp;               <input type="text" name="search" id="search" size="40" value="{$ser_key}" /><input type="submit" value="  GO  " name="GO" id="buttongray" onclick="ser_by(document.getElementById('search').value)" /></td>
            <td width="37%" align="right"><span class="tabletext">{$HF1}{$nb_text}{$HF2}</span></td>
          </tr>
        </table></td>
    </tr>
    
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1" style="display:{$none}">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td width="25%" height="30" align="left" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('user_fname','{$user_fname_order}')">User Name</a></td>
            <td bgcolor="#EEEEEE" width="10%" align="center" class="tablehead"><a href="javascript: order('inv_date','{$inv_date_order}')">Invite Date</a></td>
            <td bgcolor="#EEEEEE" width="25%" align="center" class="tablehead"><a href="javascript: order('inv_to_email','{$inv_to_email_order}')">Invited Email id</a></td>
            <td bgcolor="#EEEEEE" width="40%" align="center" class="tablehead">Message</td>
          </tr>
{$HF1} 
{foreach $invites as $invite}
{strip}
          <tr bgcolor="#ffffff" valign="top">
            <td class="tabletext" > {$invite.user_fname} {$invite.user_lname} {$invite.inv_user_id}</td>
            <td align="left" class="tabletext" >{$invite.inv_date}</td>
            <td  align="left" class="tabletext" >{$invite.inv_to_email}</td>
            <td align="left" class="tabletext" >{$invite.inv_message}</td>
          </tr>
{/strip}
{/foreach}
{$HF2}
        </table>
</td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tabletext" width="250">&nbsp;</td>
            <td width="20" align="right">&nbsp;</td>
            <td class="tabletext" width="150" align="left" style="padding-left:5px">&nbsp;</td>
            <td align="right"  ><span class="tabletext">{$nb_text}</span></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <input type="hidden" name="show_home_page" value="">
  <input type="hidden" name="act" value="{$act}">
  <input type="hidden" name="st_pos_p" id="st_pos_p" value="{$st_pos_p}">
  <input type="hidden" name="order_p" id="order_p" value="{$order_p}">
  <input type="hidden" name="orderby_p" id="orderby_p" value="{$orderby_p}">
</form>
</div>