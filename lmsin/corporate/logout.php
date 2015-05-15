<?php 
$_COOKIE[CompanyId]="";
	$_COOKIE[CompanyName]="";
	$_COOKIE[CompanyLogo]="";
	$_COOKIE[CompanyLogoSmall]='';
	setcookie("CompanyId","",time()-86400);
	setcookie("CompanyName","",time()-86400);
	setcookie("CompanyLogo","",time()-86400);
	setcookie("CompanyLogoSmall","",time()-86400);
	
	header("Location:index.php");
?>