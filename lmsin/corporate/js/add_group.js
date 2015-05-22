var gobalData = {};
var filteredGroupUsers = "";

$(function(){   
    // on change event handler for age dropdowns 
    $('#select_agegroup1, #select_agegroup2, #select_sex, #select_country, #select_state').on('change', function(){
        var age1 = $('#select_agegroup1').val();
        age1 = (age1!="" && age1!="-1") ? age1 : "";
        var age2 = $('#select_agegroup2').val();
        age2 = (age2!="" && age2!="-1") ? age2 : "";
        var gender = $('#select_sex').val();
        gender = (gender!="" && gender!="-1" ) ? gender : "";
        var countryid = $('#select_country').val();
        countryid = (countryid!="" && countryid!="-1" ) ? countryid : "";
        var stateid = $('#select_state').val();
        stateid = (stateid!="" && stateid!="-1" ) ? stateid : "";
        
        if((age1!="" && age2!="") || gender!="" || countryid!="" || stateid!=""){
           filteredGroupUsers = getUsersAfterAgeFilter(age1, age2, gender, countryid, stateid);             
        }
    }); 
    
    // make by default every control disabled
    $(".chosen-select").attr('disabled', true).trigger("chosen:updated");
    
    var actionValue = getUrlParameter('action');
    console.log(actionValue);
    if(actionValue=="edit"){
        //disable by default all fields in case of edit 
        $('form[name=campaignform] input,textarea').attr('disabled', true);
    }else{
        // no need to show edit link
        $('#enable_editing').remove();
    }
    
    $('#enable_editing').on('click', function(){
        $('form[name=campaignform] input, textarea').attr('disabled', false);
        $(".chosen-select").attr('disabled', false).trigger("chosen:updated")
    })
    
    // populate states list according to the selected country
    $('#select_country').on('change', function(){
        var countryId = $(this).val(); 
        if(countryId!=""){
            // populate states dropdownlist
            getStatesList(countryId);
        }
    });    
})

function getUsersAfterAgeFilter(agefrom, ageto, genderval, countryval, stateval){
    var ageRange = -1; 
    var year_to = "";
    var year_from = "";
    var current_year = new Date().getFullYear();
    if(agefrom!='' && ageto!=''){
        ageRange = ageto-agefrom;
    }
    if(agefrom!='') year_to = current_year - agefrom;
    else year_to = current_year;
    if(ageto!='') year_from = current_year - ageto;    
    else year_from = 0;
    var filterParams = {
        'current_year':current_year,
        'year_to':year_to,
        'year_from':year_from,
        'age_range':ageRange,
        'gender':genderval,
        'country':countryval,
        'state':stateval
    };
    
    $.ajax({
        url: 'ajax/utilities.php',
        method: 'post',
        data: { 'action':'get_filtered_group_brandusers', filter_param:filterParams },
        success: function(data){                       
                $('#select_brandusers').html("");
                $('#select_brandusers').html(data);
                $('#select_brandusers').trigger("chosen:updated");             
        },
        error: function(status){
               console.log(status);
        }
    });
    
    $.ajax({
        url: 'ajax/utilities.php',
        method: 'post',
        data: { 'action':'get_filtered_group_globalusers', filter_param:filterParams },
        success: function(data){                       
                $('#select_globalusers').html("");
                $('#select_globalusers').html(data);
                $('#select_globalusers').trigger("chosen:updated");             
        },
        error: function(status){
               console.log(status);
        }
    });
}

function insertUserGroupMapping(userCollection, chkAction){
    if(userCollection.length>0){
        $.ajax({
            url: 'ajax/utilities.php',
            method: 'post',
            data: { 'action':'get_filtered_group_users', user_col:userCollection },
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

function getStatesList(countryid){
    var countryId = countryid;
    $.ajax({
        url: 'ajax/utilities.php',
        method: 'post',
        data: {'action':'get_country_states', country_id:countryId},
        success: function(data){
            if(data){
                if($.trim(data)!=""){
                    $('#select_state').html(data); 
                    $("#select_state").trigger("chosen:updated");
                }
            }
        },
        error: function(status){
            console.log(status);
        }
    });
}