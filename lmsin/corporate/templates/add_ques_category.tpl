{extends file="index.tpl"}
{block name=body}
    
<link rel="stylesheet" type="text/css" href="js/choosen/chosen.css" rel="stylesheet" />
<script src="js/choosen/chosen.jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>    <!-- using for validation purposes -->
<!--<script src="js/add_group.js"></script>-->
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


<form method="POST" action="add_ques_category.php" name="categoryform" enctype="multipart/form-data" class="col-md-12" >
    
    <div class="row">
        <div class="col-md-3"><h2>&nbsp;&nbsp;{$dataArray.pageHeading}</h2></div>      
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control input-lg"  name="category_name" id="category_name" 
                   data-msg-required="Please enter category name."
                   data-rule-required="true" value="{$dataArray.category_name}" placeholder="Category Name" /> <br/>              
        </div>                   
    </div>     
    
    <!--    
    <div class="row">
        <div class="form-group col-md-6">
            <label for="select_questions">Select Category Questions</label>
            <select id="select_questions" multiple name="select_questions[]" class="form-control input-lg chosen-select" 
                    data-msg-required="Please select any question."
                    data-rule-required="true">{$dataArray.questionSelectOptions}</select>
            <span id="helpBlock" class="help-block">Note: Use ctrl button to select multiple questions.</span>
        </div>
    </div> 
    -->
    
            
    <div class="row">             
        <div class="form-group col-md-6">                                                         
            <label class="cmp_status_label">       
              <input type="checkbox" name="category_status" id="category_status" value="1" {$dataArray.category_status}  > Active
            </label>          
        </div>            
    </div>            
      
    <div class="row col-md-6">
        <div class="form-group text-center">
        <input type="submit" value="Submit" name="B1"  class="btn btn-default" id="buttongray" />
        <input type="button" value="Go back" name="B1"  class="btn btn-default" id="buttongray" onclick="javascript:location.href='ques_categories.php'" />
        </div>
    </div>
    
    <input type="hidden" name="action" id="action" value="{$dataArray.action}">
    <input type="hidden" name="qcat_id" id="qcat_id" value="{$dataArray.qcat_id}">
    
</form>

</div>
{/block}