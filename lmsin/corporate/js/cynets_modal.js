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
	hc['keyboard']=true;
	hc["closeable"]=is_closable;
	hc["closeText"]="<img border=\"0\" src=\""+SERVER_PATH+"images/close.png\" />";
	win = new CynetsModel(data, hc);
	return win
}

function CynetsModel(element, options)
{
	$(".modal-backdrop").remove();
	$(".modal").remove();
	var WRAPPER='<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">\n\
                        <div class="modal-dialog">\n\
                            <div class="modal-content">\n\
                                <div class="modal-header">\n\
                                    <h3 class="text-center modal-title" id="myModalLabel">'+options.title+' </h3>\n\
                                </div>\n\
                                <br>\n\
                                <br>\n\
                                <h4 class="text-center">http://localhost/'+element+'</h4>\n\
                                <br>\n\
                                <br>\n\
                                <h4 class="text-center">Click <a href="http://localhost/'+element+'" target="_blank">here</a> to go to the page</h4>\n\
                                <br>\n\
                                <br>\n\
                                <div class="modal-footer">\n\
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>';
	//var WRAPPER='<div class="modal fade" id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog '+options.modal_size+'"><div class="modal-content "> <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button><h4 class="modal-title" id="myModalLabel">'+options.title+' </h4></div><div class="modal-body">'+element+'</div></div></div>';
	
	$(WRAPPER).appendTo(document.body);
	$('#myModal').modal({ backdrop:options.backdrop,keybord:options.keybord})
	//$(WRAPPER).css('display', 'none').appendTo(document.body);
}


function hide()
{
	win.destroy();
	//$('#myModal').modal('hide')
}
