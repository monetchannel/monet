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
if($_POST['action']=='post' && $_REQUEST['group_id']==""){   
   $dataArray['pageHeading'] = "Create New Group"; 
   $dataArray['action'] = "post";
   
   // colect post data and insert
   $group_name = trim($_POST['group_name']);
   $group_desc = trim($_POST['group_description']);
   $group_subj = trim($_POST['group_subject']);
   $group_comp = trim($_COOKIE[CompanyId]);  
   $group_users = $_POST['select_users']; // users array
   
   $gInsQuery = "INSERT INTO groups (g_name, g_company_id, g_subject, g_desc) values "
           . "('$group_name', $group_comp, '$group_subj', '$group_desc')"; 
   
  
   $gInsResp = mysql_query($gInsQuery) or die(mysql_error());
 
   if($gInsResp){
       $inserted_group_id = mysql_insert_id();
       $dataArray['success'] = "Group created successfully";
       
       $ageLimit1 = (isset($_POST['select_agegroup1']) && $_POST['select_agegroup1']!="-1") ? $_POST['select_agegroup1'] : ""; 
       $ageLimit2 = (isset($_POST['select_agegroup2']) && $_POST['select_agegroup2']!="-1") ? $_POST['select_agegroup2'] : ""; 
       $genderSelect = (isset($_POST['select_sex']) && $_POST['select_sex']!="-1") ? $_POST['select_sex'] : ""; 
       $countrySelect = (isset($_POST['select_country']) && $_POST['select_country']!="") ? $_POST['select_country'] : ""; 
       $dateVal = date('Y-m-d');
       // after group creation , also insert the demographic details
       if(($ageLimit1!="" && $ageLimit2!="") || $genderSelect!="" || $countrySelect){
           $insQuery = "INSERT INTO demography SET d_gender = '$genderSelect',"
                   . "d_start_age = '$ageLimit1', d_end_age = '$ageLimit2', "
                   . "d_country_id = '$countrySelect', d_create_date = '$dateVal'";         
           $demographyResp = mysql_query($insQuery);
           if($demographyResp){
                   $lastDemographyId = mysql_insert_id();
                   $updCampaignQuery = "UPDATE groups SET g_demography_id = '$lastDemographyId' WHERE g_id = '$inserted_group_id'"; 
                   mysql_query($updCampaignQuery);
           }
       }     
       
       if(count($group_users)>0 &&$inserted_group_id!=""){
           foreach ($group_users as $eachuserid){
               // loop query to map group and user
               $groupUserMappingQuery = "INSERT INTO map_group_user (map_group_id, map_user_id) values ('".$inserted_group_id."', '".$eachuserid."')";
               mysql_query($groupUserMappingQuery);
           }
       }
   }
}
elseif(isset($_GET['action']) && $_GET['action']=="edit" && $_GET['group_id']!="")
{
   //$dataArray['pageHeading'] = "Edit Group";
    $dataArray['pageHeading'] = "View Group";
   $dataArray['g_id'] = $_GET['group_id'];
   // select values from database table
   $groupEditInfo = mysql_query("select * from groups where g_id='".$_GET['group_id']."'");
   $groupUsersEditInfo = mysql_query("select * from map_group_user where map_group_id='".$_GET['group_id']."'");
   
   $groupdata = mysql_fetch_assoc($groupEditInfo);
   
   $dataArray['g_name'] = $groupdata['g_name'];
   $dataArray['g_desc'] = $groupdata['g_desc'];
   $dataArray['g_subject'] = $groupdata['g_subject'];
   $dataArray['g_demography_id'] = $groupdata['g_demography_id'];
   $dataArray['action'] = "update"; 
   
   // code for campaign users 
   $dataArray['mapped_group_users'] = array();
   while($editUserRecord = mysql_fetch_assoc($groupUsersEditInfo)){
       array_push($dataArray['mapped_group_users'], $editUserRecord['map_user_id']);
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
   $dataArray['pageHeading'] = "Create New Group";  
   $dataArray['action'] = "post"; 
}

// get all users for adding to the group of campaign
$usersSchema = mysql_query("SELECT user_id, user_fname, user_lname from users order by user_id desc");
$countriesSchema = mysql_query("SELECT countries_id, countries_name from countries order by countries_name");
$ageList = getAgeList();

if($ageList){
    $dataArray['ageSelectOptions'] = $ageList;
}

// get all countries
// code to display the list of uaers in dropdownlist
$userOptionsList = '';
if(mysql_num_rows($usersSchema)>0){ 
    while($cmp_user_result = mysql_fetch_object($usersSchema))
    {      
       $selected_user = ""; 
       if(isset($dataArray['mapped_group_users']) && count($dataArray['mapped_group_users'])>0){          
            if(in_array($cmp_user_result->user_id, $dataArray['mapped_group_users'])){
               $selected_user = "selected";        
            }   
       }
       $user_name = $cmp_user_result->user_fname." ".$cmp_user_result->user_lname; 
       $userOptionsList .= "<option value=$cmp_user_result->user_id $selected_user >$user_name</option>";
    } 
}

$countryOptionsList = '';
if(mysql_num_rows($countriesSchema)>0){
    while($cntry = mysql_fetch_assoc($countriesSchema)){
       $countryOptionsList .= '<option value="'.$cntry['countries_id'].'" >'.$cntry['countries_name'].'</option>'; 
    }
}

$dataArray['userSelectOptions'] = $userOptionsList;
$dataArray['countrySelectOptions'] = $countryOptionsList;
$smarty = new Smarty;       
// database interaction
$conn = connectDB();
$smarty->assign('dataArray', $dataArray);
$smarty->assign(array('user_mgmt_tab'=>"selected", 'groups_tab'=>"label"));
$smarty->display('add_group.tpl');
?>
