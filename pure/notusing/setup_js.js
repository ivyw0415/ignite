function ifExist(str){
		var xhttp;
		if(str.length == 0){
			document.getElementById("exist").innerHTML = "invalid";
			return;
		}
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("exist").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("POST", "ifExist.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("usr_n="+str);
	}
	function redirect(){
		location.href = "login.html";
}