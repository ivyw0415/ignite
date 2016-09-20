<?php
    session_start();
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700" rel="stylesheet" type="text/css">
    <link href="../bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
    <link href="history.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    <title>GMYG</title>
  </head>

  <body>
    <div class="container">
      <div class="row game-over" id="winRes">
        <!--<div class="col-xs-12" id="result">
          Success!
        </div>
        <div class="col-xs-12">
          <span id="num-achievements">7</span>/7 key facts were unlocked in total
        </div>-->
      </div>
    </div>
        <div id='myQues'>
      <!--<table class="table">
        <thead>
          <tr>
            <th class="hist-head" colspan="3">My questions</th>
          </tr>
        </thead>
              <tbody id="history">
          <tr class="hist-success">
            <td class="hist-icon"><span class="fa fa-trophy fa-2x"></span></td>
            <td>This question has unlocked a key fact.</td>
            <td class="hist-vote">18</td>
          </tr>
          <tr>
            <td class="hist-icon"><span class="fa fa-desktop fa-2x"></span></td>
            <td>This question made it up to the projector.</td>
            <td class="hist-vote">6</td>
          </tr>
                    <tr>
            <td class="hist-icon"><span class="fa fa-mobile fa-2x"></span></td>
            <td>This question did not make it up to the projector.</td>
            <td class="hist-vote">8</td>
          </tr>
                    <tr>
            <td class="hist-icon"><span class="fa fa-mobile fa-2x"></span></td>
            <td>The questions should be in chronological order.</td>
            <td class="hist-vote">0</td>
          </tr>
        </tbody>
      </table>-->
    </div>
  </body>
  <script type="text/babel" src="rs-result.component.js"></script>
  <script type="text/babel" src="rs-questions.component.js"></script>
</html>