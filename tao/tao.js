function updateContents(){
		updateQuesLeft();
	}
	function updateQuesLeft(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("allQues").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "tao.php", true);
		xhttp.send();
		setTimeout(updateQuesLeft, 2000);
	}
	function refreshAllQ(q_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "updateQirr.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("q_id="+q_id);
		updateQuesLeft();
	}