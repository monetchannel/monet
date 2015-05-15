{extends file="index.tpl"}
{block name=body}
<script>
{$js}
function nb(a)
{
	this.document.frm.st_pos.value=a;
	this.document.frm.act.value="analysis_results";
	
	this.document.frm.submit();
}
function set_page()
{
	this.document.frm.act.value="analysis_results";
	this.document.frm.nrpp.value=document.getElementById('op_nrpp').value;
	this.document.frm.submit();
}
function get_analysis_graph(graph)
{
	win=cn_window_open('Analysis Graph',graph,true);
}
function show_popup(ar_id)
{
	window.open ("index.php?act=analysis_graph&ad_ar_id="+ar_id, "mywindow","menubar=0,status=1,toolbar=0, width=990,height=900");
}
function go_button()
{
	this.document.frm.st_pos.value=0;
}
function compare()
{
	var ids='';
	var frm=this.document.frm;
	var len=frm.elements.length;
	k=0;
	for(i=0;i<len;i++)
	{
		if(frm.elements[i].type=="checkbox" && frm.elements[i].checked==true)
		{
			ids=ids+","+frm.elements[i].value;
			k++;
		}
	}
	if(k==0)
	{
		alert('Please select any video!');
		return false;
	}
	else if(k>3)
	{
		alert('Please select maximum three ratings only!');
		return false;
	}
	window.open ("index.php?act=compare_youtube&ar_ids="+ids, "mywindow","menubar=0,status=1,toolbar=0, width=1120,height=900");
}
</script>
<form name="frm" method="POST" action="index.php" onsubmit="return go_button()">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr bgcolor="#FFFFFF">
      <td><table width="100%" cellpadding="0" cellspacing="0" style="padding-bottom:20px;">
        <tr bgcolor="#ffffff">
          <td width="100"><a style="text-decoration: none" href="index.php?act=import_file">Import File</a>&nbsp;&nbsp;</td>
          <td width="195">Select Video:
            <select name="c_id" id="c_id" style="width:100px;">
              
        {$content_option}
      
            </select></td>
          <td width="220">Select Category:
            <select name="cat_id" id="cat_id" style="width:100px;">
              
        {$category_option}
      
            </select></td>
          <td width="200">Select User:
            <select name="user_id" id="user_id" style="width:100px;">
              
        {$users_option}
      
            </select></td>
          <td width="50"><input id="buttongray" class="mybutton" type="submit" name="go"  value="  GO  " /></td>
          <td width="" align="right">{if $tot_rows}<a href="index.php?act=delete_analysis_results" class="popuptext"  style="text-decoration:none">Delete All Records</a>&nbsp;&nbsp;&nbsp;{/if}</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" cellpadding="0" cellspacing="1">
      {if $tot_rows>0}
        <tr bgcolor="#EEEEEE" class="tablehead" align="center">
        <td width="20" align="center">Compare</td>
          <td width="20" align="center">ID</td>
          <td width="100" align="center">Date</td>
          <td width="250" align="center">Video Title</td>
          <td width="140" align="center">User</td>
          <td width="100" align="center">Category</td>
          <td width="100" align="center">Rated Emotion</td>
          <td width="65" align="center">Dominant</td>
          <td width="65" align="center">% Of Frames</td>
          <td width="150" height="30" align="center">Action</td>
        </tr>
        {foreach $analysis as $record}
  <tr bgcolor="{$record.row_bg}">
    <td height="16" class="tabletext"><input type="checkbox" name="compare_ar_id[]" value="{$record.ar_id}" /></td>  
    <td height="16" class="tabletext">{$record.cf_id}</td>
    <td class="tabletext">{$record.ar_date|date_format:" %e %b %Y"}</td>
    <td class="tabletext">{$record.c_title}</td>
    <td class="tabletext">{$record.user_fname} {$record.user_lname}</td>
    <td class="tabletext">{$record.cat_name}</td>
    <td class="tabletext">{$record.ep_name}</td>
    <td class="tabletext">{$record.ar_dominant_emoton|ucfirst}</td>
    <td class="tabletext">{$record.percent}</td>
    <td class="tabletext">Download - <a href="index.php?act=analysis_csv&ar_id={$record.ar_id}">CSV</a> | <a href="javascript:show_popup('{$record.ar_id}')">Graph</a></td>
  </tr>
  {/foreach}
  {else}
    <tr bgcolor="#EEEEEE" class="tablehead" align="center">
        <td height="30" colspan="9" align="center">Record Not Found</td>
    </tr>
   {/if}     
      </table></td>
    </tr>
    <tr bgcolor="#FFFFFF" style="display:{if $tot_rows<1}none{/if}">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="tabletext" width="486"> Show
            <select name="op_nrpp" id="op_nrpp" onchange="javascript:set_page()" style="width:50px;">
              
        
			{$op_nrpp}
              
      
            </select>
            records per page 
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" Compare Videos" onclick="compare()" class="mybutton"   id="buttongray" />
            </td>
          <td width="764" align="right"><span class="tabletext">{$nb_text}</span></td>
        </tr>
      </table></td>
    </tr>
  </table>
<input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
<input type="hidden" name="act"  value="analysis_results">
<input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
<input type="hidden" name="order" id="order" value="{$order}">
<input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>
{/block}