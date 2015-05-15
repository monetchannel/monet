<?php
include ("../includes/common.php");
include ("../includes/common_functions.php");
init();

if($_COOKIE[CompanyId]=="")
{  
   #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}


$dataArray = array(); 
if(isset($_SESSION['updationStatus']) && $_SESSION['updationStatus']!=""){
   $dataArray['updationStatus'] = $_SESSION['updationStatus'];
   unset($_SESSION['updationStatus']);
}

// if we came from video page 
if(isset($_GET['videoid']) && $_GET['videoid']!=""){
   $dataArray['selected_video_id'] = trim($_GET['videoid']); 
}

$smarty = new Smarty;       

// database interaction
$conn = connectDB();

if(isset($_REQUEST['action']) && $_REQUEST['action']=="edit" && $_REQUEST['cmp_id']!="")
{
   $dataArray['pageHeading'] = "Edit Campaign";    
   $dataArray['campaign_id'] = $_REQUEST['cmp_id'];   
   
   // select values from database table
   $campaignEditInfo = mysql_query("select * from campaigns where cmp_id='".$_REQUEST['cmp_id']."'");   
   $campaignUsersEditInfo = mysql_query("select * from map_campaign_user where map_campaign_id='".$_REQUEST['cmp_id']."' and map_group_id='0'");
   $campaignGroupsEditInfo = mysql_query("select map_group_id from map_campaign_user where map_campaign_id='".$_REQUEST['cmp_id']."' and map_group_id != '0'");
   $campaignQuestionsEditInfo = mysql_query("select map_set_id from map_campaign_sets where map_campaign_id = '".$_REQUEST['cmp_id']."'"); 
   
   $selectedQuestionsEditInfo = mysql_query("select map_q_id, map_c_id, map_cmp_q_id from map_camp_question where map_camp_id = '".$_REQUEST['cmp_id']."'");
   
   $campaigndata = mysql_fetch_assoc($campaignEditInfo);
   //$campaignuserdata = mysql_fetch_assoc($campaignUserEditInfo);
   $dataArray['campaign_name'] = $campaigndata['cmp_name'];
   $dataArray['campaign_desc'] = $campaigndata['cmp_desc'];
   $dataArray['campaign_subject'] = $campaigndata['cmp_subject'];
   $dataArray['campaign_startdate'] = date('m/d/Y', strtotime($campaigndata['cmp_start']));
   $dataArray['campaign_enddate'] = date('m/d/Y', strtotime($campaigndata['cmp_end']));
   $dataArray['campaign_video'] = $campaigndata['cmp_c_id'];
   
   $dataArray['campaign_status'] = ($campaigndata['status']) ? "checked" : "";
   $dataArray['open_for_all'] = ($campaigndata['open_for_all']) ? "checked" : "";
   
   // code for campaign users 
   $dataArray['campaign_group_users'] = array();
   while($editUserRecord = mysql_fetch_assoc($campaignUsersEditInfo)){
       array_push($dataArray['campaign_group_users'], $editUserRecord['map_user_id']);
   }
   
   // code for groups
   $dataArray['campaign_groups'] = array();
   while($editGroupRecord = mysql_fetch_assoc($campaignGroupsEditInfo)){
       array_push($dataArray['campaign_groups'], $editGroupRecord['map_group_id']);
   }
   
   // code for questions sets
   $dataArray['campaign_questionsets'] = array();
   while($editQRecord = mysql_fetch_assoc($campaignQuestionsEditInfo)){
       array_push($dataArray['campaign_questionsets'], $editQRecord['map_set_id']);
   }
   
   // to display the list of all the questions for the selected sets
   $questionSetList = implode(",", $dataArray['campaign_questionsets']);  
   
    $allQuestionsInfo = mysql_query("SELECT q_id, q_question, s.question_set_id, s.question_set
                                    FROM question q
                                    JOIN map_question_set qs ON q.q_id = qs.map_question_id
                                    JOIN question_set s ON qs.map_set_id = s.question_set_id
                                    WHERE qs.map_set_id IN (".$questionSetList.") order by s.question_set_id");  
    
   // code for questions
   $dataArray['campaign_questions'] = array();
   if(mysql_num_rows($selectedQuestionsEditInfo)>0){
       while($editQ = mysql_fetch_assoc($selectedQuestionsEditInfo)){
           array_push($dataArray['campaign_questions'], $editQ['map_q_id']);
       }
   }
   
   $dataArray['action'] = "update"; 
   
}elseif($_POST['action']=='post' && $_REQUEST['cmp_id']==""){
        
   $dataArray['pageHeading'] = "Create New Campaign"; 
   $dataArray['action'] = "post";
   
   // colect post data and insert
   $cmp_name = trim($_POST['campaign_name']);
   $cmp_content_id = trim($_POST['campaign_video']);
   $cmp_desc = trim($_POST['campaign_description']);
   $cmp_subject = trim($_POST['campaign_subject']);
   $cmp_company_id = trim($_COOKIE[CompanyId]);
   $cmp_company_name = getCompanyName($cmp_company_id);
   $cmp_start_date = date('Y-m-d H:i:s', strtotime($_POST['campaign_startdate']));
   $cmp_end_date = date('Y-m-d', strtotime($_POST['campaign_enddate']))." 23:59:59";
   $cmp_created_by = trim($_COOKIE[CompanyId]);
   $cmp_created_date = date('Y-m-d H:i:s');
   $cmp_updated_by = trim($_COOKIE[CompanyId]);
   $cmp_updated_date = date('Y-m-d H:i:s');
   $cmp_status = (isset($_POST['campaign_status'])) ? $_POST['campaign_status'] : "0";
   $cmp_open_for_all = (isset($_POST['open_for_all'])) ? $_POST['open_for_all'] : "0";
   //$cmp_groups = $_POST['select_groups'];
   $cmp_groups = $_POST['select_groups'];
   $cmp_users = $_POST['select_users'];
   $cmp_question_sets = $_POST['select_questions'];  
   $questionsCollection = $_POST['choose_questions'];
   //$filtered_users = $_POST['filtered_users']; 
   
   // Now filter out end users and groups 
   /*
   if( isset($_POST['select_users']) && count($_POST['select_users'])>0 ){
       foreach($_POST['select_users'] as $key=>$groupsAndUsers){
           $chkArr = explode("~", $groupsAndUsers);
           if ($chkArr[0]=="user") {               
               array_push($cmp_users, trim($chkArr[1])); 
           } else if($chkArr[0]=="group") {
               array_push($cmp_groups, trim($chkArr[1])); 
           }
       }
       
       $cmp_users = array_unique($cmp_users);
       $cmp_groups = array_unique($cmp_groups);
   }
   */
     
   $cmpInsQuery = "INSERT INTO campaigns (cmp_c_id, cmp_company_id, cmp_name, cmp_desc, cmp_subject,"
           . "cmp_start, cmp_end, status, open_for_all, cmp_create_date, cmp_create_by, cmp_modify_date, cmp_modify_by) values "
           . "('$cmp_content_id', '$cmp_company_id', '$cmp_name', '$cmp_desc', '$cmp_subject', '$cmp_start_date', '$cmp_end_date', '$cmp_status', '$cmp_open_for_all' 
               ,'$cmp_created_date', '$cmp_created_by', '$cmp_updated_date', '$cmp_updated_by')"; 
   
   $cmpInsResp = mysql_query($cmpInsQuery) or die(mysql_error());
 
   if($cmpInsResp){
       $lastInsCmpId = mysql_insert_id();   
       // insert groups users also in map_campaign_user table
       addCampaignUsers($cmp_users, $lastInsCmpId);      
       // insert groups users also in map_campaign_user table
       addCampaignGroupUsers($cmp_groups, $lastInsCmpId);
       // insert campaign sets       
       addCampaignQuestions($cmp_question_sets, $lastInsCmpId, $cmp_content_id);   
       // insert campaign questions
       insertCampaignQuestions($questionsCollection, $lastInsCmpId, $cmp_content_id);
       
       if(isset($_POST['selected_video_id']) && $_POST['selected_video_id']!=""){
          $_SESSION['updationStatus'] = "Campaign created successfully";
          header('location: add_campaign.php?videoid='.$_POST['selected_video_id']);
       }else{
          $dataArray['success'] = "Campaign created successfully";
       }
   }else{
       $dataArray['error'] = "Campaign creation failed";
   }   
}elseif($_POST['action']=='update' && $_POST['campaign_id']!=""){
    
   $cmpId = trim($_POST['campaign_id']); 
   $cmpName = (isset($_POST['campaign_name'])) ? $_POST['campaign_name'] : "";
   $cmpDesc = (isset($_POST['campaign_description'])) ? $_POST['campaign_description'] : "";
   $cmpSubject = (isset($_POST['campaign_subject'])) ? $_POST['campaign_subject'] : "";
   $cmpVideo = (isset($_POST['campaign_video'])) ? $_POST['campaign_video'] : "";
   $cmpStart = (isset($_POST['campaign_startdate'])) ? date('Y-m-d H:i:s', strtotime($_POST['campaign_startdate'])) : "";
   $cmpModifyDate = date('Y-m-d H:i:s');
   $cmpModifyBy = $_COOKIE[CompanyId];
   
   $cmpEnd = (isset($_POST['campaign_enddate'])) ? date('Y-m-d', strtotime($_POST['campaign_enddate']))." 23:59:59"  : "";
   $cmpStatus = (isset($_POST['campaign_status'])) ? $_POST['campaign_status'] : "0";
   $cmpOpenForAll = (isset($_POST['open_for_all'])) ? $_POST['open_for_all'] : "0";
   $cmp_question_sets = $_POST['select_questions']; 
   $cmp_groups = $_POST['select_groups'];
   $cmp_users = $_POST['select_users'];
   $questionsCollection = $_POST['choose_questions'];
   
   // Now filter out end users and groups 
   /*
   if( isset($_POST['select_users']) && count($_POST['select_users'])>0 ){
       foreach($_POST['select_users'] as $key=>$groupsAndUsers){
           $chkArr = explode("~", $groupsAndUsers);
           if ($chkArr[0]=="user") {               
               array_push($cmp_users, trim($chkArr[1])); 
           } else if($chkArr[0]=="group") {
               array_push($cmp_groups, trim($chkArr[1])); 
           }
       }
       
       $cmp_users = array_unique($cmp_users);
       $cmp_groups = array_unique($cmp_groups);
   }
   */
   
   $cmpUpQuery = "UPDATE campaigns SET cmp_name = '".$cmpName."', cmp_desc = '".$cmpDesc."', cmp_subject = '".$cmpSubject."', cmp_c_id = '".$cmpVideo."', "
           . "cmp_start = '".$cmpStart."', cmp_end = '".$cmpEnd."', status = '".$cmpStatus."', open_for_all = '".$cmpOpenForAll."', cmp_modify_date = '$cmpModifyDate', cmp_modify_by = '$cmpModifyBy' "
           . "where cmp_id='".$cmpId."'";   
   
   $updResp = mysql_query($cmpUpQuery);
   if($updResp){       
       // delete mapping entries of campaign and users
       $delResp = mysql_query("Delete from map_campaign_user where map_campaign_id = '$cmpId'");
       // delete question related entries
       $delResp1 = mysql_query("Delete from map_campaign_sets where map_campaign_id = '$cmpId'");
       $delResp2 = mysql_query("Delete from map_camp_question where map_camp_id = '$cmpId'");
       
       
       
       if($delResp){
                // insert groups users also in map_campaign_user table
                addCampaignUsers($cmp_users, $cmpId);      
                // insert groups users also in map_campaign_user table
                addCampaignGroupUsers($cmp_groups, $cmpId);
                // insert questions in map_camp_question table   
                addCampaignQuestions($cmp_question_sets, $cmpId, $cmpVideo); 
                
                insertCampaignQuestions($questionsCollection, $cmpId, $cmpVideo);
       }
       
       $_SESSION['updationStatus'] = "Campaign has been updated successfully";
   }  
   
   header('location: add_campaign.php?action=edit&cmp_id='.$cmpId);
    
}else{
   $dataArray['action'] = "post"; 
   $dataArray['pageHeading'] = "Create New Campaign"; 
}
   

// get all videos for creating campaign
//$videosSchema = mysql_query("SELECT c_id, c_title from content where c_company_id = '".$_COOKIE[CompanyId]."' order by c_id desc");
$videosSchema = mysql_query("SELECT c_id, c_title from content where c_company_id = '".$_COOKIE[CompanyId]."' order by c_id desc");
// get all users for adding to the group of campaign
$usersSchema = getAllAuthorisedUsers($_COOKIE[CompanyId]); // to get all authorised users
// get all groups for campaign creation
$groupsSchema = mysql_query("SELECT g_id, g_name FROM groups order by g_id desc");
// get all questions for campaign creation
/*
$questionsSchema = mysql_query("SELECT q_id, q_question, q_company_id, q_status FROM question "
        . " where q_status = '1' and q_company_id='".$_COOKIE[CompanyId]."' order by q_id desc ");
*/
$questionsSetSchema = mysql_query("SELECT question_set_id, question_set FROM question_set where status = '1' ");

$videoOoptionsList = '<option style="font-weight:bold;" value="">--Select Any Video--</option>';

if(mysql_num_rows($videosSchema)>0){
    while($cmp_result = mysql_fetch_object($videosSchema))
    {
       if(isset($_GET['videoid']) && $_GET['videoid']!=""){
           $dataArray['campaign_video'] = trim($_GET['videoid']); 
       } 
       $selectedVideoId = (isset($dataArray['campaign_video'])) ? $dataArray['campaign_video'] : "";
       $selected_or_not = ($cmp_result->c_id==$selectedVideoId) ? "selected" : ""; 
       $videoOoptionsList .= '<option value="'.$cmp_result->c_id.'" '.$selected_or_not.' >'.$cmp_result->c_title.'</option>';
    }
}

//$userOptionsList = '<option value="">--Select Any User--</option>';
$userOptionsList = '';

if(count($usersSchema)>0){
    //while($cmp_user_result = mysql_fetch_object($usersSchema))
    foreach($usersSchema as $k=>$uarray)
    {
       $selected_user = ""; 
       if(isset($dataArray['campaign_group_users']) && count($dataArray['campaign_group_users'])>0){
           
            if(in_array($uarray['id'], $dataArray['campaign_group_users'])){
               $selected_user = "selected";          
            }   
       }
       
       $user_id = $uarray['id']; 
       $user_name = $uarray['name']; 
       $userOptionsList .= '<option value="'.$user_id.'" '.$selected_user.' >'.$user_name.'</option>';
    }
}

$groupOptionsList = '';
if(mysql_num_rows($groupsSchema)>0){
    while($cmp_group_result = mysql_fetch_object($groupsSchema))
    {
       $selected_group = "";     
       if(isset($dataArray['campaign_groups']) && count($dataArray['campaign_groups'])>0){  
            $dataArray['campaign_groups'] = array_unique($dataArray['campaign_groups']);             
            if(in_array($cmp_group_result->g_id, $dataArray['campaign_groups'])){
               $selected_group = "selected";          
            }   
       } 
       
       $groupOptionsList .= '<option value="'.$cmp_group_result->g_id.'" '.$selected_group.' >'.$cmp_group_result->g_name.'</option>';
    }
}


$questionSetOptionsList = '';
if(mysql_num_rows($questionsSetSchema)>0){
    
    while($cmp_q_result = mysql_fetch_object($questionsSetSchema))
    {
       $selected_qset = "";    
       if(isset($dataArray['campaign_questionsets']) && count($dataArray['campaign_questionsets'])>0){  
            $dataArray['campaign_questionsets'] = array_unique($dataArray['campaign_questionsets']);             
            if(in_array($cmp_q_result->question_set_id, $dataArray['campaign_questionsets'])){
               $selected_qset = "selected";          
            }   
       } 
       $questionSetOptionsList .= '<option value="'.$cmp_q_result->question_set_id.'" '.$selected_qset.' >'.$cmp_q_result->question_set.'</option>';
    }
}

$questionsList = '';
$category_flag = '';
if($_REQUEST['action']=="edit"){
    if(mysql_num_rows($allQuestionsInfo)>0){
       $questionsList .= '<div style="max-height: 300px;overflow: auto;" class="well">
                   <ul class="list-group checked-list-box">';
       
       while($cmp_q_result = mysql_fetch_object($allQuestionsInfo))
        {
           $selected_q = "";  
           if(isset($dataArray['campaign_questions']) && count($dataArray['campaign_questions'])>0){  
                $dataArray['campaign_questions'] = array_unique($dataArray['campaign_questions']);             
                if(in_array($cmp_q_result->q_id, $dataArray['campaign_questions'])){
                   $selected_q = "checked";          
                }   
           } 
           
           // condition for adding a header in listing
           if($category_flag!=$cmp_q_result->question_set){
                $category_flag = $cmp_q_result->question_set;
                $questionsList .= '<li style="list-style:none;"><strong>'.$cmp_q_result->question_set.'</strong></li>'; 
           }
           
           //$questionSetOptionsList .= '<option value="'.$cmp_q_result->question_set_id.'" '.$selected_qset.' >'.$cmp_q_result->question_set.'</option>';
           $questionsList .= '<li class="list-group-item"><input class="choose_questions" type="checkbox" value="'.$cmp_q_result->q_id.'" name="choose_questions[]" data-category-val="'.$cmp_q_result->question_set_id.'" id="choose_questions" 
                   data-rule-required="true" '.$selected_q.' data-msg-required="Please choose any question."> &nbsp;'.$cmp_q_result->q_question.'</li>';
        } 
        $questionsList .= '</ul></div>';
    }
}


$dataArray['videoSelectOptions'] = $videoOoptionsList;
$dataArray['userSelectOptions'] = $userOptionsList;
$dataArray['groupSelectOptions'] = $groupOptionsList;
$dataArray['questionSelectOptions'] = $questionSetOptionsList;
$dataArray['allSelectedSetQuestions'] = $questionsList;

$smarty->assign('dataArray', $dataArray);
$smarty->assign(array("campaign_tab"=>"selected"));
$smarty->display('add_campaign.tpl');
?>
