var timeline_width = document.getElementById('timeline').offsetWidth;
var json_overall_length;
var micro_ratio=[];
var micro_diff=[];
var micro_normalized=[];
var micro_inst=[];
var negative_abs=0;
var negative_curr=0;
var nothing=[];
var video_complete=0;         // video isn't complete yet
var micro_exhilarated=[],micro_delighted=[],micro_blissful=[],micro_serene=[],micro_depressed=[],micro_despairing=[],micro_disgusted=[],micro_terrified=[],micro_furious=[],micro_interested=[];
var micro_happy=[],micro_pleased=[],micro_content=[],micro_relaxed=[],micro_bored=[],micro_sad=[],micro_afraid=[],micro_angry=[];
nothing.push({x: -1, y: 1, size: 0.0000000001, shape:"circle"});
nothing.push({x: 1, y: -1, size: 0.0000000001, shape:"circle"});
var micro_emotions=[
		{
			values: "exhilarated",
			x: 0.565,
			y: 0.97
		},
		{
			values: "delighted",
			x: 0.875,
			y: 0.715
		},
		{
			values: "interested",
			x: 0.415,
			y: 0.47
		},
		{
			values: "blissful",
			x: 0.99,
			y: 0.37
		},
		{
			values: "happy",
			x: 0.695,
			y: 0.31
		},
		{
			values: "pleased",
			x: 0.635,
			y: 0.04
		},
		{
			values: "content",
			x: 0.635,
			y: -0.355
		},
		{
			values: "relaxed",
			x: 0.46,
			y: -0.62
		},
		{
			values: "serene",
			x: 0.87,
			y: -0.74
		},
		{
			values: "sad",
			x: -0.405,
			y: -0.305
		},
		{
			values: "despairing",
			x: -0.985,
			y: -0.58
		},
		{
			values: "depressed",
			x: -0.545,
			y: -1
		},
		{
			values: "bored",
			x: -0.255,
			y: -0.72
		},
		{
			values: "furious",
			x: -0.56,
			y: 0.965
		},
		{
			values: "terrified",
			x: -0.875,
			y: 0.71
		},
		{
			values: "angry",
			x: -0.305,
			y: 0.695
		},
		{
			values: "afraid",
			x: -0.65,
			y: 0.375
		},
		{
			values: "disgusted",
			x: -0.99,
			y: 0.38
		},
	];

window.styles = {
      '-webkit-transform':'scale(5)',
      '-moz-transform':'scale(5)',
      '-o-transform':'scale(5)',
      'box-shadow':'0px 0px 30px gray',
      '-webkit-box-shadow':'0px 0px 30px gray',
      '-moz-box-shadow':'0px 0px 30px gray',
      opacity: '1'
    };

window.pstyles = {
	'-webkit-transform':'', 
	'-moz-transform':'', 
	'-o-transform':'', 
	'-webkit-transition-duration': '', 
	'-moz-transition-duration': '', 
	'-o-transition-duration': '', 
	opacity: '', 
	margin: ''
};

function set_compare(url,time,vlc,name)
{
	compare_url=url;
	compare_user_name=name;
	time_compare=time;
	valence_compare=vlc;
	show=1;
}
function get_info()
{
	show=0;
	document.frm.submit();
}

var TotalSeconds;
function CreateTimer() {
	for(var i=0;i<7;i++){
		micro_ratio[i]=json[3][3][i]/json[3][4][i];
	}
	json_overall_length = json[1].length;
    window.setTimeout("Tick()", 1000);
}
function make_graph(idx,time)
{   

	neutral.push({x:time,y:Number(json[idx][i][1])});
	happy.push({x:time,y:Number(json[idx][i][2])});
	sad.push({x:time,y:Number(json[idx][i][3])});
	angry.push({x:time,y:Number(json[idx][i][4])});
	surprised.push({x:time,y:Number(json[idx][i][5])});
	scared.push({x:time,y:Number(json[idx][i][6])});
	disgusted.push({x:time,y:Number(json[idx][i][7])});
	emotions = [
	{
		values: neutral,
		key: "Neutral",
		color: "#181818"
	},
	{
		values: happy,
		key: "Happy",
		color: "#ff7f0e"
	},
	{
		values: sad,
		key: "Sad",
		color: "#2ca02c"
	},
	{
		values: surprised,
		key: "Surprised",
		color: "#33ccff"
	},
	{
		values: angry,
		key: "Angry",
		color: "#cc0000"
	},
	{
		values: scared,
		key: "Scared",
		color: "#669933"
	},
	{
		values: disgusted,
		key: "Disgusted",
		color: "#993366"
	}
	];
	nv.addGraph(function() {
		var chart = nv.models.lineChart();
		var fitScreen = false;
		var width = 620;
		var height = 225;

		chart.useInteractiveGuideline(true);
		chart.margin({left: 30})
		chart.xAxis.tickFormat(d3.format(',r'));

		chart.yAxis.tickFormat(d3.format(',.2f'));

		chart.width(width).height(height);
		$('#svg_chart').css('display','block');
		d3.select('#svg_chart svg')
		.attr('perserveAspectRatio', 'xMinYMid')
		.attr('width', width)
		.attr('height', height)
		.datum(emotions)
		.call(chart);
		return chart;
	});



    	for(var j=0;j<7;j++){
	    	micro_diff[j]=(json[idx][i][j+1]/json[3][0][j])-1;
	    	micro_normalized[j]=(micro_diff[j]>0) ? micro_diff[j]/((json[3][1][j]/json[3][0][j])-1) : micro_diff[j]/((json[3][2][j]/json[3][0][j])-1);
	    	micro_inst[j]=((1-micro_normalized[j])*(micro_ratio[j]-1)+1)*json[idx][i][j+1];
	    	if(micro_inst[j]>1) micro_inst[j]=1;
        }


   // The below code is for the instantaneous values of emotions which depends on the change in corresponding opposite emotions
   // for(var j=0;j<7;j++){
   // 		if(i==0){
   // 			micro_inst[j]=Number(json[idx][i][j+1]);
   // 		}
   // 		else{
   // 			if(j==1||j==4) micro_inst[j]=Number(micro_inst[j])+(Number(json[idx][i][j+1])-Number(json[idx][i-1][j+1]))*(Math.abs(Number(json[idx][i][3])-Number(json[idx][i-1][3])+Number(json[idx][i][4])-Number(json[idx][i-1][4])+Number(json[idx][i][6])-Number(json[idx][i-1][6])+Number(json[idx][i][7])-Number(json[idx][i-1][7]))/(Math.abs(Number(json[idx][i][3])-Number(json[idx][i-1][3]))+Math.abs(Number(json[idx][i][4])-Number(json[idx][i-1][4]))+Math.abs(Number(json[idx][i][6])-Number(json[idx][i-1][6]))+Math.abs(Number(json[idx][i][7])-Number(json[idx][i-1][7]))));
   // 			if(j==2||j==3||j==5||j==6)  micro_inst[j]=Number(micro_inst[j])+(Number(json[idx][i][j+1])-Number(json[idx][i-1][j+1]))*(Math.abs(Number(json[idx][i][2])-Number(json[idx][i-1][2])+Number(json[idx][i][5])-Number(json[idx][i-1][5]))/(Math.abs(Number(json[idx][i][2])-Number(json[idx][i-1][2]))+Math.abs(Number(json[idx][i][5])-Number(json[idx][i-1][5]))));
   // 			if(j==0) micro_inst[j]=Number(micro_inst[j])+(Number(json[idx][i][j+1])-Number(json[idx][i-1][j+1]))*(Math.abs(Number(json[idx][i][3])-Number(json[idx][i-1][3])+Number(json[idx][i][4])-Number(json[idx][i-1][4])+Number(json[idx][i][6])-Number(json[idx][i-1][6])+Number(json[idx][i][7])-Number(json[idx][i-1][7])+Number(json[idx][i][2])-Number(json[idx][i-1][2])+Number(json[idx][i][5])-Number(json[idx][i-1][5]))/(Math.abs(Number(json[idx][i][3])-Number(json[idx][i-1][3]))+Math.abs(Number(json[idx][i][4])-Number(json[idx][i-1][4]))+Math.abs(Number(json[idx][i][6])-Number(json[idx][i-1][6]))+Math.abs(Number(json[idx][i][7])-Number(json[idx][i-1][7]))+Math.abs(Number(json[idx][i][2])-Number(json[idx][i-1][2]))+Math.abs(Number(json[idx][i][5])-Number(json[idx][i-1][5]))));
   // 		}
   // }
        
	neutral2.push({x:time,y:Number(micro_inst[0])});
	happy2.push({x:time,y:Number(micro_inst[1])});
	sad2.push({x:time,y:Number(micro_inst[2])});
	angry2.push({x:time,y:Number(micro_inst[3])});
	surprised2.push({x:time,y:Number(micro_inst[4])});
	scared2.push({x:time,y:Number(micro_inst[5])});
	disgusted2.push({x:time,y:Number(micro_inst[6])});

	emotions2 = [
	{
		values: neutral2,
		key: "Neutral",
		color: "#181818"
	},
	{
		values: happy2,
		key: "Happy",
		color: "#ff7f0e"
	},
	{
		values: sad2,
		key: "Sad",
		color: "#2ca02c"
	},
	{
		values: surprised2,
		key: "Surprised",
		color: "#33ccff"
	},
	{
		values: angry2,
		key: "Angry",
		color: "#cc0000"
	},
	{
		values: scared2,
		key: "Scared",
		color: "#669933"
	},
	{
		values: disgusted2,
		key: "Disgusted",
		color: "#993366"
	}
	];

	nv.addGraph(function() {
		var chart = nv.models.lineChart();
		var fitScreen = false;
		var width = 620;
		var height = 225;

		chart.useInteractiveGuideline(true);
		chart.margin({left: 30})
		chart.xAxis.tickFormat(d3.format(',r'));

		chart.yAxis.tickFormat(d3.format(',.2f'));

		chart.width(width).height(height);
		$('#svg_chart3').css('display','block');
		d3.select('#svg_chart3 svg')
		.attr('perserveAspectRatio', 'xMinYMid')
		.attr('width', width)
		.attr('height', height)
		.datum(emotions2)
		.call(chart);
		return chart;
	});


	/*function stream_layers(n, m, o) {
	  if (arguments.length < 3) o = 0;
	  return d3.range(n).map(function(d,k) {
	      var a = [], j;
	      for (j = 0; j < m; j++) a[j] = (k==0) ? json[idx][i][j+1]-json[3][k][j]:json[3][k][j];
	      return a.map(stream_index);
	    });
	}

	function stream_index(d, i) {
	  return {x: i, y: d};
	}

	function exampleData() {
	  return stream_layers(3,7,.1).map(function(data, i) {
	    var key = (i==0) ? "Instant-Avg" : (i==1) ? "Maxima" : "Standard deviation";
	    return {
	      key: key,
	      values: data
	    };
	  });
	}*/

	/*nv.addGraph(function() {
	    var chart = nv.models.multiBarChart()
	      .transitionDuration(350)
	      .reduceXTicks(true)   //If 'false', every single x-axis tick label will be rendered.
	      .rotateLabels(0)      //Angle to rotate x-axis labels.
	      .showControls(false)   //Allow user to switch between 'Grouped' and 'Stacked' mode.
	      .groupSpacing(0.1)    //Distance between each group of bars.
	    ;

	    chart.xAxis
	        .tickFormat(d3.format(',f'));

	    chart.yAxis
	        .tickFormat(d3.format(',.1f'));

	    d3.select('#svg_chart3 svg')
	        .datum(exampleData())
	        .call(chart);

	    nv.utils.windowResize(chart.update);

	    return chart;
	});*/

}	

function make_graph_disengaged(idx,time)
{   
	disengage.push({x:time,y:Number(disengaged[j][1])});
	valence.push({x:time,y:Number(disengaged[j][2])});
	disengagement = [
	{
		values: disengage,
		key: "Engagement",
        color: "#2ca02c"
	},
	{
		values: valence,
		key: "Valence",
        color: "#cc0000"
	}
	];
	nv.addGraph(function() {
	var chart = nv.models.lineChart();
	var fitScreen = false;
	var width = 620;
	var height = 225;

	chart.useInteractiveGuideline(true);
	chart.margin({left: 30})
	chart.xAxis.tickFormat(d3.format(',r'));

	chart.yAxis.tickFormat(d3.format(',.2f'));

	chart.width(width).height(height);
	d3.select('#svg_chart2 svg')
	    .attr('perserveAspectRatio', 'xMinYMid')
	    .attr('width', width)
	    .attr('height', height)
	    .datum(disengagement)
	    .call(chart);
	return chart;
	});

    var micro_eng=disengaged[j][1];
    var micro_val=disengaged[j][2];
    var dist=99,min_dist=99,micro_value;
    for(var k=0;k<18;++k){
    	if(micro_emotions[k]['x']*micro_val>=0&&micro_emotions[k]['y']*micro_eng>=0){
    		dist=Math.sqrt(Math.pow((micro_emotions[k]['x']-micro_val), 2)+Math.pow((micro_emotions[k]['y']-micro_eng), 2));
    		if(dist<min_dist){
    			min_dist=dist;
    			micro_value=micro_emotions[k]['values'];
    		}
    	}
    }
    if(micro_value=="exhilarated") micro_exhilarated.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="delighted") micro_delighted.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="blissful") micro_blissful.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="serene") micro_serene.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="depressed") micro_depressed.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="despairing") micro_despairing.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="disgusted") micro_disgusted.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="terrified") micro_terrified.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="furious") micro_furious.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="interested") micro_interested.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="happy") micro_happy.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="pleased") micro_pleased.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="content") micro_content.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="relaxed") micro_relaxed.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="bored") micro_bored.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="sad") micro_sad.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="afraid") micro_afraid.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});
    else if(micro_value=="angry") micro_angry.push({x: micro_val, y: micro_eng, size: 1-min_dist, shape:"circle"});

    var micro_data=[
	    {
	    	key: 'exhilarated',
            values: micro_exhilarated
	    },
	    {
	    	key: 'delighted',
            values: micro_delighted
	    },
	    {
	    	key: 'blissful',
            values: micro_blissful
	    },
	    {
	    	key: 'serene',
            values: micro_serene
	    },
	    {
	    	key: 'depressed',
            values: micro_depressed
	    },
	    {
	    	key: 'despairing',
            values: micro_despairing
	    },
	    {
	    	key: 'disgusted',
            values: micro_disgusted
	    },
	    {
	    	key: 'terrified',
            values: micro_terrified
	    },
	    {
	    	key: 'furious',
            values: micro_furious
	    },
	    {
	    	key: 'interested',
            values: micro_interested
	    },
	    {
	    	key: 'happy',
            values: micro_happy
	    },
	    {
	    	key: 'pleased',
            values: micro_pleased
	    },
	    {
	    	key: 'content',
            values: micro_content
	    },
	    {
	    	key: 'relaxed',
            values: micro_relaxed
	    },
	    {
	    	key: 'bored',
            values: micro_bored
	    },
	    {
	    	key: 'sad',
            values: micro_sad
	    },
	    {
	    	key: 'afraid',
            values: micro_afraid
	    },
	    {
	    	key: 'angry',
            values: micro_angry
	    },
	    {
    		key: 'corners',
    		values: nothing
    	}
    ];

    nv.addGraph(function() {
	  var chart = nv.models.scatterChart()
	                .showDistX(true)    //showDist, when true, will display those little distribution lines on the axis.
	                .showDistY(true)
	                .transitionDuration(350)
	                .color(d3.scale.category10().range());

	  //Configure how the tooltip looks.
	  chart.tooltipContent(function(key) {
	      return '<h3>' + key + '</h3>';
	  });

	  //Axis settings
	  chart.xAxis.tickFormat(d3.format('.02f'));
	  chart.yAxis.tickFormat(d3.format('.02f'));

	  //We want to show shapes other than circles.
	  chart.scatter.onlyCircles(false);

	  d3.select('#svg_chart5 svg')
	      .datum(micro_data)
	      .call(chart);

	  //nv.utils.windowResize(chart.update);

	  return chart;
	});




}	


function show_smiley(i, time,idx)
{
                var done=false;
		if(i==dom_emotion[0]){
			document.images.smiley.src = "../smiley/neutral.png";
			if(!done) document.getElementById('timeline').innerHTML+="<div class=\"timeline-item\" id=\"at-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[idx][dom_emotion[0]][8]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
			setTimeout(function(){$('div#Normal img').css(pstyles)}, 2000);
			p++;
			// document.getElementById(p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[idx][dom_emotion[0]][8]+".jpg";
			// document.getElementById(p.toString()+p.toString()).style.display="block";
			// document.getElementById("g"+p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[1][0][2]+".jpg";
			// document.getElementById("g"+p.toString()+p.toString()).style.display="block";
			$("#at-"+time+" div.img-popup").append('<span>Neutral</span>');
			$("#at2-"+json[1][0][0]+" div.img-popup").append('<span>Neutral</span>');
			done=true;
		}
		if(i==dom_emotion[1]){
			document.images.smiley.src = "../smiley/happy.jpeg";
			if(!done) document.getElementById('timeline').innerHTML+="<div class=\"timeline-item\" id=\"at-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[idx][dom_emotion[1]][8]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
			p++;
			// document.getElementById(p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[idx][dom_emotion[1]][8]+".jpg";
			// document.getElementById(p.toString()+p.toString()).style.display="block";
			// document.getElementById("g"+p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[1][1][2]+".jpg";
			// document.getElementById("g"+p.toString()+p.toString()).style.display="block";
			$("#at-"+time+" div.img-popup").append('<span>Happy</span>');
			done=true;
		}
		if(i==dom_emotion[2]){
			document.images.smiley.src = "../smiley/sad.jpg";
			if(!done) document.getElementById('timeline').innerHTML+="<div class=\"timeline-item\" id=\"at-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[idx][dom_emotion[2]][8]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
			p++;
			// document.getElementById(p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[idx][dom_emotion[2]][8]+".jpg";
			// document.getElementById(p.toString()+p.toString()).style.display="block";
			// document.getElementById("g"+p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[1][2][2]+".jpg";
			// document.getElementById("g"+p.toString()+p.toString()).style.display="block";
			$("#at-"+time+" div.img-popup").append('<span>Sad</span>');
			$("#at2-"+json[1][2][0]+" div.img-popup").append('<span>Sad</span>');
			done=true;
		}
		if(i==dom_emotion[3]){
			document.images.smiley.src = "../smiley/angry.jpg";
			if(!done) document.getElementById('timeline').innerHTML+="<div class=\"timeline-item\" id=\"at-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[idx][dom_emotion[3]][8]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
			p++;
			// document.getElementById(p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[idx][dom_emotion[3]][8]+".jpg";
			// document.getElementById(p.toString()+p.toString()).style.display="block";
			// document.getElementById("g"+p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[1][3][2]+".jpg";
			// document.getElementById("g"+p.toString()+p.toString()).style.display="block";
			$("#at-"+time+" div.img-popup").append('<span>Angry</span>');
			$("#at2-"+json[1][3][0]+" div.img-popup").append('<span>Angry</span>');
			done=true;
		}
		if(i==dom_emotion[4]){
			document.images.smiley.src = "../smiley/surprised.jpg";
			if(!done) document.getElementById('timeline').innerHTML+="<div class=\"timeline-item\" id=\"at-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[idx][dom_emotion[4]][8]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
			p++;
			// document.getElementById(p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[idx][dom_emotion[4]][8]+".jpg";
			// document.getElementById(p.toString()+p.toString()).style.display="block";
			// document.getElementById("g"+p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[1][4][2]+".jpg";
			// document.getElementById("g"+p.toString()+p.toString()).style.display="block";
			$("#at-"+time+" div.img-popup").append('<span>Surprised</span>');
			$("#at2-"+json[1][4][0]+" div.img-popup").append('<span>Surprised</span>');
			done=true;
		}		
		if(i==dom_emotion[5]){
			document.images.smiley.src = "../smiley/scared.gif";
			if(!done) document.getElementById('timeline').innerHTML+="<div class=\"timeline-item\" id=\"at-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[idx][dom_emotion[5]][8]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
			p++;
			// document.getElementById(p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[idx][dom_emotion[5]][8]+".jpg";
			// document.getElementById(p.toString()+p.toString()).style.display="block";
			// document.getElementById("g"+p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[1][5][2]+".jpg";
			// document.getElementById("g"+p.toString()+p.toString()).style.display="block";
			$("#at-"+time+" div.img-popup").append('<span>Scared</span>');
			$("#at2-"+json[1][5][0]+" div.img-popup").append('<span>Scared</span>');
			done=true;
		}	
		if(i==dom_emotion[6]){
			document.images.smiley.src = "../smiley/disgusted.jpg";
			if(!done) document.getElementById('timeline').innerHTML+="<div class=\"timeline-item\" id=\"at-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[idx][dom_emotion[6]][8]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
			p++;
			// document.getElementById(p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[idx][dom_emotion[6]][8]+".jpg";
			// document.getElementById(p.toString()+p.toString()).style.display="block";
			// document.getElementById("g"+p.toString()+p.toString()).getElementsByTagName('img')[0].src="../uploads/"+json[1][6][2]+".jpg";
			// document.getElementById("g"+p.toString()+p.toString()).style.display="block";
			$("#at-"+time+" div.img-popup").append('<span>Disgusted</span>');
			$("#at2-"+json[1][6][0]+" div.img-popup").append('<span>Disgusted</span>');
			done=true;
		}
}

function show_overall_timeline(i,j,time) {
	var done=false;
	document.getElementById('timeline2').innerHTML+="<div class=\"timeline-item\" id=\"at2-"+time+"\" style=\"left:"+(timeline_width*time/video_duration-7).toString()+"px;\"><span class=\"dot\"></span><div class=\"img-popup\"><img src=\"../uploads/"+json[1][i][2]+".jpg\" width=\"120\" height=\"90\" /></div></div>";
	while(i<=j) {
		if(json[1][i][3]==0){
			if(json[1][i][2]==json[0][dom_emotion[1]][8]) {
				if(!done) {
					$("#at2-"+time).addClass('winner-current');
					done=true;
				}
				$("#at2-"+time+" div.img-popup").append('<span class="winner-current">Neutral</span>');
			}
			else {
				$("#at2-"+time+" div.img-popup").append('<span>Neutral</span>');
			}
		}
		else if(json[1][i][3]==1){
			if(json[1][i][2]==json[0][dom_emotion[1]][8]) {
				if(!done) {
					$("#at2-"+time).addClass('winner-current');
					done=true;
				}
				$("#at2-"+time+" div.img-popup").append('<span class="winner-current">Happy</span>');
			}
			else {
				$("#at2-"+time+" div.img-popup").append('<span>Happy</span>');
			}
		}
		else if(json[1][i][3]==2){
			if(json[1][i][2]==json[0][dom_emotion[2]][8]) {
				if(!done) {
					$("#at2-"+time).addClass('winner-current');
					done=true;
				}
				$("#at2-"+time+" div.img-popup").append('<span class="winner-current">Sad</span>');
			}
			else {
				$("#at2-"+time+" div.img-popup").append('<span>Sad</span>');
			}
		}
		else if(json[1][i][3]==3){
			if(json[1][i][2]==json[0][dom_emotion[3]][8]) {
				if(!done) {
					$("#at2-"+time).addClass('winner-current');
					done=true;
				}
				$("#at2-"+time+" div.img-popup").append('<span class="winner-current">Angry</span>');
			}
			else {
				$("#at2-"+time+" div.img-popup").append('<span>Angry</span>');
			}
		}
		else if(json[1][i][3]==4){
			if(json[1][i][2]==json[0][dom_emotion[4]][8]) {
				if(!done) {
					$("#at2-"+time).addClass('winner-current');
					done=true;
				}
				$("#at2-"+time+" div.img-popup").append('<span class="winner-current">Surprised</span>');
			}
			else {
				$("#at2-"+time+" div.img-popup").append('<span>Surprised</span>');
			}
		}		
		else if(json[1][i][3]==5){
			if(json[1][i][2]==json[0][dom_emotion[5]][8]) {
				if(!done) {
					$("#at2-"+time).addClass('winner-current');
					done=true;
				}
				$("#at2-"+time+" div.img-popup").append('<span class="winner-current">Scared</span>');
			}
			else {
				$("#at2-"+time+" div.img-popup").append('<span>Scared</span>');
			}
		}	
		else if(json[1][i][3]==6){
			if(json[1][i][2]==json[0][dom_emotion[6]][8]) {
				if(!done) {
					$("#at2-"+time).addClass('winner-current');
					done=true;
				}
				$("#at2-"+time+" div.img-popup").append('<span class="winner-current">Disgusted</span>');
			}
			else {
				$("#at2-"+time+" div.img-popup").append('<span>Disgusted</span>');
			}
		}
		i++;
	}
}	

function toggle_visibility(id1, id2) {  
   var e = document.getElementById(id1);
   var e2 = document.getElementById(id2);
   if(e.style.display == 'block') {                
      e.style.display = 'none';             
      e2.style.display = 'block';
      document.getElementById("toggle").innerHTML="Overall Pics";
   }
   else {
      e.style.display = 'block';            
      e2.style.display = 'none';
      document.getElementById("toggle").innerHTML="User Pics";
   }              
} 

function getTime(o) {
	var t,tt,ttt;
	t = json[1][o][0];
	tt = t.split(":");
	if(tt.length==3) {
		ttt = Number(tt[0])*3600 + Number(tt[1])*60 + Math.floor(Number(tt[2]));
	}
	else {
		ttt = Math.floor(Number(tt[0])/1000);
	}
	return ttt;
}

function Tick() {
    TotalSeconds = Math.floor(player.getCurrentTime());
    var t,tt,ttt,old;
    //alert("Tick => i="+i+" json_length="+json_length+" TotalSeconds="+TotalSeconds+" done");
    if(i<json_length)
    {
    	t = json[0][i][0];
    	tt = t.split(":");
    	if(tt.length==3) {
		ttt = Number(tt[0])*3600 + Number(tt[1])*60 + Math.floor(Number(tt[2]));
	}
	else {
		ttt = Math.floor(Number(tt[0])/1000);
	}
        //alert("tt1 : "+tt[1]);
    	while(i<json_length && ttt<=TotalSeconds)
    	{
    		make_graph(0,ttt);
		show_smiley(i,ttt,0);
    		i++;
    		while(i<json_length&&json[0][i][0]==json[0][i-1][0])
    			i++;
    		if(i<json_length){
	    		t = json[0][i][0];
	    		tt = t.split(":");
	    		if(tt.length==3) {
		ttt = Number(tt[0])*3600 + Number(tt[1])*60 + Math.floor(Number(tt[2]));
	}
	else {
		ttt = Math.floor(Number(tt[0])/1000);
	}
	    	}
    	}
    	//alert(Number(json[idx][i][1]));
    }
    if(o<json_overall_length)
    {
    	ttt=getTime(o);
    	while(o<json_overall_length && ttt<=TotalSeconds)
    	{
    		old=o;
    		o++;
    		while(o<json_overall_length&&getTime(o)==getTime(o-1))
    			o++;
			show_overall_timeline(old,o-1,ttt);
    		if(o<json_overall_length){
	    		ttt=getTime(o);
	    	}
    	}
    	//alert(Number(json[idx][i][1]));
    }
    if(video_duration-1<TotalSeconds)
    {
    	i=0;
    	o=0;
    	return;
    }

    if(j<disengaged_length)
    {
    	var t = Math.floor(Number(disengaged[j][0]));
    	while(j<disengaged_length && t<TotalSeconds)
    	{
    		make_graph_disengaged(2,t);
    		j++;
    		while(j<disengaged_length&&disengaged[j][0]==disengaged[j-1][0])
    			j++;
    		if(j<disengaged_length){
	    		t = Math.floor(Number(disengaged[j][0]));
	    	}
    	}
    }

    if(TotalSeconds==t)
    {
    	make_graph_disengaged(2,t);
    	j++;
    	while(j<disengaged_length&&disengaged[j][0]==disengaged[j-1][0])
    		j++;
    }

    if(TotalSeconds>=video_duration-1&&video_complete==0&&json[5].length>0){
    	var distance=99;
		var min_distance=99;
		var time=0;
		var emotion_name;
		window.overall_micro=new Array();
		var json5_len=json[5].length;
		//alert(json5_len);
		for(var ii=0;ii<json5_len;++ii){
			min_distance=99;
			time=ii;
			for(var jj=0;jj<21;++jj){
				distance=Math.sqrt(Math.pow(json[5][ii][3]-json[6][jj][1],2)+Math.pow(json[5][ii][4]-json[6][jj][2],2)+Math.pow(json[5][ii][5]-json[6][jj][3],2)+Math.pow(json[5][ii][6]-json[6][jj][4],2)+Math.pow(json[5][ii][7]-json[6][jj][5],2)+Math.pow(json[5][ii][8]-json[6][jj][6],2)+Math.pow(json[5][ii][9]-json[6][jj][7],2));
				if(distance<min_distance){
					min_distance=distance
					emotion_name=json[6][jj][0]-1;
				}
			}
			overall_micro.push([time,emotion_name,min_distance]);
		}
		video_complete=1;
		draw_gradient(overall_micro);
    }

    window.setTimeout("Tick()", 1000);
}


function show_graph(val)
{	
  var smiley=document.getElementById('smiley').checked;
  if(smiley)smiley=1; else smiley=0; 
  var avg_analysis_gp=document.getElementById('avg_analysis_gp').checked;
  if(avg_analysis_gp)avg_analysis_gp=1; else avg_analysis_gp=0; 
  var analysis_gp=document.getElementById('analysis_gp').checked;
  if(analysis_gp)analysis_gp=1; else analysis_gp=0; 
  var fl_vid=document.getElementById('fl_vid').checked;    
  if(fl_vid)fl_vid=1; else fl_vid=0; 

	if(val==1)
	{
		if(document.getElementById('user_id').value>0)
		{
			//swfobject.embedSWF("video_graph_compare.swf", "myContent",  "1200", "1000", "9.0.0", "../expressInstall.swf",flashvars);
			
		}
		else
			alert('Please select a user to compare!');
	}
	else
	{
		//swfobject.embedSWF("video_graph.swf", "myContent",  "1010", "850", "9.0.0", "../expressInstall.swf",flashvars);
		//document.getElementById('thumbnails').style.display='block';
		document.getElementById('canvas').style.display='block';
		document.getElementById('svg_chart').style.display='block';
		document.getElementById('svg_chart2').style.display='block';
		document.getElementById('snapshots').style.display='block';
		//document.getElementById('myContent').style.display='block';
	}

}					