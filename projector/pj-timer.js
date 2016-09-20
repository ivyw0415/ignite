var startTime = Date.now();
var totalTime = 30 * 60 * 1000;
var timerPaused = false;
var pauseStartTime = Date.now();
var pauseTime = 0;
var popupShown = false;
var cutSceneShown = false;

function f_formatMinSec(time) {
    time = Math.floor(time / 1000); 
    min = Math.floor(time / 60);
    sec = time % 60;
    min_str = (min < 10 ? '0' : '') + min;
    sec_str = (sec < 10 ? '0' : '') + sec;
    return min_str + ':' + sec_str;
}

function f_tickTimer() {
  $.ajax({
    url: '../react/getStatus.php',
    type: 'POST',
    dataType: 'json',
    data: {
      "status_id" : 4
    },
    success: function (data) {
      if(data.status == 0) {
        if(timerPaused) {
           timerPaused = false;
           pauseTime += Date.now()-pauseStartTime;
        }
        var timeLeft = startTime.getTime() + totalTime + pauseTime - Date.now();
        if(timeLeft <= 0) {
          $('#timer_display').html("00:00");
          $.ajax({
            url:  'delTime.php',
            type: 'GET',
            dataType: 'json',
            success: function () {
              $('#timer_display').html("TIME'S UP!");
              console.log("Time's up!!!");
            }
          });
          return;
        }
        var timeString = f_formatMinSec(timeLeft);
        $('#timer_display').html(timeString);
      }
      else {
        if(!timerPaused) {
          timerPaused = true;
          pauseStartTime = Date.now();
        }
      }
      setTimeout(f_tickTimer, 1000);
    }
  });
}

function f_refreshTimer() {
  $.ajax({
    url:  'getTime.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      //console.log("DATA: "+Number(data['time']));
      if(data.time) {
        startTime = new Date();
        startTime.setTime(Number(data['time']));
        console.log("start time: "+startTime.getTime());
        f_tickTimer();
      }
      else {
        var timeLeft = f_formatMinSec(totalTime);
        pauseTime = 0;
        $('#timer_display').html(timeLeft);
        //console.log("not started yet!");
        setTimeout(f_refreshTimer, 1000);
      }
    }
  });
}

function f_checkPopup() {
  $.ajax({
    url: '../react/getStatus.php',
    type: 'POST',
    dataType: 'json',
    data: {
        "status_id": 6
    },
    success: function (data) {
      if(data.status == 1) {
        if(!cutSceneShown) {
          cutSceneShown = true;
          swal({
            title: "Live Cut Scene",
            text: "Please watch the stage.",
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
        $.ajax({
            url: '../react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 2
            },
            success: function (data) {
                if(data.status == 1) {
                    if(!popupShown) {
                        var audio = new Audio("../sound/key_fact_unlock.wav");
                        audio.play();
                        popupShown = true;
                        swal({
                            title: "Key Fact Unlocked!",
                            text: "Please watch the stage.",
                            showConfirmButton: false,
                            allowEscapeKey: false,
                        });
                    }
                }
                else {
                    if(popupShown) {
                        popupShown = false;
                        swal.close();
                    }
                }
            }
        });
      }
      setTimeout(f_checkPopup, 1000);
    }
  })
}

function f_checkGameEnd() {
  $.ajax({
    url: '../react/getStatus.php',
    type: 'POST',
    dataType: 'json',
    data: {
      "status_id": 5
    },
    success: function (data) {
      if(data.status == 1) {
        window.location = '../gameover/index.php';
      }
      else {
        setTimeout(f_checkGameEnd, 1000);
      }
    }
  });
}