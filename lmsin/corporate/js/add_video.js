/*
$(function(){   
     
    $('#set_id').on('change', function(){
        var selectedCat = $(this).val();
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'generate_category_questions', category_set:selectedCat },
            success: function(data){
                if(data){
                   //console.log(data);
                   $('#quest_check_list').html(data);
                   
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
                }else{
                    $('#quest_check_list').html("");
                }
            },
            error: function(status){
                console.log(status);
            }
        });
    });  
    
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
    
});


function editCampaignQuestionMapping(qCollection, campaignId, contentId){
    if(qCollection.length>0){
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'edit_campaign_question_mapping', question_col:qCollection, campaign_id:campaignId, content_id:contentId },
            success: function(data){
                
                if(data){
                    // do whatever
                }
            },
            error: function(status){
                console.log(status);
            }
        });
    }
}



function deleteEditingCampaignUser(userId){
    var userid = userId;
    var campaignid = $('#campaign_id').val();
    
    $.ajax({
        url: 'ajax/utilities.php',
        method: 'post',
        data: {'action':'delete_editing_group_user_mapping', user_id:userid, campaign_id:campaignid},
        success: function(data){
            if(data){
                $('#filtered_users p#'+userId).remove();
            }
        },
        error: function(status){
            console.log(status);
        }
    });
}
*/

function getCategoryQuestionsList(categoryElement){
        var selectedCat = $(categoryElement).val();
        console.log(selectedCat);
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'generate_category_questions', category_set:selectedCat },
            success: function(data){
                if(data){
                   //console.log(data);
                   $('#quest_check_list').html(data);
                   
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
                }else{
                    $('#quest_check_list').html("");
                }
            },
            error: function(status){
                console.log(status);
            }
        });
}

function optionsAllowedToChoose(thisElement){
    $('#question_error_label').remove();
    var category_selected = $(thisElement).attr('data-category-val');
    var len = $('input[data-category-val="'+category_selected+'"]:checked').length;
    var errorHtml = "";
    console.log(len);
    if(len>2){       
        questionSetError = "Maximum 2 questions are allowed to choose for each category";
        errorHtml = '<label id="question_error_label" class="error" for="campaign_name">Maximum 2 questions are allowed to choose for each category</label>';
        var $selectContainer = $(thisElement).closest('#quest_check_list');
        $(errorHtml).insertAfter($selectContainer); 
        $(thisElement).click();
    }
}