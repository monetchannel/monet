<?php
require_once ('../includes/jpgraph/jpgraph.php');
include "../includes/jpgraph/jpgraph_line.php";
require_once ('../includes/common.php');
init();
analysis_graph();
function analysis_graph()
{
	$R=DIN_ALL($_REQUEST);
	global $STDMUL;
	
	$datax = array();
	$datay_valence=array();
	$SQL = "SELECT ad_time,ad_valence FROM analysis_detail WHERE ad_ar_id = '$R[ad_ar_id]' ORDER BY ad_time,ad_valence ";
	$tot_rows=eq($SQL,$rs);
	while($data=mfa($rs))
	{
		$ad_time_ary=explode("00:00:",$data[ad_time]);
		array_push($datax,(float)$ad_time_ary[1]);
		array_push($datay_valence,(float)$data[ad_valence]);
	}
	
	$graph = new Graph(600,300);
	$graph->img->SetMargin(40,40,40,40);	
	$graph->img->SetAntiAliasing();
	//$graph->SetScale("textlin");
	
	$graph->SetScale('linlin'); 
	$graph->yaxis->scale->ticks->Set(1); // Set major and minor tick to 10 
	//$graph->xaxis->SetPos('min');
	
	$graph->SetShadow();
	$graph->title->Set("Analysis Results");
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
?>