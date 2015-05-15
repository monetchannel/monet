{extends file="video_list_header.tpl"}
{block name=body}

      

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
<div class="panel panel-default"style=max-width:750px;height:20px;">
	<div class="panel-heading">
		Hall of Fame - {if $scope == "CURRENT"}You{else}All{/if}
	</div>
</div>
<div class="container-fluid expression-container"style="margin-top:-150px;"/>
									
							<div class="row border-bottom col-row" style="padding-top:200px;">
								{if isset($images.neutral.value)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Neutral</span>
										<img class="img-responsive " src="images/dashboard/neutral.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.neutral.image_path}">
									</a>
								</div>
								{/if}
								{if isset($images.happy.value)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Happy</span>
										<img class="img-responsive " src="images/dashboard/happy.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.happy.image_path}">
									</a>
								</div>
								{/if}
								{if isset($images.sad.value)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Sad</span>
										<img class="img-responsive " src="images/dashboard/sad.png">
										<img class="img-responsive img-thumbnail emotion-indicator"style="width:100px;" src="{$images.sad.image_path}">
									</a>
								</div>
								{/if}
								{if isset($images.angry.value)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Angry</span>
										<img class="img-responsive " src="images/dashboard/angry.png">
										<img class="img-responsive img-thumbnail emotion-indicator"style="width:100px;" src="{$images.angry.image_path}">
									</a>
								</div>
								{/if}
								{if isset($images.surprised.value)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Surprised</span>
										<img class="img-responsive " src="images/dashboard/surprised.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.surprised.image_path}">
									</a>
								</div>
								{/if}
								{if isset($images.scared.value)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Scared</span>
										<img class="img-responsive " src="images/dashboard/scared.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.scared.image_path}">
									</a>
								</div>
								{/if}
								{if isset($images.disgusted.value)}
								<div class="col-md-2"style="width:120px;background: #ccc;">
									<a href="#" class="indicator-link">
										<span>Disgusted</span>
										<img class="img-responsive" src="images/dashboard/disgusted.png">
										<img class="img-responsive img-thumbnail emotion-indicator" style="width:100px;"src="{$images.disgusted.image_path}">
									</a>
								</div>
								{/if}
                                                                
							</div>
                                                        <div class="panel panel-default" style=max-width:750px;height:20px;">
                                                     <div class="panel-heading"><strong>{if $scope == "ALL"}Everyone's{else}Your{/if} Emotion</strong></div></div>
                                                     <!--radar chart design --->
                                                    <div id="chartdiv" style="width:600px; height:400px;"></div>
													
													<script type="text/javascript">
            var chart;

            var chartData = [
                {
                    "direction": "Happy",
                    "value": {$images.happy.value},
                    "img_src": "{$images.happy.image_path}"
                },
                {
                    "direction": "Sad",
                    "value": {$images.sad.value},
                    "img_src": "{$images.sad.image_path}"
                },
                {
                    "direction": "Angry",
                    "value": {$images.angry.value},
                    "img_src": "{$images.angry.image_path}"
                },
                {
                    "direction": "Disgusted",
                    "value": {$images.disgusted.value},
                    "img_src": "{$images.disgusted.image_path}"
                },
                {
                    "direction": "Neutral",
                    "value": {$images.neutral.value},
                    "img_src": "{$images.neutral.image_path}" 
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/{$u_exp.neutral.ad_id}.jpg">
                },
                {
                    "direction": "Scared",
                    "value": {$images.scared.value},
                    "img_src": "{$images.scared.image_path}"
                },
               
                {
                    "direction": "Surprised",
                    "value": {$images.suprised.value},
                    "img_src": "{$images.suprised.image_path}"
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
                valueAxis.fillColor = "#f1f1f1";
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