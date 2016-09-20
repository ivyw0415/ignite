function indexOnLoad(){
    updateQues();
    checkPopup();
}
function updateQues(){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            document.getElementById("allQues").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "php/load_ques.php", true);
    xhttp.send();
    setTimeout(updateQues,3000);
}
function refresh(q_id, q_vote,param_this){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState == 4 && xhttp.status == 200){
            //console.log(xhttp.responseText);
        }
    };
    xhttp.open("POST", "php/updateVote.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q_id="+q_id+"&q_vote="+q_vote);
    updateQues();
    if($(param_this).hasClass("fa-thumbs-o-up")){
        $(param_this).removeClass("fa-thumbs-o-up");
        $(param_this).addClass("fa-thumbs-up");
        console.log('vote');
    }else if($(param_this).hasClass("fa-thumbs-up")){
        $(param_this).removeClass("fa-thumbs-up");
        $(param_this).addClass("fa-thumbs-o-up");
        console.log('unvote');
    }
}

var cutSceneShown = false;
var popupShown = false;
var endShown = false;

function showEndPopup(locked) {
  $.ajax({
    url: 'gameover/countFacts.php',
    type: 'GET',
    dataType: 'json',
    success: function (total) {
      if(!endShown) {
        var popupTitle = locked.count > 0 ? "GAME OVER!"
        : "YOU WIN!";
        var popupText = "Key facts: "+(total.count-locked.count) + '/' + (total.count);
        swal({
          title: popupTitle,
          text: popupText,
          confirmButtonText: 'Result',
          showConfirmButton: true,
          allowEscapeKey: false,
          closeOnConfirm: false,
        },
        function () {
          window.location = 'history/index.php';
        });
      }
      else {
        if(endShown) {
          swal.close();
          endShown = false;
        }
      }
    }
  });
}

function showKeyFactPopup (data) {
  if(data.status == 1) {
    console.log("keyfact: "+data.status == 1);
    if(!popupShown) {
      popupShown = true;
      swal({
        title: "Key Fact Unlocked!",
        text: "Please watch the stage.",
        showConfirmButton: false,
        allowEscapeKey: false,
      });
    }
  }
  else if(popupShown) {
    popupShown = false;
    swal.close();
  }
}

function showCutScenePopup (data) {
  if(data.status == 1) {
    if(!cutSceneShown) {
      cutSceneShown = true;
      swal({
        title: "Live Cut Scene",
        text: null,
        showConfirmButton: false,
        allowEscapeKey: false,
      });
    }
  }
  else {
    if(cutSceneShown) {
      cutSceneShown = false;
      swal.close();
    }
    checkInGamePopup();
  }
  setTimeout(checkPopup, 1000);
}

function checkInGamePopup() {
  $.ajax({
    url: 'react/getStatus.php',
    type: 'POST',
    dataType: 'json',
    data: {
      "status_id": 5
    },
    success: function (data) {
      if(data.status == 1) {
        $.ajax({
          url: 'gameover/getFactsResult.php',
          type: 'GET',
          dataType: 'json',
          success: showEndPopup
        });
      }
      else {
        $.ajax({
          url: 'react/getStatus.php',
          type: 'POST', 
          dataType: 'json',
          data: {
            "status_id": 2
          },
          success: showKeyFactPopup
        });
        
      }
    }
  });
}

function checkPopup() {
    $.ajax({
      url: 'react/getStatus.php',
      type: 'POST',
      dataType: 'json',
      data: {
        "status_id": 6
      },
      success: showCutScenePopup
    });
}