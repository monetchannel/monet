<?php
include("../includes/common.php");
init();

$func_ary=array('user_cmp', 'testcode');

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}
else
{
	global $Server_View_Path;
	$path=$Server_View_Path.'user/index.php'; 
	header("Location:$path");
	die();
}


/*
 * User campaign 
 * 
 */
function user_cmp()
{
	global $Server_View_Path;
	$cdate = date('Y-m-d H:i:s');
	$UserId = $_COOKIE['UserId'];
	$R = DIN_ALL($_REQUEST);
	//echo base64_encode('250,14');
	list($c_id, $cmp_id) = explode(',', base64_decode($R['key'])); 
	
	$sql = "";
	
	if($UserId != '' || $UserId > 0)
	{
		$check_campaigns_sql = ("select count(*) as total from campaigns as cmp inner join map_campaign_user as mcu on mcu.map_campaign_id = cmp.cmp_id where cmp_id = '{$cmp_id}' and (cmp.open_for_all = 1 OR mcu.map_user_id = '{$UserId}') and cmp.cmp_start <= '{$cdate}' group by cmp.cmp_id");
		eq($check_campaigns_sql, $res);
		$is_cmp = mfa($res);
		//var_dump($is_cmp);die;
		if($is_cmp['total'] > 0)
		{
			$path=$Server_View_Path.'user/watch_video.php?act=watch_video&c_id='.$c_id.'&cmp_id='.$cmp_id;
			header("Location:$path");
			die;
		}else {
			$path=$Server_View_Path.'user/campaigns.php';
			header("Location:$path");
			die;
		}
	}else {
		$path=$Server_View_Path.'user/index.php?act=show_login&&c_id='.$c_id.'&cmp_id='.$cmp_id;
		header("Location:$path");
		die;
	}
}