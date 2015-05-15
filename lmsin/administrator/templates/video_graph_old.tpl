<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>{$c_title}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="../js/swfobject.js"></script>
<script type="text/javascript">
var compare_url,time_compare,valence_compare,compare_user_name,show=0;
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
  
	var flashvars = {
	  is_smiley:smiley,	
	  is_avg_analysis_gp:avg_analysis_gp,
	  is_analysis_gp:analysis_gp,
	  is_fl_vid:fl_vid,  
	  video_id:"{$video_id}", 
	  video_url:"{$video_url}",
	  avg_ad_time:"{$avg_ad_time}",
	  ad_time:"{$ad_time}",
	  avg_ad_valence:"{$avg_ad_valence}",
	  ad_valence:"{$ad_valence}",
	  user_name:'{$user_name}',
	  compare_user_name:compare_user_name,	  
	  video_url_compare:compare_url,
	  ad_time_compare:time_compare,
	  ad_valence_compare:valence_compare
	};
	if(val==1)
	{
		if(document.getElementById('user_id').value>0)
		{
			if(show==0)
			{
				show_graph(1);
			}
			else
			{
				swfobject.embedSWF("video_graph_compare.swf", "myContent",  "1200", "1000", "9.0.0", "../expressInstall.swf",flashvars);
				document.getElementById('myContent').style.display='block';
			}
		}
		else
			alert('Please select a user to compare!');
	}
	else
	{
		swfobject.embedSWF("video_graph.swf", "myContent",  "1010", "850", "9.0.0", "../expressInstall.swf",flashvars);
		document.getElementById('myContent').style.display='block';
	}

}
</script>
	</head>
	<body >
    <div><form name="frm" target="ifrm" action="index.php">
    <input type="checkbox" value="1" checked="checked" checked="checked" name="analysis_gp" id="analysis_gp"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Analysis Graph &nbsp;&nbsp;|&nbsp;&nbsp; </font>
    <input type="checkbox" value="1" checked="checked" checked="checked"  name="avg_analysis_gp" id="avg_analysis_gp"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Average Analysis Graph &nbsp;&nbsp;|&nbsp;&nbsp;</font>
    <input type="checkbox" value="1" checked="checked" checked="checked"  name="fl_vid" id="fl_vid"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Recorded Video &nbsp;&nbsp;|&nbsp;&nbsp;</font>
    <input type="checkbox" value="1" checked="checked" checked="checked"  name="smiley" id="smiley"/><font style="font-size:14px; font:Arial, Helvetica, sans-serif">: Smiley  </font>
     <input type="button" onclick="show_graph(0)"  value="Show Video"/ > &nbsp;&nbsp;|&nbsp;&nbsp;  <font style="font-size:14px; font:Arial, Helvetica, sans-serif">Compare with:</font> &nbsp;<select name="user_id" id="user_id" onchange="get_info()"/>{$compare_option}</select><input type="hidden" name="c_id" value="{$c_id}" /><input type="hidden" name="act" value="get_compare_valence" />   <input type="button" onclick="show_graph(1)"  value="Compare Now"/ >  </form></div>
    <div style="clear:both"></div>
		<div id="myContent" style="display:none">
			<h1>Alternative content</h1>
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
        <span id="msg"></span>
<iframe id="ifrm" name="ifrm" style="display:none; width:300px; height:300px"></iframe>
	</body>
</html>
