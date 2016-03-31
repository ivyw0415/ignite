<?php
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
	
	console.log("in");
	
	$q_vote = (int)$q_vote+1;
	$q_id=(int)$q_id;
	
	$query = "update questions set q_vote=" . $q_vote ." where q_id=" . $q_id . ";";
	
	mysqli_query($conn, $query);
		

	mysqli_close($conn);
?>