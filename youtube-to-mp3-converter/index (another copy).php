<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="www.eti.pw">
<meta name="description" content="Online YouTube Video to MP3 Downloader. Convert Youtube Video to MP3">
<META name="Keywords" content="youtube to mp3, youtube mp3, youtube mp3 converter, youtube video to mp3, youtube downloader, youtube video to mp3 downloader, youtube grabber, youtube 2 mp3, youtube.com to mp3, youtube to mp3 converter, youtube video to mp3 converter, youtube to mp3 file, yt2mp3">
<title>YouTube to MP3 Converter</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>YouTube Video to MP3 Downloader</h2>

YouTube mp3<br />

<br>
Convert Youtube Videos to MP3<br>
<br>

1. Grabber:<br>

Enter Youtube URL or Youtube ID<br>
<br>
<form method="post" action="">
<input type="text" name="id3" id="id3" style="height:40px;" placeholder="Enter Youtube Link">
<input type="submit" class="button" value="Proceed">
</form>

<br>

<?php
$id3 = htmlentities($_POST['id3'], ENT_QUOTES, 'UTF-8');
function clean_url3($id3){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id3);
}
?>

<?php 
echo  '<iframe src="https://ytapi.cc/button/?v='.clean_url3($id3).'&c=#03a730" height="60" scrolling="no" style="border:none;"></iframe>';
?>

<br>

2. Grabber:<br>

Enter Youtube URL<br>
<br>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

		<script>
			$(document).ready(function(){
				$("#start").click(function(){
					var url = "ready.php?yturl=" + $("#url").val();
					$('#ifurl').attr('src', url);
				});
			});
		</script>
	
		<input id="url" type="text" placeholder="Youtube URL">
		<input id="start" type="submit" class="button" value="Convert to .mp3">
		<br>
		<iframe id="ifurl" src="about:blank" width="460" height="330" frameborder="0" scrolling="no"></iframe>

<?php
include '../footer.php';
?>
