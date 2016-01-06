<html>
<head>
	<title>Not visited yet</title>
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<script type = "text/javascript">
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
	
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}


// getting ip address

function getIP(json) {
    window.userip = json.ip;
  	//document.write("My public IP addresseeeesss is: ", userip);
  }
/*
    var userip = json.ip;
	var s = document.createElement("script");
	s.type = "text/javascript";
	s.src = "https://api.ipify.org?format=jsonp&callback=getIP";
    	$("head").append(s);
*/    
//document.write('Your ip addresseseses is', userip);

//now get function via $.getJSON

 function notVisitedIP(){
		$.getJSON("json_files.json", function(result){
		site=result.sites[1];
		$("#display").append("redirecting to "+site);
		//alert(site);
		window.location=site;
		//return this;
	});
}

 function visitedIP(){
		$.getJSON("json_files.json", function(result){
		site=result.sites[0];
		$("#display").append("redirecting to "+site);
		window.location=site;
		//return this;
	});
}

function checkCookie() {
    var user = getCookie("ipaddress");    

    if (user ==  userip) {
		console.log(userip);
		visitedIP();
    } else {
	
	var user = userip;
        setCookie("ipaddress", user, 365);
		console.log("cookie stored");
		console.log(userip);  
		notVisitedIP();
    }
}
</script>
<script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script>
<body onload="checkCookie()">
<div id = "display"> </div>
</body>
</html>
