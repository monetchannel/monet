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
                $(function showFileUpload(){
                    $("#file-upload-selector").click(function() {
                        $("#file-upload-div").show();
                        $("#url-upload-div").hide();
                        $("#webcam-upload-div").hide();
                        $("#file-upload-selector").addClass('active');
                        $("#url-upload-selector").removeClass('active');
                        $("#webcam-upload-selector").removeClass('active');
                    });
                });
                $(function showURLUpload(){
                    $("#url-upload-selector").click(function() {
                        $("#file-upload-div").hide();
                        $("#url-upload-div").show();
                        $("#webcam-upload-div").hide();
                        $("#file-upload-selector").removeClass('active');
                        $("#url-upload-selector").addClass('active');
                        $("#webcam-upload-selector").removeClass('active');
                    });
                });
                $(function showWebcamUpload(){
                    $("#webcam-upload-selector").click(function() {
                        $("#file-upload-div").hide();
                        $("#url-upload-div").hide();
                        $("#webcam-upload-div").show();
                        $("#file-upload-selector").removeClass('active');
                        $("#url-upload-selector").removeClass('active');
                        $("#webcam-upload-selector").addClass('active');
                        image_webcam();
                    });
                });
        </script>
    </head>
    
    <body>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><em>Upload New Profile Image</em></strong>
            </div>
        </div>
<div class="row align-center">
    <div class="row">
        {if $userimage}
            <img class="img-responsive img-rounded" src="../../{$userimage}" style="margin:0 auto;max-height: 240px;">
        {else}
            <img class="img-responsive" src="./images/dashboard/user.jpg" style="margin:0 auto;max-height: 240px;">
        {/if}
    </div>
    <br>
    <br>
    <div class="row">
        <div id="new-profile-image-div" >
            <div class="btn-group">
                <button class="btn btn-default active" id="file-upload-selector">Upload From File</button>
                <button class="btn btn-default" id="url-upload-selector">Upload From URL</button>
                <button class="btn btn-default" id="webcam-upload-selector">Upload From Webcam</button>
            </div>
            <div id="file-upload-div">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <!--file upload form-->
                    <form id="profile-image-file-upload-form" onsubmit="javscript: return upload_image_from_file()" method="post" enctype="multipart/form-data">
                        <br>
                        <input type="file" name="new_profile_image" id="new-profile-image"/>
                        <br>
                        <input type="submit" value="Upload" class='btn-md' name="submit"/>
                        <input type="hidden" name="act" value="upload_new_profile_image"/>
                        <input type="hidden" name="type" value="file"/>
                    </form>
                </div>
                <div class="col-sm-4"></div>
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
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <form id="profile-image-url-upload-form" onsubmit="javascript: return upload_image_from_url()" method="post" enctype="multipart/form-data">
                        <br>
                        <input type="url" name="image_url" class="form-control" autofocus placeholder="Image URL"/>
                        <br><br>
                        <input type="submit" value="Upload" class='btn-md' name="submit"/>
                        <input type="hidden" name="act" value="upload_new_profile_image"/>
                        <input type="hidden" name="type" value="url"/>
                    </form>
                </div>
                <div class="col-sm-2"></div>
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
                    <br>
                    <div class="camera">
                        <video id="video" style="width: 320px;height: 240px;">Video stream not available.</video>
                        <button id="startbutton">Take photo</button> 
                    </div>
                        <canvas id="canvas">
                          </canvas>
               
                    <input type="button" value="Upload" onclick="submit_form();"/>
                    <input type="hidden" name="act" value="upload_new_profile_image"/>
                    <input type="hidden" name="type" value="webcam"/>
                </form>
                <script>
                    function image_webcam(){
                      //  alert("1");
                        var width = 320;    
                            var height = 0;     
                            var streaming = false;
                            var video = null;
                            var canvas = null;
                            var photo = null;
                            var startbutton = null;
                        //alert("2");
                        startup();
                            function startup() {
                               // alert("2");
                              video = document.getElementById('video');
                              canvas = document.getElementById('canvas');
                              startbutton = document.getElementById('startbutton');
                              if(!navigator.getUserMedia){
                                  alert("Please use Google Chrome 21 and above or Mozilla Firefox 17 and above for this feature.");
                              }
                              navigator.getMedia = ( navigator.getUserMedia ||
                                                     navigator.webkitGetUserMedia ||
                                                     navigator.mozGetUserMedia ||
                                                     navigator.msGetUserMedia);

                              navigator.getMedia(
                                {
                                  video: true,
                                  audio: false
                                },
                                function(stream) {
                                  if (navigator.mozGetUserMedia) {
                                    video.mozSrcObject = stream;
                                  } else {
                                    var vendorURL = window.URL || window.webkitURL;
                                    video.src = vendorURL.createObjectURL(stream);
                                  }
                                  video.play();
                                },
                                function(err) {
                                  console.log("An error occured! " + err);
                                }
                              );

                              video.addEventListener('canplay', function(ev){
                                if (!streaming) {
                                  height = video.videoHeight / (video.videoWidth/width);

                                  // Firefox currently has a bug where the height can't be read from the video
                                  
                                    if (isNaN(height)) {
                                        height = width / (4/3);
                                    }

                                  video.setAttribute('width', width);
                                  video.setAttribute('height', height);
                                  canvas.setAttribute('width', width);
                                  canvas.setAttribute('height', height);
                                  streaming = true;
                                }
                              }, false);

                              startbutton.addEventListener('click', function(ev){
                                takepicture();
                                ev.preventDefault();
                              }, false);

                              clearphoto();
                            }

                            
                            function clearphoto() {
                              var context = canvas.getContext('2d');
                              context.fillStyle = "#AAA";
                              context.fillRect(0, 0, canvas.width, canvas.height);

                              var data = canvas.toDataURL('image/png');

                            }

                            function takepicture() {
                              var context = canvas.getContext('2d');
                              if (width && height) {
                                canvas.width = width;
                                canvas.height = height;
                                context.drawImage(video, 0, 0, width, height);

                                var data = canvas.toDataURL('image/png');
                               
                              } else {
                                clearphoto();
                              }
                            }

                    }
                    
                    function submit_form (){
                        var canvas = document.getElementById("canvas");
                        var save_image = canvas.toDataURL("image/jpeg");
                        var input = $("<input>")
                                .attr("type", "hidden")
                                .attr("name", "webcam_image").val(save_image);
                        $("#webcam-upload-form").append($(input));
                        var form = document.getElementById('webcam-upload-form');
                        form.target="submitframe";
                        form.submit();
                    }
                </script>
            </div>
        </div>
    </div>
</div>
            
        
        
    </body>
    {/block}
</html>
    
