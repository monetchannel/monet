<?php /* Smarty version Smarty-3.0.6, created on 2014-11-26 05:33:15
         compiled from ".\templates\generate_code.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206645445e721221557-85088420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4084be003d5b9895fc3545aa27a429266f770cf2' => 
    array (
      0 => '.\\templates\\generate_code.tpl',
      1 => 1411020736,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1415957621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206645445e721221557-85088420',
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
         
<div class="row  margin-top">
				<div class="col-xs-3">
					 <img class="img-responsive" src="<?php echo $_COOKIE['CompanyLogoSmall'];?>
" />
				</div>
               
             
</div>   

 <div class="col-md-10 margin-top" style="border:0px solid #F00">
 Video <strong>"<?php echo $_smarty_tpl->getVariable('video_title')->value;?>
"</strong> rated by <strong>"<?php echo $_smarty_tpl->getVariable('user_name')->value;?>
"</strong> on <strong><?php echo $_smarty_tpl->getVariable('cf_date')->value;?>
</strong> &nbsp;&nbsp;<button id="back" class="btn-xm btn-info" onClick="goback('video.php?act=video_analysis')" >Back</button>
</div>   
<br />
<br />
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
/js/jquery.js"></script>
<link href="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/src/nv.d3.css" rel="stylesheet" type="text/css">
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/lib/d3.v3.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/nv.d3.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/src/utils.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/src/models/legend.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/src/models/axis.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/src/models/scatter.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/src/models/line.js"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
nvd3/src/models/lineChart.js"></script>
		<script>
			var compare_url,time_compare,valence_compare,compare_user_name,show=0;
			var i=0;
			var o=0;
			var j=0;
			var content_id='<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
';
			var p=-1;
			var result;
			
			var neutral = [];
			var happy=[];
			var sad=[];
			var surprised = [];
			var angry = [];
			var scared = [];
			var disgusted = [];

			var neutral2 = [];
			var happy2=[];
			var sad2=[];
			var surprised2 = [];
			var angry2 = [];
			var scared2 = [];
			var disgusted2 = [];
			
			var emotions,emotions2;

			var disengage = [];
			var valence = [];
			var video_time = [];
			<?php $_smarty_tpl->tpl_vars['fname'] = new Smarty_variable(explode(" ",$_smarty_tpl->getVariable('user_name')->value), null, null);?>;
			var user = '<?php echo $_smarty_tpl->getVariable('fname')->value;?>
';
			var cf_id = '<?php echo $_smarty_tpl->getVariable('cf_id')->value;?>
';
			var time;
			var video_id= '<?php echo $_smarty_tpl->getVariable('video_id')->value;?>
';
		</script>
        <link rel="stylesheet" type="text/css" href="templates/video_graph.css">
	</head>
	<body >
	
		<div id="left" style="float:left;width:610px;padding-right:20px;border-right:1px solid #303030;">
			
			<div id="video" style="position:relative;z-index:0;padding:5px;margin:0;height:460px;width:100%;">
				<div id="player" style="z-index:1;"></div>
				<div id="canvas" width="80" height="60" style="position:absolute;right:15px;bottom:50px;z-index:2;display:none">
					<img src="" width="80" height="60" name="smiley" border="0"/>
				</div>
			</div>

			<div id="timeline" style="position:relative;width:100%;height:0;margin-top:25px">
			</div>

			<div id="timeline2" style="position:relative;width:100%;height:0;">
			</div>
			<?php if ($_smarty_tpl->getVariable('Heat_map')->value>0){?>
			<div id="gradient" style="width:100%;height:40px;margin-top:40px" title="Heat Map">
			</div>
            <?php }?>
		</div>
			
		<div id="right" style="margin-left:630px;padding-left:20px;width:620px;border-left:1px solid #303030;">
			
			<?php if ($_smarty_tpl->getVariable('valence')->value>0||$_smarty_tpl->getVariable('engagement')->value>0){?>
            <div class="svg_chart">
				<div class="desc">Engagement and Valence - Overall</div>
				<hr>
			    <div id="svg_chart4"  style="width:620px;height:200px;">
					<svg id="main_svg4" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>
			<hr/>
            <?php }?>
            
			<?php if ($_smarty_tpl->getVariable('microexpressions')->value){?>
			<div class="svg_chart">
				<div class="desc">Microexpressions ScatterChart - Overall</div>
				<hr>
			    <div id="svg_chart7"  style="width:620px;height:620px;">
					<svg id="main_svg7" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>
			<?php }?>
		
	    <span id="msg"></span>
		<iframe id="ifrm" name="ifrm" style="display:none; width:300px; height:300px"></iframe>
		<script type="text/javascript">
			var emotion_colors = ['179,26,0',
								  '255,51,0',
								  '255,0,0',
								  '0,255,51',
								  '102,51,0',
								  '179,77,0',
								  '255,255,0',
								  '255,128,0',
								  '179,153,0',
								  '255,179,0',
								  '51,51,128',
								  '128,77,128',
								  '0,51,255',
								  '153,0,51',
								  '204,204,204',
								  '51,51,51',
								  '153,26,26',
								  '77,51,26',
								  '153,153,26',
								  '153,77,26',
								  '255,102,0']
			function draw_gradient(emotions) {
				var str = '';
				for(var index=0;index<emotions.length;index++) {
					str+=',rgba('+emotion_colors[emotions[index][1]]+','+(1/(1+emotions[index][2])).toString()+') '+((emotions[index][0]/video_duration)*100).toString()+'%';
				}
				$('#gradient').css('background','-webkit-linear-gradient(left'+str+')');
				$('#gradient').css('background','-o-linear-gradient(right'+str+')');
				$('#gradient').css('background','-moz-linear-gradient(right'+str+')');
				$('#gradient').css('background','linear-gradient(to right'+str+')');
			}
		</script>
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