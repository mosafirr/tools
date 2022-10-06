function showAsciiQR()
{
	document.getElementById('QRHtml').style.display='none';
	document.getElementById('QRImage').style.display='none';
	document.getElementById('QRAscii').style.display='block';
	document.getElementById('QRReddit').style.display='none';
}

function showImageQR()
{
	document.getElementById('QRHtml').style.display='none';
	document.getElementById('QRImage').style.display='block';
	document.getElementById('QRAscii').style.display='none';
	document.getElementById('QRReddit').style.display='none';
}

function showRedditQR()
{
	document.getElementById('QRHtml').style.display='none';
	document.getElementById('QRImage').style.display='none';
	document.getElementById('QRAscii').style.display='none';
	document.getElementById('QRReddit').style.display='block';
}

function showHtmlQR()
{
	document.getElementById('QRHtml').style.display='block';
	document.getElementById('QRImage').style.display='none';
	document.getElementById('QRAscii').style.display='none';
	document.getElementById('QRReddit').style.display='none';
}
