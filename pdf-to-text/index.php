<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Convert PDF to text" />
<meta name="keywords" content="convert pdf to text, pdf to text, pdf2text, convert pdf, pdf to text">
<title>Convert PDF to Text</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>PDF to Text Converter</h2>

Extract only text from PDF file<br>

<form enctype="multipart/form-data" action="" method="post">
<br>Choose a file: <br>
<input name="myfile" type="file" /> 
<input type="submit" class="button" value="Convert" />
</form>

<br />

<?php
$output_dir = "uploads/";
    ini_set("display_errors",1);
    if(isset($_FILES["myfile"]))
    {

        $RandomNum   = time();
        
        $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
        $ImageType      = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.
     
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt       = str_replace('.','',$ImageExt);
        if($ImageExt != "pdf")

        {
            $message = "Invalid file format only <b>\"PDF\"</b> allowed!";
        }
        else
        {
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
         
            move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
        
            $name       = $output_dir. $NewImageName;
            $RandomNum   = time();
            $nameto     = $output_dir.$RandomNum.".pdf";
        }
    }
                
include ( 'PdfToText.phpclass' ) ;

	function  output ( $message )
	   {
		if  ( php_sapi_name ( )  ==  'cli' )
			echo ( $message ) ;
		else
			echo ( nl2br ( $message ) ) ;
	    }

	$pdf	=  new PdfToText ( "$name" ) ;

	output ( $pdf -> Text ) ;
?>

<?php
include '../footer.php';
?>
