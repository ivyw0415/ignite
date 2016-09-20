<?php
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
	
	$query = "select status_n from status where status_id = 3";

	if ($result = mysqli_query($conn, $query)) {
		while($row = mysqli_fetch_row($result)){
	 		print($row[0]);
		}
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	mysqli_free_result($result);
	mysqli_close($conn);
?>