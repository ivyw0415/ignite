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
	$fact_id = $_POST['f_id'];

// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = "select fact_content,fact_status,fact_id from facts";

	if ($result = mysqli_query($conn, $query)) {
	 	print("<table class='table'>");
		while($row = mysqli_fetch_row($result)){
			print("<tr>
					<td class='on-screen-res'>" . $row[0] . "</td>");
					
			if($row[1] == 0){
				print("
					<td class='vote-btn-td'><input class='btn btn-sm btn-danger' type='button' value='+' 
						onclick='achvFact(". (int)$row[2] . ");' /><td>");
			}else if($row[1] == 1){
				print("
					<td class='vote-btn-td'><input class='btn btn-sm btn-danger' type='button' value='-' 
						onclick='rmvFact(". (int)$row[2] . ");' /><td>");
			}
			print("</tr>");
		}
		print("</table>");
		mysqli_free_result($result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>