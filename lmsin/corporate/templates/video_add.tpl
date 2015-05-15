<div class="alert alert-warning" style="display:none">  
<span id='alert-msg'></span>
</div>  

 <script type="text/javascript" src="js/add_video.js"></script>

<form method="POST" action="video.php" onSubmit="return false;" name="videofrm" enctype="multipart/form-data" class="form-horizontal" role="form" style="z-index:67856756">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Do you wish to:</label>
    <div class="col-sm-7" style="text-align:left">
      <div class="col-sm-7"  style="float:left; margin-top:5px" ><input name="video" type="radio" id="youtube_video" onclick="do_you_wish(this.value)" value="0" {$youtube} />&nbsp;You tube link</div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Video URL (YouTube) *:</label>
    <div class="col-sm-7">
    
     <input name="c_url" type="text" id="c_url" value="{$c_url}"  class="form-control" />
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Date Published *:</label>
    <div class="col-sm-7">
      <input name="c_date" id="c_date" size="12" class="form-control datepicker" value="{$c_date}" data-date-format="mm/dd/yyyy" onmouseover="javascript:get_date()"   />
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Category *:</label>
    <div class="col-sm-7">
      <select name="cat_id[]" id="cat_id"  class="form-control"   >
        
              {$category_list}
          
      </select>
    </div>
  </div>
              
  <!-- question sets list -->
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Question Sets *:</label>
    <div class="col-sm-7">
      <select name="set_id[]" id="set_id" multiple="multiple" onchange="getCategoryQuestionsList(this)" class="form-control" >{$question_set_list}</select>
    </div>
  </div>
    
    <div id="quest_check_list">
        <!-- here the list of all questions of the selected sets will appear -->
        {$questionsListHtml}
    </div>  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-7">
      <input type="submit" value="Submit" name="B1" id="buttongray" onclick="chk_all()" class="btn btn-default" />
    </div>
  </div>
  
  <input type="hidden" name="act" id="act" value="{$act}">
  <input type="hidden" name="c_id" id="c_id" value="{$c_id}">
</form>
</div>
