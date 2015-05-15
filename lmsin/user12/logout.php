<?php
include("../includes/common.php");
init();

// logout();
// 
// function logout()
// {
	// global $Server_View_Path;
	// global $Server_company_Path;
	// get_row_con_info("company","where company_id='$_COOKIE[BrandId]'","company_url",$com);
	// if($_COOKIE[BrandId])
		// $url=$Server_company_Path.$com[company_url];
	// else
		// $url=$Server_View_Path."user/";
// 	
	// unset($_COOKIE['UserId']);
	// unset($_COOKIE['UserName']);
	// $_COOKIE[BrandId]="";
	// $_SESSION[user_accept_toc]="";
	// $_SESSION[FBuserID]='';
	// $_COOKIE[UserId]="";
	// $_COOKIE[UserName]="";
	// setcookie("BrandId",'',time()-86400, '/');
	// setcookie("UserId",'',time() - 86400, '/');
	// setcookie("UserName",'',time() - 86400, '/');
// 
	// // header("Location:$url");
	// // die();
// 	
// }

var_dump($_COOKIE);
