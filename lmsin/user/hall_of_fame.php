<?php
//setup
include("../includes/common.php");
include("account_setting.php");
init();

$func_ary = array("current_user", "all_users");//possible functions

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]();
   die();
}else {current_user();}//default to current user

function current_user(){
    $smarty = new Smarty;
    $user_id = $_COOKIE['UserId'];
    $user_data= array();
	$emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted");//NOTE:'vad_sacred' needs to be changed to 'vad_scared' in DB
    $images = array("neutral" => "", "happy" => "", "sad" => "", "angry" => "", "suprised" => "", "scared" => "", "disgusted" => "");
    
	$SQL= "SELECT * FROM `uploads` WHERE up_s_type='user_profile_photo' and up_s_id='$user_id'";
	eq($SQL, $upload_row);
    $upload_row = mfa($upload_row);
	$user_data['up_fname']= $upload_row['up_fname'];
	$userimage= "../../uploads/thumb_".$upload_row['up_fname'];
	
	$user_SQL= "SELECT user_fname, user_lname, user_country FROM users WHERE user_id='$user_id'";
    eq($user_SQL, $name_row);
    $name_row = mfa($name_row);
    $name = $name_row['user_fname']." ".$name_row['user_lname'];
	$countries_id= $name_row['user_country'];
	$user_data['name'] = $name['name'];
	
    $country_SQL= "SELECT countries_name FROM `countries` WHERE countries_id=$countries_id";
    eq($country_SQL, $name_row);
    $name_row = mfa($name_row);
    $name = $name_row['countries_name'];
	//$user_data['countries_name'] = $name['countries_name'];
	
    for ($i = 0; $i < count($emotions); $i++) {
        $images[$emotions[$i]] = get_image_and_data_for_emotion($emotions[$i], "CURRENT");//store image to $images under the proper key
    }
    
    $smarty->assign(array("images"=>$images,
						  "UserId"=>$_COOKIE[UserId], 
						  "emotions"=>$emotions, 
						  "userimage"=>$userimage, 
						  "user_data"=>$user_data, 
						  "scope"=>"CURRENT", 
						  "fame_tab"=>'fame-selected', 
						  "active_current_user_tab"=>'label'
						));//assing values to template
    $smarty->display("hall_of_fame.tpl");//display template
}

function all_users(){
    $smarty = new Smarty();
    
    $emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted");//NOTE:'vad_sacred' needs to be changed to 'vad_scared' in DB
    $images = array("neutral" => "", "happy" => "", "sad" => "", "angry" => "", "suprised" => "", "scared" => "", "disgusted" => "");
    
	$user_id = $_COOKIE['UserId'];
	$SQL= "SELECT * FROM `uploads` WHERE up_s_type='user_profile_photo' and up_s_id='$user_id'";
	eq($SQL, $upload_row);
    $upload_row = mfa($upload_row);
	$user_data['up_fname']= $upload_row['up_fname'];
	$userimage= "../../uploads/thumb_".$upload_row['up_fname'];
	
	$user_SQL= "SELECT user_fname, user_lname, user_country FROM users WHERE user_id='$user_id'";
    eq($user_SQL, $name_row);
    $name_row = mfa($name_row);
    $name = $name_row['user_fname']." ".$name_row['user_lname'];
	$countries_id= $name_row['user_country'];
	$user_data['name'] = $name['name'];
	
    $country_SQL= "SELECT countries_name FROM `countries` WHERE countries_id=$countries_id";
    eq($country_SQL, $name_row);
    $name_row = mfa($name_row);
    $name = $name_row['countries_name'];
	//$user_data['countries_name'] = $name['countries_name'];
	
	
    for ($i = 0; $i < count($emotions); $i++) {
        $images[$emotions[$i]] = get_image_and_data_for_emotion($emotions[$i], "ALL");//store image to $images under the proper key
    }
 
    $smarty->assign(array("images"=>$images,
                          "emotions"=>$emotions,
                          "userimage"=>$userimage, 
						  "user_data"=>$user_data, 
						  "scope"=>"ALL",
                          "fame_tab" =>'fame-selected', 
                          "active_overall_user_tab" =>'label'
                         ));
    $smarty->display("hall_of_fame.tpl");//display template
}
function get_image_and_data_for_emotion($emotion, $scope){
    //retrieves image file from DB that has the highest value for specified emtion ($emotion)
    //$scope defines whether search should be performed for all users or for current user 
    //possible values are "CURRENT" and "ALL"
    
    global $Server_Upload_Path;
    $ad_emotion = "ad_".$emotion;
    if (strtoupper($scope) == "ALL"){//for all users
       
        //below sql gets the row with the highest value for $emotion
		$image_request_SQL = "SELECT * FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM analysis_detail)";
        eq($image_request_SQL, $image_row);
        $data=mfa($image_row);
        $ad_id = $data["ad_id"];//store ad_id
        
		$image_name = $ad_id.".jpg";
        $image_name = "../../uploads/".$image_name;//add upload path to beginning
        $image_chart_data = scale_value_for_chart($data[$ad_emotion]);
    }
    else if (strtoupper($scope) == "CURRENT"){//current user only
        //get content feedback ids for currrent user
        $user_id = $_COOKIE['UserId'];
        
		$image_request_SQL ="Select * from `analysis_detail` where $ad_emotion=(Select MAX($ad_emotion) FROM  `analysis_detail` WHERE ad_ar_id IN (SELECT ar_id FROM  `analysis_results` WHERE ar_cf_id IN (SELECT cf_id FROM  `content_feedback` WHERE cf_user_id =$user_id)))";
		eq($image_request_SQL, $image_row);
        $data = mfa($image_row);
        $ad_id = $data["ad_id"];
        $ad_value = $data[$ad_emotion];
        $image_name = "../../uploads/".$ad_id.".jpg";//prepend directory, append file extension
        $image_chart_data = scale_value_for_chart($ad_value);//turn values into something visible to user
       // }else {
        //    $image_name = "images/".$emotion.".jpg";//stock images
        //    echo "You have not yet rated any videos.";
        //}
    }
    return array("image_path"=>$image_name, "value"=>$image_chart_data);
}

function scale_value_for_chart($value){
	$val=($value * 10);
    $chart_value = round($val, 2);
    if ($chart_value < 0.09){
        $chart_value = 0; 
	}
    return $chart_value;
}
?>