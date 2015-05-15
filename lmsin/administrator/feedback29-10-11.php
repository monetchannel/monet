<?php
include("zip.lib.php");
include ("../includes/common.php");
include ("includes/globals.php");
init();
//.........................................
sajax_export("feedback_view");
sajax_handle_client_request();
$js = sajax_return_javascript();
//.........................................
$func_ary=array("report_export","feedback_view","watch_video");
###################### Ok #####################################
if($_SESSION["Admin"]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}
if(fe($_REQUEST[act]))
{

  $_REQUEST[act]($_REQUEST[msg]);
   die();
}
feedback_index();
die();
#################################### BEGIN FEEDBACK SECTION ###################################
function feedback_index($msg='')
{
	global $js,$Server_View_Path;
	global $invit_num;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,"feedback_tab"=>"selected","invit_num"=>$invit_num));
	$smarty->display('feedback.tpl');
}
function feedback_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0,$v_title=0,$date_from="",$date_to="",$v_user=0,$se_emo=0,$se_re1=0,$rate="rated")
{
	$R=DIN_ALL($_REQUEST);
	if($R[type]=='export')// This is used when we export data
	{
		if($R[orderby])
			$orderby_p=$R[orderby];
			
		if($R[order])
			$order_p=$R[order];
			
		if($R[st_pos])
			$st_pos_p=$R[st_pos];
		
		if($R[nrpp])
			$nrpp_p=$R[nrpp];
			
		if($R[v_title])
			$v_title=$R[v_title];	
			
		if($R[date_from])
			$date_from=$R[date_from];
		
		if($R[date_to])
			$date_to=$R[date_to];
		
		if($R[v_user])
			$v_user=$R[v_user];
		
		if(is_array($_REQUEST[se_emo]))
			$se_emo=implode(",",$_REQUEST[se_emo]);
			
		 if(is_array($_REQUEST[se_re1]))
			$se_re1=implode(",",$_REQUEST[se_re1]);
		
		if($R[rate])
			$rate=$R[rate];
	}
	
	global $Upload_Path;
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_Upload_Path;
	global $Server_View_Path;
	global $NRPP;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
   #-------------- Sorting ----------
   $orderby="cf_date";
   $order="DESC";
   $new_order="";
   if($orderby_p)
   {
      $order="DESC";
      $orderby=$orderby_p;
      if($order_p)
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
   	$orderby="cf_date";
   }
   $no_of_row_per_page=array($NRPP,20,30,40,50);
   $default=20;
   if(is_array($no_of_row_per_page))
   {
   		foreach($no_of_row_per_page  as $k=>$v)
		{
			if($k==$default OR $v==$nrpp_p)
			{
				$sel="selected";
			}
			$nrppOpt .="<option value='$v' $sel>$v</option>";
			$sel="";
		}
   }
   $se_emo=explode(",", $se_emo);
   if(is_array($se_emo))
	{
		$se_emo_ids=implode(",",$se_emo);
		if($se_emo_ids)
		{
			$con.=" AND cf_ep_id IN ( $se_emo_ids )";
		}
	}
	$se_re1=explode(",",$se_re1);
   if(is_array($se_re1))
	{
		$se_re1_ids=implode(",",$se_re1);
		if($se_re1_ids)
		{
			$con.=" AND cf_rating IN ($se_re1_ids)";
		}		
		foreach($se_re1 as $k=>$v)
		{
			 $smarty->assign(array("re1_".$v=>"selected"));
		}
	}
   if($rate=="")$con.=" and cf_ep_id>0";
  
   if($rate=='rated')
   {
   		$con.=" and cf_ep_id>0";
		$unrated_hide="";
   }
   if($rate=='unrated')
   {
   		$con.=" and cf_rating='-1' and cf_ep_id='-1'";
		$unrated_hide="none";
   }
   
   if($v_title>0){$con.=" and cf_c_id='$v_title'";}
   if($v_user>0) $con.=" and cf_user_id='$v_user'";
  if($date_from!="") 
   {
	   $date_from=get_date_to_mktime($date_from);
	   $con.=" and cf_date>='$date_from'";
   }
   if($date_to!="")
   {
		$date_to=get_date_to_mktime($date_to);
		$con.=" and cf_date<='$date_to'";
   }
   //Exprot data
	if($R[type]=='export')
	{
		$export_data="\"User Name\",\"Video Name\",\"Comment\",\"Date\",\"Monet Profile\",\"Rating\",\"Video File Name\"\n";
		$zip = new zipfile();
	}
   
   
   $SQL="select * from content_feedback left join content on cf_c_id=c_id left join users on cf_user_id=user_id left join emotional_profile on cf_ep_id=ep_id where 1 $con ORDER BY $orderby $order $con_limit";
   $tot_rows=eq($SQL,$rs);
   if($R[type]!='export')
   {
	   get_nb_text_multi($tot_rows,"Feedback",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
	   $SQL=$SQL.$con_limit;
	   eq($SQL,$rs); 
   }
   $video_file=array();$i=0;
   $feedbacks=array();
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
			get_row_con_info(users,"where user_id='$data[cf_user_id]'",'user_fname,user_lname',$user);
			$file=$Server_Upload_Path."video_files/".$data[cf_id].".flv";
			$url=$Server_View_Path."video_files/".$data[cf_id].".flv";
			if(file_exists($file))
			{
				$data[video]= "<span id=button><a href=\"javascript:void(1)\" onclick=\"setLink('".$url."')\"><img src='images/watch.gif' border='0'/></a></span>";
				$video_file=$data[cf_id].".flv";
				$i++;
				$file_name=$data[cf_id].".flv";
			}
			else
			{
				$data[video]="";
				$file_name="";
			}
			
		  get_row_con_info("emotional_profile","where ep_id='$data[cf_ep_id]'",'ep_name',$ep_name);
		  $data[user]="$user[user_fname] $user[user_lname]";
		  $data[ep_name]=$ep_name[ep_name];
		 
		
		 $data[cf_date]=days_ago($data[cf_date]);
		 array_push($feedbacks,$data);
		
   		//----------------------------Start
		if($R[type]=='export' && file_exists($file))
		{
			//Export Data
			$data[cf_date]=date('M d -Y H-i-s a',$data[cf_date]);
			$export_data.="\"$data[user]\",\"$data[c_title]\",\"$data[cf_comment]\",\"$data[cf_date]\",\"$data[ep_name]\",\"$data[cf_rating]\",\"$file_name\"\n";
			
			//Zip file
			$file=$Server_Upload_Path."video_files/".$video_file;
			$zip->addFile(file_get_contents($file),$video_file);
			$handle = fopen($Upload_Path."feedback.zip","wb");
			fputs($handle, $zip->file());
			fclose($handle);
			$video_file="";
		}
		//-------------------------------End
		 
      }
   }
   else
   {
      $msg="<br>Record Not Found!";
	  $hdrow="none";
   }
   
   	//Export Data
	if($R[type]=='export')
	{
		$hl=fopen($Upload_Path."feedback.csv","w");
		fputs($hl,$export_data);
		fclose($hl);
		
		$filename="feedback.csv";
		$zip->addFile(file_get_contents($Upload_Path.$filename),$filename);
		$handle = fopen($Upload_Path."feedback.zip","wb");
		fputs($handle, $zip->file());
		fclose($handle);
		export_user_feedback();
	}
	
	get_new_option_list(content,"c_id","c_title",$v_title,$title,"0","order by c_title asc");
	get_new_option_list_full_name(users,"user_id","user_fname","user_lname","$v_user",$se_user,"0","order by user_fname asc");
	get_new_option_multiple_list("emotional_profile","ep_id","ep_name", $se_emo,$ep,"");
  
  if($date_from!="") $date_from=get_mktime_to_date_mdy($date_from);
   if($date_to!="") $date_to=get_mktime_to_date_mdy($date_to);
   $smarty->assign(array("feedbacks"=>$feedbacks,
						 "msg"=>$msg,
						"hide_del"=>$hide_del,
						 "orderby"=>$orderby_p,
						 "order"=>$order_p,
						 $orderby_p."_order"=>$new_order,
						 "st_pos"=>$st_pos_p,
						 "nb_text"=>$nb_text,
						 "nrppOpt"=>$nrppOpt,
						 "nrpp"=>$nrpp_p,
						 "ICON_PATH"=>$Server_Icon_Path,
						 "SERVER_PATH"=>$Server_Admin_Path,
						 "rel_val"=>$R[rel_val],
						 "c_id"=>$R[c_id],
						 "ep"=>$ep,
						 "v_title"=>$title,
						 "v_user"=>$se_user,
						 "date_from"=>$date_from,
						 "date_to"=>$date_to,
						 "re1_".$R[se_re1]=>"selected",
						 "rate"=>$rate,
						 "hdrow"=>$hdrow,
						 "unrated_hide"=>$unrated_hide,
						 "hide_for_library_user"=>$hide_for_library_user,));
   if($R[type]=='export')
   {
   		$smarty->display("feedback_view.tpl");
		return true;
   }
   
	$ary[0] =$smarty->fetch("feedback_view.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
#----------------------------- END USER FEEDBACK -----------------------------
function watch_video()
{
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	$smarty->assign($R);
	$smarty->assign(array("url"=>$_REQUEST[url]));
	$smarty->display("watch_video.tpl"); 
}
#----------------------------- EXPORT USER FEEDBACK -----------------------------
function export_user_feedback()
{
		global $Upload_Path;
		//Download File
		$file_path=$Upload_Path."feedback.zip";
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Type: application/force-download");
		header("Content-Type: application/zip");
		header("Content-Disposition: attachment; filename=\"feedback.zip\"");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . filesize($file_path));
		print file_get_contents($file_path);
		return;	
}
?>