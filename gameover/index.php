<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Inconsolata:700' rel='stylesheet' type='text/css'>
    <!-- <link href='ques_delete.css' rel='stylesheet' type='text/css'> -->
    <title>Give me your gun</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!--link href="../../bootstrap/docs/examples/signin/signin.css" rel="stylesheet"-->
    <link href="projector_css.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    
  </head>
  <style>
      html{
          font-family: Myriad Pro;
      background-color: #fff;
      }
      .h-web-addr{
          font-family: 'Inconsolata', serif;
          font-size: 40px;
          color: #ccc;
          border-bottom: 3px solid #ccc;
      }
       .h-counter{
           height: 100px;
          color: #ee3e33;
          border-bottom: 3px solid #ccc;
          font-weight: bold;
          font-size: 60px;
      }
    .div-facts-content{
      overflow-y: scroll;
    }
    .p-ques-user{
      position: relative;
      width:40%;
      height: 40px;
      margin:10px 0px 0px 40px;
      padding-top: 5px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      background-color: #fff;
      color: #000;
      padding-left:28px;
      font-size: 20px;
      border: solid 2px #ccc;
      border-bottom: #fff;
    }
    .p-ques{
      position: relative;
      width:80%;
      height: 120px;
      margin:0px 0px 8px 40px;
      padding: 10px;
      border-radius: 10px;
      border-top-left-radius: 0px;
      background-color: #fff;
      border: solid 2px #ccc;
    }
    .p-change{
      border: solid 2px #ee3e33;
    }
    .p-content{
      float: left;
      width: 85%;
    }
    .p-vote{
      float:left;
      width: 15%;
      font-size: 40px;
    }
      .p-achv{
          position: relative;
      width:100%;
      height: 100px;
      border-radius: 10px;
      border-top-left-radius: 0px;
      background-color: #ee3e33;
      font-size:14px;
      }
    .locked{
      background-color: #ccc;
    }
    .p-achv-user{
      position: relative;
      width:50%;
      height: 30px;
      margin: 10px 0px 0px 0px;
      padding-top: 5px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      background-color: #ccc;
      color: #fff;
      padding-left:28px;
      font-size: 14px;
    }
      .unlock{
          background-color:#ee3e33;
          color:#fff;
      }
      .unlock-content{
          padding-left:20px;
      padding-right:20px;
      }
      .locked-logo{
          width:90px;
          height:90px;
          margin: auto;
      }
    .locklock{
      margin: auto;
      padding-top:20%;
    }
    .p-achv-q{
      font-size: 14px;
      border-bottom: solid 2px #ccc;
      overflow: hidden;
    }
    .p-achv-content{
      padding-top: 14px;
    }
    .fact-no{
      padding-top:50px;
      font-size: 30px;
    }
    .greyyyy{
      color:#ccc;
    }
    .redddd{
      color:#ee3e33;
    }
  </style>
<body onload="updateContents();">
<header class="proj-header" id='h-result'>
    <!-- <div class="h-counter">Success</div>
    <div class="h-web-addr">Time's Up</div> -->
</header>
<div class="proj-main">
        <div class='div-facts'>
            <div class='div-facts-content' id='facts-content'>
      
        </div>
</div>
</body>
<script src="responses_js.js"></script>
<script src="shown_js.js"></script>
<script type="text/babel" src="pj-key-facts.component.js"></script>
<script type="text/babel" src="pj-facts-result.component.js"></script>
</html>