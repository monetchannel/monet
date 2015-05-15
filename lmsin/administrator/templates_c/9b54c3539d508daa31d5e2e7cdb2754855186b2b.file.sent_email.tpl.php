<?php /* Smarty version Smarty-3.0.6, created on 2014-09-02 05:03:04
         compiled from "./templates/sent_email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7027241255405b1f85448e4-16775913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b54c3539d508daa31d5e2e7cdb2754855186b2b' => 
    array (
      0 => './templates/sent_email.tpl',
      1 => 1322659559,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1336738785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7027241255405b1f85448e4-16775913',
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


<script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
administrator/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('SERVER_PATH')->value;?>
administrator/tinyupload.js"></script>
<script language="javascript" type="text/javascript">
		
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			plugins :"media,fullscreen,safari,table,advhr,advimage,advlink,iespell,insertdatetime,searchreplace,contextmenu,paste,visualchars,nonbreaking,xhtmlxtras,template,image_upload,    preview , emotions,iespell,print ,layer , style,pagebreak, spellchecker",
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cleanup,code,|,forecolor,backcolor,advhr,   |,visualchars,nonbreaking,template,blockquote,pagebreak,|,spellchecker ",//page_list,
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image ,|,insertdate,inserttime,preview",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,|,print ,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,styleprops,|, formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons1_add : "fullscreen",
			theme_advanced_buttons1_add : "media",
			height : "350",
            width : "900",
			//fullscreen_new_window : true,
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			theme_advanced_fonts : "Andale Mono=andale mono,Arial=arial,Arial Black=arial black,Book Antiqua=book antiqua,Comoc Sans MS=comic sans ms,Calibri=calibri,helvetica,sans-serif;Courier New=courier new,courier,Georgia=georgia,Helvetica=helvetica,Impact=impact,monospace,Symbol=symbol,Tahoma=tahoma,Terminal=terminal,Times New Roman=times new roman,Trebuchet MS=trebuchet ms,Verdana=verdana;AkrutiKndPadmini=Akpdmi-n",
			theme_advanced_font_sizes : "1(8px)=8px,2(10px)=10px,3(11pt)=11pt,4(12px)=12px,5(14px)=14px,6(16px)=16px,7(18px)=18px,8(20px)=20px,9(24px)=24px,10(36px)=36px",
			theme_advanced_resize_horizontal : false,
			relative_urls : false,//Tiny upload returns absolute urls, we dont want tinymce changing them to relative.
			file_browser_callback:tinyupload,//Hookup tinyupload the the filebrowser call back.
			convert_urls : false
		});

</script>

<script language="javascript">
	function chk_val()
	{
		var message=tinyMCE.getContent();
		if(document.getElementById('subject').value=="" || message=="")
		{
			alert("Please fill all * field to continue.");
			return false;
		}
		
		if(document.frm.all_user[0].checked!=true && document.frm.all_user[1].checked!=true && document.frm.all_user[2].checked!=true)
		{
			alert("Please selecte options.");
			return false;
		}
	}
</script>
<form name="frm" action="index.php?act=send_email" method="post">
  <table width="100%" cellpadding="0" cellspacing="0" id="popup">
    <tr>
      <th align="left" width="10%" >Send Mail:</th>
      <th  width="90%" class="help" style="padding-right:10px"  >&nbsp;</th>
    </tr>
    <tr><td colspan="2" align="center" class="msg" style="text-align:center">&nbsp;<?php echo $_smarty_tpl->getVariable('msg')->value;?>
</td></tr>
    
          <tr class="norow">
            <td > Options:* </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td  align="right" style="text-align:right"  > <input type="radio" name="all_user" id="radio" value="1"  /></td>
            <td>&nbsp;To all users</td>
          </tr>
          <tr>
            <td  align="right"style="text-align:right"  > <input type="radio" name="all_user" id="radio" value="2" /></td>
            <td>&nbsp;To all users who have not rated any videos</td>
          </tr>
          <tr>
            <td  align="right" style="text-align:right" ><input type="radio" name="all_user" id="radio" value="3" /></td>
            <td>&nbsp;To all users who have rated at least one video</td>
          </tr>
          
          <tr>
            <td  align="left"  >Subject:*</td>
            <td><input type="text" name="subject" id="subject" value="<?php echo $_smarty_tpl->getVariable('sa_site_name')->value;?>
" class="text_box" style="width:600px; height:20px" /></td>
          </tr>
          <tr>
            <td  align="left" valign="top">Message:*</td>
            <td><textarea name="message" id="message" rows="10" cols="50"></textarea></td>
          </tr>
         
          <tr class="hnone">
            <td ></td>
            <td ></td>
          </tr>
          <tr class="norow">
          <td>Legend:&nbsp;&nbsp;</td>
            <td  align="left"><strong>First Name:</strong> [user_fname] &nbsp;&nbsp;<strong>Last Name:</strong> [user_lname]  &nbsp;&nbsp;<strong>Email:</strong> [user_email]  </td>
          </tr>
           <tr class="hnone">
            <td ></td>
            <td ></td>
          </tr>
          <tr class="norow">
            <td  colspan="2" align="left"><input type="submit" name="Send" value=" Send "  onclick="return chk_val()" id="buttongray" /></td>
          </tr>
          <tr class="hnone">
            <td  colspan="2"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
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