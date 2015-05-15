<form name="frm" method="POST" action="video.php" onSubmit="return false;">	
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
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
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td bgcolor="#EEEEEE" width="48%" align="left" class="tablehead"><a href="javascript: set_order('c_title','{$c_title_order}')">Title</a></td>
            <td bgcolor="#EEEEEE" width="15%" align="left" class="tablehead">Latest Feedback</td>
            
             <td bgcolor="#EEEEEE" width="10%" align="left" class="tablehead"><a href="javascript: set_order('c_date','{$c_date_order}')">Added Date</a>&nbsp;</td>
              <td bgcolor="#EEEEEE" width="10%" align="left" class="tablehead"><a href="javascript: set_order('num_feedback','{$num_feedback_order}')">Feedback</a></td>
            <td bgcolor="#EEEEEE" width="17%" height="30" align="center" class="tablehead"> Action</td>
          </tr>
{foreach $videos as $video}
          <tr bgcolor="#ffffff">
            <td height="16" class="tabletext" > {$video.c_title}</td>
            <td class="tabletext" >{$video.days_ago}</td>
             <td height="16" class="tabletext" > {$video.c_date}</td>
              <td height="16" class="tabletext" > {$video.num_feedback}</td>
            <td width="17%" align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript:x_view_feedback({$video.c_id},'',show_feedback)">Feedback</a> </span>| <span class="tabletextred2"><a href="javascript:video.edit('','Edit Video','','','','','','','','{$video.c_id}')">Edit</a></span>&nbsp;<span class="tabletextred2" style="display:{$video.hide_del}">|&nbsp;<a href="javascript: video_del({$video.c_id})">Del</a></span></td>
          </tr>
{/foreach}
        </table>
   </td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:{$none}">
          <tr>
            <td class="tabletext" width="250">Show <select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">{$nrppOpt}</select> records per page </td>
            <td align="right">{$nb_text}</td>
          </tr>
        </table></td>
    </tr>
  </table>
    <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
    <input type="hidden" name="ser_key" id='ser_key' value="{$ser_key}">
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
    <input type="hidden" name="order" id="order" value="{$order}">
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>