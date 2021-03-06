//$(this).siblings("input").val();
$(document).ready(main);

function main() {
    
    var nextMonth = "";
    var prevMonth = "";
    initListeners();
    getDatum();
}

function initListeners() {
    $('.btnNext').click(function () {
        $('#kalender').children().remove();
        getDatum(nextMonth);
    });//click next month

    $('.btnPrev').click(function () {
        $('#kalender').children().remove();
        getDatum(prevMonth);
    });//click next month

}

function addDateListener() {
    $('.bookableDay').click(function () {
        console.log("dag klickad");
        getTider($(this));
    });//click bookable
}

function addTimeListener() {
    $('.bookableTime').click(function () {
        console.log("tid klickad");
        $('#dag').slideToggle();
        $('#bokningsform').slideToggle();
        $('#starttid').val($(this).attr("data-date"));
        $('#selectedDate').text($('#starttid').val().substr(0, 10));
        $('#selectedTime').text($('#starttid').val().substr(11, 5));
    });//click bookable
}

function getTider(e) {
    var starttid = $(e).text();
    $('#kalender').slideToggle();

    $.getJSON("getTider.php", {starttid: starttid})
            .done(function (data) {
                console.log(data);
                var tmp_html = "";
                $.each(data, function (key, value) {
                    console.log(key + ", " + value.starttid);
                    tmp_html = tmp_html + "<li class='bookableTime' data-date='" + value.starttid + "'>" + value.starttid + "</li>";
                });//.each
                tmp_html = "<ul>" + tmp_html + "</ul>";
                $('#dag').append(tmp_html);
                $('#dag').slideToggle();
                addTimeListener();
            });//done + getJSON
}//getDatum

function getDatum(date) {
    $.getJSON("getDatum.php", {starttid: date})
            .done(function (data) {
                var tmp_html = "";
                $.each(data, function (key, value) {
                    console.log(value);
                    tmp_html = tmp_html + "<li class='" + value.class + "'><input type='hidden' value='" + value.starttid + "'>"+value.starttid+"</li>";
                    //kolla slut av vecka och skriv till veckan och resetta
                    if (key % 7 == 6) {
                        tmp_html = "<ul>" + tmp_html + "</ul>";
                        $('#kalender').append(tmp_html);
                        tmp_html = "";
                    }
                });//.each
                tmp_html = "<ul>" + tmp_html + "</ul>";
                $('#kalender').append(tmp_html);
                addDateListener();
                nextMonth = data[0]["nextMonth"];
                prevMonth = data[0]["prevMonth"];
                $('.btnNext').text(data[0]["nextMonth"].substr(0, 7));
                $('.btnPrev').text(data[0]["prevMonth"].substr(0, 7));
                $('#bokningManadRubrik').text(data[0]["currentMonth"]);
            });//done + getJSON
}//getDatum


//function addBookingListeners() {
//    $("form").submit(function (event) {
//        console.log("submit fångad, förbereder getJSON");
//        event.preventDefault();
//
//
////        console.log(selectedDate);
//
//
//
//        var starttid = $('#starttid').val();
//        var kundNamn = $('#kundNamn').val();
//        var kundTelefon = $('#kundTelefon').val();
//        var kundMail = $('#kundMail').val();
//
//
//        $.getJSON("bokaTid.php", {starttid: selectedDate, kundNamn: kundNamn, kundTelefon: kundTelefon, kundMail: kundMail})
//                .done(function (data) {
//                    console.log(data);
//                });//done + getJSON
//
//    });//submit
//
//}
