<?php
include_once("init.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="broken link checker, broken link checker php script" />
<meta name="description" content="Broken link checker" />
<title>Broken link checker</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Broken link checker</h2>

<p><?php if(@$desc){echo "$desc";}?></p>

<form method="POST" <?php if(@$formaction){echo " action=\"$formaction\"";}?><?php if(@$formtarget){echo " target=\"$formtarget\"";}?><?php if(@$formonsubmit){echo " onsubmit=\"$formonsubmit\"";}?>>
