{extends file="index.tpl"}
{block name=body}
<script>
	{$js}
	{literal}
	function set_order(f,o)
	{
		reward.view("","",f,o,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");
	}
	function nb(a)
	{
		document.getElementById('st_pos').value=a;
		reward.view("","",document.getElementById('orderby').value,document.getElementById('order').value,a,document.getElementById('nrpp').value,'',"","","");
	}
	function set_page(nrpp)
	{
		document.getElementById('nrpp').value=nrpp;
		reward.view("","",document.getElementById('orderby').value,document.getElementById('order').value,document.getElementById('st_pos').value,document.getElementById('nrpp').value,'',"","","");

	}
        function reward_check(){
            if(document.getElementById('title').value==""||document.getElementById('sub_title').value==""||document.getElementById('points').value==""||document.getElementById('r_quantity').value==""||document.getElementById('r_hurry_limit').value==""||document.getElementById('r_status').value=="-1"){
                alert("Please fill all the fields.");
                return false;
            }
            else if(document.getElementById('points').value<=0){
                alert("Points has to be a positive integer");
                return false;
            }
            else if(document.getElementById('r_quantity').value<0){
                alert("Quantity can not be negative");
                return false;
            }
            else if(document.getElementById('r_hurry_limit').value<=0){
                alert("Hurry Limit has to be a positive integer");
                return false;
            }
            else if(document.getElementById('r_quantity').value>document.getElementById('r_total_quantity').value){
                alert("Total Quantity can not be less than Remaining Quantity.");
                return false;
            }
            else if(document.getElementById('r_quantity').value<document.getElementById('r_hurry_limit').value){
                alert("Quantity can not be less than Hurry Limit");
                return false;
            }
            else
            {
                document.rewardfrm.target="submitframe";
                document.rewardfrm.submit();               
            }
        }
	{/literal}
	</script><div id="reward_data"></div><script>
	reward= new cn_ajax("reward","reward_data");
	reward.view("","{$msg}","","","","","","","","");
</script>
{/block}
