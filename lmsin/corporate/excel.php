<?php
include ("../../includes/common.php");
include 'PHPExcel/IOFactory.php';
init();
$func_ary=array("insert_excel","edit_question");
if($_COOKIE[CompanyId]=="")
{ #not logged in
header("Location: index.php?msg=Please first login to access admin area");
return;
}
if($_REQUEST[act]!="insert_excel"){
	excel_show();
	die();
}
if(fe($_REQUEST[act]))
{
	$_REQUEST[act]();
	die();
}
####################################################################################
function excel_show(){
	$smarty = new Smarty;
	$smarty->assign(array("msg"=>$msg,						  
						  "user_tab"=>"selected",
						  ));
 	$smarty->display('excel.tpl');
}
#####################################################################################
function insert_excel(){
	$smarty = new Smarty;
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$uploaded=0;
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if file already exists
	if (file_exists($target_file)) {
  	  echo "Sorry, file already exists.";
  	  $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
  	 	echo "Sorry, your file is too large.";
    	$uploadOk = 0;
	}
	// Allow certain file formats
	if($FileType != "xlsx") {
    	echo "Sorry, only xlsx files are allowed.";
    	$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        		$uploaded=1;			// confirmation after Sucessfull file upload
		    } else {
        			echo "Sorry, there was an error uploading your file.";
    		  }	
#------------------Inserting the data of the above Uploaded File into datbase--------------- 	
	
	if($uploaded==1){
		ini_set("max_execution_time", 0);    
    	require('excel_reader2.php');
   		require('SpreadsheetReader.php');
    	chmod($target_file, 0777);
	
    	$Reader = new SpreadsheetReader($target_file);
	    $i = 1;
		foreach($Reader as $Row)
    	{ 	
        	if($i == 1) {
            	$i++;
            	continue;
        	}		
		    array_map('trim',$Row);
			$pwd=md5($Row[5]);
			
			$SQL2="SELECT * FROM `users` WHERE user_email='".$Row[4]."'";
			$tot_rows= eq($SQL2,$rs);
   		    while($data=mfa($rs)){
      			$rw_id = $data[user_id];
			}	
	  			
			
			$SQL= "INSERT INTO users SET 
						  `user_fname` =  '".$Row[0]."',
						  `user_lname` = '".$Row[1]."',
						  `user_gender` = '".$Row[2]."',
						  `user_dob` = '".$Row[3]."',
						  `user_email` ='".$Row[4]."',
						  `user_password` ='".$pwd."',
						  `user_country` ='".$Row[6]."',
						  `user_states` ='".$Row[7]."',
						  `user_zipcode`='".$Row[8]."'";
			
						
			mysql_query($SQL);
			$id = mysql_insert_id();
			$int_id= intval($id);
			
			if(!($int_id==0)){
				$SQL1= "INSERT INTO `map_company_user`(`map_company_id`, `map_user_id`, `map_access_level`) VALUES ('".$_COOKIE[CompanyId]."','".$id."','Private')";
				mysql_query($SQL1) or die(mysql_error());
					
			}else{
				$SQL1= "INSERT INTO `map_company_user`(`map_company_id`, `map_user_id`, `map_access_level`) VALUES ('".$_COOKIE[CompanyId]."','".$rw_id."','Private')";
				mysql_query($SQL1) or die(mysql_error());
			}
			$i++;
    	}
		
	}
	if(unlink($target_file)){
		header("Location: user.php");
		$ary[0]="File Data Uploaded Successfully.";
	}
	
	
	$ary[2] = 1;
	$ary[3] = $callback;
	return $ary;
  } 
}
?>
