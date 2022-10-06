<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Facebook Downloader - Video Grabber">
<meta name="keywords" content="facebook downloader, facebook video downloader, facebook grabber, fb video downloader, download facebook, download facebook video, fb video download, facebook video, download facebook mp4, download facebook videos, download fb, fb video grabber, facebook video download, fb downloader, fb grabber">
<title>Facebook downloader</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Download Facebook Video</h2>

1. FB Grabber:<br>
<br>
<form action="get-facebook-video.php" method="post">
<input type="text" name="url" placeholder="Video Link here">
<input class="button" value="Download" type="submit">
</form>
<br>

2. FB Grabber:<br>

<p>Enter fb video URL/Link</p>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

		<script>
			$(document).ready(function(){
				$("#start").click(function(){
					var url = "fb-dnl-grabber2/ready.php?yturl=" + $("#url").val();
					$('#ifurl').attr('src', url);
				});
			});
		</script>
	
		<input id="url" type="text" placeholder="FB URL" title="Enter Facebook video Link here">
		<input id="start" type="submit" class="button" value="Get video in .mp4">
        <br>e.g. https://www.facebook.com/failarmy/videos/869031906527306/<br>
		<iframe id="ifurl" src="about:blank" width="500" height="350" frameborder="0" scrolling="no"></iframe>

3. FB Grabber:<br>

<div class="start-video-downloader start-video-downloader-lightblue" align="left"><input autocomplete="off" type="text"><button>Download</button></div><script src="https://api.apowersoft.com/video-downloader?lang=en" defer></script>

<?php
include '../footer.php';
?>
