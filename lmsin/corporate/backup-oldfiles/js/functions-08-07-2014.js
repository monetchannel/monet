// JavaScript Document
// Clsoe the popup windows "cn_boxy"

if( jQuery('.cn_boxy-wrapper').length==1)
	$('.cn_boxy-wrapper').remove();



function chk_singup()
{
	if(this.document.signup_form.user_fname.value=="First Name" || this.document.signup_form.user_lname.value=="Last Name" || this.document.signup_form.user_email.value=="Email" || this.document.signup_form.user_country.value=="-1"  || this.document.signup_form.user_zipcode.value=="Zipcode" )
	{
		alert("Please enter all fields !");
		return false;
	}
	var x=document.forms["signup_form"]["user_email"].value
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	  {
		  alert("Not a valid e-mail address");
		  return false;
	  }
	  else
	  {
		  this.document.signup_form.submit();
	  }
}


function chk()
{
	if(this.document.signup_form.company_name.value=="Company Name" || this.document.signup_form.company_email.value=="Company Email" || this.document.signup_form.company_address.value=="Company Address" || this.document.signup_form.company_country.value=="-1"  || this.document.signup_form.company_zipcode.value=="Zipcode" )
	{
		alert("Please enter all fields !");
		return false;
	}
	var x=document.forms["signup_form"]["company_email"].value
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	  {
		  alert("Not a valid e-mail address");
		  return false;
	  }
	  else
	  {
		  this.document.signup_form.submit();
	  }
}
function check()
  {
	if(document.edit_account.user_fname.value=="" || document.edit_account.user_lname.value=="" || document.edit_account.user_email.value=='' || document.edit_account.user_country.value=="-1" || document.edit_account.user_gender.value=="-1" || this.document.edit_account.user_zipcode.value=="")
	{
		alert('Please fill all the * fields to continue.');
		return false;
	}
	var x=document.forms["edit_account"]["user_email"].value
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
	  alert("Not a valid e-mail address");
	  return false;
	}
	 // else
	//  {
	//	  this.document.edit_account.submit();
	//  }
 }
 
function change_type(type)
{
	if(type=="password:")
	{
		document.getElementById('company_text').style.display='none';
		document.getElementById('company_password').style.display='';
		document.getElementById('company_password').focus();
	}
	else
	{
		if(document.getElementById('company_password').value=='')
		{
			document.getElementById('company_text').style.display='';
			document.getElementById('company_password').style.display='none';
		}
	}
}

function change_brand_type(type)
{
	if(type=="password:")
	{
		document.getElementById('user_text').style.display='none';
		document.getElementById('user_password').style.display='';
		document.getElementById('user_password').focus();
	}
	else
	{
		if(document.getElementById('user_password').value=='')
		{
			document.getElementById('user_text').style.display='';
			document.getElementById('user_password').style.display='none';
		}
	}
}


function change_pass_type(type)
{
	if(type=="Company Password")
	{
		document.getElementById('company_reg_text').style.display='none';
		document.getElementById('company_reg_password').style.display='';
		document.getElementById('company_reg_password').focus();
	}
	else
	{
		if(document.getElementById('company_reg_password').value=='')
		{
			document.getElementById('company_reg_text').style.display='';
			document.getElementById('company_reg_password').style.display='none';
		}
	}
}

function inputFocus(i)
{
	if(i.value==i.defaultValue)
	{ i.value=""; i.style.color="#000"; }
}
function inputBlur(i)
{
    if(i.value=="")
	{ i.value=i.defaultValue; i.style.color="#888"; }
}

function set_msg(msg)
{
	//document.getElementById('msg').innerHTML=msg;
	win=cn_window_open("","<div id='msg' style='width:300px; height:100px'>"+msg+"<div>");
	setTimeout(function (){
		win.hide();
	},2000);
	//jq_alert(msg);
	setTimeout("return_msg()",2000);
	
}
function return_msg(msg,log_success)
{
	if(log_success==false)
		jq_alert(msg)
	else
		window.location.href='video.php';
		//window.location.href='index.php?act=dashboard';

}


function return_brand_msg(msg,log_success,accept_toc,uf_id)
{
	if(uf_id)
		var query_string='&uf_id='+uf_id;
	else
		var query_string="";	
	
	if(log_success==false)
		jq_alert(msg)
	else if(accept_toc==1)
	{
		window.location.href=SERVER_PATH+'monet_channel.php?view=unrated'+query_string;
	}
	else
		window.location.href=SERVER_PATH+'index.php?act=view_toc'+query_string;
	//cn_window_open('msg','',msg);
}


function chk_login()
{
	if(document.login_frm.company_email.value=='Username:' || document.login_frm.company_password.value=='Password:' || document.login_frm.company_email.value=='' || document.login_frm.company_password.value=='')
	{
		alert('Please enter email and password to continue.');
		return false;
	}
}

function chk_brand_login()
{
	if(document.login_frm.user_email.value=='Username:' || document.login_frm.user_password.value=='Password:' || document.login_frm.user_email.value=='' || document.login_frm.user_password.value=='')
	{
		alert('Please enter email and password to continue.');
		return false;
	}
}
