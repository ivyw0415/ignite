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

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$pdTag = mysqli_real_escape_string($conn, $_POST['pd_tag']);
$tag = mysqli_real_escape_string($conn, $_POST['q_tag']);
if($pdTag !== "n") {
	$tag = $pdTag;
}
$id = mysqli_real_escape_string($conn, $_POST['q_id']);

$query = "UPDATE questions SET q_tag = '" . $tag . "' WHERE q_id = " . $id . ";";

if(mysqli_query($conn, $query)) {
    header("Location: ../bectrl.html");
}
else {
	echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
