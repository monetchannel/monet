<?php /* Smarty version Smarty-3.0.6, created on 2014-12-15 10:24:39
         compiled from ".\templates\user_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6694548ea8d7497393-50210099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9099cc7a4018e0a8052567abba00a0d2e1b05d8' => 
    array (
      0 => '.\\templates\\user_view.tpl',
      1 => 1418635475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6694548ea8d7497393-50210099',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('msg')->value){?>
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  <?php echo $_smarty_tpl->getVariable('msg')->value;?>
  
</div>  
<?php }?>

<form name="frm" method="POST" action="user.php" onSubmit="return false;">
<div class="row margin-top">
				<div>
					 <img class="img-responsive" src="<?php echo $_COOKIE['CompanyLogoSmall'];?>
" />
				</div>
				<div class="optn">										
					<div class="add">
						<a href="javascript:user.add('','Add User');">Add User<a href="javascript:user.add('','Add User');"><img class="" src="./images/addvideo.png" /></a></a> </div>
					
					<div class="srch">
						<strong>Search User by</strong> &nbsp;
						<select name="sex" id="sex">
							<option <?php echo $_smarty_tpl->getVariable('gender_')->value;?>
>sex</option>
							<option value="Male" <?php echo $_smarty_tpl->getVariable('gender_Male')->value;?>
>Male</option>
            				<option value="Female" <?php echo $_smarty_tpl->getVariable('gender_Female')->value;?>
>Female</option>
					    </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						
						
						<select  name="strt_age" id="strt_age" class="styled-select" style="color:#777" onchange="control()">
            				<?php echo $_smarty_tpl->getVariable('age1')->value;?>

            			</select> -to-
						<select  name="end_age" id="end_age" class="styled-select" style="color:#777" onchange="control()" disabled>
            				<?php echo $_smarty_tpl->getVariable('age2')->value;?>

            			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						
						
						<select  name="company_country" id="company_country" class="styled-select" style="color:#777">
            				<?php echo $_smarty_tpl->getVariable('country_name')->value;?>

            			</select>
												
				  		<input type="text" name="search" id="search" class="search-query" value="<?php echo $_smarty_tpl->getVariable('search')->value;?>
" >
							
                    	<button id="search" class="search-btn" onclick="return ser_by()" ></button>
						<button id="reset" onclick="return reset_srch()" >Reset</button>
                    	
						<div class="clear"></div>									
				  </div>
						<div class="clear"></div>									
				</div>
  </div>
  <?php if ($_smarty_tpl->getVariable('tot_rows')->value>0){?>          
            <div class="row">
				<div class="col-md-12">
					<table class="table table-bordered"> 
						<thead>
							<tr>
								<th><a href="javascript: set_order('user_fname','<?php echo $_smarty_tpl->getVariable('user_fname_order')->value;?>
')" style="color:#FFF">User Name</a></th>
								<th><a href="javascript: set_order('user_email','<?php echo $_smarty_tpl->getVariable('user_email_order')->value;?>
')" style="color:#FFF">Email Id</a></th>
								<th><a href="javascript: set_order('user_dob','<?php echo $_smarty_tpl->getVariable('user_dob_order')->value;?>
')" style="color:#FFF">Birth Year</a></th>
								<th><a href="javascript: set_order('user_gender','<?php echo $_smarty_tpl->getVariable('user_gender_order')->value;?>
')" style="color:#FFF">Gender</a></th>
                               	<th>Rated Videos</th>
                                <th>Approved Videos</th>
                                <th>Responded Challenges</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('users')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
?>
<tr><td class="field-label col-xs-4 col-sm-4 col-md-2 text-align"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['user_lname'];?>
</td><td class="col-md-3 field-label"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>
</td><td class="col-md-2 field-label"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_dob'];?>
</td><td class="col-md-1 field-label"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_gender'];?>
</td><td class="col-md-1 field-label"><?php echo $_smarty_tpl->tpl_vars['user']->value['rated'];?>
</td><td class="col-md-1 field-label"><?php echo $_smarty_tpl->tpl_vars['user']->value['suggested'];?>
</td><td class="col-md-1 field-label"><?php echo $_smarty_tpl->tpl_vars['user']->value['challenge'];?>
</td><td class="col-md-2 field-label"><div class="col-md-2 text-align"><a href="javascript:user.edit('','Edit User','','','','','','','','<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
')"><img class="" width="24"  height="24" src="./images/edit.png"><div>Edit</div></a></div><div class="col-md-3 text-align"><a href="javascript:user_del('<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
')"><img class=""  width="24" height="24" src="./images/delete.png"><div>Delete</div></a></div></td></tr>
<?php }} ?>                            
						</tbody>
					</table>
    				
					<table class="table">
    					<tr>
    						<td>
    							Show<select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
    								<?php echo $_smarty_tpl->getVariable('nrppOpt')->value;?>

    							</select> records per page
    						</td>
    						<td>&nbsp;</td>
			
							<td class="text-right">
    							<?php echo $_smarty_tpl->getVariable('nb_text')->value;?>

    						</td>
    					</tr>
    				</table>
				
				</div>
			</div>
           


<?php }else{ ?>
           <br />
            <div class="text-center alert alert-info">Your current user list is empty. Please add user by clicking here. <a href="javascript:user.add('','Add User');" class="video-link"><strong>Add User</strong></a></div>
    <?php }?>
            
  	<input type="hidden" name="st_pos" id='st_pos' value="<?php echo $_smarty_tpl->getVariable('st_pos')->value;?>
">
    <input type="hidden" name="nrpp" id='nrpp' value="<?php echo $_smarty_tpl->getVariable('nrpp')->value;?>
">
    <input type="hidden" name="order" id="order" value="<?php echo $_smarty_tpl->getVariable('order')->value;?>
">
    <input type="hidden" name="orderby" id="orderby" value="<?php echo $_smarty_tpl->getVariable('orderby')->value;?>
">
	<input type="hidden" name="chk" id="chk" value="<?php echo $_smarty_tpl->getVariable('chk')->value;?>
">
</form>           
