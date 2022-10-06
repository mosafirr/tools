// ------------------------------------------------------------------------
// ------------------------------------------------------------------------
window.location.getParam = function(name) {
	name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");

	var regex  = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		result = regex.exec(window.location.search);

	if (result == null) {
		return false;
	}

	return decodeURIComponent(result[1].replace(/\+/g, ' '));
};

// ------------------------------------------------------------------------

/**
 * Youtube downloader
 *
 */
(function() {

	var wrapper = document.getElementById('watch7-subscription-container'),
		btn     = document.createElement('a'),
		vid     = window.location.getParam('v'),
		style   = document.createElement('style'),
		head    = document.getElementsByTagName('head')[0],
		// Update this to point to your own installation:
		link    = 'http://tools.eti.pw/youtube-downloader/getvideo.php?videoid=' + vid + '&type=Download';

	if (wrapper && vid) {
		// Assemble the button:
		btn.type = 'button';
		btn.setAttribute('href',  link);
		btn.setAttribute('role',  'button');
		btn.setAttribute('style', 'line-height:inherit;height:23px;border-color:#b3b3b3 !important');
		btn.setAttribute('class', 'yt-uix-subscription-button yt-uix-button yt-uix-button-subscribe-branded');

		// Child elements:
		btn.innerHTML = '<span class="yt-uix-button-icon-wrapper" style="background:#b3b3b3;border-color:#b3b3b3">\
			<img class="guide-management-plus-icon" src="//tools.eti.pw/youtube-downloader/download-video.png">\
			<span class="yt-uix-button-valign"></span>\
		</span>\
		<span class="yt-uix-button-content">\
			<span class="subscribe-label"></span>\
			<span class="unsubscribe-label"></span>\
		</span>';

		// Append it:
		wrapper.appendChild(btn);

		// Style:
		style.type      = 'text/css';
		style.innerHTML = '#watch7-subscription-container .yt-uix-button-subscription-container { float: left !important; margin-left: 10px !important; }';
		head.appendChild(style);
	}
})();
