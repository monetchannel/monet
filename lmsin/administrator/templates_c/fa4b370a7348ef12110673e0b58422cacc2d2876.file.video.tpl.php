<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 08:28:04
         compiled from ".\templates\video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29252544e125d5b3ec1-38169696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa4b370a7348ef12110673e0b58422cacc2d2876' => 
    array (
      0 => '.\\templates\\video.tpl',
      1 => 1411023066,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1411023040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29252544e125d5b3ec1-38169696',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrative Section</title>

<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
jquery-multiselect/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
jquery-multiselect/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
css/boxy.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
style.css" />

<script language="javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
cal2.js"></script>
<script language="javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
cal_conf2.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
jquery-multiselect/jquery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
js/cynets.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
js/jquery.boxy.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
jquery-multiselect/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_ADMIN_PATH')->value;?>
jquery-multiselect/jquery.multiselect.js"></script>

</head>
<body>
<div align="center">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#111111" id="AutoNumber1">
    <tr>
      <td width="100%"  valign="top" ><br>
        <table width="99%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td  align="left" valign="center" bgcolor="#EEEEEE" height="50" id="logo-text" >Administrative
              Section</td>
            <td bgcolor="#EEEEEE" width="36%">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td valign="top" align="center" style="background-repeat:repeat-y; padding-left:2px"  >
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6" align="left" valign="top" background="images/background1.jpg" style="background-repeat:repeat-y">&nbsp;</td>
            <td align="center" valign="top" background="images/background_bg.jpg">
            <table width="100%" valign="bottom" height="33" border="0" cellspacing="0" cellpadding="0"  >
                <tr style="display:<?php echo $_smarty_tpl->getVariable('none')->value;?>
" >
                  <td  bgcolor="#eeeeee">
                  
                  <ul id="nav" style="padding-left:0px">
                       
                        <li class="<?php echo $_smarty_tpl->getVariable('video_tab')->value;?>
">
                            <a href="video.php">Video</a>
                            <ul>
                                <li><a  href="video.php">Manage Video</a></li>
                                <li><a  href="index.php?act=video_view">Suggested Videos</a></li>
                            </ul>
                        </li>
                        
                        <li class="<?php echo $_smarty_tpl->getVariable('company_tab')->value;?>
">
                            <a  href="company.php">Company [<?php echo $_smarty_tpl->getVariable('company_invite_num')->value;?>
]</a>
                            <ul>
                                <li><a  href="company.php">Manage Company</a></li>
                                <li><a  href="company_invitation.php">Company Invitation</a></li>
                    
                            </ul>
                    
                        </li>
                        
                        
                         <li class="<?php echo $_smarty_tpl->getVariable('user_tab')->value;?>
">
                            <a href="user.php">User [<?php echo $_smarty_tpl->getVariable('invit_num')->value;?>
]</a>
                            <ul>
                                <li><a  href="user.php">User</a></li>
                                <li><a  href="invitation.php">Invitation Request</a></li>
                                 <li><a href="index.php?act=show_send_email">Send Emails</a></li>
                    
                            </ul>
                    
                        </li>
                      
                      
                       <li class="<?php echo $_smarty_tpl->getVariable('feedback_tab')->value;?>
">
                            <a href="feedback.php">Feedback</a>
                        </li>
                    
                      
                       <li  class="<?php echo $_smarty_tpl->getVariable('import_tab')->value;?>
">
                            <a  href="index.php?act=analysis_results">Analysis</a>
                    
                            <ul>
                                <li><a href="index.php?act=analysis_results">Analysis Results</a></li>
                                <li><a href="index.php?act=video_section">Video Section</a></li>
                    
                            </ul>
                    
                        </li>
                       
                    
                      <li class="<?php echo $_smarty_tpl->getVariable('logout_tab')->value;?>
">
                            <a href="index.php?act=logout">Logout</a>
                        </li>
                    
                      
                    </ul>
                  </td>
                </tr>
                <tr  >
                  <td height="44"  background="images/menu_bottom_bg.jpg" style="background-repeat:
repeat-x" align="center"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" class="tabletext" style="text-align:center; padding:0px; font-size:13px">&nbsp;</td>
                      </tr>
                     
                      <tr>
                        <td>&nbsp;</td>
                      </tr> <tr>
                        <td align="center">
<script>
<?php echo $_smarty_tpl->getVariable('js')->value;?>

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
<?php echo $_smarty_tpl->getVariable('js')->value;?>


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
</td>
                      </tr>
                      <tr>
                        <td align="center">&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
            <td width="7" align="right" valign="top" background="images/background2.jpg" style="background-repeat:repeat-y">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
   
    <tr>
      <td align="center" id="footer"> Copyright &copy;<?php echo $_smarty_tpl->getVariable('year')->value;?>
 All right Reserved.</td>
    </tr>
  </table>
  <tr id="footer">
    <td align="center" >&nbsp;</td>
  </tr>
</div>
<iframe name="submitframe" id="submitframe" frameborder="0" style="height:500px; width:800px; display:none"></iframe>
</body>
</html>