<?php 
function scrape_insta_hash($tag) {
	$insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); 
	// instagrame tag url
	$shards = explode('window._sharedData = ', $insta_source);
	$insta_json = explode(';</script>', $shards[1]); 
	$insta_array = json_decode($insta_json[0], TRUE);
	return $insta_array; // this return a lot things print it and see what else you need
}




$tag = 'RHkrydstogt';
$results_array = scrape_insta_hash($tag);
$limit = 20; 
$image_array= array(); // array to store images.
	for ($i=0; $i < $limit; $i++) { 
		$latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];
	 	$image_data  = $latest_array['thumbnail_src']; 
		array_push($image_array, $image_data);
	}
	echo json_encode($image_array);
?>
