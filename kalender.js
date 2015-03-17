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
            getJson(year, month, day);
        } else {
            month++;
            getJson(year, month, day);
        }
    }
    else {
        getJson(year, month, day);
    }

    function getJson(year, month, day) {
        console.log(year);
        console.log(month);
        console.log(day);
        $.getJSON(
                "kalender.php", {year: "2015"}, function(data) {
            console.log(data);
            $.each(data.tid, function(year, month, day) {
                
            });//.each
        }
        );
    }

});