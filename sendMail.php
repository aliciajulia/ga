<?php
//function kundInfo(databasinformationen om den bokade tiden) {
    $kundNamn = filter_input(INPUT_POST, 'kundNamn', FILTER_SANITIZE_SPECIAL_CHARS);
    $kundMail = filter_input(INPUT_POST, 'kundMail', FILTER_SANITIZE_SPECIAL_CHARS);
    $kundTelefon = filter_input(INPUT_POST, 'kundTelefon', FILTER_SANITIZE_SPECIAL_CHARS);
    $today = date('Y-m-d');

    $sql = "UPDATE tider SET kundNamn=$kundNamn, kundMail=$kundMail, kundTelefon=$kundTelefon, bokadDen=$today WHERE id=$bokadId ";
    $mailText = "Du har nu bokat en tid den " . substr($bokad['starttid'], 0, 10) . " från klockan " . substr($bokad['starttid'], 11, 8) . " till klockan "
            . substr($bokad['sluttid'], 11, 8) . ". Ett bekräftelsemail har skickats till " . kundMail . ". Tack för din bokning!";
    $headers = "From: inger.m.lindell@spray.se\r\n";
    $headers .= "content-type: text/plain; charset=UTF-8\r\n";
            
    mail($kundMail, "Bokningsbekräftelse", $mailText, $headers);
    mail("inger.m.lindell@spray.se", "Bokningsbekräftelse", $mailText, $headers);
    
    if (boolean ==  FALSE){
        echo 'Något gick fel, det gick inte att skicka mailet.';
    }
//}
