<?php
set_time_limit(0);
require_once ('../includes/jpgraph/jpgraph.php');
include "../includes/jpgraph/jpgraph_line.php";
require_once ('../includes/common.php');
init();
analysis_graph_avg();
function analysis_graph_avg()
{
	$R=DIN_ALL($_REQUEST);
	global $STDMUL;
	
	$datax = array();
	$datay_valence=array();
		
	 get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id left join content on c_id=cf_c_id","where ar_id='$_REQUEST[ad_ar_id]'","c_id",$vd);
	 $ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$vd[c_id]'");
	 $ar_ids = implode(',',$ary);
	
	//$SQL = "SELECT  distinct(ad_time) as detail_time,(Select AVG(ad_valence) from analysis_detail where ad_ar_id IN($ar_ids) and ad_time=detail_time ) as valence FROM analysis_detail  WHERE ad_ar_id IN($ar_ids)  ORDER BY ad_time ASC ;";
	$SQL = "SELECT  distinct(ad_time) FROM analysis_detail  WHERE ad_ar_id IN($ar_ids)  ORDER BY ad_time ASC ;";
	$tot_rows=eq($SQL,$rs1);
	while($data=mfa($rs1))
	{
		get_row_con_info("analysis_detail","where ad_ar_id IN ($ar_ids) and ad_time='$data[ad_time]';","AVG(ad_valence) as valence",$vlc);
		//print "Time:".$data[detail_time].", Valence:".$data[valence]."<br>";
		$ad_time_ary=explode("00:00:",$data[ad_time]);
		array_push($datax,(float)$ad_time_ary[1]);
		array_push($datay_valence,(float)$vlc[valence]);
	}
	
	$graph = new Graph(600,300);
	$graph->img->SetMargin(40,40,40,40);	
	$graph->img->SetAntiAliasing();
	//$graph->SetScale("textlin");
	
	$graph->SetScale('linlin'); 
	$graph->yaxis->scale->ticks->Set(1); // Set major and minor tick to 10 
	//$graph->xaxis->SetPos('min');
	
	$graph->SetShadow();
	$graph->title->Set("Average Analysis Results");
	$graph->title->SetFont(FF_FONT1,FS_BOLD);
	
	// Use 20% "grace" to get slightly larger scale then min/max of
	// data
	$graph->yscale->SetGrace(20);

	$graph->xaxis->title->Set("Time");
	$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
	$graph->yaxis->title->Set("Intensity");
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
	
	$p1 = new LinePlot($datay_valence,$datax);
	
	$graph->Add($p1);
	
	$graph->legend->SetFrameWeight(1);
	$graph->Stroke();
}
function get_ad_valence($time,$ar_id)
{
	$valence=0.0;
	$SQL = "SELECT  ad_valence FROM analysis_detail  WHERE ad_ar_id = '$ar_id' and ad_time='$time' ";
	$tot_rows=eq($SQL,$rs);
	while($data=mfa($rs))
	{
		$valence+=(float)$data[ad_valence];
	}
	return $valence;
}
?>