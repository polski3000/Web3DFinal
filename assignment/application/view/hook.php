<?php
$directory = '../assets/images/gallery_images';
$imagePath = '../assignment/application/assets/images/gallery_images';
// Only load files with the following extensions
$allowed_extensions = array('jpg','jpeg','gif','png');
// An array used to separate the extension from each file
$file_parts = array();
// Response message
$response = "";
// Opens the directory to parse the images
$dir_handle = opendir($directory);


while ($file = readdir($dir_handle)) {

	if (substr($file, 0, 1) != '.') {

		$file_components = explode('.', $file);

		$extension = strtolower(array_pop($file_components));

		if (in_array($extension, $allowed_extensions))
		{

			$response .= $imagePath .'/'.$file.'~';
			//$i++;	
		}
	}
}
closedir($dir_handle);

echo substr_replace($response,"",-1);
?>