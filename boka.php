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
        $sql = "SELECT * FROM tider2";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $tider = $stmt->fetchAll();
        foreach ($tider as $tid) {
            echo $tid["datum"];
        }



//            1. Välj dag
        $sql = "SELECT * FROM tider";

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $tider = $stmt->fetchAll();

        foreach ($tider as $tid) {
//            var_dump($tid);
            echo substr($tid["starttid"], 0, 10) . "<br>";
            echo "<form method=POST><input type='submit' value='Välj' name='valjDatum'><input type='hidden' value='" . $tid['id'] . "'></form>";

            //visa ut alla tider
            if (isset($_POST["valjDatum"])) {
                tider($tid);
            }
        }
        ?>
    </body>
</html>