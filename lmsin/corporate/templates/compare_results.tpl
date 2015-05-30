{extends file="index.tpl"}
{block name=body} 
    <script>
        var content_id='{$c_id}';
        var user = '{$fname}';
        var cf_id = '{$cf_id}';
        var time;
        var video_id = '{$video_id}'; 
        var analysisDataArray = '{$valence_data_array}';
        var smileysCountArray = '{$smileys_count_array}';
        var analysisDataArray_overall = '{$valence_data_array_overall}';
        var smileysCountArray_overall = '{$smileys_count_array_overall}';
        
        $('#wrapper .container-fluid').removeClass('top-margin');   
    </script> 
    
    <style>
        .dots > li{
           border-bottom: 2px solid grey;
           padding: 3px;
        }
        .glyphicon{
            top:16px
        }  
    </style>
   
    <script type="text/javascript" src="{$SERVER_PATH}corporate/js/compare.js"></script> 

		<div id="videoContainer" class="container-fluid " style="margin-top:80px;">
			<div class="row margin-top">
				<div class="col-xs-6 col-sm-6 col-md-6 row-right" style="padding: 15px;">                                       
                                        <div id="video" >
                                                <div id="player"></div>
                                        </div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6" style="padding: 25px;">
					<div id="chart_div"></div>
				</div>	
			</div>			
		</div>
		<div id="bottomContainer" class="container-fluid">
                    
                        {if 'valence'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<div class="analysis-graph-header">
					        Average Emotion and Motivation Variation - Current Video
					</div>
                                    <!--div id="valence_chart" class="min_height"></div-->
                                        <div class="row margin-top">
						<div class="col-md-6" style="text-align: center;" title="Positive Valence">
							<div class="motivation-happy circle-graph"></div>
							<img class="img-responsive" src="images/face1.png" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="pos-valence-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-6" style="text-align: center;" title="Negative Valence">
							<div class="motivation-sad circle-graph"></div>
							<img class="img-responsive" src="images/face2.png" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="neg-valence-percent" class="smileys-caption"></div>
			 			</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="analysis-graph-header">
					        Average Emotion and Motivation Variation - All Videos
					</div>
                                    
                                        <div class="row margin-top">
						<div class="col-md-6" style="text-align: center;" title="Positive Valence">
							<div class="motivation-happy-overall circle-graph"></div>
							<img class="img-responsive" src="images/face1.png" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="pos-valence-percent-overall" class="smileys-caption"></div>
						</div>
						<div class="col-md-6" style="text-align: center;" title="Negative Valence">
							<div class="motivation-sad-overall circle-graph"></div>
							<img class="img-responsive" src="images/face2.png" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="neg-valence-percent-overall" class="smileys-caption"></div>
			 			</div>
					</div>
					
				</div>
			</div>
                        {/if}
                        
                        {if 'attention'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<!--<img class="img-responsive" src="./images/graph2.png" style="margin: 0 auto;">-->
                                        <!--<text class="analysis-graph-header">Attention Variance</text>-->
                                        <div class="analysis-graph-header">
					        Average Engagement Variation - Current Video
					</div>
                                        <!--div id="attention_chart" class="min_height"></div-->
                                        <div class="row margin-top">
						<div class="col-md-6" style="text-align: center;" title="Average Engagement">
							<div class="attention-happy circle-graph"></div>
							<img class="img-responsive" src="images/darckbluebig.png"  width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="head-stillness-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-6" style="text-align: center;" title="Average Disengagement">
                                                        <div class="attention-sad circle-graph"></div>
							<img class="img-responsive" src="images/lightbluebig.png" width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="eye-stillness-percent" class="smileys-caption"></div>
                                                        
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="analysis-graph-header">
						Average Engagement Variation - All Videos
					</div>
					<div class="row margin-top">
						<div class="col-md-6" style="text-align: center;" title="Average Engagement">
							<div class="attention-happy-overall circle-graph"></div>
							<img class="img-responsive" src="images/darckbluebig.png"  width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="head-stillness-percent-overall" class="smileys-caption"></div>
						</div>
						<div class="col-md-6" style="text-align: center;" title="Average Disengagement">
                                                        <div class="attention-sad-overall circle-graph"></div>
							<img class="img-responsive" src="images/lightbluebig.png" width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
                                                        <div id="eye-stillness-percent-overall" class="smileys-caption"></div>
                                                        
						</div>
					</div>
				</div>
			</div>
                        {/if}
                        
                        {if 'emotion'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right circle-face" style="">
					<div class="analysis-graph-header">
					        Average Meaning Variation - Current video
					</div>
                                        <!--div id="meaning_chart" class="min_height">
                                            
                                        </div-->
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                                <div class="col-md-5" style="text-align: center;" title="Happy">
							<div class="meaning-happy-green circle-graph"></div>
							<img class="img-responsive" src="images/green_1.png"/>
                                                        <div id="happy-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-5" style="text-align: center;" title="Sad">
							<div class="meaning-sad-org circle-graph"></div>
							<img class="img-responsive" src="images/org.png"/>
                                                        <div id="sad-percent" class="smileys-caption"></div>
						</div>
					    <div class="col-md-1"></div>
					</div>
					<div class="row">
						<div class="col-md-4" style="text-align: center;" title="Disgusted">
							<div class="meaning-happy-red circle-graph"></div>
							<img class="img-responsive" src="images/disgusted.png" />
                                                        <div id="disgusted-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-4" style="text-align: center;" title="Neutral">
							<div class="meaning-happy-blk circle-graph"></div>
							<img class="img-responsive" src="images/blk.png"/>
                                                        <div id="neutral-percent" class="smileys-caption" ></div>
						</div>
						<div class="col-md-4" style="text-align: center;" title="Surprised">
							<div class="meaning-happy-blue circle-graph"></div>
							<img class="img-responsive" src="images/surprised.png" />
                                                        <div id="surprised-percent" class="smileys-caption"></div>
						</div>
					</div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                                <div class="col-md-5" style="text-align: center;" title="Angry">
							<div class="meaning-sad-purple circle-graph"></div>
							<img class="img-responsive" src="images/angry.png"/>
                                                        <div id="angry-percent" class="smileys-caption"></div>
						</div>
						<div class="col-md-5" style="text-align: center;" title="Scared">
							<div class="meaning-scared-darkgreen circle-graph"></div>
							<img class="img-responsive" src="images/scared.png"/>
                                                        <div id="scared-percent" class="smileys-caption"></div>
						</div>
					    <div class="col-md-1"></div>
					</div>
				</div>
				<div class="col-md-6 circle-face">
					<div class="analysis-graph-header">
						Average Meaning Variation - All videos
					</div>
					<div class="row">
                                            <div class="col-md-1"></div>
                                                <div class="col-md-5" style="text-align: center;" title="Happy">
							<div class="meaning-happy-green-overall circle-graph"></div>
							<img class="img-responsive" src="images/green_1.png"/>
                                                        <div id="happy-percent-overall" class="smileys-caption"></div>
						</div>
						<div class="col-md-5" style="text-align: center;" title="Sad">
							<div class="meaning-sad-org-overall circle-graph"></div>
							<img class="img-responsive" src="images/org.png"/>
                                                        <div id="sad-percent-overall" class="smileys-caption"></div>
						</div>
					    <div class="col-md-1"></div>
					</div>
					<div class="row">
						<div class="col-md-4" style="text-align: center;" title="Disgusted">
							<div class="meaning-happy-red-overall circle-graph"></div>
							<img class="img-responsive" src="images/disgusted.png" />
                                                        <div id="disgusted-percent-overall" class="smileys-caption"></div>
						</div>
						<div class="col-md-4" style="text-align: center;" title="Neutral">
							<div class="meaning-happy-blk-overall circle-graph"></div>
							<img class="img-responsive" src="images/blk.png"/>
                                                        <div id="neutral-percent-overall" class="smileys-caption" ></div>
						</div>
						<div class="col-md-4" style="text-align: center;" title="Surprised">
							<div class="meaning-happy-blue-overall circle-graph"></div>
							<img class="img-responsive" src="images/surprised.png" />
                                                        <div id="surprised-percent-overall" class="smileys-caption"></div>
						</div>
					</div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                                <div class="col-md-5" style="text-align: center;" title="Angry">
							<div class="meaning-sad-purple-overall circle-graph"></div>
							<img class="img-responsive" src="images/angry.png"/>
                                                        <div id="angry-percent-overall" class="smileys-caption"></div>
						</div>
						<div class="col-md-5" style="text-align: center;" title="Scared">
							<div class="meaning-scared-darkgreen-overall circle-graph"></div>
							<img class="img-responsive" src="images/scared.png"/>
                                                        <div id="scared-percent-overall" class="smileys-caption"></div>
						</div>
					    <div class="col-md-1"></div>
					</div>
                                    
				</div>
			</div>
                        {/if}
                        
                         {if 'valence'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<div class="analysis-graph-header">
					        Overall Emotion Variation - Current Video
					</div>
                                    <div id="valence_chart" class="min_height"></div>
				</div>
                                <div class="col-md-6 " style="">
					<div class="analysis-graph-header">
					        Overall Emotion Variation - All Videos
					</div>
                                    <div id="valence_chart_overall" class="min_height"></div>
				</div>
                        </div>  
                        {/if}
                        
                        
                         {if 'attention'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					
                                        <div class="analysis-graph-header">
					        Engagement Variation - Current Video
					</div>
                                        <div id="attention_chart" class="min_height"></div>
				</div>
                                <div class="col-md-6 " style="">
					
                                        <div class="analysis-graph-header">
					        Engagement Variation - All videos
					</div>
                                        <div id="attention_chart_overall" class="min_height"></div>
				</div>
                        </div>
                        {/if}
                        
                        
                         {if 'emotion'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<div class="analysis-graph-header">
					        Meaning Variance - Current Video
					</div>
                                        <div id="meaning_chart" class="min_height">
                                            <!--Here the meaning chart will display with the succession of the video -->
                                        </div>
				</div>
                                <div class="col-md-6" style="">
					<div class="analysis-graph-header">
					        Meaning Variance - All Videos
					</div>
                                        <div id="meaning_chart_overall" class="min_height">
                                            <!--Here the meaning chart will display with the succession of the video -->
                                        </div>
				</div>
                        </div>
                        {/if}
                        
                        {if 'heatmap'|in_array:$filter_graph_array}
                        <div class="row row-top">
                            <div class="col-md-6 row-right" >
                                <div class="analysis-graph-header">
                                        Heat Map
                                </div>
                                <div id="heatmapview" title="Heat Map" style="min-height:200px;">
                                </div>
                                
                                <div id="timeline-section">
                                   <div class="timeline-steps" >
                                        <ul class="nav nav-tabs dots">
                                            <!-- timeline will display here -->
                                        </ul>
                                   </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="analysis-graph-header">
					Heat Map Color Codes
				</div>
                                <div class="row">
                                <ul class="pieID heatmap-legend">
                                    <li class="happy-item">
                                      <em>Happy</em>
                                      <span></span>
                                    </li>
                                    <li class="sad-item">
                                      <em>Sad</em>
                                      <span></span>
                                    </li>
                                    <li class="neutral-item">
                                      <em>Neutral</em>
                                      <span></span>
                                    </li>
                                    <li class="angry-item">
                                      <em>Angry</em>
                                      <span></span>
                                    </li>
                                    <li class="surprised-item">
                                      <em>Surprised</em>
                                      <span></span>
                                    </li>
                                    <li class="disgusted-item">
                                      <em>Disgusted</em>
                                      <span></span>
                                    </li>
                                    <li class="scared-item">
                                      <em>Scared</em>
                                      <span></span>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>    
                        {/if}
                                              
                        <div class="row row-top">
				<div class="col-md-6 row-right" style="">
				    <div class="analysis-graph-header">
					        User Feedback Variation
				    </div>
                                    <div id="questions_chart" class="min_height">
                                        
                                    </div>
				</div>
				<div class="col-md-6">
			        </div>
                        </div>    
		</div> 
               
                <script src="{$SERVER_PATH}corporate/js/highcharts/highcharts.js"></script>
                <script src="{$SERVER_PATH}corporate/js/highcharts/data.js"></script> 
                <script src="{$SERVER_PATH}corporate/js/highcharts/heatmap.js"></script> 
                <script src="{$SERVER_PATH}corporate/js/highcharts/exporting.js"></script>                        
                <script type="text/javascript" src="templates/video_graph_play.js"></script>
                <script type="text/javascript" src="templates/compare_graph.js"></script>
{/block} 
