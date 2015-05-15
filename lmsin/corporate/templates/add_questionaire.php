<?php
include ("../includes/common.php");
include ("../includes/common_functions.php");
init();

if($_COOKIE[CompanyId]=="")
{ #not logged in
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

// Now code for handling the post/get requests
if($_POST['action']=='post' && $_REQUEST['qid']==""){   
   $dataArray['pageHeading'] = "Create New Question"; 
   $dataArray['action'] = "post";
   
   // colect post data and insert
   $question = trim($_POST['questiontxt']);
   $question_category = trim($_POST['select_category']);
   $question_options = $_POST['select_options'];
   $company_id = $_COOKIE[CompanyId]; 
   $status = trim($_POST['status']);
   
   print_array($question_options);
   die();
   
  
   $qInsQuery = "INSERT INTO question (`q_question`, `q_category`, `q_created_by`, `q_company_id`, `q_status`) values "
           . "('$question', $question_category, '$company_id', '$company_id',)";   
  
   $qInsResp = mysql_query($qInsQuery) or die(mysql_error());
   
   if($qInsResp){
       $dataArray['success'] = "Question created successfully";
       $question_id = mysql_insert_id();
       // add question options
       if(count($question_options)>0){
            foreach($question_options as $option){
                $optionInsQuery = "INSERT INTO options ( o_q_id, o_value ) values ( '$question_id', '$option' )";
                mysql_query($optionInsQuery);
            }
       }
   }
 
}
elseif(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['qid']!="")
{
   $dataArray['qid'] = $_GET['qid'];
   // select values from database table
   $questionEditInfo = mysql_query("select * from question where q_id='".$_GET['qid']."'");
   $questionOptionsEditInfo = mysql_query("select * from options where o_q_id='".$_GET['qid']."'");
   
   $questiondata = mysql_fetch_assoc($questionEditInfo);
   
   // colect post data and edit
   $question = trim($_POST['questiontxt']);
   $question_category = trim($_POST['select_category']);
   $question_options = $_POST['select_options'];
   $company_id = $_COOKIE[CompanyId]; 
   $status = trim($_POST['status']);
   
   // code for campaign users 
   $dataArray['mapped_group_users'] = array();
   while($editOptionRecord = mysql_fetch_assoc($groupUsersEditInfo)){
       array_push($dataArray['mapped_question_options'], $editOptionRecord['o_value']);
   }  
 
}
elseif($_POST['action']=='update' && $_POST['group_id']!="")
{
   $gId = trim($_POST['group_id']); 
   $gName = (isset($_POST['group_name'])) ? $_POST['group_name'] : "";
   $gDesc = (isset($_POST['group_description'])) ? $_POST['group_description'] : "";
   $gSubject = (isset($_POST['group_subject'])) ? $_POST['group_subject'] : "";
   $group_users = $_POST['select_users']; // users array
   $cmpUpQuery = "UPDATE groups SET g_name = '".$gName."', g_desc = '".$gDesc."', g_subject = '".$gSubject."' where g_id='".$gId."'";  // query to update group details
   if(isset($_POST['demography_id']) && $_POST['demography_id']!=""){
       $ageLimit1 = (isset($_POST['select_agegroup1']) && $_POST['select_agegroup1']!="-1") ? $_POST['select_agegroup1'] : ""; 
       $ageLimit2 = (isset($_POST['select_agegroup2']) && $_POST['select_agegroup2']!="-1") ? $_POST['select_agegroup2'] : ""; 
       $genderSelect = (isset($_POST['select_sex']) && $_POST['select_sex']!="-1") ? $_POST['select_sex'] : ""; 
       $countrySelect = (isset($_POST['select_country']) && $_POST['select_country']!="") ? $_POST['select_country'] : ""; 
       $demographyQuery = "UPDATE demography SET d_gender = '$genderSelect', "
               . "d_start_age = '$ageLimit1', d_end_age = '$ageLimit2', d_country_id = '$countrySelect' WHERE d_id = '".$_POST['demography_id']."'";
   } 
   
   $updResp = mysql_query($cmpUpQuery);
   if($updResp){
      
       $_SESSION['updationStatus'] = "Group has been updated successfully";
       deleteGroupUsersMapping($gId);
       if( count($group_users)>0 ){
           foreach ($group_users as $eachuserid){
               // loop query to map group and user
               $groupUserMappingQuery = "INSERT INTO map_group_user (map_group_id, map_user_id) values ('".$gId."', '".$eachuserid."')";
               mysql_query($groupUserMappingQuery);
           }
       }    
   }  
   
   header('location: add_group.php?action=edit&group_id='.$gId);
}else{
   $dataArray['pageHeading'] = "Create New Question";  
   $dataArray['action'] = "post"; 
}

// get all categories for adding to the question
$categoriesSchema = mysql_query("SELECT * from question_set order by question_set_id");

// get all countries
// code to display the list of uaers in dropdownlist
$categoryOptionsList = '';
if(mysql_num_rows($categoriesSchema)>0){   
    $categoryOptionsList .= '<option value="">--Select Category--</option>';
    while($cat_result = mysql_fetch_object($categoriesSchema))
    {      
       $selected_cat = "";
       /*
       if(isset($dataArray['mapped_group_users']) && count($dataArray['mapped_group_users'])>0){          
            if(in_array($cmp_user_result->user_id, $dataArray['mapped_group_users'])){
               $selected_user = "selected";          
            }   
       }*/
       $categoryOptionsList .= '<option value="'.$cat_result->question_set_id.'" '.$selected_cat.' >'.$cat_result->question_set.'</option>';
    }
}

$dataArray['categorySelectOptions'] = $categoryOptionsList;
$smarty = new Smarty;       
// database interaction
$conn = connectDB();
$smarty->assign('dataArray', $dataArray);
$smarty->assign("questionnaires_tab", "selected");
$smarty->assign("add_questions_tab", "label");
$smarty->display('add_questionaire.tpl');
?>
