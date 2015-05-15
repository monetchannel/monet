<?php /* Smarty version Smarty-3.0.6, created on 2015-02-09 10:27:00
         compiled from ".\templates\watch_video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95854d87d645d45e0-10171710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62a52663bde12917e1242ffeb1c348e75526946d' => 
    array (
      0 => '.\\templates\\watch_video.tpl',
      1 => 1423473995,
      2 => 'file',
    ),
    '0d4a301e9a9bd7472ca7380bd9c60a07e58d9e15' => 
    array (
      0 => '.\\templates\\watch_video_header.tpl',
      1 => 1421828001,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95854d87d645d45e0-10171710',
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
    	
    	<!-- Page Content -->
		<!-- Page Content -->

        

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

<script type="text/javascript" src="js/swfobject.js"></script> 
<script type="text/javascript" src="js/mic.js"></script> 
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

//-----------------------
var params = {};
params.wmode = "transparent";
swfobject.embedSWF("swf/Sample.swf", "mygrapph_popup", "500", "170", "9.0.0", "swf/expressInstall.swf",false,params);

function FlashRating(rating,ep_id)
{
	document.getElementById('my_rating').value=rating;
	document.getElementById('cf_ep_id').value=ep_id;
}
//-----------------------

</script>

<input type="hidden" name="rated" id="rated" value="" />
			
<!-- Page Content -->

<div class="container">
	
<!-- Top Content -->
<div class="row  margin-top">
	<div class="col-md-12" >
		<div class="logo">
			<img class="img-responsive" src="./images/logo.png"></img>
		</div>
		<div id="videoPanel" class="panel panel-default">
			<div class="panel-heading">
				<strong><em><?php echo $_smarty_tpl->getVariable('content')->value['c_title'];?>
!</em></strong>
				<div id="browseVideo" class="pull-right">
					<span>Browse More Video</span>
					<a  href="#" id="browse-more">
						<img class="img-responsive" src="images/sidemenuicon.png"></img>
					</a>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div id="videoContainer" class="col-md-9" style="padding-left:0;padding-right:0;">
						<div class="panel-left-content">
							<!--<video id="video" width="100%" poster="video/poster.png" preload="none" >
								<source id="mp4" type="video/mp4" src="video/trailer.mp4"></source>											
							</video>-->
							<div id="player" style="z-index:1;"></div>
							<!-- Overlay video -->
		                  	<div id="playerover" style="z-index:100; position:absolute;background-color:rgba(0,0,0,0.5);left:0;right:0;top:0;bottom:20px;">
		                  		<!--<img src="images/y_redbtn.png" style="margin-top:25.3%;" class="agreebtn">-->
		                  		<button class="red-tooltip play-video-button agreebtn" data-toggle="tooltip" data-placement="bottom" title="Click Play to Start Rating" style="top:43%;"></button>
		                  	</div>
						  	<!-- Overlay video -->
						  	
							<video width="100%" height="360" id="webcam_video" style="display:none;" autoplay></video>
		                  	<canvas id="webcam_canvas" width="100" height="80" style="position:absolute;right:25px;bottom:15px;z-index:5;"></canvas>
		                  	<canvas id="snapshot_canvas" width="320" height="240" style="display:none;"></canvas>
		                  	<img id="snapshot_image" width="320" height="240" style="display:none;"> </div>
		                  	
							<!--
							<div class="col-md-8" style="font-size:12px;">Length:0.28/2.48</div>
							<div class="col-md-4" style="font-size:12px; padding-right: 0; text-align: right;">Category:Best Advertisement</div>
							-->
							
						</div>
						
						<div id="emotionWave" class="col-md-12">
							<img class="img-responsive video pull-right" src="images/emotion.jpg"></img>
						</div>
						<!--
						<div id="rightMenu" class="col-md-3">
							<div class="panel-right-content">
								<div id="sidebar-wrapper">
									<ul class="sidebar-nav">
										
										<li>
											<a data-toggle="collapse" data-parent="#accordion"   href="#accordionOne">
												<img class="img-responsive video" src="./images/rating.png"></img>
												SHARE
											</a>
											<ul id="accordionOne" class="panel-collapse collapse">
												<li class="sub-nav">
													<a href="javascript:void(0)" id="fbshare" class="fbshare">
														<img class="img-responsive" src="images/fb.png"/>
													</a>
												</li>
												<li class="sub-nav">
													<a href="#">
														<img class="img-responsive" src="images/twitter.png"/>
													</a>
												</li>
												<li class="sub-nav">
													<a href="#">
														<img class="img-responsive" src="images/google.png"/>
													</a>
												</li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-parent="#accordion"   href="#accordionTwo">
												<img class="img-responsive user" src="./images/rewards.png"></img>
												REWARDS
											</a>
											<ul id="accordionTwo" class="panel-collapse collapse">
												<li class="sub-nav">
													<a href="#">
														<img class="img-responsive" src="./images/smallarrow.png">
														Rewards for this Rating
													</a>
												</li>
												<li class="sub-nav">
													<a href="#">
													<img class="img-responsive" src="./images/smallarrow.png">
													Cumulative Rewards
												</a>
												</li>
												<li class="sub-nav">
													<a href="#">
														<img class="img-responsive" src="./images/smallarrow.png">
														Redeem Rewards
													</a>
												</li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-parent="#accordion"   href="#accordionThree">
												<img class="img-responsive analysis-result" src="./images/brows.png">
												BROWSE MORE VIDEOS
											</a>
											
											<ul id="accordionThree" class="panel-collapse collapse">
												
												<li class="sub-nav">
													
													<a href="#">
														<img class="img-responsive" src="./images/smallarrow.png">
														Option 1
													</a>
													
												</li>
												<li class="sub-nav" id="sub-nav-id" style="border-bottom: none;">
													<a href="#">
														<img class="img-responsive" src="./images/smallarrow.png">
														Option 2
													</a>
												</li>
												
											</ul>
											
											
										</li>
										<li>
											<a data-toggle="collapse" data-parent="#accordion"   href="#accordionFour">
												<img class="img-responsive video" src="./images/rating.png"></img>
												HAll OF FAME
											</a>
											<ul id="accordionFour" class="panel-collapse collapse">
												
												<li class="sub-nav">
													
													<a href="#">
														<img class="img-responsive" src="./images/smallarrow.png">
														Option 1
													</a>
													
												</li>
												<li class="sub-nav" id="sub-nav-id" style="border-bottom: none;">
													<a href="#">
														<img class="img-responsive" src="./images/smallarrow.png">
														Option 2
													</a>
												</li>
												
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
						-->
						
					</div>
						
				</div>
			</div>
		</div>
	</div>
</div>


<!-- <!-- Video Play Start Modal -->
	<div class="modal fade video-popup" id="videoAgree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="videoAgreeForm" role="form">
					<div class="modal-header">
						<!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
						<h4 class="modal-title" id="myModalLabel">Video Capturing </h4>
					</div>
					<div class="modal-body" style=" padding: 0;">
						
							<h4>Start Monet Recording and Rating</h4>
						
						
						<ul type="number">
							<li class="form-group">
								<div class="video-label">
									<input class="check-input" id="agree" type="checkbox" value="" checked disabled >	
									By Clicking OK user is consenting to capture their expressions for Monet Rating
								</div>								
							</li>
						</ul>	
						
					</div>
					<div class="modal-footer">
						<div id="agreeSubmit" class="form-group" style="text-align:center;">
							<button type="submit" class="ok-button">OK</button>
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
	
	
	<!-- Video Play End Modal -->
	<div class="modal fade video-popup" id="videoGraph" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="ratingfrm" role="form">
					<!-- form hidden values -->
					<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
" name="c_id">
					<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('cf_ch_id')->value;?>
" name="cf_ch_id">
					<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('cf_id')->value;?>
" name="cf_id">
					<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('content')->value['instanceID'];?>
" name="videoID">
					<input type="hidden" value="" name="c_rating" id="my_rating">
					<input type="hidden" value="" name="cf_ep_id" id="cf_ep_id">
					<!-- form hidden values -->
					<div class="modal-header">
						<!--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
						<h4 class="modal-title" id="myModalLabel">Thanks for rating through Monet!</h4>
					</div>
					<div class="modal-body">
					<div>
						<?php if (count($_smarty_tpl->getVariable('questions')->value)>0){?>
						<ul type="number">
						
							<?php  $_smarty_tpl->tpl_vars['op'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['q'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('questions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['op']->key => $_smarty_tpl->tpl_vars['op']->value){
 $_smarty_tpl->tpl_vars['q']->value = $_smarty_tpl->tpl_vars['op']->key;
?>
							<li class="form-group">
								<div class="video-label"><?php echo $_smarty_tpl->tpl_vars['op']->value['q_question'];?>
</div>
								<div class="styled-select">
									<select name="ans[<?php echo $_smarty_tpl->tpl_vars['op']->value['q_id'];?>
]">
										<option value="">-Select-</option>
										<?php  $_smarty_tpl->tpl_vars['opv'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['opk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['op']->value['option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['opv']->key => $_smarty_tpl->tpl_vars['opv']->value){
 $_smarty_tpl->tpl_vars['opk']->value = $_smarty_tpl->tpl_vars['opv']->key;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['opk']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['opv']->value;?>
</option>
										<?php }} ?>
									</select>
								</div>
							</li>
							<?php }} ?>
						</ul>
						<?php }?>
						
						<div class="top-desc">
							Comment about this video or click Record icon to speak something about this video.
							<a  class="pull-right" style="cursor:pointer">
								<img id="mic" width="40" height="40" src="images/mic.gif" onClick="toggle();">
							</a>
						</div>
						
						<textarea name="comment" id="comment" class="form-control text-area-field" placeholder="Please enter your comments" ></textarea>
						
						<div style="margin-top:10px;">
							<div id="mygrapph_popup"><object id="mygrapph_popup" width="500" height="170" type="application/x-shockwave-flash" data="swf/Sample.swf" style="visibility: visible;"></object></div>
						</div>
						<div  class="col-md-6" style="margin-top:-6px; padding-bottom: 4%;text-align: center;">
							<button id="graphSubmit" type="submit" class="submit-button">Submit</button>							
						</div>	
						<div class="col-md-6">
							<a id="graphShareSubmit" data-toggle="collapse" data-parent="#accordion"   href="#accordionModal">
								SHARE WITH SUBMIT
								<img class="img-responsive video" src="./images/rating.png"></img>
							</a>							
						</div>
												
						
						<ul id="accordionModal" class="panel-collapse collapse">
							<li class="sub-nav">
								<!--<a href="#" id='fbshare' onclick="get_fb_share();">-->
								<a href="javascript:void(0)" id='fbshare' class="fbshare" onclick="">
									<img class="img-responsive" src="images/fb.png"/>
								</a>
							</li>
							<li class="sub-nav">
								<a href="#" id='twshare' class="twshare" onclick="">
									<img class="img-responsive" src="images/twitter.png"/>
								</a>
							</li>
							<li class="sub-nav" id='gshare' class="gshare" onclick="">
								<a href="#">
									<img class="img-responsive" src="images/google.png"/>
								</a>
							</li>
						</ul>	
					<div>
					</div>
					<div class="modal-footer">
						
						
					</div>
				</form>	
			</div>
		</div>
	</div>
	
	<input type="text" id="rated" value="" />

<!--<div class="" data-width="50" data-type="button_count" onclick="get_fb_share();">asdasd</div>--> 
		
<!-- /#page-content-wrapper -->

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



/////////////////////////////////////////////////////


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
		
		/* ------------- added by Girish -------------- */
		
		//player.playVideo();
		$('.agreebtn').on('click', function(){
			//var fcagrFrm = "<form name=\"agreefrm\" action=\"watch_video.php\" method=\"post\" style=\"z-index:300px;\" id=\"agreefrm\"><div class=\"checkbox\"> <label> <input type=\"checkbox\" name=\"agree\" value=\"\" id=\"agree\" />Did you agree for capturing this video?</label></div><button type=\"submit\" class=\"btn btn-primary agreebtn\">Ok</button></form>";
			//cn_window_open("Video Capturing ",fcagrFrm,1);
			//$("#videoAgree").modal({ backdrop:false,keybord:false});
			$('#playerover').remove();
			player.playVideo();
		});
	
		/*$('body').on('submit','#videoAgreeForm', function(e){
			e.preventDefault();
			var agree = $('#agree').is(':checked');
			if(agree == false){
				window.location.href=SERVER_PATH+'new/watch_video.php';
			}else{
				$('#videoAgree').modal('hide');
				$('#videoAgree').remove();
				$('#playerover').remove();
				player.playVideo();
				$("#emotionWave img").attr("src","images/animated-emotion.gif");
				
			}
		});*/
		/* ------------- added by Girish -------------- */
	}



	var done = false;
	var UserId = "<?php echo $_smarty_tpl->getVariable('UserId')->value;?>
";
	var video_id = "<?php echo $_smarty_tpl->getVariable('video_id')->value;?>
";
	function onPlayerStateChange(event) {

	if(event.data == YT.PlayerState.ENDED) {
		
		allowed=false;

		i=0;

		stopRecordingWebcam();

		recording = false;
		
		// ---------------- added by Girish ---------------
		
		$('#videoGraph').modal({ backdrop:false,keybord:false});
		
		document.getElementById('rated').value=1;
		
		$("#emotionWave img").attr("src","images/emotion.jpg");
    	
		// ---------------- added by Girish ---------------
		
	}

	else {

		if(event.data == YT.PlayerState.PLAYING) {

			allowed=true;

			if(!recording && localMediaStream) {

				startRecordingWebcam();

				takeSnapshot();

			}
			
			setTimeout(function() {
				$("canvas#webcam_canvas").hide()
			}, 10000);

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

// ---------------- added by Girish ----------------------------
var SERVER_PATH="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
";
// watch video path
var wl = window.location.hostname + window.location.pathname;
var cfid = "<?php echo $_smarty_tpl->getVariable('cf_id')->value;?>
";

$(function() {
	/*
	$('.agreebtn').on('click', function(){
		var fcagrFrm = "<form name=\"agreefrm\" action=\"watch_video.php\" method=\"post\" style=\"z-index:300px;\" id=\"agreefrm\"><div class=\"checkbox\"> <label> <input type=\"checkbox\" name=\"agree\" value=\"\" id=\"agree\" />Do you Agree? </label></div><button type=\"submit\" class=\"btn btn-primary agreebtn\">Ok</button></form>";
		cn_window_open("When you watch video our app will capture your face reaction!",fcagrFrm,1);
	});
	
	$('body').on('submit','#agreefrm', function(e){
		e.preventDefault();
		var agree = $('#agree').is(':checked');
		if(agree == false){
			window.location.href=SERVER_PATH+'lmsin/watch_video.php';
		}else{
			$('#myModal').modal('hide');
			$('#playerover').remove();
			//var player = YT.Player('player'); 
			//player.playVideo();
		}
	});
	*/
	
	$('#browse-more').on('click',function(){
		window.location = 'http://'+wl;
	});
	
	$('body').on('submit','#ratingfrm', function(e){
		e.preventDefault();
		var frm = $( this ).serialize()
		
		$.ajax({
		
			type : 'POST',
			url : 'xhr_video_rating.php?rp=5',
			data : frm,
			success: function (result) {

		  		//alert(result);
		  		/*
		  		$('#videoContainer').removeClass("col-md-12");
				$('#videoContainer').addClass("col-md-9");
				$('#rightMenu').show();
				$("#videoPanel").removeClass("normal-size");
				$(".logo").css("width","100%")
				$('#videoGraph').modal('hide');
				$('#videoGraph').remove();
				*/
				
				window.location = 'http://'+wl+'?act=content_feedback&cf_id='+cfid+'&rp=5';
				//alert(result);

			},
			error: function (jqXHR,text_status,err_msg) {
		  		alert('ERROR : '+text_status+' '+err_msg);
			},
		
		});
		
	});
	
	// ------------------------ tw and g share
	$('.twshare, .gshare').on('click', function(e){
		e.preventDefault();
		alert('is to be copleted!');
	});
	
	
	// ------------------------- fb share btn
	//https://www.facebook.com/sharer/sharer.php?u=URLENCODED_URL&t=TITLE
	var loca = window.location.href, title = $('title').text(), vlink = "https://www.youtube.com/embed/"+ "<?php echo $_smarty_tpl->getVariable('video_id')->value;?>
";
	
	$('.fbshare').on('click', function(e){
		e.preventDefault;
		//var window_size = "width=585,height=368";
		//var fbl = "https://www.facebook.com/sharer/sharer.php?u="+loca+"&t="+title;
		//window.open(fbl, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,' + window_size);
		//return false; 
		
		var rfrm = true;
		var frm = $( '#ratingfrm' ).serialize();
		if($('#my_rating').val() == '' && $('#cf_ep_id').val() == '')
		{
			rfrm = false;
		}
		
		
		//onclick="get_fb_share();"
		
		if(rfrm == true)
		{
			$(this).removeClass('fbshare');
			var fbsl = window.location.href;
			var fbt = $('title').text();
		    FB.ui({
		     method: 'feed',
		     //name: fbt,
		     link: vlink,
		     //link: fbsl,
		     //caption: 'Testing',
		     //description: 'Dialogs provide a simple, consistent interface for applications to interface with users.',
		     //message: 'Facebook Dialogs are easy!'
		   },
		   function(response) {
		     if (response && response.post_id) {
		       	$.ajax({
				
					type : 'POST',
					url : 'xhr_video_rating.php?rp=15',
					data : frm,
					success: function (result) {		
						//window.location = 'http://'+wl+'?act=content_feedback&cf_id='+cfid+'&rp=15';
						window.location = 'http://'+wl+'?act=content_feedback&cf_id='+cfid+'&rp=15';
					},
					error: function (jqXHR,text_status,err_msg) {
				  		alert('ERROR : '+text_status+' '+err_msg);
					},
				
				});
		     } else {
		       alert('Post was not published.');
		     }
		   });
	   }else {
	   		alert('Please rate this video.');	
	   }
	   
	});
});
// ---------------- End Girish ----------------------------
</script> 

<script type="text/javascript">

$(function(){
	$('[data-toggle="tooltip"]').tooltip();
	$('#rightMenu').hide();
	$("#videoPanel").addClass("normal-size");
	//$("#browseVideo").hide();
	//$("#browseVideo").fadeOut();
	$('#videoContainer').removeClass("col-md-9");
	$('#videoContainer').addClass("col-md-12");
	/*$('#rightMenu').click(function(event){
		$('.popover').removeClass('in');
	});*/
	/*
	var videoId = document.getElementById("player");
	$(videoId).on('play', function() {
		
		//Actions when video play selected
		$("#browseVideo").fadeIn(2000);				 
	});
	
	$("#videoAgreeForm").submit(function(){
		//$("#video").attr("controls","controls");
		//$("#buttonbar").hide();
		$('#videoAgree').modal('hide');
		//videoId.play();
		return false;
	});
	/*
	$("video").bind("ended", function() {
	    $('#videoGraph').modal('show');
		var video = document.getElementById("video");
		video.currentTime = 0;
		$("video").attr("poster","video/poster.png")
	});
	
	$("#videoForm").submit(function(){
		$('#videoContainer').removeClass("col-md-12");
		$('#videoContainer').addClass("col-md-9");
		$('#rightMenu').show();
		$("#videoPanel").removeClass("normal-size");
		$(".logo").css("width","100%")
		$('#videoGraph').modal('hide');
		return false;
	});
	*/
	$( 'body' ).on( 'click', '.dropdown-menu li', function( event ) {

	  var ttarget = $( event.currentTarget );
	  alert($ttarget);
	  ttarget.closest( '.btn-group' ).find( '[data-bind="label"]' ).text( $target.text() ).end().children( '.dropdown-toggle' ).dropdown( 'toggle' );

	  return false;

   });
});

</script>



        <!-- /#page-content-wrapper -->

	<div id="wrapper">


  

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

function get_fb_share()
{
	
	var fbsl = window.location.href;
	var fbt = $('title').text();
    FB.ui({
     method: 'feed',
     name: fbt,
     link: fbsl,
     caption: 'Testing',
     //description: 'Dialogs provide a simple, consistent interface for applications to interface with users.',
     //message: 'Facebook Dialogs are easy!'
   },
   function(response) {
     if (response && response.post_id) {
       alert('Post was published.');
     } else {
       alert('Post was not published.');
     }
   });
   
   //alert('hello');
}

</script>

</body>

</html>