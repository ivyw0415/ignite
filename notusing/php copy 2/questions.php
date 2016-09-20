<?php
	session_start();
	$usr_id = $_SESSION['usr_id'];
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

$question = mysqli_real_escape_string($conn, $_POST['ques']);

//$query0 = "select user_id from users where user_name='" . $_COOKIE['user_name'] ."';";



/*if ($result0 = mysqli_query($conn, $query0)) {
	$row = mysqli_fetch_array($result0, MYSQLI_NUM);
	$usr_id = (int)$row[0];
	mysqli_free_result($result0);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}*/

$query = "INSERT INTO questions (q_content, q_time, user_id, kind_id, q_vote) 
			VALUES ('" . $question . "', NOW(), '" . $usr_id . "', '1', '0');";

if (mysqli_query($conn, $query)) {
	//header("Location: ../main.php");
	header("Location: ../index.php");
	//print($usr_id);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

