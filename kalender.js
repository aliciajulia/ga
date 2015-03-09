$(document).ready(function () {

    function getFailOutput(year, month, day) {
        $.ajax({
            url: 'kalender.php',
            success: function (response) {
                console.log(data, response);
                $().html(response);
            },
            error: function () {
                $().html('Bummer: there was an error!');
            }
        });
        return false;
    }


var datum = Date();

var day = datum.getDate();
var month = datum.getMonth();
var year = datum.getFullYear();
console.log(month);

$(".nastaManad").click(function () {
    if (month == 12) {
        month = 1;
        year++;
        getFailOutput(year, month, day);
    } else {
        month++;
        getFailOutput(year, month, day);
    }
});
//$(".nastaManad").INTEclick(function(){
//    korKalender(year, month, day);
//});
});