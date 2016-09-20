var tagInputField;
var tagOption;


	function updateContents(){
		////updateQuesLeft();\
		console.log("update");
		//updateQues();
		//updateFacts();
		getActorQues();
	}

	/*function updateQuesLeft(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("allQues").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open("GET", "php/allQues.php", true);
		xhttp.send();
		//setTimeout(updateQuesLeft, 2000);
		//console.log("up");
	}*/


	function selectQuestion(q_content, q_id) {
		field = document.getElementById("selectedQuestion");
		if(field) {
			field.innerHTML = `
			<p>`+q_content.replace(/\\'/g, "'")+`</p>
			<form method="post" action="php/question_tag.php">
				<input type="hidden" name="q_id" value="`+q_id+`">
				<input type="text" id="tag_input_text" name="q_tag">
				<select id="tag_select" name="pd_tag" onchange="setTagInput()">
					<option value="n">[None]
					<option value="Ach1">Ach1
					<option value="Ach2">Ach2
					<option value="Ach3">Ach3
					<option value="Ach4">Ach4
					<option value="Improv">Improv
				</select>
				<input type="submit" value="Add tag" name="addTag">
			</form>
			`;
		}
	}

	function setTagInput() {
		if(!tagInputField)
			tagInputField = document.getElementById("tag_input_text");
		if(!tagOption)
			tagOption = document.getElementById("tag_select")
		if(tagOption.value != "n") {
			tagInputField.setAttribute("disabled","disabled");
		}
		else {
			tagInputField.removeAttribute("disabled");
		}
	}

	function refreshAllQ(q_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/updateQirr.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("q_id="+q_id);
		//updateQuesLeft();
	}


	function popup(q_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/updateQpop.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("q_id="+q_id);
		//updateQuesLeft();
	}

	function voteQues(q_id,q_vote){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/updateQvote_be.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("q_id="+q_id+"&q_vote="+q_vote);
		//updateQuesLeft();
	}
	//backendctrl, middle
	function updateQues(){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("onprojques").innerHTML = xhttp.responseText;
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
		setTimeout(updateFacts, 3000);
		//console.log("refreshed");
	}

	function achvFact(f_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/addAchv.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("f_id="+f_id);
		//updateFacts();
	}

	function rmvFact(f_id){
		var xhttp;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("POST", "php/rmvAchv.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("f_id="+f_id);
		//updateFacts();
	}

	function checkStart(){
		var xhttp;
		var start = 0;
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200){
				console.log(xhttp.responseText);
			}
		};
		xhttp.open("GET", "php/checkStart.php", true);
		//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//xhttp.send("starts="+start);
		//updateFacts();
		xhttp.send();
	}

function getActorQues() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            document.getElementById("actor_ques").innerHTML = req.responseText;
        }
    }
    req.open("GET", "php/actorgetques.php", true);
    req.send();
    setTimeout(getActorQues, 2000);
}