<html>
<head>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="Online QR Code Creator">
<meta name="keywords" content="qr code, qr code generator, online qr code generator, qr, qr code script, qr generator script, qr code generator script, qr code generator source code, qr code source, qr code creator, free online tools">
<title>QR Code Generator</title>
<link type="text/css" rel="stylesheet" href="../css/main.css" />
<style>
body{
	width:100%;
	margin:0px;
	padding:0px;
}
#container{
	font-family: Arial, serif; 
	font-size:12px;	
	padding-top:20px;
	width:700px;
	margin: auto;	
}
form{
 	width:300px;
 	padding: 0px;
 	margin: 0px;
}
form textarea{
	font-family: Arial, serif; 
	font-size:12px;
	width:270px;
	margin:5px;
	height:40px;	
	overflow: hidden;
}
iframe{
 	border:1px solid #DDD;
}
#generator{
	width: 300px;
	float:left;
}
#generator fieldset{
	border:1px solid #DDD;
}
#result{
	padding-top:7px;
	margin-left:340px;
	width: 350px;	
}
</style>

</head>

<body>
<div id="container">
<h1>1. QR code Generator::.</h1>
       
	<div id="generator">
		<form target="qrcode-frame" action="qr.php" method="post">
		  <fieldset>
		    <legend>Size:</legend>
		  	 <input type="radio" name="size" value="150x150" checked>150x150<br>
		  	 <input type="radio" name="size" value="200x200">200x200<br>
		  	 <input type="radio" name="size" value="250x250">250x250<br>
		  	 <input type="radio" name="size" value="300x300">300x300<br>
		  </fieldset>
		  <fieldset>
		    <legend>Character encoding:</legend>
		    <input type="radio" name="encoding" value="UTF-8" checked>UTF-8<br>
		  </fieldset>
		  <fieldset>
		    <legend>Text:</legend>
		    <textarea name="content"></textarea>
		  </fieldset>		  
		  <fieldset>
		    <legend>Error correction:</legend>
		    <select name="correction">
		    	<option value="L" selected>L</option>
		    	<option value="M">M</option>
		    	<option value="Q">Q</option>
		    	<option value="H">H</option>
		    </select>
		  </fieldset>		  
		  <input type="submit" class="button" value="Generate"></input>
		</form>
	</div>	
	<div id="result">
		<iframe name="qrcode-frame" frameborder="0"  id="qrcode" src="qr.php" height="315px;" width="350px"></iframe>
	</div>
</div>

<p>&nbsp;</p>
<br>
<?php include 'qrcode.php'; ?>

</body>
</html>
