<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 08:28:44
         compiled from ".\templates\video_graph.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1523254ba0f2c602965-84264175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a67f9487abf522de9abbc53b4820650ad7fc14d1' => 
    array (
      0 => '.\\templates\\video_graph.tpl',
      1 => 1411023100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1523254ba0f2c602965-84264175',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<head>
		<title><?php echo $_smarty_tpl->getVariable('c_title')->value;?>
</title>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<link href="../nvd3/src/nv.d3.css" rel="stylesheet" type="text/css">
		<script src="../nvd3/lib/d3.v3.js"></script>
		<script src="../nvd3/nv.d3.js"></script>
		<script src="../nvd3/src/utils.js"></script>
		<script src="../nvd3/src/models/legend.js"></script>
		<script src="../nvd3/src/models/axis.js"></script>
		<script src="../nvd3/src/models/scatter.js"></script>
		<script src="../nvd3/src/models/line.js"></script>
		<script src="../nvd3/src/models/lineChart.js"></script>
		<script>
			var compare_url,time_compare,valence_compare,compare_user_name,show=0;
			var i=0;
			var o=0;
			var j=0;
			var content_id='<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
';
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
			<?php $_smarty_tpl->tpl_vars['fname'] = new Smarty_variable(explode(" ",$_smarty_tpl->getVariable('user_name')->value), null, null);?>;
			var user = '<?php echo $_smarty_tpl->getVariable('fname')->value;?>
';
			var cf_id = '<?php echo $_smarty_tpl->getVariable('cf_id')->value;?>
';
			var time;
			var video_id= '<?php echo $_smarty_tpl->getVariable('video_id')->value;?>
';
		</script>
        <link rel="stylesheet" type="text/css" href="../administrator/templates/video_graph.css">
	</head>
	<body >
	<!-- 
	    <div style="width:100%;">
	    	<form name="frm" target="ifrm" action="index.php">
		    <input type="checkbox" value="1" checked="checked" checked="checked" name="analysis_gp" id="analysis_gp"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Analysis Graph &nbsp;&nbsp;|&nbsp;&nbsp; </font>
		    <input type="checkbox" value="1" checked="checked" checked="checked"  name="avg_analysis_gp" id="avg_analysis_gp"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Average Analysis Graph &nbsp;&nbsp;|&nbsp;&nbsp;</font>
		    <input type="checkbox" value="1" checked="checked" checked="checked"  name="fl_vid" id="fl_vid"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Recorded Video &nbsp;&nbsp;|&nbsp;&nbsp;</font>
		    <input type="checkbox" value="1" checked="checked" checked="checked"  name="smiley" id="smiley"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Smiley  </font>
	    	<input type="button" onclick="show_graph(0)"  value="Show Video"/ > &nbsp;&nbsp;|&nbsp;&nbsp;  <font style="font-size:14px; font:Arial, Helvetica, sans-serif">Compare with:</font> &nbsp;
	    	<select name="user_id" id="user_id" onchange="get_info()"><?php echo $_smarty_tpl->getVariable('compare_option')->value;?>
</select>
	    	<input type="hidden" name="c_id" value="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
" />
	    	<input type="hidden" name="act" value="get_compare_valence" />   
	    	<input type="button" onclick="show_graph(1)"  value="Compare Now"/ >  
	    	</form>
	    </div>

	    <div style="clear:both"></div>
	    
	    <hr> 
	-->
		
		<div id="left" style="float:left;width:610px;padding-right:20px;border-right:1px solid #303030;">
			
			<div id="video" style="position:relative;z-index:0;padding:5px;margin:0;height:460px;width:100%;">
				<div id="player" style="z-index:1;"></div>
				<div id="canvas" width="80" height="60" style="position:absolute;right:15px;bottom:50px;z-index:2;display:none">
					<img src="" width="80" height="60" name="smiley" border="0"/>
				</div>
			</div>

			<div id="timeline" style="position:relative;width:100%;height:0;">
			</div>

			<div id="timeline2" style="position:relative;width:100%;height:0;">
			</div>
			
			<div id="gradient" style="width:100%;height:40px;margin-top:40px" title="Heat Map">
			</div>
			<!--div id="myContent" style="position:relative;display:block;margin:0;padding:0;width:100%;height:150px;z-index:100;">
				<table id="user_pics">
					<tr>
					  <td><div id="00"><img src="" width="80" height="60" border="0"/><span class="gg00"></span></div></td>
			  		  <td><div id="11"><img src="" width="80" height="60" border="0"/><span class="gg11"></span></div></td> 
				      <td><div id="22"><img src="" width="80" height="60" border="0"/><span class="gg22"></span></div></td>
					  <td><div id="33"><img src="" width="80" height="60" border="0"/><span class="gg33"></span></div></td>
					  <td><div id="44"><img src="" width="80" height="60" border="0"/><span class="gg44"></span></div></td> 
					  <td><div id="55"><img src="" width="80" height="60" border="0"/><span class="gg55"></span></div></td>
					  <td><div id="66"><img src="" width="80" height="60" border="0"/><span class="gg66"></span></div></td>
					</tr>
				</table>

				<table id="overall_pics" style="display: none">
					<tr>
					  <td><div id="g00"><img src="" width="80" height="60" border="0"/><span class="gg00"></span></div></td>
			  		  <td><div id="g11"><img src="" width="80" height="60" border="0"/><span class="gg11"></span></div></td> 
				      <td><div id="g22"><img src="" width="80" height="60" border="0"/><span class="gg22"></span></div></td>
					  <td><div id="g33"><img src="" width="80" height="60" border="0"/><span class="gg33"></span></div></td>
					  <td><div id="g44"><img src="" width="80" height="60" border="0"/><span class="gg44"></span></div></td> 
					  <td><div id="g55"><img src="" width="80" height="60" border="0"/><span class="gg55"></span></div></td>
					  <td><div id="g66"><img src="" width="80" height="60" border="0"/><span class="gg66"></span></div></td>
					</tr>
				</table>
				<button id="toggle" onclick="toggle_visibility('overall_pics', 'user_pics');">Overall Users</button>
			</div-->

		</div>
			
		<div id="right" style="margin-left:630px;padding-left:20px;width:620px;border-left:1px solid #303030;">

			<div class="svg_chart">
				<div class="desc">Instantaneous emotions - Current User</div>
				<hr>
				<div id="svg_chart"  style="width:620px;height:200px;">
					<svg id="main_svg" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>

			<hr/>

			<div class="svg_chart">
				<div class="desc">Instataneous Microexpressions - Current User</div>
				<hr>
				<div id="svg_chart3"  style="width:620px;height:200px;">
					<svg id="main_svg3" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>

			<hr/>

			<div class="svg_chart">
				<div class="desc">Engagement and Valence - Current User</div>
				<hr>
			    <div id="svg_chart2"  style="width:620px;height:200px;">
					<svg id="main_svg2" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>

			<hr/>

            <div class="svg_chart">
				<div class="desc">Engagement and Valence - Overall</div>
				<hr>
			    <div id="svg_chart4"  style="width:620px;height:200px;">
					<svg id="main_svg4" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>

			<hr/>

			<div class="svg_chart">
				<div class="desc">Microexpressions ScatterChart - Current User</div>
				<hr>
			    <div id="svg_chart5"  style="width:620px;height:620px;">
					<svg id="main_svg5" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>

			<hr/>

			<div class="svg_chart">
				<div class="desc">Microexpressions ScatterChart - Overall</div>
				<hr>
			    <div id="svg_chart7"  style="width:620px;height:620px;">
					<svg id="main_svg7" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>

			<hr/>

                        <div class="svg_chart">
				<div class="desc">User Profile - ScatterChart</div>
				<hr>
			    <div id="svg_chart6"  style="width:620px;height:620px;">
					<svg id="main_svg6" width="620" height="200" style="display:block;"></svg>
				</div>
			</div>

			<hr/>
			<div class="svg_chart">
				<div class="desc">Number of Views by Gender</div>
				<hr>
				<div style="width:200px;height:200px;">
					<svg id="gender_svg" width="100%" height="100%" style="display:block;"></svg>
				</div>
			</div>
			
			<!-- 
			<div id = "snapshots" style="float:left;margin:0px 100px 0px 0px">
				<div id="thumbnails" style="display:none;text-align:center">
				<div id="emotion_name"></div>
				    <table>
						<tr>
						  <td><div class="hovergallery" id="0"><IMG src="" width="50" height="50" border="0"/><DIV id="0emotion"></DIV><div id="0Time"></div></div></td>
				  		  <td><div class="hovergallery" id="1"><IMG src="" width="50" height="50" border="0"/><DIV id="1emotion"></DIV><div id="1Time"></div></div></td> 
					      <td><div class="hovergallery" id="2"><IMG src="" width="50" height="50" border="0"/><DIV id="2emotion"></DIV><div id="2Time"></div></div></td>
						  <td><div class="hovergallery" id="3"><IMG src="" width="50" height="50" border="0"/><DIV id="3emotion"></DIV><div id="3Time"></div></div></td>
						  <td><div class="hovergallery" id="4"><IMG src="" width="50" height="50" border="0"/><DIV id="4emotion"></DIV><div id="4Time"></div></div></td> 
						  <td><div class="hovergallery" id="5"><IMG src="" width="50" height="50" border="0"/><DIV id="5emotion"></DIV><div id="5Time"></div></div></td>
						  <td><div class="hovergallery" id="6"><IMG src="" width="50" height="50" border="0"/><DIV id="6emotion"></DIV><div id="6Time"></div></div></td>
						</tr>
				    </table>
				</div>
			</div> 
			-->

		</div>

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

	</body>
</html>
		