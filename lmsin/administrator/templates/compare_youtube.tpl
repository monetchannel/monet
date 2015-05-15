<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Compare Videos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
       	{if $total>0} 
		<script type="text/javascript" src="../js/swfobject.js"></script>

	<script type="text/javascript">
var flashvars = {
  video_id:"{$video_id_1}",
  valence1:'{$valence_1}',
  time1:'{$time_1}',
  title1:'{$c_title_1}',
 video_id_two:"{$video_id_2}",
  valence2:'{$valence_2}',
  time2:'{$time_2}',
  title2:'{$c_title_2}',
  video_id_three:"{$video_id_3}", 
  valence3:'{$valence_3}',
  time3:'{$time_3}',  
  title3:'{$c_title_3}',
  neg_1:'{$neg_1}',
  pos_1:'{$pos_1}',
  neg_2:'{$neg_2}',
  pos_2:'{$pos_2}',
  neg_3:'{$neg_3}',
  pos_3:'{$pos_3}',
  neg_spike_1:'{$negative_spike_1}',
  pos_spike_1:'{$positive_spike_1}',
  neg_spike_2:'{$negative_spike_2}',
  pos_spike_2:'{$positive_spike_2}',
  neg_spike_3:'{$negative_spike_3}',
  pos_spike_3:'{$positive_spike_3}'

};

swfobject.embedSWF("compare_youtube.swf", "myContent", "1200", "900", "9.0.0", "../expressInstall.swf",flashvars);
</script>
{/if}
	</head>
	<body >
    	{if $total>0}
		<div id="myContent">
			<h1>Alternative content</h1>
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
        {else}
        <span id="msg">Record Not Found!</span>
		{/if}
	</body>
</html>