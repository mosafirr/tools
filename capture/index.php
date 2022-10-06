<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Web Cam Snapshot">
<meta name="keywords" content="webcam capture, web cam snapshot, webcam snapshot, online tools, free online tools, online tools with source code, web tools, webmaster tools">
<title>Web Cam Capture</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Web Cam Capture</h2>
Take a photo<br>

<p>1. Capture</p>

<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
var flashvars = {  
videoPreviewWidth: "200", 
videoPreviewHeight: "200", 
videoPreviewX: "100", 
videoPreviewY: "30", 
videoFps: "30", 
bandwidth: "0", 
quality: "100", 
screenShotX: "400", 
screenShotY: "30" 
};
var params = {menu: "false"};
swfobject.embedSWF("swf/webCamCapture.swf", "WebCamCapture", "700", "340", "10.0.0","expressInstall.swf", flashvars, params);

</script>

<div id="WebCamCapture">		
</div><br />

<br />

<p>2. Fast Capture</p>

    <script type="text/javascript" src="webcam.js"></script>
    <script>
        webcam.set_api_url( 'upload.php' );
        webcam.set_quality( 90 ); // JPEG quality (1 - 100)
        webcam.set_shutter_sound( true ); // play shutter click sound
        
        webcam.set_hook( 'onComplete', 'my_completion_handler' );
        
        function take_snapshot() {
            // take snapshot and upload to server
            document.getElementById('upload_results').innerHTML = 'Snapshot<br>'+
            '<img src="uploading.gif">';
            webcam.snap();
        }
        
        function my_completion_handler(msg) {
            // extract URL out of PHP output
            if (msg.match(/(http\:\/\/\S+)/)) {
                var image_url = RegExp.$1;
                // show JPEG image in page
                document.getElementById('upload_results').innerHTML = 
                    'Snapshot<br>' + 
                    '<a href="'+image_url+'" target="_blank"><img src="' + image_url + '"></a>';
                
                // reset camera for another shot
                webcam.reset();
            }
            else alert("PHP Error: " + msg);
        }
    </script>
<style>
.main
{
   
    width: 690px;
}
.snap
{
    color: white;
    border-radius: 4px;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    background: blue;
    font-family: inherit;
    font-size: 100%;
    padding: .5em 1em;
    border: 0 hsla(0, 0%, 0%, 0);
    text-decoration: none;
}
.border
{
    border: 3px solid;
    padding: 5px;
    width: 320px;
    height: 258px;
}
</style>

	<table class="main">
        <tr>
            <td valign="top">
	            <div class="border">
                Live Webcam<br>
                <script>
                document.write( webcam.get_html(320, 240) );
                </script>
                </div>
                <br/><input type="button" class="button" value="SNAP IT" onClick="take_snapshot()">
            </td>
            <td width="50">&nbsp;</td>
            <td valign="top">
                <div id="upload_results" class="border">
                    Snapshot<br>
                    <img src="logo.jpg" />
                </div>
            </td>
        </tr>
    </table>

<br>
Take a video record<br>
<a href="https://tools.eti.pw/record">Record Video clip with your WebCam </a>

<?php
include '../footer.php';
?>
