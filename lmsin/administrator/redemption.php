<?php   //aadi
include ("../includes/common.php");
include ("includes/globals.php");

init();

sajax_export("redemption_view","redemption_add","redemption_edit","redemption_update","redemption_save","redemption_del");
sajax_handle_client_request();
$js = sajax_return_javascript();
$func_ary=array("redemption_view");

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
else{
    redemption_index();
    die();
}
function redemption_index()
{
    global $Server_View_Path;
    global $invit_num,$company_invite_num;
    global $js;
    $smarty = new Smarty;
    $smarty->assign(array("js"=>$js,
                            "SERVER_PATH"=>$Server_View_Path,
                            "reward_tab"=>"selected",
                            "invit_num"=>$invit_num,
                            "js"=>$js,
                            "company_invite_num"=>$company_invite_num));
    $smarty->display('redemption.tpl');
}
function redemption_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0)
{
    global $Server_Admin_Path;
    $smarty = new Smarty;
    //$smarty->debugging = false;
    //$smarty->caching = false;
    global $NRPP;
    //$smarty->cache_lifetime = 120;	
    global $Server_Icon_Path;
    global $Server_Admin_Path;
    global $Server_View_Path;
    $redemptions=array();
   #-------------- Sorting ----------
    $order="DESC";
    $new_order="";
    if($orderby_p)
    {
        $order="DESC";
        $orderby=$orderby_p;
        if($order_p)
            $order=$order_p;
        if($order=="ASC")
            $new_order="DESC";
        else
            $new_order="ASC";
    }
    else
        $orderby="rr_id";
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
   
   $SQL="SELECT rr.*,u.user_fname,u.user_lname,r.title,r.sub_title
            FROM reward_redeem rr
            JOIN users u ON rr.rr_u_id=u.user_id
            JOIN reward r ON rr.rr_r_id=r.r_id ORDER BY $orderby $order ";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"Redemptions",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   if($tot_rows>0)
   {
        while($data=mfa($rs))
        {
            $data[rr_timestamp]=  date("m/d/y", $data[rr_timestamp]);
            array_push($redemptions, $data);
        }
   }
   else
   {
      $msg="<br>Record Not Found!";
   }
   $smarty->assign(array("redemptions"=>$redemptions,
                            "msg"=>$msg,
                            "hide_del"=>$hide_del,
                            "orderby"=>$orderby,
                            "order"=>$order,
                            $orderby_p."_order"=>$new_order,
                            "st_pos"=>$st_pos_p,
                            "nb_text"=>$nb_text,
                            "nrppOpt"=>$nrppOpt,
                            "nrpp"=>$nrpp_p,
                            "SERVER_PATH"=>$Server_Admin_Path,
                            "reward_tab"=>"selected",
                            ));
 	$ary[0] =$smarty->fetch("redemption_view.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
