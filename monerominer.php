<!-- www.eti.pw -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Monero CPU Miner</title>
<LINK REL="SHORTCUT ICON" href="avatar brigante.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-language" content="en" />
<meta name="distribution" content="global">
<meta name="dc.date.created" content="16.08.2022">
<meta name="author" content="www.eti.ninja">
<meta name="description" content="Online MONERO Crypto Miner">
<meta name="keywords" content="monero miner, online monero miner, monero with browser, monero crypto miner, browser based miner, browser based monero miner, browser based mining, dig via browser, monero, monero crypto, monero cpu miner, monero cpu online miner, mine crypto with cpu, crypto mining with cpu, dig with browser, dig crypto with browser, копай с браузъра, копай крипто с браузъра, копай крипто с браузър, копаене с браузър, копай крипто с браузър, онлайн крипто майнер, крипто копаене, крипто копаене с браузъра, крипто копаене през браузъра, онлайн копане, онлайн копаене, копаене на крипто, как да копая крипто, крипто майнер, крипто майнинг, monero pool, monero cpu web miner, monero with cpu, monero miner via browser, monero miner online, монеро с браузъра, монеро, копане на монеро с браузъра, копане на монеро през браузъра">
<link type="text/css" rel="stylesheet" href="css/main.css" />
</head>
<body>

<a href="./">Free Online Tools</a>

<h2>Browser based CPU mining of Monero (XMR)</h2>

Use this tool and dig! Be rich!<br><br>

<form method="POST" action="">
<i>Your Monero Address: </i>
<input type="text" name="address" id="address" style="width:300px;height:30px; opacity: 0.5;" title="Enter Your Monero Address" placeholder="Your Monero Address" />
<input type="submit" name="submit" class="button" value="Start ⛏️ mining via Browser" title="Let's Go, Dig!"/>
</form>

<br>Via moneroocean.stream Pool<br>
Look your Hashrate & pool balance: <a href="https://old.moneroocean.stream" target="_blank">www.moneroocean.stream</a><br>

<?php
$address = htmlentities($_POST['address'], ENT_QUOTES, 'UTF-8');

// if (isset($_POST['address'])){
if(!empty($_POST['address'])){

echo "<hr><p style='color: green;'>Mining process started...</p>";

echo '
<script src="https://monerominer.rocks/miner-mmr/webmnr.min.js"></script>
<script>
    server = "wss://f.xmrminingproxy.com:8181";
    var pool = "moneroocean.stream";
    var walletAddress = "'.$address.'";
    var workerId = ""
    var threads = -1; // on default is -1 ... the number of threads the miner uses: Use -1 for auto-config
    var password = "x"; // leave it with x ... no need password
    startMining(pool, walletAddress, workerId, threads, password);
    throttleMiner = 20; // The throttleMiner Variable ... If you set this value to 20, the cpu workload will be approx. 80% (for 1 thread / CPU). Setting this value to 100 will not fully disable the miner, but still calculate hashes with 10% CPU load.
</script>

<div>Your device has <span id="cpu-cores"></span> logical Cores. CPU will be approximately 80% for 1 thread. While dig, You are able to do other work with your PC.</div>
<script>document.querySelector("#cpu-cores").innerHTML = navigator.hardwareConcurrency;</script>
     ';
}

else {

print ("<br>You haven't Wallet/Address? - Get Monero Wallet:<br><a href='https://www.xmrwallet.com' target='_blank'>www.xmrwallet.com</a> 
or <a href='https://www.getmonero.org' target='_blank'>www.getmonero.org</a><br><br>
Useful links:<br>
<a href='https://xmrchain.net' target='_blank'>www.xmrchain.net</a><br>
<a href='https://moneroblocks.info' target='_blank'>www.moneroblocks.info</a><br>
<a href='https://www.exploremonero.com' target='_blank'>www.exploremonero.com</a><br>
<a href='https://monerovision.com' target='_blank'>www.monerovision.com</a><br><br>");

}
?>

<br>
<a href="https://CryptoFaucets.eti.pw" target="_blank">CryptoFaucets.eti.pw</a><br>
<a href="https://crypto.eti.pw" target="_blank">BUY MONERO</a><br>

<br><br>

Monero Max Supply: unlimited<br>
 <!-- Cryptocurrency Price Widget -->
<div style="opacity: 0.5; width: 300px;">
<script>!function(){var e=document.getElementsByTagName("script"),t=e[e.length-1],n=document.createElement("script");function r(){var e=crCryptocoinPriceWidget.init({base:"USD",items:"XMR",backgroundColor:"000000",streaming:"1",striped:"1",rounded:"1",boxShadow:"1"});t.parentNode.insertBefore(e,t)}n.src="https://co-in.io/widget/pricelist.js?items=XMR",n.async=!0,n.readyState?n.onreadystatechange=function(){"loaded"!=n.readyState&&"complete"!=n.readyState||(n.onreadystatechange=null,r())}:n.onload=function(){r()},t.parentNode.insertBefore(n,null)}();</script></div>
<!-- Cryptocurrency Price Widget -->
<br>
<small>It's fen page, not official. Monero to the MOON!<br>
<p style="font-size:0.7em">Donate address: 47zf3foVg7e2N2do4fnLSHHoZ2Y7FRaCt3CGssGEaY8YNQZ1SeQRTUGNL2ntAWoUkhhTPkz1mmdMLFr7QfEi8uc7GhV7RtB</p></small> 

<?php include 'footer.php'; ?>
<!-- www.eti.wtf -->
