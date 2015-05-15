{extends file="index_brand_video.tpl"}
{block name=body}
<br />
<div class="text-right"><a href="corporate/index.php?act=logout" class="btn btn-primary">Logout</a></div>
<div id="container-add-box">
  <div style="border-bottom:1px #000000 solid; height:250px; padding-left:10px; padding-right:10px">{$current_brand_video_list}</div>
  {foreach $records as $k=>$v}
      {if $v.video_list}
      <div class="view second-effect">  
        <img src="{$v.company_logo}" >
        <div class="mask">
        	{$v.video_list}
        </div>  
    </div>
    {/if} 
  
 {/foreach} 
</div> 

<script>
var SERVER_PATH="{$SERVER_PATH}"
function return_play_video(c_id)
{
	if(c_id)
	{
		window.location.href=SERVER_PATH+'watch_video.php?act=watch_video&c_id='+c_id;
		return true;
	}
}
</script>
<style>

/* CSS3 STYLE GENERIC */
.view {
   width: 200px;
   height: 155px;
   margin: 10px 18px 10px 10px;
   float: left;
   border: 2px solid #fff;
   overflow: hidden;
   position: relative;
   text-align: center;
   box-shadow: 0px 0px 5px #aaa;
   cursor: default;
}
.view .mask, .view .content {
   width: 200px;
   height: 155px;
   position: absolute;
   overflow: hidden;
   top: 0;
   left: 0;
}
.view img {
   display: block;
   position: relative;
}
.view.info {
   text-decoration: none;
   padding:0;
   text-indent:-9999px;
   width:20px;
   height:20px;
   position:absolute;
   top:0px;
   left:0px;
}

/* CSS3 EFFECTS */

/* SECOND EFFECTS */

.second-effect .mask {
   opacity: 0;
   overflow:visible;
   border:0px solid rgba(0,0,0,0.7);
   -moz-box-sizing:border-box;
   -webkit-box-sizing:border-box;
   box-sizing:border-box;
   -webkit-transition: all 0.4s ease-in-out;
   -moz-transition: all 0.4s ease-in-out;
   -o-transition: all 0.4s ease-in-out;
   -ms-transition: all 0.4s ease-in-out;
   transition: all 0.4s ease-in-out;
}
.second-effect a.info {
	position:relative;
	top:-100px;
	left:-100px;
	opacity:0;
   -moz-transform:scale(0,0);
   -webkit-transform:scale(0,0);
   -o-transform:scale(0,0);
   -ms-transform:scale(0,0);
   transform:scale(0,0);
   -webkit-transition: -webkit-transform 0.2s 0.1s ease-in, opacity 0.1s ease-in-out;
   -moz-transition: -moz-transform 0.2s 0.1s ease-in, opacity 0.1s ease-in-out;
   -o-transition: -o-transform 0.2s 0.1s ease-in, opacity 0.1s ease-in-out;
   -ms-transition: -ms-transform 0.2s 0.1s ease-in, opacity 0.1s ease-in-out;
   transition: transform 0.2s 0.1s ease-in, opacity 0.1s ease-in-out;
}
.second-effect:hover .mask {
   opacity: 0.9;
   /*border:100px solid #FFF;*/
   border:100px solid rgba(0,0,0,0.7);
}
.second-effect:hover a.info {
	opacity:1;
	-moz-transform:scale(1,1);
	-webkit-transform:scale(1,1);
	-o-transform:scale(1,1);
	-ms-transform:scale(1,1);
	transform:scale(1,1);
	-moz-transition-delay:0.3s;
	-webkit-transition-delay:0.3s;
	-o-transition-delay:0.3s;
	-ms-transition-delay:0.3s;
	transition-delay:0.3s;
}
				
		
</style>
{/block}