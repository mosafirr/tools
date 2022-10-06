<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="mobile-web-app-capable" content="yes">
<meta name="description" content="Take a video clip from your webcam" />
<meta name="keywords" content="video recording, online video recording, video record, take video clip">
<title>Video Recorder</title>
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="css/main.css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>A free online tool that allows you to record videos with your webcam.</h2>

  <div id="container">

    <video id="gum" autoplay muted></video>
    <video id="recorded" loop controls></video>

    <div>
      <button id="record" disabled>Start Recording</button>
      <button id="play" disabled>Play</button>
      <button id="download" disabled target="_blank">Download</button>
    </div>

  </div>

  <script src="js/adapter-latest.js"></script>
  <script src="js/main.js"></script>

<?php
include '../footer.php';
?>
