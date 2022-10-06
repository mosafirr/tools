<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Facebook Downloader - Video Grabber">
<meta name="keywords" content="facebook downloader, facebook video downloader, facebook grabber, fb video downloader, download facebook, download facebook video, fb video download, facebook video, download facebook mp4, download facebook videos, download fb, fb video grabber, facebook video download">
<title>Facebook downloader</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="fb.js"></script> 

<script>
$(document).ready(function () {

window.fbAsyncInit = function () {
  FB.init({
    appId: '823038991155814',
    status: true,
    cookie: true,
    xfbml: true,
    version    : 'v2.5'
  });
FB.Event.subscribe('auth.authResponseChange', function (response) {
  if (response.status === 'connected') {
    //alert("Successfully connected to Facebook!");
  }
  else if (response.status === 'not_authorized') {
    alert("Login failed!");
  } else {
    alert("Unknown error!");
  }
});
};
});

(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


<a href="../">Free Online Tools</a>

<h2>Download Facebook Video</h2>

1. Grabber:<br>

<p>Enter fb video URL/Link</p>

<input placeholder="Enter video URL here" id="url1" />
 <!-- <a href="#get" onclick="myFunction()" class="button">Download .mp4</a> -->
<input type="submit" onclick="myFunction()" class="button" value="Download .mp4" title="Go! Get video!" />

<br>e.g. https://www.facebook.com/failarmy/videos/869031906527306/<br>

<p>If downloading process not start, and you just see the clip on Full Screen in your Browser, <br>
then you must right click on the video clip and to "Save As..." or "Save Video as..." from your Browser.</p>

2. Grabber:<br>
<br>

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
	
		<input id="url" type="text" placeholder="FB URL">
		<input id="start" type="submit" class="button" value="Get video in .mp4">
		<br>
		<iframe id="ifurl" src="about:blank" width="500" height="350" frameborder="0" scrolling="no"></iframe>
<br>
If You see this notice: Error generating converted file! or Error downloading remote file!<br>
Well, try again after couple seconds :)<br>


<?php
include '../footer.php';
?>
