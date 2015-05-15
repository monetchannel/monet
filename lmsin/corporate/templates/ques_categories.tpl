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
                    <a class="btn btn-primary btn-sm btn-bottom-space" role="button" href="add_ques_category.php">Add Category</a>
                    <div class="clear"></div>									
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>Question Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     
                   {if $assigningValArray.num_rows gt 0}
                    
                    {foreach $assigningValArray.qset_schema as $eachQCategory}
                        {$cid = $eachQCategory.question_set_id}
                        <tr>
                            <td class="col-md-6 second-td">{$eachQCategory.question_set}</td>
                            <td class="col-md-6 second-td">
                            <div class="container-fluid">
                                    <div class="row  action pull-right"> 
                                                                            
                                    <a href="add_ques_category.php?qcat_id={$eachQCategory.question_set_id}&action=edit" ><img class=""  width="24" height="24" src="./images/edit.png">
                                    <div>Edit</div>
                                    </a>                                    
                                   
                                    <a onclick="javascript:var res = confirm('Are you really want to delete this category ?'); if(res==false){ return false; }" 
                                       href="ques_categories.php?action=delete&qcat_id={$eachQCategory.question_set_id}" >
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
                            <td>No question categories have been found.</td>
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

