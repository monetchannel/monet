<?php /* Smarty version Smarty-3.0.6, created on 2015-02-09 03:39:43
         compiled from "./templates/view_feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84059319954d88e6f4ff543-45855212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4f4c7b519aea3bcb7bf0c053b428b42b177ea23' => 
    array (
      0 => './templates/view_feedback.tpl',
      1 => 1423147929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84059319954d88e6f4ff543-45855212',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="viewfeedback" >
<ul class="nav nav-tabs"  id="tabs">
  <li class="tab" id="rated"><a href="javascript:rate('rated')" >Rated</a></li>
  <li id="unrated" class="tab"><a href="javascript:rate('unrated')">Unrated</a></li>
</ul>

<form name="feedback_frm" method="POST" action="feedback.php" onsubmit="return false;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="new_table" >
	<tr >
    	<td align="left" style="text-align:left; float:left; background-color:#FFFFFF" nowrap="nowrap" >
        </td>
    	<td align="right" bgcolor="#FFFFFF"><span  style="display:<?php if (!$_smarty_tpl->getVariable('tot_rows')->value){?> none <?php }?>" class="tabletext"><?php echo $_smarty_tpl->getVariable('HF1')->value;?>
<?php echo $_smarty_tpl->getVariable('nb_text')->value;?>
<?php echo $_smarty_tpl->getVariable('HF2')->value;?>
</span></td>
    </tr>
	<tr>
	  <td colspan="2">
      
      <table width="100%" cellpadding="0" cellspacing="0" class="table table-bordered" >
      <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>
      <thead>
	    <tr>
        <th>Action</th>
	      <th><a href="javascript: order('user_fname','<?php echo $_smarty_tpl->getVariable('user_fname_order')->value;?>
')" style="color:#FFF">User Name</a></th>
	      <th>Comment</th>
	      <th><a href="javascript: order('cf_date','<?php echo $_smarty_tpl->getVariable('cf_date_order')->value;?>
')" style="color:#FFF">Date</a></th>
	      <th width="125" style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
"><a href="javascript: order('ep_name','<?php echo $_smarty_tpl->getVariable('ep_name_order')->value;?>
')" style="color:#FFF">Monet Profile</a></th>
	      <th width="50" style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
;color:#FFF"><a href="javascript: order('cf_rating','<?php echo $_smarty_tpl->getVariable('cf_rating_order')->value;?>
')" style="color:#FFF">Rating</a></th>
	      </tr>
          </thead>
          <tbody>
	    <?php  $_smarty_tpl->tpl_vars['feedback'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('feedbacks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['feedback']->key => $_smarty_tpl->tpl_vars['feedback']->value){
?>
  <tr bgcolor="#ffffff">
  
    <td class="tabletext"><div style="float:right"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['video'];?>
</div><div style="float:left"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['slides'];?>
</div></td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['user'];?>
</td>
    <td class="tabletext">&nbsp;<?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_comment'];?>
</td>
    <td class="tabletext"><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_date'];?>
</td>
    <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
" height="16" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['feedback']->value['ep_name'];?>
</td>
    <td style="display:<?php echo $_smarty_tpl->getVariable('unrated_hide')->value;?>
" align="center" class="tabletext" ><?php echo $_smarty_tpl->tpl_vars['feedback']->value['cf_rating'];?>
</td>
  </tr>
  <?php }} ?>
   </tbody>
  <?php }else{ ?>
  <tr bgcolor="#EEEEEE">
    <td width="800" height="30" colspan="5" align="center"><strong>Your current feedback list is empty</strong></td>
  </tr>
  <?php }?>
	  </table>
      
      </td>
    </tr>
	<tr bgcolor="#FFFFFF" class="tabletext" style="display:<?php if (!$_smarty_tpl->getVariable('tot_rows')->value){?> none <?php }?>;">
      <td style="padding-top:10px;">Show <select name="nrpp" id="nrpp" onchange="javascript:page(this.value)" style="width:50px;"><?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>
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