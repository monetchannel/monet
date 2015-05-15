<?php
$Server_Upload_Path="/home/gauravag/public_html/dev/monet/new/";
$Server_View_Path="http://dev.cynets.com/monet/new/";
$RTMPSERVER="rtmp://fd69vu2t.rtmphost.com/Monet";
$Server_Include_Path=$Server_Upload_Path."includes/";
$Upload_Path=$Server_Upload_Path."uploads/";
$View_Path=$Server_View_Path."uploads/";
include_once($Server_Upload_Path."smarty/libs/Smarty.class.php");
include_once($Server_Include_Path."template.inc");
include_once($Server_Include_Path."functions.php");
include_once($Server_Include_Path."save_del_functions.php");
include_once($Server_Include_Path."sajax.php");

$imagemagick="convert";
$NRPP=20;
$func_ary=array();
init();
//create_backup();
#########################################
function connectDB()
{
    /* Connecting, selecting database */
    $conn = mysql_connect("localhost", "gauravag_monet", "General123") or die("Could not connect");
    mysql_select_db("gauravag_monet") or die("Could not select database");
    return $conn;
}
##########################################
function init()
{
    global $SiteName;
    
    global $FromMail;    
    global $AdminName;
    global $AdminMail;
    global $AdminToName;
    global $AdminToEmail;
	global $STDMUL;
    
    global $NRPP;
    session_start();
    
    if(!session_is_registered("AdminId")){session_register("AdminId");}
	if(!session_is_registered("UserId")){session_register("UserId");}
    connectDB();
    if(get_admin_info($admin))
    {
        $SiteName=$admin[sa_site_name];
        $FromMail=$admin[sa_from_email];
        $AdminName=$admin[sa_from_name];
        $AdminMail=$admin[sa_from_email];
        $AdminToName=$admin[sa_to_name];
        $AdminToEmail=$admin[sa_to_email];
        $NRPP=$admin[sa_nrpp];
		$STDMUL=$admin[sa_stdmul];
    }
}

?>