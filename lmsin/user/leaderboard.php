<?php
include("../includes/common.php");
init();
global $current_user_rank;
get_leaderboard_data();
function get_leaderboard_data(){
    /***
     * @return array[["rank"=>int,"name"=>string,"points"=>int],...]
     **/
    $board_data = array();
    //store all the results in order of descending total points
    $get_ordered_results_SQL = "SELECT rp_u_id, total_points_earned FROM reward_point ORDER BY total_points_earned DESC";
    eq($get_ordered_results_SQL, $ordered_results_resource);
//    $ordered_data = mfa($ordered_results_resource);
    $rank = 0; 
    while ($row = mfa($ordered_results_resource)){
        $current_row = array();
        //gather data
        $rank++;
        global $current_user_rank;
        if ($row['rp_u_id'] == $_COOKIE['UserId']){
            $current_user_rank = $rank;
        }
        $name = get_name_for_user_id($row['rp_u_id']);
        $points = $row['total_points_earned'];
        $get_profile_img_SQL = "SELECT user_profile_image FROM users WHERE user_id='{$row['rp_u_id']}'";
        eq($get_profile_img_SQL, $image_row);
        $image_row = mfa($image_row);
        $profile_img_path = $image_row['user_profile_image'];
        //assign and push
        $current_row['rank'] = $rank;
        $current_row['name'] = $name;
        $current_row['points'] = $points;
        $current_row['profile_img'] = $profile_img_path;
        array_push($board_data, $current_row);
    }
    //data related to cf_id
    $cf_id_data = get_last_cf_id($_COOKIE['UserId']);
    $radar_chart_data = get_radar_chart_from_cf_id($cf_id_data['id']);
    $smarty = new Smarty;
    $smarty->assign(["data"=>$board_data,
                     "rating_data"=>get_rating_leaderboard($cf_id_data['c_id']),
                     "user"=>get_current_user_info(),
                     "cf_data"=>$cf_id_data,
                     "radar_chart_data"=>$radar_chart_data,
                     "latest_reward"=>get_latest_reward_info($_COOKIE['UserId'])]);
    $smarty->display("leaderboard_debug.tpl");
    return $board_data;
}

function get_name_for_user_id($user_id){
    /***
     * @param int user_id for which to get name
     * @return string full name for given user_id
     */
    $get_name_SQL = "SELECT user_fname, user_lname FROM users WHERE user_id='$user_id'";
    eq($get_name_SQL, $name_row);
    $name_row = mfa($name_row);
    $name = $name_row['user_fname']." ".$name_row['user_lname'];
    return $name;
}
/***
 * Gets the current user's name, id, and profile image
 * @return $user_ary 
 */
function get_current_user_info(){
    $user_name = $_COOKIE['UserName'];
    $user_id = $_COOKIE['UserId'];
    $get_image_SQL = "SELECT user_profile_image FROM users WHERE user_id='$user_id'";
    eq($get_image_SQL, $image);
    $image = mfa($image)['user_profile_image'];
    $user_image = $image;
    
    //rank and points
    $get_ordered_results_SQL = "SELECT total_points_earned FROM reward_point WHERE rp_u_id='$user_id'";
    eq($get_ordered_results_SQL, $ordered_results_resource);
    $rp_info = mfa($ordered_results_resource);
    $user_points = $rp_info['total_points_earned'];
    global $current_user_rank;
    $user_ary = array("id"=>$user_id, "name"=>$user_name, "profile_image"=>$user_image, "points"=>$user_points, "rank"=>$current_user_rank);
    return $user_ary;
}

/***
 * Gets the latest cf_id for specified user, along with the content url, date, and comment of that cf_id
 * @param $user_id the user id for which to get the latest cf data
 * @return $formatted_cf_data  relevant data about the latest cf_id
 */
function get_last_cf_id($user_id){
    $get_cf_data_SQL = "SELECT cf_date, cf_id, cf_c_id, cf_comment FROM content_feedback WHERE cf_user_id='$user_id' ORDER BY cf_date DESC";
    eq($get_cf_data_SQL, $cf_data);
    $cf_data = mfa($cf_data);
    
    $get_c_url_SQL = "SELECT c_url FROM content WHERE c_id='{$cf_data['cf_c_id']}'";
    eq($get_c_url_SQL, $c_url_data);
    
    $formatted_cf_data = [];
    $formatted_cf_data["id"] = $cf_data["cf_id"];
    $formatted_cf_data["c_url"] = mfa($c_url_data)["c_url"];
    $formatted_cf_data["c_id"] = $cf_data['cf_c_id'];
    $formatted_cf_data["date"] = $cf_data["cf_date"];
    $formatted_cf_data["comment"] = $cf_data["cf_comment"];
    
    return $formatted_cf_data;
}

function get_radar_chart_from_cf_id($cf_id){
    //gets values to be used on radar chart for content feedback
    $emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted");
    $chart_data = array();
    //get ar_id for this content feedback id 
    $get_ar_id_SQL = "SELECT ar_id FROM analysis_results WHERE ar_cf_id='$cf_id'";
    eq($get_ar_id_SQL, $ar_id_row);
    $ar_id = mfa($ar_id_row)["ar_id"];
    for ($i = 0; $i < sizeof($emotions); $i++){
        $ad_emotion = "ad_".$emotions[$i];//which emotion to search for
        $get_ad_value_SQL = "SELECT * FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM analysis_detail WHERE ad_ar_id='$ar_id')";
        eq($get_ad_value_SQL, $ad_value_row);
        $ad_value_row = mfa($ad_value_row);
        $ad_id = $ad_value_row["ad_id"];
        $ad_value = $ad_value_row[$ad_emotion];
        $image = "../../uploads/".$ad_id.".jpg";
        $chart_value = scale_value_for_chart($ad_value);
        $chart_data[$emotions[$i]]["value"] = $chart_value;
        $chart_data[$emotions[$i]]["image_path"] = $image;
    }
    return $chart_data;
}

function scale_value_for_chart($value){
    $chart_value = round(($value * 10), 2, PHP_ROUND_HALF_UP);
        if ($chart_value < 0.09) 
            $chart_value = 0; 
    return $chart_value;
}

function get_latest_reward_info($user_id){
    $get_latest_reward_SQL = "SELECT rr_r_id, rr_timestamp FROM reward_redeem WHERE rr_u_id='$user_id' ORDER BY rr_timestamp DESC";
    eq($get_latest_reward_SQL, $reward_data);
    $reward_data = mfa($reward_data);
    
    $reward_id = $reward_data['rr_r_id'];
    $get_reward_info_SQL = "SELECT * FROM reward WHERE r_id='$reward_id'";
    eq($get_reward_info_SQL, $reward_info);
    
    $reward_info = mfa($reward_info);
    $reward_title = $reward_info['title'];
    $reward_subtitle = $reward_info['sub_title'];
    $reward_image = "../files/prize_thumb/".$reward_info['r_image'];
    $reward_points = $reward_info['points'];
    
    $formatted_reward_data = []; 
    $formatted_reward_data["title"] = $reward_title;
    $formatted_reward_data["subtitle"] = $reward_subtitle;
    $formatted_reward_data["image"] = $reward_image;
    $formatted_reward_data["points"] = $reward_points;
    
    return $formatted_reward_data;
}

function get_heatmap_data()
{
	$R = DIN_ALL($_REQUEST);
	$sql = "select * from analysis_detail where ad_ar_id = '{$R[ar_id]}'";
	eq($sql, $res);
	
	$ad = array();
	$total = 0;
	while($row = mfa($res)){
		$ad_time = explode(':', $row['ad_time']);
		$total += $ad_time[2];
		$ad['totalLength'] = $total;
		$ad['emotions'][] = array('emotion'=>strtolower($row['ad_dominant_emotion']), 'duration'=>$ad_time[2]); //[$row['ad_dominant_emotion']] = $ad_time[2];
	}
	
	echo json_encode($ad);
}

function get_all_heatmap_data()
{
	$R = DIN_ALL($_REQUEST);
	$sql = "SELECT *
FROM `content_feedback`
INNER JOIN analysis_results ON ar_cf_id = cf_id
INNER JOIN analysis_detail ON ad_ar_id = ar_id
WHERE `cf_c_id` = '{$R[c_id]}'
AND ad_time != '00:00:00.000'
ORDER BY ar_id ASC
";

	eq($sql, $res);
	
	$ad = array();
	$total = 0;
	while($row = mfa($res)){
		$ad_time = explode(':', $row['ad_time']);
		$total += $ad_time[2];
		$ad['totalLength'] = $total;
		$ad['emotions'][] = array('emotion'=>strtolower($row['ad_dominant_emotion']), 'duration'=>$ad_time[2]); //[$row['ad_dominant_emotion']] = $ad_time[2];
	}
	
	echo json_encode($ad);
}

function get_rating_leaderboard($c_id){
    $get_cf_ratings_SQL = "SELECT cf_rating, cf_user_id FROM content_feedback WHERE cf_c_id='$c_id' ORDER BY cf_rating DESC";
    eq($get_cf_ratings_SQL, $cf_ratings);
    $i=0;
    $rating_leaderboard_data = [];
    while ($cf_rating = mfa($cf_ratings)) {
        if ($cf_rating > 0 && count($rating_leaderboard_data) <= 5){
            $current_row = [];
            $get_user_name_for_id = "SELECT user_fname, user_lname, user_id FROM users WHERE user_id='{$cf_rating['cf_user_id']}'";
            eq($get_user_name_for_id, $name);
            $name = mfa($name);
            $user_id = $name["user_id"];
            $name = $name["user_fname"]." ".$name["user_lname"];
            $current_row["name"] = $name;
            $current_row["rating"] = $cf_rating["cf_rating"];
            $current_row["user_id"] = $user_id;
            array_push($rating_leaderboard_data, $current_row);
			$i++;
        }   
    }
    return $rating_leaderboard_data;
}