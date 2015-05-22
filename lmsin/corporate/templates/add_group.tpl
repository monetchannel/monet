{extends file="index.tpl"}
{block name=body}
    
<link rel="stylesheet" type="text/css" href="js/choosen/chosen.css" rel="stylesheet" />
<script src="js/choosen/chosen.jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>    <!-- using for validation purposes -->
<script src="js/add_group.js"></script>
<script type="text/javascript">

$(function(){   
    $.validator.setDefaults({ ignore: ":hidden:not(select)" })   
    $("form").validate({       
            errorPlacement: function ($errorLabel, $element) {
                var elementId = $element.prop('id');
                if(elementId=="select_users"){
                    var $selectContainer = $element.closest('.form-group').find('#helpBlock');
                    $errorLabel.insertAfter($selectContainer);                    
                }else{
                    var $elementToInsertAfter = $element;
                    $errorLabel.insertAfter($elementToInsertAfter);                             
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        
    $(".chosen-select").chosen({ disable_search_threshold: 10 });    
})

</script>

<div class="alert alert-warning" style="display:none; margin-top:20px; padding-top:20px">  
  <a class="close" data-dismiss="alert">×</a>  
  <span id="error_msg"></span>  
</div>  

{if $dataArray.success}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$dataArray.success}  
</div>  
{/if}

{if $dataArray.updationStatus}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$dataArray.updationStatus}  
</div>  
{/if}

<div class="row  margin-top">
<div class="col-xs-3">
<img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
</div>
</div>                

<div class="wrapper">


<form method="POST" action="add_group.php" name="campaignform" enctype="multipart/form-data" class="col-md-12" >
    
    <div class="row">
        <div class="col-md-3"><h2>&nbsp;&nbsp;{$dataArray.pageHeading}</h2></div>
        <div class="col-md-3" style="text-align:right;">
            <a id="enable_editing" href="javascript:void(0)">Click here to edit</a>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control input-lg"  name="group_name" id="group_name" 
                   data-msg-required="Please enter group name."
                   data-rule-required="true" value="{$dataArray.g_name}" placeholder="Group Name" /> <br/>   
            
        </div>
                   
        <input type="hidden" class="form-control input-lg"  name="group_company" id="group_company" value="{$dataArray.g_company_id}" />               
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">            
            <input type="text" class="form-control input-lg" placeholder="Subject" name="group_subject" id="group_subject" 
                   data-msg-required="Please enter the subject for group."
                   data-rule-required="true"
                   value="{$dataArray.g_subject}"  />
        </div>    
    </div>
        
    
    <div class="row">
        <div class="form-group col-md-6">
            <textarea class="form-control input-lg" name="group_description" id="group_description" 
                      data-msg-required="Please enter some description for group."
                      data-msg-maxlength="The description cannot be greater than 1000 characters."
                      data-msg-minlength="Please enter atleast 10 characters for description"
                      data-rule-maxlength="1000" data-rule-minlength="10"
                      data-rule-required="true"
                      placeholder="Group Description" rows="6">{$dataArray.g_desc}</textarea>
        </div>                      
    </div>  
        
     <div class="row">
        <div class="form-group col-md-2">
            <label for="select_users">Select Age Range</label>
            
            <select id="select_agegroup1" name="select_agegroup1" class="form-control input-lg chosen-select" >{$dataArray.ageSelectOptions}</select> 
            &nbsp; - &nbsp;    
            <select id="select_agegroup2" name="select_agegroup2" class="form-control input-lg chosen-select" >{$dataArray.ageSelectOptions}</select>   
        </div>       

        <div class="form-group col-md-2">
            <label for="select_users">Choose Sex</label>
            <select id="select_sex" name="select_sex" class="form-control input-lg chosen-select" >
                <option value="">--Sex--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>   
        </div>
        <div class="form-group col-md-2">
            <label for="select_country">Choose Country</label>
            <select id="select_country" name="select_country" class="form-control input-lg chosen-select" >
                <option value="">--Country--</option>{$dataArray.countrySelectOptions}</select>   
            <label for="select_state">Choose State</label> 
            <select id="select_state" name="select_state" class="form-control input-lg chosen-select">
                <option value="">--State--</option>
            </select>
        </div>
    </div>       
        
    <div class="row">
        <div class="form-group col-md-6">
            <label for="select_users">Select Group Users</label>
            <select id="select_users" multiple name="select_users[]" class="form-control input-lg chosen-select" 
                    data-msg-required="Please select any user."
                    data-rule-required="true">{$dataArray.userSelectOptions}</select>
            <span id="helpBlock" class="help-block">Note: Use ctrl button to select multiple users.</span>
        </div>
    </div>    
      
    <div class="row col-md-6">
        <div class="form-group text-center">
        <input type="submit" value="Submit" name="B1"  class="btn btn-default" id="buttongray" />
        <input type="button" value="Go back" name="B1"  class="btn btn-default" id="buttongray" onclick="javascript:location.href='groups.php'" />
        </div>
    </div>
    
    <input type="hidden" name="action" id="action" value="{$dataArray.action}">
    <input type="hidden" name="group_id" id="group_id" value="{$dataArray.g_id}">
    <input type="hidden" name="demography_id" id="demography_id" value="{$dataArray.g_demography_id}">  
</form>

</div>
{/block}