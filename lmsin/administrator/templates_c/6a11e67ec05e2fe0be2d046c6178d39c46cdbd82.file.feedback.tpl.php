<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 09:47:30
         compiled from ".\templates\feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1531954aa351a345358-41700283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a11e67ec05e2fe0be2d046c6178d39c46cdbd82' => 
    array (
      0 => '.\\templates\\feedback.tpl',
      1 => 1411023020,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1411023040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1531954aa351a345358-41700283',
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

function setLinkSlide(ad_ar_id)
{
	win=cn_window_open("Slide Show",'<iframe name="iframe1" src="feedback.php?act=watch_slides&ad_ar_id='+ad_ar_id+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="400" width="500" style="padding:0px"></iframe>',1);	
}

	
	</script><div id="feedback_data"></div><script>
	feedback= new cn_ajax("feedback","feedback_data");
	feedback.view("","","","","","","","","");

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