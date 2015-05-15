<?php
include ("../includes/common.php");
include ("../includes/common_functions.php");

####################################
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

/*
SELECT * ,(SELECT count(*) FROM content_feedback WHERE cf_c_id = c_id AND cf_rating>'0' and cf_ep_id>'0') AS num_feedback 
FROM content WHERE c_company_id='44' ORDER BY c_id DESC LIMIT 0, 10
*/
$conn = connectDB();
$num_rec_per_page=5;
$orderby="c_id";
$order="DESC";
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 

$whereArray = array('c_company_id'=>$_COOKIE[CompanyId]);
$totalRecordsCount = getRecordsCount("content", $whereArray);

$videosListQuery = "SELECT * ,(SELECT count(*) FROM content_feedback WHERE cf_c_id = c_id AND cf_rating>'0' and cf_ep_id>'0') AS num_feedback 
                    FROM content WHERE c_company_id='".$_COOKIE[CompanyId]."' order by $orderby $order LIMIT $start_from, $num_rec_per_page";

$videosSchema = mysql_query($videosListQuery, $conn) or die(mysql_error());
$v_num = mysql_num_rows($videosSchema);

$videos = array();
if($v_num>0){
    while($result = mysql_fetch_assoc($videosSchema)){
        array_push($videos, $result);
    }
}

$video_num_rows = mysql_num_rows($videosSchema);

//code to display pagination links 
$paginationHtml = "";
$total_pages = ceil($totalRecordsCount / $num_rec_per_page); 

if($total_pages>0){
    $paginationHtml .= "<ul class='pagination pagination-sm'>";
    $paginationHtml .= "<li><a href='video_list.php?page=1'>".'<<'."</a></li> "; // Goto 1st page  
    for ($i=1; $i<=$total_pages; $i++) { 
                $paginationHtml .= "<li><a href='video_list.php?page=".$i."'>".$i."</a></li> "; 
    }; 
    $paginationHtml .= "<li><a href='video_list.php?page=$total_pages'>".'>>'."</a></li> "; // Goto last page
}

$smarty = new Smarty;    
$smarty->assign(array( 
                "video_num_rows" => $video_num_rows,  
                "videos" => $videos,
                "video_analysis_tab" => "label",
                "paging_html" => $paginationHtml,
                "analysis_tab"=>"analysis-selected"
));
$smarty->display('video_list.tpl');
?>