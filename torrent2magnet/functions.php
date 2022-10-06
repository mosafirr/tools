<?php 
function gzdecode($d){
	$f=ord(substr($d,3,1));
	$h=10;$e=0;
	if($f&4){
		$e=unpack('v',substr($d,10,2));
		$e=$e[1];$h+=2+$e;
	}
	if($f&8){
		$h=strpos($d,chr(0),$h)+1;
	}
	if($f&16){
		$h=strpos($d,chr(0),$h)+1;
	}
	if($f&2){
		$h+=2;
	}
	$u = gzinflate(substr($d,$h));
	if($u===FALSE){
		$u=$d;
	}
	return $u;
}

function trackers($torrent,$formagnet=false){
	$return=($formagnet==true)? null:'<ul>';
	if(isset($torrent['announce-list'])){
		$torrent['announce']=array_merge($torrent['announce-list'],array(array($torrent['announce'])));
	}
	foreach($torrent['announce'] as $tracker){
		$return .=($formagnet==true)?'&tr='.$tracker[0]:'<li>'.$tracker[0].'</li>';
	}
	$return.=($formagnet==true)?null:'</ul>';
	return $return;
}

function DHT($torrent){
	$return='<ul>';
	if(isset($torrent['nodes'])){
		foreach($torrent['nodes'] as $node){
			$return .='<li>'.$node[0].':'.$node[1].'</li>';
		}
	}
	return $return.'</ul>';
}

function output($torrent){
	$return=null;
	$torrentsize=null;
	$files='<ul>';
	$infovariable = $torrent["info"];
	if (isset($infovariable["files"])){
		$filecount = "";
		foreach ($infovariable["files"] as $file){
			$filecount += "1";
			$multiname = $file['path'];
			$multitorrentsize = makesize ($file['length']);
			$torrentsize += $file['length'];
			$combinedsize = makesize($torrentsize);
			$strname = strip_tags ($multiname[0]);
			$strname = htmlentities($strname);
			$strname = strip_tags($strname);
			$files .= "<li>".ucfirst($strname)." (".$multitorrentsize.")</li>";
		}
	}else{
		$singletf = $infovariable['name'] ;
		$singletf  = strip_tags($singletf );
		$torrentsize = makesize($infovariable['length']);
		$singletf = htmlentities($singletf);
		$strname = strip_tags($singletf);
		$files .= "<li>".$strname." (".$torrentsize.")</li>";
	}
	$files.='
	<li>Total: '.$combinedsize.'</li>
	</ul>';

	$return ='
	<p><u><b>Torrent Information:</b></u></p>
	<p><b>Original Name:</b> '.$torrent['info']['name'].'</p>
	<p><b>Hash:</b> '.$torrent['hash'].'</p>
	<p><b>Magnet Link (With All trackers):</b> <a href="magnet:?xt=urn:btih:'.$torrent['hash'].'&dn='.urlencode($torrent['info']['name']).'&tr='.trackers($torrent,true).'">Magnet Link</a></p>
	<p><b>Files &amp; Sizes:</b></p>
	'.$files.'

	<p><b>Trackers:</b></p>
	'.trackers($torrent).'
	<p><b>Decentralised Hash Table Hosts:</b></p>
	'.DHT($torrent).'
	<p><b>Comment:</b> '.$torrent['comment'].'</p>
	<p><b>Created By:</b> '.$torrent['created by'].'</p>
	<p><b>Creation Date:</b> '.date("F j, Y, g:i a",$torrent['creation date']).'</p>
	<p><b>Torrent Encoding:</b> '.$torrent['encoding'].'</p>
	<p><b>Alternative Location:</b><br /><br /><a target="_blank" href="http://zamunda.net/bananas?search='.$torrent['info']['name'].'">Zamunda.net</a></p>
	<p><a target="_blank" href="http://energy-torrent.com/browse.php?search='.$torrent['info']['name'].'">Energy-torrent.com</a></p>
	<a href="http://google.com/search?q='.$torrent['hash'].'" target="_blank" rel="nofollow">Google</a>';

	return $return;
}

function verifyHash($input){
	return ((strlen($input) === 40 && preg_match('/^[0-9a-fA-F]+$/', $input))?true:false);
}

function makesize($bytes) {
	if ($bytes < 1000 * 1024)
	return number_format($bytes / 1024, 2)." KB";
	if ($bytes < 1000 * 1048576)
	return number_format($bytes / 1048576, 2)." MB";
	if ($bytes < 1000 * 1073741824)
	return number_format($bytes / 1073741824, 2)." GB";
	return number_format($bytes / 1099511627776, 2)." TB";
}


function curl_get($url){
	$return = '';
	(function_exists('curl_init')) ? '' : die('cURL Must be installed!');

	$curl = curl_init();
	$header[0] = "Accept: text/xml,application/xml,application/json,application/xhtml+xml,";
	$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
	$header[] = "Cache-Control: max-age=0";
	$header[] = "Connection: keep-alive";
	$header[] = "Keep-Alive: 300";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Pragma: ";

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:5.0) Gecko/20100101 Firefox/5.0 Firefox/5.0');
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_REFERER, $url);
	curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
	curl_setopt($curl, CURLOPT_AUTOREFERER, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$html = curl_exec($curl);
	curl_close($curl);
	return $html;
}
?>
