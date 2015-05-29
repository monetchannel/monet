<?php   //aadi
include ("../includes/common.php");
include ("includes/globals.php");

init();
//.........................................
sajax_export("reward_view","reward_add","reward_edit","reward_update","reward_save","reward_del");
sajax_handle_client_request();
$js = sajax_return_javascript();
$func_ary=array("reward_add","reward_save","reward_edit","reward_update");
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
else{
    reward_index();
    die();
}
#################################### BEGIN REWARD SECTION ########################################
function reward_index($msg='')
{
	global $Server_View_Path;
        global $invit_num,$company_invite_num;
	global $js;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,"SERVER_PATH"=>$Server_View_Path,
						  "reward_tab"=>"selected","invit_num"=>$invit_num,"js"=>$js,"company_invite_num"=>$company_invite_num));
	$smarty->display('reward.tpl');
}
function reward_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0)
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
	$rewards=array();
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
        $orderby="r_id";
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
	$SQL="SELECT * FROM reward ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"Rewards",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
          $data[r_date_created]=  date("m/d/y", $data[r_date_created]);
          array_push($rewards, $data);
      }
   }
   else
   {
      $msg="<br>Record Not Found!";
   }
   $smarty->assign(array("rewards"=>$rewards,
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
 	$ary[0] =$smarty->fetch("reward_view.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
function reward_add($callback)
{
	global $js;	
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	if(!$R[c_date])
            $R[c_date]=date('m/d/Y',time());
	$smarty->assign($R);
	$smarty->assign(array("msg"=>$msg,
                                "act"=>"reward_save",
                                "heading"=>"Add",
                                ));
	$ary[0] =$smarty->fetch('reward_add.tpl');
	$ary[3]=$callback;
	return ($ary);
}
function reward_save(){
    $R=DIN_ALL($_REQUEST);
    $time=time();
    $SQL="INSERT INTO reward SET `title` =  '$R[title]',
            `sub_title` = '$R[sub_title]',
            `points` = '$R[points]]',
            `r_total_quantity` = '$R[r_total_quantity]',
            `r_quantity` = '$R[r_quantity]',
            `r_status` = '$R[r_status]',
            `r_date_created`='$time',
            `r_hurry_limit`='$R[r_hurry_limit]'";
    $id=ei($SQL);
    upload_file_new("r_image",$id,"r_image",0,$msg,"Reward Image",1);
    $SQL="SELECT up_fname,up_ext FROM uploads WHERE up_s_id='$id' AND up_s_type='r_image'";
    $file_name="";
    eq($SQL,$rs);
    if($data=mfa($rs)){
        $file_name=$data[up_fname].$data[up_ext];
        $SQL="UPDATE reward SET r_image='$file_name' WHERE r_id='$id'";
        eq($SQL,$rs);
    }
    print "<script>parent.win.hide();</script>";
    print "<script>parent.refresh_page();</script>";    //not working apparently
}
function reward_edit($callback,$r_id)
{
	$R=DIN_ALL($_REQUEST);
	$time=time();
	$smarty = new Smarty;
	global $Server_View_Path;
        global $Upload_Path;
	$View_Path=$Server_View_Path."uploads/";
	$SQL="Select * from reward WHERE r_id='$r_id'";
        eq($SQL,$rs);
        $reward_info=mfa($rs);
        $smarty->assign($reward_info);
	$smarty->assign(array("act"=>"reward_update",
                                "heading"=>"Edit",
                                "reward_tab"=>"selected",
                                ));
	$ary[0] =$smarty->fetch('reward_add.tpl');
	$ary[3]=$callback;
	return ($ary);
}
function reward_update()
{
    $R=DIN_ALL($_REQUEST);
    $time=time();
    $SQL="UPDATE reward SET `title` =  '$R[title]',
            `sub_title` = '$R[sub_title]',
            `points` = '$R[points]]',
            `r_quantity` = '$R[r_quantity]',
            `r_status` = '$R[r_status]',
            `r_hurry_limit`='$R[r_hurry_limit]'
            WHERE `r_id`='$R[r_id]'";
    eq($SQL,$rs);
    if (strlen($_FILES["r_image"]['name'])>0){
        delete_upload_file($R[r_id],"r_image",$msg);
        $SQL="DELETE FROM uploads WHERE up_s_id='$R[r_id]' AND up_s_type='r_image'";
        eq($SQL,$rs);
        upload_file_new("r_image",$R[r_id],"r_image",0,$msg,"Reward Image",1);
        $SQL="SELECT up_fname,up_ext FROM uploads WHERE up_s_id='$R[r_id]' AND up_s_type='r_image'";
        $file_name="";
        eq($SQL,$rs);
        if($data=mfa($rs)){
            $file_name=$data[up_fname].$data[up_ext];
            $SQL="UPDATE reward SET r_image='$file_name' WHERE r_id='$R[r_id]'";
            eq($SQL,$rs);
        }
    }
    else{
        $SQL="UPDATE uploads SET up_date='$time' WHERE up_s_id='$R[r_id]'";
        eq($SQL,$rs);
    }
    print "<script>parent.win.hideAndUnload();</script>";
    print "<script>parent.refresh_page();</script>";        //not working apparently
}
?>
