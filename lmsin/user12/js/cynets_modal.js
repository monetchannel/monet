var win, SERVER_PATH;
function cn_window_open(title,data,is_closable,size)
{
	var modal_size='';
	if(size==1)
		modal_size='modal-lg';
	else if(size==2)
		modal_size='modal-sm';	
	
	hc = new Object();
	hc["title"]=title;
	hc["modal_size"]=modal_size;
	
	hc['backdrop']=false;
	hc['keybord']=true;
	hc["closeable"]=is_closable;
	hc["closeText"]="<img border=\"0\" src=\""+SERVER_PATH+"images/close.png\" />";
	win = new CynetsModel(data, hc);
	return win
}

function CynetsModel(element, options)
{
	$(".modal-backdrop").remove();
	$(".modal").remove();
	var WRAPPER='<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"> <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button><h4 class="modal-title" id="myModalLabel">'+options.title+' </h4></div><div class="modal-body">'+element+'</div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Submit changes</button></div></div></div>';
	
	var WRAPPER='<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog '+options.modal_size+'"><div class="modal-content "> <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button><h4 class="modal-title" id="myModalLabel">'+options.title+' </h4></div><div class="modal-body">'+element+'</div></div></div>';
	
	$(WRAPPER).appendTo(document.body);
	$('#myModal').modal({ backdrop:options.backdrop,keybord:options.keybord})
	//$(WRAPPER).css('display', 'none').appendTo(document.body);
}


function hide()
{
	win.destroy();
	//$('#myModal').modal('hide')
}
