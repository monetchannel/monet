$.ajax({
	
	type: 'POST',
	url: 'find_results.php',
	data: { "cf_id":cf_id,
	"c_id":content_id},
	success: function (result,status,jqXHR) {
		//alert(result);
		json = JSON.parse(result);

		window.json_length=json[0].length;
		window.dom_emotion=[0,0,0,0,0,0,0];
		var sortIt=[[0,0,0],[0,0,0],[0,0,0],[0,0,0],[0,0,0],[0,0,0],[0,0,0]];
		if(json[0].length==0) alert("The user wasn't recorded watching this instance of video") ;

		window.disengaged=new Array();
		window.disengaged_length=json[2].length;
		var value;
		for(var k = 0; k < disengaged_length ; k++){
			value=json[2][k][1]*(1-json[2][k][2]);
			disengaged.push([json[2][k][0],value,json[2][k][5],json[2][k][3],json[2][k][4]]);
		}
		disengaged.sort(function(a,b){
		    return a[0] - b[0];
		});

		var faceBox;
		for(var k = 0; k < disengaged_length ; k++){
			if(k==0) faceBox=0;
			else{
				faceBox=disengaged[k][3]-disengaged[k-1][3];							// difference in X(of Centroid)
				faceBox=faceBox/150;													// Max difference in Xi can be 150 
				if(faceBox<0) faceBox=-faceBox;
				// faceBox=Math.pow(disengaged[k][3]-disengaged[k-1][3], 2)+Math.pow(disengaged[k][4]-disengaged[k-1][4], 2)
				// faceBox=Math.sqrt(faceBox)/250;										// Max change in centroid can be 250
				if(faceBox>1)faceBox=1;
			}
			value=disengaged[k][1]*(1-faceBox)*2-1;
			disengaged[k][1]=value;
		}

		window.stored_emotions=["Normal","Happy","Sad","Angry","Surprised","Scared","Disgusted"];
		var row_number;
		var rank_emotions=new Array();
		var adder=[[0,0],[0,0],[0,0],[0,0],[0,0],[0,0],[0,0]];
		for (var k = 0; k < json_length ; k++){
			for (var j = 1; j <= 7; j++){
				adder[j-1][0]=j-1;
				adder[j-1][1]=Number(json[0][k][j]);
			}
			adder.sort(function(a,b){
			    return b[1] - a[1];
			});
			rank_emotions.push([[adder[0][0],adder[0][1]],[adder[1][0],adder[1][1]],[adder[2][0],adder[2][1]],[adder[3][0],adder[3][1]],[adder[4][0],adder[4][1]],[adder[5][0],adder[5][1]],[adder[6][0],adder[6][1]]]);
		}
		var negativity;
		var max_score=-1, max_negativity=-1, max_rank=-1,max_row_number=-1;
		var rank=8;
		var score;
		for (var j = 1; j <= 7; j++) {								// For every emotion j
			for(var i = 0; i < 7; i++){								// For rank from 0 to 6
		    	for (var k = 0; k < json_length ; k++){				// Along the columns
		    		if(rank_emotions[k][i][0]==j-1){
		    			if(i<rank){
		    				rank=i;
		    				score=Number(json[0][k][j]);
		    				negativity = Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7]);		// sad+angry+disgusted
		    				row_number=k;
		    			}
		    			else if(i==rank){
		    				if (j==3 || j==4 || j==7)			// negative emotions
		    				{
			    				if(Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7])>negativity+0.15&&Number(json[0][k][j])>score-0.05||Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7])>negativity-0.1&&Number(json[0][k][j])>score+0.05||Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7])>negativity&&Number(json[0][k][j])>score||Number(json[0][k][j])>score+0.1){
			    					if (Number(json[0][k][j])>score)
			    						score=Number(json[0][k][j]);
			    					if(Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7])>negativity)
			    						negativity = Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7]);
			    					row_number=k;
			    				}
		    				}
		    				else
		    				{									// positive emotions
		    					if(Number(json[0][k][j])>score){
			    					score=Number(json[0][k][j]);
			    					row_number=k;
			    				}
		    				}
		    			}
		    			else if(j==3 || j==4 || j==7){						// negative emotions and i>rank
		    				if(score<Number(json[0][k][j])&&negativity<Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7])&&max_score<Number(json[0][k][j])&&max_negativity<Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7])){
		    					max_score=Number(json[0][k][j]);
		    					max_negativity=Number(json[0][k][3]) + Number(json[0][k][4]) + Number(json[0][k][7]);
		    					max_rank=i;
		    					max_row_number=k;
		    				}
		    			}
		    			else{ 												// positive emotions and i>rank
		    				if(score<Number(json[0][k][j])&&max_score<Number(json[0][k][j])){
		    					max_score=Number(json[0][k][j]);
		    					max_rank=i;
		    					max_row_number=k;
		    				}
		    			}
		    		}
		    	}
		    }
		    if((j==3 || j==4 || j==7)&&max_negativity>negativity&&((max_score>(score+0.05)&&max_rank<(rank+2))||(max_score>(score+0.1)&&max_rank<(rank+3)))){ 
		    		row_number=max_row_number;
		    }
		    if((j==1 || j==2 || j==5|| j==6)&&((max_score>(score+0.05)&&max_rank<(rank+2))||(max_score>(score+0.1)&&max_rank<(rank+3)))){
		    		row_number=max_row_number;
		    }2
		    rank=8;
		    max_score=-1;
		    max_negativity=-1;
		    max_rank=-1;
		    max_row_number=-1;
		    dom_emotion[j-1]=row_number;
		    sortIt[j-1][0]=row_number;
		    sortIt[j-1][2]=j-1;
		    var tt = json[0][row_number][0].split(":");
			sortIt[j-1][1] = Number(tt[0])*3600 + Number(tt[1])*60 + Math.floor(Number(tt[2]));
			//if(j==5) alert(row_number);
		}
		sortIt.sort(function(a,b){
		    return a[1] - b[1];
		});

		var t1,t2;
		json[1].sort(function(a,b) {
			t1 = a[0].split(":");
			if(t1.length==3) {
				t1 = Number(t1[0])*3600 + Number(t1[1])*60 + Math.floor(Number(t1[2]));
			}
			else {
				t1=Number(t1[0])/1000;
			}
			t2 = b[0].split(":");
			if(t2.length==3) { 
				t2 = Number(t2[0])*3600 + Number(t2[1])*60 + Math.floor(Number(t2[2]));
			}
			else {
				t2=Number(t2[0])/1000;
			}
			return t1-t2;
		});

		//alert(json[1][0][0]+" "+json[1][1][0]+" "+json[1][2][0]+" "+json[1][3][0]+" "+json[1][4][0]+" "+json[1][5][0]+" "+json[1][6][0]+" ");

		/*for(var j = 0; j < 7; j++){
			document.getElementById(j).getElementsByTagName('img')[0].src= "../uploads/"+json[0][sortIt[j][0]][8]+".jpg";
			document.getElementById(j+'Time').innerHTML = json[0][sortIt[j][0]][0].slice(0,-4);
			document.getElementById(j+'emotion').innerHTML = stored_emotions[sortIt[j][2]];
			document.getElementById(j).setAttribute("id", stored_emotions[sortIt[j][2]]);
		}*/



		/*function stream_layers(n, m, o) {
		  if (arguments.length < 3) o = 0;
		  return d3.range(n).map(function(d,i) {
		      var a = [], j;
		      for (j = 0; j < m; j++) a[j] = json[3][i][j];
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
		}

		nv.addGraph(function() {
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

		    d3.select('#chart1 svg')
		        .datum(exampleData())
		        .call(chart);

		    nv.utils.windowResize(chart.update);

		    return chart;
		});*/
		
		emotions2 = [
            {
              values: [{x:0,y:0}],
              key: "Neutral",
              color: "#181818"
            },
            {
              values: [{x:0,y:0}],
              key: "Happy",
              color: "#ff7f0e"
            },
            {
              values: [{x:0,y:0}],
              key: "Sad",
              color: "#2ca02c"
            },
            {
              values: [{x:0,y:0}],
              key: "Surprised",
              color: "#33ccff"
            },
            {
              values: [{x:0,y:0}],
              key: "Angry",
              color: "#cc0000"
            },
            {
              values: [{x:0,y:0}],
              key: "Scared",
              color: "#669933"
            },
            {
              values: [{x:0,y:0}],
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
			d3.select('#svg_chart3 svg')
			    .attr('perserveAspectRatio', 'xMinYMid')
			    .attr('width', width)
			    .attr('height', height)
			    .datum(emotions2)
			    .call(chart);
			return chart;
			});				

		window.male=json[4][0];
		window.female=json[4][1];

		nv.addGraph(function() {
		  var chart = nv.models.pieChart()
		      .x(function(d) { return d.label })
		      .y(function(d) { return d.value })
		      .showLabels(false)
		      .showLegend(true);

		    d3.select("#gender_svg")
		        .datum([{"label":"Male","value":male},{"label":"Female","value":female}])
		        .transition().duration(350)
		        .call(chart);
		  return chart;
		});

        if(json[5].length){
			var engage_graph=[];
			var valence_graph=[];
			json[5].sort(function(a,b){
			    return a[0] - b[0];
			});
			var json5_len=json[5].length;
			window.microexpressions_overall=new Array();
			for(var i=0;i<json5_len;++i){
				engage_graph.push({x:Number(json[5][i][0]),y:Number(json[5][i][1])});
				valence_graph.push({x:Number(json[5][i][0]),y:Number(json[5][i][2])});
                                microexpressions_overall.push([json[5][i][0],json[5][i][1],json[5][i][2]]);
			}
			//alert(json[5]);
			window.disengagement_overall = [
			{
		      values: engage_graph,
		      key: "Engagement",
			  color: "#2ca02c"
		    },
		    {
		      values: valence_graph,
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

				d3.select('#svg_chart4 svg')
				.attr('perserveAspectRatio', 'xMinYMid')
				.attr('width', width)
				.attr('height', height)
				.datum(disengagement_overall)
				.call(chart);
				return chart;
			});


			// Ploting the 21 emotions for all the users yet.
			var distance=99;
			var min_distance=99;
			var time=0;
			var emotion_name;
			window.overall_micro=new Array();
			for(var i=0;i<json5_len;++i){
				min_distance=99;
				time=i;
				for(var j=0;j<21;++j){
					distance=Math.sqrt(Math.pow(json[5][i][3]-json[6][j][1],2)+Math.pow(json[5][i][4]-json[6][j][2],2),Math.pow(json[5][i][5]-json[6][j][3],2),Math.pow(json[5][i][6]-json[6][j][4],2),Math.pow(json[5][i][7]-json[6][j][5],2),Math.pow(json[5][i][8]-json[6][j][6],2),Math.pow(json[5][i][9]-json[6][j][7],2));
					if(distance<min_distance){
						min_distance=distance
						emotion_name=json[6][j][0]-1;
					}
				}
				overall_micro.push([time,emotion_name,min_distance]);
			}
			draw_gradient(overall_micro);
		}

		//CreateTimer();
	},
	error: function (jqXHR,text_status,err_msg) {
		alert('ERROR : '+text_status+' '+err_msg);
	}
	
});


emotions = [
            {
              values: [{x:0,y:0}],
              key: "Neutral",
              color: "#181818"
            },
            {
              values: [{x:0,y:0}],
              key: "Happy",
              color: "#ff7f0e"
            },
            {
              values: [{x:0,y:0}],
              key: "Sad",
              color: "#2ca02c"
            },
            {
              values: [{x:0,y:0}],
              key: "Surprised",
              color: "#33ccff"
            },
            {
              values: [{x:0,y:0}],
              key: "Angry",
              color: "#cc0000"
            },
            {
              values: [{x:0,y:0}],
              key: "Scared",
              color: "#669933"
            },
            {
              values: [{x:0,y:0}],
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
d3.select('#svg_chart svg')
    .attr('perserveAspectRatio', 'xMinYMid')
    .attr('width', width)
    .attr('height', height)
    .datum(emotions)
    .call(chart);
return chart;
});				

window.disengagement  = [
            {
              values: [{x:0,y:0}],
              key: "Engagement",
        	  color: "#2ca02c"
            },
            {
              values: [{x:0,y:0}],
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