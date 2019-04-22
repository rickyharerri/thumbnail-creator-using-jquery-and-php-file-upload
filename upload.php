<?php 
include_once("functions.php");
$uploaded_images = array();
$thumb_width = 100;
$thumb_height = 90;
$upload_dir = 'uploads/';
$upload_dir_thumbs = 'uploads/thumbs/';
foreach($_FILES['upload_images']['name'] as $key=>$val){
	$filename = $_FILES['upload_images']['name'][$key];		
	$upload_file = $upload_dir.$filename;	
	if(move_uploaded_file($_FILES['upload_images']['tmp_name'][$key],$upload_dir.$filename)){		
		createThumbnail($filename, $thumb_width, $thumb_height, $upload_dir, $upload_dir_thumbs); 
		list($orig_width,$orig_height) = getimagesize($upload_dir . $filename);	
		list($thumbs_width,$thumbs_height) = getimagesize($upload_dir_thumbs . $filename);			
		$upload_image = '<br><strong>Your image file has been successfully uploaded, and a thumbnail has been created.</strong>';		
		$upload_image .= "<br><br><strong>Created Thumbnail Image Size: ".$thumbs_width."x".$thumbs_height.'</strong><br><img src="' . $upload_dir_thumbs . $filename . '" alt="image" />';		
		$upload_image .= "<br><br><strong>Original Image Size: ".$orig_width."x".$orig_height.'</strong><br><img class="image_size" src="' . $upload_dir . $filename . '" alt="image" />';
		echo $upload_image;
	}
}
?>