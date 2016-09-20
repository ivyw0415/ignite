<?php
	session_start();
	if(isset($_SESSION['usr_id']))
		header("Location: index.php");
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
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="icon" href="../../favicon.ico">

    <title>Set up</title>
	<!--link href="css/bootstrap.css" rel="stylesheet"-->
	<!--link href="css/my_css.css" rel="stylesheet"-->
    <!--link href="css/signin.css" rel="stylesheet"-->
</head>
<style>
html {
	position: fixed;
    height: 800px;
    -webkit-background-size: cover;
  	-moz-background-size: cover;
 	-o-background-size: cover;
  	background-size: cover;
    background-image: url('assets/login-bg.png');
}
.setup-main{
	position:fixed;
	padding-top:15em;
	padding-bottom: 15em;
	padding-left: 2em;
	padding-right: 2em;
}
.setup-title{
	margin-top: 5em;
	position:fixed;
	padding-left:1em;
	font-size: 30px;
	color: white;
	font-family: 'Open Sans', sans-serif;
	text-shadow: 0 1px 0.5px #cc2900;
	width:10em;
}
img.setup-title{
	width:9em;
	height:auto
}
.form-header{
	padding-top:30%;
	width:100%;
	text-align: left;
	font-size: 25px;
	color: white;
	font-family: Myriad Pro;
	text-shadow: 0 1px 0.5px #000000;
}
.form-signin-h{
	position:relative;
	width:100%;
	font-size: 24px;
	color: white;
	font-family: Myriad Pro;
}
.form-control{
	width: 100%;
}
.form-signin-btn{
	position: fixed;
	padding-left:20px;
	height: auto;
    width: 250px;
}
.form-style-4{
	position:relative;
    width: 450px;;
    font-size: 16px;
}
.form-style-4 input[type=submit],
.form-style-4 input[type=button],
.form-style-4 input[type=text],
.form-style-4 input[type=email],
.form-style-4 textarea,
.form-style-4 label
{
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 16px;
    color: #fff;

}
.form-style-4 input[type=text],
.form-style-4 input[type=email] 
{
    background: transparent;
    border: none;
    border-bottom: 2px dashed #fff;
    width: 250px;
    outline: none;
    padding-right: 10%;
    font-family: Myriad Pro;
    color: #fff
    font-size:30px
}
.form-style-4 textarea{
    font-family: Myriad Pro;
    padding: 0px 0px 0px 0px;
    background: transparent;
    outline: none;
    border: none;
    border-bottom: 3px dashed #fff;
    width: 275px;
    overflow: hidden;
    resize:none;
    height:20px;
}

.form-style-4 textarea:focus, 
.form-style-4 input[type=text]:focus,
{
    border-bottom: 1px dashed #000;
}

.form-style-4 input[type=submit],
.form-style-4 input[type=button]{
    background: #576E86;
    border: none;
    border-radius: 5px;
    color: #A8BACE;
}
.form-style-4 input[type=submit]:hover,
.form-style-4 input[type=button]:hover{
background: #fff;
}

</style>
<body>
	<div class="headers">
		<header class="header-au">
			<!--div class="header-left">&lt; left</div-->
			<!--div class="header-right">right &gt;</div-->
		</header>
	</div>
<img class="setup-title" src='assets/login-title.png'/>
<div class="setup-main">
	<form class="form-signin form-style-4" method="post" action="php/insertUser.php" >
		<h2 class="form-signin-h">Enter your name: </h2>
		<input class="form-control input-lg" type="text" name="usr_n" maxlength="10" placeholder="Your Name"/><br><br>
		<input class="form-signin-btn" type="image" src="assets/login-btn.png" alt="Submit Form" />
	</form>
</div>
</body>
</html>