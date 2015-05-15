<?php
error_reporting(1);
$Server_Upload_Path="C:/xampp/htdocs/monet/";
$Server_View_Path="http://localhost/monet/lmsin/";
$RTMPSERVER="rtmp://fd69vu2t.rtmphost.com/monet";
//$RTMPSERVER="rtmp://fd69vu2t.rtmphost.com/monet";
$Server_Include_Path=$Server_Upload_Path."includes/";
$Upload_Path=$Server_Upload_Path."uploads/";
$View_Path=$Server_View_Path."uploads/";

$Server_company_Path="http://localhost/monet/lmsin/corporate/";

include_once($Server_Include_Path."sajax.php");
include_once($Server_Include_Path."functions.php");
include_once($Server_Include_Path."yt.php");

include_once($Server_Upload_Path."smarty/libs/Smarty.class.php");
//include_once($Server_Include_Path."globals.php");
include_once($Server_Include_Path."save_del_functions.php");

include_once($Server_Include_Path."right_data.php");

//Facebook API
require 'facebook-php-sdk-v4-4.0-dev/autoload.php';
$fb_app_id = "1638839849673050";
$fb_secret = "c48de28b5347dcaaa700dab1556f61da";

//Google API
//require 'google-api-php-client/src';
//require_once 'gplus-quickstart-php-master/src/contrib/Google_PlusService.php';
set_include_path(get_include_path().PATH_SEPARATOR.'google-api-php-client/src');
require 'google-api-php-client/autoload.php';
require 'google-api-php-client/src/Google/Client.php';
require 'google-api-php-client/src/Google/Config.php';
require 'google-api-php-client/src/Google/Service.php';
require 'google-api-php-client/src/Google/Service/Resource.php';
require 'google-api-php-client/src/Google/Collection.php';
require 'google-api-php-client/src/Google/Service/Plus.php';
$google_client_id="1068253118929-2b1c0fpn43284qv8gq0rrkcgee3anpj8";
$google_secret = "fPx8S76OJBfC781TN5BW8Nbl";
$google_api_key = "AIzaSyA4o8QQBnlLCUwnq6-DAyWhPISP1qdkBwg";

$send_grid_email="cynets@gmail.com";
$send_grid_pass="General123";
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