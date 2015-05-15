<?php /* Smarty version Smarty-3.0.6, created on 2014-12-29 06:08:51
         compiled from "./templates/watch_cmp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213054683454a1526381f165-37955865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cc6ae166f670b7ba636f66313c1c44f0851d938' => 
    array (
      0 => './templates/watch_cmp.tpl',
      1 => 1419857358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213054683454a1526381f165-37955865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Monet Dash Board</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/index.css" rel="stylesheet">
		<link href="css/dashboard.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	
		<div class="header">
			<div class="container-fluid" style="background:#f1f1f1">
				<img class="img-responsive" src="./images/dashboard/logo.png" style="height:60px;"></img>
			</div>
			<nav class="navbar navbar-default" role="navigation" style="border:none;">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li>						
								<a  href="#" id="browse-more">
									<span>Home</span>
									<i class="browse-video" ></i>
								</a>
							</li>
							<li><a href="#">Hello Mat!</a></li>
							<li>
								<a href="javascript:void(1)" onClick="javascript:<?php if ($_SESSION['FBuserID']){?>logoutFacebook()<?php }else{ ?>location.href='index.php?act=logout'<?php }?>">
									<span>Logout</span>
									<i class="logout-icon"></i>
								</a>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>	
		<div id="wrapper">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav dashboard">
					<!--Include your navigation here-->
					<li>
						<a href="#">
							<div class="container-fluid" style="padding:0">
								<div class="row">
									<div class="col-md-4" style="padding:0">
									<?php if ($_smarty_tpl->getVariable('user_data')->value['up_fname']){?>
										<img class="img-responsive" src="<?php echo $_smarty_tpl->getVariable('userimage')->value;?>
"></img>
									<?php }?>
										<!--<img class="img-responsive" src="./images/dashboard/user.jpg"></img>--> 
									</div>	
									<div class="">
										<div class="profile-name"><?php echo $_smarty_tpl->getVariable('user_data')->value['user_fname'];?>
 <?php echo $_smarty_tpl->getVariable('user_data')->value['user_lname'];?>
</div>
										<div class="profile-address"><?php echo $_smarty_tpl->getVariable('user_data')->value['countries_name'];?>
</div>
										<!--<div class="profile-City">Current city</div>-->
									</div>
								</div>
								
							</div>
						</a>
					</li>
					<li>
						<a data-toggle="collapse" data-parent="#accordion"   href="#accordionOne">
							<img class="img-responsive video" src="./images/dashboard/rewardicon.jpg"></img>
							<span style="font-size:16px;">REWARDS</span>
						</a>
						<ul id="accordionOne" class="panel-collapse collapse">
							
							<li class="sub-nav" id="sub-nav-id" style="border-bottom: none;">
								<a href="index.php?act=cumulative_rawards" >
									<img class="img-responsive" src="./images/smallarrow.png">
									Cumulative Rewards
								</a>
							</li>
							<li class="sub-nav" id="sub-nav-id" style="border-bottom: none;">
								<a href="index.php?act=redeem_reward" >
									<img class="img-responsive" src="./images/smallarrow.png">
									Redeem Rewards
								</a>
							</li>
						</ul>
					</li>
																	
					<li>
						<a data-toggle="collapse" data-parent="#accordion"   href="#accordionTwo">
							<img class="img-responsive video" src="./images/dashboard/halloffame.png"></img>
							<span style="font-size:16px;">HAll OF FAME</span>
						</a>
						<ul id="accordionTwo" class="panel-collapse collapse">
							
							<li class="sub-nav">
								
								<a href="#"  data-toggle="modal" data-target="#hallOfFame" >
									<img class="img-responsive" src="./images/smallarrow.png">
									Option 1
								</a>
								
							</li>
							
						</ul>
					</li>
					<li>
						<a href="campaigns.php">
							<img class="img-responsive video" src="./images/dashboard/campaing.png"></img>
							<span style="font-size:16px;">CAMPAIGNS</span>
						</a>
						
					</li>
					
				</ul>
			</div>	
			<!-- Page Content -->
			   
			<div class="container-fluid" style="position:relative;top:95px;">
					
				<!-- Top Content -->
				<div class="row ">
					<div class="col-md-10" style="background-color:#F1F1F1; padding: 1px 0 0;" >
						<!-- ----------------------------- -->
						watch campaign 
						<!-- ----------------------------- -->
						
					</div>
										
					<div class="col-md-2" style="background-color:#fff;">
						
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companies')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
						<div class="row">
							<div class="col-md-12 block">
								<a class="" href="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
watch_video.php?filter=true&cat=&brand=<?php echo $_smarty_tpl->tpl_vars['v']->value['company_id'];?>
"> 
									<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['company_logo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['company_name'];?>
"></img> 
								</a>
							</div>
						</div>
						<?php }} ?>
						
					</div>
				</div>
					
			</div>
		</div>	
	
	
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.js"></script>
		
		<script type="text/javascript">
		// This is called with the results from from FB.getLoginStatus().
	  	function statusChangeCallback(response) {
		    console.log('statusChangeCallback');
		    console.log(response);
	  	}
		
	  	function checkLoginState() {
		    FB.getLoginStatus(function(response) {
		      statusChangeCallback(response);
		    });
	  	}
		
	  	window.fbAsyncInit = function() {
	  		FB.init({
			    appId      : '432978236748242',
			    cookie     : true,  // enable cookies to allow the server to access 
			                        // the session
			    xfbml      : true,  // parse social plugins on this page
			    version    : 'v2.1' // use version 2.1
	  		});
		
	  		FB.getLoginStatus(function(response) {
		    	statusChangeCallback(response);
		  	});
  		};
		
	  	// Load the SDK asynchronously
	  	(function(d, s, id) {
	    	var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) return;
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
	  	}(document, 'script', 'facebook-jssdk'));
		
		  
	 	function logoutFacebook() {
	  		FB.init({
			    appId      : '432978236748242',
			    cookie     : true,  // enable cookies to allow the server to access 
			                        // the session
			    xfbml      : true,  // parse social plugins on this page
			    version    : 'v2.1' // use version 2.1
		  	});
	  		FB.logout(function() {
			    // Reload the same page after logout
			   	window.location="index.php?act=logout";
			    // Or uncomment the following line to redirect
			    //window.location = "http://ykyuen.wordpress.com";
		  	});
		}
		
		</script>
	
	</body>
</html>