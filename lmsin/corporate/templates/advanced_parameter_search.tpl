{extends file="index.tpl"}
{block name=body}

{if $msg}
<div class="alert alert-success margin-top">
  
  <a class="close" data-dismiss="alert">
    ×
  </a>
  
  {$msg}  
</div>

{/if}

<div class="row  margin-top">
  <div class="col-xs-6 col-sm-6 col-md-12">
    <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
    <!--
<img class="img-responsive" src="./images/pepsilogo.png">
-->
          
          <div class="top-title">
            <form method="POST" action="advanced_parameter_search.php">
              <input type="hidden" name="filter" value="true">
              <label class="checkbox-inline"><strong>
                      Search By:</strong>
              </label>
              <div class="top-select checkbox-inline">
                <select name="cat" id="cat" class="form-control">
                  <option value="">
                    Category
                  </option>
                  {foreach $category_name as $cat}
                  <option value="{$cat.cat_id}" {$cat.selected}>
                    {$cat.cat_name}
                  </option>
                  {/foreach}
                </select>
              </div>
              <div class="top-select checkbox-inline">
                <select name="countries" id="countries" class="form-control">
                  <option value="">
                    Country
                  </option>
                  {foreach $country_name as $country}
                  <option value="{$country.countries_id}" {$country.selected}>
                    {$country.countries_name}
                  </option>
                  {/foreach}
                </select>
              </div>
              <div class="top-select checkbox-inline">
                <select name="gender"id="gender" class="form-control">
                  <option value="">
                    Gender
                  </option>
                  {foreach $gender as $k}
                  <option value="{$k.key}" {$k.selected}>
                    {$k.key}
                  </option>
                  {/foreach}
                </select>
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" class="btn btn-default"><strong>
                      Search</strong>
              </button>
            </div>
          </div>
          
      </div>
      
      <br>
      {if $video_num_rows>
      0}
      <div class="container-fluid">
        <br>
        <div class="row  action pull-left">
          
          <a href="javascript:void(0)" >
            <input type="checkbox" name="excampaign[]" id="campaign_0" value="excludecampaign" class="0" />
            <div>
              <label>
                Exclude Campaign
              </label>
            </div>
          </a>
          
          
          <a href="javascript:void(0)" >
            <input type="checkbox" name="valence[]" id="Valence_0" value="valence" class="0" checked="checked" />
            <div>
              <label for="Valence_0">
                Valence
              </label>
            </div>
          </a>
          
          <a href="javascript:void(0)">
            <input type="checkbox" name="microexpressions[]" id="Microexpressions_0" value="emotion" class="0" checked="checked" />
            <div>
              <label for="Microexpressions_0">
                Microexpressions
              </label>
            </div>
          </a>
          
          
          <a href="javascript:void(0)">
            <input type="checkbox" name="engagement[]" id="Engagement_0" value="attention" class="0" checked="checked" />
            <div>
              <label for="Engagement_0">
                Engagement
              </label>
            </div>
          </a>
          
          <a href="javascript:void(0)">
            <input type="checkbox" name="Heat_map[]" id="Heat_map_0" value="heatmap" class="0" checked="checked" />
            <div>
              <label for="Heat_map_0">
                Heat Map
              </label>
            </div>
          </a>
          
          
          <button class="btn btn-default" onclick="javascript:return generate_code('0')">
            <strong>
              Analyze
            </strong>
          </button>
          <input type="hidden" name="vode_id[]" value="0" />
          
          
        </div>
        <div class="row"><br>
          <div class="col-md-9">
            <table class="table table-bordered">
              
              <thead>
                <tr>
                  <th>
                    Video
                  </th>
                  <th>
                    <a href="javascript: set_order('c_title','{$c_title_order}')" style="color:#FFF">
                      Title
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                {foreach $videos as $video}
                <tr>
                  <td class="field-label col-xs-1 col-sm-1 col-md-1 text-align">
                    <img class="img-responsive" style="margin:0 auto;" src="{$video.c_thumb_url}" alt="125x125">
                  </td>
                  <td class="col-md-7  second-td">
                    
                {$video.c_title}
              </br>Category: {$video.cat_name} 
                  </br>
          Feedback: {$video.num_feedback}
      </td>
      
     
      </tr>
      {/foreach}
      </tbody>
</table>

</div>
</div>
{else}
<br />
<div class="text-center alert alert-info">
  Your current video analysis list is empty.
</div>
{/if}

<input type="hidden" name="content_id" value="" />


</form>

<script>
  /*
function compare_video()
{
document.frm.act.value='compare_video_analysis'
document.frm.submit();
}
*/
  function generate_code(contentId)
  {
    var checkBoxes=document.getElementsByClassName(contentId);
    var booleanResult=false;
    var chkArray = [];
    eraseCookie("graphs_to_show");
    $.each(checkBoxes, function(index, obj){
        if(obj.checked){
        chkArray.push(obj.value);
        var chkData = JSON.stringify(chkArray);
        createCookie("graphs_to_show",chkData,"1");
        booleanResult = true;
        }
    }
    );
  
    if(booleanResult==false)
    {
      alert("Please select at least one.");
      return false;
    }
  
    var a = 'advanced_parameter_search.php?act=analysebyparameters';
    var b = '&cat=';
    var c = '&countries=';
    var d = '&gender=';
    var cook = readCookie("graphs_to_show");
      location.href = a.concat(b,document.getElementById('cat').value,c,document.getElementById('countries').value,d,document.getElementById('gender').value);
    return false;
}
</script>


{/block}
