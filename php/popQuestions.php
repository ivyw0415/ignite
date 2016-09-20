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

	$query = "select q_content,q_vote,q_id,kind_id,q_tag from questions where kind_id=4 or kind_id=7 order by pop_time asc";

	if ($result = mysqli_query($conn, $query)) {
	 	print("<table class='table table-hover'>");
		while($row = mysqli_fetch_row($result)){
			if($row[3] != 7) {
				print("<tr style=''>
					<td class='content-td' onclick='selectQuestion(\"".mysqli_real_escape_string($conn, $row[0])."\", ". $row[2].")'>" . $row[0] . " - # " . $row['q_tag'] . "</td>
					<td>" . $row[1] ."</td>
					<td>
					<form method='post' action='php/pushActorQ.php'>
					<input type='hidden' name='q_id' value=". (int)$row[2] ." />
					<input class='btn btn-sm btn-danger' type='submit' name='' value='A'/></form></td>
					<td><input class='btn btn-sm btn-danger' type='button' value='-'
					onclick='refresh(". (int)$row[2] . ");' /></td>
					</tr>");
			}
			else {
				print("<tr style=''>
					<td class='content-td' onclick='selectQuestion(\"".mysqli_real_escape_string($conn, $row[0])."\", ". $row[2].")'>" . $row[0] . "</td>
					<td>" . $row[1] ."</td>
					<td><p>**ACTOR**</p></td>
					<td><input class='btn btn-sm btn-danger' type='button' value='-' onclick='refresh(". (int)$row[2] . ");' /></td>
					</tr>");
			}
		}
		print("</table>");
		mysqli_free_result($result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
