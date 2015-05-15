<?php 

$target_url = 'http://www.alvinmcbride.com/FaceReaderPOST/api/facereader/PostImage';
$file = '../../data/'.$_POST['filename'].'.jpg';
file_put_contents($file,file_get_contents('data://'.substr($_POST['myImage'],5)));
$file_name_with_full_path = realpath('./'.$file);
//$cfile = curl_file_create($file_name_with_full_path,'image/png');
//$post = array('myImage'=>$cfile);
$post = array('myImage'=>'@'.$file_name_with_full_path);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL,$target_url);
curl_setopt($curl, CURLOPT_POST,1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
$result=curl_exec ($curl);
curl_close ($curl);
echo $result;

?>