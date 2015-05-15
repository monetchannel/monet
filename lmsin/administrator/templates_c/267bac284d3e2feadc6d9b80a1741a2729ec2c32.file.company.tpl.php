<?php /* Smarty version Smarty-3.0.6, created on 2014-08-30 07:11:15
         compiled from "./templates/company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19600444745401db83625859-32162123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '267bac284d3e2feadc6d9b80a1741a2729ec2c32' => 
    array (
      0 => './templates/company.tpl',
      1 => 1409407412,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1336738785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19600444745401db83625859-32162123',
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

	
	
	
	function refresh_page(msg)
	{
		win.hide();
		company.view("",msg,'','',document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	
	
	function set_content(data)
	{
		jq_alert(data);
		return false;
	}
	
	
	function chk_all()
	{
		if(document.getElementById('company_name').value=="" || document.getElementById('company_email').value=="" || document.getElementById('company_contactno').value==""  || document.getElementById('company_address').value=="" || document.getElementById('company_country').value=="-1"|| document.getElementById('company_zipcode').value=="" )//
		//|| (document.getElementById('company_password').value=="" && document.getElementById('company_id').value=="" )
		//|| (document.getElementById('company_logo').value==""  && document.getElementById('company_logo_exist').value=='')
		{
			jq_alert("Please fill all mandatory fields to continue.");
			return false;
		}
		else if(!chk_email(document.getElementById('company_email').value))
		{
			jq_alert("Please enter correct email id.");
			return false;
		}
		else
		{
			document.companyfrm.target="submitframe";
			document.companyfrm.submit();
		}
	}
	
	/*function chk_val()
	{
		if(document.getElementById('company_name').value=="" || document.getElementById('company_email').value=="" || document.getElementById('company_contactno').value==""  || document.getElementById('company_address').value=="" || document.getElementById('company_country').value=="-1"|| document.getElementById('company_zipcode').value=="" || (document.getElementById('company_password').value=="" && document.getElementById('company_id').value=="" ))
		{
			jq_alert("Please fill all mendetory fields to continue.");
			return false;
		}
		else if(!chk_email(document.getElementById('company_email').value))
		{
			jq_alert("Please enter correct email id.");
			return false;
		}
		else
		{
	
			if(document.getElementById('act').value=="save")
			{
				company.save("",document.getElementById('company_name').value,document.getElementById('company_email').value,document.getElementById('company_contactno').value,document.getElementById('company_password').value,document.getElementById('company_address').value,document.getElementById('company_country').value,document.getElementById('company_zipcode').value);
			}
			else
			{
				company.update("",document.getElementById('company_name').value,document.getElementById('company_email').value,document.getElementById('company_contactno').value,document.getElementById('company_password').value,document.getElementById('company_address').value,document.getElementById('company_country').value,document.getElementById('company_zipcode').value,document.getElementById('company_id').value);
			}
		}
	}*/
	
	
	function show_invr(msg)
	{
		company.view("",msg,'','',document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	
	function company_del(id)
	{
		company.del("","","","","","","","",id);
	}
	function set_order(f,o)
	{
		company.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		company.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		company.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");

	}
	
	
	function company_del(id)
	{
		company.del("","","","","","","","",id);
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

	
	</script><div id="company_data"></div><script>
	company= new cn_ajax("company","company_data");
	company.view("","","","","","","","","");
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