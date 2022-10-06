<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Meta Tag Generator">
<meta name="keywords" content="meta tag generator">
<title>Meta Tag Generator</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Meta Tag Generator</h2>
<div class="entry">

<?

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}else
			$action = NULL;
		if(isset($_POST['getmetafrompage'])){
			$getmetafrompage = $_POST['getmetafrompage'];
		}else
			$getmetafrompage = NULL;

		if ($action == "generate")
		{
			print "<P>Insert the following HTML code between the &lt;HEAD&gt; tags of your site:";
			print "<FORM><TEXTAREA ROWS=8 COLS=60 style='width: 600px;'>&LT;META NAME=\"description\" CONTENT=\"$_POST[desc]\"&GT;\n";
			print "&LT;META NAME=\"keywords\" CONTENT=\"$_POST[keyw]\"&GT;\n";
			if(isset($_POST['robots'])){
				if ($_POST['robots'] == "yes")
				{
					print "&LT;META NAME=\"robot\" CONTENT=\"$_POST[robotsoption]\"&GT;\n";
				}
			}

			if(isset($_POST['refresh'])){
				if ($_POST['refresh'] == "yes")
				{
					print "&LT;META NAME=\"refresh\" CONTENT=\"$_POST[refreshafter]\"&GT;\n";
				}
			}

			if(isset($_POST['copyright'])){
				if ($_POST['copyright'] == "yes")
				{
					print "&LT;META NAME=\"copyright\" CONTENT=\"$_POST[copyrighttext]\"&GT;\n";
				}
			}

			if(isset($_POST['author'])){
				if ($_POST['author'] == "yes")
				{
					print "&LT;META NAME=\"author\" CONTENT=\"$_POST[authorname]\"&GT;\n";
				}
			}

			if(isset($_POST['generator'])){
				if ($_POST['generator'] == "yes")
				{
					print "&LT;META NAME=\"generator\" CONTENT=\"$_POST[generatorname]\"&GT;\n";
				}
			}

			if(isset($_POST['language'])){
				if ($_POST['language'] == "yes")
				{
					print "&LT;META NAME=\"language\" CONTENT=\"$_POST[languagetype]\"&GT;\n";
				}
			}

			if(isset($_POST['revisit'])){
				if ($_POST['revisit'] == "yes")
				{
					print "&LT;META NAME=\"revisit-after\" CONTENT=\"$_POST[revisitdays]\"&GT;\n";
				}
			}
			print "</TEXTAREA></FORM>";
			print "<A HREF=\"$_SERVER[PHP_SELF]\">Create another set of meta tags</A><P>";


		}
		else
		{
			if (isset($_POST['getmetafrompage']))
			{
			
				function fetchfiletolocal($url){
				
					$filename = "uploads/".randomized(15).".html";
				
					$flagr = ini_get("allow_url_fopen");
					if($flagr  == 1){
						$html = @file_get_contents($url);
					}
					else{
						$ch = curl_init($url);
						curl_setopt($ch, CURLOPT_HEADER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
						$start = microtime(true);
						$html = curl_exec($ch);
						curl_close($ch);
					}
					
					$fhandler = fopen($filename,"w");
					fwrite($fhandler,$html);
					fclose($fhandler);
					
					return $filename;
				}
				
				function randomized($size){
		
					$seed = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				
					$output = "";
				
					for($i = 0; $i < $size; $i++){
					
						$rand = mt_rand(0,61);
						$output .= $seed[$rand];
					
					}
					
					return $output;
				
				}
			
				$filename = fetchfiletolocal($_POST['getmetafrompage']);
			
				$MetaTags = get_meta_tags($filename);

			}
			if(isset($MetaTags["description"]))
				$description = $MetaTags["description"];
			else
				$description = NULL;

			if(isset($MetaTags["keywords"]))
				$keywords = $MetaTags["keywords"];
			else
				$keywords = NULL;

			if(isset($MetaTags["robots"]))
				$robot = $MetaTags["robots"];
			else if(isset($MetaTags["robot"]))
				$robot = $MetaTags["robot"];
			else
				$robot = NULL;

			if(isset($MetaTags["author"]))
				$author = $MetaTags["author"];
			else if(isset($MetaTags["owner"]))
				$author = $MetaTags["owner"];
			else
				$author = NULL;

			if(isset($MetaTags["refresh"]))
				$refresh = $MetaTags["refresh"];
			else
				$refresh = NULL;

			if(isset($MetaTags["copyright"]))
				$copyright = $MetaTags["copyright"];
			if(isset($MetaTags["dc_rights"]))
				$copyright = $MetaTags["dc_rights"];	
			else
				$copyright = NULL;

			if(isset($MetaTags["revisit-after"]))
				$revisit = $MetaTags["revisit-after"];
			else
				$revisit = NULL;

			if(isset($MetaTags["generator"]))
				$generator = $MetaTags["generator"];
			else
				$generator = NULL;

			if(isset($MetaTags["language"]))
				$language = $MetaTags["language"];
			else
				$language = NULL;

			$year = date('y');

			print "<FORM ACTION=\"$_SERVER[PHP_SELF]\" METHOD=post>";
			print "If your page already has META tags you may import and edit them.<BR>";
			print "<B>URL:</B> <INPUT TYPE=text NAME=getmetafrompage SIZE=30 VALUE=\"http://\"><br /><BR>";
			print "<INPUT TYPE=submit class='button' VALUE=\"Import META tags from page\"></FORM><br /><HR><br />";
			print "<FORM ACTION=\"$_SERVER[PHP_SELF]?action=generate\" METHOD=post>";
			print "<b>Site Description: </B><BR><input type=\"text\" size=\"40\" name=\"desc\" VALUE=\"$description\"><br>";
			print "<b>Site Keywords: </B>(Seperate with commas): </b><BR><input type=\"text\" size=\"40\" name=\"keyw\" VALUE=\"$keywords\"><br><br />";
			//print "<INPUT TYPE=submit VALUE=\"Generate\"><br /><br /><P>";
			print "<B><I>Optional information:</I></B> <BR>(☑Check the tags you would like to include)<P>";
			print "<INPUT TYPE=checkbox NAME=robots VALUE=yes ";

			if (isset($robot))
				print "CHECKED";
			print "> What should robots do?<BR>";
			print "&nbsp;&nbsp;&nbsp;&nbsp;<SELECT NAME=robotsoption>";

			if (isset($robot))
				print "<OPTION value='$robot'>$robot</OPTION>";
			print "<OPTION VALUE=\"index,follow\">Index this page and follow all links</OPTION><OPTION VALUE=\"noindex,nofollow\">Don't index this page and don't follow any links</OPTION>";
			print "<OPTION VALUE=\"index,nofollow\">Index this page, but don't follow any links</OPTION><OPTION VALUE=\"noindex,follow\">Don't index this page, but follow links</OPTION></SELECT><P>";
			print "<INPUT TYPE='checkbox' NAME=refresh VALUE=yes ";

			if (isset($refresh))
				print "CHECKED";
			print "> Refresh this page after <INPUT TYPE=text NAME=refreshafter SIZE=3 VALUE=\"$refresh\"> seconds<P>";
			print "<INPUT TYPE=checkbox NAME=copyright VALUE=yes ";

			if (isset($copyright))
				print "CHECKED";
			print "> Copyright line: &nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME=copyrighttext value=\"";

			if (isset($copyright))
				print "$copyright";
			else
				print "Copyright &copy 20$year Your Company. All Rights Reserved.";
                        print "\" SIZE=35><P>";
			print "<INPUT TYPE=checkbox NAME=author VALUE=yes ";

			if (isset($author))
				print "CHECKED";
			print "> Author: &nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME=authorname SIZE=35 VALUE=\"$author\"><P>";
			print "<INPUT TYPE=checkbox NAME=generator VALUE=yes ";

			if (isset($generator))
				print "CHECKED";
			print "> Generator: &nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME=generatorname SIZE=35 VALUE=\"$generator\"><P>";
			print "<INPUT TYPE=checkbox NAME=language VALUE=yes ";

			if (isset($language))
				print "CHECKED";
			print "> Language: &nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE=text NAME=languagetype SIZE=35 VALUE=\"$language\"><P>";
			print "<INPUT TYPE=checkbox NAME=revisit VALUE=yes ";

			if (isset($revisit))
				print "CHECKED";
			print "> Search engines should revisit this page after <INPUT TYPE=text NAME=revisitdays SIZE=3 VALUE=\"$revisit\"> days.<P>";
			print "<INPUT TYPE=submit class='button' VALUE=\"Generate\"><P>";
			print "</FORM>";
		}

?>
<?php
include '../footer.php';
?>
