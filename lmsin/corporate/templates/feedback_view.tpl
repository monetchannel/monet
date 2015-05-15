<form name="feedback_frm" method="POST" action="feedback.php" onSubmit="return false;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
    <tr bgcolor="#ffffff">
      <td colspan="2"><table width="100%"  border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td width="200">User:
            <select name="v_user" id="v_user" style="width:150px;">
            {$v_user}
            </select></td>
          <td width="300">Emotion:
            <select name="se_emo[]" id="se_emo" multiple="multiple">
            {$ep}
            </select></td>
          <td>Rating:
            <select name="se_re1[]" id="se_re1"  multiple="multiple">
              <option value="1" {$re1_1}>1</option>
              <option value="2" {$re1_2}>2</option>
              <option value="3" {$re1_3}>3</option>
              <option value="4" {$re1_4}>4</option>
              <option value="5" {$re1_5}>5</option>
            </select></td>
          </tr>
      </table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td colspan="2" style="padding-bottom:20px;"><table width="100%"  border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td width="250">Video: <select name="v_title" id="v_title" style="width:200px;">{$v_title}</select></td>
          <td width="200">Date From: <input name="date_from" type="text" id="date_from" size="10" value="{$date_from}" /> <a href="Javascript:showCal('Calendar2')"><img src="images/cal.gif" border="0" /></a></td>
          <td width="150">To: <input name="date_to" type="text" id="date_to" size="10" value="{$date_to}" /> <a href="Javascript:showCal('Calendar3')" ><img src="images/cal.gif" border="0" /></a></td>
          <td><input type="button" name="search" value="  GO  " onclick="ser_by();" id="buttongray" /></td>
        </tr>
      </table></td>
    </tr>
    <tr bgcolor="#ffffff">
          <td>
        <div id="tab">
            <div class="tab_container">
                 <ul class="tabs">
                    <li class="" id="rated"><a href="javascript: set_rate('rated')" style="text-decoration:none" class="tab">Rated</a></li>
                    <li class="" id="unrated" ><a href="javascript: set_rate('unrated')" style="text-decoration:none" class="tab">Unrated</a></li> 
                </ul>
            </div>
        </div>
          </td>
            <td align="right"><span style="display:{$hdrow}; padding-bottom:10px;"><a href="javascript:report_export()">Export</a>&nbsp;{$HF1}{$nb_text}{$HF2}</span></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" cellpadding="0" cellspacing="1" style="clear:both">
   {if $tot_rows>0}
   <tr bgcolor="#EEEEEE" class="tablehead">
    <td height="30" width="200"><a href="javascript: set_order('user_fname','{$user_fname_order}')">User Name</a></td>
    <td width="320"><a href="javascript: set_order('c_title','{$c_title_order}')">Video Name</a></td>
    <td width="300">Comment</td>
    <td width="120"><a href="javascript: set_order('cf_date','{$cf_date_order}')">Date</a></td>
    <td width="120" style="display:{$unrated_hide}"><a href="javascript: set_order('ep_name','{$ep_name_order}')">Monet Profile</a></td>
    <td style="display:{$unrated_hide}"><a href="javascript: set_order('cf_rating','{$cf_rating_order}')">Rating</a></td>
  </tr>
  {foreach $feedbacks as $feedback}
  <tr bgcolor="#ffffff">
    <td class="tabletext">{$feedback.user}<div style="float:right">{$feedback.video}</div><div style="float:left">{$feedback.slides}</div></td>
    <td class="tabletext">{$feedback.c_title}</td>
    <td class="tabletext">{$feedback.cf_comment}</td>
    <td class="tabletext">{$feedback.cf_date}</td>
    <td style="display:{$unrated_hide}" class="tabletext">{$feedback.ep_name}</td>
    <td style="display:{$unrated_hide}" class="tabletext">{$feedback.cf_rating}</td>
  </tr>
  {/foreach}
  {else}
  <tr bgcolor="#EEEEEE" class="tablehead">
    <td align="center" colspan="6" height="30">Record Not Found</td>
  </tr>
  {/if}
</table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td width="100%" colspan="2"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:{$none}">
        <tr style="display:{$hdrow}">
          <td class="tabletext" width="250">Show <select name="nrpp2" id="nrpp2" onchange="javascript:set_page(this.value)" style="width:50px;">{$nrppOpt}</select> records per page </td>
          <td align="right"><span class="tabletext">{$nb_text}</span></td>
        </tr>
      </table></td>
    </tr>
  </table>
    <input type="hidden" name="rate" id="rate" value="{$rate}" />	
    <input type="hidden" name="type" id="type" value="" />	
    <input type="hidden" name="act" id="act" value="" />
    <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
    <input type="hidden" name="ser_key" id='ser_key' value="{$ser_key}">
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
    <input type="hidden" name="order" id="order" value="{$order}">
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>
