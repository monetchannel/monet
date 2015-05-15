<?php
include ("../includes/common.php");
include ("includes/globals.php");

init();
#############################################################
if ($_SESSION["Admin"]=="" AND $_REQUEST[act]!="show_login" AND $_REQUEST[act]!="chk_login" )
{ #not logged in
   show_login();
   return;
}
$func_ary=array("delete_log","view_log","show_login","chk_login","show_preferences","update_preferences","change_password","update_password","logout","view_admin","admin_edit","update_admin","import_file","import_do");

if(fe($_REQUEST[act]))
{
   $_REQUEST[act]($_REQUEST[msg]);
   die();
}

header("Location:video.php");
die();
////////////////////////////////////////////////
function extractZip( $zipFile = '' )
{   
    define(DIRECTORY_SEPARATOR, '/');
    $zipDir = "X:\monet\administrator\dinesh" . DIRECTORY_SEPARATOR;
	$zip_file_array=array();
    $zip = zip_open($zipDir.$zipFile);
    if ($zip)
    {
        while ($zip_entry = zip_read($zip))
        {
           /// $completeName = $zipDir . zip_entry_name($zip_entry);
			$completeName = zip_entry_name($zip_entry);
			$ext=strrchr($completeName,".");
         	if($ext==".txt")
			{
				$zip_file_array[$i]=$completeName;
				$i++;
			}
        }
        zip_close($zip);
    }
    return $zip_file_array;
}

/////////////////////////////////////////////// Import section
function import_file($msg="")
{
	$R=DIN_ALL($_REQUEST);
	global $invit_num;
   	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"act"=>"import_do"));
	$smarty->display("import_file.tpl");
}

function import_do()
{
	global $Server_View_Path;
	global $Upload_Path;
	move_uploaded_file($_FILES['file']['tmp_name'], $Upload_Path . $_FILES['file']['name']);
	
	$file_array=extractZip($Upload_Path.$_FILES[file][name]);
	foreach($file_array as $key=>$value)
	{
		$SQL="INSERT INTO `analysis_results` ( `ar_id` , `ar_date` , `ar_cf_id` )VALUES ( '', '')";
		eq($SQL,$rs);
		
		$handle=fopen($Server_View_Path.$value,"r");
		$k=0;
		while($col_ary=fgetcsv($handle,1000,"\t"))
		{
			if($k<=5 || count($col_ary)!=8)
			{
				$k++;
				continue;
			}
			
			for($i=0;$i<count($col_ary);$i++)
			{
				if($col_ary[$i] == 'FIND_FAILED' || $col_ary[$i] == 'FIT_FAILED')
				{
					$col_ary[$i] = '-1';
				}
			}
			
			$col_ary=DIN_ALL($col_ary);
			$SQL="INSERT INTO `analysis_detail` (`ad_ar_id` , `ad_time` , `ad_neutral` , `ad_happy` , `ad_sad` , `ad_angry` , `ad_suprised` , `ad_scared` , `ad_disgusted` )VALUES ( '1','".$col_ary[0]."', '".$col_ary[1]."','".$col_ary[2]."', '".$col_ary[3]."', '".$col_ary[4]."', '".$col_ary[5]."', '".$col_ary[6]."', '".$col_ary[7]."')";
			eq($SQL,$rs);
			
		}
		fclose($handle);
	}
	import_file("File Import Succesfully.");
}
////////////////////////////////////////////////

function admin_edit($msg="")
{
	$R=DIN_ALL($_REQUEST);
	global $invit_num;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	get_row_con_info("site_admin","","",$data);
   	$smarty->assign($data);
   	$smarty->assign(array("msg"=>$msg,
						  "act"=>"update_admin",
						  "invit_num"=>$invit_num
						  ));
	$smarty->display("admin_edit.tpl");
}
//---------------Save Admin------------------
function update_admin()
{
	$R=DIN_ALL($_REQUEST);
	func_update_admin($R);
	admin_edit("Updated Successfully");
}
############################# OK ############
function show_login($msg="")
{
	$R = DIN_ALL($_REQUEST);	
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	if($R[msg]){$msg=$R[msg];}
	if(!$_SESSION["Admin"]){$none="none";}
	$smarty->assign(array("msg"=>$msg,"none"=>$none,));
	$smarty->display("show_login.tpl");
}
############################# OK ############
function chk_login()
{
   $R = DIN_ALL($_REQUEST);
   $SQL = "SELECT * FROM site_admin where sa_password = '$R[pass]' And sa_email = '$R[user_name]'";
   if(eq($SQL,$rs)==0)
   {
      #incorrect pass
      show_login("Incorrect Password. Please try again!");
      return;
   }
   else
   {#correct pass
      $data = mfa($rs);
      $_SESSION["Admin"]=$data[sa_email];
	  header("Location: video.php");
   }
}
###########################################################
function logout()
{
   $_SESSION["Admin"]="";
   show_login("<p align=center> You have been successfully logged out. </p>");
}
?>