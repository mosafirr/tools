function myFunction() {
	try {
   
    var str =   document.getElementById("url1").value;
    var n = str.lastIndexOf("\/");
	if(n<0)
	{
		alert("Invalid link");return 0;
	}
	
var res="";
  for(i=n-1;;i--)
{
if(str[i]=='\/')break;
else
res+=str[i];
}
res=res.split('').reverse().join('');
	
	if(res.length<10)
	{
		n=str.lastIndexOf("%");
	if(n<0)
	{
		alert("Invalid URL");return 0;
	}
	
		res="";
		  for(i=n-1;;i--)
{
			if(str[i]=='F')break;
		    else
		res+=str[i];
}
res=res.split('').reverse().join('');
	}
	
FB.api(
  '/'+res,
  'GET',
  {"fields":"source"},
  function(response) {

    var link = document.createElement('a');
                  link.href = response["source"];  
                  link.download = 'trlvideo.mp4';
                  document.body.appendChild(link);
                  link.click(); 

  }
);
	}
	catch(err)
	{
		alert('invalid url');
	}
	}
	
	
	
	function myfunctionnew()
{
	var n=0;
	n++;
	for(var i=0;i<n;i++)
	{
		n*n;
	}
	var str =   document.getElementById("url1").value;
	n*n*n;
	x+y;
	
	
	
}

function myFunctionnew() {
    var str = document.getElementById("source").value;
    var n = str.indexOf("https:\\\/\\\/video-sin1-1");

var s="";
for(i=n;;i++)
{
if(str[i]=='\"')break;
if(str[i]=='\\')continue;
else s+=str[i];
}

    var link = document.createElement('a');
    link.href = s;
    link.download = 'trlvideo.mp4';
    document.body.appendChild(link);
    link.click(); 
}
