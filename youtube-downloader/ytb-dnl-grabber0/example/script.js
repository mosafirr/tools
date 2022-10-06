// Sorry for the bad code style
var buttonTemplate = '<a target="_blank" href="*url*" type="button" class="btn btn-secondary">*text*</a>';
var listGroupTemplate = '<a target="_blank" href="*url*" class="list-group-item"><img src="*picture*" alt="" style="display: inline-block;width:200px"/><div style="width: 70%;"><div class="d-flex w-100 justify-content-between" style="margin-left: 10px;"><h5 class="mb-1">*title*</h5><small class="text-muted">*floatrightinfo*</small></div><p class="mb-1" style="margin-left: 10px;">*desc*</p><small class="text-muted">*bottominfo*</small></div></a>';

$(function(){
	$('#urlVideo').keypress(function(e) {
	    if(e.keyCode == '13')
	    	videoButton();
	});
	$('#urlChannel').keypress(function(e) {
	    if(e.keyCode == '13')
	    	channelButton();
	});
	$('#urlPlaylist').keypress(function(e) {
	    if(e.keyCode == '13')
	    	playlistButton();
	});
	$('#urlSearch').keypress(function(e) {
	    if(e.keyCode == '13')
	    	searchButton();
	});
});

function videoButton(){
	request({video:$('#urlVideo').val()}, function(respond){
		try{
			var json = JSON.parse(respond);
		} catch (e) {
			$("#videoError").html('Parse error\n<br>'+respond);
        	return;
    	}
		$("#videoError").html('');
		$('#videoDetail').css('display', '');
		$('#videoDetail #title').html(json.data.title);
		$('#videoDetail #info').html("Duration: "+secondsToMinutes(json.data.duration)+"\nViewed: "+json.data.viewCount);
		$('#videoDetail #picture').prop("src", json.picture[0]);

		$('#encoded').css('display', 'none');
		$('#adaptive').css('display', 'none');
		$('#subtitle').css('display', 'none');
		$('#encoded .button-group').html('');
		$('#adaptive .button-group').html('');
		$('#subtitle .button-group').html('');
		var encoded = json.data.video.encoded;
		var adaptive = json.data.video.adaptive;
		var stream = json.data.video.stream;
		var subtitle = json.data.subtitle;
		if(encoded){
			$('#encoded').css('display', '');
			for (var i = 0; i < encoded.length; i++) {
				$('#encoded .button-group').append(buttonTemplate
					.replace("*url*", encoded[i].url)
					.replace("*text*", encoded[i].quality+'('+encoded[i].type[0]+'/'+encoded[i].type[1]+')'));
			}
		}
		if(adaptive){
			$('#adaptive').css('display', '');
			for (var i = 0; i < adaptive.length; i++) {
				$('#adaptive .button-group').append(buttonTemplate
					.replace("*url*", adaptive[i].url)
					.replace("*text*", adaptive[i].quality+'('+adaptive[i].type[0]+'/'+adaptive[i].type[1]+')'));
			}
		}
		if(stream){
			$('#encoded').css('display', '');
			$('#encoded .button-group').append(buttonTemplate
				.replace("*url*", stream)
				.replace("*text*", 'Streaming link'));
		}
		if(subtitle){
			$('#subtitle').css('display', '');
			for (var i = 0; i < subtitle.length; i++) {
				$('#subtitle .button-group').append(buttonTemplate
					.replace("*url*", "example/base.php?lyric="+encodeURIComponent(subtitle[i].url))
					.replace("*text*", subtitle[i].lang));
			}
		}
	}, function(text){
		$('#urlVideoText').val(text);
	});
}

var audioSelected = false;
var videoSelected = false;
var mediaCombiner = false;
$('#adaptive .button-group').on('click', 'a', function(ev){
	if(!mediaCombiner) return;
	ev.preventDefault();

	if(this.innerText.indexOf('audio') !== -1)
		audioSelected = this;

	else if(this.innerText.indexOf('video') !== -1)
		videoSelected = this;

	else return;

	$('#adaptive .button-group a').css('background-color', '');

	if(audioSelected)
		$(audioSelected).css('background-color', '#bbb');
	if(videoSelected)
		$(videoSelected).css('background-color', '#bbb');
});

var mediaCombinerFinished = '';
function initMediaCombiner(){
	if(mediaCombinerFinished){
		window.open('example/temp/'.mediaCombinerFinished, '_blank');

		// Wait if the user want to click the link again
		setTimeout(function(){
			mediaCombinerFinished = '';
			$('#mediaCombiner').html('Media combiner');
		}, 10000);
		return;
	}

	if(mediaCombiner === false){
		mediaCombiner = true;
		$('#mediaCombiner').html("Select the audio & video quality");
	}
	else{
		if(audioSelected && videoSelected){
			$('#mediaCombiner').css('background-color', '#bbb').html('Please wait...');

			var copyAs = false;
			if(audioSelected.innerText.indexOf('webm') !== -1 && videoSelected.innerText.indexOf('webm') !== -1)
				copyAs = 'webm';
			if(audioSelected.innerText.indexOf('mp4') !== -1 && videoSelected.innerText.indexOf('mp4') !== -1)
				copyAs = 'mp4';

			request({
				combine:true,
				video:$(videoSelected).attr('href'),
				audio:$(audioSelected).attr('href'),
				copyAs:copyAs
			}, function(respond){
				try{
					var json = JSON.parse(respond);
					mediaCombinerFinished = json.path;
					$('#mediaCombiner').css('background-color', '').html('Success');
				} catch (e) {
					$("#videoError").html('Error\n<br>'+respond);
					$('#mediaCombiner').css('background-color', '#888').html('Failed');
		        	return;
		    	}
			}, function(text){
				$('#urlChannelText').val(text);
			});
			return;
		}

		$('#adaptive a').css('background-color', '');
		$('#mediaCombiner').html('Media combiner');
		mediaCombiner = audioSelected = videoSelected = false;
	}
}

function channelButton(){
	request({channel:$('#urlChannel').val()}, function(respond){
		try{
			var json = JSON.parse(respond);
		} catch (e) {
			$("#channelError").html('Parse error\n<br>'+respond);
        	return;
    	}
		$("#channelError").html('');

		var list = json.data.playlists;
		$('#channelGroupList').html('<label>Playlists:</label>');
		for (var i = 0; i < list.length; i++) {
			$('#channelGroupList').append(buttonTemplate
				.replace("*url*", 'https://www.youtube.com/playlist?list='+list[i].playlistID)
				.replace("*text*", list[i].title)
			);
		}

		var list = json.data.videos;
		$('#channelGroupList').append('<br><label>Videos:</label>');
		for (var i = 0; i < list.length; i++) {
			$('#channelGroupList').append(listGroupTemplate
				.replace("*bottominfo*", '')
				.replace("*floatrightinfo*", '')
				.replace("*title*", list[i].title)
				.replace("*desc*", 'viewed '+list[i].viewCount)
				.replace("*url*", "https://www.youtube.com/watch?v="+list[i].videoID)
				.replace("*picture*", 'http://i1.ytimg.com/vi/'+list[i].videoID+'/mqdefault.jpg')
			);
		}
	}, function(text){
		$('#urlChannelText').val(text);
	});
}

function playlistButton(){
	request({playlist:$('#urlPlaylist').val()}, function(respond){
		try{
			var json = JSON.parse(respond);
		} catch (e) {
			$("#playlistError").html('Parse error\n<br>'+respond);
        	return;
    	}
		$("#playlistError").html('');
		var list = json.data.videos;
		$('#playlistGroupList').html('');
		for (var i = 0; i < list.length; i++) {
			$('#playlistGroupList').append(listGroupTemplate
				.replace("*bottominfo*", '')
				.replace("*floatrightinfo*", '')
				.replace("*title*", list[i].title)
				.replace("*desc*", "")
				.replace("*url*", "https://www.youtube.com/watch?v="+list[i].videoID)
				.replace("*picture*", 'http://i1.ytimg.com/vi/'+list[i].videoID+'/mqdefault.jpg')
			);
		}
	}, function(text){
		$('#urlPlaylistText').val(text);
	});
}

var searchNext_ = null;
function parseSearchResult(respond){
	try{
		var json = JSON.parse(respond);
	} catch (e) {
		$("#searchError").html('Parse error\n<br>'+respond);
    	return;
    }
	$("#searchError").html('');
	var list = json.data.videos;
	var temp = '';
	for (var i = 0; i < list.length; i++) {
		temp = temp + listGroupTemplate
			.replace("*bottominfo*", list[i].views)
			.replace("*floatrightinfo*", list[i].duration)
			.replace("*title*", list[i].title)
			.replace("*desc*", list[i].description)
			.replace("*url*", "https://www.youtube.com/watch?v="+list[i].videoID)
			.replace("*picture*", 'http://i1.ytimg.com/vi/'+list[i].videoID+'/mqdefault.jpg')
			;
	}
	$('#searchGroupList').append(temp);
	$('#nextButton').css('display', '');
}

var page = 1;
function searchButton(next){
	if(!page){
		page = 1;
		$('#searchGroupList').html('');
	}
	else page++;
	request({search:$('#urlSearch').val(), page:page}, function(respond){
    	parseSearchResult(respond);
	}, function(text){
		$('#urlSearchText').val(text);
	});
}

function request(data, callback, error){
	$('.tab-pane.active a.btn')[0].innerHTML = "Loading";
	$.ajax({
      	type: 'POST',
		url:"example/base.php",
		data:data,
		success:function(respond){
			if(callback) callback(respond);
		},
		error:function(respond){
			if(error) error(respond);
		},
		complete:function(respond){
			$('.tab-pane.active a.btn')[0].innerHTML = "Submit";
		}
	});
}

function secondsToMinutes(time){
    return Math.floor(time / 60)+':'+Math.floor(time % 60);
}