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
	//window.open ("analysis.php?act=analysis_graph&ad_ar_id="+ar_id, "mywindow","menubar=0,status=1,toolbar=0, width=990,height=900");
	//location.href='analysis.php?act=analysis_graph&ad_ar_id='+ar_id;
        //location.href='campaign_analysis.php?ad_ar_id='+ar_id;
        //return false;
        eraseCookie("graphs_to_show");
        var chkData = "valence,attention,emotion,heatmap";
        createCookie("graphs_to_show",chkData,"1");
        location.href='campaign_analysis.php?ad_ar_id='+ar_id;
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
		bootbox.alert('Please select at least one video.');
		return false;
	}
	else if(k>3)
	{
		bootbox.alert('Please select maximum three ratings only!');
		return false;
	}
	///window.open ("http://192.168.5.22/monet2014/corporate/new/analysis.php?act=compare_youtube&ar_ids="+ids, "mywindow","menubar=0,status=1,toolbar=0, width=1120,height=900");
	location.href='analysis.php?act=compare_youtube&ar_ids='+ids;
}
</script>

{if $msg}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$msg}  
</div>  
{/if}

<form name="frm" method="POST" action="analysis.php" onsubmit="return go_button()">


<div class="row  margin-top">
				<div class="col-xs-3">
					 <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
				</div>
                {if $tot_rows>0 || $search_msg==1}
            <div class="col-md-9">
            Select Video:
            <select name="c_id" id="c_id" style="width:100px;">
            {$content_option}
            </select>
            &nbsp;&nbsp;&nbsp;
            Select Category:
            <select name="cat_id" id="cat_id" style="width:100px;">
            {$category_option}
            </select>
            &nbsp;&nbsp;&nbsp;
            Select User:
            <select name="user_id" id="user_id" style="width:100px;">
            {$users_option}
            </select> &nbsp;
            <input id="buttongray" class="mybutton" type="submit" name="go"  value="  GO  " />
         
                 
            </div>
			</div>
            {/if}
<div class="row">
  <div class="col-md-12">
  {if $tot_rows>0}
    <table class="table table-bordered">
      
      <thead>
        <tr>
         <th>Compare</th>	
          <th>ID</th>
          <th>Date</th>
          <th>Video Title</th>
          <th>User</th>
          <th>Category</th>
          <th>Rated Emotion</th>
          <th>Dominant</th>
          <th>% Of Frames</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      
      {foreach $analysis as $record}
      <tr bgcolor="{$record.row_bg}">
     <td class="col-md-1 field-label"><input type="checkbox" name="compare_ar_id[]" value="{$record.ar_id}" /></td>
        <td class="col-md-2 field-label">{$record.cf_id}</td>
        <td class="col-md-2 field-label">{$record.ar_date|date_format:" %e %b %Y"}</td>
        <td class="col-md-3 field-label">{$record.c_title}</td>
        <td class="col-md-3 field-label">{$record.user_fname} {$record.user_lname}</td>
        <td class="col-md-2 field-label">{$record.cat_name}</td>
        <td class="col-md-3 field-label">{$record.ep_name}</td>
        <td class="col-md-3 field-label">{$record.ar_dominant_emoton|ucfirst}</td>
        <td class="col-md-3 field-label">{$record.percent}</td>
        <td class="col-md-4 field-label">Download - <a href="analysis.php?act=analysis_csv&ar_id={$record.ar_id}">CSV</a> | <a href="javascript:show_popup('{$record.ar_id}')">Graph</a></td>
      </tr>
      {/foreach}
        </tbody>
        <tr>
            <td colspan="10">
            	<input type="button" value=" Compare Videos" onclick="compare()" class="mybutton"   id="buttongray" /> 
            </td>
        </tr>
    </table>
    
    <table class="table">
    <tr>
    <td>
    Show<select name="op_nrpp" id="op_nrpp" onchange="javascript:set_page()" style="width:50px;">
			{$op_nrpp}
            </select>
    records per page
    </td>
    <td>&nbsp;</td>
    <td class="text-right">
    {$nb_text}
    </td>
    </tr>
    </table>
      {else}
     <br />
    <div class="text-center alert alert-info">
    {if $search_msg>0}
    	No analysis result found.
    {else}
    	Your current analysis result list is empty.
    {/if}
    </div>
     
      {/if}
  </div>
</div>
<input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
<input type="hidden" name="act"  value="analysis_results">
<input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
<input type="hidden" name="order" id="order" value="{$order}">
<input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>
{/block} 