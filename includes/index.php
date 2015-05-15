<?php
include ("../includes/common.php");
include ("includes/globals.php");

init();
//.........................................
sajax_export("approved_category");
sajax_handle_client_request();
$js = sajax_return_javascript();
//.........................................
$func_ary=array("delete_log","view_log","show_login","chk_login","show_preferences","update_preferences","change_password","update_password","logout","view_admin","admin_edit","update_admin","import_file","import_do","analysis_results","delete_analysis_results","video_view","video_deny","video_approved");

#############################################################
if ($_SESSION["Admin"]=="" AND $_REQUEST[act]!="show_login" AND $_REQUEST[act]!="chk_login" )
{ #not logged in
   show_login();
   return;
}

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}

header("Location:video.php");
die();
/////////////////////////////////////////////// Import section
function delete_analysis_results()
{
	func_delete_analysis_results();
	analysis_results("Records Deleted Successfully.");
}


function import_file($msg="")
{
	$R=DIN_ALL($_REQUEST);
	global $invit_num;
   	$smarty = new Smarty;
	$smarty->assign($msg);
	$smarty->assign(array("msg"=>$msg,"act"=>"import_do","invit_num"=>$invit_num));
	$smarty->display("import_file.tpl");
}
######################################################
function import_do()
{
	global $Server_View_Path;
	global $Upload_Path;
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
				$SQL="INSERT INTO `analysis_detail` (`ad_ar_id` , `ad_time` , `ad_neutral` , `ad_happy` , `ad_sad` , `ad_angry` , `ad_suprised` , `ad_scared` , `ad_disgusted` ,ad_dominant_emotion )VALUES ( '".$ar_id."','".$col_ary[0]."', '".$col_ary[1]."','".$col_ary[2]."', '".$col_ary[3]."', '".$col_ary[4]."', '".$col_ary[5]."', '".$col_ary[6]."', '".$col_ary[7]."','".$ad_dominant_emotion."')";
				eq($SQL,$rs);
				
				$analysis_detail["happy"]+=$analysis_detail_ary[2];
				$analysis_detail["sad"]+=$analysis_detail_ary[3];
				$analysis_detail["angry"]+=$analysis_detail_ary[4];
				$analysis_detail["suprised"]+=$analysis_detail_ary[5];
				$analysis_detail["scared"]+=$analysis_detail_ary[6];
				$analysis_detail["disgusted"]+=$analysis_detail_ary[7];
				$count++;
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
		foreach($cf_ids as $key3=>$cf_id)
		{
			if(get_row_count("content_feedback","where cf_id='".$cf_id."'"))
			{
				$smarty = new Smarty;
				get_row_con_info(" content_feedback,users,content","WHERE cf_c_id = c_id AND cf_user_id = user_id AND cf_id= '".$cf_id."'","c_title,c_desc,user_id,c_thumb_url,cf_ep_id",$data);
				get_row_con_info("emotional_profile","where ep_id = '".$data[cf_ep_id]."'","ep_name",$em);
				get_row_con_info("analysis_results","where ar_cf_id = '".$cf_id."'","ar_dominant_emoton",$ar);
				
				$smarty->assign(array("c_desc"=>$data[c_desc],"name"=>$data[user_fname]." ".$data[user_lname],
										"c_title"=>$data[c_title],
										"ar_dominant_emoton"=>$ar[ar_dominant_emoton],
										"c_thumb_url"=>$data[c_thumb_url],
										"SERVER_PATH"=>$Server_View_Path,
										"ep_name"=>$em[ep_name]));
				$message=$smarty->fetch("analysis_results_mail.tpl");
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
		foreach($msg as $user_id=>$message)
		{
			get_row_con_info("users","where user_id='".$user_id."'","",$data);
			///$data[user_email]="dinesh.chandra@cynets.com";
			if($data[user_email])
				send_mail_new($data[user_fname]." ".$data[user_lname],$data[user_email],"","","Analysis results for your videos",$message);
		print $message;
		}
	}
	/////////////////////////////////////////
	import_file($error_array);
}
////////////////////////////////////////////////

function admin_edit($msg="")
{
	$R=DIN_ALL($_REQUEST);
	global $invit_num;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	get_row_con_info("site_admin","","",$data);
   	$smarty->assign($data);
   	$smarty->assign(array("msg"=>$msg,
						  "admin_tab"=>"selected",
						  "act"=>"update_admin",
						  "invit_num"=>$invit_num
						  ));
	$smarty->display("admin_edit.tpl");
}
//---------------Save Admin------------------
function update_admin()
{
	$R=DIN_ALL($_REQUEST);
	func_update_admin($R);
	admin_edit("Updated Successfully");
}
############################# OK ############
function show_login($msg="")
{
	$R = DIN_ALL($_REQUEST);	
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	if($R[msg]){$msg=$R[msg];}
	if(!$_SESSION["Admin"]){$none="none";}
	$smarty->assign(array("msg"=>$msg,"none"=>$none,));
	$smarty->display("show_login.tpl");
}
############################# OK ############
function chk_login()
{
   $R = DIN_ALL($_REQUEST);
   $SQL = "SELECT * FROM site_admin where sa_password = '$R[pass]' And sa_email = '$R[user_name]'";
   if(eq($SQL,$rs)==0)
   {
      #incorrect pass
      show_login("Incorrect Password. Please try again!");
      return;
   }
   else
   {#correct pass
      $data = mfa($rs);
      $_SESSION["Admin"]=$data[sa_email];
	  header("Location: video.php");
   }
}
###########################################################
function logout()
{
   $_SESSION["Admin"]="";
   show_login("<p align=center> You have been successfully logged out. </p>");
}
#############################################################
function analysis_results($msg="")
{
	$R=DIN_ALL($_REQUEST);
	global $invit_num;
   	$smarty = new Smarty;
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_Upload_Path;
	global $Server_View_Path;
	global $NRPP;
	
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

	$SQL="SELECT * FROM analysis_results,content_feedback,users,content where cf_id=ar_cf_id  AND cf_user_id=user_id AND c_id=cf_c_id ORDER BY ar_date DESC";
	 $tot_rows=eq($SQL,$rs);
	 get_nb_text_multi($tot_rows,"records",$R[st_pos],$con_limit,$nb_text,$R[nrpp]);
   
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
	if($tot_rows>0)
	{
	$records=array();
	 
	while($data=mfa($rs))
	{
		
		get_row_con_info("emotional_profile","where ep_id = '".$data[cf_ep_id]."'","ep_name",$emo);
		$data[ep_name]=$emo[ep_name];
		array_push($records,$data);
	}
	}
	$smarty->assign(array("msg"=>$msg,"invit_num"=>$invit_num,"analysis"=>$records,"st_pos"=>$R[st_pos],"nb_text"=>$nb_text,
							"nrpp"=>$R[nrpp],
							"op_nrpp"=>$op_nrpp,"tot_rows"=>$tot_rows,
							"ICON_PATH"=>$Server_Icon_Path,
							"import_tab"=>"selected",
							"SERVER_PATH"=>$Server_Admin_Path,));
	$smarty->display("analysis_results.tpl");
}
#################################################################
function video_view($msg="")
{
	global $js;
	$R=DIN_ALL($_REQUEST);
	global $invit_num;
   	$smarty = new Smarty;
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_Upload_Path;
	global $Server_View_Path;
	global $NRPP;
	
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
    $SQL="SELECT * FROM users,content_suggested WHERE user_id=cs_user_id AND cs_denied=0 ORDER BY cs_id DESC";
	 $tot_rows=eq($SQL,$rs);
	 get_nb_text_multi($tot_rows,"videos",$R[st_pos],$con_limit,$nb_text,$R[nrpp]);
   
     $SQL=$SQL.$con_limit;
     eq($SQL,$rs);
   
   if($tot_rows>0)
   {
	   $videos=array();
	   
      while($data=mfa($rs))
      {
		
		
		/*if($data[cs_denied]==0)
			$data[status]="pending";	
		else
			$data[status]="denied";*/   
		  
		array_push($videos,$data);
		
      }
   }
   else
   
   {
      $msg="<br>Record Not Found!";
   }
  
	 $smarty->assign(array("videos"=>$videos,
							"msg"=>$msg,"status"=>$status,"hide"=>$hide,
						    "st_pos"=>$R[st_pos],"nb_text"=>$nb_text,
						    "nrpp"=>$R[nrpp],
						    "op_nrpp"=>$op_nrpp,"tot_rows"=>$tot_rows,
							"invit_num"=>$invit_num,
							"ICON_PATH"=>$Server_Icon_Path,
							"SERVER_PATH"=>$Server_Admin_Path,"cs_id"=>$cs_id,"suggested_video_tab"=>"selected","js"=>$js
							
							));
						
	$smarty->display("suggested_video.tpl");
}
###########################################################################
function video_deny()
{
   $R = DIN_ALL($_REQUEST);
   $SQL="UPDATE content_suggested SET cs_denied='1' WHERE cs_id='$R[cs_id]'";
   eq($SQL,$rs);
   //--EMAIL -----------------
   get_row_con_info("users,content_suggested","WHERE cs_id='$R[cs_id]' AND user_id=cs_user_id","",$us);
   /*$subject="Suggested video Denied.";
   
   $us[SERVER_PATH]=$Server_View_Path;
   $us[name]=$us[user_fname]." ".$us[user_lname];
   $message=get_parse_tpl_page("video_deny_mail.tpl",$us);
   send_mail_new("$us[user_fname] $us[user_lname]",$us[user_email],"","",$subject,$message);*/
   //print $message;
   add_newsfeed(7, '', $R[cs_id]);
   video_view("Video Denied Successfully");
}
#################################################################################
function approved_category($cs_id)
{
	global $Server_View_Path;
	global $js;
	print $R[cs_id];
	$R=DIN_ALL($_REQUEST);
	//print_r($_REQUEST);
	$smarty = new Smarty;
	get_new_option_multiple_list("category","cat_id","cat_name",$cat_ids,$option," order by cat_name");
	$smarty->assign($R);
	$smarty->assign(array("msg"=>$msg,
						  "act"=>"video_approved",
						  "category_list"=>$option,"js"=>$js,"cs_id"=>$cs_id
					  ));
	return $smarty->fetch('approved_category.tpl');
	
}
##################################################################################
function video_approved()
{
	global $Server_View_Path;
	$R = DIN_ALL($_REQUEST);
	//print_r($_REQUEST);
	print $R[cs_id];
	get_row_con_info("content_suggested","WHERE cs_id='$R[cs_id]'","",$cs);
	$cs=DIN_ALL($cs);
	$SQL="INSERT INTO content SET `c_date` =  '$cs[cs_date]',
							  `c_url` = '".addslashes($cs[cs_url])."',
							  `c_title` = '".addslashes($cs[cs_title])."',
							  `c_desc` = '".addslashes($cs[cs_desc])."',
							  `c_thumb_url`='".addslashes($cs[cs_thumb_url])."',
							  `c_length` = '$cs[cs_length]',
							  `c_youtube_rating` = '$cs[cs_youtube_rating]',
							  `c_category` = '$cs[cs_category]',
							  `c_user_id` = '$cs[cs_user_id]'";
	$c_id=ei($SQL);
	//--category----
	if($_REQUEST[cat_id])
		func_save_category_video($_REQUEST[cat_id],$c_id);
	
	$SQL1="update uploads set up_s_id='$c_id' where up_s_id='$R[cs_id]'";
	eq($SQL1,$rs1);
	//-------------------
	add_newsfeed(6, $cs[cs_user_id], $c_id);
	//---EMAIL ---------------
   get_row_con_info("users,content_suggested","WHERE cs_id='$R[cs_id]' AND user_id=cs_user_id","",$us);
   $subject="Congratulations ! Your video suggestion has been accepted.";
   
  /* $message=" Congratulations!! $us[user_fname] $us[user_lname] Your suggested Video has been Approved.<br>
             <a href='".$Server_View_Path."play_video.php?c_id=".$c_id."'>$cs[cs_title]</a><br>
             With kind regards,<br>
             Thanking you<br>
             $SiteName
            ";*/
   $us[cs_title]=$cs[cs_title];
   $us[c_id]=$c_id;
   $us[SERVER_PATH]=$Server_View_Path;
   $us[name]=$us[user_fname]." ".$us[user_lname];
   $message=get_parse_tpl_page("video_approve_mail.tpl",$us);
   send_mail_new("$us[user_fname] $us[user_lname]",$us[user_email],"","",$subject,$message);//$us[user_email]
   //print $message;
   delete_suggested_video($R[cs_id]);
   video_view("Video Approved Successfully");
}
#####################################################################################
?>