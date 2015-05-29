{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
	function set_order(f,o)
	{
		redemption.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		redemption.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		redemption.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");

	}
        
	{/literal}
</script>
<div id="redemption_data">
    
</div>
<script>
    redemption= new cn_ajax("redemption","redemption_data");
    redemption.view("","","","","","","","","","");
</script>
{/block}
