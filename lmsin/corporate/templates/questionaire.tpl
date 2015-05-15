{extends file="index.tpl"}
{block name=body}   
    
    {if isset($assigningValArray.deletionStatus)}
        <div class="alert alert-success margin-top">  
          <a class="close" data-dismiss="alert">×</a>  
          {$assigningValArray.deletionStatus}
        </div>      
    {/if}
    
    <div id="campaign_data">
        <form action="questionaire.php" method="GET" name="frm">
            
         <div class="row  margin-top">
         <div class="col-xs-3">
              <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
         </div>
         </div>   
    
        <div style="margin-top:2%; margin-left: -1%" class="col-xs-8 col-sm-8 col-md-12 ">           
                    <a class="btn btn-primary btn-sm btn-bottom-space" role="button" href="add_questionaire.php">Add Question</a>
                    <div class="srch">
                        
                        <strong>Search Questions By :</strong>
                        <select id="category" name="category">
                            <option value="">Category</option>
                            {$assigningValArray.category_options}
                        </select>
                        
		        <input type="text" class="search-query" value="{$assigningValArray.searchtext}" id="search" name="search">
                        <button type="submit" class="search-btn" id="search"></button>
                        <button type="reset" id="reset">Reset</button>
                    	<div class="clear"></div>									
	            </div>
                    <div class="clear"></div>									
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     
                   {if $assigningValArray.num_rows gt 0}
                    
                    {foreach $assigningValArray.questions_schema as $eachQ}
                        {$qid = $eachQ.q_id}
                        <tr>
                            <td class="col-md-8 second-td">{$eachQ.q_question}</td>
                            <td class="col-md-4 second-td">
                            <div class="container-fluid">
                                    <div class="row  action pull-right"> 
                                                                            
                                    <a href="add_questionaire.php?qid={$qid}&action=edit" ><img class=""  width="24" height="24" src="./images/edit.png">
                                    <div>Edit</div>
                                    </a>                                    
                                   
                                    <a onclick="javascript:var res = confirm('Are you really want to delete this question ?'); if(res==false){ return false; }" 
                                       href="questionaire.php?action=delete&qid={$qid}" >
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
                            <td>No question have been found.</td>
                        </tr>
                    {/if}
                </tbody>
                </table>
                
                <table class="table">
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

