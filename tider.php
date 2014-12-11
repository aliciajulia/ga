<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

//lägg till
if (isset($_POST["start"])) {
    $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_SPECIAL_CHARS);
    $slut = filter_input(INPUT_POST, 'slut', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "INSERT INTO `tid`(`id`, `starttid`, `sluttid`) VALUES ('',$start,$slut)";
//    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":start", $start);
    $stmt->bindParam(":slut", $slut);
    $stmt->execute();
    $login = $stmt->fetch();
}

//redigera
//if (isset($_POST[])){
//    
//}
//ta bort
if (isset($_POST["startD"])) {
    $startD = filter_input(INPUT_POST, 'startD', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "DELETE FROM `tid` WHERE starttid=startD";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":startD", $startD);
    $stmt->execute();
    $login = $stmt->fetch();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method = 'POST'>
            Lägg till en tid
            <p>Starttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'start' required>
            <p>Sluttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'slut' required>
            <input type = 'submit' value = 'Lägg till'>
        </form>

        <form method = 'POST'>
            <br>
            <!--visa alla tider-->
            <?php
            $sql = "SELECT * FROM tid";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $tider = $stmt->fetchAll();

            foreach ($tider as $tid) {
                echo "<br>";
                echo $tid["starttid"];
                echo "<br>";
                echo $tid ["sluttid"];
                echo "<br>";
                echo "<input type = 'submit' value = 'Redigera'>";
                echo "<input type = 'submit' value = 'Delete'>";
                echo "<br>";
            }
            ?>

 <!--            <p>Ny starttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'startR' required>
             <p>Ny sluttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'slutR' required>-->

        </form>



    </body>
</html>
