<?php
	session_start();
	if(!isset($_SESSION['usr_id']))
		$_SESSION['usr_id'] = $_GET['u_id'];
	$usr_id = $_SESSION['usr_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Give me your gun!</title>

    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="../bootstrap/docs/examples/signin/signin.css" rel="stylesheet">
	<link href="css/my_css.css" rel="stylesheet">
	<script src="../bootstrap/assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body onload="fetchAsked();">
<div class="container">
	<div class="headers"><h1 class="header">Background <?php echo $usr_id ?></h1></div>
	<div class="text-content"><p class="content">Let's talk about GUN VIOLENCE...</p></div>
	<div class="forms">
		<form method="post" action="php/questions.php">
			<h3>What do you wanna say?</h3><br>
			<input class="form-control" id="q_input" type="text" name="ques" /><br>
			<div class="buttons">
				<input class="btn btn-lg btn-danger btn-block" type="submit" value="Respond to Brian" name="askQ" />
			</div>
		</form>
	<div>
	<div class="headers"><h3>Responds you've made:<br></h3></div>
	<div class="text-content"><p id="fetchAsked"></p></div>
	<div class="buttons">
		<a href="vote.php" class="btn btn-lg btn-danger btn-block" role="button">Vote for Responses</a>
	</div>
</div>
</body>
<script src="js/main_js.js"></script>
<script src="../bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
</html>