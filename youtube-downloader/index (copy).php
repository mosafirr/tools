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

<br><br>

1. Grabber:<br>
<br>
<form method="post" action="">
<input type="text" name="id" id="id" style="height:40px;" placeholder="Enter YouTube Link">
<input type="submit" class="button" title="Download in .mp4" value="Proceed">
</form>

<br>

<?php
$id = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');
function clean_url($id){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id);
}
?>

<?php 
// api from: https://www.youtubemp3script.com - no longer works
// echo '<iframe src="http://www.recordmp3.co/#/watch?v='.clean_url($id).'&layout=button&format=video&t_press_to_start=Download" height="60" scrolling="no" style="border:none;"></iframe>';

echo  '<iframe src="https://ytapi.cc/button/?v='.clean_url($id).'&f=mp4" height="60" scrolling="no" style="border:none;"></iframe>'; // no longer
?>

<br>
Step 1: Put YouTube Link or only ID bit<br>
Step 2: Click on button Proceed<br>
Step 3: Click on button Download Video<br>

<br><br>

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
// https://youtubemp3api.com  ima6e i api ot tozi sait / there was api from this website

// api from: https://y-api.org    https://ycapi.org
// api from: https://y-api.org/button/?v=KMU0tzLwhbE&f=mp3&t=1&fc=#ffffff&bc=#000000   
// &f=mp3 or mp4
echo '<iframe src="https://y-api.org/button/?v='.clean_url2($id2).'&f=mp4&t=1&fc=#ffffff&bc=#0AF2F2" height="100" allowtransparency="true" scrolling="no" style="border:none"></iframe><br>';
// echo '<iframe src="https://y-api.org/button/?v='.clean_url2($id2).'&f=mp4&fc=#ffffff&bc=#0AF2F2" scrolling="no" style="width:320px;height:100px;border:none;"></iframe><br>';
// echo '<iframe src="https://ycapi.org/button/?v='.clean_url2($id2).'&f=mp4&t=1&fc=#ffffff&bc=#0AF2F2" width="300" height="200" allowtransparency="true" scrolling="no" style="border:none"></iframe>';
?>

<br><br>

3. Grabber:<br>
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

4. Grabber:<br>
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

5. Grabber:<br>
<br>
<form method="post" action="">
<input type="text" name="id5" id="id5" style="height:40px;" placeholder="Enter YouTube Link">
<input type="submit" class="button" title="Download in .mp4" value="Proceed">
</form>

<br>

<?php
$id5 = htmlentities($_POST['id5'], ENT_QUOTES, 'UTF-8');
function clean_url5($id5){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id5);
}
?>

<?php 
// api from: www.download-mp3-youtube.com/api/
echo '<iframe src="https://www.download-mp3-youtube.com/api/?api_key=NDM1NDg1ODg1&format=mp4&logo=1&video_id='.clean_url5($id5).'" width="250px" height="60px" scrolling="no" style="border:none;"></iframe><br>';
echo '<iframe width="300px" height="55px" scrolling="no" style="border:none;" src="https://www.download-mp3-youtube.com/api/?api_key=NDM1NDg1ODg1&format=mp4&logo=1&video_id='.clean_url5($id5).'&button_color=11512f&text_color=dddddd&text=CONVERT TO MP4&small_text=Calm and relaxing video - WITHOUT COPYRIGHT"></iframe>';
?>

<br><br>

6. Grabber:<br>
<br>
<form method="post" action="">
<input type="text" name="id6" id="id6" style="height:40px;" placeholder="Enter YouTube Link">
<input type="submit" class="button" title="Download in .mp4" value="Proceed">
</form>

<br>

<?php
$id6 = htmlentities($_POST['id6'], ENT_QUOTES, 'UTF-8');
function clean_url6($id6){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id6);
}
?>

<?php 
// api from: https://break.tv/en/api
echo '<iframe src="https://break.tv/widget/mp4/?link=https://www.youtube.com/watch?v='.clean_url6($id6).'&color=0AF2F2&text=ffffff" width="400" height="170" scrolling="no" style="border:none;"></iframe>';
?>

<br>

7. Grabber:<br>

Enter Youtube URL or Youtube ID<br>
<br>
<form method="post" action="">
<input type="text" name="id7" id="id7" style="height:40px;" placeholder="Enter Youtube Link">
<input type="submit" class="button" value="Proceed">
</form>

<br>

<?php
$id7 = htmlentities($_POST['id7'], ENT_QUOTES, 'UTF-8');
function clean_url7($id7){
	return str_replace(array('http://www.youtube.com/watch?v=','https://www.youtube.com/watch?v=', 'http://youtube.com/watch?v=', 'https://youtube.com/watch?v=', 'https://youtu.be/', 'http://youtu.be/'),'',$id7);
}
?>

<?php
// api from: https://www.ytjar.info
echo '<iframe src="//mp4api.ytjar.info/?id='.clean_url7($id7).'&c=ffffff&b=0AF2F2&t&h=40px" style="width:300;height:155px;border:0;" scrolling="no"></iframe><br>';
?>

<br>

<?php
include '../footer.php';
?>
