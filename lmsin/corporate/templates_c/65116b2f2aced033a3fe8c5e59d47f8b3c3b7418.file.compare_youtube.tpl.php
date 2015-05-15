<?php /* Smarty version Smarty-3.0.6, created on 2014-10-18 07:47:57
         compiled from ".\templates\compare_youtube.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172065441ff0d4413d0-88475435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65116b2f2aced033a3fe8c5e59d47f8b3c3b7418' => 
    array (
      0 => '.\\templates\\compare_youtube.tpl',
      1 => 1411020731,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1413269316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172065441ff0d4413d0-88475435',
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
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	

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
					<li class="sub-nav  <?php echo $_smarty_tpl->getVariable('active_analysis_tab')->value;?>
" >
						<a href="analysis.php"><img class="img-responsive" src="./images/arrow.png">Analysis Results</a>
					</li>
					<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_video_tab')->value;?>
" ><a href="analysis.php?act=video_section"><img class="img-responsive" src="./images/arrow.png">Video Section</a></li>
                    <li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_video_analysis_tab')->value;?>
" ><a href="video.php?act=video_analysis"><img class="img-responsive" src="./images/arrow.png">Video Analysis</a></li>
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
                <div class="col-xs-9 text-right">	
                    <button id="back" class="btn btn-info" onclick="goback('analysis.php')" >Back</button>
                    <div class="clear"></div>									
        </div>
             
</div>   

 <div class="col-md-10 margin-top" style="border:0px solid #F00"><strong>Video Title 1:</strong> <?php echo $_smarty_tpl->getVariable('c_title_1')->value;?>
<br />
 <?php if ($_smarty_tpl->getVariable('c_title_2')->value){?><strong>Video Title 2:</strong> <?php echo $_smarty_tpl->getVariable('c_title_2')->value;?>
 <?php }?><br />
 <?php if ($_smarty_tpl->getVariable('c_title_3')->value){?><strong>Video Title 3:</strong> <?php echo $_smarty_tpl->getVariable('c_title_3')->value;?>
</div> <?php }?>  <br />

  	<?php if ($_smarty_tpl->getVariable('total')->value>0){?> 
<script type="text/javascript" src="js/swfobject.js"></script>

	<script type="text/javascript">
var flashvars = {
  video_id:"<?php echo $_smarty_tpl->getVariable('video_id_1')->value;?>
",
  valence1:'<?php echo $_smarty_tpl->getVariable('valence_1')->value;?>
',
  time1:'<?php echo $_smarty_tpl->getVariable('time_1')->value;?>
',
  title1:'<?php echo $_smarty_tpl->getVariable('c_title_1')->value;?>
',
 video_id_two:"<?php echo $_smarty_tpl->getVariable('video_id_2')->value;?>
",
  valence2:'<?php echo $_smarty_tpl->getVariable('valence_2')->value;?>
',
  time2:'<?php echo $_smarty_tpl->getVariable('time_2')->value;?>
',
  title2:'<?php echo $_smarty_tpl->getVariable('c_title_2')->value;?>
',
  video_id_three:"<?php echo $_smarty_tpl->getVariable('video_id_3')->value;?>
", 
  valence3:'<?php echo $_smarty_tpl->getVariable('valence_3')->value;?>
',
  time3:'<?php echo $_smarty_tpl->getVariable('time_3')->value;?>
',  
  title3:'<?php echo $_smarty_tpl->getVariable('c_title_3')->value;?>
',
  neg_1:'<?php echo $_smarty_tpl->getVariable('neg_1')->value;?>
',
  pos_1:'<?php echo $_smarty_tpl->getVariable('pos_1')->value;?>
',
  neg_2:'<?php echo $_smarty_tpl->getVariable('neg_2')->value;?>
',
  pos_2:'<?php echo $_smarty_tpl->getVariable('pos_2')->value;?>
',
  neg_3:'<?php echo $_smarty_tpl->getVariable('neg_3')->value;?>
',
  pos_3:'<?php echo $_smarty_tpl->getVariable('pos_3')->value;?>
',
  neg_spike_1:'<?php echo $_smarty_tpl->getVariable('negative_spike_1')->value;?>
',
  pos_spike_1:'<?php echo $_smarty_tpl->getVariable('positive_spike_1')->value;?>
',
  neg_spike_2:'<?php echo $_smarty_tpl->getVariable('negative_spike_2')->value;?>
',
  pos_spike_2:'<?php echo $_smarty_tpl->getVariable('positive_spike_2')->value;?>
',
  neg_spike_3:'<?php echo $_smarty_tpl->getVariable('negative_spike_3')->value;?>
',
  pos_spike_3:'<?php echo $_smarty_tpl->getVariable('positive_spike_3')->value;?>
'

};

swfobject.embedSWF("compare_youtube.swf", "myContent", "1200", "900", "9.0.0", "expressInstall.swf",flashvars);
</script>
<?php }?>

    	<?php if ($_smarty_tpl->getVariable('total')->value>0){?>
		<div id="myContent">
			<h1>Alternative content</h1>
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
        <?php }else{ ?>
        <span id="msg">Record Not Found!</span>
		<?php }?>
<!--       Title:  <?php echo $_smarty_tpl->getVariable('c_title_1')->value;?>
 , Positive: <?php echo $_smarty_tpl->getVariable('c_tot_positive_1')->value;?>
 , Negative: <?php echo $_smarty_tpl->getVariable('c_tot_negative_1')->value;?>
 <br>
        Title:  <?php echo $_smarty_tpl->getVariable('c_title_2')->value;?>
 , Positive: <?php echo $_smarty_tpl->getVariable('c_tot_positive_2')->value;?>
 , Negative: <?php echo $_smarty_tpl->getVariable('c_tot_negative_2')->value;?>
 <br>
-->	

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