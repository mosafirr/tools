<?php

function StrToNum($Str, $Check, $Magic)
{
	$Int32Unit = 4294967296;

	$length = strlen($Str);
	for ($i = 0; $i < $length; $i++) {
		$Check *= $Magic;
		if ($Check >= $Int32Unit) {
			$Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
			$Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
		}
		$Check += ord($Str{$i});
	}
	return $Check;
}
function HashURL($String)
{
	$Check1 = StrToNum($String, 0x1505, 0x21);
	$Check2 = StrToNum($String, 0, 0x1003F);

	$Check1 >>= 2;
	$Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
	$Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
	$Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);

	$T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
	$T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );

	return ($T1 | $T2);
}
function CheckHash($Hashnum)
{
	$CheckByte = 0;
	$Flag = 0;

	$HashStr = sprintf('%u', $Hashnum) ;
	$length = strlen($HashStr);

	for ($i = $length - 1;  $i >= 0;  $i --) {
		$Re = $HashStr{$i};
		if (1 === ($Flag % 2)) {
			$Re += $Re;
			$Re = (int)($Re / 10) + ($Re % 10);
		}
		$CheckByte += $Re;
		$Flag ++;
	}

	$CheckByte %= 10;
	if (0 !== $CheckByte) {
		$CheckByte = 10 - $CheckByte;
		if (1 === ($Flag % 2) ) {
			if (1 === ($CheckByte % 2)) {
				$CheckByte += 9;
			}
			$CheckByte >>= 1;
		}
	}

	return '7'.$CheckByte.$HashStr;
}

function getpr($url)
{
	$ch = CheckHash(HashURL($url));
	$content = fetch("http://www.google.com/search?client=navclient-auto&features=Rank:&q=info:".urlencode($url)."&ch=$ch");
	preg_match("#.*?:.*?:(.*?)$#",$content,$pr);
	return @$pr[1] ? $pr[1] : "0";
}

function getdcpr($url,$dc="www.google.com")
{
	$ch = CheckHash(HashURL($url));
	$content = fetch("http://$dc/search?client=navclient-auto&features=Rank:&q=info:".urlencode($url)."&ch=$ch");
	preg_match("#.*?:.*?:(.*?)$#",$content,$pr);
	return @$pr[1] ? $pr[1] : "Datacenter down";
}



function getPageRank($url,$dc="www.google.com")
{
  $ch = CheckHash(HashURL($url));

  $fp = @fsockopen($dc, 80, $errno, $errstr, 3);
  if (!$fp) {
     //echo "$errstr ($errno)<br />\n";
     return "Datacenter down";
  } else {
     $out = "GET /search?client=navclient-auto&ch=" . $ch .  "&features=Rank&q=info:" . $url . " HTTP/1.1\r\n" ;
     $out .= "Host: $dc\r\n" ;
     $out .= "Connection: Close\r\n\r\n" ;
     fwrite($fp, $out);
     while (!feof($fp)) {
       $data = fgets($fp, 128);
       $pos = strpos($data, "Rank_");
         if($pos === false){
         }else{
           $pagerank = trim(substr($data, $pos + 9));
         }
     }
     fclose($fp);
     return (isset($pagerank)?$pagerank : "Datacenter down");
  }
}


function fetch($url)
{
	$content = file_get_contents($url);
	/*
		$db = DB::getInstance();

		// Get cached version of url request
		$page = $db->select("cache",array("url"=>$url));

		// page found in cache. return file contents from cache, by id from DB
		if(@$page[0])
		{
			$dir = dirname(__FILE__);
			$filename = "$dir/../cache/{$page[0]['id']}";
			$content = @file_get_contents($filename);
		}
		else
		{
			$insert['time'] = time();
			$insert['url'] = $url;
			// Save in DB time of request and url, get request id
			$id = $db->insert("cache",$insert);

			$content = file_get_contents($url);
			$dir = dirname(__FILE__);
			$filename = "$dir/../cache/$id";
			// Save file in cache
			file_put_contents($filename,$content);
		}
	*/
	if (function_exists('iconv')) {
		if(preg_match("#<meta.*?charset=(.*?)(\"|'| |>)#",$content,$charset))
		{
			if(@$charset[1] && strtolower($charset[1])!="utf-8")
			{
				$content = iconv($charset[1],"UTF-8",$content);
			}
		}
	}
	return $content;
}

function getAlexa($dom)
{
	if(!$html = @file_get_contents("http://alexa.com/xml/dad?url=".$dom)) return '';

	// alexa rank
	if (preg_match('/POPULARITY URL="[a-z0-9\\-\\.\\/]{1,}" TEXT="([0-9]{1,12})"/', $html, $regs))
		return (int)$regs[1];


	//old is commeted (maybe will be usefull in future)
	/*
	$dominfo = fetch("http://www.alexa.com/data/details/main?q=&url=$dom");
	$scramble = file_get_contents("http://client.alexa.com/common/css/scramble.css");
	preg_match_all("#\\.(\\S+)#",$scramble,$classes);

	$dominfo = preg_replace("#<span class=\"(".implode("|",$classes[1]).")\">.*?</span>#","",$dominfo);
	preg_match("#<a href=\"/data/details/traffic_details\\?url=$dom\"><span class=\"descBold\"><!--Did you know\\? Alexa offers this data programmatically.  Visit http://aws.amazon.com/awis for more information about the Alexa Web Information Service.-->(.*?)</span></a>#",$dominfo,$alexarank);
	return strip_tags(@$alexarank[1]);
	*/
}

function circle($values=array("#F4F4F4","#ffffff"))
{
	static $i;
	if($i == count($values))
	{
		$i = 0;
	}
	$i++;
	return $values[$i-1];
}
