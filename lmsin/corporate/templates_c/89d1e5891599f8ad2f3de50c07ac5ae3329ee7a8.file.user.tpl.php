<?php /* Smarty version Smarty-3.0.6, created on 2015-05-28 06:42:37
         compiled from ".\templates\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29234555eb7633984d3-33850703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89d1e5891599f8ad2f3de50c07ac5ae3329ee7a8' => 
    array (
      0 => '.\\templates\\user.tpl',
      1 => 1432270687,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1432536350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29234555eb7633984d3-33850703',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\xampp\htdocs\monet\smarty\libs\plugins\modifier.capitalize.php';
?><!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

    <title>Monet Dash Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/index-dashboard.css" rel="stylesheet">
    
    <link href="css/sidebar.css" rel="stylesheet">
	    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery.min.js"></script>
    
    <script src="js/bootbox.js" ></script>
    <script src="js/cynets.js"></script>
  
    <script src="js/cynets_modal.js"></script>
    
    
    <script src="js/bootstrap.js" ></script>
    
    <script src="js/circle-progress.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>

.breadcrumb li a {
	color:#FFF;
	text-decoration:underline}
</style>
</head>

<body>
		<div id="nav" class="container-fluid bg-top affix">
				<div class="row">
					<div class="col-md-12">
						<img src="images/logo.png" class="img-responsive top-logo" alt="Responsive image">
					</div>
				</div>
				<div class="row">
					<nav  class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a id="menu-toggle" href="#menu-toggle" class="nav-expander fixed navbar-brand">
                                        <img src="images/sidemenuicon.png" class="img-responsive" alt="Responsive image">
                                </a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                	<?php if ($_smarty_tpl->getVariable('breadcrumb')->value){?>
                    <ul class="breadcrumb  navbar-left" style="margin:0px; background:none; color:#FFF; font-weight:bold;">
					<?php echo $_smarty_tpl->getVariable('breadcrumb')->value;?>

                    </ul>
                    <?php }?>
                    
                    <ul class="nav navbar-nav navbar-right">
                            <li><a href="javascript:void(1)"><?php echo smarty_modifier_capitalize($_COOKIE['CompanyName']);?>
!</a></li>
                            <li><a href="index.php?act=logout"><img class="" style="margin-right: 4px; margin-top: -3px;"src="images/logout.png"><span>Logout</span></a></li>
                    </ul>
            </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
				</div>
			</div>
		
		
        <!-- Sidebar -->
	<div id="wrapper">
        <div id="sidebar-wrapper" class="min-height-corporate" >
            <ul class="sidebar-nav">
                <!--Include your navigation here-->
                          
			  <li class="text-right"><a href="#" class="nav-menu-text">menu</a><a href="#nav-close" class="nav-expander" id="nav-close">X</a></li>
                          
                          <li style="padding-bottom:0" class="">
                                <?php if ($_smarty_tpl->getVariable('analysis_tab')->value==''){?>
                                  <a data-toggle="collapse" data-parent="#accordion"   href="#accordionThree">
                                     <img class="img-responsive analysis-result" src="./images/report.png">Analysis Result
                                  </a>
                                <?php }else{ ?>
                                  <a href="javascript:void(0)" style="background:#f7f7f7; <?php if ($_smarty_tpl->getVariable('analysis_tab')->value!=''){?>display:block <?php }?>" >
                                     <img class="img-responsive analysis-result" src="./images/report_ov.png">Analysis Result
                                  </a>
                                <?php }?>
                                <ul id="accordionThree" class="panel-collapse collapse" style="background:#f7f7f7; <?php if ($_smarty_tpl->getVariable('analysis_tab')->value!=''){?>display:block <?php }?>">
                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('campaign_analysis_tab')->value;?>
">
                                        <a href="campaign_list.php"><img class="img-responsive" src="./images/arrow.png">Campaign Analysis</a>
                                    </li>
                                    
                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('video_analysis_tab')->value;?>
">
                                        <a href="video_list.php"><img class="img-responsive" src="./images/arrow.png">Video Analysis</a>
                                    </li>

                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_analysis_tab')->value;?>
" >
                                        <a href="analysis.php"><img class="img-responsive" src="./images/arrow.png">User Recording</a>
                                    </li>

                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_video_tab')->value;?>
" >
                                        <a href="analysis.php?act=video_section"><img class="img-responsive" src="./images/arrow.png">Search</a>
                                    </li>
                                    
                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('test_tab')->value;?>
" >
                                        <a href="advanced_search.php"><img class="img-responsive" src="./images/arrow.png">Advanced Search</a>
                                    </li>
                                </ul>                             
                          </li>    
                          
                          <li class="<?php echo $_smarty_tpl->getVariable('campaign_tab')->value;?>
">
                              <a href="campaign.php">
                                  <img class="img-responsive campaign test" src="images/<?php if ($_smarty_tpl->getVariable('campaign_tab')->value!=''){?>report_ov.png<?php }else{ ?>report.png<?php }?>" ></img> Campaign Manager  
                              </a>
                          </li>                          
                          
			  <li class="<?php echo $_smarty_tpl->getVariable('video_tab')->value;?>
">
                              <a href="video.php"><img class="img-responsive video test" src="images/<?php if ($_smarty_tpl->getVariable('video_tab')->value!=''){?>video_ov.png<?php }else{ ?>video.png<?php }?>" ></img> Video Manager  </a>
                          </li>
			  
                          <li style="padding-bottom:0" class="">
                                <?php if ($_smarty_tpl->getVariable('user_mgmt_tab')->value==''){?>
                                  <a data-toggle="collapse" data-parent="#accordion"   href="#accordionOne">
                                     <img class="img-responsive user" src="./images/user.png">User Management
                                  </a>
                                <?php }else{ ?>
                                  <a href="javascript:void(0)">
                                     <img class="img-responsive user" src="./images/user_ov.png">User Management
                                  </a>
                                <?php }?>
                                <ul id="accordionOne" class="panel-collapse collapse" style="background:#f7f7f7; <?php if ($_smarty_tpl->getVariable('user_mgmt_tab')->value!=''){?>display:block <?php }?>">
                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('groups_tab')->value;?>
">
                                        <a href="groups.php"><img class="img-responsive" src="./images/arrow.png"></img>Groups Manager </a>
                                    </li>                      
                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('user_tab')->value;?>
">
                                        <a href="user.php"><img class="img-responsive" src="./images/arrow.png"></img>User </a>
                                    </li>
                                </ul>                             
                          </li>  
                          
                          
                          
			  <li class="<?php echo $_smarty_tpl->getVariable('account_tab')->value;?>
"><a href="index.php?act=company_profile_edit">
                                  <img class="img-responsive account" src="images/<?php if ($_smarty_tpl->getVariable('account_tab')->value){?>account_ov.png<?php }else{ ?>account.png<?php }?>"></img>Account</a>
                          </li>
                          
                          <li class="" style="padding-bottom:0">
                              <?php if ($_smarty_tpl->getVariable('questionnaires_tab')->value==''){?>
                              <a data-toggle="collapse" data-parent="#accordion"  href="#accordionFour" style="padding-bottom: 5%; background-color: #ececec;">
                                  <img class="img-responsive" src="images/question.png"></img>Questionnaires 
                              </a>
                              <?php }else{ ?>
                              <a href="javascript:void(0)" style="padding-bottom: 5%; background-color: #ececec;<?php if ($_smarty_tpl->getVariable('questionnaires_tab')->value!=''){?>display:block <?php }?>">
                                  <img class="img-responsive" src="images/question_ov.png"></img>Questionnaires 
                              </a>   
                              <?php }?>
                               <ul id="accordionFour" class="panel-collapse collapse" style="background:#f7f7f7; <?php if ($_smarty_tpl->getVariable('questionnaires_tab')->value!=''){?>display:block <?php }?>">
                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('add_questions_tab')->value;?>
">
                                        <a href="questionaire.php"><img class="img-responsive" src="./images/arrow.png">Questions</a>
                                    </li>
                                    
                                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('question_category_tab')->value;?>
">
                                        <a href="ques_categories.php"><img class="img-responsive" src="./images/arrow.png">Category</a>
                                    </li>
                               </ul>   
                          </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="container-fluid top-margin min-height-corporate" >
        
<script>
<?php echo $_smarty_tpl->getVariable('js')->value;?>




function get_video_link()
{
	var checkBoxes=document.getElementsByName('chk_user_id[]');
	
	var booleanResult=false;
	for(var i=0;i<checkBoxes.length;i++){
		if(checkBoxes[i].checked){
			booleanResult=true;
			break;
		}
	}
	if(booleanResult==false)
	{
		alert("Please select at least one.")
		return false;
	}
	
	jQuery.ajax({
		type: "POST",
		url:"user.php?act=get_video_link",
		data: $('#frm').serialize(),
		success: function(js){
			win=cn_window_open('',js,1);
		},
			error: function(){
			alert("Please try again. Server have not sent response.");
		}
	});
	return false;
}
	
function send_video_link(Name)
{
	jQuery.ajax({
		type: "POST",
		url:"user.php?act=send_video_link",
		data: $('#user_frm').serialize(),
		success: function(js){
			if(js!=1){
				$('#myModal').modal('hide')
				alert(js)	
				return false;
			}
		},
			error: function(){
			alert("Please try again. Server have not sent response.");
		}
	});
	return false;
}
	
var checkflag = "false";
function check(field)
{
 field=document.getElementsByName(field);
  if (checkflag == "false")
  {
    for (i = 0; i < field.length; i++)
	{
      field[i].checked = true;
    }
    checkflag = "true";
  }
  else {
    for (i = 0; i < field.length; i++) {
      field[i].checked = false;
    }
    checkflag = "false";
  }
}
	
//----------- For Popup----------------------------------

	function show_win_ser(data)
	{
		document.getElementById('inv_data').innerHTML=data;
	}
	function search_by_user()
	{
		var user_name = document.getElementById('inv_user_id').value;
		var orderby_p = document.getElementById('orderby_p').value;
		var order_p = document.getElementById('order_p').value;
		var st_pos_p = document.getElementById('st_pos_p').value;
		if(document.getElementById('inv_user_id').value!="-1")
			x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
		else
			alert("Please Select Option");
	}
	function order(orderby_p,order_p)
	{
		var user_name = document.getElementById('inv_user_id').value;
		var st_pos_p = document.getElementById('st_pos_p').value;
		x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
	}
	
	function pop_nb(st_pos_p)
	{
		var user_name = document.getElementById('inv_user_id').value;
		var orderby_p = document.getElementById('orderby_p').value;
		var order_p = document.getElementById('order_p').value;
		x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
	}
//-------------------------------------------------------

	function show_win(data)
	{
		win=cn_window_open('INVITESs',data,true);
	}
	function chk_email(v)        
	{
		 f1=0;
		   f2=0;
		   for(j=0;j<v.length;j++)
		   {
				   if(v.charAt(j)=='@')
				   {
						   f1=j+1;
				   }
				   if(v.charAt(j)=='.')
				   {
						   f2=j+1;
				   }
		   }
		   if(f1==0 || f2==0)
		   {
				   return false;
		   }
		   else
		   {
				   return true;
		   }
	}

	function chk_val()
	{
		if(
			document.getElementById('user_fname').value=="" ||
			document.getElementById('user_lname').value=="" ||
			document.getElementById('user_gender').value=="" ||
			document.getElementById('age').value=="" ||
			document.getElementById('user_country').value=="" ||
			document.getElementById('user_state').value=="" ||
			document.getElementById('user_email').value==""
		  )
		{
			bootbox.alert("Please fill all * fields to continue.");
			return false;
		}
		else if( document.getElementById('act').value=="user_save" && (document.getElementById('user_password').value=="" ||
			document.getElementById('user_con_password').value==""))
		{
			bootbox.alert("Please fill all * fields to continue.");
			return false;
		}
		
		else if(!chk_email(document.getElementById('user_email').value))
		{
			bootbox.alert("Please enter a valid email address to continue.");
			return false;
		}
		
		else if(document.getElementById('email_exist').value==1)
		{
			bootbox.alert("The email address you entered already exists in our system. Please enter another email address to continue.");
			return false;
		}
		else if(document.getElementById('user_password').value!=document.getElementById('user_con_password').value)
		{
			bootbox.alert("Password and Confirm Password are not matched Please try again.");
			return false;
		}
		else
		{
			if(document.getElementById('act').value=="user_save")
			{
				
				user.save('',document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('age').value,
							 document.getElementById('user_state').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_password').value);
                            jQuery.ajax({
                            type: "POST",
                            url:"user.php?act=user_save",
                            data: $('#frm').serialize(),
                                success: function(js){
                                        //win=cn_window_open('',"User Added Successfully","",2);
                                        user.view("","User Added Successfully","map_company_user_id","DESC","","",1,"","","","","","");
                                },
                                        error: function(){
                                        alert("Please try again. Server have not sent response.");
                                }
                            });
                        }
			else
			{
				user.update('',document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('age').value,
							 document.getElementById('user_country').value,
                                                         document.getElementById('user_state').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_password').value,
							 document.getElementById('user_id').value);
			
                        
                            jQuery.ajax({
                            type: "POST",
                            url:"user.php?act=user_update",
                            data: $('#frm').serialize(),
                                success: function(js){
                                        //win=cn_window_open('',"User Updated Successfully","",2);
                                        user.view("","User Updated Successfully","map_company_user_id","DESC","","",1,"","","","","","");
                                },
                                        error: function(){
                                        alert("Please try again. Server have not sent response.");
                                }
                            });
                        }
		}
	}
	
	function close_popup()
	{
	}
	
	function chk_email_exist()
	{
		x_chk_email_exist(document.getElementById('user_email').value,document.getElementById('user_id').value,chk_email_exist_responce)
	}
	
	function chk_email_exist_responce(js)
	{
		if(js)
		{
			bootbox.alert(js);
			document.getElementById('email_exist').value=1;
			return false;
		}
		else
			document.getElementById('email_exist').value=0;
	}
	
	function user_del(id)
	{
		user.del("","","","","","","","",id);
	}
	
	function set_order(f,o)
	{
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var company_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			company_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
		user.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,company_state,keyword);
	}
	
	
	function nb(a)
	{
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var company_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			company_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
	
		document.getElementById('st_pos').value=a;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,company_state,keyword);
	}
	
	function set_page(nrpp)
	{
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var company_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			company_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
		document.getElementById('nrpp').value=nrpp;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,company_state,keyword);

	}
	
	
	function ser_by()
	{
		if(
			document.getElementById("sex").selectedIndex=="0" &&
			document.getElementById("strt_age").selectedIndex=="0" &&
			document.getElementById("end_age").selectedIndex=="0" &&
			document.getElementById("company_country").selectedIndex=="0" &&
			document.getElementById("users_state").selectedIndex=="0" &&
			document.getElementById('search').value==""
		  )
		{
			bootbox.alert("Please provide at one search Parameter.");
			return false;
		}
		else if(document.getElementById("end_age").selectedIndex!="0"){
				if((document.getElementById('strt_age').value)>(document.getElementById('end_age').value)){
					bootbox.alert("Start Age Greater than End Age");
					return false;
				}
		}
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var users_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			users_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
                if($('#global_user').is(':checked')){
		user.view('','Search Result','','','','','2',sex,strt_age,end_age,company_country,users_state,keyword);
        	}
                else{
		user.view('','Search Result','','','','','1',sex,strt_age,end_age,company_country,users_state,keyword);
        	}
    }
    	
	function control() {
		if(document.getElementById("strt_age").selectedIndex!="0"){
    		document.getElementById("end_age").disabled = false;
		}
		if((document.getElementById("end_age").selectedIndex!="0")&& (document.getElementById("strt_age").selectedIndex=="0")){
    		bootbox.alert("Invalid Age Range! Start Age Not Selected!");
			document.getElementById("end_age").disabled = true;
			document.getElementById("end_age").selectedIndex="0";
			return false;
		}
	}
	
	function reset_srch(){
		user.view('','','','','','');
	}
	
	function state_srch(country_id, act){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			//document.myForm.time.value = ajaxRequest.responseText;
			if(act=="view"){
				document.getElementById("users_state").innerHTML=ajaxRequest.responseText;
			}
			else{
				document.getElementById("user_state").innerHTML=ajaxRequest.responseText;
			}
		}
	}
	//var country_id=document.getElementById('user_country').value;
	var queryString = "?c_id=" + country_id + "&act=" + act;
	ajaxRequest.open("GET", "state.php" + queryString, true);
	ajaxRequest.send(null); 
}

function create_group()
{
	var checkBoxes=document.getElementsByName('chk_user_id[]');
	
	var booleanResult=false;
	for(var i=0;i<checkBoxes.length;i++){
		if(checkBoxes[i].checked){
			booleanResult=true;
			break;
		}
	}
	if(booleanResult==false)
	{
		alert("Please select at least one.")
		return false;
	}
	
	jQuery.ajax({
		type: "POST",
		url:"user.php?act=create_group",
		data: $('#frm').serialize(),
		success: function(js){
			win=cn_window_open('',"Group Created Successfully",1);
		},
			error: function(){
			alert("Please try again. Server have not sent response.");
		}
	});
	return false;
}
function open_group()
{
	var ele = document.getElementById("group");
	var group_btn= document.getElementById("group_btn");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
		group_btn.style.display = "none"
    }
}	
	
</script>
	<div id="user_data"></div>
	
<script>
    <?php echo $_smarty_tpl->getVariable('js')->value;?>

	user= new cn_ajax("user","user_data");
        user.view("","","","","","",0,"","","","","","");
        //user.view("","","map_company_user_id","DESC","","",1,"","","","","","");
</script>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Bootstrap Core JavaScript -->
  <?php if ($_smarty_tpl->getVariable('act')->value=='analysis_graph'){?>
   <script src="js/jquery.min.js"></script>
  <?php }?> 
    <script src="js/bootstrap-dashboard.js"></script>

    <!-- Menu Toggle Script -->
   
	<script type="text/javascript">
	 <?php if ($_smarty_tpl->getVariable('act')->value=='analysis_graph'){?>
		$.noConflict();
	 <?php }?>
	jQuery(document).ready(function(){
		jQuery(function(){
                        
		        var topPos = window.pageYOffset;
				if(topPos>0){
					$("#videoContainer").addClass("fixed-pos");
					$("#bottomContainer").addClass("bottom-pos");
                                        var winWidth = $(window).width()-330;
                                        $("#videoContainer").css("width",winWidth+"px");
				}else {
					$("#videoContainer").removeClass("fixed-pos");
					$("#bottomContainer").removeClass("bottom-pos");
				} 			
			$(window).scroll(function(){
				var topPos = window.pageYOffset;
				if(topPos>0){
					$("#videoContainer").addClass("fixed-pos");
					$("#bottomContainer").addClass("bottom-pos");
                                       
				}else {
					$("#videoContainer").removeClass("fixed-pos");
					$("#bottomContainer").removeClass("bottom-pos");
				}
                                if($("#wrapper").hasClass("toggled") && $("#videoContainer").hasClass("fixed-pos")){
                                     var winWidth = $(window).width()-29;
                                     $("#videoContainer").css("width",winWidth+"px");
                                 }
			});
                        $( window ).resize(function() {
                               
                               var winWidth = $(window).width()-330;
                               $("#videoContainer").css("width",winWidth+"px");
                               if(winWidth<550){
                                    var winWidth = $(window).width();
                                    $("#videoContainer").css("width",winWidth+"px");
                               }
                           });
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
				var winWidth = $(window).width();
				if($("#wrapper").hasClass("toggled")){
                                    var winWidth = $(window).width()-29;
                                    $("#videoContainer").css("width",winWidth+"px");
					if(winWidth>1340){
						$("#videoContainer").addClass("full-size");
					}
					else{
						$("#videoContainer").removeClass("full-size");
					}
					
				}
				else{
                                    $("#videoContainer").removeClass("full-size");
                                    var winWidth = $(window).width()-330;
                                    $("#videoContainer").css("width",winWidth+"px");
				}
			});
			
			$("#nav-close").click(function(e) {
				$("#menu-toggle").click();
				
			});
		/************************************** Sidebar Icon Hover ******************************************/
			<?php if (!$_smarty_tpl->getVariable('video_tab')->value){?>
			jQuery(".video").mouseover(function() {
				jQuery(".video").attr( "src","./images/video_ov.png");
			}).mouseout(function() {
				jQuery(".video").attr( "src","./images/video.png");
			});
			<?php }?>
			
			<?php if (!$_smarty_tpl->getVariable('user_tab')->value){?>
			jQuery(".user").mouseover(function() {
				jQuery(".user").attr( "src","./images/user_ov.png");
			}).mouseout(function() {
				jQuery(".user").attr( "src","./images/user.png");
			});
			<?php }?>
			
			<?php if (!$_smarty_tpl->getVariable('analysis_tab')->value){?>
			jQuery(".analysis-result").mouseover(function() {
				jQuery(".analysis-result").attr( "src","./images/report_ov.png");
			}).mouseout(function() {
				jQuery(".analysis-result").attr( "src","./images/report.png");
			});
			<?php }?>
			
			<?php if (!$_smarty_tpl->getVariable('account_tab')->value){?>
				jQuery(".account").mouseover(function() {
					jQuery(".account").attr( "src","./images/account_ov.png");
				}).mouseout(function() {
					jQuery(".account").attr( "src","./images/account.png");
				});
			<?php }?>
                        
                        <?php if (!$_smarty_tpl->getVariable('campaign_tab')->value){?>
                                jQuery(".campaign").mouseover(function() {
                                        console.log("fdfd")
                                        jQuery(".campaign").attr( "src","./images/report_ov.png");
                                }).mouseout(function() {
                                        jQuery(".campaign").attr( "src","./images/report.png");
                                });
                        <?php }?>    
                            
                            
                            
		});
		});
		
		
	function goback(url)
	{
		location.href=url;
	}

	</script>
    
<style type="text/css">
.new_table
{
	margin:0px;
	padding:0px;
}
.new_table tr td
{
	margin:0px;
	padding:5px 0px 5px 0px;
}

</style>

</body>
<iframe name="submitframe" id="submitframe" frameborder="0" style="height:500px; width:800px; display:none"></iframe>

</html>
