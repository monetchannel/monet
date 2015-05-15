{extends file="index.tpl"}
{block name=body}
<script>
{$js}
//--------------------------INVITATION----------------------------------
function show_feedback(data)
{
	win=cn_window_open('FEEDBACK',data[0],true);
}
function show_feedback_short(data)
{
	document.getElementById('viewfeedback').innerHTML=data[0];
}
function rate(rate)
{
	var c_id=document.getElementById('c_id').value;
	var orderby=document.getElementById('orderby').value;
	var order=document.getElementById('order').value;
	var nrpp=document.getElementById('nrpp').value;
	var st_pos=document.getElementById('st_pos').value;
	x_view_feedback(c_id,rate,orderby,order,nrpp,st_pos,show_feedback_short);
}
function order(f,o)
{
	var c_id=document.getElementById('c_id').value;
	var rate=document.getElementById('rate').value;
	var nrpp=document.getElementById('nrpp').value;
	var st_pos=document.getElementById('st_pos').value;
	x_view_feedback(c_id,rate,f,o,nrpp,st_pos,show_feedback_short);
}
function page(nrpp)
{
	var c_id=document.getElementById('c_id').value;
	var rate=document.getElementById('rate').value;
	var orderby=document.getElementById('orderby').value;
	var order=document.getElementById('order').value;
	var st_pos=document.getElementById('st_pos').value;
	x_view_feedback(c_id,rate,orderby,order,nrpp,st_pos,show_feedback_short);
}
function pop_nb(st_pos)
{
	var c_id=document.getElementById('c_id').value;
	var rate=document.getElementById('rate').value;
	var orderby=document.getElementById('orderby').value;
	var order=document.getElementById('order').value;
	var nrpp=document.getElementById('nrpp').value;
	x_view_feedback(c_id,rate,orderby,order,nrpp,st_pos,show_feedback_short);
}
/*
function show_feedback_short(data)
{
	document.getElementById('viewfeedback').innerHTML=data[0];
}
function rate(rate)
{
	x_view_feedback(document.getElementById('c_id').value,rate,document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('nrpp').value,document.getElementById('st_pos').value,show_feedback_short);
}
function order(f,o)
{
	x_view_feedback(document.getElementById('c_id').value,document.getElementById('rate').value,f,o,document.getElementById('nrpp').value,document.getElementById('st_pos').value,show_feedback_short);
}
function page(nrpp)
{
	x_view_feedback(document.getElementById('c_id').value,document.getElementById('rate').value,document.getElementById('orderby').value,document.getElementById('order').value,nrpp,document.getElementById('st_pos').value,show_feedback_short);
}
function pop_nb(st_pos)
{
	x_view_feedback(document.getElementById('c_id').value,document.getElementById('rate').value,document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('nrpp').value,st_pos,show_feedback_short);
}
*///--------------------------END INVITATIONS-------------------------------
function setLink(url)
{
	win=cn_window_open("Video",'<iframe name="iframe" src="video.php?act=watch_video&url='+url+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="400" width="500" style="padding:0px"></iframe>',1);
}
</script>
<script>
{$js}

function chk_all()
{
	/*if(document.getElementById('act').value=="save")
	{
		var c_date=document.getElementById('c_date').value;
		var c_url=document.getElementById('c_url').value;
		var c_title=document.getElementById('c_title').value;
		var c_desc=document.getElementById('c_desc').value;
		var c_category=document.getElementById('cat_id').value;
		video.save("",c_date,c_url,c_title,c_desc,c_category);
	}
	else
	{
		var c_date=document.getElementById('c_date').value;
		var c_url=document.getElementById('c_url').value;
		var c_title=document.getElementById('c_title').value;
		var c_desc=document.getElementById('c_desc').value;
		var c_category=document.getElementById('cat_id').value;
		var c_id=document.getElementById('c_id').value;
		video.update("",c_date,c_url,c_title,c_desc,c_category,c_id);
	}*/
	if(((document.getElementById('upload_video').checked==true && document.getElementById('act').value=="video_save") && (document.getElementById('up_video').value=="" || document.getElementById('video_image').value=="" || document.getElementById('c_title').value=="" || document.getElementById('c_date').value=="")))
	{
		alert("Please fill all mendetory fields to continue.");
		return false;
	}
	else if((document.getElementById('youtube_video').checked==true && (document.getElementById('c_url').value=="" || document.getElementById('c_date').value=="")))
	{
		alert("Please fill all mendetory fields to continue.");
		return false;
	}
	if(radio_chk("checkbox","multiselect_cat_id")==false)
	{
		alert("Please select category.");
		return false;
	}
	else
	{
		document.videofrm.target="submitframe";
		document.videofrm.submit();
	}
}
function video_del(id)
{
	video.del("","","","","","","","",id);
}
function set_content(msg)
{
	win.hide();
	video.view('',msg);
}
function set_order(f,o)
{
	video.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('ser_key').value,"","","");
}
function nb(a)
{
	document.getElementById('st_pos').value=a;
	video.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,document.getElementById('ser_key').value,"","","");
}
function set_page(nrpp)
{
	document.getElementById('nrpp').value=nrpp;
	video.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('ser_key').value,"","","");

}
function ser_by(ser_key)
{
	video.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,ser_key,"","","");
}
function do_you_wish(wish)
{
	if(wish==1)
	{
		document.getElementById('up_video').style.display='';
		document.getElementById('up_image').style.display='';
		document.getElementById('utube').style.display='none';
		document.getElementById('h_c_title').style.display='';
		document.getElementById('h_c_disc').style.display='';
	}
	else
	{
		document.getElementById('up_video').style.display='none';
		document.getElementById('up_image').style.display='none';
		document.getElementById('utube').style.display='';
		document.getElementById('h_c_title').style.display='none';
		document.getElementById('h_c_disc').style.display='none';
	}
}
function call_after_popup_open()
{
	$("#cat_id").multiselect({
		selectedList: 4
	});
}
	
	
	</script><div id="video_data"></div><script>
	video= new cn_ajax("video","video_data");
	video.view("","","","","","","","","","");
</script>
{/block}