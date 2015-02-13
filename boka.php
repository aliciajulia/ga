<!DOCTYPE html>
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "ga");
$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

function tider($tider) {
    $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
    $sql = "SELECT * FROM tider WHERE ";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $tider = $stmt->fetchAll();
    foreach ($tider as $tid) {
        echo substr($tid["starttid"], 11, 8) . "<br>";
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Boka tider</title>
    </head>
    <body>
        Välj längd på behandling 
        <?php
//            Visa ut tider anpassat efter 30 min
//            1. Välj dag
        $sql = "SELECT * FROM tider2";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $tider = $stmt->fetchAll();
        foreach ($tider as $tid) {
            echo $tid["datum"];
//            echo "<form method='POST'><input type='submit' value='Välj' name='dag'><input type='hidden' value='" . $tid["id"] . "' name='id'></form><br>";
        }
//        if (isset($_POST["dag"])) {
//            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//            $sql = "SELECT * FROM tider2 WHERE id=$id";
//            $stmt = $dbh->prepare($sql);
//            $stmt->execute();
//            $tider2 = $stmt->fetchAll();
//
//            foreach ($tider2 as $tid2) {
//                echo $tid2["starttid"];
//            }
//        }




        $sql = "SELECT * FROM tider";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $tider = $stmt->fetchAll();

        foreach ($tider as $tid) {
//            var_dump($tid);
            echo substr($tid["starttid"], 0, 10) . "<br>";
            echo "<form method=POST><input type='submit' value='Välj' name='valjDatum'><input type='hidden' value='" . $tid['id'] . "'></form>";
            if (isset($_POST["valjDatum"])) {
                tider($tid);
            }
        }
        ?>
    </body>
</html>