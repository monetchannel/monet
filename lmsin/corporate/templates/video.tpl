{extends file="index.tpl"}
{block name=body}
<script>
{$js}

function refresh_page()
{
	location.href=location.href;
}
//-------------------------------------- Play Video Section 
function win_play_video(data)
{
	cn_window_open('Video - '+data[1],data[0],true);
}

//-------------------------------------- Get Code Section 
function get_video_code(id)
{
	x_video_code(id,show_video_code);
}

function show_video_code(data)
{
	cn_window_t_open('Video Code - '+data[1],data[0],true,2);
}

//--------------------------INVITATION----------------------------------
function view_feedback(c_id)
{
	document.getElementById('orderby').value='';
	document.getElementById('order').value='';
	document.getElementById('st_pos').value='';
	x_view_feedback(c_id,show_feedback);
}
function show_feedback(data)
{
	cn_window_open('Feedback - '+data[1],data[0],true,1);
}
function show_feedback_short(data)
{
	document.getElementById('viewfeedback').innerHTML=data[0];
	if(data[3]=='rated')
		document.getElementById('rated').className='active';
	else
		document.getElementById('unrated').className='active';	
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

function setLink(url,video_type)
{
	win=cn_window_open("Video",'<iframe name="iframe" src="video.php?act=watch_video&url='+url+'&video_type='+video_type+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="400" width="500" style="padding:0px"></iframe>',1);
}

function setLinkSlide(ad_ar_id)
{
	win=cn_window_open("Slide Show",'<iframe name="iframe1" src="video.php?act=watch_slides&ad_ar_id='+ad_ar_id+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="400" width="500" style="padding:0px"></iframe>',1);	
}


</script>
<link href="css/datepicker.css" rel="stylesheet">
<script src="js/bootstrap-datepicker.js"></script>
<script>
{$js}

function chk_all()
{
        var question_sets_selected = $('#set_id').val();
        var selected_questions = $('input[name="choose_questions[]"]:checked').map(function(){
                                   return $(this).val();
                                 });
        
        if(document.getElementById('youtube_video').checked==true && document.getElementById('c_url').value=="" || document.getElementById('c_date').value=="" || document.getElementById('cat_id').value=='-1')
	{
		$('#alert-msg').html('Please fill all mandatory fields to continue.');
		$('.alert').show();
		return false;
	}
        else if(question_sets_selected.length==0){
                $('#alert-msg').html('Please select any question set.');
		$('.alert').show();
		return false;
        }
        else if(selected_questions.length<2){
                $('#alert-msg').html('Please select atleast two questions.');
		$('.alert').show();
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
	$('#myModal').modal('hide');
	//win.hide();
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
	
	function get_date()
	{
		$('#c_date').datepicker({
		format: 'mm/dd/yyyy',
		startDate: '-3d',
		 autoclose: true
		})
	}

	
</script>
    
    <div id="video_data"></div>
    
<script>
	video= new cn_ajax("video","video_data");
	video.view("","","","","","","","","","");
</script>

{/block}
