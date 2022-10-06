<?php
include("header.php");
$desc = "Scans a web page that you specify and checks all of the links on that page to see if any are broken.";
?>
<div style="padding-bottom:10px;"><b>Enter URL</b>&nbsp;&nbsp;&nbsp;<input type="text" name="url" value="<?=htmlspecialchars(@$_REQUEST['url'])?>" /> <input type="submit" class="button" value="Check" /></div>
<?
if(@$_REQUEST['url'] && checkImage())
{
	$url = trim($_REQUEST['url']);
	$url = preg_match("#^https?://#i",$url) ? $url : "http://".$url;
	$_REQUEST['url'] = $url;
	$url = parse_url($url);
	$url['path'] = @$url['path'] ? $url['path'] : "/";

	$baseurl = $url['scheme']."://";
	$unp = @$url['user'] ? urlencode($url['user']) : "";
	$unp .= @$url['pass'] ? (":".urlencode($url['pass'])) : "";
	$unp = $unp ? "$unp@" : "";

	$baseurl .= $unp . $url['host'];
	$dirurl = $baseurl.dirname($url['path']);

	$content = fetch($_REQUEST['url']);
	$content = preg_replace("#<script[^>]*>.*?</script>#ims","",$content);
	$basehref = false;

	if(preg_match("#<base .*?href=(\\S*?)(?:\\s+[^>]*>|\\s+>|>)#si",$content,$matches))
	{
		$basehrefurl = $matches[1];
		$basehrefurl = preg_match("#^('|\")(.*)\\1#i",$basehrefurl,$m) ? $m[2] : $basehrefurl;
		if(!preg_match("#^https?://#i",$basehrefurl))
		{
			if(strpos($basehrefurl,"/")===0)
			{
				$basehrefurl = $basehrefurl.$dirurl;
			}
			else
			{
				$basehrefurl = (strrpos($basehrefurl,"/")===strlen($basehrefurl)-1 ? $basehrefurl : $basehrefurl."/" ).$dirurl;
			}
		}
		preg_match("#(^.+?://.+?)(/.*$|$)#",$basehrefurl,$basehrefroot);
		$basehrefroot = $basehrefroot[1];
		$basehref = true;
	}

	preg_match_all("#<(\\w+) [^>]*?(href|src)=(\\S*?)(?:\\s+[^>]*>|\\s+>|>)#si",$content,$matches);
	$resources = array();
	foreach($matches[2] as $k=>$v)
	{
		$resources[$v][] = preg_match("#^('|\")(.*)\\1#i",$matches[3][$k],$m) ? $m[2] : $matches[3][$k];
	}

	$total = 0;
	foreach($resources as $i=>$res)
	{
		foreach($res as $k=>$v)
		{
			if(preg_match("#^(\\w+?)://#",$v))
			{
				continue;
			}

			if(preg_match("#^(\\w+?):#",$v))
			{
				unset($resources[$i][$k]);
				continue;
			}

			if(strpos($v,"?")===0)
			{
				$resources[$i][$k] = $basehref ? $basehrefurl.$v : $baseurl.$url['path'].$v;
				continue;
			}

			if(strpos($v,"/")===0)
			{
				$resources[$i][$k] = $basehref ? $basehrefroot.$v : $baseurl.$v;
				continue;
			}
			else
			{
				$resources[$i][$k] = $basehref ? $basehrefurl.$v : $baseurl."/".$v;
				continue;
			}
		}

		$total += count($res);
	}

	echo "<br/>Total: <b>$total</b><br/><table style=\"width:100%\">";
	foreach($resources as $i=>$res)
	{
		foreach($res as $k=>$v)
		{
			$i = strtoupper($i);
			$ve = urlencode($v);
			echo <<<EOF
<tr>
	<td style="font-size:8pt;">
		<font color="#B70000">($i)</font>
			<a title="$v" href="?url=$ve">$v</a>
		</font>
	</td>
	<td>
		<img src="checkstatus.php?url=$ve">
	</td>
</tr>
EOF;
		}
	}
	echo "</table>";
}
?>
<?php
include("../footer.php");
?>
