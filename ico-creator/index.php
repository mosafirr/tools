<?php
// favicon Generator Script
function generate_favicon(){
// Create favicon.
$postvars = array("image" => trim($_FILES["image"]["name"]),
"image_tmp"        => $_FILES["image"]["tmp_name"],
"image_size"    => (int)$_FILES["image"]["size"],
"image_dimensions"    => (int)$_POST["image_dimensions"]);
$valid_exts = array("jpg","jpeg","gif","png");
$ext = end(explode(".",strtolower(trim($_FILES["image"]["name"]))));
$directory = "./favicon/"; // Directory to save favicons. Include trailing slash.
$rand = rand(1000,9999);
$filename = $rand.$postvars["image"];
// Check not larger than 250kb.
if($postvars["image_size"] <= 256000){
// Check is valid extension.
if(in_array($ext,$valid_exts)){
if($ext == "jpg" || $ext == "jpeg"){
$image = imagecreatefromjpeg($postvars["image_tmp"]);
}
else if($ext == "gif"){
$image = imagecreatefromgif($postvars["image_tmp"]);
}
else if($ext == "png"){
$image = imagecreatefrompng($postvars["image_tmp"]);
}
if($image){
list($width,$height) = getimagesize($postvars["image_tmp"]);
$newwidth = $postvars["image_dimensions"];
$newheight = $postvars["image_dimensions"];
$tmp = imagecreatetruecolor($newwidth,$newheight);
// Copy the image to one with the new width and height.
imagecopyresampled($tmp,$image,0,0,0,0,$newwidth,$newheight,$width,$height);
// Create image file with 100% quality.
if(is_dir($directory)){
if(is_writable($directory)){
imagejpeg($tmp,$directory.$filename,100) or die('Could not make image file' );
if(file_exists($directory.$filename)){
// Image created, now rename it to its
$ext_pos = strpos($rand.$postvars["image"],"." . $ext);
$strip_ext = substr($rand.$postvars["image"],0,$ext_pos);
// Rename image to .ico file
rename($directory.$filename,$directory.$strip_ext.".ico");
return '<strong>Icon result:</strong><br/>
<img src="' .$directory.$strip_ext.'.ico" border="0" title="Favicon  Image Preview" style="padding: 4px 0px 4px 0px;background-color:#e0e0e0" /><br/>
Favicon successfully generated. <a href="' .$directory.$strip_ext.'.ico" target="_blank" name="Download favicon.ico now!">Click here to download your favicon or just right-click on the Icon and Save Image As</a>' ;
} else {
"File was not created.";
}
} else {
return 'The directory: "' .$directory.'" is not writable.' ;
}
} else {
return 'The directory: "' .$directory.'" is not valid.' ;
}
imagedestroy($image);
imagedestroy($tmp);
} else {
return "Could not create image file.";
}
} else {
return "File size too large or invalid file type. Max allowed file size is 250kb";
}
} else {
return "Invalid file type. You must upload an image file. (jpg, jpeg, gif, png).";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online .ico file creator" />
<meta name="keywords" content="online ico creator, favicon generator, favicon creator, favicon converter, what is favicon, ico, ico file">
<title>FavIcon Creator</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<form action="index.php?do=create"  enctype="multipart/form-data" method="post">

<h2>FavIcon Generator, Converter</h2><br />
Convert |.jpg .jpeg .gif .png to .ico file| Max 250kb file size!<br />
<p></p>
Image Dimensions:<br />
<select style="width: 170px;" name="image_dimensions">
<option selected="selected" value="16">16px x 16px</option>
<option value="32">32px x 32px</option>
</select>
<p>Choose Image:</p>
<input name="image" type="file" />
<input class="button" name="submit" type="submit" value="GO" />
</form>
<?php
if(isset($_GET["do"])){
if($_GET["do"] == "create"){
if(isset($_POST["submit"])){
// Call the generate favicon function and echo its returned value
$gen_favicon = generate_favicon();
echo $gen_favicon;
echo " :-)";
}
}
}
?>
<center>
<br>
<h3>More information on favicon (favorites icon)</h3>
<img border="0" src="ico.png" title="favicon"><br />
<p>A favicon <img width="15" height="15" border="0" src="../avatar brigante.jpg" title="favicon"> is a small, 16x16 image that is shown inside the browser's location bar(address bar) and bookmark menu when your site is called up. It is a good way to brand your site and increase it's prominence in your visitor's bookmark menu.</p>
<p>After you've created a neat favicon, it's time to add it to your site. To 
do so, follow the below simple procedure:</p>
<ol>
  <li>Upload the generated file (&quot;favicon.ico&quot;) to your site. Verify it's there 
  by typing http://mysite.com/favicon.ico in the browser's location, where 
  &quot;mysite.com&quot; is your site's address.</li>
  <li>Next, insert the below code in the HEAD section of your pages, at the very 
  least, your site's main index page:<pre>&lt;link rel=&quot;shortcut icon&quot; type="image/x-icon" href=&quot;/favicon.ico&quot;&gt;</pre>

  </li>
  <li>That's it! Note that your favicon may not appear immediately after you've 
  completed the above two steps. You may need to refresh a few times.</li>
</ol>
Modern Browsers can now display favicon with other file extensions such as: .jpg .png .gif and not only .ico file!<br />
</center>

<?php
include '../footer.php';
?>
