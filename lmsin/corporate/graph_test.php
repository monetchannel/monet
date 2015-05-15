<?php
include ("../includes/common.php");
include ("../includes/common_functions.php");
init();

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


if(isset($_REQUEST['ad_ar_id'])){
        $R=DIN_ALL($_REQUEST);
   	$smarty = new Smarty;
	global_function($smarty);
	global $Server_View_Path;
	global $Server_company_Path;
	get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' limit 0,1","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);	
   
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$vd[c_id]' ");
        
        
        // make an array of ad_valence values with their time values
        $content_id = $vd[c_id];
        $allAdTimeQuery = "SELECT MIN(ad.ad_time) as 'min_time_sec', MAX(ad.ad_time) as 'max_time_sec' 
                           FROM analysis_detail ad
                           JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                           JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                           WHERE cf_c_id = '239'"; 
            
            // Now get minimum value and maximum value of the time in seconds
            $allAdTimeSchema = mysql_query($allAdTimeQuery);           
            if(mysql_num_rows($allAdTimeSchema)>0){
                while($timeValueRecords = mysql_fetch_assoc($allAdTimeSchema)){
                    $timeValArray['min_time_val'] = $timeValueRecords['min_time_sec']; 
                    $timeValArray['max_time_val'] = $timeValueRecords['max_time_sec'];
                }
            }   
            
            echo "<pre>";
            print_r($timeValArray);
            
            $minTimeValue = strtotime($timeValArray['min_time_val']); 
            $maxTimeValue = strtotime($timeValArray['max_time_val']);
            $diff = $maxTimeValue - $minTimeValue;
            $interval = $diff/5; 
            $time_range = "";
            $flag = 0;
        
            $adValenceArray = array();
            for($i = $minTimeValue; $i <= $maxTimeValue; $i = $i+1){
                $to = $i + 1;
                //$i = ($flag == 0) ? $i : $i+1;
                $time_range_from = date('H:i:s', $i);
                $time_range_to = date('H:i:s', $to); 
                $adValenceQuery = "SELECT AVG(ad.ad_valence) as 'avg_valence' 
                                   FROM analysis_detail ad
                                   JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                                   JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                                   WHERE cf_c_id = '239' AND ad.ad_time BETWEEN '$time_range_from' AND '$time_range_to'"; 
                $adValenceResource = mysql_query($adValenceQuery);
                $adValenceSchema = mysql_fetch_assoc($adValenceResource);
                $adValenceVal = (isset($adValenceSchema['avg_valence']) && $adValenceSchema['avg_valence']!="") ? $adValenceSchema['avg_valence'] : 0; 
                array_push($adValenceArray, array('time_range'=>$time_range_from."-".$time_range_to, 'avg_valence'=>$adValenceVal));
                $flag++;
            }
            
            echo "<pre>";
            print_r($adValenceArray);
}     


?>