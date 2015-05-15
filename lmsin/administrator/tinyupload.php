<?php
/**
Tiny Upload

upload.php

This file does the uploading
*/
/*
//###### Config ######
$absPthToSlf = 'http://portalforce.com/tinyupload.php'; //The Absolute path (from the clients POV) to this file.
$absPthToDst = 'http://portalforce.com/tinymce_uploads/'; //The Absolute path (from the clients POV) to the destination folder.
$absPthToDstSvr = '/var/www/html/tinymce_uploads/'; //The Absolute path (from the servers POV) to the destination folder. You will need to set permissions for this dir 0777 worked ok for me.
*/
//###### Config ######
$absPthToSlf = 'http://192.168.5.22/siri/new/tinyupload.php'; //The Absolute path (from the clients POV) to this file.
$absPthToDst = 'http://192.168.5.22/siri/new/tinymce_uploads/'; //The Absolute path (from the clients POV) to the destination folder.
$absPthToDstSvr = 'D:/lancer1/siri/new/tinymce_uploads/'; //The Absolute path (from the servers POV) to the destination folder. You will need to set permissions for this dir 0777 worked ok for me.

function hasAccess(){
	/**
	If you need to do a securty check on your user here is where you should put the code.
	*/
	return true;
}

//###### You should not need to edit past this point ######
if($_GET["poll"]){
	$dh  = opendir($absPthToDstSvr);
	while (false !== ($filename = readdir($dh))) {
	  $files[] = $filename;
	}
	sort($files);
	
	//Filter out html files and directories.
	function filterHTML($var){
		if(is_dir($absPthToDstSvr . $var) or substr_count($var, '.html') > 0){
			return false;
		}
		else{
			return true;
		}
	}
	$files = array_filter($files, 'filterHTML');
	$str = '[';
	foreach ($files as $file){
		$str .= '{';
		$str .= '"url":"'. $absPthToDst . $file .'",';
		$str .= '"file":"'. $file .'"';
		$str .= '}, ';
	}
	$str .= ']';
	echo $str;
}
elseif (hasAccess()){

	if($_FILES['tuUploadFile']['tmp_name']){
		//$target_path = $absPthToDstSvr. basename( $_FILES['tuUploadFile']['name']); 
		$target_path = $absPthToDstSvr. str_replace(' ','_', basename( $_FILES['tuUploadFile']['name'])); 
		move_uploaded_file($_FILES['tuUploadFile']['tmp_name'], $target_path);
	}
?>
<html>
<head>
<style type="text/css">
	body{
		font-size:10px;
		margin:0px;
		padding:0px;
		height:20px;
		overflow:hidden;
	}
</style>
<script type="text/javascript">
	window.onload = function(){
		parent.tuIframeLoaded();
	}
	function tuSmt(){
		//anant edit  ( IE return abslute path like "c:\....." ) 
		var len;
		//alert(document.getElementById('tuUploadFile').value);
		var myList = document.getElementById('tuUploadFile').value.split("\\");
		len=myList.length-1;
		filePath = '<?php echo $absPthToDst; ?>' + myList[len];
		// oct-27-2009 -----  whene file name has space ( this probloman arive in Mozilla  )
		filePath=filePath.replace(/ /g,'_');
		
		if(parent.tuFileUploadStarted(filePath, document.getElementById('tuUploadFile').value )){
			window.document.body.style.cssText = 'border:none;padding-top:100px';
			document.getElementById('tuUploadFrm').submit();
		}
	}
</script>
</head>
<body style="border:none;">
	<form enctype="multipart/form-data" method="post" action="<?php echo $absPthToSlf; ?>" id="tuUploadFrm">
		<div style="height:22px;vertical-align:top;">
		  <input type="file" size="24" style="height:22px;" id="tuUploadFile" name="tuUploadFile" />
		  <input type="button" value="Go" onClick="javascript:tuSmt();" style="margin:0px 0px 20px 2px;border:1px solid #808080;background:#fff;height:20px;"/>
		</div>
	</form>
</body>
</html>
<?php
}
?>