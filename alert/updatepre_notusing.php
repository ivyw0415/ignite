<?php
   	$file = "../txts/prestatus.txt"; 
	$fh = fopen($file, 'a+'); 
   		$txt=$_POST['pres']; 
   		file_put_contents('../txts/prestatus.txt',$txt); // log to data.txt 
   		exit();
	
    fwrite($fh,$file); // Write information to the file
    fclose($fh); // Close the file
?>