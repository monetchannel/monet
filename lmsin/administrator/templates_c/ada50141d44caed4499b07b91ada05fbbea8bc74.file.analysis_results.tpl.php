<?php /* Smarty version Smarty-3.0.6, created on 2014-08-31 16:33:36
         compiled from "./templates/analysis_results.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10458763315403b0d019bfe3-08872707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ada50141d44caed4499b07b91ada05fbbea8bc74' => 
    array (
      0 => './templates/analysis_results.tpl',
      1 => 1331545008,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1336738785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10458763315403b0d019bfe3-08872707',
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
	this.document.frm.act.value="analysis_results";
	
	this.document.frm.submit();
}
function set_page()
{
	this.document.frm.act.value="analysis_results";
	this.document.frm.nrpp.value=document.getElementById('op_nrpp').value;
	this.document.frm.submit();
}
function get_analysis_graph(graph)
{
	win=cn_window_open('Analysis Graph',graph,true);
}
function show_popup(ar_id)
{
	window.open ("index.php?act=analysis_graph&ad_ar_id="+ar_id, "mywindow","menubar=0,status=1,toolbar=0, width=990,height=900");
}
function go_button()
{
	this.document.frm.st_pos.value=0;
}
function compare()
{
	var ids='';
	var frm=this.document.frm;
	var len=frm.elements.length;
	k=0;
	for(i=0;i<len;i++)
	{
		if(frm.elements[i].type=="checkbox" && frm.elements[i].checked==true)
		{
			ids=ids+","+frm.elements[i].value;
			k++;
		}
	}
	if(k==0)
	{
		alert('Please select any video!');
		return false;
	}
	else if(k>3)
	{
		alert('Please select maximum three ratings only!');
		return false;
	}
	window.open ("index.php?act=compare_youtube&ar_ids="+ids, "mywindow","menubar=0,status=1,toolbar=0, width=1120,height=900");
}
</script>
<form name="frm" method="POST" action="index.php" onsubmit="return go_button()">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr bgcolor="#FFFFFF">
      <td><table width="100%" cellpadding="0" cellspacing="0" style="padding-bottom:20px;">
        <tr bgcolor="#ffffff">
          <td width="100"><a style="text-decoration: none" href="index.php?act=import_file">Import File</a>&nbsp;&nbsp;</td>
          <td width="195">Select Video:
            <select name="c_id" id="c_id" style="width:100px;">
              
        <?php echo $_smarty_tpl->getVariable('content_option')->value;?>

      
            </select></td>
          <td width="220">Select Category:
            <select name="cat_id" id="cat_id" style="width:100px;">
              
        <?php echo $_smarty_tpl->getVariable('category_option')->value;?>

      
            </select></td>
          <td width="200">Select User:
            <select name="user_id" id="user_id" style="width:100px;">
              
        <?php echo $_smarty_tpl->getVariable('users_option')->value;?>

      
            </select></td>
          <td width="50"><input id="buttongray" class="mybutton" type="submit" name="go"  value="  GO  " /></td>
          <td width="" align="right"><?php if ($_smarty_tpl->getVariable('tot_rows')->value){?><a href="index.php?act=delete_analysis_results" class="popuptext"  style="text-decoration:none">Delete All Records</a>&nbsp;&nbsp;&nbsp;<?php }?></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" cellpadding="0" cellspacing="1">
      <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>
        <tr bgcolor="#EEEEEE" class="tablehead" align="center">
        <td width="20" align="center">Compare</td>
          <td width="20" align="center">ID</td>
          <td width="100" align="center">Date</td>
          <td width="250" align="center">Video Title</td>
          <td width="140" align="center">User</td>
          <td width="100" align="center">Category</td>
          <td width="100" align="center">Rated Emotion</td>
          <td width="65" align="center">Dominant</td>
          <td width="65" align="center">% Of Frames</td>
          <td width="150" height="30" align="center">Action</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('analysis')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
  <tr bgcolor="<?php echo $_smarty_tpl->tpl_vars['record']->value['row_bg'];?>
">
    <td height="16" class="tabletext"><input type="checkbox" name="compare_ar_id[]" value="<?php echo $_smarty_tpl->tpl_vars['record']->value['ar_id'];?>
" /></td>  
    <td height="16" class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['cf_id'];?>
</td>
    <td class="tabletext"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['record']->value['ar_date']," %e %b %Y");?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['c_title'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['user_fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['record']->value['user_lname'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['cat_name'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['ep_name'];?>
</td>
    <td class="tabletext"><?php echo ucfirst($_smarty_tpl->tpl_vars['record']->value['ar_dominant_emoton']);?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['percent'];?>
</td>
    <td class="tabletext">Download - <a href="index.php?act=analysis_csv&ar_id=<?php echo $_smarty_tpl->tpl_vars['record']->value['ar_id'];?>
">CSV</a> | <a href="javascript:show_popup('<?php echo $_smarty_tpl->tpl_vars['record']->value['ar_id'];?>
')">Graph</a></td>
  </tr>
  <?php }} ?>
  <?php }else{ ?>
    <tr bgcolor="#EEEEEE" class="tablehead" align="center">
        <td height="30" colspan="9" align="center">Record Not Found</td>
    </tr>
   <?php }?>     
      </table></td>
    </tr>
    <tr bgcolor="#FFFFFF" style="display:<?php if ($_smarty_tpl->getVariable('tot_rows')->value<1){?>none<?php }?>">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="tabletext" width="486"> Show
            <select name="op_nrpp" id="op_nrpp" onchange="javascript:set_page()" style="width:50px;">
              
        
			<?php echo $_smarty_tpl->getVariable('op_nrpp')->value;?>

              
      
            </select>
            records per page 
            &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" Compare Videos" onclick="compare()" class="mybutton"   id="buttongray" />
            </td>
          <td width="764" align="right"><span class="tabletext"><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
</span></td>
        </tr>
      </table></td>
    </tr>
  </table>
<input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
<input type="hidden" name="act"  value="analysis_results">
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