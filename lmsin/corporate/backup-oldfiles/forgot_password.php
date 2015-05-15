<?php
require('../smarty/libs/Smarty.class.php');
include("../includes/common.php");
init();
//.........................................

$func_ary=array("forgot_password","send_password","reset_password","update_password");
if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}
else
{
	forgot_password();
	die();
}
######################################################
function send_password()
{
   global $Server_View_Path,$SiteName;
   global $Server_company_Path;
	if(get_row_con_info("company","where company_email='$_REQUEST[user_email]' limit 0,1","",$data))
	{
		$key=base64_encode($data[company_email]);	
		save_passwod_key($key,$data[company_id]);	
		
		$user[name]=$data[company_name];
		$user[key]=$Server_company_Path."reset_password/".$key;
		$message=get_parse_tpl_page("forgot_password_mail.tpl",$user);
		$msg="Your password reset request link has been emailed to $data[company_email].";  
		
		$subject=$SiteName." Password Assistance";  
		send_mail_to_user($data[company_id],$message,$subject);
		header("Location: index.php?msg=$msg");
	}
	else
	    forgot_password("We are sorry your email address could not be found. <br>Please enter the correct email address.<br><br>");

}
#####################################################3
function forgot_password($msg="")
{
   global $Server_View_Path;
   global $Server_company_Path;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	$smarty->assign(array("SERVER_PATH"=>$Server_View_Path,"SERVER_COMPANY_PATH"=>$Server_company_Path, "msg"=>$msg, "heading"=>"Login","act"=>"send_password"));
	$smarty->display("forgotten_password.tpl");
}
function reset_password($msg='')
{
	global $Server_View_Path;
	global $Server_company_Path;
	// This is used when .htaccess added slashes at end
	//$_REQUEST[fp_key]=substr($_REQUEST[fp_key],0,-1);
	$t=time()-86400;
	if(get_row_con_info("forgot_pass","where fp_key='$_REQUEST[fp_key]' and CAST(fp_date as unsigned INT)>'$t' ","",$data))
	{
		$smarty = new Smarty;
		$smarty->assign(array("SERVER_PATH"=>$Server_View_Path, "msg"=>$msg, "act"=>"update_password","fp_key"=>$_REQUEST[fp_key],"SERVER_COMPANY_PATH"=>$Server_company_Path));
		$smarty->display("update_password.tpl");	
	}
	else
	{
		header("Location: ".$Server_company_Path."index.php?msg=The requested url is expired.");
	}
}
function update_password()
{
	$R=DIN_ALL($_REQUEST);
	global $Server_View_Path;
	global $Server_company_Path;
	$t=time()-86400;
	if(get_row_con_info("forgot_pass","where fp_key='$_REQUEST[fp_key]' and CAST(fp_date as unsigned INT)>'$t' ","",$data))
	{
		$pass_mail=$R[l_pass];		
		$pass=md5($R[l_pass]);
		$SQL="Update company set  company_password='$pass' where company_id='$data[fp_l_id]'";
		eq($SQL,$rs);
		get_row_con_info("company","where company_id='$data[fp_l_id]'","",$data);
		$subject=$SiteName." Password Assistance";  
		
		$user[password]=$pass_mail;
		$user[name]=$data[company_name];
		$user[SERVER_COMPANY_PATH]=$Server_company_Path;
        $message=get_parse_tpl_page("forgot_update_mail.tpl",$user);
		send_mail_to_user($data[fp_l_id],$message,$subject);
			
	}
	else
		header("Location: ".$Server_View_Path."index.php?msg=The requested url is expired.");
}
function save_passwod_key($key,$l_id)
{
	$t=time();
	$SQL="INSERT INTO `forgot_pass` ( `fp_l_id` , `fp_key` , `fp_date` , `fp_valid` )
VALUES ('$l_id', '$key', '$t', '0');";
	ei($SQL);
}

function send_mail_to_user($l_id,$message='',$subject='')
{
	$message=DOUT($message);
	$subject=DOUT($subject);
	get_row_con_info("company","where company_id='$l_id'","",$user);
	$to_name=$user[company_name];
	send_mail_new($to_name,$user[company_email],"","",$subject,$message);
	header("Location: ".$Server_View_Path."index.php?msg=Please login with your username and new password.");
}
?>