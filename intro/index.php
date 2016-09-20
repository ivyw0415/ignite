<?php
	session_start();
  $_SESSION['usr_id'] = $_GET['u_id'];
?>
<html>
<head>
  <title>Give Me Your Gun</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-3.3.6-dist/css/bootstrap.css" type="text/css" rel="stylesheet">
  <link href="css/gallery.prefixed.css" type="text/css" rel="stylesheet">
  <link href="css/gmyg.css" type="text/css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>

<body onload="updatestatus();">
  <div id="header" class="section">
   <div class="container extra-padding">
     <h1>Give Me Your Gun</h1>
     <div class="row">
      <div class="red-line col-xs-4 col-xs-offset-4"></div>
     </div>
     <p>An interactive theater experience with a <em>twist</em> – you as the audience will have control over one of the character's speech. What will you make her say?</p>
   </div>
  </div>
  
  
  <div id="story" class="section">
   <div class="container">
     <h1>The Story</h1>
     <p>On a day as ordinary as any other, two women who care for each other find themselves confronted by a situation that highlights their disparate mindsets. The repercussions of their reactions will affect not only their friendship, but that of their children as well, who have been best friends for years.</p>
    <p>Can they resolve their differences to ensure the survival of their relationship?</p>
   </div>
  </div>
  
  
  <div id="characters" class="gallery items-2 carousel">
    <div id="item-1" class="control-operator"></div>
    <div id="item-2" class="control-operator"></div>
    
    <figure id="char-left" class="item">
      <a class="right carousel-control" href="#item-2" role="button">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <div class="container extra-padding">
        <h1>Characters</h1>
        <div class="char-info text-left">
          <h3>Linda<small>, 44</small></h3>     
          <p>An elementary school teacher with a 15 year old daughter, Abby. Growing up in a city, she does not understand why anybody would need a gun. To her, they are a symbol of violence that exists outside of her world, reflected only through popular media.</p>
        </div>
      </div>
    </figure>
    
    <figure id="char-right" class="item">
      <a class="carousel-control" href="#item-1" role="button">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <div class="container extra-padding">
        <h1>Characters</h1>
        <div class="char-info text-right">
          <h3>Mary<small>, 40</small></h3>     
          <p>A single mother whose son, Tom, just turned 15. A cashier in a grocery store, she wants her son to get a good education. Coming from a family of suburban gun owners, she's used to seeing them around, but was never allowed to own one till she got married.</p>
        </div>
      </div>
    </figure>
  </div>
  
  
  <div id="game" class="section">
    <div class="container">
      <h1 class="start-info">Enter the game</h1>
      <button class="btn start-btn center-block" onclick="location.href = '../index.php';">
        Start
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Start</span>
      </button>
    </div>
  </div>
  
  <footer>

  </footer>
  <script>
  	function updatestatus(){
		var xmlhttp = new XMLHttpRequest();
		var start_s=0;
		xmlhttp.onreadystatechange = function(){
  			if(xmlhttp.status == 200 && xmlhttp.readyState == 4){
  				start_ = xmlhttp.responseText;
    			start_s = parseInt(start_);
    			if (start_s == 0){
    				$('h1.start-info').html("Coming soon...");
    				$('button').prop('disabled',true);
    				$('button').hide();
    				console.log(start_);
    			}else{
    				$('h1.start-info').html("Enter the game");
    				$('button').prop('disabled',false);
    				$('button').show();
    				console.log(start_);
    			}
    			//console.log(start_);
  			}
		};
		xmlhttp.open("GET", "checkStart.php", true);
	//xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send();
		setTimeout(updatestatus, 2000);
}
  </script>
</body>
</html>