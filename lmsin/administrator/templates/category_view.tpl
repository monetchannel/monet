<form name="frm" method="POST" action="category.php" onSubmit="return false;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C0C0C0" id="AutoNumber1" style="border-collapse: collapse">
  <tr>
      <td width="100%" align="center" id="msg">{$msg}</td>
    </tr>
    <tr>
      <td width="100%" ><table width="100%" cellpadding="0" cellspacing="1" id="List21" height="45">
          <tr bgcolor="#ffffff">
            <td align=left class="popuptext">
            	<a style="text-decoration: none" href="javascript:category.add('','Add Category');">
                	Add Category
                </a>
            </td>
            <td align="right"><span class="tabletext">{$HF1}{$nb_text}{$HF2}</span></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999" id="List1">
    <tr>
      <td width="100%" >
        <table width="100%" cellpadding="0" cellspacing="1" id="List2" height="45">
          <tr bgcolor="#333333">
            <td bgcolor="#EEEEEE" width="84%" align="left" class="tablehead"><a href="javascript: set_order('cat_name','{$cat_name_order}')">Category</a></td>
            <td bgcolor="#EEEEEE" width="16%" height="30" align="center" class="tablehead"> Action</td>
          </tr>
{$HF1} 
{foreach $categories as $category}
{strip}
          <tr bgcolor="#ffffff">
            <td height="16" class="tabletext" > {$category.cat_name}</td>
            <td width="16%" align="left" class="tabletext" ><span class="tabletextred2"><a href="javascript:category.edit('','Edit Category','','','','','','','','{$category.cat_id}')">Edit</a></span>&nbsp;|&nbsp;
            <span class="tabletextred2"><a href="javascript:category_del('{$category.cat_id}')">Del</a></span></td>
          </tr>
{/strip}
{/foreach}
{$HF2}
        </table>
            </td>
    </tr>
    <tr bgcolor="#ffffff">
      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:{$none}">
          <tr>
            <td class="tabletext" width="250"> Show
              <select name="nrpp" id="nrpp" onChange="javascript:set_page()" style="width:50px;">
              	{$nrppOpt}
              </select>
              records per page </td>
            <td width="20" align="right">&nbsp;</td>
            <td class="tabletext" width="150" align="left" style="padding-left:5px">&nbsp;</td>
            <td align="right"  ><span class="tabletext">{$nb_text}</span></td>
          </tr>
        </table></td>
    </tr>
  </table>
    <input type="hidden" name="st_pos" id='st_pos' value="{$st_pos}">
    <input type="hidden" name="nrpp" id='nrpp' value="{$nrpp}">
    <input type="hidden" name="order" id="order" value="{$order}">
    <input type="hidden" name="orderby" id="orderby" value="{$orderby}">
</form>