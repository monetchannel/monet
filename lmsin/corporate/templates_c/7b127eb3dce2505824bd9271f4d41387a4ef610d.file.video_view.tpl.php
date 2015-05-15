<?php /* Smarty version Smarty-3.0.6, created on 2015-04-17 10:32:11
         compiled from ".\templates\video_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26950542a582f621c88-62853164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b127eb3dce2505824bd9271f4d41387a4ef610d' => 
    array (
      0 => '.\\templates\\video_view.tpl',
      1 => 1425973755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26950542a582f621c88-62853164',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('msg')->value){?>
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  <?php echo $_smarty_tpl->getVariable('msg')->value;?>
  
</div>  
<?php }?>

<form name="frm" method="POST" action="video.php" onSubmit="return false;">
    <div class="row  margin-top">
        <div class="col-xs-4 col-sm-4 col-md-6">
            
            <img class="img-responsive" src="<?php echo $_COOKIE['CompanyLogoSmall'];?>
" />
            <!-- <img class="img-responsive" src="./images/pepsilogo.png">-->
            
        </div>
        <div class="col-xs-8 col-sm-8 col-md-6 " style="margin-top:2%; text-align:right;">                      
            <a href="javascript:video.add('','Add Video');get_date()" class="video-link">Add video<img class="" src="./images/addvideo.png" style="margin-right:1%;"></a>
            <input type="text" name="search" class="search-query" placeholder="Search..." value="<?php echo $_smarty_tpl->getVariable('ser_key')->value;?>
" id="search"/>	
            <button id="search" class="search-btn" onclick="ser_by(document.getElementById('search').value)" ></button>
            <div class="clear"></div>									
        </div>
    </div>
    
    <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                <thead>
                    <tr>
                        <th>Video</th>
                        <th><a href="javascript: set_order('c_title','<?php echo $_smarty_tpl->getVariable('c_title_order')->value;?>
')" style="color:#FFF">Title</a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value){
?>
                    <tr>
                        <td class="field-label col-xs-4 col-sm-4 col-md-2 text-align"><img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['video']->value['c_thumb_url'];?>
" alt="125x125"></td>
                        <td class="col-md-6 second-td">
                                <?php echo $_smarty_tpl->tpl_vars['video']->value['c_date'];?>
-Uploaded By </br>
                                <?php echo $_smarty_tpl->tpl_vars['video']->value['c_title'];?>
</br>
                                Feedback: <?php echo $_smarty_tpl->tpl_vars['video']->value['num_feedback'];?>

                        </td>
                        
                        <td class="col-md-4 third-td" >
                            <div class="container-fluid">
                                <div class="row  action pull-right">
                                    
                                <a href="add_campaign.php?videoid=<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" >
                                <img class="" width="24" height="24" src="./images/edit.png">
                                <div>Add Campaign</div>
                                </a>                               
                               
                                <a href="javascript:view_feedback(<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
)" >
                                <img class="" width="24" height="24" src="./images/feedback.png">
                                <div>Feedback</div>
                                </a>
                                
                                <a href="javascript:video.edit('','Edit Video','','','','','','','','<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
')">
                                <img class="" width="24"  height="24" src="./images/edit.png">
                                <div>Edit</div>
                                </a>	
                                
                                <a href="javascript:get_video_code(<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
)">
                                <img class=""  width="24" height="24" src="./images/code.png">
                                <div>Getcode</div>
                                </a>
                                
                                <a href="javascript: video_del(<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
)">
                                <img class=""  width="24" height="24" src="./images/delete.png">
                                <div>Delete</div>
                                </a>

                                <a href="<?php echo $_smarty_tpl->getVariable('Server_View_Path')->value;?>
user/watch_video.php?act=watch_video&c_id=<?php echo $_smarty_tpl->tpl_vars['video']->value['c_id'];?>
" target="_blank"><img class=""  width="24" height="24" src="./images/video_icon.png">
                                <div>View</div>
                                </a>
                                        
                                   
                            </div>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
             </table>
             <table class="table">
                <tr>
                    <td>
                    Show<select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
                    <?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>

                    </select>
                    records per page
                    </td>
                    <td>&nbsp;</td>
                    <td class="text-right">
                    <?php echo $_smarty_tpl->getVariable('nb_text')->value;?>

                    </td>
                </tr>
             </table>
        </div>
    </div>
    <?php }else{ ?>
    <br />
    <div class="text-center alert alert-info">Your current video list is empty. Please add video by clicking here. <a href="javascript:video.add('','Add Video');" class="video-link"><strong>Add video</strong></a></div>
    <?php }?>

  <input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
  <input type="hidden" name="ser_key" id='ser_key' value="<?php echo $_smarty_tpl->getVariable('ser_key')->value;?>
">
  <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
  <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
  <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
  
</form>
