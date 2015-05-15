<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Monet Dash Board</title>

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
		
		  <link rel="stylesheet" href="style.css" type="text/css">
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="radar.js" type="text/javascript"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
                
                 <script type="text/javascript">
            var chart;

            var chartData = [
                {
                    "direction": "Happy",
                    "value": 8
                },
                {
                    "direction": "Sad",
                    "value": 9
                },
                {
                    "direction": "Angry",
                    "value": 4.5
                },
                {
                    "direction": "Disgusted",
                    "value": 3.5
                },
                {
                    "direction": "Neutral",
                    "value": 9.2
                },
                {
                    "direction": "Scared",
                    "value": 8.4
                },
               
                {
                    "direction": "Surprised",
                    "value": 10
                }
            ];


            AmCharts.ready(function () {
                // RADAR CHART
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = chartData;
                chart.categoryField = "direction";
                chart.startDuration = 1;

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
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.lineColor = "#FFCC00";
                graph.fillAlphas = 0.4;
                graph.bullet = "round";
                graph.valueField = "value";
                graph.balloonText = "[[category]]: [[value]] Unit";
                chart.addGraph(graph);

                // GUIDES
                // blue fill
                var guide = new AmCharts.Guide();
                guide.angle = 225;
                guide.tickLength = 0;
                guide.toAngle = 315;
                guide.value = 0;
                guide.toValue = 14;
                guide.fillColor = "#0066CC";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // red fill
                guide = new AmCharts.Guide();
                guide.angle = 45;
                guide.tickLength = 0;
                guide.toAngle = 135;
                guide.value = 0;
                guide.toValue = 14;
                guide.fillColor = "#CC3333";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // WRITE                
                chart.write("chartdiv");
            });
        </script>


	</head>
	<body>
		<div id="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-5">
              <div style="padding-bottom:10px;"><a href="watch_video.php"><img class="img-responsive" src="./images/logo1.png"></a> 
                   <div class="top-title">
      <form method="get" action="" >
      <input type="hidden" name="filter" value="true">
       <label class="checkbox-inline">Search By:</label>
       <div class="top-select checkbox-inline">
        <select name="cat">
         <option value="">Category</option>
         {foreach $category as $catk=>$catv}
          <option value="{$catv.cat_id}" {$catv.selected}>{$catv.cat_name}</option>
         {/foreach}
        </select>
       </div>
       <label class="checkbox-inline ">or</label>
       <div class="top-select checkbox-inline">
        <select name="brand">
         <option value="">Brand</option>
         {foreach $companies as $comk=>$comv}
          <option value="{$comv.company_id}" {$comv.selected}>{$comv.company_name}</option>
         {/foreach}
        </select>
       </div>
       <!--<input type="button" name="submit" value="Search" class="search-btn"  />-->
       <button type="submit" class="search-btn"style="color:#fff">Search</button>
       <ul class="nav navbar-nav navbar-right">
				  <li>      
							  <a  href="watch_video.php" id="browse-more">
					   <span>Home</span>
					   <i class="browse-video" ></i>
					   </a>
				  </li>
				  <li><a href="account_setting.php">{$smarty.cookies.UserName} !</a></li>
				  <li>
						  <a href="javascript:void(1)" onClick="javascript:{if $smarty.session.FBuserID}logoutFacebook(){else}location.href='index.php?act=logout'{/if}">
				   <span>Logout</span>
				   <i class="logout-icon"></i>
						  </a>
						 </li>
				 </ul>
       </form>
      
      
				 
				  
	</div>
              </div>
            </div>
           </div>
             </div>
        </div>
        
			    
   <!-- header ended -->
		<div id="wrapper">
			<div id="sidebar-wrapper" style="margin-top:-5px;">
				<ul class="sidebar-nav dashboard">
					<!--Include your navigation here-->
                                        <li>
                                        </li>
                                        <li>
						<div id="images">
							{if $user_data.up_fname}
								<img class="img-responsive" src="{$userimage}"style="height:60px;" "style="width:80px;"></img>
							{else}
							<img class="img-responsive" src="./images/dashboard/user.jpg"style="height:60x;" "style="width:60px;"></img>
							{/if}
                                                        <div id="name1">
                                                            <div class="profile-name"><b>{$smarty.cookies.UserName}</b></div>
                                                            
                                                            <div class="profile-address"><b>{$user_data.countries_name}</b></div>
						</div>
						</div>
                                                
					</li>
					
					
					<li   style="border-bottom:none;"padding-bottom:0" class="{$reward_tab}">
						{if $reward_tab==''}
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionfour">
							<img class="img-responsive rewards" src="./images/{if $reward_tab!=''}rewards_ov.png {else}rewards.png{/if}"></img>
							Rewards
							</a>
						{else}
							<a href="javascript:void(1)">
							<img class="img-responsive video" src="./images/rewards.png">Rewards</a></img>
						{/if}
						<ul id="accordionfour" class="panel-collapse collapse" style="background:#ececec; {if $reward_tab!=''}display:block {/if}">
							<li class="sub-nav {$active_cumulative_rewards_tab}" >
								<a href="index.php?act=cumulative_rewards">
								<img class="img-responsive" src="./images/arrow.png"></img>Cumulative Rewards
								</a>
							</li>
							
							<li class="sub-nav {$active_redeem_reward_tab}" >
								<a href="index.php?act=redeem_reward">
								<img class="img-responsive" src="./images/arrow.png"></img>Redeem Rewards
								</a>
							</li>
						</ul>
					</li>
					
					<li  style="border-bottom:none;"padding-bottom:0" class="{$fame_tab}">
						{if $fame_tab==''}
							<a data-toggle="collapse" data-parent="#accordion"   href="#accordionthree">
							<img class="img-responsive halloffame" src="./images/{if $fame_tab!=''}halloffame_ov.png {else}halloffame.png{/if}"></img>
							Hall Of Fame
							</a>
						{else}
							<a href="javascript:void(1)">
							<img class="img-responsive halloffame" src="./images/halloffame_ov.png">Hall Of Fame</a></img>
						{/if}
						<ul id="accordionthree" class="panel-collapse collapse" style="background:#ececec; {if $fame_tab!=''}display:block {/if}">
							<li class="sub-nav {$active_current_user_tab}" >
								<a href="#">
								<img class="img-responsive current_user" src="./images/arrow.png"></img>Current User
								</a>
							</li>
							
							<li class="sub-nav {$active_overall_user_tab}" >
								<a href="#">
								<img class="img-responsive overall_user" src="./images/arrow.png"></img>Overall User
								</a>
							</li>
						</ul>
					</li>
					
					<li class="{$campaigns_tab}" style="border-bottom:none;">
						<a href="campaigns.php">
							<img class="img-responsive campaing" src="./images/campaing.png"></img>
							<span style="font-size:16px;">Campaigns</span>&nbsp&nbsp&nbsp<span class="badge">{$cmp_count.total}</span>
						</a>
					</li>
					
				</ul>
			</div>
			   <!-- Page Content -->
                            <div id="middle_tier">
			 <div class="container-fluid height" style="position:relative;margin-left:280px">
					
				<!-- Top Content -->
				<div class="row ">
					<div class="col-md-10" style="background-color:#ececec; padding-top: 1%;border-top:1px solid #614197;margin-top:2px;" >
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
                                                                           
                                                                            <span style="color:#614197;font-size: 18px;"><b>Congratulations!</b></span> <span style="color:#614197;font-size: 18px;">You Completed Ratting.</span><br>
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
											<!--<div id="circleGraph"></div>-->
											
											<div id="rewardsCircle" class="rewardsCircle"></div>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
						 <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>Your Peak Snap</strong></div></div>
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
										<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.happy.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.sad)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Sad</span>
										<img class="img-responsive " src="images/dashboard/sad.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.sad.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.angry)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Angry</span>
										<img class="img-responsive " src="images/dashboard/angry.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src=".../../uploads/{$u_exp.angry.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.surprised)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Surprised</span>
										<img class="img-responsive " src="images/dashboard/surprised.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.surprised.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.scared)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Scared</span>
										<img class="img-responsive " src="images/dashboard/scared.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.scared.ad_id}.jpg">
									</a>
								</div>
								{/if}
								{if isset($u_exp.disgusted)}
								<div class="col-md-2">
									<a href="#" class="indicator-link">
										<span>Disgusted</span>
										<img class="img-responsive" src="images/dashboard/disgusted.png">
										<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.disgusted.ad_id}.jpg">
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
                                                     <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>More Video</strong></div></div>
							<div class="row border-bottom">
								<div class="col-md-12">
								
										<div class="rate-more" style="color: #444; font-size: 19px; margin: 0 auto; width: 50%;">
											Rate More Video
										</div>
											Recently Added
										{foreach $latest_videos as $k=>$v}
											{if $v.i%6==0}
											{if $v.i>0}
											{/if}
										<div class="row border-bottom">
											<div class="col-md-3">
												<a href="javascript:return_play_video({$v.c_id})">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
												</a>
											</div>
					 	
											{else}
											<div class="col-md-3">
												<a href="javascript:return_play_video({$v.c_id})">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
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
												<a href="javascript:return_play_video({$v.c_id})">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
												</a>
											</div>
					 	
											{else}
											<div class="col-md-3">
												<a href="javascript:return_play_video({$v.c_id})">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
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
                                    /*
                                    $.each(res.emotions,function(key, val){
                                            var width=(val.duration/res.totalLength) * 100;
                                            //console.log(JSON.stringify(val));
                                            html=html+'<div class="'+val.emotion+' emotion-inline" style="width:'+widthNew+'%"></div>';
                                    });
                                    */
                                    var width = 0; 
                                    $.each(res,function(key, val){
                                        // for meaning variance graph
                                        var y_happy = Number(val.avg_happy);
                                        var y_sad = Number(val.avg_sad);
                                        var y_neutral = Number(val.avg_neutral);
                                        var y_angry = Number(val.avg_angry);
                                        var y_surprised = Number(val.avg_surprised);
                                        var y_disgusted = Number(val.avg_disgusted);
                                        var y_scared = Number(val.avg_disgusted);
                                        var y_peak_emotion = val.peak_emotion;
                                       
                                        //var width=(val.duration/res.totalLength) * 100;
                                        var emotion_name = y_peak_emotion.toLowerCase();                                    
                                        var emotion_value = eval('y_'+emotion_name);                                       
                                        
                                        width = Number(50/val.video_duration);
                                        html=html+'<div class="'+emotion_name+' emotion-inline" style="width:'+width+'%"></div>';
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
                                    /*
                                    $.each(res.emotions,function(key, val){
                                            var width=(val.duration/res.totalLength) * 100;
                                            //console.log(JSON.stringify(val));
                                            html=html+'<div class="'+val.emotion+' emotion-inline" style="width:'+width+'%"></div>';
                                    });
                                    */

                                    var width = 0; 
                                    $.each(res,function(key, val){
                                        // for meaning variance graph
                                        var y_happy = Number(val.avg_happy);
                                        var y_sad = Number(val.avg_sad);
                                        var y_neutral = Number(val.avg_neutral);
                                        var y_angry = Number(val.avg_angry);
                                        var y_surprised = Number(val.avg_surprised);
                                        var y_disgusted = Number(val.avg_disgusted);
                                        var y_scared = Number(val.avg_disgusted);
                                        var y_peak_emotion = val.peak_emotion;
                                       
                                        //var width=(val.duration/res.totalLength) * 100;
                                        var emotion_name = y_peak_emotion.toLowerCase();                                    
                                        var emotion_value = eval('y_'+emotion_name);                                       
                                        
                                        width = Number(50/val.video_duration);
                                        html=html+'<div class="'+emotion_name+' emotion-inline" style="width:'+width+'%"></div>';
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
		
		
		<!-- ******************************* Show More Product ****************************** -->
		
		$(".show-more").click(function(){
			$(".move-top").show();
			
			$.ajax({
			{literal}
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
							productCol += '<div  class="col-md-4 load-img">'+'<img class="img-responsive" src="../files/prize_thumb/'+val.r_image+'"></img>'+'<div class="product-title">'+val.title+' ('+val.sub_title+')</div>'+'<div class="product-point">'+val.points+' Points'+'</div>'+'</div>';
						});
						$("#pr").append(productCol);
					}
					
				},
				error: function (jqXHR,text_status,err_msg) {
			  		alert('ERROR : '+text_status+' '+err_msg);
				},
			{/literal}
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


var SERVER_PATH="{$SERVER_PATH}";
function return_play_video(c_id)
{
	if(c_id)
	{
		window.location.href=SERVER_PATH+'user/watch_video.php?act=watch_video&c_id='+c_id;
		return true;
	}
}

	
</script>
</body>
</html>