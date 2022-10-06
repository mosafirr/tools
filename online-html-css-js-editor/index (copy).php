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
<style type="text/css">
table{ margin: 0 ; } textarea, iframe{ width: 470px; height: 650px; } </style>
<form id="tryitform" name="tryitform" action="output.php" target="view" method="post">
<table border="1">
<tr>
<td> <strong> Source Code:</strong> <button type="submit">Submit Code &raquo;</button> HTML, CSS, JavaScript(JS)</td>
<td> <strong> Preview:</strong> </td>
</tr>
<tr>
<td>
<textarea id="code" name="code">
Type your HTML, CSS, JavaScript code... here is an example:

<style type="text/css">
body
{
background-color:#b0c4de;
}
</style>

<script>
function formReset()
{
document.getElementById("form").reset();
}
</script>

<p>Enter some text in the fields below, then press the "Reset form" button to reset the form.</p>

<form id="form">
First name: <input type="text" name="fname"><br>
Last name:  <input type="text" name="lname"><br><br>
<input type="button" onclick="formReset()" value="Reset form">
</form>
</textarea>
</td>
<td>
<iframe width="100%" height="650px" frameborder="0" src="output.php" name="view" id="view"> </iframe>
</td>
</tr>
</table>
</form>
<button type="button" id="btn">Clear</button>

<?php
include '../footer.php';
?>
