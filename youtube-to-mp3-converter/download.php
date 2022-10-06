<?php
	$url = $_GET["url"];
	$name = $_GET["name"];
	$img = $_GET["vid_image"];

	$name = urldecode($name);

	echo'
		<html>
			<head>
			</head>
			<body>
				<center>
					<img src="'.$img.'" style="height:150px;" />
					<p>'.$name.'</p>
					<a href="http://mp3fiber.com/'.$url.'" target"_blank">Download</a>
					<br /><br>
                    <a href="../youtube-to-mp3-converter"> ||Back || </a>
				</center>
			</body>
		</html>
	';
?>
