<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Meme Generator" />
<meta name="keywords" content="online meme generator, meme generator, meme, memes, create meme, create memes, meme maker, make meme, free meme generator">
<title>Simple Meme Generator</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>
  
<h2>Online Meme Generator</h2>

Easily add text to images or memes.<br />

<br>
<link rel="stylesheet" href="jquery-ui.min.css">
<link rel="stylesheet" href="style.css">

<div>
    <input type="file" name="meme_bg" value="Upload MEME Image" class="choose-file" onChange="showPreview(this);" />
    <input type="button" name="add_text" value="Text" class="button" onClick="createTextArea()" /><br><br> 
You can add multi text over the image. Just click couple times. Move the text field where you want.
</div>

<div id="meme-bg-target">
    <img src="default.jpg" id="img-meme-bg" class="img-meme-bg" />
</div>
<div>
    <input type="button" name="save-as-image" id="save-as-image" class="button" value="Save" />
</div>

<div class="label-preview">Preview</div>
<div id="meme-canvas-container">
    <canvas id="meme-preview"></canvas> Right click and Save image as...
</div>

<script src="jquery-1.11.2.min.js"></script>
<script src="jquery-ui.min.js"></script>

<script>
function showPreview(objFileInput) 
{
    if (objFileInput.files[0]) 
    {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#meme-bg-target img").attr('src', e.target.result);
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}
function createTextArea() 
{
	var txtAreaHTML = "<div contentEditable='true' class='meme-txt-area'></div>";
	$("#meme-bg-target").append(txtAreaHTML);
	$(".meme-txt-area").draggable();
	$(".meme-txt-area").focus();
}

function copyToCanvas(htmlElement) 
{
	var canvas = document.getElementById("meme-preview");
    var ctx = canvas.getContext("2d");

 	image = new Image(0, 0);
    	image.onload = function () {
    		canvas.width = this.naturalWidth;
    	    canvas.height = this.naturalHeight;

    	    var top = 0;
        var left = 0;
        var cellspace = 0;
        var memeTargetWidth = $("#meme-bg-target").width();
        var memeTargetHeight = $("#meme-bg-target").height();
        var font = 24;
        newFont = ( font / memeTargetWidth) * canvas.width;

	      ctx.drawImage(this, 0,0);
          ctx.font = newFont+"px Arial";
    	      ctx.fillStyle = "#00ffe7";

          $(".meme-txt-area").each(function(){

              cellspace = parseInt($(this).css("padding"));
              left = parseInt($(this).css("left")) + cellspace;
              newLeft = ( left / memeTargetWidth) * canvas.width;
              top = parseInt($(this).css("top")) + 3 * cellspace;
              newTop = ( top / memeTargetHeight) * canvas.height;
              ctx.fillText($(this).text(), newLeft, newTop);
    	      });
    	};
    
   image.src = $("#img-meme-bg").attr("src");
}

$(document).ready(function (e) {
	$("#save-as-image").on('click', function () {
     	copyToCanvas($('#meme-bg-target'));
    });
	
});
</script>

<?php
include '../footer.php';
?>
