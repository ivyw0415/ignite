

function getQues() {
    $.ajax({
        url: 'quesToAsk.php',
        success: function (data) {
            $('#questions').html(data);
            $('#q_block').textfill({
                maxFontPixels: 100,
                minFontPixels: 32,
                debug: true
            });
        }
    });
    
    setTimeout(getQues, 2000);
}