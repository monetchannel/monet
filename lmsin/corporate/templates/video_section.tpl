{extends file="index.tpl"}
{block name=body} 
<script>
{$js}
function nb(a)
{
	this.document.frm.st_pos.value=a;
	this.document.frm.act.value="video_section";
	this.document.frm.submit();
}
function set_page()
{
	this.document.frm.act.value="video_section";
	this.document.frm.nrpp.value=document.getElementById('op_nrpp').value;
	this.document.frm.submit();
}
function play_video(video_id,start,end,c_id)
{
	var vlc_from='{$valence_from}';
	var vlc_to='{$valence_to}';
	//window.open ("analysis.php?act=play_video&video_id="+video_id+"&start_time="+start+"&end_time="+end+"&c_id="+c_id+"&vlc_from="+vlc_from+"&vlc_to="+vlc_to+"&time_segment="+this.document.frm.time_segment.value,"mywindow","menubar=0,status=1,toolbar=0, width=660,height=684");
	location.href="analysis.php?act=play_video&video_id="+video_id+"&start_time="+start+"&end_time="+end+"&c_id="+c_id+"&vlc_from="+vlc_from+"&vlc_to="+vlc_to+"&time_segment="+this.document.frm.time_segment.value;
}
function go_button()
{
	this.document.frm.st_pos.value=0;
}
</script> 
{if $msg}
<div class="alert alert-success margin-top"> <a class="close" data-dismiss="alert">×</a> {$msg} </div>
{/if}
<form name="frm" method="POST" action="analysis.php" onsubmit="return go_button()">
  <div class="row  margin-top">
    <div class="col-xs-3"> <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" /> 
    </div>
    
     <div class="col-md-9">Select Range:&nbsp;&nbsp;&nbsp; From
            <select name="valence_from" id="valence_from" style="width:100px;">
            <option value="-2">Select</option> 
             <option value="-1" {$valence_from_minuswhole1}>-1</option>
             <option value="-.9" {$valence_from_minus9}>-.9</option>
             <option value="-.8" {$valence_from_minus8}>-.8</option>
             <option value="-.7" {$valence_from_minus7}>-.7</option>
             <option value="-.6" {$valence_from_minus6}>-.6</option>
             <option value="-.5" {$valence_from_minus5}>-.5</option>
             <option value="-.4" {$valence_from_minus4}>-.4</option>
             <option value="-.3" {$valence_from_minus3}>-.3</option>
             <option value="-.2" {$valence_from_minus2}>-.2</option>
             <option value="-.1" {$valence_from_minus1}>-.1</option>
             <option value="0" {$valence_from_0}>0</option>
             <option value=".1" {$valence_from_plus1}>.1</option>
             <option value=".2" {$valence_from_plus2}>.2</option>
             <option value=".3" {$valence_from_plus3}>.3</option>
             <option value=".4" {$valence_from_plus4}>.4</option>
             <option value=".5" {$valence_from_plus5}>.5</option>
             <option value=".6" {$valence_from_plus6}>.6</option>
             <option value=".7" {$valence_from_plus7}>.7</option>
             <option value=".8" {$valence_from_plus8}>.8</option>
             <option value=".9" {$valence_from_plus9}>.9</option>
             <option value="1" {$valence_from_1}>1</option>
            </select>&nbsp;&nbsp; To:
            <select name="valence_to" id="valence_to" style="width:100px;">
             <option value="-2">Select</option> 
             <option value="-1" {$valence_to_minuswhole1}>-1</option>
             <option value="-.9" {$valence_to_minus9}>-.9</option>
             <option value="-.8" {$valence_to_minus8}>-.8</option>
             <option value="-.7" {$valence_to_minus7}>-.7</option>
             <option value="-.6" {$valence_to_minus6}>-.6</option>
             <option value="-.5" {$valence_to_minus5}>-.5</option>
             <option value="-.4" {$valence_to_minus4}>-.4</option>
             <option value="-.3" {$valence_to_minus3}>-.3</option>
             <option value="-.2" {$valence_to_minus2}>-.2</option>
             <option value="-.1" {$valence_to_minus1}>-.1</option>
             <option value="0" {$valence_to_0}>0</option>
             <option value=".1" {$valence_to_plus1}>.1</option>
             <option value=".2" {$valence_to_plus2}>.2</option>
             <option value=".3" {$valence_to_plus3}>.3</option>
             <option value=".4" {$valence_to_plus4}>.4</option>
             <option value=".5" {$valence_to_plus5}>.5</option>
             <option value=".6" {$valence_to_plus6}>.6</option>
             <option value=".7" {$valence_to_plus7}>.7</option>
             <option value=".8" {$valence_to_plus8}>.8</option>
             <option value=".9" {$valence_to_plus9}>.9</option>
             <option value="1" {$valence_to_1}>1</option>
            </select>&nbsp;&nbsp;&nbsp;<!--Time Segment: --><input type="hidden" name="time_segment" value="{$time_segment}" size="3" />&nbsp;&nbsp;&nbsp;<input id="buttongray" class="mybutton" type="submit" name="go"  value="  GO  " /></div>
   
  </div>
  {if $tot_rows>0}
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered" width="100%">
        <thead>
          <tr>
            <th>Video Title</th>
            <th>Time Slices</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        
        {foreach $videos as $record}
        <tr>
          <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align">{$record.c_title}</td>
          <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align">{$record.time_slice}</td>
          <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align"><a href="javascript:play_video('{$record.video_id}','{$record.start_time}','{$record.end_time}','{$record.c_id}')">PLAY</a></td>
        </tr>
        {/foreach}
      </table>
      <table class="table">
        <tr>
          <td> Show
            <select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
                    {$op_nrpp}
            </select>
            records per page </td>
          <td>&nbsp;</td>
          <td class="text-right"> {$nb_text} </td>
        </tr>
      </table>
    </div>
  </div>
  {else} <br />
  <div class="text-center alert alert-info">Your current video section list is empty</div>
  {/if}
  <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
  <input type="hidden" name="act"  value="video_section">
  <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
  <input type="hidden" name="order" id="order" value="{$order}">
  <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>
{/block}