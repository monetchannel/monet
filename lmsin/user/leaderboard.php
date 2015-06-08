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
    $get_ordered_results_SQL = "SELECT rp_u_id, points FROM reward_point ORDER BY points DESC";
    eq($get_ordered_results_SQL, $rs);
    $last_comment=array();
//    $ordered_data = mfa($rs);
    $rank = 0; 
    while ($row = mfa($rs)){
        $current_row = array();
        //gather data
        $rank++;
        global $current_user_rank;
        if ($row['rp_u_id'] == $_COOKIE['UserId']){
            $current_user_rank = $rank;
        }
        $name = get_name_for_user_id($row['rp_u_id']);
        $points = $row['points'];
        //$get_profile_img_SQL = "SELECT user_profile_image FROM users WHERE user_id='{$row['rp_u_id']}'";
        $get_profile_img_SQL = "SELECT * FROM `uploads` WHERE up_s_type='user_profile_photo' and up_s_id={$row['rp_u_id']}";
        eq($get_profile_img_SQL, $image_row);
        $image_row = mfa($image_row);
        $profile_img_path = "../../uploads/thumb_".$image_row['up_fname'];
        //assign and push
        $current_row['rank'] = $rank;
        $current_row['name'] = $name;
        $current_row['points'] = $points;
        $current_row['profile_img'] = $profile_img_path;
        array_push($board_data, $current_row);
    }
    //data related to cf_id
    $cf_id_data = get_last_cf_id($_COOKIE['UserId']);
    $SQL="SELECT cf.cf_comment,up.up_fname,up.up_ext FROM `content_feedback` cf JOIN users u ON cf.cf_user_id=u.user_id JOIN uploads up ON u.user_id=up.up_s_id WHERE cf.cf_c_id='{$cf_id_data['c_id']}' AND up.up_s_type='user_profile_photo' AND cf.cf_comment !='' ORDER BY cf_date DESC LIMIT 0,2";
    eq($SQL, $rs);
    while($data=mfa($rs)){
        
        $image="../../uploads/thumb_".$data['up_fname'].$data['up_ext'];
        $data["image"]=$image;
        array_push($last_comment,$data);
    }
    
    $radar_chart_data = get_radar_chart_from_cf_id($cf_id_data['id']);
    $user_data=get_current_user_info();
    $userimage = $user_data['profile_image'];
    $cdate = date('Y-m-d H:i:s');
    $companies=array();
    $SQL="select distinct(company_id),company_url,company_name from company,content where company_id=c_company_id order by company_name";
    eq($SQL,$rs);
    while($data=mfa($rs))
    {
            $comp .= '\''.$data['company_id'].'\''.',';
            if(get_upload_info($data[company_id],"company_logo",0,$company_logo)>0)
                    $data[company_logo]=$company_logo[up_thumb_view_path];
            else
                    $data[company_logo]='';


            if($data['company_id'] == $R['brand'])
            {
                    $data['selected'] = 'selected';
            }else {
                    $data['selected'] = '';
            }

            //$data[video_list]=brand_videos($data[company_id],$data[company_url]);	
            array_push($companies,$data);
    }

    ## ---------------------------- Count Campaign ---------------------------------------------------
    $campaigns_sql = "select count(*) as total from campaigns as cmp inner join content as co on cmp.cmp_c_id = co.c_id inner join map_campaign_user as mcu on mcu.map_campaign_id=cmp.cmp_id where cmp.cmp_start <= '{$cdate}' and mcu.map_user_id = '{$_COOKIE[UserId]}'";
    eq($campaigns_sql,$cmp_count);
    $cmp = mfa($cmp_count);

    $SQL1 = "SELECT c.c_url FROM content c
            JOIN campaigns cmp ON c.c_id=cmp.cmp_c_id
            JOIN map_campaign_user mcu ON mcu.map_campaign_id=cmp.cmp_id
            WHERE mcu.map_user_id='$_COOKIE[UserId]]'";

    eq($SQL1,$rs1);
    while($result1 = mfa($rs1)) {
            if(!check_vid_exist($result1[c_url]))
                            $cmp[total]--;
    }
    $smarty = new Smarty;
    $smarty->assign(array("data"=>$board_data,
                     "rating_data"=>get_rating_leaderboard($cf_id_data['c_id']),
                     "user_data"=>$user_data,
                     "cf_data"=>$cf_id_data,
                     "userimage"=>$userimage,
                     "companies"=>$companies,
                     "last_comment"=>$last_comment,
                     "cmp_count"=>$cmp,
                     "radar_chart_data"=>$radar_chart_data,
                     "latest_reward"=>get_latest_reward_info($_COOKIE['UserId'])));
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
    $get_image_SQL = "SELECT * FROM `uploads` WHERE up_s_type='user_profile_photo' and up_s_id='$user_id'";
    eq($get_image_SQL, $image);
    $image = mfa($image);
    $user_image = "../../uploads/thumb_".$image['up_fname'].$image['up_ext'];
    
    //rank and points
    $get_ordered_results_SQL = "SELECT points FROM reward_point WHERE rp_u_id='$user_id'";
    eq($get_ordered_results_SQL, $ordered_results_resource);
    $rp_info = mfa($ordered_results_resource);
    $user_points = $rp_info['points'];
    global $current_user_rank;
    $user_ary = array("id"=>$user_id, "name"=>$user_name, "profile_image"=>$user_image, "points"=>$user_points, "rank"=>$current_user_rank, "up_fname"=>$image);
    return $user_ary;
}

/***
 * Gets the latest cf_id for specified user, along with the content url, date, and comment of that cf_id
 * @param $user_id the user id for which to get the latest cf data
 * @return $formatted_cf_data  relevant data about the latest cf_id
 */
function get_last_cf_id($user_id){
    $get_cf_data_SQL = "SELECT cf_date, cf_id, cf_c_id, cf_comment,cf_ep_id FROM content_feedback WHERE cf_user_id='$user_id' AND cf_rating>='0'   ORDER BY cf_date DESC LIMIT 0,1";
    eq($get_cf_data_SQL, $cf_data);
    $cf_data = mfa($cf_data);
    
    if($cf_data[cf_ep_id]){
        $get_c_url_SQL = "SELECT c_url FROM content WHERE c_id='{$cf_data['cf_c_id']}'";
        eq($get_c_url_SQL, $c_url_data);
        $c_url_data= mfa($c_url_data);
    }
    else
        $c_url_data["c_url"]="";
    if($cf_data[cf_ep_id]){
        $SQL="Select * from emotional_profile where ep_id='$cf_data[cf_ep_id]]'";
        eq($SQL,$emotion);
        $emotion=mfa($emotion);
    }
    else
        $emotion="";
        
    $formatted_cf_data = array();
    $formatted_cf_data["id"] = $cf_data["cf_id"];
    $formatted_cf_data["c_url"] = $c_url_data["c_url"];
    $formatted_cf_data["c_id"] = $cf_data['cf_c_id'];
    $formatted_cf_data["date"] = $cf_data["cf_date"];
    $formatted_cf_data["comment"] = $cf_data["cf_comment"];
    $formatted_cf_data["emotion"]=$emotion;
    return $formatted_cf_data;
}

function get_radar_chart_from_cf_id($cf_id){
    //gets values to be used on radar chart for content feedback
    $emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted");
    $chart_data = array();
    //get ar_id for this content feedback id 
    //$get_ar_id_SQL = "SELECT ar_id FROM analysis_results WHERE ar_cf_id='$cf_id'";
    //eq($get_ar_id_SQL, $ar_id_row);
    //$ar_id = mfa($ar_id_row["ar_id"]);
    for ($i = 0; $i < sizeof($emotions); $i++){
        $ad_emotion = "ad_".$emotions[$i];//which emotion to search for
        $get_ad_value_SQL = "Select * from `analysis_detail` WHERE $ad_emotion=(Select MAX($ad_emotion) FROM `analysis_detail` WHERE ad_ar_id in (SELECT ar_id FROM `analysis_results` WHERE ar_cf_id='$cf_id'))";
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
	$val=($value * 10);
    $chart_value = round($val, 2);
    if ($chart_value < 0.09){
        $chart_value = 0; 
	}
    return $chart_value;
}

function get_latest_reward_info($user_id){
    $get_latest_reward_SQL = "SELECT rr_r_id, rr_timestamp FROM reward_redeem WHERE rr_u_id='$user_id' ORDER BY rr_timestamp DESC";
    $count=eq($get_latest_reward_SQL, $reward_data);
    $reward_data = mfa($reward_data);
    
    
    $reward_id = $reward_data['rr_r_id'];
    $get_reward_info_SQL = "SELECT * FROM reward WHERE r_id='$reward_id'";
    eq($get_reward_info_SQL, $reward_info);
    
    $reward_info = mfa($reward_info);
    $reward_title = $reward_info['title'];
    $reward_subtitle = $reward_info['sub_title'];
    $reward_image = "../../uploads/".$reward_info['r_image'];
    $reward_points = $reward_info['points'];
    
    $formatted_reward_data =array(); 
    $formatted_reward_data["title"] = $reward_title;
    $formatted_reward_data["subtitle"] = $reward_subtitle;
    $formatted_reward_data["image"] = $reward_image;
    $formatted_reward_data["points"] = $reward_points;
    if($count)
        $formatted_reward_data['count']=$count;
    else
        $formatted_reward_data['count']=0;
    
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
    $get_cf_ratings_SQL = "SELECT cf.cf_rating, cf.cf_user_id,ep.ep_name FROM content_feedback cf JOIN emotional_profile ep ON cf.cf_ep_id=ep.ep_id WHERE cf_c_id='$c_id' ORDER BY cf_rating DESC";
    eq($get_cf_ratings_SQL, $cf_ratings);
    $i=0;
    $rating_leaderboard_data = array();
    while ($cf_rating = mfa($cf_ratings)) {
        if ($cf_rating > 0 && count($rating_leaderboard_data) <= 4){
            $current_row = array();
            $get_user_name_for_id = "SELECT user_fname, user_lname, user_id FROM users WHERE user_id='{$cf_rating['cf_user_id']}'";
            eq($get_user_name_for_id, $name);
            $name = mfa($name);
            
            
            
            $user_id = $name["user_id"];
            $name = $name["user_fname"]." ".$name["user_lname"];
            $current_row["name"] = $name;
            $current_row["rating"] = $cf_rating["cf_rating"];
            $current_row["comment"] = $cf_rating["cf_comment"];
            $current_row["user_id"] = $user_id;
            $current_row["emotion"] = $cf_rating["ep_name"];
            array_push($rating_leaderboard_data, $current_row);
			$i++;
        }   
    }
    return $rating_leaderboard_data;
}
