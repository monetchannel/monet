 <script> 
 function chk()
 {
  if(radio_chk("checkbox","multiselect_cat_id")==false)
	{
		alert("Please select category.");
		return false;
	}
	else
	{
		document.approvedfrm.submit();
	}
 }
</script>
<div style="width:400px; height:200px">
 <form method="POST" action="index.php" name="approvedfrm" onsubmit="return chk()">
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
     <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
       <tr>
            <td width="40%" align="left" style="padding-left:10px">Category *:</td>
            <td width="60%"><select name="cat_id[]" id="cat_id" multiple="multiple" size="5" >
              {$category_list}
            </select></td>
          </tr>
          <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
           <tr>
          <td colspan="2">&nbsp;</td>
          </tr>
            <tr>
            <td>&nbsp;</td>
            <td  align="left"><input type="submit" value="Submit" name="B1"  class="mybutton" id="buttongray" ></td>
          </tr>
          </table>
     <input type="hidden" name="act" id="act" value="{$act}">
    <input type="hidden" name="cs_id" id="cs_id" value="{$cs_id}">
  </form>
  </div>
