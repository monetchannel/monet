{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
	
	function refresh_page(msg)
	{
		win.hide();
		company_invitation.view("",msg,'','',document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	
	function set_content(data)
	{
		jq_alert(data);
		return false;
	}
	
	function chk_all()
	{
		if(document.getElementById('company_name').value=="" || document.getElementById('company_email').value=="" || document.getElementById('company_contactno').value==""  || document.getElementById('company_address').value=="" || document.getElementById('company_country').value=="-1"|| document.getElementById('company_zipcode').value=="" )//|| (document.getElementById('company_password').value=="" && document.getElementById('company_id').value=="") || (document.getElementById('company_logo').value=="" && document.getElementById('company_logo_exist').value=='')
		{
			jq_alert("Please fill all mandatory fields to continue.");
			return false;
		}
		else if(!chk_email(document.getElementById('company_email').value))
		{
			jq_alert("Please enter correct email id.");
			return false;
		}
		else
		{
			document.companyfrm.target="submitframe";
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

	
	
	function show_company_inv(msg)
	{
		company_invitation.view("",msg,'','',document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	
	function company_invitation_del(id)
	{
		company_invitation.del("","","","","","","","",id);
	}
	function set_order(f,o)
	{
		company_invitation.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		company_invitation.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		company_invitation.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");

	}

	{/literal}
	</script><div id="company_invitation_data"></div><script>
	company_invitation= new cn_ajax("company_invitation","company_invitation_data");
	company_invitation.view("","","","","","","","","");
	company= new cn_ajax("company","company_data");
</script>
{/block}