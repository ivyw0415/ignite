<?php
	$servername = "localhost";
	$username = "root";
	$password = "ignite";
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

$question = mysqli_real_escape_string($conn, $_POST['ques']);

$query = "INSERT INTO questions (q_content, q_time, user_id, kind_id, q_vote) 
			VALUES ('" . $question . "', NOW(), '1', '1', '0');";

if (mysqli_query($conn, $query)) {
	header("Location: ../FilterQ.html");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

