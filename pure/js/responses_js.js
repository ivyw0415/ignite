	function updateQues(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("allQues").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "../php/responses_php.php", true);
		xhttp.send();
		setTimeout(updateQues, 2000);
	}
	
	function updateFacts(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("facts-content").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "../php/facts_php.php", true);
		xhttp.send();
		setTimeout(updateFacts, 2000);
	}
	
	function updateContents(){
		updateQues();
		updateFacts();
	}