<?php /* Smarty version Smarty-3.0.6, created on 2015-01-17 08:28:09
         compiled from ".\templates\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1410454aa35128fd1c0-54037120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89d1e5891599f8ad2f3de50c07ac5ae3329ee7a8' => 
    array (
      0 => '.\\templates\\user.tpl',
      1 => 1411023060,
      2 => 'file',
    ),
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1411023040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1410454aa35128fd1c0-54037120',
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

	
//----------- For Popup----------------------------------
	function show_win_ser(data)
	{
		document.getElementById('inv_data').innerHTML=data;
	}
	function search_by_user()
	{
		var user_name = document.getElementById('inv_user_id').value;
		var orderby_p = document.getElementById('orderby_p').value;
		var order_p = document.getElementById('order_p').value;
		var st_pos_p = document.getElementById('st_pos_p').value;
		if(document.getElementById('inv_user_id').value!="-1")
			x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
		else
			alert("Please Select Option");
	}
	function order(orderby_p,order_p)
	{
		var user_name = document.getElementById('inv_user_id').value;
		var st_pos_p = document.getElementById('st_pos_p').value;
		x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
	}
	
	function pop_nb(st_pos_p)
	{
		var user_name = document.getElementById('inv_user_id').value;
		var orderby_p = document.getElementById('orderby_p').value;
		var order_p = document.getElementById('order_p').value;
		x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
	}
//-------------------------------------------------------

	function show_win(data)
	{
		win=cn_window_open('INVITESs',data,true);
	}
	function chk_email(v)        
	{
		 f1=0;
		   f2=0;
		   for(j=0;j<v.length;j++)
		   {
				   if(v.charAt(j)=='@')
				   {
						   f1=j+1;
				   }
				   if(v.charAt(j)=='.')
				   {
						   f2=j+1;
				   }
		   }
		   if(f1==0 || f2==0)
		   {
				   return false;
		   }
		   else
		   {
				   return true;
		   }
	}

	function chk_val()
	{
		if(
			document.getElementById('user_fname').value=="" ||
			document.getElementById('user_lname').value=="" ||
			document.getElementById('user_gender').value=="" ||
			document.getElementById('mm').value=="" ||
			document.getElementById('dd').value=="" ||
			document.getElementById('yy').value=="" ||
			document.getElementById('user_email').value=="" ||
			document.getElementById('user_max_invites').value==""
		  )
		{
			jq_alert("Error ! empty user field.");
			return false;
		}
		else if( document.getElementById('act').value=="save" && (document.getElementById('user_password').value=="" ||
			document.getElementById('user_con_password').value==""))
		{
			jq_alert("Error ! empty user field.");
			return false;
		}
		
		else if(!chk_email(document.getElementById('user_email').value))
		{
			jq_alert("Please enter correct email id.");
			return false;
		}
		
		else if(document.getElementById('email_exist').value==1)
		{
			jq_alert("User email already exists, Please try again.");
			return false;
		}
		else if(document.getElementById('user_password').value!=document.getElementById('user_con_password').value)
		{
			jq_alert("Error ! Password and Confirm Password are not matched Please try again.");
			return false;
		}
		else
		{
			if(document.getElementById('act').value=="save")
			{
				
				user.save("",document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('mm').value,
							 document.getElementById('dd').value,
							 document.getElementById('yy').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_max_invites').value,
							 document.getElementById('user_password').value);
			}
			else
			{
				user.update("",document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('mm').value,
							 document.getElementById('dd').value,
							 document.getElementById('yy').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_max_invites').value,
							 document.getElementById('user_password').value,
							 document.getElementById('user_id').value);
			}
		}
	}
	
	function chk_email_exist()
	{
		x_chk_email_exist(document.getElementById('user_email').value,document.getElementById('user_id').value,chk_email_exist_responce)
	}
	
	function chk_email_exist_responce(js)
	{
		if(js)
		{
			jq_alert(js);
			document.getElementById('email_exist').value=1;
			return false;
		}
		else
			document.getElementById('email_exist').value=0;
	}
	
	function user_del(id)
	{
		user.del("","","","","","","","",id);
	}
	function set_order(f,o)
	{
		user.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");

	}
	
	</script><div id="user_data"></div><script>
	user= new cn_ajax("user","user_data");
	user.view("","","","","","","","","","");
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