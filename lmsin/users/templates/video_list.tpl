{extends file="video_list_header.tpl"}
{block name=body}
<!-- ---------------------------- -->

<div class="panel panel-default" style=max-width:750px;">
	<div class="panel-heading">
		<strong><em>Newly Added Videos</em></strong>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="padding-left:0;padding-right:0;">
				<div class="panel-left-content">
					<div class="container-fluid">
					
						<!--<div class="row border-bottom vcon">-->
						{foreach $latest_videos as $k=>$v}
						{if $v.i%3==0}
				  	 	{if $v.i>0}
					  	  	</div>
				  	 	{/if}
					   	<div class="row border-bottom">
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}"style="width:150px"/>
                                                                        <div class="video-detail"><strong>{$v.c_title}</strong></div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
								</a>
							</div>
					 	
						{else}
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}"style="width:150px"/>
									 <div class="video-detail"><strong>{$v.c_title}</strong></div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
								</a>
							</div>
						{/if}
						{/foreach}
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class="panel panel-default" style=max-width:750px;">
	<div class="panel-heading">
		<strong><em>Most Reviewed Videos</em></strong>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="padding-left:0;padding-right:0;">
				<div class="panel-left-content">
					<div class="container-fluid">
					
						<!--<div class="row border-bottom vcon">-->
						{foreach $most_reviewed as $k=>$v}
						{if $v.i%3==0}
				  	 	{if $v.i>0}
					  	  	</div>
				  	 	{/if}
					   	<div class="row border-bottom"style="padding-left:0;padding-right:0;width:700px;">
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}"style="width:150px"/>
									 <div class="video-detail"><strong>{$v.c_title}</strong></div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
							</div>
					 	
						{else}
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}"style="width:150px"/>
									<div class="video-detail">{$v.c_title}</div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
								</a>
							</div>
						{/if}
						{/foreach}
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- ---------------------------- -->

<script>
var SERVER_PATH="{$SERVER_PATH}";
function return_play_video(c_id)
{
	if(c_id)
	{
		window.location.href=SERVER_PATH+'watch_video.php?act=watch_video&c_id='+c_id;
		return true;
	}
}
</script> 
{/block}