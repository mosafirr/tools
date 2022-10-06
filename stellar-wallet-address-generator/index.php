<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<title>Stellar Lumens wallet generator</title>
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Stellar Wallet address generator">
<meta name="keywords" content="Stellar wallet address generator, stellar, stellar lumens, stellar wallet generator, stellar address generator, lumens, lumens address generator, stellar crypto, stellar cryptocurrency, stellar cryptocurrency generator, stellar cryptocurrency address generator, own offline crypto stellar address, crypto stellar address, Stellar Lumens (XLM) wallet, Stellar Lumens (XLM) generator, Stellar Lumens (XLM) generator online, online Stellar Lumens (XLM) generator">
<link type="text/css" rel="stylesheet" href="../css/main.css" />
<script type="text/javascript" src="stellar-base.min.js"></script>
<script type="text/javascript" src="qrcode.min.js"></script>
</head>
<!-- <body> -->
<body onload="generate()">

<a href="../">Free Online Tools</a>

<h2>Stellar Lumens (XLM) wallet generator</h2>

Stellar Address generator<br>
Get own offline crypto Stellar address<br><br>

<button onclick="generate()" class="button" title="Generate new Stellar Address">Generate Address</button>

<br>

<br>Stellar Address:
<div id="public"></div>
<div id="public_qr"></div>
<br><br>Secret Key:
<div id="secret"></div>
<div id="secret_qr"></div>

<br><br>
Save all details in .txt file on your PC. That's all. You have Stellar Lumens (XLM) Offline/Cold Wallet. Now it's time to "invest" a.k.a. speculate :)<br>
Buy&Sell Crypto from: <a href="https://crypto.eti.pw" target="_blank" >crypto.eti.pw</a><br><br><br>

<script type="text/javascript">
  function generate() {
    var keypair = StellarBase.Keypair.random();
    document.getElementById("public").innerText = keypair.publicKey();
    document.getElementById("secret").innerText = keypair.secret();
    document.getElementById("public_qr").innerHTML = "";
    document.getElementById("secret_qr").innerHTML = "";
    new QRCode(document.getElementById("public_qr"), keypair.publicKey());
    new QRCode(document.getElementById("secret_qr"), keypair.secret());
  }
</script>

<?php include '../footer.php'; ?>
