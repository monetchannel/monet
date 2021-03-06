{extends file="index.tpl"}
{block name=body}

{if $msg}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$msg}  
</div>  
{/if}

<form name="frm" method="POST" action="campaign_analysis.php" >
    <div class="row  margin-top">
        <div class="col-xs-4 col-sm-4 col-md-6">
            <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
            <!-- <img class="img-responsive" src="./images/pepsilogo.png">-->
        </div>   
    </div>
    
    {if $video_num_rows>0}

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
                                    
                                <a href="javascript:void(0)" >
                                <input type="checkbox" name="excampaign[]" id="campaign_{$video.c_id}" value="excludecampaign" class="{$video.c_id}" />
                                <div><label>Exclude Campaign</label></div>
                                </a>  
                                
                                <a href="javascript:void(0)" >
                                    <input type="checkbox" name="valence[]" id="Valence_{$video.c_id}" value="valence" class="{$video.c_id}" checked="checked" />
                                <div><label for="Valence_{$video.c_id}">Valence</label></div>
                                </a>
                                
                                <a href="javascript:void(0)">
                                <input type="checkbox" name="microexpressions[]" id="Microexpressions_{$video.c_id}" value="emotion" class="{$video.c_id}" checked="checked" />
                                <div><label for="Microexpressions_{$video.c_id}">Microexpressions</label></div>
                                </a>	
                                
                                <a href="javascript:void(0)">
                                <input type="checkbox" name="engagement[]" id="Engagement_{$video.c_id}" value="attention" class="{$video.c_id}" checked="checked" />
                                <div><label for="Engagement_{$video.c_id}">Engagement</label></div>
                                </a>
                                
                                <a href="javascript:void(0)">
                                <input type="checkbox" name="Heat_map[]" id="Heat_map_{$video.c_id}" value="heatmap" class="{$video.c_id}" checked="checked" />
                                <div><label for="Heat_map_{$video.c_id}">Heat Map</label></div>
                                </a>    
                                
                                <button class="btn btn-sm btn-default" onclick="javascript:return generate_code('{$video.c_id}')"><strong>Analyze</strong></button>
                                <input type="hidden" name="vode_id[]" value="{$video.c_id}" /> 
                               
                          </div>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
             </table>
                
             <table class="table">
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        {$paging_html}
                    </td>
                </table>                
        </div>
    </div>
    {else}
    <br />
    <div class="text-center alert alert-info">Your current video analysis list is empty.</div>
    {/if}
    
    <input type="hidden" name="content_id" value="" />  

</form>
<script>
    /*
	function compare_video()
	{
		document.frm.act.value='compare_video_analysis'
		document.frm.submit();
	}
*/
function generate_code(contentId)
{
        var checkBoxes=document.getElementsByClassName(contentId);
	var booleanResult=false;
        var chkArray = [];
        eraseCookie("graphs_to_show");
        $.each(checkBoxes, function(index, obj){
            if(obj.checked){
               chkArray.push(obj.value);
               var chkData = JSON.stringify(chkArray);
               createCookie("graphs_to_show",chkData,"1");
               booleanResult = true;
            }
        });
        
        if(booleanResult==false)
	{
		alert("Please select at least one.");
                return false;
	}
	
        
        var cook = readCookie("graphs_to_show");
	location.href = 'campaign_analysis.php?cid='+contentId;
        return false;
}
</script>
{/block}