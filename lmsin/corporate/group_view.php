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

$groupid = $_GET['group_id'];
$wherearray = array('g_id'=>$groupid);
$groupInfo = get_records("groups", "*", $wherearray, "", ""); // get data from groups table 
$wherearray = array('map_group_id'=>$groupid);
$groupUsersInfo = get_records("map_group_user", "*", $wherearray, "", ""); // get data from groups table

$groupSchema = mysql_fetch_assoc($groupInfo);
$dataArray['group_name'] = $groupSchema['g_name'];
$dataArray['group_subject'] = $groupSchema['g_subject'];
$dataArray['group_description'] = $groupSchema['g_desc'];
$dataArray['group_companyname'] = getCompanyName($groupSchema['g_company_id']);

$userArray = array();
while($groupUsersSchema = mysql_fetch_assoc($groupUsersInfo)){
    $user_id = $groupUsersSchema['map_user_id'];
    $user_name = getUserName($user_id);
    array_push($userArray, $user_name);
}

$dataArray['groups_users_list'] = implode(", ", $userArray);

$smarty = new Smarty;       
$conn = connectDB();

$smarty->assign('groupDataArray', $dataArray);
$smarty->display('group_view.tpl');
?>
