<div class="well">
<ul style="margin:10px 0px 10px 0px; padding:0px" >
{foreach $records as $k=>$v}
	{if $BrandId==$v.company_id}
    <li style="padding:5px"><a href="javascript:return_play_video({$v.c_id})" style="float:none;"><img src="{$v.c_thumb_url}" /></a></li>
    {else}
		<li style="padding:0px 10px 5px 10px; width:200px; text-align:left; margin:0px; float:none;">

<a href="javascript:return_play_video({$v.c_id})" style="float:none; color:#FFF;" class="info" >{$v.c_title}</a></li>
	{/if}

{/foreach}
</ul>
</div>