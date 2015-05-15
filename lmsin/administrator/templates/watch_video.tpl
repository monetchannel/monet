<style>
.boxy-content {
padding:0px;
}

</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td></td>
  </tr>
</table>

{if $video_type=="flv"}

{if $type}

<object width="425" height="344"><param name="movie" value="{$url}"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="{$url}" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="500" height="350"></embed></object>

{else}

<script type="text/javascript" src="flowplayer/flowplayer-3.2.4.min.js"></script>
<a href="{$url}" style="display:block;width:100%;height:350px" id="player"> </a> 
<script> 
flowplayer("player", "flowplayer/flowplayer-3.2.4.swf",{
clip: {
    // these two configuration variables does the trick
    autoPlay: true, 
    autoBuffering: true // <- do not place a comma here  
    }
});
</script>

{/if}

{else}
<video width="500" height="400" src="{$url}" autoplay controls>

{/if}