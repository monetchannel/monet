<?php /* Smarty version Smarty-3.0.6, created on 2014-09-05 04:22:25
         compiled from "./templates/watch_slides.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159470837754099cf104d484-33838950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '452d969c52ed7775de3ebc1f50fdcded9621e791' => 
    array (
      0 => './templates/watch_slides.tpl',
      1 => 1409561216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159470837754099cf104d484-33838950',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
.boxy-content {
padding:0px;
}

</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td></td>
  </tr>
</table>

<script>
	var Onerotate_delay = 2000; // delay in milliseconds (5000 = 5 secs)
	Onecurrent = 0;
	function Onenext() {
		if (document.Oneslideform.Oneslide[Onecurrent+1]) {
			document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent+1].value;
			document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent+1].value).innerHTML;
			document.Oneslideform.Oneslide.selectedIndex = ++Onecurrent;
	   	}
		else Onefirst();
	}
	function Oneprevious() {
		if (Onecurrent-1 >= 0) {
			document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent-1].value;
			document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent-1].value).innerHTML;
			document.Oneslideform.Oneslide.selectedIndex = --Onecurrent;
		}
		else Onelast();
	}
	function Onefirst() {
		Onecurrent = 0;
		document.images.Oneshow.src = document.Oneslideform.Oneslide[0].value;
		document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[0].value).innerHTML;
		document.Oneslideform.Oneslide.selectedIndex = 0;
	}
	function Onelast() {
		Onecurrent = document.Oneslideform.Oneslide.length-1;
		document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent].value;
		document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent].value).innerHTML;
		document.Oneslideform.Oneslide.selectedIndex = Onecurrent;
	}
	function Oneap(text) {
		document.Oneslideform.Oneslidebutton.value = (text == "Stop") ? "Start" : "Stop";
		Onerotate();
	}
	function Onechange() {
		Onecurrent = document.Oneslideform.Oneslide.selectedIndex;
		document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent].value;
		document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent].value).innerHTML;
	}
	function Onerotate() {
		if (document.Oneslideform.Oneslidebutton.value == "Stop") {
			Onecurrent = (Onecurrent == document.Oneslideform.Oneslide.length-1) ? 0 : Onecurrent+1;
			document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent].value;
			document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent].value).innerHTML;
			document.Oneslideform.Oneslide.selectedIndex = Onecurrent;
			window.setTimeout("Onerotate()", Onerotate_delay);
		}
	}
</script>
  <TABLE border="0" cellspacing="0" cellpadding="0">
    <TR>
      <TD>
        <form name="Oneslideform" >
          <DIV align="center">
            <TABLE width="490" border="1" cellspacing="0" cellpadding="4" bordercolor="#3b9bc4">
              <TR>
                <TD bgcolor="#FFFFFF">
                  <DIV align="center"><IMG src="<?php echo $_smarty_tpl->getVariable('pic')->value[0][0];?>
" width="470" height="340" name="Oneshow" border="0"></DIV>
                </TD>
              </TR>
              <TABLE>
              <col width="160">
  			  <col width="160">
  			  <col width="160">
              <TR>
                <TD bgcolor="#3b9bc4">
                  <DIV align="center">
                    <SELECT name="Oneslide" onChange="Onechange();">
						<OPTION value="<?php echo $_smarty_tpl->getVariable('pic')->value[0][0];?>
" selected><?php echo $_smarty_tpl->getVariable('pic')->value[0][1];?>
</OPTION>
						<?php $_smarty_tpl->tpl_vars["pic_pl"] = new Smarty_variable($_smarty_tpl->getVariable('pic')->value[0][0], null, null);?>
						<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pic')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['f']->key;
?>
	                    	<?php if ($_smarty_tpl->tpl_vars['f']->value[0]!=$_smarty_tpl->getVariable('pic_pl')->value){?>
	                      		<OPTION value="<?php echo $_smarty_tpl->tpl_vars['f']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value[1];?>
</OPTION>
	                    	<?php }?>
						<?php }} ?>
                    </SELECT>
                  </DIV>
                  </TD>
                  <TD bgcolor="#3b9bc4">
                  <DIV align="center">
                    <INPUT type=button onClick="Oneprevious();" value="<<" title="Previous">
                    <INPUT type=button name="Oneslidebutton" onClick="Oneap(this.value);" value="Start" title="AutoPlay">
                    <INPUT type=button onClick="Onenext();" value=">>" title="Next">
                  </DIV>
                </TD>
                  <TD bgcolor="#3b9bc4">
                  <DIV align="center" id="emotion" bgcolor="#FFFFFF">
                  	<?php echo $_smarty_tpl->getVariable('pic')->value[0][2];?>

                  </DIV>
                  </TD>
                  <?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pic')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['f']->key;
?>
	                 <DIV id="<?php echo $_smarty_tpl->tpl_vars['f']->value[0];?>
" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['f']->value[2];?>
</DIV>
				  <?php }} ?>
                
              </TR>
              </TABLE>
            </TABLE>
          </DIV>
        </form>
      </TD>
    </TR>
  </TABLE>