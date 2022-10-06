<?php

include_once("init.php");

?><?php
	$FontSize = array('9px', '12px', '14px', '18px', '20px', '22px', '25px', '30px', '36px', '42px');
	$FontFace = array('Arial', 'Verdana', 'Tahoma', 'Times New Roman', 'Helvetica', 'Comic Sans MS');

	$filename=basename($_SERVER['PHP_SELF']);
	switch ($filename)
	{
	case 'ColorAndFontPicker.php':
		$doctitle = '- Color & Font Picker';
		break;
	case 'CSSGenerator.php':
		$doctitle = '- CSS Generator';
		break;
	case 'CSSGeneratorII.php':
		$doctitle = '- CSS Generator (Advanced)';
		break;
	case 'CSSValidate.php':
		$doctitle = '- CSS Validator';
		break;
	case 'DropDownMenuMaker.php':
		$doctitle = '- Drop Down Menu Maker';
		break;
	case 'HTMLValidator.php':
		$doctitle = '- HTML Validator';
		break;
	case 'KeywordDensityAnalyzer.php':
		$doctitle = '- Keyword Density Analyzer';
		break;
	case 'LinkChecker.php':
		$doctitle = '- Link Checker';
		break;
	case 'MetaTagCreate.php':
		$doctitle = '- Meta Tag Creator';
		break;
	case 'MetaTagViewer.php':
		$doctitle = '- Meta Tag Viewer';
		break;
	case 'PopupMaker.php':
		$doctitle = '- Popup Maker';
		break;
	case 'TableMaker.php':
		$doctitle = '- Table Maker';
		break;
	case 'TableMakerScript.php':
		$doctitle = '- Table Maker';
		break;
	case 'TableMakerII.php':
		$doctitle = '- Table Maker (Advanced)';
		break;
	case 'LinkPopularity.php':
		$doctitle = '- Link Popularity Comparison Tool';
		break;
	case 'MouseoverGenerator.php':
		$doctitle = '- Javascript Mouseover Maker';
		break;
	case 'MouseoverGeneratorScript.php':
		$doctitle = '- Javascript Mouseover Maker';
		break;
	case 'LinkExtractor.php':
		$doctitle = '- Link Extractor';
		break;
	case 'HTTPHeaders.php':
		$doctitle = '- HTTP Headers';
		break;
	case 'HTMLOptimizer.php':
		$doctitle = '- HTML Optimizer';
		break;
	case 'HTMLEncrypter.php':
		$doctitle = '- HTML Encrypter';
		break;
	case 'URLRewrite.php':
		$doctitle = '- htaccess URL Rewrite';
		break;
	case 'SpiderView.php':
		$doctitle = '- Spider View';
		break;
	case 'index_checker.php':
		$doctitle = '- index checker';
		break;
	default:
	$doctitle = '';

	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">

</head><body>
<div id="wrapper">
	<div id="wrapper2">
		<div id="header">
			
			
		</div>

		<div id="page">
			<div id="content">
				<div class="post">
<div class="entry">
<p><?php if(@$desc){echo "$desc";}?></p>

<form method="POST" <?php if(@$formaction){echo " action=\"$formaction\"";}?><?php if(@$formtarget){echo " target=\"$formtarget\"";}?><?php if(@$formonsubmit){echo " onsubmit=\"$formonsubmit\"";}?>>
