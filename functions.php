<?php 
function createThumbnail($filename, $thumb_width, $thumb_height, $upload_dir, $upload_dir_thumbs) { 	
	$upload_image = $upload_dir.$filename;
	$thumbnail_image = $upload_dir_thumbs.$filename;
	list($width,$height) = getimagesize($upload_image);
	$thumb = imagecreatetruecolor($thumb_width,$thumb_height);	
	if(preg_match('/[.](jpg|jpeg)$/i', $filename)) {
        $image_source = imagecreatefromjpeg($upload_image);
    } else if (preg_match('/[.](gif)$/i', $filename)) {
        $image_source = imagecreatefromgif($upload_image);
    } else if (preg_match('/[.](png)$/i', $filename)) {
        $image_source = imagecreatefrompng($upload_image);
    } else {
		$image_source = imagecreatefromjpeg($upload_image);
	}	
	imagecopyresized($thumb,$image_source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);	
	if(preg_match('/[.](jpg|jpeg)$/i', $filename)) {
		imagejpeg($thumb,$thumbnail_image,100);        
    } else if (preg_match('/[.](gif)$/i', $filename)) {
        imagegif($thumb,$thumbnail_image,100);
    } else if (preg_match('/[.](png)$/i', $filename)) {
        imagepng($thumb,$thumbnail_image,100);
    } else {
		imagejpeg($thumb,$thumbnail_image,100);
	}	
}
?>

