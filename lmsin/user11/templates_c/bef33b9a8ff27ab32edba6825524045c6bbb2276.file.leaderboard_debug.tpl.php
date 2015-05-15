<?php /* Smarty version Smarty-3.0.6, created on 2015-05-01 07:12:08
         compiled from "leaderboard_debug.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1574955430b28a8df12-14329681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bef33b9a8ff27ab32edba6825524045c6bbb2276' => 
    array (
      0 => 'leaderboard_debug.tpl',
      1 => 1430456089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1574955430b28a8df12-14329681',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['happy']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['happy']['image_path'];?>
"
                },
                {
                    "direction": "Sad",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['sad']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['sad']['image_path'];?>
"
                },
                {
                    "direction": "Angry",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['angry']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['angry']['image_path'];?>
"
                },
                {
                    "direction": "Disgusted",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['disgusted']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['disgusted']['image_path'];?>
"
                },
                {
                    "direction": "Neutral",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['neutral']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['neutral']['image_path'];?>
" 
                    //<img class="img-responsive img-thumbnail emotion-indicator" src="../../uploads/<?php echo $_smarty_tpl->getVariable('u_exp')->value['neutral']['ad_id'];?>
.jpg">
                },
                {
                    "direction": "Scared",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['scared']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['scared']['image_path'];?>
"
                },
               
                {
                    "direction": "Surprised",
                    "value": <?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['suprised']['value'];?>
,
                    "img_src": "<?php echo $_smarty_tpl->getVariable('radar_chart_data')->value['suprised']['image_path'];?>
"
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
            <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['rank'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['points'];?>
</td>
                </tr>
            <?php }} ?>
        </table>
        <table style="background-color:#DCDCDC;">
            <tr style="border-color:#000000;border:10px;">
                <td style="align:left;">
                    <div style="overflow:auto;">
                        <div style="float:left;">
                            <h3><?php echo $_smarty_tpl->getVariable('data')->value[0]['points'];?>
</h3>
                            <h5>POINTS</h5>
                            <p><?php echo $_smarty_tpl->getVariable('data')->value[0]['rank'];?>
. <?php echo $_smarty_tpl->getVariable('data')->value[0]['name'];?>
</p>
                        </div>
                        <div style="float:left;padding-left:5px;">
                            <img src="<?php echo $_smarty_tpl->getVariable('data')->value[0]['profile_img'];?>
" alt="<?php echo $_smarty_tpl->getVariable('data')->value[0]['profile_img'];?>
" style="vertical-align:middle;width:7.5em;height:7.5em;"/>
                        </div>
                    </div>
                </td>
            </tr>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, null);?>
            <?php while ($_smarty_tpl->getVariable('i')->value<3){?>
                <tr>
                    <td><p style="float:left;"><?php echo $_smarty_tpl->getVariable('data')->value[$_smarty_tpl->getVariable('i')->value]['rank'];?>
. <?php echo $_smarty_tpl->getVariable('data')->value[$_smarty_tpl->getVariable('i')->value]['name'];?>
</p><p style="float:right;"><?php echo $_smarty_tpl->getVariable('data')->value[$_smarty_tpl->getVariable('i')->value]['points'];?>
</p></td>
                </tr>
                <?php echo $_smarty_tpl->getVariable('i')->value++;?>

            <?php }?>
        </table>
        <!--<div style="width:75%;height:500px;background-color:gray;">
            <div style="width:25%;height:25%;border:2px solid black;">
                <h2 style="display:inline;vertical-align:central;">You</h2> <img src="<?php echo $_smarty_tpl->getVariable('user')->value['profile_image'];?>
" style="width:125px;height:125px;float:right;"/>
            </div>
            <div>
                
            </div>
        </div>-->
        <div id="timeline">
            <div id="rank">
                <h1>You</h1>
                <div id="stats">
                    <p>Rank: <?php echo $_smarty_tpl->getVariable('user')->value['rank'];?>
</p>
                    <p>Points: <?php echo $_smarty_tpl->getVariable('user')->value['points'];?>
</p>
                </div>
                <div id="img-div">
                    <img src="<?php echo $_smarty_tpl->getVariable('user')->value['profile_image'];?>
" width="80" height="80"/>
                </div>
            </div>
            <div id="youtube">
              <iframe width="295" height="195" src="<?php echo $_smarty_tpl->getVariable('cf_data')->value['c_url'];?>
">
              </iframe>  
            </div>
            <div id="radar" style="background-color:#ececec;">
                
            </div>
            <div id="comments">
                <p>Latest comment: <?php echo $_smarty_tpl->getVariable('cf_data')->value['comment'];?>
</p>
                <div class="emotion-container"> </div>
                <div class="allemotion-container"> </div>
            </div>
            <div id="reward">
                <h2>Your Latest Redemption</h2>
                <p><?php echo $_smarty_tpl->getVariable('latest_reward')->value['title'];?>
</p>
                <p><?php echo $_smarty_tpl->getVariable('latest_reward')->value['subtitle'];?>
</p>
                <img src="<?php echo $_smarty_tpl->getVariable('latest_reward')->value['image'];?>
" width="80" height="80"/>
                <p>Redeemed for <?php echo $_smarty_tpl->getVariable('latest_reward')->value['points'];?>
 points.</p>
            </div>
            <div id="demo">
                <table border="1">
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('rating_data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
?>
                        <tr <?php if ($_smarty_tpl->tpl_vars['row']->value['user_id']==$_smarty_tpl->getVariable('user')->value['id']){?>bgcolor="yellow"<?php }?>>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['row']->value['rating'];?>
</td>
                        </tr>
                    <?php }} ?>
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
			
		});
		
		// get cumulative heat map data
		var c_id = '<?php echo $_smarty_tpl->getVariable('cf_data')->value['c_id'];?>
';
		$.ajax({
			
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
			
		});});
         </script>
</html>