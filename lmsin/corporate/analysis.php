<?php
include ("../includes/common.php");
init();
$from=3;
//.........................................
sajax_export("analysis_graph","analysis_results");
sajax_handle_client_request();
$js = sajax_return_javascript();

$func_ary=array("analysis_results","analysis_graph","analysis_graph_avg_coord","view_feedback","compare_youtube","analysis_csv","video_section","play_video","generate_code",'compare_video_analysis');

####################################
if($_COOKIE[CompanyId]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}

if(fe($_REQUEST[act]))
{
  $_REQUEST[act]($_REQUEST[msg]);
   die();
}

analysis_results($msg="");
die();

########################################
# BEGIN VIDEO SECTION 
########################################
function analysis_results($msg="")
{
	$R=DIN_ALL($_REQUEST);
	$_REQUEST[act]='analysis_results';// For breadcrumb
	global $invit_num,$js;
   	$smarty = new Smarty;
	global_function($smarty);
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
	$SQL_CON='';$search_msg=0;
	if($R[c_id] and $R[c_id]!=-2)
	{
		$SQL_CON.= "AND c_id = '$R[c_id]'";
		$search_msg=1;
	}
	
	if($R[cat_id]>0)
	{
		$SQL_CON.= "AND c_id IN (Select cv_c_id from category_video where cv_cat_id='$R[cat_id]')";
		$search_msg=1;
	}
		
	if($R[user_id] and $R[user_id]!=-2)
	{
		$SQL_CON.= "AND user_id = '$R[user_id]'";
		$search_msg=1;
	}
	
	$SQL="SELECT * FROM `analysis_results` left join `content_feedback` on ar_cf_id=cf_id left join users on user_id=cf_user_id left join `content` on c_id=cf_c_id where c_company_id='$_COOKIE[CompanyId]' order by cf_id DESC"; // AND c_category IN (SELECT cat_name FROM category)
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
			get_row_con_info("emotional_profile","where ep_id = '".$data[cf_ep_id]."' limit 0,1","ep_name",$emo);
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
	
	$active_compare_tab='';
	$active_analysis_tab='';
	if($R[type]=='compare_videos')
		$active_compare_tab='label';
	else
		$active_analysis_tab='label';
		
	
	$smarty->assign(array("category_option"=>$category_option,"content_option"=>$content_option,"users_option"=>$users_option,"msg"=>$msg,"invit_num"=>$invit_num,"analysis"=>$records,"st_pos"=>$R[st_pos],"nb_text"=>$nb_text,"nrpp"=>$R[nrpp],"op_nrpp"=>$op_nrpp,"tot_rows"=>$tot_rows,"ICON_PATH"=>$Server_Icon_Path,"import_tab"=>"selected","SERVER_PATH"=>$Server_View_Path,"js"=>$js,"SERVER_ADMIN_PATH"=>$Server_View_Path."administrator/","SERVER_COMPANY_PATH"=>$Server_company_Path,"search_msg"=>$search_msg,
	"analysis_tab"=>'analysis-selected',
	"active_analysis_tab"=>$active_analysis_tab,
	"type"=>$R[type],
	"active_compare_tab"=>$active_compare_tab,
	));
	$smarty->display("analysis_results.tpl");
}
#######################################################################################################
function analysis_graph()
{
	$R=DIN_ALL($_REQUEST);
   	$smarty = new Smarty;
	global_function($smarty);
	global $Server_View_Path;
	global $Server_company_Path;
	get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' limit 0,1","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);	
	
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$vd[c_id]' ");
	
        $ar_ids = implode(',',$ary);
	if(!$ar_ids)$ar_ids=0;
	if(get_row_count("analysis_results_average","where ara_c_id='$vd[c_id]' limit 0,1")>0)
	{
		//analysis_graph_avg_coord($avg_time,$avg_valence);
		analysis_graph_avg_coord($vd[c_id],$avg_time,$avg_valence);			//function defined in line 175 in this page
	}
	analysis_graph_coord($time,$valence);									//function defined in line 190 in this page
	get_new_option_list_full_name("analysis_results left join content_feedback on cf_id=ar_cf_id left join users on cf_user_id=user_id left join content on  c_id=cf_c_id","user_id","user_fname","user_lname",'',$compare_option,0,"WHERE user_id<>'$vd[cf_user_id]' and  cf_c_id='$vd[c_id]' and ar_id IN (SELECT ad_ar_id FROM analysis_detail where ad_ar_id IN ($ar_ids))  ORDER BY user_fname,user_lname",1,"DISTINCT user_id,user_fname,user_lname");
	
	
	if($vd[cf_date]!=0)
		$vd[cf_date]=date("M d,Y",$vd[cf_date]);
	else
		$vd[cf_date]="-";
        
      

	$smarty->assign(array("avg_img"=>$avg_img,
						"ad_valence"=>$valence,
						"avg_ad_valence"=>$avg_valence,
						"ad_time"=>$time,
						"compare_option"=>$compare_option,
						"c_id"=>$vd[c_id],
						"cf_id"=>$vd[cf_id],
						"user_name"=>$vd[user_fname]." ".$vd[user_lname],
						"video_title"=>$vd[c_title],
						'cf_date'=>$vd[cf_date],
						"avg_ad_time"=>$avg_time,
						"video_url"=>$Server_View_Path."video_files/".$vd[cf_id].".flv",
						"video_id"=>get_video_id($vd[c_url]),
						"SERVER_COMPANY_PATH"=>$Server_company_Path,
						"SERVER_PATH"=>$Server_View_Path,
						"act"=>'analysis_graph',"analysis_tab"=>'analysis-selected',"active_analysis_tab"=>'label',
	));
	$smarty->display("video_graph.tpl");
}
####################################################################################################################
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

function compare_youtube()
{
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	global_function($smarty);
	$ids=explode(",",$R[ar_ids]);
	$i=1;
	if(count($ids)>0)
	{
		foreach($ids as $id)
		{
			if($id>0)
			{
				analysis_graph_coord($time,$valence,$id);
				get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join content on cf_c_id=c_id","where ar_id='$id'","c_title,c_url,c_tot_positive,c_tot_negative",$data);
				
				$smarty->assign(array("time_".$i=>$time,
									"valence_".$i=>$valence,
									"c_tot_positive_".$i=>$data[c_tot_positive],
									"c_tot_negative_".$i=>$data[c_tot_negative],
									"c_title_".$i=>addslashes($data[c_title]),
									"positive_spike_".$i=>$positive_spike,
									"negative_spike_".$i=>$negative_spike,
									"pos_".$i=>$pos,"neg_".$i=>$neg,
									"video_id_".$i=>get_video_id($data[c_url]),
				));
				$i++;
			}
		}
	}
	$smarty->assign(array("total"=>count($ids),"analysis_tab"=>'analysis-selected',"active_analysis_tab"=>'label',));
	$smarty->display("compare_youtube.tpl");
	
}
###############################################################################################################################
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
		print "$data[ad_time],$data[ad_neutral],$neutral_avg_stddev,$data[ad_happy],$happy_avg_stddev,$data[ad_sad],$sad_avg_stddev,$data[ad_angry],$angry_avg_stddev,$data[ad_suprised],$suprised_avg_stddev,$data[ad_scared],$scared_avg_stddev,$data[ad_disgusted],$disgusted_avg_stddev,$data[ad_valence],$mean,\n";
	}
}

##############################################################################################################################
function video_section()
{
	$R=DIN_ALL($_REQUEST);
	global $js;
	set_time_limit(0);
   	$smarty = new Smarty;
	global_function($smarty);
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_Upload_Path;
	global $Server_View_Path;
	global $NRPP;
	global $invit_num,$company_invite_num;
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
	if($R[valence_from]!=-2 && $R[valence_from] && $R[valence_to]!=-2 && $R[valence_to])
	{
		if($R[valence_from]>$R[valence_to])
			$SQL_CON.="and ara_valence<'$R[valence_from]' and ara_valence>'$R[valence_to]'";
		else if($R[valence_from]<$R[valence_to])	
			$SQL_CON.="and ara_valence<'$R[valence_to]' and ara_valence>'$R[valence_from]'";
	}
	else if($R[valence_from] && $R[valence_from]!=-2)
		$SQL_CON.="and ara_valence>'$R[valence_from]'";
	else if($R[valence_to] && $R[valence_to]!=-2)	
		$SQL_CON.="and ara_valence<'$R[valence_to]'";
	
	if($R[valence_to]>0 && $R[valence_from]>0)$val="MAX";
	else if(($R[valence_to]<0 && $R[valence_to]!=-2 && $R[valence_from]<0 && $R[valence_from]!=-2) || ($R[valence_to]<0 && $R[valence_from]>0))$val="MIN";
	else $val="MAX";
	
	$SQL="SELECT c_id as c_id,c_title,c_url,c_company_id,(Select count(ara_valence) from analysis_results_average where ara_c_id=c_id $SQL_CON) as total_vlc,(Select MIN(ara_time) from analysis_results_average where ara_c_id=c_id $SQL_CON) as ar_time,(select MAX(ara_time) from analysis_results_average where ara_c_id=c_id $SQL_CON)  as max_time,(Select (MAX(ara_time)-ar_time) from analysis_results_average where ara_c_id=c_id) as diff_time FROM content where c_company_id='$_COOKIE[CompanyId]' AND c_id IN (Select DISTINCT(ara_c_id) from analysis_results_average  WHERE 1 $SQL_CON) having diff_time>5  ORDER BY total_vlc DESC ";
	$tot_rows=eq($SQL,$rs);
	get_nb_text_multi($tot_rows,"records",$R[st_pos],$con_limit,$nb_text,$R[nrpp]);
	$SQL=$SQL.$con_limit;
	eq($SQL,$rs);
	if($tot_rows>0)
	{
		$records=array();
		while($data=mfa($rs))
		{
			////Fetch Video ID for flash parameter /////////////////
			$data[video_id]=get_video_id($data[c_url]);
			$data[time_slice]=get_time_slice($data[c_id],$R[valence_from],$R[valence_to],$R[time_segment]);
			/////Fetch start and end time ////////////////
			$data[start_time]=round($data[ar_time]);
			$data[end_time]=round($data[max_time]);
			//$data[end_time]=$data[start_time]+10;
			if($data[end_time]>=round($data[max_time]))	$data[end_time]=round($data[max_time]);	
			/////////Time Formating ///////////////////////
			$data[en_time]=sec2hms($data[end_time]);
			$data[st_time]=sec2hms($data[start_time]);
			array_push($records,$data);
		}
	}
	
	//////////Range drop down selection /////////////
	$vlc_from=$R[valence_from];
	$vlc_to=$R[valence_to];
	$R[valence_from]=str_replace("-.","minus",$R[valence_from]);
	$R[valence_from]=str_replace("-","minuswhole",$R[valence_from]);
	$R[valence_to]=str_replace("-.","minus",$R[valence_to]);
	$R[valence_to]=str_replace("-","minuswhole",$R[valence_to]);
	
	$R[valence_from]=str_replace(".","plus",$R[valence_from]);
	$R[valence_to]=str_replace(".","plus",$R[valence_to]);
	
	
	$smarty->assign(array("msg"=>$msg,"videos"=>$records,"st_pos"=>$R[st_pos],"nb_text"=>$nb_text,"nrpp"=>$R[nrpp],"op_nrpp"=>$op_nrpp,"tot_rows"=>$tot_rows,"ICON_PATH"=>$Server_Icon_Path,"import_tab"=>"selected","SERVER_PATH"=>$Server_View_Path,"js"=>$js,"valence_from_".$R[valence_from]=>"selected","valence_to_".$R[valence_to]=>"selected","valence_from"=>$vlc_from,"valence_to"=>$vlc_to,"time_segment"=>$R[time_segment],"invit_num"=>$invit_num,"company_invite_num"=>$company_invite_num,"analysis_tab"=>'analysis-selected',
	"premium_tab"=>'label'));

	$smarty->display("video_section.tpl"); 
}

###################################################################################################################################
function get_time_slice($c_id,$from=-1,$to=1,$time_segment_length=5)
{
	if($time_segment_length==0)
		$time_segment_length=5;
	$R[valence_from]=$from;
	$R[valence_to]=$to;
	if($R[valence_from]!=-2 && $R[valence_from] && $R[valence_to]!=-2 && $R[valence_to])
	{
		if($R[valence_from]>$R[valence_to])
			$SQL_CON.="and ara_valence<'$R[valence_from]' and ara_valence>'$R[valence_to]'";
		else if($R[valence_from]<$R[valence_to])	
			$SQL_CON.="and ara_valence<'$R[valence_to]' and ara_valence>'$R[valence_from]'";
	}
	else if($R[valence_from] && $R[valence_from]!=-2)
		$SQL_CON.="and ara_valence>'$R[valence_from]'";
	else if($R[valence_to] && $R[valence_to]!=-2)	
		$SQL_CON.="and ara_valence<'$R[valence_to]'";
	$time=array();	
	$SQL="Select ara_time from analysis_results_average where ara_c_id='$c_id' $SQL_CON order by ara_time ASC";
	eq($SQL,$rs);
	while($data=mfa($rs))
	{
		$data[ara_time]=intval($data[ara_time]);	
		if($data[ara_time]>$last)
		{
			$data[end_time]=$data[ara_time]+$time_segment_length;
			$data[time_slice]=$data[ara_time]."-".$data[end_time];
			array_push($time,$data[time_slice]);
			$last=$data[end_time];
		}
		
	}
	$time_slice=implode(",",$time);
	return $time_slice; 

}

################################################################################################################################
function play_video()
{
   	$smarty = new Smarty;
	global_function($smarty);
	analysis_graph_avg_coord($_REQUEST[c_id],$avg_time,$avg_valence);
	get_row_con_info("content","where c_id='$_REQUEST[c_id]' limit 0,1","c_title",$video);
	$smarty->assign(array("start_time"=>$_REQUEST[start_time],
						"end_time"=>$_REQUEST[end_time],
						"video_id"=>$_REQUEST[video_id],
						"video_title"=>$video[c_title],
						"avg_valence"=>$avg_valence,
						"time_slice"=>get_time_slice($_REQUEST[c_id],$_REQUEST[vlc_from],$_REQUEST[vlc_to],$_REQUEST[time_segment]),
						"avg_time"=>$avg_time,"analysis_tab"=>'analysis-selected',
	"active_video_tab"=>'label'
	));
	$smarty->display("video_section_play.tpl");
}


function generate_code()
{
	$R=DIN_ALL($_REQUEST);
   	$smarty = new Smarty;
	global_function($smarty);
	global $Server_View_Path;
	global $Server_company_Path;
	get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' limit 0,1","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);	
	
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$vd[c_id]' ");
	$ar_ids = implode(',',$ary);
	if(!$ar_ids)$ar_ids=0;
	if(get_row_count("analysis_results_average","where ara_c_id='$vd[c_id]' limit 0,1")>0)
	{
		analysis_graph_avg_coord($vd[c_id],$avg_time,$avg_valence);
	}
	analysis_graph_coord($time,$valence);	
	get_new_option_list_full_name("analysis_results left join content_feedback on cf_id=ar_cf_id left join users on cf_user_id=user_id left join content on  c_id=cf_c_id","user_id","user_fname","user_lname",'',$compare_option,0,"WHERE user_id<>'$vd[cf_user_id]' and  cf_c_id='$vd[c_id]' and ar_id IN (SELECT ad_ar_id FROM analysis_detail where ad_ar_id IN ($ar_ids))  ORDER BY user_fname,user_lname",1,"DISTINCT user_id,user_fname,user_lname");
	
	
	if($vd[cf_date]!=0)
		$vd[cf_date]=date("M d,Y",$vd[cf_date]);
	else
		$vd[cf_date]="-";
	
	$smarty->assign($R);
	$smarty->assign(array("avg_img"=>$avg_img,
						"ad_valence"=>$valence,
						"avg_ad_valence"=>$avg_valence,
						"ad_time"=>$time,
						"compare_option"=>$compare_option,
						"c_id"=>$vd[c_id],
						"cf_id"=>$vd[cf_id],
						"user_name"=>$vd[user_fname]." ".$vd[user_lname],
						"video_title"=>$vd[c_title],
						'cf_date'=>$vd[cf_date],
						"avg_ad_time"=>$avg_time,
						"video_url"=>$Server_View_Path."video_files/".$vd[cf_id].".flv",
						"video_id"=>get_video_id($vd[c_url]),
						"SERVER_COMPANY_PATH"=>$Server_company_Path,
						"SERVER_PATH"=>$Server_View_Path,
						"analysis_tab"=>'analysis-selected',"active_video_analysis_tab"=>'label',
	));
	$smarty->display("generate_code.tpl");
}

function compare_video_analysis()
{
	$R=DIN_ALL($_REQUEST);
   	$smarty = new Smarty;
	global_function($smarty);
	global $Server_View_Path;
	global $Server_company_Path;
	
	if(is_array($_REQUEST[vode_id]))
	{
		foreach($_REQUEST[vode_id] as $k=>$v)
		{
			
		}	
		
	}
		
	get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join users on cf_user_id=user_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]' limit 0,1","c_id ,c_url,cf_id,cf_user_id,user_lname,user_fname,c_title,cf_date",$vd);	
	
	$ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$vd[c_id]' ");
	$ar_ids = implode(',',$ary);
	if(!$ar_ids)$ar_ids=0;
	if(get_row_count("analysis_results_average","where ara_c_id='$vd[c_id]' limit 0,1")>0)
	{
		analysis_graph_avg_coord($vd[c_id],$avg_time,$avg_valence);
	}
	analysis_graph_coord($time,$valence);	
	get_new_option_list_full_name("analysis_results left join content_feedback on cf_id=ar_cf_id left join users on cf_user_id=user_id left join content on  c_id=cf_c_id","user_id","user_fname","user_lname",'',$compare_option,0,"WHERE user_id<>'$vd[cf_user_id]' and  cf_c_id='$vd[c_id]' and ar_id IN (SELECT ad_ar_id FROM analysis_detail where ad_ar_id IN ($ar_ids))  ORDER BY user_fname,user_lname",1,"DISTINCT user_id,user_fname,user_lname");
	
	
	if($vd[cf_date]!=0)
		$vd[cf_date]=date("M d,Y",$vd[cf_date]);
	else
		$vd[cf_date]="-";
	
	$smarty->assign($R);
	$smarty->assign(array("avg_img"=>$avg_img,
						"ad_valence"=>$valence,
						"avg_ad_valence"=>$avg_valence,
						"ad_time"=>$time,
						"compare_option"=>$compare_option,
						"c_id"=>$vd[c_id],
						"cf_id"=>$vd[cf_id],
						"user_name"=>$vd[user_fname]." ".$vd[user_lname],
						"video_title"=>$vd[c_title],
						'cf_date'=>$vd[cf_date],
						"avg_ad_time"=>$avg_time,
						"video_url"=>$Server_View_Path."video_files/".$vd[cf_id].".flv",
						"video_id"=>get_video_id($vd[c_url]),
						"SERVER_COMPANY_PATH"=>$Server_company_Path,
						"SERVER_PATH"=>$Server_View_Path,
						"act"=>'analysis_graph',"analysis_tab"=>'analysis-selected',"active_video_analysis_tab"=>'label',
	));
	$smarty->display("compare_video_analysis.tpl");
}
?>