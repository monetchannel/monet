<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hall of Fame</title>

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

        <script type="text/javascript" src="js/swfobject.js"></script> 
        <script type="text/javascript" src="js/mic.js"></script> 
    </head>

{block name=body}

    <body>

        <h1>Hall of Fame - {if $scope == "CURRENT"}You{else}All{/if}</h1>

{*<img src="{$images.neutral}" alt="Neutral" height="120" width="160">
<img src="{$images.happy}" alt="Happy" height="120" width="160">
<img src="{$images.sad}" alt="Sad" height="120" width="160">
<img src="{$images.angry}" alt="Angry" height="120" width="160">
<img src="{$images.suprised}" alt="Surprised" height="120" width="160">
<img src="{$images.scared}" alt="Scared" height="120" width="160">
<img src="{$images.disgusted}" alt="Disgusted" height="120" width="160">
<br></br>
{for $i = 0 to 7}
    <div height="120" width="160">{$emotions[$i]}</div>
{/for}*}
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
<div id="wrapper">
			<div id="sidebar-wrapper" style="margin-top:-5px;">
				<ul class="sidebar-nav dashboard">
					<!--Include your navigation here-->
                                        <li>
                                        </li>
                                        <li>
						<div id="images">
							{if $user_data.up_fname}
								<img class="img-responsive" src="{$userimage}"style="height:60px;"style="width:60px;"></img>
							{else}
							<img class="img-responsive" src="./images/dashboard/user.jpg"style="height:60x; "style="width:60px;"></img>
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

<div class="container-fluid expression-container">
									
							<div class="row border-bottom col-row" style="padding-top:200px;">
								{if isset($images.neutral)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Neutral</span>
										<img class="img-responsive " src="images/dashboard/neutral.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.neutral}">
									</a>
								</div>
								{/if}
								{if isset($images.happy)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Happy</span>
										<img class="img-responsive " src="images/dashboard/happy.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.happy}">
									</a>
								</div>
								{/if}
								{if isset($images.sad)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Sad</span>
										<img class="img-responsive " src="images/dashboard/sad.png">
										<img class="img-responsive img-thumbnail emotion-indicator"style="width:100px;" src="{$images.sad}">
									</a>
								</div>
								{/if}
								{if isset($images.angry)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Angry</span>
										<img class="img-responsive " src="images/dashboard/angry.png">
										<img class="img-responsive img-thumbnail emotion-indicator"style="width:100px;" src="{$images.angry}">
									</a>
								</div>
								{/if}
								{if isset($images.surprised)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Surprised</span>
										<img class="img-responsive " src="images/dashboard/surprised.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.surprised}">
									</a>
								</div>
								{/if}
								{if isset($images.scared)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Scared</span>
										<img class="img-responsive " src="images/dashboard/scared.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.scared}">
									</a>
								</div>
								{/if}
								{if isset($images.disgusted)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Disgusted</span>
										<img class="img-responsive" src="images/dashboard/disgusted.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.disgusted}">
									</a>
								</div>
								{/if}
							</div>
{/block}
</html>