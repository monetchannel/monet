<?php
include ("../includes/common.php");
include ("includes/globals.php");

init();
//.........................................
sajax_export("category_view","category_add","category_save","category_edit","category_update","category_del");
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
category_index();
die();
#################################### BEGIN CATEGORY SECTION ########################################
function category_index($msg='')
{
	global $js,$Server_View_Path;
	global $invit_num,$company_invite_num;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,
						  "category_tab"=>"selected",
						  "invit_num"=>$invit_num,"company_invite_num"=>$company_invite_num));
	$smarty->display('category.tpl');
}
function category_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0)
{
	global $Server_Icon_Path;
	global $Server_Admin_Path;
	global $NRPP;
	$categories=array();
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	#------------- SHORTING ----------------
	$orderby="cat_name";
	$order="ASC";
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
		$orderby="cat_name";
	}
	#------------- PAGING -------------------
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
	//----------------END----------------------
	$SQL="select * from category where 1 ORDER BY $orderby $order";
	$tot_rows= eq($SQL,$rs);
	get_nb_text_multi($tot_rows,"Category",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
	$SQL=$SQL.$con_limit;
	eq($SQL,$rs);
	if($tot_rows>0)
	{
		while($data=mfa($rs))
		{
			array_push($categories,$data);
		}
	}
	else
	{
		$msg="<br>Record Not Found!";
	}
	$smarty->assign(array("categories"=>$categories,
						"msg"=>$msg,
						"hide_del"=>$hide_del,
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
 	$ary[0] =$smarty->fetch("category_view.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
#----------------------------- ADD CATEGORY -----------------------------
function category_add($callback)
{
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	global $js;
	$smarty->assign(array("msg"=>$msg,"act"=>"save",
						"category_tab"=>"selected",));
 	$ary[0] =$smarty->fetch("category_add.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
#----------------------------- SAVE CATEGORY -----------------------------
function category_save($callback,$cat_name)
{
   	if(get_row_count("category","where cat_name='$cat_name'"))
	{
		$ary[0]="Category name '$cat_name' already exists.";
		$ary[2] = 1;
		$ary[3] = $callback;
		return $ary;
	}
	$cat_id=func_save_category($cat_name);
	//add_newsfeed(8,'',$user[uf_id]);
	add_newsfeed(8,'',$cat_id);
	$ary[0]="Category Saved Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
#----------------------------- EDIT CATEGORY -----------------------------
function category_edit($callback,$cat_id)
{
	$smarty = new Smarty;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;	
	get_row_con_info("category","where cat_id='$cat_id'","",$cat);
	$smarty->assign($cat);
	$smarty->assign(array("msg"=>$msg,
						  "act"=>"update",
						  "cat_id"=>$cat_id,
						  "category_tab"=>"selected",
						  ));
	$ary[0] =$smarty->fetch('category_add.tpl');
	$ary[3]=$callback;
	return ($ary);
}
#----------------------------- UPDATE CATEGORY -----------------------------
function category_update($callback,$cat_name,$cat_id)
{
	$R=DIN_ALL($_REQUEST);
	if(get_row_count("category","where cat_name='$cat_name' AND cat_id!='$cat_id'"))
	{
		$ary[0]="Category name '$cat_name' already exists.";
		$ary[2] = 1;
		$ary[3] = $callback;
		return $ary;
	}
	func_update_category($cat_name,$cat_id);
	$ary[0]="Category Updated Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
#----------------------------- DELETE CATEGORY -----------------------------
function category_del($callback,$cat_id)
{
   func_delete_category($cat_id);
	$ary[0]="Category Deleted Successfully.";
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
#################################### BEGIN INVITE SECTION ########################################
function view_invites($inv_user_id,$f,$o,$st_pos="0")
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
   if($f)
   {
      $order="DESC";
      $orderby=$f;
      if($o)
      {
         $order=$o;
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
   if($inv_user_id)$con="and inv_user_id='$inv_user_id'";
   $SQL="select * from invite left join users on inv_user_id=user_id where 1 $con ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"Invites",$st_pos,$con_limit,$nb_text,$nrpp_p);
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
						"orderby"=>$f,
						"order"=>$o,
						$f."_order"=>$new_order,
						"st_pos"=>$st_pos_p,
						"nb_text"=>$nb_text,
						"nrppOpt"=>$nrppOpt,
						"ICON_PATH"=>$Server_Icon_Path,
						"SERVER_PATH"=>$Server_Admin_Path,
						"act"=>"view_invites",
						));
	return $smarty->fetch("view_invites.tpl");   
}
################################ User #######################################
?>