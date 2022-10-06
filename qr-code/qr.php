<?php

//procedira pri vavedeni danni
if(isset($_REQUEST['content'])){
	//capture from the form
	$size          = $_REQUEST['size'];
	$content 	   = $_REQUEST['content'];
	$correction    = strtoupper($_REQUEST['correction']);
	$encoding      = $_REQUEST['encoding'];
	
	//google chart api
	$rootUrl = "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=$content&choe=$encoding&chld=$correction";
	
	//izvejda image
	echo '<img src="'.$rootUrl.'">';
}
?>