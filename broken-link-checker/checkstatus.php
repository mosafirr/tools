<?php
include 'gateway.php';


if(!@$_GET['url'])
{
	die("404");
}

$url = $_GET['url'] ;

if (!function_exists('curl_init')) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$c = curl_exec($ch);
	curl_close($ch);
} else {
	$r = new HTTPRequest($url);
	$c = $r->DownloadHeaderToString();
}


if(preg_match("#^HTTP\\S+ 404#",$c))
{
	$file = "off.gif";
}
else
{
	$file = "on.gif";
}

header("Content-type: image/gif");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

readfile($file);
