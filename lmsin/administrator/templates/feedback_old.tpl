{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
	function show_xport(data)
	{
		alert(data);
	}
	function set_order(f,o)
	{
		var v_title=document.getElementById('v_title').value;
		var date_from=document.getElementById('date_from').value;
		var date_to=document.getElementById('date_to').value;
		var v_user=document.getElementById('v_user').value;
		var se_emo=get_ids('multiselect_se_emo','checkbox') ;
		var se_re1=get_ids('multiselect_se_re1','checkbox') ;
		var rate=document.getElementById('rate').value;
		
		var st_pos=document.getElementById('st_pos').value;
		var nrpp=document.getElementById('nrpp').value;
		
		feedback.view("","",f,o,st_pos,nrpp,v_title,date_from,date_to,v_user,se_emo,se_re1,rate);
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		var v_title=document.getElementById('v_title').value;
		var date_from=document.getElementById('date_from').value;
		var date_to=document.getElementById('date_to').value;
		var v_user=document.getElementById('v_user').value;
		var se_emo=get_ids('multiselect_se_emo','checkbox') ;
		var se_re1=get_ids('multiselect_se_re1','checkbox') ;
		var rate=document.getElementById('rate').value;
		
		var orderby=document.getElementById('orderby').value;
		var order=document.getElementById('order').value;
		var nrpp=document.getElementById('nrpp').value;
		
		feedback.view("","",orderby,order,a,nrpp,v_title,date_from,date_to,v_user,se_emo,se_re1,rate);
	}
	function set_page(nrpp)
	{
		var v_title=document.getElementById('v_title').value;
		var date_from=document.getElementById('date_from').value;
		var date_to=document.getElementById('date_to').value;
		var v_user=document.getElementById('v_user').value;
		var se_emo=get_ids('multiselect_se_emo','checkbox') ;
		var se_re1=get_ids('multiselect_se_re1','checkbox') ;
		var rate=document.getElementById('rate').value;
		
		var orderby=document.getElementById('orderby').value;
		var order=document.getElementById('order').value;
		var st_pos=document.getElementById('st_pos').value;
		
		feedback.view("","",orderby,order,st_pos,nrpp,v_title,date_from,date_to,v_user,se_emo,se_re1,rate);

	}

	function report_export()
	{
		document.feedback_frm.type.value="export";
		document.feedback_frm.act.value="feedback_view";
		document.feedback_frm.submit();
	}


	function ser_by()
	{
		var v_title=document.getElementById('v_title').value;
		var date_from=document.getElementById('date_from').value;
		var date_to=document.getElementById('date_to').value;
		var v_user=document.getElementById('v_user').value;
		var se_emo=get_ids('multiselect_se_emo','checkbox') ;
		var se_re1=get_ids('multiselect_se_re1','checkbox') ;
		var rate=document.getElementById('rate').value;
		
		var orderby=document.getElementById('orderby').value;
		var order=document.getElementById('order').value;
		var st_pos=document.getElementById('st_pos').value;
		var nrpp=document.getElementById('nrpp').value;
		
		feedback.view("","",orderby,order,st_pos,nrpp,v_title,date_from,date_to,v_user,se_emo,se_re1,rate);
	}
	function set_rate(rate)
	{
		document.getElementById('rate').value=rate;
		var v_title=document.getElementById('v_title').value;
		var date_from=document.getElementById('date_from').value;
		var date_to=document.getElementById('date_to').value;
		var v_user=document.getElementById('v_user').value;
		var se_emo=get_ids('multiselect_se_emo','checkbox') ;
		var se_re1=get_ids('multiselect_se_re1','checkbox') ;
		
		var orderby=document.getElementById('orderby').value;
		var order=document.getElementById('order').value;
		var st_pos=document.getElementById('st_pos').value;
		var nrpp=document.getElementById('nrpp').value;
		feedback.view("","",orderby,order,st_pos,nrpp,v_title,date_from,date_to,v_user,se_emo,se_re1,rate);
	}
function call_after_page_load()
{
							   
		$("#se_emo").multiselect({
		selectedList: 4
		});
		
		$("#se_re1").multiselect({
		selectedList: 4
		});				   
							   
		//When page loads...
		$(".tab_content").hide(); //Hide all content
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content
		var text =document.getElementById('rate').value;
		if(text=='rated')
		{
			$('#rated').addClass("active");
			$('#unrated').removeClass("active");
		}
		if(text=='unrated')
		{
			$('#unrated').addClass("active");
			$('#rated').removeClass("active");
		}
		
		//On Click Event
		$("ul.tabs li").click(function() {
	
			$("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
		});
	
}

function setLink(url,video_type)
{
	win=cn_window_open("Video",'<iframe name="iframe" src="feedback.php?act=watch_video&url='+url+'&video_type='+video_type+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="400" width="500" style="padding:0px"></iframe>',1);
}
	{/literal}
	</script><div id="feedback_data"></div><script>
	feedback= new cn_ajax("feedback","feedback_data");
	feedback.view("","","","","","","","","");

</script>
{/block}