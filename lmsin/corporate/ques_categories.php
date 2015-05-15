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

if(isset($_SESSION['deletionStatus']) && $_SESSION['deletionStatus']!=""){
   $assigningValArray['deletionStatus'] = $_SESSION['deletionStatus'];
   unset($_SESSION['deletionStatus']);
}

// code for campaign deletion
if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete' && $_REQUEST['qcat_id']!=""){
    //$deletionResp = mysql_query("DELETE FROM question_set WHERE question_set_id='".$_REQUEST['qcat_id']."'");
    //$_SESSION['deletionStatus'] = "Questions category has been deleted successfully.";
    if(deleteCategoryWithTheirQuestions($_GET['qcat_id'])){
       $msg = "Questions category has been deleted successfully.";
    } else {
       $msg = "Questions category deletion failed.";
    }
    $_SESSION['deletionStatus'] = $msg;
    header('location: ques_categories.php');
}

$smarty = new Smarty;       
// database interaction
$conn = connectDB();

$num_rec_per_page=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page;

$whereArray = array();
$totalRecordsCount = getRecordsCount("question_set", $whereArray);

$qsetQuery = "SELECT * FROM question_set order by question_set_id desc LIMIT $start_from, $num_rec_per_page";
$qsetSchema = mysql_query($qsetQuery, $conn) or die(mysql_error());
$qset_num = mysql_num_rows($qsetSchema);

$rows = array();
if($qset_num>0){
    while($result = mysql_fetch_assoc($qsetSchema)){
        array_push($rows, $result);
    }
}

$assigningValArray['num_rows'] = mysql_num_rows($qsetSchema);
$assigningValArray['qset_schema'] = $rows;

//code to display pagination links 
$paginationHtml = "";
$total_records = $totalRecordsCount;  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 
$paginationHtml .= "<ul class='pagination pagination-sm'>";
$paginationHtml .= "<li><a href='ques_categories.php?page=1'>".'<<'."</a></li> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            $paginationHtml .= "<li><a href='ques_categories.php?page=".$i."'>".$i."</a></li> "; 
}; 
$paginationHtml .= "<li><a href='ques_categories.php?page=$total_pages'>".'>>'."</a></li> "; // Goto last page
$assigningValArray['paginationlinks'] = $paginationHtml; 
//$assigningValArray['questionnaires_tab'] = "selected";
$smarty->assign("questionnaires_tab", "selected");
$smarty->assign("question_category_tab", "label");
$smarty->assign('assigningValArray', $assigningValArray);
$smarty->assign(array("questions_category_tab"=>"label"));
$smarty->display('ques_categories.tpl');
?>
