<?php
$today = getdate();
$year= $today['year'];
$month=$today['month'];
$wday= $today['wday'];
$seconds=$today['seconds'];
echo $month."<br>";
echo $year."<br>";
echo $wday."<br>";
echo $seconds."<br>";
print_r($today);

echo "<br><br><br><br>";
$cond="AND (";
$i= strlen($cond);
echo $i;
?>