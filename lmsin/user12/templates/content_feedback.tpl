<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Monet Dash Board</title>

		<!-- Bootstrap core css --->
            <link href="css/bootstrap.css" rel="stylesheet">
		 
               
        <!--custom css -->
            <link href="css/index.css" rel="stylesheet">
            <link href="css/sidebar.css" rel="stylesheet">
            <link href="css/dashboard.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
			    <div class="col-xs-12 col-md-12">
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
						<li><a href="#account_setting.php">{$smarty.cookies.UserName} !</a></li>
						<li>
						        <a href="javascript:void(1)" onClick="javascript:{if $smarty.session.FBuserID}logoutFacebook(){else}location.href='index.php?act=logout'{/if}">
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
		
		
		
		 <!-- header ended -->
		
		
	<div id="wrapper">
		<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
        <!--Include your navigation here-->
                
		<li>
						<div id="images">
							{if $user_data.up_fname}
								<img class="img-responsive" src="{$userimage}"style="height:98px;" "style="width:150px;"></img>
							{else}
								<img class="img-responsive" src="./images/dashboard/user.jpg"style="height:98px;" "style="width:150px;"></img>
							{/if}
						</div>
					</li>
		<li><div id="name">
			<div class="profile-name">{$user_data.user_fname} {$user_data.user_lname}</div>
			<div class="profile-address">{$user_data.countries_name}</div>
			</div>
		</li>
		<li><a data-toggle="collapse" data-parent="#accordion"   href="#accordionfour"><img class="img-responsive rewards" src="./images/rewards.png"></img>Rewards</a>
                     <ul id="accordionfour" class="panel-collapse collapse" style="background:#f7f7f7">
		    	<li class="sub-nav"><a href="index.php?act=cumulative_rewards"><img class="img-responsive" src="./images/arrow.png">Cumulative Rewards</a></li>
	    		<li class="sub-nav"><a href="index.php?act=redeem_reward"  ><img class="img-responsive" src="./images/arrow.png">Redeem Rewards</a></li>
	    		
					
                     </ul>
                </li>
		<li><a data-toggle="collapse" data-parent="#accordion"   href="#accordionthree"><img class="img-responsive halloffame" src="./images/halloffame.png"></img>Hall of Fame</a>
                     <ul id="accordionthree" class="panel-collapse collapse" style="background:#f7f7f7">
		    	<li class="sub-nav"><a href="#"  data-toggle="modal" data-target="#hallOffame" ><img class="img-responsive" src="./images/arrow.png">Current</a></li>
	    		<li class="sub-nav"><a href="#"  data-toggle="modal" data-target="#hallOffame" ><img class="img-responsive" src="./images/arrow.png">Overall</a></li>
	    		
					
                     </ul>
                </li>
		<li><a href="campaigns.php"><img class="img-responsive campaing" src="./images/campaing.png"></img>Campaigns <span class="badge">{$cmp_count.total}</span></a></li>
 <!--Navigation ends here---->
            </ul>
        </div>
<!-- Page Content -->
			   
			<div class="container-fluid" style="position:relative;top:95px;">
					
				<!-- Top Content -->
				<div class="row ">
					<div class="col-md-10" style="background-color:#fff; padding-top: 1%;" >
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
										<img class="img-responsive full-width" src="{$content.c_thumb_url}"></img> 
									</td>
									<td class="col-md-5 second-td">
										<span style="color:#E9576E">Congratulations!</span> <span style="color:#302257;">You Completed Ratting.</span><br>
										<span style="color:#302257;">You won {$rp} rewards</span>
										
									</td>
								</tr>
							</tbody>
						</table>
						<div class="container-fluid" style="border-bottom:1px solid #ddd;padding-bottom:1%">
							<div class="row ">
								<div  class="col-md-12">
									<!--<div class="top-title-string">Points & Goals</div>	-->
									<div class="row">
										<div class="col-md-3" style="font-size:16px;padding-top:80px">
											<span style="color:#302257;">Your Total Points:</span> <span style="color:#E9576E">{$user_points}</span><br>
										</div>
										<div class="col-md-6">
											<!--<div id="circleGraph"></div>-->
											
											<div id="rewardsCircle" class="rewardsCircle"></div>
										</div>
									</div>	
								</div>	
							</div>	
						</div>	
						
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
							<div class="row border-bottom">
								<div class="col-md-12">
								
										<div class="rate-more" style="color: #444; font-size: 19px; margin: 0 auto; width: 50%;">
											Rate More Video
										</div>
											Recently Added
										{foreach $latest_videos as $k=>$v}
											{if $v.i%4==0}
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
											{if $v.i%4==0}
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
					</div>
										
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