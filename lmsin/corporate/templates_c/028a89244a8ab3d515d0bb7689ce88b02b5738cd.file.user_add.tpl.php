<?php /* Smarty version Smarty-3.0.6, created on 2014-12-11 12:20:45
         compiled from ".\templates\user_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2336554897e0dd0d2c5-72083828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '028a89244a8ab3d515d0bb7689ce88b02b5738cd' => 
    array (
      0 => '.\\templates\\user_add.tpl',
      1 => 1418296553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2336554897e0dd0d2c5-72083828',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="alert alert-warning" style="display:none">  
<a class="close" data-dismiss="alert">×</a>
<span id='alert-msg'></span>
</div>  


<form name="frm" action="user.php" method="post" onsubmit="return false"  class="form-horizontal" role="form">

    <div class="form-group">
        <label for="Name" class="col-sm-4 control-label">First Name:</label>
            <div class="col-sm-7">
            	<input type="text" name="user_fname" id="user_fname" value="<?php echo $_smarty_tpl->getVariable('user_fname')->value;?>
" class="form-control" />
            </div>
    </div>
    
    <div class="form-group">
        <label for="LName" class="col-sm-4 control-label">Last Name:</label>
            <div class="col-sm-7">
            	<input type="text" name="user_lname" id="user_lname" value="<?php echo $_smarty_tpl->getVariable('user_lname')->value;?>
"  class="form-control" />
            </div>
    </div>
    
    <div class="form-group">
        <label for="Gender" class="col-sm-4 control-label">Gender:</label>
            <div class="col-sm-7">
            	<select name="user_gender" id="user_gender" class="form-control">
            		<option value="-1">Please Select</option>
            		<option value="Male" <?php echo $_smarty_tpl->getVariable('gender_Male')->value;?>
>Male</option>
            		<option value="Female" <?php echo $_smarty_tpl->getVariable('gender_Female')->value;?>
>Female</option>
            	</select>
            </div>
    </div>
    
    <div class="form-group">
        <label for="Age" class="col-sm-4 control-label">Your Age:</label>
            <div class="col-sm-7">
            	<input type="text" name="user_lname" id="age" value="<?php echo $_smarty_tpl->getVariable('age')->value;?>
"  class="form-control" placeholder=" in years"/>
            </div>
    </div>
	
	<div class="form-group">
        <label for="Country" class="col-sm-4 control-label">Country</label>
            <div class="col-sm-7">
            	<select  name="user_country" id="user_country" class="form-control">
            				<?php echo $_smarty_tpl->getVariable('country_name')->value;?>

            	</select>
            </div>
    </div>
	
    <div class="form-group">
        <label for="Email" class="col-sm-4 control-label">Email Id:</label>
            <div class="col-sm-7">
            	<input type="email" name="user_email" id="user_email" value="<?php echo $_smarty_tpl->getVariable('user_email')->value;?>
"  class="form-control" onblur="javascript:x_chk_email_exist(this.value,'<?php echo $_smarty_tpl->getVariable('user_id')->value;?>
',chk_email_exist_responce)" />
            </div>
    </div>
    
    <div class="form-group">
        <label for="Password" class="col-sm-4 control-label">Password:</label>
            <div class="col-sm-7">
            	<input type="password" name="user_password" id="user_password" value=""  class="form-control" />
            </div>
    </div>
    
      <div class="form-group">
        <label for="Conferm" class="col-sm-4 control-label">Confirm Password</label>
            <div class="col-sm-7">
            	<input type="password" name="user_con_password" id="user_con_password" value=""  class="form-control" />
            </div>
    </div>

    <div class="form-group ">
        <div class="col-sm-offset-4 col-sm-7 " >
        <input type="submit" name="Save" value=" <?php echo $_smarty_tpl->getVariable('btn_name')->value;?>
 "  onclick="return chk_val()" id="buttongray"  class="btn btn-default" />
        	
        </div>
    </div>

 <input type="hidden" name="act" id="act" value="<?php echo $_smarty_tpl->getVariable('act')->value;?>
">
    <input type="hidden" name="email_exist" id="email_exist" value="">
  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_smarty_tpl->getVariable('user_id')->value;?>
">

</form>
