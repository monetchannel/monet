<?php
include ("../includes/common.php");
include ("includes/globals.php");
init();
//.........................................
sajax_export("company_view","accept_invite_request","company_add","company_save","company_edit","company_update","company_del");
sajax_handle_client_request();
$js = sajax_return_javascript();
//.........................................
$func_ary=array("company_save","company_update");
###################### Ok #####################################
if($_SESSION["Admin"]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}
if(fe($_REQUEST[act]))
{
  $_REQUEST[act]($_REQUEST[msg]);
   die();
}
company_index();
die();

#################################### BEGIN company SECTION ########################################
function company_index($msg='')
{
	global $js,$Server_View_Path;
	global $invit_num,$company_invite_num;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,"company_tab"=>"selected","invit_num"=>$invit_num,"company_invite_num"=>$company_invite_num));
	$smarty->display('company.tpl');
}
function company_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0)
{
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_View_Path;
	global $Server_company_Path;
	$company=array();
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
   #-------------- Sorting ----------
   $orderby="company_id";
   $order="DESC";
   $new_order="";
   if($orderby_p)
   {
      $order="DESC";
      $orderby=$orderby_p;
      if($order_p)
      {
         $order=$order_p;
      }
      if($order=="ASC")
      {
         $new_order="DESC";
      }
      else
      {
         $new_order="ASC";
      }
   }
   else
   {
   	$orderby="company_id";
   }
   
   $no_of_row_per_page=array(10,20,30,40,50);
	$default=20;
	if(is_array($no_of_row_per_page))
	{
		foreach($no_of_row_per_page as $v)
		{
			if($k==$default OR $v==$nrpp_p)
			{
				$sel="selected";
			}
			$nrppOpt .="<option value='$v' $sel>$v</option>";
			$sel="";
		}
	}
   
   $SQL="select * from company where company_status=1 ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"Company",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
		if($data[company_url])
			$data[company_url]=$Server_company_Path.$data[company_url];
				
		array_push($company,$data);
      }
   }
   else
   {
      $hide="none";
	  $msg=$msg."<br>Record Not Found!";
   }
   $smarty->assign(array("company"=>$company,
						"msg"=>$msg,
						"hide"=>$hide,
						"orderby"=>$orderby_p,
						"order"=>$order_p,
						$orderby_p."_order"=>$new_order,
						"st_pos"=>$st_pos_p,
						"nb_text"=>$nb_text,
						"nrppOpt"=>$nrppOpt,
						"nrpp"=>$nrpp_p,
						"ICON_PATH"=>$Server_Icon_Path,
						"SERVER_PATH"=>$Server_Admin_Path,
						"act"=>"view_invites_request",
						));
 	$ary[0] =$smarty->fetch("view_company.tpl");
	$ary[3]=$callback;
	return ($ary);						
}


################## Company ADD ############

function company_add($callback)
{
	global $js;	
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	$smarty->assign($R);
	get_new_option_list('countries','countries_id','countries_name','',$country_name,0,"",1);
	$smarty->assign(array("msg"=>$msg,
						  "act"=>"company_save",
						  "heading"=>"Add",
						   "country_name"=>$country_name,
					  ));
	$ary[0] =$smarty->fetch('add_company.tpl');
	$ary[3]=$callback;
	return ($ary);
}
###########################################
function company_save()
{
	$R=DIN_ALL($_REQUEST);
	if(get_row_count("company","where company_email='$R[company_email]'")>0)
	{
		print "<script>parent.window.set_content('Email already exist. Please enter another email.')</script>";
		return;
	}
	else
	{
		$comp_url=get_company_url($R[company_name]);
		$SQL="INSERT INTO company (`company_name`, `company_email`, `company_password`, `company_address`, `company_country`, `company_zipcode`,company_contactno,company_status,company_url) VALUES ('$R[company_name]', '$R[company_email]', '".md5($R[company_password])."','$R[company_address]', '$R[company_country]','$R[company_zipcode]','$R[company_contactno]','1','$comp_url')";
		$id=ei($SQL);
		
		$subject="New Invitation Request";
		$admin_url=$Server_View_Path."company/";
		$message="Dear $company_name,<br><br>
		Your account successfully created. Your login detail given below:<br><br>
		Username: $company_email<br>
		Password: $company_password<br><br>
		Regards.<br>
		MonetChannel
		";		
		//send_mail_new($R[company_name],$R[company_email],"MonetChannel","support@monetchannel.com",$subject,$message);
		
		upload_file_new("company_logo",$id,"company_logo",0,$msg,"Company Logo",1);
		
		print '<script>parent.window.refresh_page("Your account has been successfully created.");</script>';
	}
}
##### 
#  company_edit Define in functions.php
#### 
##### 
#  company_update Define in functions.php
#### 


function company_del($callback,$company_id)
{
	func_company_delete($company_id);
	$ary[0]="Company Deleted Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}	
?>