<?php /* Smarty version Smarty-3.0.6, created on 2014-09-02 05:02:16
         compiled from "./templates/suggested_video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6194980385405b1c8378be0-63848972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7eb68087d7739c8dc2366f84c559eb4306dda5da' => 
    array (
      0 => './templates/suggested_video.tpl',
      1 => 1320144020,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1336738785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6194980385405b1c8378be0-63848972',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/content/79/8486879/html/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


function nb(a)
{
	this.document.frm.st_pos.value=a;
	this.document.frm.act.value="video_view";
	
	this.document.frm.submit();
}

function set_page()
{
	this.document.frm.act.value="video_view";
	this.document.frm.nrpp.value=document.getElementById('op_nrpp').value;
	this.document.frm.submit();
}
function deny(a)
{
        this.document.frm.cs_id.value=a;
		this.document.frm.act.value="video_deny";
		this.document.frm.submit();	
}
function approved(a)
{
        this.document.frm.cs_id.value=a;
		this.document.frm.act.value="video_approved";
		this.document.frm.submit();	
}
function call_after_popup_open()
{
	$("#cat_id").multiselect({
		selectedList: 4
	});
}
function set_approved_video_popup(js)
{
	win=cn_window_open("Please select a Category",js,1);
	call_after_popup_open();
}

function setLink(url,type)
{
	if(!type)
	win=cn_window_open("Video",'<iframe name="iframe" src="index.php?act=watch_video&url='+url+'" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="350" width="500" style="padding:0px"></iframe>',1);
    else
	win=cn_window_open("Video",'<iframe name="iframe" src="index.php?act=watch_video&url='+url+'&type=youtube" allowTransparency="true" marginheight="0" marginwidth="0" frameborder="0" height="350" width="500" style="padding:0px"></iframe>',1);
}

</script>

<form name="frm" method="POST" action="index.php">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td align=left class="popuptext">&nbsp;&nbsp;</td>
         
            <td align="right"><span class="tabletext"> <?php if ($_smarty_tpl->getVariable('tot_rows')->value){?><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
<?php }?></span></td>
          </tr>
        </table></td>
    </tr>
    
  </table>
   <?php if ($_smarty_tpl->getVariable('tot_rows')->value){?> 
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="78">
          <tr bgcolor="#333333">
            <td width="25%" height="35" align="left" bgcolor="#EEEEEE" class="tablehead">Title</td>
            <td bgcolor="#EEEEEE" width="15%" align="center" class="tablehead">User</td>
            <td bgcolor="#EEEEEE" width="19%" align="center" class="tablehead">Email Id</td>
            <td bgcolor="#EEEEEE" width="17%" align="center" class="tablehead">Date</td>
            <!--<td bgcolor="#EEEEEE" width="24%" align="center" class="tablehead">Status</td>-->
            <td bgcolor="#EEEEEE" width="24%" align="center" class="tablehead">Action</td>
          </tr>
<?php }?>
<?php  $_smarty_tpl->tpl_vars['vid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['vid']->key => $_smarty_tpl->tpl_vars['vid']->value){
?>
<tr bgcolor="#ffffff"><td width="25%" align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['vid']->value['cs_title'];?>
</td><td width="15%" align="left" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['vid']->value['user_fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['vid']->value['user_lname'];?>
</td><td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['vid']->value['user_email'];?>
</td><td height="16" class="tabletext"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vid']->value['cs_date']," %e %b %Y");?>
</td><!--<td height="16" class="tabletext"><?php echo $_smarty_tpl->tpl_vars['vid']->value['status'];?>
</td>--><td width="24%" align="left" class="tabletext" ><span class="tabletextred2"><a href="Javascript:x_approved_category('<?php echo $_smarty_tpl->tpl_vars['vid']->value['cs_id'];?>
',set_approved_video_popup)">Approved</a></span>&nbsp;|&nbsp;<span class="tabletextred2"><a href="Javascript:deny('<?php echo $_smarty_tpl->tpl_vars['vid']->value['cs_id'];?>
')" style="display:<?php echo $_smarty_tpl->getVariable('hide')->value;?>
">Deny</a></span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['vid']->value['video'];?>
</td></tr>
<?php }} ?>


      </table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="tabletext" width="250"> Show
              <select name="op_nrpp" id="op_nrpp" onChange="javascript:set_page()" style="width:50px;">
			<?php echo $_smarty_tpl->getVariable('op_nrpp')->value;?>

              </select>records per page </td>
            <td width="20" align="right">&nbsp;</td>
            <td class="tabletext" width="150" align="left" style="padding-left:5px">&nbsp;</td>
            <td align="right"  ><span class="tabletext"><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
</span></td>
          </tr>
        </table>
       
        </td>
    </tr>
  </table>
    <input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
    <input type="hidden" name="act"  value="video_view">
    <input type="hidden" name="cs_id" value="<?php echo $_smarty_tpl->getVariable('cs_id')->value;?>
">
    <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
    <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
    <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
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