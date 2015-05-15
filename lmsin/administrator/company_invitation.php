<?php
include ("../includes/common.php");
include ("includes/globals.php");
init();
//.........................................
sajax_export("company_invitation_view","company_invitation_del","accept_company_invite_request","company_edit","company_update");
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
company_invitation_index();
die();

#################################### BEGIN INVITATION SECTION ########################################
function company_invitation_index($msg='')
{
	global $js,$Server_View_Path;
	global $invit_num,$company_invite_num;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,"company_invites_tab"=>"selected","invit_num"=>$invit_num,"company_invite_num"=>$company_invite_num));
	$smarty->display('company_invitation.tpl');
}
function company_invitation_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0)
{
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	$invitation_requests=array();
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
   
   $SQL="select * from company where company_status=0 ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"Company Invites Request",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
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
						));
 	$ary[0] =$smarty->fetch("view_company_invites_request.tpl");
	$ary[3]=$callback;
	return ($ary);						
}

function company_invitation_del($callback,$company_id)
{
	func_company_delete($company_id);
	$ary[0]="Company Deleted Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
##### 
#  company_edit Define in functions.php
#### 
##### 
#  company_update Define in functions.php
#### 
?>