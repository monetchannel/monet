<form name="frm" method="POST" action="redemption.php">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
        <tr>
            <td width="100%" align="center" id="msg">{$msg}</td>
        </tr>
        <tr>
            <td width="100%" >
                <table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
                    <tr bgcolor="#ffffff">
                        <td align="right">
                            <span class="tabletext">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$nb_text}{$HF2}
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
        <tr>
            <td width="100%" >
                <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
                    <tr bgcolor="#333333">
                        <td width="10%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('rr_u_id','{$rr_u_id_order}')">User Id</a></td>
                        <td width="25%" align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('user_fname','{$user_fname_order}')">User Name</a></td>
                        <td width="15%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('title','{$title_order}')">Reward Name</a></td>
                        <td width="15%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('sub_title','{$sub_title_order}')">Details</a></td>
                        <td width="15%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('rr_timestamp','{$rr_timestamp_order}')">Date</a></td>
                        <td width="20%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('rr_coupon_code','{$rr_coupon_code_order}')">Coupon Code</a></td>
                    </tr>
                    {$HF1} 
                    {foreach $redemptions as $redemption}
                    {strip}
                    <tr bgcolor="#ffffff">
                        <td align="center" class="tabletext">{$redemption.rr_u_id}</td>
                        <td  align="center" class="tabletext" >{$redemption.user_fname} {$redemption.user_lname}</td>
                        <td  align="center" class="tabletext" >{$redemption.title}</td>
                        <td  align="center" class="tabletext" >{$redemption.sub_title}</td>
                        <td align="center" class="tabletext" >{$redemption.rr_timestamp}</td>
                        <td  align="center" class="tabletext" >{$redemption.rr_coupon_code}</td>
                    </tr>
                    {/strip}
                    {/foreach}
                    {$HF2}
                </table>
            </td>
        </tr>
        <tr bgcolor="#ffffff">
            <td>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:{$none}">
                    <tr>
                        <td class="tabletext" width="250"> Show
                            <select name="nrpp" id="nrpp" onChange="javascript:set_page(this.value);" style="width:50px;">
                                      {$nrppOpt}
                            </select>
                            records per page </td>
                        <td width="20" align="right">&nbsp;</td>
                        <td class="tabletext" width="150" align="left" style="padding-left:5px">&nbsp;</td>
                        <td align="right"  ><span class="tabletext">{$nb_text}</span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
    <input type="hidden" name="order" id="order" value="{$order}">
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>
