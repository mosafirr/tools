<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Instagram Photo Downloader>
<meta name="keywords" content="instagram downloader, instagram grabber, instagram photo downloader, download instagram, download instagram images, instagram photo download, instagram photos download, save instagram pictures, insta image download, insta image downloader, instagram image downloader, instagram images downloader, instagram picture download, instagram pictures downloader, online instagram pictures downloader">
<title>Instagram photo download online</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Instagram Image Downloader</h2>

Enter Instagram URL<br>

<?php
require_once 'InstagramDownload.class.php';

$url = htmlentities($_POST['url'], ENT_QUOTES, 'UTF-8');

$client = new InstagramDownload($url);
$url 	= $client->downloadUrl(); // returns download URL

echo "<small>$url</small>"; // print download URL

echo '<img src="'.$url.'"><br />';
//echo '<img srcset="'.$url.'"><br />';
?>

<form method="post" action="">
<input type="text" name="url" id="url" style="height:40px;" placeholder="Enter Link">
<input type="submit" class="button" value="Proceed">
</form>
<br>

<?php
include '../footer.php';
?>
