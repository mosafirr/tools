<!DOCTYPE html>
<html lang="en">
<head>
<title>Bitcoin Private key Finder</title>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="bitcoin hunter, bitcoin private key, bitcoin private key finder, bitcoin private keys finder, bitcoin lotto, bitcoin lottery, bitcoin simple cracker tool, bitcoin cracker tool, bitcoin cracker, bitcoin private key cracker" />
<link type="text/css" rel="stylesheet" href="../css/main.css" />
<script src="crypto.js"></script>
<script src="ellipticcurve.js"></script>
<script src="kherwa.js"></script>
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Bitcoin Hunter</h2>

                <button id="run" class="button">Start</button> 
                <button id="stop" class="button">Stop</button>

                <h3>Bitcoin Legacy Address Uncompressed</h3>
                <small><div id="address"></div></small>

                <h3>Public Key</h3>
                <small><div id="public"></div></small>

                <h3>Private key in WIF</h3>
                <small><div id="wif"></div></small>

                <h3>Private key</h3>
                <small><div id="private"></div></small>
				
				<h3>Current Address Checking</h3>
				<small><div id="btcbal"></div></small>

	<div id="foundkey"></div>
	<div id="winner"></div>
	<img src="" id="fireworks">	

<script src="jquery.min.js"></script>
<script src="functions.js"></script>

<br /><br />
This simple tool try to find Bitcoin Legacy Uncompressed Address with a balance. When find address with balance, the generator will stop.
<br /><br />

<?php
include '../footer.php';
?>
