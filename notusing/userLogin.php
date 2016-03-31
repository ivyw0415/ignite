<?php 
	setcookie("user_name", $_POST['usr_n'], time()+60*60*24);  // 1 day only
	header('Location: main.html');
?>