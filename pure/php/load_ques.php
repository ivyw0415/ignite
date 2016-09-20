<?php
	session_start();
	$usr_id = $_SESSION['usr_id'];
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
	
	$query = "select q_content,q_vote,q_id from questions where kind_id=1 order by q_vote desc";

	if ($result = mysqli_query($conn, $query)) {
	 	while($row = mysqli_fetch_row($result)){
			print("<tr>
				<td class='content-td'>" . $row[0] . "</td>
				<td class='v-btn-td'>" . $row[1] . "</td>
				<td class='v-btn-td'><input class='btn btn-sm btn-danger vote-btn' type='button' value='Vote' 
				onclick='refresh(". (int)$row[2] . "," . (int)$row[1] . ");' /></td>
				</tr>");
		}
		mysqli_free_result($result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>