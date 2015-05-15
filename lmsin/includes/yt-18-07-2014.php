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
      } else {
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
   function getVideoID($url)
   {
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

   // will accept a youtube video ID
   // returns title, description, thumbnail
   function getVideoDetails($id)
   {
      // create an array to return
      $videoDetails = Array();
      
      // get the xml data from youtube
      $url = "http://gdata.youtube.com/feeds/api/videos/".$id;
      $xml = simplexml_load_file($url);
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


?>