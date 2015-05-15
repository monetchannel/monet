{extends file="video_list_header.tpl"}
{block name=body}
<!-- ---------------------------- -->
 <div class="top-title">
      <form method="get" action="" >
      <input type="hidden" name="filter" value="true">
       <label class="checkbox-inline">Search By:</label>
       <div class="top-select checkbox-inline">
        <select name="cat">
         <option value="">Category</option>
         {foreach $category as $catk=>$catv}
          <option value="{$catv.cat_id}" {$catv.selected}>{$catv.cat_name}</option>
         {/foreach}
        </select>
       </div>
       <label class="checkbox-inline ">or</label>
       <div class="top-select checkbox-inline">
        <select name="brand">
         <option value="">Brand</option>
         {foreach $companies as $comk=>$comv}
          <option value="{$comv.company_id}" {$comv.selected}>{$comv.company_name}</option>
         {/foreach}
        </select>
       </div>
       <!--<input type="button" name="submit" value="Search" class="search-btn"  />-->
       <button type="submit" class="search-btn">Search</button>
       </form>
      </div>
<div class="panel panel-default">
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
						{if $v.i%4==0}
				  	 	{if $v.i>0}
					  	  	</div>
				  	 	{/if}
					   	<div class="row border-bottom">
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}">
									<div class="video-detail">{$v.c_title}</div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
								</a>
							</div>
					 	
						{else}
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}">
									<div class="video-detail">{$v.c_title}</div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
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

<div class="panel panel-default">
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
						{if $v.i%4==0}
				  	 	{if $v.i>0}
					  	  	</div>
				  	 	{/if}
					   	<div class="row border-bottom">
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}">
									<div class="video-detail">{$v.c_title}</div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
							</div>
					 	
						{else}
							<div class="col-md-3">
								<a href="javascript:return_play_video({$v.c_id})">
									<img class="img-responsive" src="{$v.c_thumb_url}">
									<div class="video-detail">{$v.c_title}</div>
									<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {if $v.diff_months==0} {if $v.diff_days==0} Added today {else} {$v.diff_days} days ago {/if}{else} {$v.diff_months} months ago{/if}</div>
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