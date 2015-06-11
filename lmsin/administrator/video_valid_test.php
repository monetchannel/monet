<?php
include("../includes/common.php");
set_time_limit(0);


$SQL = "SELECT c_id,c_title,c_url from content where valid=1";
eq($SQL,$vd);
$del_vid = array();
$del_vid_num = 0;

while ($data = mfa($vd)) {
	$temp = check_vid_exist($data[c_url]);
        if ($temp == 0) {
            array_push($del_vid,$data);
            $del_vid_num++;
            
        }
	$SQL1 = "UPDATE content SET valid='$temp' WHERE c_id='$data[c_id]'";
	eq($SQL1,$rs);
}
echo $del_vid_num;
$smarty = new Smarty;
$smarty->assign("del_vid",$del_vid);
$smarty->assign("del_vid_num",$del_vid_num);
$smarty->display("del_vid.tpl");


?>
