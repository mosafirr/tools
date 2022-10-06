<!DOCTYPE html>
<html lang="en">
<head>
<title>M3U8 Player - HLSPlayer</title>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="This page allows you to play M3U8/HLS streams online with no installation required.">
<meta name="keywords" content="m3u8 player, m3u8 online streaming player, play M3U8/HLS streams online, play HLS urls in-browser, hls player, m3u8, hls">
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<script src="jquery-1.10.2.min.js"></script>
<script type='text/javascript' src='clappr.min.js?ver=123'></script>
<script src="jquery.ba-throttle-debounce.min.js"></script>
<script src="jwplayer.js"></script>
<script>
$.ajaxSetup({
cache: false
});
</script>

<div id="jsonploader"></div>

<a href="../">Free Online Tools</a>

<h2>Play HLS m3u8</h2>

This page allows you to play M3U8/HLS streams online with no installation required. Play HLS urls in-browser.<br><br>

<form method="GET" action="">
<input name="url" id="url" title="Put URL here" placeholder="playlist.m3u8" required />
<input type="submit" class="button" value="PLAY" title="Go!" />
</form>

<?php

$url = htmlentities($_GET['url'], ENT_QUOTES, 'UTF-8');

if (isset($_GET['url'])){

echo "<br />Via Clappr Player<br />

<div id='video_player1' style='width:760px; height:340px' title='M3U8 online player'></div>
<script language='JavaScript'>
player = new Clappr.Player(
{
	parentId: '#video_player1',
	autoPlay: false,
	height: '100%',
	width: '100%',
	mediacontrol:
	{
		seekbar: '#0AF2F2',
		buttons: '#0AF2F2'
	},
	language: 'bg-BG',
	strings: {
		'bg-BG': {
			'live': 'M3U8 Player',
			'back_to_live': 'назад',
		}
	},
	source:'$url',
});
</script>";


}

else {

print ("<br />e.g. http://www.example.com/live/playlist.m3u8<br />
<br />
What is HLS?<br />
<br />
HTTP Live Streaming (HLS) is an HTTP-based media streaming communications protocol implemented by Apple Inc. as part of its QuickTime, Safari, OS X, and iOS software. It works by breaking the overall stream into a sequence of small HTTP-based file downloads, each download loading one short chunk of an overall potentially unbounded transport stream.<br />
<br />
What is M3U8?<br />
<br />
M3U8 is a computer file format that contains multimedia playlists. A m3u8 file specifies the locations of one or more media files, rather than the video itself. Therefore, a HLS player is required to download and play the actual video files.");
}
?>

<?php
include '../footer.php';
?>
