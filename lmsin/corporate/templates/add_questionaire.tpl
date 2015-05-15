{extends file="index.tpl"}
{block name=body}
    
<link rel="stylesheet" type="text/css" href="js/choosen/chosen.css" rel="stylesheet" />
<script src="js/jquery.validate.js"></script>    <!-- using for validation purposes -->
<script type="text/javascript">

$(function(){   
    $.validator.setDefaults({ ignore: ":hidden:not(select)" })     
    
    $("form").validate({       
            errorPlacement: function ($errorLabel, $element) {
                var elementId = $element.prop('id');
                if(elementId=="status"){
                    var $selectContainer = $element.closest('.form-group');
                    $errorLabel.insertAfter($selectContainer);
                }else{
                    var $elementToInsertAfter = $element;
                    $errorLabel.insertAfter($elementToInsertAfter);                             
                }
            },
            submitHandler: function (form) {
                /*
                var optionsSelectedSize = optionValidationFulfilled();
                $('#question_error_label').remove();
                // If the options
                if(optionsSelectedSize.length<2){
                   var errorLabel = '<label id="question_error_label" class="error" for="select_options[]">Atleast 2 options are required</label>';
                   $(errorLabel).insertAfter($('textarea#select_option5'));  
                }else{
                   form.submit();
                }
                */
                form.submit();
            }
        });
    
})

function optionValidationFulfilled(){
        var options_selected = $('textarea[name="select_options[]"]').map(function(){
                if(this.value!="") { 
                    return this.value;
                }
        }).get();
        
        return options_selected;
}
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
<form method="POST" action="add_questionaire.php" name="campaignform" enctype="multipart/form-data" class="col-md-12" >
    
    <div class="row">
        <div class="col-md-3"><h2>&nbsp;&nbsp;{$dataArray.pageHeading}</h2></div>      
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <label for="questiontxt">Question</label>
            <input type="text" class="form-control input-lg"  name="questiontxt" id="questiontxt" 
                   data-msg-required="Please enter question."
                   value="{$dataArray.question_text}"
                   data-rule-required="true" placeholder="Type your question here" /> <br/>   
            
        </div>                 
    </div>
                   
     <div class="row">
        <div class="form-group col-md-6">
            <label for="select_category">Select Any Category</label>
            <select id="select_category" name="select_category" class="form-control input-lg" 
                    data-msg-required="Please select any category."
                    data-rule-required="true">{$dataArray.categorySelectOptions}</select>
        </div>
    </div>                   
      
    <!--    
    {for $loop=1 to 5}
        {$option_index = $loop - 1}
    <div class="row">
        <div class="form-group col-md-6">
            <textarea class="form-control input-lg" id="select_option{$loop}" name="select_options[]" 
                      placeholder="Option {$loop}" rows="6">{$dataArray.mapped_question_options.$option_index}</textarea>
        </div>                      
    </div>  
    {/for}
    -->
    
    <div class="row">
        <div class="form-group col-md-6">
            <label for="status">Status : &nbsp;</label>
            <input type="radio" id="status" name="status" data-rule-required="true" 
                   {if $dataArray.question_status eq 0} {'checked'} {/if} data-msg-required="Please select status" value="0" > Private&nbsp;
            <input type="radio" id="status" name="status" data-rule-required="true" 
                   {if $dataArray.question_status eq 1} {'checked'} {/if}data-msg-required="Please select status" value="1" > Public&nbsp; 
            
        </div>                     
    </div>  
        
     
    <input type="hidden" name="action" id="action" value="{$dataArray.action}">
    <input type="hidden" name="qid" id="qid" value="{$dataArray.qid}">
      
    <div class="row col-md-6">
        <div class="form-group text-center">
        <input type="submit" value="Submit" name="B1"  class="btn btn-default" id="buttongray" />
        <input type="button" value="Go back" name="B1"  class="btn btn-default" id="buttongray" onclick="javascript:location.href='questionaire.php'" />
        </div>
    </div>
    
</form>

</div>
{/block}