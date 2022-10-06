<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online YouTube Downloader - Video Grabber">
<meta name="keywords" content="youtube downloader, youtube grabber, video downloader, download youtube, download youtube video, video download, youtube video, download youtube FLV, download youtube MP4, download youtube 3GP, video grabber, php video downloader, ytb downloader, youtube download, youtube mp4, youtube mp4 converter">
<title>YouTube downloader</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Download YouTube Video</h2>

<!--
0. Grabber:<br>

<iframe src="ytb-dnl-grabber0/index.php" width="100%" height="900" allowtransparency="true" scrolling="yes" style="border:none"></iframe>
-->

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
// https://youtubemp3api.com  there was api from this website

// api from: https://y-api.org    https://ycapi.org
// api from: https://y-api.org/button/?v=KMU0tzLwhbE&f=mp3&t=1&fc=#ffffff&bc=#000000   
// &f=mp3 or mp4
echo '<iframe src="https://y-api.org/button/?v='.clean_url1($id1).'&f=mp4&t=1&fc=#ffffff&bc=#0AF2F2" height="100" allowtransparency="true" scrolling="no" style="border:none"></iframe><br>';
// echo '<iframe src="https://y-api.org/button/?v='.clean_url1($id1).'&f=mp4&fc=#ffffff&bc=#0AF2F2" scrolling="no" style="width:320px;height:100px;border:none;"></iframe><br>';
// echo '<iframe src="https://ycapi.org/button/?v='.clean_url1($id1).'&f=mp4&t=1&fc=#ffffff&bc=#0AF2F2" width="300" height="200" allowtransparency="true" scrolling="no" style="border:none"></iframe>';
?>

<br>

2. Grabber:<br>
<br>
<form class="form-download" method="get" id="download" action="getvideo.php">
		Enter Youtube link or Put in just the ID bit, the part after v=<br>
		Example: https://youtube.com/watch?v=<b>b4A-dPRrhI4</b><br><br>
		<input type="text" name="videoid" id="videoid" placeholder="VideoID or URL" />
		<input class="button" type="submit" name="type" id="type" value="Download" />

    <?php
    include_once('config.php');
    function is_chrome(){
	$agent=$_SERVER['HTTP_USER_AGENT'];
	if( preg_match("/like\sGecko\)\sChrome\//", $agent) ){	// if user agent is google chrome
		if(!strstr($agent, 'Iron')) // but not Iron
			return true;
	}
	return false;	// if isn't chrome return false
    }
    if(($config['feature']['browserExtensions']==true)&&(is_chrome()))
      // echo '<a href="ytdl.user.js" title="Install Chrome Browser extension to view a \'Download button\' link to this application on Youtube video pages."> Install Chrome Extension - YouTube downloader</a>';
    ?>
</form>

<br><br>

3. Grabber:<br>
<br>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

		<script>
			$(document).ready(function(){
				$("#start").click(function(){
					var url = "ytb-dnl-grabber4/ready.php?yturl=" + $("#url").val();
					$('#ifurl').attr('src', url);
				});
			});
		</script>
	
		<input id="url" type="text" placeholder="Youtube URL">
		<input id="start" type="submit" class="button" value="Get video in .mp4">
		<br>
		<iframe id="ifurl" src="about:blank" width="500" height="355" frameborder="0" scrolling="no"></iframe>

<br><br>

4. Grabber:<br>
<br>
<form method="post" action="">
<input type="text" name="id4" id="id4" style="height:40px;" placeholder="Enter YouTube Link">
<input type="submit" class="button" title="Download in .mp4" value="Proceed">
</form>

<br>

<?php
$id4 = htmlentities($_POST['id4'], ENT_QUOTES, 'UTF-8');
function clean_url4($id4){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id4);
}
?>

<?php 
// api from: https://break.tv/en/api
echo '<iframe src="https://break.tv/widget/mp4/?link=https://www.youtube.com/watch?v='.clean_url4($id4).'&color=0AF2F2&text=ffffff" width="400" height="170" scrolling="no" style="border:none;"></iframe>';
?>

<br>

5. Grabber:<br>

Enter Youtube URL or Youtube ID<br>
<br>
<form method="post" action="">
<input type="text" name="id5" id="id5" style="height:40px;" placeholder="Enter Youtube Link">
<input type="submit" class="button" value="Proceed">
</form>

<br>

<?php
$id5 = htmlentities($_POST['id5'], ENT_QUOTES, 'UTF-8');
function clean_url5($id5){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id5);
}
?>

<?php
// api from: https://www.ytjar.info
echo '<iframe src="//mp4api.ytjar.info/?id='.clean_url5($id5).'&c=ffffff&b=0AF2F2&t&h=40px" style="width:300;height:155px;border:0;" scrolling="no"></iframe><br>';
?>

<?php
include '../footer.php';
?>
