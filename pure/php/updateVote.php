<?php
	session_start();
	$usr_id = $_SESSION['usr_id'];
	$servername = "localhost";
	$username = "root";
	$password = "ignite";
	$dbname = "ignite";
	
	/*$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";*/
	
	$q_id = $_POST['q_id'];
	$q_vote = $_POST['q_vote'];

// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$q_vote = (int)$q_vote+1;
	$q_id=(int)$q_id;
	
	$check_exist_query = "select count(user_id) from user_votes where q_id=" . $q_id . ";";
	if ($result = mysqli_query($conn, $check_exist_query)){
		console.log($usr_id);
		if(!$row[0]){
			$query = "update questions set q_vote=" . $q_vote ." where q_id=" . $q_id . ";";
			$insert_query = "INSERT INTO user_votes (user_id, q_id) 
								VALUES (" . $usr_id . "," . $q_id . ");";
			
			if (mysqli_query($conn, $insert_query))
				if (mysqli_query($conn, $query)) 
					print($q_vote);
				else
					echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
			else {
    			echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
		}
	}

	mysqli_close($conn);
?>