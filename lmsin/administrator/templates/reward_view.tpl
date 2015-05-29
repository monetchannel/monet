<form name="frm" method="POST" action="reward.php">
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
                                <a href="javascript:reward.add('','Add Reward')">Add Reward</a>
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
                        <td width="17%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('r_image','{$r_image_order}')">Image</a></td>
                        <td width="10%" align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('title','{$title_order}')">Title</a></td>
                        <td width="10%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('sub_title','{$sub_title_order}')">Subtitle</a></td>
                        <td width="8%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('points','{$points_order}')">Points</a></td>
                        <td width="10%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('r_total_quantity','{$r_total_quantity_order}')">Total Quantity</a></td>
                        <td width="10%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('r_quantity','{$r_quantity_order}')">Remaining Quantity</a></td>
                        <td width="10%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('r_hurry_limit','{$r_hurry_limit_order}')">Hurry Limit</a></td>
                        <td width="10%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('r_date_created','{$r_date_created_order}')">Date Created</a></td>
                        <td width="7%"  align="center" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: set_order('r_status','{$r_status_order}')">Status</a></td>
                        <td width="8%"  align="center" bgcolor="#EEEEEE" class="tablehead">Action</td>
                    </tr>
                    {$HF1} 
                    {foreach $rewards as $reward}
                    {strip}
                    <tr bgcolor="#ffffff">
                        <td align="center">
                            <div style="height:120px;overflow: hidden;">
                                {if $reward.r_image==""}
                                    <img class="img-responsive" style="height:100%;" src="../../uploads/default.png"></img>
                                {else}
                                    <img class="img-responsive" style="height:100%;" src="../../uploads/{$reward.r_image}"></img>
                                {/if}
                            </div>
                        </td>
                        <td  align="center" class="tabletext" >{$reward.title}</td>
                        <td  align="center" class="tabletext" >{$reward.sub_title}</td>
                        <td  align="center" class="tabletext" >{$reward.points}</td>
                        <td align="center" class="tabletext" >{$reward.r_total_quantity}</td>
                        <td align="center" class="tabletext" >{$reward.r_quantity}</td>
                        <td align="center" class="tabletext" >{$reward.r_hurry_limit}</td>
                        <td  align="center" class="tabletext" >{$reward.r_date_created}</td>
                    {if $reward.r_status==active}
                        <td align="center"><img class="img-responsive" src="images/active_status.png"></img></td>
                    {elseif $reward.r_status==suspended}
                        <td align="center"><img class="img-responsive" src="images/suspended_status.png"></img></td>
                    {else}
                        <td align="center"><img class="img-responsive" src="images/inactive_status.png"></img></td>
                    {/if}
                        <td align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript:reward.edit('','Edit Reward','','','','','','','','{$reward.r_id}')">Edit</a></span></td>
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
                            <select name="nrpp" id="nrpp" onChange="javascript:set_page(this.value)" style="width:50px;">
                                {$nrppOpt}
                            </select>
                            records per page
                        </td>
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
