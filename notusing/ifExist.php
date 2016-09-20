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

$query = "select exists(select * from users where user_name='" . $_POST['usr_n']. "');";

if ($result = mysqli_query($conn, $query)) {
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	//print $row[0];
    if($row[0]>0){
    	print("User name already exists. Choose a new one or 
    	<input class='btn btn-lg btn-danger btn-block' type='button' value='Log In' onclick='redirect();' />");
    }else{
    	print("User name available.");
    }
    mysqli_free_result($result);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

