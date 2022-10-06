<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="URL to PDF Online Converter">
<meta name="keywords" content="url to pdf, url 2 pdf, url2pdf, website to pdf, site to pdf, url to pdf converter, website like pdf, url to pdf file, website2pdf, уебсайт в pdf, сайт като pdf, вземи сайт като pdf, сайт в pdf">
<title>URL to PDF</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Website to PDF</h2>

1.Converter<br>

<?php

if(isset($_POST['id']))
{

$ID = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');

function clean_url($ID){
	return str_replace(array('http://','https://'),'',$ID);
}

// api from: https://github.com/alvarcarto/url-to-pdf-api
echo  '<p align="right"><small>Please wait to convert, and then just Download it from Menu below</small></p>
<iframe src="https://url-to-pdf-api.herokuapp.com/api/render?url=http://'.clean_url($ID).'" width="100%" height="700" allowtransparency="true" style="border:none"></iframe><br>';
}

echo '
<br>
<form method="post" action="">
<input type="text" name="id" id="id" style="height:40px;" placeholder="Enter Link" title="without http://">
<input type="submit" class="button" title="URLtoPDF" value="Proceed">
</form>';
?>

<br><br>

2.Converter<br>

<?php

// api from: https://pdflayer.com     

include('pdflayer.class.php');

if(isset($_POST['id1']))
{

function clean_url($html2pdf){
	return str_replace(array('http://','https://'),'',$ID1);
}

//Instantiate the class
$html2pdf = new pdflayer();

//set the URL to convert
$html2pdf->set_param('document_url',$_POST['id1']);

//start the conversion
$html2pdf->convert();

//save it to disk
file_put_contents('website-to-pdf.pdf', $html2pdf->pdf);
echo '<p align="right"><small>Please wait to convert, and then just Download it from Menu below</small></p>
<iframe src="./website-to-pdf.pdf" width="100%" height="700" allowtransparency="true" style="border:none"></iframe><br>';
}

echo '
<br>
<form method="post" action="">
<input type="text" name="id1" id="id1" style="height:40px;" value="http://" title="with http://" placeholder="Enter Link">
<input type="submit" class="button" title="URLtoPDF" value="Proceed">
</form>';
?>

<?php
include '../footer.php';
?>
