<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Free QR Code Generator/Creator/Maker - Text to QR Code</title>
<script type="text/javascript" src="QR-Code-Generator.js"></script>
</head>
<body>
<br>
<br>
<div id="tool">
<div id="toolpadding" style="padding:0px 10px 10px 145px;">
<h2>2. Other QR Code Generator / Creator / Maker::.</h2>
<div><span id="qrtxtlength" style="font-weight:bold;">0</span> of 1400 character limit</div>
<textarea id="txtin" style="width:700px; height:136px;" wrap="soft" spellcheck="false" onKeyup="cntqrtxt();" onPaste="setTimeout(cntqrtxt,500);">
</textarea>
<div style="width:340px; margin:7px 7px 0px 0px; float:left; clear:right;">
<div style="margin-top:0px; white-space:nowrap;"><input type="submit" class="button" title="Generate QR Image" value=" Generate QR Code Image " onClick="makeqrimg();" /> <input type="button" class="button" title="Clear All Text" value="Clear" onClick="cleartext(); cntqrtxt();" /></div>
<div style="margin-top:5px;"><input type="text" id="qrimgwh" value="350" style="width:40px; margin:0px; border:1px solid #000000; font-size:14px; font-family:arial;" onKeyup="if(this.value*1>28 && this.value*1<501)setTimeout(makeqrimg,500);" /> Size in pixels (29 min / 500 max)</div>

<div style="margin-top:5px;"><input type="text" id="qrimgm" value="4" style="width:40px; margin:0px; border:1px solid #000000; font-size:14px; font-family:arial;" onKeyup="if(this.value*1>0 && this.value*1<10)setTimeout(makeqrimg,500);" /> Edge margin/border (1 min/9 max)</div>
<div style="margin-top:-5px;"><div id="footer"></div></div>
<p>QR Code is a registered trademark of DENSO WAVE INCORPORATED</p>
<small><a href="http://brigante.sytes.net/howto/internet/qr-code.html" target="_blank"> |Tutorial here| </a><br />
<a href="http://brigante.sytes.net/demo/qr-code-generator/qr-code-generator.zip" target="_blank"> |Download source code| </a></small>
</div>
<br>
<br>
<br>
<br>
<img id="qrsrc" src="" style="margin-top:10px; border:1px solid #0000FF;" alt="QR Code Image will be shown here" title="QR Code Image will be shown here...Right click and Save Image As...">
</div>
</div>
</body>
</html>
