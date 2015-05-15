function load() {
	var video_graph_ajax_js=document.createElement('script');
	video_graph_ajax_js.setAttribute("type","text/javascript");
	video_graph_ajax_js.setAttribute("src", "templates/video_graph_ajax.js");
	document.getElementsByTagName("body")[0].appendChild(video_graph_ajax_js);

	var video_graph_js=document.createElement('script');
	video_graph_js.setAttribute("type","text/javascript");
	video_graph_js.setAttribute("src", "templates/video_graph.js");
	document.getElementsByTagName("body")[0].appendChild(video_graph_js);

	var tooltip=document.createElement('script');
	tooltip.setAttribute("type","text/javascript");
	tooltip.setAttribute("src", "../nvd3/src/tooltip2.js");
	document.getElementsByTagName("body")[0].appendChild(tooltip);
}

var allowed=false;
// 1. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady() {
	player = new YT.Player('player', {
		height: '450',
		width: '600',
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
	window.video_duration = player.getDuration();
	load();
//alert(video_duration);
}

var done = false;
function onPlayerStateChange(event) {
	if(event.data == YT.PlayerState.ENDED) {
		allowed=false;
	}
	else {
		if(event.data == YT.PlayerState.PLAYING) {
			allowed=true;                      
			CreateTimer();
		}
		else {
			allowed=false;
        }
	}
	$('#svg_chart').css('display','block');
	$('#svg_chart2').css('display','block');

}

function stopVideo() {
	player.stopVideo();
}