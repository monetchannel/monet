<?php 
function getCompanyName($companyID){
    $companyId = trim($companyID);
    $companyQuery = mysql_query("select company_name from company where company_id='$companyId'") or die(mysql_error());
    $companyInfo = mysql_fetch_row($companyQuery); 
    return (isset($companyInfo[0])) ? $companyInfo[0] : "NA"; 
}

function getUserName($userID){
    $userId = trim($userID);
    $userQuery = mysql_query("select user_fname, user_lname from users where user_id='$userId'");
    $userInfo = mysql_fetch_assoc($userQuery);
    $username = $userInfo['user_fname']." ".$userInfo['user_lname'];
    return (isset($username)) ? $username : "NA"; 
}

//add monet users to mapping table
function addCampaignUsers($usersCollection, $campaignId){   
    $campaign_users_array = getCampaignUsers("map_campaign_user", $campaignId, '0');
    foreach($usersCollection as $eachuid){      
        if(!in_array($eachuid, $campaign_users_array)){
               $insQuery = "insert into map_campaign_user (map_campaign_id, map_user_id, map_group_id) "
                       . "values ('".$campaignId."', '".$eachuid."', '0')";
               mysql_query($insQuery);
        }
    }
}


function addCampaignGroupUsers($groupsCollection, $campaignId){   
    foreach($groupsCollection as $eachgroupid){
        $campaign_users_array = getCampaignUsers("map_campaign_user", $campaignId, $eachgroupid); 
        $group_users_array = getGroupUsers("map_group_user", $eachgroupid); 
       
        foreach($group_users_array as $eachgroupuserid){
            if(!in_array($eachgroupuserid, $campaign_users_array)){
               $insQuery = "insert into map_campaign_user (map_campaign_id, map_user_id, map_group_id) "
                       . "values ('".$campaignId."', '".$eachgroupuserid."', '".$eachgroupid."')";
               mysql_query($insQuery);
            }
        }
    }
}

function addCampaignQuestions($qSetCollection, $campaignId, $contentId){   
    if(count($qSetCollection)>0){
        foreach($qSetCollection as $eachsetid){ 
            // map camapign and set using map_camapign_qsets tables
            $setIns = mysql_query("insert into map_campaign_sets set map_campaign_id = '$campaignId', map_set_id = '$eachsetid'");
            if($setIns){
                $set_questions_array = getAllSetQuestions($eachsetid);
                if(count($set_questions_array)>0){
                    foreach ($set_questions_array as $qkey=>$questionid){
                        $insQuery = "insert into map_camp_question (map_camp_id, map_q_id, map_c_id) "
                                       . "values ('".$campaignId."', '".$questionid."', '".$contentId."')";
                        mysql_query($insQuery);
                    }
                }
            }    
        }
    }
}

function getAllSetQuestions($setid){
    $questionsArray = array(); 
    $campaign_questions_schema = mysql_query("SELECT map_question_id FROM map_question_set where map_set_id = '".$setid."'");
    if(mysql_num_rows($campaign_questions_schema)>0){
        while($qrecords = mysql_fetch_object($campaign_questions_schema)){
            array_push($questionsArray, $qrecords->map_question_id);
        }
    }
    
    return $questionsArray;
}

function getAgeList()
{
    $ss=0;
    $option="<option value=\"-1\" selected> Age </option>".$option;
    for($i=14;$i<=100;$i++)
    {        
        $option.="<option value=\"$i\"$sel>$i</option>";       
    }
    
    return $option;
}

function getCampaignUsers($table, $campaignId, $groupId){
    $usersArray = array(); 
    $campaign_users_schema = mysql_query("SELECT map_campaign_id, map_user_id FROM ".$table." where map_campaign_id = '".$campaignId."' and map_group_id = '".$groupId."'");
    if(mysql_num_rows($campaign_users_schema)>0){
        while($records = mysql_fetch_object($campaign_users_schema)){
            array_push($usersArray, $records->map_user_id);
        }
    }
    
    return $usersArray;
}

function getCampUserEmails($table1, $table2, $campaignId){
    $usersArray = array(); 
    //$campaign_users_schema = mysql_query("SELECT map_campaign_id, map_user_id FROM ".$table." where map_campaign_id = '".$campaignId."'");
    $campaign_users_query = "SELECT t1.map_campaign_id, t1.map_user_id, t2.user_email FROM `map_campaign_user` t1 JOIN `users` t2 
                             ON t1.map_user_id = t2.user_id
                             where map_campaign_id = '$campaignId'";
        
    $campaign_users_schema = mysql_query($campaign_users_query);
    if(mysql_num_rows($campaign_users_schema)>0){
        while($records = mysql_fetch_object($campaign_users_schema)){
            array_push($usersArray, $records->user_email);
        }
    }
    
    return $usersArray;
}


function getGroupUsers($table, $groupId){
    $usersArray = array();  
    $group_users_schema = mysql_query("SELECT map_user_id FROM ".$table." where map_group_id = '".$groupId."'");
    if(mysql_num_rows($group_users_schema)>0){
        while($records = mysql_fetch_object($group_users_schema)){
            array_push($usersArray, trim($records->map_user_id));
        }
    }
    
    return $usersArray;
}

function getGroupUsersWithUserId($groupId){
    $usersArray = array();    
    
    $group_users_schema = mysql_query("SELECT u.user_id, u.user_fname, u.user_lname "
            . "FROM users u JOIN map_group_user m ON u.user_id = m.map_user_id "
            . "where m.map_group_id = '".$groupId."'");
    if(mysql_num_rows($group_users_schema)>0){
        while($records = mysql_fetch_assoc($group_users_schema)){
            $uarr = array();
            $username = $records['user_fname']." ".$records['user_lname']; 
            $uarr['user_id'] = $records['user_id'];
            $uarr['user_name'] = $username;
            array_push($usersArray, $uarr);
        }
    }
    
    return $usersArray;
}

/*
 * to get all users of a particular brand
 * plus to get all public users of other brands
 * plus to get all monet users 
 */

function getAllBrandUsers($companyId){
   $usersKeyValueCollection = array();
   // first get all private users of selected brand
   //$privateUsersQuery = "SELECT user_id, user_fname, user_lname from users WHERE user_company_id = '$companyId' and user_access_level = 'private'";
   if($companyId!=""){
        $privateUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                         on u.user_id = m.map_user_id
                         where m.map_company_id = '$companyId'";
   
        $privateUsersSchema = mysql_query($privateUsersQuery);
        if(mysql_num_rows($privateUsersSchema)>0){
             while($user_records = mysql_fetch_assoc($privateUsersSchema)){
                 $username = $user_records['user_fname']." ".$user_records['user_lname'];
                 $userIdNamePair = array('user_id'=>$user_records['user_id'],
                                         'user_name'=>$username, 'user_email'=>$user_records['user_email']); 
                 array_push($usersKeyValueCollection, $userIdNamePair);
                 }
        
            }
        }
        return $usersKeyValueCollection;
   }


function getAllAuthorisedUsers($companyId){
   $usersKeyValueCollection = array();
   // first get all private users of selected brand
   //$privateUsersQuery = "SELECT user_id, user_fname, user_lname from users WHERE user_company_id = '$companyId' and user_access_level = 'private'";
   if($companyId!=""){
        $privateUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                         on u.user_id = m.map_user_id
                         where m.map_company_id = '$companyId' and m.map_access_level = 'private'";
   
        $privateUsersSchema = mysql_query($privateUsersQuery);
        if(mysql_num_rows($privateUsersSchema)>0){
             while($user_records = mysql_fetch_assoc($privateUsersSchema)){
                 $username = $user_records['user_fname']." ".$user_records['user_lname'];
                 $userIdNamePair = array('user_id'=>$user_records['user_id'],
                                         'user_name'=>$username, 'user_email'=>$user_records['user_email']); 
                 array_push($usersKeyValueCollection, $userIdNamePair);
             }
        }
   }
   
   // now get all monet users whose company_id will be 0
   $monetUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                       on u.user_id = m.map_user_id WHERE m.map_company_id = '0'";
   $monetUsersSchema = mysql_query($monetUsersQuery);
   if(mysql_num_rows($monetUsersSchema)>0){
        while($user_records = mysql_fetch_assoc($monetUsersSchema)){
            $username = $user_records['user_fname']." ".$user_records['user_lname'];
            $userIdNamePair = array('user_id'=>$user_records['user_id'],
                                    'user_name'=>$username, 'user_email'=>$user_records['user_email']); 
            array_push($usersKeyValueCollection, $userIdNamePair);
        }
   }
   
   // get all other brand users who have declared public
   if($companyId!=""){
            $publicUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                              on u.user_id = m.map_user_id WHERE m.map_company_id != '$companyId' and m.map_access_level = 'public'";
   }else{
            $publicUsersQuery = "select u.user_id, u.user_fname, u.user_lname, u.user_email from users u join map_company_user m
                              on u.user_id = m.map_user_id WHERE m.map_access_level = 'public'";  
   }
   $publicUsersSchema = mysql_query($publicUsersQuery);
   if(mysql_num_rows($publicUsersSchema)>0){
        while($user_records = mysql_fetch_assoc($publicUsersSchema)){
            $username = $user_records['user_fname']." ".$user_records['user_lname'];
            $userIdNamePair = array('user_id'=>$user_records['user_id'],
                                    'user_name'=>$username, 'user_email'=>$user_records['user_email']); 
            array_push($usersKeyValueCollection, $userIdNamePair);
        }
   }
   
   return $usersKeyValueCollection;
}


// Proper formatting for print_r
// $array = array to display
function print_array($array) {
  print '<pre>';
  print_r($array);
  print '</pre>';
}

// Trim function - cuts text to a certain length
// $string = string to trim; $max_length = longest allowed string before trimming; $append = characters to add on after the trim (typically "...")
function neat_trim($string, $max_length, $append = '')
{
    if (strlen($string) > $max_length) {
      $string = substr($string, 0, $max_length);
      $pos = strrpos($string, ' ');
      if ($pos === false) {
        return substr($string, 0, $max_length) . $append;
      }
      return substr($string, 0, $pos) . $append;
    }
    else {
      return $string;
    }
}

// Checks for unique values in an array
// $array = array to check
function check_unique_array($array) {
    return array_unique($array) == $array;
}

// Explode a string into a multi-dimensional array
// $delimiters = array of delimiters to use, $string = string to be split
function multiexplode($delimiters, $string) {
    $singlearray = explode($delimiters['0'], $string);
    foreach ($singlearray as $arrayitem) {
            $multiarray[] = explode($delimiters['1'], $arrayitem);
    }
    return $multiarray;
}


function get_records($tablename, $fieldsarray, $wherearray, $order_by="", $limit=""){
    $queryStatement = "";
    $select_fields = "";
    if(is_array($fieldsarray)){
       $select_fields = implode(", ", $fieldsarray);
    }else{
       $select_fields = "$fieldsarray"; 
    }
    
    $whereStatPart = "";
    $whereCondArray = array();   
    
    // where condition statement section
    if(isset($wherearray) && $wherearray!=""){
        if(is_array($wherearray) && count($wherearray)>0){
            foreach($wherearray as $key=>$value){
                  $whereStat = "$key = '".$value."'";   
                  array_push($whereCondArray, $whereStat);
            }
            $whereStatPart = " WHERE ".implode(" and ", $whereCondArray);
        }
    }
    
    
    $queryStatement = "SELECT ".$select_fields." FROM ".$tablename;
    if($whereStatPart!=""){
        $queryStatement .= $whereStatPart;
    }
    
    if($order_by!=""){
        $queryStatement .= " ".$order_by;
    }
    
    if($limit!=""){
        $queryStatement .= " ".$limit;
    }   
      
    $dataSchema = mysql_query($queryStatement);
    if(!$dataSchema){
        return false;
    }     
    
    return $dataSchema;
}

function getRecordsPerPage(){
    $records_per_page = 5;
    return $records_per_page; 
}

function num_rows($table){
    $records_count = 0;
    $recordsQuery = "SELECT * FROM $table";
    $recordsSchema = mysql_query($recordsQuery);
    $records_count = mysql_num_rows($recordsSchema);
    return $records_count;
}

function deleteGroupUsersMapping($groupid){
    $query = "DELETE FROM map_group_user where map_group_id = '$groupid'";  
    $resp = mysql_query($query);
    if(!$resp){
        return false;
    }
    
    return true;
}

function deleteCategoryQuestionsMapping($categoryid){
    $query = "DELETE FROM map_question_set where map_set_id = '$categoryid'";  
    $resp = mysql_query($query);
    if(!$resp){
        return false;
    }
    
    return true;
}


function deleteCategoryWithTheirQuestions($categoryid){
    if($categoryid!=""){
    $queryCat = "DELETE FROM question_set where question_set_id = '$categoryid'";
    $resp1 = mysql_query($queryCat);
    if(!$resp1){
        return false;
    }
    
    $queryMap = "DELETE FROM map_question_set where map_set_id = '$categoryid'";  
    $resp2 = mysql_query($queryMap);
    return true;
    
    }else{
        return false;
    }
    
}


function getRecordsCount($tablename, $whereCond = array()){
    $condArr = array();
    $sqlQuery = "SELECT COUNT(*) as 'num_rows' FROM $tablename";
    if(count($whereCond)>0){
        foreach($whereCond as $field => $value){
            $whereStat = $field." = '".$value."'"; 
            array_push($condArr, $whereStat);
        }   
        $whereCond = " WHERE ".implode(" and ", $condArr);
        $sqlQuery .= $whereCond;
    }   
    
    $records = mysql_query($sqlQuery);
    $num_records = 0;
    if(mysql_num_rows($records)>0){
        $result = mysql_fetch_assoc($records);
        $num_records = $result['num_rows'];
    }
    
    return $num_records; 
}

?>