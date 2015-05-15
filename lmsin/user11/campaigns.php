<?php
include("../includes/common.php");
init();
if($_COOKIE[UserId]=="")
{
	header("Location: index.php?msg=Please first login to continue");
	return;
}
elseif(!get_row_count("users","where user_id = '$_COOKIE[UserId]' AND user_accept_toc=1 limit 0,1"))
{
	header("Location: index.php?act=view_toc");
	return;
}

$func_ary=array('campaigns', 'watch_campaign', 'testcode');

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}
else
{
	//watch_video($_REQUEST[msg]);
	//video_list_brand();
	campaigns(); 
	die();  
}

/*
 * test function
 * 
 */
function testcode()
{
	echo FLOOR(RAND( )* 1) + 1;
}

/*
 * CAMPAIGNS
 * 
 */
function campaigns()
{
	//
	$cdate = date('Y-m-d H:i:s');
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;
	global $View_Path;
	$cdate = date('Y-m-d H:i:s');
	$smarty = new Smarty; // load teplate class
	
	$companies = array();
	$rewards = array();
	$category_data = array();
	$campaigns = array();
	
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
	
	$com_sql="select distinct(company_id),company_url,company_name from company,content where company_id=c_company_id order by company_name";
	eq($com_sql,$comp);
	while($data=mfa($comp))
	{
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
	
	$user_sql = "select  u.*, rp.points, co.countries_name, up.up_fname, up.up_ext from users as u left join reward_point as rp on rp.rp_u_id = u.user_id inner join countries as co on co.countries_id = u.user_country left join uploads as up on up.up_s_id = u.user_id where u.user_id = '{$_COOKIE[UserId]}' and up.up_s_type = 'user_profile_photo'";
	
	eq($user_sql,$user);
	$user_data = mfa($user);//mysql_fetch_array($rs2);
	if($user_data['points'] == '' || empty($user_data['points'])){
		$user_data['points'] = 0;
	}
	
	// ------------------------ Count Campaigns ------------------------
	$count_cmp_sql = "select count(*) as total from campaigns as cmp inner join content as co on cmp.cmp_c_id = co.c_id inner join map_campaign_user as mcu on mcu.map_campaign_id=cmp.cmp_id where cmp.cmp_start <= '{$cdate}' and mcu.map_user_id = '{$_COOKIE[UserId]}'";
	eq($count_cmp_sql,$cmp_count);
	$cmp = mfa($cmp_count);
	
	
	$campaigns_sql = "select cmp.*, co.*, DATE_FORMAT(cmp.cmp_start,'%d/%m/%Y') as start_date, DATE_FORMAT(cmp.cmp_end,'%d/%m/%Y') as end_date from campaigns as cmp inner join content as co on cmp.cmp_c_id = co.c_id inner join map_campaign_user as mcu on mcu.map_campaign_id=cmp.cmp_id where cmp.cmp_start <= '{$cdate}' and mcu.map_user_id = '{$_COOKIE[UserId]}'";
	eq($campaigns_sql, $cmp);
	while($cmprow = mfa($cmp))
	{
		$campaigns[] = $cmprow;
	}
	
	
	// assign variable to teplate 
	$smarty->assign(array("msg"=>$msg,
        "SERVER_PATH"=>$Server_View_Path,
        "view_path" => $View_Path,
        "user_data"=>$user_data,
        "userimage" => $user_data['up_fname'] != '' ? $View_Path.'thumb_'.$user_data['up_fname'].$user_data['up_ext'] : './images/dashboard/user.jpg',
        "UserId"=>$_COOKIE[UserId],
        "request" => $R,
        "companies" => $companies,
        "category" => $category_data,
        "campaigns" => $campaigns,
        "cmp_count" => $cmp,
        "campaigns_tab"=>"campaigns-selected",
        ));
        $smarty->display('campaigns.tpl');
        }

/*
 * Watch campaign videos
 * 
 */
function watch_campaign()
{
	$cdate = date('Y-m-d H:i:s');
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;
	global $View_Path;
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
		
		array_push($companies,$data);
	}
	
	$user_sql = "select  u.*, rp.points, co.countries_name, up.up_fname, up.up_ext from users as u left join reward_point as rp on rp.rp_u_id = u.user_id inner join countries as co on co.countries_id = u.user_country left join uploads as up on up.up_s_id = u.user_id where u.user_id = '{$_COOKIE[UserId]}' and up.up_s_type = 'user_profile_photo'";
	
	eq($user_sql,$user);
	$user_data = mfa($user);//mysql_fetch_array($rs2);
	if($user_data['points'] == '' || empty($user_data['points'])){
		$user_data['points'] = 0;
	}
	
	// assign variable to teplate 
	$assign = array(
		 "msg"=>$msg,
		 "SERVER_PATH"=>$Server_View_Path,
		 "view_path" => $View_Path,
		 "user_data"=>$user_data,
		 "userimage" => $user_data['up_fname'] != '' ? $View_Path.'thumb_'.$user_data['up_fname'].$user_data['up_ext'] : './images/dashboard/user.jpg',
		 "UserId"=>$_COOKIE[UserId],
		 "request" => $R,
		 "companies" => $companies,
	);
	// echo '<pre>';
	// print_r($assign);
	// echo '</pre>';
	// die;
	$smarty->assign($assign);
	
	$smarty->display("watch_cmp.tpl"); 
}
