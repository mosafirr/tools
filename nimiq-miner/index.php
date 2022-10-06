<!-- www.eti.pw -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>NIMIQ CPU Miner</title>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-language" content="en" />
<meta name="distribution" content="global">
<meta name="dc.date.created" content="01.12.2021">
<meta name="author" content="www.eti.ninja">
<meta name="description" content="Online NIMIQ Crypto Miner">
<meta name="keywords" content="nimiq miner, online nimiq miner, nimiq crypto miner, browser based miner, browser based mining, dig via browser, nimiq, nimiq crypto, nimiq cpu miner, mine crypto with cpu, crypto mining with cpu, dig with browser, dig crypto with browser, копай с браузъра, копай крипто с браузъра, копай крипто с браузър, копаене с браузър, копай крипто с браузър, онлайн крипто майнер, крипто копаене, крипто копаене с браузъра, крипто копаене през браузъра, онлайн копане, онлайн копаене, копаене на крипто, как да копая крипто, крипто майнер, крипто майнинг, nimiq pool">
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Nimiq Cryptocurrency Miner</h2>

Browser based CPU mining of NIMIQ (NIM) Crypto Currency<br><br>

<form method="POST" action="">
<i>Your Nimiq Address: </i>
<input type="text" name="address" id="address" style="width:300px;height:30px; opacity: 0.5;" title="Enter Your Nimiq Address" placeholder="Your Nimiq Address" />
<input type="submit" name="submit" class="button" value="Start ⛏️ mining via Browser" title="Let's Go, Dig!"/>
</form>

<!--<br>Via AceMining Pool: pool.acemining.co:8443<br>
Look your pool balance: <a href="https://acemining.co" target="_blank">www.acemining.co</a><br>-->
<br>Via AceMining Pool: nimiq.icemining.ca:2053<br>
Look your pool balance: <a href="https://icemining.ca" target="_blank">www.icemining.ca</a><br>

<?php
$address = htmlentities($_POST['address'], ENT_QUOTES, 'UTF-8');

if(!empty($_POST['address'])){

echo "<hr>Mining process started...<br>";

echo '
   <!-- <script src="https://cdn.jsdelivr.net/gh/Albermonte/nimiq-pool-webminer@1.0.11/nimiq-pool-webminer.js"></script> -->
        <script src="https://cdn.jsdelivr.net/gh/Albermonte/nimiq-pool-webminer@latest/nimiq-pool-webminer.min.js"></script>
        <script>
            window.onload = () => {
         // Pool Host, Pool Port, Wallet Address, # of CPU threads ... on default is 1 ...
         // PoolMiner.init("pool.acemining.co", 8443, "'.$address.'", window.navigator.hardwareConcurrency - 1)
            PoolMiner.init("nimiq.icemining.ca", 2053, "'.$address.'", window.navigator.hardwareConcurrency - 1)
            }
        </script>

    <!--<script>
            window.onload = () => {
         // Pool Host, Pool Port, Wallet Address, # of CPU threads ... on default is 1 from 2 ...
            PoolMiner.init("pool.acemining.co", 8443, "'.$address.'", window.navigator.hardwareConcurrency === 2 ? 1 : window.navigator.hardwareConcurrency - 2)
            }
        </script>-->

<div>Your device has <span id="cpu-cores"></span> logical Cores. Only 1 Core will dig. Please wait 30-40 seconds while connect to the Moon pool.</div> <font color="blue"><div id="hs" style="font-size: 50px;">0</div></font> Miner Hashrate (H/s) | Threads: 1<hr>
<script>document.querySelector("#cpu-cores").innerHTML = navigator.hardwareConcurrency;</script>
     ';
}

else {

print ("<br><p>You haven't Wallet/Address? - Get Nimiq Wallet: <a href='https://wallet.nimiq.com' target='_blank'>wallet.nimiq.com</a><br><p>What is Nimiq? - A blockchain technology inspired by Bitcoin, but designed to run in your browser. It is money by nature, but capable of so much more. Use it! Be rich!</p><br>");

}
?>

Desktop miners:<br>
<a href="https://nimiqdesktop.com" target="_blank">www.nimiqdesktop.com</a><br>
<a href="https://github.com/Albermonte/NIM-Pools-Hub-Miner/releases" target="_blank">NIM-Pools-Hub-Miner</a><br>
<a href="https://www.nimiq.com/developers/downloads/" target="_blank">www.nimiq.com/developers</a><br><br>

Official Website: <a href="https://www.nimiq.com" target="_blank">www.nimiq.com</a><br><br>

Dig via official website: <a href="https://miner.nimiq.com" target="_blank">miner.nimiq.com</a><br>
Dig via Fen webpage: <a href="https://nimiqminer.eti.pw" target="_blank">nimiqminer.eti.pw</a><br><br>

Nimiq Explorer: <a href="https://nimiq.watch" target="_blank">www.nimiq.watch</a><br>
Nimiq Faucet: <a href="https://getsome.nimiq.com" target="_blank">getsome.nimiq.com</a><br><br>

<a href="https://CryptoFaucets.eti.pw" target="_blank">CryptoFaucets.eti.pw</a><br>
<a href="https://crypto.eti.pw" target="_blank">BUY NIM</a><br><br>

The purpose is to help Nimiq crypto reach the Moon :)<br>
DONATE ADDRESS: NQ93 PU87 7R1U FX0F 9P6P YJAL UCLU YMGX BXJ5<br>

<?php
include '../footer.php';
?>
<!-- www.eti.wtf -->
