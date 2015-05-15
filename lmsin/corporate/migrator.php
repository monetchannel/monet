<?php
include ("../includes/common.php");
init();

if($_COOKIE[CompanyId]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}

$conn = connectDB();
$fetchUsersQuery = "SELECT * FROM users order by user_id";
$fetchUsersSchema = mysql_query($fetchUsersQuery);
if(mysql_num_rows($fetchUsersSchema)>0){
   while($urecords = mysql_fetch_assoc($fetchUsersSchema)){      
       $access_level = ($urecords['user_company_id']!="0") ? "private" : "public";    
       $user_email = $urecords['user_email']; 
       $chk_user = chkUserExists($urecords['user_id'], "map_company_users");
       $insQuery = "INSERT INTO map_company_user SET map_company_id = '".$urecords['user_company_id']."', map_user_id = '".$urecords['user_id']."', map_access_level = '".$access_level."'";
       
       if(!$chk_user){
            mysql_query($insQuery) or die(mysql_error());
       }
   } 
}


function chkUserExists($uid, $table){
    $query = "select * from $table where map_user_id = '$uid'";
    $schema = mysql_query($query);
    if(mysql_num_rows($schema)>0){
        return "true";
    }
    
    return false;
}
?>
