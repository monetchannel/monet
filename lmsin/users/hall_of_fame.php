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
    
    $emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted");//NOTE:'vad_sacred' needs to be changed to 'vad_scared' in DB
    $images = array("neutral" => "", "happy" => "", "sad" => "", "angry" => "", "suprised" => "", "scared" => "", "disgusted" => "");
    
    for ($i = 0; $i < count($emotions); $i++) {
        $images[$emotions[$i]] = get_image_for_emotion($emotions[$i], "CURRENT");//store image to $images under the proper key
    }
    
    $smarty->assign(array("images"=>$images, "UserId"=>$_COOKIE[UserId], "emotions"=>$emotions, "scope"=>"CURRENT"));//assing values to template
    $smarty->display("hall_of_fame.tpl");//display template
}

function all_users(){
    $smarty = new Smarty();
    
    $emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted");//NOTE:'vad_sacred' needs to be changed to 'vad_scared' in DB
    $images = array("neutral" => "", "happy" => "", "sad" => "", "angry" => "", "suprised" => "", "scared" => "", "disgusted" => "");
    
    for ($i = 0; $i < count($emotions); $i++) {
        $images[$emotions[$i]] = get_image_for_emotion($emotions[$i], "ALL");//store image to $images under the proper key
    }
 
    $smarty->assign(array("images"=>$images,
                          "emotions"=>$emotions,
                          "scope"=>"ALL"
                         ));
    $smarty->display("hall_of_fame.tpl");//display template
}

function get_image_for_emotion($emotion, $scope){
    //retrieves image file from DB that has the highest value for specified emtion ($emotion)
    //$scope defines whether search should be performed for all users or for current user 
    //possible values are "CURRENT" and "ALL"
    
    global $Server_Upload_Path;
    
    if (strtoupper($scope) == "ALL"){//for all users
        $ad_emotion = "ad_".$emotion;
        //below sql gets the row with the highest value for $emotion
        $filter_SQL = "(SELECT * FROM analysis_detail WHERE ad_id>365880) AS filtered_ad";//we only want files we have
        $image_request_SQL = "SELECT ad_id FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM $filter_SQL)";
        eq($image_request_SQL, $image_row);
        $data=mfa($image_row);
        $image_name = $data[ad_id].".jpg";
        $image_name = "../../uploads/".$image_name;//add upload path to beginning
    }
    
    else if (strtoupper($scope) == "CURRENT"){//current user only
        //get content feedback ids for currrent user
        $user_id = $_COOKIE['UserId'];
        $get_cf_ids_SQL = "SELECT * FROM content_feedback WHERE cf_user_id=$user_id";
        eq($get_cf_ids_SQL, $cf_ids_resource);
        $cf_ids = array();
        while($row = mysql_fetch_array($cf_ids_resource, MYSQL_ASSOC)){//while there are more rows
            array_push($cf_ids, $row["cf_id"]);
        }
        //get ar_ids for currrent user
        $ar_ids = array();
        for ($j = 0; $j < sizeof($cf_ids); $j++){
            $cf_id = $cf_ids[$j];
            $get_ar_id_SQL = "SELECT ar_id FROM analysis_results WHERE ar_cf_id=$cf_id";
            eq($get_ar_id_SQL, $ar_id_row);//get the row
            $data=mfa($ar_id_row);
            $ar_id = "'".$data["ar_id"]."'";//extract ar_id
            if ($ar_id !== "''"){//input check
                array_push($ar_ids, $ar_id);
            }
        }
        
        $ad_emotion = "ad_".$emotion;//get current emotion
        $filter_SQL = "(SELECT * FROM analysis_detail WHERE ad_id>365880) AS filtered_ad";//filter to files we have locally
        //format for use in IN caluse
        $formatted_ar_ids = implode(",",$ar_ids);
        $formatted_ar_ids = "(".$formatted_ar_ids.")";
        if ($formatted_ar_ids != "()"){//no images selected
            $image_request_SQL = "SELECT ad_id FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM $filter_SQL WHERE ad_ar_id IN $formatted_ar_ids)";
            eq($image_request_SQL, $image_row);
            $datas=mfa($image_row);
            $image_name = "../../uploads/".$datas["ad_id"].".jpg";//prepend directory, append file extension
        }else {
            $image_name = "lmsin/user/images/".$emotion.".jpg";//stock images
            echo "You have not yet rated any videos.";
        }
    }
    return $image_name;
}         