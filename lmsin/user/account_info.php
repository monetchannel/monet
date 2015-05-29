<?php
include("../includes/common.php");
init();
global  $filespath;
$uses_social_login = 0;

$func_ary = array("display_profile", "edit_profile", "save_profile_changes", "change_password", "upload_new_profile_image");

if (in_array($_REQUEST["act"], $func_ary)) {
    $_REQUEST["act"]();
}else {
    display_profile();//default to displaying profile
}

function display_profile(){
//global $user_data;
    $smarty = new Smarty;
    $user_data= array();
    global  $filespath;
    $userimage="";
    $user_id = $_COOKIE['UserId'];
    $user_data = get_account_info();
    
    get_new_option_list('countries','countries_id','countries_name',$user_data[user_country],$country_name,0,"",1);
    
    $get_up_SQL = "SELECT * FROM `uploads` WHERE up_s_type='user_profile_photo' and up_s_id=$user_id";
    if(eq($get_up_SQL, $unparsed_upload)){
        $upload = mfa($unparsed_upload);
	
        $user_data['up_fname']=$upload['up_fname'];
        $userimage= $filespath."uploads/thumb_".$upload['up_fname'].$upload['up_ext'];
    }
    
    $smarty->assign(array("user_data"=>$user_data, 
			  "country"=>$country_name,
    			  "userimage"=>$userimage,
                   	));//assing values to template
    $smarty->display("view_account.tpl");
}

function edit_profile(){
    
    $smarty = new Smarty;
    global  $filespath;
    global $Server_View_Path;
    $userimage="";
    $ui = $_COOKIE[UserId];
    $user_data = get_account_info();
    
    $m = "user_profile_photo";
    $qr = "select * from uploads where up_s_id = '$ui' and up_s_type = '$m'";
    if(eq($qr, $unparsed_upload)){
        $upload = mfa($unparsed_upload);
	$user_data['up_fname']=$upload['up_fname'];
        $userimage= $filespath."uploads/thumb_".$upload['up_fname'].$upload['up_ext'];
    }
    
    
    get_new_option_list('countries','countries_id','countries_name',$user_data[user_country],$country_name,0,"",1);
    
    $smarty->assign(array("user_data"=>$user_data,
                          "user_upload"=>$user_upload,
			  "country"=>$country_name,
    			  "userimage"=>$userimage,
                   	));
    
    
    /*$smarty->assign($user_account_info);
    $smarty->assign("country_name", $country_list);
    $smarty->assign("userimage", $user_image);
    $smarty->assign("user_data", $user_data);
    if (isset($_REQUEST["pw_msg"])){
        $smarty->assign("pw_msg", $_REQUEST["pw_msg"]);
    }else {
        $smarty->assign("pw_msg", "");
    }
    if (isset($_REQUEST["image_msg"])){
        $smarty->assign("image_msg", $_REQUEST["image_msg"]);
    }else {
        $smarty->assign("image_msg", "");
    }*/
    
   $smarty->display("edit_account.tpl");
}

function get_account_info(){
    $user=array();
    $user_id = $_COOKIE['UserId'];//get the user_id of signed in user
    
    $user_SQL = "SELECT * FROM users WHERE user_id=$user_id";
    eq($user_SQL, $unparsed_user);
    $user = mfa($unparsed_user);
    $country_id=$user['user_country'];

    $country_SQL= "SELECT countries_name FROM `countries` WHERE countries_id=$country_id";
    eq($country_SQL, $name_row);
    $name_row = mfa($name_row);
    $user['countries_name']= $name_row['countries_name'];

    return $user;
}

function save_profile_changes(){
    $user_id = $_COOKIE['UserId'];
    $user_current_vals = get_account_info();
    //check different fields to make as few queries as possible
    if ($_REQUEST["user_fname"] != $user_current_vals["user_fname"]){
        update_profile("user_fname", $_REQUEST["user_fname"]);
        
    } if ($_REQUEST["user_lname"] != $user_current_vals["user_lname"]){
        update_profile("user_lname", $_REQUEST["user_lname"]);
        
    } if ($_REQUEST["user_dob"] != $user_current_vals["user_dob"]){
        update_profile("user_dob", $_REQUEST["user_dob"]);
    } if ($_REQUEST["user_email"] != $user_current_vals["user_email"] && ($_COOKIE['uses_social_login'] != "1")){
        update_profile("user_email", $_REQUEST["user_email"] );
    } if ($_REQUEST["user_zip"] != $user_current_vals["user_zipcode"]){
        update_profile("user_zipcode", $_REQUEST["user_zipcode"]);
    } if (($_REQUEST["user_country"] != $user_current_vals["user_country"]) && ($_REQUEST["user_country"]!= -1)){
        update_profile("user_country", $_REQUEST["user_country"]);
    } 
    unset($_COOKIE[UserName]);
        setcookie("UserName",$_REQUEST["user_fname"]." ".$_REQUEST["user_lname"],time()+86400,"/");
   // setcookie("UserName",$user[user_fname]." ".$user[user_lname],time()+86400,"/");
    //display_profile();
     header("Location: watch_video.php?act=browse_videos");
}

function change_password(){
    $user_id = $_COOKIE['UserId'];
    $user_current_pass = md5($_REQUEST["old_pass"]);
    if (get_row_con_info("users","where user_id='$user_id' AND user_password='$user_current_pass'  limit 0,1","",$user)){//user correctly entered old password
        if ($_REQUEST['new_pass'] == $_REQUEST['confirm_new_pass']) {//new passwords match
            update_profile("user_password", md5($_REQUEST['new_pass']));
            $password_msg = "Password changed succesfully.";
        }else {
            $password_msg = "Please reconfirm passwords.";
        }
    }else {
        $password_msg = "Incorrect password.";
    }
    header("Location: watch_video.php?msg=$password_msg");
}

function upload_new_profile_image(){
   // unset($_COOKIE[UserName]);
      //  setcookie("UserName",$_REQUEST["user_fname"]." ".$_REQUEST["user_lname"],time()+86400,"/");
   // unset($_COOKIE[userimage]);
   // setcookie("userimage",$userimage,time()+86400,"/");
    ini_set("file_uploads", "on");
    global $Upload_Path;
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
        /*global $uses_social_login;
        if ($_COOKIE['uses_social_login'] == "1"){
            $upload_ok = 0;
            $image_msg = "Unable to upload file.";
        }*/
        if ($_FILES['new_profile_image']['size'] > 500000){//limit size
            $upload_ok = 0;
            $image_msg =  "File too big. Please upload a smaller file.";
        }
        if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {//limit file type
            $image_msg = "Sorry, only JPG, JPEG, and PNG files are allowed. Please upload a different file type.";
            $upload_ok = 0;
        }
        if ($upload_ok){
            $ui = $_COOKIE["UserId"];
            $temp = get_new_file_name();
            $target_file_name = $Upload_Path."thumb_".$temp.".".$image_file_type;
            if(move_uploaded_file($_FILES['new_profile_image']['tmp_name'], $target_file_name)){
                $image_msg = "File upload successful.";
                $_COOKIE[userimage]=$target_file_name;
                //setcookie("userimage",$target_file_name,time()+86400,"/");
                //update_profile("user_profile_image", $target_file_name);
                $imgext = ".".$image_file_type;
                
                $m = "user_profile_photo";
                $qr = "select * from uploads where up_s_id = '$ui'";
                if(eq($qr,$r)){
                    $q = "UPDATE uploads SET up_fname='$temp', up_ext='$imgext', up_s_type = '$m' WHERE up_s_id='$ui'";
                }else{
                    $q = "Insert into uploads (up_s_id, up_fname, up_ext, up_s_type) values ('$ui', '$temp', '$imgext', '$m')";
                }
                eq($q,$rst);
                     
            }else {
                $image_msg = "0-Unable to upload file: $original_name.";
            }
        }
    }else if ($_POST["type"] == "url"){//upload from url
        $ui = $_COOKIE["UserId"];
        $temp = get_new_file_name();
        $target_file_name = $Upload_Path."thumb_".$temp.".".$image_file_type;
        ini_set("allow_url_fopen", "true");
        $url = $_POST["image_url"];//get the url
        //$target_file_name = get_new_file_name().".jpg";
        //if (!$_COOKIE['uses_social_login'] == "1"){
            if (file_put_contents($target_file_name, file_get_contents($url))){
                //update_profile("user_profile_image", $target_file_name);
                $imgext = ".".$image_file_type;
                $m = "user_profile_photo";
                $qr = "select * from uploads where up_s_id = '$ui'";
                //$tr = eq($qr,$r);
                if (eq($qr,$r))
                    $q = "UPDATE uploads SET up_fname='$temp', up_ext='$imgext', up_s_type = '$m' WHERE up_s_id='$ui'";
                 else
                    $q = "insert into uploads (up_s_id, up_fname, up_ext, up_s_type) values ('$ui', '$temp', '$imgext', '$m')";
                
                eq($q,$rst);
                $image_msg = "File upload succesful.";
                //$_COOKIE[userimage]=$target_file_name;
                //setcookie("userimage",$target_file_name,time()+86400,"/");
            }else {
                $image_msg = "1-Unable to upload image.";
            }
        /*}else {
            $image_msg = "2Unable to upload image.";
        }*/
    }else if ($_POST["type"] == "webcam"){
        $ui = $_COOKIE["UserId"];
        $temp = get_new_file_name();
        $target_file_name = $Upload_Path."thumb_".$temp.".".$image_file_type;
        $image_base64 = $_POST['webcam_image'];
        $image = base64_decode(str_replace('data:image/jpeg;base64,', '', $image_base64));
        // $target_file_name = get_new_file_name().".jpg";
        //if (!$_COOKIE['uses_social_login'] == "1"){
            if(file_put_contents($target_file_name, $image)){
                $image_msg = "File upload succesful.";
                //$_COOKIE[userimage]=$target_file_name;
                //setcookie("userimage",$target_file_name,time()+86400,"/");
                //update_profile("user_profile_image", $target_file_name);
                $imgext = ".".$image_file_type;
                $m = "user_profile_photo";
                $qr = "select * from uploads where up_s_id = '$ui' and up_s_type = '$m'";
                $tr = eq($qr,$r);
                if ($tr==0)
                    $q = "insert into uploads (up_s_id, up_fname, up_ext, up_s_type) values ('$ui', '$temp', '$imgext', '$m')";
                else
                    $q = "UPDATE uploads SET up_fname='$temp', up_ext='$imgext', up_s_type = '$m' WHERE up_s_id='$ui'";
                    
                eq($q,$rst);
            }else {
                $image_msg = "3-Unable to upload file.";
            }
        /*}else {
            $image_msg = "4Unable to upload file.";
        }*/
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
    $country_name = mfa($country);
    return $country_name;
}

function get_new_file_name(){
    //creates a new file name that doesn't already exist
    $user_id = $_COOKIE["UserId"];
    $Upload_Path = "../../uploads/";
    $file_name = rand(1, 1000000);
    if (!file_exists($file_name)){
        return $file_name;
    }else {
        get_new_file_name();
    }
}
