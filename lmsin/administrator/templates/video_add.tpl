<div style="width:600px">
<form method="POST" action="video.php" onSubmit="return false;" name="videofrm" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="popup">
  <tr>
    <td width="29%" align="left">Do you wish to:</td>
    <td width="71%"><table width="100%" align="left">
      <tr class="norow">
        <td width="7%"><input name="video" type="radio" id="upload_video" value="1" {$upload} onclick="do_you_wish(this.value)" /></td>
        <td width="23%">Upload Video</td>
        <td width="6%" align="center">&nbsp;</td>
        <td width="7%"><input name="video" type="radio" id="youtube_video" onclick="do_you_wish(this.value)" value="0" {$youtube} /></td>
        <td width="57%">You tube link</td>
      </tr>
    </table></td>
  </tr>
  <tr id="up_video" {if $youtube=='checked'}style=&quot;display:none&quot;{/if}>
    <td align="left">Upload Video *:</td>
    <td><input type="file" name="up_video" id="up_video" /></td>
  </tr>
  <tr id="up_image" {if $youtube=='checked'}style=&quot;display:none&quot;{/if}>
    <td align="left">Video Image *:</td>
    <td><input type="file" name="video_image" id="video_image" /></td>
  </tr>
  <tr id="utube" {if $upload=='checked'}style=&quot;display:none&quot;{/if}>
    <td align="left">Video URL (YouTube) *:</td>
    <td><input name="c_url" type="text" id="c_url" value="{$c_url}" size="30" /></td>
  </tr>
  <tr>
    <td align="left">Date Published *:</td>
    <td><input name="c_date" id="c_date" size="12" class="mytext" value="{$c_date}" />
      <a href="javascript:showCal('Calendar1')"> <img  border="0" src="cal.gif" width="16" height="16" /></a></td>
  </tr>
  <tr>
    <td align="left">Category *:</td>
    <td><select name="cat_id[]" id="cat_id" multiple="multiple" size="5" >
      
      
              {$category_list}
            
    
    </select></td>
  </tr>
  <tr id="h_c_title" {if $youtube=='checked'}style=&quot;display:none&quot;{/if}>
    <td align="left">Title of Video *:</td>
    <td><input type="text" name="c_title" id="c_title" value="{$c_title}" /></td>
  </tr>
  <tr id="h_c_disc" {if $youtube=='checked'}style=&quot;display:none&quot;{/if}>
    <td align="left">Brief Description:</td>
    <td><textarea name="c_desc" id="c_desc" style="width:300px; height:50px">{$c_desc}</textarea></td>
  </tr>
  <tr>
    <td height="34" align="left">Company:</td>
    <td align="left" valign="middle"><select name="c_company_id" id="company_id" >
              {$company_list}
    </select></td>
  </tr>
  <tr>
    <td height="34" align="left">Available for challenge:</td>
    <td align="left" valign="middle"><table width="36%" align="left" class="norow">
      <tr class="norow">
        <td width="16%"><input type="radio" name="c_av_challenge" {$c_av_challenge_1} value="1" /></td>
        <td width="19%">Yes</td>
        <td width="14%" align="center">&nbsp;</td>
        <td width="14%"><input name="c_av_challenge" type="radio"  value="0" {$c_av_challenge_0} /></td>
        <td width="37%">No</td>
      </tr>
    </table></td>
  </tr>
  <tr class="norow">
    <td  colspan="2" ><input type="button" value="  Submit  " name="B1"  class="mybutton" id="buttongray" onclick="chk_all()" /></td>
  </tr>
  <tr class="hnone">
    <td  colspan="2"></td>
  </tr>
</table>
<input type="hidden" name="act" id="act" value="{$act}">
<input type="hidden" name="c_id" id="c_id" value="{$c_id}">
</form>
</div>
