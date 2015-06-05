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
        #sel {
        border: 1px solid #008B8B;
        
        }
    </style>
   
    <script type="text/javascript" src="{$SERVER_PATH}corporate/js/compare.js"></script> 

		
		<div id="" class="container-fluid">
                    <div class="row top-margin">
                        <div id="" class="col-md-6 row-right">
                            <h3 class="text-center">Selection 1</h3>
                            
                            <ul>
                                <li><strong>Category: </strong>{$category1}</li>
                                <li><strong>Demography</strong>
                                    <ul>
                                        <li><strong>Country: </strong>{$country1}</li>
                                        <li><strong>Gender: </strong>{$gender1}</li>
                                    </ul>
                                </li>
                            </ul>
                            
                    
                        </div>
                        <div id="" class="col-md-6">
                               <h3 class="text-center">Selection 2</h3>
                            <ul>
                                <li><strong>Category: </strong>{$category2}</li>
                                <li><strong>Demography</strong>
                                    <ul>
                                        <li><strong>Country: </strong>{$country2}</li>
                                        <li><strong>Gender: </strong>{$gender2}</li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                        
                        
                    </div>
                        {if 'valence'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<div class="analysis-graph-header">
					        Average Valence Variation - Selection 1
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
					        Average Valence Variation - Selection 2
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
					        Average Engagement Variation - Selection 1
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
						Average Engagement Variation - Selection 2
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
					        Average Meaning Variation - Selection 1
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
						Average Meaning Variation - Selection 2
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
					        Overall Valence Variation - Selection 1
					</div>
                                    <div id="valence_chart" class="min_height"></div>
				</div>
                                <div class="col-md-6 " style="">
					<div class="analysis-graph-header">
					        Overall Valence Variation - Selection 2
					</div>
                                    <div id="valence_chart_overall" class="min_height"></div>
				</div>
                        </div>  
                        {/if}
                        
                        
                         {if 'attention'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					
                                        <div class="analysis-graph-header">
					        Overall Engagement Variation - Selection 1
					</div>
                                        <div id="attention_chart" class="min_height"></div>
				</div>
                                <div class="col-md-6 " style="">
					
                                        <div class="analysis-graph-header">
					        Overall Engagement Variation - Selection 2
                                        </div>
                                        <div id="attention_chart_overall" class="min_height"></div>
				</div>
                        </div>
                        {/if}
                        
                        
                         {if 'emotion'|in_array:$filter_graph_array}
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<div class="analysis-graph-header">
					        Overall Meaning Variation - Selection 1
					</div>
                                        <div id="meaning_chart" class="min_height">
                                            <!--Here the meaning chart will display with the succession of the video -->
                                        </div>
				</div>
                                <div class="col-md-6" style="">
					<div class="analysis-graph-header">
					        Overall Meaning Variation - Selection 2
					</div>
                                        <div id="meaning_chart_overall" class="min_height">
                                            <!--Here the meaning chart will display with the succession of the video -->
                                        </div>
				</div>
                        </div>
                        {/if}
                        
                        {if 'heatmap'|in_array:$filter_graph_array}
                          
                        {/if}
                                              
                          
		</div> 
                        <div id="player" style="display:none;"></div>
                <script src="{$SERVER_PATH}corporate/js/highcharts/highcharts.js"></script>
                <script src="{$SERVER_PATH}corporate/js/highcharts/data.js"></script> 
                <script src="{$SERVER_PATH}corporate/js/highcharts/heatmap.js"></script> 
                <script src="{$SERVER_PATH}corporate/js/highcharts/exporting.js"></script>                        
                <script type="text/javascript" src="templates/video_graph_play.js"></script>
                <script type="text/javascript" src="templates/compare_graph.js"></script>
{/block} 
