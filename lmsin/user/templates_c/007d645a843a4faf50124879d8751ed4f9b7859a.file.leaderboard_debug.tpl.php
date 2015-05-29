<?php /* Smarty version Smarty-3.0.6, created on 2015-05-26 13:10:07
         compiled from ".\templates\leaderboard_debug.tpl" */ ?>
<?php /*%%SmartyHeaderCode:554855504ad9dd97b5-03644501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '007d645a843a4faf50124879d8751ed4f9b7859a' => 
    array (
      0 => '.\\templates\\leaderboard_debug.tpl',
      1 => 1432616464,
      2 => 'file',
    ),
    'd60d58cb3f80dc8e9bfb970545d100fb7f9f8563' => 
    array (
      0 => '.\\templates\\video_list_header.tpl',
      1 => 1432637356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '554855504ad9dd97b5-03644501',
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
				  <li><a href="account_info.php"><?php echo $_COOKIE['UserName'];?>
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
								<img class="img-responsive halloffame" src="./images/rewards.png" style="opacity:0;"> Cumulative Rewards
								</a>
							</li>
							
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_redeem_reward_tab')->value;?>
" >
								<a href="index.php?act=redeem_reward">
								<img class="img-responsive halloffame" src="./images/rewards.png" style="opacity:0;">&nbspRedeem Rewards
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
								<img class="img-responsive halloffame" src="./images/fame.png" style="opacity:0;">Current User
								</a>
							</li>
							
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_overall_user_tab')->value;?>
" >
							<a href="hall_of_fame.php?act=all_users">
								<img class="img-responsive halloffame" src="./images/fame.png" style="opacity:0;">Overall User
								</a>
							</li>
						</ul>
					</li>
					
					<li class="<?php echo $_smarty_tpl->getVariable('campaigns_tab')->value;?>
">
						<a href="campaigns.php">
							<img class="img-responsive campaing" src="./images/campain.png"></img>
							<span style="font-size:16px;">Campaigns</span>&nbsp&nbsp<span class="notif"><?php echo $_smarty_tpl->getVariable('cmp_count')->value['total'];?>
</span>
						</a>
					</li>
					
					<li class="<?php echo $_smarty_tpl->getVariable('stats_tab')->value;?>
">
						<a href="leaderboard.php">
							<img class="img-responsive campaing" src="./images/stats.png"></img>
							<span style="font-size:16px;">Statistics</span><span class="badge"></span>
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
						
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="radar.js" type="text/javascript"></script>
        <script type="text/javascript">
            var chart;

            var chartData = [
                {
                    "direction": "Happy",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['happy']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['happy']['image_path'];?>
"
                },
                {
                    "direction": "Sad",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['sad']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['sad']['image_path'];?>
"
                },
                {
                    "direction": "Angry",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['angry']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['angry']['image_path'];?>
"
                },
                {
                    "direction": "Disgusted",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['disgusted']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['disgusted']['image_path'];?>
"
                },
                {
                    "direction": "Neutral",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['neutral']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['neutral']['image_path'];?>
" 
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['neutral']['ad_id'];?>
.jpg">
                },
                {
                    "direction": "Scared",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['scared']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['scared']['image_path'];?>
"
                },
               
                {
                    "direction": "Surprised",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['suprised']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['suprised']['image_path'];?>
"
                }
            ];


            AmCharts.ready(function () {
                // RADAR CHART
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = chartData;
                chart.categoryField = "direction";
                chart.startDuration = 1;

                // TITLE
                chart.addTitle("Emotion Radar", 15);

                // VALUE AXIS
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridType = "circles";
                valueAxis.fillAlpha = 0.05;
                valueAxis.fillColor = "#614197";
                valueAxis.axisAlpha = 0.2;
                valueAxis.gridAlpha = 0;
                valueAxis.fontWeight = "bold";
                valueAxis.minimum = 0;
                valueAxis.maximum = 10;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.lineColor = "#614197";
                graph.fillAlphas = 0.4;
                graph.bullet = "round";
                graph.valueField = "value";
                graph.balloonText = "[[category]]: [[value]] Unit\n <img class='img-responsive img-thumbnail emotion-indicator' src=[[img_src]] alt='[[img_src]]'>";
                chart.addGraph(graph);

                // GUIDES
                // blue fill
                var guide = new AmCharts.Guide();
                guide.angle = 225;
                guide.tickLength = 0;
                guide.toAngle = 315;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#F1F1F1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // red fill
                guide = new AmCharts.Guide();
                guide.angle = 45;
                guide.tickLength = 0;
                guide.toAngle = 135;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#F1F1F1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // WRITE                
                chart.write("radar");
            });
        </script>
        <style type="text/css">
            *{
                padding: 0px;
                margin: 0px;
            }
            #timeline{
                height:450px;
                width:800px;
                background:#f1f1f1;
                margin-left:10px;
                margin-top:10px;
				float:left;
				color:#333;
            }
            #radar{
                height:200px;
                width:265px;
                background:#f1f1f1;
                border:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
			   color:#f1f1f1;
            }
            #youtube{
                height:200px;
                width:340px;
               background:#f1f1f1;
                border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-top:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #rank{
                height:200px;
                width:190px;
               background:#f1f1f1;
                border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-top:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #reward{
                height:55%;
                width:35.5%;
               background:#f1f1f1;
                 border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-left:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #comments{
                height:55%;
                width:230px;
               background:#f1f1f1;
                border-bottom:1px solid #fff;
               border-right:1px solid #fff;
               
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #demo{
                height:55%;
                width:280px;
             background:#f1f1f1;
                border-bottom:1px solid #fff;
               border-right:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
            #img-div{
                float:right;
				margin-bottom:5px;
            }
			#ranking
			{
			background:#f1f1f1;
			height:290px;
			width:190px;
			color:#333;
			text-align:center;
			margin-left:10px;
			float:left;
			}
			#head
			{
			background:#614197;
			height:30px;
			width:190px;
			color:#f1f1f1;
			font-size:16px;
			float:left;
			border:1px solid#614197;
			}
			#head_tab
			{
			background:#ccc;
			height:25px;
			float:left;
			color:#000;
			font-size:16px;
			width:100%;
			margin-top:30px;
			text-align:center;
			}
			#command
			{
			background:#614197;
			height:25px;
			float:left;
			color:#f1f1f1;
			font-size:16px;
			width:100%;
			margin-top:0px;
			text-align:center;
			display:block;
			z-index:0.9;
			}
            </style>
			
			
    </head>
    <body>
	<div id="ranking">
	<div id="head"><b>Rewards Leader Cap</b></div><table style="background:#f1f1f1;color:#333;">
            <tr style="border-color:#000000;border:10px;">
                <td style="align:left;">
                    <div style="overflow:auto;">
                        <div style="float:left;">
                            <h3><b><?php echo $_smarty_tpl->getVariable('data')->value[0]['points'];?>
</b></h3>
                            <h5>POINTS</h5>
                            <p><?php echo $_smarty_tpl->getVariable('data')->value[0]['rank'];?>
. <?php echo $_smarty_tpl->getVariable('data')->value[0]['name'];?>
</p>
                        </div>
                        <div style="float:left;padding-left:5px;">
                            <img src="<?php echo $_smarty_tpl->getVariable('data')->value[0]['profile_img'];?>
" alt="<?php echo $_smarty_tpl->getVariable('data')->value[0]['profile_img'];?>
" style="vertical-align:middle;width:7.5em;height:7.5em;border:1px solid #614197;"/>
                        </div>
                    </div>
                </td>
            </tr>
			<tr>
            
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, null);?>
            <?php while ($_smarty_tpl->getVariable('i')->value<5){?>
                    <td><p style="float:left;"><?php echo $_smarty_tpl->getVariable('data')->value[$_smarty_tpl->getVariable('i')->value]['rank'];?>
. <?php echo $_smarty_tpl->getVariable('data')->value[$_smarty_tpl->getVariable('i')->value]['name'];?>
</p><p style="float:right;"><?php echo $_smarty_tpl->getVariable('data')->value[$_smarty_tpl->getVariable('i')->value]['points'];?>
</p></td>
					
                </tr>
                <?php echo $_smarty_tpl->getVariable('i')->value++;?>

            <?php }?>
        </table>
		</div>
		<div id="ranking"><div id="head"><b>Rating Leader Cap</b></div>
		</div>
		<div id="ranking"><div id="head">Leader Cap</div>
		</div>
		<div id="ranking"><div id="head">Leader Cap</div>
		</div>
	
      <div id="head_tab">TimeLIne
	  </div>
        <div id="timeline">
            <div id="rank"><div id="command">About ME</div>
                <h1>You</h1>
                <div id="stats">
				  <div id="img-div">
                    <img src="<?php echo $_smarty_tpl->getVariable('user_data')->value['profile_image'];?>
" width="80" height="80" style="vertical-align:middle;width:7.5em;height:7.5em;border:1px solid #614197;"/>
                </div>
                    <p>Rank: <?php echo $_smarty_tpl->getVariable('user_data')->value['rank'];?>
</p>
                    <p>Points: <?php echo $_smarty_tpl->getVariable('user_data')->value['points'];?>
</p>
                </div>
              
            </div>
            <div id="youtube"><div id="command">Last Watched Video Ad</div>
              <iframe width="340" height="172.5" src="<?php echo $_smarty_tpl->getVariable('cf_data')->value['c_url'];?>
">
              </iframe>  
            </div>
            <div id="radar" style="background-color:#ececec;"><div id="command">Your Last Radar</div>
                
            </div>
            <div id="comments"><div id="command">Last Comment</div>
</br>
               <p>&nbspYou: <?php echo $_smarty_tpl->getVariable('cf_data')->value['comment'];?>
</p>

            </div>
         
            <div id="demo"><div id="command">Top 5 Ratings</div>
                <table border="1">
                  <!-- Table goes in the document BODY -->
<table class="hovertable">
<tr>
	<th>User</th><th>Rating</th>
</tr>
 <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rating_data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
?>
                        <tr <?php if ($_smarty_tpl->tpl_vars['row']->value['user_id']==$_smarty_tpl->getVariable('user')->value['id']){?>bgcolor="#000"<?php }?>>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['rating'];?>
</td>
                        </tr>
                    <?php }} ?>

</table>
            </div>
			   <div id="reward"><div id="command">Last Redemption</div>
                <h2>Your Latest Redemption</h2>
                
                <p><?php echo $_smarty_tpl->getVariable('latest_reward')->value['subtitle'];?>
</p>
                <img src="<?php echo $_smarty_tpl->getVariable('latest_reward')->value['image'];?>
" width="80" height="80"/>
                <p>Redeemed for <?php echo $_smarty_tpl->getVariable('latest_reward')->value['points'];?>
 points.</p>
            </div>
        </div>
       <!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#000;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
	width:100%;
}
table.hovertable th {
	background-color:#614197;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	 background: f1f1f1;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>

        
    </body>
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
		var ar_id = "5";
		// heat map
		$.ajax({
			
			type: 'GET',
			url: "leaderboard.php?act=get_heatmap_data&ar_id="+ar_id,
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
		var c_id = '<?php echo $_smarty_tpl->getVariable('cf_data')->value['c_id'];?>
';
		$.ajax({
			
			type: 'GET',
			url: "leaderboard.php?act=get_all_heatmap_data&c_id="+c_id,
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
			
		});});
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