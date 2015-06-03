<?php

include ("../includes/common.php");

$smarty = new Smarty;
$smarty->assign(array("analysis_tab"=>"selected","premium_tab"=>"label"));
$smarty->display('premium.tpl');

?>
