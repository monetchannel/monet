{extends file="video_list_header.tpl"}
{block name=body}
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="radar.js" type="text/javascript"></script>
        <script type="text/javascript">
            var chart;

            var chartData = [
                {
                    "direction": "Happy",
                    "value": {$radar_chart_data.happy.value},
                    "img_src": "{$radar_chart_data.happy.image_path}"
                },
                {
                    "direction": "Sad",
                    "value": {$radar_chart_data.sad.value},
                    "img_src": "{$radar_chart_data.sad.image_path}"
                },
                {
                    "direction": "Angry",
                    "value": {$radar_chart_data.angry.value},
                    "img_src": "{$radar_chart_data.angry.image_path}"
                },
                {
                    "direction": "Disgusted",
                    "value": {$radar_chart_data.disgusted.value},
                    "img_src": "{$radar_chart_data.disgusted.image_path}"
                },
                {
                    "direction": "Neutral",
                    "value": {$radar_chart_data.neutral.value},
                    "img_src": "{$radar_chart_data.neutral.image_path}" 
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../uploads/{$u_exp.neutral.ad_id}.jpg">
                },
                {
                    "direction": "Scared",
                    "value": {$radar_chart_data.scared.value},
                    "img_src": "{$radar_chart_data.scared.image_path}"
                },
               
                {
                    "direction": "Surprised",
                    "value": {$radar_chart_data.suprised.value},
                    "img_src": "{$radar_chart_data.suprised.image_path}"
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
                valueAxis.fillColor = "#614197";
                valueAxis.axisAlpha = 0.2;
                valueAxis.gridAlpha = 0;
                valueAxis.fontWeight = "bold";
                valueAxis.minimum = 0;
                valueAxis.maximum = 10;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.lineColor = "#614197";
                graph.fillAlphas = 0.4;
                graph.bullet = "round";
                graph.valueField = "value";
                graph.balloonText = "[[category]]: [[value]] Unit\n <img class='img-responsive img-thumbnail emotion-indicator' src=[[img_src]] alt='[[img_src]]'>";
                chart.addGraph(graph);

                // GUIDES
                // blue fill
                var guide = new AmCharts.Guide();
                guide.angle = 225;
                guide.tickLength = 0;
                guide.toAngle = 315;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#F1F1F1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // red fill
                guide = new AmCharts.Guide();
                guide.angle = 45;
                guide.tickLength = 0;
                guide.toAngle = 135;
                guide.value = 0;
                guide.toValue = 9;
                guide.fillColor = "#F1F1F1";
                guide.fillAlpha = 0.6;
                valueAxis.addGuide(guide);

                // WRITE                
                chart.write("radar");
            });
        </script>
        <style type="text/css">
            *{
                padding: 0px;
                margin: 0px;
            }
            #timeline{
                height:450px;
                width:800px;
                background:#f1f1f1;
                margin-left:10px;
                margin-top:10px;
				float:left;
				color:#333;
            }
            #radar{
                height:200px;
                width:265px;
                background:#f1f1f1;
                border:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
			   color:#f1f1f1;
            }
            #youtube{
                height:200px;
                width:340px;
               background:#f1f1f1;
                border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-top:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #rank{
                height:200px;
                width:190px;
               background:#f1f1f1;
                border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-top:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #reward{
                height:55%;
                width:35.5%;
               background:#f1f1f1;
                 border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-left:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #comments{
                height:55%;
                width:230px;
               background:#f1f1f1;
                border-bottom:1px solid #fff;
               border-right:1px solid #fff;
               
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #demo{
                height:55%;
                width:280px;
             background:#f1f1f1;
                border-bottom:1px solid #fff;
               border-right:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
            #img-div{
                float:right;
				margin-bottom:5px;
            }
			#ranking
			{
			background:#f1f1f1;
			height:290px;
			width:190px;
			color:#333;
			text-align:center;
			margin-left:10px;
			float:left;
			}
			#head
			{
			background:#614197;
			height:30px;
			width:190px;
			color:#f1f1f1;
			font-size:16px;
			float:left;
			border:1px solid#614197;
			}
			#head_tab
			{
			background:#ccc;
			height:25px;
			float:left;
			color:#000;
			font-size:16px;
			width:100%;
			margin-top:30px;
			text-align:center;
			}
			#command
			{
			background:#614197;
			height:25px;
			float:left;
			color:#f1f1f1;
			font-size:16px;
			width:100%;
			margin-top:0px;
			text-align:center;
			display:block;
			z-index:0.9;
			}
            </style>
			
			
    </head>
    <body>
	<div id="ranking">
	<div id="head"><b>Rewards Leader Cap</b></div><table style="background:#f1f1f1;color:#333;">
            <tr style="border-color:#000000;border:10px;">
                <td style="align:left;">
                    <div style="overflow:auto;">
                        <div style="float:left;">
                            <h3><b>{$data[0].points}</b></h3>
                            <h5>POINTS</h5>
                            <p>{$data[0].rank}. {$data[0].name}</p>
                        </div>
                        <div style="float:left;padding-left:5px;">
                            <img src="{$data[0].profile_img}" alt="{$data[0].profile_img}" style="vertical-align:middle;width:7.5em;height:7.5em;border:1px solid #614197;"/>
                        </div>
                    </div>
                </td>
            </tr>
			<tr>
            
                {$i = 1}
            {while $i < 5}
                    <td><p style="float:left;">{$data[$i].rank}. {$data[$i].name}</p><p style="float:right;">{$data[$i].points}</p></td>
					
                </tr>
                {$i++}
            {/while}
        </table>
		</div>
		<div id="ranking"><div id="head"><b>Rating Leader Cap</b></div>
		</div>
		<div id="ranking"><div id="head">Leader Cap</div>
		</div>
		<div id="ranking"><div id="head">Leader Cap</div>
		</div>
	
      <div id="head_tab">TimeLIne
	  </div>
        <div id="timeline">
            <div id="rank"><div id="command">About ME</div>
                <h1>You</h1>
                <div id="stats">
				  <div id="img-div">
                    <img src="{$user_data.profile_image}" width="80" height="80" style="vertical-align:middle;width:7.5em;height:7.5em;border:1px solid #614197;"/>
                </div>
                    <p>Rank: {$user_data.rank}</p>
                    <p>Points: {$user_data.points}</p>
                </div>
              
            </div>
            <div id="youtube"><div id="command">Last Watched Video Ad</div>
              <iframe width="340" height="172.5" src="{$cf_data.c_url}">
              </iframe>  
            </div>
            <div id="radar" style="background-color:#ececec;"><div id="command">Your Last Radar</div>
                
            </div>
            <div id="comments"><div id="command">Last Comment</div>
</br>
               <p>&nbspYou: {$cf_data.comment}</p>

            </div>
         
            <div id="demo"><div id="command">Top 5 Ratings</div>
                <table border="1">
                  <!-- Table goes in the document BODY -->
<table class="hovertable">
<tr>
	<th>User</th><th>Rating</th>
</tr>
 {foreach from=$rating_data item=row}
                        <tr {if $row.user_id == $user.id}bgcolor="#000"{/if}>
                            <td>{$row.name}</td>
                            <td>{$row.rating}</td>
                        </tr>
                    {/foreach}

</table>
            </div>
			   <div id="reward"><div id="command">Last Redemption</div>
                <h2>Your Latest Redemption</h2>
                
                <p>{$latest_reward.subtitle}</p>
                <img src="{$latest_reward.image}" width="80" height="80"/>
                <p>Redeemed for {$latest_reward.points} points.</p>
            </div>
        </div>
       <!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.hovertable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#000;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
	width:100%;
}
table.hovertable th {
	background-color:#614197;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	 background: f1f1f1;
}
table.hovertable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>

        
    </body>
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
		var ar_id = "5";
		// heat map
		$.ajax({
			{literal}
			type: 'GET',
			url: "leaderboard.php?act=get_heatmap_data&ar_id="+ar_id,
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
		var c_id = '{$cf_data.c_id}';
		$.ajax({
			{literal}
			type: 'GET',
			url: "leaderboard.php?act=get_all_heatmap_data&c_id="+c_id,
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
		});});
         </script>
{/block}