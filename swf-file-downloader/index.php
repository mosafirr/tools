<!DOCTYPE html>
<html lang="en">
<head>
<title>.swf file downloader</title>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="SWF file downloader|grabber">
<meta name="keywords" content="swf file downloader, swf downloader, swf flash file downloader, flash downloader, online flash downloader, flash downloader, flash downloader online, swf file grabber, small web file downloader, download swf from any website, сваляй swf, online .swf downloader, сваляне swf файлове, вземи swf от всеки файл, swf даунлоудер, get swf from website, swf download online">
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>small web file (swf) grabber</h2>

flash file grabber/downloader<br>
<br>
This grabber can get .swf from any website, but actually you must know the path to .swf file.<br>
It's easy, first of all you must just to see the src (source code) via your browser help, then look around for .swf file,<br>
find the all path and paste here whole link :)<br>
<br>
<form method="POST" action="">
<input name="url" id="url" title="Put URL here" placeholder="Link here" />
<input type="submit" class="button" value="Get .swf" title="Go!" />
</form>

<br>

<?php
$swffile = file_get_contents(htmlentities($_POST['url'], ENT_QUOTES, 'UTF-8'));
if(file_put_contents('dnl/dnl.swf', $swffile)){
  echo '<a href="dnl/" target="_blank">View .swf file</a><br>';
  echo '<a href="dnl/dnl.swf" target="_blank">Download it with right click Save Link As...</a>';
  echo '<br><small>.swf file will be with new file name dnl.swf ... just download it from our web server with the right mouse button (the right-click)</small>';
}
else {
  echo "<small>e.g. http://www.example.com/example.swf</small>"; 
}
?>

<?php
include '../footer.php';
?>
