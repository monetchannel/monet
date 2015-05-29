<?php /* Smarty version Smarty-3.0.6, created on 2015-05-29 11:47:10
         compiled from ".\templates\video_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:317505568359ee661f6-21330914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e31839dede8dd08ec6bb78d61de4c137909619df' => 
    array (
      0 => '.\\templates\\video_add.tpl',
      1 => 1432892824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317505568359ee661f6-21330914',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="alert alert-warning" style="display:none">  
<span id='alert-msg'></span>
</div>  

 <script type="text/javascript" src="js/add_video.js"></script>

<form method="POST" action="video.php"  id="videofrm" name="videofrm" enctype="multipart/form-data" class="form-horizontal" role="form" style="z-index:67856756">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Do you wish to:</label>
    <div class="col-sm-7" style="text-align:left">
      <div class="col-sm-7"  style="float:left; margin-top:5px" ><input name="video" type="radio" id="youtube_video" onclick="do_you_wish(this.value)" value="0" <?php echo $_smarty_tpl->getVariable('youtube')->value;?>
 />&nbsp;You tube link</div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Video URL (YouTube) *:</label>
    <div class="col-sm-7">
    
     <input name="c_url" type="text" id="c_url" value="<?php echo $_smarty_tpl->getVariable('c_url')->value;?>
"  class="form-control" />
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Date Published *:</label>
    <div class="col-sm-7">
      <input name="c_date" id="c_date" size="12" class="form-control datepicker" value="<?php echo $_smarty_tpl->getVariable('c_date')->value;?>
" data-date-format="mm/dd/yyyy" onmouseover="javascript:get_date()"   />
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Category *:</label>
    <div class="col-sm-7">
      <select name="cat_id[]" id="cat_id"  class="form-control"   >
        
              <?php echo $_smarty_tpl->getVariable('category_list')->value;?>

          
      </select>
    </div>
  </div>
              
  <!-- question sets list -->
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Question Sets *:</label>
    <div class="col-sm-7">
      <select name="set_id[]" id="set_id" multiple="multiple" onchange="getCategoryQuestionsList(this);" class="form-control" ><?php echo $_smarty_tpl->getVariable('question_set_list')->value;?>
</select>
    </div>
  </div>
    
    <div id="quest_check_list">
        <!-- here the list of all questions of the selected sets will appear -->
        <?php echo $_smarty_tpl->getVariable('questionsListHtml')->value;?>

    </div>  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-7">
      <input type="submit" value="Submit" name="B1" id="buttongray"  class="btn btn-default" />
    </div>
  </div>
  
  <input type="hidden" name="act" id="act" value="<?php echo $_smarty_tpl->getVariable('act')->value;?>
">
  <input type="hidden" name="c_id" id="c_id" value="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
">
</form>
</div>
