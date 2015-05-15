<?php
/* Connecting, selecting database */
$conn = mysql_connect("monetdbase.db.8486879.hostedresource.com", "monetdbase", "Kanpur@123") or die("Could not connect");
mysql_select_db("monetdbase") or die("Could not select database");

include ("../includes/common_functions.php");

// get all campaigns which are starting today

$today_campaigns_query = "SELECT cmp_id, cmp_c_id, cmp_name, cmp_start, cmp_end, open_for_all 
                          FROM campaigns
                          WHERE  cmp_start >= CURRENT_DATE
                          AND cmp_start <  CURRENT_DATE + INTERVAL 1 DAY";  
$today_start_campaigns_schema = mysql_query($today_campaigns_query);

if(mysql_num_rows($today_start_campaigns_schema)>0){
    while($campaigns = mysql_fetch_assoc($today_start_campaigns_schema)){
        $campaignId = $campaigns['cmp_id']; 
        $contentId = $campaigns['cmp_c_id'];
        $campaignName = $campaigns['cmp_name'];
        $campaignStartDate = date('d-m-Y', strtotime($campaigns['cmp_start']));
        $campaignEndDate = date('d-m-Y', strtotime($campaigns['cmp_end']));
        $campaignOpenForAll = $campaigns['open_for_all'];
        $email_to_list = "";
        
        if($campaignOpenForAll){
           //$campaignUsers = array("navneet_test@mailinator.com"); 
           $campaignUsers = array();
           $authorisedUsersCollection = getAllAuthorisedUsers(""); // to get all authorised users
         
           foreach ($authorisedUsersCollection as $index=>$uarray){
               array_push($campaignUsers, $uarray['user_email']);
           }          
           
        }else{
           $campaignUsers = getCampUserEmails("map_campaign_user", "users", $campaignId);
        }
                 
        $keyValue = $contentId.", ".$campaignId; 
        $encodedKeyValue = base64_encode($keyValue);
        
        if(is_array($campaignUsers)){           
            // make distinct list of emails
            $campaignUsers = array_unique($campaignUsers);
            $email_to_list = implode(", ", $campaignUsers);
            if(trim($email_to_list)!=""){
                              
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $headers .= "From: noreply@monet.com\r\n";
                $subject = "Monet - Welcome to our site !!";
                $message = "<html><body><div style='font-size:20px;text-align:center;'>";
                $message .= "<p style='background-color:#50587B;'><img src='http://www.monetchannel.com/lmsin/corporate/images/logo.png' /></p><br/><br/>";
                $message .= "<p><strong>Congratulations !!</strong></p>";
                $message .= "<div style=''>Hello, <br><br> Below campaign assigned to you."
                        . "<br><br></div>";
                
                $message .= "<p><strong>".$campaignName."</strong></p><br>";
                $message .= "<p><strong>Start Date : </strong>".$campaignStartDate."&nbsp;&nbsp;&nbsp;<strong>End Date : </strong>".$campaignEndDate."</p><br>";
                
                $message .= '<a href="http://www.monetchannel.com/lmsin/user/gocmp.php?act=user_cmp&key='.$encodedKeyValue.'">Click here.</a><br><br>';
                $message .= "</div></body></html>";                                        
                            
                
                if(mail($email_to_list, $subject, $message, $headers, "-noreply@monet.com"))
                {
                    echo ('<p>Mail sent successfully.</p>');
                }else{
                    echo('<p>Mail could not be sent.</p>');
                }              
            }
        }
    }
}else{
    echo "Sorry no campaigns have been found which are starting today. ";
}
?>
 
