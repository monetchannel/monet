{extends file="video_list_header.tpl"}
{block name=body}
<!-- ---------------------------- -->
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
							<button type="submit" class="search-btn">Search</button>
							</form>
						</div>
						
						<!-- ----------------------------- -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong><em>Filtered Videos</em></strong>
							</div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-12" style="padding-left:0;padding-right:0;">
										<div class="panel-left-content">
											<div class="container-fluid">
											
												{if $filter_videos|@count > 0}
												<!--<div class="row border-bottom vcon">-->
												{foreach $filter_videos as $k=>$v}
												{if $v.i%4==0}
										  	 	{if $v.i>0}
											  	  	</div>
										  	 	{/if}
											   	<div class="row border-bottom">
													<div class="col-md-3">
														<a href="javascript:return_play_video({$v.c_id})">
															<img class="img-responsive" src="{$v.c_thumb_url}">
															<div class="video-detail">{$v.c_title}</div>
															<div class="video-short">by {$v.company_name} VIDEO {$v.c_views} views</div>
														</a>
													</div>
											 	
												{else}
													<div class="col-md-3">
														<a href="javascript:return_play_video({$v.c_id})">
															<img class="img-responsive" src="{$v.c_thumb_url}">
															<div class="video-detail">{$v.c_title}</div>
															<div class="video-short">by {$v.company_name} VIDEO {$v.c_views} views 2 month ago</div>
														</a>
													</div>
												{/if}
												{/foreach}
												</div>
												{/if}
												
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<!-- ----------------------------- -->
						
					</div>
										
					<div class="col-md-2" style="background-color:#fff;">
						
					{foreach $companies as $k=>$v}
						<div class="row">
							<div class="col-md-12 block">
								<a class="" href="{$SERVER_PATH}watch_video.php?filter=true&cat=&brand={$v.company_id}"> 
									<img class="img-responsive" src="{$v.company_logo}" alt="{$v.company_name}"></img> 
								</a>
							</div>
						</div>
						{/foreach}
						
					</div>
				</div>
					
			</div>
		</div>	
	
	
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.js"></script>
		
		<script type="text/javascript">
		
		var SERVER_PATH="{$SERVER_PATH}";
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
	
	{/block}