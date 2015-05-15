{extends file="index.tpl"}
{block name=body}
    
<link rel="stylesheet" type="text/css" href="css/datepicker.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="js/choosen/chosen.css" rel="stylesheet" />
<link href="css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/add_campaign.js"></script>
<script src="js/choosen/chosen.jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>    <!-- using for validation purposes -->
<script type="text/javascript" src="js/jquery.multi-select"></script>
<script type="text/javascript">

var questionSetError = "";

function chk_all()
{
        var filteredUsers = $('#select_users').val();  
        var filteredGroups = $('#select_groups').val();
        if(document.getElementById('campaign_name').value=="" || document.getElementById('campaign_video').value==""  || document.getElementById('campaign_subject').value=="" || document.getElementById('campaign_startdate').value=="" || document.getElementById('campaign_enddate').value=="" )
        {
                $('#error_msg').html('Please fill all mandatory fields to continue.');			
                $('.alert').show();
                return false;
        }else if(filteredUsers==null){
                $('#error_msg').html('Please select atleast one group member from the users list.');			
                $('.alert').show();
                return false;
        }else{
                document.campaignform.submit();
        }
}

$(function(){
    $('.datepicker-input').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d',
	autoclose: true
    }); 
    
    $('#ug_selection_tab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
    $('#ug_selection_tab a[href="#select_users_tab"]').tab('show') // Select tab by name
    $(".chosen-select").chosen({ disable_search_threshold: 10 });
    //$('#wrapper .container-fluid').css({ 'height':'950px' });  // increasing the height, on runtime 
    
    // onclick event bind for questions chhosen
    $('.choose_questions').on('click', function(e){
        $('#question_error_label').remove();
        var category_selected = $(this).attr('data-category-val');
        var len = $('input[data-category-val="'+category_selected+'"]:checked').length;
        var errorHtml = "";
        if(len>2){
            e.preventDefault();
            questionSetError = "Maximum 2 questions are allowed to choose for each category";
            errorHtml = '<label id="question_error_label" class="error" for="campaign_name">Maximum 2 questions are allowed to choose for each category</label>';
            var $selectContainer = $(this).closest('#quest_check_list');
            $(errorHtml).insertAfter($selectContainer); 
        }
    });
    
    // custom validation method for date comparison
    $.validator.setDefaults({ ignore: ":hidden:not(select)" })
    jQuery.validator.addMethod("greaterthan", function (value, element, params) {
      //return this.optional(element) || value !== $(params.other).val();    
      if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
      }
      
      return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) > Number($(params).val()));
        
        //return this.optional(element) || value !== $(params.other).val();
    }, "End date should be greater than start date");
    
    /*
    jQuery.validator.addMethod("SelectLimit", function (value, element, params) {
       return Number(value.length) < Number(10);
    }, "Maximum 10 questions are allowed to select.");
    */
    
    $("form").validate({
         
            errorPlacement: function ($errorLabel, $element) {
                var elementId = $element.prop('id');
                if(elementId=="select_users" || elementId=="select_groups"){
                    var $selectContainer = $element.closest('.tab-content');
                    $selectContainer.append($errorLabel);
                }else if(elementId=="select_questions"){
                    var $selectContainer = $element.closest('.form-group').find('#helpBlock');
                    $errorLabel.insertAfter($selectContainer);                    
                }else if(elementId=="choose_questions"){
                    var $selectContainer = $element.closest('#quest_check_list');
                    $errorLabel.insertAfter($selectContainer);                    
                }else{
                    var $elementToInsertAfter = $element;
                    $errorLabel.insertAfter($elementToInsertAfter); 
                }                                         
            },

            submitHandler: function (form) {
                chk_all();
            }
        });
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
<h2>&nbsp;&nbsp;{$dataArray.pageHeading}</h2>

<form method="POST" action="add_campaign.php" name="campaignform" enctype="multipart/form-data" class="col-md-12" >
        
    <div class="row">
        <div class="form-group col-md-6">
            <label for="campaign_name">Campaign Name</label>
            <input type="text" class="form-control input-lg"  name="campaign_name" id="campaign_name" data-msg-required="Please enter campaign name."
                   data-rule-required="true" value="{$dataArray.campaign_name}" placeholder="Campaign Name" /> <br/> 
            
            <label for="campaign_video">Select Any Video</label>
            <select name="campaign_video" class="form-control input-lg" 
                    data-msg-required="Please select any video."
                    data-rule-required="true"
                    id="campaign_video">{$dataArray.videoSelectOptions}</select> <br/>
                    
            <label for="campaign_description">Description</label>
            <textarea class="form-control input-lg" name="campaign_description" id="campaign_description" 
                      data-msg-maxlength="The description cannot be greater than 1000 characters."
                      data-rule-maxlength="1000"
                      placeholder="Campaign Description" rows="6">{$dataArray.campaign_desc}</textarea>        
                    
        </div>
        <div class="form-group col-md-6">
            <div role="tabpanel">
                
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="ug_selection_tab">
                  <li role="presentation"><a href="#select_users_tab" aria-controls="select_users_tab" role="tab" data-toggle="tab">Users</a></li>
                  <li role="presentation"><a href="#select_groups_tab" aria-controls="select_groups_tab" role="tab" data-toggle="tab">Groups</a></li>
                </ul>
                
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="select_users_tab">
                        <label for="select_users">Select Campaign Users</label>
                        <select id="select_users" multiple name="select_users[]" class="form-control input-lg" 
                                data-msg-required="Please select any user."
                                data-rule-required="true">{$dataArray.userSelectOptions}</select>
                    </div>     

                    <div role="tabpanel" class="tab-pane" id="select_groups_tab">
                        <label for="select_groups">Select Campaign Groups</label>
                        <select id="select_groups" multiple name="select_groups[]" 
                                class="form-control input-lg">{$dataArray.groupSelectOptions}</select>
                    </div>        

                </div>
            </div>    
        </div>
        
    </div>
        
    
    <div class="row">      
        <div class="form-group col-md-6">
            <label for="select_groups">Campaign Subject</label>
            <input type="text" class="form-control input-lg" placeholder="Subject" name="campaign_subject" id="campaign_subject" 
                   data-msg-required="Please enter the subject for campaign."
                   data-rule-required="true"
                   value="{$dataArray.campaign_subject}"  />
        </div> 
        
        <div class="form-group col-md-6">                                                         
            <label class="cmp_status_label">       
              <input type="checkbox" name="campaign_status" id="campaign_status" value="1" {$dataArray.campaign_status}  > Active
            </label>
            &nbsp;&nbsp;
            <label class="cmp_status_label">       
              <input type="checkbox" name="open_for_all" id="open_for_all" value="1" {$dataArray.open_for_all} > Open for all
            </label>
        </div>     
        
    </div>    
    
    <div class="row"> 
        <div class="form-group col-md-3">
            <label for="campaign_startdate">Select Start Date</label>
            <input type="text" class="form-control input-lg datepicker-input" placeholder="Start Date" name="campaign_startdate" 
                   data-msg-required="Please select start date." data-rule-required="true" readonly="readonly"
                   id="campaign_startdate" value="{$dataArray.campaign_startdate}"  />
        </div>
        <div class="form-group col-md-3">
            <label for="campaign_enddate">Select End Date</label>
            <input type="text" class="form-control input-lg datepicker-input" placeholder="End Date" name="campaign_enddate" 
                   data-msg-required="Please select end date." 
                   data-rule-required="true" readonly="readonly"
                   data-rule-greaterthan="#campaign_startdate"
                   id="campaign_enddate" value="{$dataArray.campaign_enddate}"  />
        </div>
        
        <div class="form-group col-md-6">
            <label for="select_groups">Select Questions</label>
            <select id="select_questions" multiple name="select_questions[]" 
                    data-rule-selectLimit="true" data-msg-required="Please select any category."
                    data-rule-required="true"
                    class="form-control input-lg chosen-select">{$dataArray.questionSelectOptions}</select>
            <span id="helpBlock" class="help-block">Note: Use ctrl button to select multiple categories.</span>
            
            <!-- questions list will appear in this div -->
            <div id="quest_check_list">
                {$dataArray.allSelectedSetQuestions}
            </div>
        </div>      
            
    </div>   
            
    <div class="row">
            
    </div>            
      
   
    <div class="row">
    <div class="form-group text-center">
    <input type="submit" value="Submit" name="B1"  class="btn btn-default" id="buttongray" />
    <input type="button" value="Go back" name="B1"  class="btn btn-default" id="buttongray" onclick="javascript:location.href='campaign.php'" />
    </div>
    </div>
    
    <input type="hidden" name="action" id="action" value="{$dataArray.action}">
    <input type="hidden" name="campaign_id" id="campaign_id" value="{$dataArray.campaign_id}">   
    <input type="hidden" name="selected_video_id" id="selected_video_id" value="{$dataArray.selected_video_id}">
</form>

</div>
{/block}