<?php
include("../../includes/common.php");
init();
global $Server_View_Path;
//check state
if ($_REQUEST["state"] != $_COOKIE["google_state"]){//if the states don't match
    header("HTTP/ 401 Invalid state paramater");
    exit;
}
else if (isset($_REQUEST["error"]) && $_REQUEST["error"] != '') {//user pressed cancel button on login form
    header("Location: {$Server_View_Path}user/index.php?act=show_login&msg=sign_in");
}else {//everything went as expected
    $code = $_REQUEST['code'];
    header("Location: {$Server_View_Path}user/index.php?act=google_login&code=$code");
}


