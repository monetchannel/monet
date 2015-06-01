{extends file="video_list_header.tpl"}
{block name=body}
<div style="margin-left:15px;">
    <h4>My reward points :<b> {$user_data.points}</b></h4>
</div>
						
<div class="panel panel-default">
    <div class="panel-heading">
	<strong><em>Last Redeemed Reward</em></strong>
    </div>
    <div class="container-fluid">
	<div class="row">
            <div class="col-md-12" style="padding-left:0;padding-right:0;">
                <div class="panel-left-content">
                    <div class="container-fluid">
                    	<!--<div class="row border-bottom vcon">-->
			{if $my_redeems|@count > 0}
                            {foreach $my_redeems as $rek=>$rev}
                                {if $rek%4==0}
                                    {if $rek>0}
                    </div>
                                    {/if}
                    <div class="row border-bottom">
                        <div class="col-md-3">
                            <img class="" src="../../uploads/{$rev.r_image}" style="width:120px;height:120px; float:left; margin-right:6px"></img>  
                            <div class="product-title">
                                {$rev.title} ({$rev.sub_title})
                            </div>
                            <div class="product-point">
				{$rev.points} Points
			    </div>
			</div>
				{else}
                        <div class="col-md-3">
                            <img class="" src="../../uploads/{$rev.r_image}" style="width:120px;height:120px; float:left; margin-right:6px" ></img>  
                            <div class="product-title">
                                {$rev.title} ({$rev.sub_title})
                            </div>
                            <div class="product-point">
				{$rev.points} Points
			    </div>
			</div>
				{/if}
			    {/foreach}
                        {else}
                            <div>
                                You did not redeem any reward yet!
                            </div>
                    </div>
			{/if}
                </div>
            </div>
	</div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
	<strong><em>More Rewards to Redeem</em></strong>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="padding-left:0;padding-right:0;">
		<div class="panel-left-content">
                    <div class="container-fluid">
                        <!--<div class="row border-bottom vcon">-->
			{if $rewards|@count > 0}
                            {foreach $rewards as $rek=>$rev}
				{if $rek%4==0}
                                    {if $rek>0}
                    </div>
                                    {/if}
                    <div class="row border-bottom">
                    <div class="col-md-3">
			<a href="javascript:void(0)" id="{$rev.re_a_id}" data="{$rev.r_id}" class="{$rev.re_a_id}">
			<img class="" src="../../uploads/{$rev.r_image}"style="width:150px;height:150px; float:left; margin-right:6px" ></img> 
			<div class="product-title">
                            {$rev.title} ({$rev.sub_title})
			</div>
			<div class="product-point">
                            {$rev.points} Points
			</div>
			</a>
                    </div>
				{else}
                    <div class="col-md-3">
			<a href="javascript:void(0)" id="{$rev.re_a_id}" data="{$rev.r_id}" class="{$rev.re_a_id}">
			<img class="" src="../../uploads/{$rev.r_image}"style="width:150px;height:150px; float:left; margin-right:6px"></img>  
			<div class="product-title">
                            {$rev.title} ({$rev.sub_title})
			</div>
			<div class="product-point">
                            {$rev.points} Points
			</div>
			</a>
                    </div>
				{/if}
                            {/foreach}
                    </div>
			{/if}
		</div>
            </div>
	</div>
    </div>
   </div>
 	
</div>
</div>		
</div>
</div>


<div class="modal fade redeem-popup" id="redeem-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
	<div class="modal-content">
            <form id="redeemReForm" role="form">
		<input type="hidden" name="UserId" id="UserId">
		<input type="hidden" name="rewardId" id="rewardId">
		<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Redeem Reward</h4>
		</div>
		<div class="modal-body" style=" padding: 0;">
                    <table class="">
			<tr>
                            <td><img src=""  style="width:120px;height:120px; float:left; margin-right:6px" class="reimg"></td>
                            <td><span class="retitle"></span><br><span class="repoints"></span></td>
			</tr>
                    </table
		</div>
		<div class="modal-footer">
                    <div id="agreeSubmit" class="form-group" style="text-align:center;">
			<button type="submit" class="ok-button">Redeem</button>
			<button type="button" class="ok-button" data-dismiss="modal"><span aria-hidden="true">Cancel</span></button>
                    </div>
		</div>
            </form>	
	</div>
    </div>
</div>


<script type="text/javascript">
		
		var SERVER_PATH="{$SERVER_PATH}";
		$(function(){
			$('a#redeem_re').on('click', function(){
				var UserId = '{$user_data.user_id}';
				var id = $(this).attr('data'), imgsrc = $(this).children('img').attr('src'), retitle = $(this).children('.product-title').text(), repoints = $(this).children('.product-point').text();
				//alert(id + imgsrc + retitle + repoints);
				{literal}
				$('#redeem-popup .reimg').attr({'src' : imgsrc});
				$('#redeem-popup .retitle').text(retitle);
				$('#redeem-popup .repoints').text(repoints);
				$('#redeem-popup #UserId').val(UserId);
				$('#redeem-popup #rewardId').val(id);
				
				$('#redeem-popup').modal('show');
				
				$('#redeemReForm').on('submit', function (event) {
					event.preventDefault();
					var frm = $(this).serialize();
					//alert(frm);
					$.ajax({
						type : 'POST',
						url : 'index.php?act=xhr_redeem_reward',
						data : frm,
						success: function (result) {
							
							//location.reload();
							
							
						},
						error: function (jqXHR,text_status,err_msg) {
							alert('ERROR : '+text_status+' '+err_msg);
						},
					});
				});
				{/literal}
			});
		});
			
		
		
		
		</script>
	
{/block}
