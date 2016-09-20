<?php
	session_start();
	$usr_id = $_SESSION['usr_id'];
	
	$servername = "localhost";
	$username = "ignite";
	$password = "g4c2016etc";
	$dbname = "ignite";
	
	/*$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";*/
	
	$q_id = $_POST['q_id'];
	$q_vote = $_POST['q_vote'];
	header('Content-type: application/json');
	print("q_id: " . $q_id);

// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$q_id=(int)$q_id;
	
	$check_exist_query = "select count(user_id) from user_votes where q_id=" . $q_id . " and user_id=".$usr_id.";";
	if ($result = mysqli_query($conn, $check_exist_query)){
		$row = mysqli_fetch_row($result);
		if(!$row[0]){
			$q_vote = (int)$q_vote+1;
			if($q_vote <= 0)
				$q_vote = 0;
			$query = "update questions set q_vote=" . $q_vote ." where q_id=" . $q_id . ";";
			$insert_query = "INSERT INTO user_votes (user_id, q_id) 
								VALUES (" . $usr_id . "," . $q_id . ");";
			
			if (mysqli_query($conn, $insert_query))
				if (mysqli_query($conn, $query)) 
					print($q_vote);
				else
					echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
			else {
    			echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
		} else {
			$q_vote = (int)$q_vote-1;
			if($q_vote <= 0)
				$q_vote = 0;
			$query = "update questions set q_vote=" . $q_vote ." where q_id=" . $q_id . ";";
			$delete_query = "delete from user_votes where user_id =".$usr_id." and q_id=".$q_id.";";
			
			if (mysqli_query($conn, $delete_query))
				if (mysqli_query($conn, $query)) 
					print($q_vote);
				else
					echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
			else {
    			echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
		}
	}

	mysqli_close($conn);
?>