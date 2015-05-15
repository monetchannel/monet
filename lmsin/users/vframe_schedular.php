<?php
include("../includes/common.php");
include("account_setting.php");
include_once '../includes/common_functions.php';

init();

$action = $_POST['action'];

switch ($action) {
    case "zip_handler":
    
        $uploaddir = realpath('./') . '/extracted_frames/';
        $uploadfile = $uploaddir . basename($_FILES['file_contents']['name']);
        $cf_id = $_POST['cf_id'];
        $video_name = $_POST['video_name'];
        $cf_frames_directory = $uploaddir."/".$cf_id;

        if (move_uploaded_file($_FILES['file_contents']['tmp_name'], $uploadfile)) {

            // firstly make a directory which store the frames for a particular content feedback
            if(!file_exists($cf_frames_directory)){
                mkdir($cf_frames_directory, 0777);
            }

            // Now extract all frames from zip file 
            $zip = new ZipArchive;
            if ($zip->open($uploadfile) === TRUE) {
                $zip->extractTo($cf_frames_directory);
                $zip->close();

                // now delete zip file after extraction
                deleteFolder($uploadfile);       
                echo 'Zip file extracted successfuly for video file : '.$video_name;
            } else {
                echo 'Zip file extraction failed for video file : '.$video_name;
            }

        }else{
            echo 'Error occured.';
        }
        
        break;
        
    case "save_bulk_emotions":
        
        $insQuery = $_POST['bulk_ins_query'];        
        $insQuery = stripslashes($insQuery);
        
        $delQuery = $_POST['bulk_del_query'];        
        $delQuery = stripslashes($delQuery);
        
        $exec_resp = mysql_query($insQuery);
        if(!$exec_resp){
            die(mysql_error());
        }else{
            // delete content feedback id's whose emotions data inserted successfully  
            $delResp = mysql_query($delQuery);
            if($delResp){
                echo "Captured emotions saved successfully.";
            }else{
                echo "Captured emotions saved successfully. But deletion of records from the table 'framing_remined_videos' failed due to server error : </br/>".mysql_error();
            }
        }
        
        default;

    default:
        break;
}


?>