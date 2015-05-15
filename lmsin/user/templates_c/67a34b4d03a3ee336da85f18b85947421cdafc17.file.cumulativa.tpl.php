<?php /* Smarty version Smarty-3.0.6, created on 2015-01-05 04:47:28
         compiled from "./templates/cumulativa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171926608254aa79d0d5c958-34169137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a34b4d03a3ee336da85f18b85947421cdafc17' => 
    array (
      0 => './templates/cumulativa.tpl',
      1 => 1420458435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171926608254aa79d0d5c958-34169137',
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
								<a  href="watch_video.php" id="browse-more" >
									<span>Home</span>
									<i class="browse-video" ></i>
								</a>
							</li>
							<li><a href="#">Hello <?php echo $_smarty_tpl->getVariable('user_data')->value['user_fname'];?>
!</a></li>
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
								<a href="index.php?act=cumulative_rewards" >
									<img class="img-responsive" src="./images/smallarrow.png">
									Cumulative Rewards
								</a>
							</li>
							<li class="sub-nav" id="sub-nav-id" style="border-bottom: none;">
								<a href="index.php?act=redeem_reward"  >
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
							<span style="font-size:16px;">CAMPAIGNS</span><span class="badge"><?php echo $_smarty_tpl->getVariable('cmp_count')->value['total'];?>
</span>
						</a>
					</li>
					
				</ul>
			</div>	
			<!-- Page Content -->
			   
			<div class="container-fluid" style="position:relative;top:95px;">
					
				<!-- Top Content -->
				<div class="row ">
					<div class="col-md-10" style="background-color:#F1F1F1; padding: 1px 0 0;" >
						
						<div class="col-md-12" style="background-color:#F1F1F1; padding-top: 10px;" >
							<div class="top-title" style="margin-top:-10px;">My last redeem</div>
							<table class="user-expression table table-bordered"> 
								<tbody>
									<tr class="" style="border-bottom:0">
										<?php if (count($_smarty_tpl->getVariable('my_redeems')->value)>0){?>
										<td class="field-label col-xs-3 col-sm-3 col-md-2 ">
											<img class="" src="../files/prize_thumb/<?php echo $_smarty_tpl->getVariable('my_redeems')->value['r_image'];?>
"></img>  
										</td>
										<td class="col-xs-4 col-sm-4 col-md-4 second-td">
											<span style="color:#0855CB;"><?php echo $_smarty_tpl->getVariable('my_redeems')->value['title'];?>
</span><br>
											<span style="color:#0855CB;"><?php echo $_smarty_tpl->getVariable('my_redeems')->value['sub_title'];?>
</span><br>
											<span style="color:#E9576E"><?php echo $_smarty_tpl->getVariable('my_redeems')->value['points'];?>
 Points</span>
										</td>
										<!-- <td class="col-xs-5 col-sm-5 col-md-6 third-td">
											<span style="color:#302257;">Total Points:</span> <span style="color:#E9576E"><?php echo $_smarty_tpl->getVariable('user_data')->value['points'];?>
</span><br>
										<span style="color:#302257;">Required Points for newt Redeem: </span><span style="color:#E9576E"><?php echo $_smarty_tpl->getVariable('reward')->value['points']-$_smarty_tpl->getVariable('user_data')->value['points'];?>
</span>
										</td> -->
										<?php }else{ ?>
										<td class="field-label col-xs-3 col-sm-3 col-md-2 ">
											You did not redeem any reward yet!
										</td>
										<?php }?>
									</tr>
									<tr style="">
										<td colspan="2">
										<div class="pull-right"><a href="index.php?act=redeem_reward">Redeem Rewards</a></div>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="container-fluid" style="border-bottom:1px solid #ddd;padding-bottom:1%">
								<div class="row">
									<div  class="col-md-12">
										<!--<div class="top-title-string">Points & Goals</div>	-->
										<!--<div id="circleGraph"></div>-->	
										<div id="rewardsCircle" class="graph-circle"></div>
									</div>	
								</div>	
								
							</div>
							<div id="productContainer" class="container-fluid" style="padding-top:2%;">	
								<div><h1 class="text-center">Choose & Manage Rewards</h1></div>
								<div class="row product-rows">
								
									<?php if (count($_smarty_tpl->getVariable('rewards')->value)>0){?>
										<?php  $_smarty_tpl->tpl_vars['rev'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['rek'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rewards')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rev']->key => $_smarty_tpl->tpl_vars['rev']->value){
 $_smarty_tpl->tpl_vars['rek']->value = $_smarty_tpl->tpl_vars['rev']->key;
?>
											<div  class="col-md-4">
												<img class="" src="../files/prize_thumb/<?php echo $_smarty_tpl->tpl_vars['rev']->value['r_image'];?>
"></img>  
												<div class="product-title">
													<?php echo $_smarty_tpl->tpl_vars['rev']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rev']->value['sub_title'];?>
)
												</div>
												<div class="product-point">
													<?php echo $_smarty_tpl->tpl_vars['rev']->value['points'];?>
 Points
												</div>
											</div>
										<?php }} ?>
									<?php }?>
								</div>
									
							</div>	
							<div class="container-fluid" >
								<div class="row">
									<div class="col-md-12" style="text-align: right;">
										<a class="move-top scroll-to-top" href="#wrapper">&#8593;</a>
									</div>	
								
								</div>	
								<div class="row">
									<div class="col-md-12">
										<div class="show-more" style="display: block;">
											Show More Rewards
										</div>
									</div>
								</div>	
							</div>	
							
							
								
							
						</div>
						
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
user/watch_video.php?filter=true&cat=&brand=<?php echo $_smarty_tpl->tpl_vars['v']->value['company_id'];?>
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
	<script src="js/jquery.diagram.js"></script>
	<script src="js/circle-progress.js"></script>
	
	<script type="text/javascript">
		
	//var wl = window.location.hostname + window.location.pathname; 
	
	$(function(){
		 
	});
		
	</script>
	
	<script>
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
	
	<script type="text/javascript">
			
	$(function(){
	
		<!-- ******************************* Circle Graph******************************-->
		var userPoint = <?php echo $_smarty_tpl->getVariable('user_data')->value['points'];?>
;
		var totalPoint = <?php echo $_smarty_tpl->getVariable('reward')->value['points'];?>
;
		var priceName = "<?php echo $_smarty_tpl->getVariable('reward')->value['title'];?>
";
		var priceTitle = "<?php echo $_smarty_tpl->getVariable('reward')->value['sub_title'];?>
";
		var topText = "<div style='color:#658CEB; font-size:40px; height: 48px;'> "+priceName+" </div> <div style='font-size:20px;'>"+priceTitle+"</div>"
		var htmlString = "<div class='text-inner'>"+topText+"<div style='color:#FF0000; font-size:54px;border-bottom:2px solid #99C1DA;margin: 0 auto 4%; height: 68px; width: 60%;'>"+totalPoint+"</div> <div style='color:#4D616D; font-size:20px;'> TO GOAL </div></div>" ;
		
		var pointPercent = userPoint*100/totalPoint;
		$("#circleGraph").html(htmlString+"<div class='demo' data-percent='"+pointPercent+"%'></div>");
		$('.demo').diagram({
			size: "250", // graph size
			borderWidth: "10", // border width
			bgFill: "#ccc", // background color
			frFill: "#12A5DC", // foreground color
			textSize: 34, // text color
			textColor: '#2a2a2a' // text color
		});
		var detailText = $(".text-inner").html();
		$(".text-inner").hide();
		$('.demo span').addClass("inner-style");
		$('.demo span').html(detailText);
		$(".emotion-indicator").css("visibility","hidden");
		var winWidth = $(window).width();
		$(".col-md-2 a").hover(
		  function() {
			$( this ).children(".emotion-indicator").css("visibility","visible");
			}, function() {
			$( this ).children(".emotion-indicator").css("visibility","hidden");
		  }
		);
		//alert(winWidth);
		
		<!-- ******************************* Show More Product ****************************** -->
		
		$(".show-more").click(function(){
			$(".move-top").show();
			
			$.ajax({
			
				type : 'GET',
				url : 'index.php?act=rewardlist&offset=3',
				dataType:'json',
				success: function (result) {
					$(".show-more").remove();
					var productCol = '';
					var objle = result.length ;
					if(objle > 0)
					{
						$("#productContainer").append('<div id="pr" class="row product-rows" style="" ></div>');
						
						$.each( result, function( i, val ){
							productCol += '<div  class="col-md-4 load-img">'+'<img class="img-responsive" src="../files/prize_thumb/'+val.r_image+'"></img>'+'<div class="product-title">'+val.title+' ('+val.sub_title+')</div>'+'<div class="product-point">'+val.points+' Points'+'</div>'+'</div>';
						});
						$("#pr").append(productCol);
					}
					
				},
				error: function (jqXHR,text_status,err_msg) {
			  		alert('ERROR : '+text_status+' '+err_msg);
				},
			
			});
			
						
		});
		$(".move-top").hide();	
		$(".move-top").click(function(){
			$('html, body').animate({
				scrollTop: $( $(this).attr('href') ).offset().top-30
			}, 600);
			$(".move-top").hide();	
			return false;
		});
		$(window).scroll(function(e) {
			var div = window.pageYOffset;
				if (div > 200) {
					$(".move-top").show();				
				} 
		});
	});
	
	/*
	 *   - image fill; image should be squared; it will be stretched to SxS size, where S - size of the widget
	 *   - fallback color fill (when image is not loaded)
	 *   - custom widget size (default is 100px)
	 *   - custom circle thickness (default is 1/14 of the size)
	 */
	var title ="<?php echo $_smarty_tpl->getVariable('reward')->value['title'];?>
";
	var subTitle = '<?php echo $_smarty_tpl->getVariable('reward')->value['sub_title'];?>
';
	var goalPoints = '<?php echo $_smarty_tpl->getVariable('reward')->value['points'];?>
';
	var userPoint = <?php echo $_smarty_tpl->getVariable('user_data')->value['points'];?>
;
	var totalPoint = <?php echo $_smarty_tpl->getVariable('reward')->value['points'];?>
;
	var percentages = userPoint/totalPoint;
	$('#rewardsCircle').circleProgress({
		value: percentages,
		size: 250,
		startAngle: Math.PI*1.50,
		thickness:12,
		fill: {
			color: 'lime', // fallback color when image is not loaded
			image: 'http://i.imgur.com/pT0i89v.png'
		}
		
	});
		
	</script>
	
	</body>
</html>