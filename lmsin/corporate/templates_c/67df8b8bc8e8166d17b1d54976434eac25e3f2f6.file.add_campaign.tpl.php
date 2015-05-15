<?php /* Smarty version Smarty-3.0.6, created on 2015-03-02 01:08:00
         compiled from "./templates/add_campaign.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80797428354f41a60715372-08939915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67df8b8bc8e8166d17b1d54976434eac25e3f2f6' => 
    array (
      0 => './templates/add_campaign.tpl',
      1 => 1425279609,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1424788258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80797428354f41a60715372-08939915',
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
        
    
<link rel="stylesheet" type="text/css" href="css/datepicker.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="js/choosen/chosen.css" rel="stylesheet" />
<link href="css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/add_campaign.js"></script>
<script src="js/choosen/chosen.jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>    <!-- using for validation purposes -->
<script type="text/javascript" src="js/jquery.multi-select"></script>
<script type="text/javascript">

var questionSetError = "";

function chk_all()
{
        var filteredUsers = $('#select_users').val();  
        var filteredGroups = $('#select_groups').val();
        if(document.getElementById('campaign_name').value=="" || document.getElementById('campaign_video').value==""  || document.getElementById('campaign_subject').value=="" || document.getElementById('campaign_startdate').value=="" || document.getElementById('campaign_enddate').value=="" )
        {
                $('#error_msg').html('Please fill all mandatory fields to continue.');			
                $('.alert').show();
                return false;
        }else if(filteredUsers==null){
                $('#error_msg').html('Please select atleast one group member from the users list.');			
                $('.alert').show();
                return false;
        }else{
                document.campaignform.submit();
        }
}

$(function(){
    $('.datepicker-input').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d',
	autoclose: true
    }); 
    
    $('#ug_selection_tab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
    $('#ug_selection_tab a[href="#select_users_tab"]').tab('show') // Select tab by name
    $(".chosen-select").chosen({ disable_search_threshold: 10 });
    //$('#wrapper .container-fluid').css({ 'height':'950px' });  // increasing the height, on runtime 
    
    // onclick event bind for questions chhosen
    $('.choose_questions').on('click', function(e){
        $('#question_error_label').remove();
        var category_selected = $(this).attr('data-category-val');
        var len = $('input[data-category-val="'+category_selected+'"]:checked').length;
        var errorHtml = "";
        if(len>2){
            e.preventDefault();
            questionSetError = "Maximum 2 questions are allowed to choose for each category";
            errorHtml = '<label id="question_error_label" class="error" for="campaign_name">Maximum 2 questions are allowed to choose for each category</label>';
            var $selectContainer = $(this).closest('#quest_check_list');
            $(errorHtml).insertAfter($selectContainer); 
        }
    });
    
    // custom validation method for date comparison
    $.validator.setDefaults({ ignore: ":hidden:not(select)" })
    jQuery.validator.addMethod("greaterthan", function (value, element, params) {
      //return this.optional(element) || value !== $(params.other).val();    
      if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
      }
      
      return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) > Number($(params).val()));
        
        //return this.optional(element) || value !== $(params.other).val();
    }, "End date should be greater than start date");
    
    /*
    jQuery.validator.addMethod("SelectLimit", function (value, element, params) {
       return Number(value.length) < Number(10);
    }, "Maximum 10 questions are allowed to select.");
    */
    
    $("form").validate({
         
            errorPlacement: function ($errorLabel, $element) {
                var elementId = $element.prop('id');
                if(elementId=="select_users" || elementId=="select_groups"){
                    var $selectContainer = $element.closest('.tab-content');
                    $selectContainer.append($errorLabel);
                }else if(elementId=="select_questions"){
                    var $selectContainer = $element.closest('.form-group').find('#helpBlock');
                    $errorLabel.insertAfter($selectContainer);                    
                }else if(elementId=="choose_questions"){
                    var $selectContainer = $element.closest('#quest_check_list');
                    $errorLabel.insertAfter($selectContainer);                    
                }else{
                    var $elementToInsertAfter = $element;
                    $errorLabel.insertAfter($elementToInsertAfter); 
                }                                         
            },

            submitHandler: function (form) {
                chk_all();
            }
        });
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
<h2>&nbsp;&nbsp;<?php echo $_smarty_tpl->getVariable('dataArray')->value['pageHeading'];?>
</h2>

<form method="POST" action="add_campaign.php" name="campaignform" enctype="multipart/form-data" class="col-md-12" >
        
    <div class="row">
        <div class="form-group col-md-6">
            <label for="campaign_name">Campaign Name</label>
            <input type="text" class="form-control input-lg"  name="campaign_name" id="campaign_name" data-msg-required="Please enter campaign name."
                   data-rule-required="true" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['campaign_name'];?>
" placeholder="Campaign Name" /> <br/> 
            
            <label for="campaign_video">Select Any Video</label>
            <select name="campaign_video" class="form-control input-lg" 
                    data-msg-required="Please select any video."
                    data-rule-required="true"
                    id="campaign_video"><?php echo $_smarty_tpl->getVariable('dataArray')->value['videoSelectOptions'];?>
</select> <br/>
                    
            <label for="campaign_description">Description</label>
            <textarea class="form-control input-lg" name="campaign_description" id="campaign_description" 
                      data-msg-maxlength="The description cannot be greater than 1000 characters."
                      data-rule-maxlength="1000"
                      placeholder="Campaign Description" rows="6"><?php echo $_smarty_tpl->getVariable('dataArray')->value['campaign_desc'];?>
</textarea>        
                    
        </div>
        <div class="form-group col-md-6">
            <div role="tabpanel">
                
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="ug_selection_tab">
                  <li role="presentation"><a href="#select_users_tab" aria-controls="select_users_tab" role="tab" data-toggle="tab">Users</a></li>
                  <li role="presentation"><a href="#select_groups_tab" aria-controls="select_groups_tab" role="tab" data-toggle="tab">Groups</a></li>
                </ul>
                
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="select_users_tab">
                        <label for="select_users">Select Campaign Users</label>
                        <select id="select_users" multiple name="select_users[]" class="form-control input-lg" 
                                data-msg-required="Please select any user."
                                data-rule-required="true"><?php echo $_smarty_tpl->getVariable('dataArray')->value['userSelectOptions'];?>
</select>
                    </div>     

                    <div role="tabpanel" class="tab-pane" id="select_groups_tab">
                        <label for="select_groups">Select Campaign Groups</label>
                        <select id="select_groups" multiple name="select_groups[]" 
                                class="form-control input-lg"><?php echo $_smarty_tpl->getVariable('dataArray')->value['groupSelectOptions'];?>
</select>
                    </div>        

                </div>
            </div>    
        </div>
        
    </div>
        
    
    <div class="row">      
        <div class="form-group col-md-6">
            <label for="select_groups">Campaign Subject</label>
            <input type="text" class="form-control input-lg" placeholder="Subject" name="campaign_subject" id="campaign_subject" 
                   data-msg-required="Please enter the subject for campaign."
                   data-rule-required="true"
                   value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['campaign_subject'];?>
"  />
        </div> 
        
        <div class="form-group col-md-6">                                                         
            <label class="cmp_status_label">       
              <input type="checkbox" name="campaign_status" id="campaign_status" value="1" <?php echo $_smarty_tpl->getVariable('dataArray')->value['campaign_status'];?>
  > Active
            </label>
            &nbsp;&nbsp;
            <label class="cmp_status_label">       
              <input type="checkbox" name="open_for_all" id="open_for_all" value="1" <?php echo $_smarty_tpl->getVariable('dataArray')->value['open_for_all'];?>
 > Open for all
            </label>
        </div>     
        
    </div>    
    
    <div class="row"> 
        <div class="form-group col-md-3">
            <label for="campaign_startdate">Select Start Date</label>
            <input type="text" class="form-control input-lg datepicker-input" placeholder="Start Date" name="campaign_startdate" 
                   data-msg-required="Please select start date." data-rule-required="true" readonly="readonly"
                   id="campaign_startdate" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['campaign_startdate'];?>
"  />
        </div>
        <div class="form-group col-md-3">
            <label for="campaign_enddate">Select End Date</label>
            <input type="text" class="form-control input-lg datepicker-input" placeholder="End Date" name="campaign_enddate" 
                   data-msg-required="Please select end date." 
                   data-rule-required="true" readonly="readonly"
                   data-rule-greaterthan="#campaign_startdate"
                   id="campaign_enddate" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['campaign_enddate'];?>
"  />
        </div>
        
        <div class="form-group col-md-6">
            <label for="select_groups">Select Questions</label>
            <select id="select_questions" multiple name="select_questions[]" 
                    data-rule-selectLimit="true" data-msg-required="Please select any category."
                    data-rule-required="true"
                    class="form-control input-lg chosen-select"><?php echo $_smarty_tpl->getVariable('dataArray')->value['questionSelectOptions'];?>
</select>
            <span id="helpBlock" class="help-block">Note: Use ctrl button to select multiple categories.</span>
            
            <!-- questions list will appear in this div -->
            <div id="quest_check_list">
                <?php echo $_smarty_tpl->getVariable('dataArray')->value['allSelectedSetQuestions'];?>

            </div>
        </div>      
            
    </div>   
            
    <div class="row">
            
    </div>            
      
   
    <div class="row">
    <div class="form-group text-center">
    <input type="submit" value="Submit" name="B1"  class="btn btn-default" id="buttongray" />
    <input type="button" value="Go back" name="B1"  class="btn btn-default" id="buttongray" onclick="javascript:location.href='campaign.php'" />
    </div>
    </div>
    
    <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['action'];?>
">
    <input type="hidden" name="campaign_id" id="campaign_id" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['campaign_id'];?>
">   
    <input type="hidden" name="selected_video_id" id="selected_video_id" value="<?php echo $_smarty_tpl->getVariable('dataArray')->value['selected_video_id'];?>
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