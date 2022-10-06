<?php
	$y_url = $_GET["yturl"];
	$site = "http://mp3fiber.com/include2/index.php?videoURL=".$y_url."&ftype=mp4";
	$icerik = file_get_contents($site);

	$icerik = str_replace("", "", $icerik);
	$icerik = str_replace("...Please wait while I try to convert:", "", $icerik);
	$icerik = str_replace("../download.php?url=/include2/index.php?output", "download.php?url=/include2/index.php?output", $icerik);
	$icerik = str_replace("css/styles.css", "http://mp3fiber.com/css/styles.css", $icerik);
	$icerik = str_replace("css/languages.css", "http://mp3fiber.com/css/languages.css", $icerik);

	echo $icerik;
?>
