<?php
include ("../includes/common.php");
include ("../includes/common_functions.php");
init();

$graphsToShowArray = explode(",", $_COOKIE['graphs_to_show']);

// use this array to filter which graph to show on the screen
$chkArray = array();
foreach($graphsToShowArray as $key=>$value){
    $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
    array_push($chkArray, trim($filteredStr)); 
}

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

$smarty = new Smarty;
global_function($smarty);
if(isset($_REQUEST['cid']) || isset($_REQUEST['ad_ar_id'])){
        $R=DIN_ALL($_REQUEST);
 	
	global $Server_View_Path;
	global $Server_company_Path;
        
        // condition for creation of where statement for getting content details 
        if(isset($_REQUEST['ad_ar_id'])){ 
            $where_cond = "where ar_id='".$_REQUEST['ad_ar_id']."' limit 0,1"; 
        } elseif (isset($_REQUEST['cid'])) {
            $where_cond = "where content.c_id='".$_REQUEST['cid']."' limit 0,1";    
        }
        
	//get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' limit 0,1","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);	
        get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id",$where_cond,"c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);        
        
        $content_id = $vd[c_id];
        $cf_id = $vd[cf_id];
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$content_id' ");
        
        // make an array of ad_valence values with their time values       
        $allAdTimeQuery = "SELECT MIN(ad.ad_time) as 'min_time_sec', MAX(ad.ad_time) as 'max_time_sec' 
                           FROM analysis_detail ad
                           JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                           JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                           WHERE cf_c_id = '$content_id'"; 

        // Now get minimum value and maximum value of the time in seconds
        $allAdTimeSchema = mysql_query($allAdTimeQuery);           
        if(mysql_num_rows($allAdTimeSchema)>0){
            while($timeValueRecords = mysql_fetch_assoc($allAdTimeSchema)){
                $timeValArray['min_time_val'] = $timeValueRecords['min_time_sec']; 
                $timeValArray['max_time_val'] = $timeValueRecords['max_time_sec'];
            }
        }    
      
        /*
         * Valence Graph Section
         */              
        
        $minTimeValue = strtotime($timeValArray['min_time_val']); 
        $maxTimeValue = strtotime($timeValArray['max_time_val']);       
     
        $adValenceArray = array();
        $totalVideoTime = 0;
        
        $commonEmotionsSmileyArray = array(
            'valence'=>array(),
            'engagement'=>array(),
            'happy'=>array(),
            'sad'=>array(),
            'neutral'=>array(),
            'angry'=>array(),
            'surprised'=>array(),
            'disgusted'=>array(),
            'scared'=>array()
        );
        
        /*
        array_push($adValenceArray,
                array('time_range'=>'00:00:00', 
                          'avg_valence'=>0,
                          'avg_engagement'=>0,
                          'avg_happy'=>0,
                          'avg_sad'=>0,
                          'avg_angry'=>0,
                          'avg_surprised'=>0,
                          'avg_disgusted'=>0,
                          'avg_scared'=>0,
                          'avg_neutral'=>0,
                          'peak_emotion'=>"Neutral",
                          'peak_ad_id'=>0
                    )
        );
         * */
         
        $zerodate = strtotime('00:00:00');
       
        $minTimeValue = ($minTimeValue!=$zerodate) ? $zerodate : $minTimeValue;
       
        $adPeakEmotion = 0;
        for($i = $minTimeValue; $i <= $maxTimeValue; $i = $i+1){
            $whereCondArray = array();
            $to = $i + 1;
            //$i = ($flag == 0) ? $i : $i+1;
            $time_range_from = date('H:i:s', $i);
            $time_range_to = date('H:i:s', $to); 
            
            // condition for excluding campaigns 
            if(in_array("excludecampaign", $chkArray)){
                array_push($whereCondArray, "cf_cmp_id = '0'");               
            }
            
            if(isset($_REQUEST['ad_ar_id'])){ 
                //$where_cond = "where ar_id='".$_REQUEST['ad_ar_id']."' limit 0,1"; 
                array_push($whereCondArray, "ar.ar_id = '".trim($_REQUEST['ad_ar_id'])."'");
            }
            
            array_push($whereCondArray, "cf_c_id = '$content_id' AND ad.ad_time BETWEEN '$time_range_from' AND '$time_range_to'");
                      
            $whereCond = implode(" AND ", $whereCondArray);               
            
            $adValenceQuery = "SELECT AVG(ad.ad_valence) as 'avg_valence',
                               AVG(ad.ad_happy) as 'avg_happy',
                               AVG(ad.ad_sad) as 'avg_sad',
                               AVG(ad.ad_neutral) as 'avg_neutral',
                               AVG(ad.ad_angry) as 'avg_angry',
                               AVG(ad.ad_suprised) as 'avg_surprised',
                               AVG(ad.ad_disgusted) as 'avg_disgusted',
                               AVG(ad.ad_scared) as 'avg_scared',
                               AVG(ad.ad_engagement) as 'avg_engagement',
                               ad.ad_dominant_emotion as 'peak_emotion',
                               ad.ad_id
                               FROM analysis_detail ad
                               JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                               JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                               WHERE $whereCond"; 
            
            
            // for getting average emotion values
            $adValenceResource = mysql_query($adValenceQuery);
            $adValenceSchema = mysql_fetch_assoc($adValenceResource);
            $compareEmotionArray = array();
            
            $adValenceVal = (isset($adValenceSchema['avg_valence']) && $adValenceSchema['avg_valence']!="") ? $adValenceSchema['avg_valence'] : 0; 
            $adEngagementVal = (isset($adValenceSchema['avg_engagement']) && $adValenceSchema['avg_engagement']!="") ? $adValenceSchema['avg_engagement'] : null;
            $adHappyVal = (isset($adValenceSchema['avg_happy']) && $adValenceSchema['avg_happy']!="") ? $adValenceSchema['avg_happy'] : 0; 
            $adSadVal = (isset($adValenceSchema['avg_sad']) && $adValenceSchema['avg_sad']!="") ? $adValenceSchema['avg_sad'] : 0; 
            $adAngryVal = (isset($adValenceSchema['avg_angry']) && $adValenceSchema['avg_angry']!="") ? $adValenceSchema['avg_angry'] : 0;
            $adSurprisedVal = (isset($adValenceSchema['avg_surprised']) && $adValenceSchema['avg_surprised']!="") ? $adValenceSchema['avg_surprised'] : 0;
            $adDisgustedVal = (isset($adValenceSchema['avg_disgusted']) && $adValenceSchema['avg_disgusted']!="") ? $adValenceSchema['avg_disgusted'] : 0;
            $adScaredVal = (isset($adValenceSchema['avg_scared']) && $adValenceSchema['avg_scared']!="") ? $adValenceSchema['avg_scared'] : 0;
            $adNeutralVal = (isset($adValenceSchema['avg_neutral']) && $adValenceSchema['avg_neutral']!="") ? $adValenceSchema['avg_neutral'] : 0;
            //$adPeakEmotion = (isset($adValenceSchema['peak_emotion']) && $adValenceSchema['peak_emotion']!="") ? $adValenceSchema['peak_emotion'] : "Neutral";
            $adPeakId = (isset($adValenceSchema['ad_id']) && $adValenceSchema['ad_id']!="") ? $adValenceSchema['ad_id'] : "0";          
            
            // create an array of emotions, valence and engagement
            array_push($commonEmotionsSmileyArray['valence'], $adValenceVal);
            array_push($commonEmotionsSmileyArray['engagement'], $adEngagementVal);
            array_push($commonEmotionsSmileyArray['happy'], $adHappyVal);
            array_push($commonEmotionsSmileyArray['sad'], $adSadVal);
            array_push($commonEmotionsSmileyArray['neutral'], $adNeutralVal);
            array_push($commonEmotionsSmileyArray['angry'], $adAngryVal);
            array_push($commonEmotionsSmileyArray['surprised'], $adSurprisedVal);
            array_push($commonEmotionsSmileyArray['disgusted'], $adDisgustedVal);
            array_push($commonEmotionsSmileyArray['scared'], $adScaredVal);           
            
            $comparingArray = array(
                'Neutral' => (float)$adNeutralVal,
                'Happy' => (float)$adHappyVal,
                'Sad' => (float)$adSadVal,
                'Angry' => (float)$adAngryVal,
                'Surprised' => (float)$adSurprisedVal,
                'Disgusted' => (float)$adDisgustedVal,
                'Scared' => number_format($adScaredVal, 10)*100000
            );
            
            $max_value = array_max_key($comparingArray);
            $max_value = ucfirst($max_value);
            
            array_push($adValenceArray, 
                    array('time_range'=>$time_range_from,
                          'avg_valence'=>$adValenceVal,
                          'avg_engagement'=>$adEngagementVal,
                          'avg_happy'=>$adHappyVal,
                          'avg_sad'=>$adSadVal,
                          'avg_angry'=>$adAngryVal,
                          'avg_surprised'=>$adSurprisedVal,
                          'avg_disgusted'=>$adDisgustedVal,
                          'avg_scared'=>$adScaredVal,
                          'avg_neutral'=>$adNeutralVal,
                          'peak_emotion'=>$max_value,
                          'peak_ad_id'=>$adPeakId,
                          'cmp_array'=>$comparingArray
                    )
            );
            //$adValenceArray[$time_range_to] = $adValenceVal;
            $flag++;
        }              
        
        // make an array of ad_valence values with their time values        
        $ar_ids = implode(',',$ary);
	if(!$ar_ids)$ar_ids=0;
        
	if($vd[cf_date]!=0)
		$vd[cf_date]=date("M d,Y",$vd[cf_date]);
	else
		$vd[cf_date]="-";

	$smarty->assign(array("avg_img"=>$avg_img,
                                "ad_valence"=>$valence,
                                "valence_data_array"=>json_encode($adValenceArray),
                                "smileys_count_array"=>json_encode($commonEmotionsSmileyArray),
                                //"attention_data_array"=>json_encode($attention_graph_data),
                                "avg_ad_valence"=>$avg_valence,
                                "ad_time"=>$time,
                                "compare_option"=>$compare_option,
                                "c_id"=>$vd[c_id],
                                "cf_id"=>$vd[cf_id],
                                "user_name"=>$vd[user_fname]." ".$vd[user_lname],
                                "video_title"=>$vd[c_title],
                                'cf_date'=>$vd[cf_date],
                                "avg_ad_time"=>$avg_time,
                                "video_url"=>$Server_View_Path."video_files/".$vd[cf_id].".flv",
                                "video_id"=>get_video_id($vd[c_url]),
                                "SERVER_COMPANY_PATH"=>$Server_company_Path,
                                "SERVER_PATH"=>$Server_View_Path,
                                "act"=>'analysis_graph',
                                "filter_graph_array"=>$chkArray,
                                "video_analysis_tab" => (!isset($_GET['camp_id']) && isset($_GET['cid'])) ? "label" : "",
                                "campaign_analysis_tab"=>(isset($_GET['camp_id']) && isset($_GET['cid'])) ? "label" : "",
                                "active_analysis_tab"=>(isset($_GET['ad_ar_id'])) ? "label" : "",
                                "analysis_tab"=>"analysis-selected"
	));
}

$smarty->display('campaign_analysis.tpl');
?>