<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="keywords" content="online speedtest, speedtest, speed test, bandwidth test, internet test, internet speedtest, bandwidth meter, bandwidth speedtest, bandwidth speed test, internet speed converter, speed meter, спийд тест, интернет тест, интернет скорост тест">
<title>Internet Speed Test</title>
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/speedtest.js"></script>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<div>

<h2>Internet Speed Test, Bandwidth Speed Test</h2>

<center>
<b>1.Test:</b><br />

<iframe id="iframeTest" src="http://openspeedtest.com/Get-widget.php" scrolling="no" height="490" width="750px" frameborder="0">
</iframe>

<p>&nbsp;</p>

<b>2.Test:</b><br />

 <div id="speedtest"></div>

            <script type="text/javascript">
                    var flashvars = {  };					
                    var params = { allownetworking: 'all', allowfullscreen: 'false', allowscriptaccess: 'always', wmode: 'opaque', bgcolor: '#ffffff'};					
                    var attributes = { id: 'speedtest', name: 'speedtest' };						  
                    swfobject.embedSWF("loader.swf?cache=<?php print rand(1000, 999999); ?>", "speedtest", "800", "500", "10.0.0", false, flashvars, params, attributes);
            </script>
            
		
	<div id="applet"></div>
These tests are up to different servers!<br />
Test 1 is to other server and Test 2, Test 3, Test4 are to this server! The results will be different!<br />

<p>&nbsp;</p>

<b>3.Fast Download Test:</b><br />

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="250" height="77" title="~download speed">
    <param name="movie" value="dnltest.swf" />
    <param name="quality" value="high" />
    <embed src="dnltest.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="250" height="85"></embed>
</object>

<p>&nbsp;</p>

<b>4.Fast Test:</b><br />

<p id="download"></p>

<p id="upload"></p>

Latency (latent period, reaction time, response time, ping) <div id="ping"></div>

    <script type="text/javascript">
        var w = new Worker('./speedtests/speedtest_worker.min.js') // create new worker
        setInterval(function () { w.postMessage('status') }, 100) // ask for status every 100ms
        w.onmessage = function (event) { // when status is received, split the string and put the values in the appropriate fields
            var data = event.data.split(';') // string format: status;download;upload;ping (speeds are in mbit/s) (status: 0=not started, 1=downloading, 2=uploading, 3=ping, 4=done, 5=aborted)
            document.getElementById('download').textContent = data[1] + ' Mbit/s - Download'
            document.getElementById('upload').textContent = data[2] + ' Mbit/s - Upload'
            document.getElementById('ping').textContent = data[3] + ' ms, ' + data[5] + ' ms jitter'
            document.getElementById('ip').textContent = data[4]
        }
        w.postMessage('start') // start the speedtest (default params. keep garbage.php and empty.dat in the same directory as the js file)
    </script>

<!--
<p>&nbsp;</p>

<b>5.Test:</b><br />

<script>			
// Speedtest by (c) www.my-speedtest.com			
// do not change the settings. 
// Use our customizer under http://www.my-speedtest.com/custom_speedtest.htm 
lang="";
</script>
<script src="http://www.my-speedtest.com/speedtest/js/webmaster_new_gauge.js"></script><center></center>
-->

<p>&nbsp;</p>

<p><span style="color:#0AF2F2">Internet speed converter:</span></p>

<script LANGUAGE="JavaScript"> 
function calcul()
{
var n=document.getElementById("N").value;
var t=document.getElementById("t").value;
var nb=parseInt(n);
   
   if(isNaN(nb))
   {
   alert("Enter number! Въведи число!");
   }
   else
   {
    if(t=='Mbps')
	{nb=nb*1024;}
	else {if(t=='Gbps')
		{ nb=nb*1024*1024;}
		else {if(t=='KBps')
		{ nb=nb*8;}
			else {if(t=='MBps')
			{ nb=nb*1024*8;}
			else {if(t=='GBps')
			{ nb=nb*1024*1024*8;}
			}}}}
			  
				document.getElementById("Kbps").innerHTML ="<font color='#D60202'>"+nb+"</font>"+" Kilobit per sec (Kbps)";
				document.getElementById("Mbps").innerHTML ="<font color='#D60202'>"+nb/1024+"</font>"+" Megabit per sec (Mbps)";
				document.getElementById("Gbps").innerHTML ="<font color='#D60202'>"+nb/(1024*1024)+"</font>"+" Gigabit per sec (Gbps)";
				document.getElementById("KBps").innerHTML ="<font color='#D60202'>"+nb/8+"</font>"+" Kilobyte per sec (KBps) - <font color='#D60202'>u must know this|това трябва да знаеш</font>";
				document.getElementById("MBps").innerHTML ="<font color='#D60202'>"+nb/(1024*8)+"</font>"+" Megabyte per sec (MBps)";
				document.getElementById("GBps").innerHTML ="<font color='#D60202'>"+nb/(1024*1024*8)+"</font>"+" Gigabyte per sec (GBps)";
   }
 
}
</script>
      <form name="form" > 
        <div align="center"> 
          <input type="text" id="N"> 
          <select name="t" id="t"> 
            <option value="Kbps">Kilobit per sec(Kbps) </option> 
            <option value="Mbps">Megabit per sec(Mbps) </option> 
            <option value="Gbps">Gigabit per sec(Gbps) </option> 
            <option value="KBps">Kilobyte per sec(KBps) </option> 
            <option value="MBps">Megabyte per sec(MBps) </option> 
	    <option value="GBps">Gigabyte per sec(GBps) </option> 
          </select> 
          <input type="button" class="button" name="b" value="Convert" onClick="calcul()"> 
        </div> 
      </form> 
      <p align="center"></p></td> 
  </tr></table> 
<p><font color='#0AF2F2'>
	  <div align="center"  id="Kbps">Kilobit per sec (Kbps)</div> 
          <div align="center"  id="Mbps">Megabit per sec (Mbps)</div> 
	  <div align="center"  id="Gbps">Gigabit per sec (Gbps)</div>
	  <div align="center"  id="KBps">Kilobyte per sec <font color='#D60202'>(KBps)</font></div> 
	  <div align="center"  id="MBps">Megabyte per sec (MBps)</div> 
	  <div align="center"  id="GBps">Gigabyte per sec (GBps)</div> 
</font></p>
<p>&nbsp;</p>

<p>
<small>
1 Megabit per sec  ( Mbps ) = 1 024 Kilobit per sec Kbps<br />
1 Gigabit per sec ( Gbps ) = 1 024 Mbps = 1 048 576 Kbps<br />
1 Kilobyte per sec ( KBps ) = 8 Kbps<br />
1 Megabyte per sec ( MBps ) = 1 024 KBps = 8192 Kbps<br />
1 Gigabyte per sec ( GBps) = 1 024 MBps = 8 388 608 Kbps<br />
</small>
</p>
</center>

</div>

<?php
include '../footer.php';
?>
