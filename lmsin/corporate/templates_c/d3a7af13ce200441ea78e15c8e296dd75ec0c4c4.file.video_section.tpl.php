<?php /* Smarty version Smarty-3.0.6, created on 2015-05-28 06:42:52
         compiled from ".\templates\video_section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273125461fbf7259331-38499595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3a7af13ce200441ea78e15c8e296dd75ec0c4c4' => 
    array (
      0 => '.\\templates\\video_section.tpl',
      1 => 1431684618,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1432536350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273125461fbf7259331-38499595',
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
<?php echo $_smarty_tpl->getVariable('js')->value;?>

function nb(a)
{
	this.document.frm.st_pos.value=a;
	this.document.frm.act.value="video_section";
	this.document.frm.submit();
}
function set_page()
{
	this.document.frm.act.value="video_section";
	this.document.frm.nrpp.value=document.getElementById('op_nrpp').value;
	this.document.frm.submit();
}
function play_video(video_id,start,end,c_id)
{
	var vlc_from='<?php echo $_smarty_tpl->getVariable('valence_from')->value;?>
';
	var vlc_to='<?php echo $_smarty_tpl->getVariable('valence_to')->value;?>
';
	//window.open ("analysis.php?act=play_video&video_id="+video_id+"&start_time="+start+"&end_time="+end+"&c_id="+c_id+"&vlc_from="+vlc_from+"&vlc_to="+vlc_to+"&time_segment="+this.document.frm.time_segment.value,"mywindow","menubar=0,status=1,toolbar=0, width=660,height=684");
	location.href="analysis.php?act=play_video&video_id="+video_id+"&start_time="+start+"&end_time="+end+"&c_id="+c_id+"&vlc_from="+vlc_from+"&vlc_to="+vlc_to+"&time_segment="+this.document.frm.time_segment.value;
}
function go_button()
{
	this.document.frm.st_pos.value=0;
}
</script> 
<?php if ($_smarty_tpl->getVariable('msg')->value){?>
<div class="alert alert-success margin-top"> <a class="close" data-dismiss="alert">×</a> <?php echo $_smarty_tpl->getVariable('msg')->value;?>
 </div>
<?php }?>
<form name="frm" method="POST" action="analysis.php" onsubmit="return go_button()">
  <div class="row  margin-top">
    <div class="col-xs-3"> <img class="img-responsive" src="<?php echo $_COOKIE['CompanyLogoSmall'];?>
" /> 
    </div>
    
     <div class="col-md-9">Select Range:&nbsp;&nbsp;&nbsp; From
            <select name="valence_from" id="valence_from" style="width:100px;">
            <option value="-2">Select</option> 
             <option value="-1" <?php echo $_smarty_tpl->getVariable('valence_from_minuswhole1')->value;?>
>-1</option>
             <option value="-.9" <?php echo $_smarty_tpl->getVariable('valence_from_minus9')->value;?>
>-.9</option>
             <option value="-.8" <?php echo $_smarty_tpl->getVariable('valence_from_minus8')->value;?>
>-.8</option>
             <option value="-.7" <?php echo $_smarty_tpl->getVariable('valence_from_minus7')->value;?>
>-.7</option>
             <option value="-.6" <?php echo $_smarty_tpl->getVariable('valence_from_minus6')->value;?>
>-.6</option>
             <option value="-.5" <?php echo $_smarty_tpl->getVariable('valence_from_minus5')->value;?>
>-.5</option>
             <option value="-.4" <?php echo $_smarty_tpl->getVariable('valence_from_minus4')->value;?>
>-.4</option>
             <option value="-.3" <?php echo $_smarty_tpl->getVariable('valence_from_minus3')->value;?>
>-.3</option>
             <option value="-.2" <?php echo $_smarty_tpl->getVariable('valence_from_minus2')->value;?>
>-.2</option>
             <option value="-.1" <?php echo $_smarty_tpl->getVariable('valence_from_minus1')->value;?>
>-.1</option>
             <option value="0" <?php echo $_smarty_tpl->getVariable('valence_from_0')->value;?>
>0</option>
             <option value=".1" <?php echo $_smarty_tpl->getVariable('valence_from_plus1')->value;?>
>.1</option>
             <option value=".2" <?php echo $_smarty_tpl->getVariable('valence_from_plus2')->value;?>
>.2</option>
             <option value=".3" <?php echo $_smarty_tpl->getVariable('valence_from_plus3')->value;?>
>.3</option>
             <option value=".4" <?php echo $_smarty_tpl->getVariable('valence_from_plus4')->value;?>
>.4</option>
             <option value=".5" <?php echo $_smarty_tpl->getVariable('valence_from_plus5')->value;?>
>.5</option>
             <option value=".6" <?php echo $_smarty_tpl->getVariable('valence_from_plus6')->value;?>
>.6</option>
             <option value=".7" <?php echo $_smarty_tpl->getVariable('valence_from_plus7')->value;?>
>.7</option>
             <option value=".8" <?php echo $_smarty_tpl->getVariable('valence_from_plus8')->value;?>
>.8</option>
             <option value=".9" <?php echo $_smarty_tpl->getVariable('valence_from_plus9')->value;?>
>.9</option>
             <option value="1" <?php echo $_smarty_tpl->getVariable('valence_from_1')->value;?>
>1</option>
            </select>&nbsp;&nbsp; To:
            <select name="valence_to" id="valence_to" style="width:100px;">
             <option value="-2">Select</option> 
             <option value="-1" <?php echo $_smarty_tpl->getVariable('valence_to_minuswhole1')->value;?>
>-1</option>
             <option value="-.9" <?php echo $_smarty_tpl->getVariable('valence_to_minus9')->value;?>
>-.9</option>
             <option value="-.8" <?php echo $_smarty_tpl->getVariable('valence_to_minus8')->value;?>
>-.8</option>
             <option value="-.7" <?php echo $_smarty_tpl->getVariable('valence_to_minus7')->value;?>
>-.7</option>
             <option value="-.6" <?php echo $_smarty_tpl->getVariable('valence_to_minus6')->value;?>
>-.6</option>
             <option value="-.5" <?php echo $_smarty_tpl->getVariable('valence_to_minus5')->value;?>
>-.5</option>
             <option value="-.4" <?php echo $_smarty_tpl->getVariable('valence_to_minus4')->value;?>
>-.4</option>
             <option value="-.3" <?php echo $_smarty_tpl->getVariable('valence_to_minus3')->value;?>
>-.3</option>
             <option value="-.2" <?php echo $_smarty_tpl->getVariable('valence_to_minus2')->value;?>
>-.2</option>
             <option value="-.1" <?php echo $_smarty_tpl->getVariable('valence_to_minus1')->value;?>
>-.1</option>
             <option value="0" <?php echo $_smarty_tpl->getVariable('valence_to_0')->value;?>
>0</option>
             <option value=".1" <?php echo $_smarty_tpl->getVariable('valence_to_plus1')->value;?>
>.1</option>
             <option value=".2" <?php echo $_smarty_tpl->getVariable('valence_to_plus2')->value;?>
>.2</option>
             <option value=".3" <?php echo $_smarty_tpl->getVariable('valence_to_plus3')->value;?>
>.3</option>
             <option value=".4" <?php echo $_smarty_tpl->getVariable('valence_to_plus4')->value;?>
>.4</option>
             <option value=".5" <?php echo $_smarty_tpl->getVariable('valence_to_plus5')->value;?>
>.5</option>
             <option value=".6" <?php echo $_smarty_tpl->getVariable('valence_to_plus6')->value;?>
>.6</option>
             <option value=".7" <?php echo $_smarty_tpl->getVariable('valence_to_plus7')->value;?>
>.7</option>
             <option value=".8" <?php echo $_smarty_tpl->getVariable('valence_to_plus8')->value;?>
>.8</option>
             <option value=".9" <?php echo $_smarty_tpl->getVariable('valence_to_plus9')->value;?>
>.9</option>
             <option value="1" <?php echo $_smarty_tpl->getVariable('valence_to_1')->value;?>
>1</option>
            </select>&nbsp;&nbsp;&nbsp;<!--Time Segment: --><input type="hidden" name="time_segment" value="<?php echo $_smarty_tpl->getVariable('time_segment')->value;?>
" size="3" />&nbsp;&nbsp;&nbsp;<input id="buttongray" class="mybutton" type="submit" name="go"  value="  GO  " /></div>
   
  </div>
  <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered" width="100%">
        <thead>
          <tr>
            <th>Video Title</th>
            <th>Time Slices</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
        <tr>
          <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align"><?php echo $_smarty_tpl->tpl_vars['record']->value['c_title'];?>
</td>
          <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align"><?php echo $_smarty_tpl->tpl_vars['record']->value['time_slice'];?>
</td>
          <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align"><a href="javascript:play_video('<?php echo $_smarty_tpl->tpl_vars['record']->value['video_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['start_time'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['end_time'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['c_id'];?>
')">PLAY</a></td>
        </tr>
        <?php }} ?>
      </table>
      <table class="table">
        <tr>
          <td> Show
            <select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
                    <?php echo $_smarty_tpl->getVariable('op_nrpp')->value;?>

            </select>
            records per page </td>
          <td>&nbsp;</td>
          <td class="text-right"> <?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
 </td>
        </tr>
      </table>
    </div>
  </div>
  <?php }else{ ?> <br />
  <div class="text-center alert alert-info">Your current video section list is empty</div>
  <?php }?>
  <input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
  <input type="hidden" name="act"  value="video_section">
  <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
  <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
  <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
</form>

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
