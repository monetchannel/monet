<div class="alert alert-warning" style="display:none">  
<a class="close" data-dismiss="alert">×</a>
<span id='alert-msg'></span>
</div>  


<form name="frm" action="user.php" method="post" onsubmit="return false"  class="form-horizontal" role="form">

    <div class="form-group">
        <label for="Name" class="col-sm-4 control-label">First Name:</label>
            <div class="col-sm-7">
            	<input type="text" name="user_fname" id="user_fname" value="{$user_fname}" class="form-control" />
            </div>
    </div>
    
    <div class="form-group">
        <label for="LName" class="col-sm-4 control-label">Last Name:</label>
            <div class="col-sm-7">
            	<input type="text" name="user_lname" id="user_lname" value="{$user_lname}"  class="form-control" />
            </div>
    </div>
    
    <div class="form-group">
        <label for="Gender" class="col-sm-4 control-label">Gender:</label>
            <div class="col-sm-7">
            	<select name="user_gender" id="user_gender" class="form-control">
            		<option value="-1">Please Select</option>
            		<option value="Male" {$gender_Male}>Male</option>
            		<option value="Female" {$gender_Female}>Female</option>
            	</select>
            </div>
    </div>
    
    <div class="form-group">
        <label for="Age" class="col-sm-4 control-label">Your Age:</label>
            <div class="col-sm-7">
            	<input type="text" name="user_lname" id="age" value="{$age}"  class="form-control" placeholder=" in years"/>
            </div>
    </div>
	
	<div class="form-group">
        <label for="Country" class="col-sm-4 control-label">Country</label>
            <div class="col-sm-7">
            	<select  name="user_country" id="user_country" class="form-control" onchange="javascript:state_srch(this.value, '{$act}')">
            				{$country_name}
            	</select>
            </div>
    </div>
                <div class="form-group">
		<label for="State" class="col-sm-4 control-label">State</label>
            <div class="col-sm-7">
            	<select  name="user_state" id="user_state" class="styled-select" style="color:#777">
            				
            	</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
    </div>
                
    <div class="form-group">
        <label for="zipcode" class="col-sm-4 control-label">Zip Code:</label>
            <div class="col-sm-7">
             <input type="text" name="user_zipcode" id="user_zipcode" value="{$user_zipcode}" class="form-control" />
            </div>
    </div>
	
    <div class="form-group">
        <label for="Email" class="col-sm-4 control-label">Email Id:</label>
            <div class="col-sm-7">
            	<input type="email" name="user_email" id="user_email" value="{$user_email}"  class="form-control" onblur="javascript:x_chk_email_exist(this.value,'{$user_id}',chk_email_exist_responce)" />
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
        <input type="submit" name="Save" value=" {$btn_name} "  onclick="return chk_val()" id="buttongray"  class="btn btn-default" />
        	
        </div>
    </div>

 <input type="hidden" name="act" id="act" value="{$act}">
    <input type="hidden" name="email_exist" id="email_exist" value="">
  <input type="hidden" name="user_id" id="user_id" value="{$user_id}">

</form>
