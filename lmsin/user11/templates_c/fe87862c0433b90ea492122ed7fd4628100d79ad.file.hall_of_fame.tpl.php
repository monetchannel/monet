<?php /* Smarty version Smarty-3.0.6, created on 2015-05-05 08:11:13
         compiled from ".\templates\hall_of_fame.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2631055485f012edde0-62834787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe87862c0433b90ea492122ed7fd4628100d79ad' => 
    array (
      0 => '.\\templates\\hall_of_fame.tpl',
      1 => 1430804587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2631055485f012edde0-62834787',
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
        <title>Hall of Fame</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
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
        
        <link href="nvd3/src/nv.d3.css" rel="stylesheet" type="text/css">

        <script src="nvd3/lib/d3.v3.js"></script> 

        <script src="nvd3/nv.d3.js"></script> 

        <script src="nvd3/src/tooltip.js"></script> 

        <script src="nvd3/src/utils.js"></script> 

        <script src="nvd3/src/models/legend.js"></script> 

        <script src="nvd3/src/models/axis.js"></script> 

        <script src="nvd3/src/models/scatter.js"></script> 

        <script src="nvd3/src/models/line.js"></script> 

        <script src="nvd3/src/models/lineChart.js"></script> 

        <script src="js/new_record.js"></script> 

        <script src="js/bootstrap.js"></script> 

        <script src="js/cynets_modal.js"></script> 

        <script type="text/javascript" src="js/swfobject.js"></script> 
        <script type="text/javascript" src="js/mic.js"></script> 
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="radar.js" type="text/javascript"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
                
                 <script type="text/javascript">
            var chart;

            var chartData = [
                {
                    "direction": "Happy",
                    "value": <?php echo $_smarty_tpl->getVariable('images')->value['happy']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('images')->value['happy']['image_path'];?>
"
                },
                {
                    "direction": "Sad",
                    "value": <?php echo $_smarty_tpl->getVariable('images')->value['sad']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('images')->value['sad']['image_path'];?>
"
                },
                {
                    "direction": "Angry",
                    "value": <?php echo $_smarty_tpl->getVariable('images')->value['angry']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('images')->value['angry']['image_path'];?>
"
                },
                {
                    "direction": "Disgusted",
                    "value": <?php echo $_smarty_tpl->getVariable('images')->value['disgusted']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('images')->value['disgusted']['image_path'];?>
"
                },
                {
                    "direction": "Neutral",
                    "value": <?php echo $_smarty_tpl->getVariable('images')->value['neutral']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('images')->value['neutral']['image_path'];?>
" 
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['neutral']['ad_id'];?>
.jpg">
                },
                {
                    "direction": "Scared",
                    "value": <?php echo $_smarty_tpl->getVariable('images')->value['scared']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('images')->value['scared']['image_path'];?>
"
                },
               
                {
                    "direction": "Surprised",
                    "value": <?php echo $_smarty_tpl->getVariable('images')->value['suprised']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('images')->value['suprised']['image_path'];?>
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
                valueAxis.fillColor = "#000000";
                valueAxis.axisAlpha = 0.2;
                valueAxis.gridAlpha = 0;
                valueAxis.fontWeight = "bold";
                valueAxis.minimum = 0;
                valueAxis.maximum = 10;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.lineColor = "#FFCC00";
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
                guide.fillColor = "#0066CC";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // red fill
                guide = new AmCharts.Guide();
                guide.angle = 45;
                guide.tickLength = 0;
                guide.toAngle = 135;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#CC3333";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // WRITE                
                chart.write("chartdiv");
            });
        </script>
    </head>



    <body>

        <h1>Hall of Fame - <?php if ($_smarty_tpl->getVariable('scope')->value=="CURRENT"){?>You<?php }else{ ?>All<?php }?></h1>
<div id="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-5">
              <div style="padding-bottom:10px;"><a href="watch_video.php"><img class="img-responsive" src="./images/logo1.png"></a> 
                   <div class="top-title">
      <form method="get" action="" >
      <input type="hidden" name="filter" value="true">
       <label class="checkbox-inline">Search By:</label>
       <div class="top-select checkbox-inline">
        <select name="cat">
         <option value="">Category</option>
         <?php  $_smarty_tpl->tpl_vars['catv'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['catk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['catv']->key => $_smarty_tpl->tpl_vars['catv']->value){
 $_smarty_tpl->tpl_vars['catk']->value = $_smarty_tpl->tpl_vars['catv']->key;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['catv']->value['cat_id'];?>
" <?php echo $_smarty_tpl->tpl_vars['catv']->value['selected'];?>
><?php echo $_smarty_tpl->tpl_vars['catv']->value['cat_name'];?>
</option>
         <?php }} ?>
        </select>
       </div>
       <label class="checkbox-inline ">or</label>
       <div class="top-select checkbox-inline">
        <select name="brand">
         <option value="">Brand</option>
         <?php  $_smarty_tpl->tpl_vars['comv'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['comk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companies')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comv']->key => $_smarty_tpl->tpl_vars['comv']->value){
 $_smarty_tpl->tpl_vars['comk']->value = $_smarty_tpl->tpl_vars['comv']->key;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['comv']->value['company_id'];?>
" <?php echo $_smarty_tpl->tpl_vars['comv']->value['selected'];?>
><?php echo $_smarty_tpl->tpl_vars['comv']->value['company_name'];?>
</option>
         <?php }} ?>
        </select>
       </div>
       <!--<input type="button" name="submit" value="Search" class="search-btn"  />-->
       <button type="submit" class="search-btn"style="color:#fff">Search</button>
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
       </form>
      
      
				 
				  
	</div>
              </div>
            </div>
           </div>
             </div>
        </div>
<div id="wrapper">
			<div id="sidebar-wrapper" style="margin-top:-5px;">
				<ul class="sidebar-nav dashboard">
					<!--Include your navigation here-->
                                        <li>
                                        </li>
                                        <li>
						<div id="images">
							<?php if ($_smarty_tpl->getVariable('user_data')->value['up_fname']){?>
								<img class="img-responsive" src="<?php echo $_smarty_tpl->getVariable('userimage')->value;?>
"style="height:80px;" style="width:80px;"></img>
							<?php }else{ ?>
							<img class="img-responsive" src="./images/dashboard/user.jpg"style="height:60x;" style="width:60px;"></img>
							<?php }?>
                                                        <div id="name1">
                                                            <div class="profile-name"><b><?php echo $_COOKIE['UserName'];?>
</b></div>
                                                            
                                                            <div class="profile-address"><b><?php echo $_smarty_tpl->getVariable('user_data')->value['countries_name'];?>
</b></div>
						</div>
						</div>
                                                
					</li>
					
					
					<li   style="border-bottom:none;"padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('reward_tab')->value;?>
">
						<?php if ($_smarty_tpl->getVariable('reward_tab')->value==''){?>
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionfour">
							<img class="img-responsive rewards" src="./images/<?php if ($_smarty_tpl->getVariable('reward_tab')->value!=''){?>rewards_ov.png <?php }else{ ?>rewards.png<?php }?>"></img>
							Rewards
							</a>
						<?php }else{ ?>
							<a href="javascript:void(1)">
							<img class="img-responsive video" src="./images/rewards.png">Rewards</a></img>
						<?php }?>
						<ul id="accordionfour" class="panel-collapse collapse" style="background:#ececec; <?php if ($_smarty_tpl->getVariable('reward_tab')->value!=''){?>display:block <?php }?>">
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
					
					<li  style="border-bottom:none;"padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('fame_tab')->value;?>
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
						<ul id="accordionthree" class="panel-collapse collapse" style="background:#ececec; <?php if ($_smarty_tpl->getVariable('fame_tab')->value!=''){?>display:block <?php }?>">
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
" style="border-bottom:none;">
						<a href="campaigns.php">
							<img class="img-responsive campaing" src="./images/campaing.png"></img>
							<span style="font-size:16px;">Campaigns</span>&nbsp&nbsp&nbsp<span class="badge"><?php echo $_smarty_tpl->getVariable('cmp_count')->value['total'];?>
</span>
						</a>
					</li>
					
				</ul>
			</div>

<div class="container-fluid expression-container">
									
							<div class="row border-bottom col-row" style="padding-top:200px;">
								<?php if (isset($_smarty_tpl->getVariable('images',null,true,false)->value['neutral']['value'])){?>
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Neutral</span>
										<img class="img-responsive " src="images/dashboard/neutral.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="<?php echo $_smarty_tpl->getVariable('images')->value['neutral']['image_path'];?>
">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('images',null,true,false)->value['happy']['value'])){?>
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Happy</span>
										<img class="img-responsive " src="images/dashboard/happy.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="<?php echo $_smarty_tpl->getVariable('images')->value['happy']['image_path'];?>
">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('images',null,true,false)->value['sad']['value'])){?>
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Sad</span>
										<img class="img-responsive " src="images/dashboard/sad.png">
										<img class="img-responsive img-thumbnail emotion-indicator"style="width:100px;" src="<?php echo $_smarty_tpl->getVariable('images')->value['sad']['image_path'];?>
">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('images',null,true,false)->value['angry']['value'])){?>
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Angry</span>
										<img class="img-responsive " src="images/dashboard/angry.png">
										<img class="img-responsive img-thumbnail emotion-indicator"style="width:100px;" src="<?php echo $_smarty_tpl->getVariable('images')->value['angry']['image_path'];?>
">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('images',null,true,false)->value['surprised']['value'])){?>
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Surprised</span>
										<img class="img-responsive " src="images/dashboard/surprised.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="<?php echo $_smarty_tpl->getVariable('images')->value['surprised']['image_path'];?>
">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('images',null,true,false)->value['scared']['value'])){?>
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Scared</span>
										<img class="img-responsive " src="images/dashboard/scared.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="<?php echo $_smarty_tpl->getVariable('images')->value['scared']['image_path'];?>
">
									</a>
								</div>
								<?php }?>
								<?php if (isset($_smarty_tpl->getVariable('images',null,true,false)->value['disgusted']['value'])){?>
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Disgusted</span>
										<img class="img-responsive" src="images/dashboard/disgusted.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="<?php echo $_smarty_tpl->getVariable('images')->value['disgusted']['image_path'];?>
">
									</a>
								</div>
								<?php }?>
                                                                
							</div>
                                                        <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong><?php if ($_smarty_tpl->getVariable('scope')->value=="ALL"){?>Everyone's<?php }else{ ?>Your<?php }?> Emotion</strong></div></div>
                                                     <!--radar chart design --->
                                                    <div id="chartdiv" style="width:600px; height:400px;"></div>
                                                                

</html>