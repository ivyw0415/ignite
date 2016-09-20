
	function updateContents(){
		updateQues();
		updateFacts();
	}
	
	function updateQues(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("allQues").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "php/popQuestions.php", true);
		xhttp.send();
		setTimeout(updateQues, 2000);
	}
	
	function refresh(q_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/updateAns.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("q_id="+q_id);
		//updateQues();
	}
	
	function updateFacts(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("facts-content").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "php/loadFacts.php", true);
		xhttp.send();
	}
	
	function achvFact(f_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/updateAchv.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("f_id="+f_id);
		updateFacts();
	}
	
	