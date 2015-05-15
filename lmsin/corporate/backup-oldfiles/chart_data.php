<?php
srand((double)microtime()*1000000);
	
	
	
	$data_1 = array();
	$data_2 = array();
	$data_3 = array();
	$data_4 = array();
	$data_4 = array();
	$data_6 = array();
	$data_7 = array();
	$data_8 = array();

	$datay=array();
	$datax=array('Left eye x','Left eye y','Left eye width','Left eye height','Right eye x','Right eye y','Right eye width','Right eye height');
	$handle=fopen("1353.csv","r");
	$j=0;$count=0;
	while($col_ary=fgetcsv($handle,1000,","))
	{
		if($i==0)      {  $i++;       continue;      }
		$i++;
		foreach($datax as $k=>$v)
		{
			if($col_ary[$k]=='-1' || $col_ary[$k]=='')
				$col_ary[$k]=0;
			$datay[$v][$i]=$col_ary[$k];

		}
		
	}
	
	
	
	$data_1 = $datay['Left eye x'];
	$data_2 = $datay['Left eye y'];
	$data_3 = $datay['Left eye width'];
	$data_4 = $datay['Left eye height'];
	$data_4 = $datay['Right eye x'];
	$data_6 = $datay['Right eye y'];
	$data_7 = $datay['Right eye width'];
	$data_8 = $datay['Right eye height'];
	
	
	/*$data_1 = array();
	$data_2 = array();
	$data_3 = array();
	for( $i=0; $i<12; $i++ )
	{
	  $data_1[] = rand(14,19);
	  $data_2[] = rand(8,13);
	  $data_3[] = rand(1,7);
	}
	*/
	
	include_once( 'ofc_library/open-flash-chart.php' );
	$g = new graph();
	$g->title( 'Video Analysis Result', '{font-size: 20px; color: #736AFF}' );
	
	// we add 3 sets of data:

	$g->set_data( $data_1 );
	$g->set_data( $data_2 );
	$g->set_data( $data_3 );
	$g->set_data( $data_4 );
	$g->set_data( $data_5 );
	$g->set_data( $data_6 );
	$g->set_data( $data_7 );
	$g->set_data( $data_8 );

	

	// we add the 3 line types and key labels
	$g->line( 2, '0x9933CC', 'Left eye x', 10 );
	$g->line_dot( 2, 5, '0xCC3399', 'Left eye y', 10);    // <-- 3px thick + dots
	$g->line_hollow( 2, 4, '0x80a033', 'Left eye width', 10 );
	$g->line( 2, '0x08c44f', 'Left eye height', 10 );
	$g->line_dot( 2, 5, '0x6b05c1', 'Right eye x', 10);    // <-- 3px thick + dots
	$g->line_hollow( 2, 4, '0xb80989', 'Right eye y', 10 );
	$g->line( 2, '0x0961a4', 'Page views', 10 );
	$g->line_dot( 2, 5, '0x0974a6', 'Right eye width', 10);    // <-- 3px thick + dots
	$g->line_hollow( 2, 4, '0xadc687', 'Right eye height', 10 );
	
	
	$g->set_x_max(60);
	//$g->set_x_labels( $datax );
	$g->set_x_label_style( 10, '0x000000', 0, 2 );

	$g->set_y_max( 150 );
	$g->y_label_steps( 10 );
	//$g->set_y_legend( 'Open Flash Chart', 12, '#736AFF' );
	echo $g->render();
?>
