<?php /* Smarty version Smarty-3.0.6, created on 2015-02-20 05:27:24
         compiled from "./templates/redeem_reward.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33020475754aa79d5c2cc99-99957030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b502ca44a5c63c25fef5f7d746d2df691ce021c1' => 
    array (
      0 => './templates/redeem_reward.tpl',
      1 => 1424430984,
      2 => 'file',
    ),
    'edc25cd2360aa782f5ecf95a285921d4de182fe6' => 
    array (
      0 => './templates/video_list_header.tpl',
      1 => 1424431743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33020475754aa79d5c2cc99-99957030',
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
							  <a  href="watch_video.php" id="browse-more">
					   <span>Home</span>
					   <i class="browse-video" ></i>
					   </a>
				  </li>
				  <li><a href="account_setting.php"><?php echo $_COOKIE['UserName'];?>
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
					
					  </div>
			  </div>
	  
	  
	  
   <!-- header ended -->
		<div id="wrapper">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav dashboard">
					<!--Include your navigation here-->
					<li>
						<div id="images">
							<?php if ($_smarty_tpl->getVariable('user_data')->value['up_fname']){?>
								<img class="img-responsive" src="<?php echo $_smarty_tpl->getVariable('userimage')->value;?>
"style="height:98px;" "style="width:150px;"></img>
							<?php }else{ ?>
							<img class="img-responsive" src="./images/dashboard/user.jpg"style="height:98px;" "style="width:150px;"></img>
							<?php }?>
						</div>
					</li>
					<li>
						<div id="name">
							<div class="profile-name"><?php echo $_COOKIE['UserName'];?>
</div>
							<div class="profile-address"><?php echo $_smarty_tpl->getVariable('user_data')->value['countries_name'];?>
</div>
						</div>
					</li>
					
					<li style="padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('reward_tab')->value;?>
">
						<?php if ($_smarty_tpl->getVariable('reward_tab')->value==''){?>
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionfour">
							<img class="img-responsive rewards" src="./images/<?php if ($_smarty_tpl->getVariable('reward_tab')->value!=''){?>rewards_ov.png <?php }else{ ?>rewards.png<?php }?>"></img>
							Rewards
							</a>
						<?php }else{ ?>
							<a href="javascript:void(1)">
							<img class="img-responsive video" src="./images/rewards_ov.png">Rewards</a></img>
						<?php }?>
						<ul id="accordionfour" class="panel-collapse collapse" style="background:#fff; <?php if ($_smarty_tpl->getVariable('reward_tab')->value!=''){?>display:block <?php }?>">
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_cumulative_rewards_tab')->value;?>
" >
								<a href="index.php?act=cumulative_rewards">
								<img class="img-responsive" src="./images/arrow.png"></img>Cumulative Rewards
								</a>
							</li>
							
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_redeem_reward_tab')->value;?>
" >
								<a href="index.php?act=redeem_reward">
								<img class="img-responsive" src="./images/arrow.png"></img>Redeem Rewards
								</a>
							</li>
						</ul>
					</li>
					
					<li style="padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('fame_tab')->value;?>
">
						<?php if ($_smarty_tpl->getVariable('fame_tab')->value==''){?>
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionthree">
							<img class="img-responsive halloffame" src="./images/<?php if ($_smarty_tpl->getVariable('fame_tab')->value!=''){?>halloffame_ov.png <?php }else{ ?>halloffame.png<?php }?>"></img>
							Hall Of Fame
							</a>
						<?php }else{ ?>
							<a href="javascript:void(1)">
							<img class="img-responsive halloffame" src="./images/halloffame_ov.png">Hall Of Fame</a></img>
						<?php }?>
						<ul id="accordionthree" class="panel-collapse collapse" style="background:#fff; <?php if ($_smarty_tpl->getVariable('fame_tab')->value!=''){?>display:block <?php }?>">
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_current_user_tab')->value;?>
" >
								<a href="#">
								<img class="img-responsive current_user" src="./images/arrow.png"></img>Current User
								</a>
							</li>
							
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_overall_user_tab')->value;?>
" >
								<a href="#">
								<img class="img-responsive overall_user" src="./images/arrow.png"></img>Overall User
								</a>
							</li>
						</ul>
					</li>
					
					<li class="<?php echo $_smarty_tpl->getVariable('campaigns_tab')->value;?>
">
						<a href="campaigns.php">
							<img class="img-responsive campaing" src="./images/dashboard/campaing.png"></img>
							<span style="font-size:16px;">Campaigns</span><span class="badge"><?php echo $_smarty_tpl->getVariable('cmp_count')->value['total'];?>
</span>
						</a>
					</li>
					
				</ul>
			</div>	
			<!-- Page Content -->
			   
			<div class="container-fluid" style="position:relative;top:95px;">
					
				<!-- Top Content -->
				<div class="row ">
					<div class="col-md-10" style="background-color:#fff; padding: 1px 0 0;" >
											
						<!-- ----------------------------- -->
						
<div style="margin-left:15px;">
    <h4>My reward points :<b> <?php echo $_smarty_tpl->getVariable('user_data')->value['points'];?>
</b></h4>
</div>
						
<div class="panel panel-default">
    <div class="panel-heading">
	<strong><em>Last Redeemed Reward</em></strong>
    </div>
    <div class="container-fluid">
	<div class="row">
            <div class="col-md-12" style="padding-left:0;padding-right:0;">
                <div class="panel-left-content">
                    <div class="container-fluid">
                    	<!--<div class="row border-bottom vcon">-->
			<?php if (count($_smarty_tpl->getVariable('my_redeems')->value)>0){?>
                            <?php  $_smarty_tpl->tpl_vars['rev'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['rek'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('my_redeems')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rev']->key => $_smarty_tpl->tpl_vars['rev']->value){
 $_smarty_tpl->tpl_vars['rek']->value = $_smarty_tpl->tpl_vars['rev']->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['rek']->value%4==0){?>
                                    <?php if ($_smarty_tpl->tpl_vars['rek']->value>0){?>
                    </div>
                                    <?php }?>
                    <div class="row border-bottom">
                        <div class="col-md-3">
                            <img class="" src="../files/prize_thumb/<?php echo $_smarty_tpl->tpl_vars['rev']->value['r_image'];?>
" style="width:120px;height:120px; float:left; margin-right:6px"></img>  
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
				<?php }else{ ?>
                        <div class="col-md-3">
                            <img class="" src="../files/prize_thumb/<?php echo $_smarty_tpl->tpl_vars['rev']->value['r_image'];?>
" style="width:120px;height:120px; float:left; margin-right:6px" ></img>  
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
				<?php }?>
			    <?php }} ?>
                        <?php }else{ ?>
                            <div>
                                You did not redeem any reward yet!
                            </div>
                    </div>
			<?php }?>
                </div>
            </div>
	</div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
	<strong><em>More Rewards to Redeem</em></strong>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="padding-left:0;padding-right:0;">
		<div class="panel-left-content">
                    <div class="container-fluid">
                        <!--<div class="row border-bottom vcon">-->
			<?php if (count($_smarty_tpl->getVariable('rewards')->value)>0){?>
                            <?php  $_smarty_tpl->tpl_vars['rev'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['rek'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rewards')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['rev']->key => $_smarty_tpl->tpl_vars['rev']->value){
 $_smarty_tpl->tpl_vars['rek']->value = $_smarty_tpl->tpl_vars['rev']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['rek']->value%4==0){?>
                                    <?php if ($_smarty_tpl->tpl_vars['rek']->value>0){?>
                    </div>
                                    <?php }?>
                    <div class="row border-bottom">
                    <div class="col-md-3">
			<a href="javascript:void(0)" id="<?php echo $_smarty_tpl->tpl_vars['rev']->value['re_a_id'];?>
" data="<?php echo $_smarty_tpl->tpl_vars['rev']->value['r_id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['rev']->value['re_a_id'];?>
">
			<img class="" src="../files/prize_thumb/<?php echo $_smarty_tpl->tpl_vars['rev']->value['r_image'];?>
"style="width:150px;height:150px; float:left; margin-right:6px" ></img> 
			<div class="product-title">
                            <?php echo $_smarty_tpl->tpl_vars['rev']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rev']->value['sub_title'];?>
)
			</div>
			<div class="product-point">
                            <?php echo $_smarty_tpl->tpl_vars['rev']->value['points'];?>
 Points
			</div>
			</a>
                    </div>
				<?php }else{ ?>
                    <div class="col-md-3">
			<a href="javascript:void(0)" id="<?php echo $_smarty_tpl->tpl_vars['rev']->value['re_a_id'];?>
" data="<?php echo $_smarty_tpl->tpl_vars['rev']->value['r_id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['rev']->value['re_a_id'];?>
">
			<img class="" src="../files/prize_thumb/<?php echo $_smarty_tpl->tpl_vars['rev']->value['r_image'];?>
"style="width:150px;height:150px; float:left; margin-right:6px"></img>  
			<div class="product-title">
                            <?php echo $_smarty_tpl->tpl_vars['rev']->value['title'];?>
 (<?php echo $_smarty_tpl->tpl_vars['rev']->value['sub_title'];?>
)
			</div>
			<div class="product-point">
                            <?php echo $_smarty_tpl->tpl_vars['rev']->value['points'];?>
 Points
			</div>
			</a>
                    </div>
				<?php }?>
                            <?php }} ?>
                    </div>
			<?php }?>
		</div>
            </div>
	</div>
    </div>
   </div>
 	
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
                            <td><img src=""  style="width:120px;height:120px; float:left; margin-right:6px" class="reimg"></td>
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


<script type="text/javascript">
		
		var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
		$(function(){
			$('a#redeem_re').on('click', function(){
				var UserId = '<?php echo $_smarty_tpl->getVariable('user_data')->value['user_id'];?>
';
				var id = $(this).attr('data'), imgsrc = $(this).children('img').attr('src'), retitle = $(this).children('.product-title').text(), repoints = $(this).children('.product-point').text();
				//alert(id + imgsrc + retitle + repoints);
				
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
				
			});
		});
			
		
		
		
		</script>
	

						<!-- ----------------------------- -->
						
					</div>
										
					<div class="col-md-2" style="background-color:#ECECEC;">
						
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
		<script src="js/circle-progress.js"></script>
		<script type="text/javascript">
		
	//var wl = window.location.hostname + window.location.pathname; 
	
	$(function(){
		 
	});
		
	</script>
		<script src="js/jquery.diagram.js"></script>
		
		<script type="text/javascript">
		
		var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
		$(function(){
			$('a#redeem_re').on('click', function(){
				var UserId = '<?php echo $_smarty_tpl->getVariable('user_data')->value['user_id'];?>
';
				var id = $(this).attr('data'), imgsrc = $(this).children('img').attr('src'), retitle = $(this).children('.product-title').text(), repoints = $(this).children('.product-point').text();
				//alert(id + imgsrc + retitle + repoints);
				
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
				
			});
		});
			
		</script>
		
		<script type="text/javascript">
		
		var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
		function return_play_video(c_id)
		{
			if(c_id)
			{
				window.location.href=SERVER_PATH+'watch_video.php?act=watch_video&c_id='+c_id;
				return true;
			}
		}
			
		var wl = window.location.hostname + window.location.pathname;
	
		$(function(){
			 $('#browse-more').on('click',function(){
				window.location = 'http://'+wl;
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
							productCol += '<div  class="col-md-4 load-img">'+'<img class="img-responsive" src="../files/prize_thumb/'+val.r_image+'"style="width:150px;height:150px; float:left; margin-right:6px"></img>'+'<div class="product-title">'+val.title+' ('+val.sub_title+')</div>'+'<div class="product-point">'+val.points+' Points'+'</div>'+'</div>';
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