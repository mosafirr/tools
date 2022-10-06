<?php
define ("MSIZE","400"); 
if($_POST)
{
	//functin to get image extenction
	function getExt($img) {
         $pos = strrpos($img,".");
         if (!$pos) { return "null"; }
         $len = strlen($img) - $pos;
         $ext = substr($img,$pos+1,$len);
         return strtolower($ext);
 	}
 	//user input image file
	$img = stripslashes($_FILES["img"]["name"]);
	//temp image file name
	$tempimg = $_FILES['img']['tmp_name'];
	//Required new Width
	$nwidth= stripslashes($_POST["wt"]);
	//Required new Height
	$nheight= stripslashes($_POST["ht"]);
	$err=null;
	if($img)
	{ 
  	    $ext = getExt($img);
  	    //below are some image validations
  		if ((!$ext)&&($ext!="jpg")&&($ext!="jpeg")&&($ext!="png")&&($ext!= "gif"))
  		{
  			$err="<strong>Error!</strong> Please enter valid image jpg,jpeg,png,gif";
  		}
  		elseif (filesize($tempimg)> MSIZE*10485760) {
  		 	$err="<strong>Error!</strong> Too big file! Upload upto 10MB";
  		}
  		else{
  		 	if($ext=="jpg" || $ext=="jpeg" )
			{
				$source = imagecreatefromjpeg($tempimg);
			}
			else if($extension=="png")
			{
				$source = imagecreatefrompng($tempimg);
			}
			else 
			{
				$source = imagecreatefromgif($tempimg);
			}
			//getting orginal image height and widht
			list($width,$height)=getimagesize($tempimg);
			$temp=imagecreatetruecolor($nwidth,$nheight);
			imagecopyresampled($temp,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
			$newfile="uploads/". $_FILES['img']['name'];
			imagejpeg($temp,$newfile,100);
			imagedestroy($source);
			imagedestroy($temp);
  		 } 
	}
	else{
		$err='<strong>Error!</strong> Please select image';
	}
}
?>

<!DOCTYPE html>
<!-- www.eti.pw -->
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Image Resizer" />
<meta name="keywords" content="online image resizer, image resizer, resize image, resize pictures">
<title>Resize Image</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>
 
<a href="../">Free Online Tools</a>

<h3>Image Resizer</h3>
Only .jpg .jpeg .png .gif<br />
Max 10MB file size!<br />
<p></p>

<?php if($err){
echo ''.$err.'';
} 
?>
				
<?php 
if($newfile)
{
echo '<center><img src="'.$newfile.'"/></center>';
echo '<center>Right click to save your image</center>';
}
?>
			
				<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
				  <div class="control-group">
				    <label class="control-label" for="img">Choose File</label>
				    <div class="controls">
				      <input type="file" id="img" name="img" />
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="inputWidth">Width</label>
				    <div class="controls">
				      <div class="input-append">
			             <input type="text" style="width: 80px;" id="inputWidth" name="wt" placeholder="width" value=<?php if($nwidth) echo $nwidth; else echo "60"; ?> />
						 <span class="add-on">px</span>
						</div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="inputHeight">Height</label>
				    <div class="controls">
				    	<div class="input-append">
						 <input type="text" style="width: 80px;" id="inputHeight" name="ht" placeholder="height" value=<?php if($nheight) echo $nheight; else echo "60"; ?> >
						 <span class="add-on">px</span>
						</div>
				    </div>
				  </div>
				  <div class="controls">
				  	
		<button id="btnSubmit" name="btnSubmit" class="button" value="Resize">Resize</button>
				  </div>
				</form>

<?php
include '../footer.php';
?>
