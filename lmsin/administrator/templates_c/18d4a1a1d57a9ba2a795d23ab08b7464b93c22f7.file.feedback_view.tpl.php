<?php /* Smarty version Smarty-3.0.6, created on 2014-09-01 01:36:21
         compiled from "./templates/feedback_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1838028468540430056fb2b8-12436060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18d4a1a1d57a9ba2a795d23ab08b7464b93c22f7' => 
    array (
      0 => './templates/feedback_view.tpl',
      1 => 1401948449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1838028468540430056fb2b8-12436060',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form name="feedback_frm" method="POST" action="feedback.php" onSubmit="return false;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
    <tr bgcolor="#ffffff">
      <td colspan="2"><table width="100%"  border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td width="200">User:
            <select name="v_user" id="v_user" style="width:150px;">
            <?php echo $_smarty_tpl->getVariable('v_user')->value;?>

            </select></td>
          <td width="300">Emotion:
            <select name="se_emo[]" id="se_emo" multiple="multiple">
            <?php echo $_smarty_tpl->getVariable('ep')->value;?>

            </select></td>
          <td>Rating:
            <select name="se_re1[]" id="se_re1"  multiple="multiple">
              <option value="1" <?php echo $_smarty_tpl->getVariable('re1_1')->value;?>
>1</option>
              <option value="2" <?php echo $_smarty_tpl->getVariable('re1_2')->value;?>
>2</option>
              <option value="3" <?php echo $_smarty_tpl->getVariable('re1_3')->value;?>
>3</option>
              <option value="4" <?php echo $_smarty_tpl->getVariable('re1_4')->value;?>
>4</option>
              <option value="5" <?php echo $_smarty_tpl->getVariable('re1_5')->value;?>
>5</option>
            </select></td>
          </tr>
      </table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td colspan="2" style="padding-bottom:20px;"><table width="100%"  border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td width="250">Video: <select name="v_title" id="v_title" style="width:200px;"><?php echo $_smarty_tpl->getVariable('v_title')->value;?>
</select></td>
          <td width="200">Date From: <input name="date_from" type="text" id="date_from" size="10" value="<?php echo $_smarty_tpl->getVariable('date_from')->value;?>
" /> <a href="Javascript:showCal('Calendar2')"><img src="images/cal.gif" border="0" /></a></td>
          <td width="150">To: <input name="date_to" type="text" id="date_to" size="10" value="<?php echo $_smarty_tpl->getVariable('date_to')->value;?>
" /> <a href="Javascript:showCal('Calendar3')" ><img src="images/cal.gif" border="0" /></a></td>
          <td><input type="button" name="search" value="  GO  " onclick="ser_by();" id="buttongray" /></td>
        </tr>
      </table></td>
    </tr>
    <tr bgcolor="#ffffff">
          <td>
        <div id="tab">
            <div class="tab_container">
                 <ul class="tabs">
                    <li class="" id="rated"><a href="javascript: set_rate('rated')" style="text-decoration:none" class="tab">Rated</a></li>
                    <li class="" id="unrated" ><a href="javascript: set_rate('unrated')" style="text-decoration:none" class="tab">Unrated</a></li> 
                </ul>
            </div>
        </div>
          </td>
            <td align="right"><span style="display:<?php echo $_smarty_tpl->getVariable('hdrow')->value;?>
; padding-bottom:10px;"><a href="javascript:report_export()">Export</a>&nbsp;<?php echo $_smarty_tpl->getVariable('HF1')->value;?>
<?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
<?php echo $_smarty_tpl->getVariable('HF2')->value;?>
</span></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" cellpadding="0" cellspacing="1" style="clear:both">
   <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>
   <tr bgcolor="#EEEEEE" class="tablehead">
    <td height="30" width="200"><a href="javascript: set_order('user_fname','<?php echo $_smarty_tpl->getVariable('user_fname_order')->value;?>
')">User Name</a></td>
    <td width="320"><a href="javascript: set_order('c_title','<?php echo $_smarty_tpl->getVariable('c_title_order')->value;?>
')">Video Name</a></td>
    <td width="300">Comment</td>
    <td width="120"><a href="javascript: set_order('cf_date','<?php echo $_smarty_tpl->getVariable('cf_date_order')->value;?>
')">Date</a></td>
    <td width="120" style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
"><a href="javascript: set_order('ep_name','<?php echo $_smarty_tpl->getVariable('ep_name_order')->value;?>
')">Monet Profile</a></td>
    <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
"><a href="javascript: set_order('cf_rating','<?php echo $_smarty_tpl->getVariable('cf_rating_order')->value;?>
')">Rating</a></td>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['feedback'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('feedbacks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['feedback']->key => $_smarty_tpl->tpl_vars['feedback']->value){
?>
  <tr bgcolor="#ffffff">
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['user'];?>
<div style="float:right"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['video'];?>
</div><div style="float:left"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['slides'];?>
</div></td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['c_title'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_comment'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_date'];?>
</td>
    <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
" class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['ep_name'];?>
</td>
    <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
" class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_rating'];?>
</td>
  </tr>
  <?php }} ?>
  <?php }else{ ?>
  <tr bgcolor="#EEEEEE" class="tablehead">
    <td align="center" colspan="6" height="30">Record Not Found</td>
  </tr>
  <?php }?>
</table></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td width="100%" colspan="2"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:<?php echo $_smarty_tpl->getVariable('none')->value;?>
">
        <tr style="display:<?php echo $_smarty_tpl->getVariable('hdrow')->value;?>
">
          <td class="tabletext" width="250">Show <select name="nrpp2" id="nrpp2" onchange="javascript:set_page(this.value)" style="width:50px;"><?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>
</select> records per page </td>
          <td align="right"><span class="tabletext"><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
</span></td>
        </tr>
      </table></td>
    </tr>
  </table>
    <input type="hidden" name="rate" id="rate" value="<?php echo $_smarty_tpl->getVariable('rate')->value;?>
" />	
    <input type="hidden" name="type" id="type" value="" />	
    <input type="hidden" name="act" id="act" value="" />
    <input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
    <input type="hidden" name="ser_key" id='ser_key' value="<?php echo $_smarty_tpl->getVariable('ser_key')->value;?>
">
    <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
    <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
    <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
</form>
