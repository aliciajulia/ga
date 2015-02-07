<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);



//lägg till
//if (isset($_POST["addt"])) {
//    $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_SPECIAL_CHARS);
//    $slut = filter_input(INPUT_POST, 'slut', FILTER_SANITIZE_SPECIAL_CHARS);
//    $sql = "INSERT INTO `tider`(`id`, `starttid`, `sluttid`) VALUES ('','$start','$slut')";
////    echo $sql;
//    $stmt = $dbh->prepare($sql);
//    $stmt->bindParam(":start", $start);
//    $stmt->bindParam(":slut", $slut);
//    $stmt->execute();
//    $login = $stmt->fetch();
//}

//ta bort
//if (isset($_POST["delete"])) {
//    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//    $sql = "DELETE FROM `tider` WHERE id=$id";
////    var_dump($_POST);
//    $stmt = $dbh->prepare($sql);
//    $stmt->bindParam(":id", $id);
//    $stmt->execute();
//    $login = $stmt->fetch();
//}
////redigera tider
//if (isset($_POST["andra"])) {
//    $startred = filter_input(INPUT_POST, 'startred', FILTER_SANITIZE_SPECIAL_CHARS);
//    $slutred = filter_input(INPUT_POST, 'slutred', FILTER_SANITIZE_SPECIAL_CHARS);
//    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//    $sql = "UPDATE `tider` SET `starttid`='$startred',`sluttid`='$slutred' WHERE id='$id'";
//
//    $stmt = $dbh->prepare($sql);
//    $stmt->bindParam(":startred", $startred);
//    $stmt->bindParam(":slutred", $slutred);
//    $stmt->bindParam(":id", $id);
//    $stmt->execute();
//    $login = $stmt->fetch();
//}
?>
<!--<!DOCTYPE html>-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tider</title>
    </head>
    <body>
        <form method = 'POST' action='doTider.php'>
            Lägg till en tid
            <p>Starttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'start' required>
            <p>Sluttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'slut' required>
            <input type = 'submit' value = 'Lägg till' name='addt'>
        </form>

        <form method = 'POST'></form>
        <br>
      

        <!--        <!--visa alla tider-->
        <?php
        $sql = "SELECT * FROM tider";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $tider = $stmt->fetchAll();

//echo "<form method = 'POST'>
//            Lägg till en tid
//            <p>Starttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'start' required>
//            <p>Sluttid ÅÅÅÅ-MM-DD TT:MM:SS</p> <input type = 'text' name = 'slut' required>
//            <input type = 'submit' value = 'Lägg till' name='addt'>
//        </form>
//
//        <form method = 'POST'></form>
//        <br>";

        foreach ($tider as $tid) {
            echo "<br>" . $tid["id"];
            echo "<br>" . $tid["starttid"];
            echo "<br>" . $tid ["sluttid"];
            echo "<br><form method='POST'><input type = 'submit' value = 'Redigera' name='redigera'><input type='hidden' value='" . $tid["id"] . "' name='id'></form>";

            if (isset($_POST["redigera"]) and $_POST["id"] == $tid["id"]) {
                echo "<form method='POST'><input type='text' value='" . $tid["starttid"] . "' name='startred'> <br>";
                echo "<input type='text' value='" . $tid["sluttid"] . "' name='slutred'> <br>";
                echo "<input type='hidden' value='" . $tid["id"] . "' name='id' ><br>";
                echo "<input type='submit' value='Ändra' name='andra'></form>";
            }
            echo "<form method='POST'><input type='hidden' value='" . $tid["id"] . "' name='id'><input type = 'submit' value = 'Delete' name='delete'></form>";
            echo "<br>";
        }

//        var_dump($tider);

?>
<a href="index.php">Tillbaka</a>
        
  <!--<a href='index.php'>Tillbaka</a>-->

    </body>
</html>
