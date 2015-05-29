{extends file="index.tpl"}
{block name=body}

<script>

function chk_all()
	{
		if(document.getElementById('company_name').value=="" || document.getElementById('company_email').value=="" || document.getElementById('company_contactno').value==""  || document.getElementById('company_address').value=="" || document.getElementById('company_country').value=="-1"|| document.getElementById('company_zipcode').value=="" || (document.getElementById('company_password').value=="" && document.getElementById('company_id').value=="") )//|| (document.getElementById('company_logo').value=="" && document.getElementById('company_logo_exist').value=='')
		{
			$('#error_msg').html('Please fill all mendetory fields to continue.');			$('.alert').show();
			//alert("Please fill all mendetory fields to continue.");
			return false;
		}
		else if(!chk_email(document.getElementById('company_email').value))
		{
			$('#error_msg').html('Please enter correct email id.');
			$('.alert').show();
			//alert("Please enter correct email id.");
			return false;
		}
		else
		{
			document.companyfrm.submit();
		}
	}
	
function chk_email(v)	
{
	f1=0;
	f2=0;
	for(j=0;j<v.length;j++)
	{
		if(v.charAt(j)=='@')
		{
			f1=j+1;
		}
		if(v.charAt(j)=='.')
		{
			f2=j+1;
		}
	}
	if(f1==0 || f2==0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

</script>

{if $msg}
<div class="alert alert-success margin-top">  
  <a class="close" data-dismiss="alert">×</a>  
  {$msg}  
</div>  
{/if}

<div class="alert alert-warning" style="display:none; margin-top:20px; padding-top:20px">  
  <a class="close" data-dismiss="alert">×</a>  
  <span id="error_msg"></span>  
</div>  

<div class="row  margin-top">
<div class="col-xs-3">
<img class="img-responsive" src="{$smarty.cookies.CompanyLogoSmall}" />
</div>
</div>                

<div class="wrapper">
<h2>&nbsp;&nbsp;Edit Account</h2>

<form method="POST" action="index.php" name="companyfrm" enctype="multipart/form-data" class="col-md-5" >

    <div class="form-group">
        <input type="text" class="form-control input-lg"  name="company_name" id="company_name" value="{$company_name}" placeholder="Name">
    </div>
    <div class="form-group">
        <input type="email" class="form-control input-lg" placeholder="Email" name="company_email" id="company_email" value="{$company_email}"  >
    </div>
    <div class="form-group">
        <input type="text" class="form-control input-lg" placeholder="Contact no" name="company_contactno" id="company_contactno" value="{$company_contactno}">
    </div>
    
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="company_password" id="company_password" value=""  placeholder="Password">
    </div>
    <div class="form-group">
        <select name="company_country" class="form-control input-lg" id="company_country">{$country_name}</select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control input-lg" placeholder="Address"name="company_address" id="company_address" value="{$company_address}" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control input-lg" placeholder="Zip Code" name="company_zipcode" id="company_zipcode" value="{$company_zipcode}" >
    </div>
    <div class="form-group">
       <input type="file" name="company_logo" id="company_logo" value="" />&nbsp;&nbsp;<a href="{$up_thumb_view_path}" target="_blank">{$file_name}</a>
    </div>
    {$up_thumb_view_path}
    {$file_name}
    <div class="form-group text-center">
    <input type="button" value="  Submit  " name="B1"  class="btn btn-default" id="buttongray" onclick="chk_all()" />
    </div>
    <input type="hidden" name="act" id="act" value="{$act}">
<input type="hidden" name="company_id" id="company_id" value="{$company_id}">
<input type="hidden" name="company_logo_exist" id="company_logo_exist" value="{$file_name}">

</form>

</div>
{/block}