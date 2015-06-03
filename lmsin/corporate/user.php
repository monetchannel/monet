<?php
include ("../includes/common.php");
init();
//.........................................
sajax_export("user_view","user_add","user_edit","user_update","user_save","user_del","invites_view","chk_email_exist");
sajax_handle_client_request();
$js = sajax_return_javascript();

$func_ary=array("get_video_link","send_video_link","create_group");
###################### Ok #####################################
if($_COOKIE[CompanyId]=="")
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
//user_view("user.view","","map_company_user_id","",0,10,1,"","","","","");
die();

########################################
# BEGIN USER SECTION 
########################################
function user_index($msg='')
{
	global $js,$Server_View_Path;
	global $invit_num;
	global $js;
	global $Server_company_Path;
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,"js"=>$js,
				"SERVER_PATH"=>$Server_View_Path,
				"invit_num"=>$invit_num,
				"SERVER_COMPANY_PATH"=>$Server_company_Path,
				"SERVER_ADMIN_PATH"=>$Server_View_Path."administrator/",
				"user_tab"=>"label", "user_mgmt_tab"=>"selected"));
	$smarty->display('user.tpl');
}

#########################################
function user_view($callback,$msg="",$orderby_p="",$order_p="",$st_pos_p=0,$nrpp_p=0,$chk=0,$sex="",$strt_age="",$end_age="",$company_country="",$company_state="",$search="")
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
	$tot_rows=0;
	get_new_option_list('countries','countries_id','countries_name',$company_country,$country_name,0,"",1);
        get_new_option_list('states', 'states_id', 'states_name', $company_state, $state_name, 0, "WHERE states_countries_id = '$company_country'", 1);
	get_age_list($strt_age,$age1);
	get_age_list($end_age,$age2);
   #-------------- Sorting ----------
if($chk==0)
{
   $orderby="u.user_id";
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


	$SQL="SELECT *,
	(select count(*) from content_feedback where cf_user_id=user_id and cf_rating <> -1) as rated ,
	(select count(*) from content where c_user_id=user_id AND  c_company_id='$_COOKIE[CompanyId]' AND user_company_id=c_company_id ) as suggested,
	(select count(*) from challenge,content,content_feedback where cf_rating>=0 and cf_ch_id = ch_id and ch_user_id = user_id and cf_c_id = c_id ) as challenge,
	(select count(*) from user_friends where (uf_user_id=user_id  OR uf_fuser_id = user_id) AND uf_approved =1  ) as friends
	FROM `users` LEFT JOIN invite ON inv_user_id=user_id where user_company_id='$_COOKIE[CompanyId]' GROUP BY user_id ORDER BY $orderby $order";
   $tot_rows= eq($SQL,$rs);
   get_nb_text_multi($tot_rows,"User",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   $SQL=$SQL.$con_limit;
   eq($SQL,$rs);
   
   if($tot_rows>0)
   {
      while($data=mfa($rs))
      {
		  $no_of_rated=get_row_count("content","where  c_company_id='$_COOKIE[CompanyId]' AND c_id IN(select cf_c_id from content_feedback where cf_user_id='$data[user_id]' AND cf_rating >= '0') order by c_id DESC");
		  $data[no_rated]=$no_of_rated;
		  $no_of_approved=get_row_count("content","where c_user_id='$data[user_id]'");
		  $data[no_approv]=$no_of_approved;
		  $no_of_resp=get_row_count("`challenge`, `content`, `content_feedback`","where cf_rating>=0 and cf_ch_id = ch_id and ch_user_id = '$data[user_id]' and cf_c_id = c_id");
		  $data[no_resp]=$no_of_resp;
                  $data[map_company_id] = $_COOKIE[CompanyId];
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
    $smarty->assign(array("users"=>$users,
						"msg"=>$msg,"tot_rows"=>$tot_rows,
                                                "state_name"=>"State",
						"chk"=>$chk,
                                                "selected"=>"",
						"act"=>"view",
						"hide_del"=>$hide_del,
						"orderby"=>$orderby_p,
						"order"=>$order_p,
						"country_name"=>$country_name,
						"age1"=>$age1,
						"age2"=>$age2,
						$orderby_p."_order"=>$new_order,
						"st_pos"=>$st_pos_p,
						"nb_text"=>$nb_text,
						"nrppOpt"=>$nrppOpt,
						"nrpp"=>$nrpp_p,
						"SERVER_PATH"=>$Server_Admin_Path,
						"inv_id"=>$R[inv_id],
						"user_tab"=>"selected",
                                                "company_id"=>$_COOKIE[CompanyId],
						));
}
else{
	$orderby="user_id";
   $order="DESC";
   $new_order="";
   $e_age="";
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
	
	if($strt_age!=""){
		$dt=getdate();
		$yy = $dt['year'];
		$to_year =($yy-$strt_age);
	}
	if($end_age!=""){
		$dt=getdate();
		$yy = $dt['year'];
		$frm_year =($yy-$end_age);
	}
	if($chk==1){
	$cond="";
	
	if($sex!=""){
		/*if(strlen($cond)==0){$cond=$cond."u.user_gender='$sex'";}
		else*/{$cond=$cond." AND u.user_gender='$sex'";}
	}
	if($strt_age!=""){
		if($end_age!=""){
			$e_age=1;
			/*if(strlen($cond)==0){$cond=$cond."u.user_dob between '$frm_year' AND '$to_year'";}
			else*/{$cond=$cond." AND u.user_dob between '$frm_year' AND '$to_year'";}
		}
		else{
			/*if(strlen($cond)==0){$cond=$cond."u.user_dob='$to_year'";}
			else*/{$cond=$cond." AND u.user_dob='$to_year'";}
		}
	}
	if($company_country!=""){
		/*if(strlen($cond)==0){$cond=$cond."u.user_country='$company_country'";}
		else*/{$cond=$cond." AND u.user_country='$company_country'";}
	}
	if($company_state!=""){
		/*if(strlen($cond)==0){$cond=$cond."u.user_states='$company_state'";}
		else*/{$cond=$cond." AND u.user_states='$company_state'";}
	}
	if($search!=""){
		/*if(strlen($cond)==0){$cond=$cond."(u.user_fname like '%$search%' OR u.user_lname like '%$search%' OR u.user_email like '%$search%')";}
		else*/{$cond=$cond." AND (u.user_fname like '%$search%' OR u.user_lname like '%$search%' OR u.user_email like '%$search%')";}
	}
	
	//$cond=$cond.")";
    
        //if(strlen($cond)==6) $cond = ""; // Vivek - Works Fine
	
	$SQL= "SELECT u.user_id, u.user_fname, u.user_lname, u.user_gender, u.user_dob, u.user_country, u.user_email, u.user_email, m.map_company_id FROM users u JOIN map_company_user m ON 
               u.user_id = m.map_user_id WHERE m.map_company_id=$_COOKIE[CompanyId] $cond GROUP BY u.user_id ORDER BY $orderby $order";  // Vivek Verma
        }
        else{
            $cond="";
	
	if($sex!=""){
		if(strlen($cond)==0){$cond=$cond."u.user_gender='$sex'";}
		else{$cond=$cond." AND u.user_gender='$sex'";}
	}
	if($strt_age!=""){
		if($end_age!=""){
			$e_age=1;
			if(strlen($cond)==0){$cond=$cond."u.user_dob between '$frm_year' AND '$to_year'";}
			else{$cond=$cond." AND u.user_dob between '$frm_year' AND '$to_year'";}
		}
		else{
			if(strlen($cond)==0){$cond=$cond."u.user_dob='$to_year'";}
			else{$cond=$cond." AND u.user_dob='$to_year'";}
		}
	}
	if($company_country!=""){
		if(strlen($cond)==0){$cond=$cond."u.user_country='$company_country'";}
		else{$cond=$cond." AND u.user_country='$company_country'";}
	}
	if($company_state!=""){
		if(strlen($cond)==0){$cond=$cond."u.user_states='$company_state'";}
		else{$cond=$cond." AND u.user_states='$company_state'";}
	}
	if($search!=""){
		if(strlen($cond)==0){$cond=$cond."(u.user_fname like '%$search%' OR u.user_lname like '%$search%' OR u.user_email like '%$search%')";}
		else{$cond=$cond." AND (u.user_fname like '%$search%' OR u.user_lname like '%$search%' OR u.user_email like '%$search%')";}
	}
	
	//$cond=$cond.")";
    
        //if(strlen($cond)==6) $cond = ""; // Vivek - Works Fine
	
            //substr($cond,3,strlen($cond)-3);
	$SQL= "SELECT u.user_id, u.user_fname, u.user_lname, u.user_gender, u.user_dob, u.user_country, u.user_email, u.user_email, m.map_company_id FROM users u LEFT JOIN map_company_user m ON u.user_id = m.map_user_id WHERE $cond GROUP BY u.user_id ORDER BY u.$orderby $order";  // Vivek Verma
        }
        //echo($SQL);
	//$SQL= "SELECT * FROM users WHERE user_company_id='$_COOKIE[CompanyId]' $cond GROUP BY user_id ORDER BY $orderby $order";
        //$SQL= "SELECT u.user_id, u.user_fname, u.user_lname, u.user_gender, u.user_dob, u.user_country, u.user_email, u.user_email FROM users u JOIN map_company_user m ON 
          //     u.user_id = m.map_user_id WHERE m.map_company_id='$_COOKIE[CompanyId]' $cond GROUP BY u.user_id ORDER BY $orderby $order";  
        
        //echo $SQL;
	
	$tot_rows= eq($SQL,$rs);
   	get_nb_text_multi($tot_rows,"User",$st_pos_p,$con_limit,$nb_text,$nrpp_p);
   	$SQL=$SQL.$con_limit;
   	eq($SQL,$rs);
   
   	if($tot_rows>0)
   	{
    	while($data=mfa($rs))
      	{   
		  array_push($users,$data);
      	}
   	}
        if($chk==1) $selected="";
        else $selected="checked";
	$smarty->assign(array("users"=>$users,
						"msg"=>$msg,"tot_rows"=>$tot_rows,
						"chk"=>$chk,
                                                "selected"=>$selected,
						"act"=>"view",
						"hide_del"=>$hide_del,
						"orderby"=>$orderby_p,
						"order"=>$order_p,
						"country_name"=>$country_name,
                                                "state_name"=>$state_name,
						"age1"=>$age1,
						"age2"=>$age2,
						"gender_".$sex=>"selected",
						$orderby_p."_order"=>$new_order,
						"st_pos"=>$st_pos_p,
						"nb_text"=>$nb_text,
						"nrppOpt"=>$nrppOpt,
						"nrpp"=>$nrpp_p,
						"SERVER_PATH"=>$Server_Admin_Path,
						"inv_id"=>$R[inv_id],
						"user_tab"=>"selected",
						"search"=>$search,
						"e_age"=>$e_age,
                                                "company_id"=>$_COOKIE[CompanyId]

						));
						
}  
   	$ary[0] =$smarty->fetch("user_view.tpl");
	$ary[3]=$callback;
	return ($ary);						
}
//---------------------------------------------------------------------------
function user_add($callback)
{
	$smarty = new Smarty;
	//get_yy_list($R[yy],2014,1905,$yy);
	//get_mm_list($R[mm],$mm);
	//get_dd_list($R[dd],$dd);
	$smarty->assign($R);
	get_new_option_list('countries','countries_id','countries_name','',$country_name,0,"",1);
	$smarty->assign(array("msg"=>$msg,
						  "act"=>"user_save",
						  "btn_name"=>"Save",
						  "country_name"=>$country_name,
						  /*"mm"=>$mm,
						  "dd"=>$dd,*/
						  "yy"=>$yy,
						  "user_tab"=>"selected",
						  ));
 	$ary[0] =$smarty->fetch("user_add.tpl");
	$ary[3]=$callback;   
       
	return ($ary);						
}

###################################
function user_save($callback,$user_fname,$user_lname,$user_gender,$age,$user_state,$user_email,$user_password)
{
   	if(get_row_count("users","where user_email='$user_email' limit 0,1"))
	{
		$ary[0]="User email $user_email already exists, Please try again.";
		$ary[2] = 1;
		$ary[3] = $callback;
		return $ary;
	}
	$user_password=md5($user_password);
	$dt=getdate();
	$yy = $dt['year'];
	$yy =($yy-$age);
	$SQL1="SELECT states_countries_id FROM `states` WHERE states_id='$user_state'";
	eq($SQL1,$rs);
	$data=mfa($rs);
	
	$SQL="INSERT INTO users SET `user_fname` =  '$user_fname',
							  `user_lname` = '$user_lname',
							  `user_gender` = '$user_gender',
							  `user_dob` = '$yy',
							  `user_country` ='$data[states_countries_id]',
                                                          `user_company_id` ='$_COOKIE[CompanyId]',
							  `user_states` ='$user_state',
							  `user_email` = '$user_email',
							  `user_password`='$user_password'";
	$id=ei($SQL);
	if($id>0){
		
                // now insert mapping entry into map_campany_user table
                $inserted_user_id = $id;
                $cmpId = $_COOKIE[CompanyId];
                $mappingQuery = "INSERT INTO map_company_user SET map_user_id = '$inserted_user_id',
                                                                  map_company_id = '$cmpId',
                                                                  map_access_level = 'private'";
                $resp = mysql_query($mappingQuery);                 
	}	
        
        if($resp>0){
            $ary[0]="User Saved Successfully.";
        }
	//func_save_user($user_fname,$user_lname,$user_gender,$yy,$user_email,$user_password,$_COOKIE[CompanyId]);
	
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}

###########################################
function user_edit($callback,$user_id)
{
	$smarty = new Smarty;
	get_row_con_info("users","where user_id='$user_id' limit 0,1","",$user);
        get_new_option_list('countries','countries_id','countries_name',$user[user_country],$country_name,0,"",1);
	get_new_option_list('states','states_id','states_name',$user[user_states],$state_name,0,"WHERE states_countries_id = '$user[user_country]]'",1);
        $dt=getdate();
	$yy = $dt['year'];
	$age =($yy-$user[user_dob]);
	$smarty->assign($user);
	$smarty->assign(array("msg"=>$msg,
					  "act"=>"update","btn_name"=>"Update",
					  "user_id"=>$user_id,
					  "gender_".$user[user_gender]=>"selected",
					  "country_name"=>$country_name,
                                          "company_state"=>$state_name,
					  "age"=>$age,
					  "user_tab"=>"selected",
					  ));
	$ary[0] =$smarty->fetch('user_add.tpl');
	$ary[3]=$callback;
	return ($ary);
}
#################################################################################
function user_update($callback,$user_fname,$user_lname,$user_gender,$age,$user_country,$user_state,$user_email,$user_password,$user_id)
{
	if(get_row_count("users","where user_email='$user_email' AND user_id!='$user_id' limit 0,1"))
	{
		$ary[0]="user email $user_email already exists, Please try again.";
		$ary[2] = 1;
		$ary[3] = $callback;
		return $ary;
	}
	$user_password=md5($user_password);
	$dt=getdate();
	$yy = $dt['year'];
	$yy =($yy-$age);	
	//func_update_user($user_fname,$user_lname,$user_gender,$mm,$dd,$yy,$user_email,$user_max_invites,$user_password,$user_id,$_COOKIE[CompanyId]);
	
	$SQL="UPDATE users SET  `user_fname` =  '$user_fname',
							`user_lname` = '$user_lname',
							`user_gender` = '$user_gender',
							`user_dob` = '$yy',
							`user_country` ='$user_country',
                                                        `user_states` ='$user_state',
							`user_email` = '$user_email',
							`user_password`='$user_password',
							`user_company_id`='$_COOKIE[CompanyId]' WHERE `user_id` = '$user_id'";
	$id=eq($SQL,$rs);
	if($id>0){
		$ary[0]="Data Updated Successfully";
	}
        else{ 
            $ary[0]="No Change in User Data";
        }
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
}
################################################################################
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
######################################################################
function chk_email_exist($email,$user_id="")
{
	if(get_row_count("users","where user_email= '$email' AND user_id!='$user_id'"))
		return "User email $email already exists, Please try again.";
}
######################################################################
function get_video_link()
{
	$smarty = new Smarty;
	get_row_con_info("users","where user_id='$user_id' limit 0,1","",$user);
	$smarty->assign($user);
	
	if(is_array($_REQUEST[chk_user_id]))
	{
		foreach($_REQUEST[chk_user_id] as $k=>$v)
		$hidden_fields.=' <input type="hidden" name="chk_user_id[]" value="'.$v.'">';
	}
	$smarty->assign(array("msg"=>$msg,'hidden_fields'=>$hidden_fields));
	$smarty->display('get_video_link.tpl');
}
######################################################################
function send_video_link()
{
	$R=DIN_ALL($_REQUEST);
	
	if(is_array($_REQUEST[chk_user_id]))
	{
		foreach($_REQUEST[chk_user_id] as $k=>$v)
		{
			if(get_row_con_info("users","where user_id='$v'","",$user))
			{
			// Send Email to user Video Link
			global $FromMail;
			$to_name=$user[user_fname]." ".$user[user_lname];
			$message=get_parse_tpl_page("send_video_link_mail.tpl",$user);
			//send_mail_new($to_name,$user[user_email],"MonetChannel",$FromMail,"Login information from Monet",$message);
			}
		}
	}
	print "Video link sent successfully.";
}
########################################################################
function create_group()
{	
	$R=DIN_ALL($_REQUEST);
	$smarty = new Smarty;
	
	//$smarty->display('add_group.tpl');
	$SQL="INSERT INTO demography SET ";
		
	if($R[sex]=="sex"){
		$gender= "NULL";
		$SQL=$SQL."`d_gender` =  '$gender',";
	}
	else{
		$gender= $R[sex];
		$SQL=$SQL."`d_gender` =  '$gender',";
	}
	
	if($R[strt_age]!="-1"){
		$strt_age=(int)$R[strt_age];
		$SQL=$SQL."`d_start_age` = '$strt_age',";
	}
		
	if(!($R[end_age]==""||$R[end_age]=="-1")){
		$end_age=(int)$R[end_age];
		$SQL=$SQL."`d_end_age` = '$end_age',";
	}
		
	if($R[company_country]!="-1"){
		$users_country=(int)$R[company_country];
		$SQL=$SQL."`d_country_id` = '$users_country',";
	}
		
	if($R[users_state]!="-1"){
		$users_state=(int)$R[users_state];
		$SQL=$SQL."`d_state_id` ='$users_state',";
	}
		
	if($R[search]==""){
		$keyword= "Empty";
		$SQL=rtrim($SQL, ",");
	}
	else{
		$keyword= $R[search];
		$SQL=$SQL."`d_keyword` ='$keyword'";
	}
	
	$SQL=$SQL.";";
	$d_id=ei($SQL);
	
	$SQL1 = "INSERT INTO `groups`(`g_name`, `g_company_id`, `g_demography_id`, `g_desc`) VALUES ('$R[g_name]','$_COOKIE[CompanyId]', '$d_id','$R[g_desc]')";
	
	$g_id=ei($SQL1);
	
	if(is_array($_REQUEST[chk_user_id]))
	{
		foreach($_REQUEST[chk_user_id] as $k=>$v){
			$SQL2= "INSERT INTO `map_group_user`(`map_group_id`, `map_user_id`) VALUES ('$g_id','$v')";
			mysql_query($SQL2) or die(mysql_error());
		}

	}
        $ary[0] = "Group Created Successfully";
	$smarty->display('user.tpl');
        return $ary;
}
?>