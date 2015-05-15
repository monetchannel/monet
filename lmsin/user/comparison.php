<?php
require_once ('../includes/common.php');
init();
if($_COOKIE[UserId]=="")
{
	header("Location: index.php?msg=Please first login to continue.");
	return;
}

$datax=array();
$datam=array();
$emotion=array("Null","ad_happy","ad_neutral","ad_sad","ad_angry","ad_suprised","ad_disgusted","ad_scared"); 
	
//$_REQUEST[content_id]=205;	
	
	
if($_REQUEST[content_id])
	$content_cond="AND cf_c_id=$_REQUEST[content_id]";
else
	$content_cond="";
	
$SQL1="select * from emotional_profile order by ep_seq_id ";
eq($SQL1,$rs1);
while($data1=mfa($rs1))
{
	//all_user_overall
	$datay=array();
	$SQL="SELECT AVG(".$emotion[$data1[ep_id]].") as cf_rating FROM analysis_detail INNER JOIN ( SELECT ar_id FROM analysis_results INNER JOIN  content_feedback ON analysis_results.ar_cf_id = content_feedback.cf_id $content_cond) t1 ON t1.ar_id = analysis_detail.ad_ar_id";
	eq($SQL,$rs);
	while($data=mfa($rs))
	{
		$ep_id=$data1[ep_seq_id];
		$datam[$ep_id]=$data[cf_rating]*5;
		array_push($datay,$data[cf_rating]*5);
	}
		$ep_id=$data1[ep_seq_id];
		
	if(!$datam[$ep_id])
		$datam[$ep_id]="0";	
}

print json_encode($datam);
die();
?>