	function refresh(q_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "updateQkind.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("q_id="+q_id);
		location.reload();
	}

	function updateQues(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("allQues").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "allQues.php", true);
		xhttp.send();
	}