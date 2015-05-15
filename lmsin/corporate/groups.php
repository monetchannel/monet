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
if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete' && $_REQUEST['group_id']!=""){
    $deletionResp = mysql_query("DELETE FROM groups WHERE g_id='".$_REQUEST['group_id']."'");
    $_SESSION['deletionStatus'] = "Group has been deleted successfully.";
    header('location: groups.php');
}

$smarty = new Smarty;       
$conn = connectDB();

$num_rec_per_page = getRecordsPerPage();  // to know how many records we have to display on per page
if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $num_rec_per_page;  // limit start from value
$order_by = "order by g_id desc";
$limit = "LIMIT ".$start_from.", ".$num_rec_per_page;
$fields = array("g_id", "g_name", "g_company_id", "g_subject", "g_desc");
$group_records = get_records("groups", $fields, "", $order_by, $limit);

$assigningValArray['num_rows'] = 0;
$assigningValArray['group_rows'] = array();
$assigningValArray['company_name'] = array();
if($group_records){
   $assigningValArray['num_rows'] = mysql_num_rows($group_records);   
   while($records = mysql_fetch_assoc($group_records)){
       array_push($assigningValArray['group_rows'], $records);
   }
}

$groups_total_records = num_rows("groups");

$total_pages = ceil($groups_total_records / $num_rec_per_page); 
$paginationHtml .= "<ul class='pagination pagination-sm'>";
$paginationHtml .= "<li><a href='groups.php?page=1'>".'<<'."</a></li> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            $paginationHtml .= "<li><a href='groups.php?page=".$i."'>".$i."</a></li> "; 
}; 
$paginationHtml .= "<li><a href='groups.php?page=$total_pages'>".'>>'."</a></li> "; // Goto last page
$paginationHtml .= "</ul>";
$assigningValArray['paginationlinks'] = $paginationHtml; 


$smarty->assign('assigningValArray', $assigningValArray);
$smarty->assign(array('user_mgmt_tab'=>"selected", 'groups_tab'=>"label"));
$smarty->display('groups.tpl');
?>
