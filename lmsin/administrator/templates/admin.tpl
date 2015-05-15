{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
	function chk_val()
	{
		if(document.getElementById('cat_name').value=="")
		{
			jq_alert("Error ! empty admin field.");
			return false;
		}
		else
		{
				admin.update("",document.getElementById('cat_name').value,document.getElementById('cat_id').value);
		}
	}
	
	</script><div id="admin_data"></div><script>
	admin= new cn_ajax("admin","admin_data");
	admin.edit("","","","","","","","","");
</script>
{/block}