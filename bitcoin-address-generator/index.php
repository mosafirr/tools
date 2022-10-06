<!DOCTYPE html>
<html lang="en">
<head>
<title>Bitcoin Address Generator Online</title>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bitcoin (BTC, XBT) & Bitcoin SV (BSV) & Bitcoin Cash (BCH) Address Generator Online" />
<meta name="keywords" content="Bitcoin Address Generator, Bitcoin Address online, Bitcoin Address Generator Online, create bitcoin address, create bitcoin address online, create bitcoin sv address, create bitcoin cash address">
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Bitcoin (BTC, XBT) & Bitcoin SV (BSV) & Bitcoin Cash (BCH) Address Generator Online</h2>
Bitcoin (BTC, XBT) & Bitcoin SV (BSV) & Bitcoin Cash (BCH) Wallet Generator Online<br>
Bitcoin Address Generator Online<br>
Bitcoin Wallet Generator Online<br><br>
Get Bitcoin legacy address. Legacy addresses are the original BTC addresses. Old style.<br><br>

<button class="button" onclick="Generate()">Generate</button><br><br>
<!-- <input type="submit" class="button" onclick="Generate()" value="Generate" /><br><br> -->

Public Compressed Address. You can SHARE it everywhere.<br>
<b><div id="public"></div></b><br><br>

Public Compressed Key (SHARE)<br>
<b><div id="publickey"></div></b><br><br>

Secret/Private WIF Compressed Key (SECRET) Do not share it! Only it's needed for some Wallets, but carefully!<br>
<b><div id="secret"></div></b><br>

https://tools.bitcoin.com/cash-address-converter/<br><br>

Save all details in .txt file on your PC. That's all. You have Bitcoin, Bitcoin SV, Bitcoin Cash Wallet. Now it's time to "invest" :)<br>
Buy&Sell Crypto from: <a href="https://crypto.eti.pw" target="_blank" >crypto.eti.pw</a><br><br>

DONATE Bitcoin SV: qzg3x6m0ra43pd29lyv8mkajzawuc8cvhs7fyfrcjq<br><br><br>

<script type="text/javascript" src="bsv.min.js"></script>
<script>
function Generate() {
      let privateKey = bsv.PrivateKey.fromRandom()
      let publicKey = bsv.PublicKey.fromPrivateKey(privateKey)
      let address = bsv.Address.fromPublicKey(publicKey)
      let address2 = bsv.Address.fromPrivateKey(privateKey)
      document.getElementById("public").textContent = address;
      document.getElementById("publickey").textContent = publicKey;
      document.getElementById("secret").textContent = privateKey;   
      }
</script>

<?php
include '../footer.php';
?>
