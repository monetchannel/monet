<!DOCTYPE html>
<html lang="en">
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
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.neutral.ad_id}.jpg">
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
                valueAxis.fillColor = "#000000";
                valueAxis.axisAlpha = 0.2;
                valueAxis.gridAlpha = 0;
                valueAxis.fontWeight = "bold";
                valueAxis.minimum = 0;
                valueAxis.maximum = 10;
                chart.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.lineColor = "#614193";
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
                width:750px;
                background: #584b9a;
                margin-left:50px;
                margin-top:10px;
            }
            #radar{
                height:200px;
                width:250px;
                background: #3584b9a;
                border:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
            #youtube{
                height:200px;
                width:300px;
                background: #584b9a;
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
                background:#584b9a;
                border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-top:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #reward{
                height:243px;
                width:230px;
                background: #584b9a;
                 border-bottom:1px solid #fff;
                border-right:1px solid #fff;
                border-left:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #comments{
                height:243px;
                width:230px;
                background: #584b9a;
                border-bottom:1px solid #fff;
               border-right:1px solid #fff;
               
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #demo{
                height:243px;
                width:280px;
                background: #584b9a;
                border-bottom:1px solid #fff;
               border-right:1px solid #fff;
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
            #img-div{
                float:right;
            }
            </style>
    </head>
    <body>
        <table border="1">
            <tr>
                <td><strong>Rank</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Points</strong></td>
            </tr>
            {foreach from=$data item=row}
                <tr>
                    <td>{$row.rank}</td>
                    <td>{$row.name}</td>
                    <td>{$row.points}</td>
                </tr>
            {/foreach}
        </table>
        <table style="background-color:#DCDCDC;">
            <tr style="border-color:#000000;border:10px;">
                <td style="align:left;">
                    <div style="overflow:auto;">
                        <div style="float:left;">
                            <h3>{$data[0].points}</h3>
                            <h5>POINTS</h5>
                            <p>{$data[0].rank}. {$data[0].name}</p>
                        </div>
                        <div style="float:left;padding-left:5px;">
                            <img src="{$data[0].profile_img}" alt="{$data[0].profile_img}" style="vertical-align:middle;width:7.5em;height:7.5em;"/>
                        </div>
                    </div>
                </td>
            </tr>
            {$i = 1}
            {while $i < 3}
                <tr>
                    <td><p style="float:left;">{$data[$i].rank}. {$data[$i].name}</p><p style="float:right;">{$data[$i].points}</p></td>
                </tr>
                {$i++}
            {/while}
        </table>
        <!--<div style="width:75%;height:500px;background-color:gray;">
            <div style="width:25%;height:25%;border:2px solid black;">
                <h2 style="display:inline;vertical-align:central;">You</h2> <img src="{$user.profile_image}" style="width:125px;height:125px;float:right;"/>
            </div>
            <div>
                
            </div>
        </div>-->
        <div id="timeline">
            <div id="rank">
                <h1>You</h1>
                <div id="stats">
                    <p>Rank: {$user.rank}</p>
                    <p>Points: {$user.points}</p>
                </div>
                <div id="img-div">
                    <img src="{$user.profile_image}" width="80" height="80"/>
                </div>
            </div>
            <div id="youtube">
              <iframe width="295" height="195" src="{$cf_data.c_url}">
              </iframe>  
            </div>
            <div id="radar" style="background-color:#ececec;">
                
            </div>
            <div id="comments">
                <p>Latest comment: {$cf_data.comment}</p>
                <div class="emotion-container"> </div>
                <div class="allemotion-container"> </div>
            </div>
            <div id="reward">
                <h2>Your Latest Redemption</h2>
                <p>{$latest_reward.title}</p>
                <p>{$latest_reward.subtitle}</p>
                <img src="{$latest_reward.image}" width="80" height="80"/>
                <p>Redeemed for {$latest_reward.points} points.</p>
            </div>
            <div id="demo">
                <table border="1">
                    {foreach from=$rating_data item=row}
                        <tr {if $row.user_id == $user.id}bgcolor="yellow"{/if}>
                            <td>{$row.name}</td>
                            <td>{$row.rating}</td>
                        </tr>
                    {/foreach}
                </table>
            </div>
        </div>
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
</html>