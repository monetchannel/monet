{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
	function chk_val()
	{
		if(document.getElementById('cat_name').value=="")
		{
			jq_alert("Error ! empty category field.");
			return false;
		}
		else
		{
			if(document.getElementById('act').value=="save")
			{
				category.save("",document.getElementById('cat_name').value);
			}
			else
			{
				category.update("",document.getElementById('cat_name').value,document.getElementById('category_id').value);
			}
		}
	}
	
	function category_del(id)
	{
		category.del("","","","","","","","",id);
	}
	function set_order(f,o)
	{
		category.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		category.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		category.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");

	}
	{/literal}
	</script><div id="category_data"></div><script>
	category= new cn_ajax("category","category_data");
	category.view("","","","","","","","","");
</script>
{/block}