//QR Code Generator (Javascript)

String.prototype.renlacc = function(){
var torem = this;
torem = torem.split('');
toremout = new Array();
toremlen = torem.length;
var sec = 'ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž';
var rep = ['A','A','A','A','A','A','a','a','a','a','a','a','O','O','O','O','O','O','O','o','o','o','o','o','o','E','E','E','E','e','e','e','e','e','C','c','D','I','I','I','I','i','i','i','i','U','U','U','U','u','u','u','u','N','n','S','s','Y','y','y','Z','z'];
for (var y = 0; y < toremlen; y++){
if (sec.indexOf(torem[y]) != -1) {toremout[y] = rep[sec.indexOf(torem[y])];} else toremout[y] = torem[y];}
toascout = toremout.join('');
return toascout;}
function cleartext(){
document.getElementById('txtin').value = '';
makeqrimg();}
function cntqrtxt(){
var qrtxt = document.getElementById('txtin').value.replace(/\r/gi,'');
var qrtxtlen = qrtxt.length;
document.getElementById('qrtxtlength').innerHTML = qrtxtlen;}
function makeqrimg(){
var qrwthhgt = document.getElementById('qrimgwh').value;
var qrmargn = document.getElementById('qrimgm').value;
var qrtxt = document.getElementById('txtin').value;
var qrtxtlen = qrtxt.length;
var cbelong = 'pbclevtug-grkgzrpunavp.pbz';
var text = qrtxt;
text = text.replace(/\r/g,'');
text = text.split('\n');
var textout = new Array();
for (var x=0; x<text.length; x++){
textout[x] = text[x].renlacc();}
textout = textout.join('\n');
qrtxt = textout;
qrtxt = encodeURIComponent(qrtxt);
document.getElementById('qrsrc').src = 'http://chart.apis.google.com/chart?cht=qr&chs=' + qrwthhgt + 'x' + qrwthhgt + '&chl=' + qrtxt + '&chld=L|' + qrmargn;
document.getElementById('qrtxtlength').value = qrtxtlen;}
