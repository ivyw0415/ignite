<?php
	$servername = "localhost";
	$username = "ignite";
	$password = "g4c2016etc";
	$dbname = "ignite";
	
	$threshold = -1;
// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = "select q_content,q_vote,q_id,q_tag from questions where kind_id=1 or kind_id=4 and q_vote > " . $threshold . " order by q_time desc";

	if ($result = mysqli_query($conn, $query)) {
	 	print("<table class='table table-hover'>");
		while($row = mysqli_fetch_row($result)){
			print("<tr>
				<td onclick='selectQuestion(\"" . mysqli_real_escape_string($conn, $row[0]) . "\", " . (int)$row[2] . ")'>" . $row[0] . " - #" . $row[3] . "<br/>
				</td>
				<td>" . $row[1] . "</td>
				<td class='vote-btn-td'><input class='btn btn-sm btn-danger' type='button' value='R' 
				onclick='refreshAllQ(". (int)$row[2] . ");' /></td>
				</tr>");
		}
		print("</table>");
		mysqli_free_result($result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>