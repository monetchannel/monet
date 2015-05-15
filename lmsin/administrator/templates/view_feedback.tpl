<div id="viewfeedback" style="max-height:500px; width:1000px; overflow:auto; vertical-align:top">
<form name="feedback_frm" method="POST" action="feedback.php" onsubmit="return false;">
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
	<tr bgcolor="#FFFFFF">
    	<td align="left" style="text-align:left; float:left; background-color:#FFFFFF" >
		<div id="tabs">
		<ul>
			<li id="rated"><a href="javascript: rate('rated')" style="text-decoration:none" class="tab">Rated</a></li>
			<li id="unrated"><a href="javascript: rate('unrated')" style="text-decoration:none" class="tab">Unrated</a></li>
		</ul>
		</div>
        </td>
    	<td align="right" bgcolor="#FFFFFF"><span  style="display:{$hdrow}" class="tabletext">{$HF1}{$nb_text}{$HF2}</span></td>
    </tr>
	<tr>
	  <td colspan="2"><table width="100%" cellpadding="0" cellspacing="1" id="List2" >
      {if $tot_rows>0}
	    <tr>
	      <td height="31" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('user_fname','{$user_fname_order}')">User Name</a></td>
	      <td bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('c_title','{$c_title_order}')">Video Name</a></td>
	      <td bgcolor="#EEEEEE" class="tablehead">Comment</td>
	      <td bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('cf_date','{$cf_date_order}')">Date</a></td>
	      <td style="display:{$unrated_hide}" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('ep_name','{$ep_name_order}')">Monet Profile</a></td>
	      <td style="display:{$unrated_hide}"  bgcolor="#EEEEEE" align="center" class="tablehead"><a href="javascript: order('cf_rating','{$cf_rating_order}')">Rating</a></td>
	      </tr>
	    {foreach $feedbacks as $feedback}
  <tr bgcolor="#ffffff">
    <td class="tabletext">{$feedback.user}<br />{$feedback.video}</td>
    <td class="tabletext">{$feedback.c_title}</td>
    <td class="tabletext">{$feedback.cf_comment}</td>
    <td class="tabletext">{$feedback.cf_date}</td>
    <td style="display:{$unrated_hide}" width="14%" height="16" class="tabletext" >{$feedback.ep_name}</td>
    <td style="display:{$unrated_hide}"  width="8%" align="center" class="tabletext" >{$feedback.cf_rating}</td>
  </tr>
  {/foreach}
  {else}
  <tr bgcolor="#EEEEEE">
    <td height="30" colspan="6" align="center">Record Not Found</td>
  </tr>
  {/if}
	  </table></td>
    </tr>
	<tr bgcolor="#FFFFFF" class="tabletext" style="display:{$hdrow}">
      <td>Show <select name="nrpp" id="nrpp" onchange="javascript:page(this.value)" style="width:50px;">{$nrppOpt}</select> records per page</td>
	  <td style="float:right">{$nb_text}</td>
    </tr>
</table>
    <input type="hidden" name="c_id" id="c_id" value="{$c_id}" />
    <input type="hidden" name="rate" id="rate" value="{$rate}" />
    <input type="hidden" name="type" id="type" value="{$rate}" />
    <input type="hidden" name="st_pos_p" id='st_pos_p' value="{$st_pos_p}" />
    <input type="hidden" name="nrpp_p" id='nrpp_p' value="{$nrpp_p}" />
    <input type="hidden" name="order_p" id="order_p" value="{$order_p}" />
    <input type="hidden" name="orderby_p" id="orderby_p" value="{$orderby_p}" />
</form>
</div>