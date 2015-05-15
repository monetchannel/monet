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
                var activated = {$user_activated};
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
        <img src="{$profile_image}" width="80" height="80">
        <h1>Edit Your Account</h1>
        <form id="profile-edit-form" name="edit_form" action="account_info.php" method="post" onsubmit="javascript:return validate_edits()">
            Name: <input type="text" autofocus value="{$fname}" name="user_fname">
            <input type="text" autofocus value="{$lname}" name="user_lname">
            <br>
            Birthday: <input type="text" autofocus placeholder="mm/dd/yyyy" value="{$dob}" name="user_dob">
            <br>
            Email:</label> <input type="text" autofocus value="{$email}" name="user_email" id="email_field">
            <br>
            Zip: <input type="text" autofocus value="{$zipcode}" name="user_zip">
            <br>
            Country: <select  name="user_country" class="styled-select" style="color:#777;" onChange="$('.styled-select').css('color','#000000')">
                {$country_name}
            </select>
            <br>
            <input type="submit" name="save" value="Save Edits" class="btn-primary" id="save_edits_btn" style="display:inline;"/>
            <input type="button" id="edit-cancel-btn" class="btn-primary" value="Cancel" name="cancel_btn"/>
            <input type="hidden" name="act" value="save_profile_changes"/>
        </form>
            
        <button class="btn-primary" id="change-pass-btn">Change Password...</button>
        <form id="new-pass-form" class="pass-form" {if $pw_msg == ''}style="display:none;"{/if} onsubmit="javascript:return change_password()">
            <p>{$pw_msg}</p>
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
        <div id="new-profile-image-div" {if $image_msg == ''}style="display:none;"{/if}>
            <h1>Upload New Profile Image</h1>
            <p>{$image_msg}</p>
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
{*                                jQuery("#webcam-canvas").hide();*}
                            }
                        });
                    });
                    {*$(document).ready(function (){
                        $("#camera").webcam({
                            width: 320,
                            height: 240,
                            mode: "save",
                            swffile: "../includes/jQuery-webcam/jscam.swf"
                        });
                    });*}
                    
                </script>
            </div>
            <button id="cancel-change-image-btn" class="btn-primary">Close</button>
        </div>
    </body>
</html>
    