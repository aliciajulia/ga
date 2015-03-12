$(document).ready(function() {
    
    var datum = new Date();

    var day = datum.getDate();
    var month = datum.getMonth();
    var year = datum.getFullYear();
    console.log(month);

    $(".nastaManad").click(function() {
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
    $.getJSON(
            "kalender.php"
            
            );
});