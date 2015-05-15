<?php
global $Server_View_Path;
$Server_Admin_Path=$Server_View_Path."administrator/";
global $NRPP;


// Show at index.tpl. for showing number of invites request
global $invit_num;
$invit_num=get_row_count("invites_request","where 1");
global $company_invite_num;
$company_invite_num=get_row_count("company","where company_status=0");


// Get admin info
if(get_admin_info($admin))
{
    $SiteName=$admin[sa_site_name];
    $FromMail=$admin[sa_from_email];
    $AdminName=$admin[sa_from_name];
    $AdminMail=$admin[sa_from_email];
    $AdminToName=$admin[sa_to_name];
    $AdminToEmail=$admin[sa_to_email];
    $NRPP=$admin[sa_nrpp];
}
?>