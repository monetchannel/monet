<?php
include("../includes/common.php");
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;
use \Facebook\FacebookRequestException;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
init();

sajax_export();
sajax_handle_client_request();
$js = sajax_return_javascript();
$func_ary=array("show_login","chk_login","logout","save_invites_request","fb_login","google_login", "view_toc",'toc',"accept_toc_tem", 'cumulative_rewards', 'rewardlist', 'redeem_reward', 'xhr_redeem_reward', 'campaigns', 'user_cmp', 'testcode');

$dirpath = realpath(dirname(__FILE__));
$base_path = rtrim($dirpath, '/').'/'; // base path for user section

define('BASEPATH', str_replace("\\", "/", $base_path));

###################################
# If user already login and type in url http://corporate.monetchannel.com/brand-name/
// if($_COOKIE[UserId]!="")
// {
	// if($_REQUEST[company_url]!='' && $_REQUEST[act]!="logout") {
	// if($_REQUEST[company_url]!='' && $_REQUEST[act]!="logout") {
		// global $Server_View_Path;
		// $path=$Server_View_Path.'user/watch_video.php'; 
		// header("Location:$path");
		// die();
	// }
// }

if($_COOKIE[UserId] != "" && $_REQUEST[act]=="cumulative_rewards" && $_REQUEST[act]=="redeem_reward" && $_REQUEST['xhr_redeem_reward'] && $_REQUEST['rewardlist'])
{
	if($_REQUEST[act]=="logout")
	{
		logout();
		die;
	}else {
		global $Server_View_Path;
		$path=$Server_View_Path.'user/watch_video.php';
		header("Location: {$path}");
		die;
}
}else if ($_REQUEST["act"] == "fb_login"){
    fb_login();
}else if ($_REQUEST["act"] == "google_login"){
    google_login();
}else{
	if($_REQUEST['act'] != 'chk_login')
	{
		// show_login();
	   	// die();
	}
}

if ($_COOKIE[UserId]=="" AND $_REQUEST[act]!="show_login" AND $_REQUEST[act]!="chk_login" && $_REQUEST[act]!="save_ragistration" && $_REQUEST[act]!="save_invites_request"  && $_REQUEST[act]!="toc")
{
   user_home();
   //show_login();
   die();
}

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}
else
{
    user_home();
    //show_login();
    die();
}

#########################################
function user_home()
{
    $R = DIN_ALL($_REQUEST);
	global $Server_View_Path;	
	global $Server_company_Path;
	$smarty = new Smarty;
	get_new_option_list('countries','countries_id','countries_name','',$country_name,0,"",1);
	
	$smarty->assign(array("msg"=>$msg,"none"=>$none,
						 "SERVER_COMPANY_PATH"=>$Server_company_Path,
						 "country_name"=>$country_name,
						 "SERVER_PATH"=>$Server_View_Path,
						 "company_url"=>$R[company_url],
						 "company_name"=>$company[company_name],
						 "records"=>$records,
						 "c_id"=>$R[c_id],
						 "cmp_id"=>$R[cmp_id],
						 "company_id"=>$company[company_id],
						 "base_path"=>base_url(), // path for images 
						 ));

	$smarty->display("index_home.tpl");
}

#########################################
function show_login($msg="")
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;	
	global $Server_company_Path;
        global $google_client_id;
	$smarty = new Smarty;
	get_new_option_list('countries','countries_id','countries_name','',$country_name,0,"",1);
	
	$smarty->assign(array("msg"=>$msg,"none"=>$none,
						 "SERVER_COMPANY_PATH"=>$Server_company_Path,
						 "country_name"=>$country_name,
						 "SERVER_PATH"=>$Server_View_Path,
						 "company_url"=>$R[company_url],
						 "company_name"=>$company[company_name],
						 "records"=>$records,
						 "c_id"=>$R[c_id],
						 "cmp_id"=>$R[cmp_id],
						 "company_id"=>$company[company_id],
						 "base_path"=>base_url(), // path for images 
                                                 "fb_login_url"=>  get_fb_login_url(),
                                                 "google_client_id"=>$google_client_id,
                                                 "google_unique_state"=>generate_google_session_state(),
                                                 "google_redirect_uri"=>"http://localhost/monet/lmsin/user/oauth2callback"
						 ));

	$smarty->display("index_user_login.tpl");
}
############################# OK ############
function chk_login()
{
	$cdate = date('Y-m-d H:i:s');
	$R=DIN_ALL($_REQUEST);
	global $Server_View_Path;
	$R[user_password]=md5($R[user_password]);
	
	if(!get_row_con_info("users","where user_email='$R[user_email]' AND user_password='$R[user_password]' AND activated>0 limit 0,1","",$user))
	{
            if (get_row_con_info("users", "WHERE user_email='$R[user_email]' AND activated='1'", "", $r)){//user is activated but user/pass combo is incorrect
                $ary[0]="The email address and password you entered does not match our records. Please try again."; //We used jquery ajax so use print
                $ary[1]=1;
		print json_encode($ary);
            }else if (get_row_con_info("users", "WHERE user_email='$R[user_email]' AND activated='0'", "", $r)){//user not activated
                $get_conf_num_SQL = "SELECT * FROM users WHERE user_email='$R[user_email]'";
                $row = mfa($get_conf_num_SQL);
                $conf_num = $row["user_activation_num"];
                $ary[0]="Your account is not activated. Click <a href='http://$Server_View_Path"."user/confirmation.php?number=$conf_num'>here</a> to send new activation email."; //We used jquery ajax so use print
                $ary[1]=1;
		print json_encode($ary);
            }else if (get_row_con_info("users", "WHERE user_email='$R[user_email]' AND activated='2'", "", $r)){//fb login
                $ary[0]="Your email is registered for Facbook login. Please login with Facebook to continue."; //We used jquery ajax so use print
                $ary[1]=1;
		print json_encode($ary);
            }else if (get_row_con_info("users", "WHERE user_email='$R[user_email]' AND activated='3'", "", $r)){//google login
                $ary[0]="Your email is registered for Google login. Please login with Google to continue."; //We used jquery ajax so use print
                $ary[1]=1;
		print json_encode($ary);
            }
	}
	else
	{echo "else";
                get_row_con_info("company","where company_url='$R[company_url]' limit 0,1","company_id",$company);
		$_COOKIE[BrandId]=$company[company_id];
		$_SESSION[user_accept_toc]=$user[user_accept_toc];
		$_COOKIE[UserId]=$user[user_id];
		$_COOKIE[UserName]=$user[user_fname]." ".$user[user_lname];
	
		setcookie("BrandId",$company[company_id],time()+86400,"/");
		setcookie("UserId",$user[user_id],time()+86400,"/");
		setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400,"/");
		
		if($R[c_id] && $user[user_accept_toc]==1)
		{
			if($R['cmp_id'])
			{
				$check_campaigns_sql = ("select DISTINCT count(*) as total from campaigns as cmp inner join map_campaign_user as mcu on mcu.map_campaign_id = cmp.cmp_id where cmp_id = '14' and (open_for_all = 1 OR map_user_id = '267') and cmp.cmp_start <= '{$cdate}' and cmp.cmp_end >= '{$cdate}' group by cmp.cmp_id");
				eq($check_campaigns_sql, $res);
				$is_cmp = mfa($res);
				
				if($is_cmp['total'] > 0)
				{
//					$ary[0]="watch_video.php?act=watch_video&c_id=".$R[c_id].'&cmp_id='.$R['cmp_id'];
//					$ary[1]=2;
//					print json_encode($ary);
//					die();
                                    $location = "watch_video.php?act=watch_video&c_id=".$R[c_id].'&cmp_id='.$R['cmp_id'];
                                    header("Location: $location");
				}else {
//					$ary[0]="campaigns.php";
//					$ary[1]=2;
//					print json_encode($ary);
//					die();
                                        header("Location: campaigns.php");
				}
				
			}else {
//				$ary[0]="watch_video.php?act=watch_video&c_id=".$R[c_id];
//				$ary[1]=2;
//				print json_encode($ary);
//				die();
                                header("Location: watch_video.php?act=watch_video&c_id=".$R[c_id]);
			}
				
		}
		else if($user[user_accept_toc]==1)
		{
//			$ary[0]="watch_video.php";
//			$ary[1]=2;
//			print json_encode($ary);
//			die();
                    header("Location: watch_video.php");
		}
		else
		{
//			$ary[0]="index.php?act=view_toc";
//			$ary[1]=2;
//			print json_encode($ary);
//			die();
                    header("Location: index.php?act=view_toc");
		}
	}	
}
###########################################################
function logout()
{
	global $Server_View_Path;
	global $Server_company_Path;
	get_row_con_info("company","where company_id='$_COOKIE[BrandId]'","company_url",$com);
	if($_COOKIE[BrandId])
		$url=$Server_company_Path.$com[company_url];
	else
		$url=$Server_View_Path."user/";
	
	unset($_COOKIE[UserId]);
	$_COOKIE[BrandId]="";
	$_SESSION[user_accept_toc]="";
	$_SESSION["fb_token"]='';
	$_COOKIE[UserId]="";
	$_COOKIE[UserName]="";
	setcookie("BrandId",'',time()-86400, '/');
	setcookie("UserId",'',time()-86400, '/');
	setcookie("UserName",'',time()-86400, '/');

	header("Location:$url");
	die();
	
}
############################################

function create_new_user(){//replaces save_invites_request and removes need for admin approval of new users
        $R=DIN_ALL($_REQUEST);
	global $Server_View_Path;
        //confirm all inputs are valid
        if(!filter_var($R[user_email], FILTER_VALIDATE_EMAIL)){
            print "Please enter a valid email address to continue.";
            die();
        }else if(get_row_count("users","where user_email = '$R[user_email]' AND user_email !='' limit 0,1")){
            print "User email $R[user_email] already exists.";
            die();
        }else if (md5($R["user_pass"]) != md5($R["confirm_user_pass"])){//check password confirm box
            print "Passwords do not match. Please reconfirm password to continue.";
        }else {
            //if everything checks out, save the user to database
            if (isset($R["user_pass"])) {
                $R["user_password"] = $R["user_pass"];
            }
            $user_fname = $R["user_fname"];
            $user_lname = $R["user_lname"];
            $user_email = $R["user_email"];
            $user_password = md5($R["user_password"]);
            $user_zip = $R["user_zipcode"];
            $user_country = $R["user_country"];
            if (isset($R["user_activated"])){
                $activated = $R["user_activated"];
            }else {$activated = '0';}
            
            $activation_number = md5($user_email);//activation number is md5 hash of user email
            
            $add_user_SQL = "INSERT INTO users (user_fname, user_lname, user_email, user_password, user_max_invites, user_accept_toc, user_zipcode, user_country, activated, user_activation_num)"
                        ."VALUES ('$user_fname', '$user_lname', '$user_email', '$user_password','10', '0', '$user_zip', '$user_country', '$activated', '$activation_number')";
            eq($add_user_SQL, $result);
            
            if ($activated == '0'){ 
                $email_link = $Server_View_Path."user/confirmation.php?act=display&number=".md5($user_email);
                $email_message = "<p>Click <a href='$email_link'>here</a> to activate your account.</p>";
                //send_mail_new("$user_fname $user_lname", "$user_email", "support@monetchannel.com", "Monet Email Confirmation", $email_message);
                $headers = 'From: dinesh.chandra@cynets.com';
                if (mail("$user_email", "Monet Account Activation", $email_message, $headers)){
                    print "<p>Account creation successfull, please check your email to activate account.</p>";
                }else { 
                    print "<p>Mail error</p>";
                }
                //print $email_message;
            }
        }
}

function save_invites_request()
{
        create_new_user();
//	$R=DIN_ALL($_REQUEST);
//	global $Server_View_Path;
//	
//	if(!filter_var($R[user_email], FILTER_VALIDATE_EMAIL))
//	{
//		print "Please enter a valid email address to continue.";
//		die();
//	}
//	
//	if(get_row_count("invites_request","where invr_eamil='$R[user_email]' limit 0,1")>0 || get_row_count("users","where user_email = '$R[user_email]' AND user_email !='' limit 0,1"))
//	{
//		print "User email $R[user_email] already exists.";
//		die();
//        }
//	else
//	{
//		//get_row_con_info("company","where company_url='$R[company_url]' limit 0,1","company_id,company_name",$company);
//		$user_dob=$R[dob_mm]."/".$R[dob_dd]."/".$R[dob_yy];
//		
//		if($R[user_fname]!='' && $R[user_lname]!='' && $R[user_email]!='' && $R[user_country]!=-1 && $R[user_zipcode]!='')
//		{
//			$SQL="INSERT INTO `invites_request` ( `invr_fname` , `invr_lname` , `invr_eamil` , `invr_date`,`invr_country`,`invr_zipcode`,invr_company_id)VALUES ( '$R[user_fname]', '$R[user_lname]', '$R[user_email]','".time()."','$R[user_country]','$R[user_zipcode]','$R[company_id]')";
//			eq($SQL,$rs);
//		}
//		else
//		{
//			print "Please fill all fields.";
//			die();	
//		}
//		
//		$subject="New Invitation Request From ".$company[company_name];
//		$admin_url=$Server_View_Path."administrator/";
//		$user[name]=$R[user_fname]." ".$R[user_lname];
//		$user[email]=$R[user_email];
//		$user[admin_url]=$Server_View_Path."administrator/";
//		$message=get_parse_tpl_page("signup_mail.tpl",$user);
//		///send_mail_new("","","MonetChannel","support@monetchannel.com",$subject,$message);
//		send_mail_new("","","MonetChannel","dinesh.chandra@cynets.com",$subject,$message);
//		
//		print "Thank you for registering. We will process your request and send you a conformation on your email shortly.";
//        die();
//	    }
}###########################################################

function toc()
{
	$R = DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	$smarty->display("small_view_toc.tpl");
}
##########################################
### This function need to delete after change name
# becase this is define in two place
###########################################
function accept_toc_tem()
{
	$SQL="Update users set user_accept_toc= '1' where user_id='$_COOKIE[UserId]'";
	eq($SQL,$rs);
    header("Location:watch_video.php");
}

// ---------------------------------------
function base_url($path = '')
{
	// Set the base_url automatically if none was provided
	if (empty($path))
	{
		// The regular expression is only a basic validation for a valid "Host" header.
		// It's not exhaustive, only checks for valid characters.
		if (isset($_SERVER['HTTP_HOST']) && preg_match('/^((\[[0-9a-f:]+\])|(\d{1,3}(\.\d{1,3}){3})|[a-z0-9\-\.]+)(:\d+)?$/i', $_SERVER['HTTP_HOST']))
		{
			$base_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST']
				.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
		}
		else
		{
			$base_url = 'http://localhost/';
		}
		return $base_url;
	}
}


/*
 * Cumulative raward
 * @param 
 * 
 */

function cumulative_rewards($msg = '')
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;
	global $View_Path;
	$cdate = date('Y-m-d H:i:s');
	$smarty = new Smarty; // load teplate class
	
	$companies = array();
	$rewards = array();
	
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
	
        $up_table_sql= "select  up_fname, up_ext from uploads where up_s_id='{$_COOKIE[UserId]}' and up_s_type = 'user_profile_photo'"; 
        $up=intval(eq($up_table_sql,$user));
        if($up>0){
            $user_sql = "select  u.*, rp.points, co.countries_name, up.up_fname, up.up_ext from users as u left join reward_point as rp on rp.rp_u_id = u.user_id inner join countries as co on co.countries_id = u.user_country left join uploads as up on up.up_s_id = u.user_id where u.user_id = '{$_COOKIE[UserId]}' and up.up_s_type = 'user_profile_photo'";
            eq($user_sql,$user);
            $user_data = mfa($user);//mysql_fetch_array($rs2);
            if($user_data['points'] == '' || empty($user_data['points'])){
		$user_data['points'] = 0;
            }
        }
        else{
            $user_sql = "select  u.*, rp.points, co.countries_name from users as u left join reward_point as rp on rp.rp_u_id = u.user_id inner join countries as co on co.countries_id = u.user_country where u.user_id = '{$_COOKIE[UserId]}'";
            eq($user_sql,$user);
            $user_data = mfa($user);//mysql_fetch_array($rs2);
            if($user_data['points'] == '' || empty($user_data['points'])){
		$user_data['points'] = 0;
            }
        }
        
	
	
	
	//$reward_sql = "select * from reward where points > '{$user_data[points]}' limit 1";
	$reward_sql = "select r.* from reward as r where points = (select MIN(rr.points) from reward as rr where points > '{$user_data[points]}') limit 1";
	eq($reward_sql,$reward);
	$nearest_reward = mfa($reward);
	
	$all_re_sql = "select * from reward order by points desc limit 3";
	eq($all_re_sql,$allrewards);
	while($rdata = mfa($allrewards))
	{
		$rewards[] = $rdata;
	}
	
	$tre_sql = "select COUNT(*) as total from reward";
	eq($tre_sql,$tre_sql);
	$t_reward = mfa($tre_sql);
	
	$last_redeem_sql = "select rr.rr_id, rr.rr_timestamp, re.* from reward_redeem as rr inner join reward as re on re.r_id=rr.rr_r_id inner join users as u on u.user_id=rr.rr_u_id where u.user_id = '{$_COOKIE[UserId]}' order by rr.rr_id desc limit 1";
	$last_rdm =(eq($last_redeem_sql,$redeem_reward));
	$my_redeems = mfa($redeem_reward);
	
	
	// ------------------------ Count Campaigns ------------------------
	$count_cmp_sql = "select count(*) as total from campaigns as cmp inner join content as co on cmp.cmp_c_id = co.c_id inner join map_campaign_user as mcu on mcu.map_campaign_id=cmp.cmp_id where cmp.cmp_start <= '{$cdate}' and mcu.map_user_id = '{$_COOKIE[UserId]}'";
	eq($count_cmp_sql,$cmp_count);
	$cmp = mfa($cmp_count);
	
	// assign variable to teplate 
	$smarty->assign(array("msg"=>$msg,
			"SERVER_PATH"=>$Server_View_Path,
			"view_path" => $View_Path,
                        "up"=>$up,
                        "last_rdm"=>$last_rdm,
			"user_data"=>$user_data,
			"userimage" => $user_data['up_fname'] != '' ? $View_Path.'thumb_'.$user_data['up_fname'].$user_data['up_ext'] : './images/dashboard/user.jpg',
			"request" => $R,
			"reward" => $nearest_reward,
			"rewards" => $rewards,
			"total_rewards" => $t_reward,
			"companies" => $companies,
			"my_redeems" => $my_redeems,
			"cmp_count" => $cmp,
			"reward_tab"=>'reward-selected',"active_cumulative_rewards_tab"=>'label',
		       ));
	
	$smarty->display("cumulativa.tpl");
}



/*
 * get all rewar form its offset point
 * 
 */
function rewardlist()
{
	$R = DIN_ALL($_REQUEST);
	$rewards_sql = "select * from reward order by points desc limit ".$R['offset'].",100";
	//$rewards_sql = "select * from reward order by points desc";
	eq($rewards_sql,$allrewards);
	while($rdata = mfa($allrewards))
	{
		$rewards[] = $rdata;
	}
	echo json_encode($rewards);
	die;
}

/*
 * 
 * 
 */
function redeem_reward()
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;
	global $View_Path;
	$cdate = date('Y-m-d H:i:s');
	$smarty = new Smarty; // load teplate class
	
	$companies = array();
	$rewards = array();
	
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
	
	$user_sql = "select  u.*, rp.points, co.countries_name, up.up_fname, up.up_ext from users as u left join reward_point as rp on rp.rp_u_id = u.user_id inner join countries as co on co.countries_id = u.user_country left join uploads as up on up.up_s_id = u.user_id where u.user_id = '{$_COOKIE[UserId]}'";
	
	eq($user_sql,$user);
	$user_data = mfa($user);//mysql_fetch_array($rs2);
	/*if($user_data['points'] == '' || empty($user_data['points'])){
		$user_data['points'] = 0;
	}*/
		
	
	
	// $reward_sql = "select * from reward where points > '{$user_data[points]}'";
	// eq($reward_sql,$reward);
	// $nearest_reward = mfa($reward);
	
	$all_re_sql = "select * from reward order by points asc";
	eq($all_re_sql,$allrewards);
	while($rdata = mfa($allrewards))
	{
		$rdata['re_a_id'] = ($user_data['points'] >= $rdata['points']) ? 'redeem_re' : 'disabled';
		//$rewards[] = $rdata;
		array_push($rewards, $rdata);
	}
	
	$last_redeem_sql = "select rr.rr_id, rr.rr_timestamp, re.* from reward_redeem as rr inner join reward as re on re.r_id=rr.rr_r_id inner join users as u on u.user_id=rr.rr_u_id where u.user_id = '{$_COOKIE[UserId]}' order by rr.rr_id desc ";
	eq($last_redeem_sql,$redeem_rewards);
	$my_redeems = array();
	while($redata = mfa($redeem_rewards))
	{
		$my_redeems[] = $redata;
	}
	
	// ------------------------ Count Campaigns ------------------------
	$count_cmp_sql = "select count(*) as total from campaigns as cmp inner join content as co on cmp.cmp_c_id = co.c_id inner join map_campaign_user as mcu on mcu.map_campaign_id=cmp.cmp_id where cmp.cmp_start <= '{$cdate}' and mcu.map_user_id = '{$_COOKIE[UserId]}'";
	eq($count_cmp_sql,$cmp_count);
	$cmp = mfa($cmp_count);
	
	// assign variable to teplate 
	$smarty->assign(array( "msg"=>$msg,
       "SERVER_PATH"=>$Server_View_Path,
       "view_path" => $View_Path,
       "user_data"=>$user_data,
       "userimage" => $user_data['up_fname'] != '' ? $View_Path.'thumb_'.$user_data['up_fname'].$user_data['up_ext'] : './images/dashboard/user.jpg',
       "UserId"=>$_COOKIE[UserId],
       "request" => $R,
       //"reward" => $nearest_reward,
       "rewards" => $rewards,
       "companies" => $companies,
       "my_redeems" => $my_redeems,
       "cmp_count" => $cmp,
       "reward_tab"=>'reward-selected',"active_redeem_reward_tab"=>'label',
     ));
 // echo '<pre>';
 // print_r($assign);
 // echo '</pre>';
 // die;
 
 $smarty->display("redeem_reward.tpl");
}

/*
 * redeem rewad via ajax
 * 
 */
function xhr_redeem_reward()
{
	$R = DIN_ALL($_REQUEST);
	$UserId = $_COOKIE['UserId'];
	$rewardId = $R['rewardId'];
	$ctime = time();
	
	$reward_sql = "select * from reward where r_id = '{$rewardId}'";
	eq($reward_sql,$redata);
	$reward = mfa($redata);
	
	$redeem_sql = "insert into reward_redeem(`rr_id`, `rr_u_id`, `rr_r_id`, `rr_timestamp`) values(NULL, '{$UserId}', '{$rewardId}', '{$ctime}')";
	
	if(mysql_query($redeem_sql)){
		$update_sql = "UPDATE `reward_point` SET `points` = (`points` - {$reward[points]} ) WHERE `rp_u_id` = '{$UserId}'"; 
		mysql_query($update_sql);
		echo (mysql_error());
		die;
	}else{
		echo '1';
		die;
	}
}

function get_fb_login_url(){//used for facebook login button
    //set defaults
    global $fb_app_id;
    global $fb_secret;
    FacebookSession::setDefaultApplication($fb_app_id, $fb_secret);
    //get redirect helper and url
    $helper = new FacebookRedirectLoginHelper("http://localhost/monet/lmsin/user/index.php?act=fb_login");
    $loginUrl = $helper->getLoginUrl(array($scope=>"email"));
    return $loginUrl;
}

function fb_login($msg=""){
     //set defaults
    global $fb_app_id;
    global $fb_secret;
    FacebookSession::setDefaultApplication($fb_app_id, $fb_secret);
    if (isset($_SESSION["fb_token"]) && $_SESSION["fb_token"] != ''){//already logged in with fb this session
        $session = new FacebookSession($_SESSION["fb_token"]);
    }else {
    $helper = new FacebookRedirectLoginHelper("http://localhost/monet/lmsin/user/index.php?act=fb_login");
    try {
        $session = $helper->getSessionFromRedirect();//try to get a session
    }catch (FacebookRequestException $fb_ex) {
        echo $fb_ex;
    }catch (\Exception $ex){
        echo $ex;
    }
    }
    if ($session) {//logged in to FB
        $R = DIN_ALL($_REQUEST);
        $_SESSION["fb_token"] = $session->getToken();
        $user_profile = (new FacebookRequest(
                        $session, 'GET', '/me'
                        ))->execute()->getGraphObject(GraphUser::className());//get the logged in user's profile
        $user_email = $user_profile->getProperty('email');//get email
        $user_pass =  $user_profile->getId().md5($fb_secret);//generate password
        if (!get_row_count("users", "WHERE user_email='$user_email' limit 0,1")) {//email not already existing
            $_REQUEST["user_email"] = $user_email;
            $_REQUEST["user_password"] = $user_pass;
            $_REQUEST["user_fname"] = $user_profile->getFirstName();
            $_REQUEST["user_lname"] = $user_profile->getLastName();
            $_REQUEST["user_gender"] = $user_profile->getGender();
            $_REQUEST["user_dob"] = $user_profile->getProperty('birthday');
            $_REQUEST["user_activated"] = '2';//2 = fb login
            create_new_user();
            chk_login();
        }else {
            $_REQUEST["user_email"] = $user_email;
            $_REQUEST["user_password"] = $user_pass;
            chk_login();
        }
    }
}

function generate_google_session_state(){//creates unique state for every session using google login
    global $google_secret;
    $state = md5(generatePassword(15, 10).md5($google_secret));
    setcookie("google_state", $state);//save state for later authentication
    return $state;
    
}

function google_login() {
    //check state
    if ($_REQUEST["state"] != $_COOKIE["google_state"]){
        header("HTTP/ 401 Invalid state paramater");
        exit;
    }
    //create new google_client to use
    global $google_client_id;
    global $google_secret;
    global $google_api_key;
    $google_client = new Google_Client();
    $google_client->setApplicationName("Monet Channel");
    $google_client->setClientId($google_client_id);
    $google_client->setClientSecret($google_secret);
    $google_client->setRedirectUri("http://localhost/monet/lmsin/user/oauth2callback");
    $google_client->setDeveloperKey($google_api_key);
    $google_client->setScopes(array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/userinfo.profile'));
    $plus = new Google_PlusService($google_client);
    
    if (isset($_REQUEST["code"])) {
        $google_client->authenticate();
        $jsonTokens = $google_client->getAccessToken();
        $_SESSION['token'] = $jsonTokens;
        
        
        if ($google_client->getAccessToken()) {
            $user_info = $plus->userinfo;
            print $user_info->get();
        }
        
        //header("Location: http://localhost/monet/lmsin/user/watch_video.php");
    }
    
}
 
?>