{if $msg}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$msg}  
</div>  
{/if}

<form name="frm" method="POST" action="video.php" onSubmit="return false;">
    <div class="row  margin-top">
        <div class="col-xs-4 col-sm-4 col-md-6">
            
            <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
            <!-- <img class="img-responsive" src="./images/pepsilogo.png">-->
            
        </div>
        <div class="col-xs-8 col-sm-8 col-md-6 " style="margin-top:2%; text-align:right;">                      
            <a href="javascript:video.add('','Add Video');get_date()" class="video-link">Add video<img class="" src="./images/addvideo.png" style="margin-right:1%;"></a>
            <input type="text" name="search" class="search-query" placeholder="Search..." value="{$ser_key}" id="search"/>	
            <button id="search" class="search-btn" onclick="ser_by(document.getElementById('search').value)" ></button>
            <div class="clear"></div>									
        </div>
    </div>
    
    {if $tot_rows>0}

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>Video</th>
                        <th><a href="javascript: set_order('c_title','{$c_title_order}')" style="color:#FFF">Title</a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                {foreach $videos as $video}
                    <tr>
                        <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align"><img class="img-responsive" src="{$video.c_thumb_url}" alt="125x125"></td>
                        <td class="col-md-6 second-td">
                                {$video.c_date}-Uploaded By </br>
                                {$video.c_title}</br>
                                Feedback: {$video.num_feedback}
                        </td>
                        
                        <td class="col-md-4 third-td" >
                            <div class="container-fluid">
                                <div class="row  action pull-right">
                                    
                                <a href="add_campaign.php?videoid={$video.c_id}" >
                                <img class="" width="24" height="24" src="./images/edit.png">
                                <div>Add Campaign</div>
                                </a>                               
                               
                                <a href="javascript:view_feedback({$video.c_id})" >
                                <img class="" width="24" height="24" src="./images/feedback.png">
                                <div>Feedback</div>
                                </a>
                                
                                <a href="javascript:video.edit('','Edit Video','','','','','','','','{$video.c_id}')">
                                <img class="" width="24"  height="24" src="./images/edit.png">
                                <div>Edit</div>
                                </a>	
                                
                                <a href="javascript:get_video_code({$video.c_id})">
                                <img class=""  width="24" height="24" src="./images/code.png">
                                <div>Getcode</div>
                                </a>
                                
                                <a href="javascript: video_del({$video.c_id})">
                                <img class=""  width="24" height="24" src="./images/delete.png">
                                <div>Delete</div>
                                </a>

                                <a href="{$Server_View_Path}user/watch_video.php?act=watch_video&c_id={$video.c_id}" target="_blank"><img class=""  width="24" height="24" src="./images/video_icon.png">
                                <div>View</div>
                                </a>
                                        
                                   
                            </div>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
             </table>
             <table class="table">
                <tr>
                    <td>
                    Show<select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
                    {$nrppOpt}
                    </select>
                    records per page
                    </td>
                    <td>&nbsp;</td>
                    <td class="text-right">
                    {$nb_text}
                    </td>
                </tr>
             </table>
        </div>
    </div>
    {else}
    <br />
    <div class="text-center alert alert-info">Your current video list is empty. Please add video by clicking here. <a href="javascript:video.add('','Add Video');" class="video-link"><strong>Add video</strong></a></div>
    {/if}

  <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
  <input type="hidden" name="ser_key" id='ser_key' value="{$ser_key}">
  <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
  <input type="hidden" name="order" id="order" value="{$order}">
  <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
  
</form>
