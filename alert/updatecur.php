<?php
	$servername = "localhost";
	$username = "ignite";
	$password = "g4c2016etc";
	$dbname = "ignite";
	
	/*$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";*/
	
	$txt0=$_POST['curs'];
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
	$update_query = "update status set status_n=".$txt0." where status_id = 2";
	
	if (mysqli_query($conn, $update_query)) {
    	//$row = mysqli_fetch_row($result);
    	//echo $row[0];
	} else {
    	echo "Error";
	}
	
	//mysqli_free_result($result);
	mysqli_close($conn);
	//session_destroy();
?>
