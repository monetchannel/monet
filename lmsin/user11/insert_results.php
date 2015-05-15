<?php
    include("../includes/common.php");
    init();

    $SQL="CREATE TABLE IF NOT EXISTS `engagement_valence_overall` (
	  `evo_id` int(11) NOT NULL AUTO_INCREMENT,
	  `evo_c_id` int(11) NOT NULL,
	  `evo_time` int(11) NOT NULL,
	  `evo_avg_eng` double NOT NULL,
	  `evo_avg_val` double NOT NULL,
	  `evo_users` int(11) NOT NULL,
	  `evo_last_time` int(11) NOT NULL,
	  `evo_last_eng` double NOT NULL,
	  `evo_last_val` double NOT NULL,
	  PRIMARY KEY (`evo_id`)
	)";
 	mysql_query($SQL) or die(mysql_errno());
	$json_str = $_POST['text'];
	$evo_c_id= $_POST['c_id'];
 	$time = $_POST['time'];
 	$duration = $_POST['duration']-1;
 	$temp = explode(":",$time);

 	$totalseconds = ((int)$temp[0])*3600+((int)$temp[1])*60+((float)$temp[2]); 
 	$evo_last_time = ((int)$temp[0])*3600+((int)$temp[1])*60+((int)$temp[2]);
 	$timestamp = substr($_POST['timestamp'],0,-3);
 	$file = $_POST['user'];
 	$cf_id = $_POST['cf_id'];
 	$json_str = stripslashes($json_str);
    $json = json_decode($json_str,true);
	
    $expressions = $json['Faces'];
    $previous_facebox=$json['previous_facebox'];
 	//echo $json;
 	if($expressions !=null)									//complete json is null
 	{
	    $expressions = $expressions[0];
 		if($expressions!=null)								//null in Faces
 		{
 			$valence=0;
	 		$facial = $expressions['FacialExpression']; 
 			if($facial != null)								//null in FacialExpression
 			{
 				$valid_model=1;
	 			$max=-1;
	 			$maxneg=-1;
	 			foreach($facial as $key=>$val)
	 			{
	 				if($val>$max)
	 				{
	 					$max = $val;
	 					$index = $key;
	 				}
	 				if($key == 'Sad' || $key=='Disgusted' || $key =='Angry')
	 				{
	 					if($val > $maxneg)
	 						$maxneg=$val;
	 				}
	 			}
				
	 			$SQL = "SELECT cf_c_id from content_feedback where cf_id=$cf_id";
	 			$SQL=mysql_query($SQL) or die(mysql_errno());
	 			while($row=mfa($SQL))
	 				$c_id= $row[cf_c_id];
	 			$SQL = "SELECT ar_id from analysis_results where ar_cf_id = $cf_id";
			 	$SQL = mysql_query($SQL) or die(mysql_errno());
			 	
			 	$count =0;
			 	while($row = mysql_fetch_array($SQL))
			 	{
			 		$count++;
			 		$SQL1= "INSERT into analysis_detail (ad_ar_id,ad_time,ad_neutral,ad_happy,ad_sad,ad_angry,ad_suprised,ad_scared,ad_disgusted,ad_dominant_emotion, ad_valence, ad_gender,ad_age,ad_glasses,ad_moustache) VALUES ($row[ar_id], '$time', $facial[Neutral], $facial[Happy], $facial[Sad],$facial[Angry],$facial[Surprised],$facial[Scared],$facial[Disgusted],'$index',$facial[Happy]-$maxneg,'$expressions[Gender]','$expressions[Age]','$expressions[Glasses]','$expressions[Moustache]')";
			 		$ids = ei($SQL1);
			
			 		$SQL1 = "SELECT ad_dominant_emotion, MAX( count ) FROM ( SELECT ad_dominant_emotion, COUNT( ad_dominant_emotion ) AS count FROM analysis_detail WHERE ad_ar_id = $row[ar_id] GROUP BY ad_dominant_emotion ORDER BY count DESC)t2"; 
			 		$SQL1 = mysql_query($SQL1) or die (mysql_errno());
			 		$max = mysql_fetch_array($SQL1);
			 		$dominant = $max['ad_dominant_emotion'];
			 		$SQL1 = "INSERT into analysis_results_average (ara_c_id,ara_time,ara_valence) VALUES($c_id,$totalseconds,$facial[Happy]-$maxneg)";
			 		mysql_query($SQL1) or die(mysql_errno());
			 		$SQL1 = "UPDATE analysis_results SET ar_dominant_emoton = '$dominant' where ar_id = $row[ar_id]";
			 		mysql_query($SQL1) or die (mysql_errno());
			 		$valence=$facial[Happy]-$maxneg;
			 	}
			 	if($count==0)
			 	{
			 		$SQL1 = "INSERT into analysis_results (ar_date,ar_cf_id,ar_dominant_emoton,ar_viewed) VALUES('$timestamp',$cf_id,'$index',1)";
			 		$ids = ei($SQL1);
			 		$SQL1= "INSERT into analysis_detail (ad_ar_id,ad_time,ad_neutral,ad_happy,ad_sad,ad_angry,ad_suprised,ad_scared,ad_disgusted,ad_dominant_emotion,ad_valence,ad_gender,ad_age,ad_glasses,ad_moustache) VALUES($ids,'$time',$facial[Neutral],$facial[Happy],$facial[Sad],$facial[Angry],$facial[Surprised],$facial[Scared],$facial[Disgusted],'$index',$facial[Happy]-$maxneg,'$expressions[Gender]','$expressions[Age]','$expressions[Glasses]','$expressions[Moustache]')";
					$ids = ei($SQL1);
					$SQL1 = "INSERT into analysis_results_average (ara_c_id,ara_time,ara_valence) VALUES($c_id,$totalseconds,$facial[Happy]-$maxneg)";
			 		mysql_query($SQL1) or die(mysql_errno());
			 		$valence=$facial[Happy]-$maxneg;
			 	}

			 	$pic = $ids.'.jpg';

			 	$file = '../../uploads/'.$pic;	//following line sends the image from test folder to upload folder
				file_put_contents($file,file_get_contents('data://'.substr($_POST['myImage'],5)));

			 	$SQL= "INSERT into video_analysis_data (vad_vd_id, vad_img_name, vad_json_data, vad_valid_model, vad_gender, vad_age, vad_beared, vad_neutral, vad_happy, vad_sad, vad_angry, vad_surprised, vad_sacred, vad_disgusted) VALUES (1, '$pic', '$json_str', $valid_model, '$expressions[Gender]', '$expressions[Age]', '$expressions[Beard]', $facial[Neutral], $facial[Happy], $facial[Sad], $facial[Angry], $facial[Surprised], $facial[Scared], $facial[Disgusted])";
	 			mysql_query($SQL) or die(mysql_errno());
			}
			else{
				$valid_model=0;	
			}
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
 				$faceBox=$x1-$x;							// difference in X(of Centroid)
				$faceBox=$faceBox/150;
				if($faceBox<0) $faceBox=-$faceBox;

				$engagement=$eye*(1-$head)*(1-$faceBox)*2-1;
				if($engagement>1) $engagement=1;
				if($engagement<-1) $engagement=-1;
 			}

 			$SQL = "SELECT evo_c_id from engagement_valence_overall where evo_c_id=$evo_c_id";
 			$SQL=mysql_query($SQL) or die(mysql_errno());
 			$counts = 0;
	 		while($row=mfa($SQL))
	 			$counts++;
	 		if($counts==0){                                        // The video doesn't exist with evo_c_id=$evo_c_id in the table
	 			for($i=0;$i<=$duration;$i++){
	 				$SQL = "INSERT into engagement_valence_overall (evo_c_id, evo_time, evo_avg_eng, evo_avg_val, evo_users, evo_last_time, evo_last_eng, evo_last_val) VALUES ($evo_c_id,$i,$engagement,$valence,1,$evo_last_time,$engagement,$valence)";
	 				mysql_query($SQL) or die(mysql_errno());
	 			}
	 		}
	 		else{
	 			$SQL = "SELECT * from engagement_valence_overall where evo_c_id=$evo_c_id";
	 			$SQL = mysql_query($SQL);
	 			while($row=mfa($SQL)){
	 				$e_time=$row[evo_last_time];
	 				$e_users=$row[evo_users];
	 				$e_lval=$row[evo_last_val];
	 				$e_leng=$row[evo_last_eng];
	 				if($e_time==$row[evo_time]){
	 					$e_val=$row[evo_avg_val];       
	 					$e_eng=$row[evo_avg_eng];       
	 				}
	 			}
 				if($count==0){                  // Its the first entry for this instance of the user.
 					$e_val=($e_val*$e_users+$valence)/($e_users+1);
 					$e_eng=($e_eng*$e_users+$engagement)/($e_users+1);
 					$SQL = "UPDATE engagement_valence_overall SET evo_last_time=$evo_last_time,evo_users=$e_users+1,evo_last_val=$valence,evo_last_eng=$engagement";
 					mysql_query($SQL) or die(mysql_errno());
 					for($i=0;$i<=$duration;$i++){
		 				$SQL = "UPDATE engagement_valence_overall SET evo_avg_eng=$e_eng,evo_avg_val=$e_val where evo_time=$i";
		 				mysql_query($SQL) or die(mysql_errno());
		 			}
 				}
 				else{
 					$SQL = "UPDATE engagement_valence_overall SET evo_last_time=$evo_last_time,evo_last_val=$valence,evo_last_eng=$engagement";
 					mysql_query($SQL) or die(mysql_errno());
 					for($i=$e_time;$i<=$evo_last_time;$i++){
 						$eval_diff=($valence-$e_lval)*($i-$e_time)/($evo_last_time-$e_time);
 						$e_val1=($e_val*$e_users+$eval_diff)/$e_users;
 						$eeng_diff=($engagement-$e_leng)*($i-$e_time)/($evo_last_time-$e_time);
 						$e_eng1=($e_eng*$e_users+$eeng_diff)/$e_users;
		 				$SQL = "UPDATE engagement_valence_overall SET evo_avg_eng=$e_eng1,evo_avg_val=$e_val1 where evo_time=$i";
		 				mysql_query($SQL) or die(mysql_errno());
		 			}
		 			for($i=$evo_last_time+1;$i<=$duration;$i++){
		 				$eval_diff=$valence-$e_lval;
 						$e_val1=($e_val*$e_users+$eval_diff)/$e_users;
 						$eeng_diff=$engagement-$e_leng;
 						$e_eng1=($e_eng*$e_users+$eeng_diff)/$e_users;
 						$SQL = "UPDATE engagement_valence_overall SET evo_last_time=$evo_last_time,evo_last_val=$valence,evo_last_eng=$engagement,evo_avg_eng=$e_eng1,evo_avg_val=$e_val1 where evo_time=$i";
		 				mysql_query($SQL) or die(mysql_errno());
		 			}
 				}
	 		}
 		}
 		else
 			$valid_model=0;
 	}
 	else
 		$valid_model=0;
 	if($valid_model==0)
 	{
 		$no_image='no_image_'.$cf_id;
 		$SQL = "INSERT into video_analysis_data (vad_vd_id,vad_img_name,vad_json_data,vad_valid_model) VALUES(1,'$no_image','$json_str',$valid_model)";
 		mysql_query($SQL) or die(mysql_errno());
 	} 	
?>	