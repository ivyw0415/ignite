<?php
	$servername = "localhost";
	$username = "root";
	$password = "ignite";
	$dbname = "ignite";
	$threshold = 0;
	
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
	
	$query = "select q_content,q_vote,q_id from questions where kind_id=1 and q_vote > " . $threshold . " order by q_vote desc";

	if ($result = mysqli_query($conn, $query)) {
	 	print("<table class='table table-hover'>");
		while($row = mysqli_fetch_row($result)){
			print("<tr>
				<td>" . $row[0] . "</td>
				<td>" . $row[1] . "</td>
				<td><input class='btn btn-sm btn-danger' type='button' value='Remove' 
				onclick='refresh(". (int)$row[2] . ");' /></td>
				<td><input class='btn btn-sm btn-danger' type='button' value='Pop' 
				onclick='popup(". (int)$row[2] . ");' /></td>
				</tr>");
		}
		print("</table>");
		mysqli_free_result($result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>