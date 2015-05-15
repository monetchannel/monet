<?php
include("../../includes/common.php");
$c_id = $_GET['c_id'];

$c_id = mysql_real_escape_string($c_id);

$query = "SELECT * FROM states WHERE states_countries_id='$c_id'";
$qry_result = mysql_query($query) or die(mysql_error());

$option = "<option value=\"0\" st_0>State</option>";
// Insert a new row in the table for each person returned
while($data = mysql_fetch_array($qry_result)){
	$option.="<option  value=\"$data[states_id]\" st_$data[states_id]>$data[states_name]</option>";	
}
echo $option;
?>