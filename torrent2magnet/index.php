<?php 
include('decode.php');
include('encode.php');
include('functions.php');
?>
<?php 
$uploads_dir = 'torrents/';

if(isset($_FILES['torrent'])){
	if(is_uploaded_file($_FILES['torrent']['tmp_name']) && $_FILES['torrent']['type']=='application/x-bittorrent'){
		$fd = fopen($_FILES['torrent']['tmp_name'], "rb");
		#Read the uploaded torrent
		$alltorrent = fread($fd, filesize($_FILES['torrent']['tmp_name']));
		#Decode the torrent and gather info into an array
		$torrent = BDecode($alltorrent);
		//print_r($torrent);
		//die;
		$torrent['hash'] = sha1(BEncode($torrent["info"]));
		#Varify the hash is 40 len then move the uploaded .torrent
		if(verifyHash($torrent['hash'])===true){
			$uploadedfile = $uploads_dir.$torrent['hash'].'.torrent';
			move_uploaded_file($_FILES['torrent']['tmp_name'], $uploadedfile);
		}else{
			$error='Only torrent files allowed';
		}
		$output=output($torrent);
	}
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(!empty($_POST['hash'])){
		if(verifyHash(trim($_POST['hash']))===true){

			$hash = strtoupper(trim($_POST['hash']));

			if(file_exists($uploads_dir.$hash.'.torrent')){
				//We Already have it
			}else{
				$torrentfile = 'http://torrage.com/torrent/'.$hash.'.torrent';
				$torrent = curl_get($torrentfile);
				//$torrent = gzdecode($torrent);
				file_put_contents($uploads_dir.strtoupper($hash).'.torrent',$torrent);
			}

			$fd = fopen($uploads_dir.$hash.'.torrent', "rb");
			#Read the uploaded torrent
			$alltorrent = fread($fd, filesize($uploads_dir.$hash.'.torrent'));
			#Decode the torrent and gather info into an array
			$torrent = BDecode($alltorrent);
			$torrent['hash'] = sha1(BEncode($torrent["info"]));
			$output=output($torrent);
		}else{
			$error='Not a real info hash';
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Torrent2Magnet - Automagically convert your .torrent files to Magnet links" />
<meta name="keywords" content="torrent2magnet, torrent to magnet, torrent file to magnet link, magnet link, convert torrent files to magnet links">
<title>Torrent to Magnet</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Torrent2Magnet</h2>
Convert your .torrent files to Magnet links<br />

<form method="POST" enctype="multipart/form-data" action="">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<p><input type="file" name="torrent" size="46"></p>
<input type="submit" class="button" value="Upload &amp; Parse">
</form>
<br>
Or enter Torrent Info Hash:<br>
<form method="POST" action="">
<input type="text" name="hash" size="46">
<input type="submit" class="button" value="Grab Torrent &amp; Parse">
</form>

<?=((isset($error))?$error:null);?>
<?=((isset($output))?$output:null);?>

<?php
include '../footer.php';
?>
