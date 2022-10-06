<?php
if(isset($_POST['submit'])){
	$err="";
	$path = "uploads/";
	$source='';
	//delete all existing  images in upload dir
	array_map('unlink', glob("uploads/*"));
	//alled image format will be used for filter	
	$allowed_formats = array("jpg", "JPG", "jpeg", "png", "gif");
	//collecting our image data.
	$imgname = $_FILES['img']['name'];
	$tmpname = $_FILES['img']['tmp_name'];
	$size = $_FILES['img']['size'];
  $ext=end(explode(".", $imgname));

	if(!$imgname){
		$err="<strong>Error!</strong> Please select image!";
	}
	elseif (!in_array($ext,$allowed_formats)) {
		$err="<strong>Error!</strong> Invalid file formats (only .jpg .png .gif)";
	}
	elseif ($size>(1024*1024)) {
		$err="<strong>Error!</strong> Please upload small image!";
	}
	else{
		if($ext=="jpg" || $ext=="jpeg" ){ 
			$source = imagecreatefromjpeg($tmpname);
		}
		else if($ext=="png"){
			$source = imagecreatefrompng($tmpname);
		}
		else{
			$source = imagecreatefromgif($tmpname);
		}

		list($ow,$oh)=getimagesize($tmpname);
		$aratio= $ow/$oh;
		$newWidth=410;
		$newHeight=$newWidth/$aratio;

		$temp=imagecreatetruecolor($newWidth,$newHeight);
		imagecopyresampled($temp,$source,0,0,0,0,$newWidth,$newHeight,$ow,$oh);
		$image=$path.$imgname;
		imagejpeg($temp,$image,100);
		imagedestroy($source);
		imagedestroy($temp);
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
<meta name="description" content="Convert Color Image To Black and White" />
<meta name="keywords" content="color image to blackwhite, convert color image to black and white, color image to black and white, color pic to black, color picture to blackwhite, color to blackwhite, color2black">
<title>Color Image To BlackWhite</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
<style type="text/css">
.container{
	width: 940px;
	margin: 0 auto;
}
.mini-layout {
	border: 1px solid #DDD;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.075);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.075);
	box-shadow: 0 1px 2px rgba(0,0,0,.075);
	margin-bottom: 20px;
	padding: 9px;
	width: 900px;
	margin: 0 auto;
}
.span4,.span5{
	width: 49%;
	float: left;
}

.span5{
	width: 45%;
	padding:0 1em;
}
.span7{
	clear: both;
	border: 5px solid #ddd;
	margin: 0 auto;
	width: 500px;
	padding: 5px;
	border-radius: 5px;
}
#imgc,#bwimg{
	margin: 0 0.3em; 
	border:5px solid #eee;
	max-width: 400px;
}
canvas{
	display: none;
}
div.frame {
	background: #fff;
	padding: 5px;
	border: solid 2px #ddd;
}
input[type="file"],button{
	padding: 5px 20px;
	background: #333;
	color: #fff;
	border: 0;
	border-radius: 4px;
	cursor: pointer;
}
eti{
color: #0089ca;
}
</style>
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Convert Color Image To Black and White</h2><br />

<div class="container">

			<div class="mini-layout">
				<div class="span4">
					<?php 
					//if image uploaded this section will shown
						if($image)
						{
			echo "<eti>Orginal image</eti><img style='' src='".$image."' id=\"imgc\" style='width:100%' >";
						}
					?>
				</div>
				<div class="span5">
						<?php 
						//if image uploaded this section will shown
						if($image)
						{	echo "<eti>Black and White image</eti>
						  <canvas id='canvas' width='410'></canvas><img id='bwimg' />";
						}
					?>
				</div>	
				<div class="span7">
					<?php
					//if any error while uploading
					if($err)
					{
						echo '<div class="alert alert-error">'.$err.'</div>';
					}
					?><br />
					<form id="imgcrop" method="post" enctype="multipart/form-data">
						Upload image: <input type="file" name="img" id="img" />
						<input type="hidden" name="imgName" id="imgName" value="<?php echo($imgname) ?>" />
						<button class="button" name="submit">Submit</button>
					</form>
				</div>
				<div style="clear:both"></div>
			</div>
<?php
if($image)
{
?>			
<script type="text/javascript">
function convertBW(img) {
	var newimg=document.getElementById('bwimg');
  var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');
  var x = 0;
  var y = 0;
  canvas.height=<?php echo $newHeight ?>;
  context.drawImage(img, x, y);
  var imgData = context.getImageData(x, y, img.width, img.height);
  var data = imgData.data;

  for(var i = 0; i < data.length; i += 4) {
    var constra = 0.34 * data[i] + 0.5 * data[i + 1] + 0.16 * data[i + 2];
    data[i]     = constra;
    data[i + 1] = constra;
    data[i + 2] = constra;
  }

 context.putImageData(imgData, x, y);

	var savedData = canvas.toDataURL();
  newimg.src = savedData;
	}
  var img = new Image();
  img.onload = function() {
    convertBW(this);
  };
  img.src ="<?php echo $image ?>" ;
</script>

<?php  } ?>
 
<?php
include '../footer.php';
?>
