<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online HTML CSS JavaScript Editor with Preview" />
<meta name="keywords" content="online html css javascript editor, css editor, online css editor, js editor online, online editor, online html editor, html editor">
<title>Online HTML,JS,CSS Editor</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>
  
<h2>Online HTML, JS, CSS Editor</h2>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $("#btn").click(function () {
                $("input[type=text]").val("");
                $("textarea").val("");
            });
        });
</script>

<form id="tryitform" name="tryitform" action="output.php" target="view" method="post">

<button type="button" id="btn">Clear</button> <button type="submit">Submit Code &raquo;</button><br>
<strong> Source Code:</strong><br> 
<textarea id="code" name="code" style="width:100%;height:345px;">
Type your HTML, CSS, JavaScript(JS) code here
</textarea><br>
<small>Undo: Ctrl+Z | Redo: Shift+Ctrl+Z | Cut: Ctrl+X | Copy: Ctrl+C | Paste: Ctrl+V | Sellect All: Ctrl+A | Find: Ctrl+F</small><br><br>
<strong> Preview:</strong>
<iframe width="100%" height="650px" frameborder="0" src="output.php" name="view" id="view"> </iframe>

</form>

<?php
include '../footer.php';
?>
