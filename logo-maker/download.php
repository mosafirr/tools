<?php
	error_reporting(E_ALL&~E_NOTICE);
	
	$w = 270;
	$h = 100;
	
	$im = imagecreatetruecolor($w, $h);
	
	$white = imagecolorallocate($im, 255, 255, 255);
	
	$color = sscanf('#' . $_GET['color'], '#%2x%2x%2x'); 
	
	$color2 = sscanf('#' . $_GET['color2'], '#%2x%2x%2x');
	
	$color = imagecolorallocate($im, $color[0], $color[1], $color[2]);
	
	$color2 = imagecolorallocate($im, $color2[0], $color2[1], $color2[2]);
	
	imagefilledrectangle($im, 0, 0, $w, $h, $white);
	
	$text = get_magic_quotes_gpc() ? stripslashes($_GET['text']) : $_GET['text'];
	
	$slogan = get_magic_quotes_gpc() ? stripslashes($_GET['slogan']) : $_GET['slogan'];
	
	$font = 'fonts/' . $_GET['font'];
	$font2 = 'slogan_fonts/' . $_GET['sloganFont'];
	
	$icon = $_GET['icon'];
	$pos = strpos($icon, "icon");
	if ($pos !== false)
		$icon = substr($icon, $pos);
		
	$icon_info = getimagesize($icon);
	
	$icon = imagecreatefromjpeg($icon);
	
	$a = imagettfbbox($_GET['size'], 0, $font, $text);
	$b = imagettfbbox($_GET['size2'], 0, $font2, $slogan);
	
	
	//header
	imagettftext($im, $_GET['size'], 0, $w/2-$a[2]/2, $h/2-$a[1]-$_GET['size2'], $color, $font, $text);
	//slogan
	imagettftext($im, $_GET['size2'], 0, $w/2-$b[2]/2, $h/2+$b[1]+$_GET['size2'], $color2, $font2, $slogan);
	
	imagecopyresampled($im, $icon, $w/2-$a[2]/2-$icon_info[0]-10, $h/2-$icon_info[1]-10, 0, 0, $icon_info[0], $icon_info[1], $icon_info[0], $icon_info[1]);
	
	$filename = md5(microtime());
	
	mkdir($filename, 755);
	imagegif($im, $filename."/logo.gif");
	imagepng($im, $filename."/logo.png", 9);
	
	include_once('pclzip.lib.php');
	$archive = new PclZip($filename.'/archive.zip');
	$v_list = $archive->create($filename."/logo.gif", PCLZIP_OPT_REMOVE_PATH, $filename);
	if ($v_list == 0) 
	{
		die("Error : ".$archive->errorInfo(true));
	}
	$v_list = $archive->add($filename."/logo.png", PCLZIP_OPT_REMOVE_PATH, $filename);
     if ($v_list == 0) {
       die("Error : ".$archive->errorInfo(true));
     }
	
	header('Content-type: application/zip');
	header('Cache-control: private');
	header('Content-Length: '.filesize($filename."/archive.zip"));
	header('Content-Disposition: attachment; filename="'.$text.'.zip"');
	readfile($filename.'/archive.zip');
	
	unlink($filename."/logo.gif");
	unlink($filename."/logo.png");
	unlink($filename.'/archive.zip');
	rmdir($filename);
		
	/*
	$zip = new ZipArchive;
	$res = $zip->open($filename.'.zip', ZipArchive::CREATE);
	if ($res === TRUE) 
	{
	    $zip->addFile($filename.".gif", 'logo.gif');
		$zip->addFile($filename.".png", 'logo.png');
	    $zip->close();
		
		
		
		/*
		imagejpeg($im);
		imagedestroy($im);
		imagedestroy($icon);	
			
	} 
	else 
	{
	    header('Content-type: image/jpeg');
		header('Content-Disposition: attachment; filename="logo.jpg"');
	}
	*/
	
?>