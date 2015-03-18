$(document).ready(function() {

    var datum = new Date();

    var day = datum.getDate();
    var month = datum.getMonth();
    var year = datum.getFullYear();
//    console.log(month);

    $("#kundInfo").hide();

    if ($(".nastaManad").click()) {
        if (month == 12) {
            month = 1;
            year++;
            skickaMedJson(year, month, day);
        } else {
            month++;
            skickaMedJson(year, month, day);
        }
    }
    else {
        skickaMedJson(year, month, day);
    }
    
    function skickaMedJson(year, month, day) {
        
        $.getJSON(
                "kalender.php", {year: "2015"}, function(data) {
            console.log(year);
            
        }
        );
    }

});