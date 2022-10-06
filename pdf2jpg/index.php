<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Convert .pdf to .jpg" />
<meta name="keywords" content="convert pdf to jpg, pdf to jpg, pdf2jpg, convert pdf, pdf to images">
<title>Convert PDF to JPG</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>PDF to JPG Converter</h2>

<?php
$message = "";
$display = "";
if($_FILES)
{
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
        
            $location   = "/usr/bin/convert";
            $name       = $output_dir. $NewImageName;
            $num = count_pages($name);
            $RandomNum   = time();
            $nameto     = $output_dir.$RandomNum.".jpg";
            $convert    = $location . " " . $name . " ".$nameto;
            exec($convert);
            for($i = 0; $i<$num;$i++)
            {
                $display .= "<img src='$output_dir$RandomNum-$i.jpg' title='Page-$i' /><br>"; 
            }
                $message = "PDF converted to JPEG sucessfully!<br /><a href='uploads' target='_blank'>See all pictures</a><br /><a href='del.php'>Delete all pictures</a>";
        }
    }
}
function count_pages($pdfname) {
      $pdftext = file_get_contents($pdfname);
      $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
      return $num;
    }
$content = $message.'<br />'.$display.'<form enctype="multipart/form-data" action="" method="post">
Choose a file: <input name="myfile" type="file" /> <input type="submit" class="button" value="Convert" id="b-0" />
</form>';

echo $content;
?>

<?php
include '../footer.php';
?>
