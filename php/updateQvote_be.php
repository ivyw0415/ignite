<?php
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

// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$q_vote = (int)$q_vote+1;
	$q_id=(int)$q_id;
	
	$query = "update questions set q_vote=" . $q_vote ." where q_id=" . $q_id . ";";
	
	$res = mysqli_query($conn, $query);
		
     echo $res;
	mysqli_close($conn);
?>