<?php
set_time_limit(0);
include ("../includes/common.php");
init();
update_rating_status();
function update_rating_status()
{
	//$cf_ids=implode(",",$cf_ids);
	//if(!$cf_ids)$cf_ids=0;
	//$SQL="SELECT DISTINCT(c_id) from content where c_id IN (Select DISTINCT(cf_c_id) from content_feedback where cf_id IN ($cf_ids))";
		
	$SQL = "SELECT *  FROM content where c_id IN (Select DISTINCT(cf_c_id) from content_feedback)";
	$tot_rows=eq($SQL,$rs_data);
	if($tot_rows>0)
	{
		while($c_data=mfa($rs_data))
		{
			$SQL="Select ar_id from analysis_results left join content_feedback on ar_cf_id=cf_id where cf_c_id='$c_data[c_id]'";
			$tot=eq($SQL,$rs);
			if($tot>0)
			{
				$positive=0;
				$negative=0;
				$neutral=0;
				while($data=mfa($rs))
				{
					$positive+=get_row_count("analysis_detail","where ad_ar_id='$data[ar_id]' and ad_valence>0");	
					$negative+=get_row_count("analysis_detail","where ad_ar_id='$data[ar_id]' and ad_valence<0");	
					$neutral+=get_row_count("analysis_detail","where ad_ar_id='$data[ar_id]' and ad_valence=0");	
					//print "Positive: ".$positive.", Negative: ".$negative.", Neutral: ".$neutral."<br>";
				}
				$total=$positive+$negative+$neutral;//Overall Total				
				if($total>0)
				{
					$positive_percent=($positive/$total)*100;
					$negative_percent=($negative/$total)*100;
					$neutral_percent=($neutral/$total)*100;
					////////////////////////////////////
					$pos_neg_total=$positive_percent+$negative_percent;
					$c_tot_positive=($positive_percent/$pos_neg_total)*100;
					$c_tot_negative=($negative_percent/$pos_neg_total)*100;
					
					$SQL="Update content set c_tot_positive='$c_tot_positive',c_tot_negative='$c_tot_negative' where c_id='$c_data[c_id]'";
					eq($SQL,$rs1,1);
				}
			}
		}
	}
}
print"Successflly run";
?>