<?php /* Smarty version Smarty-3.0.6, created on 2015-02-27 03:48:23
         compiled from "./templates/add_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3197699154e8515758ccb4-31933099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55e6fb3a35cc1d9bc57495bc43893fcf73162514' => 
    array (
      0 => './templates/add_group.tpl',
      1 => 1424511310,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1424788258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3197699154e8515758ccb4-31933099',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include '/home/content/79/8486879/html/smarty/libs/plugins/modifier.capitalize.php';
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
        
    
<link rel="stylesheet" type="text/css" href="js/choosen/chosen.css" rel="stylesheet" />
<script src="js/choosen/chosen.jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>    <!-- using for validation purposes -->
<script src="js/add_group.js"></script>
<script type="text/javascript">

$(function(){   
    $.validator.setDefaults({ ignore: ":hidden:not(select)" })   
    $("form").validate({       
            errorPlacement: function ($errorLabel, $element) {
                var elementId = $element.prop('id');
                if(elementId=="select_users"){
                    var $selectContainer = $element.closest('.form-group').find('#helpBlock');
                    $errorLabel.insertAfter($selectContainer);                    
                }else{
                    var $elementToInsertAfter = $element;
                    $errorLabel.insertAfter($elementToInsertAfter);                             
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        
    $(".chosen-select").chosen({ disable_search_threshold: 10 });    
})
</script>

<div class="alert alert-warning" style="display:none; margin-top:20px; padding-top:20px">  
  <a class="close" data-dismiss="alert">×</a>  
  <span id="error_msg"></span>  
</div>  

<?php if ($_smarty_tpl->getVariable('dataArray')->value['success']){?>
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  <?php echo $_smarty_tpl->getVariable('dataArray')->value['success'];?>
  
</div>  
<?php }?>

<?php if ($_smarty_tpl->getVariable('dataArray')->value['updationStatus']){?>
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  <?php echo $_smarty_tpl->getVariable('dataArray')->value['updationStatus'];?>
  
</div>  
<?php }?>

<div class="row  margin-top">
<div class="col-xs-3">
<img class="img-responsive" src="<?php echo $_COOKIE['CompanyLogoSmall'];?>
" />
</div>
</div>                

<div class="wrapper">


<form method="POST" action="add_group.php" name="campaignform" enctype="multipart/form-data" class="col-md-12" >
    
    <div class="row">
        <div class="col-md-3"><h2>&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('dataArray')->value['pageHeading'];?>
</h2></div>
        <div class="col-md-3" style="text-align:right;">
            <a id="enable_editing" href="javascript:void(0)">Click here to edit</a>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control input-lg"  name="group_name" id="group_name" 
                   data-msg-required="Please enter group name."
                   data-rule-required="true" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['g_name'];?>
" placeholder="Group Name" /> <br/>   
            
        </div>
                   
        <input type="hidden" class="form-control input-lg"  name="group_company" id="group_company" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['g_company_id'];?>
" />               
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">            
            <input type="text" class="form-control input-lg" placeholder="Subject" name="group_subject" id="group_subject" 
                   data-msg-required="Please enter the subject for group."
                   data-rule-required="true"
                   value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['g_subject'];?>
"  />
        </div>    
    </div>
        
    
    <div class="row">
        <div class="form-group col-md-6">
            <textarea class="form-control input-lg" name="group_description" id="group_description" 
                      data-msg-required="Please enter some description for group."
                      data-msg-maxlength="The description cannot be greater than 1000 characters."
                      data-msg-minlength="Please enter atleast 10 characters for description"
                      data-rule-maxlength="1000" data-rule-minlength="10"
                      data-rule-required="true"
                      placeholder="Group Description" rows="6"><?php echo $_smarty_tpl->getVariable('dataArray')->value['g_desc'];?>
</textarea>
        </div>                      
    </div>  
        
     <div class="row">
        <div class="form-group col-md-2">
            <label for="select_users">Select Age Range</label>
            
            <select id="select_agegroup1" name="select_agegroup1" class="form-control input-lg chosen-select" ><?php echo $_smarty_tpl->getVariable('dataArray')->value['ageSelectOptions'];?>
</select> 
            &nbsp; - &nbsp;    
            <select id="select_agegroup2" name="select_agegroup2" class="form-control input-lg chosen-select" ><?php echo $_smarty_tpl->getVariable('dataArray')->value['ageSelectOptions'];?>
</select>   
        </div>       

        <div class="form-group col-md-2">
            <label for="select_users">Choose Sex</label>
            <select id="select_sex" name="select_sex" class="form-control input-lg chosen-select" >
                <option value="">--Sex--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>   
        </div>
        <div class="form-group col-md-2">
            <label for="select_country">Choose Country</label>
            <select id="select_country" name="select_country" class="form-control input-lg chosen-select" >
                <option value="">--Country--</option><?php echo $_smarty_tpl->getVariable('dataArray')->value['countrySelectOptions'];?>
</select>   
            <label for="select_state">Choose State</label> 
            <select id="select_state" name="select_state" class="form-control input-lg chosen-select">
                <option value="">--State--</option>
            </select>
        </div>
    </div>       
        
    <div class="row">
        <div class="form-group col-md-6">
            <label for="select_users">Select Group Users</label>
            <select id="select_users" multiple name="select_users[]" class="form-control input-lg chosen-select" 
                    data-msg-required="Please select any user."
                    data-rule-required="true"><?php echo $_smarty_tpl->getVariable('dataArray')->value['userSelectOptions'];?>
</select>
            <span id="helpBlock" class="help-block">Note: Use ctrl button to select multiple users.</span>
        </div>
    </div>    
      
    <div class="row col-md-6">
        <div class="form-group text-center">
        <input type="submit" value="Submit" name="B1"  class="btn btn-default" id="buttongray" />
        <input type="button" value="Go back" name="B1"  class="btn btn-default" id="buttongray" onclick="javascript:location.href='groups.php'" />
        </div>
    </div>
    
    <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['action'];?>
">
    <input type="hidden" name="group_id" id="group_id" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['g_id'];?>
">
    <input type="hidden" name="group_id" id="demography_id" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['g_demography_id'];?>
">  
</form>

</div>

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
				if(topPos>50){
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
				if(topPos>50){
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