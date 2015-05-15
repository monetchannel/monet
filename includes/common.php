<?php
error_reporting(1);
$Server_Upload_Path="C:/xampp/htdocs/monet/";
$Server_View_Path="http://localhost/monet/lmsin/";
$RTMPSERVER="rtmp://fd69vu2t.rtmphost.com/monet";
//$RTMPSERVER="rtmp://fd69vu2t.rtmphost.com/monet";
$Server_Include_Path=$Server_Upload_Path."includes/";
$Upload_Path=$Server_Upload_Path."uploads/";
$View_Path=$Server_View_Path."uploads/";

$Server_company_Path="http://localhost/monet1/corporate/";

include_once($Server_Include_Path."sajax.php");
include_once($Server_Include_Path."functions.php");
include_once($Server_Include_Path."yt.php");

include_once($Server_Upload_Path."smarty/libs/Smarty.class.php");
//include_once($Server_Include_Path."globals.php");
include_once($Server_Include_Path."save_del_functions.php");

include_once($Server_Include_Path."right_data.php");

$send_grid_email="monetchannel@gmail.com";
$send_grid_pass="000.00.00";
$imagemagick="convert";
$USESENDGRID=1;
$NRPP=20;
$NFTime=3600;// It is use in add_newsfeed function
$func_ary=array();
init();
//create_backup();
#########################################
function connectDB()
{
    /* Connecting, selecting database */
    $conn = mysql_connect("127.0.0.1", "root", "") or die("Could not connect");
    mysql_select_db("monetdbase") or die("Could not select database");
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
    global $NRPP;
	global $NFTime;
	global $STDMUL;
    session_start();
    
    if(isset($_SESSION['AdminId'])){$_SESSION['AdminId']=session_id();}
	if(isset($_SESSION['UserId'])){$_SESSION['UserId']=$_COOKIE["PHPSESSID"];}
	
    connectDB();
    if(get_admin_info($admin))
    {
        $SiteName=$admin['sa_site_name'];
        $FromMail=$admin['sa_from_email'];
        $AdminName=$admin['sa_from_name'];
        $AdminMail=$admin['sa_from_email'];
        $AdminToName=$admin['sa_to_name'];
        $AdminToEmail=$admin['sa_to_email'];
        $NRPP=$admin['sa_nrpp'];
		$STDMUL=$admin['sa_stdmul'];
    }
}
?>