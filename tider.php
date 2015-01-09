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
    $sql = "INSERT INTO `tider`(`id`, `starttid`, `sluttid`) VALUES ('','$start','$slut')";
//    echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":start", $start);
    $stmt->bindParam(":slut", $slut);
    $stmt->execute();
    $login = $stmt->fetch();
}
var_dump($sql);
//redigera
//if (isset($_POST[])){
//    
//}
//ta bort
if (isset($_POST["Delete"])) {
    $Delete = filter_input(INPUT_POST, 'Delete', FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "DELETE FROM `tider` WHERE starttid=startD";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":start", $start);
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
            <p>Starttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'start' required>
            <p>Sluttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'slut' required>
            <input type = 'submit' value = 'Lägg till'>
        </form>

        <form method = 'POST'>
            <br>
            <!--visa alla tider-->
            <?php
            $sql = "SELECT * FROM tider";
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
            var_dump($tider);
            
            ?>

 <!--            <p>Ny starttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'startR' required>
             <p>Ny sluttid ÅÅ-MM-DD TT:MM:SS</p> <input type = 'number' name = 'slutR' required>-->

        </form>



    </body>
</html>
