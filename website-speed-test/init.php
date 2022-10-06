<?php

ob_start();
session_name(md5(dirname(__FILE__)));
session_start();
$yahooID = "bIpqc43V34G.6UQFQGZVHGYdwJEKr10H9DcBvfFbrB1au6uVZA1jVHkV9wJubMSTjZG9Ma4wpoA-";

function checkImage()
{
	if(@$_SESSION['image'])
	{
		return true;
	}
	if(@$_POST['image'])
	{
		if(@$_SESSION['chkimage']==@$_POST['image'])
		{
			$_SESSION['image'] = true;
		}
		else
		{
			$_SESSION['image'] = false;
		}

	}
	//return @$_SESSION['image'];
    return true;
}

require_once("functions.php");
?>
