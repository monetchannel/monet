<?php /* Smarty version Smarty-3.0.6, created on 2015-05-27 12:27:05
         compiled from ".\templates\campaign_analysis.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3198555659bf92aaaa0-90283618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bd61c2128564679f852fbe297f56b43a8f55012' => 
    array (
      0 => '.\\templates\\campaign_analysis.tpl',
      1 => 1432722418,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1432536350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3198555659bf92aaaa0-90283618',
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
        var content_id='<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
';
        var user = '<?php echo $_smarty_tpl->getVariable('fname')->value;?>
';
        var cf_id = '<?php echo $_smarty_tpl->getVariable('cf_id')->value;?>
';
        var time;
        var video_id = '<?php echo $_smarty_tpl->getVariable('video_id')->value;?>
'; 
        var analysisDataArray = '<?php echo $_smarty_tpl->getVariable('valence_data_array')->value;?>
';
        var smileysCountArray = '<?php echo $_smarty_tpl->getVariable('smileys_count_array')->value;?>
';
        
        $('#wrapper .container-fluid').removeClass('top-margin');   
    </script> 
    
    <style>
        .dots > li{
           border-bottom: 2px solid grey;
           padding: 3px;
        }
        .glyphicon{
            top:16px
        }  
    </style>
   
    <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
corporate/js/campaign_charts.js"></script> 

		<div id="videoContainer" class="container-fluid " style="margin-top:80px;">
			<div class="row margin-top">
				<div class="col-xs-6 col-sm-6 col-md-6 row-right" style="padding: 15px;">                                       
                                        <div id="video" >
                                                <div id="player"></div>
                                        </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6" style="padding: 25px;">
					<div id="chart_div"></div>
				</div>	
			</div>			
		</div>
		<div id="bottomContainer" class="container-fluid">
                    
                        <?php if (in_array('valence',$_smarty_tpl->getVariable('filter_graph_array')->value)){?>
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<div class="analysis-graph-header">
					        Overall Emotion Variation
					</div>
                                    <div id="valence_chart" class="min_height"></div>
				</div>
				<div class="col-md-6">
					<div class="analysis-graph-header">
						Average Emotion and Motivation Variation
					</div>
					<div class="row margin-top">
						<div class="col-md-6" style="text-align: center;" title="Positive Valence">
							<div class="motivation-happy circle-graph"></div>
							<img class="img-responsive" src="images/face1.png" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="pos-valence-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-6" style="text-align: center;" title="Negative Valence">
							<div class="motivation-sad circle-graph"></div>
							<img class="img-responsive" src="images/face2.png" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="neg-valence-percent" class="smileys-caption"></div>
						</div>
					</div>
					
				</div>
			</div>
                        <?php }?>
                        
                        <?php if (in_array('attention',$_smarty_tpl->getVariable('filter_graph_array')->value)){?>
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<!--<img class="img-responsive" src="./images/graph2.png" style="margin: 0 auto;">-->
                                        <!--<text class="analysis-graph-header">Attention Variance</text>-->
                                        <div class="analysis-graph-header">
					        Engagement Variation
					</div>
                                        <div id="attention_chart" class="min_height"></div>
				</div>
				<div class="col-md-6">
					<div class="analysis-graph-header">
						Average Engagement Variation
					</div>
					<div class="row margin-top">
						<div class="col-md-6" style="text-align: center;" title="Average Engagement">
							<div class="attention-happy circle-graph"></div>
							<img class="img-responsive" src="images/darckbluebig.png"  width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="head-stillness-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-6" style="text-align: center;" title="Average Disengagement">
                                                        <div class="attention-sad circle-graph"></div>
							<img class="img-responsive" src="images/lightbluebig.png" width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="eye-stillness-percent" class="smileys-caption"></div>
                                                        
						</div>
					</div>
				</div>
			</div>
                        <?php }?>
                        
                        <?php if (in_array('emotion',$_smarty_tpl->getVariable('filter_graph_array')->value)){?>
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<div class="analysis-graph-header">
					        Meaning Variance
					</div>
                                        <div id="meaning_chart" class="min_height">
                                            <!--Here the meaning chart will display with the succession of the video -->
                                        </div>
				</div>
				<div class="col-md-6 circle-face">
					<div class="analysis-graph-header">
						Average Meaning Variation
					</div>
					<div class="row">
                                            <div class="col-md-1"></div>
                                                <div class="col-md-5" style="text-align: center;" title="Happy">
							<div class="meaning-happy-green circle-graph"></div>
							<img class="img-responsive" src="images/green_1.png"/>
                                                        <div id="happy-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-5" style="text-align: center;" title="Sad">
							<div class="meaning-sad-org circle-graph"></div>
							<img class="img-responsive" src="images/org.png"/>
                                                        <div id="sad-percent" class="smileys-caption"></div>
						</div>
					    <div class="col-md-1"></div>
					</div>
					<div class="row">
						<div class="col-md-4" style="text-align: center;" title="Disgusted">
							<div class="meaning-happy-red circle-graph"></div>
							<img class="img-responsive" src="images/disgusted.png" />
                                                        <div id="disgusted-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-4" style="text-align: center;" title="Neutral">
							<div class="meaning-happy-blk circle-graph"></div>
							<img class="img-responsive" src="images/blk.png"/>
                                                        <div id="neutral-percent" class="smileys-caption" ></div>
						</div>
						<div class="col-md-4" style="text-align: center;" title="Surprised">
							<div class="meaning-happy-blue circle-graph"></div>
							<img class="img-responsive" src="images/surprised.png" />
                                                        <div id="surprised-percent" class="smileys-caption"></div>
						</div>
					</div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                                <div class="col-md-5" style="text-align: center;" title="Angry">
							<div class="meaning-sad-purple circle-graph"></div>
							<img class="img-responsive" src="images/angry.png"/>
                                                        <div id="angry-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-5" style="text-align: center;" title="Scared">
							<div class="meaning-scared-darkgreen circle-graph"></div>
							<img class="img-responsive" src="images/scared.png"/>
                                                        <div id="scared-percent" class="smileys-caption"></div>
						</div>
					    <div class="col-md-1"></div>
					</div>
                                    
				</div>
			</div>
                        <?php }?>
                        
                        <?php if (in_array('heatmap',$_smarty_tpl->getVariable('filter_graph_array')->value)){?>
                        <div class="row row-top">
                            <div class="col-md-6 row-right" >
                                <div class="analysis-graph-header">
                                        Heat Map
                                </div>
                                <div id="heatmapview" title="Heat Map" style="min-height:200px;">
                                </div>
                                
                                <div id="timeline-section">
                                   <div class="timeline-steps" >
                                        <ul class="nav nav-tabs dots">
                                            <!-- timeline will display here -->
                                        </ul>
                                   </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="analysis-graph-header">
					Heat Map Color Codes
				</div>
                                <div class="row">
                                <ul class="pieID heatmap-legend">
                                    <li class="happy-item">
                                      <em>Happy</em>
                                      <span></span>
                                    </li>
                                    <li class="sad-item">
                                      <em>Sad</em>
                                      <span></span>
                                    </li>
                                    <li class="neutral-item">
                                      <em>Neutral</em>
                                      <span></span>
                                    </li>
                                    <li class="angry-item">
                                      <em>Angry</em>
                                      <span></span>
                                    </li>
                                    <li class="surprised-item">
                                      <em>Surprised</em>
                                      <span></span>
                                    </li>
                                    <li class="disgusted-item">
                                      <em>Disgusted</em>
                                      <span></span>
                                    </li>
                                    <li class="scared-item">
                                      <em>Scared</em>
                                      <span></span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>    
                        <?php }?>
                                              
                        <div class="row row-top">
				<div class="col-md-6 row-right" style="">
				    <div class="analysis-graph-header">
					        User Feedback Variation
				    </div>
                                    <div id="questions_chart" class="min_height">
                                        
                                    </div>
				</div>
				<div class="col-md-6">
			        </div>
                        </div>    
		</div> 
               
                <script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
corporate/js/highcharts/highcharts.js"></script>
                <script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
corporate/js/highcharts/data.js"></script> 
                <script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
corporate/js/highcharts/heatmap.js"></script> 
                <script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
corporate/js/highcharts/exporting.js"></script>                        
                <script type="text/javascript" src="templates/video_graph_play.js"></script>

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
