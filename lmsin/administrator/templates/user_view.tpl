<form name="frm" method="POST" action="user.php">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg">{$msg}</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td align=left class="popuptext"><a style="text-decoration: none" href="javascript:user.add('','Add User');"> Add User</a></td>
            <td align="right"><span class="tabletext">{$HF1}{$nb_text}{$HF2}</span></td>
          </tr>
        </table></td>
    </tr>
    
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td width="14%"  align="left" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_fname','{$user_fname_order}')">User Name</a></td>
            <td width="11%" align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_email','{$user_email_order}')">Email Id</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_password','{$user_password_order}')">Date Of Birth</a></td>
            <td width="14%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_max_invites','{$user_max_invites_order}')">User Max Invites</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('rated','{$rated_order}')">Rated Videos</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('suggested','{$suggested_order}')">Approved Videos</a></td>
            <td width="11%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('challenge','{$challenge_order}')">Responded Challenges</a></td>
             <td width="8%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('friends','{$friends_order}')">No of Friends</a></td>
            <td width="30%"  height="30" align="center" bgcolor="#EEEEEE" class="tablehead"> Action</td>
          </tr>
{$HF1} 
{foreach $users as $user}
{strip}
          <tr bgcolor="#ffffff">
            <td height="16" class="tabletext" > {$user.user_fname} {$user.user_lname}</td>
            <td  align="left" class="tabletext" >{$user.user_email}</td>
            <td  align="left" class="tabletext" >{$user.user_dob|date_format}</td>
            <td align="left" class="tabletext" >{$user.user_max_invites}</td>
            <td  align="left" class="tabletext" >{$user.rated}</td>
            <td  align="left" class="tabletext" >{$user.suggested}</td>
            <td  align="left" class="tabletext" >{$user.challenge}</td>
            <td  align="left" class="tabletext" >{$user.friends}</td>
            <td  align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript:user.edit('','Edit User','','','','','','','','{$user.user_id}')">Edit</a></span>&nbsp;|&nbsp;<span class="tabletextred2"><a href="javascript:user_del('{$user.user_id}')">Del</a></span> {$user.inv_link}</td>
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