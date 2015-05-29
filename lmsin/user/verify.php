<?php
include("../includes/common.php");

 
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_real_escape_string($_GET['email']); // Set email variable
    $hash = mysql_real_escape_string($_GET['hash']); // Set hash variable
                 
    $search = "SELECT user_id,user_email, hash, active FROM users WHERE user_email='".$email."' AND hash='".$hash."' AND active='0'";
    eq($search,$rs);
    $match  = mysql_num_rows($rs);
                 
    if($match > 0){
        // We have a match, activate the account
        $s = "UPDATE users SET active='1' WHERE user_email='".$email."' AND hash='".$hash."' AND active='0'";
        eq($s,$rs);
        echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
       // $_COOKIE[UserId] = $rs[user_id];
       // setcookie("UserId",$rs[user_id],time()+86400,"/");
      
        header("Location:index.php?act=show_login");
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}



?>
