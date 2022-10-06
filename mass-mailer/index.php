<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Mass Mailer" />
<meta name="keywords" content="mass mailer, online mass mailer, mass email attacker, mass email attack, send mass emails, mass email attack">
<title>Mass Mailer</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Mass Mailer</h2><br />

<?php

echo "<form method=post action='send.php' target='_blank' enctype='multipart/form-data'>";

echo "<input name='from' size='30' maxlength='30' placeholder='From Email'> Email<br><br>";
echo "<input name='who' size='30' maxlength='30' placeholder='Your Name'> Name<br><br>";
echo "<input name='subject' size='30' maxlength='30' placeholder='About'> Subject<br><br>";

echo "Recipients: <small>(you can put here 300 emails one below another, without comma or semicolon)</small><br><textarea name='to' style='width: 450px;height: 200px;' placeholder='To:'></textarea><br>";

echo "Message:<br><textarea name='message' style='width: 450px;height: 200px;' placeholder='Letter'></textarea><br>";


// echo "upload file: <input type=file name='userfile[]' class='bginput'><br />";

echo "<br /><input type='submit' class='button' value='Send'>";

echo "</form>";

?>

<?php
include '../footer.php';
?>
