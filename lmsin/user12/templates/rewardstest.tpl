<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Monet Dash Board</title>

		<!-- Bootstrap core css --->
            <link href="css/bootstrap.css" rel="stylesheet">
	    <link href="css/rewards.css" rel="stylesheet">	 
               
        <!--custom css -->
            <link href="css/index.css" rel="stylesheet">
            <link href="css/sidebar.css" rel="stylesheet">
            <link href="css/dashboard.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
	</head>
	<body>
	<!--header starts-->
	 <div class="header">
			<div class="container-fluid" style="background:#f1f1f1">
				<img class="img-responsive" src="./images/logo.png" style="height:60px;"></img>
			</div>
			<div id="nav" class="container-fluid bg-top affix">
        <!--- Page Top Design ---->
			 <div class="row">
			    <div class="col-xs-12 col-md-12">
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
                                        
                                </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>						
					             <a  href="#" id="browse-more">
						     <span>Home</span>
						     <i class="browse-video" ></i>
						     </a>
						</li>
						<li><a href="account_setting.php">{$smarty.cookies.UserName} !</a></li>
						<li>
						        <a href="javascript:void(1)" onClick="javascript:{if $smarty.session.FBuserID}logoutFacebook(){else}location.href='index.php?act=logout'{/if}">
							<span>Logout</span>
							<i class="logout-icon"></i>
					        	</a>
					        </li>
					</ul>
				 </div><!-- /.navbar-collapse -->
				
				 </div><!-- /.container-fluid -->
				 </nav>    
                        </div>
        
		        </div>
		</div>
	<!--header ended-->
			
		<div id="wrapper">
			<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
        <!--Include your navigation here-->
                
		<li><div id="images">
			{if $user_data.up_fname}
			<img class="img-responsive" src="{$userimage}"style="height:98px;" "style="width:150px;"></img>
			
			{/if}
			</div>
		</li>
		<li><div id="name">
			<div class="profile-name">{$user_data.user_fname} {$user_data.user_lname}</div>
			<div class="profile-address">{$user_data.countries_name}</div>
			</div>
		</li>
		<li><a data-toggle="collapse" data-parent="#accordion"   href="#accordionfour"><img class="img-responsive rewards" src="./images/rewards.png"></img>Rewards</a>
                     <ul id="accordionfour" class="panel-collapse collapse" style="background:#f7f7f7">
		    	<li class="sub-nav"><a href="index.php?act=cumulative_rewards"><img class="img-responsive" src="./images/arrow.png">Cumulative Rewards</a></li>
	    		<li class="sub-nav"><a href="index.php?act=redeem_reward"  ><img class="img-responsive" src="./images/arrow.png">Redeem Rewards</a></li>
	    		
					
                     </ul>
                </li>
		<li><a data-toggle="collapse" data-parent="#accordion"   href="#accordionthree"><img class="img-responsive halloffame" src="./images/halloffame.png"></img>Hall of Fame</a>
                     <ul id="accordionthree" class="panel-collapse collapse" style="background:#f7f7f7">
		    	<li class="sub-nav"><a href="#"  data-toggle="modal" data-target="#hallOffame" ><img class="img-responsive" src="./images/arrow.png">Current</a></li>
	    		<li class="sub-nav"><a href="#"  data-toggle="modal" data-target="#hallOffame" ><img class="img-responsive" src="./images/arrow.png">Overall</a></li>
	    		
					
                     </ul>
                </li>
		<li><a href="campaigns.php"><img class="img-responsive campaing" src="./images/campaing.png"></img>Campaigns <span class="badge">{$cmp_count.total}</span></a></li>
 <!--Navigation ends here---->
            </ul>
        </div>
<!-- Page Content -->
			   
	<div class="container-fluid" style="position:relative;top:95px;">
					
	<!-- Top Content -->
				<div class="row ">
					<div class="col-md-10" style="background-color:#F1F1F1; padding: 1px 0 0;" >
						
						<div style="margin-left:15px;">
							<h4>My reward points : {$user_data.points} Point</h4>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong><em>Your last redeems rewards</em></strong>
							</div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12" style="padding-left:0;padding-right:0;">
										<div class="panel-left-content">
											<div class="container-fluid">
												<!--<div class="row border-bottom vcon">-->
												{if $my_redeems|@count > 0}
												{foreach $my_redeems as $rek=>$rev}
												{if $rek%4==0}
												{if $rek>0}
													</div>
												{/if}
												<div class="row border-bottom">
													<div class="col-md-3">
														<img class="" src="../files/prize_thumb/{$rev.r_image}"></img>  
														<div class="product-title">
															{$rev.title} ({$rev.sub_title})
														</div>
														<div class="product-point">
															{$rev.points} Points
														</div>
													</div>
												
												{else}
													<div class="col-md-3">
														<img class="" src="../files/prize_thumb/{$rev.r_image}"></img>  
														<div class="product-title">
															{$rev.title} ({$rev.sub_title})
														</div>
														<div class="product-point">
															{$rev.points} Points
														</div>
													</div>
												{/if}
												{/foreach}
												</div>
												{/if}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong><em>More Rewards to redeems</em></strong>
							</div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12" style="padding-left:0;padding-right:0;">
										<div class="panel-left-content">
											<div class="container-fluid">
												<!--<div class="row border-bottom vcon">-->
												{if $rewards|@count > 0}
												{foreach $rewards as $rek=>$rev}
												{if $rek%4==0}
												{if $rek>0}
													</div>
												{/if}
												<div class="row border-bottom">
													<div class="col-md-3">
														<a href="javascript:void(0)" id="{$rev.re_a_id}" data="{$rev.r_id}" class="{$rev.re_a_id}">
															<img class="" src="../files/prize_thumb/{$rev.r_image}"></img>  
															<div class="product-title">
																{$rev.title} ({$rev.sub_title})
															</div>
															<div class="product-point">
																{$rev.points} Points
															</div>
														</a>
													</div>
												
												{else}
													<div class="col-md-3">
														<a href="javascript:void(0)" id="{$rev.re_a_id}" data="{$rev.r_id}" class="{$rev.re_a_id}">
															<img class="" src="../files/prize_thumb/{$rev.r_image}"></img>  
															<div class="product-title">
																{$rev.title} ({$rev.sub_title})
															</div>
															<div class="product-point">
																{$rev.points} Points
															</div>
														</a>
													</div>
												{/if}
												{/foreach}
												</div>
												{/if}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
										
					<div class="col-md-2" style="background-color:#fff;">
						
						{foreach $companies as $k=>$v}
						<div class="row">
							<div class="col-md-12 block">
								<a class="" href="{$SERVER_PATH}watch_video.php?filter=true&cat=&brand={$v.company_id}"> 
									<img class="img-responsive" src="{$v.company_logo}" alt="{$v.company_name}"></img> 
								</a>
							</div>
						</div>
						{/foreach}
						
					</div>
				</div>
					
			</div>
		</div>	
		
		
		<div class="modal fade redeem-popup" id="redeem-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="redeemReForm" role="form">
						<input type="hidden" name="UserId" id="UserId">
						<input type="hidden" name="rewardId" id="rewardId">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="myModalLabel">Redeem Reward</h4>
						</div>
						<div class="modal-body" style=" padding: 0;">
							<table class="">
								<tr>
									<td><img src="" class="reimg"></td>
									<td><span class="retitle"></span><br><span class="repoints"></span></td>
								</tr>
							</table
						</div>
						<div class="modal-footer">
							<div id="agreeSubmit" class="form-group" style="text-align:center;">
								<button type="submit" class="ok-button">Redeem</button>
								<button type="button" class="ok-button" data-dismiss="modal"><span aria-hidden="true">Cancel</span></button>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	
	
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.js"></script>
		
		<script type="text/javascript">
		
		var SERVER_PATH="{$SERVER_PATH}";
		$(function(){
			$('a#redeem_re').on('click', function(){
				var UserId = '{$user_data.user_id}';
				var id = $(this).attr('data'), imgsrc = $(this).children('img').attr('src'), retitle = $(this).children('.product-title').text(), repoints = $(this).children('.product-point').text();
				//alert(id + imgsrc + retitle + repoints);
				{literal}
				$('#redeem-popup .reimg').attr({'src' : imgsrc});
				$('#redeem-popup .retitle').text(retitle);
				$('#redeem-popup .repoints').text(repoints);
				$('#redeem-popup #UserId').val(UserId);
				$('#redeem-popup #rewardId').val(id);
				
				$('#redeem-popup').modal('show');
				
				$('#redeemReForm').on('submit', function (event) {
					event.preventDefault();
					var frm = $(this).serialize();
					//alert(frm);
					$.ajax({
						type : 'POST',
						url : 'index.php?act=xhr_redeem_reward',
						data : frm,
						success: function (result) {
							
							location.reload();
							
							
						},
						error: function (jqXHR,text_status,err_msg) {
							alert('ERROR : '+text_status+' '+err_msg);
						},
					});
				});
				{/literal}
			});
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
	
	</body>
</html>














