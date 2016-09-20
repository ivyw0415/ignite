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

    $query = "select q_content, q_tag from questions where kind_id=7 or kind_id=8 order by q_vote desc";
    if($result = mysqli_query($conn, $query)) {
        while($row = mysqli_fetch_row($result)) {
            print("<span class='tag'>" . $row[1] . "</span>  " . $row[0]);
		}
		print('<br/>');
    }
    else {
        echo "Error: " . $query . "<br />" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
