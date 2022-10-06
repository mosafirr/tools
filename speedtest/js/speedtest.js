function callApplet(server, port, chunkSize, chunkCount) {
	var app = document.getElementById('applet');
	app.innerHTML = loadApplet(server, port, chunkSize, chunkCount);
}

function callStartTest() { 
	document.getElementById('voip').startTest();
}

function callRestartVoIP() {
	document.getElementById('voip').restartClient();
}

function callSetVoIPResult(jitter, loss) {
	getMovie("speedtest").callSetVoIPResult(parseFloat(jitter), parseFloat(loss));
}

function callSetAppletError() {
	getMovie("speedtest").callSetAppletError();
}

function callVoipAppletReady() {
	getMovie("speedtest").callVoipAppletReady();
}

function callLog(msg) {
	console.log(msg);
}

function getMovie(movieName) {
	if(navigator.appName.indexOf("Microsoft") != -1) {
		return window[movieName]
	} else {
		return document[movieName]
	}
}	

function loadApplet(server, port, chunkSize, chunkCount) {
	var domain = server.split('/');
	
	content =  '';	
	content = '<applet id="voip" name="voip" code="Voip.class" archive="'+server+'Voip.jar" width="0" height="0" codebase="*" MAYSCRIPT>';
	content += '<param name="width" value="0">';
	content += '<param name="height" value="0">';
	content += '<param name="debug" value="1">';
	content += '<param name="ip" value="'+domain[2]+'">';
	content += '<param name="port" value="'+port+'">';
	content += '<param name="chunkSize" value="'+chunkSize+'">';
	content += '<param name="chunkCount" value="'+chunkCount+'">';
	content += '<param name="lang" value="en">';
	content += '</applet>';	
	return content;
}
	
