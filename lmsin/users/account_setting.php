<?php
#########################################################################################
$max_width = "500";							// Max width allowed for the large image
$thumb_width = "100";						// Width of thumbnail image
$thumb_height = "100";						// Height of thumbnail image
$small_thumb_width="50";					// Width of small thumb image
#################################################################################################3
function edit_profile()
{
	global $Server_View_Path;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	//----------------Profile Photo -------------------------------	
	get_row_con_info("users","where user_id='$_COOKIE[UserId]'","",$user);
	if(get_row_con_info("uploads","where up_s_id='$_COOKIE[UserId]' AND up_s_type='user_profile_photo'","",$up))
		$user[profile_picture]=$View_Path."thumb_".$up[up_fname].$up[up_ext];
	else
		$user[profile_picture]="images/small_no_profile_pic.jpg";
	
		
		$dob=explode("/",$user[user_dob]);
		
		get_yy_list($dob[2],2011,1905,$dob_yy);
		get_mm_list($dob[0],$option_dob_mm);
		get_dd_list($dob[1],$option_dob_dd);
		$select_f="";$select_m="";
		if($user[user_gender]=="Male")
			$select_m="selected";
		else if($user[user_gender]=="Female")
			$select_f="selected";
		$uploaded_image=$View_Path.$actual_image_name;
		
	    get_new_option_list('countries','countries_id','countries_name',$user[user_country],$country_name,0,"",1);
	
		$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,
							  "user"=>$user,"option_dob_yy"=>$dob_yy,
							  "option_dob_dd"=>$option_dob_dd,"option_dob_mm"=>$option_dob_mm,
							  "select_f"=>$select_f,"select_m"=>$select_m,"up_id"=>$up_id,
							  "actual_image_name"=>$actual_image_name,"uploaded_image"=>$uploaded_image,
							  "right_data_feed"=>get_right_column_data(),"act"=>"account_setting","country_name"=>$country_name
							  ));	
	
	return $smarty->fetch('account_settings.tpl');
}
###################################################################################
function edit_profile_do()
{
	global $thumb_height,$thumb_width,$max_width;
	
	$R=DIN_ALL($_REQUEST);
	global $Upload_Path;
	 if(get_row_count("users","where user_email = '$R[user_email]' AND user_email !='' AND user_id !='$_COOKIE[UserId]'"))
	 {
		print "<script>parent.window.edit_account_msg('\"$R[user_email]\" e-mail already exist.')</script>";
		die();
	 }
	
	if($R[user_old_password])
	{
		$R[user_old_password]=md5($R[user_old_password]);
		$R[user_password]=md5($R[user_password]);	
		
		if(!get_row_con_info("users","where user_password='$R[user_old_password]' AND user_id ='$_COOKIE[UserId]' ","",$users))
		{
			print "<script>parent.window.edit_account_msg('Please enter correct old password to continue.')</script>";
			die();
		}
		else
		{
			$field=",`user_password` = '$R[user_password]'";
		}
	}
	
	$user_dob=$R[dob_mm]."/".$R[dob_dd]."/".$R[dob_yy];
	$SQL = "UPDATE `users` SET `user_fname` = '$R[user_fname]', `user_lname` = '$R[user_lname]',`user_email` = '$R[user_email]', `user_country` = '$R[user_country]',`user_zipcode` = '$R[user_zipcode]' ,`user_gender`='$R[user_gender]', `user_dob`='$user_dob' $field where user_id='$_COOKIE[UserId]'";
	eq($SQL,$rs);
	
	if(strlen($_FILES['user_photo']['name'])>0)
	{
		$up_title="User Profile Photo";
		$up_s_id=$_COOKIE[UserId];
		$up_s_type="user_profile_photo";
		
		$userfile_name = $_FILES['user_photo']['name'];
		$userfile_tmp = $_FILES['user_photo']['tmp_name'];
		$userfile_size = $_FILES['user_photo']['size'];
		$userfile_type = $_FILES['user_photo']['type'];
		$filename = basename($_FILES['user_photo']['name']);
		$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
		
		$valid_formats = array("jpg","jpeg","JPG","JPEG", "png", "gif", "bmp");
		
		$name = $_FILES['user_photo']['name'];
		$size = $_FILES['user_photo']['size'];
		$file_type=$_FILES['user_photo']['type'];
		
		
			
		if(strlen($name))
		{
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats))
			{
				if( $size<(1024*1024))
				{
					$up_fname=$up_s_id.time();//.substr($txt, 5);
					$ext=".".$ext;
					$actual_image_name = $up_fname.$ext;
					$tmp = $_FILES['user_photo']['tmp_name'];
					
					$thumb_image_name= "thumb_".$up_fname.$ext;
					
					$large_image_location = $Upload_Path.$actual_image_name;
					$thumb_image_location = $Upload_Path.$thumb_image_name;
					
					//Everything is ok, so we can upload the image.
					
					//put the file ext in the session so we know what file to look for once its uploaded
					if(move_uploaded_file($tmp, $Upload_Path.$actual_image_name))
					{
						
						if(get_row_con_info("uploads"," where up_s_id='$up_s_id' and up_s_type='$up_s_type'","",$data))
							delete_upload($data[up_id]);
						
						$SQL="insert into uploads (`up_s_id`, `up_s_type`, `up_fname`, `up_oname`, `up_ext`, `up_file_type`, `up_date`, `up_title`) VALUES ('$up_s_id', '$up_s_type', '$up_fname', '$name', '$ext', '$file_type', '".time()."', '$up_title')";
						$up_id=ei($SQL);
									
						$width = getWidth($large_image_location);
						$height = getHeight($large_image_location);
						//Scale the image if it is greater than the width set above
						if ($width > $max_width){
							$scale = $max_width/$width;
							$uploaded = resizeImage($large_image_location,$width,$height,$scale);
						}else{
							$scale = 1;
							$uploaded = resizeImage($large_image_location,$width,$height,$scale);
						}
		
						print "<script>parent.window.crop_image_popup('$actual_image_name','$thumb_image_name','$width','$height','$thumb_width','$thumb_height');</script>";
						
					}
					else
						print "<script>parent.window.edit_account_msg('failed to upload image..!')</script>";
				}
				else
					print "<script>parent.window.edit_account_msg('Sorry your file size exeeded..!')</script>";
			}
			else
				print "<script>parent.window.edit_account_msg('Invalid file formats..!')</script>";			
		}
		else
			print "<script>parent.window.edit_account_msg('Please select image..!')</script>";
	}
	else
		print "<script>parent.window.edit_account_msg('Account Updated successfully.');</script>";
	
/*
	if(strlen($_FILES['user_photo']['name'])>0)
	{
		$up_title="User Profile Photo";
		$up_s_id=$_COOKIE[UserId];
		$up_s_type="user_profile_photo";
		
		$valid_formats = array("jpg","jpeg","JPG","JPEG", "png", "gif", "bmp");
		
		$name = $_FILES['user_photo']['name'];
		$size = $_FILES['user_photo']['size'];
		$file_type=$_FILES['user_photo']['type'];
		
		
			
		if(strlen($name))
		{
			list($txt, $ext) = explode(".", $name);
			if(in_array($ext,$valid_formats) && $size<(1024*1024))
			{
			
				$up_fname=$up_s_id.time();//.substr($txt, 5);
				$ext=".".$ext;
				$actual_image_name = $up_fname.$ext;
				$tmp = $_FILES['user_photo']['tmp_name'];
				if(move_uploaded_file($tmp, $Upload_Path.$actual_image_name))
				{
					
					if(get_row_con_info("uploads"," where up_s_id='$up_s_id' and up_s_type='$up_s_type'","",$data))
						delete_upload($data[up_id]);
					
					$SQL="insert into uploads (`up_s_id`, `up_s_type`, `up_fname`, `up_oname`, `up_ext`, `up_file_type`, `up_date`, `up_title`) VALUES ('$up_s_id', '$up_s_type', '$up_fname', '$name', '$ext', '$file_type', '".time()."', '$up_title')";
					$up_id=ei($SQL);
								
					print "<script>parent.window.crop_image_popup('$actual_image_name','$up_id');</script>";
				}
				else
					print "<script>parent.window.edit_account_msg('failed to upload image..!')</script>";
			}
			else
				print "<script>parent.window.edit_account_msg('Invalid file formats..!')</script>";					
		}
		else
			print "<script>parent.window.edit_account_msg('Please select image..!')</script>";
	}
	else
	//upload_file_new("user_photo",$_COOKIE[UserId],"user_profile_photo",0,$msg,"User profile photo",1);
	print "<script>parent.window.edit_account_msg('Account Updated successfully.');</script>";
	*/
}

if (isset($_POST["upload_thumbnail"]) ) {

	global $Upload_Path;
	global $thumb_height,$thumb_width,$small_thumb_width;
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$small_scale = $small_thumb_width/$w;
	
	$thumb_image=$Upload_Path.$_POST[thumb_image_name];
	$large_image=$Upload_Path.$_POST[image_name];
	$cropped = resizeThumbnailImage($thumb_image, $large_image,$w,$h,$x1,$y1,$scale);
	
	$small_thumb_image=$Upload_Path."small_thumb_".$_POST[image_name];
	$cropped_small = resizeThumbnailImage($small_thumb_image, $large_image,$w,$h,$x1,$y1,$small_scale);
	
   print "<script>parent.window.edit_account_msg('Account Updated successfully.');</script>";
	
}

##########################################################################################################
function open_upload_popup($image,$thumb_image_name,$Lwidth,$Lheight,$Twidth,$Theight)
{
	global $Server_View_Path;
	global $View_Path;
	global $Upload_Path;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	
	$div_width=$Lwidth;//+150;
	$div_height=$Lheight+$Theight;
	$overflow="";
	if($div_height>550)
		$overflow="overflow:auto";

	$smarty->assign(array("msg"=>$msg,"js"=>$js,"thumb_width"=>$Twidth,
						  "thumb_height"=>$Theight,"large_image_name"=>$image,
						  "Server_View_Path"=>$Server_View_Path,"View_Path"=>$View_Path,
						  "image_name"=>$image,"thumb_image_name"=>$thumb_image_name,
						  "large_image_width"=>$Lwidth,"large_image_height"=>$Lheight,
						  "div_width"=>$div_width,"div_height"=>$div_height,"overflow"=>$overflow));
	$ary[0]=$smarty->fetch('open_image_popup.tpl');
	$ary[1]=$Twidth;
	$ary[2]=$Theight;
	return $ary;
}
########################################################################################
function set_profile_image()
{
	global $View_Path;
	get_row_con_info("users","where user_id='$_COOKIE[UserId]'","",$user);
	if(get_row_con_info("uploads","where up_s_id='$_COOKIE[UserId]' AND up_s_type='user_profile_photo'","",$up))
		$profile_picture=$View_Path."thumb_".$up[up_fname].$up[up_ext];
	else
		$profile_picture="images/small_no_profile_pic.jpg";
	
	return $profile_picture	;
}
?>