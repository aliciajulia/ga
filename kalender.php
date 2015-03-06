<?php
$date = time();

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);


//for ($i = 0; $i < 12; $i++) {


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
//}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="kalender.css">
        <title>SinnesKällan - Boka nu</title>
    </head>
    <body>
        <form method="POST">
            <input type="submit" value="Nästa Månad" name="nastaManad">
        </form>
    </body>
</html>
