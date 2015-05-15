<?php 
include ("../../includes/common_functions.php");
function reset_table($tablename, $tmp_company_id){
    $tresp = mysql_query("truncate table ".$tablename);
    return $tresp;
} 

function reset_edit_table($tablename, $campaign_id){
    $tresp = mysql_query("DELETE FROM ".$tablename." WHERE map_campaign_id='".$campaign_id."' and map_group_id='0'");
    return $tresp;
} 

function reset_campaign_groups($tablename, $campaign_id){
    $tresp = mysql_query("DELETE FROM ".$tablename." WHERE map_campaign_id='".$campaign_id."' and map_group_id!='0'");
    return $tresp;
} 

function reset_campaign_question($tablename, $campaign_id){
    $tresp = mysql_query("DELETE FROM ".$tablename." WHERE map_camp_id='".$campaign_id."'");
    return $tresp;
} 

function getCategoryQuestions($categoryArray){
    $tresp = "";
    $questions_list = "";  
        
    if(is_array($categoryArray) && count($categoryArray)>0){
        $chkQuestArray = array();
        foreach($categoryArray as $category){
            $qSetQuery = "SELECT * FROM map_question_set WHERE map_set_id = '$category' order by map_question_id";  
            $categoryName = getCategoryName($category);
            
            $qSetSchema = mysql_query($qSetQuery);
            if(mysql_num_rows($qSetSchema)>0){
                
                $questions_list .= '<li style="list-style:none"><strong>'.$categoryName.'</strong></li>';
                while($questions = mysql_fetch_assoc($qSetSchema)){
                    $quesId = $questions['map_question_id'];

                    //if(!in_array($quesId, $chkQuestArray)){
                       // array_push($chkQuestArray, $quesId);
                        // get question details
                        $questQuery = mysql_query("select q_id, q_question from question where q_id = '".$questions['map_question_id']."' limit 0,1");
                        $questSchema = mysql_fetch_assoc($questQuery);
                        
                        $qId = trim($questSchema['q_id']);
                        if(isset($qId) && $qId!=""){
                            $questions_list .= '<li class="list-group-item">';
                            $questions_list .= '<input data-category-val="'.$category.'" type="checkbox" data-msg-required="Please choose any question." 
                               data-rule-required="true" id="choose_questions" name="choose_questions[]" class="choose_questions" 
                               value="'.$questSchema['q_id'].'" /> &nbsp;'.$questSchema['q_question']; 
                            $questions_list .= '</li>';
                        }
                    //}


                }
            }
            else{
                $questions_list = "<b>Sorry, No questions have been assigned to this category.</b>";
            }
        }
        
    }
    return $questions_list;
}

function getCategoryName($catid){
    $catQuery = mysql_query("select question_set, question_set_id from question_set where question_set_id = '$catid'");
    $catData = mysql_fetch_assoc($catQuery);
    return $catData['question_set'];
}

function connectDB()
{
    /* Connecting, selecting database */
    $conn = mysql_connect("monetdbase.db.8486879.hostedresource.com", "monetdbase", "Kanpur@123") or die("Could not connect");
    mysql_select_db("monetdbase") or die("Could not select database");
    return $conn;
}

connectDB();
if(isset($_POST) && isset($_POST['action'])){
    
    switch ($_POST['action']) {
        case "insert_group_user_mapping":
            reset_table("tmp_group_user_mapping", $_COOKIE[CompanyId]);            
            if(count($_POST['user_col'])>0){
                foreach($_POST['user_col'] as $key=>$userval){
                    $insSql = "insert into tmp_group_user_mapping (tmp_group_id, tmp_user_id, tmp_company_id) values ('0', '".$userval."', '".$_COOKIE[CompanyId]."')";
                    mysql_query($insSql);
                }
            }
            echo "1";
            break;
            
        case "edit_group_user_mapping":
            $campaignId = $_POST['campaign_id'];
            reset_edit_table("map_campaign_user", $campaignId);
            if(count($_POST['user_col'])>0){
                foreach($_POST['user_col'] as $key=>$userval){
                    $insSql = "insert into map_campaign_user (map_campaign_id, map_user_id, map_group_id) values ('$campaignId', '".$userval."', '0')";
                    mysql_query($insSql);
                }
            }
            echo "1";
            break;  
            
        case "edit_campaign_group_mapping":
            $campaignId = $_POST['campaign_id'];
            $groups = $_POST['group_col'];
            reset_campaign_groups("map_campaign_user", $campaignId);
            
            if(count($_POST['group_col'])>0){ // count the group collection
                foreach($_POST['group_col'] as $key=>$groupval){
                    
                    $gUsers = getGroupUsers("map_group_user", $groupval);                  
                    if(count($gUsers)>0){                     
                     foreach($gUsers as $k=>$userid){                       
                       $insSql = "insert into map_campaign_user (map_campaign_id, map_user_id, map_group_id) values ('$campaignId', '".$userid."', '$groupval')";
                       mysql_query($insSql);
                     }                       
                    }
                }
            }
            echo "1";
            break;
            
        case "edit_campaign_question_mapping":            
            $campaignId = $_POST['campaign_id'];
            $questions = $_POST['question_col'];
            $contentId = $_POST['content_id'];
            reset_campaign_question("map_camp_question", $campaignId);
            
            if(count($_POST['question_col'])>0){ // count the group collection
               if(count($questions)>0){                     
                     foreach($questions as $k=>$qid){                       
                       $insSql = "insert into map_camp_question (map_camp_id, map_q_id, map_c_id) values ('$campaignId', '".$qid."', '$contentId')";
                       mysql_query($insSql);
                     }                       
               }             
            }
            echo "1";
            break;    
        
            
        case "delete_group_user_mapping":
            $userId = $_POST['user_id'];
            $delQuery = "DELETE FROM tmp_group_user_mapping WHERE tmp_user_id = '".$userId."'";
            $resp = mysql_query($delQuery);
            echo $resp;
            break; 
        
        case "delete_editing_group_user_mapping":
            $userId = $_POST['user_id'];
            $campaignId = $_POST['campaign_id'];
            $delQuery = "DELETE FROM map_campaign_user WHERE map_user_id = '".$userId."' and map_campaign_id = '".$campaignId."' and map_group_id='0'";
            $resp = mysql_query($delQuery);
            echo $resp;
            break; 
        
        case "get_filtered_group_users":
            $whereCondArr = array();
            $usersKeyValueCollection = array();
            $companyId = $_COOKIE[CompanyId];
            $chkUserIdArray = array();
            
            if(isset($_POST['filter_param']['age_range']) && $_POST['filter_param']['age_range']!=""){
                $age_collec = explode("-", $_POST['filter_param']['age_range']);
                $ageCondition  = "(YEAR(NOW()) - u.user_dob) BETWEEN ".$age_collec[0]." AND ".$age_collec[1];
                array_push($whereCondArr, $ageCondition);
                //$ageFilteredSchema = mysql_query($ageFilterationQuery);
            }
            
            if(isset($_POST['filter_param']['gender']) && $_POST['filter_param']['gender']!=""){
                $genderCondition  = "u.user_gender = '".$_POST['filter_param']['gender']."'";
                array_push($whereCondArr, $genderCondition);               
            }
            
            if(isset($_POST['filter_param']['country']) && $_POST['filter_param']['country']!=""){
                $countryCondition  = "u.user_country = '".$_POST['filter_param']['country']."'";
                array_push($whereCondArr, $countryCondition);               
            }         
            
            if(isset($_POST['filter_param']['state']) && $_POST['filter_param']['state']!=""){
                $stateCondition  = "u.user_states = '".$_POST['filter_param']['state']."'";
                array_push($whereCondArr, $stateCondition);               
            }    
            
            array_filter($whereCondArr);
            $whereStatement = implode(" AND ", $whereCondArr);  
            
            //$userFilterQuery = "SELECT user_id, user_fname, user_lname from users"; 
            // for private users
            $privateUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                         on u.user_id = m.map_user_id where m.map_company_id = '$companyId' and m.map_access_level = 'private'";           
            // for monet users
            $monetUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                       on u.user_id = m.map_user_id WHERE m.map_company_id = '0' and m.map_access_level = 'public'";
            // for public users
            $publicUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                              on u.user_id = m.map_user_id WHERE m.map_company_id != '$companyId' and m.map_access_level = 'public'";
    
            
            if(isset($whereStatement) && $whereStatement!=""){
                //$userFilterQuery .= " AND ".$whereStatement;
                $privateUsersQuery .= " AND ".$whereStatement;
                $monetUsersQuery .= " AND ".$whereStatement;
                $publicUsersQuery .= " AND ".$whereStatement;
            }                           
            
            //$userFilterQuery .= " ORDER BY u.user_id DESC";  
            $privateUsersQuery .= " ORDER BY u.user_id DESC";
            $monetUsersQuery .= " ORDER BY u.user_id DESC";
            $publicUsersQuery .= " ORDER BY u.user_id DESC";                    
            
            // first put private users in array
            $privateUsersSchema = mysql_query($privateUsersQuery);
            if(mysql_num_rows($privateUsersSchema)>0){
                 while($user_records = mysql_fetch_assoc($privateUsersSchema)){
                     array_push($chkUserIdArray, $user_records['user_id']);
                     $username = $user_records['user_fname']." ".$user_records['user_lname'];
                     $userIdNamePair = array('user_id'=>$user_records['user_id'],
                                             'user_name'=>$username, 'user_email'=>$user_records['user_email']); 
                     array_push($usersKeyValueCollection, $userIdNamePair);
                 }
            }
            // second put monet users in array
            $monetUsersSchema = mysql_query($monetUsersQuery);
            if(mysql_num_rows($monetUsersSchema)>0){
                while($user_records = mysql_fetch_assoc($monetUsersSchema)){
                     if(is_array($monetUsersSchema))
                     {
                         if(!in_array($user_records['user_id'], $chkUserIdArray)){
                             array_push($chkUserIdArray, $user_records['user_id']);
                             $username = $user_records['user_fname']." ".$user_records['user_lname'];
                             $userIdNamePair = array('user_id'=>$user_records['user_id'],
                                             'user_name'=>$username, 'user_email'=>$user_records['user_email']); 
                             array_push($usersKeyValueCollection, $userIdNamePair);
                         }
                     }
                     
                }
            }
            // second put monet users in array
            $publicUsersSchema = mysql_query($publicUsersQuery);
            if(mysql_num_rows($monetUsersSchema)>0){
                 while($user_records = mysql_fetch_assoc($publicUsersSchema)){
                     if(is_array($monetUsersSchema))
                     {
                        if(!in_array($user_records['user_id'], $chkUserIdArray)){
                            array_push($chkUserIdArray, $user_records['user_id']);
                            $username = $user_records['user_fname']." ".$user_records['user_lname'];
                            $userIdNamePair = array('user_id'=>$user_records['user_id'],
                                                    'user_name'=>$username, 'user_email'=>$user_records['user_email']); 
                            array_push($usersKeyValueCollection, $userIdNamePair);
                        }
                     }
                 }
            }
            
            if(count($usersKeyValueCollection)>0){
                foreach ($usersKeyValueCollection as $key=>$urecord){
                    $username = $urecord['user_name'];
                    $options_string .= '<option value="'.$urecord['user_id'].'">'.$username.'</option>'; 
                }
            }           
            
            echo $options_string;       
            break;
            
        case 'generate_category_questions':
            $checkboxHtml = "";
            if(isset($_POST['category_set'])){
                $categoryQuestions = getCategoryQuestions($_POST['category_set']); 
                if($categoryQuestions!=""){
                    $checkboxHtml  .= '<div class="well" style="max-height: 300px;overflow: auto;"><ul class="list-group checked-list-box">';
                    $checkboxHtml .= $categoryQuestions;
                    $checkboxHtml  .= '</ul></div>';
                }
            }
            echo $checkboxHtml;
            break;
        
        case 'get_country_states':
            $statesListHtml = "";
            $countryId = trim($_POST['country_id']);
            if(isset($countryId) && $countryId!=""){
                $statesQuery = mysql_query("select states_id, states_name from states where states_countries_id = '".$countryId."'");
                if(mysql_num_rows($statesQuery)>0){
                    $statesListHtml .= '<option value="">--Select State--</option>';
                    while($state = mysql_fetch_object($statesQuery)){
                         $statesListHtml .= '<option value="'.$state->states_id.'">'.$state->states_name.'</option>';
                    }
                }
            }
            
            echo $statesListHtml;
            break;
            
        default:
            break;
    }
    
}

?>