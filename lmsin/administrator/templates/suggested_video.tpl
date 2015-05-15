{extends file="index.tpl"}
{block name=body}

<script>
{$js}

function nb(a)
{
	this.document.frm.st_pos.value=a;
	this.document.frm.act.value="video_view";
	
	this.document.frm.submit();
}

function set_page()
{
	this.document.frm.act.value="video_view";
	this.document.frm.nrpp.value=document.getElementById('op_nrpp').value;
	this.document.frm.submit();
}
function deny(a)
{
        this.document.frm.cs_id.value=a;
		this.document.frm.act.value="video_deny";
		this.document.frm.submit();	
}
function approved(a)
{
        this.document.frm.cs_id.value=a;
		this.document.frm.act.value="video_approved";
		this.document.frm.submit();	
}
function call_after_popup_open()
{
	$("#cat_id").multiselect({
		selectedList: 4
	});
}
function set_approved_video_popup(js)
{
	win=cn_window_open("Please select a Category",js,1);
	call_after_popup_open();
}

function setLink(url,type)
{
	if(!type)
	win=cn_window_open("Video",'<iframe name="iframe" src="index.php?act=watch_video&url='+url+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="350" width="500" style="padding:0px"></iframe>',1);
    else
	win=cn_window_open("Video",'<iframe name="iframe" src="index.php?act=watch_video&url='+url+'&type=youtube" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="350" width="500" style="padding:0px"></iframe>',1);
}

</script>

<form name="frm" method="POST" action="index.php">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg">{$msg}</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td align=left class="popuptext">&nbsp;&nbsp;</td>
         
            <td align="right"><span class="tabletext"> {if $tot_rows}{$nb_text}{/if}</span></td>
          </tr>
        </table></td>
    </tr>
    
  </table>
   {if $tot_rows} 
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="78">
          <tr bgcolor="#333333">
            <td width="25%" height="35" align="left" bgcolor="#EEEEEE" class="tablehead">Title</td>
            <td bgcolor="#EEEEEE" width="15%" align="center" class="tablehead">User</td>
            <td bgcolor="#EEEEEE" width="19%" align="center" class="tablehead">Email Id</td>
            <td bgcolor="#EEEEEE" width="17%" align="center" class="tablehead">Date</td>
            <!--<td bgcolor="#EEEEEE" width="24%" align="center" class="tablehead">Status</td>-->
            <td bgcolor="#EEEEEE" width="24%" align="center" class="tablehead">Action</td>
          </tr>
{/if}
{foreach $videos as $vid}
{strip}

          <tr bgcolor="#ffffff">
             <td width="25%" align="left" class="tabletext" >{$vid.cs_title}</td>
             <td width="15%" align="left" class="tabletext" >{$vid.user_fname} {$vid.user_lname}</td>
             <td class="tabletext">{$vid.user_email}</td>
            <td height="16" class="tabletext">{$vid.cs_date|date_format:" %e %b %Y"}</td>
            <!--<td height="16" class="tabletext">{$vid.status}</td>-->
            <td width="24%" align="left" class="tabletext" ><span class="tabletextred2"><a href="Javascript:x_approved_category('{$vid.cs_id}',set_approved_video_popup)">Approved</a></span>&nbsp;|&nbsp;
            <span class="tabletextred2"><a href="Javascript:deny('{$vid.cs_id}')" style="display:{$hide}">Deny</a></span>&nbsp;&nbsp;&nbsp;{$vid.video}</td>
            
          </tr>
          {/strip}
{/foreach}


      </table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tabletext" width="250"> Show
              <select name="op_nrpp" id="op_nrpp" onChange="javascript:set_page()" style="width:50px;">
			{$op_nrpp}
              </select>records per page </td>
            <td width="20" align="right">&nbsp;</td>
            <td class="tabletext" width="150" align="left" style="padding-left:5px">&nbsp;</td>
            <td align="right"  ><span class="tabletext">{$nb_text}</span></td>
          </tr>
        </table>
       
        </td>
    </tr>
  </table>
    <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
    <input type="hidden" name="act"  value="video_view">
    <input type="hidden" name="cs_id" value="{$cs_id}">
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
    <input type="hidden" name="order" id="order" value="{$order}">
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>
{/block}