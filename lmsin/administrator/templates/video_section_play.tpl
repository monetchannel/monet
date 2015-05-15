<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>SWFObject 2 dynamic publishing example page</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="../js/swfobject.js"></script>
	<script type="text/javascript">
var flashvars = {
  video_id:"{$video_id}", 
  start_time:'{$start_time}',
  end_time:'{$end_time}',
  avg_valence:'{$avg_valence}',
  avg_time:'{$avg_time}',
  time_slice:'{$time_slice}'
  
};

swfobject.embedSWF("video_section.swf", "myContent", "635", "640", "9.0.0", "../expressInstall.swf",flashvars);
</script>
	</head>
	<body >
		<div id="myContent">
			<h1>Alternative content</h1>
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
        <span id="msg"></span>

	</body>
</html>
