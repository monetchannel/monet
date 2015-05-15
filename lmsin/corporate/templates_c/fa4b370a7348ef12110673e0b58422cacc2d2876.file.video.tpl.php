<?php /* Smarty version Smarty-3.0.6, created on 2015-04-17 10:32:07
         compiled from ".\templates\video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1557654827c71bf8ee6-85359311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa4b370a7348ef12110673e0b58422cacc2d2876' => 
    array (
      0 => '.\\templates\\video.tpl',
      1 => 1425973767,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1425973777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1557654827c71bf8ee6-85359311',
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


function refresh_page()
{
	location.href=location.href;
}
//-------------------------------------- Play Video Section 
function win_play_video(data)
{
	cn_window_open('Video - '+data[1],data[0],true);
}

//-------------------------------------- Get Code Section 
function get_video_code(id)
{
	x_video_code(id,show_video_code);
}

function show_video_code(data)
{
	cn_window_open('Video Code - '+data[1],data[0],true,2);
}

//--------------------------INVITATION----------------------------------
function view_feedback(c_id)
{
	document.getElementById('orderby').value='';
	document.getElementById('order').value='';
	document.getElementById('st_pos').value='';
	x_view_feedback(c_id,show_feedback);
}
function show_feedback(data)
{
	cn_window_open('Feedback - '+data[1],data[0],true,1);
}
function show_feedback_short(data)
{
	document.getElementById('viewfeedback').innerHTML=data[0];
	if(data[3]=='rated')
		document.getElementById('rated').className='active';
	else
		document.getElementById('unrated').className='active';	
}

function rate(rate)
{
	var c_id=document.getElementById('c_id').value;
	var orderby=document.getElementById('orderby').value;
	var order=document.getElementById('order').value;
	var nrpp=document.getElementById('nrpp').value;
	var st_pos=document.getElementById('st_pos').value;
	
	x_view_feedback(c_id,rate,orderby,order,nrpp,st_pos,show_feedback_short);
}

function order(f,o)
{
	var c_id=document.getElementById('c_id').value;
	var rate=document.getElementById('rate').value;
	var nrpp=document.getElementById('nrpp').value;
	var st_pos=document.getElementById('st_pos').value;
	x_view_feedback(c_id,rate,f,o,nrpp,st_pos,show_feedback_short);
}
function page(nrpp)
{
	var c_id=document.getElementById('c_id').value;
	var rate=document.getElementById('rate').value;
	var orderby=document.getElementById('orderby').value;
	var order=document.getElementById('order').value;
	var st_pos=document.getElementById('st_pos').value;
	x_view_feedback(c_id,rate,orderby,order,nrpp,st_pos,show_feedback_short);
}
function pop_nb(st_pos)
{
	var c_id=document.getElementById('c_id').value;
	var rate=document.getElementById('rate').value;
	var orderby=document.getElementById('orderby').value;
	var order=document.getElementById('order').value;
	var nrpp=document.getElementById('nrpp').value;
	x_view_feedback(c_id,rate,orderby,order,nrpp,st_pos,show_feedback_short);
}

function setLink(url,video_type)
{
	win=cn_window_open("Video",'<iframe name="iframe" src="video.php?act=watch_video&url='+url+'&video_type='+video_type+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="400" width="500" style="padding:0px"></iframe>',1);
}

function setLinkSlide(ad_ar_id)
{
	win=cn_window_open("Slide Show",'<iframe name="iframe1" src="video.php?act=watch_slides&ad_ar_id='+ad_ar_id+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="400" width="500" style="padding:0px"></iframe>',1);	
}


</script>
<link href="css/datepicker.css" rel="stylesheet">
<script src="js/bootstrap-datepicker.js"></script>
<script>
<?php echo $_smarty_tpl->getVariable('js')->value;?>


function chk_all()
{
        var question_sets_selected = $('#set_id').val();
        var selected_questions = $('input[name="choose_questions[]"]:checked').map(function(){
                                   return $(this).val();
                                 });
        
        if(document.getElementById('youtube_video').checked==true && document.getElementById('c_url').value=="" || document.getElementById('c_date').value=="" || document.getElementById('cat_id').value=='-1')
	{
		$('#alert-msg').html('Please fill all mandatory fields to continue.');
		$('.alert').show();
		return false;
	}
        else if(question_sets_selected.length==0){
                $('#alert-msg').html('Please select any question set.');
		$('.alert').show();
		return false;
        }
        else if(selected_questions.length<2){
                $('#alert-msg').html('Please select atleast two questions.');
		$('.alert').show();
		return false;
        }
	else
	{
		document.videofrm.target="submitframe";
		document.videofrm.submit();               
	}
}
function video_del(id)
{
	video.del("","","","","","","","",id);
}
function set_content(msg)
{
	$('#myModal').modal('hide');
	//win.hide();
	video.view('',msg);
}
function set_order(f,o)
{
	video.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('ser_key').value,"","","");
}
function nb(a)
{
	document.getElementById('st_pos').value=a;
	video.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,document.getElementById('ser_key').value,"","","");
}
function set_page(nrpp)
{
	document.getElementById('nrpp').value=nrpp;
	video.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('ser_key').value,"","","");

}
function ser_by(ser_key)
{
	video.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,ser_key,"","","");
}
function do_you_wish(wish)
{
	if(wish==1)
	{
		document.getElementById('up_video').style.display='';
		document.getElementById('up_image').style.display='';
		document.getElementById('utube').style.display='none';
		document.getElementById('h_c_title').style.display='';
		document.getElementById('h_c_disc').style.display='';
	}
	else
	{
		document.getElementById('up_video').style.display='none';
		document.getElementById('up_image').style.display='none';
		document.getElementById('utube').style.display='';
		document.getElementById('h_c_title').style.display='none';
		document.getElementById('h_c_disc').style.display='none';
	}
}
function call_after_popup_open()
{
	$("#cat_id").multiselect({
		selectedList: 4
	});
}
	
	function get_date()
	{
		$('#c_date').datepicker({
		format: 'mm/dd/yyyy',
		startDate: '-3d',
		 autoclose: true
		})
	}

	
</script>
    
    <div id="video_data"></div>
    
<script>
	video= new cn_ajax("video","video_data");
	video.view("","","","","","","","","","");
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