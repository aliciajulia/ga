$(document).ready(function() {

    $('form').submit(function(event) {
        event.preventDefault();
    });

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

//        $.getJSON(
//                "kalender.php", {year: "2015"}, function(data) {
//            console.log(year);
//            
//        }
//        );
        console.log("inne");
//        console.log(year);

//        var message = JSON.stringify({message: "tjena"});
//        var year1 = JSON.stringify({year: year});
//        var month1 = JSON.stringify({month: month});
//        var day1 = JSON.stringify({day: day});

        $.post("kalender.php", {year: year, month: month, day: day},"json")
                .done(function(data) {
                    console.log("funkar", data);
                })
                .fail(function() {
                    console.log("fail");
                });
        console.log("efter");

    }

});