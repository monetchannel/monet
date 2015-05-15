<?php /* Smarty version Smarty-3.0.6, created on 2014-09-18 01:22:51
         compiled from "./templates/watch_video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6290825125418992b95d724-43401874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb422ecb5d350ce0b5f8463a018bbe23a9852d4c' => 
    array (
      0 => './templates/watch_video.tpl',
      1 => 1410776605,
      2 => 'file',
    ),
    '6c01d053b1a5d2541cda7c116668f4e5cdfa8701' => 
    array (
      0 => './templates/index_brand_video.tpl',
      1 => 1411028317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6290825125418992b95d724-43401874',
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monet Dash Board</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<link href="css/index.css" rel="stylesheet">
     <!-- jQuery Version 1.11.0 -->
   <script src="js/jquery.min.js"></script> 
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

		<div id="wrapper">
			<div class="container-fluid bg-top">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<img src="images/logo.png" class="img-responsive top-logo" alt="Responsive image">
					</div>
				</div>			
			</div>			
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#"></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><?php echo $_COOKIE['UserName'];?>
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
			
        <!-- Page Content -->
        
<!--<link href="nvd3/src/nv.d3.css" rel="stylesheet" type="text/css">
<script src="nvd3/lib/d3.v3.js"></script> 
<script src="nvd3/nv.d3.js"></script> 
<script src="nvd3/src/tooltip.js"></script> 
<script src="nvd3/src/utils.js"></script> 
<script src="nvd3/src/models/legend.js"></script> 
<script src="nvd3/src/models/axis.js"></script> 
<script src="nvd3/src/models/scatter.js"></script> 
<script src="nvd3/src/models/line.js"></script> 
<script src="nvd3/src/models/lineChart.js"></script> -->
<script src="js/new_record.js"></script> 
<script src="js/bootstrap.js"></script> 
<script src="js/cynets_modal.js"></script> 
<script type="text/javascript" src="js/swfobject.js"></script> 
<script language="javascript" type="text/javascript">
var Timer;
var TotalSeconds;
function CreateTimer(TimerID, Time) {
    Timer = document.getElementById(TimerID);
    TotalSeconds = Time;
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function Tick() {
  if(TotalSeconds==0)
  {
    window.location.href="watch_video.php";
    return;
  }
  if(TotalSeconds==16)
    document.getElementById('second_counter').style.display="";
    
    TotalSeconds -= 1;
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
    Timer.innerHTML = TotalSeconds;
}
	
	function stop_call()
	{
	  if(document.getElementById('rated').value=='')
	  {
		 var data="<form name=\"frm\" action=\"watch_video.php\" method=\"post\" onsubmit=\"return chk_frm();\" style=\"z-index:300px;\"><table width=\"600\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\"> <tr id=\"second_counter\" style=\"display:none\"><td align=\"center\" colspan=\"2\"  style=\"padding:6px; margin:10px; font-size:14px;background-color:#f3a634; color:#000000;height=15px\"> You have <span id=\"countdown\"></span> seconds remaining.&nbsp;</td></tr>  <tr><tr><td height=\"40\" colspan=\"2\"><strong>Please speak a sentence on how you liked this video. Following that please use the tool given below to give your rating on the content</strong></td></tr><tr><td align=\"center\"  ><div id=\"mygrapph_popup\"><object id=\"mygrapph_popup\" width=\"235\" height=\"170\" type=\"application/x-shockwave-flash\" data=\"swf/Sample.swf\" style=\"visibility: visible;\"></object></div></td><td valign=\"top\" style=\"padding-top:5px\"   align=\"center\" height=\"150\"> <img id=\"mic\" width=\"35\" height=\"35\" src=\"images/mic.gif\" onclick=\"toggle();\"><p class=\"small\">Please enter your comments below</p><textarea name=\"comment\" id=\"comment\" style=\"width:250px; height:70px; border:1px #000 solid; overflow:auto\"></textarea></td></tr><tr><td colspan=\"2\">&nbsp;</td></tr>  <tr>    <td align=\"center\" height=\"30\" colspan=\"2\">      <input type=\"submit\" name=\"button\" id=\"button\" value=\"Submit my rating\" ></td>  </tr> </table>  <input type=\"hidden\" name=\"cf_ep_id\" id=\"cf_ep_id\" value=\"\">  <input type=\"hidden\" name=\"c_rating\" value=\"\" id=\"my_rating\" /><input type=\"hidden\" name=\"c_id\" value=\"<?php echo $_smarty_tpl->getVariable('content')->value['c_id'];?>
\" /><input type=\"hidden\" name=\"videoID\" value=\"<?php echo $_smarty_tpl->getVariable('content')->value['instanceID'];?>
\" /><input type=\"hidden\" name=\"cf_id\" value=\"<?php echo $_smarty_tpl->getVariable('cf_id')->value;?>
\" /><input type=\"hidden\" name=\"act\" value=\"rate_video_do\" /><input type=\"hidden\" name=\"cf_ch_id\" id='cf_ch_id' value=\"<?php echo $_smarty_tpl->getVariable('cf_ch_id')->value;?>
\" /></form>";
    document.getElementById('rated').value=1;
    cn_window_open("Thank you for watching the video",data,1);
	var params = {};
	params.wmode = "transparent"; 
    swfobject.embedSWF("swf/Sample.swf", "mygrapph_popup", "235", "170", "9.0.0", "swf/expressInstall.swf",false,params);
    CreateTimer("countdown",60);
	  }
	}

	function chk_frm()
	{
	  if(document.frm.cf_ep_id.value=='' || document.frm.c_rating.value=='')
	  {
		alert("All * fields are mendetory.");
		return false;
	  }
	}
	
	function FlashRating(rating,ep_id)
	{
		document.getElementById('my_rating').value=rating;
		document.getElementById('cf_ep_id').value=ep_id;
	}
	
	
	window.onbeforeunload = function (evt) {
	if(document.getElementById('rated').value=="")
	{
		var message = 'Please rate this video before leaving this page.';
		if (typeof evt == 'undefined') {
		evt = window.event;
	}
	
	if (evt) {
		evt.returnValue = message;
	}
	
		return message;
	}
}

window.previous_facebox=-1;
</script>
<input type="hidden" name="rated" id="rated" value="" />
<div class="container"> 
  
  <!-- Top Content -->
  <div class="row  margin-top">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"> <strong><em><?php echo $_smarty_tpl->getVariable('content')->value['c_title'];?>
!</em></strong> </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              <div class="panel-left-content">
                <div id="myContent" class="text-center" style="position:relative">
                  <div id="player" style="z-index:1;"></div>
                  <video width="100%" height="360" id="webcam_video" style="display:none;" autoplay></video>
                  <canvas id="webcam_canvas" width="100" height="80" style="position:absolute;right:25px;bottom:15px;z-index:5;"></canvas>
                  <canvas id="snapshot_canvas" width="320" height="240" style="display:none;"></canvas>
                  <img id="snapshot_image" width="320" height="240" style="display:none;"> </div>
              
              
              <!--<video id="video" width="100%" poster="poster.png" preload="none" controls>
											<source id="mp4" type="video/mp4" src="trailer.mp4"></source>											
										</video>--> 
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel-right-content">
              <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                  <!--Include your navigation here-->
                  
                  <li> <a data-toggle="collapse" data-parent="#accordion"   href="#accordionOne"> <img class="img-responsive video" src="./images/rating.png"></img> Share my rating </a>
                    <ul id="accordionOne" class="panel-collapse collapse">
                      <li class="sub-nav"> <a href="#"> <img class="img-responsive" src="images/fb-circle.png"/> </a> </li>
                      <li class="sub-nav"> <a href="#"> <img class="img-responsive" src="images/twitter-circle.png"/> </a> </li>
                      <li class="sub-nav"> <a href="#"> <img class="img-responsive" src="images/google.png"/> </a> </li>
                    </ul>
                  </li>
                  <li> <a data-toggle="collapse" data-parent="#accordion"   href="#accordionTwo"> <img class="img-responsive user" src="./images/rewards.png"></img> REWARDS </a>
                    <ul id="accordionTwo" class="panel-collapse collapse">
                      <li class="sub-nav"> <a href="#"> <img class="img-responsive" src="./images/smallarrow.png"> Rewards for this Rating </a> </li>
                      <li class="sub-nav"> <a href="#"> <img class="img-responsive" src="./images/smallarrow.png"> Cumulative Rewards </a> </li>
                      <li class="sub-nav"> <a href="#"> <img class="img-responsive" src="./images/smallarrow.png"> Redeem Rewards </a> </li>
                    </ul>
                  </li>
                  <li> <a data-toggle="collapse" data-parent="#accordion"   href="#accordionThree"> <img class="img-responsive analysis-result" src="./images/brows.png"> BROWSE MORE VIDEOS </a> 
                  
                  </li>
                  <li> <a data-toggle="collapse" data-parent="#accordion"   href="#accordionFour"> <b>Hall of Fame</b> </a>
                    <ul id="accordionFour" class="panel-collapse collapse">
                      <li class="sub-nav"> <a href="#"> <img class="img-responsive" src="./images/smallarrow.png"> Option 1 </a> </li>
                      <li class="sub-nav" id="sub-nav-id" style="border-bottom: none;"> <a href="#"> <img class="img-responsive" src="./images/smallarrow.png"> Option 2 </a> </li>
                    </ul>
                  </li>
                </ul>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-md-9">
 <p class="text-center"><strong><a href="javascript:void(1)" onclick="javascript:stop_call()" class="btn btn-primary">Rate This video</a></strong></p>
</div>
<div class="col-md-3"><img class="img-responsive" src="<?php echo $_smarty_tpl->getVariable('CompanyLogoSmall')->value;?>
" /></div> 
</div>
 
 <div class="row  margin-top">
				<div class="col-md-6" style="padding:0">
					
					<div class="container-fluid panel panel-default" style="height:225px;">
						<div class="panel-heading">
							<strong>Hall of Fame</strong>
						</div>
						<div class="row margin-top padding" style="margin-top:5%;">
							<div class="col-md-12 ">
								<img class="img-responsive" src="./images/first.png">
							</div>
						</div>
						<div class="row margin-top margin-bottom padding">
							<div class="col-md-12 ">
								<img class="img-responsive" src="./images/second.png">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6" style="padding:0">
					<div class="container-fluid panel panel-default">
						<div class="panel-heading">
							<strong>Comparison</strong>
						</div>
						<div class="row padding-both">
							<div class="col-md-12">
								<div class="BarTableVertical ">
									<table >
              <tr class="BarVertical">
                <td><span class='sad select_me' id="Sad"></span>
                  <div  class="sad chart-column" style="background: #cc324c;"></div></td>
                <td><span class='disgusted select_me' id="Disgusted"></span>
                  <div  class="disgusted chart-column" style="background: #fbb150;"></div></td>
                <td><span class='angry select_me' id="Angry"></span>
                  <div  class="angry chart-column" style="background: #fbb150;"></div></td>
                <td><span class='normal select_me' id="Normal"></span>
                  <div  class="normal chart-column" style="background: #fbb150;"></div></td>
                <td><span class='fear select_me' id="Fearful"></span>
                  <div  class="fear chart-column" style="background: #fbb150;"></div></td>
                <td><span class='surprised select_me' id="Surprised"></span>
                  <div  class="surprised chart-column" style="background: #fbb150;"></div></td>
                <td><span class='happy select_me' id="Happy"></span>
                  <div  class="happy chart-column" style="background: #90d626;"></div></td>
              </tr>
              <tr>
                <td><img class="full-width" src="./images/sad.jpg"></td>
                <td><img class="full-width" src="./images/disgusted.jpg"></td>
                <td><img class="full-width" src="./images/angry.jpg"></td>
                <td><img class="full-width" src="./images/normal.jpg"></td>
                <td><img class="full-width" src="./images/fear.jpg"></td>
                <td><img class="full-width" src="./images/surprised.jpg"></td>
                <td><img class="full-width" src="./images/happy.jpg"></td>
              </tr>
            </table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
<script>
/* By dinesh Start*/
	var content_id="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
";
	jQuery.ajax({
	type: "POST",
	url:"comparison.php?content_id="+content_id,
	dataType: "JSON",
		success: function(js){
			var happy= Math.round(js[7]*20);
			var normal= Math.round(js[4]*20);
			var sad= Math.round(js[1]*20);
			var angry= Math.round(js[3]*20);
			var surprised= Math.round(js[6]*20);
			var disgusted= Math.round(js[2]*20);
			var fearful= Math.round(js[5]*20);
			if(happy>0)
			jQuery('#Happy').html(happy+'%'); // Happy
			if(normal>0)
			jQuery('#Normal').html(normal+'%'); // Normal
			if(sad>0)
			jQuery('#Sad').html(sad+'%'); // Sad
			if(angry>0)
			jQuery('#Angry').html(angry+'%'); // Angry
			if(surprised>0)
			jQuery('#Surprised').html(surprised+'%'); // Surprised
			if(disgusted>0)
			jQuery('#Disgusted').html(disgusted+'%'); // Disgusted
			if(fearful>0)
			jQuery('#Fearful').html(fearful+'%'); // Fearful
			
		jQuery('div .happy').css('height',happy); // Happy
		jQuery('div .normal').css('height',normal); // Normal
		jQuery('div .sad').css('height',sad); // Sad
		jQuery('div .angry').css('height',angry); // Angry
		jQuery('div .surprised').css('height',surprised); // Surprised
		jQuery('div .disgusted').css('height',disgusted); // Disgusted
		jQuery('div .fear').css('height',fearful); // Fearful
			
		},
		error: function(){
			alert("Please try again. Server have not sent response.");
		}
	});

/*By dinesh End*/


// allowed tells weather to take snapshots or not
var allowed = false;
var recording = false;
var localMediaStream;

/////////// Youtube Iframe API ////////////////  
// 1. This code loads the IFrame Player API code asynchronously.
	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;
	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			height: '470',
			width: '100%',
			playerVars: {'rel':0 },
			videoId: '<?php echo $_smarty_tpl->getVariable('video_id')->value;?>
',
			events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
			}
		});
	}
	
	
// 3. The API will call this function when the video player is ready.
	function onPlayerReady(event) {
		window.video_duration = player.getDuration();
	}

	var done = false;
	function onPlayerStateChange(event) {
	if(event.data == YT.PlayerState.ENDED) {
		allowed=false;
		i=0;
		stopRecordingWebcam();
		recording = false;
	}
	else {
		if(event.data == YT.PlayerState.PLAYING) {
			allowed=true;
			if(!recording && localMediaStream) {
				startRecordingWebcam();
				takeSnapshot();
			}
		}
		else {
			allowed=false;
		}   
	}
		$('#svg_chart').css('display','block');
	}

	function stopVideo() {
		player.stopVideo();
	}
	
	
/////////// Youtube Iframe API ////////////////

/////////////Recording Section //////////////////
//navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
 window.getUserMedia = function (options, successCallback, errorCallback) {
  // Options are required
  if (options !== undefined) {

	  // getUserMedia() feature detection
	  navigator.getUserMedia_ = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

	  if ( !! navigator.getUserMedia_) {

			  try {
				  // try string syntax
				  // if the config object failes, we try a config string
				  navigator.getUserMedia_(option_string, successCallback, errorCallback);
			  } catch (e2) {
				  // both failed
				  // neither object nor string works
				  return undefined;
			  }
		  }
	  }
	}

	var neutral = [];
	var happy=[];
	var sad=[];
	var surprised = [];
	var angry = [];
	var scared = [];
	var disgusted = [];
	var emotions;
	var user = '<?php echo $_smarty_tpl->getVariable('user')->value['user_fname'];?>
';
	var cf_id = '<?php echo $_smarty_tpl->getVariable('cf_id')->value;?>
';
	var time,timestamp;
	var frames = [];
	var recorder;
	
	
	function draw(v,c) {
		if(v.paused || v.ended) return false;
		try {
		  c.drawImage(v,0,0,80,60);
		  c.beginPath();
		  c.rect(0,0,80,60);
		  c.strokeStyle='#FF0000';
		  c.lineWidth='1';
		  c.stroke();
		  setTimeout(draw,100,v,c);
		} catch (e) {
		  if (e.name == "NS_ERROR_NOT_AVAILABLE") {
			  setTimeout(function(){ draw(v,c); }, 50);
		  } else {
			  throw e;
		  }
		}
	  }

	function drawBox() {
	var cvs = document.getElementById('webcam_canvas');
	var ctx = cvs.getContext('2d');
	video = document.getElementById('webcam_video');
	video.addEventListener('playing',startDraw);
		
		function startDraw() {
			draw(video,ctx);
		}
	}

	function startRecordingWebcam() {
	  recording=true;
	  var options = {
		  type: 'video'
	  };
	  recorder = RecordRTC(localMediaStream,options);
	  recorder.startRecording();
	}
	
	function stopRecordingWebcam() {
		if(recorder) {
			recorder.stopRecording(function(url) {
			});
		}
		uploadVideo(recorder.getBlob());
	}
                                  
	function uploadVideo(blob) {
	  var filename = cf_id+'.webm';  // or "wav"
	
	  var formData = new FormData();
	  formData.append('filename', filename);
	  formData.append('video-blob', blob);
	
	  function xhr(url, data, callback) {
		  var request = new XMLHttpRequest();
		  request.onreadystatechange = function () {
			  if (request.readyState == 4 && request.status == 200) {
				 ///alert(request.responseText)
				  callback(request.responseText);
			  }
		  };
		  request.open('POST', url);
		  request.send(data);
	  }
	  
	  xhr('save.php',formData, function (response) {
		  //alert(response);
	  });
	}

	function takeSnapshot() {
	var cvs = document.getElementById('snapshot_canvas');
	var ctx = cvs.getContext('2d');
	if(localMediaStream) {
	  ctx.drawImage(document.getElementById('webcam_video'),0,0,320,240);
	  $('#snapshot_image').attr('src',cvs.toDataURL('image/jpeg'));
	  if(allowed) { 
		getFaces(takeSnapshot);
	  }
	  else {
		getFaces(function(){});
		$('#snapshot_image').attr('src','');
	  }
	}
	else {
	  setTimeout(takeSnapshot,2000);
	}
	}

	function getBase64Image(img) {
		return document.getElementById('snapshot_canvas').toDataURL('image/jpeg');
	}
                                    
	function getFaces(callback)
	{
		time = Math.floor(player.getCurrentTime());
		timestamp = new Date().getTime();
		if(time>=video_duration) {
			callback();
			return;
		}
		
		var json;
		var diff,rem;
		var hh = Math.floor(time/3600)%60, mm = Math.floor(time/60)%60, ss = time%60;
		var str = (hh<10?"0"+hh.toString():hh.toString()) + ":" + (mm<10?"0"+mm.toString():mm.toString()) + ":" + (ss<10?"0"+ss.toString():ss.toString()) + ".000";
	
	var c_id = <?php echo $_smarty_tpl->getVariable('content')->value['c_id'];?>
;
	
	$.ajax({
	
	type: 'POST',
	url: 'post.php',
	data: { "myImage": getBase64Image(),"filename":"test"},
	success: function (json,status,jqXHR) {
		json = '{"Time":'+time+','+'"previous_facebox":'+previous_facebox+','+json.substr(1,json.length-2); 
		//alert(json);
		try {
		  $.ajax({
			type: 'POST',
			url: 'insert_results.php',
			data: { "myImage": getBase64Image(),"text": json,"user":user+'_'+cf_id,"time":str,"timestamp":timestamp,"cf_id":cf_id,"c_id":c_id,"duration":video_duration},
			success: function (result,status,jqXHR) {
				  //alert("Result :"+result);
				},
			error: function (jqXHR,text_status,err_msg) {
				  //alert('ERROR : '+text_status+' '+err_msg);
				}
		  });
		  json = JSON.parse(json).Faces;
		  if(json) previous_facebox=JSON.stringify(json[0].FaceBoxCorners);
		  else previous_facebox=-1;
		  if(json && json[0].FacialExpression) {
			neutral.push({x:time,y:json[0].FacialExpression.Neutral});
			happy.push({x:time,y:json[0].FacialExpression.Happy});
			sad.push({x:time,y:json[0].FacialExpression.Sad});
			surprised.push({x:time,y:json[0].FacialExpression.Surprised});
			angry.push({x:time,y:json[0].FacialExpression.Angry});
			scared.push({x:time,y:json[0].FacialExpression.Scared});
			disgusted.push({x:time,y:json[0].FacialExpression.Disgusted});
			emotions = [
						{
						  values: neutral,
						  key: "Neutral",
						  color: "#181818"
						},
						{
						  values: happy,
						  key: "Happy",
						  color: "#ff7f0e"
						},
						{
						  values: sad,
						  key: "Sad",
						  color: "#2ca02c"
						},
						{
						  values: surprised,
						  key: "Surprised",
						  color: "#33ccff"
						},
						{
						  values: angry,
						  key: "Angry",
						  color: "#cc0000"
						},
						{
						  values: scared,
						  key: "Scared",
						  color: "#669933"
						},
						{
						  values: disgusted,
						  key: "Disgusted",
						  color: "#993366"
						}
					  ];
			/*nv.addGraph(function() {
			  var chart = nv.models.lineChart();
			  var fitScreen = false;
			  var width = 950;
			  var height = 225;
	
			  chart.useInteractiveGuideline(true);
			  chart.margin({left: 20})
			  chart.xAxis.tickFormat(d3.format(',r'));
	
			  chart.yAxis.tickFormat(d3.format(',.2f'));
	
			  chart.width(width).height(height);
			  $('#svg_chart').css('display','block');
			  d3.select('#svg_chart svg')
				  .attr('perserveAspectRatio', 'xMinYMid')
				  .attr('width', width)
				  .attr('height', height)
				  .datum(emotions)
				  .call(chart);
			  return chart;
			});*/
		  }
		  callback();
		} catch(e) {
		  //alert(json+' ERROR : '+e);
		  setTimeout(callback,100);
		}
	  },
	error: function (jqXHR,text_status,err_msg) {
		//alert('ERROR : '+text_status+' '+err_msg);
		callback();
	  }
	
	});
	}

	function success(stream) {
		$('#webcam_video').attr('src',window.URL.createObjectURL(stream));
		localMediaStream = stream;
		var state = player.getPlayerState();
		if(!recording && state>0 && state!=5) {
			startRecordingWebcam();
			takeSnapshot();
		}
		drawBox();
	}

	function fallback() {
	  alert('Unable to access webcam');
	}
	
	function hasGetUserMedia() {
	return !!(navigator.getUserMedia);
	}
	
	
	function check() {
	if (hasGetUserMedia()) {
	  navigator.getUserMedia({video:true},success,fallback);
	} else {
	  alert('getUserMedia() is not supported in your browser');
	}
	}
	
	emotions = [
				{
				  values: [{x:0,y:0}],
				  key: "Neutral",
				  color: "#181818"
				},
				{
				  values: [{x:0,y:0}],
				  key: "Happy",
				  color: "#ff7f0e"
				},
				{
				  values: [{x:0,y:0}],
				  key: "Sad",
				  color: "#2ca02c"
				},
				{
				  values: [{x:0,y:0}],
				  key: "Surprised",
				  color: "#33ccff"
				},
				{
				  values: [{x:0,y:0}],
				  key: "Angry",
				  color: "#cc0000"
				},
				{
				  values: [{x:0,y:0}],
				  key: "Scared",
				  color: "#669933"
				},
				{
				  values: [{x:0,y:0}],
				  key: "Disgusted",
				  color: "#993366"
				}
			  ];

 /* nv.addGraph(function() {
	var chart = nv.models.lineChart();
	var fitScreen = false;
	var width = 950;
	var height = 225;

	chart.useInteractiveGuideline(true);
	chart.margin({left: 20})
	chart.xAxis.tickFormat(d3.format(',r'));

	chart.yAxis.tickFormat(d3.format(',.2f'));

	chart.width(width).height(height);
	d3.select('#svg_chart svg')
		.attr('perserveAspectRatio', 'xMinYMid')
		.attr('width', width)
		.attr('height', height)
		.datum(emotions)
		.call(chart);
	return chart;
  });
*/
  
  
	$( document ).ready(function() {
		setTimeout(function()
		{
			check();
		}, 3000);
	});
 
</script> 

        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

  
    <!-- Bar Chart Script -->
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
</body>
</html>