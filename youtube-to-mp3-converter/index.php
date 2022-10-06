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
<input type="text" name="id1" id="id1" style="height:40px;" placeholder="Enter Youtube Link">
<input type="submit" class="button" value="Proceed">
</form>

<br>

<?php
$id1 = htmlentities($_POST['id1'], ENT_QUOTES, 'UTF-8');
function clean_url1($id1){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id1);
}
?>

<?php 
// api from: https://y-api.org    https://ycapi.org
// api from: https://y-api.org/button/?v=KMU0tzLwhbE&f=mp3&t=1&fc=#ffffff&bc=#000000
echo '<iframe src="https://y-api.org/button/?v='.clean_url1($id1).'&f=mp3&t=1&fc=#ffffff&bc=#0AF2F2" height="90" allowtransparency="true" scrolling="no" style="border:none"></iframe>';
?>

<br>

2. Grabber:<br>

Enter Youtube URL or Youtube ID<br>
<br>
<form method="post" action="">
<input type="text" name="id2" id="id2" style="height:40px;" placeholder="Enter Youtube Link">
<input type="submit" class="button" value="Proceed">
</form>

<br>

<?php
$id2 = htmlentities($_POST['id2'], ENT_QUOTES, 'UTF-8');
function clean_url2($id2){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id2);
}
?>

<?php 
// api from: https://www.ytjar.info
echo '<iframe src="//mp3api.ytjar.info/?id='.clean_url2($id2).'&c=ffffff&b=0AF2F2" style="width:400;height:60px;border:0;" scrolling="no"></iframe><br>';
?>

<br><br>

3. Grabber:<br>

Enter Youtube URL<br>
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
// api from: https://break.tv
echo '<iframe style="width:100%;min-width:200px;max-width:350px;height:57px;border:0;overflow:hidden;" scrolling="no" src="https://break.tv/widget/button/?link=https://www.youtube.com/watch?v='.clean_url3($id3).'&color=0AF2F2&text=fff"></iframe>';
?>

<br><br>

4. Grabber:<br>

Enter Youtube URL or Youtube ID<br>
<br>
<form method="post" action="">
<input type="text" name="id4" id="id4" style="height:40px;" placeholder="Enter Youtube Link">
<input type="submit" class="button" value="Proceed">
</form>

<br>

<?php
$id4 = htmlentities($_POST['id4'], ENT_QUOTES, 'UTF-8');
function clean_url4($id4){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id4);
}
?>

<?php
// api from: https://www.ytjar.info
echo '<iframe src="//mp3api.ytjar.info/?id='.clean_url4($id4).'&c=ffffff&b=0AF2F2" style="width:400;height:60px;border:0;" scrolling="no"></iframe><br>';
?>

<br><br>

5. Grabber:<br>

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
		<iframe id="ifurl" src="about:blank" width="460" height="335" frameborder="0" scrolling="no"></iframe>

<?php
include '../footer.php';
?>
