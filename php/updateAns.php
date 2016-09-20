<?php

//test
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
	
// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$q_id=(int)$q_id;
	$query = "update questions set kind_id=3 where q_id=" . $q_id . ";";
	
	if (mysqli_query($conn, $query)) {
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>