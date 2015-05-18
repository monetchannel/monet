{if $msg}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$msg}  
</div>  
{/if}

<form name="frm" id="frm" method="POST" action="user.php" onSubmit="return false;">
<div class="row margin-top">
				<div>
					 <img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
				</div>
				<div class="optn">										
					<div class="add">
						<a href="javascript:user.add('','Add User');">Add User <a href="javascript:user.add('','Add User');"><img class="" src="./images/addvideo.png" /></a></a> </div><div class="clear"></div>
						<a href="excel.php"> Import User from Excel File <a href="excel.php"><img class="" src="./images/csv.png" /></a></a> </div>
					
					<div class="srch">
						<strong>Search User by</strong> &nbsp;
						<select name="sex" id="sex">
							<option {$gender_}>sex</option>
							<option value="Male" {$gender_Male}>Male</option>
            				<option value="Female" {$gender_Female}>Female</option>
					    </select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						
						
						<select  name="strt_age" id="strt_age" class="styled-select" style="color:#777" onchange="control()">
            				{$age1}
            			</select> -to-
					{if $e_age==1}
 						<select  name="end_age" id="end_age" class="styled-select" style="color:#777" onchange="control()">
						{$age2}
            			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					{else}
						<select  name="end_age" id="end_age" class="styled-select" style="color:#777" onchange="control()" disabled>
							{$age2}
            			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
					{/if}
						
						
						<select  name="company_country" id="company_country" class="styled-select" style="color:#777" onchange="javascript:state_srch(this.value, '{$act}')">
            				{$country_name}
            			</select>
						<select  name="users_state" id="users_state" class="styled-select" style="color:#777">
            				{$state_name}
            			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												
				  		<input type="text" name="search" id="search" class="search-query" value="{$search}" >
							
                    	<button id="search" class="search-btn" onclick="return ser_by()" ></button>
						<button id="reset" onclick="return reset_srch()" >Reset</button>
                    	
						<div class="clear"></div>									
				  </div>
						<div class="clear"></div>									
				</div>
  </div>
  {if $tot_rows>0}          
            <div class="row">
				<div class="col-md-12">
					<table class="table table-bordered"> 
						<thead>
							<tr>
								<th><a href="javascript:void(1)" onclick="javascript:check('chk_user_id[]')" style="color:#FFF">Check All</a></th>
								<th><a href="javascript: set_order('user_fname','{$user_fname_order}')" style="color:#FFF">User Name</a></th>
								<th><a href="javascript: set_order('user_email','{$user_email_order}')" style="color:#FFF">Email Id</a></th>
								<th><a href="javascript: set_order('user_dob','{$user_dob_order}')" style="color:#FFF">Birth Year</a></th>
								<th><a href="javascript: set_order('user_gender','{$user_gender_order}')" style="color:#FFF">Gender</a></th>
                               	<th>Country</th>
                                <th>State</th>
                              <th>Action</th>
							</tr>
						</thead>
						<tbody>
{foreach $users as $user}
{strip}

							<tr>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align"><input type="checkbox" name="chk_user_id[]" id="checkbox" value="{$user.user_id}" /></td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2 text-align">{$user.user_fname} {$user.user_lname}</td>
								<td class="col-md-3 field-label">{$user.user_email}</td>
                                <td class="col-md-2 field-label">{$user.user_dob}</td>
								<td class="col-md-1 field-label">{$user.user_gender}</td>
                                <td class="col-md-1 field-label">{$user.user_country}</td>
                                <td class="col-md-1 field-label">{$user.user_states}</td>
                                <td class="col-md-2 field-label">
									<div class="col-md-2 text-align">
												<a href="javascript:user.edit('','Edit User','','','','','','','','{$user.user_id}')">
													<img class="" width="24"  height="24" src="./images/edit.png">
													<div>Edit</div>
												</a>	
											</div>
											
											<div class="col-md-3 text-align">
												<a href="javascript:user_del('{$user.user_id}')">
													<img class=""  width="24" height="24" src="./images/delete.png">
													<div>Delete</div>
												</a>
											</div>
								</td>
							</tr>
{/strip}
{/foreach}                            
						</tbody>
						<tr><td colspan="9"><button type="button" id="group_btn" style="display:block" class="btn btn-default" onclick="return open_group()" >Proceed to Create Group</button></td></tr>
					</table>
					
					<div id="group" style="display: none">
						<br><input type="text" class="form-control input-lg"  name="g_name" id="g_name" 
                   				data-msg-required="Please enter group name."
                   				data-rule-required="true" placeholder="Group Name" /></br>
								
						<br><textarea class="form-control input-lg" name="g_desc" id="g_desc" 
                    	  data-msg-required="Please enter some description for group."
                    	  data-msg-maxlength="The description cannot be greater than 1000 characters."
                     	  data-msg-minlength="Please enter atleast 10 characters for description"
                     	  data-rule-maxlength="1000" data-rule-minlength="10"
                     	  data-rule-required="true"
                     	  placeholder="Group Description" rows="6"></textarea></br>
					<button type="button" class="btn btn-default" onclick="javascript:create_group()" >Sumbit to Create Group</button>
					</div>
    				
					<table class="table">
    					<tr>
    						<td>
    							Show<select name="nrpp" id="nrpp" onchange="javascript:set_page(this.value)" style="width:50px;">
    								{$nrppOpt}
    							</select> records per page
    						</td>
    						<td>&nbsp;</td>
			
							<td class="text-right">
    							{$nb_text}
    						</td>
    					</tr>
					</table>
    							
				</div>
			</div>
           


{else}
           <br />
            <div class="text-center alert alert-info">Your current user list is empty. Please add user by clicking here. <a href="javascript:user.add('','Add User');" class="video-link"><strong>Add User</strong></a></div>
    {/if}
		
            
  	<input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
    <input type="hidden" name="order" id="order" value="{$order}">
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
	<input type="hidden" name="chk" id="chk" value="{$chk}">
	<input type="hidden" name="tot_rows" id="tot_rows" value="{$tot_rows}">
	<input type="hidden" name="curr_rows" id="curr_rows" value="{$curr_rows}">
</form>           
