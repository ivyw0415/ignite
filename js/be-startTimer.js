function f_startTimer() {
  var startTime = Date.now();
  console.log(startTime.toString());
  $.ajax({
    url: 'projector/setTime.php',
    type: 'POST',
    dataType: 'json',
    data: {
      "time": startTime.toString()
    },
    success: function (data) {
      console.log("Timer Started! "+data);
    }
  });
}
function f_stopTimer() {
  $.ajax({
    url: 'projector/delTime.php',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      console.log("Timer Stopped! "+data);
    }
  });
}