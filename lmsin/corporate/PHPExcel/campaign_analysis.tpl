{extends file="index.tpl"}
{block name=body} 
    

		<div id="videoContainer" class="container-fluid " style="margin-top:80px;">
			<div class="row margin-top">
				<div class="col-xs-6 col-sm-6 col-md-6 row-right" style="padding: 15px;">
					<video id="video" width="100%" poster="video/poster.png" controls >
						<source id="mp4" type="video/mp4" src="video/trailer.mp4"></source>											
					</video>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6" style="padding: 25px;">
					<img class="img-responsive " src="./images/StackedColumnChart.png">
				</div>	
			</div>			
		</div>
		<div id="bottomContainer" class="container-fluid">
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<img class="img-responsive" src="./images/graph1.png" style="margin: 0 auto;">						
				</div>
				<div class="col-md-6">
					<div style=" color: #000; font-size: 20px; font-weight: bold; margin-bottom: 4%; margin-top: 3%; text-align: center;">
						Avarage Emotion & Motivatzion Variation
					</div>
					<div class="row margin-top">
						<div class="col-md-6" style="text-align: center;">
							<div class="motivation-happy circle-graph"></div>
							<img class="img-responsive" src="images/face1.png" style=" position: relative;top: -115px; margin: 0 auto;" />
						</div>
						<div class="col-md-6" style="text-align: center;">
							<div class="motivation-sad circle-graph"></div>
							<img class="img-responsive" src="images/face2.png" style=" position: relative;top: -115px; margin: 0 auto;" />
						</div>
					</div>
					
				</div>
			</div>
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<img class="img-responsive" src="./images/graph2.png" style="margin: 0 auto;">				
				</div>
				<div class="col-md-6">
					<div style=" color: #000; font-size: 20px; font-weight: bold; margin-bottom: 4%; margin-top: 3%; text-align: center;">
						Avarage  &nbsp; &nbsp; Attention Variation
					</div>
					<div class="row margin-top">
						<div class="col-md-6" style="text-align: center;">
							<div class="attention-happy circle-graph"></div>
							<img class="img-responsive" src="images/darckbluebig.png"  width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
						</div>
						<div class="col-md-6" style="text-align: center;">
							<div class="attention-sad circle-graph"></div>
							<img class="img-responsive" src="images/lightbluebig.png" width="91" style=" position: relative;top: -115px; margin: 0 auto;" />
						</div>
					</div>
				</div>
			</div>
			<div class="row row-top">
				<div class="col-md-6 row-right" style="">
					<img class="img-responsive" src="./images/graph3.png" style="margin: 0 auto;">			
				</div>
				<div class="col-md-6 circle-face">
					<div style=" color: #000; font-size: 20px; font-weight: bold; margin-bottom: 4%; margin-top: 3%; text-align: center;">
						Avarage  &nbsp; &nbsp; Meaning Variation
					</div>
					<div class="row">
						<div class="col-md-4" style="text-align: center;">
							<div class="meaning-happy-blk circle-graph"></div>
							<img class="img-responsive" src="images/blk.png"/>
						</div>
						<div class="col-md-4" style="text-align: center;">
							<div class="meaning-sad-org circle-graph"></div>
							<img class="img-responsive" src="images/org.png"/>
						</div>
						<div class="col-md-4" style="text-align: center;">
							<div class="meaning-happy-green circle-graph"></div>
							<img class="img-responsive" src="images/green_1.png"/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4" style="text-align: center;">
							<div class="meaning-happy-red circle-graph"></div>
							<img class="img-responsive" src="images/red.png" />
						</div>
						<div class="col-md-4" style="text-align: center;">
							<div class="meaning-sad-purple circle-graph"></div>
							<img class="img-responsive" src="images/purple.png"/>
						</div>
						<div class="col-md-4" style="text-align: center;">
							<div class="meaning-happy-blue circle-graph"></div>
							<img class="img-responsive" src="images/blue.png" />
						</div>
					</div>
				</div>
			</div>
		</div>
		    

{/block} 