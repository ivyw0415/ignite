	function updateQues(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("allQues").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "php/voteQues.php", true);
		xhttp.send();
	}
	function refresh(q_id, q_vote){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/updateVote.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("q_id="+q_id+"&q_vote="+q_vote);
		location.reload();
	}
