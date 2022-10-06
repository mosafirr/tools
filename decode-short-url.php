<!DOCTYPE html>
<html lang="en">
<head>
<title>TinyURL Decoder</title>
<LINK REL="SHORTCUT ICON" href="avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Decode TunyURL - Short URL decoder">
<meta name="keywords" content="expand short url, decode tiny url, expand url, url expand, tiny url decoder, tiny url expander, tinyurl decoder, short url decoder, url expander, decode tiny link, tinyurl decode, tinyurl decoder, tiny url decoder, short url expand, short url expander, decode short url, short link to original, short url to original, tiny url to original, short url to original url, find out where short url link is really taking you, find out where short url is really taking you, decode tunyurl, short link decoder"/>
<link type="text/css" rel="stylesheet" href="css/main.css" />
</head>
<body>

<a href="./">Free Online Tools</a>

<h2>Short URL Decoder</h2>

Decode a TinyURL (Short URL - Shrink URL - Shortener URL)<br>
Short URL to Original URL<br>
Find out where Short URL link is really taking you!<br />
<p><form method="GET" action="">
   <input type="text" name="url" id="url" style="width:300px;height:40px;" value="http://" placeholder="Enter your short URL" title="Enter short URL here" />
   <!--<input type="submit" name="submit" class="button" value="Show Original URL" />-->
   <input type="submit" class="button" value="Show Original URL" />
</form></p>

Get information on a short URL. Find out where it goes!<br /><br />

<?php
$url            = htmlentities($_GET['url'], ENT_QUOTES, 'UTF-8');
$original_url   = get_original_url($url);
$htmlsrc = file_get_contents($_GET['url']);

echo "<font color='red'>Short URL:</font> {$url}<br/>";
echo "<font color='red'>Original URL (Long URL) is:</font> <a href='{$original_url}' target='_blank'>{$original_url}</a><br />";
echo "<font color='red'>Virus check:</font> <a href='https://www.google.com/transparencyreport/safebrowsing/diagnostic/index.html#url={$original_url}' target='_blank' title='Is this link safe? Google Safe Browsing site status.'>Scan link</a><br>";
echo "<font color='red'>View via online browser sandbox:</font> <a href='https://www.browserling.com/browse/win7/firefox104/{$original_url}' target='_blank' title='Opening links that you do not trust. Let us say you receive an email with a link but you are not sure if it is safe. It could contain a virus or malware that could infect your computer. If you open it in a sandboxed browser, then you can see what is behind the link without risking infecting your computer. Testing phishing links. Often, hackers send fake emails that look like password reset emails or verification emails. Such links often involve multiple redirects and you can not really know where it will take you. To test such links, you can open them in an URL sandbox and see the website that will load after all the redirects. Opening malicious links. If you already know that a link is malicious, then you can safely open it in a sandboxed browser and see what happens with the entire system. It is possible such links contain exploits that take over the entire system. Decoding short links. It is dangerous to click unknown TinyURL.com, Bit.ly or t.co links as they are shortened and you do not know where they point to. You can use Browserling.com as a redirect detective and instantly see what the link resolves to. As soon as the short URL finishes redirecting, you can interactively browse the final page.'>View the URL in Sandbox / View the link in Safety mode</a><br>";
echo "<font color='red'>View via virtual browser:</font> <a href='https://ie11.ieonchrome.com/#{$original_url}' target='_blank' title='View this website in safe for you mode.'>View the website in safe mode</a>";
 
function get_original_url($url)
{
    $ch = curl_init($url);
    curl_setopt($ch,CURLOPT_HEADER,true); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,false);
    $header = curl_exec($ch);
    
    $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
        
    for($i=0;$i<count($fields);$i++)
    {
        if(strpos($fields[$i],'Location') !== false)
        {
            $url = str_replace("Location: ","",$fields[$i]);
        }
    }
    return $url;
}
?>

<hr>

<i>Extra Info:</i> [See Meta tags: title, author, keywords, description, generator] and look HTML source code for something suspicious.<br>
See Website Screenshot below and then go to the website! Use View the URL in Sandbox / View the link in Safety mode.<br />

<?php
$tags = get_meta_tags($_GET['url']);
echo "Meta tags: <br />";
echo "Title: ";
echo $tags['title'];  
echo "<br />"; 
echo "Author: ";    
echo $tags['author'];    
echo "<br />";   
echo "Keywords: ";    
echo $tags['keywords'];   
echo $tags['Keywords'];
echo $tags['KEYWORDS'];
echo "<br />"; 
echo "Description: ";    
echo $tags['description'];  
echo $tags['Description'];
echo $tags['DESCRIPTION'];
echo "<br />";
echo "Generator: ";    
echo $tags["generator"];
echo $tags["Generator"];
echo $tags["GENERATOR"];
echo "<br />";
?>

Website Screenshot:<br />

<?php
if(!empty($_GET['url'])){
    // website url
    $siteURL = $_GET['url'];

    if(filter_var($siteURL, FILTER_VALIDATE_URL)){
        echo "<br /><img src='http://images.shrinktheweb.com/xino.php?stwembed=1&stwaccesskeyid=93e93e229a837b8&stwsize=xlg&stwurl={$original_url}' title='{$original_url} Image 320x240 pixels' />";
        echo "<!--<iframe src='snap.php?url={$original_url}' width='330' height='200' FRAMEBORDER=NO FRAMESPACING=0 BORDER=0 ></iframe><br />-->
<!--<iframe src='http://free.pagepeeker.com/v2/thumbs.php?size=x&url={$original_url}' width='320' height='250' FRAMEBORDER=NO FRAMESPACING=0 BORDER=0 ></iframe>--><br /><a href='javascript:history.go(0)'><img src='http://free.pagepeeker.com/v2/thumbs.php?size=x&url={$original_url}' title='Refresh Image' /></a><br /><small>If you do not see the pictures, then <a href='javascript:history.go(0)'>Click Here</a></small>";

    }else{
        echo "PLEASE ENTER A VALID ✅ URL";
    }
}
?>

<hr>
 
<textarea readonly style="width:100%;color: red;background-color:transparent" rows="20">HTML src is here:
<?php echo htmlspecialchars( $htmlsrc ); ?>
</textarea>

<br />

<a href="http://longurl.eti.pw" target="_blank">Decode Short URL - source code</a> <a href="http://longurl.eti.pw" target="_blank">LongURL.eti.pw</a>

<?php include 'footer.php'; ?>
