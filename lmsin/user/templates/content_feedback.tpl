{extends file="video_list_header.tpl"}
{block name=body}
						<!--
						<table class="table table-bordered"> 
							<tbody>
								<tr class="">
									<td class="field-label col-xs-3 col-sm-3 col-md-2">
										<img class="img-responsive full-width" src="{$content.c_thumb_url}"></img> 
									</td>
									<td class="col-md-4 second-td">
										<span style="color:#E9576E">Congratulations!</span> <span style="color:#302257;">You Completed Ratting.</span><br>
										<span style="color:#302257;">You won {$rp} reward points</span>
									</td>
								</tr>
								<tr class="">
									<td class="field-label col-xs-3 col-sm-3 col-md-2 ">
										<img class="img-responsive full-width" src="../files/prize_thumb/{$reward.r_image}"></img> 
									</td>
									<td class="col-md-3 second-td">
										<span style="color:#0855CB;">{$reward.title}<span><br>
										<span style="color:#E9576E">{$reward.points} Points</span>
									</td>
									<td class="col-md-7 third-td">
										<span style="color:#302257;">Total Points:</span> <span style="color:#E9576E">{$user_data.points}</span><br>
										<span style="color:#302257;">Required Points for new Redeem: </span><span style="color:#E9576E">{$reward.points - $user_data.points}</span>
									</td>
								</tr>
							</tbody>
						</table>
						-->
							
						<table class="user-expression table table-bordered"> 
							<tbody>
								<tr class="">
									<td class="field-label col-xs-3 col-sm-3 col-md-1">
                                                                         
										<img class="img-responsive full-width" src="{$content.c_thumb_url}"style="width:150px"/></img> 
									</td>
									<td class="col-md-5 second-td">
                                                                           
                                                                            <span style="color:#614197;font-size: 18px;"><b>Congratulations!</b></span> <span style="color:#614197;font-size: 18px;">You Completed Rating.</span><br>
										<span style="color:#614197;">You won {$rp} rewards</span>
										
									</td>
								</tr>
							</tbody>
						</table>
                                                 <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>Points And Rewards</strong></div></div>
                                                                                </br>
                                                                                </br>
						<div class="container-fluid" style="border-bottom:1px solid #ddd;padding-bottom:1%">
							<div class="row ">
								<div  class="col-md-12">
									<!--<div class="top-title-string">Points & Goals</div>	-->
									<div class="row">
										<div class="col-md-3" style="font-size:16px;padding-top:80px">
                                                                                    <span style="color:#614197;">Your Total Points:</span> <span style="color:#E9576E"><b>{$user_points}</b></span><br>
										</div>
										<div class="col-md-6">
										
											
											<div id="rewardsCircle" class="rewardsCircle"></div>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
                                                                                
                                                   
                                                                                
						 <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>Your Emotion</strong></div></div>
                                                                                </br>
                                                                                </br>
						<div class="container-fluid expression-container">
									
							<div class="row border-bottom col-row" style="padding-bottom:0;">
								{if isset($u_exp.neutral)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Neutral</span>
										<img class="img-responsive " src="images/dashboard/neutral.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.neutral.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.happy)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Happy</span>
										<img class="img-responsive " src="images/dashboard/happy.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/{$u_exp.happy.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.sad)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Sad</span>
										<img class="img-responsive " src="images/dashboard/sad.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/{$u_exp.sad.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.angry)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Angry</span>
										<img class="img-responsive " src="images/dashboard/angry.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/{$u_exp.angry.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.surprised)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Surprised</span>
										<img class="img-responsive " src="images/dashboard/surprised.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/{$u_exp.suprised.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.scared)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Scared</span>
										<img class="img-responsive " src="images/dashboard/scared.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/{$u_exp.scared.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.disgusted)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Disgusted</span>
										<img class="img-responsive" src="images/dashboard/disgusted.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/{$u_exp.disgusted.ad_id}.jpg">
									</a>
								</div>
								{/if}
							</div>
							
							<div class="row border-bottom">
								<div class="col-md-12">
									<!-- <a href="#" class=""> -->
										<div style="color: #444; font-size: 19px; margin: 0 auto; width: 50%;">Me</div>
										<div class="emotion-container"> </div>
									<!-- </a> -->
								</div>
							</div>
							<div class="row border-bottom">
								<div class="col-md-12">
									<!-- <a href="#" class=""> -->
										<div style="color: #444; font-size: 19px; margin: 0 auto; width: 50%;">All</div>
										<div class="allemotion-container"> </div>
									<!-- </a> -->
								</div>
							</div>
                                                        
                                                        
                                                        <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>Your Emotion</strong></div></div>
                                                     <!--radar chart design --->
                                                    <div id="chartdiv" style="width:600px; height:400px;"></div>
                                                    <div id="legenddiv" style="width:200px; height:400px;"></div>
                                                        
                                      <div class="panel panel-default" style=max-width:750px;height:20px;"></br>
                                                     <div class="panel-heading"><strong>Rate More Video</strong></div></div>
                                                                                </br>
                                                                                </br>                  
							<div class="row border-bottom">
								<div class="col-md-12">
								
										
											Recently Added
										{foreach $latest_videos as $k=>$v}
											{if $v.i%6==0}
											{if $v.i>0}
											{/if}
										<div class="row border-bottom">
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
												</a>
											</div>
					 	
											{else}
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
												</a>
											</div>
											{/if}
										{/foreach}
										</div>
										
										Most Reviewed
										{foreach $most_reviewed as $k=>$v}
											{if $v.i%6==0}
											{if $v.i>0}
											{/if}
										<div class="row border-bottom">
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br>{$v.c_date}</div>
												</a>
											</div>
					 	
											{else}
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
												</a>
											</div>
											{/if}
										{/foreach}
										</div>
								</div>
							</div>
						</div>
						
                                        </div>
						<!--
						<table class="table table-bordered"> 
							<tbody>	
								<tr class="">
									<td class="col-xs-12 col-sm-12 col-md-12">
										<img class="img-responsive full-width" src="./images/dashboard/graph2.png"></img>
										<img class="img-responsive full-width" src="./images/dashboard/face1.png"></img> 
									</td>
								</tr>
							</tbody>
						</table>
						-->
										
					<div class="col-md-2" style="background-color:#fff;">
						
						{foreach $companies as $k=>$v}
						<div class="row">
							<div class="col-md-12 block">
								<a class="" href="{$SERVER_PATH}user/watch_video.php?filter=true&cat=&brand={$v.company_id}"> 
									<img class="img-responsive" src="{$v.company_logo}" alt="{$v.company_name}"></img> 
								</a>
							</div>
						</div>
						{/foreach}
						
					</div>
				</div>
					
			</div>
			
			
				
			
		</div>	
	
<input type="text" id="rated" value="1" />
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.diagram.js"></script>
<script src="js/circle-progress.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>

<script type="text/javascript">

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

    // The response object is returned with a status field that lets the

    // app know the current login status of the person.

    // Full docs on the response object can be found in the documentation

    // for FB.getLoginStatus().

    if (response.status === 'connected') {

      // Logged into your app and Facebook.

      testAPI();

    } else if (response.status === 'not_authorized') {

      // The person is logged into Facebook, but not your app.

     //// document.getElementById('status').innerHTML = 'Please log ' +

      ///  'into this app.';

    } else {

      // The person is not logged into Facebook, so we're not sure if

      // they are logged into this app or not.

     /// document.getElementById('status').innerHTML = 'Please log ' +

      ///  'into Facebook.';

    }

}



  // This function is called when someone finishes with the Login

  // Button.  See the onlogin handler attached to it in the sample

  // code below.

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



  	// Now that we've initialized the JavaScript SDK, we call 

  	// FB.getLoginStatus().  This function gets the state of the

  	// person visiting this page and can return one of three states to

  	// the callback you provide.  They can be:

  	//

  	// 1. Logged into your app ('connected')

  	// 2. Logged into Facebook, but not your app ('not_authorized')

  	// 3. Not logged into Facebook and can't tell if they are logged into

  	//    your app or not.

  	//

  	// These three cases are handled in the callback function.



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

// Here we run a very simple test of the Graph API after login is

// successful.  See statusChangeCallback() for when this call is made.

function testAPI() {
	console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', function(response) {

		  

		  console.log(response);

		  var json = JSON.stringify(response);

		  jQuery.ajax({

			type: "POST",

			url:"fb_login.php",

			data: { "json":json},

			success: function(js){

					location.href='http://www.monetchannel.com/lmsin/watch_video.php'

					return false;

			},

				error: function(){

				alert("Please try again. Server have not sent response.");

			}

		});

    });
}

  

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
	
	    window.location.reload();
	
	    // Or uncomment the following line to redirect
	
	    //window.location = "http://ykyuen.wordpress.com";

  	});

}

</script>

<script type="text/javascript">
	
	$(function(){
		// 
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
		var ar_id = {$ar_id};
		// heat map
		$.ajax({
			{literal}
			type: 'GET',
			url: "watch_video.php?act=get_heatmap_data&ar_id="+ar_id,
			dataType: 'json',
			success: function(res) {
				if(res)
				{
					var html="";
					$.each(res.emotions,function(key, val){
						var width=(val.duration/res.totalLength) * 100;
						console.log(JSON.stringify(val));
						html=html+'<div class="'+val.emotion+' emotion-inline" style="width:'+width+'%"></div>';
					});
					$(".emotion-container").html(html);
				}else {
					$(".emotion-container").html('');
				}
			},
			error: function (jqXHR,text_status,err_msg) {
				alert('ERROR : '+text_status+' '+err_msg);
			},
			{/literal}
		});
		
		// get cumulative heat map data
		var c_id = '{$content.c_id}';
		$.ajax({
			{literal}
			type: 'GET',
			url: "watch_video.php?act=get_all_heatmap_data&c_id="+c_id,
			dataType: 'json',
			success: function(res) {
				if(res)
				{
					var html="";
					$.each(res.emotions,function(key, val){
						var width=(val.duration/res.totalLength) * 100;
						console.log(JSON.stringify(val));
						html=html+'<div class="'+val.emotion+' emotion-inline" style="width:'+width+'%"></div>';
					});
					$(".allemotion-container").html(html);
				}else {
					$(".allemotion-container").html('');
				}
			},
			error: function (jqXHR,text_status,err_msg) {
				alert('ERROR : '+text_status+' '+err_msg);
			},
			{/literal}
		});
		
	<!-- ******************************* Rate More Video ****************************** -->
		
		
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
		


	/*
	 *   - image fill; image should be squared; it will be stretched to SxS size, where S - size of the widget
	 *   - fallback color fill (when image is not loaded)
	 *   - custom widget size (default is 100px)
	 *   - custom circle thickness (default is 1/14 of the size)
	 */
	var title ="{$reward.title}";
	var subTitle = '{$reward.sub_title}';
	var goalPoints = '{$reward.points}';
	var userPoint = {$user_points};
	var totalPoint = {$reward['points']};
	var percentages = userPoint*100/totalPoint;
	$('#rewardsCircle').circleProgress({
		value: percentages,
		size: 250,
		startAngle: Math.PI*1.50,
		thickness:12,
		fill: {
			color: 'lime', // fallback color when image is not loaded
			image: 'http://i.imgur.com/pT0i89v.png'
		}
		
	});
	
</script>
 <script type="text/javascript">
            var chart;

            var chartData = [
                [
                    {
                        "direction": "Happy",
                        "current_value": {$chart_data.happy.value.current},
                        "all_value": {$chart_data.happy.value.all},
                        "current_img_src": "{$chart_data.happy.image_path.current}",
                        "all_img_src": "{$chart_data.happy.image_path.all}"
                    },
                    {
                        "direction": "Sad",
                        "current_value": {$chart_data.sad.value.current},
                        "all_value":{$chart_data.sad.value.all},
                        "current_img_src": "{$chart_data.sad.image_path.current}",
                        "all_img_src": "{$chart_data.sad.image_path.all}"
                    },
                    {
                        "direction": "Angry",
                        "current_value": {$chart_data.angry.value.current},
                        "all_value":{$chart_data.angry.value.all},
                        "current_img_src": "{$chart_data.angry.image_path.current}",
                        "all_img_src": "{$chart_data.angry.image_path.all}"
                    },
                    {
                        "direction": "Disgusted",
                        "current_value": {$chart_data.disgusted.value.current},
                        "all_value":{$chart_data.disgusted.value.all},
                        "current_img_src": "{$chart_data.disgusted.image_path.current}",
                        "all_img_src": "{$chart_data.disgusted.image_path.all}"
                    },
                    {
                        "direction": "Neutral",
                        "current_value": {$chart_data.neutral.value.current},
                        "all_value":{$chart_data.neutral.value.all},
                        "current_img_src": "{$chart_data.neutral.image_path.current}",
                        "all_img_src": "{$chart_data.neutral.image_path.all}"
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.neutral.ad_id}.jpg">
                    },
                    {
                        "direction": "Scared",
                        "current_value": {$chart_data.scared.value.current},
                        "all_value":{$chart_data.scared.value.all},
                        "current_img_src": "{$chart_data.scared.image_path.current}",
                        "all_img_src": "{$chart_data.scared.image_path.all}"
                    },
                    {
                        "direction": "Surprised",
                        "current_value": {$chart_data.suprised.value.current},
                        "all_value":{$chart_data.suprised.value.all},
                        "current_img_src": "{$chart_data.suprised.image_path.current}",
                        "all_img_src": "{$chart_data.suprised.image_path.all}"
                    }
                ],
                [
                    
                ]
                
            ];


            AmCharts.ready(function () {
                // RADAR CHART
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = chartData[0];
                chart.categoryField = "direction";
                chart.startDuration = 1;
                
                //LEGEND
                var chartLegend = new AmCharts.AmLegend();
                chartLegend.data = [{ title:"You", color:"#FFCC00" }, { title:"Everyone", color:"#3016B0" } ]
                chart.addLegend(chartLegend, "legenddiv");
                        
                // TITLE
                chart.addTitle("Emotion Radar", 15);

                // VALUE AXIS
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridType = "circles";
                valueAxis.fillAlpha = 0.05;
                valueAxis.fillColor = "#000000";
                valueAxis.axisAlpha = 0.2;
                valueAxis.gridAlpha = 0;
                valueAxis.fontWeight = "bold";
                valueAxis.minimum = 0;
                valueAxis.maximum = 10;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var current_graph = new AmCharts.AmGraph();
                current_graph.lineColor = "#FFCC00";
                current_graph.fillAlphas = 0.4;
                current_graph.bullet = "round";
                current_graph.valueField = "current_value";
                current_graph.balloonText = "[[category]]: [[value]] Unit\n <img class='img-responsive img-thumbnail emotion-indicator' src=[[current_img_src]] alt='[[current_img_src]]'>";
                
                
                var all_graph = new AmCharts.AmGraph();
                all_graph.lineColor = "#3016B0";
                all_graph.fillAlphas = 0.4;
                all_graph.bullet = "round";
                all_graph.valueField = "all_value";
                all_graph.balloonText = "[[category]]: [[value]] Unit\n <img class='img-responsive img-thumbnail emotion-indicator' src=[[all_img_src]] alt='[[all_img_src]]'>";
                chart.addGraph(all_graph);
                chart.addGraph(current_graph);

                // GUIDES
                // blue fill
                var guide = new AmCharts.Guide();
                guide.angle = 225;
                guide.tickLength = 0;
                guide.toAngle = 315;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#f1f1f1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // red fill
                guide = new AmCharts.Guide();
                guide.angle = 45;
                guide.tickLength = 0;
                guide.toAngle = 135;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#f1f1f1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // WRITE                
                chart.write("chartdiv");
            });
        </script>
{/block}
