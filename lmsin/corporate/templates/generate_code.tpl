{extends file="index.tpl"}
{block name=body} 
<div class="row  margin-top">
				<div class="col-xs-3">
					 <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
				</div>
               
             
</div>   

 <div class="col-md-10 margin-top" style="border:0px solid #F00">
 Video <strong>"{$video_title}"</strong> rated by <strong>"{$user_name}"</strong> on <strong>{$cf_date}</strong> &nbsp;&nbsp;<button id="back" class="btn-xm btn-info" onClick="goback('video.php?act=video_analysis')" >Back</button>
</div>   
<br />
<br />
<script type="text/javascript" src="{$SERVER_PATH}/js/jquery.js"></script>
<link href="{$SERVER_PATH}nvd3/src/nv.d3.css" rel="stylesheet" type="text/css">
		<script src="{$SERVER_PATH}nvd3/lib/d3.v3.js"></script>
		<script src="{$SERVER_PATH}nvd3/nv.d3.js"></script>
		<script src="{$SERVER_PATH}nvd3/src/utils.js"></script>
		<script src="{$SERVER_PATH}nvd3/src/models/legend.js"></script>
		<script src="{$SERVER_PATH}nvd3/src/models/axis.js"></script>
		<script src="{$SERVER_PATH}nvd3/src/models/scatter.js"></script>
		<script src="{$SERVER_PATH}nvd3/src/models/line.js"></script>
		<script src="{$SERVER_PATH}nvd3/src/models/lineChart.js"></script>
		<script>
			var compare_url,time_compare,valence_compare,compare_user_name,show=0;
			var i=0;
			var o=0;
			var j=0;
			var content_id='{$c_id}';
			var p=-1;
			var result;
			
			var neutral = [];
			var happy=[];
			var sad=[];
			var surprised = [];
			var angry = [];
			var scared = [];
			var disgusted = [];

			var neutral2 = [];
			var happy2=[];
			var sad2=[];
			var surprised2 = [];
			var angry2 = [];
			var scared2 = [];
			var disgusted2 = [];
			
			var emotions,emotions2;

			var disengage = [];
			var valence = [];
			var video_time = [];
			{assign var = fname value=" "|explode:$user_name};
			var user = '{$fname}';
			var cf_id = '{$cf_id}';
			var time;
			var video_id= '{$video_id}';
		</script>
        <link rel="stylesheet" type="text/css" href="templates/video_graph.css">
	</head>
	<body >
	
		<div id="left" style="float:left;width:610px;padding-right:20px;border-right:1px solid #303030;">
			
			<div id="video" style="position:relative;z-index:0;padding:5px;margin:0;height:460px;width:100%;">
				<div id="player" style="z-index:1;"></div>
				<div id="canvas" width="80" height="60" style="position:absolute;right:15px;bottom:50px;z-index:2;display:none">
					<img src="" width="80" height="60" name="smiley" border="0"/>
				</div>
			</div>

			<div id="timeline" style="position:relative;width:100%;height:0;margin-top:25px">
			</div>

			<div id="timeline2" style="position:relative;width:100%;height:0;">
			</div>
			{if $Heat_map>0}
			<div id="gradient" style="width:100%;height:40px;margin-top:40px" title="Heat Map">
			</div>
            {/if}
		</div>
			
		<div id="right" style="margin-left:630px;padding-left:20px;width:620px;border-left:1px solid #303030;">
			
			{if $valence>0 || $engagement>0}
            <div class="svg_chart">
				<div class="desc">Engagement and Valence - Overall</div>
				<hr>
			    <div id="svg_chart4"  style="width:620px;height:200px;">
					<svg id="main_svg4" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>
			<hr/>
            {/if}
            
			{if $microexpressions}
			<div class="svg_chart">
				<div class="desc">Microexpressions ScatterChart - Overall</div>
				<hr>
			    <div id="svg_chart7"  style="width:620px;height:620px;">
					<svg id="main_svg7" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>
			{/if}
		
	    <span id="msg"></span>
		<iframe id="ifrm" name="ifrm" style="display:none; width:300px; height:300px"></iframe>
		<script type="text/javascript">
			var emotion_colors = ['179,26,0',
								  '255,51,0',
								  '255,0,0',
								  '0,255,51',
								  '102,51,0',
								  '179,77,0',
								  '255,255,0',
								  '255,128,0',
								  '179,153,0',
								  '255,179,0',
								  '51,51,128',
								  '128,77,128',
								  '0,51,255',
								  '153,0,51',
								  '204,204,204',
								  '51,51,51',
								  '153,26,26',
								  '77,51,26',
								  '153,153,26',
								  '153,77,26',
								  '255,102,0']
			function draw_gradient(emotions) {
				var str = '';
				for(var index=0;index<emotions.length;index++) {
					str+=',rgba('+emotion_colors[emotions[index][1]]+','+(1/(1+emotions[index][2])).toString()+') '+((emotions[index][0]/video_duration)*100).toString()+'%';
				}
				$('#gradient').css('background','-webkit-linear-gradient(left'+str+')');
				$('#gradient').css('background','-o-linear-gradient(right'+str+')');
				$('#gradient').css('background','-moz-linear-gradient(right'+str+')');
				$('#gradient').css('background','linear-gradient(to right'+str+')');
			}
		</script>
		<script type="text/javascript" src="templates/video_graph_play.js"></script>
{/block}				