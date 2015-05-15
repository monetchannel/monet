<?php
	include("../includes/common.php");
    init();
	$json_str = $_POST['json'];
	$json_str = stripslashes($json_str);
	$json = json_decode($json_str,true);
	
	if($json['gender']=='male')
		$json['gender'] = 'Male';
	else
		$json['gender'] = 'Female';
	//if(!get_row_con_info("users","where user_email='$json[email]' and user_password='fb_login' and user_flag= 1","",$user))
	if(!get_row_con_info("users","where user_email='$json[email]'","",$user))
	{
		$SQL = "INSERT into users (user_flag,user_fname,user_lname,user_gender,user_dob,user_email,user_password,user_max_invites,user_accept_toc,user_zipcode,user_country,user_company_id)";
		$SQL= $SQL."VALUES(1,'$json[first_name]','$json[last_name]','$json[gender]','$json[birthday]','$json[email]','fb_login',10,1,0,0,0)";
		echo $SQL;
		$SQL = mysql_query($SQL) or die(mysql_errno());
	}
	else
	{
		$_SESSION[FBuserID]=$json['id'];
		$_SESSION[user_accept_toc]=$user[user_accept_toc];
		$_COOKIE[UserId]=$user[user_id];
		$_COOKIE[UserName]=$user[user_fname]." ".$user[user_lname];
		setcookie("UserId",$user[user_id],time()+86400);
		setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400);
		
		print 1;
	}
	
	/*if(get_row_con_info("users","where user_email='$json[email]'","",$user))
	{
		$_SESSION[user_accept_toc]=$user[user_accept_toc];
		$_COOKIE[UserId]=$user[user_id];
		$_COOKIE[UserName]=$user[user_fname]." ".$user[user_lname];
		setcookie("UserId",$user[user_id],time()+86400);
		setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400);
	}
	else
		print -1;*/
	
	
?>