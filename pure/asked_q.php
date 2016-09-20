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

    <title>GMYG</title>

    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="../bootstrap/docs/examples/signin/signin.css" rel="stylesheet">
	<link href="css/my_css.css" rel="stylesheet">
	<script src="../bootstrap/assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body onload="fetchAsked();">

	<div class="headers">
		<header class="header-au">
			<div class="header-left"><a href="index.php">&lt; Back</a></div>
		</header>
	</div>
	<div class="container">
	<div class="headers"><h3 class="headers">Responses you made <?php echo $usr_id ?></h3></div>
	<div class="text-content"><p id="fetchAsked"></p></div>
</div>
</body>
<script src="js/asked_q_js.js"></script>
<script src="../bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
</html>