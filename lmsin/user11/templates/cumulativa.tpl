{extends file="video_list_header.tpl"}
{block name=body}
<div class="col-md-12" style="background-color:#fff; padding-top: 10px;" >
    <div class="top-title" style="margin-top:-10px;">My Last Redemption</div>
    	<table class="user-expression table table-bordered" > 
            <tbody>
                <tr class="" style="border-bottom:0">
                    {if $last_rdm > 0}
                        <td class="field-label col-xs-3 col-sm-3 col-md-2 ">
                            <img class="" src="../files/prize_thumb/{$my_redeems.r_image}" style=width:150px;height:150px; float:left; margin-right:6px></img>   
			</td>
			<td class="col-xs-4 col-sm-4 col-md-4 second-td">
                            <span style="color:#0855CB;">{$my_redeems.title}</span><br>
                            <span style="color:#0855CB;">{$my_redeems.sub_title}</span><br>
                            <span style="color:#E9576E">{$my_redeems.points} Points</span>
			</td>
                </tr>
		<tr style="">
                    <td colspan="2">
                        <div class="pull-right"><button type="submit"value="Reedem"><a href="index.php?act=redeem_reward">Redeem Rewards</a></div>
                    </td>
		</tr>
                    {else}
                        <div style="color: #444; font-size: 19px; margin: 0 auto; width: 50%;">You did not redeem any reward yet!</div>
          
                    {/if}
            </tbody>
	</table>
	
            
            
        <div class="container-fluid" style="border-bottom:1px solid #ddd;padding-bottom:1%">
            <div class="row">
		<div  class="col-md-12">
                    <div id="rewardsCircle" class="graph-circle"></div>
		</div>	
            </div>	
	</div>
            
            
	<div id="productContainer" class="container-fluid" style="padding-top:2%;">	
            <div><h1 class="text-center">Choose & Manage Rewards</h1></div>
		<div class="row product-rows">
                    {if $rewards|@count > 0}
										{foreach $rewards as $rek=>$rev}
											<div  class="col-md-4">
												<img class="" src="../files/prize_thumb/{$rev.r_image}"style="width:150px;height:150px; float:left; margin-right:6px"></img>  
												<div class="product-title">
													{$rev.title} ({$rev.sub_title})
												</div>
												<div class="product-point">
													{$rev.points} Points
												</div>
											</div>
										{/foreach}
									{/if}
								</div>
									
							</div>	
							<div class="container-fluid" >
								<div class="row">
									<div class="col-md-12" style="text-align: right;">
										<a class="move-top scroll-to-top" href="#wrapper">&#8593;</a>
									</div>	
								
								</div>	
								<div class="row">
									<div class="col-md-12">
										<div class="show-more" style="display: block;">
											Show More Rewards
										</div>
									</div>
								</div>	
							</div>	
	</div>
						
					
	
	
	
	<script src="js/jquery.diagram.js"></script>
	<script src="js/circle-progress.js"></script>
	
	<script type="text/javascript">
		
	//var wl = window.location.hostname + window.location.pathname; 
	
	$(function(){
		 
	});
		
	
	
	</script>
	
	<script type="text/javascript">
			
	$(function(){
	
		<!-- ******************************* Circle Graph******************************-->
		var userPoint = {$user_data.points};
		var totalPoint = {$reward.points};
		var priceName = "{$reward.title}";
		var priceTitle = "{$reward.sub_title}";
		var topText = "<div style='color:#658CEB; font-size:40px; height: 48px;'> "+priceName+" </div> <div style='font-size:20px;'>"+priceTitle+"</div>"
		var htmlString = "<div class='text-inner'>"+topText+"<div style='color:#FF0000; font-size:54px;border-bottom:2px solid #99C1DA;margin: 0 auto 4%; height: 68px; width: 60%;'>"+totalPoint+"</div> <div style='color:#4D616D; font-size:20px;'> TO GOAL </div></div>" ;
		
		var pointPercent = userPoint*100/totalPoint;
		$("#circleGraph").html(htmlString+"<div class='demo' data-percent='"+pointPercent+"%'></div>");
		$('.demo').diagram({
			size: "250", // graph size
			borderWidth: "10", // border width
			bgFill: "#ccc", // background color
			frFill: "#12A5DC", // foreground color
			textSize: 34, // text color
			textColor: '#2a2a2a' // text color
		});
		var detailText = $(".text-inner").html();
		$(".text-inner").hide();
		$('.demo span').addClass("inner-style");
		$('.demo span').html(detailText);
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
	var userPoint = {$user_data.points};
	var totalPoint = {$reward.points};
	var percentages = userPoint/totalPoint;
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
	
	{/block}