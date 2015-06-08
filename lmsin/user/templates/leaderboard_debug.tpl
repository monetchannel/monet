{extends file="video_list_header.tpl"}
{block name=body}
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="amcharts.js" type="text/javascript"></script>
        <script src="radar.js" type="text/javascript"></script>
        <script type="text/javascript">
                window.onload = function() {
                    setHeight();
                };
                
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
                chart.write("radar");
            });
            
            
                function setHeight(){
                    var height1 = document.getElementById('max-height-container').offsetHeight;
                    var height2 = document.getElementById('topcontainer1').offsetHeight;
                    var height3 = document.getElementById('topcontainer2').offsetHeight;
                    var maxheight = height1;
                    if(maxheight<height2)
                        maxheight=height2;
                    if(maxheight<height3)
                        maxheight=height3;
                    maxheight+=10;
                    document.getElementById('topcontainer1').style.height = maxheight+'px';
                    document.getElementById('max-height-container').style.height = maxheight+'px';
                    document.getElementById('topcontainer2').style.height = maxheight+'px';
                }
        </script>
        <style type="text/css">
            .talk-bubble {
                margin-top: 40px;
                margin-left: 0px;
                display: inline-block;
                position: relative;
                min-width: 40px; 
                height: auto;
                color: #ffffff;
                background-color: #614197;
                border-radius: 10px;
                padding: 5px;
            }
            .tri-right.border.left-top:before {
                content: ' ';
                position: absolute;
                width: 0;
                height: 0;
                left: -20px;
                right: auto;
                top: -8px;
                bottom: auto;
                border: 32px solid;
                border-color: #ffffff transparent transparent transparent;
            }
            .tri-right.left-top:after{
                content: '';
                position: absolute;
                width: 0;
                height: 0;
                left: -20px;
                right: auto;
                top: 0px;
                bottom: auto;
                border: 22px solid;
                border-color: #614197 transparent transparent transparent;
            }
            .aspect-ratio {
                position: relative;
                width: 100%;
                height: 0;
                padding-bottom: 40%;    //maintains aspect ratio in percentage
            }
            .aspect-ratio iframe {
                position: absolute;
                width: 100%;
                height: 100%;
                left: 0; top: 0;
            }
            *{
                padding: 0px;
                margin: 0px;
            }
            #timeline{
               // height:450px;
               // width:800px;
                background:#f1f1f1;
                margin-left:10px;
                margin-top:10px;
				float:left;
				color:#333;
            }
            #radar{
                height:200px;
                width: 100%;
                //background:#f1f1f1;
                //border:1px solid #fff;
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
                //height:200px;
                //width:190px;
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
                //height:55%;
                //width:100%;
               background:#f1f1f1;
                border-bottom:1px solid #fff;
               border-right:1px solid #fff;
               
                float:left;
               margin-left:1px;
               margin-top:1px;
            }
             #demo{
                height:55%;
              //  width:280px;
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
			//height:290px;
			//width:190px;
			color:#333;
			//text-align:center;
			margin-left:10px;
			float:left;
			}
			#head
			{
			background: #614197;
                        color: #fff;
                        font-size: 16px;
			}
			#head_tab
			{
			background:#614197;
			height:35px;
			float:left;
			color:#fff;
			font-size:20px;
			width:98%;
			margin-top:30px;
			text-align:center;
                        margin-bottom: 20px;
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
    <body onresize="setHeight()">
        <div class="row" style="width: 110%;overflow-y: hidden;">
            <div class="col-md-4" id="topcontainer1" style="background: #f1f1f1;margin-left: 1px;margin-right: 1px;">
                <div id="head" class="text-center row">
                    <b>Rewards &nbsp; Leader &nbsp; Cap</b>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <h3 class="text-center" style="vertical-align:middle;">
                            <b class="text-danger">{$data[0].points}</b>
                            Points
                        </h3>
                    </div>
                    <div class="col-sm-7">
                        <img class="img-responsive" src="{$data[0].profile_img}" alt="{$data[0].profile_img}" style="border:1px solid #614197;max-width: 100%;"/>
                    </div>
                </div>
                <br>
                <div class="row text-info" style="font-size: 20px;">
                    <div class="col-md-3">
                        <p style="float:right;">1 .</p>
                    </div>
                    <div class="col-md-8">
                        <p class="text-center">{$data[0].name}</p>
                    </div>
                </div>
                <br>
                {for $i=1 to 4}
                    <div class="row" style="font-size: 16px;">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-7">{$data[$i].rank}. {$data[$i].name}</div>
                        <div class="col-sm-3 text-center">{$data[$i].points}</div>
                    </div>
                {/for}
            </div>
            <div class="col-md-4" id="max-height-container" style="background: #f1f1f1;margin-left: 1px;margin-right: 1px;">
                <div id="head" class="text-center row">
                    <b>About &nbsp; Me</b>
                </div>
                <h2 class="text-center">You</h2>
                <img class="img-responsive" src="{$user_data.profile_image}" style="border:1px solid #614197;margin: 0 auto;max-width: 50%;max-height: 40%;"/>
                <h3 class="text-center">Rank : {$user_data.rank}</h3>
                <h3 class="text-center">Points : {$user_data.points}</h3>
            </div>
            <div class="col-md-4" id="topcontainer2" style="background: #f1f1f1;margin-left: 1px;margin-right: 1px;">
                <div>
                    <div id="head" class="text-center row">
                        <b>Last &nbsp; Redemption</b>
                    </div>
                    {if $latest_reward.count > 0}
                        <h3 class="text-center">Your Latest Redemption</h3>
                        <h4 class="text-center">{$latest_reward.subtitle}</h4>
                        <img class="img-responsive" src="{$latest_reward.image}" style="margin:0 auto;max-height: 40%;max-width: 50%;"/>
                        <br>
                        <h4 class="text-center">Redeemed for {$latest_reward.points} points.</h4>
                    {else}
                        <br><br>
                        <div class="text-center alert alert-info">You have not redeemed any rewards yet!</div>
                    {/if}
                </div>
            </div>
        </div>
        <div id="head_tab">
            <b>TimeLine</b>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row text-center" id="head" style="width:100%;">
                    Last Watched Video Ad
                </div>
                <div class="row aspect-ratio">
                    <iframe style="width: 100%;height: 100%;" src="{$cf_data.c_url}"></iframe>  
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
                <br>
        <div class="row" style="width: 110%;">
            <div id="radarindex" class="col-md-4" style="background: #f1f1f1;margin-left: 1px;margin-right: 1px;">
                <div id="head" class="text-center row">Your Last Radar</div>
                <div id="radar" style="background-color:#f1f1f1;"></div>
            </div>
            <div class="col-md-4" style="background: #f1f1f1;margin-left: 1px;margin-right: 1px;height: 223px;">
                <div id="head" class="text-center row">Last Comment</div>
                <div class="row">
                    <div class="col-md-3" style="margin-top:25px;">
                        <img class="img-responsive img-circle" src="{$last_comment[0].image}" style="margin-right: 0;width: 30px;height:30px"/>
                    </div>
                    <div class="col-md-9">
                        <div class="talk-bubble tri-right left-top">
                            <div class="talktext">
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$last_comment[0].cf_comment}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {if $last_comment[1]}
                    <div class="row">
                        <div class="col-md-3" style="margin-top:25px;">
                            <img class="img-responsive img-circle" src="{$last_comment[1].image}" style="margin-right: 0;width: 30px;height:30px"/>
                        </div>
                        <div class="col-md-9">
                            <div class="talk-bubble tri-right left-top">
                                <div class="talktext">
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {$last_comment[1].cf_comment}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                {/if}
            </div>
            <div class="col-md-4" style="background: #f1f1f1;margin-left: 1px;margin-right: 1px;height: 223px;">
                <div id="head" class="text-center row">Top 5 Ratings</div>
                <div class="row" style="font-size:16px;background: #ececec;padding-top: 10px;padding-bottom: 10px;">
                    <div class="col-md-6"><b>User</b></div>
                    <div class="col-md-3"><b>Emotion</b></div>
                    <div class="col-md-3"><b>Rating</b></div>
                </div>
                    {foreach from=$rating_data item=row}
                        <div class="row" style="font-size:16px;" {if $row.user_id == $user.id}style="background:#ececec;"{/if}>
                            <div class="col-md-6">{$row.name}</div>
                            <div class="col-md-3">{$row.emotion}</div>
                            <div class="col-md-3">{$row.rating}</div>
                        </div>
                    {/foreach}
                
            </div>
        </div>
        <br>
    </body>
            <script type="text/javascript">
                
         </script>
{/block}
