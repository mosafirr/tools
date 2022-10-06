<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Image to WEBP">
<meta name="keywords" content="image to webp, image to webp converter, convert image to webp, jpg to webp, png to webp, jpg2webp, png2webp, image converter, picture to webp converter, convert image to webp, webp">
<title>Image to WEBP Converter</title>
<link rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools src</a>

<h2>Convert JPG/PNG Image to WEBP</h2>

<form action="" method="POST" enctype="multipart/form-data">
    Local Image File:
    <input type = "file" name = "image" />
    <input type="submit" class="button" value="Convert" name="submit">
</form>

<?php

$allowed = array('image/pjpeg'=>"jpg",'image/jpeg'=>"jpg",'image/jpg'=>"jpg",'image/png'=>"png",'image/x-png'=>"png",'image/gif'=>"gif",'image/bmp'=>"bmp",'image/x-windows-bmp'=>"bmp",'image/tiff'=>"tiff",'image/x-tiff'=>"tiff");
$allowed_image_ext = array_unique($allowed);

$img = $_FILES['image']['tmp_name'];

if(file_exists($img))
{
    
$image = imagecreatefromstring(file_get_contents($img));
ob_start();
imagejpeg($image,NULL,100);
$cont = ob_get_contents();
ob_end_clean();
imagedestroy($image);
$content = imagecreatefromstring($cont);
$output = './output.webp';
imagewebp($content,$output);
imagedestroy($content);
echo '<p>Output Image:<br><br><img src="./'.$output.'"><br>Save Image As...</p>';
}

else
{
    echo 'Only: JPG, JPEG, PNG<br>'; 
}
?>

<?php
include '../footer.php';
?>
