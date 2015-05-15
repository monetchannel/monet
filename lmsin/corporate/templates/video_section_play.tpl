{extends file="index.tpl"}
{block name=body} 
<!--<div class="row  margin-top">
				<div class="col-xs-3">
					 <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
				</div>
</div>  -->  
<div class="row  margin-top">
				<div class="col-xs-3">
					 <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
				</div>
                								
        </div>
             
</div>   

 <div class="col-md-10 margin-top" style="border:0px solid #F00"><strong>Video Title:</strong> {$video_title} &nbsp;&nbsp;<button id="back" class="btn-xm btn-info" onclick="goback('analysis.php?act=video_section')" >Back</button></div>   
<br />
            
<script type="text/javascript" src="js/swfobject.js"></script>
	<script type="text/javascript">
var flashvars = {
  video_id:"{$video_id}", 
  start_time:'{$start_time}',
  end_time:'{$end_time}',
  avg_valence:'{$avg_valence}',
  avg_time:'{$avg_time}',
  time_slice:'{$time_slice}'
  
};

swfobject.embedSWF("video_section.swf", "myContent", "635", "640", "9.0.0", "expressInstall.swf",flashvars);
</script>
<div class="row" style="padding:15px">

		<div id="myContent">
			<h1>Alternative content</h1>
			<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		</div>
        <span id="msg"></span>
</div>        
{/block}