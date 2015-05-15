<?php
include ("../includes/common.php");
include ("includes/globals.php");
init();
//.........................................
sajax_export("invitation_view","invitation_del","accept_invite_request");
sajax_handle_client_request();
$js = sajax_return_javascript();
//.........................................

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
invitation_index();
die();

#################################### BEGIN INVITATION SECTION ########################################
function invitation_index($msg='')
{
	global $js,$Server_View_Path;
	global $invit_num,$company_invite_num;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,"invites_tab"=>"selected","invit_num"=>$invit_num,"company_invite_num"=>$company_invite_num));
	$smarty->display('invitation.tpl');
}
function invitation_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0)
{
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	$invitation_requests=array();
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
   #-------------- Sorting ----------
   $orderby="invr_id";
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
   	$orderby="invr_id";
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
   
   $SQL="select * from invites_request where 1 ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"Invites Request",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
		$mon[1]="Jan";
		$mon[2]="Feb";
		$mon[3]="Mar";
		$mon[4]="Apr";
		$mon[5]="May";
		$mon[6]="Jun";
		$mon[7]="Jul";
		$mon[8]="Aug";
		$mon[9]="Sep";
		$mon[10]="Oct";
		$mon[11]="Nov";
		$mon[12]="Dec";
		$dob=explode("/",$data[invr_dob]);
		if($dob[0]<10)$mm=substr($dob[0],1,1);else $mm=$dob[0];
		$data[invr_dob]=$mon[$mm]."/".$dob[1]."/".$dob[2];
		$data[invr_date]=days_ago($data[invr_date]);
		array_push($invitation_requests,$data);
      }
   }
   else
   {
      $hide="none";
	  $msg=$msg."<br>Record Not Found!";
   }
   $smarty->assign(array("invitation_requests"=>$invitation_requests,
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
 	$ary[0] =$smarty->fetch("view_invites_request.tpl");
	$ary[3]=$callback;
	return ($ary);						
}

function invitation_del($callback,$invr_id)
{
	if(get_row_con_info("invites_request","where invr_id='$invr_id'","",$invrequest))
	{
		$to_name=$invrequest[invr_fname]." ".$invrequest[invr_lname];
		$invrequest[name]=$invrequest[invr_fname]." ".$invrequest[invr_lname];
		//$message="Dear $to_name,<br><br>Your invitation request has been deny.";
		
		/*$message=get_parse_tpl_page("deny_signup_mail.tpl",$invrequest);
		send_mail_new($to_name,$invrequest[invr_eamil],"MonetChannel",$FromMail,"Login Invitation Request",$message);*/
		//print $message;
		//die();
		
	}
	func_delete_deny_request($invr_id);
	$ary[0]="Invitation Deleted Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}

function accept_invite_request($invr_id)
{
	global $Server_View_Path;
	global $FromMail;
	global $js;
	$num_rows=get_row_con_info("invites_request","where invr_id='$invr_id'","",$invrequest);
	if(get_row_count("users","where user_email = '$invrequest[invr_eamil]'"))
		return "User Already Invited.<br><br>";

	if($num_rows)
	{
		$invrequest[password]=generatePassword(10,4);
		$invrequest[word]=$invrequest[password];
		$invrequest[password]=md5($invrequest[password]);
		func_save_accept_invite_request($invrequest);
		$invrequest[name]=$invrequest[invr_fname]." ".$invrequest[invr_lname];
		$to_name=$invrequest[invr_fname]." ".$invrequest[invr_lname];
		$invrequest[SERVER_PATH]=$Server_View_Path;
		/*$message="Dear $to_name,<br><br>Your login details is:<br><br>
				  Username: $invrequest[invr_eamil]<br>
				  Password: $password<br><br>
				  
				  <a href=".$Server_View_Path.">For Login Click Here</a>
				  ";*/
		$message=get_parse_tpl_page("approve_signup_mail.tpl",$invrequest);
		send_mail_new($to_name,$invrequest[invr_eamil],"MonetChannel",$FromMail,"Login information from Monet",$message);
		//print $message;
		//die();
		func_delete_deny_request($invr_id);
		return "User Accepted Successfully." ;
	}
	else
		return "User Already Exist." ;
}
?>