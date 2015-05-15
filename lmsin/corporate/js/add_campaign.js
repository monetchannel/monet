$(function(){   
    var chkAction = $('#action').val();     
    $('#select_users').multiSelect({ 
        //selectableOptgroup: true
        selectableFooter: "<div class='note-label-select'>Brand Users</div>",
        selectionFooter: "<div class='note-label-select'>Selected Campaign Users</div>"
    });
    
    $('#select_groups').multiSelect({ 
        //selectableOptgroup: true
        selectableFooter: "<div class='note-label-select'>Brand Groups</div>",
        selectionFooter: "<div class='note-label-select'>Selected Campaign Groups</div>"
    });
    
    $('#select_questions').on('change', function(){
        var selectedCat = $(this).val();
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'generate_category_questions', category_set:selectedCat },
            success: function(data){
                if(data){
                   $('#quest_check_list').html(data);
                   
                   // now add validation for only two options
                   // onclick event bind for questions choosen
                    $('.choose_questions').on('click', function(e){
                        $('#question_error_label').remove();
                        var category_selected = $(this).attr('data-category-val');
                        console.log(category_selected);
                        var len = $('input[data-category-val="'+category_selected+'"]:checked').length;
                        var errorHtml = "";
                        console.log(len);
                        if(len>2){
                            e.preventDefault();
                            questionSetError = "Maximum 2 questions are allowed to choose for each category";
                            errorHtml = '<label id="question_error_label" class="error" for="campaign_name">Maximum 2 questions are allowed to choose for each category</label>';
                            var $selectContainer = $(this).closest('#quest_check_list');
                            $(errorHtml).insertAfter($selectContainer); 
                        }
                    });
                   
                }
            },
            error: function(status){
                console.log(status);
            }
        });
    });    
    
    
})


function insertUserGroupMapping(userCollection, chkAction){
    if(userCollection.length>0){
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'insert_group_user_mapping', user_col:userCollection },
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

function editUserGroupMapping(userCollection, campaignId){
    if(userCollection.length>0){
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'edit_group_user_mapping', user_col:userCollection, campaign_id:campaignId },
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

function editCampaignGroupMapping(groupCollection, campaignId){
    if(groupCollection.length>0){
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'edit_campaign_group_mapping', group_col:groupCollection, campaign_id:campaignId },
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


function deleteThisUser(userId){
    var userid = userId;
    $.ajax({
        url: 'ajax/utilities.php',
        method: 'post',
        data: {'action':'delete_group_user_mapping', user_id:userid, },
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