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
            
                    <a class="btn btn-primary btn-sm btn-bottom-space" role="button" href="add_group.php">Add Group</a>
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
                        <th>Group Name</a></th>
                        <th>Company</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     
                   {if $assigningValArray.num_rows gt 0}
                    
                    {foreach $assigningValArray.group_rows as $eachgroup}
                        {$cid = $eachgroup.g_id}
                        <tr>
                            <td class="col-md-2 second-td">{$eachgroup.g_name}</td>
                            <td class="col-md-2 second-td">{$eachgroup.g_company_id|getCompanyName}</td>
                            <td class="col-md-2 third-td">{$eachgroup.g_subject}</td>
                            <td class="col-md-3 third-td">{$eachgroup.g_desc}</td>
                            
                            <td class="col-md-2 fifth-td">
                                
                                <div class="container-fluid">
                                    <div class="row  action pull-right"> 
                                                                            
                                    <a href="add_group.php?group_id={$eachgroup.g_id}&action=edit" ><img class=""  width="24" height="24" src="./images/view.ico">
                                    <div>View</div>
                                    </a>                                    
                                   
                                    <a onclick="javascript:var res = confirm('Are you really want to delete this group ?'); if(res==false){ return false; }" 
                                       href="groups.php?action=delete&group_id={$eachgroup.g_id}" >
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
                            <td>No groups have been found.</td>
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

