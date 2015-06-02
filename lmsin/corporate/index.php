<?php
include("../includes/common.php");
init();
//.........................................
sajax_export("approved_category","show_analysis_graph","dashboard_view");
sajax_handle_client_request();
$js = sajax_return_javascript();
//.........................................
$func_ary=array("show_login","chk_login","dashboard","save_ragistration","logout","analysis_results","settings","analysis_graph","import_file","import_do","update_settings","show_analysis_graph","analysis_csv","update_ad_valence","company_profile_edit","company_profile_update","save_invites_request","chk_login_brand","facebook");
#############################################################
global $UserId;
if($_COOKIE[UserId]!="" && $_REQUEST[company_url]!='' && $_COOKIE[BrandId]!='' && $_REQUEST[Admin]=='')
{
	global $Server_View_Path;
	$path=$Server_View_Path.'monet_channel.php?view=unrated';
	header("Location:$path");
	die();
}

if (($_COOKIE["CompanyId"]=="" AND $_REQUEST[act]!="show_login" AND $_REQUEST[act]!="chk_login" && $_REQUEST[act]!="save_ragistration" && $_REQUEST[act]!="save_invites_request" && $_REQUEST[act]!="chk_login_brand" && $_REQUEST[act]!='facebook'))
{ #not logged in
   show_login();
   die();
}

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}

//dashboard();
global $Server_company_Path;
$path=$Server_company_Path.'video.php';
header("Location:$path");
die();
/////////////////////////////////////////////// Import section
function settings()
{
	global $Server_View_Path;
	global $Server_company_Path;
	$R=DIN_ALL($_REQUEST);
	global $invit_num;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	get_row_con_info("site_admin","","",$data);
   	$smarty->assign($data);
   	$smarty->assign(array("msg"=>$msg,"SERVER_COMPANY_PATH"=>$Server_company_Path,
						  "setting_tab"=>"selected","SERVER_ADMIN_PATH"=>$Server_View_Path."administrator/",
						  "act"=>"update_admin",
						  "invit_num"=>$invit_num
						  ));
	$smarty->display("settings.tpl");
}
//---------------Save Admin------------------
function update_settings()
{
	$R=DIN_ALL($_REQUEST);
	func_update_settings($R);
	settings("Updated Successfully");
}

function analysis_graph()
{
	$R=DIN_ALL($_REQUEST);
   	$smarty = new Smarty;
	global $Server_View_Path;
	global $Server_company_Path;
	get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' ","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname",$vd);	
	
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$vd[c_id]' ");
	$ar_ids = implode(',',$ary);
	if(!$ar_ids)$ar_ids=0;
	if(get_row_count("analysis_results_average","where ara_c_id='$vd[c_id]'")>0)
	{
		//analysis_graph_avg_coord($avg_time,$avg_valence);
		analysis_graph_avg_coord($vd[c_id],$avg_time,$avg_valence);
	}
	analysis_graph_coord($time,$valence);	
	get_new_option_list_full_name("analysis_results left join content_feedback on cf_id=ar_cf_id left join users on cf_user_id=user_id left join content on  c_id=cf_c_id","user_id","user_fname","user_lname",'',$compare_option,0,"WHERE user_id<>'$vd[cf_user_id]' and  cf_c_id='$vd[c_id]' and ar_id IN (SELECT ad_ar_id FROM analysis_detail where ad_ar_id IN ($ar_ids))  ORDER BY user_fname,user_lname",1,"DISTINCT user_id,user_fname,user_lname");
	
	$smarty->assign(array("avg_img"=>$avg_img,
						"ad_valence"=>$valence,
						"avg_ad_valence"=>$avg_valence,
						"ad_time"=>$time,
						"compare_option"=>$compare_option,
						"c_id"=>$vd[c_id],
						"cf_id"=>$vd[cf_id],
						"user_name"=>$vd[user_fname]." ".$vd[user_lname],
						"avg_ad_time"=>$avg_time,
						"video_url"=>$Server_View_Path."video_files/".$vd[cf_id].".flv",
						"video_id"=>get_video_id($vd[c_url]),
						"SERVER_COMPANY_PATH"=>$Server_company_Path,
						"SERVER_PATH"=>$Server_View_Path,
	));
	$smarty->display("video_graph.tpl");
}
###########################################################################
function analysis_graph_coord(&$x,&$y,$ad_ar_id=0)
{
	$R=DIN_ALL($_REQUEST);
	global $STDMUL;
	if($ad_ar_id>0)
		$R[ad_ar_id]=$ad_ar_id;
	$datax = array();
	$datay_valence=array();
	$SQL = "SELECT ad_time,ad_valence FROM analysis_detail WHERE ad_ar_id = '$R[ad_ar_id]' ";// ORDER BY ad_time,ad_valence 
	$tot_rows=eq($SQL,$rs);
	while($data=mfa($rs))
	{
		array_push($datax,(float)convert_to_sec($data[ad_time]));
		array_push($datay_valence,(float)$data[ad_valence]);
	}
	$x=implode(",",$datax);
	$y=implode(",",$datay_valence);
}
function analysis_graph_avg_coord($c_id,&$x,&$y)
{
	$datax = array();
	$datay_valence=array();
	$SQL = "SELECT  * FROM analysis_results_average  WHERE ara_c_id='$c_id' ORDER BY ara_time ASC ;";
	$tot_rows=eq($SQL,$rs1);
	while($data=mfa($rs1))
	{
		//print "Time: ".(float)$data[ara_time].", Valence: ".(float)$data[ara_valence]."<br>		";
		array_push($datax,(float)$data[ara_time]);
		array_push($datay_valence,(float)$data[ara_valence]);
	}
	$x=implode(",",$datax);
	$y=implode(",",$datay_valence);
}

function get_compare_valence()
{
	global $Server_View_Path;
	$datax = array();
	$datay_valence=array();
	get_row_con_info("content_feedback left join users on cf_user_id=user_id left join analysis_results on ar_cf_id=cf_id","where cf_user_id='$_REQUEST[user_id]'  and cf_c_id=$_REQUEST[c_id] AND cf_id IN (SELECT ar_cf_id FROM analysis_results WHERE 1) ","cf_id,user_fname,user_lname",$vd);	
	$SQL = "SELECT ad_time,ad_valence FROM analysis_detail  WHERE ad_ar_id IN (Select ar_id from analysis_results where ar_cf_id='$vd[cf_id]') ";// ORDER BY ad_time,ad_valence 
	$tot_rows=eq($SQL,$rs);
	while($data=mfa($rs))
	{
		//$ad_time_ary=explode("00:00:",$data[ad_time]);
		array_push($datax,(float)convert_to_sec($data[ad_time]));
		array_push($datay_valence,(float)$data[ad_valence]);
	}
	$x=implode(",",$datax);
	$y=implode(",",$datay_valence);	
	$url=$Server_View_Path."video_files/".$vd[cf_id].".flv";
	$name=$vd[user_fname]." ".$vd[user_lname];
	print "<script>parent.window.set_compare('$url','$x','$y','$name')</script>";
}
function show_analysis_graph($ad_ar_id)
{
	return "<img src=\"analysis_graph.php?ad_ar_id=$ad_ar_id\">";
}
function analysis_csv()
{
	$R=DIN_ALL($_REQUEST);
	global $STDMUL;
	
	$AVG="SELECT avg(ad_neutral),avg(ad_happy),avg(ad_sad),avg(ad_angry),avg(ad_suprised),avg(ad_scared),avg(ad_disgusted) FROM analysis_detail WHERE ad_ar_id = '$R[ar_id]'";// Use for get Avg
	eq($AVG,$rs_avg);
	$data_avg=mfa($rs_avg);

	$STDDEV="SELECT stddev(ad_neutral),stddev(ad_happy),stddev(ad_sad),stddev(ad_angry),stddev(ad_suprised),stddev(ad_scared),stddev(ad_disgusted) FROM analysis_detail WHERE ad_ar_id = '$R[ar_id]'";//--Use for get Stddev
	eq($STDDEV,$rs_stddev);
	$data_stddev=mfa($rs_stddev);

	$MAX="SELECT max(ad_neutral),max(ad_happy),max(ad_sad),max(ad_angry),max(ad_suprised),max(ad_scared),max(ad_disgusted) FROM analysis_detail WHERE ad_ar_id = '$R[ar_id]'";//--Use for get max
	eq($MAX,$rs_max);
	$data_max=mfa($rs_max);



	get_row_con_info("analysis_results","WHERE ar_id = '$R[ar_id]'","ar_cf_id",$ar_cf_id);
	header("Content-type: text/html");
	header("Content-Disposition: attachment; filename=analysis_".$ar_cf_id[ar_cf_id].".csv");	
	
//	print "Video analysis detailed log - Face Model: General - Calibration: Continous,\n";
//	print "Start time:,1/2/2012  6:47:57 PM\n";
//	print "Filename:,$filename[c_title],\n";
//	print "Frame rate:,20,\n";
	print "STDMUL,$STDMUL,\n\n";
	
	print",Neutral,Happy,Sad,Angry,Surprised,Scared,Disgusted,\n";
	
	print"Avg,".$data_avg['avg(ad_neutral)'].",".$data_avg['avg(ad_happy)'].",".$data_avg['avg(ad_sad)'].",".$data_avg['avg(ad_angry)'].",".$data_avg['avg(ad_suprised)'].",".$data_avg['avg(ad_scared)'].",".$data_avg['avg(ad_disgusted)'].",\n";
	print"Stddev,".$data_stddev['stddev(ad_neutral)'].",".$data_stddev['stddev(ad_happy)'].",".$data_stddev['stddev(ad_sad)'].",".$data_stddev['stddev(ad_angry)'].",".$data_stddev['stddev(ad_suprised)'].",".$data_stddev['stddev(ad_scared)'].",".$data_stddev['stddev(ad_disgusted)'].",\n";
	print"Max,".$data_max['max(ad_neutral)'].",".$data_max['max(ad_happy)'].",".$data_max['max(ad_sad)'].",".$data_max['max(ad_angry)'].",".$data_max['max(ad_suprised)'].",".$data_max['max(ad_scared)'].",".$data_max['max(ad_disgusted)'].",\n\n";
	
	print "Video Time,Neutral,,Happy,,Sad,,Angry,,Surprised,,Scared,,Disgusted,,Valence,,\n";
	
	$SQL = "SELECT * FROM analysis_detail WHERE ad_ar_id = '$R[ar_id]' ORDER BY ad_time ASC";
	$tot_rows=eq($SQL,$rs);
	while($data=mfa($rs))
	{
		
		if(($data[ad_neutral] - $data_avg['avg(ad_neutral)']) > ($STDMUL * $data_stddev['stddev(ad_neutral)']))
			$neutral_avg_stddev=1;
		else
			$neutral_avg_stddev=0;
		if(($data[ad_happy] - $data_avg['avg(ad_happy)']) > ($STDMUL * $data_stddev['stddev(ad_happy)']))
			$happy_avg_stddev=1;
		else
			$happy_avg_stddev=0;
		if(($data[ad_sad] - $data_avg['avg(ad_sad)']) > ($STDMUL * $data_stddev['stddev(ad_sad)']))
			$sad_avg_stddev=1;
		else
			$sad_avg_stddev=0;
		if(($data[ad_angry] - $data_avg['avg(ad_angry)']) > ($STDMUL * $data_stddev['stddev(ad_angry)']))
			$angry_avg_stddev=1;
		else
			$angry_avg_stddev=0;
		if(($data[ad_suprised] - $data_avg['avg(ad_suprised)']) > ($STDMUL * $data_stddev['stddev(ad_suprised)']))
			$suprised_avg_stddev=1;
		else
			$suprised_avg_stddev=0;
		if(($data[ad_scared] - $data_avg['avg(ad_scared)']) > ($STDMUL * $data_stddev['stddev(ad_scared)']))
			$scared_avg_stddev=1;
		else
			$scared_avg_stddev=0;
		if(($data[ad_disgusted] - $data_avg['avg(ad_disgusted)']) > ($STDMUL * $data_stddev['stddev(ad_disgusted)']))
			$disgusted_avg_stddev=1;
		else
			$disgusted_avg_stddev=0;
			
		$sum_sad_angry_scared_disgusted = $sad_avg_stddev+$angry_avg_stddev+$scared_avg_stddev+$disgusted_avg_stddev;
		$sum_happy_surprised = $happy_avg_stddev + $suprised_avg_stddev;
		
		if($sum_sad_angry_scared_disgusted > $sum_happy_surprised)
		{
			$mean = -MAX(($data[ad_sad]/$data_max['max(ad_sad)']),($data[ad_angry]/$data_max['max(ad_angry)']),($data[ad_scared]/$data_max['max(ad_scared)']),($data[ad_disgusted]/$data_max['max(ad_disgusted)']));
		}
		else
		{
			if($sum_happy_surprised)
			{
				$mean = MAX(($data[ad_happy]/$data_max['max(ad_happy)']),($data[ad_suprised]/$data_max['max(ad_suprised)']));
			}
			else
			{
				$mean=0;
			}
		}
		//$valence=$data[ad_happy] - ($data[ad_sad] + $data[ad_angry] + $data[ad_scared] + $data[ad_disgusted]);	
		print "$data[ad_time],$data[ad_neutral],$neutral_avg_stddev,$data[ad_happy],$happy_avg_stddev,$data[ad_sad],$sad_avg_stddev,$data[ad_angry],$angry_avg_stddev,$data[ad_suprised],$suprised_avg_stddev,$data[ad_scared],$scared_avg_stddev,$data[ad_disgusted],$disgusted_avg_stddev,$data[ad_valence],$mean,\n";
	}
}


function delete_analysis_results()
{
	func_delete_analysis_results();
	analysis_results("Records Deleted Successfully.");
}
function import_file($msg="")
{
	$R=DIN_ALL($_REQUEST);
	global $Server_View_Path;	
	global $Server_company_Path;
	global $invit_num;
   	$smarty = new Smarty;
	$smarty->assign($msg);
	$smarty->assign(array("msg"=>$msg,"act"=>"import_do","invit_num"=>$invit_num,"SERVER_COMPANY_PATH"=>$Server_company_Path,"SERVER_ADMIN_PATH"=>$Server_View_Path."administrator/","import_tab"=>"selected"));
	$smarty->display("import_file.tpl");
}
######################################################
function import_do()
{
	global $Server_View_Path;
	global $Upload_Path;
	global $FromMail;
	$Upload_Path=$Upload_Path."zipfolder/";
	/// Make directory
	 if(!file_exists($Upload_Path))
		mkdir($Upload_Path, 0777);
		
	move_uploaded_file($_FILES['file']['tmp_name'], $Upload_Path . $_FILES['file']['name']);
	
	// Zip Section
	$file_array=array();
	$error_array=array();
	$cf_ids=array();
	$j=0;
    $zip = zip_open($Upload_Path.$_FILES[file][name]);
    if ($zip)
    {
        while ($zip_entry = zip_read($zip))
        {
			$completeName = $Upload_Path . zip_entry_name($zip_entry);
			$file_name = zip_entry_name($zip_entry);
			if(strstr($file_name,".flv_") && strstr($file_name,"detailed.txt")) 
			{
				$file_array[$i]=$file_name;
				$i++;
				
				//////////////// extract file///////////////////
				if (zip_entry_open($zip, $zip_entry, "r"))
				{
					if ($fd = @fopen($completeName, 'w+'))
					{
						fwrite($fd, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
						fclose($fd);
					}
					zip_entry_close($zip_entry);
				}	
			}
			else
				$error_array[$j]=$file_name." (Invalide File Formate)";
				$j++;
        }
        zip_close($zip);
    }
	/// End Zip Section 
	$time=time();$x=0;// used for increment cf_ids array key
	foreach($file_array as $key=>$value)
	{
		$j++;
		$analysis_detail = array();
		$video_id=explode(".",$value);// Get id form file name before .flv
		$cf_id=$video_id[0];
		if(!is_numeric($cf_id))// if not found nmueric value
		{
			$error_array[$j]=$value." (cf_id Not Found)";
			continue;
		}
		
		if(!get_row_count("content_feedback","where cf_id='".$cf_id."'"))// if not found cf_id in content_feedback table
		{
			$error_array[$j]=$value." (cf_id Not Found)";
			continue;
		}
		
		if(get_row_count("analysis_results","where ar_cf_id='".$cf_id."'"))// Check Duplicate Records
		{
			$error_array[$j]=$value." (Duplicate Records.)";
			continue;
		}
		
		$SQL2="INSERT INTO `analysis_results` (`ar_date` , `ar_cf_id` )VALUES ( '".$time."', '".$cf_id."')";
		$ar_id=ei($SQL2);
		//add_newsfeed(6, '', $ar_id);
		//add_newsfeed(5, '', $ar_id);
		get_row_con_info("content_feedback","where cf_id='".$cf_id."'","",$cf);
		add_newsfeed(5, $cf[cf_user_id], $cf[cf_c_id]);
		$cf_ids[$x++]=$cf_id;
		$handle=fopen($Upload_Path.$value,"r");
		$k=0;$count=0;
		while($col_ary=fgetcsv($handle,1000,"\t"))
		{
			
			$analysis_detail_ary=$col_ary;// This is userd for count max value.
			$blank_field=0;
			if($k<=5)
			{
				$k++;
				continue;
			}
			
			if(strlen(strrchr($col_ary[0],".")) != 4)// If first row not like 00:00:00.294 formate 
				continue;													
			
			for($i=0;$i<count($col_ary);$i++)
			{
				if($col_ary[$i]=="")
					$blank_field=1;
					
				if($col_ary[$i] == 'FIND_FAILED' || $col_ary[$i] == 'FIT_FAILED')
				{
					$col_ary[$i] = '-1';
				}
				
			}
			
			$max_array=array("neutral"=>$col_ary[1],"happy"=>$col_ary[2],"sad"=>$col_ary[3],"angry"=>$col_ary[4],"suprised"=>$col_ary[5],"scared"=>$col_ary[6],"disgusted"=>$col_ary[7]);
			arsort($max_array);	//short by descending
			foreach($max_array as $key=>$v2)//get first max value
			{
				$ad_dominant_emotion=$key;
				break;
			}
			
			if(!$blank_field)// If no column value
			{
				$col_ary=DIN_ALL($col_ary);
				if($col_ary[1]!=-1 &&$col_ary[2]!=-1 &&$col_ary[3]!=-1 &&$col_ary[4]!=-1 &&$col_ary[5]!=-1 &&$col_ary[6]!=-1 &&$col_ary[7]!=-1 )
				{
					$SQL="INSERT INTO `analysis_detail` (`ad_ar_id` , `ad_time` , `ad_neutral` , `ad_happy` , `ad_sad` , `ad_angry` , `ad_suprised` , `ad_scared` , `ad_disgusted` ,ad_dominant_emotion)VALUES ( '".$ar_id."','".$col_ary[0]."', '".$col_ary[1]."','".$col_ary[2]."', '".$col_ary[3]."', '".$col_ary[4]."', '".$col_ary[5]."', '".$col_ary[6]."', '".$col_ary[7]."','".$ad_dominant_emotion."')";
					eq($SQL,$rs);
					//$analysis_detail["neutral"]+=$analysis_detail_ary[1];
					$analysis_detail["happy"]+=$analysis_detail_ary[2];
					$analysis_detail["sad"]+=$analysis_detail_ary[3];
					$analysis_detail["angry"]+=$analysis_detail_ary[4];
					$analysis_detail["suprised"]+=$analysis_detail_ary[5];
					$analysis_detail["scared"]+=$analysis_detail_ary[6];
					$analysis_detail["disgusted"]+=$analysis_detail_ary[7];
					$count++;
				}
			}
		}
		
		$error_array[$j]=$value." Total number of records ".$count;
		fclose($handle);
		arsort($analysis_detail);
		foreach($analysis_detail as $key1=>$v3)//get first max value
		{
			$analysis_detail=$key1;
			break;
		}
		
		$SQL3="UPDATE analysis_results SET ar_dominant_emoton = '$analysis_detail' where ar_id = '$ar_id'";
		eq($SQL3,$rs3);
		
		
		//-----------------------------------
		update_ad_valence($ar_id);
		
		//-----------------------------------
		
		/// Removed File
		if(file_exists($Upload_Path.$value))
			@unlink($Upload_Path.$value);
		/// zip file	
		if($Upload_Path.$_FILES['file']['name'])
			@unlink($Upload_Path.$_FILES['file']['name']);	
		
		}
	/////////////////////////////////////////mail section
	$user=array();
	$msg=array();
	$message="";
	if(is_array($cf_ids))
	{
		update_ar_feedback($cf_ids);	
		////////Calculate average valence //////////////////////////	
		calculate_avg_valence($cf_ids);
		foreach($cf_ids as $key3=>$cf_id)
		{
			if(get_row_count("content_feedback","where cf_id='".$cf_id."'"))
			{
				get_row_con_info(" content_feedback,users,content","WHERE cf_c_id = c_id AND cf_user_id = user_id AND cf_id= '".$cf_id."'","c_title,user_id,cf_ep_id,user_fname,user_lname,`c_id`",$data);
				get_row_con_info("emotional_profile","where ep_id = '".$data[cf_ep_id]."'","ep_name",$em);
				get_row_con_info("analysis_results","where ar_cf_id = '".$cf_id."'","ar_dominant_emoton",$ar);
				
				$message='<tr><td colspan="2">&nbsp;</td></tr>
				<tr><td colspan="2">Video:&nbsp;'.$data[c_title].'</td></tr>
				<tr><td colspan="2">You rated:&nbsp;'.$ar[ar_dominant_emoton].'</td></tr>
				<tr><td colspan="2">Monet Says:&nbsp;'.$em[ep_name].'</td></tr>';
				$user[$key3]=$data[user_id];
				array_unique($user);
				if(in_array($data[user_id],$user))
				{
					$msg[$data[user_id]]=$msg[$data[user_id]].$message;
				}
				else
					$msg[$data[user_id]]=$message;
					
			}
			
		}
		////Analysis feedback update for <60% //////////////////	
		
		
		
		foreach($msg as $user_id=>$message)
		{
			get_row_con_info("users","where user_id='".$user_id."'","",$data);
			$smarty = new Smarty;
			$smarty->assign(array("message"=>$message,"fname"=>$data[user_fname],"lname"=>$data[user_lname],"SERVER_PATH"=>$Server_View_Path,));
			$message=$smarty->fetch("analysis_results_mail.tpl");
			///$data[user_email]="dinesh.chandra@cynets.com";
			if($data[user_email])
				send_mail_new($data[user_fname]." ".$data[user_lname],$data[user_email],"MonetChannel","$FromMail","Analysis results for your videos",$message);
		//print $message;
		}
	}
	/////////////////////////////////////////
	import_file($error_array);
}


function update_ad_valence($ad_ar_id)
{
	set_time_limit(0);
	global $STDMUL;
	//$test_ad_valence=array();

	$AVG="SELECT avg(ad_neutral),avg(ad_happy),avg(ad_sad),avg(ad_angry),avg(ad_suprised),avg(ad_scared),avg(ad_disgusted) FROM analysis_detail WHERE ad_ar_id = '$ad_ar_id'";// Use for get Avg
	eq($AVG,$rs_avg);
	$data_avg=mfa($rs_avg);
	
	$STDDEV="SELECT stddev(ad_neutral),stddev(ad_happy),stddev(ad_sad),stddev(ad_angry),stddev(ad_suprised),stddev(ad_scared),stddev(ad_disgusted) FROM analysis_detail WHERE ad_ar_id = '$ad_ar_id'";//--Use for get Stddev
	eq($STDDEV,$rs_stddev);
	$data_stddev=mfa($rs_stddev);
	
	$MAX="SELECT max(ad_neutral),max(ad_happy),max(ad_sad),max(ad_angry),max(ad_suprised),max(ad_scared),max(ad_disgusted) FROM analysis_detail WHERE ad_ar_id = '$ad_ar_id'";//--Use for get max
	eq($MAX,$rs_max);
	$data_max=mfa($rs_max);
	
	$SQL = "SELECT *  FROM analysis_detail WHERE ad_ar_id = '$ad_ar_id'";
	$tot_rows=eq($SQL,$rs);
	if($tot_rows>0)
	{
		while($data=mfa($rs))
		{
			if(($data[ad_neutral] - $data_avg['avg(ad_neutral)']) > ($STDMUL * $data_stddev['stddev(ad_neutral)']))
				$neutral_avg_stddev=1;
			else
				$neutral_avg_stddev=0;
			if(($data[ad_happy] - $data_avg['avg(ad_happy)']) > ($STDMUL * $data_stddev['stddev(ad_happy)']))
				$happy_avg_stddev=1;
			else
				$happy_avg_stddev=0;
			if(($data[ad_sad] - $data_avg['avg(ad_sad)']) > ($STDMUL * $data_stddev['stddev(ad_sad)']))
				$sad_avg_stddev=1;
			else
				$sad_avg_stddev=0;
			if(($data[ad_angry] - $data_avg['avg(ad_angry)']) > ($STDMUL * $data_stddev['stddev(ad_angry)']))
				$angry_avg_stddev=1;
			else
				$angry_avg_stddev=0;
			if(($data[ad_suprised] - $data_avg['avg(ad_suprised)']) > ($STDMUL * $data_stddev['stddev(ad_suprised)']))
				$suprised_avg_stddev=1;
			else
				$suprised_avg_stddev=0;
			if(($data[ad_scared] - $data_avg['avg(ad_scared)']) > ($STDMUL * $data_stddev['stddev(ad_scared)']))
				$scared_avg_stddev=1;
			else
				$scared_avg_stddev=0;
			if(($data[ad_disgusted] - $data_avg['avg(ad_disgusted)']) > ($STDMUL * $data_stddev['stddev(ad_disgusted)']))
				$disgusted_avg_stddev=1;
			else
				$disgusted_avg_stddev=0;
				
			$sum_sad_angry_scared_disgusted = $sad_avg_stddev+$angry_avg_stddev+$scared_avg_stddev+$disgusted_avg_stddev;
			$sum_happy_surprised = $happy_avg_stddev + $suprised_avg_stddev;
			
			if($sum_sad_angry_scared_disgusted > $sum_happy_surprised)
			{
				$ad_valence = -MAX(($data[ad_sad]/$data_max['max(ad_sad)']),($data[ad_angry]/$data_max['max(ad_angry)']),($data[ad_scared]/$data_max['max(ad_scared)']),($data[ad_disgusted]/$data_max['max(ad_disgusted)']));
			}
			else
			{
				if($sum_happy_surprised)
				{
					$ad_valence = MAX(($data[ad_happy]/$data_max['max(ad_happy)']),($data[ad_suprised]/$data_max['max(ad_suprised)']));
				}
				else
				{
					$ad_valence=0;
				}
			}
			//array_push($test_ad_valence,$ad_valence);
			$UPD = "UPDATE analysis_detail SET ad_valence = '$ad_valence' WHERE ad_id = '$data[ad_id]' LIMIT 1";
			eq($UPD,$rs1);
		}
		//print_r($test_ad_valence);die();
	}
}
############################# OK ############
function show_login($msg="" ,$comp_url='')
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;	
	global $Server_company_Path;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	if($R[msg]){$msg=$R[msg];}
	if(!$_SESSION["CompanyId"]){$none="none";}
	get_new_option_list('countries','countries_id','countries_name','',$country_name,0,"",1);
	if($comp_url!="")
		$R[company_url]=$comp_url;
	if($R[company_url])
	{
		if(!get_row_count("company","where company_url='$R[company_url]' limit 0,1"))// if company url not exist
			header("Location:$Server_company_Path");
			
		get_row_con_info("company","where company_url='$R[company_url]' limit 0,1","",$company);
		if(get_upload_info($company[company_id],"company_logo",0,$company_logo)>0)
			$smarty->assign("company_logo", $company_logo[up_small_thumb_view_path]);
		else
			$smarty->assign("company_logo",'http://monetchannel.com/corporate/images/NoLogo.png');		
	}
	
	/// Brand Name and videos
	$records=array();
	
	$SQL="select distinct(company_id),company_url,company_name from company,content where company_id=c_company_id order by company_name";
	eq($SQL,$rs);
	while($data=mfa($rs))
	{
		
		if(get_upload_info($data[company_id],"company_logo",0,$company_logo)>0)
			$data[company_logo]=$company_logo[up_thumb_view_path];
		else
			$data[company_logo]='http://monetchannel.com/corporate/images/NoLogo.png';
			
		$data[video_list]=brand_videos($data[company_id],$data[company_url]);
		array_push($records,$data);
	}
	
	$smarty->assign(array("msg"=>$msg,"none"=>$none,"SERVER_COMPANY_PATH"=>$Server_company_Path,
						 "country_name"=>$country_name,
						 "SERVER_ADMIN_PATH"=>$Server_View_Path."administrator/",
						 "SERVER_PATH"=>$Server_View_Path,
						 "company_url"=>$R[company_url],
						 "company_name"=>$company[company_name],
						 "records"=>$records,"c_id"=>$R[c_id],));
	if($R[Admin]=='admin')// Brand admin login
		$smarty->display("index_brand_admin_login.tpl");
	elseif($R[company_url])
		$smarty->display("index_brand_login.tpl");
	else
		$smarty->display("index_login.tpl");
}
############################# OK ############
function chk_login()
{
	$R = DIN_ALL($_REQUEST);
	$R[company_password]=md5($R[company_password]);
	if(!get_row_con_info("company","where company_email='$R[company_email]' AND company_password='$R[company_password]' AND company_status=1","",$data))
	{
		print "<script>parent.window.return_msg('Incorrect Email/Password.',false);</script>";
		return;
	}
   else
   {#correct pass
		setcookie("CompanyId",$data[company_id],time()+86400);
		setcookie("CompanyName",$data[company_name],time()+86400);
		$_COOKIE[CompanyId]=$data[company_id];
		$_COOKIE[CompanyName]=$data[company_name];

		if(get_upload_info($data[company_id],"company_logo",0,$company_logo)>0)
		{
			setcookie("CompanyLogo",$company_logo[up_thumb_view_path],time()+86400);
			$_COOKIE[CompanyLogo]=$company_logo[up_thumb_view_path];	
			setcookie("CompanyLogoSmall",$company_logo[up_small_thumb_view_path],time()+86400);
			$_COOKIE[CompanyLogoSmall]=$company_logo[up_small_thumb_view_path];	
			
		}
			
		print "<script>parent.window.return_msg();</script>";
		return;
   }
}
###########################################################
function logout()
{
	global $Server_View_Path;
	global $Server_company_Path;
	get_row_con_info("company","where company_id='$_COOKIE[CompanyId]'","company_url",$com);
	if($_COOKIE[CompanyId])
		//$url=$Server_company_Path.$com[company_url]."/admin/";
                $url = "logout.php"; 
	else
		$url=$Server_company_Path;
	
	$_COOKIE[CompanyId]="";
	$_COOKIE[CompanyName]="";
	$_COOKIE[CompanyLogo]="";
	$_COOKIE[CompanyLogoSmall]='';
	setcookie("CompanyId","",time()-86400);
	setcookie("CompanyName","",time()-86400);
	setcookie("CompanyLogo","",time()-86400);
	setcookie("CompanyLogoSmall","",time()-86400);
	
	header("Location:$url");
	die();
	
}
###########################################################
function save_ragistration()
{
	$R=DIN_ALL($_REQUEST);
	global $Server_View_Path;
	if(get_row_count("company","where company_email='$R[company_email]'")>0)
	{
		print "<script>parent.window.return_msg('Email already exist. Please enter another email.',false);</script>";
		return;
	}
	else
	{
		$comp_url=get_company_url($R[company_name]);
		$SQL="INSERT INTO company (`company_name`, `company_email`, `company_password`, `company_address`, `company_country`, `company_zipcode`,company_url) VALUES ('$R[company_name]', '$R[company_email]', '$R[company_reg_password]','$R[company_address]', '$R[company_country]','$R[company_zipcode]','$comp_url')";
		eq($SQL,$rs);
		
		$subject="New company invitation request";
		/*$admin_url=$Server_View_Path."company/";
		$R[admin_url]=$Server_View_Path."administrator/";
		$message="Dear $R[company_name],<br><br>
		Your account successfully created. Your login detail given below:<br><br>
		Username: $R[company_email]<br>
		Password: $R[company_reg_password]<br><br>
		Regards.<br>
		MonetChannel
		";		*/
		$R[admin_url]=$Server_View_Path."administrator/company_invitation.php";
		$message=get_parse_tpl_page("company_signup_mail.tpl",$R);
		//send_mail_new("","","MonetChannel","support@monetchannel.com",$subject,$message);
		
		//send_mail_new($R[company_name],'dinesh.chandra@cynets.com',"MonetChannel","support@monetchannel.com",$subject,$message);
		send_mail_new('','',"MonetChannel","support@monetchannel.com",$subject,$message);
		/*print "<script>parent.window.return_msg('Your account has been successfully created.',false);</script>";*/
		print "<script>parent.window.return_msg('Thank you for registering. We will process your request and send you a conformation on your email shortly.',false);</script>";
		return;
	}
}
###########################################################
function dashboard($msg="")
{
	global $Server_View_Path,$js;
	global $Server_company_Path;
	
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"SERVER_COMPANY_PATH"=>$Server_company_Path,"js"=>$js,
						  "dashboard_tab"=>"selected","SERVER_ADMIN_PATH"=>$Server_View_Path."administrator/"));
	$smarty->display("dashboard.tpl");
}
#############################################################
function dashboard_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp=0)
{
	global $Server_View_Path,$js;
	global $Server_company_Path;;
	$smarty = new Smarty;
	if($nrpp==0)
	{
		global $NRPP; 
		$nrpp=$NRPP;
	}
	
	if(strlen($orderby_p)>0)
	{
		$order="ASC";
		$orderby=$orderby_p;
		if(strlen($order_p)>0)
		{
			$order=$order_p;
		}
		if($order=="ASC")
		{
			$new_order="DESC";
		}
		else
		{
			$new_order="ASC";
		}
	}
	else
	{
		$orderby="c_date DESC";
	}
	
	$SQL="SELECT * ,(SELECT count(*) FROM content_feedback WHERE cf_c_id = c_id AND cf_rating>'0' and cf_ep_id>'0') AS num_feedback FROM content WHERE c_company_id='$_COOKIE[CompanyId]' ORDER BY $orderby $order LIMIT 0,5 ";
	$tot_rows=eq($SQL,$rs);   
	if($tot_rows>0)
	{
		$log_data=array();
		while($data=mfa($rs))
		{
			$data[days_ago]=get_days_ago($data[pfc_date],time());
			array_push($log_data,$data);
		}
	}

	$smarty->assign(array("msg"=>$msg,"l_ll_id"=>$user_data[l_ll_id],"LId"=>$user_data[l_id],
						  "log_data"=>$log_data,"tot_rows"=>$tot_rows,
						  "nb_text"=>$nb_text,"orderby"=>$orderby_p,
						  "st_pos"=>$st_pos_p,"order"=>$order_p,
						 $orderby."_order"=>$new_order,"l_type"=>$user_data[l_type],"SERVER_COMPANY_PATH"=>$Server_company_Path,));
	$ary[0] =$smarty->fetch("view_dashboard.tpl");
	$ary[3]=$callback;
	$ary[4]=$tot_rows;
	return ($ary);
}
#############################################################
function analysis_results($msg="")
{
	$R=DIN_ALL($_REQUEST);
	global $invit_num,$js;
   	$smarty = new Smarty;
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_Upload_Path;
	global $Server_View_Path;
	global $NRPP;
	global $Server_company_Path;
	
	#------- show number of limited records per page
	$no_of_row_per_page=array($NRPP,20,30,40,50);
	if(!$R[nrpp])
		$R[nrpp]=$NRPP;
	
	if(is_array($no_of_row_per_page))
	{
		foreach($no_of_row_per_page as $v)
		{
			if($v==$R[nrpp])
			{
				$sel="selected";
			}
			$op_nrpp .="<option value='$v' $sel>$v</option>";
			$sel="";
		}
	}
	$SQL_CON='';
	if($R[c_id] and $R[c_id]!=-2)$SQL_CON.= "AND c_id = '$R[c_id]'";
	if($R[cat_id]>0)$SQL_CON.= "AND c_id IN (Select cv_c_id from category_video where cv_cat_id='$R[cat_id]')";
	if($R[user_id] and $R[user_id]!=-2) $SQL_CON.= "AND user_id = '$R[user_id]'";
	
	$SQL="SELECT * FROM analysis_results left join content_feedback on cf_id=ar_cf_id left join users on cf_user_id=user_id left join content on  c_id=cf_c_id WHERE ar_id IN (SELECT DISTINCT(ad_ar_id) FROM analysis_detail) $SQL_CON AND c_company_id='$_COOKIE[CompanyId]' ORDER BY cf_id DESC ";// AND c_category IN (SELECT cat_name FROM category)
	$tot_rows=eq($SQL,$rs);
	get_nb_text_multi($tot_rows,"records",$R[st_pos],$con_limit,$nb_text,$R[nrpp]);
	$SQL=$SQL.$con_limit;
	eq($SQL,$rs);
	if($tot_rows>0)
	{
		$records=array();
		while($data=mfa($rs))
		{
			$data[cat_name]=implode(", ",get_value_ary("category_video left join category on cv_cat_id=cat_id","cat_name","where cv_c_id='$data[c_id]'"));
			get_row_con_info("emotional_profile","where ep_id = '".$data[cf_ep_id]."'","ep_name",$emo);
			if($data[ar_disabled]==1)
				$data[row_bg]="#FC9";
			else
				$data[row_bg]="#ffffff";	
			$data[ep_name]=$emo[ep_name];
			$c_ids.=$data[c_id].',';
			get_average_of_valence_rows($data[ar_id],$data[percent]);
			//print "Video: $data[c_title] ".$percent."<br>";
			array_push($records,$data);
		}
	}
	
	get_new_option_list("content left join content_feedback on cf_c_id=c_id left join analysis_results on cf_id=ar_cf_id","c_id","c_title",$R[c_id],$content_option,"1","WHERE ar_id IN (SELECT ad_ar_id FROM analysis_detail) AND c_company_id='$_COOKIE[CompanyId]'  ORDER BY c_title","0","DISTINCT c_id,c_title");
		
	get_new_option_list("category","cat_id","cat_name",$R[cat_id],$category_option,1,"");
		
	get_new_option_list_full_name("analysis_results left join content_feedback on cf_id=ar_cf_id left join users on cf_user_id=user_id left join content on  c_id=cf_c_id","user_id","user_fname","user_lname",$R[user_id],$users_option,"1","WHERE ar_id IN (SELECT ad_ar_id FROM analysis_detail) AND c_company_id='$_COOKIE[CompanyId]' ORDER BY user_fname,user_lname","0","DISTINCT user_id,user_fname,user_lname");
	
	$smarty->assign(array("category_option"=>$category_option,"content_option"=>$content_option,"users_option"=>$users_option,"msg"=>$msg,"invit_num"=>$invit_num,"analysis"=>$records,"st_pos"=>$R[st_pos],"nb_text"=>$nb_text,"nrpp"=>$R[nrpp],"op_nrpp"=>$op_nrpp,"tot_rows"=>$tot_rows,"ICON_PATH"=>$Server_Icon_Path,"import_tab"=>"selected","SERVER_PATH"=>$Server_View_Path,"js"=>$js,"SERVER_ADMIN_PATH"=>$Server_View_Path."administrator/","SERVER_COMPANY_PATH"=>$Server_company_Path));
	$smarty->display("analysis_results.tpl");
}
##############################################


function company_profile_edit($msg='')
{
	global $js,$View_Path;	
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	get_row_con_info("company","where company_id='$_COOKIE[CompanyId]'","",$company);
	get_new_option_list('countries','countries_id','countries_name',$company[company_country],$country_name,0,"");
	$smarty->assign($company);
	
	get_row_con_info("uploads"," where up_s_id='$_COOKIE[CompanyId]' and up_s_type='company_logo'","",$up);
	$smarty->assign(array("msg"=>$msg,
						   "act"=>"company_profile_update",
						   "heading"=>"Edit",
						   "country_name"=>$country_name,
						   "pass"=>'none',
						   "up_thumb_view_path"=>$View_Path.$up[up_fname].$up[up_ext],
						   "file_name"=>$up[up_oname],"profile_tab"=>"selected"
					  ));
	$smarty->display('add_company.tpl');
}


function company_profile_update()
{
	$R=DIN_ALL($_REQUEST);
	if(get_row_count("company","where company_email='$R[company_email]' AND company_id<> '$R[company_id]'")>0)
	{
		company_profile_edit('Company name already exist. Please enter another company name.');
		return;
	}
	else
	{
		if($R[company_password])
			$company_password= "company_password = '".md5($R[company_password])."',";
		else	
			$company_password='';	
			
		$SQL="update company set company_name='$R[company_name]',
								 company_email = '$R[company_email]',
								 ".$company_password."
								 company_address = '$R[company_address]',
								 company_country = '$R[company_country]',
								 company_zipcode = '$R[company_zipcode]',
								 company_contactno = '$R[company_contactno]' where company_id='$R[company_id]'";
		eq($SQL,$rs);
		
		if(strlen($_FILES[company_logo]['name'])>0)
		{
			upload_file_new("company_logo",$R[company_id],"company_logo",0,$msg,"Company Logo",1);
		
			if(get_upload_info($R[company_id],"company_logo",0,$company_logo)>0)
			{
				setcookie("CompanyLogo",$company_logo[up_thumb_view_path],time()+86400);
				$_COOKIE[CompanyLogo]=$company_logo[up_thumb_view_path];
				setcookie("CompanyLogoSmall",$company_logo[up_small_thumb_view_path],time()+86400);
				$_COOKIE[CompanyLogoSmall]=$company_logo[up_small_thumb_view_path];	
			}
		}
		company_profile_edit('Your account update successfully.');
	}
}


function save_invites_request()
{
	$R=DIN_ALL($_REQUEST);
	//print_r($_REQUEST);
	global $Server_View_Path;
	
 	if(get_row_count("invites_request","where invr_eamil='$R[user_email]'")>0 || get_row_count("users","where user_email = '$R[user_email]' AND user_email !=''"))
	{
		//show_prelogin_page("<br>User email '$R[user_email]' already exists.");
		
		print "<script>parent.window.return_msg('User email $R[user_email] already exists.',false);</script>";
		return;
	}
	else
	{
		get_row_con_info("company","where company_url='$R[company_url]' limit 0,1","company_id,company_name",$company);
		$user_dob=$R[dob_mm]."/".$R[dob_dd]."/".$R[dob_yy];
		$SQL="INSERT INTO `invites_request` ( `invr_fname` , `invr_lname` , `invr_eamil` , `invr_date`,`invr_gender`,`invr_dob`,`invr_country`,`invr_zipcode`,invr_company_id)VALUES ( '$R[user_fname]', '$R[user_lname]', '$R[user_email]','".time()."','$R[user_gender]','$user_dob','$R[user_country]','$R[user_zipcode]','$company[company_id]')";
		eq($SQL,$rs);
		$subject="New Invitation Request From ".$company[company_name];
		$admin_url=$Server_View_Path."administrator/";
		$user[name]=$R[user_fname]." ".$R[user_lname];
		$user[email]=$R[user_email];
		$user[admin_url]=$Server_View_Path."administrator/";
		/*$message="A new Invitation request has been received. Details are as below : <br>
		Name: $R[user_lname] <br>
		Email: $R[user_email]<br>
		
		<a href='".$admin_url."'>Click here</a> to login to the admin to approve/deny this request";*/
		$message=get_parse_tpl_page("signup_mail.tpl",$user);
		///send_mail_new("","","MonetChannel","support@monetchannel.com",$subject,$message);
		send_mail_new("","","MonetChannel","dinesh.chandra@cynets.com",$subject,$message);
		
		print "<script>parent.window.return_msg('Thank you for registering. We will process your request and send you a conformation on your email shortly.',false);</script>";
        return;
	    }
}


function chk_login_brand()
{
	$R=DIN_ALL($_REQUEST);
	global $Server_View_Path;
	$R[user_password]=md5($R[user_password]);
	if(!get_row_con_info("users","where user_email='$R[user_email]' AND user_password='$R[user_password]'","",$user))
	{
		//show_prelogin_page();
		print "<script>parent.window.return_brand_msg('Incorrect Email/Password.',false,'".$R[uf_id]."','');</script>";
		return;
	}
	else
	{
		get_row_con_info("company","where company_url='$R[company_url]' limit 0,1","",$company);
		$_COOKIE[BrandId]=$company[company_id];
		$_SESSION[user_accept_toc]=$user[user_accept_toc];
		$_COOKIE[UserId]=$user[user_id];
		$_COOKIE[UserName]=$user[user_fname]." ".$user[user_lname];
		if($R[remember]==1)
		{
			setcookie("BrandId",$company[company_id],time()+86400,"/",'.monetchannel.com');
			setcookie("UserId",$user[user_id],time()+864000,"/",'.monetchannel.com');
			setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+864000,"/",'.monetchannel.com');
		}
		else
		{

			if($_SERVER['REMOTE_ADDR']!='192.168.5.22' && $_SERVER['REMOTE_ADDR']!='192.168.5.240')
			{
				setcookie("BrandId",$company[company_id],time()+86400,"/",'.monetchannel.com');
				
				setcookie("UserId",$user[user_id],time()+86400,"/",'.monetchannel.com');
				setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400,"/",'.monetchannel.com');
			}
			else
			{
				setcookie("BrandId",$company[company_id],time()+86400,"/");
				setcookie("UserId",$user[user_id],time()+86400,"/");
				setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400,"/");
			}
		}
		
		print "<script>parent.window.return_brand_msg('',true,'$user[user_accept_toc]','".$R[uf_id]."','".$R[c_id]."');</script>";
	}	
}

function brand_videos($company_id,$company_url)
{
	$smarty = new Smarty;
	$records=array();
	if($company_id!='')
	{
		$SQL="select * from content where c_company_id='$company_id' order by c_id limit 0,5";
		eq($SQL,$rs);
		while($data=mfa($rs))
		{
			array_push($records,$data);
		}
		
		$smarty->assign(array("SERVER_COMPANY_PATH"=>$Server_company_Path,
							 "records"=>$records,"company_url"=>$company_url));
		return $smarty->fetch("brand_videos.tpl");
	}
}

function facebook()
{
	$json_str = $_POST['json'];
	$json_str = stripslashes($json_str);
	$json = json_decode($json_str,true);
	if($json['gender']=='male')
		$json['gender'] = 'Male';
	else
		$json['gender'] = 'Female';


	if(get_row_count("invites_request","where invr_eamil='$json[email]'"))
	{
		print -2;
		die();
	}

	if(!get_row_con_info("users","where user_email='$json[email]' and user_fname='$json[first_name]'","",$user) && !get_row_count("invites_request","where invr_eamil='$json[email]'"))
	{
		if($json[first_name]!='' && $json[last_name]!="" && $json[email]!='')
		{
		get_row_con_info("company","where company_url='$_REQUEST[company_url]' limit 0,1","company_id,company_name",$company);
		
		$SQL="INSERT INTO `invites_request` ( `invr_fname` , `invr_lname` , `invr_eamil` , `invr_date`,`invr_gender`,`invr_dob`,`invr_country`,`invr_zipcode`,invr_company_id)VALUES ( '$json[first_name]', '$json[last_name]', '$json[email]','".time()."','$json[gender]','','','','$company[company_id]')";
		eq($SQL,$rs);
		$subject="New Invitation Request From ".$company[company_name];
		$admin_url=$Server_View_Path."administrator/";
		$user[name]=$json[first_name]." ".$json[last_name];
		$user[email]=$json[email];
		$user[admin_url]=$Server_View_Path."administrator/";
		$message=get_parse_tpl_page("signup_mail.tpl",$user);
		///send_mail_new("","","MonetChannel","support@monetchannel.com",$subject,$message);
		send_mail_new("","","MonetChannel","dinesh.chandra@cynets.com",$subject,$message);
			
			
			/*
			$SQL = "INSERT into users (user_flag,user_fname,user_lname,user_gender,user_dob,user_email,user_password,user_max_invites,user_accept_toc,user_zipcode,user_country,user_company_id)";
			$SQL= $SQL."VALUES(1,'$json[first_name]','$json[last_name]','$json[gender]','$json[birthday]','$json[email]','fb_login',10,1,0,0,0)";
			
			$SQL = mysql_query($SQL) or die(mysql_errno());*/
			
			print -1;
		}
		
	}
	
	if($user[user_id]>0)
	{
		$_SESSION[user_accept_toc]=$user[user_accept_toc];
		$_COOKIE[UserId]=$user[user_id];
		$_COOKIE[UserName]=$user[user_fname]." ".$user[user_lname];
		setcookie("UserId",$user[user_id],time()+86400);
		setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400);
		
		
		get_row_con_info("company","where company_url='$_REQUEST[company_url]' limit 0,1","",$company);
		
		
		$_COOKIE[fbLogin]=$company[company_id];
		setcookie("fbLogin",$company[company_id],time()+86400,"/",'.monetchannel.com');
		
		$_COOKIE[BrandId]=$company[company_id];
		setcookie("BrandId",$company[company_id],time()+86400,"/",'.monetchannel.com');
		
		setcookie("UserId",$user[user_id],time()+86400,"/",'.monetchannel.com');
		setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400,"/",'.monetchannel.com');
		
		print 1;
		/*if($_REQUEST[c_id])
			$path="http://monetchannel.com/play_video.php?c_id".$_REQUEST[c_id];
		else
			$path="http://www.monetchannel.com/monet_channel.php?view=unrated";	
		header("Location:$path");
		die();*/
	}
	
	
}
?>
