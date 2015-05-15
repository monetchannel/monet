<?php
ini_set('max_execution_time','300');
ini_set('max_upload_size','128M');
ini_set('memory_limit','128M');
ini_set('post_max_size','128M');


	$filename = $_POST["filename"];
		$uploadDirectory = '../../video_files/'.$filename;
	if (isset($_FILES["video-blob"])) {
	
		$filename = $_POST["filename"];
		$uploadDirectory = '../../video_files/'.$filename;
	
		if (!move_uploaded_file($_FILES["video-blob"]["tmp_name"], $uploadDirectory)) {
			echo("Problem moving uploaded file");
		}
	
		echo($uploadDirectory);
	}
	else {
		echo("No Files");
	}
?>