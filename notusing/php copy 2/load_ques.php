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
	
	$query = "select q_content,q_vote,q_id from questions where kind_id=1 order by q_vote desc";
	$query_count_user = "select count(*) from users";

	if ($result = mysqli_query($conn, $query)) {
	if	($result_count_user = mysqli_query($conn, $query_count_user)){
		$row_count_user = mysqli_fetch_row($result_count_user);
	 	while($row = mysqli_fetch_row($result)){
	 	//<span style='font-size: 18px; font-weight: bold; font-family:'Montserrat', sans-serif;'>" .$row[2]. "&nbsp&nbsp</span>"
			print("<tr>
				<td class='content-td'>". $row[0] . "</td>");
			print("<td class='v-btn-td-c'>" . $row[1] . "&#47;". $row_count_user[0] ."</td>");
			$query0 = "select count(user_id) from user_votes where q_id=" . $row[2] . " and user_id=".$usr_id.";";
			if ($result0 = mysqli_query($conn, $query0)){
				$row0 = mysqli_fetch_row($result0);
				if(!$row0[0]){
					print("<td class='v-btn-td'><span class='vote-btn fa fa-thumbs-o-up fa-2x' type='button' 
					 onclick='refresh(". (int)$row[2] . "," . (int)$row[1] . ");'></span></td>
						");
				}else{
					print("<td class='v-btn-td'><span class='vote-btn fa fa-thumbs-up fa-2x' type='button' 
						onclick='refresh(". (int)$row[2] . "," . (int)$row[1] . ");'></span></td>
						");
				}
				//btn btn-sm btn-danger vote-btn
				
				/*if(){
					print("<td class='v-btn-td'><span class='vote-btn fa fa-thumbs-o-down fa-lg' type='button' 
						onclick='refresh(". (int)$row[2] . "," . (int)$row[1] . ");' ></span></td>
						</tr>");
						}
				else{
					print("<td class='v-btn-td'><span class='fa fa-thumbs-down fa-lg
						vote-btn' type='button'></span></td>
						</tr>");
						}*/
			}
		}
		}
		mysqli_free_result($result);
		mysqli_free_result($result_count_user);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>