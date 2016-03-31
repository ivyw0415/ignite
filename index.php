<?php
	session_start();
	if(!isset($_SESSION['usr_id']))
		$_SESSION['usr_id'] = $_GET['u_id'];
	$usr_id = $_SESSION['usr_id'];
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/docs/examples/signin/signin.css" rel="stylesheet">
	<link href="css/my_css.css" rel="stylesheet">
	<title>GMYG</title>
</head>

<body onload="updateQues();">
<div class='container-mine'>
	<div class="headers">
		<header class="header-au">
			<div class="header-left"><a href"#">&lt; Story</a></div>
			<div class="header-right"><a href="asked_q.php">History &gt;</a></div>
		</header>
	</div>
		<div class="panel-body show-ques">
    	    <table class='table table-hover'>
       		 	<thead>
        		<tr>
	        		<th class='content-td' style=''>Response</th>
   		     		<th class='v-btn-td'>Votes</th>
   		     		<th class='v-btn-td'></th>
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
  					<input id="btn-input" type="text" name="ques" class="form-control input-lg" placeholder="Type your message here..." />
     				<span class="input-group-btn">
     					<input class="btn btn-lg btn-danger btn-block" type="submit" value="send" name="askQ" />
     				</span>
  				</div>
			</div>
		</form>
	</div>
</div>
</body>
<script src="js/index_js.js"></script>
</html>