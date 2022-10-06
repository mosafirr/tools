<?php echo 

	$pixels = $_POST["pixels"];	
	if(is_null($pixels))
	{
		$pixels = "";		
	}

	$width = $_POST["width"];
	if(is_null($width))
	{
		$width = 250;
	}
	
	$height  = $_POST["height"];
	if(is_null($height))
	{
		$height = 250;
	}
	
	// Generate New File Name
	$fileName = "images/".uniqid().".jpg";
	
	/// Get Pixel Data and generate new Bitmap Data
    /// Then save to server 
	/// <param name="pixels">pixelData from swf</param>
    /// <param name="fileName">Image Save Path</param>
    /// <param name="width">Image Width</param>
	/// <param name="height">Image Height</param>
	GetPixelAndSave($fileName, $pixels, $width, $height);
	

function GetPixelAndSave($fileName, $pixels, $width, $height)
{
	$pixelsLen = strlen($pixels);
	$x = 0;
    $y = 0;
	
	$im = imagecreatetruecolor($width, $height);

	for ($i = 0; $i < $pixelsLen / 6; $i++) {
		$curPixelColor = substr($pixels, $i * 6, 6);
		$rgb_arr = html2rgb ("#".$curPixelColor);
		$color = imagecolorallocate( $im, $rgb_arr[0], $rgb_arr[1], $rgb_arr[2] );
		imagesetpixel( $im, $x, $y, $color );
		
		if ($x == $width - 1)
		{
			$x = 0;
			$y++;
		}
		else
		{
			$x++;
		}
	}

	// start buffering
	ob_start();
	// output jpeg (or any other chosen) format & quality
	imagejpeg($im, NULL, 85);
	// capture output to string
	$contents = ob_get_contents();
	// end capture
	ob_end_clean();	
	// free up memory
	imagedestroy($im);

	$fh = fopen($fileName, "a+" );
    fwrite( $fh, $contents );
	fclose( $fh );
	
	$fh = fopen("images/cap-test.jpg", "w" );
    fwrite( $fh, $contents );
	fclose( $fh );
	
}

function html2rgb($color)
{
    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        list($r, $g, $b) = array($color[0].$color[1],
                                 $color[2].$color[3],
                                 $color[4].$color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
    else
        return false;

    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

    return array($r, $g, $b);
}

?>