<?php
	session_start();
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
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="../bootstrap/docs/examples/signin/signin.css" rel="stylesheet">
    <link href="css/my_css.css" rel="stylesheet">
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script>
    <script src="../bootstrap/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="js/vote_js.js"></script>
</head>

<body  onload="updateQues();">
<div class="container">
	<h3>What's important?</h3>
	<p id="allQues"></p>
	<a href="main.php" class="btn btn-lg btn-danger btn-block" role="button">Back</a>
</div>
</body>
</html>

