<?php
include("../includes/common.php");
init();

for ($i = 0; $i < 280; $i++) {
    echo "<p>$i</p>";
    if (get_row_count("users", "WHERE user_id='$i'")){
        $get_email_SQL = "SELECT user_email FROM users WHERE user_id='$i'";
        eq($get_email_SQL, $email_row);
        $user_email = mfa($email_row)["user_email"];
        echo "<p>$user_email</p>";
        $update_SQL = "UPDATE users SET user_activation_num='".md5($user_email)."' WHERE user_id='$i'";
        eq($update_SQL, $rs);
    }
}

