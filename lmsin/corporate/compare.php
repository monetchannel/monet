<?php  //aadi
include ("../includes/common.php");
include ("../includes/common_functions.php");
include ("../includes/graph.php");
init();


####################################
if($_COOKIE[CompanyId]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}




if($_COOKIE[CompanyId])
{
    
   
    
    $R=  DIN_ALL($_REQUEST);
    $c1="Overall";
    $ct1="Overall";
    $c2="Overall";
    $ct2="Overall";
    $g1="Overall";
    $g2="Overall";
    $category_name1=array();
    $category_name2=array();
    $country_name1=array();
    $country_name2=array();
    
    $graphsToShowArray = explode(",", $_COOKIE['graphs_to_show']);
$video1ToCompareArray = explode(",", $_COOKIE['video1_to_compare']);
$video2ToCompareArray = explode(",", $_COOKIE['video2_to_compare']);
// use this array to filter which graph to show on the screen
$chkArray = array();
$video1 = array();
$video2 = array();

foreach($graphsToShowArray as $key=>$value){
    $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
    array_push($chkArray, trim($filteredStr)); 
}
if($R['act']=="compare"){
if($_COOKIE['video1_to_compare']!=""){
    foreach($video1ToCompareArray as $key=>$value){
        $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
        array_push($video1, trim($filteredStr)); 
    }
}
if($_COOKIE['video2_to_compare']!=""){
    foreach($video2ToCompareArray as $key=>$value){
        $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
        array_push($video2, trim($filteredStr)); 
    }
}

if(isset($R['all1']) && $R['all1']!=""){
        
    $condition1="";
    $condition2="";
    $condition3="";
        if (isset($R['cat1']) && $R['cat1'] != '') $condition1 = " AND cv.cv_cat_id = " . $R['cat1'];
	if (isset($R['countries1']) && $R['countries1'] != '') $condition2 = " AND u.user_country = " . $R['countries1'];
	if (isset($R['gender1']) && $R['gender1'] != '') $condition3 = " AND u.user_gender = '" . $R['gender1'] . "'";
        
    $SQL = "SELECT c.c_id
            FROM content c
            JOIN content_feedback cf ON cf.cf_c_id=c.c_id 
            JOIN users u ON cf.cf_user_id=u.user_id
              JOIN category_video cv ON c.c_id=cv.cv_c_id  
              WHERE c.c_company_id != ".$_COOKIE[CompanyId]." ".$condition2."".$condition3."".$condition1;
    $tot = eq($SQL,$rss);
    if($tot>0){
        while($data=mfa($rss)){
            array_push($video1,$data['c_id']);
        }
    }
}

if(isset($R['all2']) && $R['all2']!=""){
        
    $condition1="";
    $condition2="";
    $condition3="";
        if (isset($R['cat2']) && $R['cat2'] != '') $condition1 = " AND cv.cv_cat_id = " . $R['cat2'];
	if (isset($R['countries2']) && $R['countries2'] != '') $condition2 = " AND u.user_country = " . $R['countries2'];
	if (isset($R['gender2']) && $R['gender2'] != '') $condition3 = " AND u.user_gender = '" . $R['gender2'] . "'";
        
    $SQL = "SELECT c.c_id
            FROM content c
            JOIN content_feedback cf ON cf.cf_c_id=c.c_id 
            JOIN users u ON cf.cf_user_id=u.user_id
              JOIN category_video cv ON c.c_id=cv.cv_c_id  
              WHERE c.c_company_id != ".$_COOKIE[CompanyId]."".$condition2."".$condition3." ".$condition1;
    $tot = eq($SQL,$rss);
    if($tot>0){
        while($data=mfa($rss)){
            array_push($video2,$data['c_id']);
        }
    }
}

$video1_to_compare = implode(",",$video1);
$video2_to_compare = implode(",",$video2);
if($video1_to_compare=="") echo "<script>alert('Sorry, there are no feedbacks for Selection 1!');window.location.href='./compare.php';</script>";
if($video2_to_compare=="") echo "<script>alert('Sorry, there are no feedbacks for Selection 2!');window.location.href='./compare.php';</script>";
}
    $videos1 = array();
    $videos2 = array();
    
    $gender1_include = "";
    $country1_include = "";
    $category1_include = "";
    $gender2_include = "";
    $country2_include = "";
    $category2_include = "";
    
    $SQL="Select * FROM category";
    eq($SQL,$rs);
    $func_ary=array("compare","analysebyvideo","analysebyparameters");
  
    while($data = mfa($rs))
    {
            if($data['cat_id'] == $R['cat1'])
            {
                    $data['selected'] = 'selected';
                    $category1_include = $data['cat_name'];
                    $c1 = $data['cat_name'];
            }else {
                    $data['selected'] = '';
            }
            array_push($category_name1, $data);
            
            if($data['cat_id'] == $R['cat2'])
            {
                    $data['selected'] = 'selected';
                    $category2_include = $data['cat_name'];
                    $c2 = $data['cat_name'];
            }else {
                    $data['selected'] = '';
            }
            array_push($category_name2, $data);
    }
    
    $SQL = "Select * FROM countries";
	eq($SQL, $rs);
	while ($data = mfa($rs)) {
		if ($data['countries_id'] == $R['countries1']) {
			$data['selected'] = 'selected';
                        $country1_include = $data['countries_name'];
                         $ct1 = $data['countries_name'];
		}
		else {
			$data['selected'] = '';
		}

		array_push($country_name1, $data);
                
                if ($data['countries_id'] == $R['countries2']) {
			$data['selected'] = 'selected';
                        $country2_include = $data['countries_name'];
                         $ct2 = $data['countries_name'];
		}
		else {
			$data['selected'] = '';
		}

		array_push($country_name2, $data);
	}

	if ($R['gender1'] == "Male"){
            $male = array(
		"key" => "Male",
		"selected" => "selected"
            );
            $gender1_include = "Males";
        }
	else $male = array(
		"key" => "Male",
		"selected" => ''
	);
	if ($R['gender1'] == "Female"){
            $female = array(
		"key" => "Female",
		"selected" => "selected"
            );
            $gender1_include = "Females";
        }
	else $female = array(
		"key" => "Female",
		"selected" => ''
	);
	$gender1 = array(
		$male,
		$female
	);
        
        if ($R['gender2'] == "Male"){
            $male = array(
		"key" => "Male",
		"selected" => "selected"
            );
            $gender2_include = "Males";
        }
	else $male = array(
		"key" => "Male",
		"selected" => ''
	);
	if ($R['gender2'] == "Female"){
            $female = array(
		"key" => "Female",
		"selected" => "selected"
            );
            $gender2_include = "Females";
        }
	else $female = array(
		"key" => "Female",
		"selected" => ''
	);
	$gender2 = array(
		$male,
		$female
	);
        if ($R['gender1'] != "") $g1 = $R['gender1'];
        if ($R['gender2']!="") $g2 = $R['gender2'];
	$condition1 = "";
	$condition2 = "";
	$condition3 = "";
        $brand_condition = " AND c.c_company_id= ".$_COOKIE[CompanyId]." ";
        $AnalysisResultId=array();
    
    //if($R['filter'] && $R['filter']=='true'){
        
        if (isset($R['cat1']) && $R['cat1'] != '') $condition1 = " AND cv.cv_cat_id = " . $R['cat1'];
	if (isset($R['countries1']) && $R['countries1'] != '') $condition2 = " AND u.user_country = " . $R['countries1'];
	if (isset($R['gender1']) && $R['gender1'] != '') $condition3 = " AND u.user_gender = '" . $R['gender1'] . "'";
        if  (isset($R['all1']) && $R['all1'] != '') $brand_condition = "";
        

        $SQL="SELECT c.c_id,ar.ar_id
            FROM analysis_results ar
            JOIN content_feedback cf ON ar.ar_cf_id=cf.cf_id 
            JOIN users u ON cf.cf_user_id=u.user_id
            
              JOIN content c ON c.c_id=cf.cf_c_id
              JOIN category_video cv ON c_id=cv.cv_c_id  
              WHERE 1 ".$condition2."".$condition3."".$brand_condition."".$condition1; //echo $SQL;
        eq($SQL, $rs);
        while($content= mfa($rs)){        //
            
           
            array_push($AnalysisResultId, $content[ar_id]);    //$AnalysisResultId contains the ar_id of the filtered feedbacks
        }
        
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $condition1 = "";
	$condition2 = "";
	$condition3 = "";
        $brand_condition = " AND c.c_company_id= ".$_COOKIE[CompanyId]." ";
        $AnalysisResultId_overall=array();
    
    //if($R['filter'] && $R['filter']=='true'){
        
        if (isset($R['cat2']) && $R['cat2'] != '') $condition1 = " AND cv.cv_cat_id = " . $R['cat2'];
	if (isset($R['countries2']) && $R['countries2'] != '') $condition2 = " AND u.user_country = " . $R['countries2'];
	if (isset($R['gender2']) && $R['gender2'] != '') $condition3 = " AND u.user_gender = '" . $R['gender2'] . "'";
        if  (isset($R['all2']) && $R['all2'] != '') $brand_condition = "";

        $SQL="SELECT c.c_id,ar.ar_id
            FROM analysis_results ar
            JOIN content_feedback cf ON ar.ar_cf_id=cf.cf_id 
            JOIN users u ON cf.cf_user_id=u.user_id
            
              JOIN content c ON c.c_id=cf.cf_c_id
              JOIN category_video cv ON c_id=cv.cv_c_id  
              WHERE 1 ".$condition2."".$condition3."".$brand_condition."".$condition1; //echo $SQL;
        eq($SQL, $rs);
        while($content= mfa($rs)){        //
            
           
            array_push($AnalysisResultId_overall, $content[ar_id]);    //$AnalysisResultId contains the ar_id of the filtered feedbacks
        }
        
        
        
        
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
          
        $video_num_rows1=0;
        $video_num_rows2=0;
        $num_rec_per_page=5;
            //print_r(array_values($AnalysisResultId));
        
        
        if(fe($_REQUEST[act]))
        {
          $_REQUEST[act]($_REQUEST[msg]);
           die();
        }
        
        else{
            $analysis_ids = implode(",",$AnalysisResultId);
            if($analysis_ids!=""){    
                    $SQL2="SELECT DISTINCT c.c_id FROM content c
                           JOIN content_feedback cf ON c.c_id=cf.cf_c_id
                           JOIN analysis_results ar ON cf.cf_id=ar.ar_cf_id
                           WHERE ar.ar_id IN (".$analysis_ids.")";
                            $SQL3="SELECT *,(SELECT count(*) FROM content_feedback
                                JOIN analysis_results ar ON cf_id=ar.ar_cf_id
                           WHERE ar.ar_id IN (".$analysis_ids.") AND
                               cf_c_id = c_id AND cf_rating>'0' and cf_ep_id>'0') AS num_feedback FROM content 
                            JOIN category_video cv ON cv.cv_c_id = c_id
                            JOIN category cat ON cv.cv_cat_id = cat.cat_id where c_id IN (".$SQL2.")";
                            eq($SQL3,$rs3);
                            while($video= mfa($rs3)){
                                if(check_vid_exist($video[c_url])){
                                    $video[c_date]=date('m/d/y',$video[c_date]);
                                    array_push($videos1, $video);
                                    $video_num_rows1++;
                                }
                            }
            }
            $analysis_ids = implode(",",$AnalysisResultId_overall);
            if($analysis_ids!=""){    
                    $SQL2="SELECT DISTINCT c.c_id FROM content c
                           JOIN content_feedback cf ON c.c_id=cf.cf_c_id
                           JOIN analysis_results ar ON cf.cf_id=ar.ar_cf_id
                           WHERE ar.ar_id IN (".$analysis_ids.")";
                            $SQL3="SELECT *,(SELECT count(*) FROM content_feedback 
                           JOIN analysis_results ar ON cf_id=ar.ar_cf_id
                           WHERE ar.ar_id IN (".$analysis_ids.") AND cf_c_id = c_id AND cf_rating>'0' and cf_ep_id>'0') AS num_feedback FROM content JOIN category_video cv ON cv.cv_c_id = c_id
                            JOIN category cat ON cv.cv_cat_id = cat.cat_id  where c_id IN (".$SQL2.")";
                            eq($SQL3,$rs3);
                            while($video= mfa($rs3)){
                                if(check_vid_exist($video[c_url])){
                                    $video[c_date]=date('m/d/y',$video[c_date]);
                                    array_push($videos2, $video);
                                    $video_num_rows2++;
                                }
                            }    
            
            }
            }
                    //echo "ar_id=".$v[ar_id].",video_num_rows=".$video_num_rows.",video[c_id]=".$videos[c_id]."<br>";
                
            $smarty = new Smarty;
            //print_r(array_values($gender));
            $smarty->assign(array("category_name1"=>$category_name1,
                                "country_name1"=>$country_name1,
                                "gender1"=>$gender1,
                                "category_name2"=>$category_name2,
                                "country_name2"=>$country_name2,
                                "gender2"=>$gender2,
                                "video_num_rows1" => $video_num_rows1,
                                "video_num_rows2" => $video_num_rows2,
                                "analysis_tab" => "analysis-selected",
                                "premium_tab" => "label",  
                                "videos1" => $videos1,  
                                "videos2" => $videos2,
                                "gender1_include" => $gender1_include,
                                "gender2_include" => $gender2_include,
                                "country1_include" => $country1_include,
                                "country2_include" => $country2_include,
                                "category1_include" => $category1_include,
                                "category2_include" => $category2_include));
        
           $smarty->display('compare.tpl');
        }
        
    

function compare($msg="") {
     global $c1;
    global $c2;
    global $ct1;
    global $ct2;
    global $g1;
    global $g2;
    $c_id=$_REQUEST[c_id];
    //echo $c_id;
    global $AnalysisResultId;
    global $AnalysisResultId_overall;
    global $Server_View_Path;
    global $Server_company_Path;
    global $video1_to_compare;
    global $video2_to_compare;
    if ($video1_to_compare!="") {
            $where_cond = "where content.c_id IN (".$video1_to_compare.") limit 0,1";    
        }
        
	//get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' limit 0,1","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);	
        //get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id",$where_cond,"c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);        
        
    $graphsToShowArray = explode(",", $_COOKIE['graphs_to_show']);
    $chkArray = array();
    foreach($graphsToShowArray as $key=>$value){
        $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
        array_push($chkArray, trim($filteredStr)); 
    }
    $Ids=array();
    $SQL="SELECT ar_id
                FROM analysis_results ar
                JOIN content_feedback cf ON ar.ar_cf_id=cf.cf_id
                WHERE cf.cf_c_id IN (".$video1_to_compare.")";
    eq($SQL, $rs);
    while($data=mfa($rs)){
        if(in_array($data[ar_id], $AnalysisResultId))
            array_push ($Ids, $data[ar_id]);
    }
    $Ids_string = "";
    //print_r(array_values($Ids));
    if(count($Ids>0))$Ids_string = implode(",",$Ids); //Ids contains ar_id of the filtered results corresponding to the video
    if($Ids_string=="")echo "<script>alert('Sorry, there are no feedbacks for Selection 1!');window.location.href='./compare.php';</script>";
    
                $SQL = "SELECT vad_json_data,ad_valence from video_analysis_data inner join (SELECT ad_id, ad_valence from analysis_detail where ad_ar_id in ($Ids_string))t1 ON video_analysis_data.vad_img_name = concat(t1.ad_id,'.jpg')";
            eq($SQL,$Result);
            
            while($data=mfa($Result)){
                $json = json_decode($data[vad_json_data],true);
                $expressions = $json['Faces'];
                $previous_facebox=$json['previous_facebox'];
                if($expressions !=null)									
                {
                    $expressions = $expressions[0];
                    if($expressions!=null)								
                    {
                        $eye=0.25;
 			$head=0;
 			$valid_model=1;	
 			$x=0;
 			$y=0;
 			$x1=0;
 			$y1=0;
 			if($expressions['StateOfLeftEye']=='Open')
 				$eye=$eye+0.5;
 			if($expressions['StateOfRightEye']=='Open')
 				$eye=$eye+0.5;
 			if($eye>1) $eye=1;
 			for($i = 0; $i<3; $i++)
 				$head=$head + $expressions['HeadOrientation'][$i]*$expressions['HeadOrientation'][$i];
 			$head=$head/3;
 			$head=sqrt($head);
 			for($i = 0; $i<4; $i++){
 				$x=$x+$expressions['FaceBoxCorners'][$i]['X'];
 				$y=$y+$expressions['FaceBoxCorners'][$i]['Y'];
 			}
 			$x=$x/4;
 			$y=$y/4;
 			if($previous_facebox==-1){
 				$engagement=$eye*(1-$head)*2-1;
 				if($engagement>1) $engagement=1;
				if($engagement<-1) $engagement=-1;
 			}
 			else{
 				for($i = 0; $i<4; $i++){
	 				$x1=$x1+$previous_facebox[$i]['X'];
	 				$y1=$y1+$previous_facebox[$i]['Y'];
	 			}
	 			$x1=$x1/4;
 				$y1=$y1/4;
 				$faceBox=$x1-$x;							
				$faceBox=$faceBox/150;
				if($faceBox<0) $faceBox=-$faceBox;

				$engagement=$eye*(1-$head)*(1-$faceBox)*2-1;
				if($engagement>1) $engagement=1;
				if($engagement<-1) $engagement=-1;
 			}
                    }
            
                }
                //echo "test";
                $sql="UPDATE analysis_detail SET ad_engagement=$engagement WHERE ad_valence=$data[ad_valence] ";
                mysql_query($sql) or die(mysql_errno());
               // echo"temp";
               
            }
            
            //aadi
        
        $ary=array();
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id IN (".$video1_to_compare.") and ar_id in (".$Ids_string.") ");
        // make an array of ad_valence values with their time values       
        $allAdTimeQuery = "SELECT MIN(ad.ad_time) as 'min_time_sec', MAX(ad.ad_time) as 'max_time_sec' 
                           FROM analysis_detail ad
                           JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                           JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                           WHERE cf.cf_c_id IN (".$video1_to_compare.") and ar.ar_id in (".$Ids_string.")"; 

        // Now get minimum value and maximum value of the time in seconds
        $allAdTimeSchema = mysql_query($allAdTimeQuery);           
        if(mysql_num_rows($allAdTimeSchema)>0){
            while($timeValueRecords = mysql_fetch_assoc($allAdTimeSchema)){//print_r(array_values($timeValueRecords));
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
            'posvalence'=>array(),
            'negvalence'=>array(),
            'posengagement'=>array(),
            'negengagement'=>array(),
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
        $countForQuery=0;
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
            
            array_push($whereCondArray, "ad.ad_time BETWEEN '$time_range_from' AND '$time_range_to'");
                      
            $whereCond = implode(" AND ", $whereCondArray);               
            //echo $whereCond;
           //aadi
            //if($countForQuery==0){
            $adValenceQuery = "SELECT ";
            
            if(in_array("valence", $chkArray)){
                $adValenceQuery=$adValenceQuery."AVG(ad.ad_valence) as 'avg_valence',";
            }
            if(in_array("emotion", $chkArray)){
                $adValenceQuery=$adValenceQuery."AVG(ad.ad_happy) as 'avg_happy',
                                                 AVG(ad.ad_sad) as 'avg_sad',
                                                 AVG(ad.ad_neutral) as 'avg_neutral',
                                                 AVG(ad.ad_angry) as 'avg_angry',
                                                 AVG(ad.ad_suprised) as 'avg_surprised',
                                                 AVG(ad.ad_disgusted) as 'avg_disgusted',
                                                 AVG(ad.ad_scared) as 'avg_scared',";
            }
            if(in_array("attention", $chkArray)){
                $adValenceQuery=$adValenceQuery."AVG(ad.ad_engagement) as 'avg_engagement',";
            }
            //$adValenceQuery=  rtrim($adValenceQuery,",");
            $adValenceQuery=$adValenceQuery."ad.ad_dominant_emotion as 'peak_emotion',
                                             ad.ad_id
                                             FROM analysis_detail ad
                                             JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                                             JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                                             WHERE $whereCond  and ar.ar_id in (".$Ids_string.")";
           
            $countForQuery++;
            
            //}
            //aadi
            // for getting average emotion values
            $adValenceResource = mysql_query($adValenceQuery);
            $adValenceSchema = mysql_fetch_assoc($adValenceResource);
            $compareEmotionArray = array();
            
            $adValenceVal = (isset($adValenceSchema['avg_valence']) && $adValenceSchema['avg_valence'] != "") ? $adValenceSchema['avg_valence'] : null;
            $adEngagementVal = (isset($adValenceSchema['avg_engagement']) && $adValenceSchema['avg_engagement'] != "") ? $adValenceSchema['avg_engagement'] : null;
            $adHappyVal = (isset($adValenceSchema['avg_happy']) && $adValenceSchema['avg_happy'] != "") ? $adValenceSchema['avg_happy'] : null;
            $adSadVal = (isset($adValenceSchema['avg_sad']) && $adValenceSchema['avg_sad'] != "") ? $adValenceSchema['avg_sad'] : null;
            $adAngryVal = (isset($adValenceSchema['avg_angry']) && $adValenceSchema['avg_angry'] != "") ? $adValenceSchema['avg_angry'] : null;
            $adSurprisedVal = (isset($adValenceSchema['avg_surprised']) && $adValenceSchema['avg_surprised'] != "") ? $adValenceSchema['avg_surprised'] : null;
            $adDisgustedVal = (isset($adValenceSchema['avg_disgusted']) && $adValenceSchema['avg_disgusted'] != "") ? $adValenceSchema['avg_disgusted'] : null;
            $adScaredVal = (isset($adValenceSchema['avg_scared']) && $adValenceSchema['avg_scared'] != "") ? $adValenceSchema['avg_scared'] : null;
            $adNeutralVal = (isset($adValenceSchema['avg_neutral']) && $adValenceSchema['avg_neutral'] != "") ? $adValenceSchema['avg_neutral'] : null;

            // $adPeakEmotion = (isset($adValenceSchema['peak_emotion']) && $adValenceSchema['peak_emotion']!="") ? $adValenceSchema['peak_emotion'] : "Neutral";

            $adPeakId = (isset($adValenceSchema['ad_id']) && $adValenceSchema['ad_id'] != "") ? $adValenceSchema['ad_id'] : null;

            // create an array of emotions, valence and engagement
            /*array_push($commonEmotionsSmileyArray['valence'], $adValenceVal);
            array_push($commonEmotionsSmileyArray['engagement'], $adEngagementVal);
            array_push($commonEmotionsSmileyArray['happy'], $adHappyVal);
            array_push($commonEmotionsSmileyArray['sad'], $adSadVal);
            array_push($commonEmotionsSmileyArray['neutral'], $adNeutralVal);
            array_push($commonEmotionsSmileyArray['angry'], $adAngryVal);
            array_push($commonEmotionsSmileyArray['surprised'], $adSurprisedVal);
            array_push($commonEmotionsSmileyArray['disgusted'], $adDisgustedVal);
            array_push($commonEmotionsSmileyArray['scared'], $adScaredVal);           
            */
            $comparingArray = array(
                'Neutral' => (float)$adNeutralVal,
                'Happy' => (float)$adHappyVal,
                'Sad' => (float)$adSadVal,
                'Angry' => (float)$adAngryVal,
                'Surprised' => (float)$adSurprisedVal,
                'Disgusted' => (float)$adDisgustedVal,
                'Scared' => number_format($adScaredVal, 10)*100000
            );
            $temp=array_keys($comparingArray,max($comparingArray));
            $max_value = $temp[0];
            $max_value = ucfirst($max_value);
            
            if ($adEngagementVal != null || $adValenceVal != null || $adHappyVal != null) // checking if the result set of the adValenceQuery is not null, if null then don't include 0's in the array // vivek verma
            array_push($adValenceArray, 
                    array('time_range'=>$time_range_from,
                          'i'=>($i-$minTimeValue+0.5),
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
        //Vivek Verma
            $valenceintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_valence'),$maxTimeValue-$minTimeValue,0,0);         
            $engagementintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_engagement'),$maxTimeValue-$minTimeValue,0,0);         
            $happyintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_happy'),$maxTimeValue-$minTimeValue,0,0);         
            $sadintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_sad'),$maxTimeValue-$minTimeValue,0,0);         
            $angryintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_angry'),$maxTimeValue-$minTimeValue,0,0);         
            $surprisedintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_surprised'),$maxTimeValue-$minTimeValue,0,0);         
            $disgustedintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_disgusted'),$maxTimeValue-$minTimeValue,0,0);         
            $scaredintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_scared'),$maxTimeValue-$minTimeValue,0,0);         
            $neutralintegral = integral(array_column($adValenceArray,'i'),array_column($adValenceArray,'avg_neutral'),$maxTimeValue-$minTimeValue,0,0);         
            
            // create an array of emotions, valence and engagement
            array_push($commonEmotionsSmileyArray['posvalence'], $valenceintegral[0]);
            array_push($commonEmotionsSmileyArray['negvalence'], $valenceintegral[1]);
            array_push($commonEmotionsSmileyArray['posengagement'], $engagementintegral[0]);
            array_push($commonEmotionsSmileyArray['negengagement'], $engagementintegral[1]);
            array_push($commonEmotionsSmileyArray['happy'], $happyintegral[2]);
            array_push($commonEmotionsSmileyArray['sad'], $sadintegral[2]);
            array_push($commonEmotionsSmileyArray['neutral'], $neutralintegral[2]);
            array_push($commonEmotionsSmileyArray['angry'], $angryintegral[2]);
            array_push($commonEmotionsSmileyArray['surprised'], $surprisedintegral[2]);
            array_push($commonEmotionsSmileyArray['disgusted'], $disgustedintegral[2]);
            array_push($commonEmotionsSmileyArray['scared'], $scaredintegral[2]);           
            array_push($commonEmotionsSmileyArray['scared'], $adScaredVal);           
            
        
        //For Smiley Section Ends
        
        // make an array of ad_valence values with their time values        
        $ar_ids = implode(',',$ary);
	if(!$ar_ids)$ar_ids=0;
        
	if($vd[cf_date]!=0)
		$vd[cf_date]=date("M d,Y",$vd[cf_date]);
	else
		$vd[cf_date]="-";
        $smarty = new Smarty;
	$smarty->assign(array("avg_img"=>$avg_img,
                                "ad_valence"=>$valence,
                                "valence_data_array"=>json_encode($adValenceArray),
                                "smileys_count_array"=>json_encode($commonEmotionsSmileyArray),
                                //"attention_data_array"=>json_encode($attention_graph_data),
                                "avg_ad_valence"=>$avg_valence,
                                "ad_time"=>$time,
                                "compare_option"=>$compare_option,
                                "avg_ad_time"=>$avg_time,
                                "video_id"=>"_r8Isy9bNi4",
                                "SERVER_COMPANY_PATH"=>$Server_company_Path,
                                "SERVER_PATH"=>$Server_View_Path,
                                "act"=>'analysis_graph',
                                "filter_graph_array"=>$chkArray,
                                "analysis_tab" => "analysis-selected",
                                "premium_tab" => "label"
	));
        
  ##########################################################################################################################################      
  ##############################OVERALL ANALYSIS#######################################################################################
  ##################################################################################################################################
  
    if ($video2_to_compare!="") {
            $where_cond = "where content.c_id IN (".$video2_to_compare.") limit 0,1";    
        }
        
	//get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' limit 0,1","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);	
        //get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id",$where_cond,"c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);        
        
    $graphsToShowArray = explode(",", $_COOKIE['graphs_to_show']);
    $chkArray = array();
    foreach($graphsToShowArray as $key=>$value){
        $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
        array_push($chkArray, trim($filteredStr)); 
    }
    $Ids=array();
    $SQL="SELECT ar_id
                FROM analysis_results ar
                JOIN content_feedback cf ON ar.ar_cf_id=cf.cf_id
                WHERE cf.cf_c_id IN (".$video2_to_compare.")";
    eq($SQL, $rs);
    while($data=mfa($rs)){
        if(in_array($data[ar_id], $AnalysisResultId_overall))
            array_push ($Ids, $data[ar_id]);
    }
    $Ids_string = "";
    //print_r(array_values($Ids));
    if(count($Ids>0))$Ids_string = implode(",",$Ids); //Ids contains ar_id of the filtered results corresponding to the video
    if($Ids_string=="")echo "<script>alert('Sorry, there are no feedbacks for Selection 2!');window.location.href='./compare.php';</script>";
    
                $SQL = "SELECT vad_json_data,ad_valence from video_analysis_data inner join (SELECT ad_id, ad_valence from analysis_detail where ad_ar_id in ($Ids_string))t1 ON video_analysis_data.vad_img_name = concat(t1.ad_id,'.jpg')";
            eq($SQL,$Result);
    while($data=mfa($rs)){
        if(in_array($data[ar_id], $AnalysisResultId_overall))
            array_push ($Ids, $data[ar_id]);
    }
    $Ids_string = "";
    //print_r(array_values($Ids));
    if(count($Ids>0))$Ids_string = implode(",",$Ids); //Ids contains ar_id of the filtered results corresponding to the video
    
                $SQL = "SELECT vad_json_data,ad_valence from video_analysis_data inner join (SELECT ad_id, ad_valence from analysis_detail where ad_ar_id in ($Ids_string))t1 ON video_analysis_data.vad_img_name = concat(t1.ad_id,'.jpg')";
            eq($SQL,$Result);
            
            
    while($data=mfa($Result)){
                $json = json_decode($data[vad_json_data],true);
                $expressions = $json['Faces'];
                $previous_facebox=$json['previous_facebox'];
                if($expressions !=null)									
                {
                    $expressions = $expressions[0];
                    if($expressions!=null)								
                    {
                        $eye=0.25;
 			$head=0;
 			$valid_model=1;	
 			$x=0;
 			$y=0;
 			$x1=0;
 			$y1=0;
 			if($expressions['StateOfLeftEye']=='Open')
 				$eye=$eye+0.5;
 			if($expressions['StateOfRightEye']=='Open')
 				$eye=$eye+0.5;
 			if($eye>1) $eye=1;
 			for($i = 0; $i<3; $i++)
 				$head=$head + $expressions['HeadOrientation'][$i]*$expressions['HeadOrientation'][$i];
 			$head=$head/3;
 			$head=sqrt($head);
 			for($i = 0; $i<4; $i++){
 				$x=$x+$expressions['FaceBoxCorners'][$i]['X'];
 				$y=$y+$expressions['FaceBoxCorners'][$i]['Y'];
 			}
 			$x=$x/4;
 			$y=$y/4;
 			if($previous_facebox==-1){
 				$engagement=$eye*(1-$head)*2-1;
 				if($engagement>1) $engagement=1;
				if($engagement<-1) $engagement=-1;
 			}
 			else{
 				for($i = 0; $i<4; $i++){
	 				$x1=$x1+$previous_facebox[$i]['X'];
	 				$y1=$y1+$previous_facebox[$i]['Y'];
	 			}
	 			$x1=$x1/4;
 				$y1=$y1/4;
 				$faceBox=$x1-$x;							
				$faceBox=$faceBox/150;
				if($faceBox<0) $faceBox=-$faceBox;

				$engagement=$eye*(1-$head)*(1-$faceBox)*2-1;
				if($engagement>1) $engagement=1;
				if($engagement<-1) $engagement=-1;
 			}
                    }
            
                }
                //echo "test";
                $sql="UPDATE analysis_detail SET ad_engagement=$engagement WHERE ad_valence=$data[ad_valence] ";
                mysql_query($sql) or die(mysql_errno());
               // echo"temp";
               
            }
        
         $ary=array();
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where ar_id in (".$Ids_string.") ");
        // make an array of ad_valence values with their time values       
        $allAdTimeQuery = "SELECT MIN(ad.ad_time) as 'min_time_sec', MAX(ad.ad_time) as 'max_time_sec' 
                           FROM analysis_detail ad
                           JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                           JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                           WHERE ar.ar_id in (".$Ids_string.")"; 

        // Now get minimum value and maximum value of the time in seconds
        $allAdTimeSchema = mysql_query($allAdTimeQuery);           
        if(mysql_num_rows($allAdTimeSchema)>0){
            while($timeValueRecords = mysql_fetch_assoc($allAdTimeSchema)){//print_r(array_values($timeValueRecords));
                $timeValArray['min_time_val'] = $timeValueRecords['min_time_sec']; 
                $timeValArray['max_time_val'] = $timeValueRecords['max_time_sec'];
            }
        }    
      
        /*
         * Valence Graph Section
         */              
        
        $minTimeValue = strtotime($timeValArray['min_time_val']); 
        $maxTimeValue = strtotime($timeValArray['max_time_val']);       
     
        $adValenceArray_overall = array();
        $totalVideoTime = 0;
        
        $commonEmotionsSmileyArray_overall = array(
            'posvalence'=>array(),
            'negvalence'=>array(),
            'posengagement'=>array(),
            'negengagement'=>array(),
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
        $countForQuery=0;
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
            
            array_push($whereCondArray, "ad.ad_time BETWEEN '$time_range_from' AND '$time_range_to'");
                      
            $whereCond = implode(" AND ", $whereCondArray);               
            
           //aadi
            //if($countForQuery==0){
            $adValenceQuery = "SELECT ";
            
            if(in_array("valence", $chkArray)){
                $adValenceQuery=$adValenceQuery."AVG(ad.ad_valence) as 'avg_valence',";
            }
            if(in_array("emotion", $chkArray)){
                $adValenceQuery=$adValenceQuery."AVG(ad.ad_happy) as 'avg_happy',
                                                 AVG(ad.ad_sad) as 'avg_sad',
                                                 AVG(ad.ad_neutral) as 'avg_neutral',
                                                 AVG(ad.ad_angry) as 'avg_angry',
                                                 AVG(ad.ad_suprised) as 'avg_surprised',
                                                 AVG(ad.ad_disgusted) as 'avg_disgusted',
                                                 AVG(ad.ad_scared) as 'avg_scared',";
            }
            if(in_array("attention", $chkArray)){
                $adValenceQuery=$adValenceQuery."AVG(ad.ad_engagement) as 'avg_engagement',";
            }
            //$adValenceQuery=  rtrim($adValenceQuery,",");
            $adValenceQuery=$adValenceQuery."ad.ad_dominant_emotion as 'peak_emotion',
                                             ad.ad_id
                                             FROM analysis_detail ad
                                             JOIN analysis_results ar ON ad.ad_ar_id = ar.ar_id
                                             JOIN content_feedback cf ON ar.ar_cf_id = cf.cf_id
                                             WHERE $whereCond  and ar.ar_id in (".$Ids_string.")";
           
            //$countForQuery++;
            //echo $adValenceQuery;
            
            //}
            //aadi
            
            
            // for getting average emotion values
            $adValenceResource = mysql_query($adValenceQuery);
            $adValenceSchema = mysql_fetch_assoc($adValenceResource);
            $compareEmotionArray_overall = array();
            
            $adValenceVal = (isset($adValenceSchema['avg_valence']) && $adValenceSchema['avg_valence'] != "") ? $adValenceSchema['avg_valence'] : null;
            $adEngagementVal = (isset($adValenceSchema['avg_engagement']) && $adValenceSchema['avg_engagement'] != "") ? $adValenceSchema['avg_engagement'] : null;
            $adHappyVal = (isset($adValenceSchema['avg_happy']) && $adValenceSchema['avg_happy'] != "") ? $adValenceSchema['avg_happy'] : null;
            $adSadVal = (isset($adValenceSchema['avg_sad']) && $adValenceSchema['avg_sad'] != "") ? $adValenceSchema['avg_sad'] : null;
            $adAngryVal = (isset($adValenceSchema['avg_angry']) && $adValenceSchema['avg_angry'] != "") ? $adValenceSchema['avg_angry'] : null;
            $adSurprisedVal = (isset($adValenceSchema['avg_surprised']) && $adValenceSchema['avg_surprised'] != "") ? $adValenceSchema['avg_surprised'] : null;
            $adDisgustedVal = (isset($adValenceSchema['avg_disgusted']) && $adValenceSchema['avg_disgusted'] != "") ? $adValenceSchema['avg_disgusted'] : null;
            $adScaredVal = (isset($adValenceSchema['avg_scared']) && $adValenceSchema['avg_scared'] != "") ? $adValenceSchema['avg_scared'] : null;
            $adNeutralVal = (isset($adValenceSchema['avg_neutral']) && $adValenceSchema['avg_neutral'] != "") ? $adValenceSchema['avg_neutral'] : null;

            // $adPeakEmotion = (isset($adValenceSchema['peak_emotion']) && $adValenceSchema['peak_emotion']!="") ? $adValenceSchema['peak_emotion'] : "Neutral";

            $adPeakId = (isset($adValenceSchema['ad_id']) && $adValenceSchema['ad_id'] != "") ? $adValenceSchema['ad_id'] : null;

            // create an array of emotions, valence and engagement
            /*array_push($commonEmotionsSmileyArray['valence'], $adValenceVal);
            array_push($commonEmotionsSmileyArray['engagement'], $adEngagementVal);
            array_push($commonEmotionsSmileyArray['happy'], $adHappyVal);
            array_push($commonEmotionsSmileyArray['sad'], $adSadVal);
            array_push($commonEmotionsSmileyArray['neutral'], $adNeutralVal);
            array_push($commonEmotionsSmileyArray['angry'], $adAngryVal);
            array_push($commonEmotionsSmileyArray['surprised'], $adSurprisedVal);
            array_push($commonEmotionsSmileyArray['disgusted'], $adDisgustedVal);
            array_push($commonEmotionsSmileyArray['scared'], $adScaredVal);           
            */
            $comparingArray_overall = array(
                'Neutral' => (float)$adNeutralVal,
                'Happy' => (float)$adHappyVal,
                'Sad' => (float)$adSadVal,
                'Angry' => (float)$adAngryVal,
                'Surprised' => (float)$adSurprisedVal,
                'Disgusted' => (float)$adDisgustedVal,
                'Scared' => number_format($adScaredVal, 10)*100000
            );
            $temp= array_keys($comparingArray,max($comparingArray));
            $max_value = $temp[0];
            $max_value = ucfirst($max_value);
            if ($adEngagementVal != null || $adValenceVal != null || $adHappyVal != null) // checking if the result set of the adValenceQuery is not null, if null then don't include 0's in the array // vivek verma
            array_push($adValenceArray_overall, 
                    array('time_range'=>$time_range_from,
                          'i'=>($i-$minTimeValue+0.5),
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
        //Vivek Verma
            $valenceintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_valence'),$maxTimeValue-$minTimeValue,0,0);         
            $engagementintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_engagement'),$maxTimeValue-$minTimeValue,0,0);         
            $happyintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_happy'),$maxTimeValue-$minTimeValue,0,0);         
            $sadintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_sad'),$maxTimeValue-$minTimeValue,0,0);         
            $angryintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_angry'),$maxTimeValue-$minTimeValue,0,0);         
            $surprisedintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_surprised'),$maxTimeValue-$minTimeValue,0,0);         
            $disgustedintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_disgusted'),$maxTimeValue-$minTimeValue,0,0);         
            $scaredintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_scared'),$maxTimeValue-$minTimeValue,0,0);         
            $neutralintegral = integral(array_column($adValenceArray_overall,'i'),array_column($adValenceArray_overall,'avg_neutral'),$maxTimeValue-$minTimeValue,0,0);         
            
            // create an array of emotions, valence and engagement
            array_push($commonEmotionsSmileyArray_overall['posvalence'], $valenceintegral[0]);
            array_push($commonEmotionsSmileyArray_overall['negvalence'], $valenceintegral[1]);
            array_push($commonEmotionsSmileyArray_overall['posengagement'], $engagementintegral[0]);
            array_push($commonEmotionsSmileyArray_overall['negengagement'], $engagementintegral[1]);
            array_push($commonEmotionsSmileyArray_overall['happy'], $happyintegral[2]);
            array_push($commonEmotionsSmileyArray_overall['sad'], $sadintegral[2]);
            array_push($commonEmotionsSmileyArray_overall['neutral'], $neutralintegral[2]);
            array_push($commonEmotionsSmileyArray_overall['angry'], $angryintegral[2]);
            array_push($commonEmotionsSmileyArray_overall['surprised'], $surprisedintegral[2]);
            array_push($commonEmotionsSmileyArray_overall['disgusted'], $disgustedintegral[2]);
            array_push($commonEmotionsSmileyArray_overall['scared'], $scaredintegral[2]);           
            //echo"<pre>";print_r(array_values($commonEmotionsSmileyArray));echo"</pre>";
        
        // make an array of ad_valence values with their time values        
        $ar_ids = implode(',',$ary);
	if(!$ar_ids)$ar_ids=0;
        
	if($vd[cf_date]!=0)
		$vd[cf_date]=date("M d,Y",$vd[cf_date]);
	else
		$vd[cf_date]="-";
        
        
        
        $smarty->assign(array(
                               
                                "valence_data_array_overall"=>json_encode($adValenceArray_overall),
                                "smileys_count_array_overall"=>json_encode($commonEmotionsSmileyArray_overall),
                                //"attention_data_array"=>json_encode($attention_graph_data),
                                
                                "ad_time"=>$time,
                                "compare_option"=>$compare_option,
                              
                                'cf_date'=>"",
                                "avg_ad_time"=>$avg_time,
                                "category1"=>$c1,
                                "country1"=>$ct1,
                                "gender1"=>$g1,
                                "category2"=>$c2,
                                "country2"=>$ct2,
                                "gender2"=>$g2,
            ));
$smarty->display('compare_results.tpl');
    
    
}


?> 
