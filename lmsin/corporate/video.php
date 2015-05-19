<?php
include ("../includes/common.php");
include("../includes/common_functions.php");
//include ("includes/globals.php");

init();
//.........................................
sajax_export("video_add","video_view","video_edit","video_del","view_feedback","video_code");
sajax_handle_client_request();
$js = sajax_return_javascript();
//.........................................
$func_ary=array("video_save","video_update","watch_video");

###################### Ok #####################################
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

video_index($msg="");
die();
#################################### BEGIN VIDEO SECTION ########################################
function video_index($msg='')
{
	global $js,$Server_View_Path;
	global $Server_company_path;
	$Server_admin_path=$Server_View_Path."administrator/";
	global $invit_num;
	global $NRPP;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,
	"SERVER_ADMIN_PATH"=>$Server_admin_path,"SERVER_COMPANY_PATH"=>$Server_company_path,
	"video_tab"=>"selected",
        "video_sub_tag"=>"label",    
	"invit_num"=>$invit_num));
	$smarty->display('video.tpl');
}
function video_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0,$ser_key="")
{
	$smarty = new Smarty;
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_Upload_Path;
	global $Server_View_Path, $View_Path;
	global $NRPP;
	$videos=array();
	
	#-------------- Sorting ----------
	$orderby="c_id";
	$order="DESC";
	$new_order="";
	if($orderby_p)
	{
		$order="DESC";
		$orderby=$orderby_p;
		if($order_p)
			$order=$order_p;
		if($order=="ASC")
			$new_order="DESC";
		else
			$new_order="ASC";
	}
	else
		$orderby="c_id";
	
	$no_of_row_per_page=array($NRPP,20,30,40,50);
	$default=20;
	
	if(is_array($no_of_row_per_page))
	{
		foreach($no_of_row_per_page as $v)
		{
			if($k==$default OR $v==$nrpp_p)
				$sel="selected";
			$nrppOpt.="<option value='$v' $sel>$v</option>";
			$sel="";
		}
	}
	
	if($ser_key!="")
		$cond="AND (c_title like '%$ser_key%'  OR  c_desc like '%$ser_key%' OR  c_url like '%$ser_key%')" ;
	
	$SQL="SELECT * ,(SELECT count(*) FROM content_feedback WHERE cf_c_id = c_id AND cf_rating>'0' and cf_ep_id>'0') AS num_feedback FROM content WHERE c_company_id='$_COOKIE[CompanyId]' $cond ORDER BY $orderby $order $con_limit";
	$tot_rows=eq($SQL,$rs);
	
	get_nb_text_multi($tot_rows,"Video",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
	$SQL=$SQL.$con_limit;
	eq($SQL,$rs);
	
	if($tot_rows>0)
	{
		while($data=mfa($rs))
		{
			if(get_row_con_info("content_feedback","where cf_c_id='$data[c_id]' and cf_rating!='-1' and cf_ep_id!='-1' order by cf_id DESC limit 0,1","cf_date,cf_id",$l_feedback))
			{
				$days=intval((time()-$l_feedback[cf_date])/86400);
				if($days==0)
				{
					$data[days_ago]=intval((time()-$l_feedback[cf_date])/60)." minutes ago";
					if($data[days_ago]>60)
						$data[days_ago]=intval((time()-$l_feedback[cf_date])/3600)." hours ago";
				}
				else
					$data[days_ago]=intval((time()-$l_feedback[cf_date])/86400)." days ago";
			}
			else
				$data[days_ago]="--";
		
			if($l_feedback[cf_date]!=0)
				$data[cf_date]=date("m/d/Y",$l_feedbackdata[cf_date]);
			else
				$l_feedback[cf_date]="-";
				
			$data[days_ago]=$data[days_ago];
			
			if($data[c_date]!=0)
				$data[c_date]=date("m/d/Y",$data[c_date]);
			else
				$data[c_date]="-";
			
			if($data[c_url]=="")
			{
				if(get_row_con_info("uploads","where up_s_id='$data[c_id]' AND up_s_type='video_image'","",$up))
				{
					$data[c_thumb_url]=$View_Path."thumb_".$up[up_fname].$up[up_ext];
				}
			}
			
			 if (check_vid_exist($data[c_url]))
				array_push($videos,$data);
			$smarty->assign(array("del"=>$del,"v_show_home_page_check"=>$v_show_home_page));
		}
	}
        
       
	$smarty->assign(array("videos"=>$videos,
							"msg"=>$msg,
							"hide_del"=>$hide_del,
							"orderby"=>$orderby_p,
							"order"=>$order_p,
							$orderby_p."_order"=>$new_order,
							"st_pos"=>$st_pos_p,
							"nb_text"=>$nb_text,
							"nrppOpt"=>$nrppOpt,
							"ICON_PATH"=>$Server_Icon_Path,
							"SERVER_PATH"=>$Server_Admin_Path,
							"rel_val"=>$R[rel_val],
							"hide_for_library_user"=>$hide_for_library_user,
                                                        "Server_View_Path"=>$Server_View_Path,
							"ser_key"=>$ser_key,
							"tot_rows"=>$tot_rows,
					));
							
	$ary[0] =$smarty->fetch("video_view.tpl");
	$ary[3]=$callback;
	return ($ary);
}
#----------------------------- ADD VIDEO -----------------------------
function video_add($callback)
{
	global $js;	
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	get_new_option_multiple_list("category","cat_id","cat_name",$cat_ids,$option," order by cat_name");
        //get_new_option_multiple_list("question_set","question_set_id","question_set",$cat_ids,$option," order by question_set_id");
        
        // get all question sets
        get_new_option_multiple_list("question_set","question_set_id","question_set",$cat_ids,$set_options," order by question_set_id");       
        
	if(!$R[c_date])
		$R[c_date]=date('d/m/Y',time());
		
	$smarty->assign($R);
	$smarty->assign(array("msg"=>$msg,
						  "act"=>"video_save",
						  "chk_0"=>"checked",
						  "c_av_challenge_0"=>"checked",
						  "hide_u"=>"none",
						  "youtube"=>"checked",
						  "category_list"=>$option,
                                                  "question_set_list"=>$set_options,
						  "heading"=>"Add",
					  ));
	$ary[0] =$smarty->fetch('video_add.tpl');
	$ary[3]=$callback;
	return ($ary);
}
#----------------------------- SAVE VIDEO -----------------------------
function video_save()
{
        $R=DIN_ALL($_REQUEST);
	$time=time();
        $cmp_question_sets = $_POST['set_id'];    // gets a collection of posted question sets
        $questionsCollection = $_POST['choose_questions'];  // gets a collection of posted questions
	if($R[video]==0)
	{
		$id = getVideoID($R[c_url]);
		$videoDetails=getVideoDetails($id);
		$R[c_length]=sprintf("%0.2f", $videoDetails['length']/60) . " min.";
		$R[c_youtube_rating]=$videoDetails['rating'];
		$c_category=addslashes($videoDetails['category']);
		$c_title =addslashes( $videoDetails['title']);
		$c_desc =addslashes( $videoDetails['description']);
		$c_thumb_url =addslashes( $videoDetails['thumbnail']);
		$c_url="http://www.youtube.com/v/".$id."&hl=en_US&fs=1";
	}
	else
	{
		$c_title=$R[c_title];
		$c_desc=$R[c_desc];
	}
	$c_date=get_date_to_mktime($R[c_date]);
	$SQL="INSERT INTO content SET `c_date` =  '$c_date',
							  `c_url` = '$c_url',
							  `c_title` = '$c_title',
							  `c_desc` = '$c_desc',
							  `c_av_challenge` = '$R[c_av_challenge]',
							  `c_thumb_url`='$c_thumb_url',
							  `c_company_id`='$_COOKIE[CompanyId]'";
	$id=ei($SQL);
        
        // add question to that video
        // insert video sets       
        addCampaignQuestions($cmp_question_sets, '0', $id);   
        // insert video questions
        insertCampaignQuestions($questionsCollection, '0', $id);
        
	add_newsfeed(1,'',$id);
	###	Upload Video File 
	if($R[video]==1)
	{
		upload_file_new("up_video",$id,"video_file",0,$msg,"Video file");
		upload_file_new("video_image",$id,"video_image",0,$msg,"Video Thumb Image",1);
	}
	
	### Category video section ###
	if($_REQUEST[cat_id])
		func_save_category_video($_REQUEST[cat_id],$id);
		
	print "<script>parent.win.hide();</script>";
	print "<script>parent.refresh_page();</script>";
	
	///video_index("Video Saved Successfully.");
}
#----------------------------- EDIT VIDEO -----------------------------
function video_edit($callback,$c_id)
{
	$R=DIN_ALL($_REQUEST);
	$time=time();
	$smarty = new Smarty;
	global $Server_View_Path;
        global $Upload_Path;
	$View_Path=$Server_View_Path."uploads/";
	get_row_con_info("content","where c_id='$c_id'","",$video_info);
	get_ids("category_video" , "cv_cat_id" , "where cv_c_id= '".$video_info[c_id]."'" , $cat_ids);
	get_new_option_multiple_list("category","cat_id","cat_name",$cat_ids,$option," order by cat_name");
        
        
        // get all question sets
        get_ids("map_campaign_sets" , "map_set_id" , "where map_content_id= '".$video_info[c_id]."' and map_campaign_id='0'" ,$selected_sets_ids);
        get_new_option_multiple_list("question_set","question_set_id","question_set",$selected_sets_ids,$set_options," order by question_set_id");  
        
        // get all selected questions html
        $selectedQuestionsEditInfo = mysql_query("select map_q_id, map_c_id, map_cmp_q_id from map_camp_question where map_c_id = '".$c_id."' and map_camp_id = '0'");
        
        /*
        // to display the list of all the questions for the selected sets
        $questionSetList = implode(",", $selected_sets_ids);  
        $allQuestionsInfo = mysql_query("SELECT q_id, q_question, s.question_set_id, s.question_set
                                        FROM question q
                                        JOIN map_question_set qs ON q.q_id = qs.map_question_id
                                        JOIN question_set s ON qs.map_set_id = s.question_set_id
                                        WHERE qs.map_set_id IN (".$questionSetList.") order by s.question_set_id"); 
        */
        
        // code for questions
        $quesArray = array();
        if(mysql_num_rows($selectedQuestionsEditInfo)>0){
            while($editQ = mysql_fetch_assoc($selectedQuestionsEditInfo)){
                array_push($quesArray, $editQ['map_q_id']);
            }
        }
        
       
        /*
        if(mysql_num_rows($allQuestionsInfo)>0){
             $questionsList .= '<div style="max-height: 300px;overflow: auto;" class="well">
                        <ul class="list-group checked-list-box">';

             while($cmp_q_result = mysql_fetch_object($allQuestionsInfo))
             {
                $selected_q = "";  
                if(isset($quesArray) && count($quesArray)>0){  
                     $quesArray = array_unique($quesArray);             
                     if(in_array($cmp_q_result->q_id, $quesArray)){
                        $selected_q = "checked";          
                     }   
                } 

                // condition for adding a header in listing
                if($category_flag!=$cmp_q_result->question_set){
                     $category_flag = $cmp_q_result->question_set;
                     $questionsList .= '<li style="list-style:none;"><strong>'.$cmp_q_result->question_set.'</strong></li>'; 
                }

                $questionsList .= '<li class="list-group-item"><input class="choose_questions" type="checkbox" onchange="optionsAllowedToChoose(this)" '
                        . 'value="'.$cmp_q_result->q_id.'" name="choose_questions[]" data-category-val="'.$cmp_q_result->question_set_id.'" id="choose_questions" 
                        data-rule-required="true" '.$selected_q.' data-msg-required="Please choose any question."> &nbsp;'.$cmp_q_result->q_question.'</li>';
             } 
             $questionsList .= '</ul></div>';
        }
        */
        
       
        if(count($selected_sets_ids)>0){
            $questionsList .= '<div style="max-height: 300px;overflow: auto;" class="well">
                        <ul class="list-group checked-list-box">';
            
                $chkQuestArray = array();
                foreach($selected_sets_ids as $category){
                    $qSetQuery = "SELECT * FROM map_question_set WHERE map_set_id = '$category' order by map_question_id";  
                    $categoryName = getCategoryName($category);
                    $questionsList .= '<li style="list-style:none"><strong>'.$categoryName.'</strong></li>';
                    $qSetSchema = mysql_query($qSetQuery);   
                    
                   
                    if(mysql_num_rows($qSetSchema)>0){
                        while($questions = mysql_fetch_assoc($qSetSchema)){
                            $quesId = $questions['map_question_id'];
                            
                            //if(!in_array($quesId, $chkQuestArray)){
                                //array_push($chkQuestArray, $quesId);
                                // get question details
                                $questQuery = mysql_query("select q_id, q_question from question where q_id = '".$questions['map_question_id']."' limit 0,1");
                                $questSchema = mysql_fetch_assoc($questQuery);

                                $qId = trim($questSchema['q_id']);
                                if(isset($qId) && $qId!=""){
                                    
                                    $selected_q = "";  
                                    if(isset($quesArray) && count($quesArray)>0){  
                                         $quesArray = array_unique($quesArray);             
                                         if(in_array($qId, $quesArray)){
                                            $selected_q = "checked";          
                                         }   
                                    } 
                                    
                                    $questionsList .= '<li class="list-group-item">';
                                    $questionsList .= '<input data-category-val="'.$category.'" type="checkbox" '.$selected_q.' data-msg-required="Please choose any question." 
                                       data-rule-required="true" id="choose_questions" name="choose_questions[]" onchange="optionsAllowedToChoose(this)" class="choose_questions" 
                                       value="'.$questSchema['q_id'].'" /> &nbsp;'.$questSchema['q_question']; 
                                    $questionsList .= '</li>';
                                }
                            //}


                        }
                    }
                }
            
            $questionsList .= '</ul></div>';
        }
              
        
	$video_info[c_date]=date("d/m/Y",$video_info[c_date]);
	if(!$video_info[c_url])$upload="checked";else $upload="";
	if(!$video_info[c_url])$youtube="";else $youtube="checked";
	$smarty->assign($video_info);
	$smarty->assign(array("act"=>"video_update",
						  "category_list"=>$option,
                                                  "question_set_list"=>$set_options,
                                                  "questionsListHtml"=>$questionsList,
						  "c_av_challenge_$video_info[c_av_challenge]"=>"checked",
						  "heading"=>"Edit",
						  "upload"=>$upload,
						  "youtube"=>$youtube,
						  "video_tab"=>"selected",
						  ));
	$ary[0] =$smarty->fetch('video_add.tpl');
	$ary[3]=$callback;
	return ($ary);
}
#----------------------------- UPDATE VIDEO -----------------------------
function video_update()
{
	$R=DIN_ALL($_REQUEST);
	$time=time();
	get_row_con_info(content,"where c_id='$R[c_id]'","c_url",$content);
        $cmp_question_sets = $_POST['set_id'];    // gets a collection of posted question sets
        $questionsCollection = $_POST['choose_questions'];  // gets a collection of posted questions
        
	if($R[video]==0)
	{
		if(!$content[c_url])
		delete_upload_file($R[c_id],"video_file",$msg);
		delete_upload_file($R[c_id],"video_image",$msg);
                
                // delete mapped questions and sets
                $delResp1 = mysql_query("Delete from map_campaign_sets where map_campaign_id = '0' and map_content_id = '$R[c_id]'");
                $delResp2 = mysql_query("Delete from map_camp_question where map_camp_id = '0' and map_c_id = '$R[c_id]'");
                
		if($R[c_url]!=$content[c_url])
		{
			$id = getVideoID($R[c_url]);
			$videoDetails=getVideoDetails($id);
			$R[c_length]=sprintf("%0.2f", $videoDetails['length']/60) . " min.";
			$R[c_youtube_rating]=$videoDetails['rating'];
			$c_category=addslashes($videoDetails['category']);
			$c_title =addslashes( $videoDetails['title']);
			$c_desc =addslashes( $videoDetails['description']);
			$c_thumb_url =addslashes( $videoDetails['thumbnail']);
			$c_url="http://www.youtube.com/v/".$id."&hl=en_US&fs=1";
			$url=" c_url='$c_url' ,c_thumb_url='$c_thumb_url',`c_title` = '$c_title', `c_desc` = '$c_desc', ";
		}
	}
	else
	{
		if($R[c_title])
			$url="c_url='', c_thumb_url='', `c_title` = '$R[c_title]', `c_desc` = '$R[c_desc]', ";
	}
	$c_date=get_date_to_mktime($R[c_date]);
	$SQL="UPDATE content SET $url `c_date` =  '$c_date',
	                              `c_av_challenge` = '$R[c_av_challenge]',
								  `c_company_id`='$_COOKIE[CompanyId]' WHERE c_id = '$R[c_id]'";
	eq($SQL,$rs);
        
        // add question to that video
        // insert video sets       
        addCampaignQuestions($cmp_question_sets, '0', $R[c_id]);   
        // insert video questions
        insertCampaignQuestions($questionsCollection, '0', $R[c_id]);
	
	###	Upload Video File 
	if($R[video]==1)
	{
		if(strlen($_FILES[up_video]['name'])>0)
		{
			delete_upload_file($R[c_id],"video_file",$msg);
			upload_file_new("up_video",$R[c_id],"video_file",0,$msg,"Video file");
		}
		if(strlen($_FILES[video_image]['name'])>0)
		{
			delete_upload_file($R[c_id],"video_image",$msg);
			upload_file_new("video_image",$R[c_id],"video_image",0,$msg,"Video Thumb Image",1);
		}
	}
	
	### Category video section ###
	func_delete_category_video($R[c_id]);
	if($_REQUEST[cat_id])
	{
		func_save_category_video($_REQUEST[cat_id],$R[c_id]);
	}
	print "<script>parent.set_content('Video updated successfully.')</script>";
}
#----------------------------- DELETE VIDEO -----------------------------
function video_del($callback,$c_id)
{
	func_delete_video($c_id);
	$ary[0]="Video Deleted Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
#----------------------------- WATCH VIDEO -----------------------------
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
//--------------------------------------------------------------------
function view_feedback($c_id,$rate="",$orderby_p="",$order_p="",$nrpp_p="",$st_pos_p="")
{
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_Upload_Path;
	global $Server_View_Path;
	global $NRPP;
	
	$feedbacks=array();
	$video_file=array();
	$i=0;
	
	get_row_con_info("content","WHERE c_id = $c_id","c_title",$video_name);
	
   #-------------- Sorting ----------
   if($orderby_p=='num_feedback')$orderby_p='';
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
   $default=$NRPP;
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
   
	if($rate=='rated')
		$SQL_CON.="AND cf_ep_id > 0";
	elseif($rate=='unrated')
	{
		$SQL_CON.="AND cf_rating < '0' AND cf_ep_id < '0'";
		$unrated_hide="none";
	}
	else
		$SQL_CON.="AND cf_ep_id > 0";
   
   $SQL="SELECT c_id,user_fname,user_lname,cf_comment,cf_date,ep_name,cf_rating FROM content_feedback LEFT JOIN content ON cf_c_id=c_id LEFT JOIN users ON cf_user_id=user_id LEFT JOIN emotional_profile ON cf_ep_id=ep_id WHERE cf_c_id = $c_id $SQL_CON ORDER BY $orderby $order $con_limit";
   $tot_rows=eq($SQL,$rs);
   
   get_nb_text_multi_pop($tot_rows,"Feedback",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs); 
   
	if($tot_rows>0)
	{
		while($data=mfa($rs))
		{
			$file=$Server_Upload_Path."video_files/".$data[cf_id].".flv";
			$url=$Server_View_Path."video_files/".$data[cf_id].".flv";
			if(file_exists($file))
			{
				$data[video]="<span id=button><a href=\"javascript:void(1)\" onclick=\"setLink('".$url."')\"><img src='images/watch.gif' border='0'/></a></span>";
				$video_file[$i]=$data[cf_id].".flv";
				$i++;
				$file_name=$data[cf_id].".flv";
			}
			else
			{
				$data[video]="";
				$file_name="";
			}
			$data[cf_date]=days_ago($data[cf_date]);
			array_push($feedbacks,$data);
		}
	}
	
	$smarty = new Smarty;
	$smarty->assign(array("feedbacks"=>$feedbacks,
						 "orderby"=>$orderby_p,
						 "order_p"=>$order_p,
						 $orderby_p."_order"=>$new_order,
						 "st_pos_p"=>$st_pos_p,
						 "nb_text"=>$nb_text,
						 "nrppOpt"=>$nrppOpt,
						 "nrpp_p"=>$nrpp_p,
						 "tot_rows"=>$tot_rows,
						 "c_id"=>$c_id,
						 "unrated_hide"=>$unrated_hide,
						 ));
	$ary[0] = $smarty->fetch("view_feedback.tpl");
	$video_name[c_title] = '<span class="tablehead">'.$video_name[c_title].'</span>';
	$ary[1] = $video_name[c_title];
	return $ary;
}

function video_code($id)
{
	$R=DIN_ALL($_REQUEST);
	global $Server_company_Path;
	$smarty = new Smarty;
	
	get_row_con_info("content","where c_id='$id'","c_id,c_url,c_title,c_company_id,c_thumb_url",$data);
	get_row_con_info("company","where company_id='$data[c_company_id]'","company_url",$com);	
	$smarty->assign($data);
        $smarty->assign(array("company_url"=>$com[company_url],"SERVER_COMPANY_PATH"=>$Server_company_Path, "Server_View_Path"=>$Server_View_Path));
	
	$ary[0] =$smarty->fetch("video_code.tpl");
	$ary[1] = $data[c_title];
	return $ary;
}
#############################################################
?>
