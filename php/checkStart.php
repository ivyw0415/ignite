<?php

//test
	$servername = "localhost";
	$username = "ignite";
	$password = "g4c2016etc";
	$dbname = "ignite";
	
	/*$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";*/
	
// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$start=$_POST['starts'];
	$query = "update status set status_n=1 where status_id=3;";
	
	if (mysqli_query($conn, $query)) {
		//print("xixi");
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>