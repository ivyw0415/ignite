<?php
	session_start();
	/*$servername = "localhost";
	$username = "root";
	$password = "ignite";
	$dbname = "ignite";*/
	
	$servername = "58.64.190.104";
	$username = "sq_ivyhhhhh";
	$password = "whan1Whan1";
	$dbname = "sq_ivyhhhhh";

// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	$name = rand(0,200);//mysqli_real_escape_string($conn, $_POST['usr_n']);
	
	$insert_name_sql = "INSERT INTO users (user_name) VALUES ('".$name."')";
	$get_id_sql = "select count(*) from users";

	if (mysqli_query($conn, $insert_name_sql) && $usr_id = mysqli_query($conn, $get_id_sql)) {
    	$row = mysqli_fetch_row($usr_id);
    	//echo $row[0];
    	header('Location: ../index.php?u_id='.$row[0]);
	} else {
    	echo "Error: " . $insert_name_sql . "<br>" . mysqli_error($conn);
	}
	mysqli_free_result($usr_id);
	mysqli_close($conn);
	session_destroy();
?>