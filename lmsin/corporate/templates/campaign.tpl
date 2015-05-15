{extends file="index.tpl"}
{block name=body}   
    
    {if isset($assigningValArray.deletionStatus)}
        <div class="alert alert-success margin-top">  
          <a class="close" data-dismiss="alert">×</a>  
          {$assigningValArray.deletionStatus}
        </div>      
    {/if}
    
    <div id="campaign_data">
        <form onsubmit="return false;" action="video.php" method="POST" name="frm">
            
         <div class="row  margin-top">
         <div class="col-xs-3">
         <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
         </div>
         </div>   
    
        <div style="margin-top:2%; margin-left: -1%" class="col-xs-8 col-sm-8 col-md-6 ">                      
                    <a class="video-link btn btn-primary btn-sm btn-bottom-space" role="button" href="add_campaign.php">Add campaign</a>
                    <!--
                    <input type="text" id="search" value="" placeholder="Search..." class="search-query" name="search">	
                    <button onclick="ser_by(document.getElementById('search').value)" class="search-btn" id="search"></button>
                    -->
                    <div class="clear"></div>									
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>Campaign Name</a></th>
                        <th>Campaign Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     
                   {if $assigningValArray.num_rows gt 0}
                    
                    {foreach $assigningValArray.campaign_schema as $eachcampaign}
                        <tr>
                            <td class="col-md-2 second-td">{$eachcampaign.cmp_name}</td>
                            <td class="col-md-3 second-td">{$eachcampaign.cmp_desc}</td>
                            <td class="col-md-2 second-td">{$eachcampaign.cmp_start}</td>
                            <td class="col-md-2 second-td">{$eachcampaign.cmp_end}</td>
                            <td class="col-md-1 fourth-td">
                                {if $eachcampaign.status=="1"}
                                    <img src="./images/active_status.png" /> 
                                {else}    
                                    <img src="./images/inactive_status.png" />
                                {/if}
                            </td>
                            <td class="col-md-2 fourth-td">
                                
                                <div class="container-fluid">
                                    <div class="row  action pull-right">                             

                                    <a href="add_campaign.php?cmp_id={$eachcampaign.cmp_id}&action=edit">
                                    <img width="24" height="24" class="" src="./images/edit.png">
                                    <div>Edit</div>
                                    </a>	                                                         

                                    <a onclick="javascript:var res = confirm('Are you really want to delete this campaign ?'); if(res==false){ return false; }" 
                                       href="campaign.php?action=delete&cmp_id={$eachcampaign.cmp_id}" >
                                    <img width="24" height="24" class="" src="./images/delete.png">
                                    <div>Delete</div>
                                    </a>                                                                   

                                    </div>
                                </div>
                                
                            </td>
                        
                        </tr>
                    {/foreach} 
                    {else}
                        <tr>
                            <td>No campaigns have been found.</td>
                        </tr>
                    {/if}
                </tbody>
                </table>
                
                <table class="table">
                    <td></td>
                    <td></td>
                    <td class="text-right">
                        {$assigningValArray.paginationlinks}
                    </td>
                </table>   
           
        </div>
    </div>
    
 
  
</form>
    </div>
{/block}

