<?php
include ("../includes/common.php");
include ("../includes/common_functions.php");
$conn = connectDB();

if($_COOKIE[CompanyId]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}

$dataArray = array(); 
if(isset($_SESSION['updationStatus']) && $_SESSION['updationStatus']!=""){
   $dataArray['updationStatus'] = $_SESSION['updationStatus'];
   unset($_SESSION['updationStatus']);
}

// Now code for handling the post/get requests
if($_POST['action']=='post' && $_REQUEST['qcat_id']==""){   
   $dataArray['pageHeading'] = "Create New Category"; 
   $dataArray['action'] = "post";
   
   // colect post data and insert
   $category_name = trim($_POST['category_name']);
   $category_status = $_POST['category_status']; // users array
   
   $gInsQuery = "INSERT INTO question_set (question_set, status) values ('$category_name', '$category_status')"; 
   $gInsResp = mysql_query($gInsQuery) or die(mysql_error());
 
   if($gInsResp){
       $inserted_group_id = mysql_insert_id();  // get inserted category id
       $dataArray['success'] = "Category created successfully";
       /*
       $questionsSelect = (isset($_POST['select_questions']) && $_POST['select_questions']!="") ? $_POST['select_questions'] : ""; 
       $dateVal = date('Y-m-d');
       // after group creation , also insert the demographic details
      
       if(count($questionsSelect)>0 &&$inserted_group_id!=""){
           foreach ($questionsSelect as $eachquestionid){
               // loop query to map group and user
               $setQuestionMappingQuery = "INSERT INTO map_question_set (map_question_id, map_set_id) values ('".$eachquestionid."', '".$inserted_group_id."')";
               mysql_query($setQuestionMappingQuery);
           }
       }
       * 
       */
        
   }
}
elseif(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['qcat_id']!="")
{
   $dataArray['pageHeading'] = "Edit Category";
   $dataArray['qcat_id'] = $_GET['qcat_id'];
   // select values from database table
   $categoryEditInfo = mysql_query("select * from question_set where question_set_id='".$_GET['qcat_id']."'");
   $categoryQuestionsEditInfo = mysql_query("select * from map_question_set where map_set_id='".$_GET['qcat_id']."'");
   $categorydata = mysql_fetch_assoc($categoryEditInfo);
   
   $dataArray['category_name'] = $categorydata['question_set'];
   $dataArray['category_status'] = ($categorydata['status']) ? "checked" : "";
   $dataArray['action'] = "update"; 
  
   // code for campaign users 
   $dataArray['mapped_set_questions'] = array();
   while($editQuestionsRecord = mysql_fetch_assoc($categoryQuestionsEditInfo)){
       array_push($dataArray['mapped_set_questions'], $editQuestionsRecord['map_question_id']);
   } 
   
}
elseif($_POST['action']=='update' && $_POST['qcat_id']!="")
{
   $qcatId = trim($_POST['qcat_id']); 
   $categoryName = (isset($_POST['category_name'])) ? $_POST['category_name'] : "";
   $categoryStatus = ($_POST['category_status']) ? $_POST['category_status'] : '0';
   $category_questions = $_POST['select_questions']; // questions array
   $cmpUpQuery = "UPDATE question_set SET question_set = '".$categoryName."', status = '".$categoryStatus."'"
           . "where question_set_id='".$qcatId."'";  // query to update group details
   
   $updResp = mysql_query($cmpUpQuery);
   if($updResp){      
       $_SESSION['updationStatus'] = "Category has been updated successfully";
       /*
       deleteCategoryQuestionsMapping($qcatId);
       if( count($category_questions)>0 ){
           foreach ($category_questions as $eachqid){
               // loop query to map set and questions
               $catQuestionMappingQuery = "INSERT INTO map_question_set (map_question_id, map_set_id) values ('".$eachqid."', '".$qcatId."')";
               mysql_query($catQuestionMappingQuery);
           }
       } 
       * 
       */        
   }  
   
   header('location: add_ques_category.php?action=edit&qcat_id='.$qcatId);
}else{
   $dataArray['pageHeading'] = "Create New Category";  
   $dataArray['action'] = "post"; 
}

// get all users for adding to the group of campaign
$questionsSchema = mysql_query("SELECT * from question order by q_id desc") or die(mysql_error());
$questionOptionsList = '';
if(mysql_num_rows($questionsSchema)>0){
    while($q = mysql_fetch_assoc($questionsSchema)){
       $selected_question = ""; 
       if(isset($dataArray['mapped_set_questions']) && count($dataArray['mapped_set_questions'])>0){          
            if(in_array($q['q_id'], $dataArray['mapped_set_questions'])){
               $selected_question = "selected";          
            }   
       }
       $questionOptionsList .= '<option value="'.$q['q_id'].'"  '.$selected_question.' >'.$q['q_question'].'</option>'; 
    }
}

$dataArray['questionSelectOptions'] = $questionOptionsList;
$smarty = new Smarty;     
$smarty->assign("questionnaires_tab", "selected");
$smarty->assign("question_category_tab", "label");
$smarty->assign('dataArray', $dataArray);
$smarty->display('add_ques_category.tpl');
?>
