{extends file="index_brand_video.tpl"}
{block name=body}
<link href="css/video_list.css" rel="stylesheet">
{foreach $records as $k=>$v}
<div class="container" style="padding : 15px ">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-10"> <strong><em>{$v.company_name}</em></strong> </div>
          <!--<div class="col-md-2 panel-heading-sub-right">
            <select>
              <option value="all">All</option>
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
            </select>
          </div>-->
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">{$v.video_list}</div>
        </div>
      </div>
    </div>
  </div>
  </div>
{/foreach}          

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