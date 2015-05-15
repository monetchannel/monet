<?php
include ("../includes/common.php");
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
if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete' && $_REQUEST['cmp_id']!=""){
    $deletionResp = mysql_query("DELETE FROM campaigns WHERE cmp_id='".$_REQUEST['cmp_id']."'");
    $_SESSION['deletionStatus'] = "Campaign has been deleted successfully.";
    header('location: campaign.php');
}

$smarty = new Smarty;       
// database interaction
$conn = connectDB();

$num_rec_per_page=5;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$totalRecordsSchema = mysql_query("SELECT cmp_id from campaigns where cmp_company_id = '".$_COOKIE[CompanyId]."'");
$campQuery = "SELECT * FROM campaigns where cmp_company_id = '".$_COOKIE[CompanyId]."' order by cmp_create_date desc LIMIT $start_from, $num_rec_per_page";
$campaignSchema = mysql_query($campQuery, $conn) or die(mysql_error());
$campaigns_num = mysql_num_rows($campaignSchema);

$rows = array();
if($campaigns_num>0){
    while($result = mysql_fetch_assoc($campaignSchema)){
        array_push($rows, $result);
    }
}

/*
$assigningValArray = array(
    'num_rows'=>mysql_num_rows($campaignSchema),
    'campaign_schema'=>$rows
);
*/

$assigningValArray['num_rows'] = mysql_num_rows($campaignSchema);
$assigningValArray['campaign_schema'] = $rows;

//code to display pagination links 
$paginationHtml = "";
$total_records = mysql_num_rows($totalRecordsSchema);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 
$paginationHtml .= "<ul class='pagination pagination-sm'>";
$paginationHtml .= "<li><a href='campaign.php?page=1'>".'<<'."</a></li> "; // Goto 1st page  
for ($i=1; $i<=$total_pages; $i++) { 
            $paginationHtml .= "<li><a href='campaign.php?page=".$i."'>".$i."</a></li> "; 
}; 
$paginationHtml .= "<li><a href='campaign.php?page=$total_pages'>".'>>'."</a></li> "; // Goto last page
$assigningValArray['paginationlinks'] = $paginationHtml; 
$assigningValArray['campaign_tab'] = "selected";

$smarty->assign('assigningValArray', $assigningValArray);
$smarty->assign(array("campaign_tab"=>"selected"));
$smarty->display('campaign.tpl');
?>
