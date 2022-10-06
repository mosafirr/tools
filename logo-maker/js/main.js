var last = '000000';
function $ (id) {
	return document.getElementById(id);
}
function download_image () {
	window.location = $('image2').firstChild.src.replace('image.php', 'download.php');
}
function load_image () {
	$('image2').innerHTML = '<img src="image.php?font=' + $('font').value + '&text=' + window.encodeURI($('text').value) + '&color=' + companyColor + '&size=' + $('size').value + '&slogan=' + window.encodeURI($('text2').value) + '&size2=' + $('size2').value + '&icon='+imgObj[imgIndex].src + '&sloganFont=' + $('font2').value + '&color2='+sloganColor+'">';
}
function check_changed () {
	if (last != $('cp1_Hex').value) {
		last = $('cp1_Hex').value;
		load_image();
	}
}
window.onload = function () {
	load_image();
	change_image(0);
	window.setInterval(check_changed, 100);
}