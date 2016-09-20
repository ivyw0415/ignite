<?php
	session_start();
	$usr_id = $_SESSION['usr_id'];
	
	/*$servername = "localhost";
	$username = "root";
	$password = "ignite";
	$dbname = "ignite";*/
	
	$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";
	
	$threshold = 0;

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		/*$query0 = "select user_id from users where user_name='" . $_COOKIE['user_name'] ."';";
		$usr_id = 0;
		if ($result0 = mysqli_query($conn, $query0)) {
			$row = mysqli_fetch_array($result0, MYSQLI_NUM);
			$usr_id = (int)$row[0];
			mysqli_free_result($result0);
		} else {
    		echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}*/
		
		$sql = "select q_content,q_vote,kind_id from questions where user_id=" . $usr_id . ";";
		
		if ($result1 = mysqli_query($conn, $sql)) {
			//print("<table class='table table-hover'>");
    		while ($row = mysqli_fetch_row($result1)) {
    			if($row[1]>$threshold) 
    				if($row[2] == 1) //shown
    					print("<div class='asked history-line'>
    					<span></span>".$row[0]."
    					</div>");
    					//print("<tr class='tr-shown'><td>" . $row[0] . "</td></tr>");
                	else
                		print("<div class='question  history-line'>
    					<span class='fa fa-question-circle-o fg-3x'></span>".$row[0]."
    					</div>");
                		//print("<tr class='tr-high-voted'><td>" . $row[0] ."</td></tr>");
                else if($row[2] == 5 || $row[2]==2)
                	print("<div class='question  history-line'>
    					<span class='fa fa-question-circle-o fa-3x'></span>".$row[0]."
    					</div>");
    			else 
    				print("<div class='question history-line'>
    					<span class='fa fa-question-circle-o fa-3x'></span>".$row[0]."
    					</div>");
            }
            print("</table>");
    		mysqli_free_result($result1);
		} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
?>