<?php
include ("../includes/common.php");
include ("includes/globals.php");

init();
//.........................................
sajax_export("user_view","user_add","user_edit","user_update","user_save","user_del","invites_view","chk_email_exist");
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
user_index();
die();

#################################### BEGIN USER SECTION ########################################
function user_index($msg='')
{
	global $js,$Server_View_Path;
	global $invit_num,$company_invite_num;
	global $js;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,
						  "user_tab"=>"selected","invit_num"=>$invit_num,"js"=>$js,"company_invite_num"=>$company_invite_num));
	$smarty->display('user.tpl');
}
function user_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0)
{
	global $Server_Admin_Path;
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	global $NRPP;
	$smarty->cache_lifetime = 120;	
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $Server_View_Path;
	$users=array();
   #-------------- Sorting ----------
   $orderby="user_id";
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
   	$orderby="user_id";
   }
   $no_of_row_per_page=array($NRPP,20,30,40,50);
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
   
   //$SQL="select * from users LEFT JOIN invite ON inv_user_id=user_id where 1 GROUP BY user_id ORDER BY $orderby $order";
	$SQL="SELECT *,
	(select count(*) from content_feedback where cf_user_id=user_id and cf_rating <> -1) as rated ,
	(select count(*) from content where c_user_id=user_id  ) as suggested,
	(select count(*) from challenge,content,content_feedback where cf_rating>=0 and cf_ch_id = ch_id and ch_user_id = user_id and cf_c_id = c_id ) as challenge,
	(select count(*) from user_friends where (uf_user_id=user_id  OR uf_fuser_id = user_id) AND uf_approved =1  ) as friends
	FROM `users` LEFT JOIN invite ON inv_user_id=user_id where 1 GROUP BY user_id ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"User",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
		  $no_of_rated=get_row_count("content","where 1 AND c_id IN(select cf_c_id from content_feedback where cf_user_id='$data[user_id]' AND cf_rating >= '0') order by c_id DESC");
		  $data[no_rated]=$no_of_rated;
		  $no_of_approved=get_row_count("content","where c_user_id='$data[user_id]'");
		  $data[no_approv]=$no_of_approved;
		  $no_of_resp=get_row_count("`challenge`, `content`, `content_feedback`","where cf_rating>=0 and cf_ch_id = ch_id and ch_user_id = '$data[user_id]' and cf_c_id = c_id");
		  $data[no_resp]=$no_of_resp;
		  if($data[inv_id])
		  {
		  	$tot_inv=get_row_count("invite","where inv_user_id='".$data[user_id]."'");
			$data[inv_link]="&nbsp;|&nbsp;<span class=\"tabletextred2\"><a href=\"javascript:x_invites_view($data[inv_user_id],'inv_date','DESC',show_win)\">Invites </a></span>[$tot_inv]";
		  }
		 else
		 	$data[inv_link]="";
			
		 array_push($users,$data);
      }
   }
   else
   {
      $msg="<br>Record Not Found!";
   }
   $smarty->assign(array("users"=>$users,
						"msg"=>$msg,
						"hide_del"=>$hide_del,
						"orderby"=>$orderby_p,
						"order"=>$order_p,
						$orderby_p."_order"=>$new_order,
						"st_pos"=>$st_pos_p,
						"nb_text"=>$nb_text,
						"nrppOpt"=>$nrppOpt,
						"nrpp"=>$nrpp_p,
						"SERVER_PATH"=>$Server_Admin_Path,
						"inv_id"=>$R[inv_id],
						"user_tab"=>"selected",
						));
 	$ary[0] =$smarty->fetch("user_view.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
//---------------------------------------------------------------------------
function user_add($callback)
{
	$smarty = new Smarty;
	get_yy_list($R[yy],2011,1905,$yy);
	get_mm_list($R[mm],$mm);
	get_dd_list($R[dd],$dd);
	$smarty->assign($R);
	$smarty->assign(array("msg"=>$msg,
						  "act"=>"save",
						  "mm"=>$mm,
						  "dd"=>$dd,
						  "yy"=>$yy,
						  "user_tab"=>"selected",
						  ));
 	$ary[0] =$smarty->fetch("user_add.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
function user_save($callback,$user_fname,$user_lname,$user_gender,$mm,$dd,$yy,$user_email,$user_max_invites,$user_password)
{
   	if(get_row_count("users","where user_email='$user_email'"))
	{
		$ary[0]="User email $user_email already exists, Please try again.";
		$ary[2] = 1;
		$ary[3] = $callback;
		return $ary;
	}
	func_save_user($user_fname,$user_lname,$user_gender,$mm,$dd,$yy,$user_email,$user_max_invites,$user_password,$user_id);
	$ary[0]="User Saved Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
function user_edit($callback,$user_id)
{
	$smarty = new Smarty;
	get_row_con_info("users","where user_id='$user_id'","",$user);
	$dob=explode("/",$user[user_dob]);
	get_yy_list($dob[2],2011,1905,$yy);
	get_mm_list($dob[0],$mm);
	get_dd_list($dob[1],$dd);
	$smarty->assign($user);
	$smarty->assign(array("msg"=>$msg,
					  "act"=>"update",
					  "user_id"=>$user_id,
					  "gender_".$user[user_gender]=>"selected",
					  "mm"=>$mm,"dd"=>$dd,"yy"=>$yy,
					  "user_tab"=>"selected",
					  ));
	$ary[0] =$smarty->fetch('user_add.tpl');
	$ary[3]=$callback;
	return ($ary);
}
function user_update($callback,$user_fname,$user_lname,$user_gender,$mm,$dd,$yy,$user_email,$user_max_invites,$user_password,$user_id)
{
	if(get_row_count("users","where user_email='$user_email' AND user_id!='$user_id'"))
	{
		$ary[0]="users name $user_email already exists, Please try again.";
		$ary[2] = 1;
		$ary[3] = $callback;
		return $ary;
	}
	func_update_user($user_fname,$user_lname,$user_gender,$mm,$dd,$yy,$user_email,$user_max_invites,$user_password,$user_id);
	$ary[0]="User Updated Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
function user_del($callback,$user_id)
{
	func_delete_user($user_id);
	$ary[0]="User Deleted Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
###################################### End User ################################################
################################ INVITES #######################################
function invites_view($inv_user_id,$orderby_p,$order_p,$st_pos_p="")
{
   global $Server_Icon_Path;
   global $Server_Admin_Path;
   $invites=array();
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
   get_new_option_list_full_name("invite left join users on inv_user_id=user_id","user_id","user_fname","user_lname","$inv_user_id",$inv_user,"0","GROUP BY user_id","1");
   #-------------- Sorting ----------
   $orderby="inv_id";
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
   	$orderby="inv_id";
   }
   //--------------------------------
   if($inv_user_id)$con="and inv_user_id='$inv_user_id'";
   $SQL="select * from invite left join users on inv_user_id=user_id where 1 $con ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi_pop($tot_rows,"Invites",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
		 $data[inv_date]=get_mktime_to_date($data[inv_date]);
		 array_push($invites,$data);
      }
   }
   else
   {
      $msg="<br>Record Not Found!";
	  $data[none]="none";
   }
   $smarty->assign(array("invites"=>$invites,
						"msg"=>$msg,
						"inv_user"=>$inv_user,
						"hide_del"=>$hide_del,
						"none"=>$data[none],
						"orderby_p"=>$orderby_p,
						"order_p"=>$order_p,
						$orderby_p."_order"=>$new_order,
						"st_pos_p"=>$st_pos_p,
						"nb_text"=>$nb_text,
						"nrppOpt"=>$nrppOpt,
						"ICON_PATH"=>$Server_Icon_Path,
						"SERVER_PATH"=>$Server_Admin_Path,
						"act"=>"view_invites",
						));
	return $smarty->fetch("view_invites.tpl");   
}
function chk_email_exist($email,$user_id="")
{
	if(get_row_count("users","where user_email= '$email' AND user_id!='$user_id'"))
		return "User email $email already exists, Please try again.";
}
?>