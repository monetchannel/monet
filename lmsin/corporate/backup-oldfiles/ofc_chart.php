<?php
include_once('ofc_library/open_flash_chart_object.php');
open_flash_chart_object( 850, 300, "chart_data.php" );



$data_1 = array();
$data_2 = array();
$data_3 = array();
$datax=array('Left eye x','Left eye y','Left eye width','Left eye height','Right eye x','Right eye y','Right eye width','Right eye height');
$datay=array();
$handle=fopen("1255.csv","r");
$count=0;
while($col_ary=fgetcsv($handle,1000,","))
{
	if($i==0)      {  $i++;       continue;      }
	$i++;
	foreach($datax as $k=>$v)
	{
		$datay[$v][$i]=$col_ary[$k];
	}
	$count++;

}
	
	/*foreach($datay as $k=>$v)
	{
		$data_1=$datay[$v];
		//print_r($data_1);
	}*/
	
	$data_1 = $datay['Left eye x'];
	$data_2 = $datay['Left eye y'];
	$data_3 = $datay['Left eye width'];
	$data_4 = $datay['Left eye height'];
	$data_4 = $datay['Right eye x'];
	$data_6 = $datay['Right eye y'];
	$data_7 = $datay['Right eye width'];
	$data_8 = $datay['Right eye height'];
	
	//print_r($data_3);
	
	
	/*for( $i=0; $i<12; $i++ )
	{
	  $data_1[] = rand(14,19);
	  $data_2[] = rand(8,13);
	  $data_3[] = rand(1,7);
	}*/
	
	//print_r($data_3);
?>