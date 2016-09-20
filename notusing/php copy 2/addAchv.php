<?php

//test
	/*$servername = "localhost";
	$username = "root";
	$password = "ignite";
	$dbname = "ignite";*/
	
	$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";
	
	$fact_id = $_POST['f_id'];
	
// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$fact_id=(int)$fact_id;
	$query = "update facts set fact_status=1 where fact_id=" . $_POST['f_id'] . ";";
	
	if (mysqli_query($conn, $query)) {
		//print("xixi");
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>