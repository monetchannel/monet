<?php /* Smarty version Smarty-3.0.6, created on 2015-05-22 03:55:04
         compiled from "./templates/edit_account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1866975658555f0b086d71e1-57013828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2d2b636e1c481184310d83e0b1d5f1816bfa533' => 
    array (
      0 => './templates/edit_account.tpl',
      1 => 1432291797,
      2 => 'file',
    ),
    'edc25cd2360aa782f5ecf95a285921d4de182fe6' => 
    array (
      0 => './templates/video_list_header.tpl',
      1 => 1432289664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1866975658555f0b086d71e1-57013828',
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
		<title>Monet Dash Board</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/index.css" rel="stylesheet">
		<link href="css/dashboard.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		 <script src="amcharts.js" type="text/javascript"></script>
        <script src="radar.js" type="text/javascript"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		
		
	</head>
	<body>
		<div class="header">
		   <div class="container-fluid" style="background:#f1f1f1">
		   		<img class="img-responsive" src="./images/logo.png" style="height:60px;"></img>
		   </div>
			   <div id="nav" class="container-fluid bg-top affix">
					<!--- Page Top Design ---->
				<div class="row">
				   <div class="col-xs-12 col-md-12" style="background:#ffffff;">
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
													
				</div>
					 <!-- Collect the nav links, forms, and other content for toggling -->
					 <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav navbar-right">
				  <li>      
						<a  href="watch_video.php" id="browse-more">
					   <span>Home</span>
					   <i class="browse-video" ></i>
					   </a>
				  </li>
				  <li><a href="account_info.php"><?php echo $_COOKIE['UserName'];?>
 !</a></li>
				  <li>
						  <a href="javascript:void(1)" onClick="javascript:<?php if ($_SESSION['FBuserID']){?>logoutFacebook()<?php }else{ ?>location.href='index.php?act=logout'<?php }?>">
				   <span>Logout</span>
				   <i class="logout-icon"></i>
						  </a>
						 </li>
				 </ul>
				 </div><!-- /.navbar-collapse -->
				
				 </div><!-- /.container-fluid -->
				 </nav>    
				</div>
					
				 </div>
			  </div>
	  </div>
	  
	  
   <!-- header ended -->
		<div id="wrapper">
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav dashboard">
					<!--Include your navigation here-->
					<li>
						<div id="images">
							<?php if ($_smarty_tpl->getVariable('user_data')->value['up_fname']){?>
								<img class="img-responsive" src="<?php echo $_smarty_tpl->getVariable('userimage')->value;?>
"style="vertical-align:middle;width:7.5em;height:7.5em;"/></img>
							<?php }else{ ?>
							<img class="img-responsive" src="./images/dashboard/user.jpg"style="vertical-align:middle;width:7.5em;height:7.5em;"/></img>
							<?php }?>
					</li>
					<li>
						<div id="name">
							<div class="profile-name"><b><?php echo $_COOKIE['UserName'];?>
</div>
							<div class="profile-address"><?php echo $_smarty_tpl->getVariable('user_data')->value['countries_name'];?>
</b></div>
						</div>
					</li>
					
					<li style="padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('reward_tab')->value;?>
">
						<?php if ($_smarty_tpl->getVariable('reward_tab')->value==''){?>
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionfour">
							<img class="img-responsive rewards" src="./images/<?php if ($_smarty_tpl->getVariable('reward_tab')->value!=''){?>rewards.png <?php }else{ ?>rewards.png<?php }?>"></img>
							Rewards
							</a>
						<?php }else{ ?>
							<a href="javascript:void(1)">
							<img class="img-responsive video" src="./images/rewards.png">Rewards</a></img>
						<?php }?>
						<ul id="accordionfour" class="panel-collapse collapse" style="background:#fff; <?php if ($_smarty_tpl->getVariable('reward_tab')->value!=''){?>display:block <?php }?>">
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_cumulative_rewards_tab')->value;?>
" >
								<a href="index.php?act=cumulative_rewards">
								 Cumulative Rewards
								</a>
							</li>
							
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_redeem_reward_tab')->value;?>
" >
								<a href="index.php?act=redeem_reward">
								Redeem Rewards
								</a>
							</li>
						</ul>
					</li>
					
					<li style="padding-bottom:0" class="<?php echo $_smarty_tpl->getVariable('fame_tab')->value;?>
">
						<?php if ($_smarty_tpl->getVariable('fame_tab')->value==''){?>
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionthree">
							<img class="img-responsive halloffame" src="./images/<?php if ($_smarty_tpl->getVariable('fame_tab')->value!=''){?>fame.png <?php }else{ ?>fame.png<?php }?>"></img>
							Hall Of Fame
							</a>
						<?php }else{ ?>
							<a href="javascript:void(1)">
							<img class="img-responsive halloffame" src="./images/fame.png">Hall Of Fame</a></img>
						<?php }?>
						<ul id="accordionthree" class="panel-collapse collapse" style="background:#fff; <?php if ($_smarty_tpl->getVariable('fame_tab')->value!=''){?>display:block <?php }?>">
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_current_user_tab')->value;?>
" >
								<a href="hall_of_fame.php?act=current">
								Current User
								</a>
							</li>
							
							<li class="sub-nav <?php echo $_smarty_tpl->getVariable('active_overall_user_tab')->value;?>
" >
							<a href="hall_of_fame.php?act=all_users">
								Overall User
								</a>
							</li>
						</ul>
					</li>
					
					<li class="<?php echo $_smarty_tpl->getVariable('campaigns_tab')->value;?>
">
						<a href="campaigns.php">
							<img class="img-responsive campaing" src="./images/campain.png"></img>
							<span style="font-size:16px;">Campaigns</span><span class="badge">&nbsp&nbsp<?php echo $_smarty_tpl->getVariable('cmp_count')->value['total'];?>
</span>
						</a>
					</li>
					
					<li class="<?php echo $_smarty_tpl->getVariable('stats_tab')->value;?>
">
						<a href="leaderboard.php">
							<img class="img-responsive campaing" src="./images/stats.png"></img>
							<span style="font-size:16px;">Statistics</span><span class="badge"></span>
						</a>
					</li>
					
					
					
				</ul>
			</div>	
			<!-- Page Content -->
			   
			<div class="container-fluid" style="position:relative;top:95px;">
					
				<!-- Top Content -->
				<div class="row ">
					<div class="col-md-10" style="background-color:#fff; padding: 1px 0 0;" >
											
						<!-- ----------------------------- -->
						
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your Account</title>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
        <script src="../includes/md5.js"></script>

        <script type="text/javascript" src="js/swfobject.js"></script> 
        <script type="text/javascript" src="js/mic.js"></script> 
        <script type="text/javascript" src="../includes/jQuery-webcam/jquery.webcam.js"></script>
        <script>
            //users with social login
            $(document).ready(function () {   
                var activated = <?php echo $_smarty_tpl->getVariable('user_activated')->value;?>
;
                if (activated > 1){
                    $("#email_field").prop("disabled", true);
                    $("#upload-new-image-btn").prop("disabled", true);
                    $("#change-pass-btn").prop("disabled", true);
                }
            });
        </script>
        <script>
            
                $(function showPassForm(){
                    $("#change-pass-btn").click(function(){
                        $("#new-pass-form").show();
                    });
                });
                $(function hidePassForm(){
                    $("#cancel-change-pass-button").click(function(){
                        $("#new-pass-form").hide();
                    });
                });
                $(function showUploadImageForm(){
                     $("#upload-new-image-btn").click(function(){
                        $("#new-profile-image-div").show();
                    });
                });
                $(function hideUploadImageForm(){
                     $("#cancel-change-image-btn").click(function(){
                        $("#new-profile-image-div").hide();
                    });
                });
                $(function showFileUpload(){
                    $("#file-upload-selector").click(function() {
                        $("#file-upload-div").show();
                        $("#url-upload-div").hide();
                        $("#webcam-upload-div").hide();
                    });
                });
                $(function showURLUpload(){
                    $("#url-upload-selector").click(function() {
                        $("#file-upload-div").hide();
                        $("#url-upload-div").show();
                        $("#webcam-upload-div").hide();
                    });
                });
                $(function showWebcamUpload(){
                    $("#webcam-upload-selector").click(function() {
                        $("#file-upload-div").hide();
                        $("#url-upload-div").hide();
                        $("#webcam-upload-div").show();
                    });
                });
                $(function cancelBtnClicked(){
                     $("#edit-cancel-btn").click(function() {
                        window.location.href = "account_info.php";
                    });
                });
        </script>
    </head>
    
    <body>
        <img src="<?php echo $_smarty_tpl->getVariable('profile_image')->value;?>
" width="80" height="80">
        <h1>Edit Your Account</h1>
        <form id="profile-edit-form" name="edit_form" action="account_info.php" method="post" onsubmit="javascript:return validate_edits()">
            Name: <input type="text" autofocus value="<?php echo $_smarty_tpl->getVariable('fname')->value;?>
" name="user_fname">
            <input type="text" autofocus value="<?php echo $_smarty_tpl->getVariable('lname')->value;?>
" name="user_lname">
            <br>
            Birthday: <input type="text" autofocus placeholder="mm/dd/yyyy" value="<?php echo $_smarty_tpl->getVariable('dob')->value;?>
" name="user_dob">
            <br>
            Email:</label> <input type="text" autofocus value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" name="user_email" id="email_field">
            <br>
            Zip: <input type="text" autofocus value="<?php echo $_smarty_tpl->getVariable('zipcode')->value;?>
" name="user_zip">
            <br>
            Country: <select  name="user_country" class="styled-select" style="color:#777;" onChange="$('.styled-select').css('color','#000000')">
                <?php echo $_smarty_tpl->getVariable('country_name')->value;?>

            </select>
            <br>
            <input type="submit" name="save" value="Save Edits" class="btn-primary" id="save_edits_btn" style="display:inline;"/>
            <input type="button" id="edit-cancel-btn" class="btn-primary" value="Cancel" name="cancel_btn"/>
            <input type="hidden" name="act" value="save_profile_changes"/>
        </form>
            
        <button class="btn-primary" id="change-pass-btn">Change Password...</button>
        <form id="new-pass-form" class="pass-form" <?php if ($_smarty_tpl->getVariable('pw_msg')->value==''){?>style="display:none;"<?php }?> onsubmit="javascript:return change_password()">
            <p><?php echo $_smarty_tpl->getVariable('pw_msg')->value;?>
</p>
            <input type="password" id="user-old-pass" required autofocus placeholder="Old Password" name="old_pass">
            <br>
            <input type="password" id="user-new-pass" required autofocus placeholder="New Password" name="new_pass">
            <br>
            <input type="password" id="user-confirm-pass" required autofocus placeholder="Confirm New Password" name="confirm_new_pass">
            <br>
            <input type="submit" name="update_pass" value="Update Password" class="btn-primary" id="update-pass-btn"/>
            <input type="hidden" name="act" value="change_password"/>
            <button id="cancel-change-pass-button" class="btn-primary">Close</button>
        </form>
            <script>
                     jQuery.ajax({
                    type: "POST",
                    url:"account_info.php",
                    data: $('#new-pass-form').serialize(),
                        success: function(js){
                            if(js!=1){
                                bootbox.alert(js)	
                                return false;
                            }
                        },
                        error: function(){
                            alert("Please try again. Server have not sent response.");
                        }

                });
             
            </script>
        <script>
            function validate_edits(){
                if(document.edit_form.user_fname.value=="" || document.edit_form.user_lname.value=="" || document.edit_form.user_email.value==""  || document.edit_form.user_country.value=="-1" || document.edit.user_zipcode.value==""){

                    bootbox.alert("Please fill all fields.");
                    return false;

                }
                var x=document.forms["edit_form"]["user_email"].value
                var atpos=x.indexOf("@");
                var dotpos=x.lastIndexOf(".");
                
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
                    alert("Please enter a valid email address.");
                    return false;
                }
                
                jQuery.ajax({
                    type: "POST",
                    url:"account_info.php",
                    data: $('#profile-edit-form').serialize(),
                        success: function(js){
                            if(js!=1){
                                bootbox.alert(js)	
                                return false;
                            }
                        },
                        error: function(){
                            alert("Please try again. Server have not sent response.");
                        }

                });
                return false;	
            }
            
            
        </script>
        <button id="upload-new-image-btn" class="btn-primary">Upload New Image...</button>
        <div id="new-profile-image-div" <?php if ($_smarty_tpl->getVariable('image_msg')->value==''){?>style="display:none;"<?php }?>>
            <h1>Upload New Profile Image</h1>
            <p><?php echo $_smarty_tpl->getVariable('image_msg')->value;?>
</p>
            <div class="btn-group">
                <button class="btn" id="file-upload-selector">Upload From File</button>
                <button class="btn" id="url-upload-selector">Upload From URL</button>
                <button class="btn" id="webcam-upload-selector">Upload From Webcam</button>
            </div>
            <div id="file-upload-div">
                <!--file upload form-->
                <form id="profile-image-file-upload-form" onsubmit="javscript: return upload_image_from_file()" method="post" enctype="multipart/form-data">
                    <input type="file" name="new_profile_image" id="new-profile-image"/>
                    <br>
                    <input type="submit" value="Upload" class='btn-primary' name="submit"/>
                    <input type="hidden" name="act" value="upload_new_profile_image"/>
                    <input type="hidden" name="type" value="file"/>
                </form>
                    <script>
                            jQuery.ajax({
                                type: "POST",
                                url:"account_info.php",
                                data: $('#profile-image-file-upload-form').serialize(),
                                    success: function(js){
                                        if(js!=1){
                                           bootbox.alert(js)	
                                            return false;
                                        }
                                    },
                                    error: function(){
                                        alert("Please try again. Server have not sent response.");
                                    }
                            });
                            return false;
                    </script>
            </div>
            <div id="url-upload-div" style="display:none;">
                <form id="profile-image-url-upload-form" onsubmit="javascript: return upload_image_from_url()" method="post" enctype="multipart/form-data">
                    URL: <input type="url" name="image_url" autofocus placeholder="Image URL"/>
                    <br>
                    <input type="submit" value="Upload" class='btn-primary' name="submit"/>
                    <input type="hidden" name="act" value="upload_new_profile_image"/>
                    <input type="hidden" name="type" value="url"/>
                </form>
                <script>
                            jQuery.ajax({
                                type: "POST",
                                url:"account_info.php",
                                data: $('#profile-image-url-upload-form').serialize(),
                                    success: function(js){
                                        if(js!=1){
                                           bootbox.alert(js)	
                                            return false;
                                        }
                                    },
                                    error: function(){
                                        alert("Please try again. Server have not sent response.");
                                    }
                            });
                            return false;
                </script>
            </div>
            <div id="webcam-upload-div" style="display:none;">
                <form id="webcam-upload-form" method="POST" enctype="multipart/form-data" >
                    <div id="camera" style="display:inline;"></div>
                    <canvas id="webcam-canvas" height="240" width="240" style="display:inline;"></canvas>
                    <input type="button" value="Take Photo" onclick="webcam.capture();void(0);"/>
                    <input type="submit" value="Upload" name="submit"/>
                    <input type="hidden" name="act" value="upload_new_profile_image"/>
                     <input type="hidden" name="type" value="webcam"/>
                </form>
                <script>
                    $(document).ready(function(){
                        var pos = 0;
                        var ctx = null;
                        var cam = null;
                        var image = null;
                        
                        var canvas = document.getElementById("webcam-canvas");
                        if (canvas.getContext){
                            ctx = document.getElementById("webcam-canvas").getContext("2d");
                            ctx.clearRect(0,0,240,240);
                            
                            var img = new Image();
                            img.onload = function() {
                                ctx.drawImage(img, 240, 240);
                            }
                                image = ctx.getImageData(0, 0, 240, 240);
                        }       
                        
                        $("#camera").webcam({
                            width: 240,
                            height: 240,
                            mode: "callback",
                            swffile: "../includes/jQuery-webcam/jscam.swf", 
                            onTick: function(remain) {
                                if (0 == remain) {
                                        jQuery("#status").text("Smile!");
                                } else {
                                        jQuery("#status").text(remain + " second(s) remaining...");
                                }
                            },
                            onCapture: function () {
                                jQuery("#flash").css("display", "block");
                                jQuery("#flash").fadeOut("fast", function () {
                                    jQuery("#flash").css("opacity", 1);
                                });
                                webcam.save();
                            },
                            onSave: function(data) {
                                var col = data.split(";");
                                var img = image;

                                for(var i = 0; i < 240; i++) {
                                    var tmp = parseInt(col[i]);
                                    img.data[pos + 0] = (tmp >> 16) & 0xff;
                                    img.data[pos + 1] = (tmp >> 8) & 0xff;
                                    img.data[pos + 2] = tmp & 0xff;
                                    img.data[pos + 3] = 0xff;
                                    pos+= 4;
                                }

                                if (pos >= 4 * 240 * 240) {
                                    ctx.putImageData(img, 0, 0);
                                    var canvas = document.getElementById("webcam-canvas");
                                    var save_image = canvas.toDataURL("image/jpeg");
                                    var input = $("<input>")
                                            .attr("type", "hidden")
                                            .attr("name", "webcam_image").val(save_image);
                                    $("#webcam-upload-form").append($(input));
                                    pos = 0;
                                }
                            },
                            onLoad: function () {
                                var cams = webcam.getCameraList();
                                for(var i in cams) {
                                        jQuery("#cams").append("<li>" + cams[i] + "</li>");
                                }
                            }
                        });
                    });
                    
                </script>
            </div>
            <button id="cancel-change-image-btn" class="btn-primary">Close</button>
        </div>
    </body>
    
						<!-- ----------------------------- -->
						
					</div>
										
					<div class="col-md-2" style="background-color:#fff;">
						
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('companies')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
						<div class="row">
							<div class="col-md-12 block">
								<a class="" href="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
watch_video.php?filter=true&cat=&brand=<?php echo $_smarty_tpl->tpl_vars['v']->value['company_id'];?>
"> 
									<img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['v']->value['company_logo'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['company_name'];?>
"></img> 
								</a>
							</div>
						</div>
						<?php }} ?>
						
					</div>
				</div>
					
			</div>
		</div>	
	
	
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.js"></script>
		<script src="js/circle-progress.js"></script>
		<script type="text/javascript">
		
	//var wl = window.location.hostname + window.location.pathname; 
	
	$(function(){
		 
	});
		
	</script>
		<script src="js/jquery.diagram.js"></script>
		
		<script type="text/javascript">
		
		var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
		$(function(){
			$('a#redeem_re').on('click', function(){
				var UserId = '<?php echo $_smarty_tpl->getVariable('user_data')->value['user_id'];?>
';
				var id = $(this).attr('data'), imgsrc = $(this).children('img').attr('src'), retitle = $(this).children('.product-title').text(), repoints = $(this).children('.product-point').text();
				//alert(id + imgsrc + retitle + repoints);
				
				$('#redeem-popup .reimg').attr({'src' : imgsrc});
				$('#redeem-popup .retitle').text(retitle);
				$('#redeem-popup .repoints').text(repoints);
				$('#redeem-popup #UserId').val(UserId);
				$('#redeem-popup #rewardId').val(id);
				
				$('#redeem-popup').modal('show');
				
				$('#redeemReForm').on('submit', function (event) {
					event.preventDefault();
					var frm = $(this).serialize();
					//alert(frm);
					$.ajax({
						type : 'POST',
						url : 'index.php?act=xhr_redeem_reward',
						data : frm,
						success: function (result) {
							
							location.reload();
							
							
						},
						error: function (jqXHR,text_status,err_msg) {
							alert('ERROR : '+text_status+' '+err_msg);
						},
					});
				});
				
			});
		});
			
		</script>
		
		<script type="text/javascript">
		
		var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
		function return_play_video(c_id)
		{
			if(c_id)
			{
				window.location.href=SERVER_PATH+'watch_video.php?act=watch_video&c_id='+c_id;
				return true;
			}
		}
			
		var wl = window.location.hostname + window.location.pathname;
	
		$(function(){
			 $('#browse-more').on('click',function(){
				window.location = 'http://'+wl;
			});
		});
			
		</script>
		
		<script>
		// This is called with the results from from FB.getLoginStatus().
	  	function statusChangeCallback(response) {
		    console.log('statusChangeCallback');
		    console.log(response);
	  	}
		
	  	function checkLoginState() {
		    FB.getLoginStatus(function(response) {
		      statusChangeCallback(response);
		    });
	  	}
		
	  	window.fbAsyncInit = function() {
	  		FB.init({
			    appId      : '432978236748242',
			    cookie     : true,  // enable cookies to allow the server to access 
			                        // the session
			    xfbml      : true,  // parse social plugins on this page
			    version    : 'v2.1' // use version 2.1
	  		});
		
	  		FB.getLoginStatus(function(response) {
		    	statusChangeCallback(response);
		  	});
  		};
		
	  	// Load the SDK asynchronously
	  	(function(d, s, id) {
	    	var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) return;
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
	  	}(document, 'script', 'facebook-jssdk'));
		
		  
	 	function logoutFacebook() {
	  		FB.init({
			    appId      : '432978236748242',
			    cookie     : true,  // enable cookies to allow the server to access 
			                        // the session
			    xfbml      : true,  // parse social plugins on this page
			    version    : 'v2.1' // use version 2.1
		  	});
	  		FB.logout(function() {
			    // Reload the same page after logout
			   	window.location="index.php?act=logout";
			    // Or uncomment the following line to redirect
			    //window.location = "http://ykyuen.wordpress.com";
		  	});
		}
		
		</script>
		
	<script type="text/javascript">
			
	$(function(){
	
		<!-- ******************************* Circle Graph******************************-->
		var userPoint = <?php echo $_smarty_tpl->getVariable('user_data')->value['points'];?>
;
		var totalPoint = <?php echo $_smarty_tpl->getVariable('reward')->value['points'];?>
;
		var priceName = "<?php echo $_smarty_tpl->getVariable('reward')->value['title'];?>
";
		var priceTitle = "<?php echo $_smarty_tpl->getVariable('reward')->value['sub_title'];?>
";
		var topText = "<div style='color:#658CEB; font-size:40px; height: 48px;'> "+priceName+" </div> <div style='font-size:20px;'>"+priceTitle+"</div>"
		var htmlString = "<div class='text-inner'>"+topText+"<div style='color:#FF0000; font-size:54px;border-bottom:2px solid #99C1DA;margin: 0 auto 4%; height: 68px; width: 60%;'>"+totalPoint+"</div> <div style='color:#4D616D; font-size:20px;'> TO GOAL </div></div>" ;
		
		var pointPercent = userPoint*100/totalPoint;
		$("#circleGraph").html(htmlString+"<div class='demo' data-percent='"+pointPercent+"%'></div>");
		$('.demo').diagram({
			size: "250", // graph size
			borderWidth: "10", // border width
			bgFill: "#ccc", // background color
			frFill: "#12A5DC", // foreground color
			textSize: 34, // text color
			textColor: '#2a2a2a' // text color
		});
		var detailText = $(".text-inner").html();
		$(".text-inner").hide();
		$('.demo span').addClass("inner-style");
		$('.demo span').html(detailText);
		$(".emotion-indicator").css("visibility","hidden");
		var winWidth = $(window).width();
		$(".col-md-2 a").hover(
		  function() {
			$( this ).children(".emotion-indicator").css("visibility","visible");
			}, function() {
			$( this ).children(".emotion-indicator").css("visibility","hidden");
		  }
		);
		//alert(winWidth);
		
		<!-- ******************************* Show More Product ****************************** -->
		
		$(".show-more").click(function(){
			$(".move-top").show();
			
			$.ajax({
			
				type : 'GET',
				url : 'index.php?act=rewardlist&offset=3',
				dataType:'json',
				success: function (result) {
					$(".show-more").remove();
					var productCol = '';
					var objle = result.length ;
					if(objle > 0)
					{
						$("#productContainer").append('<div id="pr" class="row product-rows" style="" ></div>');
						
						$.each( result, function( i, val ){
							productCol += '<div  class="col-md-4 load-img">'+'<img class="img-responsive" src="../files/prize_thumb/'+val.r_image+'"style="width:150px;height:150px; float:left; margin-right:6px"></img>'+'<div class="product-title">'+val.title+' ('+val.sub_title+')</div>'+'<div class="product-point">'+val.points+' Points'+'</div>'+'</div>';
						});
						$("#pr").append(productCol);
					}
					
				},
				error: function (jqXHR,text_status,err_msg) {
			  		alert('ERROR : '+text_status+' '+err_msg);
				},
			
			});
			
						
		});
		$(".move-top").hide();	
		$(".move-top").click(function(){
			$('html, body').animate({
				scrollTop: $( $(this).attr('href') ).offset().top-30
			}, 600);
			$(".move-top").hide();	
			return false;
		});
		$(window).scroll(function(e) {
			var div = window.pageYOffset;
				if (div > 200) {
					$(".move-top").show();				
				} 
		});
	});
	
	
		
	</script>
	
	</body>
</html>