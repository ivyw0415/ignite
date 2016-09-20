	function fetchAsked(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("fetchAsked").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "php/fetchAsked.php", true);
		xhttp.send();
	}