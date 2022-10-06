<?php
$encoded = $decoded = $add = '';
header('Content-Type: text/html; charset=utf-8');
require_once('idna_convert.class.php');

$idn_version = isset($_REQUEST['idn_version']) && $_REQUEST['idn_version'] == 2003 ? 2003 : 2008;
$IDN = new idna_convert(array('idn_version' => $idn_version));

$version_select = '<select size="1" name="idn_version"><option value="2003">IDNA 2003</option><option value="2008"';
if ($idn_version == 2008) {
    $version_select .= ' selected="selected"';
}
$version_select .= '>IDNA 2008</option></select>';

if (isset($_REQUEST['encode'])) {
    $decoded = isset($_REQUEST['decoded']) ? stripslashes($_REQUEST['decoded']) : '';
    $encoded = $IDN->encode($decoded);
}
if (isset($_REQUEST['decode'])) {
    $encoded = isset($_REQUEST['encoded']) ? stripslashes($_REQUEST['encoded']) : '';
    $decoded = $IDN->decode($encoded);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="IDNA Converter that allows you to transfer domain names between the encoded (Punycode) notation and the decoded (UTF-8) notation." />
<meta name="keywords" content="idn converter, idna converter, punycode idna, punycode, punycode converter, IDN to Punycode, idna конвертор, домейн на кирилица, домейн кирилица към латиница, punycode idna converter, idn converter, idn, punycode to unicode, idn to ascii">
<title>Punycode Converter for Internationalized Domain Name (IDN)</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>
  
<h2>Punycode IDNA converter</h2>
<h2>IDN Converter</h2>
<h2>Convert IDN to Punycode</h2>
Convert an internationalized domain name (IDN) from Unicode to ASCII or ASCII to Unicode.<br />

 <table border="0" cellpadding="2" cellspacing="2">
  <thead>
   <tr>
    <th align="left">Original (Unicode)</th>
    <th align="right"> ASCII/Punycode (ACE)</th>
   </tr>
  </thead>
  <tbody>
   <tr>
    <td align="right">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" method="get">
      <input type="text" name="decoded" placeholder="тиксо.com" value="<?php echo htmlspecialchars($decoded, ENT_QUOTES, 'UTF-8'); ?>" size="48" maxlength="255" /><br />
      <?php echo $version_select; ?>
      <input type="submit" name="encode" class="button" value="Encode &gt;&gt;" /><?php echo $add; ?>
     </form>
    </td>
    <td align="left">
     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" method="get">
      <input type="text" name="encoded" placeholder="xn--h1aemlc.com" value="<?php echo htmlspecialchars($encoded, ENT_QUOTES, 'UTF-8'); ?>" size="48" maxlength="255" /><br />
      <input type="submit" name="decode" class="button" value="&lt;&lt; Decode" /><?php echo $add; ?>
     </form>
    </td>
   </tr>
  </tbody>
 </table>

<br>
This converter allows you to transfer domain names between the encoded (Punycode) notation and the decoded (UTF-8) notation.<br />
Just enter the domain name in the respective field and click on the button right below it to have it converted. Please note, that you might even enter complete domain names (like: j&#xFC;rgen-m&#xFC;ller.de ; www.тиксо.com) or a email addresses.<br /><br />
Make sure, that your browser is capable of the <strong>UTF-8</strong> character encoding.<br /><br />
To ensure, that a certain string has been converted correctly, you should convert it both ways and compare the results.<br />
This tool uses the IDNA2003 and IDNA2008 standards.<br><br>
Unicode: A sequence of characters encoded using some native format. Usually the operating system will display this data using an appropriate or familiar font.<br><br>
ASCII: The unicode string represented in ASCII characters using an ASCII-Compatible Encoding (ACE) designed for use with Internationalized Domain Names (Punycode). Punycode transforms a Unicode sequence into a string of ASCII characters which can be used in a hostname label. Only letters, digits, and hyphens are allowed. Punycode sequences always start with the characters "XN--".
<br>
<a href="https://en.wikipedia.org/wiki/Punycode" title="About Punycode" target="_blank">What is Punycode?</a>
 - Punycode is a special encoding used to convert Unicode characters to ASCII, which is a smaller, restricted character set. Punycode is used to encode internationalized domain names (IDN).

<?php
include '../footer.php';
?>
