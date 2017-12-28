<?php

// Update txt
$file = "buttonStatus.txt";
$handle = fopen($file,'w+');
if (isset($_POST['on'])) {
	$onstring = "ON";
	$animation = $_POST['animation'];
	fwrite($handle,$onstring.PHP_EOL);
	fwrite($handle,$animation);
	fclose($handle);

	// Update image
	$tempName = '';
	if(isset($_FILES['image']['tmp_name'])) {
		$tempName = $_FILES['image']['tmp_name'];
	}

	$newName  = '/var/www/html/led/';
	$newName .= 'image.png';
	if($tempName && file_exists($tempName)) {
		rename($tempName, $newName);
	}
	chmod($newName, 0777);
} else if(isset($_POST['off'])) {
	$offstring = "OFF";
	fwrite($handle, $offstring);
	fclose($handle);
}

$url = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:'index.html';
header('location:'.$url);
