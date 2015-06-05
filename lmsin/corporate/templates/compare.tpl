{extends file="index.tpl"}
{block name=body}
    <style> 
        #temp {
            background-color: purple;
        }
    </style>
    {if $msg}
        <div class="alert alert-success margin-top">  
            <a class="close" data-dismiss="alert">×</a>  
            {$msg}  
        </div>  
    {/if}

    <div class="row  margin-top">
        <div class="col-xs-6 col-sm-6 col-md-12">
            <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
            <!--<img class="img-responsive" src="./images/pepsilogo.png">-->

            <div class="top-title">
                <form method="POST" action="compare.php">
                    <input type="hidden" name="filter" value="true">
                    <div class="row">
                        <div class="col-md-6" style="border-right: 2px solid purple;">
                            <label class="checkbox-inline"><strong><font size="5">Compare what:</font></strong></label>
                            <div class="row"><div class="col-md-5">
                                    <div class="top-select checkbox-inline" >
                                        <select name="cat1" id="cat1" class="form-control">
                                            <option value="">
                                                Category
                                            </option>
                                            {foreach $category_name1 as $cat}
                                                <option value="{$cat.cat_id}" {$cat.selected}>
                                                    {$cat.cat_name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div></div>
                                <div class="col-md-7">
                                    <div class="top-select checkbox-inline">
                                        <select name="countries1" id="countries1" class="form-control">
                                            <option value="">
                                                Country
                                            </option>
                                            {foreach $country_name1 as $country}
                                                <option value="{$country.countries_id}" {$country.selected}>
                                                    {$country.countries_name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div></div></div><br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4 align-center" >
                                    <div class="top-select checkbox-inline" >
                                        <select name="gender1"id="gender1" class="form-control">
                                            <option value="">
                                                Gender
                                            </option>
                                            {foreach $gender1 as $k}
                                                <option value="{$k.key}" {$k.selected}>
                                                    {$k.key}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-5"></div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="checkbox-inline"><strong><font size="5">Compare with:</font></strong></label><br>
                            <div class="row"><div class="col-md-5">
                                    <div class="top-select checkbox-inline" >
                                        <select name="cat2" id="cat2" class="form-control">
                                            <option value="">
                                                Category
                                            </option>
                                            {foreach $category_name2 as $cat}
                                                <option value="{$cat.cat_id}" {$cat.selected}>
                                                    {$cat.cat_name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div></div>
                                <div class="col-md-7">
                                    <div class="top-select checkbox-inline">
                                        <select name="countries2" id="countries2" class="form-control">
                                            <option value="">
                                                Country
                                            </option>
                                            {foreach $country_name2 as $country}
                                                <option value="{$country.countries_id}" {$country.selected}>
                                                    {$country.countries_name}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div></div></div><br>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4 align-center" >
                                    <div class="top-select checkbox-inline" >
                                        <select name="gender2" id="gender2" class="form-control">
                                            <option value="">
                                                Gender
                                            </option>
                                            {foreach $gender2 as $k}
                                                <option value="{$k.key}" {$k.selected}>
                                                    {$k.key}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-5"></div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-md-6 action align-center">

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


                            <input type="hidden" name="vode_id[]" value="0" />


                        </div><div class="col-md-4 align-center">
                            <button type="submit" class="btn btn-default" id="temp"><strong><font color="white">Search</font></strong></button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-default" id="temp" onclick="javascript:return generate_code();"><strong><font color="white">Compare</font></strong></button>
                        </div>
                    </div>

            </div> 
        </div>

    <div class="row"><div class="col-md-6 text-center alert alert-info" style="height:70px;"><input type="checkbox" class="allbrands1">&nbsp;Include All{if $category1_include!=""} {$category1_include} Category{/if} Videos From Other Brands{if $country1_include!="" or $gender1_include!=""} with feedbacks{if $gender1_include!=""} of {$gender1_include}{/if}{if $country1_include!=""} from {$country1_include}{/if}{/if}</div><div class="col-md-6 text-center alert alert-info" style="height:70px;"><input type="checkbox" class="allbrands2">&nbsp;Include All{if $category2_include!=""} {$category2_include} Category{/if} Videos From Other Brands{if $country2_include!="" or $gender2_include!=""} with feedbacks{if $gender2_include!=""} of {$gender2_include}{/if}{if $country2_include!=""} from {$country2_include}{/if}{/if}
</div></div>
    
    <div class="row">
        <div class="col-md-6">
            {if $video_num_rows1>0}
    <div class="container-fluid"><br>
                                
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectall1"></th>
                        <th>Video</th>
                        <th><a href="javascript: set_order('c_title','{$c_title_order}')" style="color:#FFF">Title</a></th>
                        
                    </tr>
                </thead>
                <tbody>
                    {foreach $videos1 as $video}
                    <tr>
                        <td class = "col-md-1">
                            <input type="checkbox" name="video1_{$video.c_id}" value="{$video.c_id}" class="video1">
                        </td>
                        <td class="field-label col-xs-3 col-sm-3 col-md-3 text-align align-center"><img class="img-responsive" src="{$video.c_thumb_url}" alt="125x125" style="margin:0 auto;">
                        </td>
                        <td class="col-md-6  second-td">
                                {$video.c_title}</br>
                            Category: {$video.cat_name}<br>
                                Feedback: {$video.num_feedback}
                        </td>
                        
                        
                    </tr>
                    {/foreach}
                </tbody>
             </table>
            </div>
    </div>
    </div>
    {else}
    <br />
    <div class="row"><div class="col-md-12 text-center alert alert-info">There are no feedbacks from the current selection.</div></div>
    {/if}
    </div>
    <div class="col-md-6">
        {if $video_num_rows2>0}
    <div class="container-fluid"><br>
                                
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered"> 
                
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectall2"></th>
                        <th>Video</th>
                        <th><a href="javascript: set_order('c_title','{$c_title_order}')" style="color:#FFF">Title</a></th>
                        
                    </tr>
                </thead>
                <tbody>
                    {foreach $videos2 as $video}
                    <tr>
                        <td class = "col-md-1">
                            <input type="checkbox" name="video2_{$video.c_id}" value="{$video.c_id}" class="video2">
                        </td>
                        <td class="field-label col-xs-3 col-sm-3 col-md-3 text-align align-center"><img class="img-responsive" src="{$video.c_thumb_url}" alt="125x125" style="margin:0 auto;">
                        </td>
                        <td class="col-md-6  second-td">
                                {$video.c_title}</br>
                            Category: {$video.cat_name}</br>
                                Feedback: {$video.num_feedback}
                        </td>
                        
                        
                    </tr>
                    {/foreach}
                </tbody>
             </table>
                            
        </div>
    </div>
    </div>
    {else}
    <br />
    <div class="row"><div class="col-md-12 text-center alert alert-info">There are no feedbacks from the current selection.</div></div>
    {/if}
    </div>
    </div>
    </div>
    <input type="hidden" name="content_id" value="" />  

</form>

<script>
    $(document).ready(function() {
    $('#selectall1').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.video1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.video1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
     $('#selectall2').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.video2').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.video2').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
    /*
	function compare_video()
	{
		document.frm.act.value='compare_video_analysis'
		document.frm.submit();
	}
*/
function generate_code()
{
        var checkBoxes=document.getElementsByClassName(0);
	var booleangraphResult=false;
        var chkArray = [];
        eraseCookie("graphs_to_show");
        $.each(checkBoxes, function(index, obj){
            if(obj.checked){
               chkArray.push(obj.value);
               var chkData = JSON.stringify(chkArray);
               createCookie("graphs_to_show",chkData,"1");
               booleangraphResult = true;
            }
        });
        
        
        var checkBoxes=document.getElementsByClassName("video1");
	var booleanvideo1Result=false;
        var chkArray = [];
        eraseCookie("video1_to_compare");
        $.each(checkBoxes, function(index, obj){
            if(obj.checked){
               chkArray.push(obj.value);
               var chkData = JSON.stringify(chkArray);
               createCookie("video1_to_compare",chkData,"1");
               booleanvideo1Result = true;
            }
        });
        
        var checkBoxes=document.getElementsByClassName("video2");
	var booleanvideo2Result=false;
        var chkArray = [];
        eraseCookie("video2_to_compare");
        $.each(checkBoxes, function(index, obj){
            if(obj.checked){
               chkArray.push(obj.value);
               var chkData = JSON.stringify(chkArray);
               createCookie("video2_to_compare",chkData,"1");
               booleanvideo2Result = true;
            }
        });
        
        var checkBoxes=document.getElementsByClassName("allbrands1");
	var allbrands1=false;
        $.each(checkBoxes, function(index, obj){
            if(obj.checked){
               allbrands1 = true;
            }
        });
        
        var checkBoxes=document.getElementsByClassName("allbrands2");
	var allbrands2=false;
        $.each(checkBoxes, function(index, obj){
            if(obj.checked){
               allbrands2 = true;
            }
        });
        
        if(booleangraphResult==false)
	{
		alert("Please select at least one.");
                return false;
	}
        if(booleanvideo1Result==false && allbrands1 == false)
	{
		alert("Please select at least one video from the left.");
                return false;
	}
        if(booleanvideo2Result==false && allbrands2 == false)
	{
		alert("Please select at least one video from the right.");
                return false;
	}
        var all1="";
        var all2="";
	if(allbrands1==true) all1="&all1=true"
        if(allbrands2==true) all2="&all2=true"
        var a = 'compare.php?act=compare';
        var b = '&cat1=';
        var c = '&countries1=';
        var d = '&gender1=';
        var e = '&cat2=';
        var f = '&countries2=';
        var g = '&gender2=';
        var cook = readCookie("graphs_to_show");
            location.href = a.concat(b,document.getElementById('cat1').value,c,document.getElementById('countries1').value,d,document.getElementById('gender1').value,e,document.getElementById('cat2').value,f,document.getElementById('countries2').value,g,document.getElementById('gender2').value,all1,all2);
        
        return false;
}
</script>
    
    
{/block}
