{extends file="index.tpl"}
{block name=body}


<script language="javascript" type="text/javascript" src="{$SERVER_PATH}administrator/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" src="{$SERVER_PATH}administrator/tinyupload.js"></script>
<script language="javascript" type="text/javascript">
		
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			plugins :"media,fullscreen,safari,table,advhr,advimage,advlink,iespell,insertdatetime,searchreplace,contextmenu,paste,visualchars,nonbreaking,xhtmlxtras,template,image_upload,    preview , emotions,iespell,print ,layer , style,pagebreak, spellchecker",
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cleanup,code,|,forecolor,backcolor,advhr,   |,visualchars,nonbreaking,template,blockquote,pagebreak,|,spellchecker ",//page_list,
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image ,|,insertdate,inserttime,preview",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,|,print ,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,styleprops,|, formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons1_add : "fullscreen",
			theme_advanced_buttons1_add : "media",
			height : "350",
            width : "900",
			//fullscreen_new_window : true,
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			theme_advanced_fonts : "Andale Mono=andale mono,Arial=arial,Arial Black=arial black,Book Antiqua=book antiqua,Comoc Sans MS=comic sans ms,Calibri=calibri,helvetica,sans-serif;Courier New=courier new,courier,Georgia=georgia,Helvetica=helvetica,Impact=impact,monospace,Symbol=symbol,Tahoma=tahoma,Terminal=terminal,Times New Roman=times new roman,Trebuchet MS=trebuchet ms,Verdana=verdana;AkrutiKndPadmini=Akpdmi-n",
			theme_advanced_font_sizes : "1(8px)=8px,2(10px)=10px,3(11pt)=11pt,4(12px)=12px,5(14px)=14px,6(16px)=16px,7(18px)=18px,8(20px)=20px,9(24px)=24px,10(36px)=36px",
			theme_advanced_resize_horizontal : false,
			relative_urls : false,//Tiny upload returns absolute urls, we dont want tinymce changing them to relative.
			file_browser_callback:tinyupload,//Hookup tinyupload the the filebrowser call back.
			convert_urls : false
		});

</script>

<script language="javascript">
	function chk_val()
	{
		var message=tinyMCE.getContent();
		if(document.getElementById('subject').value=="" || message=="")
		{
			alert("Please fill all * field to continue.");
			return false;
		}
		
		if(document.frm.all_user[0].checked!=true && document.frm.all_user[1].checked!=true && document.frm.all_user[2].checked!=true)
		{
			alert("Please selecte options.");
			return false;
		}
	}
</script>
<form name="frm" action="index.php?act=send_email" method="post">
  <table width="100%" cellpadding="0" cellspacing="0" id="popup">
    <tr>
      <th align="left" width="10%" >Send Mail:</th>
      <th  width="90%" class="help" style="padding-right:10px"  >&nbsp;</th>
    </tr>
    <tr><td colspan="2" align="center" class="msg" style="text-align:center">&nbsp;{$msg}</td></tr>
    
          <tr class="norow">
            <td > Options:* </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td  align="right" style="text-align:right"  > <input type="radio" name="all_user" id="radio" value="1"  /></td>
            <td>&nbsp;To all users</td>
          </tr>
          <tr>
            <td  align="right"style="text-align:right"  > <input type="radio" name="all_user" id="radio" value="2" /></td>
            <td>&nbsp;To all users who have not rated any videos</td>
          </tr>
          <tr>
            <td  align="right" style="text-align:right" ><input type="radio" name="all_user" id="radio" value="3" /></td>
            <td>&nbsp;To all users who have rated at least one video</td>
          </tr>
          
          <tr>
            <td  align="left"  >Subject:*</td>
            <td><input type="text" name="subject" id="subject" value="{$sa_site_name}" class="text_box" style="width:600px; height:20px" /></td>
          </tr>
          <tr>
            <td  align="left" valign="top">Message:*</td>
            <td><textarea name="message" id="message" rows="10" cols="50"></textarea></td>
          </tr>
         
          <tr class="hnone">
            <td ></td>
            <td ></td>
          </tr>
          <tr class="norow">
          <td>Legend:&nbsp;&nbsp;</td>
            <td  align="left"><strong>First Name:</strong> [user_fname] &nbsp;&nbsp;<strong>Last Name:</strong> [user_lname]  &nbsp;&nbsp;<strong>Email:</strong> [user_email]  </td>
          </tr>
           <tr class="hnone">
            <td ></td>
            <td ></td>
          </tr>
          <tr class="norow">
            <td  colspan="2" align="left"><input type="submit" name="Send" value=" Send "  onclick="return chk_val()" id="buttongray" /></td>
          </tr>
          <tr class="hnone">
            <td  colspan="2"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
{/block}