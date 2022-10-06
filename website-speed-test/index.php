<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<META NAME="REVISIT-AFTER" CONTENT="2 DAYS">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="www.eti.pw" />
<meta NAME="description" content="Website Speed Test Tool">
<META name="keywords" content="website speed test, webpage speed test, test speed of website">
<title>Website Speed Test Tool</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>

<body>

<a href="../">Free Online Tools</a>

<h2>Website Speed Test</h2>

Shows how fast a specific webpage loads<br>

<?php
include("header.php");
?>

<div>
<table width="100%" cellspacing="5" cellpadding="5" border="0" style="border-collapse: collapse;">
	<tbody>
		<tr>
			<td valign="top" colspan="5"><b><font size="2">Your domain(s): </font></b><font size="1">Enter each address on a new line (Maximum 10)</font> <font size="1">(eg. yoursite.com)</font></td>
		</tr>
		<tr>
			<td valign="top" colspan="4"><textarea style="width: 350px;height: 200px;" name="domain" rows="11"><?=@$_REQUEST['domain']?></textarea></td>
			<td> </td>
		</tr>
		<tr>
			<td><input type="submit" class="button" value="Check!" /></td>
			<td>
			<p align="right"></p>
			</td>
			<td colspan="2"> </td>
		</tr>
	</tbody>
</table>
</div>
<?
$urls = trim(@$_REQUEST['domain']);
if($urls && checkImage())
{
	$urls = str_replace("\r\n","\n",$urls);
	$urls = explode("\n",$urls);

	$results = array();
	foreach($urls as $link)
	{
		$link = preg_match("#\\w+://#",$link) ? $link : "http://".$link;
		$start = microtime(true);
		$content = @file_get_contents($link);
		if($content===FALSE)
		{
			continue;
		}
		$result['domain'] = $link;
		$result['time'] = sprintf("%01.3f",microtime(true)-$start);
		$result['size'] = sprintf("%01.2f", strlen($content) / 1000);
		$result['average'] = sprintf("%01.3f",$result['time'] / $result['size']);

		$results[] = $result;
	}

	if($results)
	{
		echo "<table cellpadding=\"3\" cellspacing=\"3\"><tr bgcolor=\"#E6E6E6\"><td>#</td><td>Domain name</td><td>Size</td><td>Load time (secs)</td><td>Average speed per KB</td></tr>";
		foreach($results as $k=>$r)
		{
			echo "<tr bgcolor=\"#FFEAEA\"><td align=\"center\">".($k+1)."</td><td>$r[domain]</td><td align=\"center\">$r[size] KB</td><td align=\"center\">$r[time]</td><td align=\"center\">$r[average]</td></tr>";
		}
		echo "</table>";
	}
}
?>
<?php
include '../footer.php';
?>
