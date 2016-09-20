<?php
	session_start();
	if(!isset($_SESSION['achv_no']))
		$_SESSION['achv_no'] = 0;
	if(!isset($_SESSION['achv_t_i'])){
		$_SESSION['achv_t_i'] = 0;
	}
	
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
	
	$anim_query = "select fact_content,fact_status from facts where fact_status = 1";
	$count=0;
	$anim_result = 0;
	if ($anim_result = mysqli_query($conn, $anim_query)) {
		if ($_SESSION['achv_no'] == $anim_result->num_rows){
			$_SESSION['achv_t_i']++;
		} else {
			$_SESSION['achv_t_i'] = 0;
		}
		$_SESSION['achv_no'] = $anim_result->num_rows;
		mysqli_free_result($anim_result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	
	$query = "select fact_content,fact_status from facts";
	if ($result = mysqli_query($conn, $query)) {
		while($row = mysqli_fetch_row($result)){
			$count++;
			if($row[1] == 0){
				print("<div class='p-achv locked'><div class='locked-logo fa fa-lock fa-3x'></div></div>");
			}
			if($row[1] == 1){
				if($count<$_SESSION['achv_no'])
					print("<div class='p-achv unlock'><div class='unlock-content'>".$row[0]."</div></div>");
				else {
					if($_SESSION['achv_t_i'] == 0)
						print("<div class='p-achv unlock highlighted'><div class='unlock-content'>".$row[0]."</div></div>");
					else
						print("<div class='p-achv unlock'><div class='unlock-content'>".$row[0]."</div></div>");
				}
			}
		}
		mysqli_free_result($result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	
	/*
	$query = "select fact_content,fact_status from facts where fact_status = 1";
	$count=0;

	if ($result = mysqli_query($conn, $query)) {
		if ($_SESSION['achv_no'] == $result->num_rows){
			$_SESSION['achv_t_i']++;
		} else {
			$_SESSION['achv_t_i'] = 0;
		}
		$_SESSION['achv_no'] = $result->num_rows;
	 	print("<table class='table'>");
		while($row = mysqli_fetch_row($result)){
			$count++;
			if($count<$result->num_rows){
				print("<tr>
					<td>" . $row[0] . "</td>
				</tr>");
			}
			else{
				if ($_SESSION['achv_t_i'] == 0){
					print("<tr>
						<td class='highlighted'>" . $row[0] . "</td>
						</tr>");
				} else {
					print("<tr>
						<td>" . $row[0] . "</td>
						</tr>");
				}
			}
		}
		print("</table>");
		mysqli_free_result($result);
	} else {
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}

	*/
	
	mysqli_close($conn);
?>