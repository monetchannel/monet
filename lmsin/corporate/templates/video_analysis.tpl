{extends file="index.tpl"}
{block name=body}

{if $msg}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$msg}  
</div>  
{/if}

<form name="frm" method="POST" action="analysis.php" >
    <div class="row  margin-top">
        <div class="col-xs-4 col-sm-4 col-md-6">
            
            <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
           <!-- <img class="img-responsive" src="./images/pepsilogo.png">-->
            
        </div>   
    </div>
    
    {if $tot_rows>0}

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>Video</th>
                        <th><a href="javascript: set_order('c_title','{$c_title_order}')" style="color:#FFF">Title</a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                {foreach $videos as $video}
                    <tr>
                        <td class="field-label col-xs-2 col-sm-2 col-md-2 text-align"><img class="img-responsive" src="{$video.c_thumb_url}" alt="125x125">
                        </td>
                        <td class="col-md-2  second-td">
                                {$video.c_date}-Uploaded By </br>
                                {$video.c_title}</br>
                                Feedback: {$video.num_feedback}
                        </td>
                        
                        <td class="col-md-5 third-td" >
                            <div class="container-fluid">
                                <div class="row  action pull-right">
                                <a href="#" >
                                <input type="checkbox" name="valence[]" id="Valence_{$video.c_id}" value="{$video.ar_id}" class="{$video.c_id}" />
                                <div><label for="Valence_{$video.c_id}">Valence</label></div>
                                </a>
                                
                                <a href="#">
                                <input type="checkbox" name="microexpressions[]" id="Microexpressions_{$video.c_id}" value="{$video.ar_id}" class="{$video.c_id}" />
                                <div><label for="Microexpressions_{$video.c_id}">Microexpressions</label></div>
                                </a>	
                                
                                <a href="#">
                                <input type="checkbox" name="engagement[]" id="Engagement_{$video.c_id}" value="{$video.ar_id}" class="{$video.c_id}" />
                                <div><label for="Engagement_{$video.c_id}">Engagement</label></div>
                                </a>
                                
                                <a href="#">
                                <input type="checkbox" name="AreaUG[]" id="AreaUG_{$video.c_id}" value="{$video.ar_id}" class="{$video.c_id}" />
                                <div><label for="AreaUG_{$video.c_id}">Area Under Graph</label></div>
                                </a>
	
                                <a href="#">
                                <input type="checkbox" name="Heat_map[]" id="Heat_map_{$video.c_id}" value="{$video.ar_id}" class="{$video.c_id}" />
                                <div><label for="Heat_map_{$video.c_id}">Heat Map</label></div>
                                </a>      
                                  <button class="btn btn-sm btn-default" onclick="javascript:return generate_code('{$video.c_id}')"><strong>Generate</strong></button>
                                  <input type="hidden" name="vode_id[]" value="{$video.c_id}"  /> 
                               
                          </div>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
             </table>
             <div class="col-xs-2 margin-bottom">
              <button class="btn btn-sm btn-default" onclick="javascript:compare_video()"><strong> Compare Videos</strong></button> </div>
             <table class="table">
                <tr>
                    <td>
                    Show<select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
                    {$nrppOpt}
                    </select>
                    records per page
                    </td>
                    <td>&nbsp;</td>
                    <td class="text-right">
                    {$nb_text}
                    </td>
                </tr>
             </table>
        </div>
    </div>
    {else}
    <br />
    <div class="text-center alert alert-info">Your current video Analysis list is empty.</div>
    {/if}

  <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
  <input type="hidden" name="ser_key" id='ser_key' value="{$ser_key}">
  <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
  <input type="hidden" name="order" id="order" value="{$order}">
  <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
  <input type="hidden" name="act" id="act" value="generate_code" />
  <input type="hidden" name="ad_ar_id" value="" />   
</form>
<script>
	function compare_video()
	{
		document.frm.act.value='compare_video_analysis'
		document.frm.submit();
	}

function generate_code(ar_id,className)
{
	var checkBoxes=document.getElementsByClassName(className);
	
	var booleanResult=false;
	for(var i=0;i<checkBoxes.length;i++){
		if(checkBoxes[i].checked){
			booleanResult=true;
			break;
		}
	}
	if(booleanResult==false)
	{
		alert("Please select at least one.")
		return false;
	}
	
	document.frm.ad_ar_id.value=ar_id;
	document.frm.submit();
}
</script>
{/block}