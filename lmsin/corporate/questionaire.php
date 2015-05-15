<?php
include ("../includes/common.php");
include ("../includes/common_functions.php");
init();

if($_COOKIE[CompanyId]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access corporate area");
   return;
}

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}

if(isset($_SESSION['deletionStatus']) && $_SESSION['deletionStatus']!=""){
   $assigningValArray['deletionStatus'] = $_SESSION['deletionStatus'];
   unset($_SESSION['deletionStatus']);
}

// code for campaign deletion
if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete' && $_REQUEST['qid']!=""){
    $deletionResp = mysql_query("DELETE FROM question WHERE q_id='".$_REQUEST['qid']."'");
    
    
    
    if($deletionResp){
      deleteQuestionOptions($_REQUEST['qid']);  
      // also delete the question with their set mapping
      $deletionMappingResp = mysql_query("DELETE FROM map_question_set WHERE map_question_id='".$_REQUEST['qid']."'");
      $_SESSION['deletionStatus'] = "Question has been deleted successfully.";
    }else{ 
      $_SESSION['deletionStatus'] = "Question deletion failed."; 
    }
    header('location: questionaire.php');
} 

$smarty = new Smarty;       
// database interaction
$conn = connectDB();

$num_rec_per_page=5;
// filteration using search string
$whereCondArr = array();
$whereCondArr2 =  array();
$urlParamsArr = array();

if (isset($_GET["page"])) { 
    $page  = $_GET["page"]; 
    //array_push($urlParamsArr, "page=".$page);
} else { 
    $page=1; 
}

$start_from = ($page-1) * $num_rec_per_page; 

// make arrays by using url parameters
$assigningValArray['searchtext'] = "";
$selected_sets_ids = array();
if(isset($_GET['search']) && $_GET['search']!=""){
    array_push($whereCondArr, "q_question like '%".$_GET['search']."%'");
    array_push($urlParamsArr, "search=".$_GET['search']);
    $assigningValArray['searchtext'] = $_GET['search'];  
}

if(isset($_GET['category']) && $_GET['category']!=""){
    $subQuery = "SELECT map_question_id FROM map_question_set WHERE map_set_id = '".$_GET['category']."'";
    array_push($whereCondArr, "q_id in (".$subQuery.")");
    array_push($urlParamsArr, "category=".$_GET['category']);
    //$assigningValArray['category'] = $_GET['search']; 
    array_push($selected_sets_ids, trim($_GET['category']));
}

//now make string using custom created arrays
if(count($urlParamsArr)>0){
     $urlString = "&".implode("&", $urlParamsArr);
}
$whereCondStr = "";
if(count($whereCondArr)>0){
   $whereCondStr = "WHERE ".implode(" AND ", $whereCondArr);
}


// get dropdownlist for question sets
get_new_option_multiple_list("question_set","question_set_id","question_set",$selected_sets_ids,$category_options," order by question_set_id"); 

$totalRecordsSchema = mysql_query("SELECT q_id FROM question $whereCondStr");
$qQuery = "SELECT * FROM question $whereCondStr order by q_id desc LIMIT $start_from, $num_rec_per_page";

$qSchema = mysql_query($qQuery, $conn) or die(mysql_error());
$questions_num = mysql_num_rows($qSchema);

$rows = array();
if($questions_num>0){
    while($result = mysql_fetch_assoc($qSchema)){
        array_push($rows, $result);
    }
}

$assigningValArray['num_rows'] = mysql_num_rows($qSchema);
$assigningValArray['questions_schema'] = $rows;

//code to display pagination links 
$paginationHtml = "";
$total_records = mysql_num_rows($totalRecordsSchema);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 
$paginationHtml .= "<ul class='pagination pagination-sm'>";
$paginationHtml .= "<li><a href='questionaire.php?page=1$urlString'>".'<<'."</a></li> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            $paginationHtml .= "<li><a href='questionaire.php?page=".$i.$urlString."'>".$i."</a></li> "; 
}; 
$paginationHtml .= "<li><a href='questionaire.php?page=".$total_pages.$urlString."'>".'>>'."</a></li> "; // Goto last page
$assigningValArray['paginationlinks'] = $paginationHtml; 
$assigningValArray['campaign_tab'] = "selected";
$assigningValArray['category_options'] = $category_options;

$smarty->assign('assigningValArray', $assigningValArray);
$smarty->assign("questionnaires_tab", "selected");
$smarty->assign("add_questions_tab", "label");
$smarty->display('questionaire.tpl');
?>
