{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
	function show_invr(msg)
	{
		invitation.view("",msg,'','',document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	
	function invitation_del(id)
	{
		invitation.del("","","","","","","","",id);
	}
	function set_order(f,o)
	{
		invitation.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		invitation.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		invitation.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","");

	}

	{/literal}
	</script><div id="invitation_data"></div><script>
	invitation= new cn_ajax("invitation","invitation_data");
	invitation.view("","","","","","","","","");
</script>
{/block}