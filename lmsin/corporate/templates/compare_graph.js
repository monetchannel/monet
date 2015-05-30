var allowed=false;
// 1. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');
var doClearTimeOutOrNot = true;
var xAxisCoordinates = [],
    yAxisCoordinates = [
        {'name':'Valence', 'data':[]}
    ];
    
var xAxisValuesArr = []; 
var yAxisValuesArr = [];      

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var graphs_to_show = readCookie("graphs_to_show");

var player;
var globalInfo = {
    heatMapHtml: "",
    dynamicChartFlag : true,
    videoPlayFirstTime : true,
    counter: 0,
    timeOut: "",
    totalVideoDuration : "",
    totalSucceededTime : 0,
    currentTimeInSeconds : "",
    tickInterval: 0,
    analysisDataArray : JSON.parse(analysisDataArray),   // get this value from template file named "campaign_analysis.tpl" 
    anlysisDataArraySize : 0,
    analysisDataArray_overall : JSON.parse(analysisDataArray_overall),   // get this value from template file named "campaign_analysis.tpl" 
    anlysisDataArraySize_overall : 0,
    //attentionDataArray : JSON.parse(attentionDataArray),
    graphValenceDataArray : [],
    graphEngagementDataArray : [],
    ValenceGraphSeries: "",
    MeaningGraphSeries: "",
    AttentionGraphSeries: "",
    CounterStartedAlready: false,
    emotionsCollection: {
        'neutral':[],
        'happy':[],
        'sad':[],
        'surprised':[],
        'angry':[],
        'scared':[],
        'disgusted':[]
    }
};

globalInfo.anlysisDataArraySize = Object.keys(globalInfo.analysisDataArray).length;
globalInfo.anlysisDataArraySize_overall = Object.keys(globalInfo.analysisDataArray_overall).length;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
            height: '250',
            width: '100%',
            playerVars: {'rel':0 },
            videoId: video_id,
            events: {
              'onReady': onPlayerReady,
              'onStateChange': onPlayerStateChange
            }
    });
}
// 3. The API will call this function when the video player is ready.
function onPlayerReady(event) {        
	globalInfo.totalVideoDuration = player.getDuration();
        globalInfo.tickInterval = Number(globalInfo.totalVideoDuration/5);
        // Draw Graphs on page load
        drawStaticGraphs(globalInfo.analysisDataArray);
        drawStaticGraphs_overall(globalInfo.analysisDataArray_overall); 

        //drawAttentionSmileys(globalInfo.totalVideoDuration);
        //drawMeaningSmileys(globalInfo.totalVideoDuration);
        displayQuestionsGraph();
}

var done = false;
function onPlayerStateChange(event) {
        if(player.getPlayerState()=='0') {
            allowed=false;
        }else if(player.getPlayerState()=='2'){   // state value '2' is for pause
            
            if(globalInfo.counter<Number(globalInfo.anlysisDataArraySize-3)){
                globalInfo.dynamicChartFlag = false;
                clearTimeout(globalInfo.timeOut); 
            }
            
            if(globalInfo.videoPlayFirstTime){
                globalInfo.videoPlayFirstTime = false;
            }
        }
	else 
        {
            if(event.data == YT.PlayerState.PLAYING) {
                allowed=true; 
                if(globalInfo.videoPlayFirstTime){
                   $('#heatmapview').html(""); 
                   drawGraphs();   // this function will call only one time not again & again
                }else{
                   globalInfo.dynamicChartFlag = true; 
                   setIntervalMethod(globalInfo.ValenceGraphSeries);
                }
                //CreateTimerInSec();
            }
            else 
            {
                allowed=false;
            }
	}
	$('#svg_chart').css('display','block');
	$('#svg_chart2').css('display','block');

}

function stopVideo() {
	player.stopVideo();
}

function drawGraphs(){
    var videoLength = globalInfo.totalVideoDuration; // duration in seconds
    
    // average valence graph code 
    $('#valence_chart').highcharts({
            chart: {
                type: 'spline',
                //animation: Highcharts.svg, // don't animate in old IE
                animation: false,
                marginRight: 10,
                events: {
                    load: function () {
                        var series = this.series[0];
                        globalInfo.ValenceGraphSeries = series;
                        // will create a iterative loop for 
                        if(!globalInfo.CounterStartedAlready){
                           setIntervalMethod(series);
                           globalInfo.CounterStartedAlready = true;
                        }
                    }
                }
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                tickInterval: globalInfo.tickInterval,
                title: {
                    text: 'Time(in seconds)'
                }
            },
            yAxis: {
                title: {
                    text: 'Valence'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Valence at " + this.x + " :<br/>" + this.y;
                }
            },
            legend: {
                enabled: false,
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'Average Valence',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            }]           
        });
        
    // average attention graph code 
    $('#attention_chart').highcharts({
            chart: {
                type: 'spline',
                //animation: Highcharts.svg, // don't animate in old IE
                animation: false,
                marginRight: 10,
                events: {
                    load: function () {
                        var series = this.series;
                        //globalInfo.AttentionGraphSeries = series;
                        globalInfo.graphEngagementDataArray = series;
                        if(!globalInfo.CounterStartedAlready){
                           setIntervalMethod(series);
                           globalInfo.CounterStartedAlready = true;
                        }
                    }
                }
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                tickInterval: globalInfo.tickInterval,
                title: {
                    text: 'Time(in seconds)'
                }
            },
            yAxis: {
                title: {
                    text: 'Engagement'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Engagement at " + this.x + " :<br/>" + this.y;
                }
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: true,
                verticalAlign: 'top'
            },
            exporting: {
                enabled: false
            },
            plotOptions: {
                series: {
                    connectNulls: true
                }
            },
            series: [{
                name: 'Avg. Engagement',
                color: '#303192',
                data: (function () {
                    var data = [];
                    return data;
                }())
            }/*,
            {
                name: 'Avg. EyeStillness',
                color: '#1DABE2',
                data: (function () {
                    var data = [];
                    return data;
                }())
            }*/
        ]           
        }); 
        
        
    // average meaning graph code 
    $('#meaning_chart').highcharts({
            chart: {
                type: 'spline',
                //animation: Highcharts.svg, // don't animate in old IE
                animation: false,
                marginRight: 10,
                events: {
                    load: function () {
                        var series = this.series;
                        globalInfo.MeaningGraphSeries = series;
                        if(!globalInfo.CounterStartedAlready){
                           setIntervalMethod(series);
                           globalInfo.CounterStartedAlready = true;
                        }
                    }
                }
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                tickInterval: globalInfo.tickInterval,
                title: {
                    text: 'Time(in seconds)'
                }
            },
            yAxis: {
                title: {
                    text: 'Emotions'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. at " + this.x + " :<br/>" + this.y;
                }
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: true,
                verticalAlign: 'top'
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'Avg. Happy',
                color: '#84C556',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Sad',
                color: '#F7941D',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Neutral',
                color: '#231F20',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Angry',
                color: '#662D91',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Surprised',
                color: '#00ADEE',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Disgusted',
                color: '#EE1C25',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Scared',
                color: '#F1592A',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            }
        ]           
        });
        
        
        // This last condition is for heat map
        if(!globalInfo.CounterStartedAlready){
             setIntervalMethod();
             globalInfo.CounterStartedAlready = true;
        }
        }
   


function drawGraphs_overall(){
    var videoLength = globalInfo.totalVideoDuration; // duration in seconds
    
    // average valence graph code 
    $('#valence_chart_overall').highcharts({
            chart: {
                type: 'spline',
                //animation: Highcharts.svg, // don't animate in old IE
                animation: false,
                marginRight: 10,
                events: {
                    load: function () {
                        var series = this.series[0];
                        globalInfo.ValenceGraphSeries = series;
                        // will create a iterative loop for 
                        if(!globalInfo.CounterStartedAlready){
                           setIntervalMethod(series);
                           globalInfo.CounterStartedAlready = true;
                        }
                    }
                }
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                tickInterval: globalInfo.tickInterval,
                title: {
                    text: 'Time(in seconds)'
                }
            },
            yAxis: {
                title: {
                    text: 'Valence'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Valence at " + this.x + " :<br/>" + this.y;
                }
            },
            legend: {
                enabled: false,
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'Average Valence',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            }]           
        });
        
    // average attention graph code 
    $('#attention_chart_overall').highcharts({
            chart: {
                type: 'spline',
                //animation: Highcharts.svg, // don't animate in old IE
                animation: false,
                marginRight: 10,
                events: {
                    load: function () {
                        var series = this.series;
                        //globalInfo.AttentionGraphSeries = series;
                        globalInfo.graphEngagementDataArray = series;
                        if(!globalInfo.CounterStartedAlready){
                           setIntervalMethod(series);
                           globalInfo.CounterStartedAlready = true;
                        }
                    }
                }
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                tickInterval: globalInfo.tickInterval,
                title: {
                    text: 'Time(in seconds)'
                }
            },
            yAxis: {
                title: {
                    text: 'Engagement'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Engagement at " + this.x + " :<br/>" + this.y;
                }
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: true,
                verticalAlign: 'top'
            },
            exporting: {
                enabled: false
            },
            plotOptions: {
                series: {
                    connectNulls: true
                }
            },
            series: [{
                name: 'Avg. Engagement',
                color: '#303192',
                data: (function () {
                    var data = [];
                    return data;
                }())
            }/*,
            {
                name: 'Avg. EyeStillness',
                color: '#1DABE2',
                data: (function () {
                    var data = [];
                    return data;
                }())
            }*/
        ]           
        }); 
        
        
    // average meaning graph code 
    $('#meaning_chart_overall').highcharts({
            chart: {
                type: 'spline',
                //animation: Highcharts.svg, // don't animate in old IE
                animation: false,
                marginRight: 10,
                events: {
                    load: function () {
                        var series = this.series;
                        globalInfo.MeaningGraphSeries = series;
                        if(!globalInfo.CounterStartedAlready){
                           setIntervalMethod(series);
                           globalInfo.CounterStartedAlready = true;
                        }
                    }
                }
            },
            title: {
                text: '',
                style: {
                    display: 'none'
                }
            },
            xAxis: {
                tickInterval: globalInfo.tickInterval,
                title: {
                    text: 'Time(in seconds)'
                }
            },
            yAxis: {
                title: {
                    text: 'Emotions'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. at " + this.x + " :<br/>" + this.y;
                }
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: true,
                verticalAlign: 'top'
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'Avg. Happy',
                color: '#84C556',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Sad',
                color: '#F7941D',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Neutral',
                color: '#231F20',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Angry',
                color: '#662D91',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Surprised',
                color: '#00ADEE',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Disgusted',
                color: '#EE1C25',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            },
            {
                name: 'Avg. Scared',
                color: '#F1592A',
                data: (function () {
                    // generate an array of random data
                    var data = [];
                    return data;
                }())
            }
        ]           
        });
        
        
        // This last condition is for heat map
        if(!globalInfo.CounterStartedAlready){
             setIntervalMethod_overall();
             globalInfo.CounterStartedAlready = true;
        }
   
}

function setIntervalMethod(series){
    //var timeOut;
    globalInfo.timeOut = setInterval(function () {
        //globalInfo.timeOut = setTimeout(function () {
        var CurrentTimeSeconds = Number(globalInfo.counter);
        //var CurrentTimeSeconds = Number(player.getCurrentTime());
        //var compareCurrentTime = Number(CurrentTimeSeconds + 1);
        var compareCurrentTime = Number(globalInfo.anlysisDataArraySize);
        
        if(Number(globalInfo.counter) < Number(globalInfo.anlysisDataArraySize)){
            // for emotion graph
            var 
            x = CurrentTimeSeconds, // current time
            y = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_valence); 
            
            //var shift = series.data.length > 5; // shift if the series is longer than 20
            if (graphs_to_show.indexOf("valence") > -1){
                series.addPoint([x, y], globalInfo.dynamicChartFlag, false);
            }           
            
            var y_engagement = 0;
            // for engagement graph
            if(!globalInfo.analysisDataArray[globalInfo.counter].avg_engagement){
                 y_engagement = globalInfo.analysisDataArray[globalInfo.counter].avg_engagement;
            }else{ y_engagement = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_engagement);  }
            
            if (graphs_to_show.indexOf("attention") > -1){
                globalInfo.graphEngagementDataArray[0].addPoint([x, y_engagement], globalInfo.dynamicChartFlag, false);
            }
            
            // for meaning variance graph
            var y_happy = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_happy);
            var y_sad = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_sad);
            var y_neutral = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_neutral);
            var y_angry = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_angry);
            var y_surprised = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_surprised);
            var y_disgusted = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_disgusted);
            var y_scared = Number(globalInfo.analysisDataArray[globalInfo.counter].avg_disgusted);
            var y_peak_emotion = globalInfo.analysisDataArray[globalInfo.counter].peak_emotion;
            var y_peak_ad_id = globalInfo.analysisDataArray[globalInfo.counter].peak_ad_id;
            
            if (graphs_to_show.indexOf("emotion") > -1){
                globalInfo.MeaningGraphSeries[0].addPoint([x, y_happy], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[1].addPoint([x, y_sad], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[2].addPoint([x, y_neutral], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[3].addPoint([x, y_angry], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[4].addPoint([x, y_surprised], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[5].addPoint([x, y_disgusted], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[6].addPoint([x, y_scared], globalInfo.dynamicChartFlag, false);
            }
            
            // make heat map
            if (graphs_to_show.indexOf("heatmap") > -1 && globalInfo.dynamicChartFlag==true){
                var emotion_name = y_peak_emotion.toLowerCase();
                var emotion_value = eval('y_'+emotion_name);
                var width = Number(95/globalInfo.totalVideoDuration); // index here represents our time in seconds
                //var width = Number(emotion_value)+0.4; 
                var image = "";
                var hover_content = "";
                var timeline_span = "";
                
                globalInfo.heatMapHtml = '<div class="'+y_peak_emotion+' emotion-inline" \n\
                                         data-toggle="popover" data-placement="bottom" style="width:'+width+'%"></div>';
                
                $("#heatmapview").append(globalInfo.heatMapHtml);
                hover_content = emotion_name+" : "+emotion_value+"<br/>At Time : "+CurrentTimeSeconds;
               
                $("div[data-toggle=popover]").popover({
                    html:       true,
                    trigger:    'hover',
                    content:  hover_content
                });
                 
            }           
           
        }else{
            //clearTimeout(globalInfo.timeOut); 
            globalInfo.videoPlayFirstTime = true;
            globalInfo.counter = 0;
            globalInfo.dynamicChartFlag = true;
            globalInfo.CounterStartedAlready = false;
            clearTimeout(globalInfo.timeOut); 
            
        }
        
        globalInfo.counter++;
        
    }, 1000);
}

function setIntervalMethod_overall(series){
    //var timeOut;
    globalInfo.timeOut = setInterval(function () {
        //globalInfo.timeOut = setTimeout(function () {
        var CurrentTimeSeconds = Number(globalInfo.counter);
        //var CurrentTimeSeconds = Number(player.getCurrentTime());
        //var compareCurrentTime = Number(CurrentTimeSeconds + 1);
        var compareCurrentTime = Number(globalInfo.anlysisDataArraySize_overall);
        
        if(Number(globalInfo.counter) < Number(globalInfo.anlysisDataArraySize_overall)){
            // for emotion graph
            var 
            x = CurrentTimeSeconds, // current time
            y = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_valence); 
            
            //var shift = series.data.length > 5; // shift if the series is longer than 20
            if (graphs_to_show.indexOf("valence") > -1){
                series.addPoint([x, y], globalInfo.dynamicChartFlag, false);
            }           
            
            var y_engagement = 0;
            // for engagement graph
            if(!globalInfo.analysisDataArray_overall[globalInfo.counter].avg_engagement){
                 y_engagement = globalInfo.analysisDataArray_overall[globalInfo.counter].avg_engagement;
            }else{ y_engagement = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_engagement);  }
            
            if (graphs_to_show.indexOf("attention") > -1){
                globalInfo.graphEngagementDataArray[0].addPoint([x, y_engagement], globalInfo.dynamicChartFlag, false);
            }
            
            // for meaning variance graph
            var y_happy = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_happy);
            var y_sad = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_sad);
            var y_neutral = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_neutral);
            var y_angry = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_angry);
            var y_surprised = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_surprised);
            var y_disgusted = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_disgusted);
            var y_scared = Number(globalInfo.analysisDataArray_overall[globalInfo.counter].avg_disgusted);
            var y_peak_emotion = globalInfo.analysisDataArray_overall[globalInfo.counter].peak_emotion;
            var y_peak_ad_id = globalInfo.analysisDataArray_overall[globalInfo.counter].peak_ad_id;
            
            if (graphs_to_show.indexOf("emotion") > -1){
                globalInfo.MeaningGraphSeries[0].addPoint([x, y_happy], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[1].addPoint([x, y_sad], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[2].addPoint([x, y_neutral], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[3].addPoint([x, y_angry], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[4].addPoint([x, y_surprised], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[5].addPoint([x, y_disgusted], globalInfo.dynamicChartFlag, false);
                globalInfo.MeaningGraphSeries[6].addPoint([x, y_scared], globalInfo.dynamicChartFlag, false);
            }
            
            // make heat map
            if (graphs_to_show.indexOf("heatmap") > -1 && globalInfo.dynamicChartFlag==true){
                var emotion_name = y_peak_emotion.toLowerCase();
                var emotion_value = eval('y_'+emotion_name);
                var width = Number(95/globalInfo.totalVideoDuration); // index here represents our time in seconds
                //var width = Number(emotion_value)+0.4; 
                var image = "";
                var hover_content = "";
                var timeline_span = "";
                
                globalInfo.heatMapHtml = '<div class="'+y_peak_emotion+' emotion-inline" \n\
                                         data-toggle="popover" data-placement="bottom" style="width:'+width+'%"></div>';
                
                $("#heatmapview").append(globalInfo.heatMapHtml);
                hover_content = emotion_name+" : "+emotion_value+"<br/>At Time : "+CurrentTimeSeconds;
               
                $("div[data-toggle=popover]").popover({
                    html:       true,
                    trigger:    'hover',
                    content:  hover_content
                });
                 
            }           
           
        }else{
            //clearTimeout(globalInfo.timeOut); 
            globalInfo.videoPlayFirstTime = true;
            globalInfo.counter = 0;
            globalInfo.dynamicChartFlag = true;
            globalInfo.CounterStartedAlready = false;
            clearTimeout(globalInfo.timeOut); 
            
        }
        
        globalInfo.counter++;
        
    }, 1000);
}

function displayQuestionsGraph(){
    // get questionnaires graph data called through ajax
    var campId = "";
    if (graphs_to_show.indexOf("excludecampaign") > -1){
        campId = '0';   
    }
    
    $.ajax({
        url: 'ajax/chart_utilities.php',
        data: {'action':'questions_chart', 'contentid':content_id, 'campaignid':campId},
        method: 'post',
        success: function(data){
            displayFeedbackQuestionsChart(data);
        },
        error: function(response){
            console.log(response);
        }
    });
}

function displayFeedbackQuestionsChart(jsonStringData){   
    var parsedJson = JSON.parse(jsonStringData);
    var jsonLength = Object.keys(parsedJson).length;
    var xAxisValuesArr = [], yAxisValuesArr = []; 
    var i = 0;  
   
   for(var i=1; i<=5; i++){
        var yaxis_obj = { "name" : i, data : [] };
        $.each( parsedJson, function( key, value ) {
             xAxisValuesArr.push(key); 
             // now create series for each option like 1,2,3,4,5
             //var option_count_value = (!value && typeof value[i] === 'undefined') ? Number(0) : Number(value[i]); 
             var option_count_value = "";
             if(!value){
                 option_count_value = Number(0);
             }else if(typeof value[i] === 'undefined'){
                 option_count_value = Number(0);
             }else{
                 option_count_value = Number(value[i]);
             }
             
             yaxis_obj.data.push(option_count_value);
        });
        
        yAxisValuesArr.push(yaxis_obj);
   }  
      
   /*$('#questions_chart_overall').highcharts({
        chart: {
            type: 'column',
            width: 500,
            height: 350
        },
        title: {
            text: '',
            style: {
                display: 'none'
            }
        },
        xAxis: {
            categories: xAxisValuesArr
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Feedback'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        credits: {
            enabled: false
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            layout: 'vertical',
            x: 0,
            y: 100
        },
        tooltip: {
            formatter: function () {
                var percent = ((this.y/this.point.stackTotal)*100);               
                return '<b>' + this.x + '</b><br/>' +
                    'Option - '+this.series.name + ': ' + this.y + '<br/>' +
                    '% of Users :' + percent + '%' + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    },
                    formatter: function() {
                        if (this.y != 0) {
                          return this.y;
                        } else {
                          return null;
                        }
                    }
                }
            }
        },
        series: yAxisValuesArr
    });*/
}

// function to display static graphs on page load 
function drawStaticGraphs(jsonData){
    // graph for valence variation
    var x_axis_params = [],
        y_axis_valence = [],
        y_axis_engagement = [],
        y_axis_happy = [], y_axis_sad = [], y_axis_neutral = [], y_axis_scared = [], y_axis_surprised = [], y_axis_disgusted = [], y_axis_angry = [], 
        heatMapHtml = "", hover_content = "", timeLineHtml = "";

    var width = Number(95/globalInfo.totalVideoDuration); // index here represents our time in seconds
    // preparing data for showing static graphs on page load
    //timeLineHtml += '<ul class="nav nav-tabs dots">';
    $.each(jsonData, function(index, object){
        var valence_val = Number(object.avg_valence);
        var engage_val = (object.avg_engagement) ? Number(object.avg_engagement) : object.avg_engagement;
        var happy_val = Number(object.avg_happy);
        var neutral_val = Number(object.avg_neutral);
        var sad_val = Number(object.avg_sad);
        var scared_val = Number(object.avg_scared);
        var surprised_val = Number(object.avg_surprised);
        var disgusted_val = Number(object.avg_disgusted);
        var angry_val = Number(object.avg_angry);
        var peak_emotion = object.peak_emotion;
        
        emotion_name = peak_emotion.toLowerCase();
        var emotion_value = eval(emotion_name+'_val');
        //var width = Number(emotion_value)+0.4; 
      
        
        x_axis_params.push(index);
        y_axis_valence.push(valence_val);
        y_axis_engagement.push(engage_val);
        y_axis_happy.push(happy_val);
        y_axis_neutral.push(neutral_val);
        y_axis_sad.push(sad_val);
        y_axis_scared.push(scared_val);
        y_axis_surprised.push(surprised_val);
        y_axis_disgusted.push(disgusted_val);
        y_axis_angry.push(angry_val);
        
        // make heatmap graph structure
        heatMapHtml = '<div class="'+peak_emotion+' emotion-inline" \n\
data-toggle="popover" data-placement="bottom" style="width:'+width+'%"></div>';   
        // add heatmap to the analysis page
        $("#heatmapview").append(heatMapHtml);
        hover_content = emotion_name+" : "+emotion_value+"<br/>At Time : "+index;
               
        // make time line
        var timelineClassName = emotion_name+"-timeline";   
        timeLineHtml = '<li class="'+timelineClassName+'" data-toggle="popover"><i class="glyphicon glyphicon-record"></i>  </li>';
        $("#timeline-section .timeline-steps ul").append(timeLineHtml);
        
        $("div[data-toggle=popover], li[data-toggle=popover]").popover({
            html:       true,
            trigger:    'hover',
            content:  hover_content
        });
    });  
    
    // display timeline chart
    //timeLineHtml += '</ul>';
    
    
    // valence chart
    $('#valence_chart').highcharts({
        chart: {
                type: 'spline'
        },
        title: {
                text: '',
                style: {
                    display: 'none'
                }
        },
        xAxis: {
            tickInterval: globalInfo.tickInterval,
            title: {
                text: 'Time(in seconds)'
            }
        },
        yAxis: {
            title: {
               text: 'Valence'
            }
        },
        tooltip: {
            formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Valence at " + this.x + " :<br/>" + this.y;
            }
        },
        legend: {
                enabled: false,
            },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            name: 'Average Valence',
            data: y_axis_valence
        }]
    });
    
    // attention graph
    $('#attention_chart').highcharts({
        chart: {
                type: 'spline'
        },
        title: {
                text: '',
                style: {
                    display: 'none'
                }
        },
        xAxis: {
            tickInterval: globalInfo.tickInterval,
            title: {
                text: 'Time(in seconds)'
            }
        },
        yAxis: {
            title: {
               text: 'Engagement'
            }
        },
        tooltip: {
            formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Engagement at " + this.x + " :<br/>" + this.y;
            }
        },
        legend: {
                enabled: true,
                verticalAlign: 'top'
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        plotOptions: {
            series: {
                connectNulls: true
            }
        },
        series: [{
            color: '#303192',    
            name: 'Average Engagement',
            data: y_axis_engagement
        }]
    });
    
    // meaning variation graph
    $('#meaning_chart').highcharts({
        chart: {
                type: 'spline'
        },
        title: {
                text: '',
                style: {
                    display: 'none'
                }
        },
        xAxis: {
            tickInterval: globalInfo.tickInterval,
            title: {
                text: 'Time(in seconds)'
            }
        },
        yAxis: {
            title: {
               text: 'Emotions'
            }
        },
        tooltip: {
            formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Engagement at " + this.x + " :<br/>" + this.y;
            }
        },
        legend: {
                enabled: true,
                verticalAlign: 'top'
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            color: '#84C556',    
            name: 'Avg. Happy',
            data: y_axis_happy
        },{
            color: '#F7941D',    
            name: 'Avg. Sad',
            data: y_axis_sad
        },{
            color: '#231F20',    
            name: 'Avg. Neutral',
            data: y_axis_neutral
        },{
            color: '#662D91',    
            name: 'Avg. Angry',
            data: y_axis_angry
        },{
            color: '#00ADEE',    
            name: 'Avg. Surprised',
            data: y_axis_surprised
        },{
            color: '#EE1C25',    
            name: 'Avg. Disgusted',
            data: y_axis_disgusted
        },{
            color: '#F1592A',    
            name: 'Avg. Scared',
            data: y_axis_scared
        }]
    });
    
}

function drawStaticGraphs_overall(jsonData){
    // graph for valence variation
    var x_axis_params = [],
        y_axis_valence = [],
        y_axis_engagement = [],
        y_axis_happy = [], y_axis_sad = [], y_axis_neutral = [], y_axis_scared = [], y_axis_surprised = [], y_axis_disgusted = [], y_axis_angry = [], 
        heatMapHtml = "", hover_content = "", timeLineHtml = "";

    var width = Number(95/globalInfo.totalVideoDuration); // index here represents our time in seconds
    // preparing data for showing static graphs on page load
    //timeLineHtml += '<ul class="nav nav-tabs dots">';
    $.each(jsonData, function(index, object){
        var valence_val = Number(object.avg_valence);
        var engage_val = (object.avg_engagement) ? Number(object.avg_engagement) : object.avg_engagement;
        var happy_val = Number(object.avg_happy);
        var neutral_val = Number(object.avg_neutral);
        var sad_val = Number(object.avg_sad);
        var scared_val = Number(object.avg_scared);
        var surprised_val = Number(object.avg_surprised);
        var disgusted_val = Number(object.avg_disgusted);
        var angry_val = Number(object.avg_angry);
        var peak_emotion = object.peak_emotion;
        
        emotion_name = peak_emotion.toLowerCase();
        var emotion_value = eval(emotion_name+'_val');
        //var width = Number(emotion_value)+0.4; 
      
        
        x_axis_params.push(index);
        y_axis_valence.push(valence_val);
        y_axis_engagement.push(engage_val);
        y_axis_happy.push(happy_val);
        y_axis_neutral.push(neutral_val);
        y_axis_sad.push(sad_val);
        y_axis_scared.push(scared_val);
        y_axis_surprised.push(surprised_val);
        y_axis_disgusted.push(disgusted_val);
        y_axis_angry.push(angry_val);
        
        // make heatmap graph structure
       /* heatMapHtml = '<div class="'+peak_emotion+' emotion-inline" \n\
data-toggle="popover" data-placement="bottom" style="width:'+width+'%"><!/div>';   
        // add heatmap to the analysis page
        $("#heatmapview").append(heatMapHtml);
        hover_content = emotion_name+" : "+emotion_value+"<br/>At Time : "+index;
               
        // make time line
        var timelineClassName = emotion_name+"-timeline";   
        timeLineHtml = '<!li class="'+timelineClassName+'" data-toggle="popover"><!i class="glyphicon glyphicon-record"><!/i>  <!/li>';
        $("#timeline-section .timeline-steps ul").append(timeLineHtml);
        
        $("div[data-toggle=popover], li[data-toggle=popover]").popover({
            html:       true,
            trigger:    'hover',
            content:  hover_content
        });*/
    });
    
    // display timeline chart
    //timeLineHtml += '</ul>';
    
    
    // valence chart
    $('#valence_chart_overall').highcharts({
        chart: {
                type: 'spline'
        },
        title: {
                text: '',
                style: {
                    display: 'none'
                }
        },
        xAxis: {
            tickInterval: globalInfo.tickInterval,
            title: {
                text: 'Time(in seconds)'
            }
        },
        yAxis: {
            title: {
               text: 'Valence'
            }
        },
        tooltip: {
            formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Valence at " + this.x + " :<br/>" + this.y;
            }
        },
        legend: {
                enabled: false,
            },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            name: 'Average Valence',
            data: y_axis_valence
        }]
    });
    
    // attention graph
    $('#attention_chart_overall').highcharts({
        chart: {
                type: 'spline'
        },
        title: {
                text: '',
                style: {
                    display: 'none'
                }
        },
        xAxis: {
            tickInterval: globalInfo.tickInterval,
            title: {
                text: 'Time(in seconds)'
            }
        },
        yAxis: {
            title: {
               text: 'Engagement'
            }
        },
        tooltip: {
            formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Engagement at " + this.x + " :<br/>" + this.y;
            }
        },
        legend: {
                enabled: true,
                verticalAlign: 'top'
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        plotOptions: {
            series: {
                connectNulls: true
            }
        },
        series: [{
            color: '#303192',    
            name: 'Average Engagement',
            data: y_axis_engagement
        }]
    });
    
    // meaning variation graph
    $('#meaning_chart_overall').highcharts({
        chart: {
                type: 'spline'
        },
        title: {
                text: '',
                style: {
                    display: 'none'
                }
        },
        xAxis: {
            tickInterval: globalInfo.tickInterval,
            title: {
                text: 'Time(in seconds)'
            }
        },
        yAxis: {
            title: {
               text: 'Emotions'
            }
        },
        tooltip: {
            formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        "Avg. Engagement at " + this.x + " :<br/>" + this.y;
            }
        },
        legend: {
                enabled: true,
                verticalAlign: 'top'
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            color: '#84C556',    
            name: 'Avg. Happy',
            data: y_axis_happy
        },{
            color: '#F7941D',    
            name: 'Avg. Sad',
            data: y_axis_sad
        },{
            color: '#231F20',    
            name: 'Avg. Neutral',
            data: y_axis_neutral
        },{
            color: '#662D91',    
            name: 'Avg. Angry',
            data: y_axis_angry
        },{
            color: '#00ADEE',    
            name: 'Avg. Surprised',
            data: y_axis_surprised
        },{
            color: '#EE1C25',    
            name: 'Avg. Disgusted',
            data: y_axis_disgusted
        },{
            color: '#F1592A',    
            name: 'Avg. Scared',
            data: y_axis_scared
        }]
    });
    
}
