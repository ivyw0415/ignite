/*var n_timeSec = 1200;
var n_startTime = 0;
var n_pauseTime = 0;
var timer_display = document.getElementById("timer_display");
var b_timing = false;

function f_CountTime() {
  if (b_timing) {
    n_passSec = Math.floor((Date.now() - n_startTime) / 1000);
    if (n_passSec < n_timeSec) {
      timer_display.innerHTML = f_formatMinSec(n_timeSec - n_passSec);
      setTimeout(function() {
        f_CountTime();
      }, 1000);
    } else {
      timer_display.innerHTML = 'Time out';
      b_timing = false;
    }
  }
}

function f_StartTimer() {
  timer_display.innerHTML=f_formatMinSec(n_timeSec);
  b_timing = true;
  n_startTime = Date.now();
  n_pauseTime = Date.now();
  f_CountTime();
  console.log(n_startTime);
}

function f_StopTimer() {
  if(b_timing) {
    b_timing = false;
    n_pauseTime = Date.now();
  }
}

function f_ResumeTimer() {
  if(!b_timing) {
    b_timing = true;
    n_startTime += Date.now()-n_pauseTime;
    f_CountTime();
  }
}*/

var startTime = Date.now();
var totalTime = 30 * 60 * 1000;
var timerPaused = false;
var pauseStartTime = Date.now();
var pauseTime = 0;

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