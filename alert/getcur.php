<?php
	$servername = "localhost";
	$username = "ignite";
	$password = "g4c2016etc";
	$dbname = "ignite";
	
	/*$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";*/
	
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
	//$update_query = "select status_n from status where status_id = 2;";
	$sql = "select status_n from status where status_id=2;";
	
	if ($result1 = mysqli_query($conn, $sql)) {
	//print("<table class='table table-hover'>");
    	while ($row = mysqli_fetch_row($result1)) {
    		print($row[0]);
        }
            
    	//mysqli_free_result($result1);
	} else {
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_free_result($result1);
	mysqli_close($conn);
	
?>
