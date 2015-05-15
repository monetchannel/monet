<?php /* Smarty version Smarty-3.0.6, created on 2014-11-28 09:29:20
         compiled from ".\templates\video_analysis.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3073754783260852ac4-66168756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bac7ec611646f8844e2bb61269445d713b8dfcc5' => 
    array (
      0 => '.\\templates\\video_analysis.tpl',
      1 => 1417163331,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1415957621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3073754783260852ac4-66168756',
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
        

<?php if ($_smarty_tpl->getVariable('msg')->value){?>
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  <?php echo $_smarty_tpl->getVariable('msg')->value;?>
  
</div>  
<?php }?>

<form name="frm" method="POST" action="analysis.php" >
    <div class="row  margin-top">
        <div class="col-xs-4 col-sm-4 col-md-6">
            
            <img class="img-responsive" src="<?php echo $_COOKIE['CompanyLogoSmall'];?>
" />
           <!-- <img class="img-responsive" src="./images/pepsilogo.png">-->
            
        </div>   
    </div>
    
    <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>Video</th>
                        <th><a href="javascript: set_order('c_title','<?php echo $_smarty_tpl->getVariable('c_title_order')->value;?>
')" style="color:#FFF">Title</a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
?>
                    <tr>
                        <td class="field-label col-xs-2 col-sm-2 col-md-2 text-align"><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_thumb_url'];?>
" alt="125x125">
                        </td>
                        <td class="col-md-2  second-td">
                                <?php echo $_smarty_tpl->tpl_vars['video']->value['c_date'];?>
-Uploaded By </br>
                                <?php echo $_smarty_tpl->tpl_vars['video']->value['c_title'];?>
</br>
                                Feedback: <?php echo $_smarty_tpl->tpl_vars['video']->value['num_feedback'];?>

                        </td>
                        
                        <td class="col-md-5 third-td" >
                            <div class="container-fluid">
                                <div class="row  action pull-right">
                                <a href="#" >
                                <input type="checkbox" name="valence[]" id="Valence_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['video']->value['ar_id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" />
                                <div><label for="Valence_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">Valence</label></div>
                                </a>
                                
                                <a href="#">
                                <input type="checkbox" name="microexpressions[]" id="Microexpressions_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['video']->value['ar_id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" />
                                <div><label for="Microexpressions_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">Microexpressions</label></div>
                                </a>	
                                
                                <a href="#">
                                <input type="checkbox" name="engagement[]" id="Engagement_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['video']->value['ar_id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" />
                                <div><label for="Engagement_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">Engagement</label></div>
                                </a>
                                
                                <a href="#">
                                <input type="checkbox" name="AreaUG[]" id="AreaUG_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['video']->value['ar_id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" />
                                <div><label for="AreaUG_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">Area Under Graph</label></div>
                                </a>
	
                                <a href="#">
                                <input type="checkbox" name="Heat_map[]" id="Heat_map_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['video']->value['ar_id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" />
                                <div><label for="Heat_map_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">Heat Map</label></div>
                                </a>      
                                  <button class="btn btn-sm btn-default" onclick="javascript:return generate_code('<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
')"><strong>Generate</strong></button>
                                  <input type="hidden" name="vode_id[]" value="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
"  /> 
                               
                          </div>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
             </table>
             <div class="col-xs-2 margin-bottom">
              <button class="btn btn-sm btn-default" onclick="javascript:compare_video()"><strong> Compare Videos</strong></button> </div>
             <table class="table">
                <tr>
                    <td>
                    Show<select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
                    <?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>

                    </select>
                    records per page
                    </td>
                    <td>&nbsp;</td>
                    <td class="text-right">
                    <?php echo $_smarty_tpl->getVariable('nb_text')->value;?>

                    </td>
                </tr>
             </table>
        </div>
    </div>
    <?php }else{ ?>
    <br />
    <div class="text-center alert alert-info">Your current video Analysis list is empty.</div>
    <?php }?>

  <input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
  <input type="hidden" name="ser_key" id='ser_key' value="<?php echo $_smarty_tpl->getVariable('ser_key')->value;?>
">
  <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
  <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
  <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
  <input type="hidden" name="act" id="act" value="generate_code" />
  <input type="hidden" name="ad_ar_id" value="" />   
</form>
<script>
	function compare_video()
	{
		document.frm.act.value='compare_video_analysis'
		document.frm.submit();
	}

function generate_code(ar_id,className)
{
	var checkBoxes=document.getElementsByClassName(className);
	
	var booleanResult=false;
	for(var i=0;i<checkBoxes.length;i++){
		if(checkBoxes[i].checked){
			booleanResult=true;
			break;
		}
	}
	if(booleanResult==false)
	{
		alert("Please select at least one.")
		return false;
	}
	
	document.frm.ad_ar_id.value=ar_id;
	document.frm.submit();
}
</script>

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