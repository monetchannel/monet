{extends file="index.tpl"}
{block name=body}
<script>
{$js}



function get_video_link()
{
	var checkBoxes=document.getElementsByName('chk_user_id[]');
	
	var booleanResult=false;
	for(var i=0;i<checkBoxes.length;i++){
		if(checkBoxes[i].checked){
			booleanResult=true;
			break;
		}
	}
	if(booleanResult==false)
	{
		alert("Please select at least one.")
		return false;
	}
	
	jQuery.ajax({
		type: "POST",
		url:"user.php?act=get_video_link",
		data: $('#frm').serialize(),
		success: function(js){
			win=cn_window_open('',js,1);
		},
			error: function(){
			alert("Please try again. Server have not sent response.");
		}
	});
	return false;
}
	
function send_video_link(Name)
{
	jQuery.ajax({
		type: "POST",
		url:"user.php?act=send_video_link",
		data: $('#user_frm').serialize(),
		success: function(js){
			if(js!=1){
				$('#myModal').modal('hide')
				alert(js)	
				return false;
			}
		},
			error: function(){
			alert("Please try again. Server have not sent response.");
		}
	});
	return false;
}
	
var checkflag = "false";
function check(field)
{
 field=document.getElementsByName(field);
  if (checkflag == "false")
  {
    for (i = 0; i < field.length; i++)
	{
      field[i].checked = true;
    }
    checkflag = "true";
  }
  else {
    for (i = 0; i < field.length; i++) {
      field[i].checked = false;
    }
    checkflag = "false";
  }
}
	
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
			document.getElementById('age').value=="" ||
			document.getElementById('user_country').value=="" ||
			document.getElementById('user_state').value=="" ||
			document.getElementById('user_email').value==""
		  )
		{
			alert("Please fill all * fields to continue.");
			return false;
		}
		else if( document.getElementById('act').value=="user_save" && (document.getElementById('user_password').value=="" ||
			document.getElementById('user_con_password').value==""))
		{
			alert("Please fill all * fields to continue.");
			return false;
		}
		
		else if(!chk_email(document.getElementById('user_email').value))
		{
			alert("Please enter a valid email address to continue.");
			return false;
		}
		
		else if(document.getElementById('email_exist').value==1)
		{
			alert("The email address you entered already exists in our system. Please enter another email address to continue.");
			return false;
		}
		else if(document.getElementById('user_password').value!=document.getElementById('user_con_password').value)
		{
			alert("Password and Confirm Password are not matched Please try again.");
			return false;
		}
		else
		{
			if(document.getElementById('act').value=="user_save")
			{
				
				user.save('',document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('age').value,
							 document.getElementById('user_state').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_password').value);
                            alert("User Added Succesfully");
                            /*jQuery.ajax({
                            type: "POST",
                            url:"user.php?act=user_save",
                            data: $('#frm').serialize(),
                                success: function(js){
                                        //win=cn_window_open('',"User Added Successfully","",2);
                                        user.view("","User Added Successfully","map_company_user_id","DESC","","",1,"","","","","","");
                                },
                                        error: function(){
                                        alert("Please try again. Server have not sent response.");
                                }
                            });*/
                        }
			else
			{
				user.update('',document.getElementById('user_fname').value,
							 document.getElementById('user_lname').value,
							 document.getElementById('user_gender').value,
							 document.getElementById('age').value,
							 document.getElementById('user_country').value,
                                                         document.getElementById('user_state').value,
							 document.getElementById('user_email').value,
							 document.getElementById('user_password').value,
							 document.getElementById('user_id').value);
			alert("Data Updated Succesfully");
                                
                            /*jQuery.ajax({
                            type: "POST",
                            url:"user.php?act=user_update",
                            data: $('#frm').serialize(),
                                success: function(js){
                                        //win=cn_window_open('',"User Updated Successfully","",2);
                                        user.view("","User Updated Successfully","map_company_user_id","DESC","","",1,"","","","","","");
                                },
                                        error: function(){
                                        alert("Please try again. Server have not sent response.");
                                }
                            });*/
                        }
		}
	}
	
	function close_popup()
	{
	}
	
	function chk_email_exist()
	{
		x_chk_email_exist(document.getElementById('user_email').value,document.getElementById('user_id').value,chk_email_exist_responce);
	}
	
	function chk_email_exist_responce(js)
	{
		if(js)
		{
			bootbox.alert(js);
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
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var company_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			company_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
		user.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,company_state,keyword);
	}
	
	
	function nb(a)
	{
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var company_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			company_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
	
		document.getElementById('st_pos').value=a;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,company_state,keyword);
	}
	
	function set_page(nrpp)
	{
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var company_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			company_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
	
		document.getElementById('nrpp').value=nrpp;
		user.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,document.getElementById('chk').value,sex,strt_age,end_age,company_country,company_state,keyword);

	}
	
	
	function ser_by()
	{
		if(
			document.getElementById("sex").selectedIndex=="0" &&
			document.getElementById("strt_age").selectedIndex=="0" &&
			document.getElementById("end_age").selectedIndex=="0" &&
			document.getElementById("company_country").selectedIndex=="0" &&
			document.getElementById("users_state").selectedIndex=="0" &&
			document.getElementById('search').value==""
		  )
		{
			bootbox.alert("Please provide at one search Parameter.");
			return false;
		}
		else if(document.getElementById("end_age").selectedIndex!="0"){
				if((document.getElementById('strt_age').value)>(document.getElementById('end_age').value)){
					bootbox.alert("Start Age Greater than End Age");
					return false;
				}
		}
		var sex="";
		var strt_age="";
		var end_age="";
		var company_country="";
                var users_state="";
		var keyword="";
		if(document.getElementById("sex").selectedIndex!="0"){
			sex = document.getElementById('sex').value;
		}
		if(document.getElementById("strt_age").selectedIndex!="0"){
			strt_age = document.getElementById('strt_age').value;
		}
		if(document.getElementById("end_age").selectedIndex!="0"){
			end_age = document.getElementById('end_age').value;
		}
		if(document.getElementById("company_country").selectedIndex!="0"){
			company_country = document.getElementById('company_country').value;
		}
                if(document.getElementById("users_state").selectedIndex!="0"){
			users_state = document.getElementById('users_state').value;
		}
		if(document.getElementById('search').value!=""){
			keyword = document.getElementById('search').value;
		}
                if($('#global_user').is(':checked')){
		user.view('','Search Result','','','','','2',sex,strt_age,end_age,company_country,users_state,keyword);
        	}
                else{
		user.view('','Search Result','','','','','1',sex,strt_age,end_age,company_country,users_state,keyword);
        	}
    }
    	
	function control() {
		if(document.getElementById("strt_age").selectedIndex!="0"){
    		document.getElementById("end_age").disabled = false;
		}
		if((document.getElementById("end_age").selectedIndex!="0")&& (document.getElementById("strt_age").selectedIndex=="0")){
    		bootbox.alert("Invalid Age Range! Start Age Not Selected!");
			document.getElementById("end_age").disabled = true;
			document.getElementById("end_age").selectedIndex="0";
			return false;
		}
	}
	
	function reset_srch(){
		user.view('','','','','','');
	}
	
	function state_srch(country_id, act){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			//document.myForm.time.value = ajaxRequest.responseText;
			if(act=="view"){
				document.getElementById("users_state").innerHTML=ajaxRequest.responseText;
			}
			else{
				document.getElementById("user_state").innerHTML=ajaxRequest.responseText;
			}
		}
	}
	//var country_id=document.getElementById('user_country').value;
	var queryString = "?c_id=" + country_id + "&act=" + act;
	ajaxRequest.open("GET", "state.php" + queryString, true);
	ajaxRequest.send(null); 
}

function create_group()
{
	var checkBoxes=document.getElementsByName('chk_user_id[]');
	
	var booleanResult=false;
	for(var i=0;i<checkBoxes.length;i++){
		if(checkBoxes[i].checked){
			booleanResult=true;
			break;
		}
	}
	if(booleanResult==false)
	{
		alert("Please select at least one.")
		return false;
	}
	
	jQuery.ajax({
		type: "POST",
		url:"user.php?act=create_group",
		data: $('#frm').serialize(),
		success: function(js){
			win=cn_window_open('',"Group Created Successfully",1);
		},
			error: function(){
			alert("Please try again. Server have not sent response.");
		}
	});
	return false;
}
function open_group()
{
	var ele = document.getElementById("group");
	var group_btn= document.getElementById("group_btn");
    if(ele.style.display == "block") {
            ele.style.display = "none";
      }
    else {
        ele.style.display = "block";
		group_btn.style.display = "none"
    }
}	
	
</script>
	<div id="user_data"></div>
	
<script>
    {$js}
	user= new cn_ajax("user","user_data");
        user.view("","","","","","",0,"","","","","","");
        //user.view("","","map_company_user_id","DESC","","",1,"","","","","","");
</script>
{/block}