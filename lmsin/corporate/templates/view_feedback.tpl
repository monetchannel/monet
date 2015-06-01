<div id="viewfeedback" >
<ul class="nav nav-tabs"  id="tabs">
  <li class="tab" id="rated"><a href="javascript:rate('rated')" >Rated</a></li>
  <li id="unrated" class="tab"><a href="javascript:rate('unrated')">Unrated</a></li>
</ul>

<form name="feedback_frm" method="POST" action="feedback.php" onsubmit="return false;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="new_table" >
	<tr >
    	<td align="left" style="text-align:left; float:left; background-color:#FFFFFF" nowrap="nowrap" >
        </td>
    	<td align="right" bgcolor="#FFFFFF"><span  style="display:{if !$tot_rows} none {/if}" class="tabletext">{$HF1}{$nb_text}{$HF2}</span></td>
    </tr>
	<tr>
	  <td colspan="2">
      
      <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered" >
      {if $tot_rows>0}
      <thead>
	    <tr>
        <th>Action</th>
	      <th><a href="javascript: order('user_fname','{$user_fname_order}')" style="color:#FFF">User Name</a></th>
	      <th>Comment</th>
	      <th><a href="javascript: order('cf_date','{$cf_date_order}')" style="color:#FFF">Date</a></th>
	      <th width="125" style="display:{$unrated_hide}"><a href="javascript: order('ep_name','{$ep_name_order}')" style="color:#FFF">Monet Profile</a></th>
	      <th width="50" style="display:{$unrated_hide};color:#FFF"><a href="javascript: order('cf_rating','{$cf_rating_order}')" style="color:#FFF">Rating</a></th>
	      </tr>
          </thead>
          <tbody>
	    {foreach $feedbacks as $feedback}
  <tr bgcolor="#ffffff">
  
    <td class="tabletext"><div style="float:right">{$feedback.video}</div><div style="float:left">{$feedback.slides}</div></td>
    <td class="tabletext">{$feedback.user_fname} {$feedback.user_lname}</td>
    <td class="tabletext">&nbsp;{$feedback.cf_comment}</td>
    <td class="tabletext">{$feedback.cf_date}</td>
    <td style="display:{$unrated_hide}" height="16" class="tabletext" >{$feedback.ep_name}</td>
    <td style="display:{$unrated_hide}" align="center" class="tabletext" >{$feedback.cf_rating}</td>
  </tr>
  {/foreach}
   </tbody>
  {else}
  <tr bgcolor="#EEEEEE">
    <td width="800" height="30" colspan="5" align="center"><strong>Your current feedback list is empty</strong></td>
  </tr>
  {/if}
	  </table>
      
      </td>
    </tr>
	<tr bgcolor="#FFFFFF" class="tabletext" style="display:{if !$tot_rows} none {/if};">
      <td style="padding-top:10px;">Show <select name="nrpp" id="nrpp" onchange="javascript:page(this.value)" style="width:50px;">{$nrppOpt}</select> records per page</td>
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