<?php

/*
 * SimpleYouTube Class
 * @author Shawn Adrian <shawn@nerdburn.com>
 *
 * The SimpleYouTubeClass can be used to get a youtube videos
 * details from a youtube URL.
 *
 */
//$id = getVideoID("http://www.youtube.com/watch?v=TBcC8zqNjKk");
//getVideoDetails($id);	

function check_vid_exist($videoDetails) {              //to check whether video exists on YouTube - palash
    $flag = 0;
    $videoID = substr($videoDetails,25,11);
    $url1 =  "http://i.ytimg.com/vi/$videoID/1.jpg";
    $url2 = "http://i.ytimg.com/vi/$videoID/2.jpg";
    $url3 = "http://i.ytimg.com/vi/$videoID/3.jpg";
   // $chk1 = file_get_contents($url1,0,null,0,1);
    $chk2 = file_get_contents($url2,0,null,0,1);
    //$chk3 = file_get_contents($url3,0,null,0,1);
    if ($chk2)
        $flag = 1;
     
     return $flag;
                      
                      
}


function parseVideoEntry($entry) {      
      $obj= new stdClass;
      
      // get nodes in media: namespace for media information
      $media = $entry->children('http://search.yahoo.com/mrss/');
      $obj->title = $media->group->title;
      $obj->description = $media->group->description;
      $obj->category = $media->group->category;
      // get video player URL
      $attrs = $media->group->player->attributes();
      $obj->watchURL = $attrs['url']; 
      
      // get video thumbnail
      $attrs = $media->group->thumbnail[0]->attributes();
      $obj->thumbnailURL = $attrs['url']; 
            
      // get <yt:duration> node for video length
      $yt = $media->children('http://gdata.youtube.com/schemas/2007');
      $attrs = $yt->duration->attributes();
      $obj->length = $attrs['seconds']; 
      
      // get <yt:stats> node for viewer statistics
      $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
      $attrs = $yt->statistics->attributes();
      $obj->viewCount = $attrs['viewCount']; 
      
      // get <gd:rating> node for video ratings
      $gd = $entry->children('http://schemas.google.com/g/2005'); 
      if ($gd->rating) { 
        $attrs = $gd->rating->attributes();
        $obj->rating = $attrs['average']; 
      }
	  else {
        $obj->rating = 0;         
      }
        
      // get <gd:comments> node for video comments
      $gd = $entry->children('http://schemas.google.com/g/2005');
      if ($gd->comments->feedLink) { 
        $attrs = $gd->comments->feedLink->attributes();
        $obj->commentsURL = $attrs['href']; 
        $obj->commentsCount = $attrs['countHint']; 
      }
      
      // get feed URL for video responses
      $entry->registerXPathNamespace('feed', 'http://www.w3.org/2005/Atom');
      $nodeset = $entry->xpath("feed:link[@rel='http://gdata.youtube.com/schemas/
      2007#video.responses']"); 
      if (count($nodeset) > 0) {
        $obj->responsesURL = $nodeset[0]['href'];      
      }
         
      // get feed URL for related videos
      $entry->registerXPathNamespace('feed', 'http://www.w3.org/2005/Atom');
      $nodeset = $entry->xpath("feed:link[@rel='http://gdata.youtube.com/schemas/
      2007#video.related']"); 
      if (count($nodeset) > 0) {
        $obj->relatedURL = $nodeset[0]['href'];      
      }
    
      // return object to caller  
      return $obj;      
}

	// will parse the youtube URL passed to it and return
	// an 11 character youtube ID				
function getVideoID($url){
      if(substr($url,0,5) =='https')
	  	$url=str_replace("https","http",$url);
		
	  // make sure url has http on it
      if(substr($url, 0, 4) != "http") {
         $url = "http://".$url;
      }
      
      // make sure it has the www on it
      if(substr($url, 7, 4) != "www.") {
        $url = str_replace('http://', 'http://www.', $url);
      }

      // extract the youtube ID from the url
      if(substr($url, 0, 31) == "http://www.youtube.com/watch?v=") {
         $id = substr($url, 31, 11);
      }
         
      return $id;      
}

function getnewVideoDetails($url) {                                                //palash
      // create an array to return
      $videoDetails = Array();
      $id=getVideoID($url);
      
          $youtube = "http://www.youtube.com/oembed?url=". $url ."&format=json";

 
  $videoDetails = json_decode(file_get_contents($youtube), true);

	  $videoDetails['length']=$video->length;
	  $videoDetails['rating']=$video->rating;
	  $videoDetails['category']=$video->category;
      $videoDetails->title = $video->title;
      $videoDetails->description = $video->description;
      $videoDetails['thumbnail'] = "http://i.ytimg.com/vi/".$id."/2.jpg";

      return $videoDetails;
}                                                                         //palash


   // will accept a youtube video ID
   // returns title, description, thumbnail
function getVideoDetails($id) {
      // create an array to return
      $videoDetails = Array();
      
      // get the xml data from youtube
      $url = "http://gdata.youtube.com/feeds/api/videos/".$id;	// This url shows all the details of the video on the browser
      $xml = simplexml_load_file($url);							// In this line the browser content is converted to xml data
	  $video = parseVideoEntry($xml);							
//print_r($video);
//print_r($xml);      
// load up the array
	//print sprintf("%0.2f", $video->length/60) . " min. | {$video->rating} user rating | {$video->viewCount} views<br/>\n";
	  $videoDetails['length']=$video->length;
	  $videoDetails['rating']=$video->rating;
	  $videoDetails['category']=$video->category;
      $videoDetails['title'] = $video->title;
      $videoDetails['description'] = $video->description;
      $videoDetails['thumbnail'] = "http://i.ytimg.com/vi/".$id."/2.jpg";

      return $videoDetails;
}
function filterVideo($videoDetails){

 $flag=0;
 if(substr($videoDetails['c_url'], 0, 25) == "http://www.youtube.com/v/") {
         $id = substr($videoDetails['c_url'], 25, 11);
 }
 
 $map_url = "http://gdata.youtube.com/feeds/api/videos/".$id;
 if(($response_xml_data = file_get_contents($map_url))===false){
  //echo "Error fetching XML <br>";
 }
 else{
  libxml_use_internal_errors(true);
  $data = simplexml_load_string($response_xml_data);
     if(!$data){
   //echo "2.Error loading XML\n";
         foreach(libxml_get_errors() as $error){
    //echo "\t", $error->message;
   }
  }
  else{
   //XML Data available
   $flag=1;
  }
 }
 return $flag;
}

?>
