{extends file="video_list_header.tpl"}

{block name=body}

 <!-- ----------------------------- -->
  
      
           
            <!-- --------- -->
           
            
            {if $campaigns|@count > 0}
               <div class="panel panel-default">
       <div class="panel-heading">
        <strong><em>Campaigns</em></strong>
       </div>
       <div class="container-fluid">
        <div class="row">
         <div class="col-md-12" style="padding-left:0;padding-right:0;">
          <div class="panel-left-content">
              <div class="container-fluid">
            <!--<div class="row border-bottom vcon">-->{$i=0}
            {foreach $campaigns as $k=>$v} {$i = $i + 1}
            {if $k%2==0}
               {if $k>0}
                 </div>
               {/if}
               <div class="row border-bottom">
             <div class="col-md-6" style="border-right:1px solid #ccc;">
              <div class="col-md-4">
               <a href="javascript:return_campaign_video({$v.c_id}, {$v.cmp_id})">
                <img class="img-responsive" src="{$v.c_thumb_url}">
               </a>
              </div>
              <div class="col-md-8">
               <div class="video-detail">{$v.c_title}</div>
               <div class="">Campaign : {$v.cmp_name}</div>
               <div class="">Subject : {$v.cmp_subject}</div>
               <div class="">Start date : {$v.start_date}</div>
               <div class="">End date : {$v.end_date}</div>
              </div>
             </div>
             
            {else}
             <div class="col-md-6">
              <div class="col-md-4">
               <a href="javascript:return_campaign_video({$v.c_id}, {$v.cmp_id})">
                <img class="img-responsive" src="{$v.c_thumb_url}">
               </a>
              </div>
              <div class="col-md-8">
               <div class="video-detail">{$v.c_title}</div>
               <div class="">Campaign : {$v.cmp_name}</div>
               <div class="">Subject : {$v.cmp_subject}</div>
               <div class="">Start date : {$v.start_date}</div>
               <div class="">End date : {$v.end_date}</div>
              </div>
             </div>
            {/if}
            {/foreach}{if $i%2==1} </div>{/if}
            </div></div></div></div></div></div>
            {else}
                <div class="panel panel-default">
       <div class="panel-heading">
        <strong><em>Campaigns</em></strong>
       </div>
       <div class="container-fluid">
        <div class="row">
         <div class="col-md-12" style="padding-left:0;padding-right:0;">
          <div class="panel-left-content">
              <div class="container-fluid">
               <div class="text-center alert alert-info" id = "link"><a href = "" class="myclass"> No campaigns assigned. Please watch more videos!</a></div>
               <div class="panel panel-default" style=max-width:750px;height:20px;"><br>
                                                     <div class="panel-heading"><strong>Rate More Videos</strong></div></div>
                                                                                <br>
                                                                                <br>                  
							<div class="row border-bottom">
								<div class="col-md-12">
								
										
											Recently Added
										{foreach $latest_videos as $k=>$v}
											{if $v.i%6==0}
											{if $v.i>0}
											{/if}
										<div class="row border-bottom">
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
												</a>
											</div>
					 	
											{else}
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
												</a>
											</div>
											{/if}
										{/foreach}
										</div>
										
										Most Reviewed
										{foreach $most_reviewed as $k=>$v}
											{if $v.i%6==0}
											{if $v.i>0}
											{/if}
										<div class="row border-bottom">
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
												<div class="video-detail">{$v.c_title}</div>
												<div class="video-short">by - <b>{$v.company_name}</b> | {$v.c_views} views <br> {$v.c_date}</div>
												</a>
											</div>
					 	
											{else}
											<div class="col-md-3">
												<a href="watch_video.php?act=watch_video&c_id={$v.c_id}">
												<img class="img-responsive" src="{$v.c_thumb_url}">
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
						
          </div></div></div></div></div>
            {/if}
        
            <!-- --------- -->
          
       
           
            
      
      <!-- ----------------------------- -->
      <script type="text/javascript">
          function(){
          $("#link").hover(function (){
        $(this).css("text-decoration", "underline");
    },function(){
        $(this).css("text-decoration", "none");
    }
          }
);
          </script>
<script type="text/javascript">
    
var SERVER_PATH="{$SERVER_PATH}";
function return_campaign_video(c_id, cmp_id)
{
 if(c_id && cmp_id)
 {
  window.location.href=SERVER_PATH+'user/watch_video.php?act=watch_video&c_id='+c_id+'&cmp_id='+cmp_id;
  return true;
 }
}
</script>
{/block}
