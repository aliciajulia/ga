
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="kalender.js"></script>
        <link rel="stylesheet" href="kalender.css">

        <title>SinnesKällan - Boka nu</title>
    </head>
    <body>
        <!--        <form method="POST">
                    <input type="submit" value="Nästa Månad" name="nastaManad">
                </form>-->
        <button class="nastaManad">Nästa Månad</button>

        <div id="kundInfo">
            Ange namn
            <br>
            <form method="POST"><input type="text" name="kundNamn"><br>
                Ange mailadress
                <input type="email" name="kundMail"><br>
                Ange telefonnummer
                <input type="number" name="kundTelefon"><br>
                <input type="submit" name="kundInfo" value="Skicka"></form><br>
        </div>

    </body>
</html>
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

function korKalender($year, $month, $day) {
    $first_day = mktime(0, 0, 0, $month, 1, $year);
    $title = date('F', $first_day);
    $day_of_week = date('D', $first_day);

    switch ($day_of_week) {
        case "Mon": $blank = 0;
            break;
        case "Tue": $blank = 1;
            break;
        case "Wed": $blank = 2;
            break;
        case "Thu": $blank = 3;
            break;
        case "Fri": $blank = 4;
            break;
        case "Sat": $blank = 5;
            break;
        case "Sun": $blank = 6;
            break;
    }

    $days_in_month = cal_days_in_month(0, $month, $year);
    echo '<div class="kalender">'
    . '<div class="titel">' . $title . ' ' . $year . '</div>'
    . '<div class="dag">M</div>'
    . '<div class="dag">T</div>'
    . '<div class="dag">O</div>'
    . '<div class="dag">T</div>'
    . '<div class="dag">F</div>'
    . '<div class="dag">L</div>'
    . '<div class="dag">S</div>';

    $day_count = 1;
    echo '<div class="dag">';
    while ($blank > 0) {
        echo "<div class='dag'></div>";
        $blank--;
        $day_count++;
    }

    $day_num = 1;
    while ($day_num <= $days_in_month) {
        echo '<div class="dag">' . $day_num . '</div>';
        $day_num++;
        $day_count++;

        if ($day_count > 7) {
            echo '</div><div class="dag">';
            $day_count = 1;
        }
    }


    while ($day_count > 1 && $day_count <= 7) {
        echo '<div class="dag"></div>';
        $day_count++;
    }
    echo '</div></div>';
}

function ledigaDatum($available, $month, $day) {
    if ($month == substr($available["starttid"], 5, 2) && $day == substr($available["starttid"], 8, 2)) {
        echo "<form method=POST><input type='hidden' value='" . $available['id'] . "' name='clickedDateId'></form>";
    }
}

function ledigaTider($available) {
    echo '<div id=ledigaTider>';
    foreach ($available as $ava) {
        echo substr($ava["starttid"], 11, 8) . "<br>";
        echo "<form method=POST><input type='submit' value='Boka tid' name='bokaTid'><input type='hidden' value='" . $tid['id'] . "' name='bokaTidId'></form>";
        echo '</div>';
    }
}

function kundInfo(databasinformationen om den bokade tiden) {
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
}

$sql = "SELECT * FROM tider WHERE bokad=0";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$available = $stmt->fetchAll();

ledigaDatum($available, $month, $day);
var_dump($_GET);
//
?>
