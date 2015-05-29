<?php /* Smarty version Smarty-3.0.6, created on 2015-05-29 08:39:54
         compiled from ".\templates\advanced_search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8712556809baca9d39-66514270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27c9051b39e13aa64a5ad1a7d98874ccd3cb35dc' => 
    array (
      0 => '.\\templates\\advanced_search.tpl',
      1 => 1432881590,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1432536350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8712556809baca9d39-66514270',
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
        

<?php if ($_smarty_tpl->getVariable('msg')->value){?>
<div class="alert alert-success margin-top">
  
  <a class="close" data-dismiss="alert">
    ×
  </a>
  
  <?php echo $_smarty_tpl->getVariable('msg')->value;?>
  
</div>

<?php }?>

<div class="row  margin-top">
  <div class="col-xs-6 col-sm-6 col-md-12">
    <img class="img-responsive" src="<?php echo $_COOKIE['CompanyLogoSmall'];?>
" />
    <!--
<img class="img-responsive" src="./images/pepsilogo.png">
-->
          
          <div class="top-title">
            <form method="POST" action="advanced_search.php">
              <input type="hidden" name="filter" value="true">
              <label class="checkbox-inline">
                Search By:
              </label>
              <div class="top-select checkbox-inline">
                <select name="cat" id="cat">
                  <option value="">
                    Category
                  </option>
                  <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category_name')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
" <?php echo $_smarty_tpl->tpl_vars['cat']->value['selected'];?>
>
                    <?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>

                  </option>
                  <?php }} ?>
                </select>
              </div>
              <div class="top-select checkbox-inline">
                <select name="countries" id="countries">
                  <option value="">
                    Country
                  </option>
                  <?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('country_name')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['countries_id'];?>
" <?php echo $_smarty_tpl->tpl_vars['country']->value['selected'];?>
>
                    <?php echo $_smarty_tpl->tpl_vars['country']->value['countries_name'];?>

                  </option>
                  <?php }} ?>
                </select>
              </div>
              <div class="top-select checkbox-inline">
                <select name="gender"id="gender">
                  <option value="">
                    Gender
                  </option>
                  <?php  $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('gender')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['k']->key => $_smarty_tpl->tpl_vars['k']->value){
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value['key'];?>
" <?php echo $_smarty_tpl->tpl_vars['k']->value['selected'];?>
>
                    <?php echo $_smarty_tpl->tpl_vars['k']->value['key'];?>

                  </option>
                  <?php }} ?>
                </select>
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" class="search-button">
                Search
              </button>
            </div>
          </div>
          
      </div>
      
      
      <?php if ($_smarty_tpl->getVariable('video_num_rows')->value>0){?>
      <div class="container-fluid">
        <br>
        <div class="row  action pull-left">
          
          <a href="javascript:void(0)" >
            <input type="checkbox" name="excampaign[]" id="campaign_0" value="excludecampaign" class="0" />
            <div>
              <label>
                Exclude Campaign
              </label>
            </div>
          </a>
          
          
          <a href="javascript:void(0)" >
            <input type="checkbox" name="valence[]" id="Valence_0" value="valence" class="0" checked="checked" />
            <div>
              <label for="Valence_0">
                Valence
              </label>
            </div>
          </a>
          
          <a href="javascript:void(0)">
            <input type="checkbox" name="microexpressions[]" id="Microexpressions_0" value="emotion" class="0" checked="checked" />
            <div>
              <label for="Microexpressions_0">
                Microexpressions
              </label>
            </div>
          </a>
          
          
          <a href="javascript:void(0)">
            <input type="checkbox" name="engagement[]" id="Engagement_0" value="attention" class="0" checked="checked" />
            <div>
              <label for="Engagement_0">
                Engagement
              </label>
            </div>
          </a>
          
          <a href="javascript:void(0)">
            <input type="checkbox" name="Heat_map[]" id="Heat_map_0" value="heatmap" class="0" checked="checked" />
            <div>
              <label for="Heat_map_0">
                Heat Map
              </label>
            </div>
          </a>
          
          
          <button class="btn btn-sm btn-default" onclick="javascript:return generate_code('0')">
            <strong>
              Analyze By Parameters
            </strong>
          </button>
          <input type="hidden" name="vode_id[]" value="0" />
          
          
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered">
              
              <thead>
                <tr>
                  <th>
                    Video
                  </th>
                  <th>
                    <a href="javascript: set_order('c_title','<?php echo $_smarty_tpl->getVariable('c_title_order')->value;?>
')" style="color:#FFF">
                      Title
                    </a>
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
?>
                <tr>
                  <td class="field-label col-xs-2 col-sm-2 col-md-2 text-align">
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_thumb_url'];?>
" alt="125x125">
                  </td>
                  <td class="col-md-2  second-td">
                    <?php echo $_smarty_tpl->tpl_vars['video']->value['c_date'];?>
 
                  </br>
                <?php echo $_smarty_tpl->tpl_vars['video']->value['c_title'];?>

              </br>
          Feedback: <?php echo $_smarty_tpl->tpl_vars['video']->value['num_feedback'];?>

      </td>
      
      <td class="col-md-5 third-td" >
        <div class="container-fluid">
          <div class="row  action pull-right">
            
            <a href="javascript:void(0)" >
              <input type="checkbox" name="excampaign[]" id="campaign_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="excludecampaign" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" />
              <div>
                <label>
                  Exclude Campaign
                </label>
              </div>
            </a>
            
            
            <a href="javascript:void(0)" >
              <input type="checkbox" name="valence[]" id="Valence_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="valence" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" checked="checked" />
              <div>
                <label for="Valence_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">
                  Valence
                </label>
              </div>
            </a>
            
            <a href="javascript:void(0)">
              <input type="checkbox" name="microexpressions[]" id="Microexpressions_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="emotion" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" checked="checked" />
              <div>
                <label for="Microexpressions_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">
                  Microexpressions
                </label>
              </div>
            </a>
            
            
            <a href="javascript:void(0)">
              <input type="checkbox" name="engagement[]" id="Engagement_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="attention" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" checked="checked" />
              <div>
                <label for="Engagement_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">
                  Engagement
                </label>
              </div>
            </a>
            
            <a href="javascript:void(0)">
              <input type="checkbox" name="Heat_map[]" id="Heat_map_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" value="heatmap" class="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" checked="checked" />
              <div>
                <label for="Heat_map_<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
">
                  Heat Map
                </label>
              </div>
            </a>
            
            
            <button class="btn btn-sm btn-default" onclick="javascript:return generate_code('<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
')">
              <strong>
                Analyze
              </strong>
            </button>
            <input type="hidden" name="vode_id[]" value="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" />
            
            
          </div>
        </td>
      </tr>
      <?php }} ?>
      </tbody>
</table>

<table class="table">
  <td>
  </td>
  <td>
  </td>
  <td class="text-right">
    <?php echo $_smarty_tpl->getVariable('paging_html')->value;?>

  </td>
</table>

</div>
</div>
<?php }else{ ?>
<br />
<div class="text-center alert alert-info">
  Your current video analysis list is empty.
</div>
<?php }?>

<input type="hidden" name="content_id" value="" />


</form>

<script>
  /*
function compare_video()
{
document.frm.act.value='compare_video_analysis'
document.frm.submit();
}
*/
  function generate_code(contentId)
  {
    var checkBoxes=document.getElementsByClassName(contentId);
    var booleanResult=false;
    var chkArray = [];
    eraseCookie("graphs_to_show");
    $.each(checkBoxes, function(index, obj){
        if(obj.checked){
        chkArray.push(obj.value);
        var chkData = JSON.stringify(chkArray);
        createCookie("graphs_to_show",chkData,"1");
        booleanResult = true;
        }
    }
    );
  
    if(booleanResult==false)
    {
      alert("Please select at least one.");
      return false;
    }
  
    var a = 'advanced_search.php?act=analysebyvideo&c_id=';
    var aa = 'advanced_search.php?act=analysebyparameters';
    var b = '&cat=';
    var c = '&countries=';
    var d = '&gender=';
    var cook = readCookie("graphs_to_show");
    if(contentId!=0)    
      location.href = a.concat(contentId,b,document.getElementById('cat').value,c,document.getElementById('countries').value,d,document.getElementById('gender').value);
    else
      location.href = aa.concat(b,document.getElementById('cat').value,c,document.getElementById('countries').value,d,document.getElementById('gender').value);
    return false;
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
