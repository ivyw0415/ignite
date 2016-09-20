<?php
	session_start();
	if(!isset($_SESSION['usr_id'])){
		if(!is_null($_GET['u_id'])){
			//$_SESSION['usr_id'] = $_GET['u_id'];
			}
		else
			header('Location: setup.php');
		
	}
	$usr_id = $_SESSION['usr_id'];
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.css" rel="stylesheet">
	<!--<link href="../bootstrap/docs/examples/signin/signin.css" rel="stylesheet">-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/my_css.css" rel="stylesheet">
	<link href="css/mains_css.css" rel="stylesheet">
	<link rel="stylesheet" href="sweetalert/sweetalert.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<title>GMYG</title>
</head>

<body onload="indexOnLoad();">

		<header class="header-au">
			<div class="header-left"><!-- <a href="intro/"><img style='width: auto; height:27px' src='assets/d-intro.png'></a> --></div>
			<div class="col-sm-12"><img style='width: auto; height:27px' src='assets/d-discussion.png'></div>
			<div class="header-right"></div>
		</header>
	
		<div class="show-ques">
    	    <table class='table'>
       		 	<thead>
        		<tr>
	        		<th class='content-td' style='font-size:20px'>Linda Asks</th>
   		     		<th class='v-btn-th' style='font-size:20px'>Votes</th>
   		     	</tr>
   	   		  	</thead>
   	   			<tbody class='text-content' id='allQues'>
        		<tbody>
        	</table>
    	</div>
	<div class="panel-footer f-bottom">
		<div class="forms">
			<form method="post" action="php/questions.php">
  				<div class="input-group">
  					<input id="btn-input" type="text" name="ques" class="form-control input-lg" maxlength="200" placeholder="e.g. Why do you have a gun?" required />
     				<span class="input-group-btn">
     					<input class="btn btn-lg btn-danger btn-block" type="submit" value="send" name="askQ" />
     				</span>
  				</div>
			</div>
		</form>
	</div>
</div>
</body>
<script src="sweetalert/sweetalert.min.js"></script>
<script src="js/index_js.js"></script>
</html>