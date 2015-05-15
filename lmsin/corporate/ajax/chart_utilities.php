<?php 
include ("../../includes/common.php");
if(isset($_POST) && isset($_POST['action'])){
    
    switch ($_POST['action']) {
        case "questions_chart":
            $json_encoded_data = "";
            $feedbackDataArray = array();
            $questionIdArray = array();
            $contentId = $_POST['contentid'];
            $campaignId = (isset($_POST['campaignid'])) ? trim($_POST['campaignid']) : "";
            if(isset($contentId) && contentId!=""){
                /*
                $feedbackQuery = "SELECT cf.cf_user_id, fq.fq_q_id, q.q_question, fq.fq_o_id, o.o_value, count( fq.fq_o_id ) AS 'ans_cnt'
                                  FROM content_feedback cf
                                  JOIN feedback_question fq ON cf.cf_id = fq.fq_cf_id
                                  LEFT JOIN question q ON q.q_id = fq.fq_q_id
                                  LEFT JOIN options o ON o.o_id = fq.fq_o_id
                                  WHERE cf.cf_c_id = '$contentId'
                                  GROUP BY fq.fq_q_id, fq.fq_o_id";
                */
                
                /*
                $feedbackQuery = "SELECT cf.cf_user_id, qs.question_set, fq.fq_q_id, q.q_question, fq.fq_o_id, o.o_value, count( fq.fq_o_id ) AS 'ans_cnt'
                                  FROM content_feedback cf
                                  JOIN feedback_question fq ON cf.cf_id = fq.fq_cf_id
                                  LEFT JOIN question q ON q.q_id = fq.fq_q_id
                                  LEFT JOIN options o ON o.o_id = fq.fq_o_id
                                  JOIN map_question_set mqs ON q.q_id = mqs.map_question_id
                                  JOIN question_set qs ON mqs.map_set_id = qs.question_set_id
                                  WHERE cf.cf_c_id = '$contentId'
                                  GROUP BY qs.question_set_id, fq.fq_o_id";                
                
                $feedbackSchema = mysql_query($feedbackQuery); 
                if(mysql_num_rows($feedbackSchema)){
                    while($feedbackRecord = mysql_fetch_assoc($feedbackSchema)){
                            $questiontxt = (isset($feedbackRecord['q_question'])) ? $feedbackRecord['q_question'] : "NA";
                            $feedbackDataArray[$questiontxt][] = array(
                                'questionset' => $feedbackRecord['question_set'],
                                'questionid' => $feedbackRecord['fq_q_id'],
                                'answer' => $feedbackRecord['o_value'],
                                'users_count' => $feedbackRecord['ans_cnt']
                            );
                    }   
                    
                    $json_encoded_data = json_encode($feedbackDataArray);
                }
                */
                
                // get list of all question sets
                $questionSetsQuery = mysql_query("SELECT question_set_id, question_set FROM question_set order by question_set_id") or die(mysql_error());
                if(mysql_num_rows($questionSetsQuery)>0){
                    while($qset = mysql_fetch_assoc($questionSetsQuery)){
                       $set_questions_array = array(); 
                       // get all options with their counts of the questions of the question set
                       $questionsQuery = mysql_query("SELECT map_question_id from map_question_set where map_set_id = '".$qset['question_set_id']."'");
                       while($questions = mysql_fetch_assoc($questionsQuery)){
                          array_push($set_questions_array, $questions['map_question_id']); 
                       }
                       
                       $whereCondArray = array();
                       $questionsIdString = implode(",", $set_questions_array);
                       
                       array_push($whereCondArray, "fq.fq_q_id IN (".$questionsIdString.") AND fq.fq_o_id IN ( 1, 2, 3, 4, 5 ) AND cf.cf_c_id = '$contentId'");
                       if(isset($campaignId) && $campaignId!=""){
                           array_push($whereCondArray, "cf_cmp_id = '".$campaignId."'");
                       }
                       
                       // now get list of options and their counts of the questions list
                       $whereCondStat = "WHERE ".implode(" AND ", $whereCondArray);
                       $optionsQuery = mysql_query("SELECT fq.fq_o_id, count( fq.fq_o_id ) as 'cnt' FROM feedback_question fq join content_feedback cf ON fq.fq_cf_id = cf.cf_id "
                               .$whereCondStat. " GROUP BY fq.fq_o_id");
                    
                       if(mysql_num_rows($optionsQuery)>0){
                           $options_array = array();
                           while($options = mysql_fetch_assoc($optionsQuery)){
                               //array_push($options_array, array('option'=>$options['fq_o_id'], 'count'=>$options['cnt']));
                               $options_array[$options['fq_o_id']] = is_numeric($options['cnt']) ? $options['cnt'] : 0;
                           }
                       }
                       $feedbackDataArray[$qset['question_set']] = $options_array; 
                    }
                }
                
                //echo "<pre>";
                //print_r($feedbackDataArray);
                $json_encoded_data = json_encode($feedbackDataArray);
                echo $json_encoded_data;
            }
        
            break;
        case 'valence_chart':
            $json_encoded_data = "";
            $valenceRecordArray = array();
            $cf_id = $_POST['cf_id'];
            $content_id = $_POST['contentid'];
            $timeValArray = array();
            /*$valenceQuery = "SELECT vad_json_data,ad_valence from video_analysis_data inner join (SELECT ad_id, ad_valence from analysis_detail 
where ad_ar_id in (SELECT ar_id from analysis_results where ar_cf_id = '$cf_id'))t1 ON video_analysis_data.vad_img_name = concat(t1.ad_id,'.jpg')";
            */
            
            $allAdTimeQuery = "SELECT MIN(ad.ad_time) as 'min_time_sec', MAX(ad.ad_time) as 'max_time_sec' 
                               FROM analysis_detail ad
                               JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                               JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                               WHERE cf_c_id = '$content_id'"; 
            
            // Now get mimimum value and maximum value of the time in seconds
            $allAdTimeSchema = mysql_query($allAdTimeQuery);           
            if(mysql_num_rows($allAdTimeSchema)>0){
                while($timeValueRecords = mysql_fetch_assoc($allAdTimeSchema)){
                    $timeValArray['min_time_val'] = $timeValueRecords['min_time_sec']; 
                    $timeValArray['max_time_val'] = $timeValueRecords['max_time_sec'];
                }
            }           
            
            $minTimeValue = strtotime($timeValArray['min_time_val']); 
            $maxTimeValue = strtotime($timeValArray['max_time_val']);
            $diff = $maxTimeValue - $minTimeValue;
            $interval = $diff/5; 
            $time_range = "";
            $flag = 0;
            
            $adValenceArray = array();
            for($i = $minTimeValue; $i <= $maxTimeValue; $i = $i+$interval){
                $to = $i + $interval;
                $i = ($flag == 0) ? $i : $i+1;
                $time_range_from = date('H:i:s', $i);
                $time_range_to = date('H:i:s', $to);
                
                //array_push($time_range_array, $time_range);                
                $adValenceQuery = "SELECT AVG(ad.ad_valence) as 'avg_valence' 
                                   FROM analysis_detail ad
                                   JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                                   JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                                   WHERE cf_c_id = '$content_id' AND ad.ad_time BETWEEN '$time_range_from' AND '$time_range_to'"; 
                $adValenceResource = mysql_query($adValenceQuery);
                $adValenceSchema = mysql_fetch_assoc($adValenceResource);
                
                array_push($adValenceArray, array('time_range'=>$time_range_from."-".$time_range_to, 'avg_valence'=>$adValenceSchema['avg_valence']));
                $flag++;
            }
            
            $json_encoded_data = json_encode($adValenceArray);
            echo $json_encoded_data;              
            break;
        default:
            break;
    }
    
}

?>