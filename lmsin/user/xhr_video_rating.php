<?php
include("../includes/common.php");
init();

global $Server_View_Path;
$R=DIN_ALL($_REQUEST);
$dt=time();

$SQL="update content_feedback set `cf_user_id`='$_COOKIE[UserId]', `cf_c_id`='$R[c_id]', `cf_date`='$dt', `cf_comment`='".addslashes($R['comment'])."', `cf_rating`='$R[c_rating]', `cf_ep_id`='$R[cf_ep_id]', cf_ch_id='$R[cf_ch_id]' where cf_id='$R[cf_id]'";
$res = eq($SQL,$rs);

if($res > 0)
{
	$res = '';
	$ctime = time();
	$rate_points = $R['rp'];
	// rp_id 	rp_u_id 	points 	last_update 
	$se = mysql_query("select * from reward_point where rp_u_id = '{$_COOKIE[UserId]}'") or die(mysql_errno());
	$n = nr($se);
	$row = mysql_fetch_array($se);
	if($n > 0)
	{
		$rate_points += $row['points'];
		$up = "update reward_point set `points` = '{$rate_points}', `last_update` = '{$ctime}' where rp_u_id = '{$_COOKIE[UserId]}'";
		$res = eq($up,$rs);
	}
	else {
		$in = ("insert into reward_point (`rp_u_id`,`points`,`last_update`) values ('{$_COOKIE[UserId]}', '{$rate_points}', '{$ctime}')");
		$res = ei($in);
	}
	
	if(isset($_REQUEST['ans']))
	{
		
		foreach($_REQUEST['ans'] as $qk=>$qv)
		{
			$in = "insert into feedback_question(`fq_id`,`fq_cf_id`,`fq_u_id`,`fq_q_id`,`fq_o_id`) values(NULL,'{$R[cf_id]}','{$_COOKIE[UserId]}', '{$qk}', '{$qv}')";
			$res = ei($in);
			
		}
	}
	
	echo $res;
}
// `fq_id`
// `fq_u_id` 
// `fq_q_id` 
// `fq_o_id` 

	
	
?>