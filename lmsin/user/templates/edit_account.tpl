{extends file="video_list_header.tpl"}
{block name=body}
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
            //$(document).ready(function () {   
                //var activated = {$user_activated};
               // if (activated > 1){
                 //   $("#email_field").prop("disabled", true);
                //    $("#upload-new-image-btn").prop("disabled", true);
               //     $("#change-pass-btn").prop("disabled", true);
               // }
          //  });
        </script>
        <script>
            
                $(function password(){
                    $("#change-pass-btn").click(function(){
                        window.location.href = "account_info.php?act=password_form";
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
                        image_webcam();
                    });
                });
                $(function cancelBtnClicked(){
                     $("#edit-cancel-btn").click(function() {
                        window.location.href = "account_info.php";
                    });
                });
                $(function user_image(){
                    $("#userimage").hover(function(){
                        $("#userimage").fadeTo(1,0.4);
                    });
                    $("#userimage").mouseout(function(){
                        $("#userimage").fadeTo(1,1);
                    });
                });
                $(function imagetext(){
                    $("#imagetext").hide();
                    $("#userimage").hover(function(){
                        $("#imagetext").show();
                    });
                    $("#userimage").mouseout(function(){
                        $("#imagetext").hide();
                    });
                });
        </script>
    </head>
    
    <body>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><em>Edit Your Account</em></strong>
            </div>
        </div>

<div class="align-center">
    <form id="profile-edit-form" name="edit_form" onsubmit="javascript:return validate_edits()">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{$user_data.user_fname}" name="user_fname">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{$user_data.user_lname}" name="user_lname">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" value="{$user_data.user_dob}" name="user_dob">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{$user_data.user_email}" name="user_email" id="email_field" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{$user_data.user_zipcode}" name="user_zipcode">
                    </div>
                </div>         
                <br>
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <select  name="user_country" class="form-control">
                            {$country}
                        </select>
                    </div>
                </div>
                <br>
                <input type="hidden" name="act" value="save_profile_changes"/>
            </div>

            <div class="col-md-6">
                <br>
                <div class="row">
                    <a href="account_info.php?act=image_upload">
                        {if $userimage}
                            <img id="userimage" class="img-responsive img-rounded" src="../../{$userimage}" style="margin:0 auto;max-height: 240px;">
                        {else}
                            <img id="userimage" class="img-responsive" src="./images/dashboard/user.jpg" style="margin:0 auto;max-height: 240px;">
                        {/if}
                        <p id="imagetext">Click to change profile picture</p>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <input type="submit" name="save" value="Save" class="btn btn-default" id="save_edits_btn" style="display:inline;"/>
            </div>    
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <p class="btn btn-default" id="change-pass-btn">Change Password</p>
            </div>
        </div>
    </form>
</div>       
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
        
        
    </body>
    {/block}
</html>
    
