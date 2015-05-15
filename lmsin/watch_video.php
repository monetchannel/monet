<?php
include("../includes/common.php");
include("account_setting.php");
init();
if($_COOKIE[UserId]=="")
{
	header("Location: index.php?msg=Please first login to continue.&c_id=$_REQUEST[c_id]");
	return;
}
elseif(!get_row_count("users","where user_id = '$_COOKIE[UserId]' AND user_accept_toc=1 limit 0,1"))
{
	header("Location: index.php?act=view_toc");
	return;
}

$func_ary=array("video_save","edit_profile_do","video_update","watch_video","rate_video_do","view_toc", 'content_feedback', 'browse_videos','video_list_brand', 'get_heatmap_data', 'get_all_heatmap_data','more_video_list');

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}
else
{
	//watch_video($_REQUEST[msg]);
	//video_list_brand();
	browse_videos(); 
	die(); 
}

#############################################
function watch_video($msg="")
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;
	$smarty = new Smarty;
	$questions = array();
	
	if(isset($R['cmp_id']) && is_numeric($R['cmp_id'])) {
		$cmp_id = $R['cmp_id'];
		$count_cmp_q = "select COUNT(*) as ttl from question as q inner join map_camp_question as mcq on mcq.map_q_id=q.q_id where mcq.map_camp_id = '{$R[cmp_id]}'";
		eq($count_cmp_q, $ttl);
		
		//list($total_cmp_q) = mysql_fetch_row($ttl);
		if($count_cmp_q > 0)
		{
			$q_sql = "select q.* from question as q inner join map_camp_question as mcq on mcq.map_q_id=q.q_id where mcq.map_camp_id = '{$R[cmp_id]}' ORDER BY RAND() LIMIT 2";
		}else {
			$count_c_q = "select COUNT(*) as ttl from question as q inner join map_camp_question as mcq on mcq.map_q_id=q.q_id where mcq.map_c_id = '{$R[c_id]}'";
			eq($count_c_q, $ttl);
			list($total_c_q) = mysql_fetch_row($ttl);
			if($total_c_q > 0)
			{
				$q_sql = "select q.* from question as q inner join map_camp_question as mcq on mcq.map_q_id=q.q_id where mcq.map_c_id = '{$R[c_id]}' ORDER BY RAND() LIMIT 2";	
			}else {
				$q_sql = "select q.* from question as q where q.q_company_id = 0 ORDER BY RAND() LIMIT 2";	
			}
			
			
		}
		
	}else {

		$cmp_id = 0;
		//$count_c_q = "select COUNT(*) as ttl from question as q inner join map_camp_question as mcq on mcq.map_q_id=q.q_id where mcq.map_c_id = '{$R[c_id]}'";
		//eq($count_c_q, $ttl);
		//list($total_cmp_q) = mysql_fetch_row($ttl);
		$q_sql = "select q.* from question as q inner join map_camp_question as mcq on mcq.map_q_id=q.q_id where mcq.map_c_id = '{$R[c_id]}' ORDER BY RAND() LIMIT 2";
	}
	
	eq($q_sql, $ques);
	//$no_ques = nr($ques);
	while($row = mfa($ques))
	{
		
		$row['option'] = get_q_option($row['q_id']);
		
		array_push($questions, $row);
	}
	// echo '<pre>';
	// var_dump($questions);
	// die;

	$dt=time();
	
	get_row_con_info("content","where c_id='$R[c_id]'","",$content);
	get_row_con_info("company","where company_id ='$content[c_company_id]'","company_name,company_id",$company);
	if(get_upload_info($data[company_id],"company_logo",0,$company_logo)>0)
	{	echo "hello";
		//$company_logo[up_thumb_view_path];	
		$CompanyLogoSmall=$company_logo[up_small_thumb_view_path];	
	}
	else
		$CompanyLogoSmall='http://corporate.monetchannel.com/images/logo_temp.png';
	
	
	$content[cat_name]=implode(", ",get_value_ary("category_video left join category on cv_cat_id=cat_id","cat_name","where cv_c_id='$content[c_id]'"));
	$content[instanceID]=rand(1,99999999);
	
	$SQL="INSERT into content_feedback (`cf_user_id`,`cf_c_id`, `cf_cmp_id`,`cf_date`, `cf_comment`, `cf_rating`, `cf_ep_id`, `cf_video_id`,`cf_ch_id`) VALUES ('$_COOKIE[UserId]', '$R[c_id]','{$cmp_id}','$dt','','-1','-1','$content[instanceID]','$R[ch_id]')";
	$cf_id=ei($SQL);
	
	$SQL2="update content set c_views=c_views+1 where c_id='$R[c_id]'";
	eq($SQL2,$rs2);

	if($content[c_url]){
		$video_id=get_video_id($content[c_url]);}


	$smarty->assign(array("msg"=>$msg,"content"=>$content,
				 "video_id"=>$video_id,"cf_id"=>$cf_id,
				 "SERVER_PATH"=>$Server_View_Path,
				 'cf_ch_id'=>$content[c_av_challenge],
				 "c_id"=>$R[c_id],
				 "CompanyLogoSmall"=>$CompanyLogoSmall,
				 "UserId"=>$_COOKIE[UserId],
				 
				 "questions" => $questions,
				 ));
	$smarty->display("watch_video.tpl");
	
}

/*
 * get question and ans
 * 
 */
function get_q_option($q_id)
{
	$op = array();
	$op_sql = "select * from `options` where o_q_id = '{$q_id}'";
	eq($op_sql, $option);
	while($row = mfa($option))
	{
		$op[$row['o_id']] = $row['o_value'];
	}
	return $op; 
}	

#######################################
function rate_video_do($c_id)
{
	global $Server_View_Path;
	$R=DIN_ALL($_REQUEST);
	$dt=time();
	$SQL="update content_feedback set `cf_user_id`='$_COOKIE[UserId]', `cf_c_id`='$R[c_id]', `cf_date`='$dt', `cf_comment`='".addslashes($R[comment])."', `cf_rating`='$R[c_rating]', `cf_ep_id`='$R[cf_ep_id]', cf_ch_id='$R[cf_ch_id]' where cf_id='$R[cf_id]'";
	eq($SQL,$rs);
	/*if($R[cf_ch_id])
	{
		get_row_con_info("challenge,content,users","where ch_c_id=c_id AND c_id='$R[c_id]' AND ch_id='$R[cf_ch_id]' AND user_id=ch_user_id AND ch_fr_user_id='$_COOKIE[UserId]'","",$challenge_content);
		add_newsfeed(11, $challenge_content[ch_user_id], $R[cf_id]);
		get_row_con_info("users","where user_id='$_COOKIE[UserId]'","",$user);
		
		$link=$Server_View_Path."monet_channel.php";
		$to_name=$challenge_content[user_fname]." ".$challenge_content[user_lname];
		$users[name]=$challenge_content[user_fname]." ".$challenge_content[user_lname];
		$users[resp_name]=$user[user_fname]." ".$user[user_lname];
		$users[c_title]=$challenge_content[c_title];
		$users[SERVER_PATH]=$Server_View_Path;
		$users[title_link]=$Server_View_Path."play_video.php?c_id=$R[c_id]";
		$subject="$user[user_fname] $user[user_lname] has responded to your challenge";
		$message=get_parse_tpl_page("challenge_resp_mail.tpl",$users);
		send_mail_new($to_name,$challenge_content[user_email],"","",$subject,$message);
	}
	else
	{  
		add_newsfeed(2, $_COOKIE[UserId], $R[c_id]);
	}*/
		
	video_list_brand();
	die();	
}

###########################################
function video_list_brand()
{
	global $js;
	global $View_Path;
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	/// Brand Name and videos
	$records=array();
	$SQL="select distinct(company_id),company_url,company_name from company,content where company_id=c_company_id order by company_name";
	eq($SQL,$rs);
	while($data=mfa($rs))
	{
		if(get_upload_info($data[company_id],"company_logo",0,$company_logo)>0)
			$data[company_logo]=$company_logo[up_thumb_view_path];
		else
			$data[company_logo]='';
			
		$data[video_list]=brand_videos($data[company_id],$data[company_url]);	
		array_push($records,$data);
	}
	
	$smarty->assign(array("msg"=>$msg,"none"=>$none,
						 "SERVER_COMPANY_PATH"=>$Server_company_Path,
						 "country_name"=>$country_name,
						 "SERVER_PATH"=>$Server_View_Path,
						 "company_url"=>$R[company_url],
						 "company_name"=>$company[company_name],
						 "records"=>$records,"c_id"=>$R[c_id],
						
						 "current_brand_video_list"=>$current_brand_video_list
						 ));
	$smarty->assign(array("feed"=>$feed));
	$smarty->display('video_list_brand.tpl');
}

function brand_videos($company_id,$company_url)
{
	global $Server_company_Path;
	$smarty = new Smarty;
	$records=array();
	$records2=array();
	$i=1;
	
	if($company_id!='')
	{
		$SQL="select * from content where c_company_id='$company_id' order by c_id";
		$num_rows=eq($SQL,$rs);
		while($data=mfa($rs))
		{
			$data[i]=$i++;
			$data[company_id]=$company_id;
			array_push($records,$data);
		}
	}	
	$smarty->assign(array("SERVER_COMPANY_PATH"=>$Server_company_Path,
							 "records"=>$records,"company_url"=>$company_url,
							 "BrandId"=>$_COOKIE[BrandId],
							 "num_rows"=>$num_rows,));
	return $smarty->fetch("brand_videos.tpl");
}
###########################################

//----------- Girish ----------------------
###########################################

/*
 * Content feedback page
 *
 */
function content_feedback($msg = '')
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;
	global $View_Path;
	$latest_video = array();
	$reviewed_video = array();
	
	$smarty = new Smarty; // load teplate class
	
	$companies = array();
	
	$com_sql="select distinct(company_id),company_url,company_name from company,content where company_id=c_company_id order by company_name";
	eq($com_sql,$comp);
	while($data=mfa($comp))
	{
		if(get_upload_info($data[company_id],"company_logo",0,$company_logo)>0)
			$data[company_logo]=$company_logo[up_thumb_view_path];
		else
			$data[company_logo]='';
			
		//$data[video_list]=brand_videos($data[company_id],$data[company_url]);	
		array_push($companies,$data);
	}
	// -------------------------------------------------------------------------------------------------------------------------------
	$c_cf_data_sql = "select * from content_feedback as cf inner join content as c on c.c_id = cf.cf_c_id where cf_id = '{$R[cf_id]}'";
	eq($c_cf_data_sql,$rs1);
	$c_cf_data = mfa($rs1);//mysql_fetch_array($rs1);
	
	// -------------------------------------------------------------------------------------------------------------------------------
	$user_sql = "select  u.*, rp.points, co.countries_name, up.up_fname, up.up_ext from users as u inner join reward_point as rp on rp.rp_u_id = u.user_id inner join countries as co on co.countries_id = u.user_country left join uploads as up on up.up_s_id = u.user_id where u.user_id = '{$_COOKIE[UserId]}'";
	
	
	eq($user_sql,$rs2);
	$user_data = mfa($rs2);//mysql_fetch_array($rs2);

	// -------------------------------------------------------------------------------------------------------------------------------
	$reward_sql = "select * from reward where points > '{$user_data[points]}' limit 1";
	eq($reward_sql,$rs3);
	$reward_data = mfa($rs3);
	
	
	// max value of expressions
	// $exp_max_v_sql = " SELECT MAX( `ad_neutral` ) AS neutral, MAX( `ad_happy` ) AS happy, MAX( `ad_sad` ) AS sad, MAX( `ad_angry` ) AS angry, MAX( `ad_suprised` ) AS suprised, MAX( `ad_scared` ) AS scared, MAX( `ad_disgusted` ) AS disgusted FROM `analysis_detail` as ad inner join analysis_results as ar on ar.ar_id = ad.ad_ar_id WHERE `ar_cf_id` =  '{$c_cf_data[cf_id]}'";
	// eq($exp_max_v_sql,$exp_max_v);
	// $e_max_value = mfa($exp_max_v);
	// $max_str = "'{$e_max_value[neutral]}','{$e_max_value[happy]}','{$e_max_value[sad]}','{$e_max_value[angry]}','{$e_max_value[suprised]}','{$e_max_value[scared]}','{$e_max_value[disgusted]}'";
// 	
	// get user expression images 
	$cf_exp_sql = "select ar.ar_id, ad.* from analysis_results as ar inner join analysis_detail as ad on ar.ar_id = ad.ad_ar_id where ar.ar_cf_id = '{$c_cf_data[cf_id]}' group by (ad_dominant_emotion)";
	
	//$cf_exp_sql = "select ar.ar_id, ad.* from analysis_results as ar inner join analysis_detail as ad on ar.ar_id = ad.ad_ar_id where ar.ar_cf_id = '4162' AND (ad.ad_neutral in('{$max_str}') OR ad.ad_happy in('{$max_str}') OR ad.ad_sad in('{$max_str}') OR ad.ad_angry in('{$max_str}') OR ad.ad_suprised in('{$max_str}') OR ad.ad_scared in('{$max_str}') OR ad.ad_disgusted in('{$max_str}') ) group by (ad.ad_dominant_emotion)";
	eq($cf_exp_sql,$rs4);
	//$u_exp_data = mysql_fetch_array($rs3);
	//ad_id 	ad_ar_id 	ad_time 	ad_neutral 	ad_happy 	ad_sad 	ad_angry 	ad_suprised 	ad_scared 	ad_disgusted	ad_dominant_emotion
	$u_exp_data = array();
	$ar_id = "";
	while($row = mfa($rs4)) 
	{
		$ar_id = $row['ar_id'];
		
		if(strtolower($row['ad_dominant_emotion']) == 'neutral' )
		{
			$u_exp_data['neutral'] = $row;
                        $emotion_img_data['neutral'] = "../uploads/368637.jpg";
		}
		
		if(strtolower($row['ad_dominant_emotion']) == 'happy' )
		{
			$u_exp_data['happy'] = $row;
                        $emotion_img_data['happy'] = "../uploads/368637.jpg";
		}
		
		if(strtolower($row['ad_dominant_emotion']) == 'sad' )
		{
			$u_exp_data['sad'] = $row;
                        $emotion_img_data['sad'] = "../uploads/368637.jpg";
		}
		
		if(strtolower($row['ad_dominant_emotion']) == 'angry' )
		{
			$u_exp_data['angry'] = $row;
                        $emotion_img_data['angry'] = get_image_for_emotion('angry', "CURRENT");
		}
		
		if(strtolower($row['ad_dominant_emotion']) == 'suprised' )
		{
			$u_exp_data['suprised'] = $row;
                        $emotion_img_data['suprised'] = get_image_for_emotion('suprised', "CURRENT");
		}
		
		if(strtolower($row['ad_dominant_emotion']) == 'scared' )
		{
			$u_exp_data['scared'] = $row;
                        $emotion_img_data['scared'] = get_image_for_emotion('scared', "CURRENT");
		}
		
		if(strtolower($row['ad_dominant_emotion']) == 'disgusted' )
		{
			$u_exp_data['disgusted'] = $row;
                        $emotion_img_data['disgusted'] = get_image_for_emotion('disgusted', "CURRENT");
		}
		
		
		
	}
        $radar_chart_data = get_radar_chart_data();
        $emotion_img_data = get_highest_emotion_images();
	
	///////////////////////////// browse Latest Video///////////////////////////////////////////	
		
	$latest_v_sql = "select co.*, com.* from content as co inner join company as com on com.company_id=co.c_company_id where (co.c_company_id in(select distinct(company_id) from company) and !( co.c_id in(select cf_c_id from content_feedback where cf_id = '{$R[cf_id]}')))ORDER BY `co`.`c_id`  DESC";
	eq($latest_v_sql,$rs1);
	$i = 0;
	$c =1;
	while(($row = mfa($rs1)) && $c<=4)
	{
		$t=filterVideo($row);
		if($t==1){
			$row['i'] = $i++;
			$row[c_date]=days_ago($row[c_date]);		 
			 	
			if (strpos($row[c_date],'days ago') == true) {
		 		//$days = substr($row[c_date],0,3);
				$days = chop($row[c_date]," days ago");
				($days<0)?($days=$days*-1):$days;
				if($days>=30){
					$month = ($days/30);
					if($month>0){
						if($month>=12){
							$row[c_date]= intval($month/12)." year(s) ago";
						}
						else{
							$row[c_date]= intval($month)." month(s) ago";
						}
					}
				}
			}
			else{
    			$row[c_date]= "Added Today";
   			}
			
			array_push($latest_video, $row);
			$c++;
		}
	}
	
	///////////////////////////// browse Most Reviewed Video///////////////////////////////////////////		
	$reviewed_v_sql = "select co.*, com.* from content as co inner join company as com on com.company_id=co.c_company_id where (co.c_company_id in(select distinct(company_id) from company) and !( co.c_id in(select cf_c_id from content_feedback where cf_id = '{$R[cf_id]}')))order by co.c_views desc";
	eq($reviewed_v_sql,$rs2);
	$i = 0;
	$d = 1;
	while(($row = mfa($rs2))&& $d<=4)
	{
		$t=filterVideo($row);
		if($t==1){
			$row['i'] = $i++;
			$row[c_date]=days_ago($row[c_date]);		 
			 	
			if (strpos($row[c_date],'days ago') == true) {
		 		//$days = substr($row[c_date],0,3);
				$days = chop($row[c_date]," days ago");
				($days<0)?($days=$days*-1):$days;
				if($days>=30){
					$month = ($days/30);
					if($month>0){
						if($month>=12){
							$row[c_date]= intval($month/12)." year(s) ago";
						}
						else{
							$row[c_date]= intval($month)." month(s) ago";
						}
					}
				}
			}
			else{
    			$row[c_date]= "Added Today";
   			}
			
			array_push($reviewed_video, $row);
			$d++;
		}
		
	}
	
	// assign variable to teplate 
	$smarty->assign(array(
		 "msg"=>$msg,
		 "content"=>$c_cf_data,
		 "cf_id"=>$R['cf_id'],
		 "SERVER_PATH"=>$Server_View_Path,
		 "user_points"=>$user_data['points'],
		 "userimage" => $user_data['up_fname'] != '' ? $View_Path.'thumb_'.$user_data['up_fname'].$user_data['up_ext'] : './images/dashboard/user.jpg',
		 "UserId"=>$_COOKIE[UserId],
		 "request" => $R,
		 'user_data' => $user_data,
		 "rp" => isset($R['rp']) ? $R['rp'] : '',
		 "u_exp" => $u_exp_data,
                 "img_data"=>$emotion_img_data,
                 "chart_data"=>$radar_chart_data,
		 "ar_id" => $ar_id, 
		 "reward" => $reward_data,
		 "companies" => $companies,
		 "latest_videos" => $latest_video,
	 	 "most_reviewed" => $reviewed_video,
	));
		
	$smarty->display("content_feedback.tpl");
}

/*
 * get heatmap data
 */
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

/*
 * get heatmap data
 */
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


 /*
 * Browse all videos
 *
 */
function browse_videos()
{
	global $js;
	global $View_Path;
	$cdate = date('Y-m-d H:i:s');
	$cdates = date_create($cdate);
	
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	/// Brand Name and videos
	$assign = array();
	$companies=array();
	$latest_v_data = array();
	$reviewed_v_data = array();
	$category_data = array();
	$filterVideos_data = array();
	$comp = '';
	
	$cat_sql = "select * from category";
	eq($cat_sql, $category);
	while($row = mfa($category))
	{
		if($row['cat_id'] == $R['cat'])
		{
			$row['selected'] = 'selected';
		}else {
			$row['selected'] = '';
		}
		array_push($category_data, $row);
	}
	// echo '<pre>';
	// var_dump($category_data);die;
	
	//$user_sql = "select  u.*, co.countries_name, up.up_fname, up.up_ext from users as u inner join countries as co on co.countries_id = u.user_country left join uploads as up on up.up_s_id = u.user_id where u.user_id = '{$_COOKIE[UserId]}' and up.up_s_type = 'user_profile_photo'";
	
        $up_table_sql= "select  up_fname, up_ext from uploads where up_s_id='{$_COOKIE[UserId]}' and up_s_type = 'user_profile_photo'"; 
        $up=intval(eq($up_table_sql,$user));
        if($up>0){
           $user_sql = "select  u.*, co.countries_name, up.up_fname, up.up_ext from users as u inner join countries as co on co.countries_id = u.user_country left join uploads as up on up.up_s_id = u.user_id where u.user_id = '{$_COOKIE[UserId]}' and up.up_s_type = 'user_profile_photo'"; 
           eq($user_sql,$user);
           $user_data = mfa($user);
        }
        else {
           $user_sql = "select  u.*, co.countries_name from users as u inner join countries as co on co.countries_id = u.user_country where u.user_id = '{$_COOKIE[UserId]}'";
           eq($user_sql,$user);
           $user_data = mfa($user);//mysql_fetch_array($rs2);
	 
        }
      
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
	
	## --------------------------------------------------------------------------------
	## content queries
	## --------------------------------------------------------------------------------
	
	if(isset($R['filter']) && $R['filter'] == 'true')
	{
		$condition = '';
		if(isset($R['cat']) && $R['cat'] != '')
		{
			$condition .= 'cat.cat_id = '.$R['cat'].' AND ';
		}
		if(isset($R['brand']) && $R['brand'] != '') {
			$condition .= 'co.c_company_id = '.$R['brand'].' AND ';
		}
		// else {
			// $condition .= 1;
		// }
		
		$condition = str_replace_last('AND','', $condition);
		$condition = strlen($condition) > 0 ? $condition : '1';
		
		$filter_v_sql = "select co.*, com.* from content as co left join company as com on com.company_id=co.c_company_id left join category as cat on cat.cat_name=co.c_category where ".$condition." group by (co.c_id) order by co.c_id desc";
		eq($filter_v_sql,$filterVideos); 
		$i = 0;
		
		while($row = mfa($filterVideos))
		{
			$t=filterVideo($row);
			if($t==1){
				$row['i'] = $i++;
			
				$row[c_date]=days_ago($row[c_date]);		 
			 	if (strpos($row[c_date],'days ago') == true) {
		 			//$days = substr($row[c_date],0,3);
					$days = chop($row[c_date]," days ago");
					($days<0)?($days=$days*-1):$days;
					if(days>=30){
						$month = ($days/30);
						if($month>0){
							if($month>=12){$row[c_date]= intval($month/12)." year(s) ago";}
							else{$row[c_date]= intval($month)." month(s) ago";}
						}
					}
				}
				else{
    				$row[c_date]= "Added Today";
   				}
				array_push($filterVideos_data, $row);
			}
		}
		
		// echo '<pre>';
		// var_dump($filterVideos_data);
		// die;
		
		$assign = array(
		 	"SERVER_COMPANY_PATH"=>$Server_company_Path,
		 	"SERVER_PATH"=>$Server_View_Path,
		 	//"upload_view_path" => $View_Path,
		 	"records"=>$records,
		 	"filter_videos"=> $filterVideos_data,
		 	"companies" => $companies,
		 	"category" => $category_data,
                        "up"=>$up,
		 	'user_data' => $user_data,
		 	"userimage" => $user_data['up_fname'] != '' ? $View_Path.'thumb_'.$user_data['up_fname'].$user_data['up_ext'] : './images/dashboard/user.jpg',
		 	"cmp_count" => $cmp,
	 	);
	}
	else {
		$latest_v_sql = "select co.*, com.* from content as co inner join company as com on com.company_id=co.c_company_id where co.c_company_id in(".trim($comp, ',').") order by co.c_id desc";
		eq($latest_v_sql,$rs1);
		$i = 0;
		$c =1;
		while(($row = mfa($rs1)) && $c<=9)
		{
			$t=filterVideo($row);
			if($t==1){
				$row['i'] = $i++;
				$row[c_date]=days_ago($row[c_date]);		 
			 	
				if (strpos($row[c_date],'days ago') == true) {
		 			//$days = substr($row[c_date],0,3);
					$days = chop($row[c_date]," days ago");
					($days<0)?($days=$days*-1):$days;
					if($days>=30){
						$month = ($days/30);
						if($month>0){
							if($month>=12){
								$row[c_date]= intval($month/12)." year(s) ago";
							}
							else{
								$row[c_date]= intval($month)." month(s) ago";
							}
						}
					}
				}
				else{
    				$row[c_date]= "Added Today";
   				}
				array_push($latest_v_data, $row);
				$c++;
			}
		}
		
		$reviewed_v_sql = "select co.*, com.* from content as co inner join company as com on com.company_id=co.c_company_id where co.c_company_id in(".trim($comp, ',').") order by co.c_views desc";
		eq($reviewed_v_sql,$rs2);
		$i = 0;
		$d = 1;
		while(($row = mfa($rs2))&& $d<=9)
		{
			$t=filterVideo($row);
			if($t==1){
				$row['i'] = $i++;
				$row[c_date]=days_ago($row[c_date]);		 
			 	
				if (strpos($row[c_date],'days ago') == true) {
		 			//$days = substr($row[c_date],0,3);
					$days = chop($row[c_date]," days ago");
					($days<0)?($days=$days*-1):$days;
					if($days>=30){
						$month = ($days/30);
						if($month>0){
							if($month>=12){
								$row[c_date]= intval($month/12)." year(s) ago";
							}
							else{
								$row[c_date]= intval($month)." month(s) ago";
							}
						}
					}
				}
				else{
    				$row[c_date]= "Added Today";
   				}
				array_push($reviewed_v_data, $row);
				$d++;
			}
			
		}
				
		$assign = array(
		 	"SERVER_COMPANY_PATH"=>$Server_company_Path,
		 	"SERVER_PATH"=>$Server_View_Path,
		 	//"upload_view_path" => $View_Path,
		 	"records"=>$records,
		 	"current_brand_video_list"=>$current_brand_video_list,
		 	"latest_videos" => $latest_v_data,
		 	"most_reviewed" => $reviewed_v_data,
		 	"companies" => $companies,
		 	"category" => $category_data,
                        "up"=>$up,
		 	'user_data' => $user_data,
		 	"userimage" => $user_data['up_fname'] != '' ? $View_Path.'thumb_'.$user_data['up_fname'].$user_data['up_ext'] : './images/dashboard/user.jpg',
		 	"cmp_count" => $cmp,
	 	);
	}
	
	// echo '<pre>';
	// var_dump($assign['companies']);
	// die;
	
	$smarty->assign($assign);
	$smarty->assign(array("feed"=>$feed));
	
	if(isset($R['filter']) && $R['filter'] == 'true')
	{
		$smarty->display('filter_video_list.tpl');
	}
	else {
		$smarty->display('video_list.tpl');	
	}
}
##############################################
## helper function for remove last AND in conditional query
##############################################
function str_replace_last( $search , $replace , $str ) {
    if( ( $pos = strrpos( $str , $search ) ) !== false ) {
        $search_length  = strlen( $search );
        $str    = substr_replace( $str , $replace , $pos , $search_length );
    }
    return $str;
}

function get_highest_emotion_images() {
    $emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted"); //NOTE:'vad_sacred' needs to be changed to 'vad_scared' in DB
    $images = array("neutral" => "", "happy" => "", "sad" => "", "angry" => "", "suprised" => "", "scared" => "", "disgusted" => "");

    for ($i = 0; $i < count($emotions); $i++) {
        $images[$emotions[$i]] = get_image_for_emotion($emotions[$i], "CURRENT"); //store image to $images under the proper key
    }
    return $images;
}

function get_image_for_emotion($emotion, $scope) {
    //retrieves image file from DB that has the highest value for specified emtion ($emotion)
    //$scope defines whether search should be performed for all users or for current user 
    //possible values are "CURRENT" and "ALL"

    global $Server_Upload_Path;

    if (strtoupper($scope) == "ALL") {//for all users
        $ad_emotion = "ad_" . $emotion;
        //below sql gets the row with the highest value for $emotion
        //$filter_SQL = "(SELECT * FROM analysis_detail WHERE ad_id>368648) AS filtered_ad";//we only want files we have
        $image_request_SQL = "SELECT ad_id FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM analysis_detail)";
        eq($image_request_SQL, $image_row);
        $data = mfa($image_row);
        $image_name = $data[ad_id] . ".jpg";
        $image_name = "../../uploads/" . $image_name; //add upload path to beginning
    } else if (strtoupper($scope) == "CURRENT") {//current user only
        //get content feedback ids for currrent user
        $user_id = $_COOKIE['UserId'];
        $get_cf_ids_SQL = "SELECT * FROM content_feedback WHERE cf_user_id=$user_id";
        eq($get_cf_ids_SQL, $cf_ids_resource);
        $cf_ids = array();
        while ($row = mysql_fetch_array($cf_ids_resource, MYSQL_ASSOC)) {//while there are more rows
            array_push($cf_ids, $row["cf_id"]);
        }
        //get ar_ids for currrent user
        $ar_ids = array();
        for ($j = 0; $j < sizeof($cf_ids); $j++) {
            $cf_id = $cf_ids[$j];
            $get_ar_id_SQL = "SELECT ar_id FROM analysis_results WHERE ar_cf_id=$cf_id";
            eq($get_ar_id_SQL, $ar_id_row); //get the row
			$ar_id_row=mfa($ar_id_row);
            $ar_id = "'" . $ar_id_row["ar_id"] . "'"; //extract ar_id
            if ($ar_id !== "''") {//input check
                array_push($ar_ids, $ar_id);
            }
        }

        $ad_emotion = "ad_" . $emotion; //get current emotion
        $filter_SQL = "(SELECT * FROM analysis_detail WHERE ad_id>368648) AS filtered_ad"; //filter to files we have locally
        //format for use in IN caluse
        $formatted_ar_ids = implode(",", $ar_ids);
        $formatted_ar_ids = "(" . $formatted_ar_ids . ")";
        if ($formatted_ar_ids != "()") {//no images selected
            $image_request_SQL = "SELECT ad_id FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM $filter_SQL WHERE ad_ar_id IN $formatted_ar_ids)";
            eq($image_request_SQL, $image_row);
            $image_name = "../../uploads/" . mfa($image_row)["ad_id"] . ".jpg"; //prepend directory, append file extension
        } else {
            $image_name = "images/" . $emotion . ".jpg"; //stock images
            echo "You have not yet rated any videos.";
        }
    }
    return $image_name;
}

function get_radar_chart_data(){
    //gets values to be used on radar chart for content feedback
    $emotions = array("neutral", "happy", "sad", "angry", "suprised", "scared", "disgusted");
    $chart_data = array();
    $cf_id = $_REQUEST['cf_id'];
    //get ar_id for this content feedback id 
    $get_ar_id_SQL = "SELECT ar_id FROM analysis_results WHERE ar_cf_id='$cf_id'";
    eq($get_ar_id_SQL, $ar_id_row);
    $ar_id = mfa($ar_id_row)["ar_id"];
    for ($i = 0; $i < sizeof($emotions); $i++){//current user
        $ad_emotion = "ad_".$emotions[$i];//which emotion to search for
        $get_ad_value_SQL = "SELECT * FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM analysis_detail WHERE ad_ar_id='$ar_id')";
        eq($get_ad_value_SQL, $ad_value_row);
        $ad_value_row = mfa($ad_value_row);
        $ad_id = $ad_value_row["ad_id"];
        $ad_value = $ad_value_row[$ad_emotion];
        $image = "../../uploads/".$ad_id.".jpg";
        $chart_value = scale_value_for_chart($ad_value);
        $chart_data[$emotions[$i]]["value"]["current"] = $chart_value;
        $chart_data[$emotions[$i]]["image_path"]["current"] = $image;
    }
    //get the content id
    $get_c_id_SQL = "SELECT cf_c_id FROM content_feedback WHERE cf_id='$cf_id' limit 0,1";
    eq($get_c_id_SQL, $c_id_row);
    $c_id = mfa($c_id_row)["cf_c_id"];
    //get all cf_ids with this content id
    $get_cf_ids_SQL = "SELECT * FROM content_feedback WHERE cf_c_id = '$c_id'";
    eq($get_cf_ids_SQL, $cf_ids_resource);
    $cf_ids = array();
    while ($tmp_cf_id = mfa($cf_ids_resource)["cf_id"]){
        array_push($cf_ids, "'".$tmp_cf_id."'");
    }
    //get the ar_ids for the cf_ids
    $ar_ids = array();
    for ($j = 0; $j < sizeof($cf_ids); $j++) {
        $cf_id = $cf_ids[$j];
        $get_ar_id_SQL = "SELECT ar_id FROM analysis_results WHERE ar_cf_id=$cf_id";
        eq($get_ar_id_SQL, $ar_id_row); //get the row
        $ar_id = "'" . mfa($ar_id_row)["ar_id"] . "'"; //extract ar_id
        if ($ar_id !== "''") {//input check
            array_push($ar_ids, $ar_id);
        }
    }
    //format for IN clause
    $formatted_ar_ids = implode(",", $ar_ids);
    $formatted_ar_ids = "(".$formatted_ar_ids.")";
    if ($formatted_ar_ids == "()"){
        $formatted_ar_ids = "('940')";
    }
    echo $formatted_ar_ids;
    for ($k = 0; $k < sizeof($emotions); $k++){//all users
        $ad_emotion = "ad_".$emotions[$k];
        $get_ad_value_SQL = "SELECT * FROM analysis_detail WHERE $ad_emotion=(SELECT MAX($ad_emotion) FROM analysis_detail WHERE ad_ar_id IN $formatted_ar_ids)";
        eq($get_ad_value_SQL, $ad_value_row);
        $ad_value_row = mfa($ad_value_row);
        $ad_id = $ad_value_row["ad_id"];
        $ad_value = $ad_value_row[$ad_emotion];
        $image = "../../uploads/".$ad_id.".jpg";
        $chart_value = scale_value_for_chart($ad_value);
        $chart_data[$emotions[$k]]["value"]["all"] = $chart_value;
        $chart_data[$emotions[$k]]["image_path"]["all"] = $image;
    }
    return $chart_data;
}

function scale_value_for_chart($value){
    $chart_value = round(($value * 10), 2, PHP_ROUND_HALF_UP);
        if ($chart_value < 0.09) 
            $chart_value = 0; 
    return $chart_value;
}

?>