<?php
include("zip.lib.php");
$zip = new zipfile();
$filename="30826.jpg";

$zip->addFile(file_get_contents("uploads/".$filename),$filename);

$handle = fopen("test.zip","wb");
fputs($handle, $zip->file());
fclose($handle);

?>