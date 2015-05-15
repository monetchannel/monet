<!--<div id="viewfeedback" style="max-height:500px; width:1000px; overflow:auto; vertical-align:top">
-->  <form name="feedback_frm" method="POST" action="feedback.php" onsubmit="return false;">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
      <tr bgcolor="#ffffff">
        <td height="19" bgcolor="#ffffff"><div id="tab">
          <div class="tab_container" >
            <ul class="tabs">
              <li class="" id="rated"><a href="javascript: rate('rated')" style="text-decoration:none" class="tab">Rated</a></li>
              <li class="" id="unrated" ><a href="javascript: rate('unrated')" style="text-decoration:none" class="tab">Unrated</a></li>
            </ul>
          </div>
        </div></td>
        <td align="right"  bgcolor="#ffffff" colspan="" style="display:{$hdrow}">&nbsp;<span class="tabletext">{$HF1}{$nb_text}{$HF2}</span></td>
      </tr>
      <tr style="display:{$hdrow}">
        <td width="100%" colspan="2" ><table width="100%" cellpadding="0" cellspacing="1" id="List2" >
          <tr bgcolor="#333333">
            <td bgcolor="#EEEEEE" width="24%" align="left" class="tablehead"><a href="javascript: order('user_fname','{$user_fname_order}')">User Name</a></td>
            <td bgcolor="#EEEEEE" width="32%" align="left" class="tablehead"><a href="javascript: order('c_title','{$c_title_order}')">Video Name</a></td>
            <td bgcolor="#EEEEEE" width="14%" align="left" class="tablehead">Comment</td>
            <td bgcolor="#EEEEEE" width="12%" align="left" class="tablehead"><a href="javascript: order('cf_date','{$cf_date_order}')">Date</a></td>
            <td style="display:{$unrated_hide}" bgcolor="#EEEEEE" width="14%" align="left" class="tablehead"><a href="javascript: order('ep_name','{$ep_name_order}')">Monet Profile</a></td>
            <td style="display:{$unrated_hide}"  bgcolor="#EEEEEE" width="8%" height="30" align="center" class="tablehead"><a href="javascript: order('cf_rating','{$cf_rating_order}')">Rating</a>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6">
            <table width="100%" cellpadding="0" cellspacing="1" id="List2" style="display:{$hdrow}">
              {foreach $feedbacks as $feedback}
              {strip}
              <tr bgcolor="#ffffff">
                <td class="tabletext" ><div style="float:left">{$feedback.user}</div>
                  <div style="float:right">{$feedback.video}</div></td>
                <td class="tabletext" >{$feedback.c_title}</td>
                <td class="tabletext" >{$feedback.cf_comment}</td>
                <td class="tabletext" >{$feedback.cf_date}</td>
                <td style="display:{$unrated_hide}"  height="16" class="tabletext" >{$feedback.ep_name}</td>
                <td style="display:{$unrated_hide}"  width="8%" align="center" class="tabletext" >{$feedback.cf_rating}</td>
              </tr>
              {/strip}
              {/foreach}
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#ffffff">
        <td width="100%" colspan="2" >&nbsp;</td>
      </tr>
      <tr bgcolor="#ffffff">
        <td colspan="2"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:{$none}">
          <tr style="display:{$hdrow}">
            <td class="tabletext" width="250"> Show
              <select name="nrpp" id="nrpp" onchange="javascript:page(this.value)" style="width:50px;">
                
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
    <input type="hidden" name="c_id" id="c_id" value="{$c_id}" />
    <input type="hidden" name="rate" id="rate" value="{$rate}" />
    <input type="hidden" name="type" id="type" value="{$rat}" />
    <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}" />
    <input type="hidden" name="ser_key" id='ser_key' value="{$ser_key}" />
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}" />
    <input type="hidden" name="order" id="order" value="{$order}" />
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}" />
  </form>
<!--</div>
-->