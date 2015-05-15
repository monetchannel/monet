<?php
include("../includes/common.php");
init();

sajax_export();
sajax_handle_client_request();
$js = sajax_return_javascript();
$func_ary=array("show_login","chk_login","logout","save_invites_request","view_toc",'toc',"accept_toc_tem");

###################################
# If user already login and type in url http://corporate.monetchannel.com/brand-name/
if($_COOKIE[UserId]!="" && $_REQUEST[company_url]!='' && $_REQUEST[act]!="logout")
{
	global $Server_View_Path;
	$path=$Server_View_Path.'watch_video.php';
	header("Location:$path");
	die();
}

if ($_COOKIE[UserId]=="" AND $_REQUEST[act]!="show_login" AND $_REQUEST[act]!="chk_login" && $_REQUEST[act]!="save_ragistration" && $_REQUEST[act]!="save_invites_request"  && $_REQUEST[act]!="toc")
{
   show_login();
   die();
}

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}
else
{
	show_login();
	die();
}

#########################################
function show_login($msg="")
{
	$R = DIN_ALL($_REQUEST);
	global $Server_View_Path;	
	global $Server_company_Path;
	$smarty = new Smarty;
	get_new_option_list('countries','countries_id','countries_name','',$country_name,0,"",1);
	
	$smarty->assign(array("msg"=>$msg,"none"=>$none,"SERVER_COMPANY_PATH"=>$Server_company_Path,
						 "country_name"=>$country_name,
						 "SERVER_PATH"=>$Server_View_Path,
						 "company_url"=>$R[company_url],
						 "company_name"=>$company[company_name],
						 "records"=>$records,"c_id"=>$R[c_id],
						 "company_id"=>$company[company_id]));

	$smarty->display("index_user_login.tpl");
}
############################# OK ############
function chk_login()
{
	$R=DIN_ALL($_REQUEST);
	global $Server_View_Path;
	$R[user_password]=md5($R[user_password]);
	
	if(!get_row_con_info("users","where user_email='$R[user_email]' AND user_password='$R[user_password]' limit 0,1","",$user))
	{
		$ary[0]="The email address and password you entered does not match our records. Please try again."; //We used jquery ajax so use print
		$ary[1]=1;
		print json_encode($ary);
		die();
	}
	else
	{
		get_row_con_info("company","where company_url='$R[company_url]' limit 0,1","company_id",$company);
		$_COOKIE[BrandId]=$company[company_id];
		$_SESSION[user_accept_toc]=$user[user_accept_toc];
		$_COOKIE[UserId]=$user[user_id];
		$_COOKIE[UserName]=$user[user_fname]." ".$user[user_lname];
	
		setcookie("BrandId",$company[company_id],time()+86400,"/");
		setcookie("UserId",$user[user_id],time()+86400,"/");
		setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400,"/");
		
		if($R[c_id] && $user[user_accept_toc]==1)
		{
			$ary[0]="watch_video.php?act=watch_video&c_id=".$R[c_id];
			$ary[1]=2;
			print json_encode($ary);
			die();
		}
		elseif($user[user_accept_toc]==1)
		{
			$ary[0]="watch_video.php";
			$ary[1]=2;
			print json_encode($ary);
			die();
		}
		else
		{
			$ary[0]="index.php?act=view_toc";
			$ary[1]=2;
			print json_encode($ary);
			die();
		}
	}	
}
###########################################################
function logout()
{
	global $Server_View_Path;
	global $Server_company_Path;
	get_row_con_info("company","where company_id='$_COOKIE[BrandId]'","company_url",$com);
	if($_COOKIE[BrandId])
		$url=$Server_company_Path.$com[company_url];
	else
		$url=$Server_View_Path."new/";
	
		unset($_COOKIE[UserId]);
		$_COOKIE[BrandId]="";
		$_SESSION[user_accept_toc]="";
		$_SESSION[FBuserID]='';
		$_COOKIE[UserId]="";
		$_COOKIE[UserName]="";
		setcookie("BrandId",'',time()-10);
		setcookie("UserId",'',time()-10);
		setcookie("UserName",'',time()-10);

	header("Location:$url");
	die();
	
}
############################################
function save_invites_request()
{
	$R=DIN_ALL($_REQUEST);
	global $Server_View_Path;
	
	if(!filter_var($R[user_email], FILTER_VALIDATE_EMAIL))
	{
		print "Please enter a valid email address to continue.";
		die();
	}
	
	if(get_row_count("invites_request","where invr_eamil='$R[user_email]' limit 0,1")>0 || get_row_count("users","where user_email = '$R[user_email]' AND user_email !='' limit 0,1"))
	{
		print "User email $R[user_email] already exists.";
		die();
	}
	else
	{
		//get_row_con_info("company","where company_url='$R[company_url]' limit 0,1","company_id,company_name",$company);
		$user_dob=$R[dob_mm]."/".$R[dob_dd]."/".$R[dob_yy];
		
		if($R[user_fname]!='' && $R[user_lname]!='' && $R[user_email]!='' && $R[user_country]!=-1 && $R[user_zipcode]!='')
		{
			$SQL="INSERT INTO `invites_request` ( `invr_fname` , `invr_lname` , `invr_eamil` , `invr_date`,`invr_country`,`invr_zipcode`,invr_company_id)VALUES ( '$R[user_fname]', '$R[user_lname]', '$R[user_email]','".time()."','$R[user_country]','$R[user_zipcode]','$R[company_id]')";
			eq($SQL,$rs);
		}
		else
		{
			print "Please fill all fields.";
			die();	
		}
		
		$subject="New Invitation Request From ".$company[company_name];
		$admin_url=$Server_View_Path."administrator/";
		$user[name]=$R[user_fname]." ".$R[user_lname];
		$user[email]=$R[user_email];
		$user[admin_url]=$Server_View_Path."administrator/";
		$message=get_parse_tpl_page("signup_mail.tpl",$user);
		///send_mail_new("","","MonetChannel","support@monetchannel.com",$subject,$message);
		send_mail_new("","","MonetChannel","dinesh.chandra@cynets.com",$subject,$message);
		
		print "Thank you for registering. We will process your request and send you a conformation on your email shortly.";
        die();
	    }
}###########################################################

function toc()
{
	$R = DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	$smarty->display("small_view_toc.tpl");
}
##########################################
### This function need to delete after change name
# becase this is define in two place
###########################################
function accept_toc_tem()
{
	$SQL="Update users set user_accept_toc= '1' where user_id='$_COOKIE[UserId]'";
	eq($SQL,$rs);
    header("Location:watch_video.php");
}
?>
