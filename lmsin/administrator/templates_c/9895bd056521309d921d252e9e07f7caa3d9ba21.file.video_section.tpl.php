<?php /* Smarty version Smarty-3.0.6, created on 2014-09-02 05:04:34
         compiled from "./templates/video_section.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9583799125405b25273d6c0-10279807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9895bd056521309d921d252e9e07f7caa3d9ba21' => 
    array (
      0 => './templates/video_section.tpl',
      1 => 1332221690,
      2 => 'file',
    ),
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1336738785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9583799125405b25273d6c0-10279807',
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

function nb(a)
{
	this.document.frm.st_pos.value=a;
	this.document.frm.act.value="video_section";
	this.document.frm.submit();
}
function set_page()
{
	this.document.frm.act.value="video_section";
	this.document.frm.nrpp.value=document.getElementById('op_nrpp').value;
	this.document.frm.submit();
}
function play_video(video_id,start,end,c_id)
{
	var vlc_from='<?php echo $_smarty_tpl->getVariable('valence_from')->value;?>
';
	var vlc_to='<?php echo $_smarty_tpl->getVariable('valence_to')->value;?>
';
	window.open ("index.php?act=play_video&video_id="+video_id+"&start_time="+start+"&end_time="+end+"&c_id="+c_id+"&vlc_from="+vlc_from+"&vlc_to="+vlc_to+"&time_segment="+this.document.frm.time_segment.value,"mywindow","menubar=0,status=1,toolbar=0, width=660,height=684");
}
function go_button()
{
	this.document.frm.st_pos.value=0;
}
</script>
<form name="frm" method="POST" action="index.php" onsubmit="return go_button()">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr bgcolor="#FFFFFF">
      <td><table width="100%" cellpadding="0" cellspacing="0" style="padding-bottom:20px;">
        <tr bgcolor="#ffffff">
          <td width="195">Select Range:&nbsp;&nbsp;&nbsp; From
            <select name="valence_from" id="valence_from" style="width:100px;">
            <option value="-2">Select</option> 
             <option value="-1" <?php echo $_smarty_tpl->getVariable('valence_from_minuswhole1')->value;?>
>-1</option>
             <option value="-.9" <?php echo $_smarty_tpl->getVariable('valence_from_minus9')->value;?>
>-.9</option>
             <option value="-.8" <?php echo $_smarty_tpl->getVariable('valence_from_minus8')->value;?>
>-.8</option>
             <option value="-.7" <?php echo $_smarty_tpl->getVariable('valence_from_minus7')->value;?>
>-.7</option>
             <option value="-.6" <?php echo $_smarty_tpl->getVariable('valence_from_minus6')->value;?>
>-.6</option>
             <option value="-.5" <?php echo $_smarty_tpl->getVariable('valence_from_minus5')->value;?>
>-.5</option>
             <option value="-.4" <?php echo $_smarty_tpl->getVariable('valence_from_minus4')->value;?>
>-.4</option>
             <option value="-.3" <?php echo $_smarty_tpl->getVariable('valence_from_minus3')->value;?>
>-.3</option>
             <option value="-.2" <?php echo $_smarty_tpl->getVariable('valence_from_minus2')->value;?>
>-.2</option>
             <option value="-.1" <?php echo $_smarty_tpl->getVariable('valence_from_minus1')->value;?>
>-.1</option>
             <option value="0" <?php echo $_smarty_tpl->getVariable('valence_from_0')->value;?>
>0</option>
             <option value=".1" <?php echo $_smarty_tpl->getVariable('valence_from_plus1')->value;?>
>.1</option>
             <option value=".2" <?php echo $_smarty_tpl->getVariable('valence_from_plus2')->value;?>
>.2</option>
             <option value=".3" <?php echo $_smarty_tpl->getVariable('valence_from_plus3')->value;?>
>.3</option>
             <option value=".4" <?php echo $_smarty_tpl->getVariable('valence_from_plus4')->value;?>
>.4</option>
             <option value=".5" <?php echo $_smarty_tpl->getVariable('valence_from_plus5')->value;?>
>.5</option>
             <option value=".6" <?php echo $_smarty_tpl->getVariable('valence_from_plus6')->value;?>
>.6</option>
             <option value=".7" <?php echo $_smarty_tpl->getVariable('valence_from_plus7')->value;?>
>.7</option>
             <option value=".8" <?php echo $_smarty_tpl->getVariable('valence_from_plus8')->value;?>
>.8</option>
             <option value=".9" <?php echo $_smarty_tpl->getVariable('valence_from_plus9')->value;?>
>.9</option>
             <option value="1" <?php echo $_smarty_tpl->getVariable('valence_from_1')->value;?>
>1</option>
            </select>&nbsp;&nbsp; To:
            <select name="valence_to" id="valence_to" style="width:100px;">
             <option value="-2">Select</option> 
             <option value="-1" <?php echo $_smarty_tpl->getVariable('valence_to_minuswhole1')->value;?>
>-1</option>
             <option value="-.9" <?php echo $_smarty_tpl->getVariable('valence_to_minus9')->value;?>
>-.9</option>
             <option value="-.8" <?php echo $_smarty_tpl->getVariable('valence_to_minus8')->value;?>
>-.8</option>
             <option value="-.7" <?php echo $_smarty_tpl->getVariable('valence_to_minus7')->value;?>
>-.7</option>
             <option value="-.6" <?php echo $_smarty_tpl->getVariable('valence_to_minus6')->value;?>
>-.6</option>
             <option value="-.5" <?php echo $_smarty_tpl->getVariable('valence_to_minus5')->value;?>
>-.5</option>
             <option value="-.4" <?php echo $_smarty_tpl->getVariable('valence_to_minus4')->value;?>
>-.4</option>
             <option value="-.3" <?php echo $_smarty_tpl->getVariable('valence_to_minus3')->value;?>
>-.3</option>
             <option value="-.2" <?php echo $_smarty_tpl->getVariable('valence_to_minus2')->value;?>
>-.2</option>
             <option value="-.1" <?php echo $_smarty_tpl->getVariable('valence_to_minus1')->value;?>
>-.1</option>
             <option value="0" <?php echo $_smarty_tpl->getVariable('valence_to_0')->value;?>
>0</option>
             <option value=".1" <?php echo $_smarty_tpl->getVariable('valence_to_plus1')->value;?>
>.1</option>
             <option value=".2" <?php echo $_smarty_tpl->getVariable('valence_to_plus2')->value;?>
>.2</option>
             <option value=".3" <?php echo $_smarty_tpl->getVariable('valence_to_plus3')->value;?>
>.3</option>
             <option value=".4" <?php echo $_smarty_tpl->getVariable('valence_to_plus4')->value;?>
>.4</option>
             <option value=".5" <?php echo $_smarty_tpl->getVariable('valence_to_plus5')->value;?>
>.5</option>
             <option value=".6" <?php echo $_smarty_tpl->getVariable('valence_to_plus6')->value;?>
>.6</option>
             <option value=".7" <?php echo $_smarty_tpl->getVariable('valence_to_plus7')->value;?>
>.7</option>
             <option value=".8" <?php echo $_smarty_tpl->getVariable('valence_to_plus8')->value;?>
>.8</option>
             <option value=".9" <?php echo $_smarty_tpl->getVariable('valence_to_plus9')->value;?>
>.9</option>
             <option value="1" <?php echo $_smarty_tpl->getVariable('valence_to_1')->value;?>
>1</option>
            </select>&nbsp;&nbsp;&nbsp;Time Segment: <input type="text" name="time_segment" value="<?php echo $_smarty_tpl->getVariable('time_segment')->value;?>
" size="3" />&nbsp;&nbsp;&nbsp;<input id="buttongray" class="mybutton" type="submit" name="go"  value="  GO  " /></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="100%" cellpadding="0" cellspacing="1">
      <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>
        <tr bgcolor="#EEEEEE" class="tablehead" align="center">
          <td width="70%" align="center">Video Title</td>
          <td align="center">Time Slices</td>
          <td width="10%" height="30" align="center">Action</td>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('videos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value){
?>
  <tr bgcolor="#ffffff">
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['c_title'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['record']->value['time_slice'];?>
</td>
    <td class="tabletext"><a href="javascript:play_video('<?php echo $_smarty_tpl->tpl_vars['record']->value['video_id'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['start_time'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['end_time'];?>
','<?php echo $_smarty_tpl->tpl_vars['record']->value['c_id'];?>
')">PLAY</a></td>
  </tr>
  <?php }} ?>
  <?php }else{ ?>
    <tr bgcolor="#EEEEEE" class="tablehead" align="center">
        <td height="30" colspan="7" align="center">Record Not Found</td>
    </tr>
   <?php }?>     
      </table></td>
    </tr>
    <tr bgcolor="#FFFFFF" style="display:<?php if ($_smarty_tpl->getVariable('tot_rows')->value<1){?>none<?php }?>">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="tabletext" width="250"> Show
            <select name="op_nrpp" id="op_nrpp" onchange="javascript:set_page()" style="width:50px;">
              
        
			<?php echo $_smarty_tpl->getVariable('op_nrpp')->value;?>

              
      
            </select>
            records per page </td>
          <td align="right"><span class="tabletext"><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
</span></td>
        </tr>
      </table></td>
    </tr>
  </table>
<input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
<input type="hidden" name="act"  value="video_section">
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