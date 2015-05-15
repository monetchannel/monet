<?php /* Smarty version Smarty-3.0.6, created on 2014-09-01 01:34:32
         compiled from "./templates/view_feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183266946254042f986dbb42-35033312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4f4c7b519aea3bcb7bf0c053b428b42b177ea23' => 
    array (
      0 => './templates/view_feedback.tpl',
      1 => 1327671036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183266946254042f986dbb42-35033312',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="viewfeedback" style="max-height:500px; width:1000px; overflow:auto; vertical-align:top">
<form name="feedback_frm" method="POST" action="feedback.php" onsubmit="return false;">
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
	<tr bgcolor="#FFFFFF">
    	<td align="left" style="text-align:left; float:left; background-color:#FFFFFF" >
		<div id="tabs">
		<ul>
			<li id="rated"><a href="javascript: rate('rated')" style="text-decoration:none" class="tab">Rated</a></li>
			<li id="unrated"><a href="javascript: rate('unrated')" style="text-decoration:none" class="tab">Unrated</a></li>
		</ul>
		</div>
        </td>
    	<td align="right" bgcolor="#FFFFFF"><span  style="display:<?php echo $_smarty_tpl->getVariable('hdrow')->value;?>
" class="tabletext"><?php echo $_smarty_tpl->getVariable('HF1')->value;?>
<?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
<?php echo $_smarty_tpl->getVariable('HF2')->value;?>
</span></td>
    </tr>
	<tr>
	  <td colspan="2"><table width="100%" cellpadding="0" cellspacing="1" id="List2" >
      <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>
	    <tr>
	      <td height="31" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('user_fname','<?php echo $_smarty_tpl->getVariable('user_fname_order')->value;?>
')">User Name</a></td>
	      <td bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('c_title','<?php echo $_smarty_tpl->getVariable('c_title_order')->value;?>
')">Video Name</a></td>
	      <td bgcolor="#EEEEEE" class="tablehead">Comment</td>
	      <td bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('cf_date','<?php echo $_smarty_tpl->getVariable('cf_date_order')->value;?>
')">Date</a></td>
	      <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
" bgcolor="#EEEEEE" class="tablehead"><a href="javascript: order('ep_name','<?php echo $_smarty_tpl->getVariable('ep_name_order')->value;?>
')">Monet Profile</a></td>
	      <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
"  bgcolor="#EEEEEE" align="center" class="tablehead"><a href="javascript: order('cf_rating','<?php echo $_smarty_tpl->getVariable('cf_rating_order')->value;?>
')">Rating</a></td>
	      </tr>
	    <?php  $_smarty_tpl->tpl_vars['feedback'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('feedbacks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['feedback']->key => $_smarty_tpl->tpl_vars['feedback']->value){
?>
  <tr bgcolor="#ffffff">
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['user'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['feedback']->value['video'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['c_title'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_comment'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_date'];?>
</td>
    <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
" width="14%" height="16" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['feedback']->value['ep_name'];?>
</td>
    <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
"  width="8%" align="center" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_rating'];?>
</td>
  </tr>
  <?php }} ?>
  <?php }else{ ?>
  <tr bgcolor="#EEEEEE">
    <td height="30" colspan="6" align="center">Record Not Found</td>
  </tr>
  <?php }?>
	  </table></td>
    </tr>
	<tr bgcolor="#FFFFFF" class="tabletext" style="display:<?php echo $_smarty_tpl->getVariable('hdrow')->value;?>
">
      <td>Show <select name="nrpp" id="nrpp" onchange="javascript:page(this.value)" style="width:50px;"><?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>
</select> records per page</td>
	  <td style="float:right"><?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
</td>
    </tr>
</table>
    <input type="hidden" name="c_id" id="c_id" value="<?php echo $_smarty_tpl->getVariable('c_id')->value;?>
" />
    <input type="hidden" name="rate" id="rate" value="<?php echo $_smarty_tpl->getVariable('rate')->value;?>
" />
    <input type="hidden" name="type" id="type" value="<?php echo $_smarty_tpl->getVariable('rate')->value;?>
" />
    <input type="hidden" name="st_pos_p" id='st_pos_p' value="<?php echo $_smarty_tpl->getVariable('st_pos_p')->value;?>
" />
    <input type="hidden" name="nrpp_p" id='nrpp_p' value="<?php echo $_smarty_tpl->getVariable('nrpp_p')->value;?>
" />
    <input type="hidden" name="order_p" id="order_p" value="<?php echo $_smarty_tpl->getVariable('order_p')->value;?>
" />
    <input type="hidden" name="orderby_p" id="orderby_p" value="<?php echo $_smarty_tpl->getVariable('orderby_p')->value;?>
" />
</form>
</div>