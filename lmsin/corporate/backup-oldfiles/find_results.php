<?php
	require_once('../includes/common.php');
	init();

	$cf_id = (int) $_POST['cf_id'];
	$c_id= (int) $_POST['c_id'];
	$SQL = "SELECT ar_id from analysis_results where ar_cf_id = $cf_id";
	$SQL = "SELECT ad_time, ad_happy, ad_neutral, ad_sad, ad_angry, ad_suprised, ad_disgusted, ad_scared, ad_id from analysis_detail where ad_ar_id in ($SQL) ORDER BY ad_time";
	eq($SQL,$res);
	$result = array();
	while($data = mfa($res))
	{
		array_push($result,array($data[ad_time],$data[ad_neutral],$data[ad_happy],$data[ad_sad],$data[ad_angry],$data[ad_suprised],$data[ad_scared],$data[ad_disgusted],$data[ad_id]));
	}
	$res1=json_encode($result);
	
	$SQL = "SELECT * from analysis_detail inner join (SELECT ar_id from analysis_results inner join content_feedback where ar_cf_id = cf_id and cf_c_id = $c_id) t where t.ar_id=analysis_detail.ad_ar_id";
	eq($SQL,$res2);
	//$result=  [[0,0,0],[0,0,0],[0,0,0],[0,0,0],[0,0,0],[0,0,0],[0,0,0]];
	$result = array(array(0,0,0),array(0,0,0),array(0,0,0),array(0,0,0),array(0,0,0),array(0,0,0),array(0,0,0));
	while($row=mfa($res2))
	{
		if($row[ad_neutral]>$result[0][1])
		{
			$result[0][1]=$row[ad_neutral];
			$result[0][0]=$row[ad_time];
			$result[0][2]=$row[ad_id];
			$result[0][3]=0;
		}
		if($row[ad_happy]>$result[1][1])
		{
			$result[1][1]=$row[ad_happy];
			$result[1][0]=$row[ad_time];
			$result[1][2]=$row[ad_id];
			$result[1][3]=1;
		}
		if($row[ad_sad]>$result[2][1])
		{
			$result[2][1]=$row[ad_sad];
			$result[2][0]=$row[ad_time];
			$result[2][2]=$row[ad_id];
			$result[2][3]=2;
		}
		if($row[ad_angry]>$result[3][1])
		{
			$result[3][1]=$row[ad_angry];
			$result[3][0]=$row[ad_time];
			$result[3][2]=$row[ad_id];
			$result[3][3]=3;
		}
		if($row[ad_suprised]>$result[4][1])
		{
			$result[4][1]=$row[ad_suprised];
			$result[4][0]=$row[ad_time];
			$result[4][2]=$row[ad_id];
			$result[4][3]=4;
		}
		if($row[ad_scared]>$result[5][1])
		{
			$result[5][1]=$row[ad_scared];
			$result[5][0]=$row[ad_time];
			$result[5][2]=$row[ad_id];
			$result[5][3]=5;
		}
		if($row[ad_disgusted]>$result[6][1])
		{
			$result[6][1]=$row[ad_disgusted];
			$result[6][0]=$row[ad_time];
			$result[6][2]=$row[ad_id];
			$result[6][3]=6;
		}
	}
	$res3=json_encode($result);

	$no_image='no_image_'.$cf_id;
	$SQL = "SELECT vad_json_data from video_analysis_data where vad_img_name = '$no_image'";
	eq($SQL,$res4);
	$result=array();
	while($data = mfa($res4))
	{
		$json = json_decode($data[vad_json_data],true);
		$time = $json['Time'];
		$expressions = $json['Faces'];
		if($expressions !=null)									//complete json is null
	 	{
		    $expressions = $expressions[0];
	 		if($expressions!=null)								//null in Faces
	 		{	
	 			$eye=0.25;
	 			$head=0;
	 			$valid_model=1;	
	 			$x=0;
	 			$y=0;
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
	 		}
	 		else
	 		{
	 			$valid_model=0;	
	 		}
	 	}
	 	else
	 	{
	 		$valid_model=0;	
	 	}
	 	if($valid_model==0){
	 		$eye=0;
	 		$head=1;
	 		$x=-1;
	 		$y=-1;
	 	}
	 	$valence=0;
	 	array_push($result,array($time,$eye,$head,$x,$y,$valence));
	}
	$SQL = "SELECT ar_id from analysis_results where ar_cf_id = $cf_id";
	$SQL = "SELECT vad_json_data,ad_valence from video_analysis_data inner join (SELECT ad_id, ad_valence from analysis_detail where ad_ar_id in ($SQL))t1 ON video_analysis_data.vad_img_name = concat(t1.ad_id,'.jpg')";
	eq($SQL,$res5);
	while($data = mfa($res5))
	{
		$json = json_decode($data[vad_json_data],true);
		$time = $json['Time'];
		$expressions = $json['Faces'][0];
		$eye=0.25;
		$head=0;
		$x=0;
		$y=0;
		$valence=$data[ad_valence];
		if($expressions['StateOfLeftEye']=='Open')
			$eye=$eye+0.5;
		if($expressions['StateOfRightEye']=='Open')
			$eye=$eye+0.5;
		if($eye>1) $eye=1;
		for($i = 0; $i<3; $i++)
			$head=$head + $expressions['HeadOrientation'][$i]*$expressions['HeadOrientation'][$i];
		$head=$head/3;
		for($i = 0; $i<4; $i++){
			$x=$x+$expressions['FaceBoxCorners'][$i]['X'];
			$y=$y+$expressions['FaceBoxCorners'][$i]['Y'];
		}
		$x=$x/4;
		$y=$y/4;
		array_push($result,array($time,$eye,$head,$x,$y,$valence));
	}
	$res6=json_encode($result);

	$SQL = "SELECT ad_gender,count(*) as number FROM (SELECT ad_gender FROM (SELECT ar_cf_id,ad_gender,count(*) as number from analysis_detail inner join (SELECT ar_id, ar_cf_id from analysis_results inner join content_feedback where ar_cf_id = cf_id and cf_c_id = $c_id) t where t.ar_id=analysis_detail.ad_ar_id group by ar_cf_id,ad_gender order by number desc) as u group by ar_cf_id) as v group by ad_gender";
	eq($SQL,$res7);
	$result=array("male"=>0,"female"=>0);
	while($row = mfa($res7))
	{
		if($row[ad_gender]=="Male") {
			$result["male"]=$row[number];
		}
		else if($row[ad_gender]=="Female") {
			$result["female"]=$row[number];
		}
	}
	$res8=json_encode(array($result["male"],$result["female"]));

	$SQL = "SELECT AVG( ad_neutral ) as ad_neutral , AVG( ad_happy ) as ad_happy , AVG( ad_sad ) as ad_sad, AVG( ad_angry ) as ad_angry, AVG( ad_suprised ) as ad_suprised, AVG( ad_scared ) as ad_scared , AVG( ad_disgusted ) as ad_disgusted FROM analysis_detail INNER JOIN (SELECT ar_id FROM analysis_results INNER JOIN (SELECT cf_id FROM content_feedback WHERE cf_user_id IN (SELECT cf_user_id FROM content_feedback WHERE cf_id =".$cf_id."))t1 ON ar_cf_id = t1.cf_id)t2 ON ad_ar_id = t2.ar_id";
	eq($SQL,$res9);                  // for all videos watched by this particular user.
	$result=array();
	while($data = mfa($res9))
	{
		array_push($result,array($data[ad_neutral],$data[ad_happy],$data[ad_sad],$data[ad_angry],$data[ad_suprised],$data[ad_scared],$data[ad_disgusted]));
	}

	$SQL = "SELECT MAX( ad_neutral ) as ad_neutral , MAX( ad_happy ) as ad_happy , MAX( ad_sad ) as ad_sad, MAX( ad_angry ) as ad_angry, MAX( ad_suprised ) as ad_suprised, MAX( ad_scared ) as ad_scared , MAX( ad_disgusted ) as ad_disgusted FROM analysis_detail INNER JOIN (SELECT ar_id FROM analysis_results INNER JOIN (SELECT cf_id FROM content_feedback WHERE cf_user_id IN (SELECT cf_user_id FROM content_feedback WHERE cf_id =".$cf_id."))t1 ON ar_cf_id = t1.cf_id)t2 ON ad_ar_id = t2.ar_id";
	eq($SQL,$res10);                  // for all videos watched by this particular user.
	while($data = mfa($res10))
	{
		array_push($result,array($data[ad_neutral],$data[ad_happy],$data[ad_sad],$data[ad_angry],$data[ad_suprised],$data[ad_scared],$data[ad_disgusted]));
	}

	$SQL = "SELECT MIN( ad_neutral ) as ad_neutral , MIN( ad_happy ) as ad_happy , MIN( ad_sad ) as ad_sad, MIN( ad_angry ) as ad_angry, MIN( ad_suprised ) as ad_suprised, MIN( ad_scared ) as ad_scared , MIN( ad_disgusted ) as ad_disgusted FROM analysis_detail INNER JOIN (SELECT ar_id FROM analysis_results INNER JOIN (SELECT cf_id FROM content_feedback WHERE cf_user_id IN (SELECT cf_user_id FROM content_feedback WHERE cf_id =".$cf_id."))t1 ON ar_cf_id = t1.cf_id)t2 ON ad_ar_id = t2.ar_id";
	eq($SQL,$res11);                   // for all videos watched by this particular user.
	while($data = mfa($res11))
	{
		array_push($result,array($data[ad_neutral],$data[ad_happy],$data[ad_sad],$data[ad_angry],$data[ad_suprised],$data[ad_scared],$data[ad_disgusted]));
	}

    // $SQL = "SELECT AVG( ad_neutral ) as ad_neutral , AVG( ad_happy ) as ad_happy , AVG( ad_sad ) as ad_sad, AVG( ad_angry ) as ad_angry, AVG( ad_suprised ) as ad_suprised, AVG( ad_scared ) as ad_scared , AVG( ad_disgusted ) as ad_disgusted FROM analysis_detail INNER JOIN (SELECT ar_id FROM analysis_results INNER JOIN (SELECT cf_id FROM content_feedback INNER JOIN (SELECT DISTINCT cf_c_id FROM content_feedback WHERE cf_user_id IN (SELECT cf_user_id FROM content_feedback WHERE cf_id =".$cf_id."))t1 ON content_feedback.cf_c_id = t1.cf_c_id WHERE cf_user_id NOT IN (SELECT cf_user_id FROM content_feedback WHERE cf_id =".$cf_id."))t2 ON analysis_results.ar_cf_id = t2.cf_id)t3 ON analysis_detail.ad_ar_id = t3.ar_id";
	// eq($SQL,$res10);
	// while($data = mfa($res10))
	// {
	// 	$result[0][0]=$result[0][0]-$data[ad_neutral];
	// 	$result[0][1]=$result[0][1]-$data[ad_happy];
	// 	$result[0][2]=$result[0][2]-$data[ad_sad];
	// 	$result[0][3]=$result[0][3]-$data[ad_angry];
	// 	$result[0][4]=$result[0][4]-$data[ad_suprised];
	// 	$result[0][5]=$result[0][5]-$data[ad_scared];
	// 	$result[0][6]=$result[0][6]-$data[ad_disgusted];
	// }

    $SQL = "SELECT AVG( ad_neutral ) as ad_neutral , AVG( ad_happy ) as ad_happy , AVG( ad_sad ) as ad_sad, AVG( ad_angry ) as ad_angry, AVG( ad_suprised ) as ad_suprised, AVG( ad_scared ) as ad_scared , AVG( ad_disgusted ) as ad_disgusted FROM analysis_detail INNER JOIN (SELECT ar_id FROM analysis_results INNER JOIN (SELECT cf_id FROM content_feedback WHERE cf_c_id IN (SELECT cf_c_id FROM content_feedback WHERE cf_id =".$cf_id."))t2 ON analysis_results.ar_cf_id = t2.cf_id)t3 ON analysis_detail.ad_ar_id = t3.ar_id";
	eq($SQL,$res15);                   // for all users who watched this video and these averages are only for this video
	while($data = mfa($res15))
	{
		array_push($result,array($data[ad_neutral],$data[ad_happy],$data[ad_sad],$data[ad_angry],$data[ad_suprised],$data[ad_scared],$data[ad_disgusted]));
	}

	$SQL = "SELECT AVG( ad_neutral ) as ad_neutral , AVG( ad_happy ) as ad_happy , AVG( ad_sad ) as ad_sad, AVG( ad_angry ) as ad_angry, AVG( ad_suprised ) as ad_suprised, AVG( ad_scared ) as ad_scared , AVG( ad_disgusted ) as ad_disgusted FROM analysis_detail INNER JOIN (SELECT ar_id FROM analysis_results INNER JOIN (SELECT cf_id FROM content_feedback WHERE cf_c_id IN (SELECT cf_c_id FROM content_feedback WHERE cf_id =".$cf_id.") AND cf_user_id IN (SELECT cf_user_id FROM content_feedback WHERE cf_id =".$cf_id."))t2 ON analysis_results.ar_cf_id = t2.cf_id)t3 ON analysis_detail.ad_ar_id = t3.ar_id";
	eq($SQL,$res16);                   // for this particular user who watched this video and these averages are only for this video
	while($data = mfa($res16))
	{
		array_push($result,array($data[ad_neutral],$data[ad_happy],$data[ad_sad],$data[ad_angry],$data[ad_suprised],$data[ad_scared],$data[ad_disgusted]));
	}

	$res12=json_encode($result);

	$SQL = "SELECT * from engagement_valence_overall where evo_c_id=$c_id";
	eq($SQL,$res13);
	$result=array();
	while($data = mfa($res13))
	{
		array_push($result,array($data[evo_time],$data[evo_avg_eng],$data[evo_avg_val],$data[evo_avg_neutral],$data[evo_avg_happy],$data[evo_avg_sad],$data[evo_avg_angry],$data[evo_avg_suprised],$data[evo_avg_scared],$data[evo_avg_disgusted]));
	}
	$res14=json_encode($result);

	$SQL = "SELECT * FROM `emotion_average` WHERE 1";
	eq($SQL,$res17);
	$result=array();
	while($data = mfa($res17))
	{
		array_push($result,array($data[ea_id],$data[ea_neutral],$data[ea_happy],$data[ea_sad],$data[ea_angry],$data[ea_suprised],$data[ea_scared],$data[ea_disgusted]));
	}
	$res18=json_encode($result);

	//echo $count;
	echo "[".$res1.",".$res3.",".$res6.",".$res12.",".$res8.",".$res14.",".$res18."]";
	//echo "[".$res1.",".$res3."]";

?> 
