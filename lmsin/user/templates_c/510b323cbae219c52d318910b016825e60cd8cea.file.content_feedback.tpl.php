<?php /* Smarty version Smarty-3.0.6, created on 2015-05-12 14:24:54
         compiled from ".\templates\content_feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214025551ccfd46bee2-88543641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '510b323cbae219c52d318910b016825e60cd8cea' => 
    array (
      0 => '.\\templates\\content_feedback.tpl',
      1 => 1431424245,
      2 => 'file',
    ),
    'd60d58cb3f80dc8e9bfb970545d100fb7f9f8563' => 
    array (
      0 => '.\\templates\\video_list_header.tpl',
      1 => 1431426831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214025551ccfd46bee2-88543641',
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
		 <script src="amcharts.js" type="text/javascript"></script>
        <script src="radar.js" type="text/javascript"></script>
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
				   <div class="col-xs-12 col-md-12" style="background:#ffffff;">
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
"style="vertical-align:middle;width:7.5em;height:7.5em;"/></img>
							<?php }else{ ?>
							<img class="img-responsive" src="./images/dashboard/user.jpg"style="vertical-align:middle;width:7.5em;height:7.5em;"/></img>
							<?php }?>
					</li>
					<li>
						<div id="name">
							<div class="profile-name"><b><?php echo $_COOKIE['UserName'];?>
</div>
							<div class="profile-address"><?php echo $_smarty_tpl->getVariable('user_data')->value['countries_name'];?>
</b></div>
						</div>
					</li>
					
					<li style="padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('reward_tab')->value;?>
">
						<?php if ($_smarty_tpl->getVariable('reward_tab')->value==''){?>
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionfour">
							<img class="img-responsive rewards" src="./images/<?php if ($_smarty_tpl->getVariable('reward_tab')->value!=''){?>rewards.png <?php }else{ ?>rewards.png<?php }?>"></img>
							Rewards
							</a>
						<?php }else{ ?>
							<a href="javascript:void(1)">
							<img class="img-responsive video" src="./images/rewards.png">Rewards</a></img>
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
							<img class="img-responsive halloffame" src="./images/<?php if ($_smarty_tpl->getVariable('fame_tab')->value!=''){?>fame.png <?php }else{ ?>fame.png<?php }?>"></img>
							Hall Of Fame
							</a>
						<?php }else{ ?>
							<a href="javascript:void(1)">
							<img class="img-responsive halloffame" src="./images/fame.png">Hall Of Fame</a></img>
						<?php }?>
						<ul id="accordionthree" class="panel-collapse collapse" style="background:#fff; <?php if ($_smarty_tpl->getVariable('fame_tab')->value!=''){?>display:block <?php }?>">
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_current_user_tab')->value;?>
" >
								<a href="hall_of_fame.php?act=current">
								<img class="img-responsive current_user" src="./images/arrow.png"></img>Current User
								</a>
							</li>
							
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_overall_user_tab')->value;?>
" >
							<a href="hall_of_fame.php?act=all_users">
								<img class="img-responsive overall_user" src="./images/arrow.png"></img>Overall User
								</a>
							</li>
						</ul>
					</li>
					
					<li class="<?php echo $_smarty_tpl->getVariable('campaigns_tab')->value;?>
">
						<a href="campaigns.php">
							<img class="img-responsive campaing" src="./images/campain.png"></img>
							<span style="font-size:16px;">Campaigns</span><span class="badge">&nbsp&nbsp<?php echo $_smarty_tpl->getVariable('cmp_count')->value['total'];?>
</span>
						</a>
					</li>
					
					<li class="<?php echo $_smarty_tpl->getVariable('stats_tab')->value;?>
">
						<a href="leaderboard.php">
							<img class="img-responsive campaing" src="./images/campain.png"></img>
							<span style="font-size:16px;">Stats</span><span class="badge"></span>
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
						
						<!--
						<table class="table table-bordered"> 
							<tbody>
								<tr class="">
									<td class="field-label col-xs-3 col-sm-3 col-md-2">
										<img class="img-responsive full-width" src="<?php echo $_smarty_tpl->getVariable('content')->value['c_thumb_url'];?>
"></img> 
									</td>
									<td class="col-md-4 second-td">
										<span style="color:#E9576E">Congratulations!</span> <span style="color:#302257;">You Completed Ratting.</span><br>
										<span style="color:#302257;">You won <?php echo $_smarty_tpl->getVariable('rp')->value;?>
 reward points</span>
									</td>
								</tr>
								<tr class="">
									<td class="field-label col-xs-3 col-sm-3 col-md-2 ">
										<img class="img-responsive full-width" src="../files/prize_thumb/<?php echo $_smarty_tpl->getVariable('reward')->value['r_image'];?>
"></img> 
									</td>
									<td class="col-md-3 second-td">
										<span style="color:#0855CB;"><?php echo $_smarty_tpl->getVariable('reward')->value['title'];?>
<span><br>
										<span style="color:#E9576E"><?php echo $_smarty_tpl->getVariable('reward')->value['points'];?>
 Points</span>
									</td>
									<td class="col-md-7 third-td">
										<span style="color:#302257;">Total Points:</span> <span style="color:#E9576E"><?php echo $_smarty_tpl->getVariable('user_data')->value['points'];?>
</span><br>
										<span style="color:#302257;">Required Points for new Redeem: </span><span style="color:#E9576E"><?php echo $_smarty_tpl->getVariable('reward')->value['points']-$_smarty_tpl->getVariable('user_data')->value['points'];?>
</span>
									</td>
								</tr>
							</tbody>
						</table>
						-->
							
						<table class="user-expression table table-bordered"> 
							<tbody>
								<tr class="">
									<td class="field-label col-xs-3 col-sm-3 col-md-1">
                                                                         
										<img class="img-responsive full-width" src="<?php echo $_smarty_tpl->getVariable('content')->value['c_thumb_url'];?>
"style="width:150px"/></img> 
									</td>
									<td class="col-md-5 second-td">
                                                                           
                                                                            <span style="color:#614197;font-size: 18px;"><b>Congratulations!</b></span> <span style="color:#614197;font-size: 18px;">You Completed Ratting.</span><br>
										<span style="color:#614197;">You won <?php echo $_smarty_tpl->getVariable('rp')->value;?>
 rewards</span>
										
									</td>
								</tr>
							</tbody>
						</table>
                                                 <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>Points And Rewards</strong></div></div>
                                                                                </br>
                                                                                </br>
						<div class="container-fluid" style="border-bottom:1px solid #ddd;padding-bottom:1%">
							<div class="row ">
								<div  class="col-md-12">
									<!--<div class="top-title-string">Points & Goals</div>	-->
									<div class="row">
										<div class="col-md-3" style="font-size:16px;padding-top:80px">
                                                                                    <span style="color:#614197;">Your Total Points:</span> <span style="color:#E9576E"><b><?php echo $_smarty_tpl->getVariable('user_points')->value;?>
</b></span><br>
										</div>
										<div class="col-md-6">
										
											
											<div id="rewardsCircle" class="rewardsCircle"></div>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
                                                                                
                                                   
                                                                                
						 <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>Your Emotion</strong></div></div>
                                                                                </br>
                                                                                </br>
						<div class="container-fluid expression-container">
									
							<div class="row border-bottom col-row" style="padding-bottom:0;">
								<?php if (isset($_smarty_tpl->getVariable('u_exp',null,true,false)->value['neutral'])){?>
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Neutral</span>
										<img class="img-responsive " src="images/dashboard/neutral.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['neutral']['ad_id'];?>
.jpg">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('u_exp',null,true,false)->value['happy'])){?>
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Happy</span>
										<img class="img-responsive " src="images/dashboard/happy.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['happy']['ad_id'];?>
.jpg">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('u_exp',null,true,false)->value['sad'])){?>
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Sad</span>
										<img class="img-responsive " src="images/dashboard/sad.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['sad']['ad_id'];?>
.jpg">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('u_exp',null,true,false)->value['angry'])){?>
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Angry</span>
										<img class="img-responsive " src="images/dashboard/angry.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['angry']['ad_id'];?>
.jpg">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('u_exp',null,true,false)->value['surprised'])){?>
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Surprised</span>
										<img class="img-responsive " src="images/dashboard/surprised.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['suprised']['ad_id'];?>
.jpg">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('u_exp',null,true,false)->value['scared'])){?>
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Scared</span>
										<img class="img-responsive " src="images/dashboard/scared.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['scared']['ad_id'];?>
.jpg">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('u_exp',null,true,false)->value['disgusted'])){?>
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Disgusted</span>
										<img class="img-responsive" src="images/dashboard/disgusted.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['disgusted']['ad_id'];?>
.jpg">
									</a>
								</div>
								<?php }?>
							</div>
							
							<div class="row border-bottom">
								<div class="col-md-12">
									<!-- <a href="#" class=""> -->
										<div style="color: #444; font-size: 19px; margin: 0 auto; width: 50%;">Me</div>
										<div class="emotion-container"> </div>
									<!-- </a> -->
								</div>
							</div>
							<div class="row border-bottom">
								<div class="col-md-12">
									<!-- <a href="#" class=""> -->
										<div style="color: #444; font-size: 19px; margin: 0 auto; width: 50%;">All</div>
										<div class="allemotion-container"> </div>
									<!-- </a> -->
								</div>
							</div>
                                                        
                                                        
                                                        <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>Your Emotion</strong></div></div>
                                                     <!--radar chart design --->
                                                    <div id="chartdiv" style="width:600px; height:400px;"></div>
                                                    <div id="legenddiv" style="width:200px; height:400px;"></div>
                                                        
                                      <div class="panel panel-default" style=max-width:750px;height:20px;"></br>
                                                     <div class="panel-heading"><strong>Rate More Video</strong></div></div>
                                                                                </br>
                                                                                </br>                  
							<div class="row border-bottom">
								<div class="col-md-12">
								
										
											Recently Added
										<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('latest_videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['i']%6==0){?>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['i']>0){?>
											<?php }?>
										<div class="row border-bottom">
											<div class="col-md-3">
												<a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)">
												<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_thumb_url'];?>
">
												<div class="video-detail"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_title'];?>
</div>
												<div class="video-short">by - <b><?php echo $_smarty_tpl->tpl_vars['v']->value['company_name'];?>
</b> | <?php echo $_smarty_tpl->tpl_vars['v']->value['c_views'];?>
 views <br> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_months']==0){?> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_days']==0){?> Added today <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_days'];?>
 days ago <?php }?><?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_months'];?>
 months ago<?php }?></div>
												</a>
											</div>
					 	
											<?php }else{ ?>
											<div class="col-md-3">
												<a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)">
												<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_thumb_url'];?>
">
												<div class="video-detail"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_title'];?>
</div>
												<div class="video-short">by - <b><?php echo $_smarty_tpl->tpl_vars['v']->value['company_name'];?>
</b> | <?php echo $_smarty_tpl->tpl_vars['v']->value['c_views'];?>
 views <br> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_months']==0){?> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_days']==0){?> Added today <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_days'];?>
 days ago <?php }?><?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_months'];?>
 months ago<?php }?></div>
												</a>
											</div>
											<?php }?>
										<?php }} ?>
										</div>
										
										Most Reviewed
										<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('most_reviewed')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['i']%6==0){?>
											<?php if ($_smarty_tpl->tpl_vars['v']->value['i']>0){?>
											<?php }?>
										<div class="row border-bottom">
											<div class="col-md-3">
												<a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)">
												<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_thumb_url'];?>
">
												<div class="video-detail"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_title'];?>
</div>
												<div class="video-short">by - <b><?php echo $_smarty_tpl->tpl_vars['v']->value['company_name'];?>
</b> | <?php echo $_smarty_tpl->tpl_vars['v']->value['c_views'];?>
 views <br> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_months']==0){?> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_days']==0){?> Added today <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_days'];?>
 days ago <?php }?><?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_months'];?>
 months ago<?php }?></div>
												</a>
											</div>
					 	
											<?php }else{ ?>
											<div class="col-md-3">
												<a href="javascript:return_play_video(<?php echo $_smarty_tpl->tpl_vars['v']->value['c_id'];?>
)">
												<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['c_thumb_url'];?>
">
												<div class="video-detail"><?php echo $_smarty_tpl->tpl_vars['v']->value['c_title'];?>
</div>
												<div class="video-short">by - <b><?php echo $_smarty_tpl->tpl_vars['v']->value['company_name'];?>
</b> | <?php echo $_smarty_tpl->tpl_vars['v']->value['c_views'];?>
 views <br> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_months']==0){?> <?php if ($_smarty_tpl->tpl_vars['v']->value['diff_days']==0){?> Added today <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_days'];?>
 days ago <?php }?><?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['v']->value['diff_months'];?>
 months ago<?php }?></div>
												</a>
											</div>
											<?php }?>
										<?php }} ?>
										</div>
								</div>
							</div>
						</div>
						
                                        </div>
						<!--
						<table class="table table-bordered"> 
							<tbody>	
								<tr class="">
									<td class="col-xs-12 col-sm-12 col-md-12">
										<img class="img-responsive full-width" src="./images/dashboard/graph2.png"></img>
										<img class="img-responsive full-width" src="./images/dashboard/face1.png"></img> 
									</td>
								</tr>
							</tbody>
						</table>
						-->
										
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
	
<input type="text" id="rated" value="1" />
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.diagram.js"></script>
<script src="js/circle-progress.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

<script type="text/javascript">

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

    // The response object is returned with a status field that lets the

    // app know the current login status of the person.

    // Full docs on the response object can be found in the documentation

    // for FB.getLoginStatus().

    if (response.status === 'connected') {

      // Logged into your app and Facebook.

      testAPI();

    } else if (response.status === 'not_authorized') {

      // The person is logged into Facebook, but not your app.

     //// document.getElementById('status').innerHTML = 'Please log ' +

      ///  'into this app.';

    } else {

      // The person is not logged into Facebook, so we're not sure if

      // they are logged into this app or not.

     /// document.getElementById('status').innerHTML = 'Please log ' +

      ///  'into Facebook.';

    }

}



  // This function is called when someone finishes with the Login

  // Button.  See the onlogin handler attached to it in the sample

  // code below.

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



  	// Now that we've initialized the JavaScript SDK, we call 

  	// FB.getLoginStatus().  This function gets the state of the

  	// person visiting this page and can return one of three states to

  	// the callback you provide.  They can be:

  	//

  	// 1. Logged into your app ('connected')

  	// 2. Logged into Facebook, but not your app ('not_authorized')

  	// 3. Not logged into Facebook and can't tell if they are logged into

  	//    your app or not.

  	//

  	// These three cases are handled in the callback function.



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

// Here we run a very simple test of the Graph API after login is

// successful.  See statusChangeCallback() for when this call is made.

function testAPI() {
	console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', function(response) {

		  

		  console.log(response);

		  var json = JSON.stringify(response);

		  jQuery.ajax({

			type: "POST",

			url:"fb_login.php",

			data: { "json":json},

			success: function(js){

					location.href='http://www.monetchannel.com/lmsin/watch_video.php'

					return false;

			},

				error: function(){

				alert("Please try again. Server have not sent response.");

			}

		});

    });
}

  

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
	
	    window.location.reload();
	
	    // Or uncomment the following line to redirect
	
	    //window.location = "http://ykyuen.wordpress.com";

  	});

}

</script>

<script type="text/javascript">
	
	$(function(){
		// 
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
		var ar_id = <?php echo $_smarty_tpl->getVariable('ar_id')->value;?>
;
		// heat map
		$.ajax({
			
			type: 'GET',
			url: "watch_video.php?act=get_heatmap_data&ar_id="+ar_id,
			dataType: 'json',
			success: function(res) {
				if(res)
				{
					var html="";
					$.each(res.emotions,function(key, val){
						var width=(val.duration/res.totalLength) * 100;
						console.log(JSON.stringify(val));
						html=html+'<div class="'+val.emotion+' emotion-inline" style="width:'+width+'%"></div>';
					});
					$(".emotion-container").html(html);
				}else {
					$(".emotion-container").html('');
				}
			},
			error: function (jqXHR,text_status,err_msg) {
				alert('ERROR : '+text_status+' '+err_msg);
			},
			
		});
		
		// get cumulative heat map data
		var c_id = '<?php echo $_smarty_tpl->getVariable('content')->value['c_id'];?>
';
		$.ajax({
			
			type: 'GET',
			url: "watch_video.php?act=get_all_heatmap_data&c_id="+c_id,
			dataType: 'json',
			success: function(res) {
				if(res)
				{
					var html="";
					$.each(res.emotions,function(key, val){
						var width=(val.duration/res.totalLength) * 100;
						console.log(JSON.stringify(val));
						html=html+'<div class="'+val.emotion+' emotion-inline" style="width:'+width+'%"></div>';
					});
					$(".allemotion-container").html(html);
				}else {
					$(".allemotion-container").html('');
				}
			},
			error: function (jqXHR,text_status,err_msg) {
				alert('ERROR : '+text_status+' '+err_msg);
			},
			
		});
		
	<!-- ******************************* Rate More Video ****************************** -->
		
		
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
	var userPoint = <?php echo $_smarty_tpl->getVariable('user_points')->value;?>
;
	var totalPoint = <?php echo $_smarty_tpl->getVariable('reward')->value['points'];?>
;
	var percentages = userPoint*100/totalPoint;
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
 <script type="text/javascript">
            var chart;

            var chartData = [
                [
                    {
                        "direction": "Happy",
                        "current_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['happy']['value']['current'];?>
,
                        "all_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['happy']['value']['all'];?>
,
                        "current_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['happy']['image_path']['current'];?>
",
                        "all_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['happy']['image_path']['all'];?>
"
                    },
                    {
                        "direction": "Sad",
                        "current_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['sad']['value']['current'];?>
,
                        "all_value":<?php echo $_smarty_tpl->getVariable('chart_data')->value['sad']['value']['all'];?>
,
                        "current_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['sad']['image_path']['current'];?>
",
                        "all_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['sad']['image_path']['all'];?>
"
                    },
                    {
                        "direction": "Angry",
                        "current_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['angry']['value']['current'];?>
,
                        "all_value":<?php echo $_smarty_tpl->getVariable('chart_data')->value['angry']['value']['all'];?>
,
                        "current_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['angry']['image_path']['current'];?>
",
                        "all_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['angry']['image_path']['all'];?>
"
                    },
                    {
                        "direction": "Disgusted",
                        "current_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['disgusted']['value']['current'];?>
,
                        "all_value":<?php echo $_smarty_tpl->getVariable('chart_data')->value['disgusted']['value']['all'];?>
,
                        "current_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['disgusted']['image_path']['current'];?>
",
                        "all_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['disgusted']['image_path']['all'];?>
"
                    },
                    {
                        "direction": "Neutral",
                        "current_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['neutral']['value']['current'];?>
,
                        "all_value":<?php echo $_smarty_tpl->getVariable('chart_data')->value['neutral']['value']['all'];?>
,
                        "current_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['neutral']['image_path']['current'];?>
",
                        "all_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['neutral']['image_path']['all'];?>
"
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['neutral']['ad_id'];?>
.jpg">
                    },
                    {
                        "direction": "Scared",
                        "current_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['scared']['value']['current'];?>
,
                        "all_value":<?php echo $_smarty_tpl->getVariable('chart_data')->value['scared']['value']['all'];?>
,
                        "current_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['scared']['image_path']['current'];?>
",
                        "all_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['scared']['image_path']['all'];?>
"
                    },
                    {
                        "direction": "Surprised",
                        "current_value": <?php echo $_smarty_tpl->getVariable('chart_data')->value['suprised']['value']['current'];?>
,
                        "all_value":<?php echo $_smarty_tpl->getVariable('chart_data')->value['suprised']['value']['all'];?>
,
                        "current_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['suprised']['image_path']['current'];?>
",
                        "all_img_src": "<?php echo $_smarty_tpl->getVariable('chart_data')->value['suprised']['image_path']['all'];?>
"
                    }
                ],
                [
                    
                ]
                
            ];


            AmCharts.ready(function () {
                // RADAR CHART
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = chartData[0];
                chart.categoryField = "direction";
                chart.startDuration = 1;
                
                //LEGEND
                var chartLegend = new AmCharts.AmLegend();
                chartLegend.data = [{ title:"You", color:"#FFCC00" }, { title:"Everyone", color:"#3016B0" } ]
                chart.addLegend(chartLegend, "legenddiv");
                        
                // TITLE
                chart.addTitle("Emotion Radar", 15);

                // VALUE AXIS
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridType = "circles";
                valueAxis.fillAlpha = 0.05;
                valueAxis.fillColor = "#000000";
                valueAxis.axisAlpha = 0.2;
                valueAxis.gridAlpha = 0;
                valueAxis.fontWeight = "bold";
                valueAxis.minimum = 0;
                valueAxis.maximum = 10;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var current_graph = new AmCharts.AmGraph();
                current_graph.lineColor = "#FFCC00";
                current_graph.fillAlphas = 0.4;
                current_graph.bullet = "round";
                current_graph.valueField = "current_value";
                current_graph.balloonText = "[[category]]: [[value]] Unit\n <img class='img-responsive img-thumbnail emotion-indicator' src=[[current_img_src]] alt='[[current_img_src]]'>";
                
                
                var all_graph = new AmCharts.AmGraph();
                all_graph.lineColor = "#3016B0";
                all_graph.fillAlphas = 0.4;
                all_graph.bullet = "round";
                all_graph.valueField = "all_value";
                all_graph.balloonText = "[[category]]: [[value]] Unit\n <img class='img-responsive img-thumbnail emotion-indicator' src=[[all_img_src]] alt='[[all_img_src]]'>";
                chart.addGraph(all_graph);
                chart.addGraph(current_graph);

                // GUIDES
                // blue fill
                var guide = new AmCharts.Guide();
                guide.angle = 225;
                guide.tickLength = 0;
                guide.toAngle = 315;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#f1f1f1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // red fill
                guide = new AmCharts.Guide();
                guide.angle = 45;
                guide.tickLength = 0;
                guide.toAngle = 135;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#f1f1f1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // WRITE                
                chart.write("chartdiv");
            });
        </script>

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
	
	
		
	</script>
	
	</body>
</html>