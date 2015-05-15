<?php
function func_company_delete($company_id)
{
	delete_upload_file($company_id,"company_logo");
	$SQL="DELETE FROM company WHERE company_id='$company_id'";
    eq($SQL,$rs);
}


function add_newsfeed($type_id, $user_id="", $item_id)
{
	global $NFTime;
	$dt=time();
	$date=$dt-$NFTime;
	
	if(get_row_con_info("`newsfeed`","WHERE `nf_nftype_id` = '$type_id' and `nf_user_id` = '$user_id' and `nf_date` > '$date'","",$newsfeed))
	{
		
		if(!get_row_count("newsfeed_items","WHERE nfi_nf_id='$newsfeed[nf_id]' AND nfi_item_id='$item_id'"))
		{
			$SQL="UPDATE `newsfeed` SET `nf_count` = nf_count+1, nf_date='$dt' WHERE `nf_id` = '$newsfeed[nf_id]'";
			eq($SQL,$rs);
			
			$SQL1 = "INSERT INTO `newsfeed_items` (`nfi_nf_id`, `nfi_item_id`,nfi_date) VALUES ('$newsfeed[nf_id]', '$item_id','$dt')"; 
			eq($SQL1,$rs1);
		}
	}
	else
	{
		$SQL="INSERT INTO `newsfeed` (`nf_date`, `nf_nftype_id`, `nf_count`, `nf_user_id`) VALUES ('$dt', '$type_id', '1', '$user_id')";
		$nf_id=ei($SQL);
		
		$SQL1 = "INSERT INTO `newsfeed_items` (`nfi_nf_id`, `nfi_item_id`,nfi_date) VALUES ('$nf_id', '$item_id','$dt')"; 
		eq($SQL1,$rs1);
	}
	
}

#################################################################3
function delete_suggested_video($cs_id)
{
   $SQL="DELETE FROM content_suggested WHERE cs_id='$cs_id'";
   return eq($SQL,$rs);
}
#################################################################
function func_delete_analysis_results()
{
	$SQL="TRUNCATE TABLE `analysis_results`";
	eq($SQL,$rs);
	$SQL="TRUNCATE TABLE `analysis_detail`";
	eq($SQL,$rs);
}

function func_save_accept_invite_request($invrequest)
{
	$SQL="INSERT INTO users(user_fname,user_lname,user_gender,user_dob,user_email,user_password,user_country,user_zipcode) VALUES ('$invrequest[invr_fname]','$invrequest[invr_lname]','$invrequest[invr_gender]','$invrequest[invr_dob]','$invrequest[invr_eamil]','$invrequest[password]','$invrequest[invr_country]','$invrequest[invr_zipcode]')";
	$user_id=ei($SQL);
	
	if(get_row_con_info("invite","WHERE `inv_to_name` = '$invrequest[invr_fname]' and `inv_to_email` = '$invrequest[invr_eamil]'","",$inv))
	{
		$invite_user=$inv[inv_user_id];
		
		$SQL1="INSERT INTO user_friends (`uf_user_id`,`uf_fuser_id`,`uf_approved`) VALUES ('$user_id','$invite_user','1')";
		eq($SQL1,$rs1);
	}
	
}
############################ SAVE CETEGORY-VIDEO #######################################
function func_save_category_video($c_category,$c_id)
{
	foreach($c_category as $k=>$v)
	{
		if($v)
		{
			$SQL="INSERT INTO `category_video` (`cv_cat_id` , `cv_c_id` )VALUES ( '".$v."', '".$c_id."')";
			eq($SQL,$rs);
		}
	}
}
function func_update_category_video($c_category,$c_id)
{
	foreach($c_category as $k=>$v)
	{
		if($v)
		{
			$SQL="UPDATE `category_video` (`cv_cat_id` , `cv_c_id` )VALUES ( '".$v."', '".$c_id."')";
			eq($SQL,$rs);
		}
	}
}
############################ UPDATE ADMIN #######################################
function func_update_admin($R)
{
	$SQL="UPDATE `site_admin` SET `sa_password` =  '$R[sa_password]',
								  `sa_email` = '$R[sa_email]',
								  `sa_site_name` = '$R[sa_site_name]',
								  `sa_from_name` = '$R[sa_from_name]',
								  `sa_from_email` = '$R[sa_from_email]',
								  `sa_to_name` = '$R[sa_to_name]',
								  `sa_to_email` = '$R[sa_to_email]',
								  `sa_nrpp` = '$R[sa_nrpp]',
								  `sa_db_backup_time` = '$R[sa_db_backup_time]',
								  `sa_stdmul` = '$R[sa_stdmul]'";
	eq($SQL,$rs);
}
function func_update_settings($R)
{
	$SQL="UPDATE `site_admin` SET `sa_nrpp` = '$R[sa_nrpp]',`sa_stdmul` = '$R[sa_stdmul]'";
	eq($SQL,$rs);
}
//------------------------------------------------------------------------------------
############################ SAVE UPDATE DEL CATEGORY ################################
function func_save_category($cat_name)
{
	$SQL="INSERT INTO `category` SET `cat_name`='$cat_name'";
	return ei($SQL);
}
//-----------------------------------
function func_update_category($cat_name,$cat_id)
{
	$SQL="UPDATE `category` SET `cat_name`='$cat_name' WHERE cat_id='$cat_id'";
	eq($SQL,$rs);
}
//-----------------------------------
function func_delete_category($cat_id)
{
	$SQL="DELETE FROM `category` WHERE cat_id='$cat_id'";
	eq($SQL,$rs);
	//------------------Delete category_video -----------------------
	$SQL="DELETE FROM `category_video` WHERE `cv_cat_id`='$cat_id'";
	eq($SQL,$rs);
}
//------------------------------------------------------------------------------------
############################ SAVE UPDATE DEL USER ###################################
function func_save_user($user_fname,$user_lname,$user_gender,$mm,$dd,$yy,$user_email,$user_max_invites,$user_password,$company_id=0)
{
	$user_password=md5($user_password);
	$SQL="INSERT INTO `users` SET `user_fname`='$user_fname',
								  `user_lname`='$user_lname',
								  `user_gender`='$user_gender',
								  `user_dob`='$mm/$dd/$yy',
								  `user_email`='$user_email',
								  `user_max_invites`='$user_max_invites',
								  `user_password`='$user_password',
								  `user_company_id`='$company_id'";
								  
	eq($SQL,$rs);
}
//-----------------------------------
function func_update_user($user_fname,$user_lname,$user_gender,$mm,$dd,$yy,$user_email,$user_max_invites,$user_password,$user_id,$company_id=0)
{
	if($user_password)
	{
		$user_password=md5($user_password);
		$password="`user_password`='$user_password',";
	}
	else
		$password="";
		
	$SQL="UPDATE `users` SET `user_fname`='$user_fname',
								  `user_lname`='$user_lname',
								  `user_gender`='$user_gender',
								  `user_dob`='$mm/$dd/$yy',
								  `user_email`='$user_email',
								   $password
								   `user_max_invites`='$user_max_invites',
								   `user_company_id`='$company_id'
								    WHERE user_id='$user_id'";
	eq($SQL,$rs);
}
//----------------------------------
function func_delete_user($user_id)
{
	$SQL="DELETE FROM `users` WHERE `user_id`='$user_id'";
	eq($SQL,$rs);
	//------------------Delete content_feedback -----------------------
	$SQL="DELETE FROM `content_feedback` WHERE `cf_user_id`='$user_id'";
	eq($SQL,$rs);
	//------------------Delete invite -----------------------
	$SQL="DELETE FROM `invite` WHERE `inv_user_id`='$user_id'";
	eq($SQL,$rs);
}
//------------------------------------------------------------------------------------
############################ DEL VIDEO ###############################################
function func_delete_video($c_id)
{
	func_delete_category_video($c_id);
	func_delete_feedback($c_id);
	delete_upload_file($c_id,"video_file");
	delete_upload_file($c_id,"video_image");
	$SQL="delete from content where c_id='$c_id'";
	eq($SQL,$rs);
	
}
//-------------------------------------------------------------------------------------
############################ DEL CATEGORY VIDEO #######################################
function func_delete_category_video($c_id)
{
	$SQL="DELETE FROM `category_video` WHERE cv_c_id='$c_id'";
	eq($SQL,$rs);
}
//-------------------------------------------------------------------------------------
function func_delete_deny_request($invr_id)
{
	$SQL="DELETE FROM invites_request WHERE invr_id= '$invr_id'";
	eq($SQL,$rs);
}
//-------------------------------------------------------------------------
function func_delete_feedback($c_id)
{
	$SQL="delete from content_feedback where cf_c_id='$c_id'";
	eq($SQL,$rs);
}
?>
