<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Your Document in Binary. Convert PDF to binary." />
<meta name="keywords" content="convert pdf to binary, convert pdf to text, pdf to binary, pdf2binary, convert pdf, pdf to text, pdf like binary, document like binary, pdf binary, ebook like binary, ebook in binary, doc in binary, document in binary, document in binary style, binary pdf, pdf binary converter, convert pdf in binary">
<title>Convert PDF to Binary</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>PDF to Binary Converter</h2>

Extract only text from PDF file and convert to Binary<br><br>

eBook in Binary Style<br>

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
    // output ( $pdf -> Text );
?>

<?php
function strToBin($pdf)
{
    if (!is_string($pdf))
        return false;
    $ret = '';
    for ($i = 0; $i < strlen($pdf); $i++)
    {
        $temp = decbin(ord($pdf{$i}));
        $ret .= str_repeat("0", 8 - strlen($temp)) . $temp;
    }
    return $ret;
}
echo "<br />In BYNARY is:<BR><textarea style='color: #00aff0; background-color: transparent; width: 100%; height: 300px;' onclick='this.select()' readonly placeholder='The result will be shown here in binary!' title='Your Document in Binary'>";
echo (strToBin(( $pdf -> Text )));
echo "</textarea><br>";
?>

<br><br>
Info:<br>
<a href="https://en.wikipedia.org/wiki/Binary_number" target="_blank">https://en.wikipedia.org/wiki/Binary_number</a><br>
<a href="https://books.google.bg/books?id=_bf0AQAAQBAJ" target="_blank">Romeo and Juliet in Binary</a><br>
Create your own eBook in binary style :)<br>

<?php
include '../footer.php';
?>
