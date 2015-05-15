var win,win1;
var Dialog;
var cn_loading=false;
function cn_window_open_new(title,data,width,height,is_closable)
{
		$.modal({ content: data,
					title: title,
					maxWidth: width,
					maxHeight: height
				});
}


function cn_window_open(title,data,is_closable)
{
	hc = new Object();
	hc["title"]=title;

	hc["closeable"]=is_closable;
	hc["modal"]=true;
	hc["unloadOnHide"]=true;
	hc["closeText"]="<img border=\"0\" src=\"images/close.png\" />";
	win = new Boxy(data, hc);
	return win
}

function jq_alert(a)
{
	Boxy.alert(a, null);
}

function cn_show_loading(a)
{
	if(!cn_loading)
	{
		Dialog = new Boxy("<img border=\"0\" src=\"images/loading.gif\" />", {loader:true});
		cn_loading=true;
	}
}
function cn_hide_loading()
{
	if(cn_loading)
	{
		Dialog.hideAndUnload();
		cn_loading=false;
	}
}
function chk_session(doLogin) // for checking session/login timeout, call this function in every member function
{
	//alert(doLogin);
	if(!doLogin)
	{
            try
            {
                eval("x_check_session(chk_session)") 
            }
            catch(e) { }
	}
	else if(doLogin==-1)
	{
            // continue, do nothing
            //alert("session ok"+doLogin);
	}
	else if(doLogin==1)
	{
	    //alert("session not ok:"+doLogin);
	    window.location="index.php?act=show_login&msg=Please login first!";
	}
	else if(doLogin==2)
	{
	    //alert("session not ok:"+doLogin);
	    window.location="index.php?act=show_login&msg=You have been logged out because another person has been logged in with your username!";
	}
	else
	{
            //alert("session not ok:"+doLogin);
            window.location="estimator/errorpage.php?back=1";
	}
}
//////////////////////////////////////////////////////////////////////////////////////////
function cn_ajax(pf,section,cond1,cond2,cond3,cond4,cond5,cond6,cond7, popup )
{
	this.prefix = pf;
	this.db = section
	this.init=true;
	var width
	var height
	var temp
	var condition1,condition2,condition3,condition4,condition5,condition6
	var nrpp
	var orderby
	var order
	var st_pos
	var donotcallview; // if this flag is on, view method wouldn't be called after update method
	var donotshowinpopup;
	//Methods
	this.view = view;
	this.add = add;
	this.save=save;
	this.edit= edit;
	this.disp=disp;
	this.close=close;
	this.update = update;
	this.del = del;
	this.setwidthheight = setwidthheight;
	this.nb1 = nb1;
	this.alternate_row_color = alternate_row_color
	this.set_donotcallview = set_donotcallview;  // to set/unset donotcallview flag
	this.set_donotshowinpopup = set_donotshowinpopup;
	this.chk_all_row = chk_all_row;
	this.popup_view=popup;
	
	
	
	if(cond1){this.condition1=cond1}
	if(cond2){this.condition2=cond2}
	if(cond3){this.condition3=cond3}
	if(cond4){this.condition4=cond4}
	if(cond5){this.condition5=cond5}
	if(cond6){this.condition6=cond6}
	if(cond7){this.condition7=cond7}
	
	
}
function set_donotcallview(cv)
{
	this.donotcallview=cv;
}
function set_donotshowinpopup(fl)
{
	this.donotshowinpopup=fl;
}
function alternate_row_color(p)
{
	str="cynets_tables('"+p+"_table',1,0)";
	eval(str)
}
function setwidthheight(width,height)
{}
function nb1(p)
{
	this.st_pos=p;
	str="x_"+this.prefix+"_view('"+this.prefix+".view','',this.orderby,this.order,this.st_pos,this.nrpp,this.condition1,this.condition2,this.condition3,this.condition4,this.condition5,this.condition6,this.condition7,set_js_data)"
	eval(str)
}

function disp(js_data,msg,con1,con2)
{
	if(!js_data)
	{
		chk_session('',chk_session); // checking for session/login timeout
		str="x_"+this.prefix+"_disp('"+this.prefix+".disp',msg,con1,con2,set_js_data)"
		eval(str)
	}
	else
	{
		
		str = "document.getElementById('"+ this.db + "').innerHTML=js_data[0]"
		eval(str);
	}
}


function view(js_data,msg,orderby,order,st_pos,nrpp,cond1,cond2,cond3,cond4,cond5,cond6,cond7)
{
	if(!js_data)
	{
		
		chk_session('',chk_session); // checking for session/login timeout
		this.condition1="";	this.condition2="";	this.condition3="";    this.condition4=""; this.condition5=""; this.condition6=""; this.condition7="";
		
		if(!orderby) { orderby=""; }
		if(!order) { order=""; }
		if(!(parseInt(st_pos)>0)) { st_pos=0; }
		if(!(parseInt(nrpp)>0)) { nrpp=0;}
		
		this.orderby=orderby;  this.order=order;  this.st_pos=st_pos;  this.nrpp=nrpp;
		//alert("orderby:"+this.orderby+"|order:"+ order+"|st_pos:"+this.st_pos);
	
		if(cond1){this.condition1=cond1}
		if(cond2){this.condition2=cond2}
		if(cond3){this.condition3=cond3}
		if(cond4){this.condition4=cond4}
		if(cond5){this.condition5=cond5}
		if(cond6){this.condition6=cond6}
		if(cond7){this.condition7=cond7}
//alert(this.condition3);
		
		str="x_"+this.prefix+"_view('"+this.prefix+".view',msg,this.orderby,this.order,this.st_pos,this.nrpp,this.condition1,this.condition2,this.condition3,this.condition4,this.condition5,this.condition6,this.condition7,set_js_data)"
		//alert(this.nrpp)
		//view('','',1,'',a,'',mysearch,1,1)
		//alert(this.nrpp)
		//alert(str)
		eval(str)
	}
	else
	{

		
			if(this.popup_view=="1")
			{
				if(win==null)
				   win = cn_window_open(this.temp,js_data[0],true)
				else
					win.setContent(js_data[0]);
			}
			else			
			{
				str = "document.getElementById('"+ this.db + "').innerHTML=js_data[0]"
				eval(str);
			}
		
	
	}
	if(document.getElementById(this.prefix+'_view_table'))
		{
			alternate_row_color(this.prefix+'_view');
		}
	
}

function add(js_data,title,cond1,cond2,cond3,cond4,cond5,cond6,cond7)
{
	  
	if(!js_data)
	{
		chk_session('',chk_session); // checking for session/login timeout
		this.temp=title
		if(cond1){this.condition1=cond1}
		if(cond2){this.condition2=cond2}
		if(cond3){this.condition3=cond3}
		if(cond4){this.condition4=cond4}
		if(cond5){this.condition5=cond5}
		if(cond6){this.condition6=cond6}
		if(cond7){this.condition7=cond7}
		
		str="x_"+this.prefix+"_add('"+this.prefix+".add',this.condition1,this.condition2,this.condition3,this.condition4,this.condition5,this.condition6,this.condition7,set_js_data)"
		eval(str)
	}
	else
	{
		if(this.donotshowinpopup)
		{
			str = "document.getElementById('"+ this.db + "').innerHTML=js_data[0]"
			eval(str);
		}
		else
		{
			if(js_data[2]==2)
			{
				//PHP success, but an error message is returned by add function of php
				Boxy.alert(js_data[0], null);
			}
			else
			{
				win = cn_window_open(this.temp,js_data[0],true)
				if(this.prefix+'.add'=='video.add')
					call_after_popup_open();
			}
		}
		if(document.getElementById(this.prefix+'_popup_table'))
		{
			alternate_row_color(this.prefix+'_popup');
		}
	}
}

function save()
{
	// Get arguments

	var str1=""
	 
	for( var i = 1; i < arguments.length; i++ )
	{
		str1+="arguments["+i+"],"
	}
	var js_data  = arguments[0]
	
	if(!js_data)
	{
		
		str= "x_"+this.prefix+"_save('"+this.prefix+".save',"+str1+"set_js_data)"

		eval(str)
		 //alert(str); 
	}
	else
	{
		// Check PHP validation.
		if(js_data[2]==1)
		{
			//PHP success
			//Close window and update view.
			//	if(js_data[1])		{	prompt("test",js_data[1]); // to test quesy	id passed from save function 	}
			
			try
			{
				eval(this.prefix+"_custom(js_data[0])");
			}
			catch(e) {}
			
			if(this.donotcallview)
			{
				//alert(js_data[0]);
				// do nothing, neither close popup nor call 'view' as 'edit' is not called in a popup window
			}
			else
			{
				if(this.prefix=="std")// This is the case when a new study is added and we want to show list of personnels which are missing in CSV file
				{
//					alert(js_data[4]);
						x_list_deleted_personnel_from_import(js_data[4],set_list_deleted_personnel_from_import)
				}
				
				win.hideAndUnload();
				
				str=this.prefix+".view('',js_data[0],this.orederby,this.order,this.st_pos,this.nrpp,this.condition1,this.condition2,this.condition3,this.condition4,this.condition5,this.condition6,this.condition7)"		
				eval(str)
			}
		}
		else if(js_data[2]==2)
		{
			//PHP success, but an error message is returned
			Boxy.alert(js_data[0], null);
		}
		else
		{
			// PHP failed
			// Update window
			//alert(win.getContent().innerHTML);
			win.setContent(js_data[0]);
		}	
	}
}

function edit(js_data,title,cond1,cond2,cond3,cond4,cond5,cond6,cond7,single_value)
{
	
	if(!js_data)
	{
		chk_session('',chk_session); // checking for session/login timeout

		if(cond1){this.condition1=cond1}
		if(cond2){this.condition2=cond2}
		if(cond3){this.condition3=cond3}
		if(cond4){this.condition4=cond4}
		if(cond5){this.condition5=cond5}
		if(cond6){this.condition6=cond6}
		if(cond7){this.condition7=cond7}
		this.temp=title
			str="x_"+this.prefix+"_edit('"+this.prefix+".edit',single_value,this.condition1,this.condition2,this.condition3,this.condition4,this.condition5,this.condition6,this.condition7,set_js_data)"

		eval(str);
	}
	else
	{
		if(js_data[2]==2)
		{
			//PHP success, but an error message is returned by edit function of php (eg. : std_edit() of common_ajax.php)
			Boxy.alert(js_data[0], null);
		}
		else
		{
			win =cn_window_open(this.temp,js_data[0],true)
$(function(){

	$("#cat_id").multiselect({
		selectedList: 4
	});
	
});

		}
	}
}
function close()
{
 win.hideAndUnload();
}
function update()
{
	var str1=""
	for( var i = 1; i < arguments.length; i++ ) {
		str1+="arguments["+i+"],"
	}
	var js_data  = arguments[0]
	 
	if(!js_data)
	{
		chk_session('',chk_session); // checking for session/login timeout
		str="x_"+this.prefix+"_update('"+this.prefix+".update',"+str1+"set_js_data)";
		eval(str)
	}
	else
	{
		if(js_data[2]==1)
		{
			//PHP success
			try
			{
				eval(this.prefix+"_afterUpdate_custom(js_data[0])"); 
			}
			catch(e) {}
			
			if(this.donotcallview)
			{
				alert(js_data[0]);
				// do nothing, neither close popup nor call 'view' as 'edit' is not called in a popup window
			}
			else
			{
				
				//Close window and update view.
				 
				win.hideAndUnload();  //closing
				str=this.prefix+".view('',js_data[0],this.orderby,this.order,this.st_pos,this.nrpp,this.condition1,this.condition2,this.condition3,this.condition4,this.condition5,this.condition6,this.condition7)";
				eval(str);
			}
		}
		else if(js_data[2]==2)
		{
			//PHP success, but an error message is returned
			Boxy.alert(js_data[0], null);
		}
		else
		{
			// PHP failed
			// Update window
			//alert(js_data[0])
			if(this.donotcallview)
			{
				if(js_data[1])
				{
					Boxy.alert(js_data[1], null);
				}
			}
			else
			{
				win.setContent(js_data[0]);
			}
		}	
	}
}

function del(js_data,cond1,cond2,cond3,cond4,cond5,cond6,cond7,single_value)
{
	if(!js_data)
	{
		chk_session('',chk_session);
		var val=new Array();
		var total=0;
		var val1;
		var f=null;
		if(!single_value)
		{
			eval('f=document.'+this.prefix+'_frm_view');
			ri=f.elements.row_id;
			if(ri && !single_value)
			{
				if(f.elements.row_id.length)
				{
					var max=f.elements.row_id.length
					for(var idx=0;idx<max;idx++)
					{
						e=f.elements.row_id[idx];
						if(e.type=="checkbox")
						{
							if(e.checked)
							{
								total+=1;val[total]=e.value;
							}
						}
					}
				}
				else if(f.elements.row_id)
				{
					e=f.elements.row_id;
					if(e.type=="checkbox")
					{
						if(e.checked)
						{
							total+=1;val[total]=e.value;
						}
					}
				}
			}
		}
		else
		{
			total=1;
			val[0]=single_value
		}
		if(total==0 && !single_value)
		{
			Boxy.alert("Please select at least one checkbox", null);
			return;
		}
		var obj = this;
		Boxy.confirm("Are you sure you want to delete selected "+total+" record(s) ?", function() {
			if(cond1){obj.condition1=cond1}
			if(cond2){obj.condition2=cond2}
			if(cond3){obj.condition3=cond3}
			if(cond4){obj.condition4=cond4}
			if(cond5){obj.condition5=cond5}
			if(cond6){obj.condition6=cond6}
			str="x_"+obj.prefix+"_del('"+obj.prefix+".del',val,obj.condition1,obj.condition2,obj.condition3,obj.condition4,obj.condition5,obj.condition6,set_js_data)";
			eval(str);
		});
	}
	else
	{
		str=this.prefix+".view('',js_data[0],this.orderby,this.order,this.st_pos,this.nrpp,this.condition1,this.condition2,this.condition3,this.condition4,this.condition5,this.condition6,this.condition7)"
	eval(str)
	}
}

function chk_all_row()
{
		var f=null;
		eval('f=document.'+this.prefix+'_frm_view');
		
		chk=f.chk_all_row_id.checked;
		ri=f.elements.row_id;
		if(ri)
		{
			if(f.elements.row_id.length) // in case of multiple checkbox
			{
				var max = f.elements.row_id.length
				for (var idx = 0; idx < max; idx++)
				{
					e=f.elements.row_id[idx];
					if(e.type=="checkbox")
					{
						e.checked=chk
					}
				}
			}
			else if(f.elements.row_id)  // in case of single checkbox
			{
				e=f.elements.row_id;
				if(e.type=="checkbox")
				{
					e.checked=chk
				}
			}
		}
}
function set_js_data(js_data)
{
	//document.write(js_data[0])
	if(!js_data[3])
	{
		Boxy.alert("Please specify a valid callback function", null);
		return;
	}
	str=js_data[3]+"(js_data)"
	eval(str)
	if(js_data[3]=="feedback.view")
		call_after_page_load();

}

/////////////////////////////////////////////////////////////////////////////////////////

goods="-0123456789."; // onKeypress="goods='abcd'; return limitchar(event)"
function limitchar(e)
{
	var key, keychar;
	if (window.event)
		key=window.event.keyCode;
	else if (e)
		key=e.which;
	else
		return true;
	keychar = String.fromCharCode(key);
	keychar = keychar.toLowerCase();
	goods = goods.toLowerCase();
	if (goods.indexOf(keychar) != -1)
	{
		goods="-0123456789.";
		return true;
	}
	if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
	{
		goods="-0123456789.";
		return true;
	}
	return false;
}
/////////////////////////////////////////////////////////////////////////////////////////

goods="-0123456789."; // onKeypress="goods='abcd'; return limitchar(event)"
function limitchar1(e)
{
	var key, keychar;
	if (window.event)
		key=window.event.keyCode;
	else if (e)
		key=e.which;
	else
		return true;
	keychar = String.fromCharCode(key);
	keychar = keychar.toLowerCase();
	goods = goods.toLowerCase();
	if (goods.indexOf(keychar) != -1)
	{
		goods="-0123456789.";
		return true;
	}
	if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
	{
		goods="-0123456789.";
		return true;
	}
	return false;
}
/////////////////////////////

function chk_val_limit(obj,min,max)
{
       
    if(obj)
    {
        min=parseFloat(min);
        max=parseFloat(max);
        v=parseFloat(obj.value);
        if(v<min || v>max)
        {
                alert("Please enter a value between "+min+" and "+max+".");
                if(v<min)
                        obj.value=min;
                else
                        obj.value=min;
                obj.focus();
        }
        if(obj.value=="") { obj.value=0; }
    }   
}
///////////////////////////////////
function chk_all_checkbox(chkObj,frm_nm,chk_id)
{
	var f=null;
	var ri=null;
	eval('f=document.'+frm_nm);
	chk=chkObj.checked;
	eval('ri=f.elements.'+chk_id);
	if(ri)
	{
		if(ri.length) // in case of multiple checkbox
		{
			var max = ri.length
			for (var idx = 0; idx < max; idx++)
			{
				e=ri[idx];
				if(e.type=="checkbox")
				{
					e.checked=chk
				}
			}
		}
		else  // in case of single checkbox
		{
			e=ri;
			if(e.type=="checkbox")
			{
				e.checked=chk
			}
		}
	}
}

function el(obj_id)
{
	return this.document.getElementById(obj_id);
}


function set_ta(chk,obj_id,offset)
{

	if(chk )
	{
		this.document.getElementById(obj_id).rows=this.document.getElementById(obj_id).rows+offset;
	}
	else
	{
		this.document.getElementById(obj_id).rows=this.document.getElementById(obj_id).rows-offset;
	}
}


function set_contant(js)
{
	win.setContent(js);
}

function ajx_fun()
{
	
	var fun,k,i=0,k=0,numargs = ajx_fun.arguments.length;
	if(ajx_fun.arguments.length>2)
	{    
		var arg=new Array( );;
		k=0;	
		for (i = 1; i < numargs; i++)
		 {
		   arg[k]=ajx_fun.arguments[i];
		   k++;

		 }
	}
	else
		 arg=ajx_fun.arguments[1];
		 
	
	fun=''+ajx_fun.arguments[0]+'(arg)'

	eval(fun);
}




//check radio button validation and check box validation 
function  radio_chk(tag_type,f_name) 
{
	var d= new Array(); 
	var flag;
	var i;
	flag=0;
	i=0;
	d=this.document.getElementsByTagName("input");
	while( i<d.length )
	{
		if(f_name==d[i].name && d[i].checked==true && d[i].type==tag_type )
		{
			flag=1;
			break;
		}	
	i=i+1;
	}
	if(flag==1)
		return true;
	else
		return false; 
}


function checkbox_sel(sel_ary,sel_id)
{
	t1=document.getElementsByName(sel_ary);
	for(i=0;i<t1.length;i++)
	{
		t1[i].checked=document.getElementById(sel_id).checked;
	}
}
function  get_ids( f_name,tag_type ) 
{
	var d= new Array(); 
	var tag_type="checkbox";
	//var f_name="exp_id[]";
	var flag;
	var i;
	var id="";
	
	flag=0;
	i=0;
	
	d=this.document.getElementsByTagName("input");
	while( i<d.length )
	{
		if(f_name==d[i].name && d[i].checked==true && d[i].type==tag_type )
		{
			id=(id+d[i].value+",");

		}	
	i=i+1;
	}
	id=id.substr(0,id.length-1);
	return id;	 
}