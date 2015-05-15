{extends file="video_list_header.tpl"}
{block name=body}

 <!-- ----------------------------- -->
      <div class="panel panel-default">
       <div class="panel-heading">
        <strong><em>Campaigns</em></strong>
       </div>
       <div class="container-fluid">
        <div class="row">
         <div class="col-md-12" style="padding-left:0;padding-right:0;">
          <div class="panel-left-content">
           <div class="container-fluid">
           
            <!-- --------- -->
            
            {if $campaigns|@count > 0}
            <!--<div class="row border-bottom vcon">-->
            {foreach $campaigns as $k=>$v}
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
            {/foreach}
            </div>
            {/if}
            
            <!-- --------- -->
            
           </div>
          </div>
         </div>
         
        </div>
       </div>
      </div>
      <!-- ----------------------------- -->
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