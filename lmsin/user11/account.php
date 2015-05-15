<!DOCTYPE html>
<html>
<head>
    <title>User Account Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="generic-notForTabs.css" rel="stylesheet" type="text/css" />
    <link href="template1/responsive-tabs.css" rel="stylesheet" type="text/css" />
    <script src="responsive-tabs.js" type="text/javascript"></script>
</head>
<body class="bd1">
    <div id="demopage">
        <h3>User Account</h3>
       
        <div class="container1">
            <ul class="rtabs">
                <li><a href="#view1"><img src="content/free.png" alt="" />Free User</a></li>
                <li><a href="#view2"><img src="content/premium.png" alt="" />Premium USer</a></li>
                <li><a href="#view3"><img src="content/super_premium.png" alt="" /> Super Premium User</a></li>
            </ul>
            <div class="panel-container">
                <div id="view1">
				<?php
include("../includes/common.php");
init();
$uses_social_login = 0;
$func_ary = array("display_profile", "edit_profile", "save_profile_changes", "change_password", "upload_new_profile_image");


    if (in_array($_REQUEST["act"], $func_ary)) {
        $_REQUEST["act"]();
    }else {
        display_profile();//default to displaying profile
    }





function display_profile(){
    $user_account_info = get_account_info();
    $smarty = new Smarty;
    $smarty->assign($user_account_info);
    $smarty->display("view_account.tpl");
}

function edit_profile(){
    $user_account_info = get_account_info();
    $country_list = get_new_option_list('countries','countries_id','countries_name','',$country_name,0,"",1);
    $smarty = new Smarty;
    $smarty->assign($user_account_info);
    $smarty->assign("country_name", $country_list);
    if (isset($_REQUEST["pw_msg"])){
        $smarty->assign("pw_msg", $_REQUEST["pw_msg"]);
    }else {
        $smarty->assign("pw_msg", "");
    }
    if (isset($_REQUEST["image_msg"])){
        $smarty->assign("image_msg", $_REQUEST["image_msg"]);
    }else {
        $smarty->assign("image_msg", "");
    }
    
    $smarty->display("edit_account.tpl");
}

function get_account_info(){
    //returns assoc array with the user's account information
    $user_id = $_COOKIE['UserId'];//get the user_id of signed in user
    $get_user_SQL = "SELECT * FROM users WHERE user_id='$user_id'";
    eq($get_user_SQL, $unparsed_user);
    $user = mfa($unparsed_user);
    
    $fname = ucfirst($user['user_fname']);
    $lname = ucfirst($user['user_lname']);
    $email = $user['user_email'];
    $gender = $user['user_gender'];
    $dob = $user['user_dob'];
    $zip = $user['user_zipcode'];
    $country = get_country_name($user['user_country']);
    $profile_image = $user['user_profile_image'];
    $activated = $user['user_activated'];
    if ($activated > 1){
        global $uses_social_login;
        setcookie('uses_social_login', '1');
    }
    if ($profile_image == '0'){//no image set
        $profile_image = "./images/dashboard/user.jpg";//default image
    }
    
    $info = array("fname"=>$fname, 
                  "lname"=>$lname, 
                  "email"=>$email, 
                  "gender"=>$gender, 
                  "dob"=>$dob, 
                  "zipcode"=>$zip, 
                  "country"=>$country, 
                  "profile_image"=>$profile_image,
                  "user_activated"=>$activated);
    return $info;
}

function save_profile_changes(){
    $user_id = $_COOKIE['UserId'];
    $user_current_vals = get_account_info();
    //check different fields to make as few queries as possible
    if ($_REQUEST["user_fname"] != $user_current_vals["fname"]){
        update_profile("user_fname", $_REQUEST["user_fname"]);
    }else if ($_REQUEST["user_lname"] != $user_current_vals["lname"]){
        update_profile("user_lname", $_REQUEST["user_lname"]);
    }else if ($_REQUEST["user_dob"] != $user_current_vals["dob"]){
        update_profile("user_dob", $_REQUEST["user_dob"]);
    }else if ($_REQUEST["user_email"] != $user_current_vals["email"] && ($_COOKIE['uses_social_login'] != "1")){
        update_profile("user_email", $_REQUEST["user_email"] );
    }else if ($_REQUEST["user_zip"] != $user_current_vals["zipcode"]){
        update_profile("user_zipcode", $_REQUEST["user_zipcode"]);
    }else if (($_REQUEST["user_country"] != $user_current_vals["country"]) && ($_REQUEST["user_country"] == -1)){
        update_profile("user_country", $_REQUEST["user_country"]);
    } 
    display_profile();
}

function change_password(){
    $user_id = $_COOKIE['UserId'];
    $user_current_pass = md5($_REQUEST["old_pass"]);
    if (get_row_con_info("users","where user_id='$user_id' AND user_password='$user_current_pass' AND user_activated>0 limit 0,1","",$user)){//user correctly entered old password
        if ($_REQUEST['new_pass'] == $_REQUEST['confirm_new_pass']) {//new passwords match
            update_profile("user_password", md5($_REQUEST['new_pass']));
            $password_msg = "Password changed succesfully.";
        }else {
            $password_msg = "Please reconfirm passwords.";
        }
    }else {
        $password_msg = "Incorrect password.";
    }
    header("Location: account_info.php?act=edit_profile&pw_msg=$password_msg");
}

function upload_new_profile_image(){
    ini_set("file_uploads", "on");
    $Upload_Path = "../../uploads/";
    if ($_POST["type"] == "file"){//file upload
        $original_name = $Upload_Path.basename($_FILES['new_profile_image']['name']);
        $image_file_type = pathinfo($original_name, PATHINFO_EXTENSION);
        $upload_ok = 1;//used to check errors
        if (isset($_POST['submit'])){
            $check = getimagesize($_FILES['new_profile_image']['tmp_name']);
            if ($check == false) {
                $image_msg = "File is not an image. Please upload an image file.";
                $upload_ok = 0;
            }
        }
        global $uses_social_login;
        if ($_COOKIE['uses_social_login'] == "1"){
            $upload_ok = 0;
            $image_msg = "Unable to upload file.";
        }
        if ($_FILES['new_profile_image']['size'] > 50000){//limit size
            $upload_ok = 0;
            $image_msg =  "File too big. Please upload a smaller file.";
        }
        if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {//limit file type
            $image_msg = "Sorry, only JPG, JPEG, and PNG files are allowed. Please upload a different file type.";
            $upload_ok = 0;
        }
        if ($upload_ok){
            $target_file_name = get_new_file_name().".".$image_file_type;
            if (move_uploaded_file($_FILES['new_profile_image']['tmp_name'], $target_file_name)){
                $image_msg = "File upload successful.";
                update_profile("user_profile_image", $target_file_name);
            }else {
                $image_msg = "Unable to upload file: $original_name.";
            }
        }
    }else if ($_POST["type"] == "url"){//upload from url
        ini_set("allow_url_fopen", "true");
        $url = $_POST["image_url"];//get the url
        $target_file_name = get_new_file_name().".jpg";
        if (!$_COOKIE['uses_social_login'] == "1"){
            if (file_put_contents($target_file_name, file_get_contents($url))){
                update_profile("user_profile_image", $target_file_name);
                $image_msg = "File upload succesful.";
            }else {
                $image_msg = "Unable to upload image.";
            }
        }else {
            $image_msg = "Unable to upload image.";
        }
    }else if ($_POST["type"] == "webcam"){
        $image_base64 = $_POST['webcam_image'];
        $image = base64_decode(str_replace('data:image/jpeg;base64,', '', $image_base64));
        $target_file_name = get_new_file_name().".jpg";
        if (!$_COOKIE['uses_social_login'] == "1"){
            if(file_put_contents($target_file_name, $image)){
                $image_msg = "File upload succesful.";
                update_profile("user_profile_image", $target_file_name);
            }else {
                $image_msg = "Unable to upload file.";
            }
        }else {
            $image_msg = "Unable to upload file.";
        }
    }
    header("Location: account_info.php?act=edit_profile&image_msg=$image_msg");
}

function update_profile($setting, $new_value){
    //updates specific value
    $user_id = $_COOKIE['UserId'];
    $update_SQL = "UPDATE users SET $setting='$new_value' WHERE user_id='$user_id'";
    eq($update_SQL, $response);
}

function get_country_name($country_number){//returns name of country for country id
    $get_country_SQL = "SELECT countries_name FROM countries WHERE countries_id='$country_number'";
    eq($get_country_SQL, $country);
    $country_name = mfa($country)['countries_name'];
    return $country_name;
}

function get_new_file_name(){
    //creates a new file name that doesn't already exist
    $user_id = $_COOKIE["UserId"];
    $Upload_Path = "../../uploads/";
    $file_name = $Upload_Path.$user_id."_profile_image_".rand(1, 10000);
    if (!file_exists($file_name)){
        return $file_name;
    }else {
        get_new_file_name();
    }
}



?> 
               </div>
                <div id="view2">
                    <h4>Premium User </h4>
                    <p></p>
					<p></p>
					<p></p>
                
                </div>
                <div id="view3">
                    <h4>Super Premium User</h4>
                </div>
            </div>
            <br />
           </div>
    </div>
</body>
</html>