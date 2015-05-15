<?php /* Smarty version Smarty-3.0.6, created on 2015-02-03 07:21:11
         compiled from ".\templates\video_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2560254d068d750a325-13865655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e31839dede8dd08ec6bb78d61de4c137909619df' => 
    array (
      0 => '.\\templates\\video_add.tpl',
      1 => 1411023070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2560254d068d750a325-13865655',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div style="width:600px">
<form method="POST" action="video.php" onSubmit="return false;" name="videofrm" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="popup">
  <tr>
    <td width="29%" align="left">Do you wish to:</td>
    <td width="71%"><table width="100%" align="left">
      <tr class="norow">
        <td width="7%"><input name="video" type="radio" id="upload_video" value="1" <?php echo $_smarty_tpl->getVariable('upload')->value;?>
 onclick="do_you_wish(this.value)" /></td>
        <td width="23%">Upload Video</td>
        <td width="6%" align="center">&nbsp;</td>
        <td width="7%"><input name="video" type="radio" id="youtube_video" onclick="do_you_wish(this.value)" value="0" <?php echo $_smarty_tpl->getVariable('youtube')->value;?>
 /></td>
        <td width="57%">You tube link</td>
      </tr>
    </table></td>
  </tr>
  <tr id="up_video" <?php if ($_smarty_tpl->getVariable('youtube')->value=='checked'){?>style=&quot;display:none&quot;<?php }?>>
    <td align="left">Upload Video *:</td>
    <td><input type="file" name="up_video" id="up_video" /></td>
  </tr>
  <tr id="up_image" <?php if ($_smarty_tpl->getVariable('youtube')->value=='checked'){?>style=&quot;display:none&quot;<?php }?>>
    <td align="left">Video Image *:</td>
    <td><input type="file" name="video_image" id="video_image" /></td>
  </tr>
  <tr id="utube" <?php if ($_smarty_tpl->getVariable('upload')->value=='checked'){?>style=&quot;display:none&quot;<?php }?>>
    <td align="left">Video URL (YouTube) *:</td>
    <td><input name="c_url" type="text" id="c_url" value="<?php echo $_smarty_tpl->getVariable('c_url')->value;?>
" size="30" /></td>
  </tr>
  <tr>
    <td align="left">Date Published *:</td>
    <td><input name="c_date" id="c_date" size="12" class="mytext" value="<?php echo $_smarty_tpl->getVariable('c_date')->value;?>
" />
      <a href="javascript:showCal('Calendar1')"> <img  border="0" src="cal.gif" width="16" height="16" /></a></td>
  </tr>
  <tr>
    <td align="left">Category *:</td>
    <td><select name="cat_id[]" id="cat_id" multiple="multiple" size="5" >
      
      
              <?php echo $_smarty_tpl->getVariable('category_list')->value;?>

            
    
    </select></td>
  </tr>
  <tr id="h_c_title" <?php if ($_smarty_tpl->getVariable('youtube')->value=='checked'){?>style=&quot;display:none&quot;<?php }?>>
    <td align="left">Title of Video *:</td>
    <td><input type="text" name="c_title" id="c_title" value="<?php echo $_smarty_tpl->getVariable('c_title')->value;?>
" /></td>
  </tr>
  <tr id="h_c_disc" <?php if ($_smarty_tpl->getVariable('youtube')->value=='checked'){?>style=&quot;display:none&quot;<?php }?>>
    <td align="left">Brief Description:</td>
    <td><textarea name="c_desc" id="c_desc" style="width:300px; height:50px"><?php echo $_smarty_tpl->getVariable('c_desc')->value;?>
</textarea></td>
  </tr>
  <tr>
    <td height="34" align="left">Company:</td>
    <td align="left" valign="middle"><select name="c_company_id" id="company_id" >
              <?php echo $_smarty_tpl->getVariable('company_list')->value;?>

    </select></td>
  </tr>
  <tr>
    <td height="34" align="left">Available for challenge:</td>
    <td align="left" valign="middle"><table width="36%" align="left" class="norow">
      <tr class="norow">
        <td width="16%"><input type="radio" name="c_av_challenge" <?php echo $_smarty_tpl->getVariable('c_av_challenge_1')->value;?>
 value="1" /></td>
        <td width="19%">Yes</td>
        <td width="14%" align="center">&nbsp;</td>
        <td width="14%"><input name="c_av_challenge" type="radio"  value="0" <?php echo $_smarty_tpl->getVariable('c_av_challenge_0')->value;?>
 /></td>
        <td width="37%">No</td>
      </tr>
    </table></td>
  </tr>
  <tr class="norow">
    <td  colspan="2" ><input type="button" value="  Submit  " name="B1"  class="mybutton" id="buttongray" onclick="chk_all()" /></td>
  </tr>
  <tr class="hnone">
    <td  colspan="2"></td>
  </tr>
</table>
<input type="hidden" name="act" id="act" value="<?php echo $_smarty_tpl->getVariable('act')->value;?>
">
<input type="hidden" name="c_id" id="c_id" value="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
">
</form>
</div>
