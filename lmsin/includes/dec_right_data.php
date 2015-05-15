<?php
//////////////////// Righ data start //////////////////////////////////
function get_right_column_data($type="",$cat_id="",$st_pos="",$nrpp="")
{
	
    $feed = array();$myrated=array();
	global $View_Path;
	
	if($cat_id && ($cat_id<>-2))
		$cat_cond="AND c_id IN(select cv_c_id from category_video where cv_cat_id='$cat_id')";
	else
		$cat_cond="";
	
	$i=0;	$j=0; $k=0; // For hide first row
	if($type=="unrated")
	{
		if(get_row_count("content","where c_id NOT IN(select cf_c_id from content_feedback where cf_user_id='$_COOKIE[UserId]'  )  $cat_cond order by c_id DESC")>0)
			$SQL="select * from content where c_id NOT IN(select cf_c_id from content_feedback where cf_user_id='$_COOKIE[UserId]'  )  $cat_cond order by c_id DESC  LIMIT 0,2";
		else
			$SQL="select * from content where c_id IN(select cf_c_id from content_feedback where cf_user_id='$_COOKIE[UserId]' )  $cat_cond order by rand() LIMIT 0,2";
		$tot_unrated=eq($SQL,$rs);
		

		while($data=mfa($rs))
		{
			$c_title=substr($data[c_title],0,45);
			if(strlen($data[c_title])>strlen($c_title))
				 $data[c_title]=$c_title."...";
		    else
				 $data[c_title]=$c_title;	
				
			if($data[c_url]=="")
			{
				if(get_row_con_info("uploads","where up_s_id='$data[c_id]' AND up_s_type='video_image'","",$up))
				{
					$data[c_thumb_url]=$View_Path."thumb_".$up[up_fname].$up[up_ext];
				}
				
			}
			$data[i]= $i++; // For hide first row
			array_push($feed,$data);
		}
	}
	else
	{
		$t=time();
		$less_time=$t-604800;
		if(get_row_count("content","where c_date <='$t' AND c_date >='$less_time' AND  c_id NOT IN(select cf_c_id from content_feedback where cf_user_id='$_COOKIE[UserId]') order by c_id DESC")>0)
			$SQL1="select * from content where c_date <='$t' AND c_date >='$less_time' AND  c_id NOT IN(select cf_c_id from content_feedback where cf_user_id='$_COOKIE[UserId]') order by c_id DESC  LIMIT 0,2";
		else
			$SQL1="select * from content  where c_id IN(select cf_c_id from content_feedback where cf_user_id='$_COOKIE[UserId]' )  $cat_cond order by rand() LIMIT 0,2";
		
		$tot_unrated=eq($SQL1,$rs1);
		if($tot_unrated>0)
		{
			while($data1=mfa($rs1))
			{
				$c_title=substr($data1[c_title],0,45);
			    if(strlen($data1[c_title])>strlen($c_title))
				     $data1[c_title]=$c_title."...";
			    else
				     $data1[c_title]=$c_title;	
				
				if($data1[c_url]=="")
				{
					
					if(get_row_con_info("uploads","where up_s_id='$data1[c_id]' AND up_s_type='video_image'","",$up))
					{
						$data1[c_thumb_url]=$View_Path."thumb_".$up[up_fname].$up[up_ext];
					}
					
				}
				$data1[i]= $i++; // For hide first row
				array_push($feed,$data1);
			}
			$new=0;
		}
		else
			$new=1;
			
		$highlight_unrated="";
		$highlight_rated="highlight";
	}
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	//$feed=get_feed(); // Get feed for friend videos 
	
	//---------------------------------------------Fetch Latest Activities----------------------------------------------
	$SQL2="SELECT * FROM `newsfeed` LEFT JOIN `newsfeed_type` ON `nf_nftype_id` = `nftype_id` WHERE 
	(nf_nftype_id=1 OR nf_nftype_id=8)
	OR
	(nf_nftype_id=2 AND
		`nf_user_id` IN (Select uf_user_id from user_friends Where uf_fuser_id='$_COOKIE[UserId]' AND uf_approved=1 UNION Select uf_fuser_id from user_friends Where uf_user_id='$_COOKIE[UserId]' AND uf_approved=1)
	)
	
	OR
	(
		(nf_nftype_id=3 OR nf_nftype_id=4 OR nf_nftype_id=5 OR nf_nftype_id=6 OR nf_nftype_id=7 OR nf_nftype_id=9 OR nf_nftype_id=10 OR nf_nftype_id=11) 
		AND nf_user_id='$_COOKIE[UserId]'
	)
	ORDER BY `nf_date` DESC LIMIT 0,5";//AND nf_user_id <> '$_COOKIE[UserId]'
	
	
	$tot_feed=eq($SQL2,$rs2);
	$newsfeeds=array();
	while($data2=mfa($rs2))
	{
		if($data2[nf_count]>1)
			$data2[nftype_title]=str_replace("{count}",$data2[nf_count],$data2[nftype_title]);
		else
			$data2[nftype_title]=str_replace("{count}",$data2[nf_count],$data2[nftype_title_singular]);
		
		$data2[days_ago]=get_days_ago($data2[nf_date],time());
		if($data2[nf_nftype_id]==9)
		{
			get_row_con_info("newsfeed_items","where nfi_nf_id='$data2[nf_id]'","nfi_item_id",$nfi);
			get_row_con_info("user_friends","where uf_id='$nfi[nfi_item_id]'","uf_fuser_id",$uf);
			get_row_con_info('users',"WHERE `user_id` = '$uf[uf_fuser_id]'","`user_fname`,`user_lname`",$user);
		}
		else
			get_row_con_info('users',"WHERE `user_id` = '$data2[nf_user_id]'","`user_fname`,`user_lname`",$user);
		
		if($data2[nf_nftype_id]==10)//Challenge
		{
			get_row_con_info("newsfeed_items,content,users","where nfi_item_id=c_id AND nfi_nf_id='$data2[nf_id]' AND user_id=c_user_id","user_fname,user_lname",$user);
		    
		}

		if($data2[nf_nftype_id]==11)	//Challenge Response
		{
			get_row_con_info("newsfeed_items,content_feedback,users","where nfi_nf_id='$data2[nf_id]' AND nfi_item_id=cf_id AND cf_user_id = user_id","user_fname,user_lname",$user);
		     
		}
		
		$data2[name]="$user[user_fname] $user[user_lname]";
		$data2[nftype_title]=str_replace("{name}",$data2[name],$data2[nftype_title]);
		$data2[j]= $j++; // For hide first row
		array_push($newsfeeds,$data2);
	}
	//------------------------------------------------------------------------------------------------------------------
	#############Recommended Video
	//------------------------------------------------------------------------------------------------------------------
	
	if(get_row_count("`recommended_videos`,`content`","where rv_user_id='$_COOKIE[UserId]' and rv_c_id=c_id")==0)	//If not in recommended the show top monet value
		$SQL2="select * from content,content_feedback where cf_c_id=c_id AND cf_rating >= 0 $cond GROUP BY cf_c_id order by cf_rating DESC LIMIT 0,2";	
	else
		$SQL2="SELECT * FROM `recommended_videos`,`content` where rv_user_id='$_COOKIE[UserId]' and rv_c_id=c_id  ORDER BY `rv_weight`  DESC LIMIT 0,2";
		
	
	
	$tot_feed=eq($SQL2,$rs2);
	$recommended=array();
	while($data2=mfa($rs2))
	{
		$v_title=substr($data2[c_title],0,45);
		if(strlen($data2[c_title])>strlen($v_title))
			 $data2[c_title]=$v_title."...";
		else
			 $data2[c_title]=$v_title;	
			
		if($data2[c_url]=="")
		{
			if(get_row_con_info("uploads","where up_s_id='$data2[c_id]' AND up_s_type='video_image'","",$up))
			{
				$data2[c_thumb_url]=$View_Path."thumb_".$up[up_fname].$up[up_ext];
			}
			
		}
		$data2[k]= $k++; // For hide first row
		array_push($recommended,$data2);
		
	}
	//-------------------------------------------------------------------------------------------------------------
					#People You May Know
	//-------------------------------------------------------------------------------------------------------------
	$people=array();
	$SQL="select * from users where user_id IN (Select uf_fuser_id  from user_friends where uf_user_id  IN (Select uf_fuser_id  from user_friends where uf_user_id = '$_COOKIE[UserId]'  AND uf_approved=1 UNION Select uf_user_id  from user_friends where uf_fuser_id = '$_COOKIE[UserId]'  AND uf_approved=1)
UNION
Select uf_user_id  from user_friends where uf_fuser_id IN (Select uf_fuser_id  from user_friends where uf_user_id = '$_COOKIE[UserId]'  AND uf_approved=1 UNION Select uf_user_id  from user_friends where uf_fuser_id = '$_COOKIE[UserId]'  AND uf_approved=1)  AND uf_approved=1 ) AND user_id<>'$_COOKIE[UserId]'

 AND user_id NOT IN 
(Select uf_fuser_id  from user_friends where uf_user_id = '$_COOKIE[UserId]'  AND uf_approved=1 UNION Select uf_user_id  from user_friends where uf_fuser_id = '$_COOKIE[UserId]'  AND uf_approved=1) order by rand() LIMIT 0,5";
	$tot_rows=eq($SQL,$rs2);
	while($data2=mfa($rs2))
	{
		if(get_row_con_info("uploads","where up_s_id='$data2[user_id]' AND up_s_type='user_profile_photo'","",$up))
				$data2[profile_picture]=$View_Path."small_thumb_".$up[up_fname].$up[up_ext];
			else
				$data2[profile_picture]="images/small_no_profile_pic.jpg";
		
		array_push($people,$data2);
	}
	//-------------------------------------------------------------------------------------------------------------
	get_new_option_list('category','cat_id','cat_name',$cat_id,$category_list,1,"",1);
	
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,
						  "feed"=>$feed,"myrated"=>$myrated,"no_of_unrated"=>$tot_unrated,
						  "highlight_unrated"=>$highlight_unrated,"highlight_rated"=>$highlight_rated,
						  "all_rated"=>$all_rated,"new"=>$new,"nb_text"=>$nb_text,"newsfeeds"=>$newsfeeds,"recommended"=>$recommended,
						  "invites"=>$invites,"category_list"=>$category_list,"cat_id"=>$cat_id,"video_type"=>$type,
						  "people"=>$people,"tot_rows"=>$tot_rows));
	return $smarty->fetch('right_page_videos.tpl');	
}
?>
