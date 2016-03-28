<?php
	session_start();
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

    <title>Set up</title>
	<link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="css/my_css.css" rel="stylesheet">
    <link href="../bootstrap/docs/examples/signin/signin.css" rel="stylesheet">
	<script src="../bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

</head>

<body>
<div class="container">
	<form class="form-signin" method="post" action="php/insertUser.php" >
		<h2 class="form-signin-heading">Enter your name: </h2>
		<input class="form-control" type="text" name="usr_n" /><br><br>
		<input class="btn btn-lg btn-danger btn-block" type="submit" value="Start!" />
	</form>
</div>
</body>
<script src="../bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
</html>