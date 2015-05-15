<?php /* Smarty version Smarty-3.0.6, created on 2014-12-15 10:04:58
         compiled from ".\templates\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24936548ea43a96e841-49887395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89d1e5891599f8ad2f3de50c07ac5ae3329ee7a8' => 
    array (
      0 => '.\\templates\\user.tpl',
      1 => 1418634295,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1415957621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24936548ea43a96e841-49887395',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\xampp\htdocs\Monet\smarty\libs\plugins\modifier.capitalize.php';
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
    
    <script  src="js/cynets.js"></script>
  
    <script  src="js/cynets_modal.js"></script>
    
   	<script src="js/bootbox.js" ></script>
	
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
		<div id="nav" class="container-fluid bg-top">
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
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <!--Include your navigation here-->
			  <li class="text-right"><a href="#" class="nav-menu-text">Menu</a><a href="#nav-close" class="nav-expander" id="nav-close">X</a></li>
			  <li class="<?php echo $_smarty_tpl->getVariable('video_tab')->value;?>
"><a href="video.php"><img class="img-responsive video test" src="images/<?php if ($_smarty_tpl->getVariable('video_tab')->value!=''){?>video_ov.png<?php }else{ ?>video.png<?php }?>" ></img> Video Manager  </a></li>
			  <li class="<?php echo $_smarty_tpl->getVariable('user_tab')->value;?>
"><a href="user.php"><img class="img-responsive user" src="images/<?php if ($_smarty_tpl->getVariable('user_tab')->value!=''){?>user_ov.png <?php }else{ ?>user.png<?php }?>"></img>User </a></li>
               <!--<li class="<?php echo $_smarty_tpl->getVariable('analysis_tab')->value;?>
"><a href="analysis.php"><img class="img-responsive analysis-result" src="images/report.png"></img>Analysis Result </a></li>-->
                <li style="padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('analysis_tab')->value;?>
"> 
				<?php if ($_smarty_tpl->getVariable('analysis_tab')->value==''){?>
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionTwo">
								<img class="img-responsive analysis-result" src="./images/<?php if ($_smarty_tpl->getVariable('analysis_tab')->value!=''){?>report_ov.png <?php }else{ ?>report.png<?php }?>">
								Analysis Result
							</a>
                <?php }else{ ?>
                <a href="javascript:void(1)">
                <img class="img-responsive analysis-result" src="./images/report_ov.png">Analysis Result</a>
                <?php }?>            
				<ul id="accordionTwo" class="panel-collapse collapse" style="background:#f7f7f7; <?php if ($_smarty_tpl->getVariable('analysis_tab')->value!=''){?>display:block <?php }?>">
					<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_video_analysis_tab')->value;?>
" ><a href="video.php?act=video_analysis"><img class="img-responsive" src="./images/arrow.png">Video Analytics</a></li>
					
					<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_analysis_tab')->value;?>
" ><a href="analysis.php"><img class="img-responsive" src="./images/arrow.png">User Recording</a></li>
					
					<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_video_tab')->value;?>
" ><a href="analysis.php?act=video_section"><img class="img-responsive" src="./images/arrow.png">Search</a></li>
                </ul>
			  </li>
			  <li class="<?php echo $_smarty_tpl->getVariable('account_tab')->value;?>
"><a href="index.php?act=company_profile_edit"><img class="img-responsive account" src="images/<?php if ($_smarty_tpl->getVariable('account_tab')->value){?>account_ov.png<?php }else{ ?>account.png<?php }?>"></img>Account</a></li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="container-fluid ">
        
<script>
<?php echo $_smarty_tpl->getVariable('js')->value;?>


	
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
							 document.getElementById('user_country').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_password').value);
			}
			else
			{
				user.update('',document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('age').value,
							 document.getElementById('user_country').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_password').value,
							 document.getElementById('user_id').value);
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
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
		user.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,keyword);
	}
	
	
	function nb(a)
	{
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
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
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
	
		document.getElementById('st_pos').value=a;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,keyword);
	}
	
	function set_page(nrpp)
	{
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
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
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
		document.getElementById('nrpp').value=nrpp;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,keyword);

	}
	
	
	function ser_by()
	{
		if(
			document.getElementById("sex").selectedIndex=="0" &&
			document.getElementById("strt_age").selectedIndex=="0" &&
			document.getElementById("end_age").selectedIndex=="0" &&
			document.getElementById("company_country").selectedIndex=="0" &&
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
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
		user.view('','','','','','','1',sex,strt_age,end_age,company_country,keyword);
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
	
	
	
	
</script>
	<div id="user_data"></div>
	
<script>
	user= new cn_ajax("user","user_data");
	user.view("","","","","","","","","","");
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
		 
			jQuery('#nav').affix({
				offset: {
					top: 80
				}
			});	

			/* highlight the top nav as scrolling occurs */
			jQuery('body').scrollspy({ target: '#nav' });

			/* smooth scrolling for scroll to top */
			jQuery('.scroll-top').click(function(){
			  jQuery('body,html').animate({ scrollTop:0 },1000);
			});
		 
			jQuery("#menu-toggle").click(function(e) {
				e.preventDefault();
				jQuery("#wrapper").toggleClass("toggled");
			});
			
			jQuery("#nav-close").click(function(e) {
				e.preventDefault();
				jQuery("#wrapper").addClass("toggled");
				
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