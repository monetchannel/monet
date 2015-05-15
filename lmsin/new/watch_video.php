<?php
include("../includes/common.php");
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

$func_ary=array("video_save","video_update","watch_video","rate_video_do","view_toc");

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}
else
{
	//watch_video($_REQUEST[msg]);
	video_list_brand();
	die();
}

#############################################
function watch_video($msg="")
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;
	$smarty = new Smarty;
	$dt=time();
	get_row_con_info("content","where c_id='$R[c_id]'","",$content);
	get_row_con_info("company","where company_id ='$content[c_company_id]'","company_name,company_id",$company);
	if(get_upload_info($data[company_id],"company_logo",0,$company_logo)>0)
	{
		//$company_logo[up_thumb_view_path];	
		$CompanyLogoSmall=$company_logo[up_small_thumb_view_path];	
	}
	else
		$CompanyLogoSmall='http://corporate.monetchannel.com/images/logo_temp.png';
	
	
	$content[cat_name]=implode(", ",get_value_ary("category_video left join category on cv_cat_id=cat_id","cat_name","where cv_c_id='$content[c_id]'"));
	$content[instanceID]=rand(1,99999999);
	
	$SQL="INSERT into content_feedback (`cf_user_id`,`cf_c_id`,`cf_date`, `cf_comment`, `cf_rating`, `cf_ep_id`, `cf_video_id`,`cf_ch_id`) VALUES ('$_COOKIE[UserId]', '$R[c_id]','$dt','','-1','-1','$content[instanceID]','$R[ch_id]')";
	$cf_id=ei($SQL);
	
	$SQL2="update content set c_views=c_views+1 where c_id='$R[c_id]'";
	eq($SQL2,$rs2);

	if($content[c_url])
		$video_id=get_video_id($content[c_url]);

	$smarty->assign(array("msg"=>$msg,"content"=>$content,
				 "video_id"=>$video_id,"cf_id"=>$cf_id,
				 "SERVER_PATH"=>$Server_View_Path,
				 'cf_ch_id'=>$content[c_av_challenge],
				 "c_id"=>$R[c_id],
				 "CompanyLogoSmall"=>$CompanyLogoSmall));
	$smarty->display("watch_video.tpl");
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
##########################################################################################
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

?>