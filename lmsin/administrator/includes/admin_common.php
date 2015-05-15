<?php
#store setting which is only needed for Admin
global $Server_View_Path;
$Server_Admin_Path=$Server_View_Path."administrator/";
global $NRPP;

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

#############################3
/*#merge the passed in data with header and footer and displays it
function show_pg($data="",$sel="")
{ 
	global $SiteName;
	global $Server_Admin_Path;
	global $Server_View_Path;
	$t = new Template("templates");
	$t->set_file("MyFileHandle","index.htm");
	if(!$_SESSION["Admin"])
		$none="none";
	$invr_num=get_row_count("invites_request","");	
	$t->set_var(array("msg"=>$msg,
					  "dt" => $dt,
					  "js" => $js,
					  "body_data"=>$data,
					  $sel."_tab"=>"selected",
					  "SiteName"=>$SiteName,
					  "SERVER_PATH"=>$Server_View_Path,
					  "none"=>$none,
					  "invr_num"=>$invr_num,
					));
	$t->parse("MyOutput","MyFileHandle"); 
	$t->p("MyOutput"); 
}
#merge the passed in data with header and footer and displays it
function show_pg($data="",$show_login=0,$show_popup=0,$mnu_id=0,$js="")
{ 
    global $SiteName;
    global $Server_Admin_Path;
    global $Server_View_Path;
    $t = new Template("templates");
    $t->set_file("MyFileHandle","index.htm");
    if($show_login==1)
    {
        $t->set_file("MyFileHandle","index_login.htm");
    }

    //format_date(time(),$dt,$tm);
    if($_SESSION[P_Id]==1 OR $_SESSION[P_Id]==0)  // Global Admin
    {
       if($_SESSION[P_Id]==0)
       {
	    $_REQUEST[hide_sec_tabs]=array();
	    $_REQUEST[hide_sec_tabs][tabset1]=1;
	    $_REQUEST[hide_sec_tabs][tabset2]=1;
      }
	$t->set_var(array("sec_tabs"=>get_secondary_tabs($_REQUEST[sec_tabs],"",$_REQUEST[hide_sec_tabs]),));  
    }
    $t->set_var(array("msg"=>$msg,
                      "dt" => $dt,
				      "js" => $js,
                      "body_data"=>$data,
                      "mnu_id"=>$mnu_id, 
					  $_REQUEST[mnu_id]."_tab"=>"selected",
                      "SiteName"=>$SiteName,
                      "SERVER_PATH"=>$Server_View_Path,
                    ));
    $t->parse("MyOutput","MyFileHandle"); 
    $t->p("MyOutput"); 
}
#############################3
function get_secondary_tabs($tab="",$R="",$R_hide="")
{
    $ret="";
    if($tab)
    {
	$t = new Template("templates");
	$t->set_file("MyFileHandle",$tab."_sec_tabs.htm");
	$t->parse("MyOutput","MyFileHandle");
	if($R AND is_array($R))
	{
	    $t->set_var($R);
	}
	if($R_hide AND is_array($R_hide))
	{
	    foreach($R_hide as $k=>$v)
	    {
		if($v)
		{
		    $t->set_var(array("hide_".$k=>"none"));
		}
	    }
	}
	$t->parse("MyOutput","MyFileHandle"); 
	$ret=$t->get("MyOutput"); 
    }
    return $ret;
}

function inv_req()
{
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	$invr_num=get_row_count("invites_request","");	
	$smarty->assign(array("invr_num"=>$invr_num));
	//$smarty->display("index.tpl");
}*/
?>