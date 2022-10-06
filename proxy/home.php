<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Online Fast Web Proxy">
<meta name="keywords" content="proxy, web proxy, fast proxy, fast web proxy, free proxy, browser proxy, bg proxy, прокси, уеб прокси, прокси сървър, бързо прокси, бързо уеб прокси">
<title>Web Proxy</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />

		<style type="text/css">
			
			h1 {
				font-size: 2em;
			}
			#proxy_url {
				font-family: "Trebuchet MS", sans-serif;
				font-size: 16px;
				color: #666666;
				width: 450px;
				padding: 4px;
				border: 1px solid #AAAAAA;
			}
			#proxy_options {
				margin: 10px;
			}
			#proxy_button {
				font-family: sans-serif;
				font-size: 16px;
				font-weight: bold;
				padding: 4px;
				cursor: pointer;
			}
			#footer {
				text-align: center;
				padding: 10px 0px;
			}
			#footer a {
				color: #FF4444;
			}
		</style>

</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Fast Web Proxy</h2>

<script>

function getUserIP(onNewIP) { 

    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    var pc = new myPeerConnection({
        iceServers: []
    }),
    noop = function() {},
    localIPs = {},
    ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
    key;

    function iterateIP(ip) {
        if (!localIPs[ip]) onNewIP(ip);
        localIPs[ip] = true;
    }

    pc.createDataChannel("");

    pc.createOffer(function(sdp) {
        sdp.sdp.split('\n').forEach(function(line) {
            if (line.indexOf('candidate') < 0) return;
            line.match(ipRegex).forEach(iterateIP);
        });
        
        pc.setLocalDescription(sdp, noop, noop);
    }, noop); 

    pc.onicecandidate = function(ice) {
        if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
        ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
    };
}


getUserIP(function(ip){
		document.getElementById("ip").innerHTML = 'Internal LAN IP - Your local IP address is: '  + ip + "";
});
</script>

<?php
    $url = $_SERVER['SCRIPT_FILENAME'];
    $pp = strrpos($url,"/");
    $url = substr($url,0,$pp);
    $ura = $_SERVER['SCRIPT_NAME'];
    $host = $_SERVER['SERVER_NAME'];
    $ser = "http://$host";
    $ura= $ser.$ura; 
    $pp1 = strrpos($ura,"/");
    $ura = substr($ura,0,$pp1);
    $url1=explode('/', $url);
    $url=array_pop($url1);
    $url1=implode('/', $url1);
    $ura1=explode('/', $ura);
    $ura=array_pop($ura1);
    $ura1=implode('/', $ura1);

    $hm = "$url1"; 
    $hm2 = "$ura1"; 
    include "onlinevisitors.php";
?>
<?php
$remoteip=$_SERVER['REMOTE_ADDR'];
$serverip=$_SERVER['SERVER_ADDR'];
$proxy = $_SERVER["HTTP_X_FORWARDED_FOR"];
echo "Your IP Address is: <strong>$remoteip</strong> <= $proxy <br />";
echo "<span id='ip'></span><br>";
echo "IP Address of this Proxy is: <strong>$serverip</strong> <br />
...that mean you will browse websites with this IP <strong>$serverip</strong>";
?> 

<?php
$ip = $_SERVER['REMOTE_ADDR'];
$pagina = $_SERVER['REQUEST_URI'];
$data = date("d-m-y | H:i:s");
$browser = $_SERVER['HTTP_USER_AGENT'];
$referred = $_SERVER['HTTP_REFFERER'];
$invoegen = $data . " |" . $browser . " |IP: " . $ip . " - " . $pagina . "<br />";
$fopen = fopen("iplog.html", "a");
fwrite($fopen, $invoegen);
fclose($fopen);
?>

<p>
<small>| After that, the Proxy Form will appear below and you may use it for other URL | </small><br />
<small>| You do not need to write http:// then or now | There are problems with some websites | </small><br />
<small>| Now put the link and click the button Browse, and enjoy the freedom of surfin'... | </small><br />
</p>
               <form method="post" action="./">
			<input type="hidden" name="__proxy_action" value="redirect_browse" />
			<input type="text" name="url" style="width:350px;height:40px;" value="http://" id="proxy_url" />
			<input type="submit" class="button" value="Browse" />

               </form>

 </div>

<p>
I suggest you to use: www.vpngate.net <br /> [...and then your Operating System will use VPN App for all processes, and not only for the Browser App (like IE, Opera, Firefox) like this web Proxy or other...  <br /> All incomming and outgoing net traffic packets will be encrypted and very secured...and your IP address will be different from yours own from your fuckin' ISP... because they are sniffing you with powerful Sniffers...they filtrate your packets...be sure they do that with attack 'man in the middle' ... in fact, everyone in the LAN can Sniff traffic and be a 'man in the middle' ... every web server sniff, collect different types of data]
</p>
<p>
This Proxy cannot open some websites ... <br />
There are problems with JavaScript Libraries and all options in the site you visit will not function...
</p>
<p>
This Proxy is not safe! Actually no one is:) All proxy servers have the ability to track everything you do. However, the bad guys track your activity for the purposes of gathering credit cards, emails,  user ids and passwords, birth dates and other valuable information. In fact, many ruthless webmasters set up proxy sites just for this purpose! They do this with Sniffers and programming logic. If you use a proxy, the person who runs the proxy can not only see your IP, any links, what you enter in forms, but he can also see other personal information like that. You really shouldn't log into anything important on a proxy, because the person who runs the proxy can see EVERYTHING. So, I suggest going to a very well known proxy. That way, you know the person who runs the proxy won't abuse the information he has complete access to, and you'll be safe:) remember: never is safe!
USE THIS PROXY ONLY FOR BROWSING, AND DO NOT LOGIN TO ANY ACCOUNTS! ...because my ISP Sniffing! ...maybe someone else sniff on the LAN! - yeah, my LAN:) but yours is not safe too:)
Using this proxy your personal information will be not encrypted - no SSL (my webserver have not certificate and 'selfsign' is not good:) that's why no HTTPS!
I did not collect information, not sniffing you! All logs are deleted after a few minutes! In my logs of da proxy there are only links,time,ip:) I don't care about your porno browsing :) Nice surfing!
</p>
<p>
Alternate methods:<br>
1. https://proxybay.one/alternate-methods.html<br>
2. Google's translate tool allows you to access... The tool fetches website using Google's own servers and will let you access to...<br>
3. The Opera browser has a 'Turbo' and 'VPN' features which allows you to unblock... Since it uses Opera's servers, users can use it to access sites blocked in their country.
</p>
<br>My Web Proxies are:<br>
<b>Proxy.eti.pw</b> with IP 91.196.124.39 - belongs to bulgarian hosting company in Sofia town<br>
<b>Tools.eti.pw/proxy</b> with same IP address<br>
<b>Brigante.sytes.net/proxy</b> but work if my home web server is UP :) It's with many different IP addresses from my ISP and this proxy is little slower than others.<br>

<?php
include '../footer.php';
?>
