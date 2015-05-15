{extends file="index.tpl"}
{block name=body}
<script language="javascript">
function check()
{
	var import_file=document.getElementById('file').value;
	if(import_file=="")
	{
		alert("Please Browse Files!");
		return false;
	}
	if(import_file!="")
		if (import_file.toLowerCase().indexOf(".zip") == -1 )
		{
		  alert("Please upload .zip file only !");
		  return false;
		}
	return true;
}
</script>

<form action="index.php" method="post" enctype="multipart/form-data"  name="frm3"  onsubmit="javascript :return check()"  >
  <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:20px" id="id="popup"">
	{foreach $msg as $value}
    <tr>
      <td  colspan="2" align="center" id="msg">{$value}</td>
    </tr>
    {/foreach}
	<tr>
      <td align="right" ><span class="text">Import File:&nbsp;</span></td>
      <td><input type="file" name="file" id="file"  style="height:25px" /></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="2" align="center"><input type="submit" name="Import" value="Import" id="buttongray"  /></td>
    </tr>
  
  </table>
  <input name="import" type="hidden" id="import" value="1" />
  <input name="act" type="hidden" id="act" value="{$act}" />
</form>
{/block}