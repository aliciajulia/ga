<?php

// Connect to a MySQL database using PHP PDO
$dsn = 'mysql:host=localhost;dbname=ga;';
$login = 'root';
$password = '';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
$dbh = new PDO($dsn, $login, $password, $options);

if (isset($_GET["starttid"])) {
    $time = strtotime($_GET["starttid"]);
} else {
    $time = strtotime("now");
}
$firstDay = date("Y-m-01", $time);
$lastDay = date("Y-m-t", $time);
$nrOfDaysInMonth = date("t", $time);
$year = date("Y", $time);
$month = date("m", $time);
$firstWeekdayfMonth = date("N", strtotime($year . "-" . $month . "-01"));

$sql = "SELECT * FROM tider WHERE bokad='0' AND starttid >= '$firstDay' AND starttid <= '$lastDay' ORDER BY starttid ASC";
//echo $sql;
$stmt = $dbh->prepare($sql);
$stmt->execute();
$bokningar = $stmt->fetchAll(PDO::FETCH_ASSOC);
$date = array_fill(0, $firstWeekdayfMonth + $nrOfDaysInMonth, null);

for ($i = 1; $i < $firstWeekdayfMonth; $i++) {
    $date[$i]["class"] = "disabled";
    $date[$i]["starttid"] = " ";
}
for ($i = 1; $i <= $nrOfDaysInMonth; $i++) {
    $date[$i + $firstWeekdayfMonth - 1]["class"] = "regular";
    if ($i > 9) {
        $date[$i + $firstWeekdayfMonth - 1]["starttid"] = $year . "-" . $month . "-" . $i;
    } else {
        $date[$i + $firstWeekdayfMonth - 1]["starttid"] = $year . "-" . $month . "-0" . $i;
    }
}
foreach ($bokningar as $bokning) {
    $dayOfMonth = date("j", strtotime($bokning["starttid"])) + $firstWeekdayfMonth;
    $date[$dayOfMonth - 1]["starttid"] = substr($bokning["starttid"], 0, -9);
    $date[$dayOfMonth - 1]["class"] = "bookableDay";
}

//ta bort den första irriterade raden. FULHACK.
array_shift($date);

switch ($month) {
    case 01:
        $tmp_month = $month + 1;
        $date[0]["nextMonth"] = $year . "-02-01";
        $tmp_year = $year - 1;
        $date[0]["prevMonth"] = $tmp_year . "-12-01";
        break;
    case 02:
        break;
    case 12:
        $tmp_year = $year + 1;
        $date[0]["nextMonth"] = $tmp_year . "-01-01";
        $date[0]["prevMonth"] = $year . "-11-01";
        break;
    default:
//        echo "default";
//        echo "år" . $year . "-" . $month+1 . "-01";
        $tmp_month = $month + 1;
        $date[0]["nextMonth"] = $year . "-" . $tmp_month . "-01";
        $tmp_month = $month - 1;
        $date[0]["prevMonth"] = $year . "-" . $tmp_month . "-01";
        break;
}
$date[0]["month"] = $month;
$date[0]["currentMonth"] = date("F", $time);
echo json_encode($date);

