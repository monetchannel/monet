<div style="width:500px">
<form action="category.php" onSubmit="return false;" name="categoryfrm" method="post">
  <table width="100%" cellpadding="0" cellspacing="0" id="popup">
    <tr>
      <td width="100%" colspan="2"  class="center"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr class="blank">
          <td  colspan="3" >&nbsp;</td>
        </tr>
        <tr>
          <td width="29%"  align="left"  >Category Name:&nbsp;</td>
          <td width="71%"><input type="text" name="cat_name" id="cat_name" value="{$cat_name}"  class="text_box" /></td>
          </tr>
        <tr class="hnone">
          <td ></td>
          <td ></td>
          </tr>
        <tr class="norow">
          <td  colspan="2" align="left"><input type="submit" name="Save" value=" {$act} " onclick="chk_val()" id="buttongray" /></td>
          </tr>
        <tr class="hnone">
          <td  colspan="2"></td>
          </tr>
        </table></td>
    </tr>
  </table>
    <input type="hidden" name="act" id="act" value="{$act}">
    <input type="hidden" name="category_id" id="category_id" value="{$cat_id}">
</form>
</div>