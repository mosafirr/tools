<?php

// copyright V-SPEED B. Szymczak P. Jarzab S.C.
// http://www.v-speed.eu

if (isset($_REQUEST['downloadTest'])) {
	while(true) {
		$fh = fopen('download.jpg', 'rb') or die ();
		while(!feof($fh)) {
			print fread($fh, 8192);
			flush();
		}
		fclose($fh);
	}
}
elseif (isset($_REQUEST['uploadTest'])) {
	$size = 500;
	$request = isset($_REQUEST)?$_REQUEST:$HTTP_POST_VARS;
	foreach ($request as $key => $value) {
	   $size += (strlen($key) + strlen($value) + 3);
	}

	printf("size=%s&x=%s&",$size,$_REQUEST['x']);
}
elseif (isset($_REQUEST['latencyTest'])) {
	printf("test=test");
}
elseif (isset($_REQUEST['getIP'])) {
	printf("ip=%s", $_SERVER['REMOTE_ADDR']);
}

exit;
?>
