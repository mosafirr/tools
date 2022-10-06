<!DOCTYPE html>
<html lang="en">
<head>
<title>Text2Speech</title>
<LINK REL="SHORTCUT ICON" href="../avatar brigante.jpg">
<meta http-equiv="Content-Language" content="en" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="From text to speech (speech synthesis). Online tool that offers applications and services to convert text into speech. Speech synthesis systems and technology to provide voice resources to any website or add speech synthesis to any web browser." />
<meta name="keywords" content="online text to speech, text to speech, text2speech, tts, online tts, tts to mp3, online text to speech mp3, text to mp3, text to mp3 online, text speech">
<link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>

<a href="../">Free Online Tools</a>

<h2>Online Text to Speech</h2>

From text to speech (speech synthesis)<br /><br />

1. Variant<br />

<form method="post" action="">
<textarea type="text" name="id" name="text" rows="20" cols="70" id="id"></textarea><br />
<input type="submit" class="button" title="Download in .mp3" value="Proceed">
</form>

<?php
/*
// api from: http://www.voicerss.org           

require_once('voicerss_tts.php');

$tts = new VoiceRSS;
$voice = $tts->speech([
    'key' => 'your-key-here',
    'hl' => 'en-us',
    'src' => 'Hello, world!',
    'r' => '0',
    'c' => 'mp3',
    'f' => '44khz_16bit_stereo',
    'ssml' => 'false',
    'b64' => 'true'
]);

echo '<audio src="' . $voice['response'] . '" autoplay="autoplay"></audio>';
*/

$id = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');
echo  '<br /><iframe src="http://api.voicerss.org/?key=your-key-here&hl=en-us&src='.$id.'" height="60" scrolling="no" style="border:none;"></iframe><br /><small>Right Click and Save Audio As...</small><br />';
?>

<br />

2. Variant<br />

    <script type="text/javascript"> 
        //<![CDATA[
        function validate(){
            if(document.getElementById('form').text.value.length == 0){
                message = 'Enter text in English, please!';
                window.alert(message);
                return false;
            } else {
                var tgt = "voice_"+parseInt(Math.random()*100000);
                window.open('', tgt, 'width=600,height=370,scrollbars=yes,location=yes,menubar=yes,resizable=yes,status=yes,toolbar=yes'); 
                document.getElementById('form').target=tgt;
                document.getElementById('form').submit();
                return;
            }
        }
        function do_focus(){
            document.getElementById('form').text.focus();
        }
        //]]>
    </script>

       <div id="box">
            <form method="post" id="form" action="http://vozme.com/text2voice.php?lang=en" target="mymp3">
                <input type="hidden" id="interface" name="interface" value="full" />
                <div id="box_header">
		            <div id="box_change_genre"><select name="gn"><option value="ml">Male voice</option><option value="fm">Female voice</option></select> <small>Enter text in English</small></div>
                </div>
                <textarea name="text" rows="20" cols="70" id="box_textarea"></textarea>
                <div id="box_submit"><input type="submit" class="button" id="submission" name="submission" title="Download in .mp3" value="Proceed" onclick="validate();" /></div>
            </form>
                </div>
        </div><br />

3. Variant<br />

<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
 
<select id="voiceselection"></select><br />
<textarea id="text" cols="70" rows="20"></textarea><br />
<input onclick="responsiveVoice.speak($('#text').val(),$('#voiceselection').val());" type="submit" class="button" value="Play"/><br />
<script>
        var voicelist = responsiveVoice.getVoices();
        var vselect = $("#voiceselection");
        $.each(voicelist, function() {
                vselect.append($("<option />").val(this.name).text(this.name));
        });
</script>

<br />

4. Variant<br />
<a href="http://brigante.sytes.net/text-to-speech" target="_blank">Other Online Text to Speech | Save file As: .mp3 .wav</a>

<?php
include '../footer.php';
?>
