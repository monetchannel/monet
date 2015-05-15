{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
//----------- For Popup----------------------------------
	function show_win_ser(data)
	{
		document.getElementById('inv_data').innerHTML=data;
	}
	function search_by_user()
	{
		var user_name = document.getElementById('inv_user_id').value;
		var orderby_p = document.getElementById('orderby_p').value;
		var order_p = document.getElementById('order_p').value;
		var st_pos_p = document.getElementById('st_pos_p').value;
		if(document.getElementById('inv_user_id').value!="-1")
			x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
		else
			alert("Please Select Option");
	}
	function order(orderby_p,order_p)
	{
		var user_name = document.getElementById('inv_user_id').value;
		var st_pos_p = document.getElementById('st_pos_p').value;
		x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
	}
	
	function pop_nb(st_pos_p)
	{
		var user_name = document.getElementById('inv_user_id').value;
		var orderby_p = document.getElementById('orderby_p').value;
		var order_p = document.getElementById('order_p').value;
		x_invites_view(user_name,orderby_p,order_p,st_pos_p,show_win_ser);
	}
//-------------------------------------------------------

	function show_win(data)
	{
		win=cn_window_open('INVITESs',data,true);
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

	function chk_val()
	{
		if(
			document.getElementById('user_fname').value=="" ||
			document.getElementById('user_lname').value=="" ||
			document.getElementById('user_gender').value=="" ||
			document.getElementById('mm').value=="" ||
			document.getElementById('dd').value=="" ||
			document.getElementById('yy').value=="" ||
			document.getElementById('user_email').value=="" ||
			document.getElementById('user_max_invites').value==""
		  )
		{
			jq_alert("Error ! empty user field.");
			return false;
		}
		else if( document.getElementById('act').value=="save" && (document.getElementById('user_password').value=="" ||
			document.getElementById('user_con_password').value==""))
		{
			jq_alert("Error ! empty user field.");
			return false;
		}
		
		else if(!chk_email(document.getElementById('user_email').value))
		{
			jq_alert("Please enter correct email id.");
			return false;
		}
		
		else if(document.getElementById('email_exist').value==1)
		{
			jq_alert("User email already exists, Please try again.");
			return false;
		}
		else if(document.getElementById('user_password').value!=document.getElementById('user_con_password').value)
		{
			jq_alert("Error ! Password and Confirm Password are not matched Please try again.");
			return false;
		}
		else
		{
			if(document.getElementById('act').value=="save")
			{
				
				user.save("",document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('mm').value,
							 document.getElementById('dd').value,
							 document.getElementById('yy').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_max_invites').value,
							 document.getElementById('user_password').value);
			}
			else
			{
				user.update("",document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('mm').value,
							 document.getElementById('dd').value,
							 document.getElementById('yy').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_max_invites').value,
							 document.getElementById('user_password').value,
							 document.getElementById('user_id').value);
			}
		}
	}
	
	function chk_email_exist()
	{
		x_chk_email_exist(document.getElementById('user_email').value,document.getElementById('user_id').value,chk_email_exist_responce)
	}
	
	function chk_email_exist_responce(js)
	{
		if(js)
		{
			jq_alert(js);
			document.getElementById('email_exist').value=1;
			return false;
		}
		else
			document.getElementById('email_exist').value=0;
	}
	
	function user_del(id)
	{
		user.del("","","","","","","","",id);
	}
	function set_order(f,o)
	{
		user.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");

	}
	{/literal}
	</script><div id="user_data"></div><script>
	user= new cn_ajax("user","user_data");
	user.view("","","","","","","","","","");
</script>
{/block}