{extends file="index.tpl"}
{block name=body} 

<div class="row  margin-top">
<div class="col-xs-3">
<img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
</div>
</div>                

<div class="wrapper">
<h2>&nbsp;&nbsp;{$dataArray.pageHeading}</h2>

<form method="POST" action="add_campaign.php" name="campaignform" enctype="multipart/form-data" class="form-horizontal"  >
        
    <div class="form-group">
        <label class="col-sm-2 control-label">Group Name</label>  
        <div class="col-sm-10">
            <p class="form-control-static">{$groupDataArray.group_name}</p>
        </div>
    </div>       
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Group Subject</label>
        <div class="col-sm-10">
            <p class="form-control-static">{$groupDataArray.group_subject}</p>
        </div>
    </div>     
        
    <div class="form-group">
        <label class="col-sm-2 control-label">Group Description</label>      
        <div class="col-sm-10">
            <p class="form-control-static">{$groupDataArray.group_description}</p>
        </div>
    </div>   
        
    <div class="form-group">
        <label class="col-sm-2 control-label">Company Name</label>      
        <div class="col-sm-10">
            <p class="form-control-static">{$groupDataArray.group_companyname}</p>
        </div>
    </div>     
        
    <div class="form-group">
        <label class="col-sm-2 control-label">Group Users</label>      
        <div class="col-sm-10">
            <p class="form-control-static">{$groupDataArray.groups_users_list}</p>
        </div>
    </div>         
   
    
    <div class="form-group">
    <div class="col-sm-2 control-label">
    <input type="button" value="Go back" name="B1"  class="btn btn-default" id="buttongray" onclick="javascript:location.href='groups.php'" />
    </div>
    </div>
   
    
</form>

</div>
{/block}