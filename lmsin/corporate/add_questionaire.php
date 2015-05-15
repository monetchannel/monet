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
   
   
   $qInsQuery = "INSERT INTO question (`q_question`, `q_category`, `q_created_by`, `q_company_id`, `q_status`) values "
           . "('$question', $question_category, '$company_id', '$company_id', '$status')";   
   
   $qInsResp = mysql_query($qInsQuery) or die(mysql_error());
   
   if($qInsResp){
       $dataArray['success'] = "Question created successfully";
       $question_id = mysql_insert_id();
       // map set with question into map_question_set table
       $mapQuestionToSetQuery = "INSERT INTO map_question_set (map_question_id, map_set_id) values ('$question_id', '$question_category')";
       mysql_query($mapQuestionToSetQuery);
   }
 
}
elseif(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['qid']!="")
{
   $dataArray['qid'] = $_GET['qid'];
   $dataArray['pageHeading'] = "Edit Question"; 
   $dataArray['action'] = "update"; 
   // select values from database table
   $questionEditInfo = mysql_query("select * from question where q_id='".$_GET['qid']."'");
   //$questionOptionsEditInfo = mysql_query("select * from options where o_q_id='".$_GET['qid']."' order by o_id");
   
   $questiondata = mysql_fetch_assoc($questionEditInfo);
   
   // colect post data and edit
   $question = $questiondata['q_question'];
   $question_category = $questiondata['q_category'];   
   
   $company_id = $_COOKIE[CompanyId]; 
   $status = $questiondata['q_status'];
   
   $dataArray['question_text'] = $question;
   $dataArray['question_category'] = $question_category;
   $dataArray['question_status'] = $status;
   
   /*
   // code for campaign users 
   $dataArray['mapped_question_options'] = array();
   while($editOptionRecord = mysql_fetch_assoc($questionOptionsEditInfo)){
       array_push($dataArray['mapped_question_options'], $editOptionRecord['o_value']);
   }  
   */
}
elseif($_POST['action']=='update' && $_POST['qid']!="")
{
   $qId = trim($_POST['qid']); 
   $qName = (isset($_POST['questiontxt'])) ? $_POST['questiontxt'] : "";
   $qCategory = (isset($_POST['select_category'])) ? $_POST['select_category'] : "";
     
   $qStatus = $_POST['status'];
   $qOptions = $_POST['select_options'];   
   
   $cmpUpQuery = "UPDATE question SET q_question = '".$qName."', q_category = '".$qCategory."', q_status = '".$qStatus."' where q_id='".$qId."'";  // query to update group details
   
   $updResp = mysql_query($cmpUpQuery);
   if($updResp){
      
       // map question with selected set
       $whereCondArr = array('map_question_id'=>$qId);
       $questionSetMapped = getRecordsCount(map_question_set, $whereCondArr); 
       
       if($questionSetMapped>0){
          $mapQuestionToSetQuery = "UPDATE map_question_set SET map_set_id = '$qCategory' WHERE map_question_id = '$qId'";
       }else{
          $mapQuestionToSetQuery = "INSERT INTO map_question_set (map_question_id, map_set_id) VALUES ('$qId','$qCategory')";
       }
       
       mysql_query($mapQuestionToSetQuery);          
       $_SESSION['updationStatus'] = "Question has been updated successfully";            
   }  
   
   header('location: add_questionaire.php?action=edit&qid='.$qId);
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
       $selected_set = "";
       if(isset($dataArray['question_category'])){
           if(trim($cat_result->question_set_id)==trim($dataArray['question_category'])){
               $selected_set = "selected";          
            }   
       }
       $categoryOptionsList .= '<option value="'.$cat_result->question_set_id.'" '.$selected_set.' >'.$cat_result->question_set.'</option>';
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
