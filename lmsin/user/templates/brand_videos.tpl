{foreach $records as $k=>$v}
<div class="col-md-6 {if $v.i%2==1}left-div{/if} " style="height:280px; {if $v.i<$num_rows} border-bottom:1px solid #ccc"{/if}">
  <div class="row main-content" style="border:0px">
    <div class="row video-main">
      <div class="col-md-5 video-box"><a href="javascript:return_play_video({$v.c_id})"><img src="{$v.c_thumb_url}" /></a> </div>
      <div class="col-md-7">
        <div class="row video-heading"> <a href="javascript:return_play_video({$v.c_id})">{$v.c_title}</a> </div>
        <div class="row"> Date is not recognized ! 22 views </div>
        <div class="row"> The Preatures: Bonnaoroo 2014 ! Artist of the week </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12 description-main">
        <div class="row description"> <a>Subscribe : http//www.youtube.com/subscription_center?add_user=pepsi </a> </div>
        <div class="row sub-description" >{$v.c_desc}</div>
      </div>
    </div>
  </div>
</div>
{/foreach} 